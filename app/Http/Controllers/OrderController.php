<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Series;
use App\Models\Menu;
use App\Models\Order;

class OrderController extends Controller
{
    public function __construct()
    {
        \Midtrans\Config::$serverKey = config('services.midtrans.serverKey');
        \Midtrans\Config::$isProduction = config('services.midtrans.isProduction');
        \Midtrans\Config::$isSanitized = config('services.midtrans.isSanitized');
        \Midtrans\Config::$is3ds = config('services.midtrans.is3ds');
    }

    public function index()
    {
        $series = Series::with('menus')->get();
        $menus = Menu::all();
        return view('user.menu', compact('series', 'menus'));
    }

    public function show($id)
    {
        $menu = Menu::find($id);
        return view('user.menu-show', compact('menu'));
    }

    public function storePayment(Request $request)
    {
        $request->validate([
            'menu_id' => 'required|exists:menus,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $menu = Menu::findOrFail($request->menu_id);


        $orderCode = Str::upper(Str::random(10));
        $totalPrice = $menu->price * $request->quantity;


        $order = Order::create([
            'order_code' => $orderCode,
            'menu_id' => $menu->id,
            'user_id' => auth()->id(),
            'quantity' => $request->quantity,
            'total_price' => $totalPrice,
            'status' => 'pending',
        ]);


        $transactionDetails = [
            'order_id' => $order->id,
            'gross_amount' => $totalPrice,
        ];

        $itemDetails = [
            [
                'id' => $menu->id,
                'price' => $menu->price,
                'quantity' => $request->quantity,
                'name' => $menu->name,
            ],
        ];

        $customerDetails = [
            'first_name' => auth()->user()->name ?? 'Customer',
            'email' => auth()->user()->email ?? 'customer@example.com',
        ];

        $params = [
            'transaction_details' => $transactionDetails,
            'item_details' => $itemDetails,
            'customer_details' => $customerDetails,
        ];

        try {

            $snapToken = \Midtrans\Snap::getSnapToken($params);

            $order->update(['snap_token' => $snapToken]);

            return response()->json([
                'message' => 'Order successfully created',
                'snap_token' => $snapToken,
                'order_id' => $order->id,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to create payment',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function midtransCallback(Request $request)
    {
        $json = json_decode($request->getContent(), true);

        $orderId = $json['order_id'];
        $transactionStatus = $json['transaction_status'];

        $order = Order::find($orderId);

        if (!$order) {
            return response()->json(['error' => 'Order not found'], 404);
        }

        DB::beginTransaction();

        try {
            if ($transactionStatus == 'capture' || $transactionStatus == 'settlement') {
                $order->setStatusSuccess();
            } elseif ($transactionStatus == 'pending') {
                $order->setStatusPending();
            } elseif ($transactionStatus == 'deny' || $transactionStatus == 'cancel') {
                $order->setStatusFailed();
            } elseif ($transactionStatus == 'expire') {
                $order->setStatusExpired();
            }

            DB::commit();
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}

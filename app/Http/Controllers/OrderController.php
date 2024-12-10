<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Series;
use App\Models\Menu;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Midtrans\Notification;
use Midtrans\Config;


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

    public function payment()
    {
        $order = Order::orderBy('id', 'DESC')->paginate(8);
        return view('payment.index', compact('order'));
    }

    public function show($id)
    {
        $menu = Menu::find($id);
        return view('user.menu-show', compact('menu'));
    }

    public function storePayment(Request $request)
    {

        $menu = Menu::findOrFail($request->menu_id);

        $totalPrice = $menu->price * $request->quantity;


        $order = Order::create([
            'order_code' => 'order-' . uniqid(),
            'menu_id' => $menu->id,
            // 'user_id' => Auth::id(),
            'user_id' => 5,
            'quantity' => $request->quantity,
            'total_price' => $totalPrice,
        ]);


        $transactionDetails = [
            'order_id' => $order->order_code,
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
        Log::info('Midtrans Callback Data:', $request->all());

        // Inisialisasi Midtrans Notification
        $notification = new Notification();

        // Ambil data dari notifikasi
        $order_id = $notification->order_id;
        $transaction_status = $notification->transaction_status;
        $fraud_status = $notification->fraud_status;

        // Cari order berdasarkan order_code
        $order = Order::where('order_code', $order_id)->first();

        if ($order) {
            // Update status berdasarkan status transaksi
            if ($transaction_status == 'capture' || $transaction_status == 'settlement') {
                if ($fraud_status == 'accept') {
                    $order->setStatusSuccess();  // Update status order ke success
                } else {
                    $order->setStatusPending();  // Jika fraud status tidak diterima
                }
            } else if ($transaction_status == 'cancel' || $transaction_status == 'deny') {
                $order->setStatusFailed();  // Update status ke failed
            } else if ($transaction_status == 'expire') {
                $order->setStatusExpired();  // Update status ke expired
            }
            // Simpan perubahan
            $order->save();
        }

        // Return response success
        return response()->json(['status' => 'success']);
    }
}

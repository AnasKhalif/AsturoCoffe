<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Series;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::with('series')->get();
        return view('menu.index', compact('menus'));
    }

    public function create()
    {
        $series = Series::all();
        return view('menu.create', compact('series'));
    }

    public function store(Request $request)
    {
        $validatedMenus = $request->validate([
            'name' => 'required|string|max:255',
            'series_id' => 'required|exists:series,id',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {

            $imagePath = $request->file('image')->store('menus', 'public');
            $validatedMenus['image'] = $imagePath;
        }

        Menu::create($validatedMenus);
        return redirect()->route('menus.index');
    }

    public function show($id)
    {
        $menu = Menu::with('series')->findOrFail($id);
        return view('menu.detail', compact('menu'));
    }

    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        $series = Series::all();
        return view('menu.edit', compact('menu', 'series'));
    }

    public function update(Request $request, $id)
    {
        $validatedMenus = $request->validate([
            'name' => 'required|string|max:255',
            'series_id' => 'required|exists:series,id',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $menu = Menu::findOrFail($id);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('menus', 'public');
            $validatedMenus['image'] = $imagePath;
        }

        $menu->update($validatedMenus);
        return redirect()->route('menus.index');
    }
}

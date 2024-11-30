<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Series;

class SeriesController extends Controller
{
    public function index()
    {
        $series = Series::all();
        return view('series.index', compact('series'));
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        $validatedSeries = $request->validate([
            'name' => 'required|max:255',
        ]);

        Series::create($validatedSeries);
        return redirect()->route('series.index');
    }

    public function edit($id)
    {
        $series = Series::findOrFail($id);
        return view('series.edit', compact('series'));
    }

    public function update(Request $request, $id)
    {
        $validatedSeries = $request->validate([
            'name' => 'required|max:255',
        ]);

        $series = Series::findOrFail($id);
        $series->update($validatedSeries);
        return redirect()->route('series.index');
    }

    public function destroy($id)
    {
        $series = Series::findOrFail($id);
        $series->delete();
        return redirect()->route('series.index');
    }
}

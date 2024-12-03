<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Series;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Laratrust\Traits\HasRolesAndPermissions;

class SeriesController extends Controller
{
    public function index()
    {
        $user = request()->user();

        if ($user->hasRole('superadmin') || $user->isAbleTo('seri-read')) {
            $series = Series::all();
            return view('series.index', compact('series'));
        } else {
            return redirect()->route('dashboard');
        }
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

        try {
            $series = Series::findOrFail($id);


            if (
                request()->user()->hasRole('superadmin') ||
                request()->user()->isAbleTo('seri-update', $series)
            ) {
                return view('series.edit', compact('series'));
            } else {
                return redirect()->route('series.index');
            }
        } catch (ModelNotFoundException $e) {
            return redirect()->route('series.index');
        }
    }

    public function update(Request $request, $id)
    {

        try {
            $series = Series::findOrFail($id);

            if (
                request()->user()->hasRole(['superadmin']) ||
                request()->user()->isAbleTo('seri-update', $series) ||
                $series->user_id === request()->user()->id
            ) {
                $validatedSeries = $request->validate([
                    'name' => 'required|max:255',
                ]);

                $series->update($validatedSeries);

                return redirect()->route('series.index');
            } else {
                return redirect()->route('series.index');
            }
        } catch (ModelNotFoundException $e) {
            return redirect()->route('series.index');
        }
    }

    public function destroy($id)
    {
        try {
            $series = Series::findOrFail($id);

            if (
                request()->user()->hasRole(['superadmin']) ||
                request()->user()->isAbleTo('seri-delete', $series) ||
                $series->user_id === request()->user()->id
            ) {
                $series->delete();
                return redirect()->route('series.index');
            } else {
                return redirect()->route('series.index');
            }
        } catch (ModelNotFoundException $e) {
            return redirect()->route('series.index');
        }
    }
}

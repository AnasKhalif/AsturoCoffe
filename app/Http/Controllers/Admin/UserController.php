<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role_id' => ['required']
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        $role = Role::find($validatedData['role_id']);

        $user->roles()->attach($role);

        return redirect()->route('admin.user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            $user = User::findOrFail($id);
            $roles = Role::all();

            return view('admin.edit', compact('user', 'roles'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('admin.user.index')->with($this->alertNotFound());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);

            $validatedData = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $id],
                'role_id' => ['required']
            ]);

            $user->update([
                'name' => $validatedData['name'],
                'email' => $validatedData['email']
            ]);

            $roles = $user->roles;

            foreach ($roles as $role) {
                $user->roles()->detach($role);
            }

            $role = Role::find($validatedData['role_id']);

            $user->roles()->attach($role);

            return redirect()->route('admin.user.index')->with($this->alertUpdated());
        } catch (ModelNotFoundException $e) {
            return redirect()->route('admin.user.index')->with($this->alertNotFound());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);

            $roles = $user->roles;

            foreach ($roles as $role) {
                $user->roles()->detach($role);
            }

            $user->delete();

            return redirect()->route('admin.user.index')->with($this->alertDeleted());
        } catch (ModelNotFoundException $e) {
            return redirect()->route('admin.user.index')->with($this->alertNotFound());
        }
    }
}

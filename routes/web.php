<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\MenuController;

Route::get('/', function () {
    return view('user.index');
})->name('home');

Route::get('/about', function () {
    return view('user.about');
})->name('about');

Route::get('/menu', function () {
    return view('user.menu');
})->name('menu');

Route::get('/contact', function () {
    return view('user.contact');
})->name('contact');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::name('admin.')->prefix('admin')->namespace('App\Http\Controllers\Admin')->middleware(['auth', 'role:superadmin'])->group(function () {
    Route::resource('permission', 'PermissionController');
    Route::resource('role', 'RoleController');
});

Route::resource('series', SeriesController::class)->middleware('auth');
Route::resource('menus', MenuController::class)->middleware('auth');

require __DIR__ . '/auth.php';

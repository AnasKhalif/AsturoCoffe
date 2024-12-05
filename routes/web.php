<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return view('user.index');
})->name('home');

Route::get('/about', function () {
    return view('user.about');
})->name('about');

Route::get('/menu', [OrderController::class, 'index'])->name('menu');
Route::get('/menu/{id}', [OrderController::class, 'show'])->name('menu.show');
Route::post('/menu/payment', [OrderController::class, 'storePayment'])->name('menu.payment');
Route::post('/midtrans/callback', [OrderController::class, 'midtransCallback'])->name('midtrans.callback');


Route::get('/contact', function () {
    return view('user.contact');
})->name('contact');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'role:admin|superadmin'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::name('admin.')->prefix('admin')->namespace('App\Http\Controllers\Admin')->middleware(['auth', 'role:superadmin'])->group(function () {
    Route::resource('user', 'UserController');
    Route::resource('permission', 'PermissionController');
    Route::resource('role', 'RoleController');
});

Route::resource('series', SeriesController::class)->middleware('auth');
Route::resource('menus', MenuController::class)->middleware('auth');

require __DIR__ . '/auth.php';

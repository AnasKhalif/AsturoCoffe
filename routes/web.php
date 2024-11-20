<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('user.index');
})->name('home');

Route::get('/about', function () {
    return view('user.about');
})->name('about');

Route::get('/contact', function () {
    return view('user.contact');
})->name('contact');

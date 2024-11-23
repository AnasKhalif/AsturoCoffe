<?php

use Illuminate\Support\Facades\Route;

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

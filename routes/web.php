<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/home', function () {
    return view('home');
});

Route::get('/about', function () {
    if (view()->exists('about')) {
        return view('about');
    }

    return redirect('/#intro');
})->name('about');

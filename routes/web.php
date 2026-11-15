<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/home', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/fan-letter', function () {
    if (view()->exists('fan-letter')) {
        return view('fan-letter');
    }

    if (view()->exists('contact')) {
        return view('contact');
    }

    return redirect('/#intro');
})->name('fan-letter');
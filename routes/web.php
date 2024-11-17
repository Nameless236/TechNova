<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/programs', function () {
    return view('programs');
})->name('programs');

Route::get('/innovations', function () {
    return view('innovations');
})->name('innovations');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');


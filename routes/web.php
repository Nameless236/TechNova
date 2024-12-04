<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProgramController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.index');
})->name('home');

Route::get('/about', function () {
    return view('about.index');
})->name('about');

//Route::get('/programs', function () {
//    return view('programs');
//})->name('programs');

Route::get('/innovations', function () {
    return view('innovations.index');
})->name('innovations');

//Route::get('/contact', function () {
//    return view('contact.index');
//})->name('contact');

Route::resource('programs', ProgramController::class);
Route::resource('contact', ContactController::class);

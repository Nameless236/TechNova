<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgramController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

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

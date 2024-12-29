<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserManagementController;
use Illuminate\Support\Facades\Route;

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

Route::get('/innovations', function () {
    return view('innovations.index');
})->name('innovations');

//Route::get('/contact', function () {
//    return view('contact.index');
//})->name('contact');


Route::resource('reviews', ReviewController::class);

Route::get('/user-management', [UserManagementController::class, 'index'])->name('user-management');
Route::get('/user-management/users', [UserManagementController::class, 'getUsers'])->name('user-management.getUsers');
Route::put('/user-management/users/{user}', [UserManagementController::class, 'updateUser'])->name('user-management.updateUser');


Route::resource('programs', ProgramController::class);
Route::resource('contact', ContactController::class);

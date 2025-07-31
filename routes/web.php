<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WatchController;
use App\Http\Controllers\ReviewController;

Route::get('/',[HomeController::class, 'index'])->name('home');

Route::get('/contact', function () {
    return view('contact');
})->name("contact");
Route::get('/about', function () {
    return view('about');
})->name("about");

Route::resource('watches', WatchController::class);
Route::post('/watches/{watch}/reviews', [ReviewController::class, 'store'])->name('reviews.store');

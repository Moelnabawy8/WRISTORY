<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WatchController;
use App\Http\Controllers\ReviewController;

use App\Http\Controllers\PaymentController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');



Route::prefix("web")->middleware(['auth:web', 'verified:web'])->group(function () {
    Route::get('home', [HomeController::class, 'index'])->name('home');
    Route::get('/contact', function () {
        return view('contact');
    })->name('contact');
    Route::get('/about', function () {
        return view('about');
    })->name('about');
    Route::resource('watches', WatchController::class);
    Route::post('/watches/{watch}/reviews', [ReviewController::class, 'store'])->name('reviews.store');
});


Route::middleware("verified:web")->group(function () {
    Route::get('/checkout/success', [PaymentController::class, 'success'])->name('checkout-success');
    Route::get('/checkout/cancel', function () {
        return view('checkout-cancel');
    })->name('checkout-cancel');
    Route::get('/checkout/{watch}', [PaymentController::class, 'redirectToStripe'])->name('checkout');

    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/{watch}', [CartController::class, 'store'])->name('cart.store');
    Route::delete('/cart/{cart}', [CartController::class, 'destroy'])->name('cart.destroy');
    Route::put('/cart/{cart}/update', [CartController::class, 'update'])->name('cart.update');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
require __DIR__ . '/seller.php';
require app_path('Http/Middleware/Authenticate.php');

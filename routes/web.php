<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(AuthenticationController::class)->group(function() {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'authenticate')->name('authenticate');
});

Route::middleware('auth')->group(function() {
    Route::get('/logout', [AuthenticationController::class, 'logout'])->name('logout');

    Route::controller(ProductController::class)->group(function() {
        Route::get('/products', 'index')->name('products');
        Route::get('/products/create', 'create')->name('products.create');
        Route::post('/products/create', 'store')->name('products.store');
        Route::get('/products/edit/{productId}', 'edit')->name('products.edit');
        Route::patch('/products/edit/{productId}', 'update')->name('products.update');
        Route::delete('/products/{productId}', 'destroy')->name('products.delete');
    });

    Route::controller(ReviewController::class)->group(function () {
        Route::get('/reviews', 'index')->name('reviews');
        Route::get('/reviews/create', 'create')->name('reviews.create');
        Route::post('/reviews/create', 'store')->name('reviews.store');
        Route::get('/reviews/edit/{reviewId}', 'edit')->name('reviews.edit');
        Route::patch('/reviews/edit/{reviewId}', 'update')->name('reviews.update');
        Route::delete('/reviews/{reviewId}', 'destroy')->name('reviews.destroy');
    });
});

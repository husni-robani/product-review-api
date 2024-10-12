<?php

use App\Http\Controllers\Api\AuthenticationController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ReviewController;
use Illuminate\Support\Facades\Route;

Route::post('/auth', [AuthenticationController::class, 'authenticate'])->name('authenticate');

Route::middleware('api.auth')->group(function () {
    Route::controller(ProductController::class)->group(function (){
        Route::get('/products', 'allProducts');
        Route::get('/products/search', 'searchProduct');
        Route::post('/products', 'store');
        Route::patch('/products/{productId}', 'update');
        Route::delete('/products/{productId}', 'destroy');
    });

    Route::controller(ReviewController::class)->group(function() {
        Route::get('/reviews', 'allReviews');
        Route::get('/reviews/search', 'searchReview');
        Route::post('/reviews', 'store');
        Route::patch('/reviews/{reviewId}', 'update');
        Route::delete('/reviews/{reviewId}', 'destroy');
    });
});

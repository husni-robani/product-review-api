<?php

use App\Http\Controllers\Api\AuthenticationController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('/auth', [AuthenticationController::class, 'authenticate'])->name('authenticate');

Route::middleware('api.auth')->group(function () {
    Route::controller(ProductController::class)->group(function (){
        Route::get('/products', 'allProducts');
        Route::get('/products/search', 'searchProduct');
        Route::post('/products', 'store');
        Route::patch('/products/{productId}', 'update');
        Route::delete('/products/{productId}', 'destroy');
    });
});

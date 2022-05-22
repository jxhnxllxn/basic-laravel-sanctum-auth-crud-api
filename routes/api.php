<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
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










// Public Routes


// Route::get('/products',[ProductController::class, 'index']);
// Route::post('/products',[ProductController::class, 'store']);
// Route::resource('products',ProductController::class);


// Auth
Route::post('/auth/login',[AuthController::class, 'login']);
Route::post('/auth/register',[AuthController::class, 'register']);

// Product
Route::get('/products/{id}',[ProductController::class, 'show']);
Route::post('/products',[ProductController::class, 'store']);
Route::get('/products/search/{name}',[ProductController::class, 'search']);


// Protected Routes
Route::group(['middleware' => ['auth:sanctum']],function(){
    //Auth
    Route::post('/auth/logout',[AuthController::class, 'logout']);

    //Product
    Route::post('/products',[ProductController::class, 'store']);
    Route::put('/products/{id}',[ProductController::class, 'update']);
    Route::delete('/products/{id}',[ProductController::class, 'destroy']);

});


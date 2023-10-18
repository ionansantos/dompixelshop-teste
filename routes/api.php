<?php

use Illuminate\Http\Request;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('products', [ProductController::class, 'index']);
Route::post('product/create', [ProductController::class, 'store']);
Route::get('product/get/{id}', [ProductController::class, 'show']);
Route::post('product/update/{id}', [ProductController::class, 'update']);
Route::delete('product/delete/{id}', [ProductController::class, 'destroy']);

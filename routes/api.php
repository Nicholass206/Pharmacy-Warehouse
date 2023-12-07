<?php

use App\Http\Controllers\PharmacistController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SessionsController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('products',[ProductsController::class,'index']);
Route::get('products/{id}',[ProductsController::class,'show']);
Route::post('products',[ProductsController::class,'store']);


Route::post('register',[PharmacistController::class , 'store']);
Route::post('login',[SessionsController::class , 'store']);

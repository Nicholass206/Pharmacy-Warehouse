<?php

use App\Http\Controllers\OwnerController;
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
//Route::resource('budy',OwnerController::class);

Route::get('products',[ProductsController::class,'index']); // show all
Route::get('products/{id}',[ProductsController::class,'show']); // show one
Route::delete('products/{id}',[ProductsController::class,'destroy']); // delete
Route::post('products',[ProductsController::class,'store']); // create


Route::post('register',[SessionsController::class , 'create']); // register (working)
Route::post('login',[SessionsController::class , 'store']); // login (working to be)


/*
    RESPONSE FORM :
    [
        data :
        message :
        errors :
        status : (like: 200, 404 ,403 ....)
    ]
*/

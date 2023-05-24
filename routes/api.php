<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\loginController;
use App\Http\Controllers\productController;
use App\Http\Controllers\orderController;
use App\Http\Controllers\otherController;
use App\Http\Controllers\adminController;
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

Route::post('/login', 'App\Http\Controllers\loginController@loginAPI');
Route::post('/register', 'App\Http\Controllers\loginController@registerAPI');
Route::get('/order/{id}',function ($id) {
    return orderController::APIGet($id);
});
Route::get('/lapang',function () {
    return productController::APIGet();
});
Route::get('/order/delete/{id}',function ($id) {
    return orderController::APIDelete($id);
});
Route::post('/order',function (Request $request) {
    return orderController::APIadd($request);
});
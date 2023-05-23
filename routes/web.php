<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;

use App\Http\Controllers\loginController;
use App\Http\Controllers\productController;
use App\Http\Controllers\orderController;
use App\Http\Controllers\otherController;
use App\Http\Controllers\adminController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    if (Auth::check()) {
        if(Auth::user()->email = 'admin@gmail.com'){
            return adminController::index();
        }
        return orderController::jadwalku();
    }
    return view('home',['page'=>'home']);
});
Route::get('/admin', function () {
    if (Auth::check()) {
        if(Auth::user()->email = 'admin@gmail.com'){
            return adminController::index();
        }
    }
    return view('home',['page'=>'home']);
});
Route::get('/admin/bookings', function () {
    if (Auth::check()) {
        if(Auth::user()->email = 'admin@gmail.com'){
            return adminController::orders();
        }
    }
    return view('home',['page'=>'home']);
});
Route::get('/admin/users', function () {
    if (Auth::check()) {
        if(Auth::user()->email = 'admin@gmail.com'){
            return adminController::users();
        }
    }
    return view('home',['page'=>'home']);
});
Route::get('/admin/lapang', function () {
    if (Auth::check()) {
        if(Auth::user()->email = 'admin@gmail.com'){
            return adminController::lapang();
        }
    }
    return view('home',['page'=>'home']);
});
Route::get('/admin/feedbacks', function () {
    if (Auth::check()) {
        if(Auth::user()->email = 'admin@gmail.com'){
            return adminController::feedbacks();
        }
    }
    return view('home',['page'=>'home']);
});

//ADD
Route::get('/admin/lapang/add', function () {
    if (Auth::check()) {
        if(Auth::user()->email = 'admin@gmail.com'){
            return productController::add();
        }
    }
    return view('home',['page'=>'home']);
});
Route::post('/admin/lapang/add', function (Request $request) {
    if (Auth::check()) {
        if(Auth::user()->email = 'admin@gmail.com'){
            return productController::add_lapang($request);
        }
    }
    return view('home',['page'=>'home']);
});

//EDIT
Route::get('/admin/lapang/edit/{id}', function ($id) {
    if (Auth::check()) {
        if(Auth::user()->email = 'admin@gmail.com'){
            return productController::edit($id);
        }
    }
    return view('home',['page'=>'home']);
});

Route::post('/admin/lapang/edit', function (Request $request) {
    if (Auth::check()) {
        if(Auth::user()->email = 'admin@gmail.com'){
            return productController::edit_lapang($request);
        }
    }
    return view('home',['page'=>'home']);
});

//DELETE
Route::get('/lapang/delete/{id}', function ($id) {
    if (Auth::check()) {
        if(Auth::user()->email = 'admin@gmail.com'){
            return productController::delete($id);
        }
    }
    return view('home',['page'=>'home']);
});
Route::get('/order/delete/{id}', function ($id) {
    if (Auth::check()) {
        return orderController::delete($id);
    }
    return view('home',['page'=>'home']);
});
Route::get('/users/delete/{id}', function ($id) {
    if (Auth::check()) {
        if(Auth::user()->email = 'admin@gmail.com'){
            return loginController::delete($id);
        }
    }
    return view('home',['page'=>'home']);
});

//BIASA
Route::get('/login', function () {
    return view('login',['page'=>'login']);
});
Route::post('/login', function (LoginRequest $request) {
    return loginController::login($request);
});
Route::get('/logout', function () {
    return loginController::logout();
});
Route::get('/register', function () {
    return view('register',['page'=>'register']);
});
Route::post('/register', function (RegisterRequest $request) {
    return loginController::register($request);
});

Route::get('/products', function () {
    return productController::index();
});

Route::get('/order/{id}', function ($id) {
    return orderController::index($id);
});
Route::post('/order', function (Request $request) {
    return orderController::add_order($request);
});
Route::get('/jadwalku', function () {
    return orderController::jadwalku();
});
Route::get('/contact', function () {
    return view('contact',['page'=>'contact']);
});
Route::post('/feedback', function (Request $request) {
    return otherController::feedback($request);
});

<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('master');
});
Route::get('/dashboard', function () {
    return view('dashboard.main-dashboard');
});
Route::get('/user', function () {
    return view('user.create');
});
Route::get('/supplier', function () {
    return view('supplier.create');
});

Route::get('/customer', function () {
    return view('customer.create');
});



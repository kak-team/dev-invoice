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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('master');
});
Route::get('/dashboard', function () {
    return view('dashboard.main-dashboard');
});
Route::get('/user', function () {
    return view('user.create');
});

//Company Profile
Route::resource('companyprofile', 'CompanyProfileController');

// Paymenth Method
Route::resource('paymentmethod', 'PaymentMethodController');
Route::post('/paymentmethod/update', 'PaymentMethodController@update');
Route::get('/paymentmethod/ajax/{id}', 'PaymentMethodController@ajax');
Route::post('/paymentmethod/destroy', 'PaymentMethodController@destroy');

// Airline Name
Route::resource('airline', 'AirlineController');
Route::post('/airline/update', 'AirlineController@update');
Route::get('/airline/ajax/{id}', 'AirlineController@ajax');
Route::post('/airline/destroy', 'AirlineController@destroy');

// supplier
Route::resource('supplier', 'SupplierController');
Route::post('/supplier/store', 'SupplierController@store');
Route::get('/supplier/ajax/{id}', 'SupplierController@ajax');
Route::get('/supplier/supplier_contact/{id}', 'SupplierController@supplier_contact');
Route::post('/supplier/destroy', 'SupplierController@destroy');
Route::post('/supplier/update', 'SupplierController@update');

// customer
Route::resource('customer', 'CustomerController');
Route::post('/customer/store', 'CustomerController@store');
Route::get('/customer/ajax/{id}', 'CustomerController@ajax');
Route::get('/customer/customer_contact/{id}', 'CustomerController@customer_contact');
Route::post('/customer/destroy', 'CustomerController@destroy');
Route::post('/customer/update', 'CustomerController@update');

// Hotel
Route::resource('hotel', 'HotelController');
Route::post('/hotel/store', 'HotelController@store');
Route::get('/hotel/update_status/{id}', 'HotelController@update_status');
Route::get('/hotel/hotel_contact/{id}', 'HotelController@hotel_contact');
Route::post('/hotel/update', 'HotelController@update');

// transportation
Route::resource('transportation', 'TransportationController');
Route::post('/transportation/store', 'TransportationController@store');
Route::get('/transportation/update_status/{id}', 'TransportationController@update_status');
Route::get('/transportation/transportation_contact/{id}', 'TransportationController@transportation_contact');
Route::post('/transportation/update', 'TransportationController@update');

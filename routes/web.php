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
    //return view('master');
    return view('dashboard.main-dashboard');
});
Route::get('/dashboard', function () {
    return view('dashboard.main-dashboard');
});
Route::get('/user', function () {
    return view('user.create');
});

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


// invoice
Route::resource('invoice_airticket_list', 'InvoiceController');
Route::resource('invoice_hotel_list', 'InvoiceController');
Route::resource('invoice_visa_list', 'InvoiceController');
Route::resource('invoice_tour_list', 'InvoiceController');
Route::resource('invoice_transportation_list', 'InvoiceController');
Route::resource('invoice_insurance_list', 'InvoiceController');

    // form invoice
    Route::post('invoice/form_create_invoice', 'InvoiceController@form_create_invoice');
    Route::post('invoice/form_edit_invoice',   'InvoiceController@form_edit_invoice');
    Route::post('invoice/form_print_invoice',  'InvoiceController@form_print_invoice');
    Route::post('invoice/form_cancel_invoice',  'InvoiceController@form_cancel_invoice');


    // form Payment
    Route::post('invoice/table_payment',      'InvoiceController@table_payment');
    Route::post('invoice/form_edit_payment',  'InvoiceController@form_edit_payment');
    Route::post('invoice/form_delete_payment','InvoiceController@form_delete_payment');

    // autocomplete 
    Route::post('invoice/auto_customer', 'InvoiceController@auto_customer');
    Route::post('invoice/auto_supplier', 'InvoiceController@auto_supplier');
    Route::post('invoice/auto_airline',  'InvoiceController@auto_airline');
    Route::post('invoice/auto_ticket',   'InvoiceController@auto_ticket');
    Route::post('invoice/auto_transportation', 'InvoiceController@auto_transportation');

    // Execute
        // invoice
        Route::post('invoice/exe_form_create_invoice', 'InvoiceController@exe_form_create_invoice');
        Route::post('invoice/exe_form_edit_invoice',   'InvoiceController@exe_form_edit_invoice');
        Route::post('invoice/exe_form_cancel_invoice', 'InvoiceController@exe_form_cancel_invoice');
        // payment
        Route::post('invoice/exe_form_create_payment', 'InvoiceController@exe_form_create_payment');
        Route::post('invoice/exe_form_edit_payment',   'InvoiceController@exe_form_edit_payment');
        Route::post('invoice/exe_form_delete_payment', 'InvoiceController@exe_form_delete_payment');


// Company Profile
Route::resource('companyprofile', 'CompanyProfileController');
Route::post('/companyprofile/store', 'CompanyProfileController@store');
Route::post('/companyprofile/update', 'CompanyProfileController@update');

// paymentmethod
Route::resource('paymentmethod', 'PaymentMethodController');
Route::post('/paymentmethod/store', 'PaymentMethodController@store');
Route::post('/paymentmethod/update', 'PaymentMethodController@update');
Route::get('/paymentmethod/ajax/{id}', 'PaymentMethodController@ajax');
Route::post('/paymentmethod/destroy', 'PaymentMethodController@destroy');


// invoice Print
Route::resource('print', 'PrintController');
Route::post('receipt', 'PrintController@receipt');
Route::get('report', function(){
    return view('report.report');
});
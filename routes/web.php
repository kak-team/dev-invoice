<?php

use Illuminate\Contracts\Auth\Access\Gate;

Auth::routes();

//Main Rout Group
Route::group(['middleware'=>'auth'], function(){
    
    // Defualt main page
    Route::get('/', function(){
        return view('dashboard.main-dashboard');

    });
   
    // admin route section
    Route::group(['middleware' => 'admin'], function()
    {
        
        //Users route
        Route::resource('user', 'UserController');
        Route::post('/create_user', 'UserController@create');
        Route::get('/edit-user', 'UserController@edit_user');
        Route::post('/update-user', 'UserController@update');
        Route::post('/destroy_user', 'UserController@destroy_user');
        Route::post('/destroy', 'UserController@destroy');
        
        // invoice
        Route::resource('invoice_airticket_list', 'InvoiceController');

        // form create 
        Route::post('invoice_airticket_list/form_create_invoice', 'InvoiceController@form_create_invoice');

        // form edit
        Route::post('invoice_airticket_list/form_edit_invoice', 'InvoiceController@form_edit_invoice');


        // autocomplete 
        Route::post('invoice/auto_customer', 'InvoiceController@auto_customer');
        Route::post('invoice/auto_supplier', 'InvoiceController@auto_supplier');
        Route::post('invoice/auto_airline',  'InvoiceController@auto_airline');
        Route::post('invoice/auto_ticket',   'InvoiceController@auto_ticket');

        // Execute
        Route::post('invoice/store_invoice', 'InvoiceController@store_invoice');

        Route::post('invoice_airticket_list/store_payment', 'Invoice_airticket_listController@store_payment');
        Route::post('invoice_airticket_list/update', 'Invoice_airticket_listController@update');
        Route::post('invoice_airticket_list/update_payment', 'Invoice_airticket_listController@update_payment');
        Route::post('invoice_airticket_list/delete_payment', 'Invoice_airticket_listController@delete_payment');


        Route::post('invoice_airticket_list/form_print_invoice', 'Invoice_airticket_listController@form_print_invoice');
        Route::post('invoice_airticket_list/form_cancel_invoice', 'Invoice_airticket_listController@form_cancel_invoice');

        Route::post('invoice_airticket_list/form_payment', 'Invoice_airticket_listController@form_payment');
        Route::post('invoice_airticket_list/form_edit_payment', 'Invoice_airticket_listController@form_edit_payment');
        Route::post('invoice_airticket_list/form_delete_payment', 'Invoice_airticket_listController@form_delete_payment');
        Route::post('invoice_airticket_list/cancel_invoice', 'Invoice_airticket_listController@cancel_invoice');

        

        // invoice Print
        Route::resource('print', 'PrintController');
        Route::post('receipt', 'PrintController@receipt');
        Route::get('report', function(){
            return view('report.report');
        });
    });

    //Staff route section
    Route::group(['middleware' => 'staff'], function()
    {
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
    });

});
Route::get('/dashboard', function () {
    return view('dashboard.main-dashboard');
});

// invoice Report
Route::resource('report', 'ReportController');
Route::post('report/auto_filter','ReportController@auto_filter');
Route::post('report/auto_filter_income','ReportController@auto_filter_income');
Route::post('report/auto_filter_expense','ReportController@auto_filter_expense');
Route::post('report/auto_inovoice_number','ReportController@auto_inovoice_number');
Route::post('report/auto_supplier_inovoice_number','ReportController@auto_supplier_inovoice_number');
Route::post('report/auto_customer','ReportController@auto_customer');
Route::post('report/auto_inovoice_by_cusomter','ReportController@auto_inovoice_by_cusomter');

//invoice expense
Route::resource('expense', 'Invoice_expenseController');
Route::post('/expense/form_create', 'Invoice_expenseController@form_create');
Route::post('/expense/auto_invoice_number', 'Invoice_expenseController@auto_invoice_number');
Route::post('/expense/ajax', 'Invoice_expenseController@ajax');
Route::post('/expense/destroy', 'Invoice_expenseController@destroy');
Route::post('/expense/fdelete', 'Invoice_expenseController@fdelete');


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
Route::resource('invoice_other_list', 'InvoiceController');

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
    Route::post('invoice/auto_hotel', 'InvoiceController@auto_hotel');
    Route::post('invoice/auto_search',   'InvoiceController@auto_search');

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
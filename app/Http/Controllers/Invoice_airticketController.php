<?php

namespace App\Http\Controllers;

use App\Invoice_airticket;
use App\Airline;
use App\Customer;
use App\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\MessageBag;
class Invoice_airticketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoice_airtickets = Invoice_airticket::paginate(15);
        return view('invoice_airticket.index',[ 'invoices' => $invoice_airtickets ]);
    }

    public function auto_airline(Request $request)
    {
        $all = $request->all();
        if(!empty($all['code'])){    
            $code = substr($all['code'], 0, 4);    
            $airline = Airline::select('name','id')
            ->where('code' , 'LIKE', $code.'%')
            ->where('status', '=', '1')
            ->limit(5)
            ->get(); 
            if(!empty($airline[0])){
                return $airline[0]['id'].'|'.$airline[0]['name'];
            }
        }  
    }

    public function auto_supplier(REquest $request)
    {
        $all            = $request->all();
        $html           = '<div class="list-group bg-white"><ul class="mdb-autocomplete-wrap">';
            $supplier_name  = $all['supplier_name'];
            if(!empty($supplier_name)){
                $query_supplier = Supplier::select('name_en','id')
                ->where('name_en','LIKE', $supplier_name.'%')
                ->where('status', '=', '1')
                ->limit(5)
                ->get();
                if(!empty($query_supplier[0])){
                    foreach($query_supplier as $supplier){
                        $html .= '<li supplier_id="'.$supplier->id.'" class="supplier list-group-item list-group-item-action" id="acceptSupplier">'.$supplier->name_en.'</li>';
                    }                    
                }
            }
        $html .= '<ul>';  
        return $html;
       
        
    }

    public function auto_customer(Request $request)
    {
        $all  = $request->all();
        $html = '<div class="list-group bg-white"><ul class="mdb-autocomplete-wrap">';
            if(!empty($all['name'])){        
                $customers = Customer::select('name_kh','name_en','id')->where('name_en' , 'LIKE', $all['name'].'%')->get(); 
                
                if(!empty($customers[0])){
                    foreach($customers as $customer){
                        $html .= '<li name_kh= "'.$customer->name_kh.'" customer_id="'.$customer->id.'" class="customer list-group-item list-group-item-action" id="acceptCustomer">'.$customer->name_en.'</li>';
                    }                    
                }
            }
        $html .= '<ul>';  
        return $html;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Invoice_airticket  $invoice_airticket
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice_airticket $invoice_airticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Invoice_airticket  $invoice_airticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice_airticket $invoice_airticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Invoice_airticket  $invoice_airticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice_airticket $invoice_airticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Invoice_airticket  $invoice_airticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice_airticket $invoice_airticket)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Invoice_airticket;
use App\Airline;
use App\Customer;
use App\CustomerList;
use App\Supplier;
use App\CompanyProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\MessageBag;
class Invoice_airticketController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoice_airtickets = Invoice_airticket::paginate(15);
        $company_profile = CompanyProfile::select('exchange_kh')->get();
        $airline = Airline::all();
        return view('invoice_airticket.index',[ 'invoices' => $invoice_airtickets, 'airlines' => $airline,'company_profile' => $company_profile ]);
    }

    public function auto_airline(Request $request)
    {
        $all = $request->all();
        $json = '[]';
        if(!empty($all['name'])){
            $airline = Airline::select('name','id')
            ->where('name', 'LIKE', $all['name'].'%')
            ->where('status', '=', '1')
            ->limit(5)
            ->get();
            if(!$airline->isEmpty()){
                $json = $airline->toJson();   
            }
        }
        
        return $json;
    }
    public function auto_ticket(Request $request)
    {
        $all = $request->all();
        $json = '[]';
        if(!empty($all['name'])){    
            $code = substr($all['name'], 0, 3);    
            $airline = Airline::select('name','id')
            ->where('code' , 'LIKE', $code.'%')
            ->where('status', '=', '1')
            ->limit(1)
            ->get(); 
            if(!$airline->isEmpty()){
                $json = $airline->toJson();
            }
        }  
        return $json;
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
        $json = '[]';

            if(!empty($all['name'])){        
                $customers = Customer::where('name_en' , 'LIKE', $all['name'].'%')->with('contacts')->get();          
                // check query not empty
                if(!$customers->isEmpty()){
                    $json      = $customers->toJson();                
                }
            }
        return $json;   
       

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

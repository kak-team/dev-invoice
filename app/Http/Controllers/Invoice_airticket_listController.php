<?php

namespace App\Http\Controllers;

use App\Invoice_airticket_list;
use App\Invoice;
use App\Airline;
use App\Customer;
use App\CustomerList;
use App\Supplier;
use App\CompanyProfile;
use App\PaymentMethod;
use App\Customer_contacts;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

class Invoice_airticket_listController extends Controller
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
        
        $invoice = Invoice::where('service_id','=','1')
        ->with('customers', 'contacts')
        ->paginate(15);
        //dd($invoice);
        $company_profile    = CompanyProfile::select('exchange_kh')->get();
        $airline            = Airline::all();
        //dd($invoice['customers']);
        $payment_method     = PaymentMethod::all()->where('status','=','1');
        
        return view('invoice_airticket_list.index',[ 
            'invoices'          => $invoice, 
            'airlines'          => $airline,
            'company_profile'   => $company_profile,
            'payment_methods'    => $payment_method 
        ]);
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

    public function form_edit(Request $request)
    {
        $id                 = $request->id;
        $payment_method     = PaymentMethod::all()->where('status','=','1');
       
        $invoice = Invoice::find($id)->with('customers','contacts', 'airticket_list')->get();
        //dd($invoice[0]->customer_id);
        $contacts           = Customer_contacts::all()->where('customer_id','=',$invoice[0]->customer_id);
        
        
        //print_r($invoice);
        // dd($invoice);
        return view('invoice_airticket_list.edit',['invoices'=>$invoice,'payment_methods'=>$payment_method,'contacts'=>$contacts]);
    }

    public function auto_supplier(Request $request)
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
        
        //dd($request->all());
        // user id
        $user_id = auth()->user()->id;
        
        
       

        // invoice id
        $number = Invoice::count();
        $number = str_pad($number+1, 6, '0', STR_PAD_LEFT);
        
        $invoice_number = date('Y').'-'.$number;
        
       
       // dd($request->all());

        // created_date        
        $created_date = date('Y-m-d h:i:s');
        
        // issue date
        $time = date('h:i:s');
        $issue_date = $request->invoice_date.' '.$time;

        // status 
        if($request->amount_total > $request->deposit_total):
            $status = 'unpaid';
        else:
            $status = 'paid';
        endif;

        if(isset($request->grouping)):
            $grouping = 1;
        else: 
            $grouping = 0;
        endif;

        $ctn_invoice = [
            'user_id'           => $user_id,
            'customer_id'       => $request->customer_id,
            'contact_person_id' => $request->contact_person,
            'contact_phone'     => $request->phone,
            'supplier_id'       => $request->supplier_id,
            'service_id'        => 1, // service (airticket)
            'invoice_number'    => $invoice_number,
            'total_amount'      => $request->amount_total,
            'vat_value'         => $request->vat_value,
            'exchange_riel'     => $request->exchange_riel,
            'routing'           => $request->routing,
            'groupping'         => $grouping,
            'description'       => $request->description,
            'issue_date'        => $issue_date,
            'created_at'        => $created_date,
            'status'            => $status,
        ];

        

        


        
        // insert invoice
        $insert_invoice =\App\Invoice::create($ctn_invoice);

        $data_payment = [
            'user_id'           => $user_id,
            'invoice_id'        => $insert_invoice->id,
            'payment_method_id' => $request->payment_method,
            'price'             => $request->deposit_total,
            'description'       => '',
            'issue_date'        => $issue_date,
            'created_at'        => $created_date,
        ];

        for ($i = 0; $i < count($request->n_p); $i++) {
            $data_airticket_list[] = [
                'invoice_id'        => $insert_invoice->id,
                'net_price'         => $request->n_p[$i],
                'airline_id'        => $request->airline_id[$i],
                'ticket_number'     => $request->ticket_no[$i],
                'passanger_name'    => $request->guest_name[$i],
                'passanger_type'    => $request->type[$i],
                'quantity'          => $request->qty[$i],
                'price'             => $request->price[$i],
                'service_fee'       => $request->service_fee[$i],
                'vat'               => $request->vat[$i],
                'service_fee_vat'   => $request->servicefee_vat[$i],
            ];
        }   

        // insert invoice_income
        if($request->payment_method != 0){
            \App\Invoice_income::create($data_payment);
        }
        
        // insert invoice_airticket_list
        \App\Invoice_airticket_list::insert($data_airticket_list);

        return redirect()->back()->withSuccess('IT WORKS!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Invoice_airticket  $invoice_airticket
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Invoice_airticket  $invoice_airticket
     * @return \Illuminate\Http\Response
     */
    public function edit()
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
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Invoice_airticket  $invoice_airticket
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }
}

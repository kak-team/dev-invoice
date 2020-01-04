<?php

namespace App\Http\Controllers;


use App\Invoice_airticket_list;
use App\Invoice;
use App\Invoice_income;
use App\Airline;
use App\Customer;
use App\CustomerList;
use App\Supplier;
use App\CompanyProfile;
use App\CompanyAddress;
use App\PaymentMethod;
use App\Customer_contacts;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

class InvoiceController extends Controller
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
    
        $route              = explode('.',\Request::route()->getName());
        $company_profile    = CompanyProfile::select('exchange_kh')->get();
        $airline            = Airline::all();
        $payment_method     = PaymentMethod::all()->where('status','=','1');
        $user_status = auth()->user()->status;

        //invoice_airticket_list
        if($route[0] == 'invoice_airticket_list'):
            if($user_status == 'vat'):
                $invoice = Invoice::where('service_id',1)
                ->where('status_invoice','active')
                ->where('status_vat','vat')
                ->orderBy('id','desc')
                ->with('customers', 'contacts','invoice_incomes')->paginate(15);
            else:
                $invoice = Invoice::where('service_id',1)
                ->where('status_invoice','active')
                ->orderBy('id','desc')
                ->with('customers', 'contacts','invoice_incomes')->paginate(15);
            endif;    
                
                return view('invoice.index',[ 
                    'user_status'       => $user_status,
                    'invoices'          => $invoice, 
                    'airlines'          => $airline,
                    'company_profile'   => $company_profile,
                    'payment_methods'   => $payment_method 
                ]);
            
        elseif($route[0] == 'invoice_hotel_list'):

        endif;
    }

    

// -----------------------------------------------------------------------------------

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

// -----------------------------------------------------------------------------------

    public function form_create_invoice(Request $request)
    {
        $user_status        = auth()->user()->status;
        $link               = $request->link;
        $payment_method     = PaymentMethod::all()->where('status','=','1'); 
        $passenger_type     = array('Adult','Child','Infant'); 
        $company_profile    = CompanyProfile::select('exchange_kh')->get();

        
        return view('invoice.create_'.$link,[
            'user_status'       => $user_status,
            'vat'               => $request->invoice_type,
            'payment_methods'   => $payment_method,
            'company_profile'   => $company_profile,
            'passenger_types'   => $passenger_type
        ]);
    }

    public function form_edit_invoice(Request $request)
    {
        $link               = $request->link;
        $id                 = $request->id;
        $payment_method     = PaymentMethod::all()->where('status','=','1'); 
        $passenger_type     = array('Adult','Child','Infant');   
        if($link == 'invoice_airticket_list'):   
            $invoice  = Invoice::where('id','=',$id)->with('customers','invoice_incomes','airticket_list.airline_code','contacts','suppliers', 'airticket_list')->get();
        endif;
        $contacts = Customer_contacts::all()->where('customer_id','=',$invoice[0]->customer_id);
        
        return view('invoice.edit_'.$link,[
            'invoices'          => $invoice,
            'payment_methods'   => $payment_method,
            'contacts'          => $contacts,
            'passenger_types'   => $passenger_type
        ]);
    }

    public function form_payment(Request $request)
    {
        //dd($request->all());
        $amount = $request->amount;
        $payment_history = Invoice_income::with('payment_method')->where('invoice_id','=',$request->id)->get();
        $payment_method  = PaymentMethod::all();
        $data = [
            'payments_history' => $payment_history,
            'payment_method'   => $payment_method,
            'amount'           => $amount,
            'id'               => $request->id
        ];
        //dd($data);
        return view('invoice.payment', $data);
    }

    public function form_edit_payment(Request $request)
    {
        //dd($request->all());
        $payment_history = Invoice_income::where('id',$request->id)->get();
        $payment_method  = PaymentMethod::all();
        $data  = [
            'payments_history' => $payment_history,
            'payment_method'   => $payment_method,
            'payment_list_id'  => $request->id
        ];
        //dd($data);
        return view('invoice.edit_payment', $data);
    }

    public function form_delete_payment(Request $request)
    {
        $payment_list_id = $request->id;
        return view('invoice.delete_payment',['payment_list_id' => $payment_list_id]);
    }

    public function form_cancel_invoice(Request $request)
    {
        $id = $request->id;
        return view('invoice.cancel_invoice',['id'=>$id]);
    }

    public function cancel_invoice(Request $request)
    {
        //dd($request->all());
        $data = [
            'status_invoice' => 'cancel',
            'cancel_description' => $request->description
        ];
        Invoice::where('id',$request->id)->update($data);
        return redirect()->back()->withSuccess('IT WORKS!');

    }

    public function print(Request $request)
    {
        //dd($request->all());
        //$company = CompanyProfile::all()->with('CompanyEmail','CompanyPhone','CompanyAddress');
        // dd($company);
        $companyprofile = CompanyProfile::with('company_address','company_email','company_phone')->get();
        // dd($companyprofile);
        $data = [
            'company' => $companyprofile,
        ];
        return view('invoice.print', $data);
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

  
    public function store_invoice(Request $request)
    {
        
        // user id
        $user_id = auth()->user()->id;
        
        // invoice id
        $number = Invoice::count();
        $number = str_pad($number+1, 6, '0', STR_PAD_LEFT);
        
        $invoice_number = date('Y').'-'.$number;
        
       
        //dd($request->all());

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
            'service_fee_price' => $request->servicefee_price,
            'vat_percent'       => $request->vat_value,
            'exchange_riel'     => $request->exchange_riel,
            'routing'           => $request->routing,
            'groupping'         => $grouping,
            'description'       => $request->description,
            'issue_date'        => $issue_date,
            'created_at'        => $created_date,
            'status_payment'    => $status,
            'status_invoice'    => 'active',
            'status_vat'        => 'vat'
        ];

        // insert invoice
        $insert_invoice =\App\Invoice::create($ctn_invoice);

        $data_payment = [
            'user_id'           => $user_id,
            'invoice_id'        => $insert_invoice->id,
            'payment_method_id' => $request->payment_method,
            'previous_balance'  => $request->amount_total,
            'new_payment'       => $request->deposit_total,
            'current_balance'   => ($request->amount_total - $request->deposit_total),
            'description'       => '',
            'issue_date'        => $issue_date,
            'created_at'        => $created_date,
        ];

        for ($i = 0; $i < count($request->n_p); $i++) {
            $data[] = [
                'invoice_id'        => $insert_invoice->id,
                'net_price'         => $request->n_p[$i],
                'airline_id'        => $request->airline_id[$i],
                'ticket_number'     => $request->ticket_no[$i],
                'passanger_name'    => $request->guest_name[$i],
                'passanger_type'    => $request->type[$i],
                'quantity'          => $request->qty[$i],
                'price'             => $request->price[$i],
            ];
        }   

        // insert invoice_income
        if($request->payment_method > 0){
            \App\Invoice_income::create($data_payment);
        }
        
        // insert invoice
        \App\Invoice::insert($data);

        return redirect()->back()->withSuccess('IT WORKS!');

    }

    public function store_payment(Request $request)
    {
        // user id
        $user_id     = auth()->user()->id;
        $time        = date('h:i:s');
        $issue_date  = $request->payment_date.' '.$time;
        $create_date = date('Y-m-d h:i:s');
        //dd($request->all());
        $data = [
            'user_id'           => $user_id,
            'invoice_id'        => $request->invoice_id,
            'payment_method_id' => $request->payment_method,
            'new_payment'       => $request->payment_price,
            'description'       => $request->description,
            'issue_date'        => $issue_date,
            'created_at'        => $create_date,
            'status'            => $request->payment_status
        ];
        
        Invoice_income::create($data);
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
        // user id
        $user_id = auth()->user()->id;

        // groupping
        if(isset($request->e_grouping)):
            $grouping = 1;
        else: 
            $grouping = 0;
        endif;

        // issue date
        $time = date('h:i:s');
        $issue_date = $request->invoice_date.' '.$time;
        //dd($grouping);
        //dd($request->all());

        // data invoice
        $ctn_invoice = [
            'customer_id'       => $request->customer_id,
            'contact_person_id' => $request->contact_person,
            'contact_phone'     => $request->phone,
            'supplier_id'       => $request->supplier_id,
            'total_amount'      => $request->amount_total,
            'service_fee_price' => $request->servicefee_price,
            'routing'           => $request->routing,
            'groupping'         => $grouping,
            'description'       => $request->description,
            'issue_date'        => $issue_date,
        ];
        
        Invoice::where('id',$request->id)->update($ctn_invoice);

         //dd($request->all());

        // data update invovice-list-airticket
        for ($i = 0; $i < count($request->e_n_p); $i++) {
            $data_update = [
                'net_price'         => $request->e_n_p[$i],
                'airline_id'        => $request->e_airline_id[$i],
                'ticket_number'     => $request->e_ticket_no[$i],
                'passanger_name'    => $request->e_guest_name[$i],
                'passanger_type'    => $request->e_type[$i],
                'quantity'          => $request->e_qty[$i],
                'price'             => $request->e_price[$i],
            ];

            Invoice::where('id', $request->invoice_list_id[$i])->update($data_update);
          
        }  
        
        // data insert invoice-list-airticket
        if(!empty($request->n_p)):
            for ($i = 0; $i < count($request->n_p); $i++) {
                $data_insert[]= [
                    'invoice_id'        => $request->id,
                    'net_price'         => $request->n_p[$i],
                    'airline_id'        => $request->airline_id[$i],
                    'ticket_number'     => $request->ticket_no[$i],
                    'passanger_name'    => $request->guest_name[$i],
                    'passanger_type'    => $request->type[$i],
                    'quantity'          => $request->qty[$i],
                    'price'             => $request->price[$i],
                ];
            }   
            if(!empty($request->n_p)):
                Invoice::insert($data_insert);
            endif;
        endif;

        return redirect()->back()->withSuccess('IT WORKS!');
    }

    public function update_payment(Request $request)
    {

       $time            = date('h:i:s');
       $issue_date      = $request->payment_date.' '.$time;
       $new_payment     = $request->payment_price;
       
       $data = [
           'payment_method_id' => $request->payment_method,
           'new_payment'       => $new_payment,
           'description'       => $request->payment_description,
           'issue_date'        => $issue_date,
           'status'            => $request->payment_status
       ];

       $invoice_income = Invoice_income::where('id',$request->payment_list_id)->update($data);
       return redirect()->back()->withSuccess('IT WORKS!');
    }

    public function delete_payment(Request $request)
    {   
        // update status-payment in invoice
        $invoice_income = Invoice_income::where('id',$request->payment_list_id)->get(); 
        Invoice::where('id',$invoice_income[0]->invoice_id)->update(['status_payment' => 'deposit']);
        Invoice_income::where('id',$request->payment_list_id)->delete();
        return redirect()->back()->withSuccess('IT WORKS!');
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

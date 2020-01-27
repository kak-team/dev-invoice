<?php

namespace App\Http\Controllers;



use App\Invoice;
use App\Invoice_income;
use App\Invoice_airticket_list;
use App\Invoice_visa;
use App\Invoice_visa_list;
use App\Invoice_insurance;
use App\Invoice_insurance_list;
use App\Invoice_transportation;
use App\Invoice_transportation_list;
use App\Invoice_hotel;
use App\Invoice_hotel_list;
use App\Invoice_tour;
use App\Invoice_tour_list;
use App\Invoice_other_list;
use App\Airline;
use App\Customer;
use App\CustomerList;
use App\Supplier;
use App\CompanyProfile;
use App\CompanyAddress;
use App\PaymentMethod;
use App\Customer_contacts;
use App\Transportation;
use App\Hotel;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

class InvoiceController extends Controller
{
    protected $route;
    public function __construct()
    {
        $this->middleware('auth');
        return $this->route = explode('.',\Request::route()->getName());
    }
    
    public function index()
    {
        $company_profile    = CompanyProfile::select('exchange_kh')->get();
        $airline            = Airline::all();
        $payment_method     = PaymentMethod::all()->where('status','=','1');
        $user_status        = auth()->user()->status;
        
        //invoice_airticket_list
        if($this->route[0] == 'invoice_airticket_list'):
            if($user_status == 'no_vat'):
                $invoice = Invoice::where('service_id',1)
                ->where('status_invoice','active')
                
                ->orderBy('id','desc')
                ->with('customers', 'contacts','invoice_incomes')->paginate(15); 
            else:
                $invoice = Invoice::where('service_id',1)
                ->where('status_invoice','active')
                ->where('status_vat', 'vat')
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
            
        
        // invoice_visa_list
        elseif($this->route[0] == 'invoice_visa_list'):
            if($user_status == 'no_vat'):
                $invoice = Invoice::where('service_id',2)
                ->where('status_invoice','active')
                ->orderBy('id','desc')
                ->with('customers', 'contacts','invoice_incomes')->paginate(5);
            else: 
                $invoice = Invoice::where('service_id',2)
                ->where('status_invoice','active')
                ->where('status_vat', 'vat')
                ->orderBy('id','desc')
                ->with('customers', 'contacts','invoice_incomes')->paginate(5);
            endif;
            return view('invoice.index',[ 
                'user_status'       => $user_status,
                'invoices'          => $invoice, 
                'airlines'          => $airline,
                'company_profile'   => $company_profile,
                'payment_methods'   => $payment_method 
            ]);
        
        // invoice_insurance_list
        elseif($this->route[0] == 'invoice_insurance_list'):
            if($user_status == 'no_vat'):
                $invoice = Invoice::where('service_id',3)
                ->where('status_invoice','active')
                ->orderBy('id','desc')
                ->with('customers', 'contacts','invoice_incomes')->paginate(15);
            else:
                $invoice = Invoice::where('service_id',3)
                ->where('status_invoice','active')
                ->where('status_vat', 'vat')
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
        
        // invoice_transportation_list
        elseif($this->route[0] == 'invoice_transportation_list'):
            if($user_status == 'no_vat'):
                $invoice = Invoice::where('service_id',4)            
                ->where('status_invoice','active')
                ->orderBy('id','desc')
                ->with('customers', 'contacts','invoice_incomes')->paginate(15);
            else:
                $invoice = Invoice::where('service_id',4)            
                ->where('status_invoice','active')
                ->where('status_vat', 'vat')
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
        
        // invoice_hotel_list
        elseif($this->route[0] == 'invoice_hotel_list'):
            if($user_status == 'no_vat'):
                $invoice = Invoice::where('service_id',5)
                    ->where('status_invoice','active')
                    ->orderBy('id','desc')
                    ->with('customers', 'contacts','invoice_incomes')->paginate(15);
            else:
                $invoice = Invoice::where('service_id',5)
                    ->where('status_invoice','active')
                    ->where('status_vat', 'vat')
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
        // invoice_tuour_list
        elseif($this->route[0] == 'invoice_tour_list'):
            if($user_status == 'no_vat'):
                $invoice = Invoice::where('service_id',6)
                ->where('status_invoice','active')
                ->orderBy('id','desc')
                ->with('customers', 'contacts','invoice_incomes')->paginate(15);
            else:
                $invoice = Invoice::where('service_id',6)
                ->where('status_invoice','active')
                ->where('status_vat', 'vat')
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

        // invoice_other_list
        elseif($this->route[0] == 'invoice_other_list'):
            if($user_status == 'no_vat'):
                $invoice = Invoice::where('service_id',7)
                    ->where('status_invoice','active')
                    ->where('status_vat', 'vat')
                    ->orderBy('id','desc')
                    ->with('customers', 'contacts','invoice_incomes')->paginate(15);
            // dd($invoice);
            else:
                $invoice = Invoice::where('service_id',7)
                    ->where('status_invoice','active')
                    ->orderBy('id','desc')
                    ->with('customers', 'contacts','invoice_incomes')->paginate(15);
            endif;
            return view('invoice.index',[ 
                'user_status'       => $user_status,
                'invoices'          => $invoice,                 
                'company_profile'   => $company_profile,
                'payment_methods'   => $payment_method 
            ]);        
        endif;
    }

// Autocomplete -----------------------------------------------------------------------------------

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
    public function auto_supplier(Request $request)
    {
        $link           = array(
            'invoice_airticket_list' => 1,
            'invoice_visa_list' => 2,
            'invoice_insurance_list' => 3,
            'invoice_transportation_list' => 4,
            'invoice_hotel_list' => 5,
            'invoice_tour_list' => 6,
            'invoice_other_list' => 7
        );
        $html           = '<div class="list-group bg-white"><ul class="mdb-autocomplete-wrap">';        
        
        if(array_key_exists($request->link,$link)):          
            if(!empty($request->supplier_name)){
                $query_supplier = Supplier::select('name_en','id')
                ->where('name_en','LIKE', $request->supplier_name.'%')
                ->where('service_id', 'LIKE', '%'.$link[$request->link].'%')
                ->where('status', '=', '1')
                ->limit(5)
                ->get();
                if(!empty($query_supplier[0])){
                    foreach($query_supplier as $supplier){
                        $html .= '<li supplier_id="'.$supplier->id.'"  class="supplier list-group-item list-group-item-action" id="acceptSupplier">'.$supplier->name_en.'</li>';
                    }                    
                }
            }
        endif;
        $html .= '</ul>';  
        return $html;
       
        
    }
    public function auto_transportation(Request $request)
    {
         $transportations = Transportation::where('supplier_id',$request->supplier_id)->get();
         echo '<table class="table border table-create table-bordered">';
         foreach($transportations AS $transportation):
            $car_type = json_decode($transportation->car_type);
            $car = array();
            foreach($car_type AS $a):
                foreach($a AS $b):
                    echo'   
                    <tr>
                        <td>
                            <input type="hidden" class="custom-control-input Bchk" id="'.$b.'" name="car_type[]" value="'.$b.'">'.$b.'
                        </td>                      
                        <td class="text-center">                                
                            <div class="md-form m-0">
                                <input type="number" name="total_car[]" value="0" class="form-control m-0" required placeholder="..." autocomplete="off"></span>
                            </div>
                        </td>
                    </tr>
                    ';
                endforeach;
            endforeach;
         endforeach;
         echo '</table>';
         //dd($transportation[0]->supplier_transportation);
        // echo 1;
    }
    public function auto_hotel(Request $request)
    {
         $hotels = Hotel::where('supplier_id',$request->supplier_id)->get();
         echo '<table class="table border table-create table-bordered">';
         foreach($hotels AS $hotel):
            $room_type = json_decode($hotel->room_type);
            $room = array();
            foreach($room_type AS $a):
                foreach($a AS $b):
                    echo'
                    <tr>
                        <td class="text-nowrap">
                            <input type="hidden" class="custom-control-input Bchk" id="'.$b.'" name="room_type[]" value="'.$b.'">'.$b.'
                        </td>                      
                        <td class="text-center">                                
                            <div class="md-form m-0">
                                <input type="number" name="total_room[]" value="0" class="form-control m-0" required placeholder="..." autocomplete="off"></span>
                            </div>
                        </td>
                    </tr>
                    ';
                endforeach;
            endforeach;
         endforeach;
         echo '</table>';
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

// Invoice -----------------------------------------------------------------------------------

    public function form_create_invoice(Request $request)
    {
        $user_status        = auth()->user()->status;
        $payment_method     = PaymentMethod::all()->where('status','=','1'); 
        $passenger_type     = array('Adult','Child','Infant'); 
        $company_profile    = CompanyProfile::select('exchange_kh')->get();

        //dd($request->all());
        return view($request->link.'.create',[
            'user_status'       => $user_status,
            'vat'               => $request->invoice_type,
            'payment_methods'   => $payment_method,
            'company_profile'   => $company_profile,
            'passenger_types'   => $passenger_type
        ]);
    }
    public function form_edit_invoice(Request $request)
    {
        $id                 = $request->id;
        $payment_method     = PaymentMethod::all()->where('status','=','1'); 
        $passenger_type     = array('Adult','Child','Infant'); 
          
        if($request->link == 'invoice_airticket_list'):   
            $invoice  = Invoice::where('id','=',$id)->with('customers','invoice_incomes','airticket_list.airline_code','contacts','suppliers', 'airticket_list')->get();
        
        elseif($request->link == 'invoice_visa_list'):
            $invoice  = Invoice::where('id','=',$id)
            ->with('customers','invoice_incomes','contacts','suppliers', 'visa_list', 'visa')->get();
        elseif($request->link == 'invoice_insurance_list'):
            $invoice  = Invoice::where('id','=',$id)
            ->with('customers','invoice_incomes','contacts','suppliers', 'insurance_list', 'insurance')->get();
        elseif($request->link == 'invoice_transportation_list'):
            $invoice  = Invoice::where('id','=',$id)
            ->with('customers','invoice_incomes','contacts','suppliers','suppliers.supplier_transportation', 'transportation_list', 'transportation','suppliers.supplier_transportation')->get();
        elseif($request->link == 'invoice_hotel_list'):
            $invoice  = Invoice::where('id','=',$id)
            ->with('customers','invoice_incomes','contacts','suppliers','suppliers.supplier_hotel', 'hotel_list', 'hotel','suppliers.supplier_transportation')->get();       
        elseif($request->link == 'invoice_tour_list'):
            $invoice  = Invoice::where('id','=',$id)
            ->with('customers','invoice_incomes','contacts','suppliers','tour_list', 'tour')->get();       
        elseif($request->link == 'invoice_other_list'):
                $invoice  = Invoice::where('id','=',$id)
                ->with('customers','invoice_incomes','contacts','suppliers','other_list')->get();       
    
        endif;

        $contacts = Customer_contacts::all()->where('customer_id','=',$invoice[0]->customer_id);
        
        return view($request->link.'.edit',[
            'invoices'          => $invoice,
            'payment_methods'   => $payment_method,
            'contacts'          => $contacts,
            'passenger_types'   => $passenger_type
        ]);
    }
    
    public function form_cancel_invoice(Request $request)
    {
        $id = $request->id;
        return view('invoice.cancel_invoice',['id'=>$id]);
    }

    public function form_print_invoice(Request $request)
    {
        $id             = $request->id;
        $variable       = str_replace('invoice_','',$request->link);
        $obj            = str_replace('_list','',$variable);
        $method         = ($obj == 'other' || $obj == 'airticket' ? 'general' : $obj );
        
        $companyprofile = CompanyProfile::with('company_address','company_email','company_phone')->get(); 
        $invoice        = Invoice::where('id','=',$id)
        ->with('customers','invoice_incomes','contacts','customers.contacts','suppliers',
        $variable, $method ,'issue_by')->get();         
        $data           = [
            'company' => $companyprofile,
            'invoice' => $invoice,
            'variable' => $variable,
            'obj'       => $obj
        ];
        //  dd($invoice);
        return view('invoice.print_invoice', $data);
    }

// Payment -----------------------------------------------------------------------------------

    public function table_payment(Request $request)
    {
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
        return view('invoice.table_payment', $data);
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
        //dd($request->all());
        $payment_list_id = $request->id;
        return view('invoice.delete_payment',['payment_list_id' => $payment_list_id]);
    }

// Execute -----------------------------------------------------------------------------------

    // invoice
    public function exe_form_create_invoice(Request $request)
    {
        
        // user id
        $user_id = auth()->user()->id;
        
        // invoice id
        if($request->status_vat == 'vat'):
            $number = Invoice::where('status_vat','vat')->count();
        else:
            $number = Invoice::where('status_vat','no_vat')->count();
        endif;
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
            'service_id'        => $request->service_id,
            'invoice_number'    => $invoice_number,
            'total_amount'      => $request->amount_total,
            'service_fee_price' => $request->servicefee_price,
            'vat_percent'       => $request->vat_value,
            'exchange_riel'     => $request->exchange_riel,
            'routing'           => (isset($request->routing) ? $request->routing : '' ),
            'groupping'         => $grouping,
            'description'       => $request->description,
            'issue_date'        => $issue_date,
            'created_at'        => $created_date,
            'status_payment'    => $status,
            'status_invoice'    => 'active',
            'status_vat'        => $request->status_vat
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
            'description'       => $request->description,
            'issue_date'        => $issue_date,
            'created_at'        => $created_date,
        ];

        // insert invoice_income
        if($request->payment_method > 0){
            \App\Invoice_income::create($data_payment);
        }

        
         // invoice_airticket_list
        if($request->route == 'invoice_airticket_list'){
            for ($i = 0; $i < count($request->n_p); $i++) {
                $data[] = [
                    'invoice_id'        => $insert_invoice->id,
                    'net_price'         => (!empty($request->n_p[$i]) ? $request->n_p[$i] : 0),
                    'airline_id'        => $request->airline_id[$i],
                    'ticket_number'     => $request->ticket_no[$i],
                    'passanger_name'    => $request->guest_name[$i],
                    'passanger_type'    => $request->type[$i],
                    'quantity'          => $request->qty[$i],
                    'price'             => $request->price[$i],
                ];
            }   
            \App\Invoice_airticket_list::insert($data);
        }
        // invoice_visa_list
        elseif($request->route == 'invoice_visa_list'){

            $data_visa = [
                'invoice_id'        =>$insert_invoice->id,
                'application_date'  =>$request->application_date,
                'pickup_date'       =>$request->pick_date
            ];

            Invoice_visa::create($data_visa);

            for ($i = 0; $i < count($request->n_p); $i++) {
                $data_visa_list[] = [
                    'invoice_id'        => $insert_invoice->id,
                    'net_price'         => (!empty($request->n_p[$i]) ? $request->n_p[$i] : 0),
                    'full_name'         => $request->full_name[$i],
                    'nationality'       => $request->nationality[$i],
                    'passport_number'   => $request->passport_number[$i],
                    'quantity'          => $request->qty[$i],
                    'price'             => $request->price[$i],
                ];
            }   
            Invoice_visa_list::insert($data_visa_list);
        }
        // invoice_insurance_list
        elseif($request->route == 'invoice_insurance_list'){
            $data_insurance = [
                'invoice_id' =>$insert_invoice->id,
                'from_date'  =>$request->from_date,
                'to_date'    =>$request->to_date
            ];

            Invoice_insurance::create($data_insurance);

            for ($i = 0; $i < count($request->n_p); $i++) {
                $data_insurance_list[] = [
                    'invoice_id'        => $insert_invoice->id,
                    'net_price'         => (!empty($request->n_p[$i]) ? $request->n_p[$i] : 0),
                    'full_name'         => $request->full_name[$i],
                    'quantity'          => $request->qty[$i],
                    'price'             => $request->price[$i],
                ];
            }   
            Invoice_insurance_list::insert($data_insurance_list);
        }
        // invoice_transportation_list
        elseif($request->route == 'invoice_transportation_list'){
            //dd($request->all());
            if(!empty($request->car_type)):
                $b = array();
                foreach($request->total_car as $key => $a):         
                    $b[] = $request->car_type[$key].'-'.$a;                        
                endforeach;
                $b = implode(',',$b);
            else:
                $b = '';
            endif;
           
            $total_car = array_sum($request->total_car);
            $data_transportation = [
                'invoice_id' =>$insert_invoice->id,
                'from_date'  =>$request->from_date,
                'to_date'    =>$request->to_date,
                'total_car'  =>$total_car,
                'car_type'   =>$b
            ];

             Invoice_transportation::create($data_transportation);
            for ($i = 0; $i < count($request->n_p); $i++) {
                $data_transportation_list[] = [
                    'invoice_id'        => $insert_invoice->id,
                    'net_price'         => (!empty($request->n_p[$i]) ? $request->n_p[$i] : 0),
                    'full_name'         => $request->full_name[$i],
                    'quantity'          => $request->qty[$i],
                    'price'             => $request->price[$i],
                ];
            }   
            Invoice_transportation_list::insert($data_transportation_list);

        }
        // invoice_hotel_list
        elseif($request->route == 'invoice_hotel_list'){
            
            //dd($request->all());
            if(!empty($request->room_type)):
                $b = array();
                foreach($request->total_room as $key => $a):         
                    $b[] = $request->room_type[$key].'-'.$a;                        
                endforeach;
                $b = implode(',',$b);
            else:
                $b = '';
            endif;
            
            $total_room = array_sum($request->total_room);
            $data_hotel = [
                'invoice_id'    =>$insert_invoice->id,
                'checking_date' =>$request->checking_date,
                'checkout_date' =>$request->checkout_date,
                'total_room'    =>$total_room,
                'room_type'     =>$b
            ];

            Invoice_hotel::create($data_hotel);
            for ($i = 0; $i < count($request->n_p); $i++) {
                $data_hotel_list[] = [
                    'invoice_id'        => $insert_invoice->id,
                    'net_price'         => (!empty($request->n_p[$i]) ? $request->n_p[$i] : 0),
                    'full_name'         => $request->full_name[$i],
                    'quantity'          => $request->qty[$i],
                    'price'             => $request->price[$i],
                ];
            }   
            Invoice_hotel_list::insert($data_hotel_list);

        }
        // invoice_tour_list
        elseif($request->route == 'invoice_tour_list'){
           
            $data_tour = [
                'invoice_id' => $insert_invoice->id,
                'from_date'  => $request->from_date,
                'to_date'    => $request->to_date,
                'tour_code'  => $request->tour_code,
            ];

            Invoice_tour::create($data_tour);
            for ($i = 0; $i < count($request->n_p); $i++) {
                $data_tour_list[] = [
                    'invoice_id'        => $insert_invoice->id,
                    'net_price'         => (!empty($request->n_p[$i]) ? $request->n_p[$i] : 0),
                    'full_name'         => $request->full_name[$i],
                    'type'              => $request->type[$i],
                    'quantity'          => $request->qty[$i],
                    'price'             => $request->price[$i],
                ];
            }   
            Invoice_tour_list::insert($data_tour_list);

        }

        // invoice_tour_list
        elseif($request->route == 'invoice_other_list'){
    
            for ($i = 0; $i < count($request->n_p); $i++) {
                $data_other_list[] = [
                    'invoice_id'        => $insert_invoice->id,
                    'net_price'         => (!empty($request->n_p[$i]) ? $request->n_p[$i] : 0),
                    'full_name'         => $request->full_name[$i],
                    'service_for'       => $request->service_for[$i],
                    'quantity'          => $request->qty[$i],
                    'price'             => $request->price[$i],
                ];
            }   
            Invoice_other_list::insert($data_other_list);

        }
        
        
        

        return redirect()->back()->withSuccess('IT WORKS!');

    }
    public function exe_form_edit_invoice(Request $request)
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
      ;

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

        if($request->route == 'invoice_airticket_list'){

            // data update invovice-list-airticket
            for ($i = 0; $i < count($request->e_n_p); $i++) {
                $data_update = [
                    'net_price'         => (!empty($request->e_n_p[$i]) ? $request->e_n_p[$i] : 0),
                    'airline_id'        => $request->e_airline_id[$i],
                    'ticket_number'     => $request->e_ticket_no[$i],
                    'passanger_name'    => $request->e_guest_name[$i],
                    'passanger_type'    => $request->e_type[$i],
                    'quantity'          => $request->e_qty[$i],
                    'price'             => $request->e_price[$i],
                ];
                Invoice_airticket_list::where('id', $request->invoice_list_id[$i])->update($data_update);
            } 
            // data insert invoice-list-airticket
            if(!empty($request->n_p)):
                for ($i = 0; $i < count($request->n_p); $i++) {
                    $data_insert[]= [
                        'invoice_id'        => $request->id,
                        'net_price'         => (!empty($request->n_p[$i]) ? $request->n_p[$i] : 0),
                        'airline_id'        => $request->airline_id[$i],
                        'ticket_number'     => $request->ticket_no[$i],
                        'passanger_name'    => $request->guest_name[$i],
                        'passanger_type'    => $request->type[$i],
                        'quantity'          => $request->qty[$i],
                        'price'             => $request->price[$i],
                    ];
                }   
                if(!empty($request->n_p)):
                    Invoice_airticket_list::insert($data_insert);
                endif;
            endif;

        }
        elseif($request->route == 'invoice_visa_list'){

            // update sale_visa
            $data_visa = [
                'application_date'  =>$request->application_date,
                'pickup_date'       =>$request->pick_date
            ];
            Invoice_visa::where('invoice_id',$request->id)->update($data_visa);

            // data update invoice-visa-list
            for ($i = 0; $i < count($request->e_n_p); $i++):
                $e_data_visa_list = [
                    'net_price'         => (!empty($request->e_n_p[$i]) ? $request->e_n_p[$i] : 0),
                    'full_name'         => $request->e_full_name[$i],
                    'nationality'       => $request->e_nationality[$i],
                    'passport_number'   => $request->e_passport_number[$i],
                    'quantity'          => $request->e_qty[$i],
                    'price'             => $request->e_price[$i],
                ];
                Invoice_visa_list::where('id', $request->visa_list_id[$i])->update($e_data_visa_list);

            endfor;
            // data insert invoice-visa-list
            if(!empty($request->n_p)):
                for ($i = 0; $i < count($request->n_p); $i++) {
                    $data_visa_list[] = [
                        'invoice_id'        => $request->id,
                        'net_price'         => (!empty($request->n_p[$i]) ? $request->n_p[$i] : 0),
                        'full_name'         => $request->full_name[$i],
                        'nationality'       => $request->nationality[$i],
                        'passport_number'   => $request->passport_number[$i],
                        'quantity'          => $request->qty[$i],
                        'price'             => $request->price[$i],
                    ];
                }   
                Invoice_visa_list::insert($data_visa_list);
            endif;
            
        }
        elseif($request->route == 'invoice_insurance_list'){

                // update sale_insurance
                $data_insurance = [
                    'from_date'  =>$request->from_date,
                    'to_date'    =>$request->to_date
                ];
                Invoice_insurance::where('invoice_id',$request->id)->update($data_insurance);
    
                // data update invoice-insurance-list
                for ($i = 0; $i < count($request->e_n_p); $i++):
                    $e_data_insurance_list = [
                        'net_price'         => $request->e_n_p[$i],
                        'full_name'         => $request->e_full_name[$i],
                        'quantity'          => $request->e_qty[$i],
                        'price'             => $request->e_price[$i],
                    ];
                    Invoice_insurance_list::where('id', $request->insurance_list_id[$i])->update($e_data_insurance_list);
    
                endfor;
                // data insert invoice-insurance-list
                if(!empty($request->n_p)):
                    for ($i = 0; $i < count($request->n_p); $i++) {
                        $data_insurance_list[] = [
                            'invoice_id'        => $request->id,
                            'net_price'         => (!empty($request->n_p[$i]) ? $request->n_p[$i] : 0),
                            'full_name'         => $request->full_name[$i],
                            'quantity'          => $request->qty[$i],
                            'price'             => $request->price[$i],
                        ];
                    }   
                    Invoice_insurance_list::insert($data_insurance_list);
                endif;
               
        }
        elseif($request->route == 'invoice_transportation_list'){

            if(!empty($request->car_type)):
                $b = array();
                foreach($request->total_car as $key => $a):         
                    $b[] = $request->car_type[$key].'-'.$a;                        
                endforeach;
                $b = implode(',',$b);
            else:
                $b = '';
            endif;

            $total_car = array_sum($request->total_car);
           
            // update sale_transportation
            $data_transportation = [
                'from_date'  =>$request->from_date,
                'to_date'    =>$request->to_date,
                'total_car'  =>$total_car,
                'car_type'   =>$b

            ];
           
            Invoice_transportation::where('invoice_id',$request->id)->update($data_transportation);

            // data update invoice-transportation-list
            for ($i = 0; $i < count($request->e_n_p); $i++):
                $e_data_transportation_list = [
                    'net_price'         => $request->e_n_p[$i],
                    'full_name'         => $request->e_full_name[$i],
                    'quantity'          => $request->e_qty[$i],
                    'price'             => $request->e_price[$i],
                ];
                Invoice_transportation_list::where('id', $request->transportation_list_id[$i])->update($e_data_transportation_list);

            endfor;
            // data insert invoice-transportation-list
            if(!empty($request->n_p)):
                for ($i = 0; $i < count($request->n_p); $i++) {
                    $data_transportation_list[] = [
                        'invoice_id'        => $request->id,
                        'net_price'         => (!empty($request->n_p[$i]) ? $request->n_p[$i] : 0),
                        'full_name'         => $request->full_name[$i],
                        'quantity'          => $request->qty[$i],
                        'price'             => $request->price[$i],
                    ];
                }   
            Invoice_transportation_list::insert($data_transportation_list);
            endif;
           
        }
        elseif($request->route == 'invoice_hotel_list'){

            if(!empty($request->room_type)):
                $b = array();
                foreach($request->total_room as $key => $a):         
                    $b[] = $request->room_type[$key].'-'.$a;                        
                endforeach;
                $b = implode(',',$b);
            else:
                $b = '';
            endif;

            $total_room = array_sum($request->total_room);
           
            // update sale_hotel
            $data_hotel = [
                'checking_date' =>$request->checking_date,
                'checkout_date' =>$request->checkout_date,
                'total_room'    =>$total_room,
                'room_type'     =>$b

            ];
           
            Invoice_hotel::where('invoice_id',$request->id)->update($data_hotel);

            // data update invoice-hotel-list
            for ($i = 0; $i < count($request->e_n_p); $i++):
                $e_data_hotel_list = [
                    'net_price'         => $request->e_n_p[$i],
                    'full_name'         => $request->e_full_name[$i],
                    'quantity'          => $request->e_qty[$i],
                    'price'             => $request->e_price[$i],
                ];
                Invoice_hotel_list::where('id', $request->hotel_list_id[$i])->update($e_data_hotel_list);

            endfor;
            // data insert invoice-hotel-list
            if(!empty($request->n_p)):
                for ($i = 0; $i < count($request->n_p); $i++) {
                    $data_hotel_list[] = [
                        'invoice_id'        => $request->id,
                        'net_price'         => (!empty($request->n_p[$i]) ? $request->n_p[$i] : 0),
                        'full_name'         => $request->full_name[$i],
                        'quantity'          => $request->qty[$i],
                        'price'             => $request->price[$i],
                    ];
                }   
            Invoice_hotel_list::insert($data_hotel_list);
            endif;
           
        }
        elseif($request->route == 'invoice_tour_list'){

           
            // update sale_tour
            $data_tour = [
                'from_date' => $request->e_from_date,
                'to_date'   => $request->e_to_date,
                'tour_Code' => $request->e_tour_code,
            ];
           
            Invoice_tour::where('invoice_id',$request->id)->update($data_tour);

            // data update invoice-tour-list
            for ($i = 0; $i < count($request->e_n_p); $i++):
                $e_data_tour_list = [
                    'net_price'         => $request->e_n_p[$i],
                    'full_name'         => $request->e_full_name[$i],
                    'type'              => $request->e_type[$i],
                    'quantity'          => $request->e_qty[$i],
                    'price'             => $request->e_price[$i],
                ];
                Invoice_tour_list::where('id', $request->tour_list_id[$i])->update($e_data_tour_list);

            endfor;
            // data insert invoice-tour-list
            if(!empty($request->n_p)):
                for ($i = 0; $i < count($request->n_p); $i++) {
                    $data_tour_list[] = [
                        'invoice_id'        => $request->id,
                        'net_price'         => (!empty($request->n_p[$i]) ? $request->n_p[$i] : 0),
                        'full_name'         => $request->full_name[$i],
                        'type'              => $request->type[$i],
                        'quantity'          => $request->qty[$i],
                        'price'             => $request->price[$i],
                    ];
                }   
            Invoice_tour_list::insert($data_tour_list);
            endif;
           
        }
        elseif($request->route == 'invoice_other_list'){

            // data update invoice-tour-list
            for ($i = 0; $i < count($request->e_n_p); $i++):
                $e_data_other_list = [
                    'net_price'         => $request->e_n_p[$i],
                    'full_name'         => $request->e_full_name[$i],
                    'service_for'       => $request->e_service_for[$i],
                    'quantity'          => $request->e_qty[$i],
                    'price'             => $request->e_price[$i],
                ];
                Invoice_other_list::where('id', $request->other_list_id[$i])->update($e_data_other_list);

            endfor;
            // data insert invoice-other-list
            if(!empty($request->n_p)):
                for ($i = 0; $i < count($request->n_p); $i++) {
                    $data_other_list[] = [
                        'invoice_id'        => $request->id,
                        'net_price'         => (!empty($request->n_p[$i]) ? $request->n_p[$i] : 0),
                        'full_name'         => $request->full_name[$i],
                        'service_for'       => $request->service_for[$i],
                        'quantity'          => $request->qty[$i],
                        'price'             => $request->price[$i],
                    ];
                }   
            Invoice_other_list::insert($data_other_list);
            endif;
           
        }

        
        

        return redirect()->back()->withSuccess('IT WORKS!');
    }
    public function exe_form_cancel_invoice(Request $request)
    {
        //dd($request->all());
        $data = [
            'status_invoice' => 'cancel',
            'cancel_description' => $request->description
        ];
        Invoice::where('id',$request->id)->update($data);
        return redirect()->back()->withSuccess('IT WORKS!');

    }
    // payment
    public function exe_form_create_payment(Request $request)
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
            'status'            => ( !empty($request->payment_status) ? $request->payment_status : 'N/A')
        ];
        
        Invoice_income::create($data);
        return redirect()->back()->withSuccess('IT WORKS!');
    }
    public function exe_form_edit_payment(Request $request)
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
    public function exe_form_delete_payment(Request $request)
    {   
        // update status-payment in invoice
        $invoice_income = Invoice_income::where('id',$request->payment_list_id)->get(); 
        Invoice::where('id',$invoice_income[0]->invoice_id)->update(['status_payment' => 'deposit']);
        Invoice_income::where('id',$request->payment_list_id)->delete();
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

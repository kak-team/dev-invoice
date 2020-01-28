<?php

namespace App\Http\Controllers;

use App\Report;
use App\Service;
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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service = Service::all();
        $invoice = Invoice::limit(100)->get();
        $data = [
            'services' => $service,
            'invoice' => $invoice
        ];
        return view('report.index',$data);
    }

    public function auto_filter(Request $request)
    {
        $from_date = $request->from_date;
        $to_date   = $request->to_date;
        $service   = explode(',',$request->service);
        $status    = explode(',',$request->status);
        
        if($request->statuscancel == 'cancel'):
            $invoice_status = 'cancel';
        else:
            $invoice_status = 'active';
        endif;
        

        //dd($request->service);
        if(!empty($request->service)): 
            $invoice = Invoice::whereBetween('issue_date',[$from_date,$to_date])
            ->where('status_invoice',$invoice_status)
            ->whereIn('service_id', $service)            
            ->with('suppliers','customers','service_type','issue_by','invoice_incomes')
            ->get();
        else:
            $invoice = Invoice::whereBetween('issue_date',[$from_date,$to_date])
            ->where('status_invoice',$invoice_status)
            ->with('suppliers','customers','service_type','issue_by','invoice_incomes')
            ->get();
        endif;
       //dd($invoice);


       if (!empty($invoice[0]->id)):
            foreach($invoice as $value){
                $amount         = $value->total_amount;
                $total_payment  = $value->invoice_incomes->sum('new_payment');

                // Compare invoice status ( Paid & Unpaid )
                if($total_payment == $value->total_amount):
                    $invoice_income_status = 'paid';
                else:
                    $invoice_income_status = 'unpaid';                
                endif;
                
                    if(!empty($status) && in_array($invoice_income_status,$status)):
                        echo '<tr>';
                            echo '<td>'.date('d-m-Y',strtotime($value->issue_date)).'</td>';
                            echo '<td>'.$value->invoice_number.'</td>';
                            echo '<td>'.$value->suppliers->name_en.'</td>';
                            echo '<td>'.$value->service_type[0]->name.'</td>';
                            echo '<td>'.$value->customers->name_en.'</td>';
                            echo '<td>$'.$amount.'.00</td>';
                            echo '<td>'.$value->issue_by->name.'</td>';
                            echo '<td>';
                                if($invoice_income_status == 'paid'):
                                    echo  '<button class="btn bg-success legitRipple btn-sm badge">PAID</button>';
                                else:
                                    echo '<button class="btn bg-orange legitRipple btn-sm badge">UNPAID</button>';
                                endif;
                            echo '</td>';
                            echo '<td>'.($value->status_invoice == 'active' ? $value->status_invoice : '<span class="badge bg-danger" >Cancel</span>' ).'</td>';
                            echo '<td>
                                        <button type="button" link="invoice_'.$value->service_type[0]->name.'_list" class="btn btn-outline bg-teal-400 border-teal-400 text-teal-800 btn-icon rounded-round legitRipple mr-1 waves-effect waves-light" data-toggle="modal" data-target="#modalOne" id="btn-print" value="'.$value->id.'">
                                    <i class="icon-printer2"></i>
                                </button></td>';
                        echo '</tr>';
                    endif;

                    if(empty($request->status)):
                        echo '<tr>';
                            echo '<td>'.date('d-m-Y',strtotime($value->issue_date)).'</td>';
                            echo '<td>'.$value->invoice_number.'</td>';
                            echo '<td>'.$value->suppliers->name_en.'</td>';
                            echo '<td>'.$value->service_type[0]->name.'</td>';
                            echo '<td>'.$value->customers->name_en.'</td>';
                            echo '<td>$'.$amount.'.00</td>';
                            echo '<td>'.$value->issue_by->name.'</td>';
                            echo '<td>';
                                if($invoice_income_status == 'paid'):
                                    echo  '<button class="btn bg-success legitRipple btn-sm badge">PAID</button>';
                                else:
                                    echo '<button class="btn bg-orange legitRipple btn-sm badge">UNPAID</button>';
                                endif;
                            echo '</td>';
                            echo '<td>'.($value->status_invoice == 'active' ? $value->status_invoice : '<span class="badge bg-danger" >Cancel</span>' ).'</td>';
                            echo '<td>
                                        <button type="button" link="invoice_'.$value->service_type[0]->name.'_list" class="btn btn-outline bg-teal-400 border-teal-400 text-teal-800 btn-icon rounded-round legitRipple mr-1 waves-effect waves-light" data-toggle="modal" data-target="#modalOne" id="btn-print" value="'.$value->id.'">
                                    <i class="icon-printer2"></i>
                                </button></td>';
                        echo '</tr>';
                    endif;
                
            }
        else:
            echo '<tr>
                    <td colspan="10" class="text-center">Recent Invoice...</td>
                </tr>';
        endif;

    }

    public function auto_inovoice_number(Request $request)
    {
        $invoice = Invoice::where('invoice_number',$request->value)
            ->with('suppliers','customers','service_type','issue_by','invoice_incomes')
            ->get();
            if (!empty($invoice[0]->id)):
                foreach($invoice as $value){
                    $amount         = $value->total_amount;
                    $total_payment  = $value->invoice_incomes->sum('new_payment');
        
                    // Compare invoice status ( Paid & Unpaid )
                    if($total_payment == $value->total_amount):
                        $invoice_income_status = 'paid';
                    else:
                        $invoice_income_status = 'unpaid';                
                    endif;
                    
                    echo '<tr>';
                        echo '<td>'.date('d-m-Y',strtotime($value->issue_date)).'</td>';
                        echo '<td>'.$value->invoice_number.'</td>';
                        echo '<td>'.$value->suppliers->name_en.'</td>';
                        echo '<td>'.$value->service_type[0]->name.'</td>';
                        echo '<td>'.$value->customers->name_en.'</td>';
                        echo '<td>$'.$amount.'.00</td>';
                        echo '<td>'.$value->issue_by->name.'</td>';
                        echo '<td>';
                            if($invoice_income_status == 'paid'):
                                echo  '<button class="btn bg-success legitRipple btn-sm badge">PAID</button>';
                            else:
                                echo '<button class="btn bg-orange legitRipple btn-sm badge">UNPAID</button>';
                            endif;
                        echo '</td>';
                        echo '<td>'.($value->status_invoice == 'active' ? $value->status_invoice : '<span class="badge bg-danger" >Cancel</span>' ).'</td>';
                        echo '<td>
                                <button type="button" link="invoice_'.$value->service_type[0]->name.'_list" class="btn btn-outline bg-teal-400 border-teal-400 text-teal-800 btn-icon rounded-round legitRipple mr-1 waves-effect waves-light" data-toggle="modal" data-target="#modalOne" id="btn-print" value="'.$value->id.'">
                            <i class="icon-printer2"></i>
                        </button></td>';
                    echo '</tr>';           
                }
            else:
                echo '<tr>
                        <td colspan="10" class="text-center">Recent Invoice...</td>
                    </tr>';
            endif;
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

    public function auto_inovoice_by_cusomter(Request $request)
    {
        $invoice = Invoice::where('customer_id',$request->customer_id)
            ->with('suppliers','customers','service_type','issue_by','invoice_incomes')
            ->get();
            if (!empty($invoice[0]->id)):
                foreach($invoice as $value){
                    $amount         = $value->total_amount;
                    $total_payment  = $value->invoice_incomes->sum('new_payment');
        
                    // Compare invoice status ( Paid & Unpaid )
                    if($total_payment == $value->total_amount):
                        $invoice_income_status = 'paid';
                    else:
                        $invoice_income_status = 'unpaid';                
                    endif;
                    
                    echo '<tr>';
                        echo '<td>'.date('d-m-Y',strtotime($value->issue_date)).'</td>';
                        echo '<td>'.$value->invoice_number.'</td>';
                        echo '<td>'.$value->suppliers->name_en.'</td>';
                        echo '<td>'.$value->service_type[0]->name.'</td>';
                        echo '<td>'.$value->customers->name_en.'</td>';
                        echo '<td>$'.$amount.'.00</td>';
                        echo '<td>'.$value->issue_by->name.'</td>';
                        echo '<td>';
                            if($invoice_income_status == 'paid'):
                                echo  '<button class="btn bg-success legitRipple btn-sm badge">PAID</button>';
                            else:
                                echo '<button class="btn bg-orange legitRipple btn-sm badge">UNPAID</button>';
                            endif;
                        echo '</td>';
                        echo '<td>'.($value->status_invoice == 'active' ? $value->status_invoice : '<span class="badge bg-danger" >Cancel</span>' ).'</td>';
                        echo '<td>
                                <button type="button" link="invoice_'.$value->service_type[0]->name.'_list" class="btn btn-outline bg-teal-400 border-teal-400 text-teal-800 btn-icon rounded-round legitRipple mr-1 waves-effect waves-light" data-toggle="modal" data-target="#modalOne" id="btn-print" value="'.$value->id.'">
                            <i class="icon-printer2"></i>
                        </button></td>';
                    echo '</tr>';           
                }
            else:
                echo '<tr>
                        <td colspan="10" class="text-center">Recent Invoice...</td>
                    </tr>';
            endif;
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
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        //
    }
}

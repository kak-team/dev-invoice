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
        $data = [
            'services' => $service
        ];
        return view('report.index',$data);
    }

    public function auto_filter(Request $request)
    {
        $from_date = $request->from_date;
        $to_date   = $request->to_date;
        $service   = explode(',',$request->service);
        $invoice = Invoice::whereBetween('issue_date',[$from_date,$to_date])
        ->whereIn('service_id',$service)
        ->with('suppliers','customers','service_type','issue_by')
        ->get();
       //dd($invoice);
        foreach($invoice as $value){
            echo '<tr>';
                echo '<td>'.$value->issue_date.'</td>';
                echo '<td>'.$value->invoice_number.'</td>';
                echo '<td>'.$value->suppliers->name_en.'</td>';
                echo '<td>'.$value->service_type[0]->name.'</td>';
                echo '<td>'.$value->customers->name_en.'</td>';
                echo '<td>'.$value->total_amount.'</td>';
                echo '<td></td>';
                echo '<td>'.$value->issue_by->name.'</td>';
                echo '<td>'.($value->status_invoice == 'active' ? $value->status_invoice : '<span class="badge bg-danger" >Cancel</span>' ).'</td>';
                
            echo '</tr>';
        }

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

<?php

namespace App\Http\Controllers;

use App\Invoice_expense;
use App\PaymentMethod;
use App\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Invoice_expenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expense = Invoice_expense::with('invoice','invoice.service_type')->orderBy('id','DESC')->paginate(10);
        $payment_method = PaymentMethod::all();
        $data = [
            'values'=>$expense,
            'payment_method' => $payment_method
        ];
        return view('invoice_expense.index', $data);
    }

    public function form_create()
    {
        $payment_method = PaymentMethod::all();
        $data = [
            'payment_method' => $payment_method
        ];
        return view('invoice_expense.create',$data);
    }

    public function auto_invoice_number(Request $request)
    {
        
        $invoice_number = $request->invoice_number;
        $invoice_list   = array('n/a','airticket_list','visa_list','insurance_list','transportation_list','hotel_list','tour_list','other_list');
        $invoice_head   = array('n/a','airticket','visa','insurance','transportation','hotel','tour','other');
        if(auth()->user()->status == 'vat'):
            $invoice  = Invoice::where('invoice_number', $invoice_number)
            ->where('status_invoice','active')
            ->where('status_vat','vat')
            ->with('suppliers','expense','transportation','hotel','service_type','airticket_list','visa_list','insurance_list','transportation_list','hotel_list','tour_list','other_list')->get();
        else:
            $invoice  = Invoice::where('invoice_number', $invoice_number)
            ->where('status_invoice','active')
            ->with('suppliers','expense','transportation','hotel','service_type','airticket_list','visa_list','insurance_list','transportation_list','hotel_list','tour_list','other_list')->get();
        endif;

        if(!$invoice->isEmpty()){
            $list                  = $invoice_list[$invoice[0]->service_id];
            $head                  = $invoice_head[$invoice[0]->service_id];
            $total_vat             = ($invoice[0]->service_fee_price*$invoice[0]->$list->count('id'))/$invoice[0]->vat_percent;
            $total_expense_vat     = $invoice[0]->total_amount - $invoice[0]->service_fee_price - $total_vat;
            $total_expense_no_vat  = $invoice[0]->total_amount - $invoice[0]->$list->sum('net_price');

           
            if(auth()->user()->status == 'vat'): 
                $span_invoice_exspense = $total_expense_vat;
            else:
                $span_invoice_exspense = $total_expense_no_vat;
            endif;
            $data = [
                'span_supplier_name'     => ($invoice[0]->supplier_id == 0 ? $invoice[0]->$head->supplier_name : $invoice[0]->suppliers->name_en),
                'span_invoice_type'      => $invoice[0]->service_type[0]->name,
                'span_invoice_amount'    => number_format($invoice[0]->total_amount,2),
                'span_invoice_serviceFee'=> number_format($invoice[0]->service_fee_price,2),
                'span_invoice_totalVat'  => number_format($total_vat,2),
                'span_invoice_exspense'  => number_format($span_invoice_exspense,2),
                'span_invoice_date'      => date('d/M/Y',strtotime($invoice[0]->issue_date)),
                'value_exspense_vat'     => $total_expense_vat,
                'value_exspense_no_vat'  => $total_expense_no_vat,
                'alert'                  => ($invoice[0]->expense != null ? 'This invoice already pay to supplier' : 'This invoice not yet clear to supplier')
            ];

           
        }
        else{
            $data = array();
        }
       
        return json_encode($data);
    }

    public function form_delete(Reqeust $request)
    {
        return view('invoice_expense.delete');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $invoice = Invoice::where('invoice_number',$request->invoice_number)->get();
        if(!$invoice->isEmpty()){

            $user_id = auth()->user()->id;
            $time = date('h:i:s');
            $issue_date = $request->collect_date.' '.$time;
            $created_at = date('Y-m-d h:i:s');
            $updated_at = date('Y-m-d h:i:s');
            //dd($request->all());
            $data = [
                'invoice_id'         => $invoice[0]->id,
                'user_id'            => $user_id,
                'invoice_expense_id' => $request->expense_invoice_number,
                'exspense_price_vat'     => $request->value_exspense_vat,
                'exspense_price_no_vat'  => $request->value_exspense_no_vat,
                'collect_by'         => $request->collect_by,
                'payment_method'     => $request->payment_method,
                'issue_date'         => $issue_date,
                'description'        => (!empty($request->description) ? $request->description : '') ,
                'created_at'         => $created_at,
                'updated_at'         => $updated_at
            ];
            Invoice_expense::insert($data);
            return redirect()->back()->withSuccess('IT WORKS!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Invoice_expense  $invoice_expense
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice_expense $invoice_expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Invoice_expense  $invoice_expense
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice_expense $invoice_expense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Invoice_expense  $invoice_expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice_expense $invoice_expense)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Invoice_expense  $invoice_expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice_expense $invoice_expense)
    {
        //
    }
}

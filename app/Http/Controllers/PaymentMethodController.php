<?php

namespace App\Http\Controllers;

use App\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentMethodController extends Controller
{
    public function __contruct()
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
        //list all payment method
        $paymentmethod = PaymentMethod::where('status','!=', 2)            
                    ->paginate(10);

        $data = [
            'values' => $paymentmethod
        ];
        
        return view('paymentmethod.index', $data);
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
        // user id
        $user = auth()->user();

        //Insert Payment Method
        if(!empty($request->paymentmethod_name)){
            for ($i = 0; $i < count($request->paymentmethod_name); $i++) {
                $data_key[] = [
                    'user_id'       => $user->id,
                    'name'          => $request->paymentmethod_name[$i],
                    'description'   => $request->paymentmethod_description[$i],
                    'status'        => 1
                ];
            } 

            PaymentMethod::insert($data_key);
        }
        return redirect()->back()->withSuccess('IT WORKS!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PaymentMethod  $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentMethod $paymentMethod)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PaymentMethod  $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function edit(PaymentMethod $paymentMethod)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PaymentMethod  $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // Update payment
        // user id
        $user = auth()->user();

        $id = $request->id;
        
        $data = [
                'user_id'       => $user->id,
                'name'          => $request->paymentmethod_name,
                'description'   => $request->paymentmethod_description,
                ];

        //update customer         
        PaymentMethod::where('id', $id)->update($data);

        return redirect()->back()->withSuccess('IT WORKS!');
    }

    // Update Status
    public function ajax($id)
    {
        $status = DB::statement(" UPDATE ctn_payment_method AS A SET A.status = IF(A.status = 1, 0, 1) WHERE id = $id ");
        echo 'success';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PaymentMethod  $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        // Delete Airline
        $id = $request->id;
        DB::statement("UPDATE ctn_payment_method SET status = 2 WHERE id IN ($id) ");
        return redirect()->back()->withSuccess('IT WORKS!');
    }
}

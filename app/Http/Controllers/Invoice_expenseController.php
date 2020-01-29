<?php

namespace App\Http\Controllers;

use App\Invoice_expense;
use Illuminate\Http\Request;

class Invoice_expenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('invoice_expense.index');
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

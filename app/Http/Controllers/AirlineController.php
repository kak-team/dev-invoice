<?php

namespace App\Http\Controllers;

use App\Airline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AirlineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //list all airline
        $airline = DB::table('ctn_airline_name')->paginate(10);
        $data = array(
            'values' => $airline
        );
        
        return view('airline.index', $data);

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
     * @param  \App\Airline  $airline
     * @return \Illuminate\Http\Response
     */
    public function show(Airline $airline)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Airline  $airline
     * @return \Illuminate\Http\Response
     */
    public function edit(Airline $airline)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Airline  $airline
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Airline $airline)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Airline  $airline
     * @return \Illuminate\Http\Response
     */
    public function destroy(Airline $airline)
    {
        //
    }
}

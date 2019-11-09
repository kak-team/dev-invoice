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
        $airline = DB::table('ctn_airline_name')
                    ->where('status','!=', 2)            
                    ->paginate(10);
                    
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
        // user id
        $user = auth()->user();

        // dd($request->airline_code);
        // exit();
        
        //Insert Airline Code
        if(!empty($request->airline_code)){
            for ($i = 0; $i < count($request->airline_code); $i++) {
                $data_key[] = [
                    'user_id'  => $user->id,
                    'name'     => $request->airline_name[$i],
                    'code'     => $request->airline_code[$i],
                ];
            } 

            \App\Airline::insert($data_key);
        }
        return redirect()->back()->withSuccess('IT WORKS!');

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
    public function update(Request $request)
    {
        //
        // user id
        $user = auth()->user();

        $id = $request->id;
        
        $data = [
                'user_id'  => $user->id,
                'name'     => $request->airline_name,
                'code'     => $request->airline_code,
                ];

        //update customer         
        DB::table('ctn_airline_name')->where('id', $id)->update($data);

        return redirect()->back()->withSuccess('IT WORKS!');
    }

    public function ajax($id)
    {
        $status = DB::statement(" UPDATE ctn_airline_name AS A SET A.status = IF(A.status = 1, 0, 1) WHERE id = $id ");
        echo 'success';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Airline  $airline
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        // Delete Airline
        $id = $request->id;
        DB::statement("UPDATE ctn_airline_name SET status = 2 WHERE id IN ($id) ");
        return redirect()->back()->withSuccess('IT WORKS!');
    }
}

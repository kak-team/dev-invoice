<?php

namespace App\Http\Controllers;

use App\Supplier;
use App\SupplierList;
use DB;

use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //list all suppliers 
        $supplier = \App\Supplier::all();

        return view('supplier.create', ['suppliers', $supplier]);
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
        //insert data to table
        $user = auth()->user();
        print_r($user);
        $data = [
                'user_id'=>$user->id,
                'supplier_name'=>$request->supplier_name,
                'register_number'=>$request->register_number,
                'website'=>$request->website,
                'address'=>$request->address
                ];

        $data_contact= ['supplier_id'=>'',
                        'full_name'=>$request->full_name,
                        'email'=>$request->email,
                        'phone'=>$request->phone,
                        ];   

        DB::table(ctn_supplier)->insert($data);
        DB::table(ctn_supplier_contact)->insert($data_contact);

        return back();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $supplier = DB::table('ctn_supplier')->select('*')
                        ->where('id', $id)->get();

        return view('supplier.create', ['suplier', $supplier]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = ['supplier_name'=>$request->supplier_name,
                'register_number'=>$request->register_number,
                'website'=>$request->website,
                'address'=>$request->address
                ];

        $data_contact= ['supplier_id'=>'',
                        'full_name'=>$request->full_name,
                        'email'=>$request->email,
                        'phone'=>$request->phone,
                        ];   
        DB::table('ctn_supplier')
            ->where('id', $id)
            ->update($data);

        DB::table('ctn_supplier_contact')
            ->where('id', $id)
            ->update($data_contact);    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

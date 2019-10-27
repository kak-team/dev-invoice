<?php

namespace App\Http\Controllers;

use App\Supplier;
use App\Service;
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
        $service = \App\Service::all();
        $supplier = DB::table('ctn_supplier')
            ->join('ctn_supplier_contact', 'ctn_supplier_contact.supplier_id', '=', 'ctn_supplier.id')
            ->select('ctn_supplier.*')
            ->get();
        $data = array(
            'suppliers'=>$supplier,
            'services'=> $service,
        );    

        return view('supplier.index', $data);
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
        
        // check Empty Checkbox Services
        if(is_null($request->service_id)):
            $service_id = '';
        else:            
            $service_id = '['.implode(',',$request->service_id).']';
        endif;

        $this->validate($request, [
            'supplier_name' => 'required|max:255',
            'address' => 'required|max:255'
        ]);
               
        
        $data = [
                'user_id'           => $user->id,
                'service_id'        => $service_id,
                'supplier_name'     => $request->name,
                'register_number'   => $request->register_number,
                'website'           => $request->website,
                'address'           => $request->address
                ];
        $insert_supplier = \App\Supplier::create($data);
        
        
        for ($i = 0; $i < count($request->fullname); $i++) {
            $data_key[] = [
                'supplier_id'   => $insert_supplier->id,
                'full_name'     => $request->fullname[$i],
                'email'         => $request->c_email[$i],
                'phone'         => $request->c_phone[$i],
            ];
        }     
        \App\Supplier_contacts::insert($data_key);
        
        return redirect()->back()->withSuccess('IT WORKS!');
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
        $supplier = DB::table('ctn_supplier')->where('id', $id)->first();
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

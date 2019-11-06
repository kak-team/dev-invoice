<?php

namespace App\Http\Controllers;

use App\Supplier;
use App\Service;
use App\SupplierList;
use App\Hotel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

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
        $supplier = DB::table('ctn_supplier AS A')
        ->select('A.*', 'B.full_name', 'B.phone')             
        ->leftJoin('ctn_supplier_contact AS B','B.supplier_id', '=', 'A.id')
        ->where('A.status', '!=', '2')
        ->groupBy('A.id')
        ->paginate(10);
        
        $data = array(
            'suppliers'=>$supplier,
            'services'=> $service,
        );    

        return view('supplier.index', $data);
    }



    public function ajax($id)
    {
        $status = DB::statement(" UPDATE ctn_supplier AS A SET A.status = IF(A.status = 1, 0, 1) WHERE id = $id ");
        echo 'success';
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

        // insert to suppier contact
        \App\Supplier_contacts::insert($data_key);

        // insert to hotel supplier
    
        if(in_array('5',$request->service_id)){
            $data_hotel = [
                'supplier_id' => $insert_supplier->id,
                'description' => '',
                'star_rate'   => 0,
                'status'      => 1
            ];
            \App\Hotel::insert($data_hotel);
        }
        
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

    public function supplier_contact($id){

        $supplier_contacts = DB::table('ctn_supplier_contact')
                ->where('supplier_id', $id)
                ->get();
        //dd($supplier_contacts);
        //return data contact
        foreach($supplier_contacts as $contact){
            
            echo ' 
                <tr>
                    <td>
                        <div class="form-group form-group-feedback form-group-feedback-left mb-0">
                            <input type="text" class="form-control" placeholder="Full name" name="e_fullname[]" id="fullname" required="" autocomplete="off" value="'.$contact->full_name.'">
                            <div class="form-control-feedback">
                                <i class="icon-user text-muted"></i>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="form-group form-group-feedback form-group-feedback-left mb-0">
                            <input type="text" class="form-control" placeholder="Phone" name="e_c_phone[]" id="c_phone" required="" autocomplete="off" value="'.$contact->phone.'">
                            <div class="form-control-feedback">
                                <i class="icon-phone-wave text-muted"></i>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="form-group form-group-feedback form-group-feedback-left mb-0">
                            <input type="text" class="form-control" placeholder="Contact Email" name="e_c_email[]" id="c_email" required="" autocomplete="off" value="'.$contact->email.'">
                            <div class="form-control-feedback">
                                <i class="icon-envelop4 text-muted"></i>
                            </div>                                                
                        </div>  
                    </td>
                    <td class="pb-0 pt-0 delete_oldID" id="delete" data="'.$contact->id.'">
                        <input type="hidden" name="supplier_contact_id[]" value="'.$contact->id.'"> 
                        <div class="md-form m-0 "><i class="icon-minus-circle2 text-danger" ></i></div></td>

                </tr>
            
            ';  
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       $id = $request->id;
        
       // check Empty Checkbox Services
       if(is_null($request->service_id)):
            $service_id = '';
        else:            
            $service_id = '['.implode(',',$request->service_id).']';
        endif;
            
        $data = [
                'service_id'        => $service_id,
                'supplier_name'     => $request->name,
                'register_number'   => $request->register_number,
                'website'           => $request->website,
                'address'           => $request->address
                ];

        //update supplier         
        DB::table('ctn_supplier')->where('id', $id)->update($data);

        //update supplier hotel
        if(!in_array('5',$request->service_id)){
            $data_hotel = ['status' => 0];
        }else{
            $data_hotel = ['status' => 1];
        }
            DB::table('ctn_supplier_hotel')->where('supplier_id', $id)->update($data_hotel);
        
        
        // Update Supplier contact       
        if(!empty($request->e_fullname)){     
            for ($i = 0; $i < count($request->e_fullname); $i++) {

                $data_key = [
                    'supplier_id'   => $id,
                    'full_name'     => $request->e_fullname[$i],
                    'email'         => $request->e_c_email[$i],
                    'phone'         => $request->e_c_phone[$i],
                ];
                DB::table('ctn_supplier_contact')->where('id', $request->supplier_contact_id[$i])->update($data_key);
            }
                

        }
        // Insert new Supplier contact 
        if(!empty($request->fullname)){
            for ($i = 0; $i < count($request->fullname); $i++) {

                $data_key[] = [
                    'supplier_id'   => $id, // supplier id
                    'full_name'     => $request->fullname[$i],
                    'email'         => $request->c_email[$i],
                    'phone'         => $request->c_phone[$i],
                ];
            }
            \App\Supplier_contacts::insert($data_key);
        }

        //Delete Supplier contact
        if(!empty($request->d_supplier_contact_delete)){
            DB::statement("DELETE FROM ctn_supplier_contact WHERE id IN ($request->d_supplier_contact_delete) ");           
        }

        return redirect()->back()->withSuccess('IT WORKS!');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        DB::statement("UPDATE ctn_supplier SET status = 2 WHERE id IN ($id) ");
        return redirect()->back()->withSuccess('IT WORKS!');
    }
}

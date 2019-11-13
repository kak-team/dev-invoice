<?php

namespace App\Http\Controllers;

use App\Transportation ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\MessageBag;

class TransportationController extends Controller
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
        $transportation = DB::table('ctn_supplier_transportation AS A')
        ->select('A.*', 'B.supplier_name','B.register_number','B.website','B.address','C.full_name', 'C.phone')            
        ->join('ctn_supplier AS B','B.id', '=', 'A.supplier_id')
        ->join('ctn_supplier_contact AS C', 'C.supplier_id', '=', 'B.id' )
        ->where('B.status', '!=', '2')
        ->groupBy('A.id')
        ->paginate(10);
        $data = array(
            'transportations' => $transportation
        );
        return view('transportation.index',$data);
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
     * 
     */
    public function store(Request $request)
    {
        //
    }

    public function transportation_contact($id){

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
                    <td>
                        <input type="hidden" name="supplier_contact_id[]" value="'.$contact->id.'">
                    </td>

                </tr>
            
            ';  
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\transportation  $transportation
     * @return \Illuminate\Http\Response
     */
    public function show(Transportation $transportation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\transportation  $transportation
     * @return \Illuminate\Http\Response
     */
    public function edit(Transportation $transportation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\transportation  $transportation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $supplier_id    = $request->supplier_id;
        $transportation_id       = $request->transportation_id;
        $data_supplier  = [
        'supplier_name'     => $request->name,
        'register_number'   => $request->register_number,
        'website'           => $request->website,
        'address'           => $request->address
        ];
        
        $data_transportation = [
            'star_rate'     => $request->star_rate,
            'description'   => $request->description,
            'car_type'     => $request->car_type
        ];

        //update supplier         
        DB::table('ctn_supplier')->where('id', $supplier_id)->update($data_supplier);

        //update transportation  
        DB::table('ctn_supplier_transportation')->where('supplier_id', $supplier_id)->update($data_transportation);
        
        
        // Update Supplier contact       
                
        if(!empty($request->e_fullname)){     
            for ($i = 0; $i < count($request->e_fullname); $i++) {

                $dataSupplierContact = [
                    'full_name'     => $request->e_fullname[$i],
                    'email'         => $request->e_c_email[$i],
                    'phone'         => $request->e_c_phone[$i],
                ];
                DB::table('ctn_supplier_contact')->where('id', $request->supplier_contact_id[$i])->update($dataSupplierContact);
            }
                

        }
        // Insert new Supplier contact 
        if(!empty($request->fullname)){
            for ($i = 0; $i < count($request->fullname); $i++) {

                $DT_supplierContact[] = [
                    'supplier_id'   => $supplier_id, // supplier id
                    'full_name'     => $request->fullname[$i],
                    'email'         => $request->c_email[$i],
                    'phone'         => $request->c_phone[$i],
                ];
            }
            \App\Supplier_contacts::insert($DT_supplierContact);
        }

        //Delete Supplier contact
        if(!empty($request->d_supplier_contact_delete)){
            DB::statement("DELETE FROM ctn_supplier_contact WHERE id IN ($request->d_supplier_contact_delete) ");           
        }

        return redirect()->back()->withSuccess('IT WORKS!');
    }

    public function update_status($id)
    {
        $status = DB::statement(" UPDATE ctn_supplier_transportation AS A SET A.status = IF(A.status = 1, 0, 1) WHERE id = $id ");
        echo 'success';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\transportation  $transportation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transportation $transportation)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CustomerController extends Controller
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
        /**  
        * status = 0 mean actived
        * status = 1 mean deactived
        * status = 2 mean deleted
        */
        $services = \App\Service::all();
        $customers = DB::table('ctn_customer AS A')
        ->select('A.*', 'B.full_name', 'B.phone')             
        ->leftJoin('ctn_customer_contact AS B','B.customer_id', '=', 'A.id')
        ->where('A.status', '!=', '2')
        ->groupBy('A.id')
        ->paginate(10);

        $data = array(
            'customers' => $customers,
            'services' => $services
        );

        return view('customer.index',$data);
    }

    public function ajax($id)
    {
        $status = DB::statement(" UPDATE ctn_customer AS A SET A.status = IF(A.status = 1, 0, 1) WHERE id = $id ");
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
                'customer_name'     => $request->name,
                'register_number'   => $request->register_number,
                'website'           => $request->website,
                'address'           => $request->address
                ];
        $insert_customer = \App\customer::create($data);
        
        
        for ($i = 0; $i < count($request->fullname); $i++) {
            $data_key[] = [
                'customer_id'   => $insert_customer->id,
                'full_name'     => $request->fullname[$i],
                'email'         => $request->c_email[$i],
                'phone'         => $request->c_phone[$i],
            ];
        }     
        \App\customer_contacts::insert($data_key);
        
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
        $customer = DB::table('ctn_customer')->where('id', $id)->first();
        
        return view('customer.create', ['suplier', $customer]);
    }

    public function customer_contact($id){

        $customer_contacts = DB::table('ctn_customer_contact')
                ->where('customer_id', $id)
                ->get();
        //dd($customer_contacts);
        //return data contact
        foreach($customer_contacts as $contact){
            
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
                        <input type="hidden" name="customer_contact_id[]" value="'.$contact->id.'"> 
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
                'customer_name'     => $request->name,
                'register_number'   => $request->register_number,
                'website'           => $request->website,
                'address'           => $request->address
                ];

        //update customer         
        DB::table('ctn_customer')->where('id', $id)->update($data);
        
        // Update customer contact       
        if(!empty($request->e_fullname)){     
            for ($i = 0; $i < count($request->e_fullname); $i++) {

                $data_key = [
                    'customer_id'   => $id,
                    'full_name'     => $request->e_fullname[$i],
                    'email'         => $request->e_c_email[$i],
                    'phone'         => $request->e_c_phone[$i],
                ];
                DB::table('ctn_customer_contact')->where('id', $request->customer_contact_id[$i])->update($data_key);
            }
                

        }
        // Insert new customer contact 
        if(!empty($request->fullname)){
            for ($i = 0; $i < count($request->fullname); $i++) {

                $data_cc[] = [
                    'customer_id'   => $id, // customer id
                    'full_name'     => $request->fullname[$i],
                    'email'         => $request->c_email[$i],
                    'phone'         => $request->c_phone[$i],
                ];
            }
            \App\customer_contacts::insert($data_cc);
        }

        //Delete customer contact
        if(!empty($request->d_customer_contact_delete)){
            DB::statement("DELETE FROM ctn_customer_contact WHERE id IN ($request->d_customer_contact_delete) ");           
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
        DB::statement("UPDATE ctn_customer SET status = 2 WHERE id IN ($id) ");
        return redirect()->back()->withSuccess('IT WORKS!');
    }
}

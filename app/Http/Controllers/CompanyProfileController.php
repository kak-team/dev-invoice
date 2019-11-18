<?php

namespace App\Http\Controllers;

use App\CompanyProfile;
use App\CompanyPhone;
use App\CompanyEmail;
use App\CompanyAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;


class CompanyProfileController extends Controller
{
    
    public function __construct()
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
        // View Company info
        $companyProfile = CompanyProfile::all();
        $company_email  = CompanyEmail::all();
        $company_phone  = CompanyPhone::all();
        $khcompany_address   =   CompanyAddress::all()->where('lang','kh');
        $encompany_address    =   CompanyAddress::all()->where('lang','en');
        $data = [
            'values' => $companyProfile,
            'emails'  => $company_email,
            'phones'  => $company_phone,
            'khaddress' =>   $khcompany_address,
            'enaddress' =>   $encompany_address
        ];
        
        return view('companyprofile.index', $data);

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
     * @param  \App\CompanyProfile  $companyProfile
     * @return \Illuminate\Http\Response
     */
    public function show(CompanyProfile $companyProfile )
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CompanyProfile  $companyProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(CompanyProfile $companyProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CompanyProfile  $companyProfile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // user id
        $user = auth()->user();
        $company_id =   $request->company_pro_id;
        
        
        //company info
        $khname = $request->kh_name;
        $enname = $request->en_name;
        $registration_number    =   $request->registration_number;
        $vat    =   $request->vat;
        $description =  $request->description;
       
        if($files=$request->file('images')){
            $this->validate($request, [
                'images' => 'required',
                'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);

            $name   =   $files->getClientOriginalName();
            $files->move('images', $name);
        }else{
            $logocompany   =   CompanyProfile::select('logo')->get();
            foreach($logocompany as $company){
                $name   =   $company->logo;
            }
            
        }

         //Update Company info 
         $companyinfo = [
            'register_id'  => $user->id,
            'name'     => $khname,
            'en_name'  => $enname,
            'logo'     => $name,
            'register_number'   => $registration_number,
            'vat'       => $vat,
            'description'   => $description
        ];

        CompanyProfile::where('id', $company_id)->update($companyinfo);
        
        
        //company kh address
        $house_number   =   $request->kh_house_number;
        $st_number      =   $request->kh_st_number;
        $sangkat        =   $request->kh_sangkat;
        $khan           =   $request->kh_khan;
        $city           =   $request->kh_city;

        //update company kh address
        $kh_address = [
            'user_id'               => $user->id,
            'company_profile_id'    =>  $company_id,
            'house_number'          =>   $house_number,
            'street_number'         =>   $st_number,
            'commune'               =>   $sangkat,
            'districk'               =>   $khan,
            'province'              =>   $city,
            'lang'                  =>  'kh'
        ];
        CompanyAddress::where('id', $request->khaddress_id)->update($kh_address);

        
        // company en address
        $en_house_number   =   $request->en_house_number;
        $en_st_number      =   $request->en_st_number;
        $en_sangkat        =   $request->en_sangkat;
        $en_khan           =   $request->en_khan;
        $en_city           =   $request->en_city;

        //update company en address
        $en_address = [
            'user_id'               => $user->id,
            'company_profile_id'    =>  $company_id,
            'house_number'          =>   $en_house_number,
            'street_number'         =>   $en_st_number,
            'commune'               =>   $en_sangkat,
            'districk'               =>   $en_khan,
            'province'              =>   $en_city,
            'lang'                  =>   'en'
        ];
        CompanyAddress::where('id', $request->enaddress_id)->update($en_address);

        // company email
        $email      =   $request->email;
        $nemail      =   $request->n_email;

        //Update Company email
        if(!empty($email)){
            for ($i = 0; $i < count($email); $i++) {
                $data_email = [
                    'company_id'  => $company_id,
                    'email'     => $email[$i],
                    'status'   => 1
                ];
                CompanyEmail::where("id", $request->email_id[$i])->update($data_email);
            }
        }

        //insert new email
        if(!empty($nemail)){
            for($i = 0; $i < count($nemail); $i++){
                $data_nemail[] = [
                    'company_id'  => $company_id,
                    'email'     => $nemail[$i],
                    'status'   => 1
                ];
            }
            CompanyAddress::insert($data_nemail);
        }
        
        //delete email


        // company phone
        $phone      =   $request->phone;
        $nphone     =   $request->n_email;    

        //Update Company phone
        if(!empty($phone)){
            for ($i = 0; $i < count($phone); $i++) {
                $data_phone = [
                    'company_id'  => $company_id,
                    'phone'     => $phone[$i],
                    'status'   => 1
                ];
                CompanyPhone::where('id', $request->phone_id[$i])->update($data_phone);
            } 
        }

        //insert new phone
        if(!empty($nphone)){
            for($i = 0; $i < count($nphone); $i++){
                $data_nphone[] = [
                    'company_id'  => $company_id,
                    'phone'     => $nphone[$i],
                    'status'   => 1
                ];
            }
            CompanyAddress::insert($data_nphone);
        }

        //delete phone


        return redirect()->back()->withSuccess('IT WORKS!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CompanyProfile  $companyProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompanyProfile $companyProfile)
    {
        //
    }
}

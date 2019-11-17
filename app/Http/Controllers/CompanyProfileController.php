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
        $khcompany_address   =   CompanyAddress::all()->where(['company_id'=>1 ,'lang'=>'kh']);
        $encompany_address    =   CompanyAddress::all()->where(['company_id'=>1 ,'lang'=>'en']);
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
        // user id
        $user = auth()->user();
        $company_id =   $request->company_id;

        //company info
        $khname = $request->kh_name;
        $enname = $request->en_name;
        $registration_number    =   $request->registration_number;
        $vat    =   $request->vat;
        //$logo   =   $request->file('companylogo')->store('uploads');
        
        $this->validate($request, [
            'images' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        
        $logo   =  $request->images; 
       
        if($files=$request->file('images')){

            $name   =   $files->getClientOriginalName();
            $files->move('images',$name);
        }
        // return redirect()->back()->with('message', 'Successfully Save Your Image file.');
        
        //Description
        $description    = $request->description;

        //company kh address
        $house_number   =   $request->house_number;
        $st_number      =   $request->st_number;
        $sangkat        =   $request->sangkat;
        $khan           =   $request->khan;
        $city           =   $request->city;
        
        // company en address
        $en_house_number   =   $request->en_house_number;
        $en_st_number      =   $request->en_st_number;
        $en_sangkat        =   $request->en_sangkat;
        $en_khan           =   $request->en_khan;
        $en_city           =   $request->en_city;

        // company email
        $email      =   $request->email;


        // company phone
        $phone      =   $request->phone;

        //insert data to table 
        $data = [
            'register_id'  => $user->id,
            'name'     => $khname,
            'en_name'  => $enname,
            'logo'     => $name,
            'register_number'   => $registration_number,
            'vat'       => $vat,
            'description'   => $description
        ];

        CompanyProfile::where('id', $company_id)->update($data);

        //Insert Company email
        if(!empty($email)){
            for ($i = 0; $i < count($email); $i++) {
                $data_key[] = [
                    'company_id'  => $company_id,
                    'email'     => $email[$i],
                    'status'   => 1
                ];
            }
        }     

            CompanyEmail::insert($data_key);

        //Insert Company phone
        if(!empty($phone)){
            for ($i = 0; $i < count($phone); $i++) {
                $data_key[] = [
                    'company_id'  => $company_id,
                    'phone'     => $phone[$i],
                    'status'   => 1
                ];
            } 

            CompanyPhone::insert($data_key);
        }

        //update company kh address
        $kh_address = [
            'user_id'           => $user->id,
            'company_profile_id'    =>  $company_id->id,
            'house_number'          =>   $house_number,
            'street_number'         =>   $st_number,
            'commune'               =>   $sangkat,
            'distrik'               =>   $khan,
            'province'              =>   $city,
            'lang'                =>  'kh'
        ];
        CompanyAddress::where('id', $kh_address_id)->update($kh_address);

        //update company en address
        $en_address = [
            'user_id'           => $user->id,
            'company_profile_id'    =>  $company_id->id,
            'house_number'          =>   $en_house_number,
            'street_number'         =>   $en_st_number,
            'commune'               =>   $en_sangkat,
            'distrik'               =>   $en_khan,
            'province'              =>   $en_city,
            'lang'                =>   'en'
        ];
        CompanyAddress::where('id', $en_address)->update($en_address);


        return redirect()->back()->withSuccess('IT WORKS!');

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
        //
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
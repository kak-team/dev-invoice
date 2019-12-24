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


class PrintController extends Controller
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
        
        return view('print.index', $data);

    }

    public function reciept(Request $request)
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
        
        return view('print.receipt', $data);


    }

    public function report($id){
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
        
        return view('print.report', $data);
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
        
        return view('print.header', $data);
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

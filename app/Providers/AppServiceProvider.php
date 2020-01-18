<?php

namespace App\Providers;

use App\Invoice;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\CompanyProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema; //NEW: Import Schema


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191); //NEW: Increase StringLength
        $servicelist = array('other_list','invoice_airticket_list','invoice_visa_list','invoice_insurance_list','invoice_transportation_list','invoice_hotel_list','invoice_tour_list');
        $company = CompanyProfile::select('vat')->get();
       view::share([
           'company' => $company,
           'servicelist' => $servicelist,
        ]);

        
        //total count invoice
        $invoice = Invoice::where('service_id',1)->where('status_vat','vat')->paginate(15);
        $data = [
            'total_invoice'  => 'Total Invoice',
            'service_fee'  => 'Total Service Fee',
            'tax'  => 'Total VAT',
            'invoices'  => $invoice
        ];
        View::share($data);
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\CompanyProfile;
use Illuminate\Support\Facades\Schema; //NEW: Import Schema
use Illuminate\Support\Facades\View;

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
        $company = CompanyProfile::select('vat')->get();
       view::share([
           'company' => $company,
        ]);

    }
}

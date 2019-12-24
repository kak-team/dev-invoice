<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
    //
    protected $table    = 'ctn_company_profile';
    protected $fillable = ['register_id','name', 'en_name', 'logo','register_number','vat','description'];
    public $timestamps  = false;

    public function company_email()
    {
        return $this->hasMany(CompanyEmail::class,'company_id','id');
    }
    public function company_phone()
    {
        return $this->hasMany(CompanyPhone::class,'company_id','id');
    }
    public function company_address()
    {
        return $this->hasMany(CompanyAddress::class,'company_id','id');
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
    //
    protected $table    = 'ctn_company_profile';
    protected $fillable = ['register_id','name', 'en_name', 'logo','register_number','vat','description'];
    public $timestamps  = false;
    public function CompanyEmail()
    {
        return $this->hasMany(CompanyEmail::class);
    }
    public function CompanyPhone()
    {
        return $this->hasMany(CompanyPhone::class);
    }
    public function CompanyAddress()
    {
        return $this->hasMany(CompanyAddress::class);
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
    //
    protected $table    = 'ctn_company_profile';
    protected $fillable = ['register_id','name','logo','register_number','vat','email','phone','description','create_at'];
    public $timestamps  = false;
}

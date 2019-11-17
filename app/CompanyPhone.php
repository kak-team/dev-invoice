<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyPhone extends Model
{
    //
    protected $table    = 'ctn_company_phone';
    protected $fillable = ['company_id','phone','status'];
    public $timestamps  = false;
}

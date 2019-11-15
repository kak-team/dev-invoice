<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyEmail extends Model
{
    //
    protected $table    = 'ctn_company_email';
    protected $fillable = ['company_id','email','status'];
    public $timestamps  = false;
}

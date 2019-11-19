<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyAddress extends Model
{
    //
    protected $table    = 'ctn_company_address';
    protected $fillable = ['user_id','company_id','house_number','street_number','commune', 'districk','province'];
    public $timestamps  = false;
}

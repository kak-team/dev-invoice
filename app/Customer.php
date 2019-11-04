<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table    = 'ctn_customer';
    protected $fillable = ['user_id','service_id','customer_name','register_number','website','address','status'];
    public $timestamps  = false;
}

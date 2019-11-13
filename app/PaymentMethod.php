<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    //
    //
    protected $table    = 'ctn_payment_method';
    protected $fillable = ['user_id','name','description','status'];
    public $timestamps  = false;
}

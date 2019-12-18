<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table    = 'ctn_customer';
    protected $fillable = ['user_id','name_kh','name_en','register_number','website','address','status'];
    public $timestamps  = false;

    public function contacts()
    {
        return $this->hasMany(Customer_contacts::Class);
    }
    public function invoices(){
        return $this->hasMany(Invoice::Class);
    }
}

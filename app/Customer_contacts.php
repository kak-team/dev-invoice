<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer_contacts extends Model
{
    //
    protected $table = 'ctn_customer_contact';
    protected $fillable = ['customer_id','full_name','email','phone'];
    public $timestamps = false;


    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function invoices()
    {
        return $this->belongsTo(Invoice::class);
    }

}
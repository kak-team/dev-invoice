<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer_contacts extends Model
{
    //
    protected $table = 'ctn_customer_contact';
    protected $fillable = ['customer_id','full_name','email','phone'];
    public $timestamps = false;


    public function customer_contacts()
    {
        return $this->belongsTo(customer::Class);
    }
}
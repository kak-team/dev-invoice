<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table    = 'ctn_invoice';
    protected $fillable = 
    [
        'user_id',
        'customer_id',
        'contact_person_id',
        'contact_phone',
        'supplier_id',
        'service_id',
        'invoice_number',
        'total_amount',
        'vat_value',
        'exchange_riel',
        'routing',
        'groupping',
        'description',
        'cancel_description',
        'issue_date',
        'created_at',
        'status_payment',
        'status_invoice',
        'status_vat'
    ];
    public $timestamps  = false;

    public function invoice_incomes()
    {
        return $this->hasMany(Invoice_income::class,'invoice_id','id');
    }

    public function customers()
    {
        return $this->hasOne(Customer::class,'id','customer_id');
    }

    public function suppliers()
    {
        return $this->hasOne(Supplier::class,'id','supplier_id');
    }

    public function airticket_list()
    {
        return $this->hasMany(Invoice_airticket_list::class,'invoice_id','id');
    }
    public function contacts()
    {
        return $this->hasOne(Customer_contacts::Class,'id','contact_person_id');
    }
    
}

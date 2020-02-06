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
        'service_fee_price',
        'vat_percent',
        'exchange_riel',
        'routing',
        'description',
        'groupping',
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

    public function visa()
    {
        return $this->hasOne(Invoice_visa::class,'invoice_id','id');
    }

    public function visa_list()
    {
        return $this->hasMany(Invoice_visa_list::class,'invoice_id','id');
    }

    public function insurance()
    {
        return $this->hasOne(Invoice_insurance::class,'invoice_id','id');
    }

    public function insurance_list()
    {
        return $this->hasMany(Invoice_insurance_list::class,'invoice_id','id');
    }

    public function transportation()
    {
        return $this->hasOne(Invoice_transportation::class,'invoice_id','id');
    }

    public function transportation_list()
    {
        return $this->hasMany(Invoice_transportation_list::class,'invoice_id','id');
    }

    public function hotel()
    {
        return $this->hasOne(Invoice_hotel::class,'invoice_id','id');
    }

    public function hotel_list()
    {
        return $this->hasMany(Invoice_hotel_list::class,'invoice_id','id');
    }

    public function tour()
    {
        return $this->hasOne(Invoice_tour::class,'invoice_id','id');
    }

    public function tour_list()
    {
        return $this->hasMany(Invoice_tour_list::class,'invoice_id','id');
    }

    public function other_list()
    {
        return $this->hasMany(Invoice_other_list::class,'invoice_id','id');
    }


    public function contacts()
    {
        return $this->hasOne(Customer_contacts::Class,'id','contact_person_id');
    }

    public function issue_by()
    {
        return $this->hasOne(User::class,'id','user_id');
    }

    public function general(){
        return $this->hasOne(User::class,'id','user_id');
    }

    public function service_type()
    {
        return $this->hasMany(Service::class,'id','service_id');
    }

    public function expense()
    {
        return $this->hasOne(Invoice_expense::class,'invoice_id','id');
    }
    
}

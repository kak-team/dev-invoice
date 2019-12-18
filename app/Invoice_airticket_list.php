<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice_airticket_list extends Model
{
    protected $table = 'ctn_sales_airticket_list';

    protected $fillable = ['invoice_id','net_price','airline_id','ticket_number','passanger_name','passanger_type','quantity','price','service_fee','vat','service_fee_vat'];
    public $timestamps = false;

    public function Invoices()
    {
        return $this->belongTo(Invoice::class);
    }

    public function airline_code()
    {
        return $this->hasMany(Airline::class, 'id', 'airline_id');
    }
}

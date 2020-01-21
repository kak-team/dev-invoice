<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice_hotel_list extends Model
{
    protected $table = 'ctn_sales_hotel_list'; 
    protected $fillable = [
        'invoice_id',
        'net_price',
        'full_name',
        'quantity',
        'price'
    ];
    public $timestamps  = false;
}

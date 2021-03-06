<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice_tour_list extends Model
{
    protected $table = 'ctn_sales_tours_list'; 
    protected $fillable = [
        'invoice_id',
        'net_price',
        'full_name',
        'type',
        'quantity',
        'price'
    ];
    public $timestamps  = false;
}

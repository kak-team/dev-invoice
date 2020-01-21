<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice_tour_list extends Model
{
    protected $table = 'ctn_sales_tour_list'; 
    protected $fillable = [
        'invoice_id',
        'net_price',
        'full_name',
        'total_adult',
        'total_child',
        'quantity',
        'price'
    ];
    public $timestamps  = false;
}

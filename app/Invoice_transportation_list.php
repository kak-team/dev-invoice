<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice_transportation_list extends Model
{
    protected $table = 'ctn_sales_transportation_list'; 
    protected $fillable = [
        'invoice_id',
        'net_price',
        'full_name',
        'from_date',
        'to_date',
        'quantity',
        'price'
    ];
    public $timestamps  = false;
}

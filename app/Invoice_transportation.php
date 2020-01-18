<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice_transportation extends Model
{
    protected $table = 'ctn_sales_transportation'; 
    protected $fillable = [
        'invoice_id',
        'from_date',
        'to_date',
        'total_car',
        'car_type'
    ];
    public $timestamps  = false;
}

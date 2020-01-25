<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice_tour extends Model
{
    protected $table = 'ctn_sales_tours'; 
    protected $fillable = [
        'invoice_id',
        'from_date',
        'to_date',
        'tour_code'
    ];
    public $timestamps  = false;
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice_tour extends Model
{
    protected $table = 'ctn_sales_tour'; 
    protected $fillable = [
        'invoice_id',
        'from_date',
        'to_date',
    ];
    public $timestamps  = false;
}

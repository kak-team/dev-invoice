<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice_visa extends Model
{
    protected $table = 'ctn_sales_visa';
    protected $fillable = [
        'invoice_id',
        'application_date',
        'pickup_date'
    ];
    public $timestamps  = false;
}

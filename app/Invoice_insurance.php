<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice_insurance extends Model
{
    protected $table = 'ctn_sales_insurance';
    protected $fillable = [
        'invoice_id',
        'from_date',
        'to_date'
    ];
    public $timestamps  = false;
}

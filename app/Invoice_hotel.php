<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice_hotel extends Model
{
    protected $table = 'ctn_sales_hotel'; 
    protected $fillable = [
        'invoice_id',
        'checking_date',
        'checkout_date',
        'total_room',
        'room_type'
    ];
    public $timestamps  = false;
}

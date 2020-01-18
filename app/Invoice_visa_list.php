<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice_visa_list extends Model
{
    protected $table = 'ctn_sales_visa_list';
    protected $fillable = [
        'invoice_id',
        'net_price',
        'full_name',
        'nationality',
        'passport_number',
        'quantity',
        'price'
    ];
    public $timestamps  = false;


    public function invoice()
    {
        return $this->belongTo(App\Invoice::class,'id','invoice_id');
    }

}

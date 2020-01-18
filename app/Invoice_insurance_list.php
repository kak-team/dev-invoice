<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice_insurance_list extends Model
{
    protected $table = 'ctn_sales_insurance_list';
    protected $fillable = [
        'invoice_id',
        'net_price',
        'full_name',
        'quantity',
        'price'
    ];
    public $timestamps  = false;


    public function invoice()
    {
        return $this->belongTo(App\Invoice::class,'id','invoice_id');
    }
}

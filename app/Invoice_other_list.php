<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice_other_list extends Model
{
    protected $table = 'ctn_sales_other_list';
    protected $fillable = [
        'invoice_id',
        'net_price',
        'full_name',
        'service_for',
        'quantity',
        'price'
    ];
    public $timestamps  = false;


    public function invoice()
    {
        return $this->belongTo(App\Invoice::class,'id','invoice_id');
    }
}

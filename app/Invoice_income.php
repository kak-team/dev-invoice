<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice_income extends Model
{
    protected $table    = "ctn_invoice_income";
    protected $fillable = ['user_id','invoice_id','payment_method_id','price','description','issue_date','created_at'];
    public $timestamps  = false;
    public function invoices()
    {
        return $this->belongTo(Invoice::Class);
    }
}

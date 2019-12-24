<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice_income extends Model
{
    protected $table    = "ctn_invoice_income";
    protected $fillable = [
        'user_id',
        'invoice_id',
        'payment_method_id',
        'previous_balance',
        'new_payment',
        'current_balance',
        'description',
        'issue_date',
        'created_at',
        'status'
    ];
    public $timestamps  = false;
    public function invoice()
    {
        return $this->belongTo(Invoice::class,'id','invoice_id');
    }

    public function payment_method()
    {
        return $this->hasMany(PaymentMethod::class, 'id', 'payment_method_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice_expense extends Model
{
    //
    protected $table ="ctn_invoice_expense";
    protected $fillable = [
        'invoice_id',
        'invoice_expense_id',
        'collect_by',
        'expense_price',
        'issue_date'
    ];

    public function invoice()
    {
        return $this->hasOne(Invoice::class,'id', 'invoice_id');
    }
    
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupplierList extends Model
{
    //
    protected $table = 'ctn_supplier_contact';

    public function supplier_contact()
    {
        return $this->belongsTo('id','supplier_id');
    }
}
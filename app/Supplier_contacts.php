<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier_contacts extends Model
{
    //
    protected $table = 'ctn_supplier_contact';
    protected $fillable = ['supplier_id','full_name','email','phone'];
    public $timestamps = false;


    public function supplier_contacts()
    {
        return $this->belongsTo(Supplier::Class);
    }
}
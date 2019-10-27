<?php
namespace App;
use Illuminate\Database\Eloquent\Model;


class Supplier extends Model
{
    //
    protected $table = 'ctn_supplier';

    public function supplier_person()
    {
        return $this->hasMany('id','supplier_id');
    }
}
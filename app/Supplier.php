<?php
namespace App;
use Illuminate\Database\Eloquent\Model;


class Supplier extends Model
{
    //
    protected $table    = 'ctn_supplier';
    protected $fillable = ['user_id','service_id','supplier_name','register_number','website','address'];
    public $timestamps  = false;

    public function supplier_contacts()
    {
        return $this->hasMany(Supplier_contacts::class);
    }
}
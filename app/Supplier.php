<?php
namespace App;
use Illuminate\Database\Eloquent\Model;


class Supplier extends Model
{
    //
    protected $table    = 'ctn_supplier';
    protected $fillable = ['user_id','service_id','name_kh','name_en','register_number','website','address','status'];
    public $timestamps  = false;

    public function supplier_contacts()
    {
        return $this->hasMany(Supplier_contacts::class);
    }

    public function supplier_transportation()
    {
        return $this->hasOne(Transportation::class,'supplier_id','id');
    }

    public function supplier_hotel()
    {
        return $this->hasOne(Hotel::class,'supplier_id','id');
    }

    public function supplier_tour()
    {
        return $this->hasOne(Tour::class,'supplier_id','id');
    }


}
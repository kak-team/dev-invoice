<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'ctn_services';
    
    public function invoice(){
        return $this->hasMany(Invoice::Class,'service_id','id');
    }
}

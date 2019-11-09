<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airline extends Model
{
    //
    protected $table    = 'ctn_airline_name';
    protected $fillable = ['user_id','name','code','status'];
    public $timestamps  = false;
}

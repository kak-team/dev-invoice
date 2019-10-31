<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airline extends Model
{
    //
    protected $table    = 'ctn_airline';
    protected $fillable = ['user_id','airline_name','code','status'];
    public $timestamps  = false;
}

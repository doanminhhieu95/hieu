<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class area extends Model
{
    //
    Protected $table = "area";
    protected $fillable = [
        'id',
        'name'
    ];
    public function city(){
        return $this->hasMany('App\city','idarea','id');
    }
    public function loaide(){
        return $this->hasMany('App\loaide','idarea','id');
    }
    public function kieuchoi(){
        return $this->hasMany('App\kieuchoi','idarea','id');
    }
}

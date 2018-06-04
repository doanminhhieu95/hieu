<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class city extends Model
{
    //
    Protected $table = "city";
    protected $fillable = [
        'id',
        'name',
        'idarea'
    ];
    public function danhde(){
        return $this->hasMany('App\danhde','idcity','id');
    }
    public function area(){
        return $this->belongsTo('App\area','idarea','id');
    }
    public function daycity(){
        return $this->hasMany('App\daycity','idcity','id');
    }
}

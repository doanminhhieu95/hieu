<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loaide extends Model
{
    //
    Protected $table = "loaide";
    protected $fillable = [
        'id',
        'name',
        'idarea'

    ];
    public function kieuchoi(){
        return $this->hasMany('App\kieuchoi','idloaide','id');
    }
    public function area(){
        return $this->belongsTo('App\area','idarea','id');
    }
}

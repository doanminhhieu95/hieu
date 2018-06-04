<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kieuchoi extends Model
{
    //
    Protected $table = "kieuchoi";
    protected $fillable = [
        'id',
        'name',
        'giaithuong',
        'luatchoi',
        'loai',
        'max',
        'idloaide',
        'idarea'

    ];
    public function danhde(){
        return $this->hasMany('App\danhde','idkieuchoi','id');
    }
    public function kieuchoigiai(){
        return $this->hasMany('App\kieuchoigiai','idkieuchoi','id');
    }
    public function loaide(){
        return $this->belongsTo('App\loaide','idloaide','id');
    }
    public function area(){
        return $this->belongsTo('App\area','idarea','id');
    }
}

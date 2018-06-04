<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class danhde extends Model
{
    //
    Protected $table = "danhde";
    protected $fillable = [
        'id',
        'iduser',
        'ngaydanh',
        'number',
        'money',
        'jackpot',
        'idcity',
        'idkieuchoi'
        
    ];
    public function kieuchoi(){
        return $this->belongsTo('App\kieuchoi','idkieuchoi','id');
    }
    public function city(){
        return $this->belongsTo('App\city','idcity','id');
    }
    public function user(){
        return $this->belongsTo('App\User','iduser','id');
    }
}

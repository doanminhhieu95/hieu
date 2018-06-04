<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nganhang extends Model
{
    //
    Protected $table = "nganhang";
    protected $fillable = [
        'id',
        'name'
    ];
    public function ruttien(){
        return $this->hasMany('App\ruttien','idbank','id');
    }
    public function giaodich(){
        return $this->hasMany('App\giaodich','idbank','id');
    }
}

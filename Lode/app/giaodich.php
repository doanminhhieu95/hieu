<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class giaodich extends Model
{
    //
    Protected $table = "giaodich";
    protected $fillable = [
        'id',
        'iduser',
        'tennguoigui',
        'idbank',
        'moneyGD',
        'tiensauGD',
        'trangthai'

    ];
    public function nganhang(){
        return $this->belongsTo('App\nganhang','idbank','id');
    }
    public function user(){
        return $this->belongsTo('App\User','iduser','id');
    }
}

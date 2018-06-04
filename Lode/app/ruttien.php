<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ruttien extends Model
{
    //
    Protected $table = "ruttien";
    protected $fillable = [
        'id',
        'iduser',
        'idbank',
        'stk',
        'account',
        'money'

    ];
    public function nganhang(){
        return $this->belongsTo('App\nganhang','idbank','id');
    }
    public function user(){
        return $this->belongsTo('App\User','iduser','id');
    }
}

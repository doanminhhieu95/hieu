<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kieuchoigiai extends Model
{
    //
    Protected $table = "kieuchoigiai";
    protected $fillable = [
        'id',
        'idkieuchoi',
        'idgiai'

    ];
    public function kieuchoi(){
        return $this->belongsTo('App\kieuchoi','idkieuchoi','id');
    }
    public function giai(){
        return $this->belongsTo('App\giai','idgiai','id');
    }
}

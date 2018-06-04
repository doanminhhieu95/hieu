<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'money', 'level'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function danhde(){
        return $this->hasMany('App\danhde','iduser','id');
    }
    public function ruttien(){
        return $this->hasMany('App\ruttien','iduser','id');
    }
    public function giaodich(){
        return $this->hasMany('App\giaodich','iduser','id');
    }
}

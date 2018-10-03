<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password','is_deleted','role_id','active'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role(){
        return $this->hasOne('App\Role','role_id','role_id');
    }
}
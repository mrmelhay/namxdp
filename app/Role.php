<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    protected $fillable = [
        'role_name',
        'role_access'
    ];

//    public function users(){
//        return $this->belongsTo('App\User' , 'role_id','role_id');
//    }
}

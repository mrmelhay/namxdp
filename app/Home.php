<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    //
    protected $table='assets';


    public function getAllMenus(){
        return self::all();
    }
}

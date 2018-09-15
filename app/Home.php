<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Home extends Model
{

    protected $table='assets';


    public static function getAllMenus(){
        return self::where(['active'=>1])->orderBy("ordering")->get();
    }
}

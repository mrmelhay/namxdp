<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Preferences extends Model
{
    protected $table="assets";

    public static function getAssets(){
        return self::get();
    }
}

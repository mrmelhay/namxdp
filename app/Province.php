<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    //

    protected $table="region";

    protected $primaryKey='region_id';

    protected $fillable = ['region_id', 'region_name'];

    public function user(){
        return $this->hasMany('App\User','region_id','region_id');
    }

    public function district(){
        return $this->hasMany('App\District','region_id','region_id');
    }
}

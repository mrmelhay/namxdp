<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    //

    protected $table="region";

    protected $fillable = [
        'region_id', 'region_name',
    ];

    public function districts(){
       return $this->belongsTo('App\District','region_id');
    }
}

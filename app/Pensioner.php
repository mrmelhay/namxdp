<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pensioner extends Model
{
    protected $fillable = [
        'pensioner_date',
        'pensioner_id',
        'is_deleted'
    ];

    protected $table = 'pensioners';

    public function user(){
        return $this->hasOne('App\Pensioner','id','pensioner_id');
    }
}

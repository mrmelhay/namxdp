<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pensioner extends Model
{
    protected $fillable = [
        'pensioner_date',
        'pensioner_id',
        'member_pensioner_id',
        'is_deleted'
    ];

    protected $primaryKey = 'pensioner_id';

    protected $table = 'pensioners';

    public function member(){
        return $this->hasOne('App\Member','id','member_pensioner_id');
    }
}
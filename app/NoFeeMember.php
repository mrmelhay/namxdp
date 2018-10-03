<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NoFeeMember extends Model
{
    protected $fillable = [
        'fee_id',
        'fee_member_id',
        'fee_date'
    ];

    protected $table = 'no_fee_members';

    public function member(){
        return $this->hasOne('App\Members','id','fee_member_id');
    }
}

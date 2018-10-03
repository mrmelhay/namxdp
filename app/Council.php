<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Council extends Model
{

    protected $primaryKey = 'party_id';

    protected $fillable = [
        'party_id',
        'party_name',
        'party_address',
        'party_director',
        'party_phone',
        'party_region_id',
        'party_distirict_id',
        'is_deleted'
    ];

    protected $table = 'party';

    public function region(){
       return $this->hasOne('App\Province', 'region_id', 'party_region_id');
    }

    public function distirict(){
        return $this->hasOne('App\District', 'district_id', 'party_distirict_id');
    }
}

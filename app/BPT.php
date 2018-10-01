<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BPT extends Model
{
    protected $table = 'bpt';

    protected $primaryKey = 'bpt_id';

    protected $fillable = [
        'bpt_name',
        'bpt_speciality',
        'bpt_address',
        'bpt_is_mfy',
        'bpt_region_id',
        'bpt_district_id',
        'bpt_party_id'
    ];

    public function region(){
        return $this->hasOne('App\Province' , 'region_id', 'bpt_region_id');
    }

    public function district(){
        return $this->hasOne('App\District' , 'district_id', 'bpt_district_id');
    }

    public function party(){
        return $this->hasOne('App\Party' , 'party_id', 'bpt_party_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BPT extends Model
{
    protected $table = 'bpt';

    protected $primaryKey = 'bpt_id';

    protected $fillable = [
        'bpt_name',
        'bpt_speciality_id',
        'bpt_address',
        'bpt_establish_date',
        'bpt_is_mfy',
        'bpt_region_id',
        'bpt_district_id',
        'bpt_party_id',
        'is_deleted'
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

    public function spec(){
        return $this->hasOne('App\BptSpecies' , 'id', 'bpt_speciality_id');
    }

    public function members(){
        return $this->hasMany('App\Members' , 'bpt_id', 'bpt_id');
    }
}

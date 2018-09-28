<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    protected $table="party";

    protected $fillable = [
        'party_id',
        'party_name',
        'party_address',
        'party_director',
        'party_phone',
        'party_region_id',
        'party_distirict_id'
    ];

}
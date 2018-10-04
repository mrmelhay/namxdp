<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialCategory extends Model
{
    protected $table = 'socialcat';

    protected $fillable = [
        'soc_name'
    ];

    protected $primaryKey = 'soc_id';
}

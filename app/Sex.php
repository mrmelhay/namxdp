<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sex extends Model
{
    protected $fillable = [
        'sex_id',
        'sex_name'
    ];

    protected $table = 'sex';
}

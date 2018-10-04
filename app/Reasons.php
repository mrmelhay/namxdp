<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reasons extends Model
{
    protected $fillable = [
        'reason_id',
        'reason_name',
    ];

    protected $primaryKey = 'reason_id';
}

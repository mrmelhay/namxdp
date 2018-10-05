<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhotoMember extends Model
{
    protected $fillable = [
        'member_id',
        'photo_path'
    ];

    protected $primaryKey = 'photo_id';

    protected $table = 'photo_members';
}

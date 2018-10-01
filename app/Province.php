<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    //

    protected $table="region";

    protected $primaryKey='region_id';

    protected $fillable = ['region_id', 'region_name'];

}

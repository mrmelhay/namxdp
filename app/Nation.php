<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Nation extends Model
{
    protected $table = 'nation';
    protected $primaryKey = 'nation_id';
    protected $fillable = [
        'nation_name'
    ];

    public static function del($id){
        $dsd=self::find($id);$dsd->delete();
        return true;
    }
}

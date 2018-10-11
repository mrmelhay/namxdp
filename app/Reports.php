<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reports extends Model
{
    //
//
    protected $table="members";


    public  function getAllMember(){
       return Members::leftJoin('region','region.region_id','=','members.region_id')->
                        leftJoin('district','district.district_id','=','members.district_id')->
                        leftJoin('sex','sex.sex_id','=','members.sex_id')
                        ->leftJoin('nation','nation.nation_id','=','members.nationality_id')
                        ->leftJoin('btp','bpt.bpt_id','=','members.bpt_id')
                        ->take(20)
                        ->get();

    }
}

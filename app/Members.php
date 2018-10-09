<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Members extends Model
{
    protected $fillable = [
        'fullName',
        'bpt_id',
        'birthday',
        'sex_id',
        'first_pos_id',
        'nationality_id',
        'passSerial',
        'passGivenFrom',
        'passGivenDate',
        'passExpireDate',
        'specialist',
        'workPlaceAndPosition',
        'phoneNumber',
        'is_deleted',
        'isLeader',
        'isXdpMember',
        'region_id',
        'district_id',
        'homeAddress',
        'unionJoinDate',
        'unionOrderNumber',
        'socialPositionId',
        'socialPositionId',
        'isFeePaid',
        'delete_reason_id',
        'date_reason',
    ];

    protected $table = 'members';

    public function nation(){
        return $this->hasOne('App\Nation' , 'nation_id' , 'nationality_id');
    }

    public static function findAndCheck($id){

        if(self::find($id)->exists()){
            if(!self::find($id)->is_deleted){
                return self::find($id);
            }else{
                abort(404);
            }
        }else{
            abort(404);
        }
    }

    public function district(){
        return $this->hasOne('App\District' , 'district_id' , 'district_id');
    }

    public function province(){
        return $this->hasOne('App\Province' , 'region_id' , 'region_id');
    }

    public function social_category(){
        return $this->hasOne('App\SocialCategory' , 'soc_id' , 'socialPositionId');
    }

    public function bpt(){
        return $this->hasOne('App\BPT' , 'bpt_id' , 'bpt_id');
    }

    public function noFeeMember(){
        return $this->hasOne('App\NoFeeMember','fee_member_id','id');
    }

    public function photo(){
        return $this->hasOne('App\PhotoMember','member_id','id');
    }


}

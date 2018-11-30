<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Notification extends Model
{
    protected $fillable = ['sender_role_id','message','message_type_id','readers_list_region','readers_list_district'];
    protected $table = "notifications";

    public static function getNews($id)
    {
        if($id==1){
            return self::where('sender_role_id',3)->orderBy('id','desc')->take(3)->get();
        }
        if($id==2){
            $user = Auth::user();
            $dis = District::findOrFail($user->district_id);
            $reg_id = $dis->region->region_id;
            $reg_men = User::where('region_id',$reg_id)->first();
            return self::where('sender_role_id',3)->orWhere('sender_id',$reg_men->id)->orderBy('id','desc')->take(3)->get();
        }
    }

    public function markAs()
    {
        return $this->hasMany('\App\MarkNotesAsRead','note_id','id');
    }
}
<?php

namespace App\Http\Controllers;

use App\District;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Notification extends BaseController
{
    public function index()
    {$user = Auth::user();
        if($user->role_id==2)
        {
            $dis = District::findOrFail($user->district_id);
            $reg_id = $dis->region->region_id;
            $reg_men = User::where('region_id',$reg_id)->first();
            $data['notes'] = \App\Notification::where('sender_role_id', 3)->orWhere('sender_id',$reg_men->id)->orderBy('id','desc')->paginate(20);
            return view('preferences.notifications.index',$data);
        }
        if($user->role_id==1){
            $data['notes'] = \App\Notification::where('sender_role_id',3)->orderBy('id','desc')->paginate(20);
            return view('preferences.notifications.index',$data);
        }
        if($user->role_id==3){
            $data['notes'] = \App\Notification::where('sender_role_id',3)->orderBy('id','desc')->paginate(20);
            return view('preferences.notifications.index',$data);
        }
    }
}
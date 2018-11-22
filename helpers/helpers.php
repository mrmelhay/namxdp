<?php

if (! function_exists('get_own_members')) {
    function get_own_members($id=null)
    {
        if($id!==null){
            $role=\App\User::findOrFail($id)->role_id;
            if($role==3){//superuser
                return \App\Members::where('is_deleted',0)->paginate(20);
            }
            if($role==1){//regionManager
                return \App\Members::where('region_id',\App\User::findOrFail($id)->region_id)->paginate(20);
            }
            if($role==2){//districtManager
                return \App\Members::where('region_id',\App\User::findOrFail($id)->region_id)->where('district_id',\App\User::findOrFail($id)->district_id)->paginate(20);
            }
        }else {abort(404);}
    }
}



































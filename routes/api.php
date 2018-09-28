<?php

use App\Members;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('getDistricts/{id}', function ($id) {
    return response()->json([
        'error' => false,
        'districts' => \App\District::where('region_id' , $id)->get(),
        'status' => 200
    ]);
});

Route::post('/deleteMember', function (Request $request) {

    $result = Members::whereIn('id',$request->all())->update(['is_deleted'=>1]);
    if($result){
        return response()->json([
            'error' => false,
            'status' => 'OK',
            'code' => 200
        ]);
    }else{
        return response()->json([
            'error' => true,
            'status' => 'error',
            'code' => 465
        ]);
    }
});
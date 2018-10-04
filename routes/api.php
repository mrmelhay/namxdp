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

Route::get('/deleteMember/{date}/{reason}/{id}', function ($date,$reason,$id) {
    if(is_numeric($id) && \App\Members::findOrFail($id)->exists() && \App\Members::findOrFail($id)->is_deleted==0){
        \App\Members::findOrFail($id)->update(['is_deleted' => 1, 'delete_reason_id' => $reason , 'date_reason' => $date]);
        return response()->json([
            'error' => false,
            'data' => $id,
            'status_code' => 200
        ]);
    }else{
        abort(404);
    }
});

Route::get('/markMemberAsPensioner/{date}/{id}', function ($date,$id) {

    if(is_numeric($id) && \App\Members::findOrFail($id)->exists() && !\App\Pensioner::where('member_pensioner_id',$id)->exists()){
        \App\Pensioner::insert(['member_pensioner_id' => $id, 'pensioner_date' => $date]);
        return response()->json([
            'error' => false,
            'status' => [],
            'status_code' => 200
        ]);
    }else{
        abort(404);
    }
});

Route::post('/restoreMember', function (Request $request) {
    $result = Members::whereIn('id',$request->all())->update(['is_deleted'=>0]);
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
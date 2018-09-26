<?php

use Illuminate\Http\Request;

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
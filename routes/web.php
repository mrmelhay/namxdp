<?php

use App\Preferences;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;

Route::group(['middleware'=>'web'],function () {
    Route::match(['get', 'post'], '/', ['uses' => 'HomeController@index', 'as' => 'home']);
    Auth::routes();
    Route::get('/preferences', 'PreferencesController@index');
    Route::get('/province', 'ProvinceController@index')->name('province');
    Route::get('/province/action/{action}/{id}', 'ProvinceController@action');
    Route::post('/province/action/{action}', 'ProvinceController@action');
    Route::get('/province/action/{action}', 'ProvinceController@action');

    Route::get('/district', 'DistrictController@index')->name('district');
    Route::get('/district/action/{action}/{id}', 'DistrictController@action');
    Route::post('/district/action/{action}', 'DistrictController@action');
    Route::get('/district/action/{action}', 'DistrictController@action');

    Route::get('/community', 'PreferencesController@index');
    Route::get('/community', 'PreferencesController@index');
    Route::get('/councils', 'PreferencesController@index');

//--------------------------------- resource controllers area -------------------------------------------//

    Route::get('/reports', 'ReportsController@index');
    Route::get('/reports/{action}', 'ReportsController@index');
    Route::resource('/socCats', 'SocialCatsController');
    Route::resource('/nation', 'NationController');
    Route::resource('/sex', 'SexController');
    Route::resource('/membership', 'MemberController');
    Route::resource('/province', 'ProvinceController');
    Route::resource('/district', 'DistrictController');
    Route::resource('/bpt', 'BptController');
    Route::resource('/council', 'CouncilController');
    Route::resource('/users', 'UserController');
    Route::resource('/bpt_spec', 'BptSpeciesController');

//--------------------------------- resource controllers area  END -------------------------------------------//

    Route::get('/arxiv', 'MemberController@arxiv');
    Route::get('/export/{name}', 'ExportController@export');
    Route::post('/search', 'BaseController@search')->name('search');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::post('/login', 'CustomLoginController@login')->name('login');
    Route::post('/logout', 'CustomLoginController@logout')->name('logout');
    Route::get('/login', function () {
        return view('auth.login');
    })->middleware('guest');

    //--------------------------------------------  FeeStore  --------------------------------------------------//

    Route::get('/feeSubmit/{feeDate}/{feeReason}/{id}', function ($feeDate, $feeReason, $id) {
        if (is_numeric($id)) {
            \App\Members::findOrFail($id)->update(['isFeePaid' => 0]);
            if (!\App\NoFeeMember::where(['fee_member_id' => $id])->exists()) {
                \App\NoFeeMember::insert(['fee_reason' => $feeReason, 'fee_member_id' => $id, 'fee_date' => $feeDate]);
            }
            return response()->json(['code' => 200, 'data' => [], 'error' => false,]);
        } else {
            abort(404);
        }
    });

    //---------------------------------------------------   store Notifications ------------------------------------//

    Route::get('/sendT/{text}/{id}',function ($text,$id){
        \App\Notification::insert([
            'sender_role_id' => Auth::user()->role_id,
            'message' => $text,
            'sender_id' => Auth::user()->id,
            'message_type_id' => $id
        ]);
    })->middleware('auth');;

//    Route::get('/markAsRead/{user_id}','Notification@markAsRead')->middleware('auth');

    Route::get('/view-notifications','Notification@index')->middleware('auth');

//    Route::get('/test',function (){
//        return User::create([
//            'name' => 'republic',
//            'email' => 'res@gmail.com',
//            'role_id' => 3,
//            'password' => bcrypt(654654),
//        ]);
//    });




















});
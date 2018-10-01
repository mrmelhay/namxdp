<?php

use App\Preferences;
use App\User;

Route::group(['middleware'=>'web'],function (){
    Route::match(['get','post'],'/',['uses'=>'HomeController@index','as'=>'home']);
    Auth::routes();
    Route::get('/preferences', 'PreferencesController@index');
    Route::get('/province', 'ProvinceController@index')->name('province');
    Route::get('/province/action/{action}/{id}', 'ProvinceController@action');
    Route::post('/province/action/{action}', 'ProvinceController@action');
    Route::get('/province/action/{action}', 'ProvinceController@action');

    Route::get('/district','DistrictController@index')->name('district');
    Route::get('/district/action/{action}/{id}', 'DistrictController@action');
    Route::post('/district/action/{action}', 'DistrictController@action');
    Route::get('/district/action/{action}', 'DistrictController@action');



    Route::get('/nation','PreferencesController@index');
    Route::get('/community','PreferencesController@index');
    Route::get('/community','PreferencesController@index');
    Route::get('/councils','PreferencesController@index');
    Route::get('/users','PreferencesController@index');

    Route::resource('/reports','ReportsController');

    Route::resource('/socCats','SocialCatsController');
    Route::resource('/nation','NationController');
    Route::resource('/sex','SexController');
    Route::resource('/membership','MemberController');
    Route::resource('/province', 'ProvinceController');
    Route::resource('/district', 'DistrictController');
    Route::resource('/bpt','BptController');
    Route::resource('/users','UserController');
    Route::resource('/council','CouncilController');


    Route::get('/arxiv',function(){
        $archives = \App\Members::where('is_deleted',1)->paginate(20);
        $bpt = new \App\Http\Controllers\BptController();
        $bpts = $bpt->getAllBpt();
        return view('preferences.membership.archives', compact('archives','bpts'));
    });

    Route::post('/searchMember','BptController@search')->name('searchMember');

});
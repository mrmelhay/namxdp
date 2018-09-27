<?php

use App\User;

Route::group(['middleware'=>'web'],function (){
    Route::match(['get','post'],'/',['uses'=>'HomeController@index','as'=>'home']);
    Auth::routes();
    Route::get('/preferences', 'PreferencesController@index');
    Route::get('/province', 'ProvinceController@index')->name('province');
    Route::get('/province/action/{action}/{id}', 'ProvinceController@action');
    Route::post('/province/action/{action}', 'ProvinceController@action')->name('action');
    Route::get('/province/action/{action}', 'ProvinceController@action');

    Route::get('/district','DistrictController@index')->name('district');
    Route::get('/district/action/{action}/{id}', 'DistrictController@action');
    Route::post('/district/action/{action}', 'DistrictController@action')->name('action');
    Route::get('/district/action/{action}', 'DistrictController@action');



    Route::get('/sex','PreferencesController@index')->name('sex');
    Route::get('/nation','PreferencesController@index')->name('nation');
    Route::get('/community','PreferencesController@index')->name('community');
    Route::get('/community','PreferencesController@index')->name('community');
    Route::get('/bts','PreferencesController@index')->name('bts');
    Route::get('/councils','PreferencesController@index')->name('councils');
    Route::get('/users','PreferencesController@index')->name('users');


    Route::get('/reports','PreferencesController@index')->name('reports');
    Route::resource('/membership','MemberController');


});

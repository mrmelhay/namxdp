<?php

use App\Preferences;
use App\User;
use Illuminate\Support\Facades\Auth;

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

//--------------------------------- resource controllers area -------------------------------------------//

    Route::resource('/reports','ReportsController');
    Route::resource('/socCats','SocialCatsController');
    Route::resource('/nation','NationController');
    Route::resource('/sex','SexController');
    Route::resource('/membership','MemberController');
    Route::resource('/province', 'ProvinceController');
    Route::resource('/district', 'DistrictController');
    Route::resource('/bpt','BptController');
    Route::resource('/council','CouncilController');

//--------------------------------- resource controllers area  END -------------------------------------------//

    Route::get('/arxiv','MemberController@arxiv');
    Route::post('/search','BaseController@search')->name('search');
});

Route::resource('/users','UserController');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/login', 'CustomLoginController@login')->name('login');
Route::post('/logout', 'CustomLoginController@logout')->name('logout');
Route::get('/login', function (){
    return view('auth.login');
})->middleware('guest');

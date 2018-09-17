<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::group(['middleware'=>'web'],function (){

    Route::match(['get','post'],'/',['uses'=>'HomeController@index','as'=>'home']);

    Auth::routes();
//    Route::get('/', 'HomeController@index');

//    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/preferences', 'PreferencesController@index');
    Route::get('/province', 'PreferencesController@province');

});




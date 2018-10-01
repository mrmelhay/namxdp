<?php

use App\Preferences;
use App\User;

Route::group(['middleware'=>'web'],function (){
    Route::match(['get','post'],'/',['uses'=>'HomeController@index','as'=>'home']);
    Auth::routes();
    Route::get('/preferences', 'PreferencesController@index');
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


    Route::get('/reports','PreferencesController@index');



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
        return view('preferences.membership.archives', compact('archives'));
    });

    Route::post('/searchMember',function(\Illuminate\Http\Request $request){
        $data=[];
        //dd($request->all());
        $text = '';
        foreach($request->all() as $key => $value){
            if($value!==null && $key!='_token'){
                if($key=='fullName'){
//                    $data = '"fullName" , "like" , "%'.$value. '%"';
                    $members1 = \App\Members::where('fullName','like','%'.$value.'%')->orderBy('id','desc')->paginate(20);
                    break;
                }else{
                    $data[$key] = $value;
                }
            }
        }
        if(isset($members1)){
            $controller = new \App\Http\Controllers\BaseController();
            $data1["countArchive"] = $controller->getAllArchives();
            $data1["bpts"] = $controller->getAllBpt();
            $data1["members"] = $members1;
            return view('preferences.membership.index', $data1);
        }else{
            $members = \App\Members::where($data)->orderBy('id','desc')->paginate(20);
            $controller = new \App\Http\Controllers\BaseController();
            $data1["countArchive"] = $controller->getAllArchives();
            $data1["bpts"] = $controller->getAllBpt();
            $data1["members"] = $members;
            return view('preferences.membership.index', $data1);
        }
    })->name('searchMember');

});

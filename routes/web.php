<?php

use App\Preferences;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;

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
    Route::resource('/users','UserController');
    Route::resource('/bpt_spec','BptSpeciesController');

//--------------------------------- resource controllers area  END -------------------------------------------//

    Route::get('/arxiv','MemberController@arxiv');
    Route::get('/export/{name}','ExportController@export');
    Route::post('/search','BaseController@search')->name('search');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::post('/login', 'CustomLoginController@login')->name('login');
    Route::post('/logout', 'CustomLoginController@logout')->name('logout');
    Route::get('/login', function (){return view('auth.login');})->middleware('guest');

    //--------------------------------------------  FeeStore  --------------------------------------------------//

    Route::get('/feeSubmit/{feeDate}/{feeReason}/{id}',function ($feeDate, $feeReason, $id){if(is_numeric($id)){\App\Members::findOrFail($id)->update(['isFeePaid'=>0]);if(!\App\NoFeeMember::where(['fee_member_id'=>$id])->exists()){\App\NoFeeMember::insert(['fee_reason'=>$feeReason,'fee_member_id'=>$id,'fee_date'=>$feeDate]);}return response()->json(['code' => 200,'data' => [],'error' => false,]);}else{abort(404);}});

//    Route::get('/excel',function (){
//        ini_set('memory_limit', '-1');
//        ini_set('max_execution_time', 3600);
//        ini_set('display_errors', '1');
//
//        require('../public/SpreadsheetReader.php');
//        $Reader = new SpreadsheetReader('../public/users.xlsx');
////        dd($Reader);
//        $dataGlobal = [];
//        $i=0;
//        foreach ($Reader as $Row)
//        {
//            $data = [];
//            if($i<4456)
//            {
//                if(strlen($Row[0]) > 3){
//                    $data["fullName"] = $Row[0];
//                }else{
//                    $data["fullName"] = '-';
//                }
//                if(strlen($Row[1]) > 3){
//                    $tr=str_replace(array('а','б','в','г','д','е','ё','ж','з','и','й','к','л','м','н','о','п','р','с','т','у','ф','х','ц','ч','ш','щ','ъ','ы','ь','э','ю','я',' '), '',$Row[1]);
//                    $t=str_replace(array('.','/',','),'-',$tr);
//                    $ts=strlen($t)==4?$t.'-01-01':$tr;
//                    $data["birthday"] = $ts;
//                }else{
//                    $data["birthday"] = '1900-01-01';
//                }
//                if(strlen($Row[2]) > 2){
//                    $nation = str_replace(' ', '', $Row[2]);
//                    switch ($nation) {
//                        case "Ўзбек":
//                                $data["nationality_id"]=1;
//                            break;
//                        case "Араб":
//                                $data["nationality_id"]=3;
//                            break;
//                        case "Арман":
//                                $data["nationality_id"]=4;
//                            break;
//                        case "Беларус":
//                                $data["nationality_id"]=5;
//                            break;
//                        case "Инглиз":
//                                $data["nationality_id"]=6;
//                            break;
//                        case "Ирланд":
//                                $data["nationality_id"]=7;
//                            break;
//                        case "Корейс":
//                            $data["nationality_id"]=8;
//                            break;
//                        case "Қирғиз":
//                            $data["nationality_id"]=9;
//                            break;
//                        case "Қозоқ":
//                            $data["nationality_id"]=10;
//                            break;
//                        case "Қорақалпоқ":
//                            $data["nationality_id"]=11;
//                            break;
//                        case "Немис":
//                            $data["nationality_id"]=14;
//                            break;
//                        case "Тожик":
//                            $data["nationality_id"]=16;
//                            break;
//                        default:
//                            $data["nationality_id"]=25;
//                    }
//                }else{
//                    $data["nationality_id"] = 25;
//                }
//                if(strlen($Row[3]) > 2){
//                    $data["specialist"] = $Row[3];
//                }else{
//                    $data["specialist"] = '-------';
//                }
//                if(strlen($Row[4]) > 3){
//                    $data["workPlaceAndPosition"] = $Row[4];
//                }else{
//                    $data["workPlaceAndPosition"] = '-------';
//                }
//                if(strlen($Row[5]) > 3){
//                    $data["unionCertfNumber"] = $Row[5];
//                }else{
//                    $data["unionCertfNumber"] = '----';
//                }
//                if(strlen($Row[6]) > 2){
//                    $tr=str_replace(array('а','б','в','г','д','е','ё','ж','з','и','й','к','л','м','н','о','п','р','с','т','у','ф','х','ц','ч','ш','щ','ъ','ы','ь','э','ю','я',' '), '',$Row[6]);
//                    $t=str_replace(array('.','/',','),'-',$tr);
//                    $ts=strlen($t)==4?$t.'-01-01':$tr;
//                    $data["unionJoinDate"] = $ts;
//                }else{
//                    $data["unionJoinDate"] = '1900-01-01';
//                }
//                if(strlen($Row[7]) > 2){
//                    if(\App\BPT::where('bpt_name',$Row[7])->exists())
//                    {
//                        $t=\App\BPT::where('bpt_name',$Row[7])->first();
//                        $data["bpt_id"] = $t->bpt_id;
//                    }else{
////                        $dat2='';
////                        switch ($Row[11]) {
////                            case "Наманган шаҳар":
////                                $dat2=95;
////                                break;
////                            case "Поп тумани":
////                                $dat2=88;
////                                break;
////                            case "Учқўрғон тумани":
////                                $dat2=91;
////                                break;
////                            default:
////                                $dat2=197;
////                        }
//                        $bpt_id=\App\BPT::insertGetId([
//                            'bpt_name'=>$Row[7],
//                            'bpt_speciality_id' => 4 ,
//                            'bpt_address' => $Row[7],
//                            'bpt_is_mfy'=>0,
//                            'bpt_region_id'=>7,
//                            'bpt_district_id'=>95,
//                            'bpt_party_id'=>3,
//                            'bpt_establish_date'=>'1900-01-01',
//                            ]);
//                        $data["bpt_id"] = $bpt_id;
//                    }
//                }else{
//                    $data["bpt_id"] = 184;
//                }
//                if(strlen($Row[8]) > 2){
//                    $data["region_id"] = 7;
//                    $data["homeAddress"] = $Row[8];
//                    $data["socialPositionId"] = 1001;
//                }else{
//                    $data["region_id"] = 7;
//                    $data["homeAddress"] = "Наманган шаҳар";
//                    $data["socialPositionId"] = 1001;
//                }
//                if(strlen($Row[9]) > 2){
//                    $sex=str_replace(' ', '', $Row[9]);
//                    if($sex=="эркак"){
//                        $data["sex_id"] = 2;
//                    }else{
//                        $data["sex_id"] = 1;
//                    }
//                }else{
//                    $data["sex_id"] = 2;
//                }
//                if(strlen($Row[10]) > 2){
////                    $sex=str_replace(' ', '', $Row[11]);
////                    switch ($Row[10]) {
////                        case "Наманган шаҳри":
////                            $data["district_id"]=95;
////                            break;
////                        case "Поп тумани":
////                            $data["district_id"]=88;
////                            break;
////                        case "Учқўрғон тумани":
////                            $data["district_id"]=91;
////                            break;
////                        default:
//                            $data["district_id"]=95;
////                    }
//                }else{
//                    $data["district_id"] = 95;
//                }
//            }
//            if($i>0){
//                $dataGlobal[] = $data;
//                Log::info($data);
//            }$i++;
//            if($i==4456){//11125
//                \App\Members::insert($dataGlobal);
//                return 'ok';
//            }
//        }
//        echo ini_get('display_errors');
//    });
//
//    Route::get('/ex',function (){
//
//        $str = 'In My Cart : 11 12 items';
//        $str=preg_replace('/[^0-9]/', '', $str);
//        print_r($str);
//
////        $data = [];
////        $daG = [];
////        $i=1;
////        for($i=1;$i<4452;$i++){
////            $data["member_id"] = $i;
////            $data["photo_path"] = 'no-person.jpg';
////            $daG[]=$data;
////        }
////
////        \App\PhotoMember::insert($daG);
//
//    });

});
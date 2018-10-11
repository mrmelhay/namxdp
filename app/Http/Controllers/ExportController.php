<?php

namespace App\Http\Controllers;

use App\BPT;
use App\BptSpecies;
use App\Council;
use App\District;
use App\Members;
use App\Nation;
use App\Province;
use App\Sex;
use App\SocialCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
//use Maatwebsite\Excel\Excel;

class ExportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        ini_set('memory_limit', '-1');
        ini_set('max_execution_time', 3600);
        ini_set('display_errors', '1');
    }

    public function export($name){
        if($name=='member'){
            if(Auth::user()->role_id==3){//for Hotamjon Ketmonov
                Excel::create('A\'золар '.date('Y-m-d'), function($excel) {
                    $excel->setTitle('А\'золар '.date('Y-m-d'));
                    $excel->setCreator(Auth::user()->name)
                        ->setCompany(Auth::user()->email);
                    $excel->setDescription('Азолар '.date('Y-m-d'));
                    $excel->sheet('А\'золар', function($sheet) {
                        $members = Members::where('is_deleted',0)->get()->toArray();
                        $gdata = [];
                        foreach ($members as $member){
                            $data["Тартиб рақами"] = $member["id"];
                            $data["Исми"] = $member["fullName"];
                            $data["тугилган сана"] = $member["birthday"];
                            $data["Жинси"] = Sex::find($member["sex_id"])->sex_name;
                            /* bazadan 1-8 gacha uchib ketgan shunga topolmayapti*/
                            $data["Миллати"] = Nation::find($member["nationality_id"])->nation_name;
                            $data["Паспорт серия рақами"] = $member["passSerial"];
                            $data["Қайердан берилган"] = $member["passGivenFrom"];
                            $data["Берилган сана"] = $member["passGivenDate"];
                            $data["Амал қилиш муддати"] = $member["passExpireDate"];
                            $data["касби"] = $member["specialist"];
                            $data["иш жойи ва лавозими"] = $member["workPlaceAndPosition"];
                            $data["телефон рақами"] = $member["phoneNumber"];
                            $data["Рахбарми"] = $member["isLeader"]?'Рахбар':'Йўқ';
                            $data["вилояти"] = Province::find($member["region_id"])->region_name;
                            $data["тумани"] = District::find($member["district_id"])->district_name;
                            $data["уйманзили"] = $member["homeAddress"];
                            $data["партияга азо булган сана"] = $member["unionJoinDate"];
                            $data["пария гувохнома рақами"] = $member["unionCertfNumber"];
                            $data["бадал тўлайдими"] = $member["isFeePaid"]?'Ха':'Йўқ';
                            $data["Ижтимоий тоифаси"] = SocialCategory::find($member["socialPositionId"])->soc_name;
                            $data["Бпт йигилиш қарори рақами"] = $member["unionOrderNumber"];
                            $data["Бпт номи"] = BPT::find($member["bpt_id"])->bpt_name;
                            $gdata[] = $data;
                        }
                        $sheet->fromArray($gdata);
                    });
                })->download('xlsx');
            }
            if(Auth::user()->role_id==1){//for regionManager
                $dist_name = Province::find(Auth::user()->region_id)->region_name;
                Excel::create('A\'золар '.$dist_name.' '.date('Y-m-d'), function($excel) {
                    $excel->setTitle('А\'золар '.date('Y-m-d'));
                    $excel->setCreator(Auth::user()->name)
                        ->setCompany(Auth::user()->email);
                    $excel->setDescription('Азолар '.date('Y-m-d'));
                    $excel->sheet('А\'золар', function($sheet) {
                        $members=Members::where(['is_deleted'=>0,'region_id'=>Auth::user()->region_id])->get()->toArray();
                        $gdata = [];
                        foreach ($members as $member){
                            $data["Тартиб рақами"] = $member["id"];
                            $data["Исми"] = $member["fullName"];
                            $data["тугилган сана"] = $member["birthday"];
                            $data["Жинси"] = Sex::find($member["sex_id"])->sex_name;
                            $data["Миллати"] = Nation::find($member["nationality_id"])->nation_name;
                            $data["Паспорт серия рақами"] = $member["passSerial"];
                            $data["Қайердан берилган"] = $member["passGivenFrom"];
                            $data["Берилган сана"] = $member["passGivenDate"];
                            $data["Амал қилиш муддати"] = $member["passExpireDate"];
                            $data["касби"] = $member["specialist"];
                            $data["иш жойи ва лавозими"] = $member["workPlaceAndPosition"];
                            $data["телефон рақами"] = $member["phoneNumber"];
                            $data["Рахбарми"] = $member["isLeader"]?'Рахбар':'Йўқ';
                            $data["вилояти"] = Province::find($member["region_id"])->region_name;
                            $data["тумани"] = District::find($member["district_id"])->district_name;
                            $data["уйманзили"] = $member["homeAddress"];
                            $data["партияга азо булган сана"] = $member["unionJoinDate"];
                            $data["пария гувохнома рақами"] = $member["unionCertfNumber"];
                            $data["бадал тўлайдими"] = $member["isFeePaid"]?'Ха':'Йўқ';
                            $data["Ижтимоий тоифаси"] = SocialCategory::find($member["socialPositionId"])->soc_name;
                            $data["Бпт йигилиш қарори рақами"] = $member["unionOrderNumber"];
                            $data["Бпт номи"] = BPT::find($member["bpt_id"])->bpt_name;
                            $gdata[] = $data;
                        }
                        $sheet->fromArray($gdata);
                    });
                })->download('xlsx');
            }
            if(Auth::user()->role_id==2){//for districtManager
                $dist_name = District::find(Auth::user()->district_id)->district_name;
                Excel::create('A\'золар '.$dist_name.' '.date('Y-m-d'), function($excel) {
                    $excel->setTitle('А\'золар '.date('Y-m-d'));
                    $excel->setCreator(Auth::user()->name)
                        ->setCompany(Auth::user()->email);
                    $excel->setDescription('Азолар '.date('Y-m-d'));
                    $excel->sheet('А\'золар', function($sheet) {
                        $members=Members::where(['is_deleted'=>0,'district_id'=>Auth::user()->district_id])->get()->toArray();
                        $gdata = [];
                        foreach ($members as $member){
                            $data["Тартиб рақами"] = $member["id"];
                            $data["Исми"] = $member["fullName"];
                            $data["тугилган сана"] = $member["birthday"];
                            $data["Жинси"] = Sex::find($member["sex_id"])->sex_name;
                            $data["Миллати"] = Nation::find($member["nationality_id"])->nation_name;
                            $data["Паспорт серия рақами"] = $member["passSerial"];
                            $data["Қайердан берилган"] = $member["passGivenFrom"];
                            $data["Берилган сана"] = $member["passGivenDate"];
                            $data["Амал қилиш муддати"] = $member["passExpireDate"];
                            $data["касби"] = $member["specialist"];
                            $data["иш жойи ва лавозими"] = $member["workPlaceAndPosition"];
                            $data["телефон рақами"] = $member["phoneNumber"];
                            $data["Рахбарми"] = $member["isLeader"]?'Рахбар':'Йўқ';
                            $data["вилояти"] = Province::find($member["region_id"])->region_name;
                            $data["тумани"] = District::find($member["district_id"])->district_name;
                            $data["уйманзили"] = $member["homeAddress"];
                            $data["партияга азо булган сана"] = $member["unionJoinDate"];
                            $data["пария гувохнома рақами"] = $member["unionCertfNumber"];
                            $data["бадал тўлайдими"] = $member["isFeePaid"]?'Ха':'Йўқ';
                            $data["Ижтимоий тоифаси"] = SocialCategory::find($member["socialPositionId"])->soc_name;
                            $data["Бпт йигилиш қарори рақами"] = $member["unionOrderNumber"];
                            $data["Бпт номи"] = BPT::find($member["bpt_id"])->bpt_name;
                            $gdata[] = $data;
                        }
                        $sheet->fromArray($gdata);
                    });
                })->download('xlsx');
            }
        }elseif($name=='bpt'){
            if(Auth::user()->role_id==3){//for Hotamjon Ketmonov
                Excel::create('БПТлар '.date('Y-m-d'), function($excel) {
                    $excel->setTitle('БПТлар '.date('Y-m-d'));
                    $excel->setCreator(Auth::user()->name)
                        ->setCompany(Auth::user()->email);
                    $excel->setDescription('БПТлар '.date('Y-m-d'));
                    $excel->sheet('БПТлар', function($sheet) {
                        $members = Members::where('is_deleted',0)->get()->toArray();
                        $gdata = [];
                        foreach ($members as $member){
                            $data["Тартиб рақами"] = $member["bpt_id"];
                            $data["БПТ номи"] = $member["bpt_name"];
                            $data["БПТ сохаси номи"] = BptSpecies::find($member["bpt_speciality_id"])->bpt_spec_name;
                            $data["БПТ манзили"] = $member["bpt_address"];
                            $data["М.Ф.Й ми ?"] = $member["bpt_is_mfy"]?'м.ф.й':'м.ф.й эмас';
                            $data["Вилояти"] = Province::find($member["bpt_region_id"])->region_name;
                            $data["Тумани"] = District::find($member["bpt_district_id"])->district_name;
                            $data["Партия номи"] = Council::find($member["bpt_party_id"])->party_name;
                            $data["БПТ ташкил топган сана"] = $member["bpt_establish_date"];
                            $gdata[] = $data;
                        }
                        $sheet->fromArray($gdata);
                    });
                })->download('xlsx');
            }
            if(Auth::user()->role_id==1){//for regionManager
                $dist_name = Province::find(Auth::user()->region_id)->region_name;
                Excel::create('A\'золар '.$dist_name.' '.date('Y-m-d'), function($excel) {
                    $excel->setTitle('А\'золар '.date('Y-m-d'));
                    $excel->setCreator(Auth::user()->name)
                        ->setCompany(Auth::user()->email);
                    $excel->setDescription('Азолар '.date('Y-m-d'));
                    $excel->sheet('А\'золар', function($sheet) {
                        $members=Members::where(['is_deleted'=>0,'region_id'=>Auth::user()->region_id])->get()->toArray();
                        $gdata = [];
                        foreach ($members as $member){
                            $data["Тартиб рақами"] = $member["id"];
                            $data["Исми"] = $member["fullName"];
                            $data["тугилган сана"] = $member["birthday"];
                            $data["Жинси"] = Sex::find($member["sex_id"])->sex_name;
                            $data["Паспорт серия рақами"] = $member["passSerial"];
                            $data["Қайердан берилган"] = $member["passGivenFrom"];
                            $data["Берилган сана"] = $member["passGivenDate"];
                            $data["Амал қилиш муддати"] = $member["passExpireDate"];
                            $data["касби"] = $member["specialist"];
                            $data["иш жойи ва лавозими"] = $member["workPlaceAndPosition"];
                            $data["телефон рақами"] = $member["phoneNumber"];
                            $data["Рахбарми"] = $member["isLeader"]?'Рахбар':'Йўқ';
                            $data["вилояти"] = Province::find($member["region_id"])->region_name;
                            $data["тумани"] = District::find($member["district_id"])->district_name;
                            $data["уйманзили"] = $member["homeAddress"];
                            $data["партияга азо булган сана"] = $member["unionJoinDate"];
                            $data["пария гувохнома рақами"] = $member["unionCertfNumber"];
                            $data["бадал тўлайдими"] = $member["isFeePaid"]?'Ха':'Йўқ';
                            $data["Ижтимоий тоифаси"] = SocialCategory::find($member["socialPositionId"])->soc_name;
                            $data["Бпт йигилиш қарори рақами"] = $member["unionOrderNumber"];
                            $data["Бпт номи"] = BPT::find($member["bpt_id"])->bpt_name;
                            $gdata[] = $data;
                        }
                        $sheet->fromArray($gdata);
                    });
                })->download('xlsx');
            }
            if(Auth::user()->role_id==2){//for districtManager
                $dist_name = District::find(Auth::user()->district_id)->district_name;
                Excel::create('A\'золар '.$dist_name.' '.date('Y-m-d'), function($excel) {
                    $excel->setTitle('А\'золар '.date('Y-m-d'));
                    $excel->setCreator(Auth::user()->name)
                        ->setCompany(Auth::user()->email);
                    $excel->setDescription('Азолар '.date('Y-m-d'));
                    $excel->sheet('А\'золар', function($sheet) {
                        $members=Members::where(['is_deleted'=>0,'district_id'=>Auth::user()->district_id])->get()->toArray();
                        $gdata = [];
                        foreach ($members as $member){
                            $data["Тартиб рақами"] = $member["id"];
                            $data["Исми"] = $member["fullName"];
                            $data["тугилган сана"] = $member["birthday"];
                            $data["Жинси"] = Sex::find($member["sex_id"])->sex_name;
                            $data["Паспорт серия рақами"] = $member["passSerial"];
                            $data["Қайердан берилган"] = $member["passGivenFrom"];
                            $data["Берилган сана"] = $member["passGivenDate"];
                            $data["Амал қилиш муддати"] = $member["passExpireDate"];
                            $data["касби"] = $member["specialist"];
                            $data["иш жойи ва лавозими"] = $member["workPlaceAndPosition"];
                            $data["телефон рақами"] = $member["phoneNumber"];
                            $data["Рахбарми"] = $member["isLeader"]?'Рахбар':'Йўқ';
                            $data["вилояти"] = Province::find($member["region_id"])->region_name;
                            $data["тумани"] = District::find($member["district_id"])->district_name;
                            $data["уйманзили"] = $member["homeAddress"];
                            $data["партияга азо булган сана"] = $member["unionJoinDate"];
                            $data["пария гувохнома рақами"] = $member["unionCertfNumber"];
                            $data["бадал тўлайдими"] = $member["isFeePaid"]?'Ха':'Йўқ';
                            $data["Ижтимоий тоифаси"] = SocialCategory::find($member["socialPositionId"])->soc_name;
                            $data["Бпт йигилиш қарори рақами"] = $member["unionOrderNumber"];
                            $data["Бпт номи"] = BPT::find($member["bpt_id"])->bpt_name;
                            $gdata[] = $data;
                        }
                        $sheet->fromArray($gdata);
                    });
                })->download('xlsx');
            }
        }
    }
}

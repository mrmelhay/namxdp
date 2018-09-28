<?php

namespace App\Http\Controllers;

use App\BPT;
use App\Council;
use App\District;
use App\Members;
use App\Nation;
use App\Province;
use App\Home;
use App\Sex;
use App\SocialCategory;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class BaseController extends Controller
{
    //

    public $data=[];
    public $valid=[];
    public $menus=[];
//    public $council=[];
    public $users=[];
    public $sex=[];
    public $region=[];
    public $bpt=[];
    public $soc_cats=[];
    public $nation=[];
    public $district=[];

    public function __construct()
    {
        $this->middleware('auth');
        $this->rules=$this->validationRules();
        $this->region=$this->getAllRegions();
        $this->bpt=$this->getAllBpt();
        $this->users=$this->getAllUsers();
//        $this->council=$this->getAllCouncils();
        $this->sex=$this->getAllSexes();
        $this->nation=$this->getAllnations();
        $this->soc_cats=$this->getSocialCategories();
        $this->menus = $this->getAllMenus();
        $this->data['menus']=$this->menus;
        $this->district=$this->getAllDistricts();
    }

//    public function getAllCouncils(){
//        return Council::all();
//    }

    public function getAllUsers(){
        return User::all();
    }

    public function getAllRegions(){
        return Province::all();
    }

    public function getAllSexes(){
        return Sex::all();
    }

    public function getAllnations(){
        return Nation::all();
    }

    public function getAllMenus(){
        return Home::getAllMenus();
    }

    public function getAllBpt(){
        return BPT::all();
    }

    public function getAllDistricts(){
        $district=District::all();
        return $district;
    }

    public function getSocialCategories(){
        $cats=SocialCategory::all();
        return $cats;
    }

    public function validationRules($method=false){
        if($method){return  [
            'fullName' => 'required|string|min:7',
            'birthDay' => 'required|date',
            'sex_id' => 'required|integer',
            'nationality_id' => 'required|integer',
            'passSerial' => 'required|min:13',
            'passGivenFrom' => 'required|string|min:20',
            'passGivenDate' => 'required|date',
            'passExpireDate' => 'required|date',
            'specialist' => 'required|string|min:4',
            'workPlaceAndPosition' => 'required|string|min:20',
            'phoneNumber' => 'required|string|min:20',
            'isLeader' => 'required|integer',
//            'isXdpMember' => '',
            'region_id' => 'required|integer',
            'district_id' => 'required|integer',
            'homeAddress' => 'required|string|min:10',
            'unionJoinDate' => 'required|date',
            'unionOrderNumber' => 'required',
            'unionCertfNumber' => 'required',
            'bpt_id' => 'required|integer',
            'isFeePaid' => 'required|integer',
            'socialPositionId' => 'required|integer'
        ];}else{
            return  [
                'fullName' => 'required|string|min:7',
                'birthDay' => 'required|date',
                'sex_id' => 'required|integer',
                'nationality_id' => 'required|integer',
                'passSerial' => 'required|min:13',
                'passGivenFrom' => 'required|string|min:10',
                'passGivenDate' => 'required|date',
                'passExpireDate' => 'required|date',
                'specialist' => 'required|string|min:4',
                'workPlaceAndPosition' => 'required|string|min:5',
                'phoneNumber' => 'required|string|unique:members|min:20',
                'isLeader' => 'required|integer',
//            'isXdpMember' => '',
                'region_id' => 'required|integer',
                'district_id' => 'required|integer',
                'homeAddress' => 'required|string|min:7',
                'unionJoinDate' => 'required|date',
                'unionOrderNumber' => 'required',
                'unionCertfNumber' => 'required',
                'bpt_id' => 'required|integer',
                'isFeePaid' => 'required|integer',
                'socialPositionId' => 'integer'
            ];
        }
    }

    public function customValidate(Request $request , $id=null , $method=false){
        if($method){
            $valid = Validator::make($request->all(),$this->validationRules(1));
            if($valid->fails()){
                $this->valid = $valid;
                return false;
            }else{
                $updated = Members::findOrFail($id);
                $updated
                    ->update($request->except('_token','_method'));
                return ($updated);
            }
        }else{
            $valid = Validator::make($request->all(),$this->validationRules());
            if($valid->fails()){
                $this->valid = $valid;
                return false;
            }else{
                $record = Members::insert($request->except('_token','_method'));
                return ($record);
            }
        }
    }
}

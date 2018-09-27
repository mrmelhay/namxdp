<?php

namespace App\Http\Controllers;

use App\District;
use App\Members;
use App\Nation;
use App\Province;
use App\Home;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BaseController extends Controller
{
    //

    public $data=[];
    public $menus=[];
    public $region=[];
    public $nation=[];
    public $district=[];

    public function __construct()
    {
        $this->middleware('auth');
        $this->rules=$this->validationRules();
        $this->region=$this->getAllRegions();
        $this->nation=$this->getAllnations();
        $this->menus = $this->getAllMenus();
        $this->data['menus']=$this->menus;
        $this->data['districts']=$this->getAllDistricts();
    }

    public function getAllRegions(){
        return Province::all();
    }

    public function getAllnations(){
        return Nation::all();
    }

    public function getAllMenus(){
        return Home::getAllMenus();
    }

    public function getAllDistricts(){
        $district=District::with('districts')->get();
        return $district;
    }

    public function validationRules(){
        return  [
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
            'phoneNumber' => 'required|string|unique:members|min:20',
            'isLeader' => 'required|integer',
//            'isXdpMember' => '',
            'region_id' => 'required|integer',
            'district_id' => 'required|integer',
            'homeAddress' => 'required|string|min:10',
            'unionJoinDate' => 'required|date',
            'unionOrderNumber' => 'required',
            'unionCertfNumber' => 'required',
            'isFeePaid' => 'required|integer',
            'socialPositionId' => 'required|integer'
        ];
    }

    public function customValidate(Request $request){
        $valid = Validator::make($request->all(),$this->validationRules());
        if($valid->fails()){
            return redirect()->back()->withErrors($valid)->withInput();
        }else{
            $record = Members::insert($request->except('_token','_method'));
            return ($record);
        }
    }
}

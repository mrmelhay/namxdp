<?php

namespace App\Http\Controllers;

use App\Home;
use App\Preferences;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Validator;

class PreferencesController extends BaseController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
       $this->data['assets'] = Preferences::getAssets();
       return view('preferences.asset.assets', $this->data);
    }

    public function getProvince(){

        $this->data['title']="Вилоятлар";
        $this->data['regions']=$this->region;
        return view('preferences.province', $this->data);

    }

    public function store(Request $request)
    {
        $rules = [
            'fullName' => 'required|string|min:7',
            'birthDay' => 'required|date',
            'sex_id' => 'required|integer',
            'nationality' => 'required|integer',
            'passInfo' => 'required|min:13',
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
            'unionOrderNumber' => 'required|integer',
            'unionCertfNumber' => 'required|integer',
            'isFeePaid' => 'required|integer',
            'socialPosition' => 'required|integer'
        ];
        $valid = Validator::make($request->all(),$rules);
//        $validatedData = $this->validate($request,);

        if($valid->fails()){
            return redirect()->back()->withErrors($valid)->withInput();
        }else{
            dd('jj');
        }


        dd($request->validated());
//        dd($request);
        $this->index();

    }

    public function create()
    {
        $this->data['title']="Азоларни руйхатга олиш";
        $this->data['regions']=$this->region;
        $this->data['nations']=$this->nation;
        return view('preferences.asset.store_assets', $this->data);

    }

    public function getDistrict(){
        $this->data['title']="Туман/Шахар";
        return view('preferences.district', $this->data);
    }




}

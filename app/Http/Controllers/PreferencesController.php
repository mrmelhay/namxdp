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

    public function getProvince(){

        $this->data['title']="Вилоятлар";
        $this->data['regions']=$this->region;
        return view('preferences.province', $this->data);

    }

    public function getDistrict(){
        $this->data['title']="Туман/Шахар";
        return view('preferences.district', $this->data);
    }




}

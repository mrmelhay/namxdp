<?php

namespace App\Http\Controllers;

use App\Home;
use App\Preferences;
use Illuminate\Http\Request;

class PreferencesController extends BaseController
{


    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
       $this->data['assets'] = Preferences::getAssets();
       return view('preferences.assets', $this->data);
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

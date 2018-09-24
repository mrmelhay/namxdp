<?php

namespace App\Http\Controllers;

use App\District;
use App\Province;
use App\Home;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    //

    public $data=[];
    public $menus=[];
    public $region=[];
    public $district=[];

    public function __construct()
    {
        $this->middleware('auth');
        $this->region=$this->getAllRegions();
        $this->menus = $this->getAllMenus();
        $this->data['menus']=$this->menus;
        $this->data['districts']=$this->getAllDistricts();
    }

    public function getAllRegions(){
        return Province::all();
    }

    public function getAllMenus(){
        return Home::getAllMenus();
    }

    public function getAllDistricts(){
        $district=District::with('districts')->get();
        return $district;
    }
}

<?php

namespace App\Http\Controllers;

use App\District;
use Illuminate\Http\Request;

class DistrictController extends BaseController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $this->data["districts"]=$this->district;
        return view('preferences.district.district',$this->data);
    }

    public function action(Request $request){

        $action=$request->action;
        $template="";
        switch ($action){

            case 'add':
               $template='preferences.adddistrict';
               $this->data['regions']=$this->region;
                break;
            case 'edit':
                $template='preferences.editdistrict';
                break;
            case 'delete':
                break;
            case 'update':
                break;
            case 'save':
                $this->addDistrict($request);
                break;
        }
        return view($template,$this->data);
    }


    private function addDistrict(Request $request){

        $district=new District();
        $district->region_id=$request->input('region_id');
        $district->district_name=$request->input('district_name');
        $district->save();
        return redirect()->route("district");

    }
}

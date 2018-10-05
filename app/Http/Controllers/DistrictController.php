<?php

namespace App\Http\Controllers;

use App\District;
use Illuminate\Http\Request;

class DistrictController extends BaseController
{

    public function __construct()
    {
        parent::__construct();
        $this->data['regions']=$this->region;
        $this->data["districts"]=$this->district;
    }

    public function index(){

        return view('preferences.district.district',$this->data);
    }

    public function action(Request $request){

        $action=$request->action;
        $template="";
        switch ($action){

            case 'add':
               $template='preferences.adddistrict';
                view($template,$this->data);
                break;
            case 'edit':
                $this->data['district']=$this->getDistrict($request->id);
                $template='preferences.district.editdistrict';
                return view($template,$this->data);

                break;
            case 'delete':
                $this->deleteDistrict($request);
                return redirect()->action('DistrictController@index');
                break;
            case 'update':
                $this->updateDistrict($request);
                return redirect()->action('DistrictController@index');
                break;
            case 'save':
                $this->addDistrict($request);
                return redirect()->action('DistrictController@index');
                break;
        }

    }


    private function addDistrict(Request $request){

        $district=new District();
        $district->region_id=$request->input('region_id');
        $district->district_name=$request->input('district_name');
        $district->save();
        return redirect()->route("district");
    }


    public function getDistrict($id){
         return District::where('district_id',$id)->get();
    }

    public function updateDistrict(Request $request){
        $update = District::findOrFail($request->id);
        $update->update($request->except('_token', '_method'));
        return $update;
    }

    public function deleteDistrict(Request $request){
        District::where('district_id',$request->id)->delete();
    }
}

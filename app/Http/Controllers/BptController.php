<?php

namespace App\Http\Controllers;

use App\BPT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BptController extends BaseController
{

    public function index()
    {
        $this->data['title']="Boshlang'ich partiya tashkilotlari";
        $this->data['bpts']=$this->bpt;
        return view('preferences.bpt.index', $this->data);
    }

    public function create()
    {
        $this->data["regions"] = $this->getAllRegions();
        $this->data["councils"] = $this->getAllCouncils();
        return view('preferences.bpt.store',$this->data);
    }


    public function store(Request $request)
    {
        $data = [];
        foreach($request->all() as $key => $value){
            if($key!='_token' && $key!='_method'){
                $data[$key] = $value;
            }
        }
        if($this->customValidates($request)){
            return $this->index();
        }else{
            return redirect()->back()->withErrors($this->valid)->withInput();
        }

    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    protected function validationRule($method=false){
        if($method){
            return  [
            'bpt_name' => 'required',
            'bpt_speciality' => 'required',
            'bpt_address' => 'required',
            'bpt_is_mfy' => 'required',
            'bpt_region_id' => 'integer',
            'bpt_district_id' => 'integer',
            'bpt_party_id' => 'required|integer'
        ];}else{
            return  [
                'bpt_name' => 'required',
                'bpt_speciality' => 'required',
                'bpt_address' => 'required',
                'bpt_is_mfy' => 'required',
                'bpt_region_id' => 'required|integer',
                'bpt_district_id' => 'required|integer',
                'bpt_party_id' => 'required|integer'
            ];
        }
    }

    public function customValidates(Request $request , $id=null , $method=false){
        if($method){
            $valid = Validator::make($request->all(),$this->validationRule(1));
            if($valid->fails()){
                $this->valid = $valid;
                return false;
            }else{
                $updated = BPT::findOrFail($id);
                $updated
                    ->update($request->except('_token','_method'));
                return ($updated);
            }
        }else{
            $valid = Validator::make($request->all(),$this->validationRule());
            if($valid->fails()){
                $this->valid = $valid;
                return false;
            }else{
                $record = BPT::insert($request->except('_token','_method'));
                return ($record);
            }
        }
    }
}
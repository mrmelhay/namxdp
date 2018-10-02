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
        $this->data['regions']=$this->getAllRegions();
        $this->data['councils']=$this->getAllCouncils();
        return view('preferences.bpt.index', $this->data);
    }

    public function create()
    {
        $this->data["regions"] = $this->getAllRegions();
        $this->data["councils"] = $this->getAllCouncils();
        $this->data["councils"] = $this->getAllCouncils();
        return view('preferences.bpt.store',$this->data);
    }


    public function store(Request $request)
    {
        if($this->customValidates($request)){
            return $this->index();
        }else{
            return redirect()->back()->withErrors($this->valid)->withInput();
        }

    }


    public function show(Request $request, $id)
    {
//        echo'sdoij';
    }

    public function edit($id)
    {
        if(is_numeric($id)){
            $this->data["regions"] = $this->getAllRegions();
            $this->data["councils"] = $this->getAllCouncils();
            $this->data["bpt"] = BPT::findOrFail($id);
            return view('preferences.bpt.edit', $this->data);

        }else{
            abort(404);
        }
    }

    public function update(Request $request, $id)
    {
        if(is_numeric($id)){
            if($this->customValidates($request , $id, 1)){
                return redirect()->to('/bpt');
            }else{
                return redirect()->back()->withErrors($this->valid)->withInput();
            }
        }else{
            abort(404);
        }
    }

    public function destroy($id)
    {
        if(is_numeric($id)){
            $bpt = \App\BPT::find($id);
            $bpt->update([
                'is_deleted' => 1
            ]);
            return ($bpt)? redirect()->to('/bpt'):abort(404);
        }else{
            abort(404);
        }
    }

    public function search(\Illuminate\Http\Request $request){

    }

    protected function validationRule($method=false){
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

    public function customValidates(Request $request , $id=null , $method=false){
        if($method){
            $valid = Validator::make($request->all(),$this->validationRule(1));
            if($valid->fails()){
                $this->valid = $valid;
                return false;
            }else{
                $updated = BPT::findOrFail($id);
                $updated->update($request->except('_token','_method'));
                return true;
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
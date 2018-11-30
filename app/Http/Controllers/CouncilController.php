<?php

namespace App\Http\Controllers;

use App\Council;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CouncilController extends BaseController
{

    public function index(){
        $this->data["title"]="Partiyalar";
        $this->data["parties"]=$this->council;
        return view('preferences.council.index',$this->data);
    }


    public function create()
    {
        $this->data["title"]="Partiyalar";
        $this->data["parties"]=$this->council;
        $this->data["regions"]=$this->getAllRegions();
        return view('preferences.council.store',$this->data);
    }


    public function store(Request $request)
    {
        if($this->customValidates($request)){
            return redirect()->to('council');
        }else{
            return redirect()->back()->withErrors($this->valid)->withInput();
        }
    }

    protected function validationRule($method=false){
        return  [
            'party_name' => 'required',
            'party_address' => 'required',
            'party_director' => 'required',
            'party_phone' => 'required',
            'party_region_id' => 'required|integer',
            'party_distirict_id' => 'required|integer',
        ];
    }

    public function customValidates(Request $request , $id=null , $method=false){
        if($method){
            $valid = Validator::make($request->all(),$this->validationRule(1));
            if($valid->fails()){
                $this->valid = $valid;
                return false;
            }else{
                $updated = Council::findOrFail($id);
                $updated->update($request->except('_token','_method'));
                return true;
            }
        }else{
            $valid = Validator::make($request->all(),$this->validationRule());
            if($valid->fails()){
                $this->valid = $valid;
                return false;
            }else{
                $record = Council::insert($request->except('_token','_method'));
                return true;
            }
        }
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        if(is_numeric($id)){
            $this->data["regions"] = $this->getAllRegions();
            $this->data["council"] = Council::findOrFail($id);
            return view('preferences.council.edit', $this->data);
        }else{
            abort(404);
        }
    }

    public function update(Request $request, $id)
    {
        if(is_numeric($id)){
            if($this->customValidates($request , $id, 1)){
                return redirect()->to('/council');
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
            $bpt = \App\Council::findOrFail($id);
            $bpt->update([
                'is_deleted' => 1
            ]);
            return ($bpt)? redirect()->to('/council'):abort(404);
        }else{
            abort(404);
        }
    }
}

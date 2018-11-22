<?php

namespace App\Http\Controllers;

use App\BptSpecies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BptSpeciesController extends BasesController
{

    public function index()
    {
        $this->data['bpt_specs']=\App\BptSpecies::all();
        return view('preferences.bpt_spec.index', $this->data);
    }

    public function create()
    {
        return view('preferences.bpt_spec.store');
    }


    public function store(Request $request)
    {
        if($this->customValidates($request)){
            return redirect()->to('/bpt_spec');
        }else{
            return redirect()->back()->withErrors($this->valid)->withInput();
        }

    }


    public function show($id)
    {
//        echo'sdoij';
    }

    public function edit($id)
    {
        if(is_numeric($id)){
            return view('preferences.bpt_spec.edit', ['bpt_spec'=>BptSpecies::findOrFail($id)]);
        }else{
            abort(404);
        }
    }

    public function update(Request $request, $id)
    {
        if(is_numeric($id)){
            if($this->customValidates($request , $id, 1)){
                return redirect()->to('/bpt_spec');
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
            $bpt = \App\BptSpecies::findOrFail($id)->delete();
            return ($bpt)? redirect()->to('/bpt_spec'):abort(404);
        }else{
            abort(404);
        }
    }

    protected function validationRule($method=false){
        return  [
            'bpt_spec_name' => 'required'
        ];
    }

    public function customValidates(Request $request , $id=null , $method=false){
        if($method){
            $valid = Validator::make($request->all(),$this->validationRule(1));
            if($valid->fails()){
                $this->valid = $valid;
                return false;
            }else{
                $updated = BptSpecies::findOrFail($id);
                $updated->update($request->except('_token','_method'));
                return true;
            }
        }else{
            $valid = Validator::make($request->all(),$this->validationRule());
            if($valid->fails()){
                $this->valid = $valid;
                return false;
            }else{
                BptSpecies::insert($request->except('_token','_method'));
                return (true);
            }
        }
    }
}
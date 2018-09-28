<?php

namespace App\Http\Controllers;

use App\Members;
use App\Preferences;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MemberController extends BaseController
{
    public function index()
    {
        $this->data['assets'] = Preferences::getAssets();
        $this->data['members'] = Members::where('is_deleted',0)->paginate(20);
        return view('preferences.membership.index', $this->data);
    }






    public function store(Request $request)
    {
        if($this->customValidate($request)){
            return $this->index();
        }else{
            return redirect()->back()->withErrors($this->valid)->withInput();
        }
    }

    public function create()
    {
        $this->data['title']="Азоларни  руйхатга  олиш";
        $this->data['regions']=$this->region;
        $this->data['nations']=$this->nation;
        $this->data['bpts']=$this->bpt;
        $this->data['soc_cats']=$this->soc_cats;
        return view('preferences.membership.add', $this->data);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        if(is_numeric($id)){
            $member = Members::findAndCheck($id);
            $this->data['title']="Азоларни  руйхатга  олиш";
            $this->data['regions']=$this->region;
            $this->data['bpts']=$this->bpt;
            $this->data['member']=$member;
            $this->data['soc_cats']=$this->soc_cats;
            $this->data['nations']=$this->nation;
            return view('preferences.membership.edit',$this->data);
        }else{
            abort(404,['Kechirasiz siz qidirgan sahifa hozirda mavjud emas!']);
        }
    }

    public function update(Request $request, $id)
    {
        if(is_numeric($id)){
            if($this->customValidate($request, $id,1)){
                return $this->index();
            }else{
                return redirect()->back()->withErrors($this->valid)->withInput();
            }
        }else{
            abort(404);
        }
    }

    public function destroy($id)
    {
        //
    }
}

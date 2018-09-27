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
        $this->data['members'] = Members::all();
        return view('preferences.asset.assets', $this->data);
    }

    public function store(Request $request)
    {
        if($this->customValidate($request)){ return $this->index();}else{abort(404);}
    }

    public function create()
    {
        $this->data['title']="Азоларни руйхатга олиш";
        $this->data['regions']=$this->region;
        $this->data['nations']=$this->nation;
        return view('preferences.asset.store_assets', $this->data);

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        echo $id;
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}

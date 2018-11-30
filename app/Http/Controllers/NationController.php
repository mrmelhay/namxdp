<?php

namespace App\Http\Controllers;

use App\Nation;
use Illuminate\Http\Request;
use Symfony\Component\CssSelector\Parser\Reader;

class NationController extends BaseController
{

    public function index()
    {
        $this->data['title']="Millatlar";
        $this->data['nations']=$this->nation;
        return view('preferences.nation.index', $this->data);
    }

    public function create()
    {
        return view('preferences.nation.store');
    }

    public function store(Request $request)
    {
        if($request->nation_name!==null){
            Nation::insert([
                'nation_name'=>$request->nation_name
            ]);
            return redirect()->to('nation');
        }else{return redirect()->back();}
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        return view('preferences.nation.edit', ['nation'=>Nation::findOrFail($id)]);
    }

    public function update(Request $request,$id)
    {
        if(is_numeric($id) && $request->nation_name!==null){
            Nation::findOrFail($id)->update($request->all());
            return view('preferences.nation.index', ['nations'=>Nation::all()]);
        }else{return redirect()->back();}
    }

    public function destroy(Request $request)
    {
        if(is_numeric($request->nation_id)){
            if(Nation::del($request->nation_id)){
                return view('preferences.nation.index', ['nations'=>Nation::all()]);
            }else{
                abort(404);
            }
        }else{return redirect()->back();}
    }
}

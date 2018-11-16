<?php

namespace App\Http\Controllers;

use App\SocialCategory;
use App\SocialCats;
use Illuminate\Http\Request;

class SocialCatsController extends BasesController
{

    public function index()
    {
        $this->data['title']="Ijtimoiy toifalar";
        $this->data['socs']=$this->soc_cats;
        return view('preferences.socs.index', $this->data);
    }


    public function create()
    {
        return view('preferences.socs.add');
    }


    public function store(Request $request)
    {
        if($request->soc_name!==null){
            SocialCategory::insert([
                'soc_name'=>$request->soc_name
            ]);
            return redirect()->to('socCats');
        }else{return redirect()->back();}
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        return view('preferences.socs.edit', ['soc'=>SocialCategory::findOrFail($id)]);
    }


    public function update(Request $request, $id)
    {
        if(is_numeric($id) && $request->soc_name!==null){
            SocialCategory::findOrFail($id)->update($request->all());
            return view('preferences.socs.index', ['socs'=>SocialCategory::all()]);
        }else{return redirect()->back();}
    }


    public function destroy($id)
    {
        if(is_numeric($id)){
            if(SocialCategory::find($id)->delete()){
                return view('preferences.socs.index', ['socs'=>SocialCategory::all()]);
            }else{
                abort(404);
            }
        }else{return redirect()->back();}
    }
}

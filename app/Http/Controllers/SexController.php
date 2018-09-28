<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SexController extends BaseController
{

    public function index()
    {
        $this->data['title']="Jins";
        $this->data['sexes']=$this->sex;
        return view('preferences.sex.index', $this->data);
    }


    public function create()
    {

    }


    public function store(Request $request)
    {
        //
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
}

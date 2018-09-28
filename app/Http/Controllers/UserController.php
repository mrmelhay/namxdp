<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends BaseController
{

    public function index()
    {
        $this->data['title']="Foydalanuvchilar";
        $this->data['users']=$this->users;
        return view('preferences.user.index', $this->data);
    }


    public function create()
    {
        //
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

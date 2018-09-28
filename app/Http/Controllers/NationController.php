<?php

namespace App\Http\Controllers;

use App\Nation;
use Illuminate\Http\Request;

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
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Nation $nation)
    {
        //
    }

    public function edit(Nation $nation)
    {
        //
    }

    public function update(Request $request, Nation $nation)
    {
        //
    }

    public function destroy(Nation $nation)
    {
        //
    }
}

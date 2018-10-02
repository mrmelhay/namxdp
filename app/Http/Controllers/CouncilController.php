<?php

namespace App\Http\Controllers;

use App\Council;
use Illuminate\Http\Request;

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
        //
    }


    public function show(Council $council)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Council  $council
     * @return \Illuminate\Http\Response
     */
    public function edit(Council $council)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Council  $council
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Council $council)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Council  $council
     * @return \Illuminate\Http\Response
     */
    public function destroy(Council $council)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Council;
use Illuminate\Http\Request;

class CouncilController extends BaseController
{

    public function index(){
//        $this->data["councils"]=$this->council;
//        return view('preferences.district.district',$this->data);
    }

    public function create()
    {
        //
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

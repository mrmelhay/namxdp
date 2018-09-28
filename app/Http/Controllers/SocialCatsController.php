<?php

namespace App\Http\Controllers;

use App\SocialCats;
use Illuminate\Http\Request;

class SocialCatsController extends BaseController
{

    public function index()
    {
        $this->data['title']="Ijtimoiy toifalar";
        $this->data['socs']=$this->soc_cats;
        return view('preferences.socs.index', $this->data);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(SocialCats $socialCats)
    {
        //
    }


    public function edit(SocialCats $socialCats)
    {
        //
    }


    public function update(Request $request, SocialCats $socialCats)
    {
        //
    }


    public function destroy(SocialCats $socialCats)
    {
        //
    }
}

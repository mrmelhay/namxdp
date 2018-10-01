<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Home;

class HomeController  extends BaseController
{

    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
    }


    public function index()
    {
        return view('/',$this->data);
    }
}

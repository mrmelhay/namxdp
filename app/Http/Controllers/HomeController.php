<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Home;

class HomeController  extends Controller
{


    private $data=[];
    public function __construct()
    {
        $this->data['menus']=Home::getAllMenus();
        $this->middleware('auth');
    }


    public function index()
    {
        return view('home',$this->data);
    }
}

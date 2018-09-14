<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Home;

class HomeController  extends Controller
{


    private $menus;
    public function __construct()
    {
        $this->middleware('auth');
        $this->menus=new Home();
    }


    public function index()
    {
        $menus=$this->menus->getAllMenus();
        return view('home',compact('menus'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Home;
use App\Preferences;
use Illuminate\Http\Request;

class PreferencesController extends Controller
{

    private $data=[];

    public function __construct()
    {
        $this->middleware('auth');
        $this->data['menus'] = Home::getAllMenus();
    }

    public function index()
    {
        $this->data['assets'] = Preferences::getAssets();
       return view('preferences.assets', $this->data);
    }

    public function province(){

        $this->data['title']="Вилоятлар";
        return view('preferences.province', $this->data);

    }

    public function district(){
        $this->data['title']="Туман/Шахар";
        return view('preferences.district', $this->data);
    }




}

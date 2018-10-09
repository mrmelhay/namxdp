<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public static function index()
    {
        Auth::check();
        return view('home');
    }

    public static function import()
    {
        Auth::check();
        return view('home');
    }


}

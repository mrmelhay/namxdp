<?php

namespace App\Http\Controllers;

use App\Reports;
use Illuminate\Http\Request;

class ReportsController extends BaseController
{
    //

    public function index(){
        $page=new Reports();
        $this->data['reports']=$page->getAllMember();
        return view('reports.index',$this->data);
    }

}

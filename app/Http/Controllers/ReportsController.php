<?php

namespace App\Http\Controllers;

use App\BPT;
use App\Members;
use App\Reports;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportsController extends BaseController
{

    public $_3_5 = 0;
    public $_5_15 = 0;
    public $_15_25 = 0;
    public $_25_45 = 0;
    public $_40_60 = 0;
    public $_60_100 = 0;
    public $_100_ = 0;


     public function index(Request $request){

            switch ($request->action) {

                case "indexbptcheif":
                    $page = new Reports();
                    $this->data['reports'] = $page->getAllMemberBptCheif();
                    return view('reports.index', $this->data);
                    break;

                case "indexbtpcount":
                    $page = new Reports();
                    $this->data['reports'] = $page->getMembersBptCounter();
//                    $dddata = $page->getMembersBptCounter();
//                    $reg_id = Auth::user()->region_id;
//                    $users = DB::table('users')
//                        ->groupBy('account_id')
//                        ->having('account_id', '>', 100)
//                        ->get();
//                    $gg = Members::where('region_id',$reg_id)->groupBy('bpt_id')->get();
//                    foreach ($gg as $g){
//                        dd($gg);
//                    }
//                    dd($gg);
//                    dd($this->data);
                    return view('reports.indexbpt', $this->data);
                    break;

                case "indexbtpinfo":
                    $page = new Reports();
                    $this->data['reports'] = $page->getBptXdpInfo();
                    return view('reports.indexbptinfo', $this->data);
                    break;

                case "indexxdpinfo":
                    $page = new Reports();
                    $this->data['reports'] = $page->getMembersReports();
                    return view('reports.indexxdpinfo', $this->data);
                    break;

                case "indexbptspecial":
                    $page=new Reports();
                    $this->data['reports']=$page->getBptSpecial();
                    return view('reports.indexspecial',$this->data);
                    break;

                default:
                    $page = new Reports();
                    $this->data['reports'] = $page->getAllMemberBptCheif();
                    return view('reports.reportsform', $this->data);
                    break;
        }
    }

}

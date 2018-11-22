<?php

namespace App\Http\Controllers;

use App\Reports;
use Illuminate\Http\Request;

class ReportsController extends BasesController
{

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

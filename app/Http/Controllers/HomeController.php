<?php

namespace App\Http\Controllers;

use App\BPT;
use App\Members;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends BasesController
{


      public function index()
    {
        if(Auth::user()->role_id==3){//for republic
            $this->data["member_count"] = Members::where('is_deleted',0)->count();
            $this->data["bpt_count"] = BPT::where('is_deleted',0)->count();
            $this->data["feePaid_count"] = Members::where(['isFeePaid'=>1,'is_deleted'=>0])->count();
            $this->data["feeNotPaid_count"] = Members::where(['isFeePaid'=>0,'is_deleted'=>0])->count();
            $this->data["pensioner_count"] = Members::where(['socialPositionId'=>2,'is_deleted'=>0])->count();
            $this->data["student_count"] = Members::where(['socialPositionId'=>1,'is_deleted'=>0])->count();
            $this->data["invalid_count"] = Members::where(['socialPositionId'=>3,'is_deleted'=>0])->count();
            $this->data["low_income_count"] = Members::where(['socialPositionId'=>4,'is_deleted'=>0])->count();
            return view('home',$this->data);
        }
        if(Auth::user()->role_id==2){//for districtManager
            $district_id=Auth::user()->district_id;
            $this->data["member_count"] = Members::where(['district_id'=>$district_id,'is_deleted'=>0])->count();
            $this->data["bpt_count"] = BPT::where(['bpt_district_id'=>$district_id,'is_deleted'=>0])->count();
            $this->data["feePaid_count"] = Members::where(['district_id'=>$district_id,'isFeePaid'=>1,'is_deleted'=>0])->count();
            $this->data["feeNotPaid_count"] = Members::where(['district_id'=>$district_id,'isFeePaid'=>0,'is_deleted'=>0])->count();
            $this->data["pensioner_count"] = Members::where(['district_id'=>$district_id,'socialPositionId'=>2,'is_deleted'=>0])->count();
            $this->data["student_count"] = Members::where(['district_id'=>$district_id,'socialPositionId'=>1,'is_deleted'=>0])->count();
            $this->data["invalid_count"] = Members::where(['district_id'=>$district_id,'socialPositionId'=>3,'is_deleted'=>0])->count();
            $this->data["low_income_count"] = Members::where(['district_id'=>$district_id,'socialPositionId'=>4,'is_deleted'=>0])->count();
            return view('home',$this->data);
        }
        if(Auth::user()->role_id==1){//for regionManager
            $region_id=Auth::user()->region_id;
            $this->data["member_count"] = Members::where(['region_id'=>$region_id,'is_deleted'=>0])->count();
            $this->data["bpt_count"] = BPT::where(['bpt_region_id'=>$region_id,'is_deleted'=>0])->count();
            $this->data["feePaid_count"] = Members::where(['region_id'=>$region_id,'isFeePaid'=>1,'is_deleted'=>0])->count();
            $this->data["feeNotPaid_count"] = Members::where(['region_id'=>$region_id,'isFeePaid'=>0,'is_deleted'=>0])->count();
            $this->data["pensioner_count"] = Members::where(['region_id'=>$region_id,'socialPositionId'=>2,'is_deleted'=>0])->count();
            $this->data["student_count"] = Members::where(['region_id'=>$region_id,'socialPositionId'=>1,'is_deleted'=>0])->count();
            $this->data["invalid_count"] = Members::where(['region_id'=>$region_id,'socialPositionId'=>3,'is_deleted'=>0])->count();
            $this->data["low_income_count"] = Members::where(['region_id'=>$region_id,'socialPositionId'=>4,'is_deleted'=>0])->count();
            return view('home',$this->data);
        }


    }



}
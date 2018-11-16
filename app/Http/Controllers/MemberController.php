<?php

namespace App\Http\Controllers;

use App\Members;
use App\Preferences;
use App\Reasons;
use App\Bpt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MemberController extends BasesController
{
    public function index()
    {
        if(Auth::user()->role_id==3){
            $this->data['members'] = get_own_members(Auth::user()->id);
            $this->data['countArchive'] = $this->countArchive;

            $this->data['bpts'] = BPT::where('is_deleted',0)->orderBy('bpt_id','desc')->get();
            $this->data['reasons'] = Reasons::all();
            return view('preferences.membership.index', $this->data);
        }
        if(Auth::user()->role_id==1){
            $this->data['members'] = get_own_members(Auth::user()->id);
            $this->data['countArchive'] = $this->countArchive;
            $this->data['bpts'] = BPT::where('is_deleted',0)->where('bpt_region_id',Auth::user()->region_id)->where('bpt_district_id',Auth::user()->district_id)->orderBy('bpt_id','desc')->get();
            $this->data['reasons'] = Reasons::all();
            return view('preferences.membership.index', $this->data);
        }
        if(Auth::user()->role_id==2){
            $this->data['members'] = get_own_members(Auth::user()->id);
            $this->data['countArchive'] = $this->countArchive;
            $this->data['bpts'] = BPT::where('is_deleted',0)->where('bpt_region_id',Auth::user()->region_id)->orderBy('bpt_id','desc')->get();
            $this->data['reasons'] = Reasons::all();
            return view('preferences.membership.index', $this->data);
        }
    }

    public function store(Request $request)
    {
        if ($this->customValidate($request)) {
            return redirect()->to('/membership');
        } else {
            return redirect()->back()->withErrors($this->valid)->withInput();
        }
    }

    public function create()
    {
        $dataarray=[];
        if(Auth::user()->role_id==3){
            $dataarray=BPT::where('is_deleted',0)->orderBy('bpt_id','desc')->get();
            $this->data['user_region']=0;
        }
        if(Auth::user()->role_id==1){
            $dataarray= BPT::where('is_deleted',0)->where('bpt_district_id',Auth::user()->district_id)->orderBy('bpt_id','desc')->get();
            $this->data['user_region']=Auth::user()->district_id;
        }
        if(Auth::user()->role_id==2){
            $dataarray=BPT::where('is_deleted',0)->where('bpt_region_id',Auth::user()->region_id)->orderBy('bpt_id','desc')->get();
            $this->data['user_region']=Auth::user()->region_id;
        }
        $this->data['title'] = "Азоларни  руйхатга  олиш";
        $this->data['regions'] = $this->region;
        $this->data['nations'] = $this->nation;
        $this->data['bpts'] = $dataarray;

        $this->data['soc_cats'] = $this->soc_cats;
        return view('preferences.membership.add', $this->data);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        if (is_numeric($id)) {
            $member = Members::findAndCheck($id);
            $this->data['title'] = "Азоларни  руйхатга  олиш";
            $this->data['regions'] = $this->region;
            $this->data['bpts'] = $this->bpt;
            $this->data['member'] = $member;
            $this->data['soc_cats'] = $this->soc_cats;
            $this->data['nations'] = $this->nation;
            return view('preferences.membership.edit', $this->data);
        } else {
            abort(404, ['Kechirasiz siz qidirgan sahifa hozirda mavjud emas!']);
        }
    }

    public function update(Request $request, $id)
    {
        if (is_numeric($id)) {
            if ($this->customValidate($request, $id, 1)) {
                return redirect()->to('/membership');
            } else {
                return redirect()->back()->withErrors($this->valid)->withInput();
            }
        } else {
            abort(404);
        }
    }

    public function destroy($id)
    {
        //
    }

    public function arxiv()
    {
        $dataarray=[];
        $archives=[];
        if(Auth::user()->role_id==3){
            $dataarray=BPT::where('is_deleted',0)->orderBy('bpt_id','desc')->get();
            $archives = \App\Members::where('is_deleted', 1)->paginate(20);
        }
        if(Auth::user()->role_id==1){
            $dataarray= BPT::where('is_deleted',0)->where('btp_region_id',Auth::user()->region_id)->orderBy('bpt_id','desc')->get();
            $archives = \App\Members::where('is_deleted', 1)->where('region_id',Auth::user()->region_id)->paginate(20);
        }
        if(Auth::user()->role_id==2){
            $dataarray=BPT::where('is_deleted',0)->where('bpt_district_id',Auth::user()->district_id)->orderBy('bpt_id','desc')->get();
            $archives = \App\Members::where('is_deleted', 1)->where('district_id',Auth::user()->district_id)->paginate(20);
        }

        $bpt = new \App\Http\Controllers\BptController();
        $bpts = $dataarray;
        return view('preferences.membership.archives', compact('archives', 'bpts'));
    }
}

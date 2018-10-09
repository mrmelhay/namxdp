<?php

namespace App\Http\Controllers;

use App\Members;
use App\Preferences;
use App\Reasons;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MemberController extends BaseController
{
    public function index()
    {
        if(Auth::user()->role_id==3){
            $this->data['members'] = get_own_members(Auth::user()->id);
            $this->data['countArchive'] = $this->countArchive;
            $this->data['bpts'] = $this->bpt;
            $this->data['reasons'] = Reasons::all();
            return view('preferences.membership.index', $this->data);
        }
        if(Auth::user()->role_id==1){
            $this->data['members'] = get_own_members(Auth::user()->id);
            $this->data['countArchive'] = $this->countArchive;
            $this->data['bpts'] = $this->bpt;
            $this->data['reasons'] = Reasons::all();
            return view('preferences.membership.index', $this->data);
        }
        if(Auth::user()->role_id==2){
            $this->data['members'] = get_own_members(Auth::user()->id);
            $this->data['countArchive'] = $this->countArchive;
            $this->data['bpts'] = $this->bpt;
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
        $this->data['title'] = "Азоларни  руйхатга  олиш";
        $this->data['regions'] = $this->region;
        $this->data['nations'] = $this->nation;
        $this->data['bpts'] = $this->bpt;
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
                dd($this->valid);
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
        $archives = \App\Members::where('is_deleted', 1)->paginate(20);
        $bpt = new \App\Http\Controllers\BptController();
        $bpts = $bpt->getAllBpt();
        return view('preferences.membership.archives', compact('archives', 'bpts'));
    }
}

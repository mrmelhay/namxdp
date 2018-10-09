<?php

namespace App\Http\Controllers;

use App\District;
use App\Province;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
class UserController extends BaseController
{

    protected $redirectPath = '/users';

    public function index()
    {
        if(Auth::user()->role_id==3){
            $this->data['users']=$this->users;
            return view('preferences.user.index', $this->data);
        }elseif (Auth::user()->role_id==1){
            $dist=District::select('district_id')->where('region_id',Auth::user()->region_id)->get()->toArray();
            $dat=[];
            foreach ($dist as $key => $value)
                $dat[]=$value;
            $users=\App\User::whereIn('district_id',$dat)->where('is_deleted',0)->get();
            return view('preferences.user.index', compact('users'));
        }elseif(Auth::user()->role_id==2){
            $users=\App\User::where(['district_id'=>\Illuminate\Support\Facades\Auth::user()->district_id,'is_deleted'=>0])->get();
            return view('preferences.user.index', compact('users'));
        }
    }

    public function create()
    {
        if(Auth::user()->role_id==3){
            $regions=\App\Province::all();
            return view('preferences.user.store', compact('regions'));
        }elseif (Auth::user()->role_id==1){
            $districts=\App\District::where('region_id',\Illuminate\Support\Facades\Auth::user()->region_id)->get();
            return view('preferences.user.store', compact('districts'));
        }elseif(Auth::user()->role_id==2){
            $district=\App\District::where('district_id',\Illuminate\Support\Facades\Auth::user()->district_id)->first();
            return view('preferences.user.store', compact('district'));
        }
    }

    public function store(Request $request)
    {
        $this->validator($request->all(),$request->district_id,$request->region_id)->validate();
        $user = $this->creates($request->all(),$request->region_id,$request->district_id);
        return redirect()->to($this->redirectPath);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        if(is_numeric($id)){
            return view('preferences.user.edit', ['roles'=>DB::table('roles')->get(),'user'=>User::findOrFail($id)]);
        }else{
            abort(404);
        }
    }

    public function update(Request $request, $id)
    {
        if(is_numeric($id)){
            $valid = Validator::make($request->all(),['name' => 'required|string','role_id'=>'required|integer']);
            if($valid->fails()){
                return redirect()->back()->withErrors($valid)->withInput();
            }else{
                $updated = User::findOrFail($id);
                $updated->update($request->except('_token','_method'));
                return redirect()->to('/users');
            }
        }else{
            abort(404);
        }
    }

    public function destroy($id)
    {
        if(is_numeric($id)) {
            if (Auth::user()->role_id == 3) {
                $bpt = \App\User::findOrFail($id);
                $bpt->update(['is_deleted' => 1]);
                return ($bpt) ? redirect()->to('/users') : abort(404);
            } elseif (Auth::user()->role_id == 1) {//is regionManager
                $df=User::findOrFail(Auth::user()->id)->region_id;
                $ddd=Province::select('district_id')->where('region_id',$df)->get()->toArray();
                $g = [];foreach ($ddd as $key => $value){
                    $g[] = $value;}
                if(in_array(User::findOrFail($id)->district_id,$g)){
                    $bpt = \App\User::findOrFail($id);
                    $bpt->update(['is_deleted' => 1]);
                    return ($bpt) ? redirect()->to('/users') : abort(404);
                }else{abort(404);}
                User::findOrFail($id)->district_id;
            } elseif (Auth::user()->role_id == 2){
                if(User::findOrFail($id)->district_id!==null && User::findOrFail($id)->district_id==User::findOrFail(Auth::user()->id)->district_id){
                    $bpt = \App\User::findOrFail($id);
                    $bpt->update(['is_deleted' => 1]);
                    return ($bpt) ? redirect()->to('/users') : abort(404);}
            }
        }else{
            abort(404);
        }
    }

    protected function validator(array $data,$district_id=null,$region_id=null)
    {
        if(Auth::user()->role_id==3){//did SuperUser make this request?
            return Validator::make($data, [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'role_id' => 'integer',
                'password' => 'required|string|min:6|confirmed',
                'region_id' => 'required|integer'
            ]);
        }
        if(Auth::user()->role_id==1){//did regionManager make this request?
            return Validator::make($data, [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'role_id' => 'integer',
                'password' => 'required|string|min:6|confirmed',
                'district_id' => 'integer',
                'region_id' => 'integer'
            ]);
        }
        if(Auth::user()->role_id==2){//did districtManager make this request?
            return Validator::make($data, [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'role_id' => 'integer',
                'password' => 'required|string|min:6|confirmed',
                'district_id' => 'required|integer'
            ]);
        }
    }

    protected function creates(array $data, $region_id=null,$district_id=null)
    {
        if(Auth::user()->role_id==3){//did SuperUser make this request?
            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'active' => 1,
                'role_id' => 1,
                'district_id' => null,
                'region_id' => $data['region_id'],
                'password' => bcrypt($data['password']),
            ]);
        }
        if(Auth::user()->role_id==1){//did regionManager make this request?
            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'active' => 1,
                'role_id' => 2,
                'district_id' => $data['district_id'],
                'region_id' => null,
                'password' => bcrypt($data['password'])
            ]);
        }
        if(Auth::user()->role_id==2){//did districtManager make this request?
            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'active' => 1,
                'role_id' => 2,
                'district_id' => $data['district_id'],
                'region_id' => null,
                'password' => bcrypt($data['password']),
            ]);
        }
    }
}

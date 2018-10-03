<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
class UserController extends BaseController
{

    public function __constructor()
    {
        //$this->middleware('areYouSuperMan');
    }

    protected $redirectPath = '/users';

    public function index()
    {
        $this->data['title']="Foydalanuvchilar";
        $this->data['users']=$this->users;
        return view('preferences.user.index', $this->data);
    }


    public function create()
    {
        return view('preferences.user.store', ['roles'=>DB::table('roles')->get()]);
    }

    public function store(Request $request)
    {
        $this->validator($request->all())->validate();
        $user = $this->creates($request->all());
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
        if(is_numeric($id)){
            $bpt = \App\User::findOrFail($id);
            $bpt->update([
                'is_deleted' => 1
            ]);
            return ($bpt)? redirect()->to('/users'):abort(404);
        }else{
            abort(404);
        }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'role_id' => 'required|integer',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    protected function creates(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'active' => 1,
            'role_id' => $data['role_id'],
            'password' => bcrypt($data['password']),
        ]);
    }
}

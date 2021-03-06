<?php

namespace App\Http\Controllers;

use App\BPT;
use App\BptSpecies;
use App\Council;
use App\District;
use App\Http\Controllers\Auth\RegisterController;
use App\Members;
use App\Nation;
use App\NoFeeMember;
use App\Pensioner;
use App\PhotoMember;
use App\Province;
use App\Home;
use App\Sex;
use App\SocialCategory;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BaseController extends Controller
{
    //

    public $data=[];
    public $valid=[];
    public $menus=[];
    public $council=[];

    public $users=[];
    public $sex=[];
    public $region=[];
    public $countArchive;
    public $bpt=[];
    public $soc_cats=[];
    public $nation=[];
    public $district=[];

    public function __construct()
    {
        $this->middleware('auth');
        $this->rules=$this->validationRules();
        $this->countArchive=$this->getAllArchives();
        $this->region=$this->getAllRegions();
        $this->bpt=$this->getAllBpt();
        $this->users=$this->getAllUsers();
        $this->council=$this->getAllCouncils();
        $this->sex=$this->getAllSexes();
        $this->nation=$this->getAllnations();
        $this->soc_cats=$this->getSocialCategories();
        $this->menus = $this->getAllMenus();
        $this->data['menus']=$this->menus;
        $this->district=$this->getAllDistricts();
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            $this->signed_in = Auth::check();
            view()->share('user_role_id', Auth::user()->role_id);
            view()->share('user__id', Auth::user()->id);
            return $next($request);
        });
    }

    public function getAllCouncils(){
        return Council::where('is_deleted',0)->get();
    }

    public function getAllUsers(){
        return User::where('is_deleted',0)->orderBy('id','desc')->get();
    }

    public function getAllRegions(){
        return Province::all();
    }

    public function getAllSexes(){
        return Sex::all();
    }

    public function getAllnations(){
        return Nation::all();
    }

    public function getAllMenus(){
        return Home::getAllMenus();
    }

    public function getAllArchives(){
        return Members::where('is_deleted',1)->count();
    }

    public function getAllBpt(){
        return BPT::where('is_deleted',0)->orderBy('bpt_id','desc')->get();
    }

    public function getAllDistricts(){
        $district=District::all();
        return $district;
    }

    public function getSocialCategories(){
        $cats=SocialCategory::all();
        return $cats;
    }

    public function validationRules($method=false){
        if($method){return  [
            'fullName' => 'required|string|min:7',
            'birthDay' => 'required|date',
            'sex_id' => 'required|integer',
            'nationality_id' => 'required|integer',
            'passSerial' => 'required|min:13',
            'passGivenFrom' => 'required|string|min:7',
            'passGivenDate' => 'required|date',
            'passExpireDate' => 'required|date',
            'specialist' => 'required|string|min:4',
            'workPlaceAndPosition' => 'required|string|min:5',
            'phoneNumber' => 'required|string|min:20',
            'isLeader' => 'required|integer',
//            'isXdpMember' => '',
            'region_id' => 'required|integer',
            'district_id' => 'required|integer',
            'homeAddress' => 'required|string|min:10',
            'unionJoinDate' => 'required|date',
            'unionOrderNumber' => 'required',
            'unionCertfNumber' => 'required',
            'bpt_id' => 'required|integer',
            'isFeePaid' => 'required',
            'socialPositionId' => 'required|integer'
        ];
        }else{
            return  [
                'fullName' => 'required|string|min:7',
                'birthDay' => 'required|date',
                'sex_id' => 'required|integer',
                'nationality_id' => 'required|integer',
                'passSerial' => 'required|min:13',
                'passGivenFrom' => 'required|string|min:10',
                'passGivenDate' => 'required|date',
                'passExpireDate' => 'required|date',
                'specialist' => 'required|string|min:4',
                'workPlaceAndPosition' => 'required|string|min:5',
                'phoneNumber' => 'required|string|unique:members|min:20',
                'isLeader' => 'required|integer',
//            'isXdpMember' => '',
                'region_id' => 'required|integer',
                'district_id' => 'required|integer',
                'homeAddress' => 'required|string|min:7',
                'unionJoinDate' => 'required|date',
                'unionOrderNumber' => 'required',
                'unionCertfNumber' => 'required',
                'bpt_id' => 'required|integer',
                'isFeePaid' => 'required',
                'socialPositionId' => 'required|integer'
            ];
        }
    }

    public function customValidate(Request $request , $id=null , $method=false){
        if($method){
            $valid = Validator::make($request->all(),$this->validationRules(1));
            if($valid->fails()){
                $this->valid = $valid;
                return false;
            }else{
                $ijs=\App\Members::find($id)->socialPositionId;
                if($request->socialPositionId != $ijs){
                    if(!Pensioner::where('member_pensioner_id',$id)->exists()){
                        \App\Pensioner::insert(['member_pensioner_id' => $id, 'pensioner_date' => date('Y-m-d')]);
                    }
                }
                Members::find($id)->update($request->except('_token','_method','photo'));
                if($request->hasFile('photo')){
                    $path = Storage::disk('public')->put(date('Y-m-d').'/u_'.$id.'_image', $request->file('photo'));
                    PhotoMember::where('member_id',$id)->update(['photo_path' => $path]);
                }
                return true;
            }
        }else{
            $valid = Validator::make($request->all(),$this->validationRules());
            if($valid->fails()){
                $this->valid = $valid;
                return false;
            }else{
                $idn = Members::insertGetId($request->except('_token','_method','photo'));
                if((int)$request->isFeePaid==0){
                    $reason = \App\SocialCategory::find($request->socialPositionId)->soc_name;
                    \App\NoFeeMember::insert(['fee_reason'=>$reason,'fee_member_id'=>$idn,'fee_date'=>date('Y:m:d')]);
                }
                if($request->hasFile('photo')){
                    $path = Storage::disk('public')->put(date('Y-m-d').'/u_'.$idn.'_image', $request->file('photo'));
                    PhotoMember::insert(['member_id' => $idn, 'photo_path' => $path]);
                }else{
                    PhotoMember::insert(['member_id' => $idn, 'photo_path' => 'no-person.jpg']);
                }
                return (true);
            }
        }
    }

    public function search(Request $request){
    $this->user = Auth::user();
        switch ($request->key):
            case '_bpt':
                $data=[];
                foreach($request->except('_token','key','_method') as $key => $value){
                    if($value!==null){
                        if($key=='bpt_name'){
                            $members1 = \App\BPT::where('bpt_name','like','%'.$value.'%')->orderBy('bpt_id','desc')->paginate(20);
                            break;
                        }else{
                            $data[$key] = $value;
                        }
                    }
                }
                if(isset($members1)){
                    $this->data["bpts"] = $members1;
                }else{
                    $members = \App\BPT::where($data)->orderBy('bpt_id','desc')->paginate(20);
                    $this->data["bpts"] = $members;
                }
                $this->data['title']="Boshlang'ich partiya tashkilotlari";
                $this->data['regions']=$this->getAllRegions();
                $this->data['bpt_specs']=BptSpecies::all();
                $this->data['councils']=$this->getAllCouncils();
                return view('preferences.bpt.index', $this->data);
                break;
            case '_member':

                $data=[];
                foreach($request->all() as $key => $value){
                    if($value!==null && $key!='_token'&& $key!='_method'){
                        if($key=='fullName'){
                            if($user->role_id==3){
                                $members1 = \App\Members::where('fullName','like','%'.$value.'%')->orderBy('id','desc')->paginate(20);
                            }
                            if($user->role_id==1){
                                $members1 = \App\Members::where('fullName','like','%'.$value.'%')->where('region_id',$user->region_id)->orderBy('id','desc')->paginate(20);
                            }
                            if($user->role_id==2){
                                $members1 = \App\Members::where('fullName','like','%'.$value.'%')->where('district_id',$user->district_id)->orderBy('id','desc')->paginate(20);
                            }
                            break;
                        }else{
                            if($value!='_member'){
                                $data[$key] = $value;
                            }
                        }
                    }
                }
                $controller = new \App\Http\Controllers\BaseController();
                $data1["countArchive"] = $controller->getAllArchives();
                $data1["bpts"] = $controller->getAllBpt();
                if(isset($members1)){
                    $data1["members"] = $members1;
                }else{
                    if($user->role_id==3){
                        $data1["members"] = \App\Members::where($data)->orderBy('id','desc')->paginate(20);
                    }
                    if($user->role_id==1){
                        $data1["members"] = \App\Members::where($data)->where('region_id',$user->region_id)->orderBy('id','desc')->paginate(20);
                    }
                    if($user->role_id==2){
                        $data1["members"] = \App\Members::where($data)->where('district_id',$user->district_id)->orderBy('id','desc')->paginate(20);
                    }
                }
                $data1["reasons"] = \App\Reasons::all();
                return view('preferences.membership.index', $data1);
                break;
            default:
                echo "okok";
        endswitch;
    }
}
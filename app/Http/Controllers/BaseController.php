<?php

namespace App\Http\Controllers;

use App\BPT;
use App\Council;
use App\District;
use App\Http\Controllers\Auth\RegisterController;
use App\Members;
use App\Nation;
use App\Province;
use App\Home;
use App\Sex;
use App\SocialCategory;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
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
//        if($method){return  [
//            'fullName' => 'required|string|min:7',
//            'birthDay' => 'required|date',
//            'sex_id' => 'required|integer',
//            'nationality_id' => 'required|integer',
//            'passSerial' => 'required|min:13',
//            'passGivenFrom' => 'required|string|min:20',
//            'passGivenDate' => 'required|date',
//            'passExpireDate' => 'required|date',
//            'specialist' => 'required|string|min:4',
//            'workPlaceAndPosition' => 'required|string|min:20',
//            'phoneNumber' => 'required|string|min:20',
//            'isLeader' => 'required|integer',
////            'isXdpMember' => '',
//            'region_id' => 'required|integer',
//            'district_id' => 'required|integer',
//            'homeAddress' => 'required|string|min:10',
//            'unionJoinDate' => 'required|date',
//            'unionOrderNumber' => 'required',
//            'unionCertfNumber' => 'required',
//            'bpt_id' => 'required|integer',
//            'isFeePaid' => 'required|integer',
//            'socialPositionId' => 'integer'
//        ];}else{
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
                'isFeePaid' => 'required|integer',
                'socialPositionId' => 'integer'
            ];
//        }
    }

    public function customValidate(Request $request , $id=null , $method=false){
        if($method){
            $valid = Validator::make($request->all(),$this->validationRules(1));
            if($valid->fails()){
                $this->valid = $valid;
                return false;
            }else{
                $updated = Members::findOrFail($id);
                $updated
                    ->update($request->except('_token','_method'));
                return ($updated);
            }
        }else{
            $valid = Validator::make($request->all(),$this->validationRules());
            if($valid->fails()){
                $this->valid = $valid;
                return false;
            }else{
                $record = Members::insert($request->except('_token','_method'));
                return ($record);
            }
        }
    }

    public function search(Request $request){
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
                $this->data['councils']=$this->getAllCouncils();

                return view('preferences.bpt.index', $this->data);
                break;
            case '_member':
                $data=[];
                foreach($request->all() as $key => $value){
                    if($value!==null && $key!='_token'&& $key!='_method'){
                        if($key=='fullName'){
                            $members1 = \App\Members::where('fullName','like','%'.$value.'%')->orderBy('id','desc')->paginate(20);
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
//                    dd($data);
                    $data1["members"] = \App\Members::where($data)->orderBy('id','desc')->paginate(20);
                }
                return view('preferences.membership.index', $data1);
                break;
            default:
                echo "okok";
        endswitch;
    }
}

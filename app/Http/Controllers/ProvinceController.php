<?php

namespace App\Http\Controllers;

use App\Province;
use Illuminate\Http\Request;

class ProvinceController extends BaseController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->data['regions'] = $this->region;
        return view('preferences.province.province', $this->data);
    }

    public function action(Request $request)
    {
        $msg = [
            'message' => 'Some Message!',
        ];

        $action = $request->action;

        switch ($action) {
            case 'update':
                $found=$this->updateProvince($request);

                break;
            case 'add':
                return view("preferences.addprovince", $this->data);
                break;
            case 'edit':
                return view("preferences.province.editprovince", $this->data)->with('province', $this->getProvince($request->id));
                break;
            case 'delete':
                $this->deleteProvince($request->id);
                break;
            case 'save':
                $this->insertProvince($request);
                break;
        }

        return redirect()->action('ProvinceController@index');
    }


    private function insertProvince(Request $request)
    {
        $province = new Province();
        $province->region_name = $request->input('region_name');
        $province->save();
    }

    private function deleteProvince($id)
    {
        Province::where("region_id", $id)->delete();
    }

    private function updateProvince(Request $request)
    {
        $update = Province::findOrFail($request->id);
        $update->update($request->except('_token', '_method'));
        return $update;
    }


    private function getProvince($id)
    {
        return Province::where('region_id', $id)->get();
    }


}

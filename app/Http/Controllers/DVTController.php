<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\DVT;
use Session;
use App\Http\Requests;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
session_start();

class DVTController extends Controller
{
    public function index(){
        $dvt = DVT::all();
        return view('donvitinh.donvitinh')->with(compact('dvt'));
    }

    public function luu(Request $request){
        $request->validate([
            "ten_dvt" => "required",
        ],[
            'ten_dvt.required' => 'Không được để trống',
        ]);

        try {
            $dvt =  new DVT();
            $dvt->ten_dvt = $request->ten_dvt;
            $dvt->save();
            Session::flash('message','Thêm thành công!');
            return Redirect::back();
        }catch (\Exception $e){
            Log::error($e);
            Session::flash('message','Thêm thất bại!');
            return Redirect::back();
        }

    }

    public function xoa($dvt_id){
        try {
            DVT::where('dvt_id',$dvt_id)->delete();
            return Redirect::back();
        }catch (\Exception $e){
            Log::error($e);
            Session::flash('message','Xóa thất bại!');
            return Redirect::back();
        }

    }
}

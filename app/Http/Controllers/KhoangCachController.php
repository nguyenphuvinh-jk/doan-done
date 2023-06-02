<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\KhoangCach;
use Session;
use App\Http\Requests;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
session_start();

class KhoangCachController extends Controller
{
    public function index(){
        $khoangcach = KhoangCach::all();
        return view('khoangcach.khoangcach')->with(compact('khoangcach'));
    }

    public function luu(Request $request){
        $request->validate([
            "khoangcach" => "required",
        ],[
            'khoangcach.required' => 'Không được để trống',
        ]);

        try {
            $category =  new KhoangCach();
            $category->khoangcach = $request->khoangcach;
            $category->save();
            Session::flash('message','Thêm thành công!');
            return Redirect::back();
        }catch (\Exception $e){
            Session::flash('message',$e);
            return Redirect::back();
        }

    }

    public function sua($khoangcach_id){
        $khoangcach = KhoangCach::all();
        $khoangcach_edit = KhoangCach::where('khoangcach_id',$khoangcach_id)->get();
        return view('khoangcach.khoangcach')->with(compact('khoangcach_edit', 'khoangcach'));
    }

    public function capnhat(Request $request,$khoangcach_id){
        $request->validate([
            "khoangcach" => "required",
        ],[
            'khoangcach.required' => 'Không được để trống',
        ]);

        try {
            $khoangcach = KhoangCach::where('khoangcach_id',$khoangcach_id)->first();
            $khoangcach->khoangcach = $request->khoangcach;
            $khoangcach->save();
            Session::flash('message','Cập nhật thành công!');
            return Redirect::to('/quan-ly-danh-muc/khoang-cach-uoc-tinh');
        }catch (\Exception $e){
            Session::flash('message',$e);
            return Redirect::to('/quan-ly-danh-muc/khoang-cach-uoc-tinh');
        }

    }

    public function xoa($khoangcach_id){
        KhoangCach::where('khoangcach_id',$khoangcach_id)->delete();
        return Redirect::back();
    }
}

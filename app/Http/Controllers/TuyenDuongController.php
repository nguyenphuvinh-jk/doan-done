<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\TuyenDuong;
use App\Http\Requests;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
session_start();

class TuyenDuongController extends Controller
{
    public function index(){
        $tuyenduong = TuyenDuong::all();
        return view('tuyenduong.tuyenduong')->with(compact('tuyenduong'));
    }

    public function luu(Request $request){
        $request->validate([
            "ten_tuyenduong" => "required|unique:tbl_tuyenduong|max:100",
        ],[
            'ten_tuyenduong.required' => 'Không được để trống',
            'ten_tuyenduong.unique' => 'tuyến đường đã được thêm',
            'ten_tuyenduong.max' => 'Không dài quá 100 ký tự',
        ]);

        try {
            $tuyenduong =  new TuyenDuong();
            $tuyenduong->ten_tuyenduong = $request->ten_tuyenduong;
            $tuyenduong->save();
            Session::flash('message','Thêm tuyến đường thành công!');
            return Redirect::back();
        }catch (\Exception $e){
            Log::error($e);
            Session::flash('message','Thêm tuyến đường thất bại!');
            return Redirect::back();
        }

    }

    public function xoa($tuyenduong_id){
        try {
            TuyenDuong::where('tuyenduong_id',$tuyenduong_id)->delete();
            Session::flash('message','Xóa tuyến đường thành công!');
            return Redirect::back();
        }catch (\Exception $e){
            Log::error($e);
            Session::flash('message','Xóa tuyến đường thất bại!');
            return Redirect::back();
        }
    }
}

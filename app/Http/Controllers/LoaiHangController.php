<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\LoaiHang;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
session_start();

class LoaiHangController extends Controller
{
    public function index(){
        $loaihang = LoaiHang::all();
        return view('loaihang.loaihang')->with(compact('loaihang'));
    }

    public function luu(Request $request){
        $request->validate([
            "ten_loaihang" => "required|unique:tbl_loaihang|max:100",
        ],[
            'ten_loaihang.required' => 'Không được để trống',
            'ten_loaihang.unique' => 'Loại hàng đã được thêm',
            'ten_loaihang.max' => 'Không dài quá 100 ký tự',
        ]);

        try {
            $loaihang =  new LoaiHang();
            $loaihang->ten_loaihang = $request->ten_loaihang;
            $loaihang->save();
            Session::flash('message','Thêm loại hàng thành công!');
            return Redirect::back();
        }catch (\Exception $e){
            Log::error($e);
            Session::flash('message','Thêm loại hàng thất bại!');
            return Redirect::back();
        }

    }

    public function xoa($loaihang_id){
        try {
            LoaiHang::where('loaihang_id',$loaihang_id)->delete();
            Session::flash('message','Xóa loại hàng thành công!');
            return Redirect::back();
        }catch (\Exception $e){
            Log::error($e);
            Session::flash('message','Xóa loại hàng thất bại!');
            return Redirect::back();
        }
    }
}

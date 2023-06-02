<?php

namespace App\Http\Controllers;

use App\HangXe;
use Illuminate\Http\Request;
use DB;
use App\LoaiXe;
use Illuminate\Support\Facades\Log;
use Session;
use App\Http\Requests;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
session_start();

class LoaiXeController extends Controller
{
    public function index(){
        $loaixe = LoaiXe::all();
        return view('loaixe.loaixe')->with(compact('loaixe'));
    }

    public function luu(Request $request){
        $request->validate([
            "ten_loaixe" => "required",
        ],[
            'ten_loaixe.required' => 'Không được để trống',
        ]);

        try {
            $loaixe =  new LoaiXe();
            $loaixe->ten_loaixe = $request->ten_loaixe;
            $loaixe->save();
            Session::flash('message','Thêm thành công!');
            return Redirect::back();
        }catch (\Exception $e){
            Log::error($e);
            Session::flash('message','Thêm thất bại. Mời bạn nhập lại!');
            return Redirect::back();
        }

    }

    public function xoa($loaixe_id){
        try {
            loaixe::where('loaixe_id',$loaixe_id)->delete();
            return Redirect::back();
        }catch (\Exception $e){
            Log::error($e);
            Session::flash('message','Không được xóa trường này');
            return Redirect::back();
        }

    }
}

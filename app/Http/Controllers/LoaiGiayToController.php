<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\LoaiGiayTo;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
session_start();

class LoaiGiayToController extends Controller
{
    public function index(){
        $loaigiayto = LoaiGiayTo::all();
        return view('loaigiayto.loaigiayto')->with(compact('loaigiayto'));
    }

    public function luu(Request $request){
        $request->validate([
            "tengiayto" => "required",
        ],[
            'tengiayto.required' => 'Không được để trống',
        ]);

        try {
            $loaigiayto =  new LoaiGiayTo();
            $loaigiayto->tengiayto = $request->tengiayto;
            $loaigiayto->save();
            Session::flash('message','Thêm thành công!');
            return Redirect::back();
        }catch (\Exception $e){
            Log::error($e);
            Session::flash('message','Thêm thất bại!!!');
            return Redirect::back();
        }

    }

    public function xoa($loaigiayto_id){
        try {
            loaigiayto::where('id',$loaigiayto_id)->delete();
            return Redirect::back();
        }catch (\Exception $e){
            Log::error($e);
            Session::flash('message','Xóa thất bại!!!');
            return Redirect::back();
        }

    }
}

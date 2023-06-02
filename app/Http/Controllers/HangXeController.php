<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\HangXe;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
session_start();

class HangXeController extends Controller
{
    public function index(){
        $hangxe = HangXe::all();
        return view('hangxe.hangxe')->with(compact('hangxe'));
    }

    public function luu(Request $request){
        $request->validate([
            "ten_hangxe" => "required",
        ],[
            'ten_hangxe.required' => 'Không được để trống',
        ]);

            $hangxe =  new HangXe();
            $hangxe->ten_hangxe = $request->ten_hangxe;
            $hangxe->save();
            Session::flash('message','Thêm thành công!');
            return Redirect::back();

    }

    public function xoa($hangxe_id){
        try {
            HangXe::where('hangxe_id',$hangxe_id)->delete();
            return Redirect::back();
        }catch (\Exception $e){
            Log::error($e);
            Session::flash('message','Không được xóa trường này');
            return Redirect::back();
        }

    }
}

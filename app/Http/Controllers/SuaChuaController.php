<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use App\SuaChua;
use App\Xe;
use Illuminate\Support\Facades\Log;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class SuaChuaController extends Controller
{
    public function index(){
        $xe = Xe::orderBy('biensoxe', 'asc')->get();
        $suachua = DB::table('tbl_suachua')
            ->select('tbl_suachua.*', 'tbl_xe.biensoxe', 'users.name')
            ->join('tbl_xe', 'tbl_xe.xe_id', '=', 'tbl_suachua.xe_id')
            ->join('users', 'users.id', '=', 'tbl_suachua.nguoixacnhan')
            ->orderBy('tbl_suachua.suachua_id', 'desc')
            ->get();
        return view('suachua.suachua')->with(compact('xe', 'suachua'));
    }

    public function luu(Request $request){
        $request->validate([
            "xe_id" => "required",
            "ngaysua" => "required",
            "noisua" => "required",
            "noidung" => "required",
            "tongtien" => "required|numeric",
        ],[
            'xe_id.required' => 'Không được để trống',
            'ngaysua.required' => 'Không được để trống',
            'ngaysua.noisua' => 'Không được để trống',
            'noidung.required' => 'Không được để trống',
            'tongtien.required' => 'Không được để trống',
            'tongtien.numeric' => 'Nhập duữ liệu kiểu số',
        ]);

        try {
            $suachua =  new SuaChua();
            $suachua->xe_id = $request->xe_id;
            $suachua->ngaysua = Carbon::createFromFormat('d/m/Y', $request->ngaysua)->toDateString();
            $suachua->noisua = $request->noisua;
            $suachua->noidung = $request->noidung;
            $suachua->tongtien = $request->tongtien;
            $suachua->ghichu = $request->ghichu;
            $suachua->nguoixacnhan = $request->nguoixacnhan;
            $suachua->save();
            Session::flash('message','Thêm thành công!');
            return Redirect::back();
        }catch (\Exception $e){
            Log::error($e);
            Session::flash('message_err','Thêm thất bại!');
            return Redirect::back();
        }
    }

    public function xoa($suachua_id){
        try {
            SuaChua::where('suachua_id',$suachua_id)->delete();
            return Redirect::to('/quan-ly-xe/sua-chua/bao-duong');
        }catch (\Exception $e){
            Log::error($e);
            Session::flash('message_err','Không thể xóa trường này!');
            return Redirect::to('/quan-ly-xe/sua-chua/bao-duong');
        }
    }

    public function sua($suachua_id){
        $xe = Xe::orderBy('biensoxe', 'asc')->get();
        $suachua = DB::table('tbl_suachua')
            ->select('tbl_suachua.*', 'tbl_xe.biensoxe', 'users.name')
            ->join('tbl_xe', 'tbl_xe.xe_id', '=', 'tbl_suachua.xe_id')
            ->join('users', 'users.id', '=', 'tbl_suachua.nguoixacnhan')
            ->orderBy('tbl_suachua.suachua_id', 'desc')
            ->get();
        $suachua_edit = suachua::where('suachua_id',$suachua_id)->get();
        return view('suachua.suachua')->with(compact('suachua_edit', 'suachua', 'xe'));
    }

    public function capnhat(Request $request,$suachua_id){
        $request->validate([
            "xe_id" => "required",
            "ngaysua" => "required",
            "noisua" => "required",
            "noidung" => "required",
            "tongtien" => "required|numeric",
        ],[
            'xe_id.required' => 'Không được để trống',
            'ngaysua.required' => 'Không được để trống',
            'ngaysua.noisua' => 'Không được để trống',
            'noidung.required' => 'Không được để trống',
            'tongtien.required' => 'Không được để trống',
            'tongtien.numeric' => 'Nhập duữ liệu kiểu số',
        ]);

        try {
            $suachua = SuaChua::where('suachua_id',$suachua_id)->first();
            $suachua->xe_id = $request->xe_id;
            $suachua->ngaysua = Carbon::createFromFormat('d/m/Y', $request->ngaysua)->toDateString();
            $suachua->noisua = $request->noisua;
            $suachua->noidung = $request->noidung;
            $suachua->tongtien = $request->tongtien;
            $suachua->ghichu = $request->ghichu;
            $suachua->nguoixacnhan = $request->nguoixacnhan;
            $suachua->save();
            Session::flash('message','Cập nhật thành công!');
            return Redirect::to('/quan-ly-xe/sua-chua/bao-duong');
        }catch (\Exception $e){
            Log::error($e);
            Session::flash('message_err','Cập nhật không thành công!!');
            return Redirect::to('/quan-ly-xe/sua-chua/bao-duong');
        }
    }
}

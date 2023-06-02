<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Xe;
use App\HangXe;
use App\LoaiXe;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
session_start();

class XeController extends Controller
{
    public function index(){
        $xe = DB::table('tbl_xe')
            ->join('tbl_loaixe','tbl_loaixe.loaixe_id','=','tbl_xe.loaixe')
            ->join('tbl_hangxe','tbl_hangxe.hangxe_id','=','tbl_xe.hangxe')
            ->orderby('tbl_xe.xe_id', 'DESC')->get();
        return view('xe.xe')->with(compact('xe'));
    }

    public function them(){
        $loaixe = LoaiXe::all();
        $hangxe = HangXe::all();
        return view('xe.them')->with(compact('loaixe', 'hangxe'));
    }

    public function luu(Request $request){

        $request->validate([
            "loaixe" => "required",
            "hangxe" => "required",
            "biensoxe" => "required|unique:tbl_xe|max:15",
            "mauson" => "nullable|max:20",
            "namsx" => "nullable|numeric",
        ],[
            'loaixe.required' => 'Không được để trống',
            'hangxe.required' => 'Không được để trống',
            'biensoxe.required' => 'Không được để trống',
            'biensoxe.unique' => 'Biển số đã tồn tại',
            'biensoxe.max' => 'Nhập tối đa 15 ký tự',
            'mauson.max' => 'Nhập tối đa 20 ký tự',
            'namsx.numeric' => 'Nhập dữ liệu kiểu số',
        ]);

            $xe = new Xe();
            $xe->loaixe = $request->loaixe;
            $xe->hangxe = $request->hangxe;
            $xe->biensoxe = $request->biensoxe;
            $xe->mauson = $request->mauson;
            $xe->namsx = $request->namsx;
            if ($request->ngaymua){
                $xe->ngaymua = Carbon::createFromFormat('d/m/Y', $request->ngaymua)->toDateString();
            }
            $xe->noimua = $request->noimua;
            if ($request->ngayban){
                $xe->ngayban = Carbon::createFromFormat('d/m/Y', $request->ngayban)->toDateString();
            }
            $xe->noiban = $request->noiban;
            $xe->save();
            Session::flash('message','Thêm thành công!');
            return Redirect::back();
    }

    public function xoa($xe_id){
        try {
            Xe::where('xe_id',$xe_id)->delete();
            Session::flash('message','Xóa thành công!!');
            return Redirect::to('/quan-ly-xe/thong-tin-xe');
        }catch (\Exception $e){
            Log::error($e);
            Session::flash('message','Xóa không thành công!!');
            return Redirect::to('/quan-ly-xe/thong-tin-xe');
        }
    }

    public function sua($xe_id){
        $loaixe = LoaiXe::all();
        $hangxe = HangXe::all();
        $xe_edit = xe::where('xe_id',$xe_id)->get();
        return view('xe.sua')->with(compact('xe_edit',  'loaixe', 'hangxe'));
    }

    public function capnhat(Request $request,$xe_id){
        $request->validate([
            "loaixe" => "required",
            "hangxe" => "required",
            "biensoxe" => "required|max:15",
            "mauson" => "nullable|max:20",
            "namsx" => "nullable|numeric",
        ],[
            'loaixe.required' => 'Không được để trống',
            'hangxe.required' => 'Không được để trống',
            'biensoxe.required' => 'Không được để trống',
            'biensoxe.max' => 'Nhập tối đa 15 ký tự',
            'mauson.max' => 'Nhập tối đa 20 ký tự',
            'namsx.numeric' => 'Nhập dữ liệu kiểu số',
        ]);

        try {
            $xe = Xe::where('xe_id',$xe_id)->first();
            $xe->loaixe = $request->loaixe;
            $xe->hangxe = $request->hangxe;
            $xe->biensoxe = $request->biensoxe;
            $xe->mauson = $request->mauson;
            $xe->namsx = $request->namsx;
            if ($request->ngaymua){
                $xe->ngaymua = Carbon::createFromFormat('d/m/Y', $request->ngaymua)->toDateString();
            }
            $xe->noimua = $request->noimua;
            if ($request->ngayban){
                $xe->ngayban = Carbon::createFromFormat('d/m/Y', $request->ngayban)->toDateString();
            }
            $xe->noiban = $request->noiban;
            $xe->trangthai = $request->trangthai;
            $xe->save();
            Session::flash('message','Cập nhật thành công!');
            return Redirect::to('/quan-ly-xe/thong-tin-xe');
        }catch (\Exception $e){
            Session::flash('message',$e);
            return Redirect::to('/quan-ly-xe/thong-tin-xe');
        }

    }

    public function active($xe_id)
    {
        try {
            Xe::where('xe_id',$xe_id)->update([
                'trangthai' => 1,
            ]);

            Session::flash('message','Cập nhật xe thành công!');
            return Redirect::back();
        }catch (\Exception $e){
            Log::error($e);
            Session::flash('message_err', 'Cập nhật xe thất bại!');
            return Redirect::back();
        }
    }

    public function inactive($xe_id)
    {
        try {
            Xe::where('xe_id',$xe_id)->update([
                'trangthai' => 0,
            ]);

            Session::flash('message','Cập nhật xe thành công!');
            return Redirect::back();
        }catch (\Exception $e){
            Log::error($e);
            Session::flash('message_err', 'Cập nhật xe thất bại!');
            return Redirect::back();
        }
    }
}

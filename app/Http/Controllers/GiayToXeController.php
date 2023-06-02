<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use App\GiayToXe;
use App\LoaiGiayTo;
use App\Xe;
use Illuminate\Support\Facades\Log;
use Session;
use App\Http\Requests;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
session_start();

class GiayToXeController extends Controller
{
    public function index(){
        $loaigiayto = LoaiGiayTo::orderBy('tengiayto', 'asc')->get();
        $xe = Xe::orderBy('biensoxe', 'asc')->get();
        $giaytoxe = DB::table('tbl_giaytoxe')
            ->join('tbl_loaigiayto', 'tbl_loaigiayto.id', '=', 'tbl_giaytoxe.loaigiayto')
            ->join('tbl_xe', 'tbl_xe.xe_id', '=', 'tbl_giaytoxe.xe_id')
            ->orderBy('giayto_id', 'desc')->get();
        return view('giaytoxe.giaytoxe')->with(compact('giaytoxe', 'xe', 'loaigiayto'));
    }

    public function luu(Request $request){
        $request->validate([
            "loaigiaytoxe" => "required",
            "xe_id" => "required",
            "ngaycap" => "required",
            "ngayhethan" => "required",
        ],[
            'loaigiaytoxe.required' => 'Không được để trống',
            'xe_id.required' => 'Không được để trống',
            'ngaycap.required' => 'Không được để trống',
            'ngayhethan.required' => 'Không được để trống',
        ]);

        try {
            $giaytoxe =  new GiayToXe();
            $giaytoxe->loaigiayto = $request->loaigiaytoxe;
            $giaytoxe->xe_id = $request->xe_id;
            $giaytoxe->ngaycap = Carbon::createFromFormat('d/m/Y', $request->ngaycap)->toDateString();
            $giaytoxe->ngayhethan = Carbon::createFromFormat('d/m/Y', $request->ngayhethan)->toDateString();
            $giaytoxe->donvicap = $request->donvicap;
            $giaytoxe->save();
            Session::flash('message','Thêm giấy tờ xe thành công!');
            return Redirect::back();
        }catch (\Exception $e){
            Log::error($e);
            Session::flash('message','Thêm giấy tờ xe thất bại!');
            return Redirect::back();
        }
    }

    public function xoa($giaytoxe_id){
        try {
            GiayToXe::where('giayto_id',$giaytoxe_id)->delete();
            return Redirect::to('/quan-ly-xe/giay-to-xe');
        }catch (\Exception $e){
            Log::error($e);
            Session::flash('message','Không thể xóa trường này!');
            return Redirect::to('/quan-ly-xe/giay-to-xe');
        }
    }

    public function sua($giaytoxe_id){
        $loaigiayto = LoaiGiayTo::orderBy('tengiayto', 'asc')->get();
        $xe = Xe::orderBy('biensoxe', 'asc')->get();
        $giaytoxe = DB::table('tbl_giaytoxe')
            ->join('tbl_loaigiayto', 'tbl_loaigiayto.id', '=', 'tbl_giaytoxe.loaigiayto')
            ->join('tbl_xe', 'tbl_xe.xe_id', '=', 'tbl_giaytoxe.xe_id')
            ->orderBy('giayto_id', 'desc')->get();
        $giaytoxe_edit = GiayToXe::where('giayto_id',$giaytoxe_id)->get();
        return view('giaytoxe.giaytoxe')->with(compact('giaytoxe_edit', 'giaytoxe', 'xe', 'loaigiayto'));
    }

    public function capnhat(Request $request,$giaytoxe_id){
        $request->validate([
            "loaigiaytoxe" => "required",
            "xe_id" => "required",
            "ngaycap" => "required",
            "ngayhethan" => "required",
        ],[
            'loaigiaytoxe.required' => 'Không được để trống',
            'xe_id.required' => 'Không được để trống',
            'ngaycap.required' => 'Không được để trống',
            'ngayhethan.required' => 'Không được để trống',
        ]);

        try {
            $giaytoxe = GiayToXe::where('giayto_id',$giaytoxe_id)->first();
            $giaytoxe->loaigiayto = $request->loaigiaytoxe;
            $giaytoxe->xe_id = $request->xe_id;
            $giaytoxe->ngaycap = Carbon::createFromFormat('d/m/Y', $request->ngaycap)->toDateString();
            $giaytoxe->ngayhethan = Carbon::createFromFormat('d/m/Y', $request->ngayhethan)->toDateString();
            $giaytoxe->donvicap = $request->donvicap;
            $giaytoxe->save();
            Session::flash('message','Cập nhật thành công!');
            return Redirect::to('/quan-ly-xe/giay-to-xe');
        }catch (\Exception $e){
            Log::error($e);
            Session::flash('message','Cập nhật không thành công!!');
            return Redirect::to('/quan-ly-xe/giay-to-xe');
        }
    }
}

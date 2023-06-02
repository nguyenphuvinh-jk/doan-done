<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use App\PhatSinhXe;
use App\Xe;
use App\LoaiXe;
use App\LoaiHang;
use Illuminate\Support\Facades\Log;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class PhatSinhXeController extends Controller
{
    public function index(){
        $phatsinhxe = DB::table('tbl_xe')
            ->select('tbl_phatsinhxe.*', 'tbl_xe.xe_id', 'tbl_xe.biensoxe', 'tbl_loaixe.ten_loaixe', 'users.name')
            ->join('tbl_phatsinhxe', 'tbl_phatsinhxe.xe_id', '=', 'tbl_xe.xe_id')
            ->join('tbl_loaixe', 'tbl_loaixe.loaixe_id', '=', 'tbl_xe.loaixe')
            ->join('users', 'users.id', '=', 'tbl_phatsinhxe.nguoixacnhan')
            ->orderBy('tbl_phatsinhxe.phatsinhxe_id', 'desc')
            ->get();
        return view('phatsinhxe.phatsinhxe')->with(compact('phatsinhxe'));
    }

    public function them(){
        $xe = Xe::orderBy('biensoxe', 'desc')->get();
        return view('phatsinhxe.them')->with(compact('xe'));
    }

    public function luu(Request $request){
        $request->validate([
            "xe_id" => "required",
            "km_batdau" => "required|numeric",
            "km_cuoi" => "required|numeric",
            "ngay" => "required",
            "cayxang" => "required",
            "soluong" => "required|numeric",
            "dongia" => "required|numeric",
            "thanhtien" => "required|numeric",
        ],[
            'xe_id.required' => 'Không được để trống',
            'km_batdau.required' => 'Không được để trống',
            'km_batdau.numeric' => 'Chỉ được nhập số thực',
            'km_cuoi.required' => 'Không được để trống',
            'km_cuoi.numeric' => 'Chỉ được nhập số thực',
            'ngay.required' => 'Không được để trống',
            'cayxang.required' => 'Không được để trống',
            'soluong.required' => 'Không được để trống',
            'soluong.numeric' => 'Chỉ được nhập số thực',
            'dongia.required' => 'Không được để trống',
            'dongia.numeric' => 'Chỉ được nhập số thực',
            'thanhtien.required' => 'Không được để trống',
            'thanhtien.numeric' => 'Chỉ được nhập số thực',
        ]);

        try {
            $phatsinhxe =  new PhatSinhXe();
            $phatsinhxe->xe_id = $request->xe_id;
            $phatsinhxe->km_batdau = $request->km_batdau;
            $phatsinhxe->km_cuoi = $request->km_cuoi;
            $phatsinhxe->ngay = Carbon::createFromFormat('d/m/Y', $request->ngay)->toDateString();
            $phatsinhxe->cayxang = $request->cayxang;
            $phatsinhxe->soluong = $request->soluong;
            $phatsinhxe->dongia = $request->dongia;
            $phatsinhxe->thanhtien = $request->thanhtien;
            $phatsinhxe->ghichu = $request->ghichu;
            $phatsinhxe->nguoixacnhan = $request->nguoixacnhan;
            $phatsinhxe->save();
            Session::flash('message','Thêm thành công!');
            return Redirect::back();
        }catch (\Exception $e){
            Log::error($e);
            Session::flash('message','Thêm thất bại!');
            return Redirect::back();
        }
    }

    public function xoa($phatsinhxe_id){
        try {
            PhatSinhXe::where('phatsinhxe_id',$phatsinhxe_id)->delete();
            return Redirect::back();
        }catch (\Exception $e){
            Log::error($e);
            Session::flash('message','Không thể xóa trường này!');
            return Redirect::back();
        }
    }

    public function sua($phatsinhxe_id){
        $xe = Xe::orderBy('biensoxe', 'desc')->get();
        $phatsinhxe_edit = phatsinhxe::where('phatsinhxe_id',$phatsinhxe_id)->get();
        return view('phatsinhxe.sua')->with(compact('phatsinhxe_edit', 'xe'));
    }

    public function capnhat(Request $request,$phatsinhxe_id){
        $request->validate([
            "xe_id" => "required",
            "km_batdau" => "required|numeric",
            "km_cuoi" => "required|numeric",
            "ngay" => "required",
            "cayxang" => "required",
            "soluong" => "required|numeric",
            "dongia" => "required|numeric",
            "thanhtien" => "required|numeric",
        ],[
            'xe_id.required' => 'Không được để trống',
            'km_batdau.required' => 'Không được để trống',
            'km_batdau.numeric' => 'Chỉ được nhập số thực',
            'km_cuoi.required' => 'Không được để trống',
            'km_cuoi.numeric' => 'Chỉ được nhập số thực',
            'ngay.required' => 'Không được để trống',
            'cayxang.required' => 'Không được để trống',
            'soluong.required' => 'Không được để trống',
            'soluong.numeric' => 'Chỉ được nhập số thực',
            'dongia.required' => 'Không được để trống',
            'dongia.numeric' => 'Chỉ được nhập số thực',
            'thanhtien.required' => 'Không được để trống',
            'thanhtien.numeric' => 'Chỉ được nhập số thực',
        ]);

        try {
            $phatsinhxe = PhatSinhXe::where('phatsinhxe_id',$phatsinhxe_id)->first();
            $phatsinhxe->xe_id = $request->xe_id;
            $phatsinhxe->km_batdau = $request->km_batdau;
            $phatsinhxe->km_cuoi = $request->km_cuoi;
            $phatsinhxe->ngay = Carbon::createFromFormat('d/m/Y', $request->ngay)->toDateString();
            $phatsinhxe->cayxang = $request->cayxang;
            $phatsinhxe->soluong = $request->soluong;
            $phatsinhxe->dongia = $request->dongia;
            $phatsinhxe->thanhtien = $request->thanhtien;
            $phatsinhxe->ghichu = $request->ghichu;
            $phatsinhxe->nguoixacnhan = $request->nguoixacnhan;
            $phatsinhxe->save();
            Session::flash('message','Cập nhật thành công!');
            return Redirect::to('/quan-ly-xe/cap-phat-nhien-lieu');
        }catch (\Exception $e){
            Log::error($e);
            Session::flash('message','Cập nhật không thành công!!');
            return Redirect::to('/quan-ly-xe/cap-phat-nhien-lieu');
        }
    }
}

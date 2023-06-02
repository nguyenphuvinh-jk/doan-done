<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\HoaDon;
use App\DonHang;
use Illuminate\Support\Facades\Log;
use Session;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class HoaDonController extends Controller
{
    public function index(){
        $hoadon = DB::table('tbl_donhang')
            ->select('tbl_hoadon.*', 'tbl_khachhang.ten_kh', 'tbl_donhang.dh_id', 'tbl_donhang.ngayketthuc', 'users.name')
        ->join('tbl_khachhang', 'tbl_khachhang.kh_id', '=', 'tbl_donhang.donvi')
        ->join('tbl_hoadon', 'tbl_hoadon.donhang_id', '=', 'tbl_donhang.dh_id')
            ->join('users', 'users.id', '=', 'tbl_hoadon.nguoitao_hoadon')
        ->get();
        return view('hoadon.hoadon')->with(compact('hoadon'));
    }

    public function them(){
        $donhang = DonHang::where('trangthai_dh', '=', 1)->orderBy('dh_id')->get();
        return view('hoadon.them')->with(compact('donhang'));
    }

    public function luu(Request $request){
        $request->validate([
            "donhang_id" => "required|unique:tbl_hoadon",
            "phithuexe" => "nullable|numeric",
            "phinang" => "nullable|numeric",
            "phiha" => "nullable|numeric",
            "phixepdo" => "nullable|numeric",
            "phigiayto" => "nullable|numeric",
            "philuuca" => "nullable|numeric",
            "handing" => "nullable|numeric",
            "phikhac" => "nullable|numeric",
            "thue" => "nullable|numeric",

        ],[
            'donhang_id.required' => 'Không được để trống',
            'donhang_id.unique' => 'Đơn hàng đã có hóa đơn',
            'phithuexe.numeric' => 'Nhập dữ liệu kiểu số',
            'phinang.numeric' => 'Nhập dữ liệu kiểu số',
            'phiha.numeric' => 'Nhập dữ liệu kiểu số',
            'phixepdo.numeric' => 'Nhập dữ liệu kiểu số',
            'philuuca.numeric' => 'Nhập dữ liệu kiểu số',
            'handing.numeric' => 'Nhập dữ liệu kiểu số',
            'phikhac.numeric' => 'Nhập dữ liệu kiểu số',
            'thue.numeric' => 'Nhập dữ liệu kiểu số',
        ]);

        $donhang_id = $request->donhang_id;
        $phithuexe = $request->phithuexe;
        $phinang = $request->phinang;
        $phiha = $request->phiha;
        $phixepdo = $request->phixepdo;
        $phigiayto = $request->phigiayto;
        $philuuca = $request->philuuca;
        $handing = $request->handing;
        $phikhac = $request->phikhac;
        $thue = $request->thue;
        $tongtien = $phithuexe + $phinang + $phiha + $phigiayto + $philuuca + $phixepdo + $phikhac + $handing;
        $ghichu = $request->ghichu;
        $nguoitao = $request->nguoitao_hoadon;

        try {
            $hoadon =  new HoaDon();
            $hoadon->donhang_id = $donhang_id;
            $hoadon->phithuexe = $phithuexe;
            $hoadon->phinang = $phinang;
            $hoadon->phiha = $phiha;
            $hoadon->phixepdo = $phixepdo;
            $hoadon->phigiayto = $phigiayto;
            $hoadon->philuuca = $philuuca;
            $hoadon->handing = $handing;
            $hoadon->phikhac = $phikhac;
            $hoadon->thue = $thue;
            $hoadon->tongtien = $tongtien + $tongtien*$thue/100;
            $hoadon->ghichu = $ghichu;
            $hoadon->nguoitao_hoadon = $nguoitao;
            $hoadon->save();
            Session::flash('message','Thêm hóa đơn thành công!');
            return Redirect::back();
        }catch (\Exception $e){
            Log::error($e);
            Session::flash('message_err', 'Thêm hóa đơn thất bại!');
            return Redirect::back();
        }
    }

    public function xoa($hoadon_id){
        try {
            HoaDon::where('hoadon_id',$hoadon_id)->delete();
            Session::flash('message', 'Xóa hóa đơn thành công!');
            return Redirect::back();
        }catch (\Exception $e){
            Log::error($e);
            Session::flash('message_err', 'Xóa hóa đơn thất bại!');
            return Redirect::back();
        }

    }

    public function sua($hoadon_id){
        $donhang = DonHang::all();
        $hoadon_edit = HoaDon::where('hoadon_id',$hoadon_id)->get();
        return view('hoadon.sua')->with(compact('hoadon_edit', 'donhang'));
    }

    public function capnhat(Request $request,$hoadon_id){
        $request->validate([
            "phithuexe" => "nullable|numeric",
            "phinang" => "nullable|numeric",
            "phiha" => "nullable|numeric",
            "phixepdo" => "nullable|numeric",
            "phigiayto" => "nullable|numeric",
            "philuuca" => "nullable|numeric",
            "handing" => "nullable|numeric",
            "phikhac" => "nullable|numeric",
            "thue" => "nullable|numeric",

        ],[
            'phithuexe.numeric' => 'Nhập dữ liệu kiểu số',
            'phinang.numeric' => 'Nhập dữ liệu kiểu số',
            'phiha.numeric' => 'Nhập dữ liệu kiểu số',
            'phixepdo.numeric' => 'Nhập dữ liệu kiểu số',
            'philuuca.numeric' => 'Nhập dữ liệu kiểu số',
            'handing.numeric' => 'Nhập dữ liệu kiểu số',
            'phikhac.numeric' => 'Nhập dữ liệu kiểu số',
            'thue.numeric' => 'Nhập dữ liệu kiểu số',
        ]);

        $donhang_id = $request->donhang_id;
        $phithuexe = $request->phithuexe;
        $phinang = $request->phinang;
        $phiha = $request->phiha;
        $phixepdo = $request->phixepdo;
        $phigiayto = $request->phigiayto;
        $philuuca = $request->philuuca;
        $handing = $request->handing;
        $phikhac = $request->phikhac;
        $thue = $request->thue;
        $tongtien = $phithuexe + $phinang + $phiha + $phigiayto + $philuuca + $phixepdo + $phikhac + $handing;
        $ghichu = $request->ghichu;
        $trangthai = $request->trangthai;
        $nguoitao = $request->nguoitao_hoadon;

        try {
            $hoadon = HoaDon::where('hoadon_id',$hoadon_id)->first();
            $hoadon->donhang_id = $donhang_id;
            $hoadon->phithuexe = $phithuexe;
            $hoadon->phinang = $phinang;
            $hoadon->phiha = $phiha;
            $hoadon->phixepdo = $phixepdo;
            $hoadon->phigiayto = $phigiayto;
            $hoadon->philuuca = $philuuca;
            $hoadon->handing = $handing;
            $hoadon->phikhac = $phikhac;
            $hoadon->thue = $thue;
            $hoadon->tongtien = $tongtien + $tongtien*$thue/100;
            $hoadon->ghichu = $ghichu;
            $hoadon->trangthai = $trangthai;
            $hoadon->nguoitao_hoadon = $nguoitao;
            $hoadon->save();

            Session::flash('message','Cập nhật hóa đơn thành công!');
            return Redirect::to('/quan-ly-van-chuyen/hoa-don-van-chuyen');
        }catch (\Exception $e){
            Log::error($e);
            Session::flash('message_err', 'Cập nhật hóa đơn thất bại!');
            return Redirect::to('/quan-ly-van-chuyen/hoa-don-van-chuyen');
        }
    }

    public function xem($hoadon_id){
        $hoadon = DB::table('tbl_dieuxe')
            ->join('tbl_donhang','tbl_donhang.dh_id','=','tbl_dieuxe.donhang_id')
            ->join('tbl_loaixe', 'tbl_loaixe.loaixe_id', '=', 'tbl_dieuxe.loaixe')
            ->join('tbl_xe','tbl_xe.xe_id','=','tbl_dieuxe.xe_id')
            ->join('tbl_taixe','tbl_taixe.taixe_id','=','tbl_dieuxe.laixe')
            ->join('tbl_khachhang', 'tbl_khachhang.kh_id', '=', 'tbl_donhang.donvi')
            ->join('tbl_loaihang', 'tbl_loaihang.loaihang_id', '=', 'tbl_donhang.mathang')
            ->join('tbl_dvt', 'tbl_dvt.dvt_id', '=', 'tbl_donhang.donvitinh')
            ->join('tbl_tuyenduong', 'tbl_tuyenduong.tuyenduong_id', '=', 'tbl_donhang.tuyenduong')
            ->join('tbl_hoadon', 'tbl_hoadon.donhang_id', '=', 'tbl_donhang.dh_id')
            ->where('hoadon_id', '=', $hoadon_id)->get();
        return view('hoadon.hoadonchitiet')->with(compact('hoadon'));
    }

    public function active($hoadon_id)
    {
        try {
            HoaDon::where('hoadon_id',$hoadon_id)->update([
                'trangthai' => 1,
            ]);

            Session::flash('message','Cập nhật hóa đơn thành công!');
            return Redirect::back();
        }catch (\Exception $e){
            Log::error($e);
            Session::flash('message_err', 'Cập nhật hóa đơn thất bại!');
            return Redirect::back();
        }
    }

    public function inactive($hoadon_id)
    {
        try {
            HoaDon::where('hoadon_id',$hoadon_id)->update([
                'trangthai' => 0,
            ]);

            Session::flash('message','Cập nhật hóa đơn thành công!');
            return Redirect::back();
        }catch (\Exception $e){
            Log::error($e);
            Session::flash('message_err', 'Cập nhật hóa đơn thất bại!');
            return Redirect::back();
        }
    }

}

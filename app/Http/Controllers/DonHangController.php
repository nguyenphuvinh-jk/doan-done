<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\DonHang;
use App\KhachHang;
use App\DVT;
use App\LoaiHang;
use App\TuyenDuong;
use App\User;
use Session;
use App\Helper\Helper;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
session_start();

class DonHangController extends Controller
{
    public function index(){
        $donhang = DB::table('tbl_donhang')
            ->select('tbl_donhang.*', 'tbl_khachhang.ten_kh', 'tbl_loaihang.ten_loaihang', 'tbl_tuyenduong.ten_tuyenduong', 'tbl_dvt.ten_dvt', 'users.name')
            ->join('tbl_khachhang','tbl_khachhang.kh_id','=','tbl_donhang.donvi')
            ->join('tbl_loaihang','tbl_loaihang.loaihang_id','=','tbl_donhang.mathang')
            ->join('tbl_tuyenduong','tbl_tuyenduong.tuyenduong_id','=','tbl_donhang.tuyenduong')
            ->join('tbl_dvt','tbl_dvt.dvt_id','=','tbl_donhang.donvitinh')
            ->join('users', 'users.id', '=', 'tbl_donhang.nguoitao_dh')
            ->get();
        return view('donhang.donhang')->with(compact('donhang'));
    }

    public function them(){
        $loaihang = LoaiHang::all();
        $tuyenduong = TuyenDuong::all();
        $dvt = DVT::all();
        $khachhang = KhachHang::all();
        return view('donhang.them')->with(compact('khachhang', 'dvt', 'loaihang', 'tuyenduong'));
    }

    public function luu(Request $request){
        $request->validate([
            "donvi" => "required",
            "mathang" => "required",
            "trongluong" => "required|numeric",
            "donvitinh" => "required",
            "tuyenduong" => "required",
            "dd_layhang" => "required",
            "dd_giaohang" => "required",
            "tg_batdau" => "required",
            "ngaybatdau" => "required",
            "ngayketthuc" => "required",

        ],[
            'donvi.required' => 'Không được để trống',
            'mathang.required' => 'Không được để trống',
            'trongluong.required' => 'Không được để trống',
            'trongluong.numeric' => 'Chỉ nhập kiểu số thực',
            'donvitinh.required' => 'Không được để trống',
            'tuyenduong.required' => 'Không được để trống',
            'dd_layhang.required' => 'Không được để trống',
            'dd_giaohang.required' => 'Không được để trống',
            'tg_batdau.required' => 'Không được để trống',
            'ngaybatdau.required' => 'Không được để trống',
            'ngayketthuc.required' => 'Không được để trống',
        ]);

        $dh_id = Helper::IDCustomize(new DonHang(), 'dh_id', '5', 'DH');

        try {
            $donhang =  new DonHang();
            $donhang->dh_id = $dh_id;
            $donhang->donvi = $request->donvi;
            $donhang->ngaydat = Carbon::createFromFormat('d/m/Y', $request->ngaydat)->toDateString();
            $donhang->mathang = $request->mathang;
            $donhang->trongluong = $request->trongluong;
            $donhang->donvitinh = $request->donvitinh;
            $donhang->tuyenduong = $request->tuyenduong;
            $donhang->dd_layhang = $request->dd_layhang;
            $donhang->dd_giaohang = $request->dd_giaohang;
            $donhang->tg_batdau = $request->tg_batdau;
            $donhang->ngaybatdau = Carbon::createFromFormat('d/m/Y', $request->ngaybatdau)->toDateString();
            $donhang->ngayketthuc = Carbon::createFromFormat('d/m/Y', $request->ngayketthuc)->toDateString();
            $donhang->gioluuca = $request->gioluuca;
            $donhang->nguoitao_dh = $request->nguoitao_dh;
            $donhang->save();
            Session::flash('message','Thêm đơn hàng thành công!');
            return Redirect::back();
        }catch (\Exception $e){
            Log::error($e);
            Session::flash('message_err','Thêm đơn hàng thất bại!');
            return Redirect::back();
        }
    }

    public function xoa($donhang_id){
        try {
            DonHang::where('dh_id',$donhang_id)->delete();
            Session::flash('message','Xóa đơn hàng thành công!');
            return Redirect::back();
        }catch (\Exception $e){
            Log::error($e);
            Session::flash('message_err','Xóa đơn hàng thất bại!');
            return Redirect::back();
        }

    }

    public function sua($donhang_id){
        $loaihang = LoaiHang::all();
        $tuyenduong = TuyenDuong::all();
        $khachhang = KhachHang::all();
        $dvt = DVT::all();
        $donhang_edit = DonHang::where('dh_id',$donhang_id)->get();
        return view('donhang.sua')->with(compact('donhang_edit', 'khachhang', 'dvt', 'loaihang' ,'tuyenduong'));
    }

    public function capnhat(Request $request,$donhang_id){
        $request->validate([
            "donvi" => "required",
            "mathang" => "required",
            "trongluong" => "required|numeric",
            "donvitinh" => "required",
            "dd_layhang" => "required",
            "dd_giaohang" => "required",
            "tg_batdau" => "required",
            "ngaybatdau" => "required",
            "ngayketthuc" => "required",

        ],[
            'donvi.required' => 'Không được để trống',
            'mathang.required' => 'Không được để trống',
            'trongluong.required' => 'Không được để trống',
            'trongluong.numeric' => 'Chỉ nhập kiểu số thực',
            'donvitinh.required' => 'Không được để trống',
            'dd_layhang.required' => 'Không được để trống',
            'dd_giaohang.required' => 'Không được để trống',
            'tg_batdau.required' => 'Không được để trống',
            'ngaybatdau.required' => 'Không được để trống',
            'ngayketthuc.required' => 'Không được để trống',
        ]);

        try {
            $donhang = DonHang::where('dh_id',$donhang_id)->first();
            $donhang->donvi = $request->donvi;
            $donhang->ngaydat = Carbon::createFromFormat('d/m/Y', $request->ngaydat)->toDateString();
            $donhang->mathang = $request->mathang;
            $donhang->trongluong = $request->trongluong;
            $donhang->donvitinh = $request->donvitinh;
            $donhang->tuyenduong = $request->tuyenduong;
            $donhang->dd_layhang = $request->dd_layhang;
            $donhang->dd_giaohang = $request->dd_giaohang;
            $donhang->tg_batdau = $request->tg_batdau;
            $donhang->ngaybatdau = Carbon::createFromFormat('d/m/Y', $request->ngaybatdau)->toDateString();
            $donhang->ngayketthuc = Carbon::createFromFormat('d/m/Y', $request->ngayketthuc)->toDateString();
            $donhang->gioluuca = $request->gioluuca;
            $donhang->trangthai_dh = $request->trangthai_dh;
            $donhang->nguoitao_dh = $request->nguoitao_dh;
            $donhang->save();
            Session::flash('message','Cập nhật đơn hàng thành công!');
            return Redirect::to('/quan-ly-van-chuyen/don-hang');
        }catch (\Exception $e){
            Log::error($e);
            Session::flash('message_err','Cập nhật đơn hàng thất bại!');
            return Redirect::to('/quan-ly-van-chuyen/don-hang');
        }
    }
}

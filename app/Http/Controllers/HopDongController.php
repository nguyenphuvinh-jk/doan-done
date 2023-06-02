<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\HopDong;
use App\KhachHang;
use App\User;
use Session;
use App\Http\Requests;
use App\Helper\Helper;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
session_start();

class HopDongController extends Controller
{
    public function index(){
        $hopdong = DB::table('tbl_hopdong')
            ->select('tbl_hopdong.*', 'tbl_khachhang.ten_kh', 'users.name')
            ->join('tbl_khachhang', 'tbl_khachhang.kh_id', '=', 'tbl_hopdong.ten_kh')
            ->join('users', 'users.id', '=', 'tbl_hopdong.nguoitao')
            ->get();
        $khachhang = KhachHang::all();
        return view('hopdong.hopdong')->with(compact('khachhang', 'hopdong'));
    }

    public function luu(Request $request){
        $request->validate([
            "ten_kh" => "required|unique:tbl_hopdong",
            "ngaybatdau_hd" => "required",
            "ngayhethan_hd" => "required",

        ],[
            'ten_kh.required' => 'Không được để trống',
            'ten_kh.unique' => 'Khách hàng đã có hợp đồng',
            'ngaybatdau_hd.required' => 'Không được để trống',
            'ngayhethan_hd.required' => 'Không được để trống',
        ]);

        $hd_id = Helper::IDCustomize(new HopDong(), 'hd_id', '5', 'HD');

        try {
            $hopdong =  new HopDong();
            $hopdong->hd_id = $hd_id;
            $hopdong->ten_kh = $request->ten_kh;
            $hopdong->ngaybatdau_hd = Carbon::createFromFormat('d/m/Y', $request->ngaybatdau_hd)->toDateString();
            $hopdong->ngayhethan_hd = Carbon::createFromFormat('d/m/Y', $request->ngayhethan_hd)->toDateString();
            $hopdong->noidung_hd = $request->noidung_hd;
            $hopdong->nguoitao = $request->nguoitao;
            $hopdong->save();
            Session::flash('message','Thêm hợp đồng thành công!');
            return Redirect::back();
        }catch (\Exception $e){
            Log::error($e);
            Session::flash('message_err','Thêm hợp đồng thất bại!');
            return Redirect::back();
        }
    }

    public function xoa($hopdong_id){
        try {
            HopDong::where('hd_id',$hopdong_id)->delete();
            Session::flash('message','Xóa hợp đồng thành công!');
            return Redirect::to('/quan-ly-khach-hang/hop-dong-van-chuyen');
        }catch (\Exception $e){
            Log::error($e);
            Session::flash('message_err','Xóa hợp đồng thất bại!');
            return Redirect::to('/quan-ly-khach-hang/hop-dong-van-chuyen');
        }

    }

    public function sua($hopdong_id){
        $hopdong = DB::table('tbl_hopdong')
            ->select('tbl_hopdong.*', 'tbl_khachhang.ten_kh', 'users.name')
            ->join('tbl_khachhang', 'tbl_khachhang.kh_id', '=', 'tbl_hopdong.ten_kh')
            ->join('users', 'users.id', '=', 'tbl_hopdong.nguoitao')
            ->get();
        $khachhang = KhachHang::all();
        $hopdong_edit = hopdong::where('hd_id',$hopdong_id)->get();
        return view('hopdong.hopdong')->with(compact('hopdong_edit', 'hopdong', 'khachhang'));
    }

    public function capnhat(Request $request,$hopdong_id){
        try {
            $hopdong = HopDong::where('hd_id',$hopdong_id)->first();
            $hopdong->ten_kh = $request->ten_kh;
            $hopdong->ngaybatdau_hd = Carbon::createFromFormat('d/m/Y', $request->ngaybatdau_hd)->toDateString();
            $hopdong->ngayhethan_hd = Carbon::createFromFormat('d/m/Y', $request->ngayhethan_hd)->toDateString();
            $hopdong->noidung_hd = $request->noidung_hd;
            $hopdong->nguoitao = $request->nguoitao;
            $hopdong->save();
            Session::flash('message','Cập nhật hợp đồng thành công!');
            return Redirect::to('/quan-ly-khach-hang/hop-dong-van-chuyen');
        }catch (\Exception $e){
            Log::error($e);
            Session::flash('message_err','Cập nhật hợp đồng thất bại!!');
            return Redirect::to('/quan-ly-khach-hang/hop-dong-van-chuyen');
        }
    }
}

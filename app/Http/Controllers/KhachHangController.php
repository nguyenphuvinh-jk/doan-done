<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\KhachHang;
use Illuminate\Support\Facades\Log;
use Session;
use App\Http\Requests;
use App\Helper\Helper;
use Illuminate\Support\Facades\Redirect;
session_start();

class KhachHangController extends Controller
{
    public function index(){
        $khachhang = KhachHang::all();
        return view('khachhang.khachhang')->with(compact('khachhang'));
    }

    public function them(){
        return view('khachhang.them');
    }

    public function luu(Request $request){
        $request->validate([
            "ten_kh" => "required|unique:tbl_khachhang",
            "sdt_kh" => "required|string|regex:/^(0)[0-9]{9}$/",
            "diachi_kh" => "required",
            'masothue_kh' => "nullable|regex:/[0-9]$/|max:10",
            'fax_kh' => "nullable|regex:/[0-9]$/|max:10",
            "sotk_kh" =>"required|regex:/[0-9]$/|min:9|max:16",
            "ten_nganhang" => "required",
        ],[
            'ten_kh.required' => 'Không được để trống',
            'ten_kh.unique' => 'Tên khách hàng đã tồn tại',
            'sdt_kh.required' => 'Không được để trống',
            'sdt_kh.regex' => 'Nhập sai định dạng',
            'diachi_kh.required' => 'Không được để trống',
            'masothue_kh.max' => 'Nhập tối đa 10 ký tự',
            'masothue_kh.regex' => 'Dữ liệu nhập phải là số',
            'fax_kh.regex' => 'Dữ liệu nhập phải là số',
            'fax_kh.max' => 'Nhập tối đa 10 ký tự',
            'sotk_kh.required' => 'Không được để trống',
            'sotk_kh.min' => 'Nhập tối thiểu 9 ký tự',
            'sotk_kh.max' => 'Nhập tối đa 16 ký tự',
            'sotk_kh.regex' => 'Điền dữ liệu kiểu số',
            'ten_nganhang.required' => 'Không được để trống',
        ]);

        $kh_id = Helper::IDCustomize(new KhachHang(), 'kh_id', 5, 'MKH');

        try {
            $khachhang =  new KhachHang();
            $khachhang->kh_id = $kh_id;
            $khachhang->ten_kh = $request->ten_kh;
            $khachhang->sdt_kh = $request->sdt_kh;
            $khachhang->diachi_kh = $request->diachi_kh;
            $khachhang->masothue_kh = $request->masothue_kh;
            $khachhang->fax_kh = $request->fax_kh;
            $khachhang->sotk_kh = $request->sotk_kh;
            $khachhang->ten_nganhang = $request->ten_nganhang;
            $khachhang->nguoidaidien_kh = $request->nguoidaidien_kh;
            $khachhang->chucvu_kh = $request->chucvu_kh;
            $khachhang->save();
            Session::flash('message','Thêm khách hàng thành công!');
            return Redirect::back();
        }catch (\Exception $e){
            Log::error($e);
            Session::flash('message_err','Thêm khách hàng thất bại!');
            return Redirect::back();
        }
    }

    public function xoa($khachhang_id){
        try {
            KhachHang::where('kh_id',$khachhang_id)->delete();
            Session::flash('message','Xóa khách hàng thành công!');
            return Redirect::back();
        }catch (\Exception $e){
            Log::error($e);
            Session::flash('message_err','Xóa khách hàng thất bại!');
            return Redirect::back();
        }
    }

    public function sua($khachhang_id){
        $khachhang_edit = KhachHang::where('kh_id',$khachhang_id)->get();
        return view('khachhang.sua')->with(compact('khachhang_edit'));
    }

    public function capnhat(Request $request,$khachhang_id){
        $request->validate([
            "ten_kh" => "required",
            "sdt_kh" => "required|string|regex:/^(0)[0-9]{9}$/",
            "diachi_kh" => "required",
            'masothue_kh' => "nullable|regex:/[0-9]$/|max:10",
            'fax_kh' => "nullable|regex:/[0-9]$/|max:10",
            "sotk_kh" =>"required|regex:/[0-9]$/|min:9|max:16",
            "ten_nganhang" => "required",
        ],[
            'ten_kh.required' => 'Không được để trống',
            'sdt_kh.required' => 'Không được để trống',
            'sdt_kh.regex' => 'Nhập sai định dạng',
            'diachi_kh.required' => 'Không được để trống',
            'masothue_kh.max' => 'Nhập tối đa 10 ký tự',
            'masothue_kh.regex' => 'Dữ liệu nhập phải là số',
            'fax_kh.regex' => 'Dữ liệu nhập phải là số',
            'fax_kh.max' => 'Nhập tối đa 10 ký tự',
            'sotk_kh.required' => 'Không được để trống',
            'sotk_kh.min' => 'Nhập tối thiểu 9 ký tự',
            'sotk_kh.max' => 'Nhập tối đa 16 ký tự',
            'sotk_kh.regex' => 'Điền dữ liệu kiểu số',
            'ten_nganhang.required' => 'Không được để trống',
        ]);

        try {
            $khachhang = KhachHang::where('kh_id',$khachhang_id)->first();
            $khachhang->ten_kh = $request->ten_kh;
            $khachhang->sdt_kh = $request->sdt_kh;
            $khachhang->diachi_kh = $request->diachi_kh;
            $khachhang->masothue_kh = $request->masothue_kh;
            $khachhang->fax_kh = $request->fax_kh;
            $khachhang->sotk_kh = $request->sotk_kh;
            $khachhang->ten_nganhang = $request->ten_nganhang;
            $khachhang->nguoidaidien_kh = $request->nguoidaidien_kh;
            $khachhang->chucvu_kh = $request->chucvu_kh;
            $khachhang->save();
            Session::flash('message','Cập nhật khách hàng thành công!');
            return Redirect::to('/quan-ly-khach-hang/khach-hang');
        }catch (\Exception $e){
            Log::error($e);
            Session::flash('message','Cập nhật khách hàng thất bại!');
            return Redirect::to('/quan-ly-khach-hang/khach-hang');
        }
    }
}

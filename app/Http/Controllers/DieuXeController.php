<?php

namespace App\Http\Controllers;

use App\DieuXe;
use App\LoaiXe;
use App\LoaiHang;
use App\Xe;
use Illuminate\Http\Request;
use DB;
use App\DonHang;
use App\TaiXe;
use Session;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
session_start();

class DieuXeController extends Controller
{
    public function index(){
        $donhang = DonHang::where('trangthai_dh','=','0')->get();
        $loaixe = LoaiXe::all();
        $laixe = TaiXe::all();
        $dieuxe = DB::table('tbl_dieuxe')
            ->select('tbl_donhang.*', 'tbl_loaixe.ten_loaixe', 'tbl_xe.biensoxe', 'tbl_taixe.taixe_id', 'tbl_taixe.ten_taixe', 'tbl_dieuxe.*', 'users.name')
            ->join('tbl_donhang','tbl_donhang.dh_id','=','tbl_dieuxe.donhang_id')
            ->join('tbl_loaixe', 'tbl_loaixe.loaixe_id', '=', 'tbl_dieuxe.loaixe')
            ->join('tbl_xe','tbl_xe.xe_id','=','tbl_dieuxe.xe_id')
            ->join('tbl_taixe','tbl_taixe.taixe_id','=','tbl_dieuxe.laixe')
            ->join('users', 'users.id', '=', 'tbl_dieuxe.nguoitao_dx')
            ->orderby('tbl_dieuxe.created_at', 'DESC')->get();
        return view('dieuxe.dieuxe')->with(compact('dieuxe', 'donhang', 'laixe', 'loaixe'));
    }

    public function getXe(Request $request)
    {
        $lx_id = $_GET['loaixe_id'];
        $xe = Xe::where('trangthai', '=', '0')->where('loaixe', '=', $lx_id)->get();

        if (count($xe) > 0) {
            return response()->json($xe);
        }
    }

    public function luu(Request $request){
        $request->validate([
            "donhang_id" => "required",
            "loaixe" => "required",
            "laixe" => "required",
            "xe_id" => "required",
        ],[
            'donhang_id.required' => 'Không được để trống',
            'loaixe.required' => 'Không được để trống',
            'laixe.required' => 'Không được để trống',
            'xe_id.required' => 'Không được để trống',
        ]);

            $dieuxe = new DieuXe();
            $donhang_id = $request->donhang_id;
            $lx_id = $request->loaixe;
            $xe_id = $request->xe_id;
            $laixe_id = $request->laixe;
            $xe = Xe::where('xe_id',$xe_id)->first();
            $all_dieuxe = DB::table('tbl_dieuxe')
                ->join('tbl_donhang','tbl_donhang.dh_id','=','tbl_dieuxe.donhang_id')->get();
            $donhang = DonHang::where('dh_id', '=', $donhang_id)->first();
            $i=0;
            foreach ($all_dieuxe as $all){
                if ($all->xe_id==$xe_id || $all->laixe==$laixe_id && $all->ngaybatdau==$donhang->ngaybatdau && $all->ngayketthuc==$donhang->ngayketthuc)
                    $i++;
            }
            if ($i>0){
                Session::flash('message_err','Xe hoặc lái xe bị trùng lịch!!!!');
                return Redirect::back();
            }else{
                if ($xe->loaixe == $lx_id){
                    try {
                        $dieuxe->donhang_id = $donhang_id;
                        $dieuxe->loaixe = $lx_id;
                        $dieuxe->xe_id = $xe_id;
                        $dieuxe->laixe = $laixe_id;
                        $dieuxe->nguoitao_dx = $request->nguoitao_dx;
                        $dieuxe->save();
                        Session::flash('message','Thêm điều xe thành công!');
                        return Redirect::back();
                    }catch (\Exception $e){
                        Log::error($e);
                        Session::flash('message_err','Thêm điều xe thất bại!!!');
                        return Redirect::back();
                    }

                }else{
                    Session::flash('message_err','Có lỗi xảy ra!!!!');
                    return Redirect::back();
                }
            }
    }

    public function xoa($dieuxe_id){
        try {
            DieuXe::where('dieuxe_id',$dieuxe_id)->delete();
            return Redirect::back();
        }catch (\Exception $e){
            Log::error($e);
            Session::flash('message_err','Xóa điều xe thất bại!!!');
            return Redirect::back();
        }

    }

    public function xem($dieuxe_id){

        $dieuxe = DB::table('tbl_dieuxe')
            ->join('tbl_donhang','tbl_donhang.dh_id','=','tbl_dieuxe.donhang_id')
            ->join('tbl_loaixe', 'tbl_loaixe.loaixe_id', '=', 'tbl_dieuxe.loaixe')
            ->join('tbl_xe','tbl_xe.xe_id','=','tbl_dieuxe.xe_id')
            ->join('tbl_taixe', 'tbl_taixe.taixe_id', '=', 'tbl_dieuxe.laixe')
            ->join('tbl_khachhang', 'tbl_khachhang.kh_id', '=', 'tbl_donhang.donvi')
            ->join('tbl_loaihang', 'tbl_loaihang.loaihang_id', '=', 'tbl_donhang.mathang')
            ->join('tbl_dvt', 'tbl_dvt.dvt_id', '=', 'tbl_donhang.donvitinh')
            ->join('tbl_tuyenduong', 'tbl_tuyenduong.tuyenduong_id', '=', 'tbl_donhang.tuyenduong')
            ->join('tbl_banglai', 'tbl_banglai.taixe_id', '=', 'tbl_taixe.taixe_id')
            ->where('dieuxe_id', '=', $dieuxe_id)->get();

        return view('dieuxe.chitietdieuxe')->with(compact('dieuxe'));
    }

}

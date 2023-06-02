<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\HoaDon;
use App\TaiXe;
use App\KhachHang;
use App\DonHang;
use App\User;
use Session;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class TongQuanController extends Controller
{
    public function index(){

        $thu = HoaDon::orderBy('created_at')->get()->groupBy(function($data) {
            return \Carbon\Carbon::parse($data->created_at)->format('F');
        })
            ->map(function($entries) {
                return $entries->sum('tongtien');
            })
            ->toArray();

        $labels_thu = array_keys($thu);
        $data_thu = array_values($thu);

        $users = DonHang::orderBy('created_at')->get()->groupBy(function($data) {
            if (Carbon::today()->format('Y') == Carbon::parse($data->created_at)->format('Y') && Carbon::today()->format('F') == Carbon::parse($data->created_at)->format('F')){
                return \Carbon\Carbon::parse($data->created_at)->format('d');
            }
        })
            ->map(function($entries) {
                return $entries->count();
            })
            ->toArray();

        unset($users['']);

        $labels = array_keys($users);
        $data = array_values($users);

        $all_taixe = DB::table('tbl_taixe')->count();
        $all_donhang = DB::table('tbl_donhang')->count();
        $all_khachhang = DB::table('tbl_khachhang')->count();
        $doanhthu = DB::table('tbl_hoadon')->sum('tongtien');
        $dh_thanhtoan = HoaDon::where('trangthai', '=', 0)->count();
        $hoadon = DB::table('tbl_donhang')
            ->join('tbl_khachhang', 'tbl_khachhang.kh_id', '=', 'tbl_donhang.donvi')
            ->join('tbl_hoadon', 'tbl_hoadon.donhang_id', '=', 'tbl_donhang.dh_id')
            ->get();
        $count_dh = DonHang::where('ngaybatdau', '=', Carbon::today())->count();
        $donhang_hnay = DonHang::where('ngaybatdau', '=', Carbon::today())->get();
        return view('trangchu.trangchu')->with(compact('hoadon', 'dh_thanhtoan', 'all_taixe', 'all_donhang', 'all_khachhang', 'doanhthu', 'labels', 'data', 'donhang_hnay', 'count_dh', 'labels_thu', 'data_thu'));
    }

    public function getNam(Request $request)
    {
        if ($_GET['nam'] == Carbon::today()->format('Y')) {
            $users = DonHang::orderBy('created_at')->get()->groupBy(function ($data) {
                if (Carbon::parse($data->created_at)->format('Y') == $_GET['nam']) {
                    return \Carbon\Carbon::parse($data->created_at)->format('F');
                }

            })
                ->map(function ($entries) {
                    return $entries->count();
                })
                ->toArray();


            return response()->json($users);
        } else {
            $users = DonHang::orderBy('created_at')->get()->groupBy(function($data) {
                if (Carbon::today()->format('Y') == Carbon::parse($data->created_at)->format('Y') && Carbon::parse($data->created_at)->format('m') == $_GET['nam']){
                    return \Carbon\Carbon::parse($data->created_at)->format('d');
                }
            })
                ->map(function($entries) {
                    return $entries->count();
                })
                ->toArray();

            unset($users['']);

            return response()->json($users);
        }
    }
}

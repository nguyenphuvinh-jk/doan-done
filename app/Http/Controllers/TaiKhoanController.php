<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use DB;
use Illuminate\Support\Facades\Log;
use Session;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redirect;
session_start();

class TaiKhoanController extends Controller
{
    public function index(){
        $taikhoan = User::all();
        return view('taikhoan.taikhoan')->with(compact('taikhoan'));
    }

    public function login(){
        return view('dangnhap.dangnhap');
    }

    public function dangnhap(Request $request){
        $this->validate($request, [
            'username'           => 'required|email',
            'password'           => 'required',
        ],
        [
            'username.required' => 'Không được để trống',
            'username.email' => 'Nhập đúng email',
            'password.required' => 'Không được để trống',
        ]);

        $remember = $request->remember;
        $username = $request->username;
        $password = $request->password;
        if (Auth::attempt([
            'email' => $username,
            'password' => $password,
            'status' => 0,
        ])){
            if (!empty($remember)){
                setcookie ("username",$username, time() + (86400 * 30));
                setcookie ("password",$password, time() + (86400 * 30));
            }

            $user = User::where('email', $username)->first();
            Auth::login($user);

            return Redirect::to('/');
        }else{
            Session::flash('message_err','Email hoặc mật khẩu không đúng');
            return Redirect::back();
        }
    }

    public function logout(){
        Auth::logout();
        return Redirect::to('/dang-nhap');
    }

    public function luu(Request $request){
        $request->validate([
            "name" => "required",
            "email" => "required",
            "password" => "required",
            "quyenhan" => "required",
        ],[
            'name.required' => 'Không được để trống',
            'email.required' => 'Không được để trống',
            'quyenhan.required' => 'Không được để trống',
            'password.required' => 'Không được để trống',
        ]);

        try {
            $taikhoan =  new User();
            $taikhoan->name = $request->name;
            $taikhoan->email = $request->email;
            $taikhoan->password = bcrypt($request->password);
            $taikhoan->quyenhan = $request->quyenhan;
            $taikhoan->save();
            Session::flash('message','Thêm tài khoản thành công!');
            return Redirect::back();
        }catch (\Exception $e){
            Log::error($e);
            Session::flash('message_err','Thêm tài khoản thất bại!');
            return Redirect::back();
        }
    }

    public function xoa($taikhoan_id){
        try {
            User::where('id',$taikhoan_id)->delete();
            Session::flash('message','Xóa tài khoản thành công!');
            return Redirect::to('/tai-khoan');
        }catch (\Exception $e){
            Log::error($e);
            Session::flash('message_err','Xóa tài khoản thất bại!');
            return Redirect::to('/tai-khoan');
        }
    }

    public function sua($taikhoan_id){
        $taikhoan = User::all();
        $taikhoan_edit = User::where('id',$taikhoan_id)->get();
        return view('taikhoan.taikhoan')->with(compact('taikhoan_edit', 'taikhoan'));
    }

    public function capnhat(Request $request,$taikhoan_id){
        $request->validate([
            "name" => "required",
            "email" => "required",
            "quyenhan" => "required",
        ],[
            'name.required' => 'Không được để trống',
            'email.required' => 'Không được để trống',
            'password.required' => 'Không được để trống',
        ]);

        try {
            $taikhoan = User::where('id',$taikhoan_id)->first();
            $taikhoan->name = $request->name;
            $taikhoan->email = $request->email;
            if ($request->password != ''){
                $taikhoan->password = bcrypt($request->password);
            }
            $taikhoan->quyenhan = $request->quyenhan;
            $taikhoan->save();
            Session::flash('message','Cập nhật tài khoản thành công!');
            return Redirect::to('/tai-khoan');
        }catch (\Exception $e){
            Log::error($e);
            Session::flash('message_err','Cập nhật tài khoản thất bại!!');
            return Redirect::to('/tai-khoan');
        }
    }

    public function khoa($taikhoan_id)
    {

        DB::table('users')->where('id', $taikhoan_id)->update(['status' => 1]);

        return Redirect::back();

    }

    public function mokhoa($taikhoan_id)
    {

        DB::table('users')->where('id', $taikhoan_id)->update(['status' => 0]);

        return Redirect::back();

    }
}

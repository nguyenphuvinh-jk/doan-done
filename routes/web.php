<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware' => 'auth'], function (){
    Route::get('/', 'TongQuanController@index');
    Route::get('/trang-chu', 'TongQuanController@index');
    Route::get('/bieu-do/nam', 'TongQuanController@getNam')->name('getNam');
});

//danh muc
//khoang cach
Route::get('/quan-ly-danh-muc/loai-xe', 'LoaiXeController@index');
Route::post('/quan-ly-danh-muc/loai-xe/luu', 'LoaiXeController@luu')->middleware('quyen.checker:admin|qldoixe');
Route::get('/quan-ly-danh-muc/loai-xe/xoa/{loaixe_id}', 'LoaiXeController@xoa')->middleware('quyen.checker:admin|qldoixe');

//hang xe
Route::get('/quan-ly-danh-muc/hang-xe', 'HangXeController@index');
Route::post('/quan-ly-danh-muc/hang-xe/luu', 'HangXeController@luu')->middleware('quyen.checker:admin|qldoixe');
Route::get('/quan-ly-danh-muc/hang-xe/xoa/{hangxe_id}', 'HangXeController@xoa')->middleware('quyen.checker:admin|qldoixe');
Route::get('/quan-ly-danh-muc/hang-xe/sua/{hangxe_id}', 'HangXeController@sua')->middleware('quyen.checker:admin|qldoixe');
Route::post('/quan-ly-danh-muc/hang-xe/capnhat/{hangxe_id}', 'HangXeController@capnhat')->middleware('quyen.checker:admin|qldoixe');

//loai hang
Route::get('/quan-ly-danh-muc/loai-hang', 'LoaiHangController@index');
Route::post('/quan-ly-danh-muc/loai-hang/luu', 'LoaiHangController@luu')->middleware('quyen.checker:admin|kehoach');
Route::get('/quan-ly-danh-muc/loai-hang/xoa/{loaihang_id}', 'LoaiHangController@xoa')->middleware('quyen.checker:admin|kehoach');

//tuyen duong
Route::get('/quan-ly-danh-muc/tuyen-duong', 'TuyenDuongController@index');
Route::post('/quan-ly-danh-muc/tuyen-duong/luu', 'TuyenDuongController@luu')->middleware('quyen.checker:admin|qldoixe|kehoach');
Route::get('/quan-ly-danh-muc/tuyen-duong/xoa/{tuyenduong_id}', 'TuyenDuongController@xoa')->middleware('quyen.checker:admin|qldoixe|kehoach');

//Don vi tinh
Route::get('/quan-ly-danh-muc/don-vi-tinh', 'DVTController@index');
Route::post('/quan-ly-danh-muc/don-vi-tinh/luu', 'DVTController@luu')->middleware('quyen.checker:admin|kehoach');
Route::get('/quan-ly-danh-muc/don-vi-tinh/xoa/{dvt_id}', 'DVTController@xoa')->middleware('quyen.checker:admin|kehoach');


//Loai giay to
Route::get('/quan-ly-danh-muc/loai-giay-to-xe', 'LoaiGiayToController@index');
Route::post('/quan-ly-danh-muc/loai-giay-to-xe/luu', 'LoaiGiayToController@luu')->middleware('quyen.checker:admin|qldoixe');
Route::get('/quan-ly-danh-muc/loai-giay-to-xe/xoa/{loaigiayto_id}', 'LoaiGiayToController@xoa')->middleware('quyen.checker:admin|qldoixe');

//Hop dong van chuyen
Route::get('/quan-ly-khach-hang/hop-dong-van-chuyen', 'HopDongController@index');
Route::post('/quan-ly-khach-hang/hop-dong-van-chuyen/luu', 'HopDongController@luu')->middleware('quyen.checker:admin|kehoach');
Route::get('/quan-ly-khach-hang/hop-dong-van-chuyen/xoa/{hopdong_id}', 'HopDongController@xoa')->middleware('quyen.checker:admin|kehoach');
Route::get('/quan-ly-khach-hang/hop-dong-van-chuyen/sua/{hopdong_id}', 'HopDongController@sua')->middleware('quyen.checker:admin|kehoach');
Route::post('/quan-ly-khach-hang/hop-dong-van-chuyen/capnhat/{hopdong_id}', 'HopDongController@capnhat')->middleware('quyen.checker:admin|kehoach');

//khach hang
Route::get('/quan-ly-khach-hang/khach-hang', 'KhachHangController@index');
Route::get('/quan-ly-khach-hang/khach-hang/them', 'KhachHangController@them')->middleware('quyen.checker:admin|kehoach');
Route::post('/quan-ly-khach-hang/khach-hang/them/luu', 'KhachHangController@luu')->middleware('quyen.checker:admin|kehoach');
Route::get('/quan-ly-khach-hang/khach-hang/xoa/{khachhang_id}', 'KhachHangController@xoa')->middleware('quyen.checker:admin|kehoach');
Route::get('/quan-ly-khach-hang/khach-hang/sua/{khachhang_id}', 'KhachHangController@sua')->middleware('quyen.checker:admin|kehoach');
Route::post('/quan-ly-khach-hang/khach-hang/sua/capnhat/{khachhang_id}', 'KhachHangController@capnhat')->middleware('quyen.checker:admin|kehoach');

//gia cuoc van chuyen
Route::get('/quan-ly-van-chuyen/gia-cuoc-van-chuyen', 'GiaCuocController@index');

//don hang
Route::get('/quan-ly-van-chuyen/don-hang', 'DonHangController@index');
Route::get('/quan-ly-van-chuyen/don-hang/them', 'DonHangController@them')->middleware('quyen.checker:admin|kehoach');
Route::post('/quan-ly-van-chuyen/don-hang/them/luu', 'DonHangController@luu')->middleware('quyen.checker:admin|kehoach');
Route::get('/quan-ly-van-chuyen/don-hang/xoa/{donhang_id}', 'DonHangController@xoa')->middleware('quyen.checker:admin|kehoach');
Route::get('/quan-ly-van-chuyen/don-hang/sua/{donhang_id}', 'DonHangController@sua')->middleware('quyen.checker:admin|kehoach');
Route::post('/quan-ly-van-chuyen/don-hang/sua/capnhat/{donhang_id}', 'DonHangController@capnhat')->middleware('quyen.checker:admin|kehoach');

//phieu dieu xe
Route::get('/quan-ly-van-chuyen/phieu-dieu-xe', 'DieuXeController@index');
Route::get('/quan-ly-van-chuyen/phieu-dieu-xe/xe', 'DieuXeController@getXe')->name('getXe');
Route::post('/quan-ly-van-chuyen/phieu-dieu-xe/luu', 'DieuXeController@luu')->middleware('quyen.checker:admin|kehoach');
Route::get('/quan-ly-van-chuyen/phieu-dieu-xe/xoa/{dieuxe_id}', 'DieuXeController@xoa')->middleware('quyen.checker:admin|kehoach');
Route::get('/quan-ly-van-chuyen/phieu-dieu-xe/xem/{dieuxe_id}', 'DieuXeController@xem')->middleware('quyen.checker:admin|kehoach|qldoixe');

//chi phi phat sinh
Route::get('/quan-ly-van-chuyen/chi-phi-phat-sinh', 'ChiPhiPhatSinhController@index');

//hoa don van chuyen
Route::get('/quan-ly-van-chuyen/hoa-don-van-chuyen', 'HoaDonController@index');
Route::get('/quan-ly-van-chuyen/hoa-don-van-chuyen/them', 'HoaDonController@them')->middleware('quyen.checker:admin|ketoan');
Route::post('/quan-ly-van-chuyen/hoa-don-van-chuyen/them/luu', 'HoaDonController@luu')->middleware('quyen.checker:admin|ketoan');
Route::get('/quan-ly-van-chuyen/hoa-don-van-chuyen/xoa/{hoadon_id}', 'HoaDonController@xoa')->middleware('quyen.checker:admin|ketoan');
Route::get('/quan-ly-van-chuyen/hoa-don-van-chuyen/sua/{hoadon_id}', 'HoaDonController@sua')->middleware('quyen.checker:admin|ketoan');
Route::post('/quan-ly-van-chuyen/hoa-don-van-chuyen/sua/capnhat/{hoadon_id}', 'HoaDonController@capnhat')->middleware('quyen.checker:admin|ketoan');
Route::get('/quan-ly-van-chuyen/hoa-don-van-chuyen/xem/{hoadon_id}', 'HoaDonController@xem')->middleware('quyen.checker:admin|ketoan');
Route::get('/quan-ly-van-chuyen/hoa-don-van-chuyen/active/{hoadon_id}', 'HoaDonController@active')->middleware('quyen.checker:admin|ketoan');
Route::get('/quan-ly-van-chuyen/hoa-don-van-chuyen/inactive/{hoadon_id}', 'HoaDonController@inactive')->middleware('quyen.checker:admin|ketoan');

//thong tin xe
Route::get('/quan-ly-xe/thong-tin-xe', 'XeController@index');
Route::get('/quan-ly-xe/thong-tin-xe/them', 'XeController@them')->middleware('quyen.checker:admin|qldoixe');
Route::post('/quan-ly-xe/thong-tin-xe/them/luu', 'XeController@luu')->middleware('quyen.checker:admin|qldoixe');
Route::get('/quan-ly-xe/thong-tin-xe/xoa/{xe_id}', 'XeController@xoa')->middleware('quyen.checker:admin|qldoixe');
Route::get('/quan-ly-xe/thong-tin-xe/sua/{xe_id}', 'XeController@sua')->middleware('quyen.checker:admin|qldoixe');
Route::post('/quan-ly-xe/thong-tin-xe/sua/capnhat/{xe_id}', 'XeController@capnhat')->middleware('quyen.checker:admin|qldoixe');
Route::get('/quan-ly-xe/thong-tin-xe/active/{xe_id}', 'XeController@active')->middleware('quyen.checker:admin|qldoixe');
Route::get('/quan-ly-xe/thong-tin-xe/inactive/{xe_id}', 'XeController@inactive')->middleware('quyen.checker:admin|qldoixe');

//giay to xe
Route::get('/quan-ly-xe/giay-to-xe', 'GiayToXeController@index');
Route::post('/quan-ly-xe/giay-to-xe/luu', 'GiayToXeController@luu')->middleware('quyen.checker:admin|qldoixe');
Route::get('/quan-ly-xe/giay-to-xe/xoa/{giaytoxe_id}', 'GiayToXeController@xoa')->middleware('quyen.checker:admin|qldoixe');
Route::get('/quan-ly-xe/giay-to-xe/sua/{giaytoxe_id}', 'GiayToXeController@sua')->middleware('quyen.checker:admin|qldoixe');
Route::post('/quan-ly-xe/giay-to-xe/capnhat/{giaytoxe_id}', 'GiayToXeController@capnhat')->middleware('quyen.checker:admin|qldoixe');

//canh bao tai san
Route::get('/quan-ly-xe/canh-bao-tai-san', 'CanhBaoController@index');
Route::post('/quan-ly-xe/canh-bao-tai-san/luu', 'CanhBaoController@luu')->middleware('quyen.checker:admin|qldoixe');
Route::get('/quan-ly-xe/canh-bao-tai-san/xoa/{canhbao_id}', 'CanhBaoController@xoa')->middleware('quyen.checker:admin|qldoixe');
Route::get('/quan-ly-xe/canh-bao-tai-san/sua/{canhbao_id}', 'CanhBaoController@sua')->middleware('quyen.checker:admin|qldoixe');
Route::post('/quan-ly-xe/canh-bao-tai-san/capnhat/{canhbao_id}', 'CanhBaoController@capnhat')->middleware('quyen.checker:admin|qldoixe');

//sua chua/bao duong
Route::get('/quan-ly-xe/sua-chua/bao-duong', 'SuaChuaController@index');
Route::post('/quan-ly-xe/sua-chua/bao-duong/luu', 'SuaChuaController@luu')->middleware('quyen.checker:admin|qldoixe|ketoan');
Route::get('/quan-ly-xe/sua-chua/bao-duong/xoa/{suachua_id}', 'SuaChuaController@xoa')->middleware('quyen.checker:admin|qldoixe|ketoan');
Route::get('/quan-ly-xe/sua-chua/bao-duong/sua/{suachua_id}', 'SuaChuaController@sua')->middleware('quyen.checker:admin|qldoixe|ketoan');
Route::post('/quan-ly-xe/sua-chua/bao-duong/capnhat/{suachua_id}', 'SuaChuaController@capnhat')->middleware('quyen.checker:admin|qldoixe|ketoan');

//phat sinh xe
Route::get('/quan-ly-xe/cap-phat-nhien-lieu', 'PhatSinhXeController@index');
Route::get('/quan-ly-xe/cap-phat-nhien-lieu/them', 'PhatSinhXeController@them')->middleware('quyen.checker:admin|qldoixe|ketoan');
Route::post('/quan-ly-xe/cap-phat-nhien-lieu/them/luu', 'PhatSinhXeController@luu')->middleware('quyen.checker:admin|qldoixe|ketoan');
Route::get('/quan-ly-xe/cap-phat-nhien-lieu/xoa/{phatsinhxe_id}', 'PhatSinhXeController@xoa')->middleware('quyen.checker:admin|qldoixe|ketoan');
Route::get('/quan-ly-xe/cap-phat-nhien-lieu/sua/{phatsinhxe_id}', 'PhatSinhXeController@sua')->middleware('quyen.checker:admin|qldoixe|ketoan');
Route::post('/quan-ly-xe/cap-phat-nhien-lieu/sua/capnhat/{phatsinhxe_id}', 'PhatSinhXeController@capnhat')->middleware('quyen.checker:admin|qldoixe|ketoan');

//thong tin tai xe
Route::get('/quan-ly-tai-xe/thong-tin-tai-xe', 'TaiXeController@index');
Route::get('/quan-ly-tai-xe/thong-tin-tai-xe/them', 'TaiXeController@them')->middleware('quyen.checker:admin|qldoixe');
Route::post('/quan-ly-tai-xe/thong-tin-tai-xe/them/luu', 'TaiXeController@luu')->middleware('quyen.checker:admin|qldoixe');
Route::get('/quan-ly-tai-xe/thong-tin-tai-xe/xoa/{taixe_id}', 'TaiXeController@xoa')->middleware('quyen.checker:admin|qldoixe');
Route::get('/quan-ly-tai-xe/thong-tin-tai-xe/sua/{taixe_id}', 'TaiXeController@sua')->middleware('quyen.checker:admin|qldoixe');
Route::post('/quan-ly-tai-xe/thong-tin-tai-xe/sua/capnhat/{taixe_id}', 'TaiXeController@capnhat')->middleware('quyen.checker:admin|qldoixe');

//bang lai xe
Route::get('/quan-ly-tai-xe/bang-lai', 'BangLaiXeController@index');
Route::post('/quan-ly-tai-xe/bang-lai/luu', 'BangLaiXeController@luu')->middleware('quyen.checker:admin|qldoixe');
Route::get('/quan-ly-tai-xe/bang-lai/xoa/{banglai_id}', 'BangLaiXeController@xoa')->middleware('quyen.checker:admin|qldoixe');
Route::get('/quan-ly-tai-xe/bang-lai/sua/{banglai_id}', 'BangLaiXeController@sua')->middleware('quyen.checker:admin|qldoixe');
Route::post('/quan-ly-tai-xe/bang-lai/capnhat/{banglai_id}', 'BangLaiXeController@capnhat')->middleware('quyen.checker:admin|qldoixe');

//tai khoan
Route::get('/tai-khoan', 'TaiKhoanController@index');
Route::get('/dang-nhap', 'TaiKhoanController@login')->name('login');
Route::post('/dang-nhap/login', 'TaiKhoanController@dangnhap');
Route::get('/dang-xuat', 'TaiKhoanController@logout');
Route::post('/tai-khoan/luu', 'TaiKhoanController@luu');
Route::get('/tai-khoan/xoa/{taikhoan_id}', 'TaiKhoanController@xoa');
Route::get('/tai-khoan/sua/{taikhoan_id}', 'TaiKhoanController@sua');
Route::post('/tai-khoan/capnhat/{taikhoan_id}', 'TaiKhoanController@capnhat');
Route::get('/tai-khoan/khoa/{taikhoan_id}', 'TaiKhoanController@khoa');
Route::get('/tai-khoan/mo-khoa/{taikhoan_id}', 'TaiKhoanController@mokhoa');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('fake-user', function (){
    $user = new \App\User();
    $user->name = 'Nguyen Vinh';
    $user->email = 'nguyenvinh@gmail.com';
    $user->password = bcrypt('1234567');
    $user->save();
});

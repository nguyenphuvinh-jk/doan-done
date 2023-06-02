<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    protected $fillable = ['dh_id', 'donvi','ngaydat',	'mathang', 'trongluong', 'donvitinh', 'tuyenduong',	'dd_layhang',	'dd_giaohang',	'tg_batdau',	'ngaybatdau',	'ngayketthuc', 'gioluuca',	'trangthai_dh', 'created_at', 'nguoitao_dh'];
    protected $primaryKey='dh_id';
    public $incrementing = false;
    protected $table = 'tbl_donhang';
}

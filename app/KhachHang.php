<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
    protected $fillable = ['kh_id',	'ten_kh',	'sdt_kh',	'diachi_kh',	'masothue_kh',	'fax_kh',	'sotk_kh',	'ten_nganhang',	'nguoidaidien_kh',	'chucvu_kh'];
    protected $primaryKey='kh_id';
    public $incrementing = false;
    protected $table = 'tbl_khachhang';
}

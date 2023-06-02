<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HoaDon extends Model
{
    protected $fillable = ['hoadon_id','phithuexe', 'phinang',	'phiha',	'phigiayto',	'philuuca',	'vecauduong',	'phikhac',	'trangthai',	'thue',	'donhang_id',	'tongtien',	'ghichu', 'created_at'];
    protected $primaryKey='hoadon_id';
    protected $table = 'tbl_hoadon';
}

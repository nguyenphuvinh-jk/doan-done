<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiayToXe extends Model
{
    protected $fillable = ['giayto_id','loaigiayto','xe_id','ngaycap','ngayhethan','donvicap'];
    protected $primaryKey='giayto_id';
    protected $table = 'tbl_giaytoxe';
}

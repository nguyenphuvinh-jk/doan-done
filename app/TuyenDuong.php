<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TuyenDuong extends Model
{
    protected $fillable = ['tuyenduong_id','ten_tuyenduong'];
    protected $primaryKey='tuyenduong_id';
    protected $table = 'tbl_tuyenduong';
}

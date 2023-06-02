<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiHang extends Model
{
    protected $fillable = ['loaihang_id','ten_loaihang'];
    protected $primaryKey='loaihang_id';
    protected $table = 'tbl_loaihang';
}

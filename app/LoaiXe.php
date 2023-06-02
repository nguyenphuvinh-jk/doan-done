<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiXe extends Model
{
    protected $fillable = ['loaixe_id','ten_loaixe'];
    protected $primaryKey='loaixe_id';
    protected $table = 'tbl_loaixe';
}

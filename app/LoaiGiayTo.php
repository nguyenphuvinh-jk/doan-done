<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiGiayTo extends Model
{
    protected $fillable = ['id','tengiayto'];
    protected $primaryKey='id';
    protected $table = 'tbl_loaigiayto';
}

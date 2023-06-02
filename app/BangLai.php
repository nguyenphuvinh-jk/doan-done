<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BangLai extends Model
{
    protected $fillable = ['banglai_id',	'tenbanglai',	'taixe_id',	'ngaycap',	'ngayhethan',	'donvicap',	'trangthai'	];
    protected $primaryKey='banglai_id';
    protected $table = 'tbl_banglai';
}

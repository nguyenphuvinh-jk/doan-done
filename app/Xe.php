<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Xe extends Model
{
    protected $fillable = [	'xe_id',	'loaixe',	'hangxe',	'biensoxe',	'trangthai', 'mauson',	'namsx',	'ngaymua',	'noimua', 'ngayban', 'noiban'];
    protected $primaryKey='xe_id';
    protected $table = 'tbl_xe';
}

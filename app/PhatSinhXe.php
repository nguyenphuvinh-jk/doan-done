<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhatSinhXe extends Model
{
    protected $fillable = ['phatsinhxe_id',	'xe_id',	'km_batdau',	'km_cuoi',	'ngay',	'cayxang',	'soluong',	'dongia',	'thanhtien',	'created_at'	];
    protected $primaryKey='phatsinhxe_id';
    protected $table = 'tbl_phatsinhxe';
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CanhBao extends Model
{
    protected $fillable = ['canhbao_id',	'ngay',	'xe_id',	'km_hientai',	'tinhtrang',	'danhgia',	'created_at'	];
    protected $primaryKey='canhbao_id';
    protected $table = 'tbl_canhbaotaisan';
}

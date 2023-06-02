<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class TaiXe extends Model
{
    protected $fillable = [	'taixe_id',	'ten_taixe','ngaysinh',	'sdt','diachi',	'CCCD','tknh'];
    protected $primaryKey='taixe_id';
    public $incrementing = false;
    protected $table = 'tbl_taixe';

    public function getNgaySinh($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }
}

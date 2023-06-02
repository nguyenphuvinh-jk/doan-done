<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DieuXe extends Model
{
    protected $fillable = ['dieuxe_id',	'donhang_id',	'loaixe',	'xe_id',	'laixe', 'created_at'];
    protected $primaryKey='dieuxe_id';
    protected $table = 'tbl_dieuxe';
}

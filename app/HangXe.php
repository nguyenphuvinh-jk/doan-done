<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HangXe extends Model
{
    protected $fillable = ['hangxe_id','ten_hangxe', 'created_at'];
    protected $primaryKey='hangxe_id';
    protected $table = 'tbl_hangxe';
}

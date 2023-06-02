<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DVT extends Model
{
    protected $fillable = ['dvt_id','ten_dvt', 'created_at'];
    protected $primaryKey='dvt_id';
    protected $table = 'tbl_dvt';
}

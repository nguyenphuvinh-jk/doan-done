<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuaChua extends Model
{
    protected $fillable = ['suachua_id',	'xe_id',	'ngaysua',	'noidung',	'tongtien'];
    protected $primaryKey='suachua_id';
    protected $table = 'tbl_suachua';
}

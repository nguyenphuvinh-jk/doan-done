<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KhoangCach extends Model
{
    protected $fillable = ['khoangcach_id','khoangcach'];
    protected $primaryKey='khoangcach_id';
    protected $table = 'khoangcach';
}

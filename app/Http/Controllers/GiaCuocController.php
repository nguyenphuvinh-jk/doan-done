<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GiaCuocController extends Controller
{
    public function index(){
        return view('giacuoc.giacuoc');
    }
}

<?php

namespace App\Http\Controllers\Range;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RangeController extends Controller
{
    public function index(){
        return view('range.dashboard');
    }
}

<?php

namespace App\Http\Controllers\BO;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashBoardController extends Controller
{
    public function __construnct(){
        $this->middleware('auth');
    }
    
    public function index(){
        return view('BO.dashboard');
    }
}

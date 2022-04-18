<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //admin deshboard
    public function dashboard(){
        return view('admin.dashboard.dashboard');
    }
}
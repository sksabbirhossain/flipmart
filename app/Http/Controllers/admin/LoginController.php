<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //login
    public function checkLogin(Request $request){
        //validation
        $request->validate([
            'email'=>'required|email|exists:admins,email',
            'password'=>'required',
        ]);
        
        $value = $request->only('email', 'password');
        if(Auth::guard('admin')->attempt($value)){
            Toastr::success('Admin Login Successfully');
            return redirect()->route('admin.dashboard');
        }else{
            return back()->with('fail', 'Invalid Cradentials');
        }
    }

    //logout
    public function adminLogout(){
        Auth::guard('admin')->logout();
        Toastr::success('Admin LogOut Successfully');
        return redirect()->route('admin.login');
    }
}

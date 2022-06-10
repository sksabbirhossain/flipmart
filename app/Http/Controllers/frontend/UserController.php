<?php

namespace App\Http\Controllers\frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Error;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //create a user
    public function userCreate(Request $request){
        //validation
        $validation = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'cPassword' => 'required|same:password',
        ]);
        
        //create
        if($validation){
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->image = $request->image;
            $user->password = Hash::make($request->password);
            
            $data = $user->save();
            if($data){
                Toastr::success('User Register Successfully');
                return redirect()->route('user.login');
            }
        }
    }

    //login
    public function check(Request $request){
        //validation
        $request->validate([
            'email'=>'required|email|exists:users,email',
            'password'=>'required',
        ]);
        
        $value = $request->only('email','password');
        if(Auth::guard('web')->attempt($value)){
            Toastr::success('User Login Successfully');
            return redirect()->route('home');
        }else{
            Toastr::error('Please Try again');
            return back();
        }
    }

    //logout
    public function logoutUser(){
        Auth::guard('web')->logout();
        Toastr::success('LogOut Successfully');
        return redirect()->route('home');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    //login
    public function login(){
        return view('login');
    }
    //submit_login
    public function submit_login(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);
        $usercheck=Admin::where(['email'=>$request->email,'password'=>$request->password])->count();
        if($usercheck>0){
            $admindata=Admin::where(['email'=>$request->email,'password'=>$request->password])->first();
            session(['admindata'=>$admindata]);
            return redirect('admin/dashboard');
        }
        else{
            return redirect('admin/login')->with('error','Invalid Login');
        }

        
    }
    //dasboard
    public function dashboard(){
        return view('dashboard');
    }

    //Logout
    public function logout(){
        session()->forget('admindata');
        return redirect('admin/login');
    }
}

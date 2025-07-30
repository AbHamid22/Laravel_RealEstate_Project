<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Authcontroller extends Controller

{
    public function login(){
       return view('pages.auth.login');
    }
    public function Authlogin(Request $request){
        // $remember=!empty($request-remember)?true:false;
        if(Auth::attempt(['name'=>$request->name,'password'=>$request->password],true)){
            return redirect('home');
        }else{
            return redirect()->back()->with('error','Please enter currectly');
        }
  }

  /**
   * Log the user out (POST only)
   */
  public function logout(Request $request){
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect(url(''));
  }

}

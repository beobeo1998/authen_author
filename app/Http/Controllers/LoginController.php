<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function index(){
        return view('pages.home');
    }

    public function getLogin(){
        return view('pages.login');
    }

    public function postLogin(Request $request){
        if(Auth::attempt($request->only('email','password'),$request->has('remember'))){
            return redirect()->intended('/home');
        }
        return redirect()->back();
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}

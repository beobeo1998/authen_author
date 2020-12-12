<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


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

    public function getRegister(){
        return view('pages.register');
    }

    public function postRegister(RegisterRequest $request){
        $data = $request->except('_token','password');
        $data['password']   = Hash::make($request->password);
        User::insert($data);
        return redirect()->route('get.login');
    }
}

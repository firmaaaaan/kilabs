<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(){
        return view('components.auth.login');
    }

    public function postLogin(Request $request) {
        if(Auth::attempt($request->only('name','password'))){
            return redirect('/dashboard');
        }
        return redirect('/login');
    }
    public function logout(){
        Auth::logout();
        return redirect('/login');
    }

    public function register() {
        return view('components.auth.register');
    }

    public function registerPost(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:8'
        ],[
            'name.required'=>'Username wajib diisi',
            'email.required'=>'Email wajib diisi',
            'email.unique'=>'Email sudah digunakan',
            'email.email'=>'Silakan masukan email yang valid',
            'password.required'=>'Wajib wajib diisi',
            'password.max'=>'Password minimal 8 karakter',
        ]);

        $data=[
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ];
        User::create($data);

        $login=[
            'email' =>$request->email,
            'password'=>$request->password
        ];
        if(Auth::attempt($login)){
            return redirect('dashboard');
        }else{
            return back();
        }
    }
}

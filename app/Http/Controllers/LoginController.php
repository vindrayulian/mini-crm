<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function login(){
        return view('main/login');
    }

    public function loginuser(Request $req){
        $test = Auth::attempt($req->only('email','password'));
        if($test){
            return redirect('/');
        }

        var_dump($test);

        return redirect('login');
    }

    public function regis(){
        return view('main/regis');
    }

    public function regisuser(Request $req){
        User::create([
            'nama' => $req->nama,
            'email' => $req->email,
            'password' => bcrypt($req->password),
            'repassword' => bcrypt($req->repassword),
            'remember_token' => Str::random(60),
        ]);

        return redirect('/login');
    }

    public function logout(){
        Auth::logout();
        return redirect('login');
    }
}

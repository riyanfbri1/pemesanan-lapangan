<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //Halaman Login index
    public function index(){
        return view('login.index-login',[
            "title" => "Login"
        ]);
    }

    public function Authenticate(Request $req){
        $validasi = $req->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if(Auth::attempt($validasi)){
            $req->session()->regenerate();

            if(auth()->user()->role == '1')
            {
                return redirect()->intended('/admin/profile/view');
            }
            else
            {
                return redirect()->intended('/')->with('loginBerhasil','Selamat Datang');
            }
        }

        return back()->with('loginfailed','Username atau Password yang di masukan salah !');
    }

    public function Logout(Request $req){

        Auth::logout();
        
        $req->session()->invalidate();
        $req->session()->regenerateToken();

        return redirect('/');
    }
}

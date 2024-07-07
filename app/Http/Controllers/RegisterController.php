<?php

namespace App\Http\Controllers;

use App\Models\Bio;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
    public function index(){
        
        return view('register.create',[
            "title" => "Register" 
        ]);
    }

    public function AddPict($iduser){

        return view('register.add-picture',[
            "title" => "Tambahkan Foto Profile",
            "idUser" => $iduser
        ]);
    }

    public function RegisterUser(Request $req){
        //pertama validasi data
        $validateData = $req->validate([
            "name"=> 'required',
            "lahir" => 'required',
            "email"=> 'required|email:dns',
            "telepon" => 'required|digits:12',
            "password" => 'required'
        ]);
        
        $pass = bcrypt($validateData['password']);

        User::create([
            "name" => $validateData['name'],
            "role" => '2',
            "email" => $validateData['email'],
            "password" => $pass
        ]);

        $user = User::where('name',$validateData['name'])->first();

        Bio::create([
            'user_id' => $user['id'],
            'lahir' => $validateData['lahir'],
            'telepon' => $validateData['telepon'],
        ]);

        return redirect('/register/add-picture/view/'.$user['id'])->with('daftarBerhasil','Selamat Akun anda berhasil di buat');
    }

   
    public function UploadImg(Request $req){

        $req->validate(["image" => 'file|image|max:1024']);
        $image = $req->file('image')->store('profile-image');
        Bio::where('user_id', $req['user_id'])->update([
            'image' => $image
        ]);

        return redirect('/login');

    }

    public function UploadImgDefault($id){
        
        Bio::where('user_id', $id)->update([
            'image' => 'default',
        ]);

        return redirect('/login');
    }
}

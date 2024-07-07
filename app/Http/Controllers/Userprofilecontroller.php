<?php

namespace App\Http\Controllers;

use App\Models\Bio;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class Userprofilecontroller extends Controller
{


    /* fungsi mengecek, jika poto di ganti akan di update dengan baru (dan hapus data yg di storage), jika tidak, akan pake poto yang lama */
    public function MengecekFotoProfile($userBio, $req)
    {
        if($userBio->image and $req->image != null){
            Storage::delete($userBio->image);
            return $req->file('image')->store('profile-image');
        }
        return $userBio->image;
    }


    public function index($id)
    {
        $data = User::where('id', $id)->with('bio')->first();
        return view('user-profile.view-profile',[
            "title" => "Profile",
            "data" => $data,

        ]);
    }

    public function EditProfile($id){
        $data = User::where('id',$id)->with('bio')->first();
        if(auth()->user()->id == $id){
            return view('user-profile.edit-profile',[
                "title" => "Edit Profile",
                'data' => $data
            ]);
        }
        
        return back();
    }

    public function UpdateProfile(Request $req){
        $userId = auth()->user()->id;
        $userBio = Bio::where('user_id',$userId)->first();

        $validasi = $req->validate([
            "name" => 'required',
            "email" => 'required|email:dns',
            "telepon" => 'required|digits:12',
            'alamat' => 'required',
        ]);

        $image = $this->MengecekFotoProfile($userBio, $req);
        User::find($userId)->update([
            "name" => $validasi['name'],
            "email" => $validasi['email'],
        ]);

        Bio::where('user_id', $userId)->update([
            "alamat" => $validasi['alamat'],
            "telepon" => $validasi['telepon'],
            "image" => $image
        ]);

        return redirect('/profile/view/'.$userId);
    }

    public function ResetPassView(){
        return view('reset password.reset-pass',[
            "title" => "Reset Password"
        ]);
    }

    public function EditPassword($id){
        if(auth()->user()->id == $id){
            return view('update password.change-password-view',[
                "title" => "Ubah Password",
                "id" => $id
            ]);
        }
        return back();
    }

    public function UpdatePassword(Request $req, $id)
    {
        $validate = $req->validate([
            "password1" => 'required',
            "password2" => 'required|same:password1'
        ]);

        $passBaru = bcrypt($validate['password1']);
        User::find($id)->update([
            'password'=> $passBaru
        ]);
        return redirect('/profile/view/'.$id);
    }


}

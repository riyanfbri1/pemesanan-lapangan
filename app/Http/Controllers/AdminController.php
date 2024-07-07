<?php

namespace App\Http\Controllers;

use App\Models\Bio;
use App\Models\User;
use App\Models\Pesanan;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{

    public function MengecekPotoProfile($req, $bio)
    {
        if($req['image'] != null)
        {
            if($bio->image != null)
            {
                Storage::delete($bio->image);
            }
            return $req->file('image')->store('profile-admin');
        }
        return $bio->image;
    }
    //
    public function index(){
            return view('admin.index-dashboard',[
                "title" => "Dashboard"
            ]);
    }

    public function ProfileView(){
            $user = User::where('id', auth()->user()->id)->with('bio')->first();
            return view('admin.profile.admin-profile-view',[
                "title" => "Admin Profile",
                "user" => $user
            ]);
    }

    public function UbahProfileView()
    {
        $user = User::where('id', auth()->user()->id)->with('bio')->first();
            return view('admin.profile.edit-profile-admin-view',[
                "title" => "Ubah Profile Admin",
                "user" => $user
            ]);
    }

    public function UbahProfileAdmin(Request $req)
    {
        $validate = $req->validate([
            "name" => 'required',
            "email" => 'required|email:dns',
            "alamat" => 'required',
            "telepon" => 'required|digits:12',
        ]);

        User::find(auth()->user()->id)->update([
            "name" => $validate['name'],
            "email" => $validate['email']
        ]);
        $bio = Bio::where('user_id',auth()->user()->id)->first();
        $image = $this->MengecekPotoProfile($req, $bio);

        $bio->update([
            "alamat" => $validate['alamat'],
            "telepon" => $validate['telepon'],
            "image" => $image
        ]);

        return redirect('/admin/profile/view')->with('ubahProfile', 'Profile Berhasil Di Ubah');
    }

    public function UbahPasswordView()
    {
            return view('admin.edit-password-admin.ubah-password-view',[
                "title" => "Ubah Password Admin"
            ]);
    }

    public function UbahPasswordAdmin(Request $req)
    {
        $validate = $req->validate([
            "password1" => 'required',
            "password2" => 'required|same:password1'
        ]);

        $passwordBaru = bcrypt($validate['password1']);

        User::find($req['id'])->update([
            "password" => $passwordBaru
        ]);

        return redirect('/admin/profile/view')->with('ubahPassword','Password Berhasil di Ubah');
    }

    public function HapusUser($id)
    {
        $bio = Bio::where('user_id', $id)->first();
        if($bio->image)
        {
            Storage::delete($bio->image);
        }
        
        $pesanan = Pesanan::where('user_id', $id)->get();
        foreach($pesanan as $psn)
        {
            if($psn->bukti)
            {
                Storage::delete($psn->bukti);
            }
            $psn->delete();
        }

        $bio->delete();
        User::where('id',$id)->first()->delete();
        return back();
    }

}

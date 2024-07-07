<?php

namespace App\Http\Controllers;

use App\Models\OfficeConfig;
use App\Models\Pesanan;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

    public function DaftarPesananView(){
        $pesanans = Pesanan::where('status' , '3')->orWhere('status','0')->with('user')->get();
        return view('admin.pesanan.daftar-pesanan',[
            "title" => "Daftar Pesanan",
            "pesanans" => $pesanans
        ]);
    }

    public function PesananMasuk(){
        $pesanans = Pesanan::where('status','2')->with('user')->get();
        return view('admin.pesanan.pesanan-masuk',[
            "title" => "Pesanan Belum Terkonfirmasi",
            "pesanans" => $pesanans
        ]);
    }

    public function KonfigurasiView(){
        $office = OfficeConfig::all()->first();
        return view('admin.konfigurasi.config-view',[
            "title" => "Halaman Konfigurasi",
            "office" => $office
        ]);
    }

    public function DaftarUser(){
        $userAll = User::where('role','2')->with('bio')->get();
        return view('admin.daftar-user.user-view',[
            "title" => "Daftar User Terdaftar",
            "userAll" => $userAll
        ]);
    }

    public function DaftarUserDetailView($id)
    {
        $user = User::where('id',$id)->with('bio')->first();
        return view('admin.daftar-user.detail.daftar-user-detail-view',[
            "title" => "User Detail",
            "user" => $user
        ]);
    }

    public function ResetPasswordUser($id)
    {
        $passwordReset = bcrypt('user123');
        User::where('id',$id)->update([
            "password" => $passwordReset
        ]);

        return redirect('/admin/daftar-user')->with('resetPassword','Password Default : user123');
    }

    public function MenampilkanDaftarCari($userAll)
    {
        foreach($userAll as $user)
        {
            $alamat = $user->bio->alamat ?? "Data Tidak ada";
            echo '
            <tbody id="bodyTable">
            <tr class="text-center">
                <td class="border-line">'.$user->name.'</td>
                <td class="border-line">'.$user->bio->telepon.'</td>
                <td class="border-line">'.$alamat.'</td>
                <td class="border-line"><a href="" class="bg-blue-500 py-1 px-2 rounded-lg text-white">Detail</a></td>
                <td class="border-line">Hapus</td>
            </tr>
            </tbody>
            ';

        }

    }

    public function CariDaftarUser($keyword)
    {
        $user = User::where('name', 'like' ,'%'.$keyword.'%')->where('role','2')->get();
        $this->MenampilkanDaftarCari($user);
    }
    
}

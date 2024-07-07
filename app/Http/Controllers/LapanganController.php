<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LapanganController extends Controller
{

    public function TampilPencarianJadwal($pesanan)
    {
        foreach($pesanan as $psn)
        {
            echo '
                    <tbody id="table-jadwal" class="">
                        <tr>
                            <th class="border-line">'.$psn->tanggal.'</th>
                            <th class="border-line">'. $psn->user->name .'</th>
                            <th class="border-line">'. $psn->mulai .'. 00 WIB</th>
                            <th class="border-line">'. $psn->durasi .' Jam</th>
                        </tr>
                    </tbody>
            ';
        }
    }

    //Halaman Jadwal-Lapangan
    public function jadwal(){
        return view('jadwal-lapangan',[
            "title" => "Jadwal Lapangan"
        ]);
    }

    //Halaman view Pesan Lapangan
    public function PesananView($id){
        // cyan = sukses, red = gagal, yellow = belum bayar
        if(auth()->user()->id == $id)
        {
            $pesanan = Pesanan::orderBy('numInvoice','DESC')->where('user_id',$id)->get();
            return view('pesan-lapangan.daftar-pesanan',[
                "title" => 'Daftar Pesanan',
                "pesanan" => $pesanan,
    
            ]);
        }

        return back();
    }

    public function BuatPesanan($id){
        if(Auth::check()){

            return view('pesan-lapangan.buat-pesanan',[
                "title" => "Pesan Lapangan",
            ]);
        }

        return back();
    }

    public function BayarLapangan($numInvoice){

        $pesanan = Pesanan::where('numInvoice',$numInvoice)->first();
        if(auth()->user()->id == $pesanan->user_id){
            return view('pesan-lapangan.halaman-bayar',[
                "title" => "Halaman Pembayaran",
                "pesanan" => $pesanan
            ]);
        }

        return back();

    }

    public function DetailPesananView($numInvoice)
    {
        $pesanan = Pesanan::where('numInvoice', $numInvoice)->first();
        if($pesanan->user_id == auth()->user()->id)
        {
            return view('pesan-lapangan.detail-pesanan-view',[
                "title" => "Detail Pesanan",
                "dataPesanan" => $pesanan
            ]);
        }

        return back();
    }

    public function CariJadwal($date, $lapangan){
        
        $pesanan = Pesanan::with('user')->orderBy('mulai','asc')->where('tanggal', $date)->where('lapangan', $lapangan)->where('status' , '3')->get();
        $this->TampilPencarianJadwal($pesanan);

    }
}

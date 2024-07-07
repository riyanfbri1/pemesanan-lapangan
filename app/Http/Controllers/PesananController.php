<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Pesanan;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\isNull;

class PesananController extends Controller
{
    public function MencariWaktuBerakhir($mulai, $durasi){
        return $mulai + $durasi;
    }

    public function CekJadwalKosong($pesanan, $data)
    {

        foreach($pesanan as $psn)
        {
            if($data['awal'] < $psn->mulai && $data['berakhir'] > $psn->mulai)
            {
                return false;
                die();
            }
            else if($data['awal'] >= $psn->mulai && $data['awal'] < $psn->berakhir) {
                
                return false;
                die();
            }

        }

        return true;
    }

    public function PesananLapangan(Request $req){

        $pesananInv = Pesanan::all()->last();
        isset($pesananInv) ? $lastNum = $pesananInv->numInvoice + 1 : $lastNum = 1;
        $kode = "INV/" . date('Y') . '/';

        $validate = $req->validate([
            'name' => 'required',
            'tanggal' => 'required',
            'mulai' => 'required',
            'durasi' => 'required',
            'lapangan' => 'required',
            'harga' => 'required'
        ]);
        $pesananDicari = Pesanan::where('tanggal', $validate['tanggal'])->where('lapangan',$validate['lapangan'])->get();
        $awal = $validate['mulai'];
        $berakhir = $this->MencariWaktuBerakhir($awal, $validate['durasi']);
        $durasi = $validate['durasi'];
        $data = ['awal'=>$awal,'berakhir'=>$berakhir];
        $cariJadwalKosong = $this->CekJadwalKosong($pesananDicari, $data );

        if($cariJadwalKosong)
        {
            // return dd("Berhasil");
            Pesanan::create([
                'user_id' => auth()->user()->id,
                'kode' => $kode,
                'numInvoice' => $lastNum,
                'name' => $validate['name'],
                'tanggal' => $validate['tanggal'],
                'mulai' => $awal,
                'berakhir' => $berakhir,
                'durasi' => $validate['durasi'],
                'lapangan' => $validate['lapangan'],
                'harga' => $validate['harga'],
                'status' => '1'
            ]);
    
            return redirect('/pesan-lapangan/konfirmasi-pembayaran/'. $lastNum);
        }

        return back()->with('gagalPesan' , 'Fromat Salah /Jadwal sudah di pesan orang lain !');

    }

    public function PembayaranLapangan(Request $req){

        $validate = $req->validate([
            "image" => 'required|file|image|max:1024',
        ]);
        $image = $req->file('image')->store('Bukti-Pembayaran-User');

        Pesanan::where('numInvoice', $req['numInvoice'])->update(["bukti" => $image , "status" => '2']);
        return redirect('/pesan-lapangan/view/'. auth()->user()->id);
    }

    //Admin

    public function MencariDataPesanan($numInvoice)
    {
        return Pesanan::where('numInvoice', $numInvoice)->with('user')->first();
    }
    
    public function Download($numInvoice)
    {
        $pesanan = $this->MencariDataPesanan($numInvoice);
        return Storage::download($pesanan->bukti);
    }

    public function TerimaPesanan($numInvoice)
    {
        $this->MencariDataPesanan($numInvoice)->update([
            "status" => "3"
        ]);

        return back()->with('pesananBerhasil', 'Pesanan Berhasil Diterima');
    }

    public function BatalkanPesanan($numInvoice)
    {
        $this->MencariDataPesanan($numInvoice)->update([
            "status" => "0"
        ]);

        return back()->with('dibatalkan', 'Pesanan Berhasil Di Batalkan');
    }

    public function ViewDetailPesanan($numInvoice)
    {
        $pesanan = $this->MencariDataPesanan($numInvoice);
        return view('admin.pesanan.detail-pesanan',[
            "Title" => "Detail Pesanan",
            "pesanan" => $pesanan
        ]);
    }
}

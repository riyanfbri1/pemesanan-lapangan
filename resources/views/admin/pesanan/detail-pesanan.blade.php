@php
if($pesanan->status == 3)
{
    $status = 'Pesanan Berhasil';
}
else {
    $status = 'Pesanan Gagal';
}
@endphp
@extends('admin.index-dashboard')
@section('dashboard')
    <div class="konten-layout-admin">
        <div class="text-center">
            <span class="font-bold text-2xl">Detail Pesanan No. {{$pesanan->kode.$pesanan->numInvoice}}</span>
        </div>
        <div>
            <div>
                <div class="mt-5">
                    <label for="">Nama Pemesan</label>
                    <input id="input" type="text" value="{{$pesanan->user->name}}" class="block border border-primary py-1 px-2 read-only:border-black" readonly>
                </div>
                <div class="mt-5">
                    <label for="">Tanggal Pemesanan</label>
                    <input id="input" type="text" class="block border border-primary py-1 px-2 read-only:border-black" value="{{date('d/F/Y',strtotime($pesanan->tanggal))}}" readonly>
                </div>
                <div class="mt-5">
                    <label for="">Waktu Mulai</label>
                    <input id="input" type="text" value="{{$pesanan->mulai}}.00 WIB" class="block border border-primary py-1 px-2 read-only:border-black" readonly>
                </div>
                <div class="mt-5">
                    <label for="">Waktu Selesai</label>
                    <input id="input" type="text" value="{{$pesanan->berakhir}}.00 WIB" class="block border border-primary py-1 px-2 read-only:border-black" readonly>
                </div>
                <div class="mt-5">
                    <label for="">Durasi Pemesanan</label>
                    <input id="input" type="text" value="{{$pesanan->durasi}} Jam" class="block border border-primary py-1 px-2 read-only:border-black" readonly>
                </div>
                <div class="mt-5">
                    <label for="">Lapangan</label>
                    <input id="input" type="text" value="{{$pesanan->lapangan}}" class="block border border-primary py-1 px-2 read-only:border-black" readonly>
                </div>
                <div class="mt-5">
                    <label for="">Total Bayar</label>
                    <input id="input" type="text" value="Rp. {{$pesanan->harga}}" class="block border border-primary py-1 px-2 read-only:border-black" readonly>
                </div>
                <div class="mt-5">
                    <label for="">Status Pemesanan</label>
                    <input id="input" type="text" value="{{$status}}" class="block border border-primary py-1 px-2 read-only:border-black" readonly>
                </div>
                <div class="mt-5">
                    <label for="">Bukti Pembayaran</label>
                    <div class="border border-slate-500 shadow-lg w-[300px] h-[300px] bg-cover bg-center" style="background-image: url({{asset('storage/'.$pesanan->bukti)}})"></div>
                    <div class="mt-5"><a href="/download-image/{{$pesanan->numInvoice}}"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                      </svg>
                      </a>Download</div>
                </div>
            </div>
@endsection
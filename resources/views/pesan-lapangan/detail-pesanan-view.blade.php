@extends('layouts.main')
@section('konten')
    <div class="konten-layout py-3 px-2">
        <div class="text-center mb-[40px]">
            <h2 class="font-semibold text-lg lg:text-2xl">Detail Pesanan</h2>
        </div>
        <div class="mb-10">
            <div class="container lg:grid flex lg:grid-cols-6">
                <div class="lg:col-start-3 text-lg lg:text-xl">
                    <div>
                        <label for="">Nama</label>
                    </div>
                    <div>
                        <label for="">Tanggal</label>
                    </div>
                    <div>
                        <label for="">Mulai</label>
                    </div>
                    <div>
                        <label for="">Selesai</label>
                    </div>
                    <div>
                        <label for="">Durasi</label>
                    </div>
                    <div>
                        <label for="">Lapangan</label>
                    </div>
                    <div>
                        <label for="">Total Bayar</label>
                    </div>
                    <div>
                        <label for="">Status</label>
                    </div>
                </div>
                <div class="lg:col-start-4 text-lg lg:text-xl">
                    <div>
                        <label for="">: {{auth()->user()->name}}</label>
                    </div>
                    <div>
                        <label for="">: {{$dataPesanan->tanggal}}</label>
                    </div>
                    <div>
                        <label for="">: {{$dataPesanan->mulai}}.00 WIB</label>
                    </div>
                    <div>
                        <label for="">: {{$dataPesanan->berakhir}}.00 WIB</label>
                    </div>
                    <div>
                        <label for="">: {{$dataPesanan->durasi}} Jam</label>
                    </div>
                    <div>
                        <label for="">: Lapangan {{$dataPesanan->lapangan}}</label>
                    </div>
                    <div>
                        <label for="">: Rp. {{$dataPesanan->harga}}</label>
                    </div>
                    <div>
                        @php
                            if($dataPesanan->status == 3)
                            {
                                $status = "Lunas / Selesai";
                            }
                            else {
                                $status = "Sedang di Proses";
                            }
                        @endphp
                        <label for="">: {{$status}}</label>
                    </div>
                </div>
            </div>
            <div class="mt-10 mb-[76px] grid grid-cols-6">
                <div class="col-start-3">
                    <a class="bg-sky-400 py-1 px-2 rounded-md text-white hover:bg-sky-300" href="/pesan-lapangan/view/{{auth()->user()->id}}">Kembali</a>
                </div>
            </div>
        </div>
    </div>
@endsection
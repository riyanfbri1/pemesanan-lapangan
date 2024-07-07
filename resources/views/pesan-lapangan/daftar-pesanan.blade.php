@extends('layouts.main')
@section('konten')
    <div class="konten-layout py-3 px-2">
        <div class="text-center mb-10">
            <h2 class="font-semibold text-lg lg:text-2xl">Daftar Pesanan</h2>
        </div>
        <div class="my-10 lg:px-10">
            <span><a class="bg-primary text-white px-2 py-1 rounded-lg hover:bg-primary/50  " href="/pesan-lapangan/create/{{auth()->user()->id}}">Pesanan Baru +</a></span>
        </div>
        <div class="px-[2px] lg:px-10 mb-[100px] lg:mb-[143px]">
            <div class=" max-w-[500px] shadow-xl lg:max-w-full">
                <table class="w-full text-center font-medium table-auto">
                    <thead class="bg-cyan-300 font-semibold">
                        <tr>
                            <td class="border-line">Tanggal</td>
                            <td class="border-line">Invoice</td>
                            <td class="border-line">Status</td>
                            <td class="border-line">Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pesanan as $psn)
                        @php
                         if($psn->status == '1')
                         {
                            $status = 'Belum Bayar';
                            $bgColor = 'bg-yellow-500';
                            $link = '<a href="/pesan-lapangan/konfirmasi-pembayaran/' .$psn->numInvoice. '">Bayar</a>';
                         }
                         else if($psn->status == '2')
                         {
                            $status = 'Sedang di peroses';
                            $bgColor = 'bg-slate-500';
                            $link = '<a href="/detail-pesanan/'.$psn->numInvoice.'">Detail</a>';
                         }
                         else if($psn->status == '3')
                         {
                            $status = 'Berhasil';
                            $bgColor = 'bg-teal-500';
                            $link = '<a href="/detail-pesanan/'.$psn->numInvoice.'">Detail</a>';
                         }
                         else {
                            $status = 'Gagal';
                            $bgColor = 'bg-red-500';
                            $link = '<a href="">Detail</a>';
                         }   
                        @endphp
                        <tr>
                            <td class="border-line">{{$psn->tanggal}}</td>
                            <td class="border-line">{{$psn->kode . $psn->numInvoice}}</td>
                            <td class="border-line {{$bgColor}} text-white">{{$status}}</td>
                            <td class="border-line">{!!$link!!}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
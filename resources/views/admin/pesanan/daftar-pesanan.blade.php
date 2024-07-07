@extends('admin.index-dashboard')
@section('dashboard')
    <div class="konten-layout-admin">
        <div class="text-center">
            <span class="font-bold text-2xl">Daftar Pesanan</span>
        </div>
        <div class="flex mt-10 mb-10">
            <div class="mx-auto">
                <table class="table-auto">
                    <thead class="bg-primary">
                        <tr class="text-center text-white text-xl">
                            <td class="border-line">Nama</td>
                            <td class="border-line">No Invoice</td>
                            <td class="border-line">Biaya Rp.</td>
                            <td class="border-line">Bukti</td>
                            <td class="border-line">Status</td>
                            <td class="border-line">Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pesanans as $pesanan)
                        @php
                         if($pesanan->status == 3)
                         {
                            $status = 'Pesanan Berhasil';
                            $bg = 'bg-sky-500';
                         }
                         else
                            {
                                $status = 'Pesanan Gagal';
                                $bg = 'bg-red-500';
                            } 
                        @endphp
                            <tr>
                                <td class="border-line">{{$pesanan->user->name}}</td>
                                <td class="border-line">{{$pesanan->kode.$pesanan->numInvoice}}</td>
                                <td class="border-line">{{$pesanan->harga}}</td>
                                <td class="border-line">Bukti</td>
                                <td class="border-line {{$bg}} py-1 px-2 text-white">{{$status}}</td>
                                <td class="border-line"><a href="/detail-pesanan/{{$pesanan->numInvoice}}" class="bg-primary py-1 px-2 text-white rounded-lg hover:bg-primary/50">Detail</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
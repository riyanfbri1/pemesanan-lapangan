@extends('admin.index-dashboard')
@section('dashboard')
    <div class="konten-layout-admin">
        <div class="text-center">
            <span class="font-bold text-2xl">Daftar Pesanan Masuk</span>
        </div>
        <div class="flex mt-10 mb-10">
            <div class="mx-auto">
                <table class="table-auto">
                    <thead class="bg-primary">
                        <tr class="text-center text-white text-xl">
                            <td class="border-line">Nama</td>
                            <td class="border-line">Email</td>
                            <td class="border-line">No Invoice</td>
                            <td class="border-line">Biaya Rp.</td>
                            <td class="border-line">Bukti</td>
                            <td colspan="2" class="border-line">Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pesanans as $pesanan)
                        <tr>
                            <td class="border-line">{{$pesanan->user->name}}</th>
                            <td class="border-line">{{$pesanan->user->email}}</td>
                            <td class="border-line">{{$pesanan->kode.$pesanan->numInvoice}}</td>
                            <td class="border-line">{{$pesanan->harga}}</td>
                            <td class="border-line"><a href="/download-image/{{$pesanan->numInvoice}}"><svg class="stroke-black w-[40px] h-[40px]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                              </svg>
                              </a></td>
                            <td class="border-line"><a href="/terima-pesanan/{{$pesanan->numInvoice}}" class="bg-primary py-1 px-2 text-white rounded-lg hover:bg-primary/50">Terima</a></td>
                            <td class="border-line"><a href="/batalkan-pesanan/{{$pesanan->numInvoice}}" class="bg-red-500 py-1 px-2 text-white rounded-lg hover:bg-red-400">Batalkan</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @if(session()->has('pesananBerhasil'))
    <script>
        swal("Berhasil", "{{session('pesananBerhasil')}}", "success");
    </script>
    @elseif(session()->has('dibatalkan'))
    <script>
        swal("Di Batalkan", "{{session('dibatalkan')}}", "warning");
    </script>
    @endif
@endsection
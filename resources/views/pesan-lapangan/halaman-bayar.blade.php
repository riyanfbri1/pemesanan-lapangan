@extends('layouts.main')
@section('konten')
    <div class="konten-layout py-3 px-2">
        <div class="text-center">
            <h2 class="font-semibold text-lg lg:text-2xl">Konfirmasi Pembayaran</h2>
        </div>
        <div class="my-10 text-center">
            <h5><i>Nomor Invoice : <b>{{$pesanan->kode . $pesanan->numInvoice}}</b>, Silahkan Transfer Sesuai dengan tagihan : <b> Rp. {{$pesanan->harga}} </b>, Ke Nomer Rekening di bawah ini</i></h5>
        </div>
        <section>
            <div class="lg:flex lg:flex-row">
                <div class="mx-auto text-center">
                    <div class=" mx-auto w-[250px] h-[150px] bg-cover bg-center" style="background-image: url('/img/icons/Logo/bank-logo/bca-logo.jpg')"></div>
                    <span> 12345678 <br> (AN : ORYZA FUTSAL)</span>
                </div>
            </div>
        </section>
        <section class="mx-auto mt-10 bg-primary px-2 py-1 text-white rounded-sm">
            @error('image')
            <script>
                swal("Upload Gagal", "Pastikan Format berupa image dan dibawah 1MB", "error");
            </script>
            @enderror
            <form action="/konfirmasi-pembayaran/create" method="POST" enctype="multipart/form-data">
                @csrf
                <div>
                    <label class="text-lg font-semibold">Upload Foto Bukti Pembayaran</label>
                </div>
                <div class="mt-2">
                    <input type="file" name="image" id="image">
                    <input type="hidden" name="numInvoice" value="{{$pesanan->numInvoice}}">
                </div>
                <div class="mt-5">
                    <button class="bg-blue-500 text-white px-2 py-1 rounded-lg hover:bg-blue-400" type="submit">Upload</button>
                </div>
            </form>
        </section>
    </div>
@endsection
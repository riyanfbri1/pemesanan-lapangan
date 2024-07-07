@extends('layouts.main')
@section('konten')
    <div class="konten-layout py-3 px-2">
        <div class="text-center">
            <h2 class="font-semibold text-lg lg:text-2xl">Kirim Email</h2>
        </div>
        <div class="flex mt-5">
            <div class="mx-auto w-[90px] h-[90px] bg-cover lg:w-[150px] lg:h-[150px]" style="background-image: url('/img/icons/content-icons/send-email.png')"></div>
        </div>
        <div class="mt-5 mb-40 lg:mb-[115px]">
            <h2 class="font-semibold text-center text-xl lg:text-2xl mb-5">Email Berhasil dikirim</h2>
            <h5 class="font-thin text-center lg:text-lg italic">Silahkan Cek email anda, untuk melanjutkan proses Reset Password Akun anda! <br>
            <b>PERHATIAN</b> Jangan memberikan Isi email Tersebut kepada Siapapun
            </h5>
        </div>
    </div>
@endsection
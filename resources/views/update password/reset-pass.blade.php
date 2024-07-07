@extends('layouts.main')
@section('konten')
    <div class="konten-layout py-3 px-2">
        <div class="text-center">
            <h2 class="font-semibold text-lg lg:text-2xl">Reset Kata Sandi</h2>
        </div>
        <div class="flex mt-5">
            <div class="mx-auto w-[90px] h-[90px] bg-cover lg:w-[150px] lg:h-[150px]" style="background-image: url('/img/icons/content-icons/forgot-password.png')"></div>
        </div>
        <div class="mt-10">
            <h2 class="font-semibold text-center lg:text-xl">Lupa Password ?</h2>
            <h5 class="font-thin text-center lg:text-lg">Masukan Email kamu yang sudah terdaftar, untuk melakukan Reset Password Akun kamu!</h5>
        </div>
        <div class="flex mt-10">
            <input class="mx-auto border-2 rounded-lg border-slate-400 py-3 px-2 lg:w-[400px] placeholder:text-center placeholder:italic" type="email" placeholder="Masukan alamat email anda">
        </div>
        <div class="flex mt-10 mb-5">
            <button class="border-2 mx-auto rounded-xl py-3 px-2 btn-primary text-white">Kirim Link Reset</button>
        </div>
    </div>
@endsection
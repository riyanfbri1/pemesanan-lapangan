@extends('layouts.main')
@section('konten')
    <div class="konten-layout py-3 px-2">
        <div class="text-center">
            <h3 class="font-semibold text-lg lg:text-2xl">DAFTAR</h3>
        </div>
        <div class="mt-6 lg:mt-10 lg:ml-20">
            <form action="/register/create" method="post">
                @csrf
                <div class="block">
                    <div class="ml-2 mb-1 mt-3">
                        <label>Nama <span class="text-red-500">*</span></label>
                    </div>
                    <div class="lg:max-w-[450px]">
                        @error('name')<span class="text-sm text-red-400 italic font-normal">Nama tidak Valid</span>@enderror
                        <input class="input-form lg:w-full @error('name') border-red-400 @enderror" type="text" name="name" placeholder="Masukan nama lengkap" value="{{old('name')}}">
                    </div>
                </div>
                <div class="block">
                    <div class="ml-2 mb-1 mt-3">
                        <label>Tanggal Lahir <span class="text-red-500">*</span></label>
                    </div>
                    <div class="lg:max-w-[450px]">
                        <input class="input-form lg:w-full" type="date" name="lahir" data-date-inline-picker="true">
                    </div>
                </div>
                <div class="block">
                    <div class="ml-2 mb-1 mt-3">
                        <label>Email <span class="text-red-500">*</span></label>
                    </div>
                    <div class="lg:max-w-[450px]">
                        @error('telepon')<span class="text-sm text-red-400 italic font-normal">Email yang anda masukan tidak valid</span>@enderror
                        <input class="input-form lg:w-full @error('email') border-red-400 @enderror" name="email" type="email" placeholder="Masukan email" value="{{old('email')}}">
                    </div>
                </div>
                <div class="block">
                    <div class="ml-2 mb-1 mt-3">
                        <label>No HP / Whatsapp <span class="text-red-500">*</span></label>
                    </div>
                    <div class="lg:max-w-[450px]">
                        @error('telepon')<span class="text-sm text-red-400 italic font-normal">Nomor Telepon Harus 12 Digit</span>@enderror
                        <input class="input-form lg:w-full @error('telepon') border-red-400 @enderror" name="telepon" type="number" placeholder="Masukan No Hp / WA" value="{{old('telepon')}}">
                    </div>
                </div>
                <div class="block">
                    <div class="ml-2 mb-1 mt-3">
                        <label>Kata sandi <span class="text-red-500">*</span></label>
                    </div>
                    <div class="lg:max-w-[450px]">
                        <input class="input-form lg:w-full" name="password" type="password">
                    </div>
                </div>
                <div class="block mt-5 mb-5 lg:ml-1 lg:mt-10">
                    <div class="btn-primary max-w-[80px] px-2 py-3 text-center rounded-md text-white shadow-lg hover:bg-blue-400 lg:rounded-xl lg:shadow-xl">
                        <button type="submit">Daftar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
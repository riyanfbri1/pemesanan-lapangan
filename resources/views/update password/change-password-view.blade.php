@extends('layouts.main')
@section('konten')
    <div class="konten-layout py-3 px-2">
        <div class="text-center">
            <h2 class="font-semibold text-lg lg:text-2xl">Membuat Kata sandi Baru</h2>
        </div>
        <div class="flex mt-5">
            <div class="mx-auto w-[90px] h-[90px] bg-cover lg:w-[150px] lg:h-[150px]" style="background-image: url('/img/icons/content-icons/new-pass.png')"></div>
        </div>
        <div class="mt-10">
            <form action="/change-password/update/{{$id}}" method="POST">
                @csrf
            <div class="flex">
                <label class="mx-auto font-semibold" for="">Kata Sandi Baru <span class="text-red-500">*</span></label>
            </div>
            <div class="flex">
                <input class="mx-auto border-2 rounded-lg w-[250px] py-3 px-2 lg:w-[400px] placeholder:text-center placeholder:italic @error('password2') border-red-400 @enderror" type="password" name="password1" placeholder="Masukan Kata sandi baru">
            </div>
        </div>
        <div class="mt-10">
            <div class="flex">
                <label class="mx-auto font-semibold" for="">Konfirmasi Kata Sandi Baru <span class="text-red-500">*</span></label>
            </div>
            <div class="flex">
                <input class="mx-auto border-2 rounded-lg w-[250px] py-3 px-2 lg:w-[400px] placeholder:text-center placeholder:italic @error('password2') border-red-400 @enderror" name="password2" type="password" placeholder="Konfirmasi Kata sandi baru">
            </div>
        </div>
        <div class="flex mt-10 mb-5">
            <button type="submit" class="border-2 mx-auto rounded-xl py-3 px-2 btn-primary text-white">Buat Baru</button>
        </div>
        </form>
    </div>
@error('password2')
<script>
    swal("Gagal", "Password Tidak Sama", "error");
</script>
@enderror
@endsection
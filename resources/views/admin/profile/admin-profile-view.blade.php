@extends('admin.index-dashboard')
@section('dashboard')
    <div class="flex konten-layout-admin">
        <div>
            <div class="border border-black w-[100px] h-[130px] bg-cover bg-center mx-2" style="background-image: url('{{asset('storage/'.$user->bio->image)}}');"></div>
        </div>
        <div class="w-full grid grid-cols-6 px-[40px]">
            <span class="col-span-1">Nama Lengkap</span>
            <span class="col-span-5">: {{$user->name}}</span>
            <span class="col-span-1">Alamat</span>
            <span class="col-span-5">: {{$user->bio->alamat}}</span>
            <span class="col-span-1">Email</span>
            <span class="col-span-5">: {{$user->email}}</span>
            <span class="col-span-1">No Whatsapp</span>
            <span class="col-span-5">: {{$user->bio->telepon}}</span>
        </div>
        <div>
            <div>
                <a href="/admin/edit-profile/view">
                <svg class="w-[30px] h-[35px] stroke-1 stroke-primary hover:stroke-primary/50" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                  </svg>
                </a>
                <span>Edit</span>
            </div>
        </div>
    </div>
    <div class=" mt-5">
        <span class="font-semibold underline hover:text-red-500">
            <a class="flex" href="/ubah-password/admin/view">
                <div class="mr-[5px]"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1121.75 8.25z" />
                  </svg></div>Ubah Kata Sandi</a>
        </span>
    </div>
@if(session()->has('ubahPassword'))
    <script>
        swal("Berhasil", "{{session('ubahPassword')}}", "success");
    </script>
@endif
@if(session()->has('ubahProfile'))
    <script>
        swal("Berhasil", "{{session('ubahProfile')}}", "success");
    </script>
@endif

@endsection
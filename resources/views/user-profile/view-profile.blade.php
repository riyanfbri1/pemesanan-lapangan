@php
 if($data->bio->image == 'default' || $data->bio->image == null){
    $image = '/img/profile/default-user/default.png';
    }
else {
    $image = asset('storage/'. $data->bio->image);
 }

@endphp
@extends('layouts.main')
@section('konten')
    <div class="konten-layout py-3 px-2">
        <div class="text-center">
            <h2 class="font-semibold text-lg lg:text-2xl">Profile</h2>
        </div>
        <div class="mt-8 lg:flex">
            <section id="profile-1" class="lg:ml-10 lg:mr-10">
                <div class="mx-auto border-2 bg-cover rounded-lg text-center border-slate-400 w-[100px] h-[100px] shadow-2xl lg:w-[200px] lg:h-[200px]" style="background-image: url('{{$image}}');">
                </div>
                <div class="text-center mt-2 text-sm font-bold lg:text-xl lg:font-semibold">{{$data->name}}</div>
            </section>
            <div class="bg-sky-600 max-w-full p-[2px] my-10 lg:max-w-0 lg:max-h-full lg:my-3"></div>
            <section id="profile-2" class="lg:ml-5 lg:w-full lg:py-5 px-4 lg:border-2 lg:border-slate-400 lg:rounded-lg">
                <div class="text-center mb-5 font-semibold">Biodata</div>
                <div class=" border-slate-500 text-left">
                    <ul class="text-lg">
                        <li>
                            <div class="text-lg lg:text-2xl lg:mb-3">
                                <label class="font-semibold">Nama : </label>
                                <label class="font-medium">{{$data->name}}</label>
                            </div>
                        </li>
                        <li>
                            <div class="text-lg lg:text-2xl lg:mb-3">
                                <label class="font-semibold">Alamat : </label>
                                <label class="font-medium">{{$data->bio->alamat ?? '-'}}</label>
                            </div>
                        </li>
                        <li>
                            <div class="text-lg lg:text-2xl lg:mb-3">
                                <label class="font-semibold">Tanggal Lahir : </label>
                                <label class="font-medium">{{$data->bio->lahir}}</label>
                            </div>
                        </li>
                        <li>
                            <div class="text-lg lg:text-2xl lg:mb-3">
                                <label class="font-semibold">HP / Whatsapp : </label>
                                <label class="font-medium">{{$data->bio->telepon}}</label>
                            </div>
                        </li>
                        <li>
                            <div class="text-lg lg:text-2xl lg:mb-3">
                                <label class="font-semibold">Email : </label>
                                <label class="font-medium">{{$data->email}}</label>
                            </div>
                        </li>
                    </ul>
                </div>
            </section>
        </div>
        <section class="my-3 flex lg:flex">
            <div class="bg-yellow-500 w-[80px] mx-auto text-center py-2 px-1 rounded-xl text-white shadow-xl hover:bg-yellow-400 mt-5 lg:ml-[70px] object-center">
                <a href="/profile/edit/{{$data->id}}" class="text-lg">Edit</a>
            </div>
        </section>
    </div>
@endsection
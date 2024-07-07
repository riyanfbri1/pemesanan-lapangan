@extends('layouts.main')
@section('konten')
    <div class="konten-layout py-3 px-2">
        <div class="text-center">
            <h2 class="font-semibold text-lg lg:text-2xl">Edit Profile</h2>
        </div>
        <div>
            <div class="mt-6 lg:mt-10 lg:ml-20">
                <form action="/profile/update" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="block">
                        <div class="ml-2 mb-1 mt-3">
                            <div class="w-[100px] h-[100px] rounded-xl shadow-lg bg-cover" style="background-image: url('{{asset('storage/'.$data->bio->image)}}');">
                            </div>
                            <div>
                                <input type="file" name="image" class="text-sm text-slate-600 file:text-sm file:rounded-lg file:border-0 file:bg-primary file:text-white" value="{{$data->bio->image}}">
                            </div> 
                        </div>
                    </div>
                    <div class="block">
                        <div class="ml-2 mb-1 mt-3">
                            <label for="">Nama </label>
                        </div>
                        <div class="lg:max-w-[450px]">
                            <input class="input-form lg:w-full" name="name" type="text" value="{{$data->name}}">
                        </div>
                    </div>
                    <div class="block">
                        <div class="ml-2 mb-1 mt-3">
                            <label for="">Email </label>
                        </div>
                        <div class="lg:max-w-[450px]">
                            <input class="input-form lg:w-full" name="email" type="email" value="{{$data->email}}">
                        </div>
                    </div>
                    <div class="block">
                        <div class="ml-2 mb-1 mt-3">
                            <label for="">Alamat </label>
                        </div>
                        <div class="lg:max-w-[450px]">
                            <input class="input-form lg:w-full" name="alamat" type="text" value="{{$data->bio->alamat}}">
                        </div>
                    </div>
                    <div class="block">
                        <div class="ml-2 mb-1 mt-3">
                            <label for="">No HP / Whatsapp </label>
                        </div>
                        <div class="lg:max-w-[450px]">
                            <input class="input-form lg:w-full" name="telepon" type="number" value="{{$data->bio->telepon}}">
                        </div>
                    </div>
                    <div class="block">
                        <div class="ml-2 mb-1 mt-10">
                            <a href="/edit/change-password/view/{{auth()->user()->id}}" class="bg-blue-400 text-white py-1 px-2 rounded-lg hover:bg-blue-200 shadow-xl">Ubah Password</a>
                        </div>
                    </div>
                    <div class="flex mt-5 mb-5 lg:ml-1 lg:mt-10">
                        <div class="bg-yellow-500 w-[80px] text-center px-1 py-2 rounded-md text-white shadow-lg hover:bg-yellow-400 lg:rounded-xl lg:shadow-xl">
                            <button type="submit">Save</button>
                        </div>
                        <div class="bg-red-500 w-[80px] ml-[5px] text-center px-1 py-2 rounded-md text-white shadow-lg hover:bg-red-400 lg:rounded-xl lg:shadow-xl">
                            <a href="/profile/view/{{auth()->user()->id }}">Cancel</button>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
@endsection
@extends('admin.index-dashboard')
@section('dashboard')
<div class="konten-layout-admin">
    <div class="text-center">
        <span class="font-bold text-2xl">Ubah Profile Admin</span>
    </div>
    <div>
        <div>
            <form action="/admin/profile/edit" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mt-5">
                    <div class="border border-black w-[100px] h-[130px] bg-cover bg-center mx-2" style="background-image: url('{{asset('storage/'.$user->bio->image)}}');"></div>
                    <input type="file" name="image" class="mt-3 file:rounded-lg file:bg-primary file:text-white file:border-white file:text-sm hover:file:bg-primary/50">
                </div>
                </div>
                <div class="mt-5">
                    <label class="block" for="">Nama</label>
                    @error('name')<div class="italic text-red-500 text-sm">{{$message}}</div> @enderror
                    <input type="text" name="name" id="" class="border py-1 px-2 rounded-lg border-slate-400 @error('name') border-red-400 @enderror" value="{{$user->name}}" required>
                </div>
                <div class="mt-5">
                    <label class="block" for="">Email</label>
                    @error('email')<div class="italic text-red-500 text-sm">{{$message}}</div> @enderror
                    <input type="email" name="email" id="" class="border py-1 px-2 rounded-lg border-slate-400  @error('email') border-red-400 @enderror" value="{{$user->email}}" required>
                </div>
                <div class="mt-5">
                    <label class="block" for="">Alamat</label>
                    @error('alamat')<div class="italic text-red-500 text-sm">{{$message}}</div> @enderror
                    <input type="text" name="alamat" id="" class="border py-1 px-2 rounded-lg border-slate-400  @error('alamat') border-red-400 @enderror" value="{{$user->bio->alamat}}" required>
                </div>
                <div class="mt-5">
                    <label class="block" for="">Telepon / WA</label>
                    @error('telepon')<div class="italic text-red-500 text-sm">{{$message}}</div> @enderror
                    <input type="number" name="telepon" id="" class="border py-1 px-2 rounded-lg border-slate-400  @error('telepon') border-red-400 @enderror" value="{{$user->bio->telepon}}" required>
                </div>
                <div class="mt-5">
                    <button class="bg-blue-500 py-1 px-2 rounded-lg text-white">UBAH</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
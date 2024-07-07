@extends('admin.index-dashboard')
@section('dashboard')
    <div class="konten-layout-admin">
        <div class="text-center">
            <span class="font-bold text-2xl">Ubah Password Admin</span>
        </div>
        <div>
            <div>
                <form action="/ubah-password/admin/edit" method="POST">
                    @csrf
                    <div class="mt-5">
                        <label class="block" for="">Password Baru</label>
                        <input type="password" name="password1" class="border rounded-lg py-1 px-2 @error('password2') border-red-400 @enderror">
                    </div>
                    <div class="mt-5">
                        <label class="block" for="">Konfirmasi Password</label>
                        <input type="password" name="password2" class="border rounded-lg py-1 px-2 @error('password2') border-red-400 @enderror">
                    </div>
                    <input type="hidden" name="id" value="{{auth()->user()->id}}">
                    <div class="mt-5">
                        <button type="submit" class="bg-blue-500 text-white py-1 px-2 rounded-lg">UBAH</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @error('password2')
    <script>
        swal('Gagal!','Password tidak sama','error');</script> 
    @enderror
@endsection
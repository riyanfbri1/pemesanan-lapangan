@php
$image = $user->bio->image;
if($image == 'default' || $image == null)
{
    $urlImg = '/img/profile/default-user/default.png';
}
else {
    $urlImg = asset('storage/'.$image);
}
@endphp
@extends('admin.index-dashboard')
@section('dashboard')
    <div class="konten-layout-admin">
        <div class="text-center">
            <span class="font-bold text-2xl">Daftar Pengguna Aplikasi Detail</span>
        </div>
        <div>
            <div class="border-2 shadow-xl border-black w-[100px] h-[130px] bg-cover bg-center mx-2" style="background-image: url('{{$urlImg}}');"></div>
            <div>
                <label id="name" class="block mt-5" for="">Nama</label>
                <input type="text" value="{{$user->name}}" readonly class="border py-1 px-2 border-slate-500">
            </div>
            <div>
                <label class="block mt-5" for="">Alamat</label>
                <input type="text" value="{{$user->bio->alamat ?? "User Belum mengisi data"}}" readonly class="border py-1 px-2 border-slate-500">
            </div>
            <div>
                <label class="block mt-5" for="">Email</label>
                <input type="text" value="{{$user->email}}" readonly class="border py-1 px-2 border-slate-500">
            </div>
            <div>
                <label class="block mt-5" for="">Telepon</label>
                <input type="text" value="{{$user->bio->telepon}}" readonly class="border py-1 px-2 border-slate-500">
            </div>
            <div class="mt-5">
                <button class="bg-red-500 text-white py-1 px-2 rounded-lg shadow-lg hover:bg-red-400" onclick="warning('{{$user->name}}')">Reset Password</button>
            </div>
        </div>
    </div>
<script>
    function warning(name)
    {
        var nama = name;
        swal("Apa kamu ingin me-Reset Password "+nama+" ?", {
            buttons: ["Tidak", true],
        }).then((result) => {
            if(result)
            {
                window.location = "/admin/user-reset-password/{{$user->id}}";
            }
            else{
                console.log('gagal');
            }
        })
        
    }
</script>
@endsection
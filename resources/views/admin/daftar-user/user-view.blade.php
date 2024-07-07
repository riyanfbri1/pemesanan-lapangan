@extends('admin.index-dashboard')
@section('dashboard')
    <div class="konten-layout-admin">
        <div class="text-center">
            <span class="font-bold text-2xl">Daftar Pengguna Aplikasi</span>
        </div>  
        <div class="mt-10">
            <div>
                <table class="table-auto mx-auto">
                    <thead>
                        <tr class="text-center text-white bg-slate-400">
                            <td class="border-line">Nama Lengkap</td>
                            <td class="border-line">Telepon</td>
                            <td class="border-line">Alamat</td>
                            <td colspan="2" class="border-line">Aksi</td>

                        </tr>
                    </thead>
                    <tbody id="bodyTable">
                        @foreach ($userAll as $user)
                        <tr class="text-center">
                            <td class="border-line">{{$user->name}}</td>
                            <td class="border-line">{{$user->bio->telepon}}</td>
                            <td class="border-line">{{$user->bio->alamat ?? 'Data Tidak ada'}}</td>
                            <td class="border-line"><a href="/admin/daftar-user/detail/{{$user->id}}" class="bg-blue-500 text-white py-1 px-2 rounded-lg hover:bg-blue-400">Detail</a></td>
                            <td class="border-line "><button type="button" class="bg-red-500 text-white py-1 px-2 rounded-lg hover:bg-red-400" onclick="warning('{{$user->id}}')">Hapus</button></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@if (session()->has('resetPassword'))
<script>
    swal("Reset Password Berhasil", "{{session('resetPassword')}}", "success");
</script>
@endif
<script src="/Javascript/search-daftar-user.js"></script>
<script>
    function warning(id)
    {
        var id = id;
        swal("Apa kamu ingin Menghapus Akun ini ?", {
            buttons: ["Tidak", true],
        }).then((result) => {
            if(result)
            {
                window.location = "/hapus-user/"+id;
            }
            else{
                console.log('gagal');
            }
        })
    }
</script>
@endsection
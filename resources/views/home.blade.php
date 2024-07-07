@extends('layouts.main')
@section('konten')
    <div>
        <div class="flex max-w-[full]">
            <div class="w-full h-[600px] border flex bg-origin-border bg-center" style="background-image: url('/img/background/lapangan.png');">
                <span class="font-extrabold mx-auto my-auto">
                    <div class="text-center bg-clip-text">
                        <p class="text-4xl mx-auto">LAPANGAN ORYZA FUTSAL</p>
                        <p class="text-xl mx-auto">BISA BOOKING LAPANGAN ONLINE, PESAN KAPANPUN, DIMANAPUN</p>
                    </div>
                    <div class="container flex">
                        <div class=" mx-auto grid grid-cols-2 lg:grid-cols-4">
                            <img class="fill-white icons-home transition duration-500 ease-in-out" src="/img/icons/home-icons/score.svg" alt="Goal">
                            <img class="fill-white icons-home transition duration-500 ease-in-out" src="/img/icons/home-icons/goal.svg" alt="Goal">
                            <img class="fill-white icons-home transition duration-500 ease-in-out" src="/img/icons/home-icons/kick.svg" alt="Goal">
                            <img class="fill-white icons-home transition duration-500 ease-in-out" src="/img/icons/home-icons/waktu.svg" alt="Goal">
                        </div>
                    </div>
                </span>
            </div>
        </div>
    </div>
@if(session()->has('loginBerhasil'))
<script>
    swal("Berhasil Login", "{{session('loginBerhasil') ." ". auth()->user()->name}}", "success");
</script>
@endif
@endsection
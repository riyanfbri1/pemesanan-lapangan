<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title ?? "Oryza Futsal Singkawang"}}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;400;600;700&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body class="font-Inter bg-latarbelakang">
    <div class="grid grid-cols-7">
        <div class="bg-slate-600 px-5 py-5 text-white">
            <div class="font-extrabold text-2xl">
                <h2>Admin Oryza Futsal</h2>
            </div>
            <div class="mt-8 py-5 mb-[265px]">
            <div class="group my-[20px]">
                <div class=" group-hover:text-white/40">
                    <a class="flex" href="/admin/profile/view">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg><p>Profile</p>
                    </a>
                </div>
            </div>
            <div class="my-[20px]">
                <div class=" hover:text-white/40 mb-2  flex">
                    <svg class="w-[20px] h-[20px]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                      </svg>
                    <button class="flex " type="button" onclick="listMenu()">
                          <p>Pesanan</p><svg id="icon-list-pesanan" class="my-auto w-[20px] h-[20px] transition duration-300 ease-in-out" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                          </svg>
                    </button>
                </div>
                <div id="pesanan-list" class="text-[13px] font-normal hidden">
                    <div class="ml-6 hover:text-white/40 mt-2">
                        <a href="/admin/pesanan/pesanan-masuk" >Pesanan Masuk</a>
                    </div>
                    <div class="ml-6 hover:text-white/40 mt-2">
                        <a href="/admin/daftar-pesanan">Daftar Pesanan</a>
                    </div>
                </div>
            </div>
            <div class="group my-[20px]">
                <div class=" group-hover:text-white/40">
                    <a class="flex" href="/admin/daftar-user">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                          </svg>                          
                          <p>Daftar User</p>
                    </a>
                </div>
            </div>
            <div class="group my-[50px]">
                <form action="/logout" method="POST">
                    @csrf
                <div class=" group-hover:text-white/40">
                    <button class="flex" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                          </svg>
                          <p>Logout</p>
                    </button>
                </div>
                </form>
            </div>
            </div>

        </div>
        <div class="col-span-6 bg-latarbelakang">
            <div class="container px-[50px] py-[50px]">
                <div class="">
                    @yield('dashboard')
                </div>
            </div>
        </div>
    </div>

<script src="/Javascript/dashboardAdmin.js"></script>
</body>
</html>
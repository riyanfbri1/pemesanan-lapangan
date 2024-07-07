<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? "Oryza Futsal Singkawang"}}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href= "img/football.png" type="image/x-icon"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;400;600;700&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="./TW-ELEMENTS-PATH/dist/js/index.min.js"></script>

<!-- PWA  -->
<meta name="theme-color" content="#4A5393"/>
<link rel="apple-touch-icon" href="{{ asset('/img/futsal.png') }}">
<link rel="manifest" href="{{ asset('/manifest.json') }}">

</head>
<body class="font-Inter bg-latarbelakang" >
    <header class="sticky top-0 z-20 w-full bg-dark shadow-lg bg-header">
        <div class="container">
            <div class="flex items-center justify-between mx-auto max-w-screen-xl p-4 md:flex md:items-center md:justify-between">
        <!-- Logo -->
        <a href="/" class="flex items-center">
            <img src="img/futsal.png" alt="Logo" class="h-12 w-auto">
        </a>
                <div class="flex px-4 items-center">
                    <button id="humberger" type="button" class="block absolute right-4 lg:hidden">
                        <span class="humberger-line origin-top-left transition duration-300 ease-in-out"></span>
                        <span class="humberger-line transition duration-300 ease-in-out"></span>
                        <span class="humberger-line origin-bottom-left transition duration-300 ease-in-out"></span>
                    </button>
                </div>

                <nav id="nav-menu" class="hidden absolute py-5 bg-white max-w-[250px] rounded-lg shadow-md right-4 top-12 lg:block lg:max-w-full lg:static lg:bg-transparent lg:shadow-none lg:rounded-none ">
                    <ul class="block text-black lg:flex lg:text-white">
                        <li class="group">
                            <a href="/" class=" group-hover:text-slate-200 mx-8 py-2 flex">Beranda</a>
                        </li>
                        <li class="group">
                            <a href="/jadwal-lapangan" class=" group-hover:text-slate-200 mx-8 py-2 flex">Jadwal Lapangan</a>
                        </li>
                        @auth
                        <li class="group">
                            <a href="/pesan-lapangan/view/{{auth()->user()->id}}" class=" group-hover:text-slate-200 mx-8 py-2 flex">Pesan Lapangan</a>
                        </li>                            
                        <li class="group">
                            <a href="/profile/view/{{auth()->user()->id}}" class=" group-hover:text-slate-200 mx-8 py-2 flex">Profile</a>
                        </li>
                        <li class="group">
                            <form action="/logout" method="post">
                                @csrf
                                <button class="group-hover:text-slate-200 mx-8 py-2 flex" type="submit">Logout</button>
                            </form>
                        </li>
                        @endauth
                        @guest
                        <li class="group">
                            <a href="/login" class=" group-hover:text-slate-200 mx-8 py-2 flex">Login</a>
                        </li>
                        @endguest
                    </ul>
                </nav>
        </div>
    </header>


<div class="block mt-18">
    @yield('konten')
</div>
{{-- mt-[40px]   bottom-0   --}}
<footer class="bg-footer shadow m-full mt-[25px] md:h-full pt-[24px] pb-[12px]">
    <div class="w-full mx-auto max-w-screen-xl p-4 md:items-center md:justify-between text-white text-center">
        <ul>
            <li>
                <span class="flex">
                    <div class="mx-auto flex h-5">
                        <div class="flex mx-2">
                            <img src="/img/icons/footer-icons/instagram-logo.png" alt="Logo Instagram">
                            <h5>Instagram</h5>
                        </div>
                        <div class="flex mx-2">
                            <img src="/img/icons/footer-icons/email-logo.png" alt="Logo Email">
                            <h5>Email</h5>
                        </div>
                        <div class="flex mx-2">
                            <img src="/img/icons/footer-icons/whatsapp-logo.png" alt="Logo WhatsApp">
                            <h5>WhatsApp</h5>
                        </div>
                    </div>
                </span>
            </li>
            <li>
                <hr class="opacity-30">
            </li>
            <li>
                <span class="flex">
                    <div class="mx-auto flex">
                        <a class="mx-2" href="">Contact</a>
                        <a class="mx-2" href="">Privacy</a>
                        <a class="mx-2" href="">About</a>
                    </div>
                </span>
            </li>
            <li>
                <span class="flex">
                    <div class="mx-auto flex">
                        <img class="max-h-[20px] max-w-[20px]" src="https://upload.wikimedia.org/wikipedia/commons/6/6e/Copyright_white.svg" alt="CopyRight">
                        <h5 class="mx-2">2024 - Oryza Futsal Singkawang</h5>
                    </div>
                </span>
            </li>
        </ul>
    </div>
</footer>

    <script src="/Javascript/cssJavascript.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script src="{{ asset('/sw.js') }}"></script>
<script>
   if ("serviceWorker" in navigator) {
      // Register a service worker hosted at the root of the
      // site using the default scope.
      navigator.serviceWorker.register("/sw.js").then(
      (registration) => {
         console.log("Service worker registration succeeded:", registration);
      },
      (error) => {
         console.error(`Service worker registration failed: ${error}`);
      },
    );
  } else {
     console.error("Service workers are not supported.");
  }
</script>

</body>
</html>
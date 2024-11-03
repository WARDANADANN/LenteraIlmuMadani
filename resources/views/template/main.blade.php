<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('image/logo.png') }}" type="image/png">

     <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Primary Meta Tags -->
    <title>{{ $page_title ?? 'Buku Terbaik 2024 - Penerbit Lentera Ilmu Madani' }}</title>
    <meta name="title" content="{{ $page_title ?? 'Buku Terbaik 2024 - Penerbit Lentera Ilmu Madani' }}">
    <meta name="description" content="{{ $page_description ?? 'Temukan buku-buku terbaik yang diterbitkan oleh Penerbit Lentera Ilmu Madani di tahun 2024. Dapatkan harga promo dan koleksi lengkapnya di sini.' }}">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ $page_url ?? url()->current() }}">
    <meta property="og:title" content="{{ $page_title ?? 'Buku Terbaik 2024 - Penerbit Lentera Ilmu Madani' }}">
    <meta property="og:description" content="{{ $page_description ?? 'Temukan buku-buku terbaik yang diterbitkan oleh Penerbit Lentera Ilmu Madani di tahun 2024. Dapatkan harga promo dan koleksi lengkapnya di sini.' }}">
    <meta property="og:image" content="{{ $page_image ?? asset('images/books-banner.jpg') }}">
    
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ $page_url ?? url()->current() }}">
    <meta property="twitter:title" content="{{ $page_title ?? 'Buku Terbaik 2024 - Penerbit ABC' }}">
    <meta property="twitter:description" content="{{ $page_description ?? 'Temukan buku-buku terbaik yang diterbitkan oleh Penerbit ABC di tahun 2024. Dapatkan harga promo dan koleksi lengkapnya di sini.' }}">
    <meta property="twitter:image" content="{{ $page_image ?? asset('images/books-banner.jpg') }}">

    <!-- Canonical Tag -->
    <link rel="canonical" href="{{ $page_url ?? url()->current() }}">

    <!-- Keywords -->
    <meta name="keywords" content="buku terbaik 2024, buku penerbit abc, novel terbaru, rekomendasi buku, buku murah">
    
    <!-- Author -->
    <meta name="author" content="Penerbit ABC">

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />
    <style>
      ::-webkit-scrollbar {
      width: 0px;
    }
      html {
        scroll-behavior: smooth;
    }
    .hidden-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.5s ease-out;
        }

        .show-content {
            max-height: 500px;
            transition: max-height 0.5s ease-in;
        }
    </style>
</head>

<body class="bg-gray-100 ">

    <!-- Navbar -->
<nav class="bg-white border-gray-200 px-4  ">
    <div class="container flex flex-wrap justify-between items-center mx-auto md:px-32 px-4">
        <!-- Logo -->
        <a href="/" class="flex items-center">
            <img style="width: 120px; height:120px" src="{{ asset('image/logo.png') }}" class="aspect-square  mr-3 sm:h-9" alt="Lentera Ilmu Madani">
        </a>
        
        <!-- Hamburger Icon for Mobile -->
        <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>

        <!-- Links (Hidden on mobile) -->
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul class="flex flex-col md:flex-row md:space-x-8 mt-4 md:mt-0 md:text-xl md:font-medium">
                <li>
                    <a href="/" class="block py-2 pr-4 pl-3 text-gray-700 rounded md:bg-transparent md:text-gray-700 md:p-0 hover:text-green-700">Beranda</a>
                </li>
                <li>
                    <a href="/#profile" class="block py-2 pr-4 pl-3 text-gray-700 rounded md:bg-transparent md:text-gray-700 md:p-0 hover:text-green-700">Profil</a>
                </li>
                <li>
                    <a href="/#layanan" class="block py-2 pr-4 pl-3 text-gray-700 rounded md:bg-transparent md:text-gray-700 md:p-0 hover:text-green-700">Layanan</a>
                </li>
                <li>
                    <a href="/terbitan" class="block py-2 pr-4 pl-3 text-gray-700 rounded md:bg-transparent md:text-gray-700 md:p-0 hover:text-green-700">Buku Terbit</a>
                </li>
                <li>
                    <a href="/kontak" class="block py-2 pr-4 pl-3 text-gray-700 rounded md:bg-transparent md:text-gray-700 md:p-0 hover:text-green-700">Kontak</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Tailwind Script (needed for collapsible navbar) -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggleButton = document.querySelector('[data-collapse-toggle]');
        const navbarMenu = document.getElementById(toggleButton.getAttribute('aria-controls'));

        toggleButton.addEventListener('click', function () {
            navbarMenu.classList.toggle('hidden');
        });
    });
</script>


<div class="content">
    @yield('content')
</div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-6">
        <div class="container mx-auto px-6">
            <div class="flex justify-between">
                <p>&copy; 2024 Lentera Ilmu Madani. Semua Hak Dilindungi.</p>
                <nav class="flex space-x-4">
                    <a href="#" class="text-gray-400 hover:text-white">Privacy Policy</a>
                    <a href="#" class="text-gray-400 hover:text-white">Terms of Service</a>
                </nav>
            </div>
        </div>
    </footer>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>
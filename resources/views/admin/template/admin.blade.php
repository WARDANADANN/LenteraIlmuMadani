<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Lentera Ilmu Madani</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-gray-100">

    <div class="flex flex-col md:flex-row min-h-screen">
        <!-- Sidebar -->
        <div class="w-full md:w-64 bg-gray-800 text-white flex-shrink-0">
            <div class="p-6 text-center">
                <h1 class="text-2xl font-bold">Dashboard</h1>
            </div>
            <nav class="mt-10">
                <a href="{{ route('add') }}"
                    class="flex items-center px-6 py-3 text-gray-300 hover:bg-gray-700 hover:text-white transition duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="w-6 h-6 mr-3">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    <span>Tambah Buku</span>
                </a>
                <a href="#stats"
                    class="flex items-center px-6 py-3 text-gray-300 hover:bg-gray-700 hover:text-white transition duration-200 mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="w-6 h-6 mr-3">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m0 0l2 2 4-4" />
                    </svg>
                    <span>Statistik Kunjungan</span>
                </a>
                <a href="/logout"
                    class="flex items-center px-6 py-3 text-gray-300 hover:bg-gray-700 hover:text-white transition duration-200 mt-2">
                    <svg class="w-6 h-6 mr-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M5 21q-.825 0-1.412-.587T3 19V5q0-.825.588-1.412T5 3h7v2H5v14h7v2zm11-4l-1.375-1.45l2.55-2.55H9v-2h8.175l-2.55-2.55L16 7l5 5z" />
                    </svg>
                    <span>Log Out</span>
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-6">
            @yield('content')
        </div>
    </div>

</body>

</html>
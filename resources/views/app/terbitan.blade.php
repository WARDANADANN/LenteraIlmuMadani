@extends('template.main')
@section('content')
 <!-- Library Section -->
    <section class="container bg-green-50 mx-auto md:px-32 px-6 py-12">
        <div class="text-center">
            <h2 class="text-3xl font-semibold text-gray-800">Perpustakaan Buku Terbitan Lentera Ilmu Madani</h2>
            <p class="mt-4 text-gray-600">Jelajahi buku-buku terbitan terbaik dari kami berdasarkan kategori dan tahun
                terbit.</p>
        </div>

        <!-- Search & Filter -->
        <form action="/terbitan" method="GET" class="flex flex-wrap justify-between items-center mt-8">
            <!-- Search Bar -->
            <div class="w-full md:w-1/3">
                <input name="judul" type="text" placeholder="Cari judul buku..."
                    class="w-full py-2 px-4 rounded shadow focus:outline-none focus:ring focus:ring-green-300" />
                </div>
                
                <!-- Filter Kategori -->
                <div class="w-full md:w-1/4 mt-4 md:mt-0">
                    <select name="kategori" class="w-full py-2 px-4 rounded shadow focus:outline-none focus:ring focus:ring-green-300">
                        <option value="">Semua Kategori</option>
                        @foreach ($kategori as $item)
                        <option value="{{ $item->kategori }}">{{ $item->kategori }}</option>
                        @endforeach
                        <!-- Add more categories here -->
                    </select>
                </div>
                
                <!-- Filter Tahun Terbit -->
                <div class="w-full md:w-1/4 mt-4 md:mt-0">
                    <input name="tahun" type="text" placeholder="2021"
                        class="w-full py-2 px-4 rounded shadow focus:outline-none focus:ring focus:ring-green-300" />
                </div>

            <!-- Search Button -->
            <div class="w-full md:w-auto mt-4 md:mt-0">
                <button name="search" class="w-full bg-green-600 text-white py-2 px-4 rounded hover:bg-green-500 shadow">
                    Cari
                </button>
            </div>
        </form>

        <!-- Book List -->
        <div class="mt-10 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4  gap-8">
            <!-- Book Card  -->
            @foreach ($data as $book)
            <a href="/buku/{{ $book->id }}" class="bg-white shadow-lg p-6 rounded-lg w-64" data-aos="fade-up">
                <img src="{{ asset('storage/'.$book->image ) }}" class="aspect-[3/4] " alt="{{ $book->judul }}"
                    class="w-full h-60 object-cover rounded mb-4">
                <h3 class="text-xl font-semibold text-gray-800 truncate">{{ $book->judul }}</h3>
                <p class="text-gray-600 mt-2">Kategori: {{ $book->kategori }}</p>
                <p class="text-gray-600 mt-2">Tahun Terbit: {{ $book->tahun }}</p>
            </a>
            @endforeach
            

            <!-- More Book Cards as needed -->
        </div>
    </section>

@endsection

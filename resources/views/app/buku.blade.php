 @extends('template.main')
@section('content')
    

 <!-- Book Detail Section -->
    <section class="container mx-auto md:px-32 p-4 py-12">
        <div class="flex flex-col md:flex-row justify-between items-start">
            <!-- Book Image -->
            <div class="aspect-[3/4]" >
                <div class="w-full h-[500px] flex items-center justify-center bg-gray-200 rounded-lg">
                    <img src="{{ asset('storage/'.$data->image) }}" alt="{{ $data->judul }}"
                        class="object-cover object-center h-full w-full rounded-lg shadow">
                </div>
            </div>

            <!-- Book Info -->
            <div class="w-full md:w-1/2 md:pl-10 mt-10 md:mt-0" >
                <h2 class="text-3xl font-semibold text-gray-800">{{ $data->judul }}</h2>
                <p class="text-gray-600 mt-4">Penulis: {{ $data->penulis }}</p>
                <p class="text-gray-600 mt-2">Kategori: {{ $data->kategori }}</p>
                <p class="text-gray-600 mt-2">Tahun Terbit: {{ $data->tahun }}</p>
                <p class="text-gray-600 mt-2">Harga Buku:Rp.{{ number_format($data->harga, 0, ',', '.') }}</p>
                <p @class([ 'mt-2','text-red-300 font-semibold' => $data->isbn === 'Dalam Proses','text-gray-600' => $data->isbn !== 'Dalam Proses'])>
                    ISBN: {{ $data->isbn }}
                </p>

                <!-- Book Description -->
                <div class="mt-6">
                    <h3 class="text-xl font-semibold text-gray-800">Deskripsi Buku</h3>
                    <p id="description" class="text-gray-600 hidden-content">
                        {{ $data->deskripsi }}
                    </p>
                    <button id="moreButton" class="mt-4 text-green-600">Selengkapnya</button>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-wrap space-x-4 mt-8">
                    <button class="bg-green-600 text-white py-2 px-6 rounded hover:bg-green-500 shadow">
                        Beli Buku
                    </button>
                    {{-- <button class="bg-gray-300 text-gray-700 py-2 px-6 rounded hover:bg-gray-400 shadow">
                        Tambahkan ke Wishlist
                    </button> --}}
                </div>
            </div>
        </div>

        <!-- Recommended Books Section (Scrollable) -->
        <div class="mt-16  " data-aos="fade-up">
            <h3 class="text-2xl font-semibold text-gray-800">Rekomendasi Buku Lainnya</h3>
            <div class="flex space-x-4 overflow-x-scroll overflow-y-hidden  gap-4  scrol snap-x">
                <!-- Book List -->
        <div class="mt-10 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Book Card  -->
            @foreach ($rek as $book)
            <a href="/buku/{{ $book->id }}" class="bg-white shadow-lg p-6 rounded-lg  w-64" data-aos="fade-up">
                <img class="aspect-[3/4]" src="{{ asset('storage/'.$book->image ) }}" alt="{{ $book->judul }}"
                    class="w-full h-60 object-cover rounded mb-4">
                <h3 class="text-xl font-semibold text-gray-800 truncate">{{ $book->judul }}</h3>
                <p class="text-gray-600 mt-2">Kategori: {{ $book->kategori }}</p>
                <p class="text-gray-600 mt-2">Tahun Terbit: {{ $book->tahun }}</p>
            </a>
            @endforeach
            

            <!-- More Book Cards as needed -->
        </div>
                <!-- Tambah lebih banyak card sesuai kebutuhan -->
            </div>
        </div>
    </section>
    <script>
        // Show more/less description toggle
        const moreButton = document.getElementById('moreButton');
        const description = document.getElementById('description');

        moreButton.addEventListener('click', function () {
            if (description.classList.contains('hidden-content')) {
                description.classList.remove('hidden-content');
                description.classList.add('show-content');
                moreButton.textContent = 'Tutup';
            } else {
                description.classList.remove('show-content');
                description.classList.add('hidden-content');
                moreButton.textContent = 'Selengkapnya';
            }
        });
    </script>
    @endsection
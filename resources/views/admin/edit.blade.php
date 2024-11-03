<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Style for the dropdown suggestions */
        .dropdown {
            position: relative;
        }

        .dropdown-menu {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            z-index: 10;
            background-color: white;
            border: 1px solid #e2e8f0;
            border-radius: 0.375rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-height: 150px;
            overflow-y: auto;
        }

        .dropdown-item {
            padding: 0.5rem;
            cursor: pointer;
        }

        .dropdown-item:hover {
            background-color: #edf2f7;
        }
    </style>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-3xl">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit Buku Baru</h1>

        <form action="/update/{{ $data->id }}" method="POST" enctype="multipart/form-data" class="space-y-4">
          @csrf
            <!-- Judul Buku -->
            <div>
                <label for="judul" class="block text-sm font-medium text-gray-700">Judul Buku</label>
                <input value="{{ $data->judul }}" type="text" id="judul" name="judul"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    placeholder="Masukkan judul buku" required>
                    @error('judul')
                        <p class="text-sm font-sm text-red-700">
                          *{{ $message }}
                        </p>
                    @enderror
            </div>

            <!-- ISBN -->
            <div>
                <label for="isbn" class="block text-sm font-medium text-gray-700">ISBN</label>
                <input 
                value="{{ $data->isbn }}"
                type="text" id="isbn" name="isbn" 
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    placeholder="Masukkan ISBN" required>
                    @error('isbn')
                        <p class="text-sm font-sm text-red-700">
                          *{{ $message }}
                        </p>
                    @enderror
            </div>

            <!-- Deskripsi -->
            <div>
                <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea  id="deskripsi" name="deskripsi" rows="4"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    placeholder="Tulis deskripsi buku" required>{{ $data->deskripsi }}</textarea>
                    @error('deskripsi')
                        <p class="text-sm font-sm text-red-700">
                          *{{ $message }}
                        </p>
                    @enderror
            </div>

            <!-- Penulis -->
            <div>
                <label for="penulis" class="block text-sm font-medium text-gray-700">Penulis</label>
                <input value="{{ $data->penulis }}" type="text" id="penulis" name="penulis"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    placeholder="Nama penulis buku" required>
                    @error('penulis')
                        <p class="text-sm font-sm text-red-700">
                          *{{ $message }}
                        </p>
                    @enderror
            </div>

            <!-- Harga -->
            <div>
                <label for="harga" class="block text-sm font-medium text-gray-700">Harga (Rp)</label>
                <input value="{{ $data->harga }}" type="number" id="harga" name="harga"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    placeholder="Masukkan harga buku" required>
                    @error('harga')
                        <p class="text-sm font-sm text-red-700">
                          *{{ $message }}
                        </p>
                    @enderror
            </div>

            <!-- Tahun Terbit -->
            <div>
                <label for="tahun_terbit" class="block text-sm font-medium text-gray-700">Tahun Terbit</label>
                <input value="{{ $data->tahun }}" type="number" id="tahun_terbit" name="tahun"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    placeholder="Masukkan tahun terbit" required>
                    @error('tahun')
                        <p class="text-sm font-sm text-red-700">
                          *{{ $message }}
                        </p>
                    @enderror
            </div>

            <!-- Kategori -->
            <div class="dropdown">
                <label for="kategori" class="block text-sm font-medium text-gray-700">Kategori</label>
                <input value="{{ $data->kategori }}" type="text" id="kategori" name="kategori"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    placeholder="Pilih atau ketik kategori" oninput="filterKategori()" autocomplete="off" required>
                    @error('kategori')
                        <p class="text-sm font-sm text-red-700">
                          *{{ $message }}
                        </p>
                    @enderror

                <!-- Dropdown suggestions -->
                <div id="kategori-dropdown" class="dropdown-menu hidden"></div>
            </div>

            <!-- Upload Cover Buku -->
            <div>
                <label for="upload" class="block text-sm font-medium text-gray-700">Upload Cover Buku</label>
                <input type="hidden" name="oldImage" value="{{ $data->image }}">
                <input value="{{ old('image') }}" type="file" name="image" id="imageUpload" accept="image/*"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    >
                    <img class="hidden aspect-[3/4] w-[200px] mx-auto my-8" id="imagePreview" alt="Image Preview">
                    @error('image')
                        <p class="text-sm font-sm text-red-700">
                          *{{ $message }}
                        </p>
                    @enderror
            </div>

            <!-- Submit Button -->
            <div class="flex justify-between">
                <a href="{{ route('admin') }}"
                    class="px-6 py-2 bg-red-600 text-white font-medium rounded-lg hover:bg-red-700 focus:ring-4 focus:ring-indigo-300 transition">
                    Kembali
                </a>
                <button type="submit"
                    class="px-6 py-2 bg-indigo-600 text-white font-medium rounded-lg hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-300 transition">Update
                    Buku</button>
            </div>
        </form>
    </div>
   

    <script>
        document.getElementById('imageUpload').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('imagePreview');

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };

                reader.readAsDataURL(file);
            }
        });

        // Array of category suggestions
        const kategoriSuggestions = [
           @foreach ($kategori as $item)
           "{{ $item->kategori }}",
          @endforeach
        ];

        // Filter categories based on user input
        function filterKategori() {
            const input = document.getElementById('kategori').value.toLowerCase();
            const dropdown = document.getElementById('kategori-dropdown');

            // Clear previous dropdown items
            dropdown.innerHTML = '';

            // Filter suggestions based on input
            const filtered = kategoriSuggestions.filter(kat => kat.toLowerCase().startsWith(input));

            // Display suggestions
            if (filtered.length > 0 && input !== '') {
                dropdown.classList.remove('hidden');
                filtered.forEach(kat => {
                    const item = document.createElement('div');
                    item.classList.add('dropdown-item');
                    item.textContent = kat;
                    item.onclick = () => selectKategori(kat);
                    dropdown.appendChild(item);
                });
            } else {
                dropdown.classList.add('hidden');
            }
        }

        // Select category from dropdown
        function selectKategori(kategori) {
            document.getElementById('kategori').value = kategori;
            document.getElementById('kategori-dropdown').classList.add('hidden');
        }

        // Close dropdown if clicked outside
        document.addEventListener('click', function (event) {
            const dropdown = document.getElementById('kategori-dropdown');
            if (!event.target.closest('.dropdown')) {
                dropdown.classList.add('hidden');
            }
        });
    </script>
</body>

</html>
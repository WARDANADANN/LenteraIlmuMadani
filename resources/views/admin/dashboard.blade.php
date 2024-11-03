@extends('admin.template.admin')
        <!-- Main Content -->
        @section('content')
        @if (session('success'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: "{{ session('success') }}",
                        showConfirmButton: false,
                        timer: 1500
                    });
                });
            </script>
        @endif
        <div class="flex-1 p-6">
            <!-- Stats Section -->
            <section id="stats" class="bg-white shadow-md rounded-lg p-6 mb-24">
                <h2 class="text-2xl font-bold mb-4">Statistik Kunjungan</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-blue-100 p-4 rounded-md text-center">
                        <p class="text-lg font-semibold">Pengunjung Hari Ini</p>
                        <p class="text-2xl font-bold text-blue-600">120</p>
                    </div>
                    <div class="bg-green-100 p-4 rounded-md text-center">
                        <p class="text-lg font-semibold">Pengunjung Bulan Ini</p>
                        <p class="text-2xl font-bold text-green-600">3,500</p>
                    </div>
                    <div class="bg-red-100 p-4 rounded-md text-center">
                        <p class="text-lg font-semibold">Pengunjung Tahun Ini</p>
                        <p class="text-2xl font-bold text-red-600">42,000</p>
                    </div>
                </div>
            </section>

            <!-- Table Book Section -->
            <div class="overflow-x-auto mb-24">
                <table class=" min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                    <thead>
                        <tr class="bg-gray-800 text-white text-left">
                            <th class="py-3 px-6">No</th>
                            <th class="py-3 px-6">Judul</th>
                            <th class="py-3 px-6">Penulis</th>
                            <th class="py-3 px-6">ISBN</th>
                            <th class="py-3 px-6">Tahun</th>
                            <th class="py-3 px-6">Kategori</th>
                            <th class="py-3 px-6">Harga</th>
                            <th class="py-3 px-6 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 0;
                        @endphp
                        @foreach ($data as $book)
                        @php
                            $no ++;
                        @endphp
                        <tr class="border-b">
                            <td class="py-4 px-6">{{ $no }}</td>
                            <td class="py-4 px-6">{{ $book->judul }}</td>
                            <td class="py-4 px-6">{{ $book->penulis }}</td>
                            <td class="py-4 px-6">{{ $book->isbn }}</td>
                            <td class="py-4 px-6">{{ $book->tahun }}</td>
                            <td class="py-4 px-6">{{ $book->kategori }}</td>
                            <td class="py-4 px-6">Rp {{ $book->harga }}</td>
                            <td class="py-4 px-6 text-center">
                                <div class="flex items-center justify-center space-x-4">
                                    <!-- Edit Button (Pencil) -->
                                    <a href="/edit/{{ $book->id }}" class="text-blue-500 hover:text-blue-700" title="Edit">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24">
                                            <path fill="#419608"
                                                d="m7 14.94l6.06-6.06l2.06 2.06L9.06 17H7zM12 20a8 8 0 0 0 8-8a8 8 0 0 0-8-8a8 8 0 0 0-8 8a8 8 0 0 0 8 8m4.7-10.65l-1 1l-2.05-2.05l1-1c.21-.22.56-.22.77 0l1.28 1.28c.22.21.22.56 0 .77M12 2a10 10 0 0 1 10 10a10 10 0 0 1-10 10A10 10 0 0 1 2 12A10 10 0 0 1 12 2" />
                                        </svg>
                                    </a>
                                    <!-- View Button (Eye) -->
                                    <button onclick="showImage('{{ asset('storage/'.$book->image) }}'); return false;" class="text-green-500 hover:text-green-700" title="Lihat">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="27" height="24"
                                            viewBox="0 0 576 512">
                                            <path fill="#f0b470"
                                                d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32M144 256a144 144 0 1 1 288 0a144 144 0 1 1-288 0m144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3" />
                                        </svg>
                                    </button>
                                    <!-- Delete Button (Rubbish) -->
                                    <a href="javascript:void(0)" onclick="confirmDelete({{ $book->id }})" class="text-red-500 hover:text-red-700" title="Hapus">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24">
                                            <path fill="#ff7070"
                                                d="M12 2a10 10 0 0 1 10 10a10 10 0 0 1-10 10A10 10 0 0 1 2 12A10 10 0 0 1 12 2m0 2a8 8 0 0 0-8 8a8 8 0 0 0 8 8a8 8 0 0 0 8-8a8 8 0 0 0-8-8m4 6v7a1 1 0 0 1-1 1H9a1 1 0 0 1-1-1v-7zm-2.5-4l1 1H17v2H7V7h2.5l1-1z" />
                                        </svg>
                                    </a>
                                    <!-- Share Button -->
                                    <button onclick="copyLinkToClipboard('{{ route('index') }}/buku/{{ $book->id }}')" class="text-purple-500 hover:text-purple-700" title="salin link">
                                        <input type="text" id="hiddenLink" value="{{ route('index') }}/buku/{{ $book->id }}" class="hidden">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 56 56">
                                            <path fill="#009dff"
                                                d="M28 51.906c13.055 0 23.906-10.828 23.906-23.906c0-13.055-10.875-23.906-23.93-23.906C14.899 4.094 4.095 14.945 4.095 28c0 13.078 10.828 23.906 23.906 23.906m0-3.984C16.937 47.922 8.1 39.062 8.1 28c0-11.04 8.813-19.922 19.876-19.922c11.039 0 19.921 8.883 19.945 19.922c.023 11.063-8.883 19.922-19.922 19.922m10.078-30.469c-2.789-2.765-6.258-2.531-9.492.703l-3.328 3.328c-3.305 3.282-3.586 6.774-.774 9.563c.774.797 1.64 1.312 2.274 1.43c.633-.446 1.383-1.266 1.71-2.016q-1.51-.246-2.32-1.055c-1.734-1.758-1.476-4.078.82-6.328l3.212-3.234c2.18-2.18 4.5-2.438 6.234-.703c1.758 1.734 1.547 4.054-.68 6.234l-2.32 2.297c.352.844.375 2.133.023 3.234l3.985-3.937c3.21-3.258 3.469-6.703.656-9.516m-21 21.047c2.79 2.766 6.258 2.531 9.492-.703l3.328-3.328c3.305-3.282 3.586-6.774.774-9.563c-.774-.797-1.64-1.312-2.274-1.43c-.633.446-1.383 1.266-1.71 2.016q1.51.246 2.32 1.055c1.734 1.758 1.476 4.055-.82 6.305l-3.211 3.257c-2.18 2.18-4.5 2.438-6.235.703c-1.758-1.734-1.547-4.054.68-6.234l2.32-2.297c-.352-.867-.375-2.133-.023-3.234l-3.985 3.937c-3.21 3.258-3.469 6.703-.656 9.516" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        <!-- Tambahkan lebih banyak baris data jika diperlukan -->
                        <script>
                            function showImage(imageSrc) {
                                Swal.fire({
                                    imageUrl: imageSrc,
                                    imageAlt: 'Image preview',
                                    showCloseButton: true,
                                    showConfirmButton: false,
                                    width: '200px',
                                    aspect: '3/4'
                                });
                            }
                            function confirmDelete(bookId) {
                                    Swal.fire({
                                        title: 'Apakah kamu yakin?',
                                        text: "Kamu tidak akan bisa mengembalikannya!",
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        cancelButtonText: 'Batal',
                                        confirmButtonText: 'Ya, tetap hapus!'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.href = `/delete/${bookId}`;
                                        }
                                    })
                                }
                                function copyLinkToClipboard(bookLink) {
                                    // Salin link ke clipboard
                                    navigator.clipboard.writeText(bookLink).then(function() {
                                        // Tampilkan SweetAlert ketika berhasil menyalin
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Berhasil!',
                                            text: 'Link berhasil disalin ke clipboard.',
                                            showConfirmButton: false,
                                            timer: 1500
                                        });
                                    }, function() {
                                        // Tampilkan pesan error jika gagal menyalin
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Oops...',
                                            text: 'Gagal menyalin link.',
                                        });
                                    });
                                }
                        </script>
                    </tbody>
                </table>
            </div>
        </div>
        @endsection
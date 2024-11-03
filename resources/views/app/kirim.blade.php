<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kirim Naskah</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex items-center justify-center">
        
        <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-lg">
            <a href="{{ route('index') }}" class="w-full  bg-red-500 text-white py-2 px-4 rounded-md shadow-md hover:bg-red-600 focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">
                    X
                </a>
            <h2 class="text-2xl font-semibold mb-4 text-center">Kirim Naskah</h2>
            
            <form action="/submitNaskah" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <!-- Nama Penulis -->
                <div>
                    <label for="nama-penulis" class="block text-sm font-medium text-gray-700">Nama Penulis</label>
                    <input type="text" id="nama-penulis" name="nama_penulis" placeholder="Nama lengkap" class="mt-1  p-2 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" placeholder="Email" class="mt-1  p-2 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                </div>

                <!-- Judul Naskah -->
                <div>
                    <label for="judul-naskah" class="block text-sm font-medium text-gray-700">Judul Naskah</label>
                    <input type="text" id="judul-naskah" name="judul_naskah" placeholder="Judul naskah" class="mt-1  p-2 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                </div>

                <!-- Deskripsi Naskah -->
                <div>
                    <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi Naskah</label>
                    <textarea id="deskripsi" name="deskripsi" rows="4" placeholder="Deskripsi singkat tentang naskah" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required></textarea>
                </div>

                <!-- Upload Naskah -->
                <div>
                    <label for="file-naskah" class="block text-sm font-medium text-gray-700">Upload Naskah (PDF/DOCX)</label>
                    <input type="file" id="file-naskah" name="file_naskah" accept=".pdf,.doc,.docx" class="mt-1 block w-full text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-md shadow-md hover:bg-blue-600 focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                        Kirim Naskah
                    </button>
                </div>
                
            </form>
            
        </div>
    </div>
</body>
</html>

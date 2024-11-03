@extends('template.main')
@section('content')
    

    <!-- Hero Section -->
    <section class="bg-cover bg-center h-96"
        style="background-image: url('image/hero.jpg');">
        <div class="flex items-center justify-center h-full bg-green-800 bg-opacity-50" >
            <div class="text-center text-white">
                <h1 class="text-4xl font-bold">Selamat Datang di Lentera Ilmu Madani</h1>
                <p class="mt-4">Penerbit buku termurah dengan kualitas terbaik.</p>
                <a href="#profile"
                    class="mt-6 inline-block bg-green-800 text-white py-2 px-4 rounded hover:bg-green-900">Pelajari Lebih
                    Lanjut</a>
            </div>
        </div>
    </section>

    <!-- Profile Section -->
    <section id="profile" class="bg-white py-12 md:px-28">
      <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold text-gray-800 mb-6">Tentang Lentera Ilmu Madani</h2>
        <p class="text-gray-600 mb-8">
          Lentera Ilmu Madani adalah penerbit buku yang menyediakan layanan penerbitan termurah dengan kualitas terbaik. 
          Kami berdedikasi untuk memberikan hasil terbaik bagi penulis dengan tetap menjaga biaya yang terjangkau, sehingga 
          karya Anda dapat menjangkau lebih banyak pembaca.
        </p>
        
        <!-- Profile Image -->
        <div class="mb-8">
          <img src="image/logo.png" alt="Lentera Ilmu Madani" class="mx-auto rounded-lg shadow-lg">
        </div>
        
        <!-- Features -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          <!-- Feature 1 -->
          <div class="bg-green-50 p-6 rounded-lg shadow-md">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">Penerbitan Terjangkau</h3>
            <p class="text-gray-600">Kami menawarkan layanan penerbitan dengan harga paling kompetitif di industri, tanpa mengurangi kualitas.</p>
          </div>
          
          <!-- Feature 2 -->
          <div class="bg-green-50 p-6 rounded-lg shadow-md">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">Kualitas Buku Terbaik</h3>
            <p class="text-gray-600">Dengan tim ahli yang berpengalaman, kami menjamin setiap buku yang diterbitkan memiliki kualitas tertinggi.</p>
          </div>
          
          <!-- Feature 3 -->
          <div class="bg-green-50 p-6 rounded-lg shadow-md">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">Pelayanan Cepat & Ramah</h3>
            <p class="text-gray-600">Kami selalu siap membantu dan memberikan pelayanan cepat serta ramah untuk setiap penulis yang bekerja sama dengan kami.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Layanan Section -->
    <section id="layanan" class="bg-green-50 py-12 md:px-28">
      <div class="container mx-auto px-4 text-center">
          <h2 class="text-3xl font-bold text-gray-800 mb-6">Layanan Kami</h2>
          <p class="text-gray-600 mb-12">Kami menawarkan berbagai layanan yang dapat membantu Anda dalam perjalanan penerbitan dan desain buku.</p>

          <!-- Layanan Cards -->
          <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
              <!-- Layanan 1: Penerbitan Buku -->
              <div class="bg-white shadow-lg rounded-lg p-6 hover:shadow-xl transition-shadow duration-300">
                  <div class="mb-4">
                      {{-- <img src="https://via.placeholder.com/100" alt="Penerbitan Buku" class="mx-auto h-20 w-20"> --}}
                  </div>
                  <h3 class="text-xl font-semibold text-gray-800 mb-2">Penerbitan Buku</h3>
                  <p class="text-gray-600">Layanan penerbitan kami memastikan karya Anda diterbitkan dengan kualitas terbaik dan harga terjangkau.</p>
              </div>

              <!-- Layanan 2: Jasa Desain Sampul -->
              <div class="bg-white shadow-lg rounded-lg p-6 hover:shadow-xl transition-shadow duration-300">
                  <div class="mb-4">
                      {{-- <img src="https://via.placeholder.com/100" alt="Jasa Desain Sampul" class="mx-auto h-20 w-20"> --}}
                  </div>
                  <h3 class="text-xl font-semibold text-gray-800 mb-2">Jasa Desain Sampul</h3>
                  <p class="text-gray-600">Desain sampul yang menarik dapat membuat buku Anda lebih menonjol dan profesional di mata pembaca.</p>
              </div>

              <!-- Layanan 3: Pembelian Buku -->
              <div class="bg-white shadow-lg rounded-lg p-6 hover:shadow-xl transition-shadow duration-300">
                  <div class="mb-4">
                      {{-- <img src="https://via.placeholder.com/100" alt="Pembelian Buku" class="mx-auto h-20 w-20"> --}}
                  </div>
                  <h3 class="text-xl font-semibold text-gray-800 mb-2">Pembelian Buku</h3>
                  <p class="text-gray-600">Dapatkan buku-buku berkualitas dari berbagai penulis yang telah kami terbitkan dengan mudah dan cepat.</p>
              </div>
          </div>
      </div>
    </section>

  <!-- Buku terbit Section -->
  <section class="bg-white py-12 md:px-32">
      <div class="container mx-auto px-4 ">
          <h2 class="text-3xl font-bold text-gray-800 text-center mb-8">Buku yang telah terbit</h2>

               <!-- Book List -->
        <div class="mt-10 grid grid-cols-1 sm:grid-cols-1 lg:grid-cols-4 gap-8">
            <!-- Book Card  -->
            @foreach ($data as $book)
            <a href="/buku/{{ $book->id }}" class="bg-white shadow-lg p-6 rounded-lg  md:w-64 w-full " data-aos="fade-up">
                <img class="aspect-[3/4]" src="{{ asset('storage/'.$book->image ) }}" alt="{{ $book->judul }}"
                    class="w-full h-60 object-cover rounded mb-4">
                <h3 class="text-xl font-semibold text-gray-800 truncate">{{ $book->judul }}</h3>
                <p class="text-gray-600 mt-2">Kategori: {{ $book->kategori }}</p>
                <p class="text-gray-600 mt-2">Tahun Terbit: {{ $book->tahun }}</p>
            </a>
            @endforeach
          </div>
      </div>
  </section>

  <!-- CTA Section -->
  <section class="bg-cover bg-center" style="background-image: url('image/cta.jpg');">
      <div class="container mx-auto px-4 py-12 text-center h-full bg-green-900  bg-opacity-50">
          <h2 class="text-3xl font-bold text-white mb-4">Kirim Naskah Anda dan Wujudkan Impian Menjadi Penulis</h2>
          <p class="text-white mb-8">
              Apakah Anda memiliki karya yang ingin diterbitkan? Jangan ragu lagi! Kirim naskah Anda sekarang dan kami akan membantu Anda menerbitkannya dengan kualitas terbaik.
          </p>

          <a href="{{ route('kirim') }}" class="bg-white text-green-600 font-semibold py-3 px-8 rounded-full shadow-lg hover:bg-green-50 transition-colors duration-300">
              Kirim Naskah Sekarang
          </a>
      </div>
  </section>
      @endsection
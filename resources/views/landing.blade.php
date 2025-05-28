@extends('header')

<style>
.containerberanda {
  width: 100%;
  height: 100%;
  --color: #E1E1E1;
  background-color: #ffffff;
  background-image: linear-gradient(0deg, transparent 24%, var(--color) 25%, var(--color) 26%, transparent 27%,transparent 74%, var(--color) 75%, var(--color) 76%, transparent 77%,transparent),
      linear-gradient(90deg, transparent 24%, var(--color) 25%, var(--color) 26%, transparent 27%,transparent 74%, var(--color) 75%, var(--color) 76%, transparent 77%,transparent);
  background-size: 55px 55px;
}

.containerfitur {
  width: 100%;
  height: 100%;
  /* Add your background pattern here */
  background-color: #ffffff;
  background-image: radial-gradient(rgba(12, 12, 12, 0.171) 2px, transparent 0);
  background-size: 30px 30px;
  background-position: -5px -5px;
}

.containertentang {
  width: 100%;
  height: 100%;
  --color: #E1E1E1;
  background-color: #ffffff;
  background-image: linear-gradient(0deg, transparent 24%, var(--color) 25%, var(--color) 26%, transparent 27%,transparent 74%, var(--color) 75%, var(--color) 76%, transparent 77%,transparent),
      linear-gradient(90deg, transparent 24%, var(--color) 25%, var(--color) 26%, transparent 27%,transparent 74%, var(--color) 75%, var(--color) 76%, transparent 77%,transparent);
  background-size: 55px 55px;
}

.containerkontak {
  width: 100%;
  height: 100%;
  /* Add your background pattern here */
  background-color: #ffffff;
  background-image: radial-gradient(rgba(12, 12, 12, 0.171) 2px, transparent 0);
  background-size: 30px 30px;
  background-position: -5px -5px;
}
</style>

<!-- Add Font Awesome CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<!-- Hero Section with enhanced animation -->
<section id="beranda" class=" containerberanda min-h-screen flex items-center justify-center text-center pt-36 bg-gradient-to-br from-blue-50 to-blue-100 relative overflow-hidden">
  <!-- Animated background elements -->
<!-- Tambahkan ini di <head> -->
<script src="https://unpkg.com/lucide@latest"></script>

<!-- Container Ikon Peralatan -->
<!-- Background Ikon Peralatan -->
<div class="absolute top-0 left-0 w-full h-full overflow-hidden mt-10 z-0">
  <!-- Icon 1 -->
  <div class="absolute top-16 left-8 text-blue-600 opacity-20 rotate-[8deg]" data-aos="fade-down-right" data-aos-delay="100">
    <i class="fas fa-wrench w-10 h-10"></i></div>
  <!-- Icon 2 -->
  <div class="absolute bottom-36 right-20 text-blue-600 opacity-25 rotate-[12deg]" data-aos="fade-up-left" data-aos-delay="250">
    <i class="fas fa-hammer w-12 h-12"></i></div>
  <!-- Icon 3 -->
  <div class="absolute bottom-[28%] left-[12%] text-blue-600 opacity-20 -rotate-[10deg]" data-aos="zoom-in-up" data-aos-delay="300">
    <i class="fas fa-tools w-10 h-10"></i></div>
  <!-- Icon 4 -->
  <div class="absolute top-[18%] right-[14%] text-blue-600 opacity-30 rotate-[4deg]" data-aos="fade-down-left" data-aos-delay="150">
    <i class="fas fa-wrench w-11 h-11"></i></div>
  <!-- Icon 5 -->
  <div class="absolute top-[40%] left-[5%] text-blue-600 opacity-35 -rotate-[20deg]" data-aos="flip-left" data-aos-delay="450">
    <i class="fas fa-tools w-9 h-9"></i></div>
  <!-- Icon 6 -->
  <div class="absolute top-[65%] left-[22%] text-blue-600 opacity-10 rotate-[15deg]" data-aos="fade-up" data-aos-delay="600">
    <i class="fas fa-wrench w-8 h-8"></i></div>
  <!-- Icon 7 -->
  <div class="absolute top-[8%] right-[8%] text-blue-600 opacity-25 rotate-[18deg]" data-aos="fade-down" data-aos-delay="350">
    <i class="fas fa-tools w-10 h-10"></i></div>

</div>  
  <div class="px-6 relative z-10">
    <h2 class="text-4xl md:text-6xl font-extrabold text-blue-700 mb-6" 
        data-aos="fade-down" 
        data-aos-delay="100"
        data-aos-easing="ease-out-cubic">
      Aplikasi Sarana dan Prasarana Sekolah
    </h2>
    <p class="text-lg md:text-xl text-gray-700 mb-10 max-w-2xl mx-auto leading-relaxed"
       data-aos="fade-up"
       data-aos-delay="300">
      Membantu sekolah dalam mengelola aset, peminjaman barang, dan ruangan secara efisien dan digital dengan solusi terintegrasi.
    </p>
    <div class="flex flex-col sm:flex-row justify-center gap-4"
         data-aos="zoom-in"
         data-aos-delay="500">
      <a href="{{ route('barang.user') }}" 
         class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-4 rounded-lg transition-all duration-300 transform hover:-translate-y-1 shadow-lg hover:shadow-xl">
        <span class="flex items-center justify-center gap-2">
          <i class="fas fa-box-open"></i>
          Barang
        </span>
      </a>
      <a href="{{ route('ruangan.user') }}" 
         class="bg-white hover:bg-gray-100 text-blue-600 px-8 py-4 rounded-lg transition-all duration-300 transform hover:-translate-y-1 shadow-lg hover:shadow-xl border border-blue-200">
        <span class="flex items-center justify-center gap-2">
          <i class="fas fa-door-open"></i>
          Ruangan
        </span>
      </a>
    </div>
    
    <!-- Scroll indicator -->
    <div class="mt-20 animate-bounce" data-aos="fade-up" data-aos-delay="800">
      <a href="#fitur" class="text-blue-500 hover:text-blue-700">
        <i class="fas fa-chevron-down h-8 w-8 mx-auto"></i>
      </a>
    </div>
  </div>
</section>

<!-- Features Section with staggered animations -->
<section id="fitur" class="py-28 bg-white containerfitur">
  <div class="max-w-7xl mx-auto px-6 text-center">
    <div class="mb-16" data-aos="fade-down">
      <h3 class="text-3xl md:text-4xl font-bold mb-4 text-gray-800">Fitur Unggulan</h3>
      <div class="w-20 h-1 bg-blue-500 mx-auto"></div>
    </div>
    
    <div class="grid md:grid-cols-3 gap-8">
      <!-- Card 1 -->
      <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border border-blue-50"
           data-aos="fade-right" 
           data-aos-delay="100" 
           data-aos-duration="800"
           data-aos-anchor-placement="top-bottom">
        <div class="bg-blue-100 w-16 h-16 mx-auto rounded-full flex items-center justify-center mb-6">
          <i class="fas fa-boxes text-blue-600 text-2xl"></i>
        </div>
        <h4 class="text-xl font-semibold mb-3 text-gray-800">Manajemen Barang</h4>
        <p class="text-gray-600 leading-relaxed">Mencatat, menambah, dan memonitor barang-barang inventaris sekolah secara real time dengan antarmuka yang intuitif.</p>
      </div>

      <!-- Card 2 -->
      <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border border-blue-50"
           data-aos="fade-up" 
           data-aos-delay="300" 
           data-aos-duration="800"
           data-aos-anchor-placement="top-bottom">
        <div class="bg-blue-100 w-16 h-16 mx-auto rounded-full flex items-center justify-center mb-6">
          <i class="fas fa-door-open text-blue-600 text-2xl"></i>
        </div>
        <h4 class="text-xl font-semibold mb-3 text-gray-800">Peminjaman Ruangan</h4>
        <p class="text-gray-600 leading-relaxed">Memesan ruangan sekolah dengan sistem jadwal yang rapi dan notifikasi otomatis untuk menghindari bentrokan waktu.</p>
      </div>

      <!-- Card 3 -->
      <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border border-blue-50"
           data-aos="fade-left" 
           data-aos-delay="500" 
           data-aos-duration="800"
           data-aos-anchor-placement="top-bottom">
        <div class="bg-blue-100 w-16 h-16 mx-auto rounded-full flex items-center justify-center mb-6">
          <i class="fas fa-chart-line text-blue-600 text-2xl"></i>
        </div>
        <h4 class="text-xl font-semibold mb-3 text-gray-800">Laporan & Histori</h4>
        <p class="text-gray-600 leading-relaxed">Melihat rekap peminjaman serta riwayat aktivitas pengguna dengan grafik interaktif dan ekspor data.</p>
      </div>
    </div>
  </div>
</section>

<!-- About Section with parallax effect -->
<section id="tentang" class="py-24 bg-gray-100 relative overflow-hidden containertentang">
  <div class="absolute inset-0 bg-blue-500 opacity-5"></div>
  <div class="max-w-5xl mx-auto px-6 text-center relative z-10">
    <h3 class="text-3xl md:text-4xl font-bold mb-8 text-gray-800"
        data-aos="fade-down"
        data-aos-delay="100">
      Tentang Aplikasi
    </h3>
    <div class="bg-white p-8 rounded-xl shadow-lg inline-block max-w-3xl"
         data-aos="zoom-in"
         data-aos-delay="300">
      <p class="text-gray-700 text-lg leading-relaxed mb-6">
        Aplikasi Sarpras ini dirancang untuk memudahkan sekolah dalam mengelola aset dan fasilitas secara digital. Dengan antarmuka yang user-friendly, sistem ini membantu staf sekolah menghemat waktu dan mengurangi kesalahan administrasi.
      </p>
      <div class="grid md:grid-cols-3 gap-6 mt-8">
        <div class="bg-blue-50 p-4 rounded-lg"
             data-aos="fade-up"
             data-aos-delay="400">
          <i class="fas fa-paint-brush text-blue-600 text-3xl mb-3"></i>
          <h4 class="font-semibold text-gray-800">Modern Design</h4>
          <p class="text-sm text-gray-600 mt-1">Antarmuka yang intuitif dan responsif</p>
        </div>
        <div class="bg-blue-50 p-4 rounded-lg"
             data-aos="fade-up"
             data-aos-delay="500">
          <i class="fas fa-lock text-blue-600 text-3xl mb-3"></i>
          <h4 class="font-semibold text-gray-800">Keamanan Data</h4>
          <p class="text-sm text-gray-600 mt-1">Proteksi data dengan sistem autentikasi</p>
        </div>
        <div class="bg-blue-50 p-4 rounded-lg"
             data-aos="fade-up"
             data-aos-delay="600">
          <i class="fas fa-code text-blue-600 text-3xl mb-3"></i>
          <h4 class="font-semibold text-gray-800">Teknologi</h4>
          <p class="text-sm text-gray-600 mt-1">Dibangun dengan Laravel & Tailwind CSS</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Contact Section with interactive elements -->
<section id="kontak" class="py-24 bg-white containerkontak">
  <div class="max-w-4xl mx-auto px-6">
    <div class="text-center mb-16"
         data-aos="fade-down">
      <h3 class="text-3xl md:text-4xl font-bold mb-4 text-gray-800">Hubungi Kami</h3>
      <p class="text-gray-600 max-w-2xl mx-auto">Punya pertanyaan atau ingin mengetahui lebih lanjut? Kami siap membantu Anda.</p>
    </div>
    
    <div class="grid md:grid-cols-2 gap-10 items-center">
      <!-- Biodata Developer 1 -->
      <!-- Biodata Developer 2 -->
      <div class="bg-white p-8 rounded-xl shadow-lg border border-blue-50 text-center"
          data-aos="fade-right"
          data-aos-delay="400">
        <div class="mb-6">
          <img src="{{ asset('profile/profile.JPG') }}" alt="Developer" class="w-50 h-auto rounded-full mx-auto mb-4 border-4 border-blue-100">
          <h4 class="text-xl font-bold text-gray-800">Muhammad Zufar</h4>
          <p class="text-blue-600 font-medium">Fullstack Web Developer</p>
        </div>
        
        <div class="space-y-4 text-left mb-6">
          <div class="flex items-center">
            <i class="fas fa-envelope text-gray-500 mr-3 w-5 h-5"></i>
            <span>zufarrasyidibrahim@gmail.com</span>
          </div>
          <div class="flex items-center">
            <i class="fas fa-phone text-gray-500 mr-3 w-5 h-5"></i>
            <span>+62 814-6380-8146</span>
          </div>
          <div class="flex items-center">
            <i class="fas fa-map-marker-alt text-gray-500 mr-3 w-5 h-5"></i>
            <span>Cimahi, Indonesia</span>
          </div>
        </div>
        
        <div class="flex justify-center space-x-4">
        <a href="https://jupjupar.my.id/" class="text-blue-600 hover:text-blue-800" target="_blank" rel="noopener noreferrer">
          <i class="fas fa-globe text-xl"></i>
        </a>
          <a href="https://www.instagram.com/jupjupar/" class="text-pink-600 hover:text-pink-800">
            <i class="fab fa-instagram text-xl"></i>
          </a>
          <a href="https://github.com/Vonhautten" class="text-gray-800 hover:text-gray-600">
            <i class="fab fa-github text-xl"></i>
          </a>
        </div>
      </div>
       <div class="bg-white p-8 rounded-xl shadow-lg border border-blue-50 text-center"
          data-aos="fade-left"
          data-aos-delay="400">
        <div class="mb-6">
          <img src="{{ asset('profile/profile.JPG') }}" alt="Developer" class="w-50 h-auto rounded-full mx-auto mb-4 border-4 border-blue-100">
          <h4 class="text-xl font-bold text-gray-800">Muhammad Rafi</h4>
          <p class="text-blue-600 font-medium">Fullstack Web Developer</p>
        </div>
        
        <div class="space-y-4 text-left mb-6">
          <div class="flex items-center">
            <i class="fas fa-envelope text-gray-500 mr-3 w-5 h-5"></i>
            <span>shidqikiwz@gmail.com</span>
          </div>
          <div class="flex items-center">
            <i class="fas fa-phone text-gray-500 mr-3 w-5 h-5"></i>
            <span>+62 895-6323-86000</span>
          </div>
          <div class="flex items-center">
            <i class="fas fa-map-marker-alt text-gray-500 mr-3 w-5 h-5"></i>
            <span>Bandung, Indonesia</span>
          </div>
        </div>
        
        <div class="flex justify-center space-x-4">
        <a href="https://shinki.my.id/" class="text-blue-600 hover:text-blue-800" target="_blank" rel="noopener noreferrer">
          <i class="fas fa-globe text-xl"></i>
        </a>
          <a href="https://www.instagram.com/sidkibertato/" class="text-pink-600 hover:text-pink-800">
            <i class="fab fa-instagram text-xl"></i>
          </a>
          <a href="https://github.com/rafishidqi" class="text-gray-800 hover:text-gray-600">
            <i class="fab fa-github text-xl"></i>
          </a>
        </div>
      </div>

    </div>
  </div>
</section>

@extends('footer')
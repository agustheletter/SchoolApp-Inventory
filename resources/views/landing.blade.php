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
    <i data-lucide="wrench" class="w-10 h-10"></i></div>
  <!-- Icon 2 -->
  <div class="absolute bottom-36 right-20 text-blue-600 opacity-25 rotate-[12deg]" data-aos="fade-up-left" data-aos-delay="250">
    <i data-lucide="hammer" class="w-12 h-12"></i></div>
  <!-- Icon 3 -->
  <div class="absolute bottom-[28%] left-[12%] text-blue-600 opacity-20 -rotate-[10deg]" data-aos="zoom-in-up" data-aos-delay="300">
    <i data-lucide="drill" class="w-10 h-10"></i></div>
  <!-- Icon 4 -->
  <div class="absolute top-[18%] right-[14%] text-blue-600 opacity-30 rotate-[4deg]" data-aos="fade-down-left" data-aos-delay="150">
    <i data-lucide="wrench" class="w-11 h-11"></i></div>
  <!-- Icon 5 -->
  <div class="absolute top-[40%] left-[5%] text-blue-600 opacity-35 -rotate-[20deg]" data-aos="flip-left" data-aos-delay="450">
    <i data-lucide="drill" class="w-9 h-9"></i></div>
  <!-- Icon 6 -->
  <div class="absolute top-[65%] left-[22%] text-blue-600 opacity-10 rotate-[15deg]" data-aos="fade-up" data-aos-delay="600">
    <i data-lucide="wrench" class="w-8 h-8"></i></div>
  <!-- Icon 7 -->
  <div class="absolute top-[8%] right-[8%] text-blue-600 opacity-25 rotate-[18deg]" data-aos="fade-down" data-aos-delay="350">
    <i data-lucide="drill" class="w-10 h-10"></i></div>

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
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
          </svg>
          Barang
        </span>
      </a>
      <a href="{{ route('ruangan.user') }}" 
         class="bg-white hover:bg-gray-100 text-blue-600 px-8 py-4 rounded-lg transition-all duration-300 transform hover:-translate-y-1 shadow-lg hover:shadow-xl border border-blue-200">
        <span class="flex items-center justify-center gap-2">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6z" />
          </svg>
          Ruangan
        </span>
      </a>
    </div>
    
    <!-- Scroll indicator -->
    <div class="mt-20 animate-bounce" data-aos="fade-up" data-aos-delay="800">
      <a href="#fitur" class="text-blue-500 hover:text-blue-700">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
        </svg>
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
          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
          </svg>
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
          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
          </svg>
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
          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
          </svg>
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
          <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mx-auto text-blue-600 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
          </svg>
          <h4 class="font-semibold text-gray-800">Modern Design</h4>
          <p class="text-sm text-gray-600 mt-1">Antarmuka yang intuitif dan responsif</p>
        </div>
        <div class="bg-blue-50 p-4 rounded-lg"
             data-aos="fade-up"
             data-aos-delay="500">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mx-auto text-blue-600 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
          </svg>
          <h4 class="font-semibold text-gray-800">Keamanan Data</h4>
          <p class="text-sm text-gray-600 mt-1">Proteksi data dengan sistem autentikasi</p>
        </div>
        <div class="bg-blue-50 p-4 rounded-lg"
             data-aos="fade-up"
             data-aos-delay="600">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mx-auto text-blue-600 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" />
          </svg>
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
          <img src="{{ asset('profile/profile.jpg') }}" alt="Developer" class="w-50 h-auto rounded-full mx-auto mb-4 border-4 border-blue-100">
          <h4 class="text-xl font-bold text-gray-800">Muhammad Zufar</h4>
          <p class="text-blue-600 font-medium">Fullstack Web Developer</p>
        </div>
        
        <div class="space-y-4 text-left mb-6">
          <div class="flex items-center">
            <svg class="w-5 h-5 text-gray-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
            </svg>
            <span>zufarrasyidibrahim@gmail.com</span>
          </div>
          <div class="flex items-center">
            <svg class="w-5 h-5 text-gray-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
            </svg>
            <span>+62 814-6380-8146</span>
          </div>
          <div class="flex items-center">
            <svg class="w-5 h-5 text-gray-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
            </svg>
            <span>Cimahi, Indonesia</span>
          </div>
        </div>
        
        <div class="flex justify-center space-x-4">
        <a href="https://jupjupar.my.id/" class="text-blue-600 hover:text-blue-800" target="_blank" rel="noopener noreferrer">
          <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M10.59 13.41a1 1 0 010-1.41L14.17 8a1 1 0 011.41 1.41l-3.58 3.59a1 1 0 01-1.41 0zM17 7h-2a1 1 0 110-2h2a4 4 0 010 8h-2a1 1 0 110-2h2a2 2 0 100-4zm-10 10h2a1 1 0 110 2H7a4 4 0 010-8h2a1 1 0 110 2H7a2 2 0 100 4zm1.41-1.41a1 1 0 010-1.41l3.58-3.59a1 1 0 011.41 1.41L9.83 16a1 1 0 01-1.42 0z"/>
          </svg>
        </a>
          <a href="https://www.instagram.com/jupjupar/" class="text-pink-600 hover:text-pink-800">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/>
            </svg>
          </a>
          <a href="https://github.com/Vonhautten" class="text-gray-800 hover:text-gray-600">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"/>
            </svg>
          </a>
        </div>
      </div>
       <div class="bg-white p-8 rounded-xl shadow-lg border border-blue-50 text-center"
          data-aos="fade-left"
          data-aos-delay="400">
        <div class="mb-6">
          <img src="{{ asset('profile/profile.jpg') }}" alt="Developer" class="w-50 h-auto rounded-full mx-auto mb-4 border-4 border-blue-100">
          <h4 class="text-xl font-bold text-gray-800">Muhammad Rafi</h4>
          <p class="text-blue-600 font-medium">Fullstack Web Developer</p>
        </div>
        
        <div class="space-y-4 text-left mb-6">
          <div class="flex items-center">
            <svg class="w-5 h-5 text-gray-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
            </svg>
            <span>shidqikiwz@gmail.com</span>
          </div>
          <div class="flex items-center">
            <svg class="w-5 h-5 text-gray-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
            </svg>
            <span>+62 895-6323-86000</span>
          </div>
          <div class="flex items-center">
            <svg class="w-5 h-5 text-gray-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
            </svg>
            <span>Bandung, Indonesia</span>
          </div>
        </div>
        
        <div class="flex justify-center space-x-4">
        <a href="https://shinki.my.id/" class="text-blue-600 hover:text-blue-800" target="_blank" rel="noopener noreferrer">
          <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M10.59 13.41a1 1 0 010-1.41L14.17 8a1 1 0 011.41 1.41l-3.58 3.59a1 1 0 01-1.41 0zM17 7h-2a1 1 0 110-2h2a4 4 0 010 8h-2a1 1 0 110-2h2a2 2 0 100-4zm-10 10h2a1 1 0 110 2H7a4 4 0 010-8h2a1 1 0 110 2H7a2 2 0 100 4zm1.41-1.41a1 1 0 010-1.41l3.58-3.59a1 1 0 011.41 1.41L9.83 16a1 1 0 01-1.42 0z"/>
          </svg>
        </a>
          <a href="https://www.instagram.com/sidkibertato/" class="text-pink-600 hover:text-pink-800">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/>
            </svg>
          </a>
          <a href="https://github.com/rafishidqi" class="text-gray-800 hover:text-gray-600">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"/>
            </svg>
          </a>
        </div>
      </div>

    </div>
  </div>
</section>

@extends('footer')

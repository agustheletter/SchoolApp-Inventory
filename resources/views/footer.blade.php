<!-- Simplified Footer -->
<footer class="bg-blue-700 text-white py-12 relative">
  <div class="max-w-7xl mx-auto px-6">
    <div class="grid md:grid-cols-2 gap-8"> <!-- Changed to 2 columns -->
      <div data-aos="fade-up" data-aos-delay="100">
        <h4 class="text-lg font-semibold mb-4">Sarpras Sekolah</h4>
        <p class="text-blue-100 text-sm">
          Solusi digital inovatif untuk manajemen sarana dan prasarana sekolah secara efisien, terintegrasi, dan mudah diakses. Dirancang untuk membantu sekolah dalam mengoptimalkan operasional, perawatan aset, dan pengambilan keputusan berbasis data.
        </p>
      </div>
      <div data-aos="fade-up" data-aos-delay="300" class="md:text-right"> <!-- Aligned to right -->
        <h4 class="text-lg font-semibold mb-4">Hubungi Kami</h4>
        <ul class="space-y-2 text-blue-100 text-sm">
          <li>rpl.stmnpbdg@gmail.com</li>
          <li>Jl. Mahar Martanegara No.48, Utama, Kec. Cimahi Sel., Kota Cimahi, Jawa Barat 40533123</li>
        </ul>
      </div>
    </div>
    <div class="border-t border-blue-600 mt-10 pt-6 text-center text-sm text-blue-100 relative">
      <p>&copy; 2025 Sarpras Sekolah. All rights reserved.</p>
      
      <!-- Back to Top Button -->
      <button onclick="scrollToTop()" class="absolute right-6 -top-5 bg-blue-600 hover:bg-blue-800 text-white w-10 h-10 rounded-full flex items-center justify-center transition-all duration-300 transform hover:scale-110 shadow-lg">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
          <path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd" />
        </svg>
      </button>
    </div>
  </div>
</footer>
 
<!-- Inisialisasi ikon -->
<script>
  lucide.createIcons();
</script>

<script>
  function scrollToTop() {
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  }
</script>

<script>
  AOS.init({
    duration: 800,
    delay: 100,
    easing: 'ease-in-out',
    once: false,
    mirror: true,
    anchorPlacement: 'top-bottom'
  });
</script>
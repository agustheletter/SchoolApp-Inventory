<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sarpras Sekolah</title>
  <script src="{{ asset('tailwind.js') }}"></script>
  <script src="{{ asset('aos.js') }}"></script>
  <script src="{{ asset('lucide.min.js') }}"></script>
  <link href="{{ asset('aos.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('TemplateAdminLTE') }}/plugins/fontawesome-free/css/all.min.css">

  <style>
    html {
      scroll-behavior: smooth;
    }
  </style>
</head>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init({
                duration: 800,
                delay: 100,
                easing: 'ease-in-out',
                once: false,
                mirror: true,
                anchorPlacement: 'top-bottom'
            });
        });
    </script>
    
<header class="fixed top-0 w-full bg-white shadow-md z-50">
    <div class="container mx-auto px-4 sm:px-6 py-3 flex justify-between items-center">
        <!-- Logo with text and image -->
        <a href="/" class="flex items-center space-x-2">
            <img src="{{ asset('profile/logo_sarpras.png') }}" alt="Logo Sarpras Sekolah" class="h-10 w-10 object-cover border-2 border-blue-100">
            <span class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-blue-400 bg-clip-text text-transparent">Sarpras Sekolah</span>
        </a>

        <!-- Mobile menu button (hidden on desktop) -->
        <button id="mobile-menu-button" class="md:hidden text-gray-600 hover:text-blue-600 focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>

        <!-- Desktop Navigation -->
        <nav class="hidden md:flex items-center space-x-1 lg:space-x-6">
            <a href="/#beranda" class="px-3 py-2 text-gray-700 hover:text-blue-600 font-medium transition-colors duration-200">Beranda</a>
            <a href="/#fitur" class="px-3 py-2 text-gray-700 hover:text-blue-600 font-medium transition-colors duration-200">Fitur</a>
            <a href="/#tentang" class="px-3 py-2 text-gray-700 hover:text-blue-600 font-medium transition-colors duration-200">Tentang</a>
            <a href="/#kontak" class="px-3 py-2 text-gray-700 hover:text-blue-600 font-medium transition-colors duration-200">Kontak</a>
            <a href="/login" class="ml-4 px-4 py-2 bg-gradient-to-r from-blue-600 to-blue-400 text-white font-medium rounded-lg hover:from-blue-700 hover:to-blue-500 transition-all duration-300 shadow hover:shadow-md">Login</a>
        </nav>
    </div>

    <!-- Mobile Navigation (hidden by default) -->
    <div id="mobile-menu" class="md:hidden hidden bg-white border-t">
        <div class="container mx-auto px-4 py-2 flex flex-col space-y-2">
            <a href="/#beranda" class="px-3 py-2 text-gray-700 hover:text-blue-600 font-medium">Beranda</a>
            <a href="/#fitur" class="px-3 py-2 text-gray-700 hover:text-blue-600 font-medium">Fitur</a>
            <a href="/#tentang" class="px-3 py-2 text-gray-700 hover:text-blue-600 font-medium">Tentang</a>
            <a href="/#kontak" class="px-3 py-2 text-gray-700 hover:text-blue-600 font-medium">Kontak</a>
            <a href="/login" class="px-3 py-2 my-2 text-center bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700">Login</a>
        </div>
    </div>
</header>

<script>
    // Mobile menu toggle functionality
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    });
</script>
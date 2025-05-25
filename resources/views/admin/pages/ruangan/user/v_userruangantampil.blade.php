@extends('header')

<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
  <!-- Back Button with Icon -->
  <div class="mt-20">
    <a href="/user/ruangan" class="inline-flex items-center text-blue-600 hover:text-blue-800 transition-colors duration-200">
     <i class="fa-solid fa-arrow-left"></i>Kembali ke Daftar Ruangan
    </a>
  </div>

  <!-- Main Room Card -->
  <div class="bg-white rounded-xl shadow-md overflow-hidden mb-8">
    <div class="p-6 md:p-8">
      <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-2">{{ $ruangan->namaruangan }}</h1>
      <div class="flex items-center text-gray-600 mb-6">
        <span class="text-sm">Kode: {{ $ruangan->koderuangan }}</span>
      </div>

      <div class="flex flex-col lg:flex-row gap-8">
        <!-- Room Image -->
        <div class="lg:w-1/3">
          @if($ruangan->gambar)
            <div class="bg-gray-100 rounded-lg overflow-hidden shadow-inner">
              <img 
                src="{{ asset('gambar_ruangan/' . $ruangan->gambar) }}" 
                class="w-full h-auto object-cover rounded-lg hover:scale-105 transition-transform duration-300" 
                alt="{{ $ruangan->namaruangan }}"
              >
            </div>
          @else
            <div class="flex items-center justify-center h-64 bg-gray-100 rounded-lg border-2 border-dashed border-gray-300">
              <span class="text-gray-400">Tidak ada gambar</span>
            </div>
          @endif
        </div>

        <!-- Room Details -->
        <div class="lg:w-2/3">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="bg-gray-50 p-4 rounded-lg">
              <h3 class="font-semibold text-gray-700 mb-2">Informasi Utama</h3>
              <ul class="space-y-2">
                <li class="flex justify-between">
                  <span class="text-gray-600">Kode Ruangan:</span>
                  <span class="font-medium">{{ $ruangan->koderuangan }}</span>
                </li>
                <li class="flex justify-between">
                  <span class="text-gray-600">Lokasi:</span>
                  <span class="font-medium">{{ $ruangan->lokasi }}</span>
                </li>
              </ul>
            </div>

            <div class="bg-gray-50 p-4 rounded-lg">
              <h3 class="font-semibold text-gray-700 mb-2">Spesifikasi</h3>
              <ul class="space-y-2">
                <li class="flex justify-between">
                  <span class="text-gray-600">Kapasitas:</span>
                  <span class="font-medium">{{ $ruangan->kapasitas }} orang</span>
                </li>
                <li class="flex justify-between">
                  <span class="text-gray-600">Status:</span>
                  <span class="font-medium text-blue-600">Tersedia</span>
                </li>
              </ul>
            </div>

            <div class="md:col-span-2 bg-gray-50 p-4 rounded-lg">
              <h3 class="font-semibold text-gray-700 mb-2">Deskripsi</h3>
              <p class="text-gray-700">{{ $ruangan->deskripsi ?: 'Tidak ada deskripsi tersedia' }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Success Notification -->
  @if (session('success'))
    <div class="mb-8 p-4 border-l-4 border-green-500 bg-green-50 text-green-700 rounded-r-lg shadow-sm">
      <div class="flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-green-500" viewBox="0 0 20 20" fill="currentColor">
          <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
        </svg>
        <span>{{ session('success') }}</span>
      </div>
    </div>
  @endif
</main>

@extends('footer')
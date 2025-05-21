@extends('header')

<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
  <!-- Back Button with Icon -->
  <div class="mb-6">
    <a href="{{ route('barang.user') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800 transition-colors duration-200">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
      </svg>
      Kembali ke Daftar Barang
    </a>
  </div>

  <!-- Main Product Card -->
  <div class="bg-white rounded-xl shadow-md overflow-hidden mb-8">
    <div class="p-6 md:p-8">
      <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-2">{{ $barang->namabarang }}</h1>
      <div class="flex items-center text-gray-600 mb-6">
        <span class="text-sm">Kode: {{ $barang->kodebarang }}</span>
      </div>

      <div class="flex flex-col lg:flex-row gap-8">
        <!-- Product Image -->
        <div class="lg:w-1/3">
          @if($barang->gambar)
            <div class="bg-gray-100 rounded-lg overflow-hidden shadow-inner">
              <img 
                src="{{ asset('gambar_barang/' . $barang->gambar) }}" 
                class="w-full h-auto object-cover rounded-lg hover:scale-105 transition-transform duration-300" 
                alt="{{ $barang->namabarang }}"
              >
            </div>
          @else
            <div class="flex items-center justify-center h-64 bg-gray-100 rounded-lg border-2 border-dashed border-gray-300">
              <span class="text-gray-400">Tidak ada gambar</span>
            </div>
          @endif
        </div>

        <!-- Product Details -->
        <div class="lg:w-2/3">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="bg-gray-50 p-4 rounded-lg">
              <h3 class="font-semibold text-gray-700 mb-2">Informasi Utama</h3>
              <ul class="space-y-2">
                <li class="flex justify-between">
                  <span class="text-gray-600">Stok:</span>
                  <span class="font-medium">{{ $barang->stok }}</span>
                </li>
                <li class="flex justify-between">
                  <span class="text-gray-600">Harga:</span>
                  <span class="font-medium text-blue-600">Rp {{ number_format($barang->harga, 0, ',', '.') }}</span>
                </li>
                <li class="flex justify-between">
                  <span class="text-gray-600">Tahun Pengajuan:</span>
                  <span class="font-medium">{{ $barang->tahunpengajuan }}</span>
                </li>
              </ul>
            </div>

            <div class="bg-gray-50 p-4 rounded-lg">
              <h3 class="font-semibold text-gray-700 mb-2">Spesifikasi</h3>
              <ul class="space-y-2">
                <li class="flex justify-between">
                  <span class="text-gray-600">Merk:</span>
                  <span class="font-medium">{{ $barang->merk }}</span>
                </li>
                <li class="flex justify-between">
                  <span class="text-gray-600">Jenis:</span>
                  <span class="font-medium">{{ $barang->jenisbarang }}</span>
                </li>
              </ul>
            </div>

            <div class="md:col-span-2 bg-gray-50 p-4 rounded-lg">
              <h3 class="font-semibold text-gray-700 mb-2">Deskripsi</h3>
              <p class="text-gray-700">{{ $barang->deskripsi ?: 'Tidak ada deskripsi tersedia' }}</p>
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

  <!-- Item Details Section -->
  <div class="bg-white rounded-xl shadow-md overflow-hidden">
    <div class="p-6 md:p-8">
      <h2 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
        </svg>
        Detail Setiap Barang
      </h2>

      @if($barang->detail->isEmpty())
        <div class="p-4 border-l-4 border-yellow-500 bg-yellow-50 text-yellow-700 rounded-r-lg">
          <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>
            <span>Belum ada detail untuk barang ini</span>
          </div>
        </div>
      @else
        <div class="overflow-x-auto">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kode Barang</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kondisi</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
              </tr>
            </thead>
           <tbody class="bg-white divide-y divide-gray-200">
    @foreach($barang->detail as $detail)
    <tr class="hover:bg-gray-50 transition-colors duration-150">
        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
            {{ $loop->iteration }}
            <input type="hidden" name="id[]" value="{{ $detail->idbarangdetail }}">
        </td>
        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
            {{ $detail->kodebarangdetail }}
        </td>
        <td class="px-6 py-4 whitespace-nowrap text-sm">
            @if($detail->kondisi === 'bagus')
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                    <svg class="-ml-0.5 mr-1.5 h-2 w-2 text-green-400" fill="currentColor" viewBox="0 0 8 8">
                        <circle cx="4" cy="4" r="3" />
                    </svg>
                    Bagus
                </span>
            @elseif($detail->kondisi === 'rusak')
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                    <svg class="-ml-0.5 mr-1.5 h-2 w-2 text-red-400" fill="currentColor" viewBox="0 0 8 8">
                        <circle cx="4" cy="4" r="3" />
                    </svg>
                    Rusak
                </span>
            @else
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                    <svg class="-ml-0.5 mr-1.5 h-2 w-2 text-gray-400" fill="currentColor" viewBox="0 0 8 8">
                        <circle cx="4" cy="4" r="3" />
                    </svg>
                    Tidak Diketahui
                </span>
            @endif
        </td>
        <td class="px-6 py-4 whitespace-nowrap text-sm">
            @if($detail->status === 'tersedia')
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                    <svg class="-ml-0.5 mr-1.5 h-2 w-2 text-blue-400" fill="currentColor" viewBox="0 0 8 8">
                        <circle cx="4" cy="4" r="3" />
                    </svg>
                    Tersedia
                </span>
            @elseif($detail->status === 'dipinjam')
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                    <svg class="-ml-0.5 mr-1.5 h-2 w-2 text-yellow-400" fill="currentColor" viewBox="0 0 8 8">
                        <circle cx="4" cy="4" r="3" />
                    </svg>
                    Dipinjam
                </span>
            @else
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                    <svg class="-ml-0.5 mr-1.5 h-2 w-2 text-gray-400" fill="currentColor" viewBox="0 0 8 8">
                        <circle cx="4" cy="4" r="3" />
                    </svg>
                    Tidak Diketahui
                </span>
            @endif
        </td>
    </tr>
    @endforeach
</tbody>

          </table>
        </div>
      @endif
    </div>
  </div>
</main>

@extends('footer')
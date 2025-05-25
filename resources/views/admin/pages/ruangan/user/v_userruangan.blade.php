@extends('header')

<!-- Main Content -->
<main class="min-h-screen bg-gray-50 mt-20">
  <div class="container mx-auto px-4 py-12">
    {{-- <!-- Toggle Section -->
    <div class="flex justify-center mb-8">
      <div class="inline-flex rounded-md shadow-sm" role="group">
        <a 
          href="{{ route('barang.user') }}" 
          class="px-6 py-3 text-sm font-medium rounded-l-lg 
            {{ request()->is('user/barang*') ? 'bg-blue-600 text-white' : 'bg-white text-gray-700 hover:bg-gray-100' }}
            border border-gray-200 transition-colors duration-200"
        >
          <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
            </svg>
            Daftar Barang
          </div>
        </a>
        <a 
          href="{{ route('ruangan.user') }}" 
          class="px-6 py-3 text-sm font-medium rounded-r-lg 
            {{ request()->is('user/ruangan*') ? 'bg-blue-600 text-white' : 'bg-white text-gray-700 hover:bg-gray-100' }}
            border border-gray-200 transition-colors duration-200"
        >
          <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
            Daftar Ruangan
          </div>
        </a>
      </div>
    </div> --}}

    <!-- Search Section -->
    <div class="flex flex-col items-center mb-12">
      <h1 class="text-3xl font-bold text-gray-800 mb-6">Daftar Ruangan</h1>
      <form action="{{ route('ruangan.usercari') }}" method="GET" class="w-full max-w-2xl">
        <div class="relative flex items-center shadow-lg rounded-lg overflow-hidden">
          <input
            type="text"
            name="cari"
            class="w-full px-6 py-4 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 rounded-l-lg"
            placeholder="Cari ruangan berdasarkan nama atau kode..."
            value="{{ request('cari') }}"
          />
          <button
            type="submit"
            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-4 transition duration-300 flex items-center"
          >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
            Cari
          </button>
        </div>
      </form>
    </div>

    <!-- Table Section -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-8">
      <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gradient-to-r from-blue-600 to-blue-800 text-white">
            <tr>
              <th class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider">ID</th>
              <th class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider">Kode</th>
              <th class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider">Nama Ruangan</th>
              <th class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider">Kapasitas</th>
              <th class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider">Lokasi</th>
              <th class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider">Deskripsi</th>
              <th class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider">Status</th>
              <th class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider">Gambar</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            @forelse ($ruangan as $item)
            <tr class="hover:bg-gray-50 transition duration-150">
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->idruangan }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $item->koderuangan }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $item->namaruangan }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->jumlah }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $item->lokasi }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->deskripsi }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm">
                @if($item->status === 'tersedia')
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                        <svg class="-ml-0.5 mr-1.5 h-2 w-2 text-blue-400" fill="currentColor" viewBox="0 0 8 8">
                            <circle cx="4" cy="4" r="3" />
                        </svg>
                        Tersedia
                    </span>
                @elseif($item->status === 'dipinjam')
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
              <td class="px-6 py-4 whitespace-nowrap">
                @if($item->gambar)
                <div class="flex-shrink-0 h-16 w-16 mx-auto">
                  <img class="h-16 w-16 rounded-md object-cover shadow" src="{{ asset('gambar_ruangan/' . $item->gambar) }}" alt="Gambar ruangan">
                </div>
                @else
                <span class="text-gray-400 italic text-sm">No image</span>
                @endif
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="7" class="px-6 py-8 text-center">
                <div class="flex flex-col items-center justify-center text-gray-500">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                  <p class="text-lg">Ruangan tidak ditemukan</p>
                  <p class="text-sm mt-2">Coba dengan kata kunci yang berbeda</p>
                </div>
              </td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>

    <!-- Pagination -->
    <div class="mt-8 flex justify-center">
      {{ $ruangan->links() }}
    </div>
  </div>
</main>
@extends('footer')

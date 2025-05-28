@extends('header')

<!-- Main Content -->
<main class="min-h-screen bg-gray-50 mt-20">
  <div class="container mx-auto px-4 py-8">
    <!-- Search Section -->
    <div class="flex flex-col items-center mb-8">
      <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-4">Daftar Ruangan</h1>
      <form action="{{ route('ruangan.usercari') }}" method="GET" class="w-full max-w-2xl">
        <div class="relative flex items-center shadow-md rounded-lg overflow-hidden">
          <input
            type="text"
            name="cari"
            class="w-full px-4 py-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 rounded-l-lg"
            placeholder="Cari ruangan berdasarkan nama atau kode..."
            value="{{ request('cari') }}"
          />
          <button
            type="submit"
            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-3 transition duration-300 flex items-center"
          >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
            Cari
          </button>
        </div>
      </form>
    </div>

    <!-- Table Section -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden mb-6">
      <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gradient-to-r from-blue-600 to-blue-700 text-white">
            <tr>
              <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">No</th>
              <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">Kode</th>
              <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">Nama Ruangan</th>
              <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">Kapasitas</th>
              <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">Lokasi</th>
              <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">Status</th>
              <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">Gambar</th>
              <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">Aksi</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            @forelse ($ruangan as $index => $item)
            <tr class="hover:bg-gray-50 transition duration-150">
              <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                {{ ($ruangan->currentPage() - 1) * $ruangan->perPage() + $loop->iteration }}
              </td>
              <td class="px-4 py-3 whitespace-nowrap text-sm font-medium text-gray-900">{{ $item->koderuangan }}</td>
              <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900">{{ $item->namaruangan }}</td>
              <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500 text-center">{{ $item->jumlah }}</td>
              <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900 max-w-xs truncate">{{ $item->lokasi }}</td>
              <td class="px-4 py-3 whitespace-nowrap text-sm">
                @if($item->status === 'tersedia')
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                  <svg class="-ml-0.5 mr-1.5 h-2 w-2 text-green-500" fill="currentColor" viewBox="0 0 8 8">
                    <circle cx="4" cy="4" r="3" />
                  </svg>
                  Tersedia
                </span>
                @elseif($item->status === 'dipinjam')
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                  <svg class="-ml-0.5 mr-1.5 h-2 w-2 text-yellow-500" fill="currentColor" viewBox="0 0 8 8">
                    <circle cx="4" cy="4" r="3" />
                  </svg>
                  Dipinjam
                </span>
                @else
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                  <svg class="-ml-0.5 mr-1.5 h-2 w-2 text-gray-500" fill="currentColor" viewBox="0 0 8 8">
                    <circle cx="4" cy="4" r="3" />
                  </svg>
                  Tidak Diketahui
                </span>
                @endif
              </td>
              <td class="px-2 py-3 whitespace-nowrap">
                @if($item->gambar)
                <div class="flex-shrink-0 h-20 w-20 mx-auto">
                  <img class="h-20 w-20 rounded-md object-cover shadow" src="{{ asset('gambar_ruangan/' . $item->gambar) }}" alt="Gambar ruangan">
                </div>
                @else
                <span class="text-gray-400 italic text-xs">-</span>
                @endif
              </td>
              <td class="px-2 py-3 whitespace-nowrap text-sm font-medium">
                <a href="{{ route('ruangan.usershow', $item->idruangan) }}" 
                   class="text-blue-600 hover:text-blue-800 transition duration-300 flex items-center">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                    <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                  </svg>
                  Detail
                </a>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="8" class="px-6 py-8 text-center">
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
    <div class="mt-6 flex justify-center">
      {{ $ruangan->links() }}
    </div>
  </div>
</main>
@extends('footer')
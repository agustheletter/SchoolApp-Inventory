@extends('admin/v_admin')

@section('judulhalaman', 'Daftar Peminjaman Ruangan')
@section('title', 'Peminjaman Ruangan')

@section('konten')

<ul class="nav nav-tabs mb-4" id="barangRuanganTab" role="tablist">
  <li class="nav-item" role="presentation">
    <a 
      class="nav-link {{ request()->is('peminjamanbarang*') ? 'active' : '' }}" 
      href="{{ route('pinjam.index') }}"
      role="tab"
    >
      Barang
    </a>
  </li>
  <li class="nav-item" role="presentation">
    <a 
      class="nav-link {{ request()->is('peminjamanruangan*') ? 'active' : '' }}" 
      href="{{ route('pinjamruangan.index') }}"
      role="tab"
    >
      Ruangan
    </a>
  </li>
</ul>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ route('pinjamruangan.create') }}" class="btn btn-success">
            + Tambah Peminjaman Ruangan
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success mb-3">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead class="thead-dark text-center">
                <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>Petugas</th>
                    <th>Waktu Pinjam</th>
                    <th>Status</th>
                    <th>Ruangan Dipinjam</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pinjams as $pinjam)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $pinjam->siswa->namasiswa ?? '-' }}</td>
                        <td>{{ $pinjam->petugas->name ?? '-' }}</td>
                        <td>{{ $pinjam->waktupinjam }}</td>
                        <td>{{ ucfirst($pinjam->status ?? 'menunggu') }}</td>
                        <td>{{ $pinjam->ruangan->namaruangan ?? 'Ruangan tidak ditemukan' }}</td>
                        <td class="text-center">
                            <div class="d-flex flex-column gap-1">
                                @if(($pinjam->status ?? 'menunggu') === 'menunggu')
                                    <form action="{{ route('pinjamruangan.konfirmasi', $pinjam->idpinjam) }}" method="POST" onsubmit="return confirm('Konfirmasi peminjaman ini?')">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-success btn-sm w-100">
                                            <i class="bi bi-check-circle-fill me-1"></i> Konfirmasi
                                        </button>
                                    </form>
                                @elseif ($pinjam->status === 'dipinjam')
                                    <form action="{{ route('pinjamruangan.pinjam.kembalikan', $pinjam->idpinjam) }}" method="POST" onsubmit="return confirm('Kembalikan ruangan ini?')">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-primary btn-sm w-100">
                                            <i class="bi bi-arrow-counterclockwise me-1"></i> Kembalikan
                                        </button>
                                    </form>
                                @else
                                    <span class="text-muted">—</span>
                                @endif
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted">Tidak ada data peminjaman.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- jika menggunakan pagination --}}
    <div class="mt-3 d-flex justify-content-center">
        {{ $pinjams->links() }}
    </div>
</div>

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

@endsection

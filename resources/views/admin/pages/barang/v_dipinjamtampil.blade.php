@extends('admin/v_admin')

@section('judulhalaman', 'Daftar Barang Yang Sedang Dipinjam')
@section('title', 'Peminjaman')

@section('konten')
<div class="container">

    <ul class="nav nav-tabs mb-4" id="barangRuanganTab" role="tablist">
        <li class="nav-item" role="presentation">
            <a 
                class="nav-link {{ request()->is('peminjamanbarang*') ? 'active' : '' }}" 
                href="/peminjamanbarang/sedangdipinjam"
                role="tab"
            >
                Barang
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a 
                class="nav-link {{ request()->is('peminjamanruangan*') ? 'active' : '' }}" 
                href="/peminjamanruangan/sedangdipinjam"
                role="tab"
            >
                Ruangan
            </a>
        </li>
    </ul>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama Siswa</th>
                    <th>Petugas</th>
                    <th>Waktu Pinjam</th>
                    <th>Status</th>
                    <th>Barang Dipinjam</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pinjams as $pinjam)
                    <tr>
                        <td>{{ $pinjam->idpinjam }}</td>
                        <td>{{ $pinjam->siswa->namasiswa ?? '-' }}</td>
                        <td>{{ $pinjam->petugas->name ?? '-' }}</td>
                        <td>{{ $pinjam->waktupinjam }}</td>
                        <td>{{ ucfirst($pinjam->status ?? 'menunggu') }}</td>
                        <td>{{ $pinjam->barang->namabarang ?? 'Barang tidak ditemukan' }}</td>
                        <td>
                            <form 
                                action="{{ route('pinjam.pinjam.kembalikan', $pinjam->idpinjam) }}" 
                                method="POST"
                                onsubmit="return confirm('Apakah barang ini sudah dikembalikan?')"
                            >
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-success btn-sm rounded-pill shadow">
                                    <i class="bi bi-check-circle-fill me-1"></i> Kembalikan
                                </button>
                            </form>
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

</div>

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
@endsection

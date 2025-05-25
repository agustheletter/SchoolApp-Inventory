@extends('admin/v_admin')

@section('judulhalaman', 'Daftar Ruangan Yang Sedang Dipinjam')
@section('title', 'Peminjaman Ruangan')

@section('konten')
<div class="container">

    <ul class="nav nav-tabs mb-4" id="barangRuanganTab" role="tablist">
        <li class="nav-item" role="presentation">
            <a 
                class="nav-link {{ request()->is('peminjamanbarang/sedangdipinjam') ? 'active' : '' }}" 
                href="{{ url('/peminjamanbarang/sedangdipinjam') }}"
                role="tab"
            >
                Barang
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a 
                class="nav-link {{ request()->is('peminjamanruangan/sedangdipinjam') ? 'active' : '' }}" 
                href="{{ url('/peminjamanruangan/sedangdipinjam') }}"
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
            <thead class="thead-dark text-center">
                <tr>
                    <th>ID</th>
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
                        <td class="text-center">{{ $pinjam->idpinjam }}</td>
                        <td>{{ $pinjam->siswa->namasiswa ?? '-' }}</td>
                        <td>{{ $pinjam->petugas->name ?? '-' }}</td>
                        <td>{{ $pinjam->waktupinjam }}</td>
                        <td>{{ ucfirst($pinjam->status) }}</td>
                        <td>{{ $pinjam->ruangan->namaruangan ?? '-' }}</td>
                        <td class="text-center">
                            <form 
                                action="{{ route('pinjamruangan.pinjam.kembalikan', $pinjam->idpinjam) }}" 
                                method="POST"
                                onsubmit="return confirm('Sudah dikembalikan?')"
                                style="display:inline-block;"
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
                        <td colspan="7" class="text-center text-muted">Tidak ada data.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center mt-3">
        {{ $pinjams->links() }}
    </div>
</div>

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
@endsection

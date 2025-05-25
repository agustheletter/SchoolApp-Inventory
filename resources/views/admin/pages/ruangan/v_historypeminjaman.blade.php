@extends('admin/v_admin')

@section('judulhalaman', 'Histori Peminjaman Ruangan')
@section('title', 'Histori Peminjaman')

@section('konten')
<div class="container">

    <ul class="nav nav-tabs mb-4" id="barangRuanganTab" role="tablist">
        <li class="nav-item" role="presentation">
            <a 
                class="nav-link {{ request()->is('history-peminjamanbarang*') ? 'active' : '' }}" 
                href="/history-peminjamanbarang" 
                role="tab"
            >
                Barang
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a 
                class="nav-link {{ request()->is('history-peminjamanruangan*') ? 'active' : '' }}" 
                href="/history-peminjamanruangan" 
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
                    <th>Ruangan</th>
                    <th>Waktu Pinjam</th>
                    <th>Waktu Kembali</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($histories as $history)
                    <tr>
                        <td>{{ $history->idpinjam }}</td>
                        <td>{{ $history->siswa->namasiswa ?? '-' }}</td>
                        <td>{{ $history->petugas->name ?? '-' }}</td>
                        <td>{{ $history->ruangan->namaruangan ?? 'Ruangan tidak ditemukan' }}</td>
                        <td>{{ \Carbon\Carbon::parse($history->waktupinjam)->format('d-m-Y H:i') }}</td>
                        <td>{{ \Carbon\Carbon::parse($history->waktukembali)->format('d-m-Y H:i') }}</td>
                        <td>
                            <span class="badge bg-secondary">
                                {{ ucfirst($history->status) }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted">Tidak ada data histori peminjaman ruangan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection

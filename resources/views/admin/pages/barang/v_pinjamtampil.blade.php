@extends('admin/v_admin')

@section('judulhalaman', 'Daftar Peminjaman')
@section('title', 'Peminjaman')

@section('content')
<div class="container">
    <h3>Daftar Peminjaman Menunggu Konfirmasi</h3>

    {{-- DEBUG: Cek isi data --}}
    {{-- <pre>{{ json_encode($pinjams, JSON_PRETTY_PRINT) }}</pre> --}}

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Siswa</th>
                <th>Petugas</th>
                <th>Waktu Pinjam</th>
                <th>Status</th>
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
                    <td>
                        @if($pinjam->status === 'menunggu')
                            <form action="{{ route('pinjam.konfirmasi', $pinjam->idpinjam) }}" method="POST" onsubmit="return confirm('Konfirmasi peminjaman ini?')">
                                @csrf
                                @method('PUT')
                                <button class="btn btn-success btn-sm">Konfirmasi</button>
                            </form>
                        @else
                            <span class="badge bg-success">Sudah Dikonfirmasi</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Tidak ada data peminjaman.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

@extends('admin/v_admin')
@section('judulhalaman', 'Data Ruangan')
@section('title', 'Data Ruangan')

@section('konten')

<ul class="nav nav-tabs mb-4" id="barangRuanganTab" role="tablist">
  <li class="nav-item" role="presentation">
    <a 
      class="nav-link {{ request()->is('barang*') ? 'active' : '' }}" 
      href="{{ route('barang.index') }}" 
      role="tab"
    >
      Barang
    </a>
  </li>
  <li class="nav-item" role="presentation">
    <a 
      class="nav-link {{ request()->is('ruangan*') ? 'active' : '' }}" 
      href="{{ route('ruangan.index') }}" 
      role="tab"
    >
      Ruangan
    </a>
  </li>
</ul>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ route('ruangan.create') }}" class="btn btn-success mb-3">+ Tambah Ruangan</a>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('ruangan.cari') }}" method="GET" class="d-flex gap-2">
            <input type="text" name="cari" class="form-control w-auto" placeholder="Cari Ruangan..." value="{{ request('cari') }}">
            <button type="submit" class="btn btn-primary">Cari</button>
        </form>    
    </div>


    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Kode Ruangan</th>
                <th>Nama Ruangan</th>
                <th>Kapasitas</th>
                <th>Lokasi</th>
                <th>Deskripsi</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($ruangan as $index => $r)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $r->koderuangan }}</td>
                    <td>{{ $r->namaruangan }}</td>
                    <td>{{ $r->kapasitas}}</td>
                    <td>{{ $r->lokasi ?? '-' }}</td>
                    <td>{{ $r->deskripsi ?? '-' }}</td>
                    <td>
                        @if ($r->gambar)
                            <img src="{{ asset('gambar_ruangan/' . $r->gambar) }}" width="100" class="img-fluid rounded shadow-sm" alt="gambar">
                        @else
                            <span class="text-muted">Tidak ada gambar</span>
                        @endif
                    </td>
                    <td>
                        <div class="d-flex flex-column gap-1">
                            <a href="{{ route('ruangan.show', $r->idruangan) }}" class="btn btn-info btn-sm w-100">Lihat</a>
                            <a href="{{ route('ruangan.edit', $r->idruangan) }}" class="btn btn-warning btn-sm w-100">Edit</a>
                            <form action="{{ route('ruangan.destroy', $r->idruangan) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm w-100">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center">Data ruangan belum tersedia.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
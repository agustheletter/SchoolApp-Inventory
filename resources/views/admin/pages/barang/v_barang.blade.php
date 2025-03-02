<!-- awal konten dinamis -->
@extends('admin/v_admin')
@section('judulhalaman', 'Daftar Barang')
@section('title', 'Barang')

@section('konten')
<div class="container mt-4">
    <a href="{{ route('barang.create') }}" class="btn btn-success mb-3">Tambah Barang</a>
    
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Kode Barang</th>
                <th>Nama</th>
                <th>Stok</th>
                <th>Harga</th>
                <th>Merk</th>
                <th>Jenis</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($barang as $item)
                <tr>
                    <td>{{ $item->idbarang }}</td>
                    <td>{{ $item->kodebarang }}</td>
                    <td>{{ $item->namabarang }}</td>
                    <td>{{ $item->stok }}</td>
                    <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                    <td>{{ $item->merk }}</td>
                    <td>{{ $item->jenisbarang }}</td>
                    <td>
                        <a href="{{ route('barang.show', $item->idbarang) }}" class="btn btn-info btn-sm">Lihat</a>
                        <a href="{{ route('barang.edit', $item->idbarang) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('barang.destroy', $item->idbarang) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus barang ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

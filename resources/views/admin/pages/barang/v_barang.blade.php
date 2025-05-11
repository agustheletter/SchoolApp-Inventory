@extends('admin/v_admin')

@section('judulhalaman', 'Daftar Barang')
@section('title', 'Barang')

@section('konten')
<div class="container mt-4">
    <div class="d-flex justify-content-center">
        <form action="{{ route('barang.cari') }}" method="GET" class="mb-3 d-flex gap-2">
            <input type="text" name="cari" class="form-control w-auto" placeholder="Cari Barang..." value="{{ request('cari') }}">
            <button type="submit" class="btn btn-primary">Cari</button>
        </form>    
    </div>
    
    

    <a href="{{ route('barang.create') }}" class="btn btn-success mb-3">Tambah Barang</a>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Kode Barang</th>
                    <th>Nama</th>
                    <th>Stok</th>
                    <th>Harga</th>
                    <th>Merk</th>
                    <th>Jenis</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($barang as $item)
                    <tr>
                        <td>{{ $item->idbarang }}</td>
                        <td>{{ $item->kodebarang }}</td>
                        <td>{{ $item->namabarang }}</td>
                        <td>{{ $item->stok }}</td>
                        <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                        <td>{{ $item->merk }}</td>
                        <td>{{ $item->jenisbarang }}</td>
                        <td>
                            @if($item->gambar)
                                <img src="{{ asset('gambar_barang/' . $item->gambar) }}" width="100" class="img-fluid rounded shadow-sm" alt="gambar">
                            @else
                                <span class="text-muted">Tidak ada gambar</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex flex-column gap-1">
                                <a href="{{ route('barang.show', $item->idbarang) }}" class="btn btn-info btn-sm w-100">Lihat</a>
                                <a href="{{ route('barang.edit', $item->idbarang) }}" class="btn btn-warning btn-sm w-100">Edit</a>
                                <form action="{{ route('barang.destroy', $item->idbarang) }}" method="POST" onsubmit="return confirm('Hapus barang ini?')" class="w-100">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm w-100">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center text-muted">Barang tidak ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
            
        </table>
    </div>
    <div class="justify-center">
        {{ $barang->links() }}
    </div>
    
</div>
@endsection

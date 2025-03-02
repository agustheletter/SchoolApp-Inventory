@extends('admin/v_admin')
@section('judulhalaman', 'Edit Barang')
@section('title', 'Edit Barang')

@section('konten')
<div class="container mt-4">
    <h2>Edit Barang</h2>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('barang.update', $barang->idbarang) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="kodebarang" class="form-label">Kode Barang</label>
            <input type="text" class="form-control" id="kodebarang" name="kodebarang" value="{{ old('kodebarang', $barang->kodebarang) }}" required>
        </div>

        <div class="mb-3">
            <label for="namabarang" class="form-label">Nama Barang</label>
            <input type="text" class="form-control" id="namabarang" name="namabarang" value="{{ old('namabarang', $barang->namabarang) }}" required>
        </div>

        <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" class="form-control" id="stok" name="stok" value="{{ old('stok', $barang->stok) }}" required>
        </div>

        <div class="mb-3">
            <label for="tahunpengajuan" class="form-label">Tahun Pengajuan</label>
            <input type="text" class="form-control" id="tahunpengajuan" name="tahunpengajuan" value="{{ old('tahunpengajuan', $barang->tahunpengajuan) }}" required>
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" value="{{ old('harga', $barang->harga) }}" required>
        </div>

        <div class="mb-3">
            <label for="merk" class="form-label">Merk</label>
            <input type="text" class="form-control" id="merk" name="merk" value="{{ old('merk', $barang->merk) }}">
        </div>

        <div class="mb-3">
            <label for="jenisbarang" class="form-label">Jenis Barang</label>
            <input type="text" class="form-control" id="jenisbarang" name="jenisbarang" value="{{ old('jenisbarang', $barang->jenisbarang) }}" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi">{{ old('deskripsi', $barang->deskripsi) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('barang.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection

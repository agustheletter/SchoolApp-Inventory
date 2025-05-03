@extends('admin/v_admin')
@section('judulhalaman', 'Tambah Barang')
@section('title', 'Tambah Barang')

@section('konten')
<div class="container mt-4">
    <h2>Tambah Barang</h2>
    <a href="{{ route('barang.index') }}" class="btn btn-secondary mb-3">Kembali</a>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="kodebarang" class="form-label">Kode Barang</label>
            <input type="text" name="kodebarang" id="kodebarang" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="namabarang" class="form-label">Nama Barang</label>
            <input type="text" name="namabarang" id="namabarang" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" name="stok" id="stok" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="tahunpengajuan" class="form-label">Tahun Pengajuan</label>
            <input type="number" name="tahunpengajuan" id="tahunpengajuan" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" name="harga" id="harga" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="merk" class="form-label">Merk</label>
            <input type="text" name="merk" id="merk" class="form-control">
        </div>

        <div class="mb-3">
            <label for="jenisbarang" class="form-label">Jenis Barang</label>
            <select name="jenisbarang" id="jenisbarang" class="form-control" required>
                <option value="Elektronik">Elektronik</option>
                <option value="Furniture">Furniture</option>
                <option value="ATK">ATK</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control"></textarea>
        </div>

        <!-- Input untuk Gambar -->
        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar Barang</label>
            <input type="file" name="gambar" id="gambar" class="form-control" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection

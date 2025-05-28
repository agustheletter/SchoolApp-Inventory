@extends('admin/v_admin')
@section('judulhalaman', 'Edit Ruangan')
@section('title', 'Edit Ruangan')

@section('konten')
<div class="container mt-4">
    <h2>Edit Ruangan</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('ruangan.update', $ruangan->idruangan) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="koderuangan" class="form-label">Kode Ruangan</label>
            <input type="text" class="form-control" id="koderuangan" name="koderuangan" value="{{ old('koderuangan', $ruangan->koderuangan) }}" required>
        </div>

        <div class="mb-3">
            <label for="namaruangan" class="form-label">Nama Ruangan</label>
            <input type="text" class="form-control" id="namaruangan" name="namaruangan" value="{{ old('namaruangan', $ruangan->namaruangan) }}" required>
        </div>

        <div class="mb-3">
            <label for="kapasitas" class="form-label">Kapasitas</label>
            <input type="number" class="form-control" id="kapasitas" name="kapasitas" value="{{ old('kapasitas', $ruangan->kapasitas) }}" required>
        </div>

        <div class="mb-3">
            <label for="lokasi" class="form-label">Lokasi</label>
            <input type="text" class="form-control" id="lokasi" name="lokasi" value="{{ old('lokasi', $ruangan->lokasi) }}">
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" >{{ old('deskripsi', $ruangan->deskripsi) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar Ruangan</label><br>
            @if ($ruangan->gambar)
                <img src="{{ asset('gambar_ruangan/' . $ruangan->gambar) }}" alt="Gambar"  class="img-fluid mt-2" style="max-height: 150px;">
            @endif
            <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*">
            <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar.</small>
        </div>

        <div class="mb-4">
            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
            <select name="status" id="status" class="form-select mt-1 block w-full">
                <option value="tersedia" {{ old('status', $ruangan->status ?? '') == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                <option value="dipinjam" {{ old('status', $ruangan->status ?? '') == 'dipinjam' ? 'selected' : '' }}>Dipinjam</option>
            </select>
        </div>


        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        <a href="{{ route('ruangan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection

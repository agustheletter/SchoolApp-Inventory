@extends('admin/v_admin')
@section('judulhalaman', 'Tambah Peminjaman Ruangan')
@section('title', 'Tambah Peminjaman Ruangan')

@section('konten')
<div class="container mt-4">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('pinjamruangan.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="idsiswa" class="form-label">Siswa</label>
            <select name="idsiswa" id="idsiswa" class="form-control" required>
                <option value="" disabled selected>-- Pilih Siswa --</option>
                @foreach($siswas as $siswa)
                    <option value="{{ $siswa->idsiswa }}">{{ $siswa->namasiswa }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="idpetugas" class="form-label">Petugas</label>
            <select name="idpetugas" id="idpetugas" class="form-control" required>
                <option value="" disabled selected>-- Pilih Petugas --</option>
                @foreach($petugas as $ptg)
                    <option value="{{ $ptg->id }}">{{ $ptg->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="idruangan" class="form-label">Pilih Ruangan</label>
            <select name="idruangan" id="idruangan" class="form-control" required>
                <option value="" disabled selected>-- Pilih Ruangan --</option>
                @foreach($ruangans as $ruangan)
                    <option value="{{ $ruangan->idruangan }}">{{ $ruangan->namaruangan }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="waktupinjam" class="form-label">Waktu Pinjam</label>
            <input type="datetime-local" name="waktupinjam" id="waktupinjam" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('pinjamruangan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection

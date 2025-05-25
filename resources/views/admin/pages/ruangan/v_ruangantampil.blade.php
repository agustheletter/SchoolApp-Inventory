@extends('admin/v_admin')

@section('judulhalaman', 'Detail Ruangan')
@section('title', 'Detail Ruangan')

@section('konten')
<div class="container mt-4">
    <a href="{{ route('ruangan.index') }}" class="btn btn-secondary mb-3">
        <i class="bi bi-arrow-left"></i> Kembali ke Daftar Ruangan
    </a>

    <div class="card shadow">
        <div class="card-header bg-dark text-white">
            <h5 class="mb-0">{{ $ruangan->namaruangan }}</h5>
        </div>

        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-4 text-center">
                    @if($ruangan->gambar)
                        <img src="{{ asset('gambar_ruangan/' . $ruangan->gambar) }}" class="img-fluid rounded shadow-sm" alt="gambar ruangan">
                    @else
                        <div class="d-flex justify-content-center align-items-center rounded border" style="height: 250px; background-color: #f8f9fa;">
                            <span class="text-muted">Tidak ada gambar</span>
                        </div>
                    @endif
                </div>

                <div class="col-md-8">
                    <table class="table table-borderless">
                        <tr><th scope="row">Kode Ruangan</th><td>: {{ $ruangan->koderuangan }}</td></tr>
                        <tr><th scope="row">Nama</th><td>: {{ $ruangan->namaruangan }}</td></tr>
                        <tr><th scope="row">Lokasi</th><td>: {{ $ruangan->lokasi }}</td></tr>
                        <tr><th scope="row">Kapasitas</th><td>: {{ $ruangan->kapasitas }} orang</td></tr>
                        <tr><th scope="row">Deskripsi</th><td>: {{ $ruangan->deskripsi }}</td></tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('admin/v_admin')

@section('judulhalaman', 'Detail Barang')
@section('title', 'Detail Barang')

@section('konten')
<div class="container mt-4">
    <a href="{{ route('barang.index') }}" class="btn btn-secondary mb-3">
        <i class="bi bi-arrow-left"></i> Kembali ke Daftar Barang
    </a>

    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Detail Barang - {{ $barang->namabarang }}</h5>
        </div>

        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-4 text-center">
                    @if($barang->gambar)
                        <img src="{{ asset('gambar_barang/' . $barang->gambar) }}" class="img-fluid rounded" alt="gambar">
                    @else
                        <div class="text-muted">Tidak ada gambar</div>
                    @endif
                </div>
                <div class="col-md-8">
                    <table class="table table-borderless">
                        <tr><th>Kode Barang</th><td>{{ $barang->kodebarang }}</td></tr>
                        <tr><th>Nama</th><td>{{ $barang->namabarang }}</td></tr>
                        <tr><th>Stok</th><td>{{ $barang->stok }}</td></tr>
                        <tr><th>Tahun Pengajuan</th><td>{{ $barang->tahunpengajuan }}</td></tr>
                        <tr><th>Harga</th><td>Rp {{ number_format($barang->harga, 0, ',', '.') }}</td></tr>
                        <tr><th>Merk</th><td>{{ $barang->merk }}</td></tr>
                        <tr><th>Jenis</th><td>{{ $barang->jenisbarang }}</td></tr>
                        <tr><th>Deskripsi</th><td>{{ $barang->deskripsi }}</td></tr>
                    </table>
                </div>
            </div>

            <h5 class="mb-3">Daftar Detail Barang</h5>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if($barang->detail->isEmpty())
                <div class="alert alert-info">Belum ada detail untuk barang ini.</div>
            @else
                <form action="{{ route('barangdetail.bulkUpdate') }}" method="POST">
                    @csrf
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 10%">ID</th>
                                <th style="width: 40%">Kode Barang Detail</th>
                                <th style="width: 50%">Kondisi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($barang->detail as $index => $detail)
                                <tr>
                                    <td>
                                        {{ $detail->idbarangdetail }}
                                        <input type="hidden" name="id[]" value="{{ $detail->idbarangdetail }}">
                                    </td>
                                    <td>{{ $detail->kodebarangdetail }}</td>
                                    <td>
                                        <select name="kondisi[]" class="form-select form-select-sm w-auto">
                                            <option value="bagus" {{ $detail->kondisi === 'bagus' ? 'selected' : '' }}>Bagus</option>
                                            <option value="rusak" {{ $detail->kondisi === 'rusak' ? 'selected' : '' }}>Rusak</option>
                                        </select>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="text-end">
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-save"></i> Simpan Semua Perubahan
                        </button>
                    </div>
                </form>
            @endif
        </div>
    </div>
</div>
@endsection

@extends('admin/v_admin')

@section('judulhalaman', 'Detail Barang')
@section('title', 'Detail Barang')

@section('konten')
<div class="container mt-4">
    <a href="{{ route('barang.index') }}" class="btn btn-secondary mb-3">
        <i class="bi bi-arrow-left"></i> Kembali ke Daftar Barang
    </a>

    <div class="card shadow">
        <div class="card-header bg-dark text-white">
            <h5 class="mb-0">{{ $barang->namabarang }}</h5>
        </div>

        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-4 text-center">
                    @if($barang->gambar)
                        <img src="{{ asset('gambar_barang/' . $barang->gambar) }}" class="img-fluid rounded shadow-sm" alt="gambar barang">
                    @else
                        <div class="d-flex justify-content-center align-items-center rounded border" style="height: 250px; background-color: #f8f9fa;">
                            <span class="text-muted">Tidak ada gambar</span>
                        </div>
                    @endif
                </div>

                <div class="col-md-8">
                    <table class="table table-borderless">
                        <tr><th scope="row">Kode Barang</th><td>: {{ $barang->kodebarang }}</td></tr>
                        <tr><th scope="row">Nama</th><td>: {{ $barang->namabarang }}</td></tr>
                        <tr><th scope="row">Stok</th><td>: {{ $barang->stok }}</td></tr>
                        <tr><th scope="row">Tahun Pengajuan</th><td>: {{ $barang->tahunpengajuan }}</td></tr>
                        <tr><th scope="row">Harga</th><td>: Rp {{ number_format($barang->harga, 0, ',', '.') }}</td></tr>
                        <tr><th scope="row">Merk</th><td>: {{ $barang->merk }}</td></tr>
                        <tr><th scope="row">Jenis</th><td>: {{ $barang->jenisbarang }}</td></tr>
                        <tr><th scope="row">Deskripsi</th><td>: {{ $barang->deskripsi }}</td></tr>
                    </table>
                </div>
            </div>

            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle me-2"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
                    </div>
                @endif
                
                @if($barang->detail->isEmpty())
                    <div class="alert alert-warning" role="alert">
                        <i class="bi bi-exclamation-triangle me-2"></i> Belum ada detail untuk barang ini.
                    </div>
                @else
                    <h5 class="card-title mb-4">Daftar Detail Setiap Barang</h5>
                
                    <form action="{{ route('barangdetail.bulkUpdate') }}" method="POST">
                        @csrf
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped align-middle">
                                <thead class="table-dark text-center">
                                    <tr>
                                        <th style="width: 10%">ID</th>
                                        <th style="width: 40%">Kode Barang Detail</th>
                                        <th style="width: 50%">Kondisi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($barang->detail as $index => $detail)
                                        <tr>
                                            <td class="text-center">
                                                {{ $detail->idbarangdetail }}
                                                <input type="hidden" name="id[]" value="{{ $detail->idbarangdetail }}">
                                            </td>
                                            <td>{{ $detail->kodebarangdetail }}</td>
                                            <td>
                                                <select name="kondisi[]" class="form-select form-select-sm">
                                                    <option value="bagus" {{ $detail->kondisi === 'bagus' ? 'selected' : '' }}>Bagus</option>
                                                    <option value="rusak" {{ $detail->kondisi === 'rusak' ? 'selected' : '' }}>Rusak</option>
                                                </select>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                
                        <div class="text-end mt-3">
                            <button type="submit" class="btn btn-success">
                                <i class="bi bi-save me-1"></i> Simpan Perubahan
                            </button>
                        </div>
                    </form>
                @endif
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

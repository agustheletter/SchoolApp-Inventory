@extends('admin.v_admin')

@section('judulhalaman', 'Dashboard Sarpras')
@section('title', 'Dashboard Sarpras')

@section('konten')
<div class="container-fluid">
    <!-- Stat Boxes -->
    <div class="row">

        <!-- Total Barang -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $jumlahBarang }}</h3>
                    <p>Total Barang</p>
                </div>
                <div class="icon">
                    <i class="fas fa-box text-white"></i>
                </div>
                <a href="/barang" class="small-box-footer">
                    Lihat Detail <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <!-- Total Ruangan -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $jumlahRuangan }}</h3>
                    <p>Total Ruangan</p>
                </div>
                <div class="icon">
                    <i class="fas fa-door-open text-white"></i>
                </div>
                <a href="/ruangan" class="small-box-footer">
                    Lihat Detail <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <!-- Peminjaman Menunggu -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3 class="text-white">{{ $peminjamanMenunggu }}</h3>
                    <p class="text-white">Peminjaman Menunggu</p>
                </div>
                <div class="icon">
                    <i class="fas fa-hourglass-start text-white"></i>
                </div>
                <a href="/peminjamanbarang" class="small-box-footer text-white">
                    Lihat Detail <i class="fas fa-arrow-circle-right text-white"></i>
                </a>
            </div>
        </div>

        <!-- Peminjaman Sedang Dipinjam -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3 class="text-white">{{ $peminjamanDipinjam }}</h3>
                    <p class="text-white">Peminjaman Dipinjam</p>
                </div>
                <div class="icon">
                    <i class="fas fa-hand-holding text-white"></i>
                </div>
                <a href="/peminjamanbarang/sedangdipinjam" class="small-box-footer text-white">
                    Lihat Detail <i class="fas fa-arrow-circle-right text-white"></i>
                </a>
            </div>
        </div>

        <!-- Peminjaman Selesai -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3 class="text-white">{{ $peminjamanSelesai }}</h3>
                    <p class="text-white">Peminjaman Selesai</p>
                </div>
                <div class="icon">
                    <i class="fas fa-undo text-white"></i>
                </div>
                <a href="/history-peminjamanbarang" class="small-box-footer text-white">
                    Lihat Detail <i class="fas fa-arrow-circle-right text-white"></i>
                </a>
            </div>
        </div>

    </div>
</div>
@endsection

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangModel;
use App\Models\RuanganModel;
use App\Models\PinjamModel;
use App\Models\PinjamRuanganModel;
use App\Models\HistoryPeminjaman;
use App\Models\HistoryPeminjamanRuanganModel;

class HomeController extends Controller
{
    public function home()  
    {
        // Hitung total barang dan ruangan
        $jumlahBarang  = BarangModel::count('idbarang');
        $jumlahRuangan = RuanganModel::count('idruangan');

        // Hitung jumlah peminjaman dengan status tertentu dari dua sumber
        $peminjamanMenunggu = 
            PinjamRuanganModel::where('status', 'menunggu')->count() +
            PinjamModel::where('status', 'menunggu')->count();

        $peminjamanDipinjam = 
            PinjamRuanganModel::where('status', 'sedang dipinjam')->count() +
            PinjamModel::where('status', 'sedang dipinjam')->count();

        $peminjamanSelesai = 
            HistoryPeminjamanRuanganModel::where('status', 'selesai')->count() +
            HistoryPeminjaman::where('status', 'selesai')->count();

        // Kirim data ke view
        return view('admin.pages.v_home', compact(
            'jumlahBarang',
            'jumlahRuangan',
            'peminjamanMenunggu',
            'peminjamanDipinjam',
            'peminjamanSelesai'
        ));
    }

    public function about()
    {
        // mengirim data guru ke view guru
        return view('admin.pages.v_about');
    }

}

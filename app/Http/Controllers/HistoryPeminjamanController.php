<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HistoryPeminjaman;
use App\Models\SiswaModel;
use App\Models\User;
use App\Models\BarangModel;

class HistoryPeminjamanController extends Controller
{
    /**
     * Tampilkan daftar history peminjaman.
     */
    public function index()
    {
        $histories = HistoryPeminjaman::with(['siswa', 'petugas', 'barang'])->orderBy('waktukembali', 'desc')->get();

        return view('admin.pages.barang.v_historypeminjaman', compact('histories'));
    }
}

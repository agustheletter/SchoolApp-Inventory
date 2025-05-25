<?php

namespace App\Http\Controllers;

use App\Models\HistoryPeminjamanRuanganModel;
use Illuminate\Http\Request;

class HistoryPeminjamanRuanganController extends Controller
{
    public function index()
    {
        $histories = HistoryPeminjamanRuanganModel::with(['siswa', 'petugas', 'ruangan'])->orderBy('waktukembali', 'desc')->get();

        return view('admin.pages.ruangan.v_historypeminjaman', compact('histories'));
    }
}
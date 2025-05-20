<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PinjamDetailModel;
use App\Models\PinjamModel;
use App\Models\BarangModel;
use Illuminate\Support\Facades\DB;

class PinjamDetailController extends Controller
{
    /**
     * Tampilkan daftar detail pinjam berdasarkan ID pinjam.
     */
    public function index($idpinjam)
    {
        $pinjam = PinjamModel::with(['siswa', 'petugas', 'details.barang'])->findOrFail($idpinjam);
        return view('pinjamdetail.index', compact('pinjam'));
    }

    /**
     * Tampilkan form tambah detail peminjaman.
     */
    public function create($idpinjam)
    {
        $barangList = BarangModel::where('stok', '>', 0)->get();
        return view('pinjamdetail.create', compact('barangList', 'idpinjam'));
    }

    /**
     * Simpan data detail peminjaman.
     */
    public function store(Request $request)
    {
        $request->validate([
            'idpinjam' => 'required|exists:tbl_pinjam,idpinjam',
            'idbarang' => 'required|exists:tbl_barang,idbarang',
        ]);

        DB::beginTransaction();

        try {
            // Cek stok dulu
            $barang = BarangModel::findOrFail($request->idbarang);
            if ($barang->stok < 1) {
                return redirect()->back()->with('error', 'Stok barang habis.');
            }

            // Tambahkan ke detail peminjaman
            PinjamDetailModel::create([
                'idpinjam' => $request->idpinjam,
                'idbarang' => $request->idbarang,
            ]);

            // Kurangi stok
            $barang->decrement('stok');

            DB::commit();
            return redirect()->route('pinjamdetail.index', $request->idpinjam)->with('success', 'Detail peminjaman ditambahkan.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menyimpan detail: ' . $e->getMessage());
        }
    }

    /**
     * Hapus detail peminjaman.
     */
    public function destroy($id)
    {
        $detail = PinjamDetailModel::findOrFail($id);

        DB::beginTransaction();

        try {
            // Kembalikan stok barang
            $barang = BarangModel::find($detail->idbarang);
            if ($barang) {
                $barang->increment('stok');
            }

            // Hapus detail
            $detail->delete();

            DB::commit();
            return redirect()->back()->with('success', 'Detail peminjaman dihapus.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menghapus detail: ' . $e->getMessage());
        }
    }
}
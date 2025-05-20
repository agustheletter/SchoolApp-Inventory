<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PinjamModel;
use App\Models\PinjamDetailModel;
use App\Models\BarangModel;
use Illuminate\Support\Facades\DB;

class PinjamController extends Controller
{
    /**
     * Tampilkan daftar peminjaman menunggu konfirmasi (admin).
     */
    public function index()
    {
        // Ambil data peminjaman dengan status "menunggu"
        $pinjams = PinjamModel::with(['siswa', 'petugas'])
            ->where('status', 'menunggu')
            ->latest()
            ->get();

        return view('admin.pages.barang.v_pinjamtampil', compact('pinjams'));
    }


    /**
     * Simpan data peminjaman (front-end user).
     */
    public function store(Request $request)
    {
        $request->validate([
            'idsiswa'       => 'required|exists:tbl_siswa,idsiswa',
            'idpetugas'     => 'required|exists:users,id',
            'barang_id'     => 'required|array',
            'barang_id.*'   => 'exists:tbl_barang,idbarang',
        ]);

        DB::beginTransaction();

        try {
            $pinjam = PinjamModel::create([
                'idsiswa'     => $request->idsiswa,
                'idpetugas'   => $request->idpetugas,
                'waktupinjam' => now(),
            ]);

            foreach ($request->barang_id as $idbarang) {
                PinjamDetailModel::create([
                    'idpinjam' => $pinjam->idpinjam,
                    'idbarang' => $idbarang,
                ]);

                $barang = BarangModel::find($idbarang);
                if ($barang && $barang->stok > 0) {
                    $barang->decrement('stok');
                }
            }

            DB::commit();
            return redirect()->back()->with('success', 'Peminjaman berhasil disimpan.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Konfirmasi peminjaman oleh admin.
     */
    public function konfirmasi($id)
    {
        $pinjam = PinjamModel::findOrFail($id);
        $pinjam->status = 'dikonfirmasi';
        $pinjam->save();

        // Redirect kembali ke daftar peminjaman
        return redirect()->route('pinjam.index')
            ->with('success', 'Peminjaman berhasil dikonfirmasi.');
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PinjamModel;
use App\Models\BarangModel;
use App\Models\SiswaModel;
use App\Models\HistoryPeminjaman;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class PinjamController extends Controller
{
    /**
     * Tampilkan daftar peminjaman menunggu konfirmasi (admin).
     */
    public function index()
    {
        $pinjams = PinjamModel::with(['siswa', 'petugas', 'barang'])->where('status', 'menunggu')->get();
        $siswas = SiswaModel::all();
        $petugas = User::all();
        $barangs = BarangModel::all();
        return view('admin.pages.barang.v_pinjamtampil', compact('pinjams', 'siswas', 'petugas', 'barangs'));
    }

    /**
     * Tampilkan daftar peminjaman (front-end user).
     */

    public function dipinjam()
    {
        $pinjams = PinjamModel::with(['siswa', 'petugas', 'barang'])->where('status', 'sedang dipinjam')->get();
        $siswas = SiswaModel::all();
        $petugas = User::all();
        $barangs = BarangModel::all();
        return view('admin.pages.barang.v_dipinjamtampil', compact('pinjams', 'siswas', 'petugas', 'barangs'));
    }
    /**
     * Tampilkan form tambah peminjaman.
     */
    public function create()
    {
        $siswas  = SiswaModel::all();
        $petugas = User::all();
        $barangs = BarangModel::all();

        return view('admin.pages.barang.v_pinjamtambah', compact('siswas', 'petugas', 'barangs'));
    }

    /**
     * Simpan data peminjaman (front-end user).
     */
public function store(Request $request)
{
    $request->validate([
        'idsiswa'     => 'required|exists:tbl_siswa,idsiswa',
        'idpetugas'   => 'required|exists:users,id',
        'idbarang'    => 'required|exists:tbl_barang,idbarang',
        'waktupinjam' => 'required|date',
    ]);

    DB::beginTransaction();

    try {
        $pinjam = PinjamModel::create([
            'idsiswa'     => $request->idsiswa,
            'idpetugas'   => $request->idpetugas,
            'idbarang'    => $request->idbarang,
            'waktupinjam' => $request->waktupinjam,
            'status'      => 'menunggu',
        ]);

        $barang = BarangModel::find($request->idbarang);
        if ($barang && $barang->stok > 0) {
            $barang->decrement('stok');
        } else {
            throw new \Exception("Stok barang tidak mencukupi.");
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
        $pinjam->status = 'sedang dipinjam';
        $pinjam->save();

        return redirect()->back()->with('success', 'Status peminjaman berhasil diubah.');
    }

    public function kembalikan($id){
        DB::beginTransaction();

        try {
            $pinjam = PinjamModel::findOrFail($id);

            // Tambahkan ke history
            HistoryPeminjaman::create([
                'idpinjam'     => $pinjam->idpinjam,
                'idsiswa'      => $pinjam->idsiswa,
                'idpetugas'    => $pinjam->idpetugas,
                'idbarang'     => $pinjam->idbarang,
                'waktupinjam'  => $pinjam->waktupinjam,
                'waktukembali' => now(),
                'status'       => 'selesai',
                'created_at'   => now(),
                'updated_at'   => now(),
            ]);

            // Kembalikan stok barang
            $barang = BarangModel::find($pinjam->idbarang);
            if ($barang) {
                $barang->increment('stok');
            }

            // Hapus dari pinjam
            $pinjam->delete();

            DB::commit();

            return redirect()->back()->with('success', 'Barang berhasil dikembalikan dan dipindahkan ke histori.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal mengembalikan: ' . $e->getMessage());
        }
    }
}
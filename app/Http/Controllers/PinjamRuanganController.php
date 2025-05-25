<?php

namespace App\Http\Controllers;

use App\Models\HistoryPeminjamanRuanganModel;
use App\Models\PinjamRuangan;    // pastikan ini sesuai nama model-mu
use App\Models\PinjamRuanganModel;
use App\Models\Siswa;            // atau SiswaModel jika begitu namanya
use App\Models\Ruangan;          // atau RuanganModel
use App\Models\RuanganModel;
use App\Models\SiswaModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PinjamRuanganController extends Controller
{
    /**
     * Daftar request peminjaman ruangan (menunggu konfirmasi).
     */
    public function index()
    {
        $pinjams = PinjamRuanganModel::with(['siswa', 'petugas', 'ruangan'])
            ->where('status', 'menunggu')
            ->orderBy('waktupinjam', 'desc')
            ->paginate(5);

        return view('admin.pages.ruangan.v_pinjamtampil', compact('pinjams'));
    }

    /**
     * Daftar ruangan yang sedang dipinjam.
     */
    public function dipinjam()
    {
        $pinjams = PinjamRuanganModel::with(['siswa', 'petugas', 'ruangan'])
            ->where('status', 'sedang dipinjam')
            ->orderBy('waktupinjam', 'desc')
            ->paginate(5);

        return view('admin.pages.ruangan.v_dipinjamtampil', compact('pinjams'));
    }

    /**
     * Form tambah peminjaman ruangan.
     */
    public function create()
    {
        $siswas   = SiswaModel::all();
        $petugas  = User::all();
        $ruangans = RuanganModel::all();

        return view('admin.pages.ruangan.v_pinjamtambah', compact('siswas', 'petugas', 'ruangans'));
    }

    /**
     * Simpan data peminjaman ruangan.
     */
    public function store(Request $request)
    {
        $request->validate([
            'idsiswa'     => 'required|exists:tbl_siswa,idsiswa',
            'idpetugas'   => 'required|exists:users,id',
            'idruangan'   => 'required|exists:tbl_ruangan,idruangan',
            'waktupinjam' => 'required|date',
        ]);

        try {
            DB::transaction(function () use ($request) {
                PinjamRuanganModel::create([
                    'idsiswa'     => $request->idsiswa,
                    'idpetugas'   => $request->idpetugas,
                    'idruangan'   => $request->idruangan,
                    'waktupinjam' => $request->waktupinjam,
                    'status'      => 'menunggu',
                ]);
            });

            return redirect()
                ->route('pinjamruangan.index')
                ->with('success', 'Peminjaman ruangan berhasil disimpan.');
        } catch (\Throwable $e) {
            return back()->withInput()
                ->with('error', 'Gagal menyimpan peminjaman: ' . $e->getMessage());
        }
    }

    /**
     * Konfirmasi peminjaman (ubah status ke "sedang dipinjam").
     */
    public function konfirmasi($id)
    {
        $pinjam = PinjamRuanganModel::find($id);

        if (! $pinjam) {
            return back()->with('error', 'Data peminjaman tidak ditemukan.');
        }

        $pinjam->update(['status' => 'sedang dipinjam']);

        return back()->with('success', 'Peminjaman ruangan berhasil dikonfirmasi.');
    }

    /**
     * Kembalikan ruangan (hapus record peminjaman).
     */
    public function kembalikan($id)
    {
        DB::beginTransaction();

        try {
            $pinjam = PinjamRuanganModel::findOrFail($id);

            // Buat history
            HistoryPeminjamanRuanganModel::create([
                'idpinjam'     => $pinjam->idpinjam,
                'idsiswa'      => $pinjam->idsiswa,
                'idpetugas'    => $pinjam->idpetugas,
                'idruangan'    => $pinjam->idruangan,
                'waktupinjam'  => $pinjam->waktupinjam,
                'waktukembali' => now(),
                'status'       => 'selesai',
            ]);

            // Hapus peminjaman aktif
            $pinjam->delete();

            DB::commit();

            return redirect()->back()
                ->with('success', 'Ruangan berhasil dikembalikan dan dipindahkan ke histori.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Gagal mengembalikan: ' . $e->getMessage());
        }
    }
}
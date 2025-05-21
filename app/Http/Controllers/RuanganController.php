<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RuanganModel;
use Illuminate\Support\Facades\File;

class RuanganController extends Controller
{
    /**
     * Tampilkan daftar ruangan.
     */
    public function index()
    {
        $ruangan = RuanganModel::paginate(5);
        return view('admin.pages.ruangan.v_ruangan', ['ruangan' => $ruangan]);
    }

    public function user()
    {
        $ruangan = RuanganModel::paginate(5);
        return view('admin.pages.ruangan.user.v_userruangan', ['ruangan' => $ruangan]);
    }

    /**
     * Tampilkan form tambah ruangan.
     */
    public function create()
    {
        return view('admin.pages.ruangan.v_ruangantambah');
    }

    /**
     * Simpan ruangan baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'koderuangan' => 'required|unique:tbl_ruangan',
            'namaruangan' => 'required|string',
            'jumlah' => 'required|integer',
            'lokasi' => 'nullable|string',
            'deskripsi' => 'nullable|string',
            'status' => 'required|in:tersedia,dipinjam', // ✅ Tambah ini
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);


        $data = $request->all();

        // Handle upload gambar
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('gambar_ruangan'), $namaFile);
            $data['gambar'] = $namaFile;
        }

        RuanganModel::create($data);

        return redirect()->route('ruangan.index')->with('success', 'Ruangan berhasil ditambahkan');
    }

    /**
     * Tampilkan detail ruangan.
     */
    public function show($idruangan)
    {
        $ruangan = RuanganModel::findOrFail($idruangan);
        return view('admin.pages.ruangan.v_ruangantampil', compact('ruangan'));
    }

    /**
     * Tampilkan form edit ruangan.
     */
    public function edit($idruangan)
    {
        $ruangan = RuanganModel::findOrFail($idruangan);
        return view('admin.pages.ruangan.v_ruanganedit', compact('ruangan'));
    }

    /**
     * Simpan perubahan ruangan.
     */
    public function update(Request $request, $idruangan)
    {
        $request->validate([
            'koderuangan' => 'required|unique:tbl_ruangan,koderuangan,' . $idruangan . ',idruangan',
            'namaruangan' => 'required|string',
            'jumlah' => 'required|integer',
            'lokasi' => 'nullable|string',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status' => 'required|in:tersedia,dipinjam',
        ]);

        $ruangan = RuanganModel::findOrFail($idruangan);
        $data = $request->all();

        // Update gambar jika diunggah
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            $oldImage = public_path('gambar_ruangan/' . $ruangan->gambar);
            if (File::exists($oldImage)) {
                File::delete($oldImage);
            }

            $file = $request->file('gambar');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('gambar_ruangan'), $namaFile);
            $data['gambar'] = $namaFile;
        }

        $ruangan->update($data);

        return redirect()->route('ruangan.index')->with('success', 'Ruangan berhasil diperbarui');
    }

    /**
     * Hapus ruangan (SoftDeletes).
     */
    public function destroy($idruangan)
    {
        $ruangan = RuanganModel::findOrFail($idruangan);
        $ruangan->delete();

        return redirect()->route('ruangan.index')->with('success', 'Ruangan berhasil dihapus');
    }

    /**
     * Tampilkan ruangan yang sudah dihapus (SoftDeletes).
     */
    public function trash()
    {
        $ruangan = RuanganModel::onlyTrashed()->get();
        return view('admin.pages.ruangan.v_ruangansampah', compact('ruangan'));
    }

    /**
     * Pulihkan ruangan yang dihapus.
     */
    public function restore($idruangan)
    {
        $ruangan = RuanganModel::onlyTrashed()->where('idruangan', $idruangan)->firstOrFail();
        $ruangan->restore();

        return redirect()->route('ruangan.index')->with('success', 'Ruangan berhasil dipulihkan');
    }

    /**
     * Hapus ruangan secara permanen.
     */
    public function forceDelete($idruangan)
    {
        $ruangan = RuanganModel::onlyTrashed()->where('idruangan', $idruangan)->firstOrFail();
        $ruangan->forceDelete();

        return redirect()->route('ruangan.trash')->with('success', 'Ruangan dihapus secara permanen');
    }

    /**
     * Fungsi pencarian ruangan.
     */
    public function cari(Request $request)
    {
        $keyword = $request->cari;

        $ruangan = RuanganModel::where('namaruangan', 'like', "%{$keyword}%")
            ->orWhere('koderuangan', 'like', "%{$keyword}%")
            ->paginate(5)
            ->appends(['cari' => $keyword]);

        return view('admin.pages.ruangan.v_ruangan', compact('ruangan'));
    }

        public function usercari(Request $request)
    {
        $keyword = $request->cari;

        $ruangan = RuanganModel::where('namaruangan', 'like', "%{$keyword}%")
            ->orWhere('koderuangan', 'like', "%{$keyword}%")
            ->paginate(5)
            ->appends(['cari' => $keyword]);

        return view('admin.pages.ruangan.user.v_userruangan', compact('ruangan'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangModel;
use Illuminate\Support\Facades\File;

class BarangController extends Controller
{
    /**
     * Tampilkan daftar barang.
     */
    public function index()
    {
        $barang = BarangModel::paginate(5);
        return view('admin.pages.barang.v_barang', ['barang'=>$barang]);
    }

    public function user()
    {
        $barang = BarangModel::paginate(5);
        return view('admin.pages.barang.user.v_userbarang', ['barang'=>$barang]);
    }

    /**
     * Tampilkan form tambah barang.
     */
    public function create()
    {
        return view('admin.pages.barang.v_barangtambah');
    }

    /**
     * Simpan barang baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kodebarang' => 'required|unique:tbl_barang',
            'namabarang' => 'required',
            'stok' => 'required|integer',
            'tahunpengajuan' => 'required|digits:4',
            'harga' => 'required|numeric',
            'merk' => 'nullable|string',
            'jenisbarang' => 'required|string',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
    
        $data = $request->all();
    
        // Handle upload gambar
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('gambar_barang'), $namaFile);
            $data['gambar'] = $namaFile;
        }
    
        BarangModel::create($data);
    
        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan');
    }
    

    /**
     * Tampilkan detail barang.
     */
    public function show($idbarang)
    {
        $barang = BarangModel::findOrFail($idbarang);
        return view('admin.pages.barang.v_barangtampil', compact('barang'));
    }

    public function usershow($id)
    {
        // Ambil data barang berdasarkan id
        $barang = BarangModel::find($id);
        
        // Tampilkan data atau lakukan hal lain
        return view('admin.pages.barang.user.v_userbarangtampil', compact('barang'));
    }
    
    /**
     * Tampilkan form edit barang.
     */
    public function edit($idbarang)
    {
        $barang = BarangModel::findOrFail($idbarang);
        return view('admin.pages.barang.v_barangedit', compact('barang'));
    }

    /**
     * Simpan perubahan barang.
     */
    public function update(Request $request, $idbarang)
    {
        $request->validate([
            'kodebarang' => 'required|unique:tbl_barang,kodebarang,' . $idbarang . ',idbarang',
            'namabarang' => 'required',
            'stok' => 'required|integer',
            'tahunpengajuan' => 'required|digits:4',
            'harga' => 'required|numeric',
            'merk' => 'nullable|string',
            'jenisbarang' => 'required|string',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
    
        $barang = BarangModel::findOrFail($idbarang);
        $data = $request->all();
    
        // Update gambar jika diunggah
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            $oldImage = public_path('gambar_barang/' . $barang->gambar);
            if (File::exists($oldImage)) {
                File::delete($oldImage);
            }
    
            $file = $request->file('gambar');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('gambar_barang'), $namaFile);
            $data['gambar'] = $namaFile;
        }
    
        $barang->update($data);
    
        return redirect()->route('barang.index')->with('success', 'Barang berhasil diperbarui');
    }
    

    /**
     * Hapus barang (SoftDeletes).
     */
    public function destroy($idbarang)
    {
        $barang = BarangModel::findOrFail($idbarang);
        $barang->delete();

        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus');
    }

    /**
     * Tampilkan barang yang sudah dihapus (SoftDeletes).
     */
    public function trash()
    {
        $barang = BarangModel::onlyTrashed()->get();
        return view('admin.pages.barang.v_barangsampah', compact('barang'));
    }

    /**
     * Pulihkan barang yang dihapus.
     */
    public function restore($idbarang)
    {
        $barang = BarangModel::onlyTrashed()->where('idbarang', $idbarang)->firstOrFail();
        $barang->restore();

        return redirect()->route('barang.index')->with('success', 'Barang berhasil dipulihkan');
    }

    /**
     * Hapus barang secara permanen.
     */
    public function forceDelete($idbarang)
    {
        $barang = BarangModel::onlyTrashed()->where('idbarang', $idbarang)->firstOrFail();
        $barang->forceDelete();
        
        return redirect()->route('barang.trash')->with('success', 'Barang dihapus secara permanen');
    }

    public function detail($idbarang)
    {
        $barang = BarangModel::with('details')->findOrFail($idbarang);
        return view('admin.pages.barang.v_barangtampil', compact('barang'));
    }

    public function cari(Request $request)
    {
        $keyword = $request->cari;

        $barang = BarangModel::where('namabarang', 'like', "%{$keyword}%")
                    ->orWhere('kodebarang', 'like', "%{$keyword}%")
                    ->orWhere('merk', 'like', "%{$keyword}%")
                    ->paginate(5)
                    ->appends(['cari' => $keyword]); // ini penting agar query ?cari tetap terbawa saat ganti halaman

        return view('admin.pages.barang.v_barang', compact('barang'));
    }

    public function usercari(Request $request)
    {
        $keyword = $request->cari;

        $barang = BarangModel::where('namabarang', 'like', "%{$keyword}%")
                    ->orWhere('kodebarang', 'like', "%{$keyword}%")
                    ->orWhere('merk', 'like', "%{$keyword}%")
                    ->paginate(5)
                    ->appends(['cari' => $keyword]); // ini penting agar query ?cari tetap terbawa saat ganti halaman

        return view('admin.pages.barang.user.v_userbarang', compact('barang'));
    }

}

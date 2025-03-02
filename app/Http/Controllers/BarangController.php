<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangModel;

class BarangController extends Controller
{
    /**
     * Tampilkan daftar barang.
     */
    public function index()
    {
        $barang = BarangModel::all();
        return view('admin.pages.barang.v_barang', compact('barang'));
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
        ]);

        BarangModel::create($request->all());

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
        ]);

        $barang = BarangModel::findOrFail($idbarang);
        $barang->update($request->all());

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
}

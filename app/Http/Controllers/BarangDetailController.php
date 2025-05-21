<?php

namespace App\Http\Controllers;

use App\Models\BarangDetailModel;
use Illuminate\Http\Request;

class BarangDetailController extends Controller
{
    public function bulkUpdate(Request $request)
    {
        $ids = $request->input('id');
        $kondisis = $request->input('kondisi');
        $statuses = $request->input('status');

        foreach ($ids as $index => $id) {
            $detail = BarangDetailModel::find($id);
            if ($detail) {
                $detail->kondisi = $kondisis[$index];
                $detail->status = $statuses[$index];
                $detail->save();
            }
        }

        return redirect()->back()->with('success', 'Daftar barang berhasil diperbarui.');
    }


    public function destroydetail($id)
    {
        $detail = BarangDetailModel::findOrFail($id);
        $detail->delete();

        return redirect()->back()->with('success', 'Detail barang berhasil dihapus.');
    }

}

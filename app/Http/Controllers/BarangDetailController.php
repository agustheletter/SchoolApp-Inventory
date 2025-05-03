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

        foreach ($ids as $index => $id) {
            $detail = BarangDetailModel::find($id); // gunakan model yang sudah diimport
            if ($detail) {
                $detail->kondisi = $kondisis[$index];
                $detail->save();
            }
        }

        return redirect()->back()->with('success', 'Kondisi detail barang berhasil diperbarui.');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\BarangDetailModel;


class BarangModel extends Model
{
    use HasFactory, SoftDeletes; // Gunakan SoftDeletes

    protected $table = 'tbl_barang';
    protected $primaryKey = 'idbarang';
    public $timestamps = true;

    protected $fillable = [
        'kodebarang',
        'namabarang',
        'stok',
        'tahunpengajuan',
        'harga',
        'merk',
        'jenisbarang',
        'deskripsi',
        'gambar',
    ];

    protected $dates = ['deleted_at']; // Tambahkan deleted_at ke format tanggal

    public function detail()
    {
        return $this->hasMany(BarangDetailModel::class, 'idbarang');
    }


    protected static function booted()
    {
        static::created(function ($barang) {
            for ($i = 1; $i <= $barang->stok; $i++) {
                BarangDetailModel::create([
                    'idbarang' => $barang->idbarang,
                    'kodebarangdetail' => $barang->kodebarang . '-' . str_pad($i, 3, '0', STR_PAD_LEFT),
                    'kondisi' => 'bagus',
                ]);
            }
        });
    }

    public function details()
    {
        return $this->hasMany(BarangDetailModel::class, 'idbarang');
    }

}
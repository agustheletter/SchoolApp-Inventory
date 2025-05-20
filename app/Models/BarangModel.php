<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\BarangDetailModel;
use App\Models\JurusanModel;

class BarangModel extends Model
{
    use HasFactory, SoftDeletes;

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
        'idjurusan', // Tambahkan ini agar bisa mass assign
    ];

    // Relasi ke detail barang
    public function detail()
    {
        return $this->hasMany(BarangDetailModel::class, 'idbarang', 'idbarang');
    }

    // Relasi ke jurusan
    public function jurusan()
    {
        return $this->belongsTo(JurusanModel::class, 'idjurusan', 'idjurusan');
    }

    // Auto generate barang detail saat barang dibuat
    protected static function booted()
    {
        static::created(function ($barang) {
            if ($barang->stok > 0) {
                for ($i = 1; $i <= $barang->stok; $i++) {
                    BarangDetailModel::create([
                        'idbarang' => $barang->idbarang,
                        'kodebarangdetail' => $barang->kodebarang . '-' . str_pad($i, 3, '0', STR_PAD_LEFT),
                        'kondisi' => 'bagus',
                    ]);
                }
            }
        });
    }
}
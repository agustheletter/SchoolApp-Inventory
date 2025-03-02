<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // Import SoftDeletes

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
    ];

    protected $dates = ['deleted_at']; // Tambahkan deleted_at ke format tanggal
}
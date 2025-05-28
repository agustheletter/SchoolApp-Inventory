<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\JurusanModel;

class RuanganModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tbl_ruangan';
    protected $primaryKey = 'idruangan';
    public $timestamps = true;

    protected $fillable = [
        'koderuangan',
        'namaruangan',
        'jumlah', 
        'kapasitas',
        'lokasi',
        'deskripsi',
        'gambar',
        'status',
        'idjurusan',
    ];


    // Relasi ke jurusan
    public function jurusan()
    {
        return $this->belongsTo(JurusanModel::class, 'idjurusan', 'idjurusan');
    }
}

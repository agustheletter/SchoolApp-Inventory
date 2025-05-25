<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PinjamRuanganModel extends Model
{
    use SoftDeletes;

    protected $table = 'tbl_pinjam_ruangan';
    protected $primaryKey = 'idpinjam';

    protected $fillable = [
        'idsiswa',
        'idpetugas',
        'idruangan',
        'waktupinjam',
        'status'
    ];

    // Relasi ke siswa
    public function siswa()
    {
        return $this->belongsTo(SiswaModel::class, 'idsiswa', 'idsiswa');
    }

    // Relasi ke petugas (users)
    public function petugas()
    {
        return $this->belongsTo(User::class, 'idpetugas', 'id');
    }

    // Relasi ke ruangan
    public function ruangan()
    {
        return $this->belongsTo(RuanganModel::class, 'idruangan', 'idruangan');
    }
}
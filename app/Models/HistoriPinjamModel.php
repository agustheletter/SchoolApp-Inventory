<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistoriPinjamModel extends Model
{
    protected $table = 'tbl_pinjamhistori';
    protected $primaryKey = 'idhistori';

    protected $fillable = [
        'idpinjam',
        'idsiswa',
        'idpetugas',
        'aksi',
        'keterangan',
        'waktu',
    ];

    // Relasi ke pinjam
    public function pinjam()
    {
        return $this->belongsTo(PinjamModel::class, 'idpinjam', 'idpinjam');
    }

    // Relasi ke siswa
    public function siswa()
    {
        return $this->belongsTo(SiswaModel::class, 'idsiswa', 'idsiswa');
    }

    // Relasi ke petugas
    public function petugas()
    {
        return $this->belongsTo(User::class, 'idpetugas', 'id');
    }
}

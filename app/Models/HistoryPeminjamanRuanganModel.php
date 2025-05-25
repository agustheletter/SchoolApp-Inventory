<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistoryPeminjamanRuanganModel extends Model
{
    protected $table = 'tbl_history_peminjaman_ruangan';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'idpinjam',
        'idsiswa',
        'idpetugas',
        'idruangan',
        'waktupinjam',
        'waktukembali',
        'status',
    ];

    protected $dates = ['waktupinjam', 'waktukembali'];

    public function siswa()
    {
        return $this->belongsTo(SiswaModel::class, 'idsiswa', 'idsiswa');
    }

    public function petugas()
    {
        return $this->belongsTo(User::class, 'idpetugas', 'id');
    }

    public function ruangan()
    {
        return $this->belongsTo(RuanganModel::class, 'idruangan', 'idruangan');
    }
}
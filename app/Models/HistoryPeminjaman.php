<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistoryPeminjaman extends Model
{
    protected $table = 'history_peminjaman';

    protected $fillable = [
        'idpinjam',
        'idsiswa',
        'idpetugas',
        'idbarang',
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

    public function barang()
    {
        return $this->belongsTo(BarangModel::class, 'idbarang', 'idbarang');
    }
}


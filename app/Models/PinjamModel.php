<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PinjamModel extends Model
{
    use SoftDeletes;

    protected $table = 'tbl_pinjam';
    protected $primaryKey = 'idpinjam';

    protected $fillable = [
        'idsiswa',
        'idpetugas',
        'waktupinjam',
        'status',
    ];

    public function siswa()
    {
        return $this->belongsTo(SiswaModel::class, 'idsiswa', 'idsiswa');
    }

    public function petugas()
    {
        return $this->belongsTo(User::class, 'idpetugas', 'id');
    }
}
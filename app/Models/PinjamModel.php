<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PinjamModel extends Model
{
    use SoftDeletes;

    protected $table = 'tbl_pinjam';
    protected $primaryKey = 'idpinjam';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'idpinjam',
        'idsiswa',
        'idpetugas',
        'idbarang',
        'waktupinjam',
        'status',
    ];

    protected $dates = ['deleted_at'];

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

    // Relasi ke detail pinjam
    public function details()
    {
        return $this->hasMany(PinjamDetailModel::class, 'idpinjam', 'idpinjam');
    }

    // Relasi ke barang
    public function barang()
    {
        return $this->belongsTo(BarangModel::class, 'idbarang', 'idbarang');
    }

}

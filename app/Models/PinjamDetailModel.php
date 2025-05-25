<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PinjamDetailModel extends Model
{
    use SoftDeletes;

    protected $table = 'tbl_pinjamdetail';
    protected $primaryKey = 'idpinjamdetail';

    protected $fillable = [
        'idpinjam',
        'idbarang',
    ];

    // Relasi ke tabel pinjam
    public function pinjam()
    {
        return $this->belongsTo(PinjamModel::class, 'idpinjam', 'idpinjam');
    }

    // Relasi ke tabel barang
    public function barang()
    {
        return $this->belongsTo(BarangModel::class, 'idbarang', 'idbarang');
    }

}
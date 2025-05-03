<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BarangDetailModel extends Model
{
    protected $table = 'tbl_barang_detail';
    protected $primaryKey = 'idbarangdetail';
    public $timestamps = true;

    protected $fillable = [
        'idbarang',
        'kodebarangdetail',
        'kondisi',
    ];

    public function barang()
    {
        return $this->belongsTo(BarangModel::class, 'idbarang', 'idbarang');
    }
}

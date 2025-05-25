<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateHistoriPinjamTable extends Migration
{
    public function up()
    {
        Schema::create('tbl_history_peminjaman', function (Blueprint $table) {
           $table->id('idhistori');
            $table->unsignedBigInteger('idpinjam');
            $table->unsignedBigInteger('idsiswa');
            $table->unsignedBigInteger('idpetugas');
            $table->unsignedBigInteger('idbarang');
            $table->timestamp('waktupinjam');
            $table->timestamp('waktukembali')->nullable();
            $table->enum('status', ['menunggu konfirmasi', 'dipinjam', 'dikembalikan']);
            $table->timestamps();
            $table->softDeletes();

            // Foreign keys
            $table->foreign('idpinjam')->references('idpinjam')->on('tbl_pinjam')->onDelete('cascade');
            $table->foreign('idsiswa')->references('idsiswa')->on('tbl_siswa')->onDelete('cascade');
            $table->foreign('idbarang')->references('idbarang')->on('tbl_barang')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tbl_histori_pinjam');
    }
}

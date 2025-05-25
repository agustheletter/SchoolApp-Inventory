<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tbl_history_peminjaman_ruangan', function (Blueprint $table) {
            $table->id(); // `id` (bigint, auto increment)
            $table->unsignedBigInteger('idpinjam');
            $table->unsignedBigInteger('idsiswa');
            $table->unsignedBigInteger('idpetugas');
            $table->unsignedBigInteger('idruangan');
            $table->timestamp('waktupinjam')->nullable();
            $table->timestamp('waktukembali')->nullable();
            $table->string('status', 50);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tbl_history_peminjaman_ruangan');
    }
};
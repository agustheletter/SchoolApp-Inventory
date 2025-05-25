<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryPeminjamanTable extends Migration
{
    public function up()
    {
        Schema::create('history_peminjaman', function (Blueprint $table) {
            $table->id(); // `id` (bigint, auto increment)
            $table->unsignedBigInteger('idpinjam');
            $table->unsignedBigInteger('idsiswa');
            $table->unsignedBigInteger('idpetugas');
            $table->unsignedBigInteger('idbarang');
            $table->timestamp('waktupinjam')->nullable();
            $table->timestamp('waktukembali')->nullable();
            $table->string('status', 50);
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('history_peminjaman');
    }
}

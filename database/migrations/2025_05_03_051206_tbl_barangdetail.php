<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tbl_barang_detail', function (Blueprint $table) {
            $table->id('idbarangdetail'); // Primary key
            $table->unsignedBigInteger('idbarang'); // Foreign key ke tbl_barang
            $table->string('kodebarangdetail')->unique();
            $table->enum('kondisi', ['bagus', 'rusak'])->default('bagus');
            $table->enum('status', ['tersedia', 'dipinjam'])->default('tersedia');
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('idbarang')->references('idbarang')->on('tbl_barang')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tbl_barang_detail');
    }
};
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tbl_pinjamdetail', function (Blueprint $table) {
            $table->id('idpinjamdetail');
            $table->unsignedBigInteger('idpinjam');
            $table->unsignedBigInteger('idbarang');
            $table->timestamps();
            $table->softDeletes();

            // Foreign key ke tabel tbl_pinjam dan tbl_barang
            $table->foreign('idpinjam')->references('idpinjam')->on('tbl_pinjam')->onDelete('cascade');
            $table->foreign('idbarang')->references('idbarang')->on('tbl_barang')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_pinjamdetail');
    }
};
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
        Schema::create('tbl_pinjam', function (Blueprint $table) {
            $table->id('idpinjam');
            $table->unsignedBigInteger('idsiswa');
            $table->unsignedBigInteger('idpetugas');
            $table->timestamp('waktupinjam')->useCurrent();
            $table->string('status')->default('menunggu'); // Tambahkan status di sini
            $table->timestamps();
            $table->softDeletes();

            // Foreign key ke tabel siswa dan admin (users)
            $table->foreign('idsiswa')->references('idsiswa')->on('tbl_siswa')->onDelete('cascade');
            $table->foreign('idpetugas')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_pinjam');
    }
};
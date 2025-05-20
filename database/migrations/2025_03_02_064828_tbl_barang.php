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
        Schema::create('tbl_barang', function (Blueprint $table) {
            $table->id('idbarang'); // Primary key auto-increment
            $table->string('kodebarang')->unique();
            $table->string('namabarang');
            $table->integer('stok');
            $table->year('tahunpengajuan');
            $table->decimal('harga', 15, 2);
            $table->string('merk')->nullable();
            $table->string('jenisbarang');
            $table->text('deskripsi')->nullable();
            $table->string('gambar')->nullable();
            $table->timestamps(); // Kolom created_at & updated_at
            $table->softDeletes(); // Kolom deleted_at untuk SoftDeletes

            $table->unsignedInteger('idjurusan')->nullable(); // tambahkan ini
            $table->foreign('idjurusan')->references('idjurusan')->on('tbl_jurusan')->onDelete('set null'); // dan ini

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_barang', function (Blueprint $table) {
            $table->dropSoftDeletes(); // Menghapus kolom deleted_at
        });
    }
};
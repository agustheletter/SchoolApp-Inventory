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
            $table->timestamps(); // Kolom created_at & updated_at
            $table->softDeletes(); // Kolom deleted_at untuk SoftDeletes
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_barang');
    }
};

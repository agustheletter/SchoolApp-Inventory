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
        Schema::create('tbl_ruangan', function (Blueprint $table) {
            $table->id('idruangan'); // Primary key auto-increment
            $table->string('koderuangan')->unique();
            $table->string('namaruangan');
            $table->integer('jumlah');
            $table->string('lokasi')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('gambar')->nullable();
            $table->enum('status', ['tersedia', 'dipinjam'])->default('tersedia');
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
        Schema::table('tbl_ruangan', function (Blueprint $table) {
            $table->dropSoftDeletes(); // Menghapus kolom deleted_at
        });
    }
};

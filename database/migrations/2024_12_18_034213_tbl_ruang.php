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
            $table->increments('idruangan');
            $table->string('koderuangan');
            $table->string('namaruangan');
            $table->string('lokasi');
            $table->integer('lebar');
            $table->integer('panjang');
            $table->string('kondisi');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

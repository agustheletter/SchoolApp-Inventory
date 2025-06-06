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
        Schema::create('tbl_kelasdetail', function (Blueprint $table) {
            $table->increments('idkelasdetail');
            $table->integer('idkelas');
            $table->integer('idthnajaran');
            $table->integer('idguru');
            $table->integer('idruangan');
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

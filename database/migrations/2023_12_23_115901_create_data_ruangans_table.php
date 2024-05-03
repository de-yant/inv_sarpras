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
        Schema::create('data_ruangans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_ruangan', 15)->unique();
            $table->string('nama_ruangan', 30);
            $table->integer('sumber_dana_id')->unsigned();
            $table->foreign('sumber_dana_id')->references('id')->on('sumber_danas')->cascadeOnDelete();
            $table->string('kondisi_ruangan', 20);
            $table->string('keterangan', 225)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_ruangans');
    }
};

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
        Schema::create('pengadaans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tgl_pengambilan', 25);
            $table->string('nama_pengambil', 30);
            $table->integer('data_barang_id')->unsigned();
            $table->foreign('data_barang_id')->references('id')->on('data_barangs')->cascadeOnDelete();
            $table->integer('ruangan_id')->unsigned();
            $table->foreign('ruangan_id')->references('id')->on('data_ruangans')->cascadeOnDelete();
            $table->integer('jumlah');
            $table->string('status', 20)->default('Belum Diambil');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengadaans');
    }
};

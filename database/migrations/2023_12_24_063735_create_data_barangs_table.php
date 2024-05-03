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
        Schema::create('data_barangs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_barang', 20)->unique();
            $table->string('tanggal_pembelian',25);
            $table->integer('sumber_dana_id')->unsigned();
            $table->foreign('sumber_dana_id')->references('id')->on('sumber_danas')->cascadeOnDelete();
            $table->integer('ruangan_id')->unsigned();
            $table->foreign('ruangan_id')->references('id')->on('data_ruangans')->cascadeOnDelete();
            $table->string('nama_barang',40);
            $table->string('merk_barang',40)->nullable();
            $table->string('jenis_barang', 20);
            $table->string('satuan_barang', 20)->nullable();
            $table->string('foto_barang', 50)->nullable();
            $table->string('jumlah_barang', 5);
            $table->string('kondisi_barang', 20);
            $table->string('status_barang', 20);
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_barangs');
    }
};

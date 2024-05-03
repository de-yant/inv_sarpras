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
        Schema::create('data_pinjamans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tgl_peminjaman', 25);
            $table->string('bts_pengembalian', 25);
            $table->string('tgl_pengembalian', 25)->default('-');
            $table->string('nama_peminjam', 30);
            $table->string('nama_pengambil',30)->nullable();
            $table->string('nama_pengembali', 30)->nullable();
            $table->integer('data_barang_id')->unsigned();
            $table->foreign('data_barang_id')->references('id')->on('data_barangs')->cascadeOnDelete();
            $table->integer('ruangan_id')->unsigned();
            $table->foreign('ruangan_id')->references('id')->on('data_ruangans')->cascadeOnDelete();
            $table->string('no_tlp',15);
            $table->integer('jumlah');
            $table->string('status', 20)->default('Belum Diambil');
            $table->integer('dikembalikan')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_pinjamen');
    }
};

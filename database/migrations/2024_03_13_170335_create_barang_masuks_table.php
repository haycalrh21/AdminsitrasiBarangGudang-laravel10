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
        Schema::create('barang_masuks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('request_barang_masuk_id'); // Tambahkan kolom ini terlebih dahulu
            $table->foreign('request_barang_masuk_id')->references('id')->on('request_barangs')->onDelete('CASCADE');

            $table->unsignedBigInteger('supplier_id');
            $table->string('nama_supplier');
            $table->string('nama_pic');
            $table->string('no_hp');
            $table->string('lokasi');
            $table->unsignedBigInteger('product_id');
            $table->string('namabarang');
            $table->string('jenis');
            $table->string('jumlah_barang');
            $table->string('harga_barang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang_masuks');
    }
};

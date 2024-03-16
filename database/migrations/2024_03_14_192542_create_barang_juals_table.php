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
        Schema::create('barang_juals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('barang_masuk_id');
            $table->char('nama_barang',50);
            $table->string('jenis');
            $table->string('jumlah_barang');
            $table->string('harga_barang');
            $table->string('harga_jual');
            $table->timestamps();

            $table->foreign('barang_masuk_id')->references('id')->on('barang_masuks')->onDelete('CASCADE');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang_juals');
    }
};

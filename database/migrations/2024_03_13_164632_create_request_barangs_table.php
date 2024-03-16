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
        Schema::create('request_barangs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('supplier_id');
            $table->string('nama_supplier');
            $table->string('nama_pic');
            $table->string('no_hp');
            $table->string('lokasi');
            $table->unsignedBigInteger('product_id');
            $table->string('namabarang');
            $table->string('jenis');
            $table->string('jumlah_barang');
            $table->timestamps();


            $table->foreign('supplier_id')->references('id')->on('suppliers');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('request_barangs');
    }
};

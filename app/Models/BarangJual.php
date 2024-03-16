<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangJual extends Model
{
    use HasFactory;

    protected $fillable =[
        'barang_masuk_id','nama_barang','jenis','jumlah_barang','harga_barang','harga_jual'



    ];
}

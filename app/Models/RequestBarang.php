<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestBarang extends Model
{
    use HasFactory;

    protected $fillable = ['product_id','supplier_id','nama_supplier', 'lokasi', 'namabarang', 'jenis','no_hp','nama_pic','jumlah_barang'];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }


}

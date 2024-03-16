<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['nama_barang','jenis',];


    public function supplierProducts()
    {
        return $this->hasMany(SupplierProduct::class);
    }

    public function requests(){
        return $this->hasMany(RequestBarang::class);
    }

}

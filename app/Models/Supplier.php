<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = ['nama_supplier','lokasi','nama_pic','no_hp'];


    public function supplierProducts()
    {
        return $this->hasMany(SupplierProduct::class);
    }
}

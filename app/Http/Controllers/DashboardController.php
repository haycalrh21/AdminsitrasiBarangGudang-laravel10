<?php

namespace App\Http\Controllers;

use App\Models\BarangJual;
use App\Models\RequestBarang;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){

        $barangjual = BarangJual::sum('jumlah_barang');
        $supplier = Supplier::count('id');
        $request = RequestBarang::count('id');
        $pengeluaran = BarangJual::sum(DB::raw('jumlah_barang* harga_barang'));
        $keuntungan = BarangJual::sum(DB::raw('jumlah_barang*harga_jual'));

        $profitbersih = $keuntungan - $pengeluaran;
        return view('dashboard.index.page',compact('barangjual','supplier', 'pengeluaran','keuntungan','profitbersih','request'));
    }
}

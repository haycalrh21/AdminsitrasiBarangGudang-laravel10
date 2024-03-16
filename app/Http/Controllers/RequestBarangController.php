<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\RequestBarang;
use App\Models\Supplier;
use App\Models\SupplierProduct;
use Illuminate\Http\Request;

class RequestBarangController extends Controller
{
    public function index(){
        $requestbarangs = RequestBarang::paginate(10);
        return view('dashboard.request.page',compact('requestbarangs'));
    }

    public function create(){
       $productsupplier = SupplierProduct::all();
        return view('dashboard.request.tambah.page',compact('productsupplier'));
    }

    public function store(Request $request){
        $request->validate([
            'supplier_id' => 'required',
            'nama_supplier' => 'required',
            'lokasi' => 'required',
            'product_id' => 'required',
            'namabarang' => 'required',
            'jenis' => 'required',
            'nama_pic' => 'required',
            'no_hp' => 'required',
            'jumlah_barang' => 'required',
        ]);

        try {
           $requestbarangs = RequestBarang::create([
            'supplier_id' => $request->supplier_id,
                'nama_supplier' => $request->nama_supplier,
                'lokasi' => $request->lokasi,
                'product_id' => $request->product_id,
                'namabarang' => $request->namabarang,
                'jenis' => $request->jenis,
                'nama_pic' => $request->nama_pic,
                'no_hp' => $request->no_hp,
                'jumlah_barang' => $request->jumlah_barang,
           ]);
           return redirect()->route('request')->with('success', 'Data berhasil ditambahkan');

        } catch (\Throwable $th) {
            return redirect()->back()->withInput()->withErrors(['errors' => 'Gagal menambahkan data']);
        }
    }


    public function destroy($id){
        $request = RequestBarang::findorFail($id);
        $request->delete();

        return redirect()->route('request');
    }
}

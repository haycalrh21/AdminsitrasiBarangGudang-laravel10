<?php

namespace App\Http\Controllers;


use App\Models\Product;
use App\Models\Supplier;
use App\Models\SupplierProduct;
use Illuminate\Http\Request;

class SupplierProductController extends Controller
{
    public function index(){
        $sps = SupplierProduct::paginate(10);
        return view ('dashboard.productsupplier.page',compact('sps'));
    }

    public function create(){
        $products = Product::all();
        $suppliers = Supplier::all();
        return view('dashboard.productsupplier.tambah.page', compact('products', 'suppliers'));
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
        ]);

        try {
            $supplierProduct = SupplierProduct::create([
                'supplier_id' => $request->supplier_id,
                'nama_supplier' => $request->nama_supplier,
                'lokasi' => $request->lokasi,
                'product_id' => $request->product_id,
                'namabarang' => $request->namabarang,
                'jenis' => $request->jenis,
                'nama_pic' => $request->nama_pic,
                'no_hp' => $request->no_hp,
            ]);

            return redirect()->route('supplierproduct')->with('success', 'Data berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->back()->withInput()->withErrors(['errors' => 'Gagal menambahkan data']);
        }
    }

    public function destroy($id){
        $sp = SupplierProduct::findorFail($id);
        $sp-> delete();

        return redirect()->route('supplierproduct');
    }
}

<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;


class BarangController extends Controller
{
    public function index(){

        $products = Product::paginate(10);
        return view('dashboard.barang.page',compact('products'));
    }

    public function create(){
        return view('dashboard.barang.tambah.page');
    }

    public function store(Request $request){
        $request->validate([
            'nama_barang'=> 'required|max:255',
            'jenis'=> 'required',
        ]);

        try {
            $product = Product::create([
                'nama_barang' => $request->nama_barang,
                'jenis'=> $request->jenis
            ]);

            return redirect()->route('databarang')->with('success','Barang berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->back()->withInput()->withErrors(['errors' => 'Gagal menambahkan barang. Silakan coba lagi nanti.']);
        }
    }

    public function destroy($id) {

        $barang = Product::findOrFail($id);

        // Hapus semua data tabel request_barangs
        $barang->requests()->delete();


        $barang->delete();

        return redirect()->route('databarang');
    }

}

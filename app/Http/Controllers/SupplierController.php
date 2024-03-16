<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
   public function index(){
    $suppliers = Supplier::paginate(10);
    return view('dashboard.supplier.page',compact('suppliers'));
   }


   public function create(){

    return view('dashboard.supplier.tambah.page');
   }


   public function store(Request $request){
    $request->validate([
        'nama_supplier' => 'required|max:50',
        'lokasi' => 'required|max:50',
        'nama_pic' => 'required|max:50',
        'no_hp' => 'required|max:13',
    ]);

    try {
        $supplier = Supplier::create([
            'nama_supplier' => $request->nama_supplier,
            'lokasi' => $request->lokasi,
            'nama_pic' => $request->nama_pic,
            'no_hp' => $request->no_hp
        ]);

        return redirect()->route('supplier')->with('success', 'Data Supliier berhasil di tambahkan');
    } catch (\Throwable $th) {
        return redirect()->back()->withInput()->withErrors(['errors' => 'Failed to register. Please try again later.']);
    }
}


public function destroy($id){
    $supplier = Supplier::findorFail($id);
    $supplier->delete();

    return redirect()->route('supplier');
}
}

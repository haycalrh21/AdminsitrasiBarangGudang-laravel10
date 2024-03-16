<?php

namespace App\Http\Controllers;

use App\Models\BarangJual;
use App\Models\BarangMasuk;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;

class BarangJualController extends Controller
{
   public function index(){
    $barangjuals = BarangJual::paginate(10);
    return view('dashboard.barangjual.page',compact('barangjuals'));
   }

   public function create(){
    $barangmasuks = BarangMasuk::all();
    return view('dashboard.barangjual.tambah.page',compact('barangmasuks'));
   }

   public function store(Request $request){
    $request->validate([
        'barang_masuk_id' => 'required',
        'nama_barang' => 'required|max:50',
        'jenis' => 'required',
        'jumlah_barang' => 'required',
        'harga_barang' => 'required',
        'harga_jual' => 'required',
    ]);

    try {
        $barangjual = BarangJual::create([
            'barang_masuk_id'=>$request->barang_masuk_id,
            'nama_barang'=>$request->nama_barang,
            'jenis'=>$request->jenis,
            'jumlah_barang'=>$request->jumlah_barang,
            'harga_barang'=>$request->harga_barang,
            'harga_jual'=>$request->harga_jual,
        ]);

        $barangmasuk = BarangMasuk::find($request->barang_masuk_id);
        if($barangmasuk){

            $barangmasuk->jumlah_barang -= $request->jumlah_barang;

        }

        if($barangmasuk->jumlah_barang<0 ){
            $barangmasuk->jumlah_barang = 0 ;
        }

        $barangmasuk -> save();

        return redirect()->route('barangjual')->with('success','barang berhasil di tambahkan');
    } catch (\Throwable $th) {
        return redirect()->back()->withInput()->withErrors(['errors' => 'Gagal menambahkan data']);

    }

   }

   public function destroy($id){
    $barangjual = BarangJual::findorFail($id);
    $barangjual->delete();

    return redirect()->route('barangjual');
   }



   public function cetakPDF()
   {
       // Data yang ingin Anda cetak dalam tabel
       $data = BarangJual::all();

       // Membuat objek Dompdf
       $dompdf = new Dompdf();

       // Mengatur opsi Dompdf
       $options = new Options();
       $options->set('isHtml5ParserEnabled', true);
       $options->set('isPhpEnabled', true);
       $dompdf->setOptions($options);

       // Mengambil HTML dari template PDF
       $html = view('pdf.cetak_pdfbarangjual', ['barangjuals' => $data])->render();

       // Memuat HTML ke Dompdf
       $dompdf->loadHtml($html);

       // Rendering PDF
       $dompdf->render();

       // Mengirimkan output file PDF ke browser
       return $dompdf->stream('laporan_barang_jual.pdf');
   }



}

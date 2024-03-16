<?php

namespace App\Http\Controllers;


use Illuminate\Pagination\Paginator;
use App\Models\BarangMasuk;
use App\Models\RequestBarang;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    public function index(){
        $barangmasuks = BarangMasuk::paginate(10);
        return view('dashboard.barangmasuk.page', compact('barangmasuks'));
    }

  public function create(){
    $sps = RequestBarang::all();
    return view('dashboard.barangmasuk.tambah.page' ,compact('sps'));
  }

  public function store(Request $request){
    $request->validate([
        'request_barang_masuk_id' => 'required',
        'supplier_id' => 'required',
        'nama_supplier' => 'required',
        'lokasi' => 'required',
        'product_id' => 'required',
        'namabarang' => 'required',
        'jenis' => 'required',
        'nama_pic' => 'required',
        'no_hp' => 'required',
        'jumlah_barang' => 'required',
        'harga_barang' => 'required',
    ]);



    try {

    $barangmasuk = BarangMasuk::create([
        'request_barang_masuk_id' => $request->request_barang_masuk_id,
        'supplier_id' => $request->supplier_id,
        'nama_supplier' => $request->nama_supplier,
        'lokasi' => $request->lokasi,
        'product_id' => $request->product_id,
        'namabarang' => $request->namabarang,
        'jenis' => $request->jenis,
        'nama_pic' => $request->nama_pic,
        'no_hp' => $request->no_hp,
        'jumlah_barang' => $request->jumlah_barang,
        'harga_barang' => $request->harga_barang,
    ]);

    // Hapus entri pada tabel request_barangs dengan ID yang sesuai
    $requestBarang = RequestBarang::find($request->request_barang_masuk_id);

    if ($requestBarang) {
        // Kurangi jumlah_barang
        $requestBarang->jumlah_barang -= $request->jumlah_barang;

        // Pastikan jumlah_barang tidak kurang dari 0
        if ($requestBarang->jumlah_barang < 0) {
            $requestBarang->jumlah_barang = 0;
        }

        // Simpan perubahan
        $requestBarang->save();

        return redirect()->route('barangmasuk')->with('success', 'Jumlah barang berhasil dikurangi');
    } else {
        return redirect()->back()->withInput()->withErrors(['errors' => 'ID Permintaan tidak ditemukan']);
    }




    } catch (\Throwable $th) {
        return redirect()->back()->withInput()->withErrors(['errors' => 'Gagal menambahkan data']);
    }
}


public function cetakPDF()
{
    // Data yang ingin Anda cetak dalam tabel
    $data = BarangMasuk::all();

    // Membuat objek Dompdf
    $dompdf = new Dompdf();

    // Mengatur opsi Dompdf
    $options = new Options();
    $options->set('isHtml5ParserEnabled', true);
    $options->set('isPhpEnabled', true);
    $dompdf->setOptions($options);

    // Mengambil HTML dari template PDF
    $html = view('pdf.cetak_pdfbarangmasuk', ['barangmasuks' => $data])->render();

    // Memuat HTML ke Dompdf
    $dompdf->loadHtml($html);

    // Mengatur ukuran dan orientasi halaman
    $dompdf->setPaper('A4', 'landscape');

    // Rendering PDF
    $dompdf->render();

    // Mengirimkan output file PDF ke browser
    return $dompdf->stream('laporan_barang_masuk.pdf');
}


public function destroy($id){
    $barangmasuk = BarangMasuk::findorFail($id);
    $barangmasuk->delete();
    return redirect()->route('barangmasuk');

}

  }


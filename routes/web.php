<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangJualController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RequestBarangController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\SupplierProductController;
use Illuminate\Support\Facades\Route;

//auth
Route::get('/',[AuthController::class, 'pageLogin'])->name('halamanlogin');
Route::get('/register',[AuthController::class, 'pageRegister'])->name('halamanregister');
Route::post('/',[AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout',[AuthController::class,'logout'])->name('logout');




Route::middleware('auth')->group(function () {
    Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');

    // datasupplier
    Route::get('/supplier', [SupplierController::class, 'index'])->name('supplier');
    Route::get('/tambahsupplier', [SupplierController::class, 'create'])->name('tambahsupplier');
    Route::post('/supplierbertambah', [SupplierController::class, 'store'])->name('supplierbertambah');
    Route::delete('/hapussupplier/{id}', [SupplierController::class, 'destroy'])->name('hapussupplier');

    // databarang
    Route::get('/databarang', [BarangController::class, 'index'])->name('databarang');
    Route::get('/tambahbarang', [BarangController::class, 'create'])->name('tambahbarang');
    Route::post('/barangbertambah', [BarangController::class, 'store'])->name('barangbertambah');
    Route::delete('/hapusbarang/{id}', [BarangController::class, 'destroy'])->name('hapusbarang');


    // SupplierProduct
    Route::get('/productsupplier', [SupplierProductController::class, 'index'])->name('supplierproduct');
    Route::get('/tambahproductsupplier', [SupplierProductController::class, 'create'])->name('tambahproductsupplier');
    Route::post('/bertambahsupplierproduct', [SupplierProductController::class, 'store'])->name('bertambahsupplierproduct');
    Route::delete('/hapusps/{id}', [SupplierProductController::class, 'destroy'])->name('hapusps');


    // PermintaanBarang
    Route::get('/request',[RequestBarangController::class,'index'])->name('request');
    Route::get('/tambahrequest',[RequestBarangController::class,'create'])->name('tambahrequest');
    Route::post('/bertambahrequest',[RequestBarangController::class,'store'])->name('bertambahrequest');
    Route::delete('/requestbarang/{id}', [RequestBarangController::class, 'destroy'])->name('hapusrequest');


    //databarangmasuk
    Route::get('/barangmasuk',[BarangMasukController::class,'index'])->name('barangmasuk');
    Route::get('/tambahbarangmasuk',[BarangMasukController::class,'create'])->name('tambahbarangmasuk');
    Route::post('/bertambahbarangmasuk',[BarangMasukController::class,'store'])->name('bertambahbarangmasuk');
    Route::delete('/barangmasuk/{id}', [BarangMasukController::class, 'destroy'])->name('hapusbarangmasuk');
    Route::get('/cetakpdfbarangmasuk', [BarangMasukController::class, 'cetakPDF'])->name('cetakpdfbarangmasuk');


    //databarangjual
    Route::get('/barangjual',[BarangJualController::class,'index'])->name('barangjual');
    Route::get('/tambahbarangjual',[BarangJualController::class,'create'])->name('tambahbarangjual');
    Route::post('/bertambahbarangjual',[BarangJualController::class,'store'])->name('bertambahbarangjual');
    Route::delete('/barangjual/{id}', [BarangJualController::class, 'destroy'])->name('hapusbarangjual');
    Route::get('/cetakpdfbarangjual', [BarangJualController::class, 'cetakPDF'])->name('cetakpdfbarangjual');




});

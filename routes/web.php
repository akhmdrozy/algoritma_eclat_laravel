<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\PostCrud;
use App\Http\Controllers\Mylogin;
use App\Http\Controllers\Controlleradmin;
use App\Http\Controllers\Controllerpelanggan;
// use App\Models\Product;
// namespace App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Login
Route::post('mylogin', [Mylogin::class,'aksi_login'])->name('mylogin');
Route::get('errors',[Mylogin::class,'aksi_login'])->name('errors');
Route::get('/logout', function () {
    return redirect()->route('login');
});


// Admin
Route::get('halaman-admin',[Controlleradmin::class,'halamanAdmin'])->name('routeAdmin');
Route::get('/halamanutama', function () {
    return view('toko.halamanutama');
});
// Route::get('/contact', function(){
//     return view('toko.kontak');
// });


// Pelanggan
Route::get('halaman-pelanggan',[Controllerpelanggan::class,'halamanPelanggan'])->name('routePelanggan');
Route::get('ambil-produk',[Controllerpelanggan::class,'selectproduk'])->name('selectProduk');
Route::get('edit-produk',[Controllerpelanggan::class,'editProduk'])->name('editProduk');
Route::post('simpan-transaksi',[Controllerpelanggan::class,'simpanTransaksi'])->name('simpanTransaksi');
Route::get('halaman-pembelian',[Controllerpelanggan::class,'pembelian'])->name('dataPembelian');
Route::get('halaman-kontak',[Controllerpelanggan::class,'kontak'])->name('getcontact');

// Data Toko
Route::get('datatoko',[Controlleradmin::class, 'datatoko'])->name('datatoko');
Route::get('addproduk',[Controlleradmin::class,'create'])->name('addProduk');
Route::post('inputproduk',[Controlleradmin::class,'input'])->name('inputProduk');
Route::get('editproduk/{id}',[Controlleradmin::class,'edit'])->name('editProduk');
Route::post('updateproduk', [Controlleradmin::class, 'update'])->name('updateProduk');
Route::get('deleteproduk/{id}', [Controlleradmin::class, 'delete'])->name('deleteProduk');
Route::get('halaman-transaksi', [Controlleradmin::class, 'transaksi'])->name('dataTransaksi');
Route::get('rekomendasiproduk',[Controlleradmin::class,'rekomendasi'])->name('rekomendasi');



//Lain lain
Route::get('showeclat',[Controlleradmin::class, 'showeclat'])->name('showeclat');
Route::post('proseseclat',[Controlleradmin::class,'proseseclat'])->name('prosesEclat');

// Route::get('controlleradmin',[Controlleradmin::class,'index'])->name('product');

// Route::middleware(['auth:sanctum', 'verified'])->group(function () {
//     Route::get('posts', PostCrud::class)->name('posts');
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// }); 

// Route::get('posts', PostCrud::class)->name('posts');

// Route::resource('post', PostController::class);

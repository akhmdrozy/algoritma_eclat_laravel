<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Product;

class Controllerpelanggan extends Controller
{
    public function halamanPelanggan(Request $request){
        // $product = DB::table('product')->get();
        return view('pagepelanggan');
    }

    public function selectproduk(Request $request){
        $products = DB::table('product')->get();
        $product = Product::latest()->paginate(5);
        // return view ('product.selectp',compact('products'))->with('i', (request()->input('page', 1) -1) * 5,['product' => $product]);
        //print_r($products); exit();
        return view('product.selectp', compact('products'));
    }

    public function simpanTransaksi(Request $request){
        $namaPelanggan = $request->get('namaPelanggan');
        $produkDipilih = $request->get('myProduk');

        //ini data buat disimpan di transaksi 
        $dataTransaksi = array(
            'pelanggan' => $namaPelanggan,
            'total_harga' => 0, //sementara tak gae 0, kecuali nek iki penting engko iso diatur
            'tgl_transaksi' => date('Y-m-d H:i:s')
        );

        //simpan transaksi & generate id untuk dipakai di transaksi detail
        $idTransaksi = DB::table('transaction')->insertGetId($dataTransaksi);

        //ini data buat disimpan di transaksi detail berdasarkan id transaksi yg sudah dibuat sebelumnya
        $dataBatch=array();
     	foreach ($produkDipilih as $produk) {
     		$datadetail=array(
     			'transaction_id' => $idTransaksi,
     			'kode_produk'=>$produk
     		);
     		array_push($dataBatch,$datadetail);

            DB::table('product')->where('id', $produk)
            ->update(['stok' => DB::table('product')->where('id', $produk)->pluck('stok')[0]*1-1]);
     	}
     	
         //simpan transaksi detail
        DB::table('transaction_detail')->insert($dataBatch);
        return redirect()->route('selectProduk')->with('success','Data Berhasil disimpan');
    }

    public function pembelian(Request $request){
        $queryPembelian = DB::table('transaction as t')
                            ->join('transaction_detail as td', 't.kode_transaksi', '=', 'td.transaction_id')
                            ->join('product as p', 'td.kode_produk', '=', 'p.kode')
                            ->select('td.transaction_id', 't.tgl_transaksi', 'p.nama_produk', 'p.harga','t.pelanggan')
                            ->get();

        return view('toko.pembelianp', ['pembelian'=> $queryPembelian]);
    }

    public function kontak(Request $request){
        return view('toko.kontak');
    }
}
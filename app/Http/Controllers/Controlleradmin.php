<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Product;
use Illuminate\Support\Collection;
use App\Http\Controllers\Math;

class Controlleradmin extends Controller
{
    public function halamanAdmin(Request $request){
        $product = DB::table('product')->get();
        //memunculkan data produk dari database
        return view('pageadmin', ['product' => $product]);
        //menampilkan nama data produk pada halaman 
    }
    public function create(){
        return view('product.create', ['page' => 'product.create']);
        //menampilkan halaman data toko untuk menampilkan input
    }

    public function input(Request $request){
        $request->validate([
            'nama_produk'=>'required',
            'kode'=>'required',
            'harga'=>'required',
        ]);
        Product::create($request->all());
        //memunculkan halaman input data produk pada halaman produk
        return redirect()->route('datatoko')->with('success','Input Berhasil');
        //input data disimpan pada database
    }
    public function edit($id){
        $data = Product::find($id);
        //mencari data produk database 
        //print_r($data->nama_produk); exit();
        return view('product.edit',['product' => $data]);
    }
    public function update(Request $request)
    {
        $request->validate([
            'nama_produk'=>'required',
            'kode'=>'required',
            'harga'=>'required',
            'stok' =>'required',
        ]);
        Product::where('kode', $request->kode)->update($request->all());
        //memunculkan data produk untuk bisa di edit
        return redirect()->route('datatoko')->with('success','Update Berhasil');
    }
    public function delete($id)
    {
        Product::find($id)->delete();
        //menghapus data produk pada database
        return redirect()->route('datatoko')->with('success','Berhasil di Hapus');
    }

    public function datatoko(Request $request){
        $product = DB::table('product')->get();
        //$product = DB::table('product')->simplePaginate(5);
        // return view ('toko.index',compact('product'))->with('i', (request()->input('page', 1) -1) * 5,['product' => $product]);
        return view('toko.index', ['product' => $product]);
    }

    public function transaksi(Request $request){
        // $bulan = ($request->bulan = '' || $request->bulan = null ? date('n') : $request->bulan);
        // echo $request->bulan;

        $queryTransaksi = DB::table('transaction as t')
                            ->join('transaction_detail as td', 't.kode_transaksi', '=', 'td.transaction_id')
                            ->join('product as p', 'td.kode_produk', '=', 'p.kode')
                            ->whereMonth('t.tgl_transaksi', $request->bulan) //Tambahan select
                            ->select('td.transaction_id', 't.tgl_transaksi', 'p.nama_produk', 'p.harga')
                            ->get();
        //memunculkan data transaksi berdasarkan bulan
        return view('toko.transaksi', ['transaksi' => $queryTransaksi]);
    }


    //sementara gk digawe
    public function rekomendasi(Request $request){
        // $detail_transaksi = [];
        // $queryrekomendasi = DB::table('transaction as t')
        //                     ->join('transaction_detail as td', 't.kode_transaksi', '=', 'td.transaction_id')
        //                     ->join('product as p', 'td.kode_produk', '=', 'p.kode')
        //                     ->select('td.transaction_id', 't.tgl_transaksi', 'p.nama_produk', 'p.harga')
        //                     ->get();
        // foreach ($queryrekomendasi as $value) {
        //     if (!isset($detail_transaksi[$value->nama_produk])) {
        //         $detail_transaksi[$value->nama_produk] = 1;
        //     } else {
        //         $detail_transaksi[$value->nama_produk]++;
        //     }
        // }
        // print_r($detail_transaksi);exit;
        $queryRekomendasi = DB::table('rekomendasi')->get();
        $productNames = [];
        $result = [];
        for ($i = 0; $i < sizeof($queryRekomendasi); $i++) {
            $productNamesArr = explode('_', $queryRekomendasi[$i]->produk_rekomendasi);
            // array_push($productNames, $productNamesArr);
            $productNames[] = $productNamesArr[0];
            $productNames[] = $productNamesArr[1];
            $result[] = [
                'produk_rekomendasi' => $productNamesArr[0],
                'bulan' => $queryRekomendasi[$i]->bulan
            ];
            $result[] = [
                'produk_rekomendasi' => $productNamesArr[1],
                'bulan' => $queryRekomendasi[$i]->bulan
            ];
        }
        $products = Product::whereIn('nama_produk', $productNames)->get();
        for ($i = 0; $i < sizeof($result); $i++) {
            $stok = 0;
            $max_stok = 0;
            for ($j = 0; $j < sizeof($products); $j++) {
                if ($products[$j]->nama_produk == $result[$i]['produk_rekomendasi']) {
                    $stok = $products[$j]->stok;
                    $max_stok = $products[$j]->max_stok;
                }
            }
            $result[$i]['stok'] = $stok;
            $result[$i]['max_stok'] = $max_stok;
        }
        return view('toko.rekomenproduk', ['data' => $result, 'productNames' => $products]);
    }
    
    public function showeclat(Request $request) {
        return view('toko.showeclat', ['dataProduk' => null, 'dataTransaksi' => null,
            'filterTransaksi' => null, 'dataBerpasangan' => null, 'filterBerpasangan' => null
        ]);
    }
    
    public function proseseclat(Request $request) {
        $request->validate([
            'minimum_support'=>'required',
        ]);

        $queryTransaksi = DB::table('transaction as t')
        ->join('transaction_detail as td', 't.kode_transaksi', '=', 'td.transaction_id')
        ->join('product as p', 'td.kode_produk', '=', 'p.kode')
        ->whereMonth('tgl_transaksi', $request->bulan) //Tambahan untuk tampilan select
        ->select('td.transaction_id', 'p.nama_produk')
        ->get();
        
        $countQueryTransaksi = $queryTransaksi->count();
        
        if ($countQueryTransaksi <= 0) {
            exit('data kosong');
        }

        $product        = DB::table('product')->get();
        $transaction    = DB::table('transaction_detail')->get();
        
        // memunculkan nama produk pada tiap transaksi
        $listDataProduk = $this->horizontalItemSet($queryTransaksi);
        // memunculkan transaksi pada tiap nama produk
        $listDataTransaksi = $this->verticalItemSet($product, $transaction);
        $filterMinimumSupport   = $request->minimum_support / 100 * sizeof($listDataProduk);
        
        // untuk membuat satu array dengan semua nama produk
        $listDataYangAkanBerpasangan   = [];
        foreach ($listDataTransaksi as $item) {
            foreach ($item as $set) {
                if ($set['nama_produk']) {
                    array_push($listDataYangAkanBerpasangan, $set['nama_produk']);
                }
            }
        }
        // membuat dua kombinasi dari nama produk
        $dataBerpasangan = $this->pasanganItem($listDataYangAkanBerpasangan);
        // membuat tiga kombinasi dari nama produk
        $dataBerpasangan = $this->tigaPasanganItem($listDataYangAkanBerpasangan);
        // membuat full kombinasi dari nama produk
        $dataBerpasangan = $this->fullKombinasiNamaProduk($listDataYangAkanBerpasangan);
        
        //memunculkan transaksi pada tiap kombinasi nama produk 
        $transaksiBerpasangan = $this->transaksiKombinasiNamaProduk($dataBerpasangan, $listDataProduk);
        $supportConfidenceBerpasangan = $this->supportConfidenceBerpasangan($transaksiBerpasangan, $listDataTransaksi, sizeof($listDataProduk));

        // mengeliminasi sesuai meminimalisasi sesuai minimum support
        $listFilterTransaksiBerpasangan = $this->filterMinimumSupport($supportConfidenceBerpasangan, $filterMinimumSupport);
        // print_r($listFilterTransaksiBerpasangan);exit();
        $dataRekomendasi = array();
        foreach ($listFilterTransaksiBerpasangan as $value) {
            $dataPush = array(
                'produk_rekomendasi' => $value[0]['nama_produk'],
                'bulan' => $request->bulan 
            );
            array_push($dataRekomendasi,$dataPush);
        }
        $cek = DB::table('rekomendasi')->select('bulan')->where('bulan',$request->bulan)->get();
        if (count($cek) > 0) {
            DB::table('rekomendasi')->delete();
        }
        DB::table('rekomendasi')->insert($dataRekomendasi);
        // print_r($dataRekomendasi);exit();


        return view('toko.showeclat', [
            'dataProduk' => $listDataProduk, 
            'dataTransaksi' => $listDataTransaksi, 
            'dataBerpasangan' => null, 
            'dataBerpasangan' => $supportConfidenceBerpasangan, 
            'filterBerpasangan' => null, 
            'filterBerpasangan' => $listFilterTransaksiBerpasangan, 
            'filterMinimum' => $filterMinimumSupport
        ]);

        return view('toko.showeclat', ['dataProduk' => null, 'dataTransaksi' => null,
            'filterTransaksi' => null, 'dataBerpasangan' => null, 'filterBerpasangan' => null
        ]);
    }

    public function horizontalItemSet($data)
    {
        $listDataProduk  = [];
        foreach ($data as $item) {
            $temp = [];
            foreach ($data as $set) {
                if ($item->transaction_id == $set->transaction_id) {
                    array_push($temp, $set->nama_produk);
                }
            }

            $collection = collect([
                [
                    'transaksi' => $item->transaction_id,
                    'nama_produk' => $temp,
                ]
            ]);
            array_push($listDataProduk, $collection);
        }
        
        $listDataProduk = array_values(array_unique($listDataProduk)); 
        return $listDataProduk;
    }

    public function verticalItemSet($product, $transaction)  
    {
        $listDataTransaksi  = [];
        foreach ($product as $row) {
            $temp           = [];
            
            foreach ($transaction as $col) {
                if ($row->kode == $col->kode_produk) {
                    array_push($temp, $col->transaction_id);
                }
            }

            $collection = collect([
                [
                    'nama_produk' => $row->nama_produk,
                    'transaksi' => $temp,
                ]
            ]);

            array_push($listDataTransaksi, $collection); 
        }

        return $listDataTransaksi;
    }

    public function filterMinimumSupport($transaksiBerpasangan, $filterMinimumSupport)
    {
        $return = [];
        foreach ($transaksiBerpasangan as $item) {
            foreach ($item as $row) {
                if (sizeof($row['transaksi']) >= $filterMinimumSupport) {
                    $collection = collect([
                        [
                            'nama_produk'   => $row['nama_produk'],
                            'transaksi'     => $row['transaksi'],
                            'support'       => $row['support'],
                            'confidence'    => $row['confidence'],
                        ]
                    ]);
                    
                    array_push($return, $collection);
                }
            } 
        }

        return $return;
    }

    public function fullKombinasiNamaProduk($dataYangAkanBerpasangan, $minLength = 2, $max = 4) {
        // nilai max adalah nilai batasan kombinasi, misal nilainya 4 maka kombinasi dari 4 nama produk
        $length = sizeof($dataYangAkanBerpasangan);
        $length = 20;

        // nilai pangkat dari 2 pangkat variabel length dataYangAkanBerpasangan
        $dataPangkat = pow(2, $length);
        
        $return = [];
        for($i = 0; $i < $dataPangkat; $i ++) {
            // untuk membuat indeks dari kombinasi dataYangAkanBerpasangan 
            $indeks = sprintf("%0" . $length . "b", $i);
            
            // memasukkan nama produk dan membuat kombinasi dari nama produk pertama hingga nama produk terakhir  
            $value = [];
            for($j = 0; $j < $length; $j ++) {
                $indeks[$j] == '1' && $value[] = $dataYangAkanBerpasangan[$j];
            }
            
            sizeof($value) >= $minLength && sizeof($value) <= $max && $return[] = $value;
        }
        
        $data = [];
        foreach ($return as $row) {
            $temp = implode("_", $row);
            $data[$temp] = 0;        
        }
        
        return $data;
    }

    public function transaksiKombinasiNamaProduk($dataBerpasangan, $listDataProduk)
    {
        $return = [];
        foreach ($dataBerpasangan as $key => $value) {
            
            $arr = [];
            $temp = explode("_", $key);
            
            for ($i=0; $i < sizeof($listDataProduk); $i++) { 

                for ($j=0; $j < sizeof($listDataProduk[$i]); $j++) { 
                    $persamaan = array_intersect($listDataProduk[$i][$j]['nama_produk'], $temp);
                    
                    if (sizeof(array_intersect($temp, $persamaan)) == sizeof($temp)) {
                        array_push($arr, $listDataProduk[$i][$j]['transaksi']);
                    }
                }
            }

            $arr = array_values(array_unique($arr));
            $collection = collect([
                [
                    'nama_produk' => $key,
                    'transaksi' => $arr,
                    ]
            ]);
            
            array_push($return, $collection);
        }
        
        return $return;
    }

    public function pasanganItem($dataYangAkanDipasangkan)
    {
        $n = 0;
        $arr = [];
        foreach ($dataYangAkanDipasangkan as $key1 => $value1) {
            $m = 1;
            foreach ($dataYangAkanDipasangkan as $key2 => $value2) {
                // mengkonversi dari string ke array
                $namaProduk = explode("_", $value2);
                for ($i = 0; $i < count($namaProduk); $i++) {
    
                    if (!strstr($key1, $namaProduk[$i])) {
                        if ($m > $n + 1 && count($dataYangAkanDipasangkan) > $n + 1) {
                            $arr[$value1 . "_" . $namaProduk[$i]] = 0;
                        }
                    }
                }
                $m++;
            }
            $n++;
        }
        return $arr;
    }

    public function tigaPasanganItem ($dataYangAkanBerpasangan)
    {
        $return = [];
        $j = 0;
        foreach ($dataYangAkanBerpasangan as $key1 => $value1) {
            $k = 1;
            foreach ($dataYangAkanBerpasangan as $key2 => $value2) {
                $l = 2;
                foreach ($dataYangAkanBerpasangan as $key3 => $value3) {
                    $string = explode("_", $value3);
                        for ($i=0; $i < sizeof($string); $i++) { 
                            if(!strstr($value1, $string[$i] && !strstr($value2, $string[$i]))) {
                                if ($l > $k + 1 && $k > $j + 1 && sizeof($dataYangAkanBerpasangan) > $j + 1) {
                                    // echo $value1 . "_" . $value2 . "_" . $string[$i];
                                    // echo "<br><br>";
                                    $return[$value1 . "_" . $value2 . "_" . $string[$i]] = 0; 
                                }
                            }
                        }
                    $l++;
                }
                $k++;
            }
            $j++;
        }

        return $return;
    }

    public function supportConfidenceBerpasangan($transaksiDataBerpasangan, $listDataTransaksi, $jumlahTransaksi)
    {
        $return = [];
        foreach ($transaksiDataBerpasangan as $item) {
            foreach ($item as $set) {
                $value = explode("_", $set['nama_produk']);
                $sizePasangan = sizeof($set['transaksi']);
                $calConfidence = "";
                // menghitung confidence
                foreach ($listDataTransaksi as $row) {
                    foreach ($row as $col) {
                        if($value[0] == $col['nama_produk']) {
                            $sizeProduk = sizeof($col['transaksi']);
                            if ($sizeProduk != 0 ) {
                                $calConfidence = $sizePasangan / $sizeProduk;
                            }
                            else {
                                $calConfidence = 0;
                            }                            
                        }
                    }
                }

                // menghitung support
                $calSupport = $sizePasangan / $jumlahTransaksi;
                
                $collection = collect([
                    [
                        'nama_produk'   => $set['nama_produk'],
                        'transaksi'     => $set['transaksi'],
                        'support'       => $calSupport,
                        'confidence'    => $calConfidence,
                    ]
                ]);
                
                array_push($return, $collection);               
            
            }
        }
        
        return $return;
    }

}
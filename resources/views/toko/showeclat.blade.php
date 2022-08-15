@extends('pageadmin')

@section('content')
<header id="first">
    <h1 class="cursive;" style=" font-size: 35px">
        <strong>Tampil Analisis Metode Eclat</strong>
    </h1>
    <h2 style="font-size:18px">Analisis menggunakan algoritma eclat dalam menentukan asosiasi rule berdasarkan frequent
        itemset untuk menentukan rekomendasi produk</h2>
</header>
<!-- <div class="row mt-5 mb-5">
    <div class="col-lg-8 margin-tb">
        <div class="float-left" >
            <h2 style="font-size: 30px"><strong>Tampil Analisis Metode Eclat</strong></h2>
        </div>
    </div>
</div> -->


<div class="mt-5 col-lg-11 margin-tb">
    <form action="{{ route('prosesEclat') }}" name="" method="post" class="form-horizontal">
        <div class="row">
            <div class="col-lg-12">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <label for="minimum_support" class="control-label">Minimum Support (dalam persen / %)<span
                            class="text-danger">*</span></label>
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" class="form-control" id="minimum_support" name="minimum_support"
                                value="4" required>
                        </div>
                    </div>
                    {{-- filter bulan --}}
                    @php
                    $months = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus',
                    'September',
                    'Oktober', 'November', 'Desember'];
                    @endphp
                    <label for="bulan" class="control-label">Bulan</label>
                    <div class="form-group">
                        <div class="input-group">
                            <select class="form-control" name="bulan">
                                <option value="">Pilih bulan</option>
                                @for ($i = 1; $i <= 12; $i++) <option value="{{ $i }}">{{ $months[$i] }}</option>
                                    @endfor
                            </select>
                        </div>
                    </div>
                    {{-- End filter bulan --}}
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-success">Proses</button>
        </div>
    </form>

    @if ($dataProduk != null)
    <h1>Data Jumlah Produk Pada Tiap Transaksi - Horizontal Item Set</h1>
    <table id="myTable" class="table table-striped table-hover table-bordered" style="table-layout: fixed; width: 100%;"
        role="grid">
        <thead>
            <tr>
                <th>Transaksi</th>
                <th>Nama Produk</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataProduk as $item)
            @foreach ($item as $row)
            <tr>
                <td><?php print_r($row['transaksi']);  ?></td>
                <td><?php $temp = implode(", ", $row['nama_produk']); 
                            echo $temp;  
                        ?></td>
            </tr>
            @endforeach
            @endforeach
        </tbody>
    </table>
    @endif

    @if ($dataTransaksi != null)
    <h1>Data Jumlah Transaksi Pada Tiap Produk - Vertical Item Set</h1>
    <table id="myTable2" class="table table-striped table-hover table-bordered"
        style="table-layout: fixed; width: 100%;" role="grid">
        <thead>
            <tr>
                <th>Nama Produk</th>
                <th>Transaksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataTransaksi as $item2)
            @foreach ($item2 as $row2)
            <tr>
                <td><?php print_r($row2['nama_produk']);  ?></td>
                <td><?php $temp = implode(", ", $row2['transaksi']); 
                            echo $temp;  
                        ?></td>
            </tr>
            @endforeach
            @endforeach
        </tbody>
    </table>
    @endif

    @if ($dataBerpasangan != null)
    <h1>Data Persilangan Produk</h1>
    <table id="myTable4" class="table table-striped table-hover table-bordered pageResize"
        style="table-layout: fixed; width: 100%;" role="grid">
        <thead>
            <tr>
                <th>Nama Produk</th>
                <th>Transaksi</th>
                <th>Support</th>
                <th>Confidence</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataBerpasangan as $item4)
            @foreach ($item4 as $row4)
            <tr>
                <td><?php 
                            $set = explode("_", $row4['nama_produk']);
                            $set = implode(" <b>dan</b> ", $set); 
                            print_r($set);  
                        ?></td>
                <td><?php 
                            $temp = implode(", ", $row4['transaksi']); 
                            if(sizeof($row4['transaksi']) >= 1) {
                                echo $temp;
                            } else {
                                echo "-";
                            } 
                        ?></td>
                <td><?php 
                            print_r($row4['support']) 
                        ?></td>
                <td><?php 
                            print_r($row4['confidence'])  
                        ?></td>
            </tr>
            @endforeach
            @endforeach
        </tbody>
    </table>
    @endif

    @if ($filterBerpasangan != null)
    <h1>Filter Data Persilangan Produk</h1>
    <h4>Sesuai jumlah minimum support : {{ $filterMinimum }}</h4>
    <table id="myTable5" class="table table-striped table-hover table-bordered pageResize"
        style="table-layout: fixed; width: 100%;" role="grid">
        <thead>
            <tr>
                <th>Nama Produk</th>
                <th>Transaksi</th>
                <th>Support</th>
                <th>Confidence</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($filterBerpasangan as $item5)
            @foreach ($item5 as $row5)
            <tr>
                <td><?php 
                            $set = explode("_", $row5['nama_produk']);
                            $set = implode(" <b>dan</b> ", $set); 
                            print_r($set);  
                        ?></td>
                <td><?php 
                            $temp = implode(", ", $row5['transaksi']); 
                            if(sizeof($row5['transaksi']) > 1) {
                                echo $temp;
                            } else {
                                echo "-";
                            } 
                        ?></td>
                <td><?php 
                            print_r($row5['support']) 
                        ?></td>
                <td><?php 
                            print_r($row5['confidence']) 
                        ?></td>
            </tr>
            @endforeach
            @endforeach
        </tbody>
    </table>

    <h1>Association Rule</h1>
    <table id="myTable6" class="table table-striped table-hover table-bordered pageResize"
        style="table-layout: fixed; width: 100%;" role="grid">
        <thead>
            <tr>
                <th>Aturan</th>
                <th>Support</th>
                <th>Confidence</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($filterBerpasangan as $item6)
            @foreach ($item6 as $row6)
            <tr>
                <td><?php 
                            $set = explode("_", $row6['nama_produk']);
                            $arr = [];
                            for ($i=0; $i < sizeof($set) - 1; $i++) { 
                                array_push($arr, $set[$i]);
                            }
                            $arr = implode(" <b>dan</b> ", $arr); 
                            echo "<b>Jika membeli</b> " . $arr;
                            echo ", <b>maka membeli</b> " . end($set);
                        ?></td>
                <td><?php 
                            print_r($row6['support']) 
                        ?></td>
                <td><?php 
                            print_r($row6['confidence']) 
                        ?></td>
            </tr>
            @endforeach
            @endforeach
        </tbody>
    </table>
    @endif
</div>

<div class="container">
</div>


<script>
$(document).ready(function() {
    $('#myTable').DataTable({
        "pagelength": 10,
        "scrollY": '50vh',
        "scrollX": '50vw'
    });
    $('#myTable2').DataTable({
        "pagelength": 10,
        "scrollY": '50vh',
        "scrollX": '50vw'
    });
    $('#myTable3').DataTable({
        "pagelength": 10,
        "scrollY": '50vh',
        "scrollX": '50vw',
        "scrollCollapse": true,
    });
    $('#myTable4').DataTable({
        "pagelength": 10,
        "scrollY": '50vh',
        "scrollX": '50vw',
        "scrollCollapse": true,
    });
    $('#myTable5').DataTable({
        "pagelength": 10,
        "scrollY": '50vh',
        "scrollX": '50vw',
        "scrollCollapse": true,
    });
    $('#myTable6').DataTable({
        "pagelength": 10,
        "scrollY": '50vh',
        "scrollX": '50vw',
        "scrollCollapse": true,
    });
});
</script>
@endsection
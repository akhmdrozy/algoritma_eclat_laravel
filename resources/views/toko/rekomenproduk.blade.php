@extends('pageadmin')

@section('content')
<header id="first">
    <h1 class="cursive;" style=" font-size: 35px">
        <strong>Rekomendasi Untuk Admin</strong>
    </h1>
    <h2 style="font-size:18px">Menampilkan Hasil Dari Aturan Asosiasi Analisis Metode Eclat 
        dan digunakan sebagai pertimbangan dalam melakukan stok produk.</h2>
</header>
<div class="mt-5">
    <table class="table table-bordered" id="productTable">
        <thead>
            <tr>
                <th width="20px" class="text-center">No</th>
                <th width="200px" class="text-center">Rekomendasi Produk</th>
                <th width="200px" class="text-center">Rekomendasi Stok</th>
                <!-- <th width="20px" class="text-center">Bulan</th> -->
            </tr>
        </thead>
        <tbody>
        <?php
        for ($i = 0; $i < sizeof($data); $i++) {
            $no = $i + 1;
            $rekomendasi_stok = $data[$i]['max_stok'] - $data[$i]['stok'];
            echo "<tr><td>{$no}</td><td>{$data[$i]['produk_rekomendasi']}</td><td>Disarankan Menambah Stok Sebanyak {$rekomendasi_stok} Pada Bulan Berikutnya"; 
            // </td><td>{$data[$i]['bulan']}</td></tr>";
        }           
        ?>
        </tbody>
    </table>
</div>

<script>
$(document).ready(function() {
    $('#productTable').DataTable({
        "pagelength": 10,
        "lengthMenu": [
            [10, 20, -1],
            [10, 20, 'All']
        ]
    });
});
</script>
@endsection
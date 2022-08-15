@extends('pagepelanggan')

@section('content')
<header id="first">
    <h1 class="cursive;" style=" font-size: 35px">
        <strong>Pembelian</strong>
    </h1>
    <h2 style="font-size:18px">Produk yang sudah dibeli akan muncul disini sebagai bukti anda telah membeli produk dari
        Toko Al Hidayah.</h2>
</header>
<!-- <div class="row mt-5 mb-5">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2 style=" font-size: 30px"><strong>Pembelian Toko</strong></h2>
        </div>
    </div>
</div> -->

<body>
    <div class="mt-5">
        <table class="table table-bordered" id="productTable">
            <thead>
                <tr>
                    <th width="20px" class="text-center">No</th>
                    <th width="20px" class="text-center">ID</th>
                    <th width="20px" class="text-center">Nama Pelanggan</th>
                    <th width="200px" class="text-center">Produk</th>
                    <th width="20px" class="text-center">Harga</th>
                    <th width="20px" class="text-center">Tanggal</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1; ?>
                @foreach ($pembelian as $pm)
                <tr>
                    <td class="text-center">{{ $i++ }}</td>
                    <td>T{{ $pm->transaction_id }}</td>
                    <td>{{ $pm->pelanggan }}</td>
                    <td>{{ $pm->nama_produk }}</td>
                    <td>Rp.{{ $pm->harga }},-</td>
                    <td class="text-center">{{ $pm->tgl_transaksi }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
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
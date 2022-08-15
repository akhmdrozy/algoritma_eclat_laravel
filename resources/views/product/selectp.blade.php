@extends('pagepelanggan')

@section('content')
<header id="first">
    <h1 class="cursive;" style=" font-size: 35px">
        <strong>Produk Toko Al Hidayah</strong>
    </h1>
    <h2 style="font-size:18px">Berbabgai produk tersedia untuk dibeli, lakukan check produk kemudian klik tombol beli
        untuk
        menambahkan produk pada pembelian.</h2>
</header>
<!-- <div class="row mt-5 mb-5">
    <div class="col-lg-12 margin-tb">
        <div class="float-left" style="text-center ">
            <h2 style="font-size: 30px"><strong> Produk Toko Al Hidayah</strong></h2>
        </div>
    </div>
</div> -->

<body>
    <form action="{{ route('simpanTransaksi') }}" method="post">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Customer</strong>
                    <input type="text" name="namaPelanggan"><br>
                </div>
            </div>
        </div>
        <table class="table table-bordered" id="productTable">
            <thead>
                <tr>
                    <th width="20px" class="text-center"> No</th>
                    <th width="20px" class="text-center"> Check</th>
                    <th width="200px" class="text-center"> Nama Produk</th>
                    <th width="200px" class="text-center"> Harga</th>
                    <th width="200px" class="text-center"> Stok</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1; ?>
                @foreach($products as $product)
                <tr>
                    <td class="text-center">{{ $i++ }}</td>
                    <td class="text-center"><input type="checkbox" name="myProduk[]" value="{{ $product->kode }}"></td>
                    <td><label for="myProduk">{{ $product->nama_produk }}</label></td>
                    <td><label for="myProduk">Rp. {{ $product->harga }},-</label></td>
                    <td class="text-center">{{ $product->stok}}/100</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary btn-sm" style="font-size:18px">Beli</button>
    </form>
</body>
<script>
$(document).ready(function() {
    $('#productTable').DataTable({
        "pagelength": 5,
        "lengthMenu": [
            [5, 10, 20, -1],
            [5, 10, 20, 'All']
        ]
    });
});
</script>
@endsection
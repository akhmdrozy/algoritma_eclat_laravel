@extends('pageadmin')

@section('content')
<div class="row mt-5 mb-5">
    <div class="col-lg-12 margin-tb">
        <div class="float-left" style="font-family: serif">
            <h2>Edit Produk</h2>
        </div>
        <div class="float-right">
            <a class="btn btn-primary" style="font-size:14px" href="{{ route('datatoko') }}">Kembali</a>
        </div>
    </div>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> Ada yang salah dengan Inputan.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('updateProduk') }}" method="POST">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Produk</strong>
                <input type="text" id='namaProduk' name="nama_produk" class="form-control" style="border-style:solid" placeholder="Nama Produk"
                    value="{{ $product->nama_produk }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Kode</strong>
                <input type="text" name="kode" value="{{ $product->kode }}" class="form-control" style="border-style:solid" placeholder="Kode">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Harga</strong>
                <input type="number" class="form-control" style="border-style:solid" name="harga" placeholder="Harga" value="{{ $product->harga }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Stok</strong>
                <input type="number" class="form-control" style="border-style:solid" name="stok" placeholder="Stok" value="{{ $product->stok }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" style="font-size:14px" class="btn btn-success">Update</button>
        </div>
    </div>
</form>
<!--button id="simpanData">Update by JS</button-->

<script>
$(document).ready(function() {
    $("#simpanData").click(function() {
        var produk = $("#namaProduk").val();
        alert(produk)
    });
});
</script>
@endsection
@extends('pageadmin')

@section('content')
<div class="row mt-5 mb-5">
    <div class="col-lg-12 margin-tb">
        <div class="float-left" style ="font-family: serif font-size:14px">
            <h2>Input Produk</h2>
        </div>
        <div class="float-right">
            <a class="btn btn-primary" style="font-size:14px" href="{{ route('datatoko') }}">Kembali</a>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Input gagal.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('inputProduk') }}" method="POST">
    @csrf

     <div class="row" style=" font-size:14px">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Produk</strong>
                <input type="text" name="nama_produk" class="form-control" style="border-style:solid" placeholder="Nama Produk">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Kode</strong>
                <input type="text" name="kode" class="form-control" style="border-style:solid" placeholder="Kode">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Harga</strong>
                <input type="number" class="form-control" style="border-style:solid" name="harga" placeholder="Harga" >
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Stok</strong>
                <input type="number" class="form-control" style="border-style:solid" name="stok" placeholder="Stok" >
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Max Stok</strong>
                <input type="number" class="form-control" style="border-style:solid" name="max_stok" placeholder="Max Stok" >
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" style="font-size:14px" class="btn btn-success">Input</button>
        </div>
    </div>

</form>
@endsection
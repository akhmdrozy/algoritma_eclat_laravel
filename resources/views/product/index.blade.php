<!-- @extends('pageadmin')

@section('content')
<div class="row mt-5 mb-5" style="font-family: serif">
    <div class="col-lg-12 margin-tb" style="font-family:serif">
        <div class="float-left">
            <h2>Produk</h2>
        </div>
        <div class="float-right" style="font-family:serif">
            <a class="btn btn-success" href="{{ route('addProduk') }}"> Input Produk</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered">
    <tr>
        <th width="20px" class="text-center">No</th>
        <th width="240px" class="text-center">Nama Produk</th>
        <th width="240px" class="text-center">Kode</th>
        <th width="240px" class="text-center">Harga</th>
    </tr>
    <?php $i=0; ?>
    @foreach ($product as $p)
    <tr>
        <td class="text-center" style="font-family: serif">{{ $i++ }}</td>
        <td>{{ $p->nama_produk }}</td>
        <td>{{ $p->kode }}</td>
        <td>{{ $p->harga }}</td>
        <td class="text-center" style="font-family: serif">
            <form action="{{ route('deleteProduk',['id' => $p->id]) }}" method="GET">

                <a class="btn btn-primary btn-sm" href="{{ route('editProduk',['id' => $p->id]) }}">Edit</a>

                @method('GET')

                <button type="submit" class="btn btn-danger btn-sm"
                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection -->
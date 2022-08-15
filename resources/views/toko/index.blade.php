@extends('pageadmin')

@section('content')
<header id="first">
    <h1 class="cursive;" style=" font-size: 35px">
        <strong>Data Toko Al Hidayah</strong>
    </h1>
    <h2 style="font-size:18px">Menampilkan Data Produk dari Toko Al Hidayah.
        Admin dapat menambahkan, mengubah, serta menghapus data
        sesuai dengan ketentuan dari pengelola toko</h2>
</header>

<body>
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Produk Toko Al Hidayah</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" style="font-size:14px" href="{{ route('addProduk') }}"
                    class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Input Produk</a>
                <!-- <a class="btn btn-success" href="{{ route('addProduk') }}"> Back</a> -->
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <table class="table table-bordered" id="productTable">
        <thead>
            <tr>
                <th width="20px" class="text-center">No</th>
                <th width="200px" class="text-center">Nama Produk</th>
                <th width="20px" class="text-center">Kode</th>
                <th width="200px" class="text-center">Harga</th>
                <th width="200px" class="text-center">Stok</th>
                <th width="200px" class="text-center">Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; ?>
            @foreach ($product as $p)
            <tr>
                <td class="text-center">{{ $i++ }}</td>
                <td>{{ $p->nama_produk }}</td>
                <td class="text-center">{{ $p->kode }}</td>
                <td>Rp.{{ $p->harga }},-</td>
                <td class="text-center">{{ $p->stok }}/{{ $p->max_stok}}</td>
                <td class="text-center">
                    <form action="{{ route('deleteProduk',['id' => $p->id]) }}" method="GET">

                        <a class="btn btn-primary btn-sm" style="font-size:14px"
                            href="{{ route('editProduk',['id' => $p->id]) }}">Edit</a>

                        @method('GET')

                        <button type="submit" class="btn btn-danger btn-sm" style="font-size:14px"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
<!-- <form class="btn btn-primary btn-sm">
    {{-- $product->appends(['sort' => 'votes'])->links() --}}
    </form> -->
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
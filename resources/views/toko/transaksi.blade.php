@extends('pageadmin')

@section('content')
<header id="first">
    <h1 class="cursive;" style=" font-size: 35px">
        <strong>Data Transaksi Toko Al Hidayah</strong>
    </h1>
    <h2 style="font-size:18px">Menampilkan Data Transaksi dari pelanggan yang telah melakukan pembelian
        menggunakan akses user yang telah diberikan pengelola atau admin.</h2>
</header>
<!-- <div class="text-center">
    <h1 style="font-size:30px"><strong>Data Transaksi Toko Al Hidayah</strong></h1>
</div> -->

<body>
    {{-- Tambahan filter bulan gae transaksi --}}
    <form action="{{ route('dataTransaksi') }}" name="" method="get" class="form-horizontal">
        <div class="row">
            <div class="col-lg-12">
                <div class="col-xs-12 col-sm-12 col-md-12">
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
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center ">
            <button type="submit" class="btn btn-success" style="font-size:14px">Tampilkan</button>
        </div>
    </form>
    {{-- End tambahan --}}

    <table class="table table-bordered" id="productTable">
        <thead>
            <tr>
                <th width="20px" class="text-center">No</th>
                <th width="20px" class="text-center">ID Transaksi</th>
                <th width="20px" class="text-center">Produk</th>
                <th width="200px" class="text-center">Harga</th>
                <th width="20px" class="text-center">Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; ?>
            @foreach ($transaksi as $t)
            <tr>
                <td class="text-center">{{ $i++ }}</td>
                <td>T{{ $t->transaction_id }}</td>
                <td>{{ $t->nama_produk }}</td>
                <td>Rp.{{ $t->harga }},-</td>
                <td class="text-center">{{ $t->tgl_transaksi }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
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
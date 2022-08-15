<!DOCTYPE html>
<html lang="en">

<head>
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Toko Al Hidayah</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
        integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

    <!-- <link rel="stylesheet" href="{{ url('/css/style.css') }}"> -->
    <link rel="stylesheet" href="{{ url('/css/styles.css') }}">

    <!-- SIDEBAR -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js">
    </script>
</head>


<body>
    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">
            <!-- <div class="custom-menu">
                <button type="button" id="sidebarCollapse" class="btn btn-primary">
                    <i class="fa fa-bars"></i>
                    <span class="sr-only">Toggle Menu</span>
                </button>
            </div> -->
            <h1><a class="logo ">Pilihan Menu</a></h1>
            <ul class="list-unstyled components mb-5">
                <li >
                    <a href="{{ route('routePelanggan') }}" class="fa fa-home"></span> Halaman Utama</a>
                </li>
                <li>
                    <a href="{{ route('selectProduk') }}" class="fa fa-database"></span> Produk</a>
                </li>
                <li>
                    <a href="{{ route('dataPembelian') }}" class="fa fa-bar-chart"></span> Pembelian</a>
                </li>
                <!-- <li>
                    <a href="{{ route('getcontact') }}" class="fa fa-phone-square"></span> Kontak</a>
                </li> -->
                <li>
                    <a href="{{ route('login') }}" class="fa fa-sign-out"></span> Log Out</a>
                </li>
            </ul>
            <div class="sidebar-card d-none d-lg-flex container">
                <img class="sidebar-card-illustration mb-2">
                <!-- <p class="text-center mb-2"><strong>SKRIPSI</strong>  -->
                <p class="text-center mb-2"><strong>Skripsi Informatika</strong> &copy; Website Toko Al Hidayah</p>
            </div>
        </nav>

        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-12 pt-5 container">
            <p>
                @include('toko.halamanutama')
                @yield('content')
            </p>
        </div>
    </div>

    </div>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
@extends('pagepelanggan')

@section('content')

<head>
    <div class="row justify-content-center">
        <div class="text-center">
            <h1 class="heading-section " style="font-size:30px"><strong>Kontak</strong></h1>
        </div>
    </div>
</head>

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="row mb-5">
                    <div class="col-md-3">
                        <div class="dbox w-100 text-center">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="fa fa-map-marker"></span>
                            </div>
                            <div class="text">
                                <p><span>ALAMAT:</span> JL. KI HAJAR DEWANTARA BETRO KEMLAGI MOJOKERTO</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="dbox w-100 text-center">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="fa fa-phone"></span>
                            </div>
                            <div class="text">
                                <p><span>TELP:</span> <a href="tel://1234567920">+ 1235 2355 98</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="dbox w-100 text-center">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="fa fa-paper-plane"></span>
                            </div>
                            <div class="text">
                                <p><span>E-MAIL:</span> <a href="mailto:info@yoursite.com">info@yoursite.com</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-md-3">
                                <div class="dbox w-100 text-center">
                                    <div class="icon d-flex align-items-center justify-content-center">
                                        <span class="fa fa-globe"></span>
                                    </div>
                                    <div class="text">
                                        <p><span>WEBSITE</span> <a href="#">yoursite.com</a></p>
                                    </div>
                                </div>
                            </div> -->
                </div>
                <div class="row no-gutters">
                    <div class="col-md-7">
                        <div class="contact-wrap w-100 p-md-5 p-4">
                            <h2 class="mb-4">Contact Us</h2>
                            <div id="form-message-warning" class="mb-4"></div>
                            <div id="form-message-success" class="mb-4">
                                Your message was sent, thank you!
                            </div>
                            <form method="POST" id="contactForm" name="contactForm" class="contactForm">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-groupfont-size:10px">
                                            <label class="label " style="color:black" for="name">Nama</label>
                                            <input type="text" class="form-control" name="name" id="name"
                                                placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="label" style="color:black" for="subject">Subjek</label>
                                            <input type="text" class="form-control" name="subject" id="subject"
                                                placeholder="Subject">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="label" style="color:black" for="#">Kritik & Saran</label>
                                            <textarea name="message" class="form-control" id="message" cols="30"
                                                rows="4" placeholder="Message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="submit" value="Send Message" class="btn btn-primary">
                                            <div class="submitting"></div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-5 d-flex align-items-stretch">
                        <div class="info-wrap w-100 p-5 img" style="background-image: url('/img/logomi.png');">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>

</body>
@endsection
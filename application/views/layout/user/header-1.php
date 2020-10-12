<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?= $title; ?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Collapse -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->

    <!-- Maps -->
    <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>

    <!-- Favicons -->
    <link href="<?= base_url('assets/img/logo/'); ?>emedco.png" rel="icon">
    <link href="<?= base_url('assets/vendor-user/'); ?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url('assets/vendor-user/'); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/vendor-user/'); ?>assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/vendor-user/'); ?>assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?= base_url('assets/vendor-user/'); ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/vendor-user/'); ?>assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/vendor-user/'); ?>assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="<?= base_url('assets/vendor-user/'); ?>assets/vendor/aos/aos.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url('assets/vendor-user/'); ?>assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Vesperr - v3.0.0
  * Template URL: https://bootstrapmade.com/vesperr-free-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center">

            <div class="logo mr-auto">
                <h1 class="text-light"><a href="<?= base_url('User/Home'); ?>"><span>E-MedCo</span></a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>

            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <li class=""><a href="<?= base_url('User/Obat'); ?>">Obat</a></li>
                    <li><a href="<?= base_url('User/Apotek'); ?>">Apotek</a></li>
                    <li class="drop-down"><a href="">Diagnosa</a>
                        <ul>
                            <li><a href="<?= base_url('User/Diagnosa') ?>">Diagnosa Online</a></li>
                            <li><a href="<?= base_url('User/Chat') ?>">Tanya Dokter</a></li>
                            <li><a href="<?= base_url('User/Buat_Janji'); ?>">Buat Janji</a></li>
                        </ul>
                    </li>
                    <li><a href="#contact">Pesan Resep</a></li>
                    <li><a href="<?= base_url('User/Permintaan_Obat'); ?>">Request Obat</a></li>
                    <li class="drop-down"><a href="">Riwayat</a>
                        <ul>
                            <li><a href="<?= base_url('User/Riwayat/Pemesanan'); ?>">Pemesanan</a></li>
                            <li><a href="<?= base_url('User/Riwayat/Resep'); ?>">Resep</a></li>
                            <li><a href="<?= base_url('User/Riwayat/Konsultasi'); ?>">Janji</a></li>
                        </ul>
                    </li>
                    <!-- <?php echo site_url('user/konsultasi_user'); ?> -->
                    <li class="get-started"><a href="<?= base_url('Login/logout') ?>">Logout</a></li>
                </ul>
            </nav><!-- .nav-menu -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up">Selamat Datang <?= $user['name']; ?>!</h1>
                    <div data-aos="fade-up" data-aos-delay="800">
                        <a href="#portfolio" class="btn-get-started scrollto">Cari Obat</a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left" data-aos-delay="200">
                    <img src="<?= base_url('assets/img/logo/'); ?>emedco.png" class="img-fluid animated" alt="">
                </div>
            </div>
        </div>

    </section><!-- End Hero -->

    <main id="main">
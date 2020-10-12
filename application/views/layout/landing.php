<!-- Includes -->
<?php $this->load->view('includes/landing/header.php') ?>
<!-- Includes -->


<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

        <div class="logo mr-auto">
            <h1 class="text-light"><a href="index.html"><span>E-MedCo</span></a></h1>
                    </div>

        <nav class="nav-menu d-none d-lg-block">

        </nav><!-- .nav-menu -->

    </div>
</header><!-- End Header -->

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">

    <div class="container">
        <div class="row">
            <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                <h1 data-aos="fade-up">Selamat Datang Di E-MedCo</h1>
                <h2 data-aos="fade-up" data-aos-delay="400">Electronic Medicine & Doctor Consultation Service</h2>
                <div data-aos="fade-up" data-aos-delay="800">
                    <a href="<?= base_url('Login/'); ?>" class="btn-get-started scrollto">Masuk</a>
                </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left" data-aos-delay="200">
                <img src="<?= base_url('assets/img/logo/emedco.png') ?>" class="img-fluid animated" alt="">
            </div>
        </div>
    </div>

</section><!-- End Hero -->

<main id="main">



    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2>Fitur</h2>
            </div>

            <div class="row">
                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon"><i class="bx bx-capsule"></i></div>
                        <h4 class="title"><a href="">Pesan Obat / Resep</a></h4>
                        <p class="description">Pesan obat atau pun kirim resep langsung ke apotek yang dituju</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                        <div class="icon"><i class="bx bx-map"></i></div>
                        <h4 class="title"><a href="">Geografis Apotek</a></h4>
                        <p class="description">Temukan lokasi apotek terdekat dengan fitur geografis</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
                        <div class="icon"><i class="bx bx-chat"></i></div>
                        <h4 class="title"><a href="">Tanya Dokter</a></h4>
                        <p class="description">Chat dengan dokter kami langsung melalui aplikasi</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
                        <div class="icon"><i class="bx bx-vector"></i></div>
                        <h4 class="title"><a href="">Diagnosa Online</a></h4>
                        <p class="description">Cek kemungkinan resiko penyakit dengan fitur diagnosa online</p>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Services Section -->


</main><!-- End #main -->

<!-- Includes -->
<?php $this->load->view('includes/landing/footer.php') ?>
<!-- Includes -->
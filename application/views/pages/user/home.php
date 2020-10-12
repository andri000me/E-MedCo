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

<!-- ======= More Services Section ======= -->




<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio">
    <div class="container">

        <div class="section-title" data-aos="fade-up">
            <h2>Portfolio</h2>
            <p>Buat Kategori Obat Keras, Bebas dll</p>
        </div>

        <!-- Buat Keterangan Obat -->
        <div class="row" data-aos="fade-up" data-aos-delay="200">
            <div class="col-lg-12 d-flex justify-content-center">
                <ul id="portfolio-flters">
                    <li data-filter="*" class="filter-active">All</li>
                    <li data-filter=".filter-app">App</li>
                    <li data-filter=".filter-card">Card</li>
                    <li data-filter=".filter-web">Web</li>
                </ul>
            </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="400">
            <?php foreach ($produk as $listproduk) : ?>

                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <div class="portfolio-wrap">
                        <img src="<?= base_url('upload-image/product/' . $listproduk['img_produk']); ?>" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4> <?= $listproduk['nama_produk']; ?> </h4>
                            <p><?= $listproduk['nama_apotek']; ?></p>
                            <div class="portfolio-links">
                                <a href="<?= base_url('upload-image/product/' . $listproduk['img_produk']); ?>" data-gall="portfolioGallery" class="venobox" title="Lihat Kemasan"><i class="bx bx-plus"></i></a>
                                <a href="<?= base_url('User/Home/Detail/' . $listproduk['kode_produk'] . '/' . $listproduk['kd_apotek']); ?>" title="More Details"><i class="bx bx-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>

        </div>

    </div>
</section><!-- End Portfolio Section -->
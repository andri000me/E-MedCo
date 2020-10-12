<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2><?= $title; ?></h2>
            <ol>
                <li><a href="<?= base_url('User/Home'); ?>">Home</a></li>
                <li><a href="<?= base_url('User/Apotek'); ?>">Obat</a></li>
                <li><?= $title; ?></li>
            </ol>
        </div>

    </div>
</section>
<!-- End Breadcrumbs -->

<!-- ======= Portfolio Details Section ======= -->
<section id="portfolio" class="portfolio">
    <div class="container">
        <br><br><br>
        <div class="section-title" data-aos="fade-up">
            <h2><?= $h2; ?></h2>  <!-- Di Controller Apotek -->
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
                                <!-- <a href="<?= base_url('upload-produk/product/' . $listproduk['img_produk']); ?>" data-gall="portfolioGallery" class="venobox" title="App 1"><i class="bx bx-image"></i></a> -->
                                <a href="<?= base_url('User/Home/Detail/' . $listproduk['kode_produk'] . '/' . $listproduk['kd_apotek']); ?>" title="Deskripsi"><i class="bx bx-cart"></i></a>
                                <!-- https://iconify.design/icon-sets/bx/ -->
                            </div>
                        </div>
                    </div>
                </div>

                <?php endforeach; ?>
        </div>

    </div>
</section><!-- End Portfolio Details Section -->


<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2><?= $title; ?></h2>
            <ol>
                <li><a href="<?= base_url('User/Home'); ?>">Home</a></li>
                <li><a href="<?= base_url('User/Obat'); ?>">Obat</a></li>
                <li><?= $title; ?></li>
            </ol>
        </div>

    </div>
</section>
<!-- End Breadcrumbs -->

<!-- ======= Portfolio Details Section ======= -->
<section id="portfolio-details" class="portfolio-details">
    <div class="container">

        <div class="row">
            <div class="col-lg-8 ">
                <p style="font-size:38px" class="portfolio-title"><?= $listproduk['nama_produk']; ?></p>
                <div class="owl-carousel portfolio-details-carousel">
                    <!-- Contoh -->
                    <!-- <img src="<?= base_url('assets/img/product/img_product/' . $listproduk['img_produk']); ?>" class="img-fluid" alt=""> -->
                    <img src="<?= base_url('assets/vendor-user/') ?>assets/img/portfolio/portfolio-details-1.jpg" class="img-fluid" alt="">
                    <img src="<?= base_url('assets/vendor-user/') ?>assets/img/portfolio/portfolio-details-2.jpg" class="img-fluid" alt="">
                    <img src="<?= base_url('assets/vendor-user/') ?>assets/img/portfolio/portfolio-details-3.jpg" class="img-fluid" alt="">
                </div>
            </div>

            <div class="col-lg-4 portfolio-info"><br>
                <h2><b>Detail Produk</b></h2><br>
                <ul>
                    <li><strong>Kategori</strong>: Obat Keras <b>(contoh)</b></li>
                    <li><strong>Nama Toko</strong>: Masih Eror</li>
                    <!-- <li><strong>Nama Toko</strong>: <?= $listproduk['nama_apotek']; ?></li> -->
                    <li><strong>Harga</strong>: Rp. <?= $listproduk['harga_produk']; ?></li>
                    <!-- <li><strong>Project URL</strong>: <a href="#">www.example.com</a></li> -->
                </ul>

                <p><?= $listproduk['deskripsi_produk']; ?></p>
                <a href="<?= base_url('User/Home/Pesan/' . $listproduk['kode_produk'] . '/' . $listproduk['kd_apotek']); ?>" class="btn btn-primary btn-block btn-sm ">Pesan</a>
            </div>

        </div>

    </div>
</section><!-- End Portfolio Details Section -->
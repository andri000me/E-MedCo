<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2><?= $title; ?></h2>
            <ol>
                <li><a href="<?= base_url('User/Home'); ?>">Home</a></li>
                <li><a href="<?= base_url('User/Apotek'); ?>">Apotek</a></li>
                <li><?= $title; ?></li>
            </ol>
        </div>

    </div>
</section>
<!-- End Breadcrumbs -->

<!-- ======= Portfolio Details Section ======= -->
<section id="portfolio-details" class="portfolio-details">
    <div class="container">
        <br><br><br>
        <div class="section-title" data-aos="fade-up">
            <h2><?= $h2; ?></h2>
        </div>

        <div class="row">

            <!-- Pending Requests Card Example -->
            <?php foreach ($apotek as $listapotek) : ?>

                <div class="card w-100 mb-4">
                    <div class="card-body">
                        <h3 class="card-title"><?php echo $listapotek['nama_apotek']; ?></h3>
                        <p class="card-text"><?php echo $listapotek['alamat_apotek']; ?></p>
                        <p class="card-text">No. Telp: <?php echo $listapotek['telp_apotek']; ?></p>
                        <p class="card-text"><?php echo $listapotek['deskripsi']; ?></p>
                        <a href="<?= base_url('User/Apotek/Maps'); ?>" class="btn btn-primary">Lihat Map</a>
                        <a href="<?= base_url('User/Apotek/Produk/' . $listapotek['kd_apotek']); ?>" class="btn btn-success">Pesan Obat</a>
                        <a href="<?= base_url('User/Apotek/Pesan_Resep/' . $listapotek['kd_apotek']); ?>" class="btn btn-success">Pesan Resep</a>
                    </div>
                </div>

            <?php endforeach; ?>


        </div>

    </div>
</section><!-- End Portfolio Details Section -->
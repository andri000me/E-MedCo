<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2><?= $title; ?></h2>
            <ol>
                <li><a href="<?= base_url('User/Home'); ?>">Home</a></li>
                <li>Riwayat</li>
                <li>Pemesanan</li>
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

        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <b>Cara Pembayaran </b>
                    </button>
                </h2>
            </div>

            <div class="card-body">
                1. <i class="fa fa-file-check"></i> Cek <strong>Total Harga</strong> pada halaman <strong>Riwayat Pemesanan</strong>. <br>
                2. Transfer ke <i class="fa fa-credit-card"></i> Rekening Mandiri - <strong>9876543215 | EMedCo</strong>. <br>
                3. Upload <strong>Bukti Bayar</strong> pada halaman ini.<br>
                4. Klik <strong>Upload</strong>.
            </div>

        </div><br>

        <form method="post" action="<?= base_url('User/Riwayat/Pemesanan/Update'); ?>/<?= $row->id; ?>" enctype="multipart/form-data">
            <input type="hidden" class="form-control" value="<?= $row->id; ?>" id="id" name="id" placeholder="ID" readonly>

            <div class="form-group">
                <label for="img_bayar">Foto Bukti Bayar</label>
                <input class="form-control-file" type="file" name="img_bayar" />
                <div class="invalid-feedback">
                    <?php echo form_error('img_bayar') ?>
                </div>
            </div><br>

            <button type="submit" class="btn btn-primary" value="save" onclick="return confirm ('Apakah bukti bayar sudah benar ?'); ">Upload</button>
        </form>
    </div>
</section><!-- End Features Section -->
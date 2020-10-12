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

        <form method="post" action="<?= base_url('User/Apotek/create_resep') ?>" enctype="multipart/form-data">
            <input class="form-control" type="hidden" value="<?php echo $this->uri->segment(3); ?>" name="kd_apotek" id="kd_apotek" placeholder="Kode Apotek" readonly />
            <input class="form-control" type="hidden" value="<?php echo date('y/m/d'); ?>" name="tanggal" id="tanggal" placeholder="Tanggal Pesan" readonly />
            
            <div class="form-group">
                <label for="nama">Nama Pemesan*</label>
                <input class="form-control" type="text" name="nama" value="<?php echo $user['name']; ?>" id="nama" placeholder="Nama pemesan" readonly />
                <div class="invalid-feedback">
                    <?php echo form_error('nama') ?>
                </div>
                </div><br>


            <div class="form-group">
                <label for="detail">Detail Resep*</label>
                <textarea rows="3" class="form-control" name="detail" placeholder="Tulis resep obat disini"></textarea>
                <div class="invalid-feedback">
                    <?php echo form_error('detail') ?>
                </div>
            </div><br>

            <div class="form-group">
                <label for="waktu">Waktu Ambil* (Resep harus diambil dihari yang sama dengan hari pesan)</label>
                <input class="form-control" type="time" name="waktu" id="waktu" placeholder="" />
                <div class="invalid-feedback">
                    <?php echo form_error('waktu') ?>
                </div>
                </div><br>

            <button type="submit" class="btn btn-primary btn-block" value="save">Kirim Resep</button>

        </form>

    </div>
</section><!-- End Portfolio Details Section -->
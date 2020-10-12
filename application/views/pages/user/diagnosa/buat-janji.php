<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2><?= $title; ?></h2>
            <ol>
                <li><a href="<?= base_url('User/Home'); ?>">Home</a></li>
                <li><a href="<?= base_url('User/Diagnosa'); ?>">Diagnosa</a></li>
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

        <form method="post" action="<?= base_url('User/Buat_Janji/create') ?>" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama_pasien">Nama Pasien*</label>
                <input class="form-control" type="text" name="nama_pasien" id="nama_pasien" placeholder="Nama pasien yang ingin konsultasi" />
                <div class="invalid-feedback">
                    <?php echo form_error('nama_pasien') ?>
                </div>
            </div><br>
            
            <input type="hidden" class="form-control" type="text" value="<?php echo $user['name'] ?>" name="user" id="user" placeholder="Nama Anda" readonly />
            
            <div class="form-group">
                <label for="keluhan">Keluhan*</label>
                <textarea rows="3" class="form-control" name="keluhan" placeholder="Keluhan"></textarea>
                <div class="invalid-feedback">
                    <?php echo form_error('keluhan') ?>
                </div>
            </div><br>

            <div class="form-group">
                <label for="tanggal">Tanggal*</label>
                <input class="form-control" type="date" name="tanggal" id="tanggal" placeholder="" />
                <div class="invalid-feedback">
                    <?php echo form_error('tanggal') ?>
                </div>
            </div><br>

            <div class="form-group">
                <label for="jam">Jam*</label>
                <input class="form-control" type="time" name="jam" id="jam" placeholder="" />
                <div class="invalid-feedback">
                    <?php echo form_error('jam') ?>
                </div>
            </div><br>

            <div class="form-group">
                <label for="lokasi">Lokasi*</label>
                <input class="form-control" type="text" name="lokasi" id="lokasi" placeholder="Lokasi yang disepakati dokter" />
                <div class="invalid-feedback">
                    <?php echo form_error('lokasi') ?>
                </div>
            </div><br>

            <button type="submit" class="btn btn-primary btn-block" value="save">Submit</button>

        </form>

    </div>
</section><!-- End Portfolio Details Section -->
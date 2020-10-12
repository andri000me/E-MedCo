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

        <form method="post" action="<?= base_url('User/Permintaan_Obat/create') ?>" enctype="multipart/form-data">

            <div class="form-group">
                <label for="judul">Produk Yang di Request*</label>
                <input class="form-control" type="text" name="judul" id="judul" placeholder="Contoh: Paracetamol" />
                <div class="invalid-feedback">
                    <?php echo form_error('judul') ?>
                </div>
            </div> <br>

            <div class="form-group">
                <label for="nama">Nama Peminta*</label>
                <input class="form-control" type="text" value="<?php echo $user['name'] ?>" name="nama" id="nama" placeholder="Nama Anda" readonly />
                <div class="invalid-feedback">
                    <?php echo form_error('nama') ?>
                </div>
            </div><br>

            <div class="form-group">
                <label for="detail">Detail Request*</label>
                <textarea class="form-control" name="detail" id="editor" placeholder="Detail Request"></textarea>
                <div class="invalid-feedback">
                    <?php echo form_error('detail') ?>
                </div>
            </div><br>

            <div class="form-group">
                <label for="alasan">Alasan Request*</label>
                <textarea class="form-control" name="alasan" id="editor1" placeholder=""></textarea>
                <div class="invalid-feedback">
                    <?php echo form_error('alasan') ?>
                </div>
            </div><br>

            <div class="form-group">
                <label for="date">Tanggal Request*</label>
                <input class="form-control" type="text" name="date" id="date" value="<?php echo date('d/m/y'); ?>" readonly />
                <div class="invalid-feedback">
                    <?php echo form_error('lng') ?>
                </div>
            </div><br>

            <button type="submit" class="btn btn-primary btn-block" value="save">Submit</button>

        </form>

    </div>
</section><!-- End Features Section -->
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2><?= $title; ?></h2>
            <ol>
                <li><a href="<?= base_url('User/Home'); ?>">Home</a></li>
                <li>Obat</li>
                <li>Detail</li>
                <li>Pesan</li>
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
            <h2><?= $row['nama_produk']; ?></h2>
        </div>

        <form method="post" action="<?= base_url('User/Obat/create'); ?>" enctype="multipart/form-data">
            <input class="form-control" type="hidden" value="<?php echo $row['kode_produk']; ?>" name="kode_produk" id="kode_produk" placeholder="Kode Produk" readonly />
            <input class="form-control" type="hidden" value="<?php echo $this->uri->segment(4); ?>" name="kd_apotek" id="kd_apotek" placeholder="Kode Apotek" readonly />
            <input class="form-control" type="hidden" value="<?php echo date('y/m/d'); ?>" name="tgl_pesan" id="tgl_pesan" placeholder="Tanggal Pesan" readonly />

            <div class="form-group">
                <label for="pemesan">Pesanan Atas Nama*</label>
                <input class="form-control" type="text" name="pemesan" value="<?= $user['name']; ?>" id="pemesan" placeholder="Nama Pemesan" readonly />
                <div class="invalid-feedback">
                    <?php echo form_error('pemesan') ?>
                </div>
            </div><br>

            <div class="form-group">
                <label for="produk">Nama Produk*</label>
                <input class="form-control" type="text" value="<?php echo $row['nama_produk']; ?>" name="produk" id="produk" placeholder="Nama Produk" readonly />
                <div class="invalid-feedback">
                    <?php echo form_error('produk') ?>
                </div>
            </div><br>

            <div class="form-group">
                <label for="harga">Harga Satuan</label>
                <input class="form-control" type="text" value="<?= $row['harga_produk']; ?>" name="harga" id="harga" placeholder="Harga Satuan" readonly />
                <div class="invalid-feedback">
                    <?php echo form_error('produk') ?>
                </div>
            </div><br>

            <div class="form-group">
                <label for="stok">Stok Tersedia*</label>
                <input class="form-control" type="text" value="<?= $row['stok_produk']; ?>" name="stok" id="stok" placeholder="Stok Tersedia" readonly />
                <div class="invalid-feedback">
                    <?php echo form_error('stok') ?>
                </div>
            </div><br>

            <div class="form-group">
                <label for="qty">Jumlah Pemesanan*</label>
                <input class="form-control" type="text" name="qty" id="qty" placeholder="Contoh: 10" onkeyup="compute()" />
                <div class="invalid-feedback">
                    <?php echo form_error('qty') ?>
                </div>
            </div><br>

            <div class="form-group">
                <label for="total">Total Harga*</label>
                <input class="form-control" type="text" value="" name="total" id="total" placeholder=" Total Harga " readonly />
                <div class="invalid-feedback">
                    <?php echo form_error('total') ?>
                </div>
            </div><br>

            <div class="form-group">
                <label for="waktu">Waktu Pengambilan*</label>
                <input class="form-control" type="text" name="waktu" id="waktu" placeholder="Contoh: 14:00" />
                <div class="invalid-feedback">
                    <?php echo form_error('waktu') ?>
                </div>
            </div><br>

            <button type="submit" class="btn btn-primary btn-block" value="save">Pesan</button>

        </form>


    </div>
</section><!-- End Portfolio Details Section -->
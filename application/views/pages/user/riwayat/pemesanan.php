<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2><?= $title; ?></h2>
            <ol>
                <li><a href="<?= base_url('User/Home'); ?>">Home</a></li>
                <li>Riwayat</li>
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

        <div class="col-lg" style="overflow-x:auto;"><br>
            <table id="table_id" class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center" scope="col">No</th>
                        <th class="text-center" scope="col">Nama Produk </th>
                        <th class="text-center" scope="col">Jumlah </th>
                        <th class="text-center" scope="col">Total</th>
                        <th class="text-center" scope="col">Waktu Ambil</th>
                        <th class="text-center" scope="col">Tanggal</th>
                        <th class="text-center" scope="col">Apotek (Bug Tidak Tampil Nama APotek)</th>
                        <th class="text-center" scope="col">Bukti Bayar</th>
                        <th class="text-center" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    foreach ($result as $row) : ?>
                        <tr>
                            <th scope="row" class="text-center"><?= array_search($row, $result) + 1 ?></th>
                            <td class=""><?= $row->produk; ?></td>
                            <td class="text-center"><?= $row->qty; ?></td>
                            <td class="text-right">Rp. <?= $row->total; ?></td>
                            <!-- <td class="text-right"><img src="<?= base_url('images/product/' . $row->img_produk); ?>" width="100" /></td> -->
                            <td class="text-center"><?= $row->waktu; ?></td>
                            <td class="text-center"><?= $row->tgl_pesan; ?></td>
                            <td class="text-center"><?= $row->nama_apotek; ?></td>
                            <td class="text-center"><img src="<?= base_url('upload-image/bayar/' . $row->img_bayar); ?>" width="80" /></td>
                            <td class="text-center">
                                <a href="<?= base_url('User/Riwayat/Pemesanan/Upload'); ?>/<?= $row->id; ?>" type="button" class="btn btn-primary btn-sm">Bayar</a>
                                <a href="<?= base_url('User/Riwayat/Pemesanan/hapuspesanobat'); ?>/<?= $row->id; ?>" type="button" class="btn btn-danger btn-sm" onclick="return confirm ('Hapus data?'); ">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>
</section><!-- End Features Section -->
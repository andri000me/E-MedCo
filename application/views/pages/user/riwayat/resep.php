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
                        <th class="text-center" style="width: 5%" scope="col">No</th>
                        <th class="text-center" style="width: 20%" scope="col">Detail Resep</th>
                        <th class="text-center" scope="col">Tanggal</th>
                        <th class="text-center" scope="col">Waktu Ambil</th>
                        <th class="text-center" scope="col">Apotek (Bug Tidak Tampil Nama APotek)</th>
                        <th class="text-center" scope="col">Harga</th>
                        <th class="text-center" scope="col">Bukti Bayar</th>
                        <th class="text-center" scope="col">Status</th>
                        <th class="text-center" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    foreach ($result as $row) : ?>
                        <tr>
                            <th scope="row" class="text-center"><?= array_search($row, $result) + 1 ?></th>
                            <td class=""><?= $row->detail; ?></td>
                            <td class="text-center"><?= $row->tanggal; ?></td>
                            <td class="text-center"><?= $row->waktu; ?></td>
                            <td class="text-center"><?= $row->nama_apotek; ?></td>
                            <td class="text-center">
                                <?php if ($row->harga == 0) {
                                    echo 'Mohon Tunggu';
                                } else {
                                    echo 'Rp. ' . $row->harga;
                                }
                                ?>
                            </td>
                            <td class="text-center"><img src="<?= base_url('upload-produk/bayar/' . $row->img_bayar); ?>" width="80" /></td>
                            <td style="text-align:center">
                                <?php if ($row->status == 1) {
                                    echo '<a href=""type="button" class="btn btn-danger btn-block btn-sm"> Menyiapkan </a>';
                                } elseif ($row->status == 2) {
                                    echo '<a href=""type="button" class="btn btn-success btn-block btn-sm"> Siap </a>';
                                } else {
                                    echo '<a href=""type="button" class="btn btn-primary btn-block btn-sm"> Selesai </a>';
                                }
                                ?>
                            </td>
                            <td style="text-align:center">
                                <a href="<?= base_url('User/Riwayat/Resep/Upload'); ?>/<?= $row->id; ?>" type="button" class="btn btn-primary btn-sm">Bayar</a>
                                <a href="<?= base_url('User/Riwayat/Resep/hapuspesanresep'); ?>/<?= $row->id; ?>" type="button" class="btn btn-danger btn-sm" onclick="return confirm ('Hapus data?'); ">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table><br>

        </div>

    </div>
</section><!-- End Features Section -->
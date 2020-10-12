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
                        <th class="text-center" style="width: 20%" scope="col">Pasien</th>
                        <th class="text-center" scope="col">Keluhan</th>
                        <th class="text-center" scope="col">Tanggal</th>
                        <th class="text-center" scope="col">Jam</th>
                        <th class="text-center" scope="col">Lokasi</th>
                        <th class="text-center" scope="col">Status</th>
                        <th class="text-center" style="width: 15%" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    foreach ($result as $row) : ?>
                        <tr>
                            <th scope="row" class="text-center"><?= array_search($row, $result) + 1 ?></th>
                            <td class=""><?= $row->nama_pasien; ?></td>
                            <td class=""><?= $row->keluhan; ?></td>
                            <td class="text-center"><?= $row->tanggal; ?></td>
                            <td class="text-center"><?= $row->jam; ?></td>
                            <td class=""><?= $row->lokasi; ?></td>
                            <td style="text-align:center">
                                <?php if ($row->status == 1) {
                                    echo '<a href=""type="button" class="btn btn-danger btn-block btn-sm"> Menunggu </a>';
                                } else {
                                    echo '<a href=""type="button" class="btn btn-success btn-block btn-sm"> Disetujui </a>';
                                }
                                ?>
                            </td>
                            <td style="text-align:center">
                                <a href="<?= base_url('User/Riwayat/Konsultasi/hapus_jadwal'); ?>/<?= $row->id; ?>" type="button" class="btn btn-danger btn-sm" onclick="return confirm ('Hapus?'); ">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>
</section><!-- End Features Section -->
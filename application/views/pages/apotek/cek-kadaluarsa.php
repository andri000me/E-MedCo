<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?> / Masih Ada Bug</h1> <!-- Ganti Judul -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item">Pages</li>
            <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
        </ol>
    </div>

    <!-- Penanda -->
    <div class="row">
        <div class="row ml-1 mb-3">
        <a href="" class="btn btn-sm btn-primary ml-2 mt-2 shadow-sm">Cetak Semua</a>
        <button data-toggle="modal" data-target="#modalCetakTanggal"  class="btn btn-sm shadow-sm btn-success ml-2 mt-2">Cetak Berdasarkan Tanggal</button>
        <button data-toggle="modal" data-target="#modalCetakBencana" class="btn btn-sm shadow-sm btn-warning ml-2 mt-2">Cetak Berdasarkan Bencana</button>
    </div>
        <!-- Datatables -->
        <div class="col-lg-12">
            <!-- Lebar Content -->
            <div class="card mb-4">
                <div class="card-header py-3">
                </div>
                <?= $this->session->flashdata('message'); ?>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush" id="dataTable">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center" scope="col">No</th>
                                <th class="text-center" scope="col">Kd Transaksi</th>
                                <th class="text-center" scope="col">Kd Produk</th>
                                <th class="text-center" scope="col">Nama Produk</th>
                                <th class="text-center" scope="col">Jumlah Masuk</th>
                                <th class="text-center" scope="col">Tanggal Kadaluarsa</th>
                                <th class="text-center" scope="col"> Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($result as $row) : ?>
                                <tr>
                                    <th scope="row" class="text-center"><?= array_search($row, $result) + 1 ?></th>
                                    <td class="text-center"><?= $row->kd_transaksi; ?></td>
                                    <td class=""><?= $row->kode_produk; ?></td>
                                    <td class=""><?= $row->nama_produk; ?></td>
                                    <td class="text-right"><?= $row->jumlah_masuk; ?></td>
                                    <td class=""><?= $row->kadaluarsa; ?></td>
                                    <td style="text-align:center">
                                        <a href="<?= base_url('Apotek/Cek_Kadaluarsa/delete'); ?>/<?= $row->kd_transaksi; ?>" type="button" class="btn btn-danger">Tarik</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Akhir Datatables -->
    </div>
    <!---Container Fluid-->
</div>
</div>
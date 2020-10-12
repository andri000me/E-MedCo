<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1> <!-- Ganti Judul -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item">Pages</li>
            <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
        </ol>
    </div>

    <div class="row mb-3">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1"> Pesanan Menunggu </div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $disiapkan->total; ?></div>
                            <div class="mt-2 mb-0 text-muted text-xs">
                                <span>Since last month</span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Annual) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Pesanan Siap Diambil</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $siap->total; ?></div>
                            <div class="mt-2 mb-0 text-muted text-xs">
                                <span>Since last years</span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-shopping-cart fa-2x text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- New User Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Pesanan Selesai</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $selesai->total; ?></div>
                            <div class="mt-2 mb-0 text-muted text-xs">
                                <span>Since last month</span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-info"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

        <!-- Penanda -->
        <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
                <!-- Lebar Content -->
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <a href="<?= base_url('Apotek/Pesanan_Resep/pdf') ?>" class="btn btn-danger">
                            <span class="icon text-white-10">
                                <i class="fas fa-print"></i>
                            </span>
                            <span class="text">Print</span>
                        </a>
                    </div>
                    <?= $this->session->flashdata('message'); ?>
                    <div class="table-responsive p-3">
                        <table class="table align-items-center table-flush" id="dataTable">
                            <thead class="thead-light">
                                <tr>
                                    <th class="text-center" style="width: 5%" scope="col">No</th>
                                    <th class="text-center" style="width: 20%" scope="col">Pemesan</th>
                                    <th class="text-center" style="width: 20%" scope="col">Detail Resep</th>
                                    <th class="text-center" scope="col">Tanggal</th>
                                    <th class="text-center" scope="col">Waktu Ambil</th>
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
                                        <td class=""><?= $row->nama; ?></td>
                                        <td class=""><?= $row->detail; ?></td>
                                        <td class="text-center"><?= $row->tanggal; ?></td>
                                        <td class="text-center"><?= $row->waktu; ?></td>
                                        <td class="text-center">
                                            <?php if ($row->harga == 0) {
                                                echo 'Belum Dimasukkan';
                                            } else {
                                                echo 'Rp. ' . $row->harga;
                                            }
                                            ?>
                                        </td>
                                        <td class="text-center"><img src="<?= base_url('assets/img/product/bayar/' . $row->img_bayar); ?>" width="80" /></td>
                                        <td style="text-align:center">
                                            <?php if ($row->status == 1) {
                                                echo '<a href="' . base_url('Apotek/Pesanan_Resep/statusSiap/') . $row->id . '"type="button" class="btn btn-danger btn-block"> Menunggu </a>';
                                            } elseif ($row->status == 2) {
                                                echo '<a href="' . base_url('Apotek/Pesanan_Resep/statusSelesai/') . $row->id . '"type="button" class="btn btn-primary btn-block"> Siap </a>';
                                            } else {
                                                echo '<a href="' . base_url('Apotek/Pesanan_Resep/statusMenunggu/') . $row->id . '"type="button" class="btn btn-success btn-block"> Selesai </a>';
                                            }
                                            ?>
                                        </td>
                                        <td class="text-center">
                                            <a href="<?= base_url('Apotek/Pesanan_Resep/harga'); ?>/<?= $row->id; ?>" type="button" class="btn btn-primary">Harga</a>
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
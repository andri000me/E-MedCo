<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> <?= $title; ?></h1> <!-- Ganti Judul -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item">Pages</li>
            <li class="breadcrumb-item active" aria-current="page"> <?= $title; ?></li>
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
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $menunggu->total; ?></div>
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
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Pesanan Selesai</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $selesai->total; ?></div>
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
        
        <!-- Penanda -->
        <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
                <!-- Lebar Content -->
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <a href="<?= base_url('Apotek/Pemesanan/pdf'); ?>" class="btn btn-danger">
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
                                    <th class="text-center" scope="col"> No</th>
                                    <th class="text-center" scope="col"> Pemesan </th>
                                    <th class="text-center" scope="col"> Produk </th>
                                    <th class="text-center" scope="col"> Jumlah </th>
                                    <th class="text-center" scope="col"> Total</th>
                                    <th class="text-center" scope="col"> Waktu</th>
                                    <th class="text-center" scope="col"> Tanggal</th>
                                    <th class="text-center" scope="col"> Bukti</th>
                                    <th class="text-center" scope="col"> Status </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($result as $row) : ?>
                                    <tr>
                                        <th scope="row" class="text-center"><?= array_search($row, $result) + 1 ?></th>
                                        <td><?= $row->pemesan; ?></td>
                                        <td><?= $row->produk; ?></td>
                                        <td class="text-right"><?= $row->qty; ?></td>
                                        <td class="text-right"><?= $row->total; ?></td>
                                        <td><?= $row->waktu; ?></td>
                                        <td><?= $row->tgl_pesan; ?></td>
                                        <td class="text-center"><img src="<?= base_url('upload-produk/bayar/' . $row->img_bayar); ?>" width="80" /></td>
                                        <td style="text-align:center">
                                            <?php if ($row->status == 1) {
                                                echo '<a href="' . base_url('Apotek/Pemesanan/status1/') . $row->id . '"type="button" class="btn btn-danger btn-block"> Menunggu </a>';
                                            } else {
                                                echo '<a href="' . base_url('Apotek/Pemesanan/status2/') . $row->id . '"type="button" class="btn btn-success btn-block"> Selesai </a>';
                                            }
                                            ?>
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
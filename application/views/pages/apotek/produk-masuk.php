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

    <!-- Penanda -->
    <div class="row">
        <!-- Datatables -->
        <div class="col-lg-12">
            <!-- Lebar Content -->
            <div class="card mb-4">
                <div class="card-header py-3">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#TambahProdukMasukModal">
                        <span class="icon text-white-10">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah Produk Masuk</span>
                    </button>
                    <a href="<?= base_url('Apotek/Produk_Masuk/pdf') ?>" class="btn btn-danger">
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
                                <th class="text-center" scope="col">No</th>
                                <th class="text-center" scope="col">Kode Transaksi</th>
                                <th class="text-center" scope="col">Tanggal Masuk</th>
                                <th class="text-center" scope="col">Kode Produk</th>
                                <th class="text-center" scope="col">Nama Produk</th>
                                <th class="text-center" scope="col">Jumlah Masuk</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($result as $row) : ?>
                                <tr>
                                    <th scope="row" class="text-center"><?= array_search($row, $result) + 1 ?></th>
                                    <td class="text-center"><?= $row->kd_transaksi; ?></td>
                                    <td class="text-center"><?= $row->tanggal; ?></td>
                                    <td class="text-center"><?= $row->kode_produk; ?></td>
                                    <td class=""><?= $row->nama_produk; ?></td>
                                    <td class="text-right"><?= $row->jumlah_masuk; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Akhir Datatables -->
</div>
<!---Container Fluid-->
</div>
</div>

<!-- Modal Tambah Produk -->
<div class="modal fade" id="TambahProdukMasukModal" tabindex="-1" role="dialog" aria-labelledby="TambahProdukMasukModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TambahProdukMasukModal">Tambah Data Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form method="post" action=" <?= base_url('Apotek/Produk_Masuk/create'); ?>" enctype="multipart/form-data">
                    <input type="hidden" class="form-control" id="kd_apotek" value="<?= $user['kd_apotek'] ?>" name="kd_apotek" placeholder="Kode Apotek" readonly>
                    
                    <div class="form-group">
                        <label for="kd_transaksi">Kode Transaksi</label>
                        <input type="text" class="form-control" id="kd_transaksi" name="kd_transaksi" placeholder="Kode Transaksi">
                        <!-- <?= form_error('kd_transaksi', '<small class="text-danger pl-3">', '</small>'); ?> -->
                    </div>

                    <div class="form-group">
                        <label for="tanggal">Tanggal Masuk</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="yyyy-mm-dd">
                        <!-- <?= form_error('nama_produk', '<small class="text-danger pl-3">', '</small>'); ?> -->
                    </div>

                    <div class="form-group">
						<label for="kode_produk">Produk*</label>
						<select name="kode_produk" class="form-control" id="kode_produk">
							<?php
							// $sql = $this->db->get('tb_produk');
							$sql = $this->db->query("SELECT * FROM tb_produk WHERE kd_apotek ='{$_SESSION['kd_apotek']}'");
							foreach ($sql->result() as $row) {
							?>
								<option value="<?= $row->kode_produk ?>"><?= $row->nama_produk ?></option>
							<?php } ?>
						</select>
					</div>

                    <div class="form-group">
                        <label for="jumlah_masuk">Jumlah Masuk</label>
                        <input type="text" class="form-control" id="jumlah_masuk" name="jumlah_masuk" placeholder="Stok Produk">
                        <!-- <?= form_error('harga_produk', '<small class="text-danger pl-3">', '</small>'); ?> -->
                    </div>

                    <div class="form-group">
                        <label for="kadaluarsa">Kadaluarsa</label>
                        <input type="date" class="form-control" id="kadaluarsa" name="kadaluarsa" placeholder="yyyy-mm-dd">
                        <!-- <?= form_error('nama_produk', '<small class="text-danger pl-3">', '</small>'); ?> -->
                    </div>

                   
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" value="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
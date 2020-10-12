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

    <!-- Penanda -->
    <div class="row">
        <!-- Datatables -->
        <div class="col-lg-12">
            <!-- Lebar Content -->
            <div class="card mb-4">
                <div class="card-header py-3">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#TambahProdukModal">
                        <span class="icon text-white-10">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah Produk</span>
                    </button>
                    <a href="<?= base_url('Apotek/Produk/pdf'); ?>" class="btn btn-danger">
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
                                <th class="text-center" scope="col">Nama</th>
                                <th class="text-center" scope="col">Photo</th>
                                <th class="text-center" scope="col">Kode</th>
                                <th class="text-center" scope="col">Jenis</th>
                                <th class="text-center" scope="col">Stok</th>
                                <th class="text-center" scope="col" style="width: 90px;">Harga</th>
                                <th class="text-center" scope="col" style="width: 130px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($result as $row) : ?>
                                <tr>
                                    <th scope="row" class="text-center"><?= array_search($row, $result) + 1 ?></th>
                                    <td class=""><?= $row->nama_produk; ?></td>
                                    <td class=""><img src="<?= base_url('upload-image/product/' . $row->img_produk); ?>" width="100" /></td>
                                    <td class=""><?= $row->kode_produk; ?></td>
                                    <td class=""><?= $row->nama_jenis; ?></td>
                                    <td class=""><?= $row->stok_produk; ?></td>
                                    <td class="">Rp. <?= $row->harga_produk; ?></td>
                                    <td class="">
                                        <a href="<?= base_url('Apotek/Produk/edit'); ?>/<?= $row->id_produk; ?>" type="button" class="btn btn-primary">Edit</a>
                                        <a href="<?= base_url('Apotek/Produk/delete'); ?>/<?= $row->id_produk; ?>" type="button" class="btn btn-danger" onclick="return confirm ('Hapus data?'); ">Delete</a>
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

<!-- Modal Tambah Produk -->
<div class="modal fade" id="TambahProdukModal" tabindex="-1" role="dialog" aria-labelledby="TambahProdukModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TambahProdukModal">Tambah Data Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form method="post" action=" <?= base_url('Apotek/Produk/create'); ?>" enctype="multipart/form-data">
                    <input type="hidden" class="form-control" id="kd_apotek" value="<?= $user['kd_apotek'] ?>" name="kd_apotek" placeholder="Kode Apotek" readonly>
                    <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

                    <div class="form-group">
                        <label for="kode_produk">Kode Produk</label>
                        <input type="text" class="form-control" id="kode_produk" name="kode_produk" placeholder="Kode Produk">
                        <!-- <?= form_error('kode_produk', '<small class="text-danger pl-3">', '</small>'); ?> -->
                    </div>

                    <div class="form-group">
                        <label for="nama_produk">Nama Produk</label>
                        <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Nama Produk">
                        <!-- <?= form_error('nama_produk', '<small class="text-danger pl-3">', '</small>'); ?> -->
                    </div>

                    <!-- Jenis Produk -->
                    <div class="form-group">
						<label for="nama_jenis">Jenis Produk*</label>
						<select name="nama_jenis" class="form-control" id="id_jenis">
							<?php
							$sql = $this->db->query("SELECT * FROM tb_jenis WHERE kd_apotek='{$_SESSION['kd_apotek']}'");
							foreach ($sql->result() as $row) {
							?>
								<option value="<?= $row->id_jenis ?>"><?= $row->nama_jenis ?></option>
							<?php } ?>
						</select>
					</div>
                    <!-- Jenis Produk -->

                    <div class="form-group">
                        <label for="harga_produk">Harga Produk</label>
                        <input type="text" class="form-control" id="harga_produk" name="harga_produk" placeholder="Harga Produk">
                        <!-- <?= form_error('harga_produk', '<small class="text-danger pl-3">', '</small>'); ?> -->
                    </div>


                    <div class="form-group">
                        <label for="img_produk">Photo Produk</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="img_produk" name="img_produk">
                            <label class="custom-file-label" for="img_produk">Choose file</label>
                            <!-- <?= form_error('img_produk', '<small class="text-danger pl-3">', '</small>'); ?> -->
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="stok_produk">Stock Persediaan</label>
                        <input type="text" class="form-control" id="stok_produk" name="stok_produk" placeholder="Stock Persediaan">
                    </div>

                    <div class="form-group">
                        <label for="deskripsi_produk">Deksripsi</label>
                        <textarea class="form-control" id="editor" name="deskripsi_produk" placeholder="Product Description...."></textarea>
                        <!-- <?= form_error('deskripsi_produk', '<small class="text-danger pl-3">', '</small>'); ?> -->
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
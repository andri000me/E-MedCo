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
                    <button class="btn btn-primary" data-toggle="modal" data-target="#TambahKategoriModal">
                        <span class="icon text-white-10">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah Kategori</span>
                    </button>
                    <button href="#" class="btn btn-danger">
                        <span class="icon text-white-10">
                            <i class="fas fa-print"></i>
                        </span>
                        <span class="text">Print</span>
                    </button>
                </div>
                <?= $this->session->flashdata('message'); ?>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush" id="dataTable">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center" scope="col">No</th>
                                <th class="text-center" scope="col">Jenis</th>
                                <th class="text-center" scope="col">Kode Jenis</th>
                                <!-- <th class="text-center" scope="col">Kategori</th>
                                <th class="text-center" scope="col">Kode Kategori</th> -->
                                <th class="text-center" scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($result as $row) : ?>
                                <tr>
                                    <th scope="row" class="text-center"><?= array_search($row, $result) + 1 ?></th>
                                    <td class="text-center"><?= $row->nama_jenis; ?></td>
                                    <td class="text-center"><?= $row->kode_jenis; ?></td>
                                    <!-- <td class="text-center"><?= $row->nama_kategori; ?></td> -->
                                    <!-- <td class="text-center"><?= $row->kd_kategori; ?></td> -->
                                    <td class="text-center">
                                        <a href="<?= base_url('Apotek/Kategori/Edit'); ?>/<?= $row->id_jenis; ?>" type="button" class="btn btn-primary">Edit</a>
                                        <a href="<?= base_url('Apotek/Kategori/Delete'); ?>/<?= $row->id_jenis; ?>" type="button" class="btn btn-danger" onclick="return confirm ('Hapus data?'); ">Delete</a>
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
<div class="modal fade" id="TambahKategoriModal" tabindex="-1" role="dialog" aria-labelledby="TambahKategoriModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TambahKategoriModal">Tambah Data Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form method="post" action=" <?= base_url('Apotek/Kategori/create'); ?>" enctype="multipart/form-data">
                    <input type="hidden" class="form-control" id="kd_apotek" value="<?= $user['kd_apotek'] ?>" name="kd_apotek" placeholder="Kode Apotek" readonly>
                    <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

                    <div class="form-group">
                        <label for="nama_jenis">Nama Jenis</label>
                        <input type="text" class="form-control" id="nama_jenis" name="nama_jenis" placeholder="Nama Jenis">
                        <!-- <?= form_error('nama_jenis', '<small class="text-danger pl-3">', '</small>'); ?> -->
                    </div>

                    <div class="form-group">
                        <label for="kode_jenis">Kode Jenis</label>
                        <input type="text" class="form-control" id="kode_jenis" name="kode_jenis" placeholder="Kode Jenis">
                        <!-- <?= form_error('kode_jenis', '<small class="text-danger pl-3">', '</small>'); ?> -->
                    </div>

                    <!-- <div class="form-group">
                        <label for="nama_kategori">Nama Kategori</label>
                        <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" placeholder="Nama Kategori">
                        <?= form_error('nama_kategori', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="kd_kategori">Kode Kategori</label>
                        <input type="text" class="form-control" id="kd_kategori" name="kd_kategori" placeholder="Kode Kategori">
                        <?= form_error('kd_kategori', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div> -->

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" value="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
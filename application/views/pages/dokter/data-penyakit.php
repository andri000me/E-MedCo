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
                    <button class="btn btn-primary" data-toggle="modal" data-target="#TambahPenyakitModal">
                        <span class="icon text-white-10">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah Data Penyakit</span>
                    </button>

                </div>
                <?= $this->session->flashdata('message'); ?>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush" id="dataTable">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center" style="width: 5%">No</th>
                                <th class="text-center" style="width: 10%">Kode </th>
                                <th class="text-center" style="width: 10%">Nama Penyakit </th>
                                <th class="text-center" style="width: 25%">Penyebab</th>
                                <th class="text-center" style="width: 25%"> Solusi </th>
                                <th class="text-center"> Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($result as $row) : ?>
                                <tr>
                                    <th scope="row" class="text-center"><?= array_search($row, $result) + 1 ?></th>
                                    <td><?= $row->kd_penyakit; ?></td>
                                    <td><?= $row->nama_penyakit; ?></td>
                                    <td><?= $row->penyebab; ?></td>
                                    <td><?= $row->solusi; ?></td>
                                    <td style="text-align:center">
                                        <a href="<?= base_url('Dokter/Data_Penyakit/edit'); ?>/<?= $row->id_penyakit; ?>" type="button" class="btn btn-primary">Edit</a>
                                        <a href="<?= base_url('Dokter/Data_Penyakit/delete'); ?>/<?= $row->id_penyakit; ?>" type="button" class="btn btn-danger" onclick="return confirm ('Hapus data?'); ">Delete</a>
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

<!-- Modal -->
<div class="modal fade" id="TambahPenyakitModal" tabindex="-1" role="dialog" aria-labelledby="TambahPenyakitModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TambahPenyakitModal">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form method="post" action=" <?= base_url('Dokter/Data_Penyakit/create'); ?>" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="kd_penyakit">Kode Penyakit*</label>
                        <input type="text" class="form-control" id="kd_penyakit" name="kd_penyakit" placeholder="Kode Penyakit">
                        <div class="invalid-feedback">
                            <?php echo form_error('kd_penyakit') ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nama_penyakit">Nama Penyakit*</label>
                        <input type="text" class="form-control" id="nama_penyakit" name="nama_penyakit" placeholder="Nama Penyakit">
                        <div class="invalid-feedback">
                            <?php echo form_error('nama_penyakit') ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name">Penyebab*</label>
                        <textarea class="form-control" name="penyebab" placeholder="Penyebab Description..." rows="5"> </textarea>
                        <div class="invalid-feedback">
                            <?php echo form_error('penyebab') ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name">Solusi*</label>
                        <textarea class="form-control" name="solusi" placeholder="Solusi Description..." rows="5"> </textarea>
                        <div class="invalid-feedback">
                            <?php echo form_error('solusi') ?>
                        </div>
                    </div>

            </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" value="submit">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
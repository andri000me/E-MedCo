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
                        <span class="text">Tambah Data Pengetahuan</span>
                    </button>

                </div>
                <?= $this->session->flashdata('message'); ?>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush" id="dataTable">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center" style="width: 5%">No</th>
                                <th class="text-center" style="width: 20%"> Kode Pengetahuan </th>
                                <th class="text-center" style="width: 15%"> Kode Penyakit </th>
                                <th class="text-center" style="width: 15%"> Kode Gejala</th>
                                <th class="text-center" style="width: 25%"> Pertanyaan </th>
                                <th class="text-center" > Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($result as $row) : ?>
                                <tr>
                                    <th scope="row" class="text-center"><?= array_search($row, $result) + 1 ?></th>
                                    <td><?= $row->kd_pengetahuan; ?></td>
                                    <td><?= $row->kd_penyakit; ?></td>
                                    <td><?= $row->kd_gejala; ?></td>
                                    <td><?= $row->pertanyaan; ?></td>
                                    <td style="text-align:center">
                                        <a href="<?= base_url('Dokter/Data_Pengetahuan/edit'); ?>/<?= $row->id_pengetahuan; ?>" type="button" class="btn btn-primary">Edit</a>
                                        <a href="<?= base_url('Dokter/Data_Pengetahuan/delete'); ?>/<?= $row->id_pengetahuan; ?>" type="button" class="btn btn-danger" onclick="return confirm ('Hapus data?'); ">Delete</a>
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
                <form method="post" action=" <?= base_url('Dokter/Data_Pengetahuan/create'); ?>" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="kd_pengetahuan">Kode Pengetahuan*</label>
                        <input type="text" class="form-control" id="kd_pengetahuan" name="kd_pengetahuan" placeholder="Kode Pengetahuan">
                        <div class="invalid-feedback">
                            <?php echo form_error('kd_pengetahuan') ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="kd_penyakit">Kode Penyakit*</label>
                        <input type="text" class="form-control" id="kd_penyakit" name="kd_penyakit" placeholder="Kode Penyakit">
                        <div class="invalid-feedback">
                            <?php echo form_error('kd_penyakit') ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="kd_gejala">Kode Gejala*</label>
                        <input type="text" class="form-control" id="kd_gejala" name="kd_gejala" placeholder="Kode Gejala">
                        <div class="invalid-feedback">
                            <?php echo form_error('kd_gejala') ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name">Pertanyaan*</label>
                        <textarea class="form-control" name="pertanyaan" placeholder="Pertanyaan Description..." rows="5"> </textarea>
                        <div class="invalid-feedback">
                            <?php echo form_error('pertanyaan') ?>
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
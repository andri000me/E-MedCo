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
        <div class="col-lg">
            <!-- Form Basic -->
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

                </div>
                <div class="card-body">
                    <form method="post" action="<?= base_url('Dokter/Data_Gejala/update'); ?>/<?= $row->id_pengetahuan; ?>" enctype="multipart/form-data">
                        <input type="hidden" id="id">

                        <div class="form-group">
                            <label for="kd_pengetahuan">Kode Pengetahuan*</label>
                            <input class="form-control" type="text" value="<?= $row->kd_pengetahuan; ?>" name="kd_pengetahuan" id="kd_pengetahuan" placeholder="Kode Pengetahuan" />
                            <div class="invalid-feedback">
                                <?php echo form_error('kd_pengetahuan') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="kd_penyakit">Kode Penyakit*</label>
                            <input class="form-control" type="text" value="<?= $row->kd_penyakit; ?>" name="kd_penyakit" id="kd_penyakit" placeholder="Kode Pengetahuan" />
                            <div class="invalid-feedback">
                                <?php echo form_error('kd_penyakit') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="kd_gejala">Kode Gejala*</label>
                            <input class="form-control" type="text" value="<?= $row->kd_gejala; ?>" name="kd_gejala" id="kd_gejala" placeholder="Kode Pengetahuan" />
                            <div class="invalid-feedback">
                                <?php echo form_error('kd_gejala') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="pertanyaan">Pertanyaan*</label>
                            <textarea class="form-control" name="pertanyaan" placeholder="Product description..." rows="5"><?= $row->pertanyaan; ?></textarea>
                            <div class="invalid-feedback">
                                <?php echo form_error('pertanyaan') ?>
                            </div>
                        </div>

                        <a href="<?= base_url('Dokter/Data_Pengetahuan') ?>" class="btn btn-danger">
                            <span class="icon text-white-10">
                                <i class="fas fa-arrow-left"></i>
                            </span>
                            <span class="text">Kembali</span>
                        </a>

                        <button type="submit" class="btn btn-primary" value="save" onclick="return confirm ('Apakah ingin merubah data ?'); ">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
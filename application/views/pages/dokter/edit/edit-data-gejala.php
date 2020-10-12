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
                    <form method="post" action="<?= base_url('Dokter/Data_Gejala/update'); ?>/<?= $row->id_gejala; ?>" enctype="multipart/form-data">
                        <input type="hidden" id="id">

                        <div class="form-group">
                            <label for="kd_gejala">Kode Penyakit*</label>
                            <input class="form-control" type="text" value="<?= $row->kd_gejala; ?>" name="kd_gejala" id="kd_gejala" placeholder="Kode Penyakit" readonly />
                            <div class="invalid-feedback">
                                <?php echo form_error('kd_gejala') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="nama_gejala">Nama Penyakit*</label>
                            <input class="form-control" type="text" value="<?= $row->nama_gejala; ?>" name="nama_gejala" id="nama_gejala" placeholder="Nama Produk" />
                            <div class="invalid-feedback">
                                <?php echo form_error('nama_gejala') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="poin_gejala">Nama Penyakit*</label>
                            <input class="form-control" type="text" value="<?= $row->poin_gejala; ?>" name="poin_gejala" id="poin_gejala" placeholder="Nama Produk" />
                            <div class="invalid-feedback">
                                <?php echo form_error('poin_gejala') ?>
                            </div>
                        </div>

                        <a href="<?= base_url('Dokter/Data_Gejala') ?>" class="btn btn-danger">
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
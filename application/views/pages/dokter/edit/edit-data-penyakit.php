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
                    <form method="post" action="<?= base_url('Dokter/Data_Penyakit/update'); ?>/<?= $row->id_penyakit; ?>" enctype="multipart/form-data">
                        <input type="hidden" id="id">

                        <div class="form-group">
                            <label for="kd_penyakit">Kode Penyakit*</label>
                            <input class="form-control" type="text" value="<?= $row->kd_penyakit; ?>" name="kd_penyakit" id="kd_penyakit" placeholder="Kode Penyakit" />
                            <div class="invalid-feedback">
                                <?php echo form_error('kd_penyakit') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="nama_penyakit">Nama Penyakit*</label>
                            <input class="form-control" type="text" value="<?= $row->nama_penyakit; ?>" name="nama_penyakit" id="nama_penyakit" placeholder="Nama Produk" />
                            <div class="invalid-feedback">
                                <?php echo form_error('nama_penyakit') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="penyebab">Penyebab*</label>
                            <textarea class="form-control" name="penyebab" placeholder="Product description..." rows="5"><?= $row->penyebab; ?></textarea>
                            <div class="invalid-feedback">
                                <?php echo form_error('penyebab') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="solusi">Solusi*</label>
                            <textarea class="form-control" name="solusi" placeholder="Product description..." rows="5"><?= $row->solusi; ?></textarea>
                            <div class="invalid-feedback">
                                <?php echo form_error('solusi') ?>
                            </div>
                        </div>

                        <a href="<?= base_url('Dokter/Data_Penyakit') ?>" class="btn btn-danger">
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
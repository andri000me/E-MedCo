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
        <div class="col-lg">
            <!-- Form Basic -->
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

                </div>
                <div class="card-body">
                    <form method="post" action="<?= base_url('Apotek/Kategori/Update'); ?>/<?= $row->id_jenis; ?>" enctype="multipart/form-data">
                        <input type="hidden" id="id_jenis">

                        <div class="form-group">
                            <label for="nama_jenis">Nama Jenis*</label>
                            <input class="form-control" type="text" value="<?= $row->nama_jenis; ?>" name="nama_jenis" id="nama_jenis" placeholder="Nama Jenis" />
                            <div class="invalid-feedback">
                                <?php echo form_error('nama_jenis') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="kode_jenis">Kode Jenis*</label>
                            <input type="text" class="form-control" value="<?= $row->kode_jenis; ?>" id="kode_jenis" name="kode_jenis" placeholder="Kode Jenis" readonly>
                            <div class="invalid-feedback">
                                <?php echo form_error('kode_jenis') ?>
                            </div>
                        </div>

                        <!-- <div class="form-group">
                            <label for="nama_kategori">Nama Jenis*</label>
                            <input class="form-control" type="text" value="<?= $row->nama_kategori; ?>" name="nama_kategori" id="nama_kategori" placeholder="Nama Kategori" />
                            <div class="invalid-feedback">
                                <?php echo form_error('nama_kategori') ?>
                            </div>
                        </div> -->

                        <!-- <div class="form-group">
                            <label for="kd_kategori">Kode Kategori*</label>
                            <input type="text" class="form-control" value="<?= $row->kd_kategori; ?>" id="kd_kategori" name="kd_kategori" placeholder="Kode Kategori" readonly>
                            <div class="invalid-feedback">
                                <?php echo form_error('kd_kategori') ?>
                            </div>
                        </div> -->


                        <a href="<?= base_url('Apotek/Kategori/') ?>" class="btn btn-danger">
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
</div>
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
                    <form method="post" action="<?= base_url('Apotek/Pesanan_Resep/update'); ?>/<?= $row->id; ?>" enctype="multipart/form-data">
                        <input type="hidden" id="id">
                        
                        <div class="form-group">
                            <label for="id">ID*</label>
                            <input class="form-control" type="text" value="<?= $row->id; ?>" name="id" id="id" placeholder="Nama Jenis" readonly/>
                            <div class="invalid-feedback">
                                <?php echo form_error('id') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="harga">Harga*</label>
                            <input type="text" class="form-control" value="<?= $row->harga; ?>" id="harga" name="harga" placeholder="Harga">
                            <div class="invalid-feedback">
                                <?php echo form_error('harga') ?>
                            </div>
                        </div>
                        
                        <a href="<?= base_url('Apotek/Pesanan_Resep/') ?>" class="btn btn-danger">
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
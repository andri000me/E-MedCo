<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Master Produk</h1> <!-- Ganti Judul -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item">Pages</li>
            <li class="breadcrumb-item active" aria-current="page">Data Master Produk</li>
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
                    <form method="post" action="<?= base_url('Apotek/Produk/update'); ?>/<?= $row->id_produk; ?>" enctype="multipart/form-data">
                        <input type="hidden" id="id">
                        <div class="form-group">
                            <label for="kode_produk">Kode Produk*</label>
                            <input class="form-control" type="text" value="<?= $row->kode_produk; ?>" name="kode_produk" id="kode_produk" placeholder="Kode Produk" />
                            <div class="invalid-feedback">
                                <?php echo form_error('kode_produk') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="nama_produk">Nama Produk*</label>
                            <input class="form-control" type="text" value="<?= $row->nama_produk; ?>" name="nama_produk" id="nama_produk" placeholder="Nama Produk" />
                            <div class="invalid-feedback">
                                <?php echo form_error('nama_produk') ?>
                            </div>
                        </div>

                        <!-- Jenis -->
                        <div class="form-group">
                            <label for="id_jenis">Jenis Produk</label>
                            <select name="nama_jenis" class="form-control" id="id_jenis">
                                <?php
                                $sql = $this->db->query("SELECT * FROM tb_jenis WHERE kd_apotek='{$_SESSION['kd_apotek']}'");
                                foreach ($sql->result() as $j) {

                                    $status = ($j->id_jenis == $row->id_jenis) ? 'selected' : '';
                                    echo '<option value="' . $j->id_jenis . '" ' . $status . '>' . $j->nama_jenis . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <!-- Jenis -->

                        <div class="form-group">
                            <label for="harga_produk">Harga*</label>
                            <input class="form-control" type="text" value="<?= $row->harga_produk; ?>" name="harga_produk" id="harga_produk" placeholder="Harga Produk" />
                            <div class="invalid-feedback">
                                <?php echo form_error('harga_produk') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="img_produk">Photo Produk</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="img_produk" value="<?= $row->img_produk; ?>" />
                                <label class="custom-file-label" for="img_produk">Choose file</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="stok_produk">Stok*</label>
                            <input class="form-control" type="text" value="<?= $row->stok_produk; ?>" name="stok_produk" id="stok_produk" placeholder="Stok Produk" />
                            <div class="invalid-feedback">
                                <?php echo form_error('stok_produk') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="deskripsi_produk">Deskripsi*</label>
                            <textarea class="form-control" name="deskripsi_produk" id="editor" placeholder="Product description..."><?= $row->deskripsi_produk; ?></textarea>
                            <div class="invalid-feedback">
                                <?php echo form_error('deskripsi_produk') ?>
                            </div>
                        </div>
                        <a href="<?= base_url('Apotek/Produk/') ?>" class="btn btn-danger">
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
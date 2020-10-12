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
        <div class="row ml-1 mb-3">
            <a href="<?= base_url('Apotek/Kadaluarsa/pdf') ?>" class="btn btn-sm btn-primary ml-2 mt-2 shadow-sm">Cetak Semua</a>
            <button data-toggle="modal" data-target="#modalCetakTanggal" class="btn btn-sm shadow-sm btn-success ml-2 mt-2">Cetak Berdasarkan Tanggal</button>
            <button data-toggle="modal" data-target="#modalCetakProduk" class="btn btn-sm shadow-sm btn-warning ml-2 mt-2">Cetak Berdasarkan Nama Produk</button>
        </div>
        <!-- Datatables -->
        <div class="col-lg-12">
            <!-- Lebar Content -->
            <div class="card mb-4">
                <div class="card-header py-3">
                </div>
                <?= $this->session->flashdata('message'); ?>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush" id="dataTable">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center" scope="col">No</th>
                                <th class="text-center" scope="col">Kd Transaksi</th>
                                <th class="text-center" scope="col">Kd Produk</th>
                                <th class="text-center" scope="col">Nama Produk</th>
                                <th class="text-center" scope="col">Jumlah Masuk</th>
                                <th class="text-center" scope="col">Tanggal Kadaluarsa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($result as $row) : ?>
                                <tr>
                                    <th scope="row" class="text-center"><?= array_search($row, $result) + 1 ?></th>
                                    <td class="text-center"><?= $row->kd_transaksi; ?></td>
                                    <td class=""><?= $row->kode_produk; ?></td>
                                    <td class=""><?= $row->nama_produk; ?></td>
                                    <td class="text-right"><?= $row->jumlah_masuk; ?></td>
                                    <td class=""><?= $row->kadaluarsa; ?></td>
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
<div class="modal fade" id="modalCetakTanggal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cetak Berdasarkan Tanggal Tertentu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <input type="hidden" name="_token" value="">
                    <div class="card mb-2">
                        <div class="card-body">
                            <label for="from">Dari Tanggal :</label>
                            <div class="input-group mb-2 mr-sm-2">
                                <input required style="cursor: pointer;" type="date" class="form-control datepicker" name="from" id="from" placeholder="Pilih Tanggal">
                            </div>
                            <label for="to">Sampai Tanggal :</label>
                            <div class="input-group mb-2 mr-sm-2">
                                <input required style="cursor: pointer;" type="date" class="form-control datepicker" name="to" id="to" placeholder="Pilih Tanggal">
                            </div>
                            <button type="submit" class="btn btn-primary">Cetak</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- Modal Produk-->
<div class="modal fade" id="modalCetakProduk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cetak Berdasarkan Produk Tertentu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Apotek/Kadaluarsa/pdf'); ?>" method="post">
                    <input type="hidden" name="_token" value="">
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama_jenis">Jenis Produk</label>
                                <select class="form-control" name="id_jenis_bencana" id="id_jenis_bencana">
                                    <option value="B001">Covid-19</option>
                                    <option value="B002">Kebakaran</option>
                                    <option value="B003">Banjir</option>
                                </select><br>

                                <select class="form-control" id="id_jenis" name="nama_jenis">
                                    <?php
                                    $pilihan = $this->db->query("SELECT * FROM tb_jenis WHERE kd_apotek='{$_SESSION['kd_apotek']}'");
                                    foreach ($pilihan->result() as $row) {
                                        ?>
                                        <option value="<?= $row->id_jenis ?>"><?= $row->nama_jenis ?></option>
                                    <?php } ?>
                                </select>

                            </div>
                            <button type="submit" class="btn btn-primary">Cetak</button>
                        </div>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>
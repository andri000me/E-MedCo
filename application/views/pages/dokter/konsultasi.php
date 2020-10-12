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

                </div>
                <?= $this->session->flashdata('message'); ?>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush" id="dataTable">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center" style="width: 5%">No</th>
                                <th class="text-center" style="width: 20%" scope="col">Pasien</th>
                                <th class="text-center" scope="col">Keluhan</th>
                                <th class="text-center" scope="col">Tanggal</th>
                                <th class="text-center" scope="col">Jam</th>
                                <th class="text-center" scope="col">Lokasi</th>
                                <th class="text-center" scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($result as $row) : ?>
                                <tr>
                                    <th scope="row" class="text-center"><?= array_search($row, $result) + 1 ?></th>
                                    <td class=""><?= $row->nama_pasien; ?></td>
                                    <td class=""><?= $row->keluhan; ?></td>
                                    <td class="text-center"><?= $row->tanggal; ?></td>
                                    <td class="text-center"><?= $row->jam; ?></td>
                                    <td class=""><?= $row->lokasi; ?></td>
                                    <td style="text-align:center">
                                        <?php if ($row->status == 1) {
                                            echo '<a href="' . base_url('Dokter/Konsultasi/statusa/') . $row->id . '"type="button" class="btn btn-danger btn-block"> Menunggu </a>';
                                        } else {
                                            echo '<a href="' . base_url('Dokter/Konsultasi/statusb/') . $row->id . '"type="button" class="btn btn-success btn-block"> Disetujui </a>';
                                        }
                                        ?>
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
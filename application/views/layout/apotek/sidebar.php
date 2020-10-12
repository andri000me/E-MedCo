<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('Apotek/Dashboard') ?>">
        <div class="sidebar-brand-icon">
            <img src="<?= base_url('assets/vendor-admin/'); ?>img/logo/logo2.png">
        </div>
        <div class="sidebar-brand-text mx-3">RuangAdmin</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item <?= $this->uri->segment(2) == 'Dashboard' ? 'active' : '' ?>">
        <a class="nav-link " href="<?= base_url('Apotek/Dashboard'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Apotek
    </div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap" aria-expanded="true" aria-controls="collapseBootstrap">
            <i class="far fa-fw fa-window-maximize"></i>
            <span>Data Master</span>
        </a>
        <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Data Master</h6>
                <a class="collapse-item" href="<?= base_url('Apotek/Produk') ?>">Data Produk</a>
                <a class="collapse-item" href="<?= base_url('Apotek/Permintaan') ?>">Data Permintaan</a>
                <a class="collapse-item" href="<?= base_url('Apotek/Pemesanan') ?>">Data Pemesanan</a>
                <a class="collapse-item" href="<?= base_url('Apotek/Kategori') ?>">Data Kategori</a>
                <a class="collapse-item" href="<?= base_url('Apotek/Produk_Masuk') ?>">Data Produk Masuk</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm" aria-expanded="true" aria-controls="collapseForm">
            <i class="fab fa-fw fa-wpforms"></i>
            <span>Laporan</span>
        </a>
        <div id="collapseForm" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Laporan</h6>
                <a class="collapse-item" href="<?= base_url('Apotek/Cek_Kadaluarsa') ?>">Laporan Cek Kadaluarsa</a>
                <a class="collapse-item" href="<?= base_url('Apotek/Kadaluarsa') ?>">Laporan Kadaluarsa</a>
                <a class="collapse-item" href="<?= base_url('Apotek/Pesanan_Resep') ?>">Laporan Pesanan Resep</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider">
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Login/logout'); ?>">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span> Logout </span></a>
    </li>
</ul>
<!-- Sidebar -->
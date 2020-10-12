<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('Dokter/Data_Gejala') ?>">
        <div class="sidebar-brand-icon">
            <img src="<?= base_url('assets/vendor-admin/'); ?>img/logo/logo2.png">
        </div>
        <div class="sidebar-brand-text mx-3">RuangAdmin</div>
    </a>

    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Dokter
    </div>
    <li class="nav-item <?= $this->uri->segment(2) == 'Data_Gejala' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('Dokter/Data_Gejala'); ?>">
            <i class="fas fa-fw fa-user-edit"></i>
            <span>Data Master Gejala</span></a>
    </li>
    <li class="nav-item <?= $this->uri->segment(2) == 'Data_Penyakit' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= site_url('Dokter/Data_Penyakit'); ?>">
            <i class="fas fa-fw fa-clinic-medical"></i>
            <span>Data Master Penyakit</span></a>
    </li>
    <li class="nav-item <?= $this->uri->segment(2) == 'Data_Pengetahuan' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= site_url('Dokter/Data_Pengetahuan'); ?>">
            <i class="fas fa-fw fa-folder-open"></i>
            <span>Data Master Pengetahuan</span></a>
    </li>
    <li class="nav-item <?= $this->uri->segment(2) == 'Chat' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= site_url('Dokter/Chat'); ?>">
            <i class="fas fa-fw fa-stethoscope"></i>
            <span>Chat</span></a>
    </li>
    <li class="nav-item <?= $this->uri->segment(2) == 'Konsultasi' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= site_url('Dokter/Konsultasi'); ?>">
            <i class="fas fa-fw fa-sticky-note"></i>
            <span>Jadwal Konsultasi</span></a>
    </li>
    <hr class="sidebar-divider">
    
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Login/logout'); ?>">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span> Logout </span></a>
    </li>
</ul>
<!-- Sidebar -->
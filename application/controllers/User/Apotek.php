<?php

class Apotek extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('Googlemaps');
        $this->load->model('ApotekUser_model');
        $this->load->model('ProdukUser_model');
        $this->load->model('Apotek_model');
        $this->load->model('Resep_model');
    }

    public function index()
    {
        $data['h2'] = ' Apotek';
        $data['title'] = 'Cari Apotek';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['apotek'] = $this->ApotekUser_model->get_apotek();

        $this->load->view('layout/user/header', $data); //
        $this->load->view('pages/user/apotek/apotek', $data); // 
        $this->load->view('layout/user/footer', $data); //
    }

    public function Produk($kd_apotek = NULL)
    {
        $data['h2'] = 'Cari Obat (Tidak Sesuai Apotek)';
        $data['title'] = 'Masih BUG';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        // $data['produk'] = $this->ApotekUser_model->get_produk();

        $data['produk'] = $this->ProdukUser_model->get_produk2();

        $this->load->view('layout/user/header', $data); //
        $this->load->view('pages/user/apotek/apotek-pesan-obat', $data); // 
        $this->load->view('layout/user/footer', $data); //
    }

    public function Detail($kd_produk = NULL, $kd_apotek = NULL)
    {
        $data['title'] = 'Cari Obat';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['listproduk'] = $this->ProdukUser_model->get_produk($kd_produk, $kd_apotek);

        $this->load->view('layout/user/header', $data); //
        $this->load->view('pages/user/apotek/apotek', $data); // 
        $this->load->view('layout/user/footer', $data); //

        if (empty($data['listproduk'])) {
            show_404();
        }
    }

    public function Pesan($kd_produk = NULL)
    {
        $data['title'] = 'Pesan Obat';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['row'] = $this->ProdukUser_model->get_pesanan($kd_produk);

        $this->load->view('layout/user/header', $data); //
        $this->load->view('pages/user/apotek/apotek-pesan-obat', $data); // 
        $this->load->view('layout/user/footer', $data); //

        if (empty($data['row'])) {
            show_404();
        }
    }


    // Untuk Maps
    public function Maps()
    {
        $config['center'] = '-6.208548,106.845337';
        $config['zoom'] = 11;
        $config['map_height'] = "660px";
        $this->googlemaps->initialize($config);

        $apotek = $this->Apotek_model->getAllData();
        foreach ($apotek as $list) {
            $marker = array();
            $marker['position'] = "$list->lat,$list->lng";
            $marker['animation'] = "DROP";
            $marker['icon'] = base_url('img-maps/marker1.png'); // Letak File
            $marker['infowindow_content'] = '<div class="media" style="width:300px;">';
            $marker['infowindow_content'] .= '<div class="media-body">';
            $marker['infowindow_content'] .= '<h5>' . $list->nama_apotek . '</h5>';
            $marker['infowindow_content'] .= '<p>' . $list->alamat_apotek . '</p>';
            $marker['infowindow_content'] .= '<p>No. Telp: ' . $list->telp_apotek . '</p>';
            $marker['infowindow_content'] .= '<a href="' . base_url('User/Obat/' . $list->kd_apotek) . '" class="btn btn-primary">Pesan Obat</a>';
            echo '<br>';
            echo '<br>';
            $marker['infowindow_content'] .= '<a href="' . base_url('User/Obat/Pesan/' . $list->kd_apotek) . '" class="btn btn-primary">Pesan Resep</a>';
            $marker['infowindow_content'] .= '</div>';
            $marker['infowindow_content'] .= '</div>';

            $this->googlemaps->add_marker($marker);
        }

        $data = array(
            'map'   => $this->googlemaps->create_map(),
        );

        $data['h2'] = 'Halaman Maps';
        $data['title'] = 'Halaman Maps';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['result'] = $this->Apotek_model->getAllData();

        $this->load->view('layout/user/header', $data); //
        $this->load->view('pages/user/apotek/apotek-map', $data); // 
        $this->load->view('layout/user/footer', $data, FALSE); //
    }

    public function Pesan_Resep()
    {
        $data['h2'] = 'Detail Resep';
        $data['title'] = 'Detail Resep';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('layout/user/header', $data); //
        $this->load->view('pages/user/apotek/apotek-pesan-resep', $data); // 
        $this->load->view('layout/user/footer', $data); //

    }

    public function create_resep()
    {
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Resep berhasil dikirim, sedang disiapkan ! </div>');
        $this->Resep_model->createData();
        redirect('User/Riwayat/Resep');
    }
}

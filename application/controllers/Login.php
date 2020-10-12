<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {

        $this->form_validation->set_rules('email', 'Email', 'trim|required'); // validate data
        $this->form_validation->set_rules('password', 'Password', 'trim|required'); // validate data

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Halaman Login';

            $this->load->view('pages/auth/login', $data);
        } else {
            // validasi sukses
            $this->_login(); // method private untuk login yg sudah ada database
        }
    }

    // Registrasi
    public function registrasi()
    {
        // Nama
        $this->form_validation->set_rules('name', 'Name', 'required|trim'); // trim berfungsi sebagai menghilangkan karakter spasi di awal dan di akhir sebuah string.

        // Email
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tb_user.email]', [
            'is_unique' => 'Email Sudah Digunakan!'  // pesan jika email sudah digunakan
        ]);

        // Password 1
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', [
            'matches' => 'Password Sudah Digunakan!', // pesan jika password sudah digunakan
            'min_length' => 'Kata Sandi Anda Terlalu Lemah!'
        ]);

        // Password 2
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Halaman Registrasi';

            $this->load->view('pages/auth/registrasi', $data);
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT), // password hash untuk enkripsi
                'is_active' => 1,
                'date_created' => time()
            ];

            // insert data ke database
            $this->db->insert('tb_user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Berhasil Membuat Akun, Silahkan Login </div>'); // menampilkan di views->register->login.php [ this->session->flashdata('message') ]
            redirect('login');
        }
    }


    private function _login()
    {

        $email = $this->input->post('email'); // 
        $password = $this->input->post('password'); //

        $user = $this->db->get_where('tb_user', ['email' => $email])->row_array(); // jika email di tb_user sesuai dengan database

        //usernya ada
        if ($user) {

            if ($user['is_active'] == 1) {

                if (password_verify($password, $user['password'])) {

                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id'], // menentukan data user role id apakah Admin atau User
                        'id' => $user['id'],
                        'name' => $user['name'],
                        'kd_apotek' => $user['kd_apotek']
                    ];

                    $this->session->set_userdata($data);
                    switch ($user['role_id']) {
                        case 1:
                            redirect('Admin/Dashboard'); // Akses Apotek Muncul Halaman Dashboard
                            break;
                        case 2:
                            redirect('Apotek/Dashboard'); // Akses Apotek Muncul Halaman Dashboard
                            break;
                        case 3:
                            redirect('User/Home'); // Akses User Muncul Halaman Home
                            break;
                        case 4:
                            redirect('Dokter/Data_Gejala'); // Akses Dokter Muncul Halaman Data Gejala
                            break;
                        case 5:
                            redirect('Manajer/Apotek'); // Akses Manajer Muncul Halaman Pengurus
                            break;

                        default:
                            break;
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password! </div>');
                    redirect('login');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This username has not been activated </div>');
                redirect('login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username is not registered! </div>');
            redirect('login');
        }
    }

    // Function Logout
    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Anda Berhasil Logout </div>');
        redirect('Welcome   ');
    }
}

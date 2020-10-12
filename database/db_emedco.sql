-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Okt 2020 pada 05.38
-- Versi server: 10.4.10-MariaDB
-- Versi PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_emedco`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `attachment_name` text NOT NULL,
  `file_ext` text NOT NULL,
  `mime_type` text NOT NULL,
  `message_date_time` text NOT NULL,
  `ip_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_apotek`
--

CREATE TABLE `tb_apotek` (
  `id` int(10) NOT NULL,
  `kd_apotek` varchar(10) NOT NULL,
  `nama_apotek` varchar(150) NOT NULL,
  `telp_apotek` char(20) NOT NULL,
  `alamat_apotek` varchar(255) NOT NULL,
  `lat` varchar(50) NOT NULL,
  `lng` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_apotek`
--

INSERT INTO `tb_apotek` (`id`, `kd_apotek`, `nama_apotek`, `telp_apotek`, `alamat_apotek`, `lat`, `lng`, `deskripsi`) VALUES
(1, 'AP001', 'Apotek Pejaten Sehat', '0884561598', 'Jl. Pejaten Raya, RT.8/RW.10, Jati Padang, Kec. Ps. Minggu, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12510', '-6.279891', '106.834976', 'Buka Jam 8:00 AM'),
(4, 'AP002', 'Apotik Rini', '+62214753129', 'Jl. Balai Pustaka No.10-111, RT.4/RW.11, Rawamangun, Kec. Pulo Gadung, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13220', '-6.199927207946357', '106.88566133032992', 'Buka 24 Jam'),
(5, 'AP003', 'APOTEK COBA COBA', '', 'JL Kenangan', '', '', 'Buka 32 Jam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_gejala`
--

CREATE TABLE `tb_gejala` (
  `id_gejala` int(11) NOT NULL,
  `kd_gejala` varchar(12) NOT NULL,
  `nama_gejala` varchar(128) NOT NULL,
  `poin_gejala` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_gejala`
--

INSERT INTO `tb_gejala` (`id_gejala`, `kd_gejala`, `nama_gejala`, `poin_gejala`) VALUES
(1, 'G001', 'Demam tinggi', 10),
(2, 'G002', 'Kondisi lemah', 4),
(3, 'G003', 'Diare', 7),
(4, 'G004', 'Kesulitan Bernapas', 4),
(5, 'G005', 'Pendarahan berwarna kehitaman yg keluar dari luban', 8),
(6, 'G006', 'Keluar air liur terus-menerus', 7),
(7, 'G007', 'Nafsu makan berkurang', 9),
(8, 'G008', 'Sering mendengkur', 10),
(9, 'G009', 'Selaput lendir kemerahan', 5),
(10, 'G0010', 'Kurus dan bulu rontok', 10),
(11, 'G011', 'Selaput lendir menguning', 7),
(12, 'G012', 'Jalan sempoyongan dan berputar-putar', 6),
(13, 'G013', 'Keluar cairan dari hidung dan mata', 9),
(14, 'G014', 'Moncong kering dan pecah-pecah', 8),
(15, 'G015', 'Kornea mata keruh dan keputihan', 10),
(16, 'G016', 'Menggosok-gosokan badan kedinding', 10),
(17, 'G017', 'Kerontokan bulu', 8),
(18, 'G018', 'Kerak pada permukaan kulit', 7),
(19, 'G019', 'Lepuhan bernanah pada kulit', 3),
(20, 'G020', 'Penebalan pada kulit', 9),
(21, 'G021', 'Batuk yang berlangsung lama (3 minggu atau lebih), biasanya berdahak', 10),
(22, 'G022', 'Batuk mengeluarkan darah', 8),
(23, 'G023', 'Berkeringat pada malam hari', 6),
(24, 'G024', 'Demam dan menggigil.', 4),
(25, 'G025', 'Nyeri dada saat bernapas atau batuk', 8),
(26, 'G026', 'Tidak nafsu makan', 2),
(27, 'G027', 'Tidak nafsu makan', 3),
(28, 'G028', 'Lemas', 2),
(29, 'G029', 'Demam menggigil', 3),
(30, 'G030', 'Sakit tenggorokan', 2),
(31, 'G031', 'Suara serak', 2),
(32, 'G032', 'Terbentuknya selaput tebal berwarna putih keabuan yang menutupi bagian amandel dan tenggorokan', 9),
(33, 'G033', 'Pembesaran kelenjar getah bening terutama di daerah leher', 10),
(34, 'G034', 'Sesak napas', 7),
(35, 'G035', 'Rasa lelah berlebihan', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jadwal_konsul`
--

CREATE TABLE `tb_jadwal_konsul` (
  `id` int(10) NOT NULL,
  `user` varchar(128) NOT NULL,
  `nama_pasien` varchar(128) NOT NULL,
  `keluhan` varchar(128) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `lokasi` varchar(128) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jenis`
--

CREATE TABLE `tb_jenis` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(50) NOT NULL,
  `kode_jenis` char(10) NOT NULL,
  `kd_apotek` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jenis`
--

INSERT INTO `tb_jenis` (`id_jenis`, `nama_jenis`, `kode_jenis`, `kd_apotek`) VALUES
(1, 'Obat', 'OB', 'AP001'),
(2, 'Peralatan', 'PE', 'AP001'),
(4, 'P3K', 'P3K', 'AP001'),
(6, 'Obat', 'KB', 'AP002'),
(7, 'Peralatan', 'KP', 'AP002'),
(8, 'P3K', 'KK', 'AP002'),
(10, 'Obat', 'OB', 'AP003');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kadaluarsa`
--

CREATE TABLE `tb_kadaluarsa` (
  `kd_transaksi` varchar(15) NOT NULL,
  `kd_apotek` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `kode_produk` varchar(10) NOT NULL,
  `jumlah_masuk` int(10) NOT NULL,
  `kadaluarsa` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kadaluarsa`
--

INSERT INTO `tb_kadaluarsa` (`kd_transaksi`, `kd_apotek`, `tanggal`, `kode_produk`, `jumlah_masuk`, `kadaluarsa`) VALUES
('TRM-2020-000001', 'AP001', '2020-06-22', 'OB0005', 20, '2021-06-22'),
('TRM-2020-000002', 'AP001', '2020-06-22', 'OB0003', 15, '2021-06-15'),
('TRM-2020-000003', 'AP001', '2020-06-22', 'OB0003', 12, '2021-06-12'),
('TRM-2020-000006', 'AP001', '2020-07-02', 'OB0005', 5, '2021-07-02'),
('TRM-2020-000007', 'AP001', '2020-07-02', 'OB0001', 5, '2021-07-02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_masuk`
--

CREATE TABLE `tb_masuk` (
  `kd_transaksi` varchar(15) NOT NULL,
  `kd_apotek` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `kode_produk` varchar(10) NOT NULL,
  `jumlah_masuk` int(10) NOT NULL,
  `kadaluarsa` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengetahuan`
--

CREATE TABLE `tb_pengetahuan` (
  `id_pengetahuan` int(11) NOT NULL,
  `kd_pengetahuan` varchar(12) NOT NULL,
  `kd_penyakit` varchar(12) NOT NULL,
  `kd_gejala` varchar(12) NOT NULL,
  `pertanyaan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pengetahuan`
--

INSERT INTO `tb_pengetahuan` (`id_pengetahuan`, `kd_pengetahuan`, `kd_penyakit`, `kd_gejala`, `pertanyaan`) VALUES
(1, 'PG001', 'P001', 'G001', 'Apakah mengalami Kondisi lemah ?'),
(2, 'PG002', 'P001', 'G002', 'Apakah mengalami Diare ?'),
(3, 'PG003', 'P001', 'G003', 'Apakah mengalami Kesulitan Bernapas ?'),
(4, 'PG004', 'P001', 'G004', 'Apakah mengalami Pendarahan berwarna kehitaman yg keluar dari luban ?'),
(5, 'PG005', 'P001', 'G00', 'Selesai'),
(6, 'PG006', 'P002', 'G004', 'Apakah sapi mengalami Keluar air liur terus-menerus ?'),
(7, 'PG007', 'P002', 'G006', 'Apakah sapi mengalami Nafsu makan berkurang ?'),
(8, 'PG008', 'P002', 'G007', 'Apakah sapi mengalami Sering mendengkur ?'),
(9, 'PG009', 'P002', 'G008', 'Apakah sapi mengalami Selaput lendir kemerahan ?'),
(10, 'PG010', 'P002', 'G009', 'Selesai'),
(11, 'PG011', 'P003', 'G001', 'Apakah sapi mengalami Nafsu makan berkurang ?'),
(12, 'PG012', 'P003', 'G007', 'Apakah sapi mengalami kurus dan bulu rontok'),
(13, 'PG013', 'P003', 'G010', 'Apakah sapi mengalami Selaput lendir menguning ?'),
(14, 'PG014', 'P003', 'G011', 'Apakah sapi mengalami Jalan sempoyongan dan berputar-putar ?'),
(15, 'PG015', 'P003', 'G012', 'Selesai'),
(16, 'PG016', 'P004', 'G003', 'Apakah sapi mengalami nafsu makan berkurang ?'),
(17, 'PG017', 'P004', 'G007', 'Apakah sapi mengalami Keluar cairan dari hidung dan mata ?'),
(18, 'PG018', 'P004', 'G013', 'Apakah sapi mengalami Moncong kering dan pecah-pecah ?'),
(19, 'PG019', 'P004', 'G014', 'Apakah sapi mengalami Kornea mata keruh dan keputihan ?'),
(20, 'PG020', 'P004', 'G015', 'Selesai'),
(21, 'PG021', 'P005', 'G016', 'Apakah sapi mengalami kerontokan pada bulu ?'),
(22, 'PG022', 'P005', 'G017', 'Apakah sapi mengalami kerak pada permukaan kulit ?'),
(23, 'PG023', 'P005', 'G018', 'Apakah sapi mengalami Lepuhan bernanah pada kulit ?'),
(24, 'PG024', 'P005', 'G019', 'Apakah sapi mengalami Penebalan pada kulit ?'),
(25, 'PG025', 'P005', 'G020', 'Selesai'),
(26, 'PG026', 'P006', 'G021', 'COBA '),
(27, 'PG027', 'P006', 'G022', 'COBA '),
(28, 'PG028', 'P006', 'G023', 'COBA '),
(29, 'PG029', 'P006', 'G024', 'COBA '),
(30, 'PG030', 'P006', 'G025', 'COBA '),
(31, 'PG031', 'P006', 'G026', 'COBA '),
(32, 'PG032', 'P006', 'G028', 'COBA '),
(33, 'PG033', 'P007', 'G029', 'COBA '),
(34, 'PG034', 'P007', 'G030', 'COBA '),
(35, 'PG035', 'P007', 'G031', 'COBA '),
(36, 'PG036', 'P007', 'G032', 'COBA '),
(37, 'PG037', 'P007', 'G033', 'COBA '),
(38, 'PG038', 'P007', 'G034', 'COBA '),
(39, 'PG039', 'P007', 'G035', 'COBA ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengurus`
--

CREATE TABLE `tb_pengurus` (
  `id` int(10) NOT NULL,
  `nik` int(10) NOT NULL,
  `kd_apotek` varchar(10) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `jabatan` varchar(128) NOT NULL,
  `alamat` text NOT NULL,
  `telp` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pengurus`
--

INSERT INTO `tb_pengurus` (`id`, `nik`, `kd_apotek`, `nama`, `jabatan`, `alamat`, `telp`) VALUES
(1, 123456789, 'AP001', 'Manajer 1', 'Manajer', 'Jl. Inaja Dulu', '08888008880'),
(2, 123456788, 'AP001', 'Pegawai 1', 'Pegawai', 'Jl. Jalan Terus', '0880808808'),
(3, 0, 'AP001', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penyakit`
--

CREATE TABLE `tb_penyakit` (
  `id_penyakit` int(11) NOT NULL,
  `kd_penyakit` varchar(11) NOT NULL,
  `nama_penyakit` varchar(50) NOT NULL,
  `penyebab` text NOT NULL,
  `solusi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_penyakit`
--

INSERT INTO `tb_penyakit` (`id_penyakit`, `kd_penyakit`, `nama_penyakit`, `penyebab`, `solusi`) VALUES
(0, 'P006', 'Tuberkulosis', 'TBC (tuberkulosis) disebabkan oleh infeksi kuman dengan nama yang sama, yaitu Mycobacterium tuberculosis. Kuman atau bakteri ini menyebar di udara melalui percikan ludah penderita, misalnya saat berbicara, batuk, atau bersin. Meski demikian, penularan TBC membutuhkan kontak yang cukup dekat dan cukup lama dengan penderita, tidak semudah penyebaran fluu.', 'TBC dapat disembuhkan jika penderitanya patuh mengonsumsi obat sesuai dengan resep dokter. Untuk mengatasi penyakit ini, penderita perlu minum beberapa jenis obat untuk waktu yang cukup lama (minimal 6 bulan).'),
(7, 'P007', 'Difteri', 'Difteri adalah infeksi bakteri berat yang menyebabkan pembentukan selaput lendir pada hidung dan tenggorokan. Bakteri penyebab difteri adalah Corynebacterium diphtheriae. Penularan bakteri ini adalah melalui kontak langsung dengan pasien difteri atau melalui kontak dengan benda-benda yang terkontaminasi bakteri, seperti cangkir atau tisu bekas pasien. Anda juga mungkin terkena difteri jika berada di sekitar orang yang terinfeksi difteri akibat menghirup droplet batuk atau bersin penderita.', 'Pemberian antitoksin, untuk melawan racun yang dihasilkan oleh bakteri. Karena tidak semua orang tubuhnya bisa menerima antitoksin, maka dokter akan memberi antitoksin dengan dosis rendah dan meningkatkan dosisnya secara bertahap. Hal tersebut akan dilakukan bila penderita memiliki alergi terhadap antitoksin. Pemberian antibiotik untuk mengatasi infeksi di bawah pengawasan dokter. Anjuran pemberian booster vaksin difteri setelah pengidap kembali sehat, untuk membangun pertahanan terhadap difteri.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `pemesan` text NOT NULL,
  `id_produk` int(11) NOT NULL,
  `qty` int(3) NOT NULL,
  `deskripsi_pesanan` text NOT NULL,
  `waktu_ambil` time NOT NULL,
  `id_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pesan_resep`
--

CREATE TABLE `tb_pesan_resep` (
  `id` int(10) NOT NULL,
  `kd_apotek` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `detail` text NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `harga` int(10) NOT NULL,
  `img_bayar` varchar(100) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pesan_resep`
--

INSERT INTO `tb_pesan_resep` (`id`, `kd_apotek`, `nama`, `detail`, `tanggal`, `waktu`, `harga`, `img_bayar`, `status`) VALUES
(11, 'Pesan_Rese', 'Rivaldy Nur Fachriza', 'Minta Salonpas ', '2020-10-11', '01:02:00', 0, 'default.jpg', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int(11) NOT NULL,
  `kode_produk` varchar(10) NOT NULL,
  `kd_apotek` varchar(10) NOT NULL,
  `nama_produk` varchar(500) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `id_jenis` varchar(20) NOT NULL,
  `stok_produk` int(11) NOT NULL,
  `img_produk` varchar(100) NOT NULL,
  `deskripsi_produk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `kode_produk`, `kd_apotek`, `nama_produk`, `harga_produk`, `id_jenis`, `stok_produk`, `img_produk`, `deskripsi_produk`) VALUES
(17, 'OB0005', 'AP001', 'BISOLVON EXTRA SIRUP 60 ML', 25000, '1', 300, 'produk_1601916442.jpg', '<p><strong>Bisolvon COba</strong></p>\r\n'),
(18, 'OB0005', 'AP002', 'BISOLVON EXTRA SIRUP 60 ML COBA', 32000, '3', 333, 'produk_1601916442.jpg', '<p><strong>Bisolvon COba</strong></p>\r\n'),
(19, 'PR0001', 'AP001', 'Kasa Steril Husada 16 Cm X 16Cm 16 Lembar', 25000, '4', 125, 'produk_1602433381.jpg', '<p>Deskripsi<br />\r\nKASA STERIL HUSADA 16 CM X 16CM adalah kasa steril yang digunakan untuk operasi besar/kecil, khitan, penutup luka dan bebat pusar bayi. Produk ini aman digunakan karena disterilisasi dengan iradiasi sinar gamma yang tidak meninggalkan residu bahan kimia pada produk.</p>\r\n\r\n<p>Aturan Pakai<br />\r\nGunakan untuk melindungi luka terbuka</p>\r\n'),
(20, 'OB0003', 'AP001', 'Cendo Xitrol Eye Drop 5 ML', 20000, '1', 120, 'produk_1602433501.jpg', '<p><strong>Deskripsi</strong><br />\r\nCENDO XITROL adalah tetes mata steril yang mengandung Deksametason, Neomycin Sulfate, Poliymyxin B Sulfate. Obat ini bersifat bakterisid untuk beberapa gram-positif dan gram-negatif. Dalam penggunaan obat ini harus SESUAI DENGAN PETUNJUK DOKTER.</p>\r\n\r\n<p><strong>Dosis</strong><br />\r\nPENGGUNAAN OBAT INI HARUS SESUAI DENGAN PETUNJUK DOKTER. 1-2 tetes tiap jam pada siang hari, dan tiap 2 jam pada malam hari. jika respon baik dikurangi menjadi 1 tetes tiap 4 jam</p>\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_request`
--

CREATE TABLE `tb_request` (
  `id` int(10) NOT NULL,
  `kd_apotek` varchar(10) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `detail` text NOT NULL,
  `alasan` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_status`
--

CREATE TABLE `tb_status` (
  `id_status` int(11) NOT NULL,
  `nama_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_status`
--

INSERT INTO `tb_status` (`id_status`, `nama_status`) VALUES
(1, 'Selesai'),
(2, 'Menunggu'),
(3, 'Batal');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id` int(10) NOT NULL,
  `pemesan` varchar(100) NOT NULL,
  `kd_apotek` varchar(10) NOT NULL,
  `kode_produk` varchar(10) NOT NULL,
  `produk` varchar(100) NOT NULL,
  `qty` int(10) NOT NULL,
  `total` int(10) NOT NULL,
  `tgl_pesan` date NOT NULL,
  `waktu` varchar(10) NOT NULL,
  `img_bayar` varchar(100) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id`, `pemesan`, `kd_apotek`, `kode_produk`, `produk`, `qty`, `total`, `tgl_pesan`, `waktu`, `img_bayar`, `status`) VALUES
(31, 'Rivaldy Nur Fachriza', 'OB0005', 'OB0005', 'BISOLVON EXTRA SIRUP 60 ML', 12, 300000, '2020-10-11', '12:26', 'bayarobat_1602437732.jpg', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(500) NOT NULL,
  `role_id` int(11) NOT NULL,
  `kd_apotek` varchar(10) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `kd_apotek`, `is_active`, `date_created`) VALUES
(11, 'Admin', 'admin@gmail.com', 'default.jpg', '$2y$10$zqYER6CKFTOey17XFiFeG.rMsQVQLrN9jommSHB7/H5g3i7CkNXxe', 2, '', 1, 1601564264),
(12, 'Apotek 1', 'apotek1@gmail.com', 'default.jpg', '$2y$10$sVqq96mTZPBYs38goe4dduk5YhGD5La86xXPqrtw3IsD4uoVH0Ewm', 2, 'AP001', 1, 1601565839),
(13, 'Rivaldy Nur Fachriza', 'rivaldynf@gmail.com', 'default.jpg', '$2y$10$fXPuMJ2xHjq4RbEfRTJ0OOOp.fI1Z.2BlwQM/nSWevwagb9GzluEa', 3, '', 1, 1601836673),
(14, 'Dokter Tirta', 'drtirta@gmail.com', 'default.jpg', '$2y$10$joMUMBwm9RzW8D9iSUlN.eL.w1r.H.Zbl8cSvxrmsp61FzO6H88q6', 4, '', 1, 1601981295);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user_access_menu`
--

CREATE TABLE `tb_user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user_access_menu`
--

INSERT INTO `tb_user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(4, 3, 3),
(5, 4, 4),
(6, 1, 4),
(10, 5, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user_role`
--

CREATE TABLE `tb_user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user_role`
--

INSERT INTO `tb_user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member'),
(3, 'Apotek'),
(4, 'Dokter'),
(5, 'Manajer');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_apotek`
--
ALTER TABLE `tb_apotek`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_gejala`
--
ALTER TABLE `tb_gejala`
  ADD PRIMARY KEY (`id_gejala`);

--
-- Indeks untuk tabel `tb_jadwal_konsul`
--
ALTER TABLE `tb_jadwal_konsul`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_jenis`
--
ALTER TABLE `tb_jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `tb_kadaluarsa`
--
ALTER TABLE `tb_kadaluarsa`
  ADD PRIMARY KEY (`kd_transaksi`);

--
-- Indeks untuk tabel `tb_masuk`
--
ALTER TABLE `tb_masuk`
  ADD PRIMARY KEY (`kd_transaksi`);

--
-- Indeks untuk tabel `tb_pengetahuan`
--
ALTER TABLE `tb_pengetahuan`
  ADD PRIMARY KEY (`id_pengetahuan`);

--
-- Indeks untuk tabel `tb_pengurus`
--
ALTER TABLE `tb_pengurus`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_penyakit`
--
ALTER TABLE `tb_penyakit`
  ADD PRIMARY KEY (`id_penyakit`);

--
-- Indeks untuk tabel `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id_status` (`id_status`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `tb_pesan_resep`
--
ALTER TABLE `tb_pesan_resep`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `tb_request`
--
ALTER TABLE `tb_request`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_status`
--
ALTER TABLE `tb_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indeks untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_user_access_menu`
--
ALTER TABLE `tb_user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_user_role`
--
ALTER TABLE `tb_user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `tb_apotek`
--
ALTER TABLE `tb_apotek`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_gejala`
--
ALTER TABLE `tb_gejala`
  MODIFY `id_gejala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `tb_jadwal_konsul`
--
ALTER TABLE `tb_jadwal_konsul`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_jenis`
--
ALTER TABLE `tb_jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_pengetahuan`
--
ALTER TABLE `tb_pengetahuan`
  MODIFY `id_pengetahuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `tb_pengurus`
--
ALTER TABLE `tb_pengurus`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_penyakit`
--
ALTER TABLE `tb_penyakit`
  MODIFY `id_penyakit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_pesan_resep`
--
ALTER TABLE `tb_pesan_resep`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tb_request`
--
ALTER TABLE `tb_request`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tb_user_access_menu`
--
ALTER TABLE `tb_user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_user_role`
--
ALTER TABLE `tb_user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2019 at 07:42 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dogeeku`
--

-- --------------------------------------------------------

--
-- Table structure for table `anjing`
--

CREATE TABLE `anjing` (
  `id_anjing` int(11) NOT NULL,
  `id_jenis_anjing` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `nama_anjing` varchar(20) NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `berat_badan` varchar(2) NOT NULL,
  `tinggi` varchar(3) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `user_add` int(11) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` int(11) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` int(11) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anjing`
--

INSERT INTO `anjing` (`id_anjing`, `id_jenis_anjing`, `id_pelanggan`, `nama_anjing`, `jenis_kelamin`, `berat_badan`, `tinggi`, `tanggal_lahir`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
(1, 5, 1, 'Chiko', 'P', '1', '25', '2016-12-15', 0, '2019-11-02 11:12:09', 0, '2019-11-02 14:12:32', 0, '0000-00-00 00:00:00', 'Aktif'),
(2, 2, 1, 'Hana', 'P', '2', '30', '2013-02-20', 0, '2019-11-02 11:14:29', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(3, 1, 2, 'Juno', 'L', '1', '15', '2016-06-16', 0, '2019-11-04 20:54:54', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `id_kategori_barang` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `jumlah_barang` int(3) NOT NULL,
  `harga` int(11) NOT NULL,
  `warna` varchar(10) NOT NULL,
  `ukuran` varchar(20) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `keterangan` text NOT NULL,
  `user_add` int(11) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` int(11) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` int(11) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_invoice_barang`
--

CREATE TABLE `detail_invoice_barang` (
  `id_detail_invoice_barang` int(11) NOT NULL,
  `id_invoice` varchar(30) NOT NULL,
  `id_variasi_barang` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_invoice_layanan`
--

CREATE TABLE `detail_invoice_layanan` (
  `id_detail_invoice_layanan` int(11) NOT NULL,
  `id_invoice` varchar(30) NOT NULL,
  `id_report` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_layanan`
--

CREATE TABLE `detail_layanan` (
  `id_detail_layanan` int(11) NOT NULL,
  `id_layanan` int(11) NOT NULL,
  `nama_detail_layanan` varchar(30) NOT NULL,
  `deskripsi_layanan` varchar(100) NOT NULL,
  `user_add` int(11) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` int(11) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` int(11) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_layanan`
--

INSERT INTO `detail_layanan` (`id_detail_layanan`, `id_layanan`, `nama_detail_layanan`, `deskripsi_layanan`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
(1, 1, 'Vaksin', 'Penyuntikan obat seperti A, B, C', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(2, 2, 'Gunting bulu anjing', 'Pengguntingan dan perawatan bulu anjing', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(3, 3, 'Pemberian makanan', 'Makanan akan diberikan pagi dan siang hari', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(4, 1, 'Cek gigi', 'Pengecekan karang dan bakteri gigi', 0, '2019-11-04 22:36:55', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `detail_layanan_report_klinik`
--

CREATE TABLE `detail_layanan_report_klinik` (
  `id_detLay_repKlin` int(11) NOT NULL,
  `id_detail_layanan` int(11) NOT NULL,
  `id_report_klinik` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_layanan_report_penitipan`
--

CREATE TABLE `detail_layanan_report_penitipan` (
  `id_detLay_repPen` int(11) NOT NULL,
  `id_detail_layanan` int(11) NOT NULL,
  `id_report_penitipan` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_layanan_report_salon`
--

CREATE TABLE `detail_layanan_report_salon` (
  `id_detLay_repSal` int(11) NOT NULL,
  `id_detail_layanan` int(11) NOT NULL,
  `id_report_salon` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_obat_report_klinik`
--

CREATE TABLE `detail_obat_report_klinik` (
  `id_detObat_repKlin` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_report_klinik` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id_invoice` varchar(30) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `metode_pembayaran` varchar(10) NOT NULL,
  `total` int(11) NOT NULL,
  `status_invoice` varchar(11) NOT NULL,
  `user_add` int(11) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` int(11) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` int(11) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id_invoice`, `id_pelanggan`, `tanggal`, `jam`, `metode_pembayaran`, `total`, `status_invoice`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
('201911051', 0, '2019-11-05', '21:30:00', 'Cash', 75000, 'Lunas', 0, '2019-11-05 19:45:43', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
('201911052', 1, '2019-11-05', '18:30:00', 'Transfer', 63500, 'Lunas', 0, '2019-11-05 21:42:01', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
('201911061', 2, '2019-11-06', '11:41:50', 'Transfer', 50000, 'Lunas', 0, '2019-11-06 09:42:18', 0, '2019-11-06 10:15:04', 0, '2019-11-06 10:37:08', 'Tidak Aktif'),
('201911062', 1, '2019-11-06', '14:25:35', 'Transfer', 100000, 'Lunas', 0, '2019-11-06 09:43:31', 0, '2019-11-06 10:39:18', 0, '2019-11-06 10:39:51', 'Tidak Aktif'),
('201911071', 2, '2019-11-07', '11:41:50', 'Transfer', 50000, 'Lunas', 0, '2019-11-06 10:37:08', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(20) NOT NULL,
  `gaji` varchar(10) NOT NULL,
  `user_add` int(11) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` int(11) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` int(11) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`, `gaji`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
(1, 'Admin', '8700000', 0, '0000-00-00 00:00:00', 0, '2019-11-01 19:05:22', 0, '0000-00-00 00:00:00', 'Aktif'),
(2, 'Manager', '12800000', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', ''),
(3, 'Penjaga Kasir', '5400000', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', ''),
(4, 'Dokter', '9700000', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', ''),
(5, 'Pekerja Salon', '6300000', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', ''),
(6, 'Penjaga Anjing', '7200000', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', ''),
(9, 'Pekerja Taman', '3500000', 0, '2019-11-01 20:26:47', 0, '2019-11-01 20:27:36', 0, '0000-00-00 00:00:00', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_anjing`
--

CREATE TABLE `jenis_anjing` (
  `id_jenis_anjing` int(11) NOT NULL,
  `nama_jenis_anjing` varchar(20) NOT NULL,
  `user_add` int(11) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` int(11) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` int(11) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_anjing`
--

INSERT INTO `jenis_anjing` (`id_jenis_anjing`, `nama_jenis_anjing`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
(1, 'Cihuahua', 0, '2019-11-01 20:28:27', 0, '2019-11-04 20:55:23', 0, '0000-00-00 00:00:00', 'Aktif'),
(2, 'Pomeranian', 0, '2019-11-01 20:32:25', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(3, 'Bulldog', 0, '2019-11-01 20:32:31', 0, '2019-11-01 20:33:54', 0, '0000-00-00 00:00:00', 'Aktif'),
(4, 'Poodle', 0, '2019-11-01 20:32:41', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(5, 'Siberian Husky', 0, '2019-11-01 20:33:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_barang`
--

CREATE TABLE `kategori_barang` (
  `id_kategori_barang` int(11) NOT NULL,
  `nama_kategori_barang` varchar(30) NOT NULL,
  `user_add` int(11) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` int(11) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` int(11) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_barang`
--

INSERT INTO `kategori_barang` (`id_kategori_barang`, `nama_kategori_barang`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
(1, 'Makanan', 0, '2019-11-01 21:16:30', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(2, 'Obat Tidur', 0, '2019-11-01 21:16:45', 0, '2019-11-01 21:20:57', 0, '0000-00-00 00:00:00', 'Aktif'),
(3, 'Tali Rantai', 0, '2019-11-01 21:16:56', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(4, 'Alas Buang Air', 0, '2019-11-01 21:17:15', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(5, 'Handuk', 0, '2019-11-01 21:17:26', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(6, 'Selimut', 0, '2019-11-01 21:17:34', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(7, 'Aksesoris', 0, '2019-11-01 21:17:43', 0, '0000-00-00 00:00:00', 0, '2019-11-01 21:21:15', 'Tidak Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `id_anjing` int(11) NOT NULL,
  `nama_kegiatan` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `status_kegiatan` varchar(15) NOT NULL,
  `user_add` int(11) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` int(11) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` int(11) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id_kegiatan`, `id_anjing`, `nama_kegiatan`, `tanggal`, `jam`, `status_kegiatan`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
(1, 2, 'Jalan-jalan', '2019-11-20', '09:15:00', 'Belum selesai', 0, '2019-11-02 17:46:36', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(2, 2, 'Mandi', '2019-10-27', '20:40:00', 'Belum selesai', 0, '2019-11-02 17:50:09', 0, '2019-11-02 18:59:36', 0, '0000-00-00 00:00:00', 'Aktif'),
(4, 1, 'Makan', '2019-10-27', '21:25:00', 'Belum selesai', 0, '2019-11-02 17:52:44', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `user_add` int(11) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` int(11) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` int(11) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `id_layanan` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `nama_layanan` varchar(20) NOT NULL,
  `user_add` int(11) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` int(11) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` int(11) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`id_layanan`, `id_jabatan`, `nama_layanan`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
(1, 4, 'Klinik', 0, '0000-00-00 00:00:00', 0, '2019-11-04 21:51:09', 0, '0000-00-00 00:00:00', 'Aktif'),
(2, 5, 'Salon', 0, '0000-00-00 00:00:00', 0, '2019-11-04 21:52:06', 0, '0000-00-00 00:00:00', 'Aktif'),
(3, 6, 'Penitipan', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `pekerja`
--

CREATE TABLE `pekerja` (
  `id_pekerja` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `user_add` int(11) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` int(11) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` int(11) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pekerja`
--

INSERT INTO `pekerja` (`id_pekerja`, `id_pengguna`, `id_jabatan`, `tanggal_masuk`, `alamat`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
(1, 1, 1, '0000-00-00', 'Jl. Jend Sudirman Karawaci', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', ''),
(2, 2, 1, '2019-11-06', 'Jl. Kenanga Perum. Kresek Indah', 0, '0000-00-00 00:00:00', 0, '2019-11-01 11:04:36', 0, '0000-00-00 00:00:00', 'Aktif'),
(7, 3, 4, '0000-00-00', 'Ures Karawaci', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', ''),
(16, 43, 2, '2019-12-13', 'sasa', 0, '2019-10-31 17:16:52', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(10, 5, 6, '0000-00-00', 'Jl. Kemakmuran Jakarta Utara', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', ''),
(14, 41, 3, '2014-10-06', 'wdsad', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', ''),
(18, 45, 3, '2019-10-31', 'sdcsewd', 0, '2019-10-31 18:51:14', 0, '0000-00-00 00:00:00', 0, '2019-11-01 11:24:40', 'Tidak Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `tanggal_registrasi` date NOT NULL,
  `user_add` int(11) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` int(11) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` int(11) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `id_pengguna`, `tanggal_registrasi`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
(1, 46, '2019-11-15', 0, '2019-11-01 11:49:19', 0, '2019-11-02 13:59:26', 0, '0000-00-00 00:00:00', 'Aktif'),
(2, 47, '2019-11-13', 0, '2019-11-01 20:21:18', 0, '2019-11-02 13:59:37', 0, '0000-00-00 00:00:00', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan_klinik`
--

CREATE TABLE `pelanggan_klinik` (
  `id_pelanggan_klinik` int(11) NOT NULL,
  `id_anjing` int(11) NOT NULL,
  `id_report_klinik` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan_penitipan`
--

CREATE TABLE `pelanggan_penitipan` (
  `id_pelanggan_penitipan` int(11) NOT NULL,
  `id_anjing` int(11) NOT NULL,
  `id_report_penitipan` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan_salon`
--

CREATE TABLE `pelanggan_salon` (
  `id_pelanggan_salon` int(11) NOT NULL,
  `id_anjing` int(11) NOT NULL,
  `id_report_salon` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `id_tipe_pengguna` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `user_add` int(11) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` int(11) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` int(11) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `id_tipe_pengguna`, `email`, `password`, `nama_lengkap`, `tanggal_lahir`, `jenis_kelamin`, `no_hp`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
(1, 1, 'amkaheja@gmail.com', 'amel1509', 'Amelia Kaheja', '0000-00-00', 'P', '085256098358', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(2, 1, 'ltandiwijaya@gmail.com', '256377f47c20d2f0e175c108aa06e96f', 'Laurencia Tandiwijaya', '2016-11-16', 'P', '081808812625', 0, '0000-00-00 00:00:00', 0, '2019-11-01 11:04:36', 0, '0000-00-00 00:00:00', 'Aktif'),
(3, 3, 'kathrin@gmail.com', 'kathrin1234', 'Debora Kathrin', '0000-00-00', 'P', '081912345678', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(5, 5, 'wivina@gmail.com', 'wivina1234', 'Wivina Daicy', '0000-00-00', 'P', '085212345678', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(41, 6, 'kelvin@gmail.com', '883485344b32be63a48f58c3eeabf942', 'Kelvin', '2014-10-07', 'L', '08193451299', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', ''),
(43, 2, 'andy@gmail.com', '3a3d246a504c25f15123a6742fbd8f99', 'Andy Fransisko', '2018-09-13', 'L', '08193451299', 0, '2019-10-31 17:16:52', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(45, 6, 'kartika@gmail.com', '8857395309d9e9b0e02a2f05bbfa25e1', 'Kartika', '2015-03-12', 'P', '08151235455', 0, '2019-10-31 18:51:14', 0, '0000-00-00 00:00:00', 0, '2019-11-01 11:24:40', 'Tidak Aktif'),
(46, 7, 'veren@gmail.com', 'af82d2dfac0e1f106668a29e2e82ed47', 'Veren Valencia', '2010-01-17', 'P', '081622334455', 0, '2019-11-01 11:49:19', 0, '2019-11-02 13:59:26', 0, '0000-00-00 00:00:00', 'Aktif'),
(47, 7, 'saniii@gmail.com', '39795d2379c4d35831d4b95bd5f563fb', 'Sani Markisa', '2008-07-17', 'L', '081234567891', 0, '2019-11-01 20:21:18', 0, '2019-11-02 13:59:37', 0, '0000-00-00 00:00:00', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `report_klinik`
--

CREATE TABLE `report_klinik` (
  `id_report_klinik` varchar(30) NOT NULL,
  `id_pekerja` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `keterangan` text NOT NULL,
  `status_report` varchar(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `report_penitipan`
--

CREATE TABLE `report_penitipan` (
  `id_report_penitipan` varchar(30) NOT NULL,
  `id_pekerja` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `keterangan` text NOT NULL,
  `status_report` varchar(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `report_salon`
--

CREATE TABLE `report_salon` (
  `id_report_salon` varchar(30) NOT NULL,
  `id_pekerja` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `keterangan` text NOT NULL,
  `status_report` varchar(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tipe_pengguna`
--

CREATE TABLE `tipe_pengguna` (
  `id_tipe_pengguna` int(11) NOT NULL,
  `nama_tipe_pengguna` varchar(20) NOT NULL,
  `user_add` int(11) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` int(11) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` int(11) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipe_pengguna`
--

INSERT INTO `tipe_pengguna` (`id_tipe_pengguna`, `nama_tipe_pengguna`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
(1, 'Admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', ''),
(2, 'Manager', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', ''),
(3, 'Dokter', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', ''),
(4, 'Pekerja Salon', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', ''),
(5, 'Penjaga Anjing', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', ''),
(6, 'Penjaga Kasir', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', ''),
(7, 'Pelanggan', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `transfer`
--

CREATE TABLE `transfer` (
  `id_transfer` int(11) NOT NULL,
  `id_invoice` varchar(30) NOT NULL,
  `nama_bank` varchar(50) NOT NULL,
  `nomor_rekening` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `total` int(11) NOT NULL,
  `user_add` int(11) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` int(11) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` int(11) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transfer`
--

INSERT INTO `transfer` (`id_transfer`, `id_invoice`, `nama_bank`, `nomor_rekening`, `tanggal`, `jam`, `total`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
(1, '201911052', 'BCA', '590370888', '2019-11-13', '18:27:00', 63500, 0, '2019-11-07 00:20:53', 0, '2019-11-07 00:42:54', 0, '0000-00-00 00:00:00', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `variasi`
--

CREATE TABLE `variasi` (
  `id_variasi` int(11) NOT NULL,
  `nama_variasi` varchar(30) NOT NULL,
  `detail_variasi` varchar(50) NOT NULL,
  `user_add` int(11) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` int(11) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` int(11) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `variasi`
--

INSERT INTO `variasi` (`id_variasi`, `nama_variasi`, `detail_variasi`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
(1, 'Warna', 'Putih', 0, '2019-11-02 10:38:58', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(2, 'Ukuran', 'Large', 0, '2019-11-02 10:42:31', 0, '2019-11-02 10:45:34', 0, '0000-00-00 00:00:00', 'Aktif'),
(3, 'Warna', 'Hitam', 0, '2019-11-02 10:43:51', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(4, 'Ukuran', 'Small', 0, '2019-11-02 10:44:12', 0, '2019-11-02 10:47:55', 0, '2019-11-02 10:48:15', 'Tidak Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `variasi_barang`
--

CREATE TABLE `variasi_barang` (
  `id_variasi_barang` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_variasi` int(11) NOT NULL,
  `user_add` int(11) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` int(11) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` int(11) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id_wishlist` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `user_add` int(11) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` int(11) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` int(11) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
-- Error reading data for table dogeeku.wishlist: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `dogeeku`.`wishlist`' at line 1

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anjing`
--
ALTER TABLE `anjing`
  ADD PRIMARY KEY (`id_anjing`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `detail_invoice_barang`
--
ALTER TABLE `detail_invoice_barang`
  ADD PRIMARY KEY (`id_detail_invoice_barang`);

--
-- Indexes for table `detail_invoice_layanan`
--
ALTER TABLE `detail_invoice_layanan`
  ADD PRIMARY KEY (`id_detail_invoice_layanan`);

--
-- Indexes for table `detail_layanan`
--
ALTER TABLE `detail_layanan`
  ADD PRIMARY KEY (`id_detail_layanan`);

--
-- Indexes for table `detail_layanan_report_klinik`
--
ALTER TABLE `detail_layanan_report_klinik`
  ADD PRIMARY KEY (`id_detLay_repKlin`);

--
-- Indexes for table `detail_layanan_report_penitipan`
--
ALTER TABLE `detail_layanan_report_penitipan`
  ADD PRIMARY KEY (`id_detLay_repPen`);

--
-- Indexes for table `detail_layanan_report_salon`
--
ALTER TABLE `detail_layanan_report_salon`
  ADD PRIMARY KEY (`id_detLay_repSal`);

--
-- Indexes for table `detail_obat_report_klinik`
--
ALTER TABLE `detail_obat_report_klinik`
  ADD PRIMARY KEY (`id_detObat_repKlin`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id_invoice`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `jenis_anjing`
--
ALTER TABLE `jenis_anjing`
  ADD PRIMARY KEY (`id_jenis_anjing`);

--
-- Indexes for table `kategori_barang`
--
ALTER TABLE `kategori_barang`
  ADD PRIMARY KEY (`id_kategori_barang`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id_layanan`);

--
-- Indexes for table `pekerja`
--
ALTER TABLE `pekerja`
  ADD PRIMARY KEY (`id_pekerja`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pelanggan_klinik`
--
ALTER TABLE `pelanggan_klinik`
  ADD PRIMARY KEY (`id_pelanggan_klinik`);

--
-- Indexes for table `pelanggan_penitipan`
--
ALTER TABLE `pelanggan_penitipan`
  ADD PRIMARY KEY (`id_pelanggan_penitipan`);

--
-- Indexes for table `pelanggan_salon`
--
ALTER TABLE `pelanggan_salon`
  ADD PRIMARY KEY (`id_pelanggan_salon`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `report_klinik`
--
ALTER TABLE `report_klinik`
  ADD PRIMARY KEY (`id_report_klinik`);

--
-- Indexes for table `report_penitipan`
--
ALTER TABLE `report_penitipan`
  ADD PRIMARY KEY (`id_report_penitipan`);

--
-- Indexes for table `report_salon`
--
ALTER TABLE `report_salon`
  ADD PRIMARY KEY (`id_report_salon`);

--
-- Indexes for table `tipe_pengguna`
--
ALTER TABLE `tipe_pengguna`
  ADD PRIMARY KEY (`id_tipe_pengguna`);

--
-- Indexes for table `transfer`
--
ALTER TABLE `transfer`
  ADD PRIMARY KEY (`id_transfer`);

--
-- Indexes for table `variasi`
--
ALTER TABLE `variasi`
  ADD PRIMARY KEY (`id_variasi`);

--
-- Indexes for table `variasi_barang`
--
ALTER TABLE `variasi_barang`
  ADD PRIMARY KEY (`id_variasi_barang`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id_wishlist`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anjing`
--
ALTER TABLE `anjing`
  MODIFY `id_anjing` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_invoice_barang`
--
ALTER TABLE `detail_invoice_barang`
  MODIFY `id_detail_invoice_barang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_invoice_layanan`
--
ALTER TABLE `detail_invoice_layanan`
  MODIFY `id_detail_invoice_layanan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_layanan`
--
ALTER TABLE `detail_layanan`
  MODIFY `id_detail_layanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `detail_layanan_report_penitipan`
--
ALTER TABLE `detail_layanan_report_penitipan`
  MODIFY `id_detLay_repPen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_layanan_report_salon`
--
ALTER TABLE `detail_layanan_report_salon`
  MODIFY `id_detLay_repSal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_obat_report_klinik`
--
ALTER TABLE `detail_obat_report_klinik`
  MODIFY `id_detObat_repKlin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `jenis_anjing`
--
ALTER TABLE `jenis_anjing`
  MODIFY `id_jenis_anjing` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kategori_barang`
--
ALTER TABLE `kategori_barang`
  MODIFY `id_kategori_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id_layanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pekerja`
--
ALTER TABLE `pekerja`
  MODIFY `id_pekerja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pelanggan_klinik`
--
ALTER TABLE `pelanggan_klinik`
  MODIFY `id_pelanggan_klinik` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pelanggan_penitipan`
--
ALTER TABLE `pelanggan_penitipan`
  MODIFY `id_pelanggan_penitipan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pelanggan_salon`
--
ALTER TABLE `pelanggan_salon`
  MODIFY `id_pelanggan_salon` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `tipe_pengguna`
--
ALTER TABLE `tipe_pengguna`
  MODIFY `id_tipe_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transfer`
--
ALTER TABLE `transfer`
  MODIFY `id_transfer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `variasi`
--
ALTER TABLE `variasi`
  MODIFY `id_variasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `variasi_barang`
--
ALTER TABLE `variasi_barang`
  MODIFY `id_variasi_barang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id_wishlist` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

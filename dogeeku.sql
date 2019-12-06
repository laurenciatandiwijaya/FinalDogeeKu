-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2019 at 11:56 AM
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
  `foto` text NOT NULL,
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

INSERT INTO `anjing` (`id_anjing`, `id_jenis_anjing`, `id_pelanggan`, `nama_anjing`, `jenis_kelamin`, `berat_badan`, `tinggi`, `tanggal_lahir`, `foto`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
(4, 4, 1, 'Hana', 'p', '3', '20', '2019-11-01', '/assets/img/anjing/cemiw.jpg\r\n', 1, '2019-11-24 23:27:10', 0, '0000-00-00 00:00:00', 46, '2019-12-06 16:43:30', 'Tidak Aktif'),
(6, 4, 2, 'Teddy', 'L', '3', '30', '2019-10-29', '/assets/img/anjing/cemiw.jpg', 1, '2019-11-26 22:12:17', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(7, 1, 4, 'Chiko', 'L', '2', '25', '2019-11-05', '/assets/img/anjing/Ling-ling lucu.jpg', 2, '2019-11-27 23:39:41', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(8, 1, 1, 'Prima', 'p', '12', '12', '2019-12-01', '/assets/img/anjing/Ling-ling lucu.jpg', 1, '2019-12-06 13:34:35', 0, '0000-00-00 00:00:00', 46, '2019-12-06 16:43:37', 'Tidak Aktif'),
(9, 1, 1, 'pchocco', 'p', '12', '12', '2019-12-04', '/assets/img/anjing/fashion1.jpg', 1, '2019-12-06 16:37:56', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(10, 1, 1, 'chikudekuk', 'p', '12', '12', '2019-12-03', '/assets/img/anjing/fashion3.jpg', 1, '2019-12-06 16:44:19', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif');

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
  `foto` text NOT NULL,
  `user_add` int(11) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` int(11) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` int(11) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `id_kategori_barang`, `nama_barang`, `jumlah_barang`, `harga`, `warna`, `ukuran`, `satuan`, `keterangan`, `foto`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
(1, 1, 'Pedigree Dog Food', 61, 25000, 'Kuning', '500', 'gram', 'Ini makanan sehat', '/assets/img/barang/pedigree.png', 0, '2019-11-09 11:45:09', 2, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(2, 7, 'Handuk Halus Bonita', 71, 30000, 'Merah', '21', 'cm', 'Bahan tipis mudah menyerap air', '/assets/img/barang/bonita.png', 0, '2019-11-09 12:01:25', 2, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(3, 2, 'Obat vaksin ABC', 71, 56000, '-', '30', 'gram', 'Obat untuk anjing berumur 2 bulan', '/assets/img/barang/obatanjing.png', 0, '2019-11-11 11:27:52', 2, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(5, 7, 'Sentexin', 96, 55000, 'Merah', '150', 'cm', '', '/assets/img/barang/sentexin.jpg', 2, '2019-11-28 00:01:01', 2, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(6, 7, 'Kandang Anjing Besi', 150, 235000, 'Kuning', '100', 'cm', '', '/assets/img/barang/kandang.png', 1, '2019-12-06 12:23:59', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(7, 9, 'Baju Fladeo', 300, 75000, 'Merah', '1', 'liter', '', '/assets/img/barang/fashion3.jpeg', 1, '2019-12-06 12:39:10', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(8, 9, 'Baju Fladeo Tipe 2', 350, 80000, 'Kuning', '1', 'liter', '', '/assets/img/barang/fashion2.jpeg', 1, '2019-12-06 12:40:10', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(9, 9, 'Baju Fladeo Tipe 3', 500, 60000, 'Biru', '1', 'liter', '', '/assets/img/barang/fashion1.jpeg', 1, '2019-12-06 12:40:52', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(10, 7, 'Kursi Anjing', 488, 100000, 'Abu', '80', 'cm', '', '/assets/img/barang/aksesoris1.jpeg', 1, '2019-12-06 12:42:17', 41, '2019-12-06 13:41:32', 0, '0000-00-00 00:00:00', 'Aktif'),
(11, 7, 'Kursi Anjing 2', 390, 120000, 'Biru', '95', 'cm', '', '/assets/img/barang/aksesoris2.jpeg', 1, '2019-12-06 12:42:48', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(12, 1, 'Indofood', 250, 54000, '-', '400', 'gram', '', '/assets/img/barang/makanan3.jpeg', 1, '2019-12-06 12:44:05', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(13, 1, 'Pedigree Dog Food 2', 450, 83000, '-', '600', 'gram', '', '/assets/img/barang/pedigree2.jpeg', 1, '2019-12-06 12:45:03', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(14, 7, 'Sisir', 247, 29000, 'Hitam', '20', 'cm', '', '/assets/img/barang/sisir.jpg', 1, '2019-12-06 12:46:22', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(15, 1, 'snack pisang', 12, 50000, '-', '100', 'gram', 'aaa', '/assets/img/barang/dog_food.png', 1, '2019-12-06 13:53:53', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `detail_invoice_barang`
--

CREATE TABLE `detail_invoice_barang` (
  `id_detail_invoice_barang` int(11) NOT NULL,
  `id_invoice` varchar(30) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah_barang` int(3) NOT NULL,
  `user_add` int(11) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` int(11) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` int(11) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_invoice_barang`
--

INSERT INTO `detail_invoice_barang` (`id_detail_invoice_barang`, `id_invoice`, `id_barang`, `jumlah_barang`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
(14, '20191126TK1', 2, 8, 41, '2019-11-26 15:24:57', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(13, '20191126TK1', 1, 6, 41, '2019-11-26 15:24:57', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(12, '20191125LY1', 3, 1, 0, '0000-00-00 00:00:00', 3, '2019-11-25 10:00:35', 0, '0000-00-00 00:00:00', 'Aktif'),
(15, '20191126OL1', 2, 3, 1, '2019-11-26 15:28:09', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(16, '20191126OL1', 3, 5, 1, '2019-11-26 15:28:09', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(17, '20191128TK1', 1, 3, 2, '2019-11-28 00:07:51', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(18, '20191128TK1', 5, 2, 2, '2019-11-28 00:07:51', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(19, '20191128TK1', 3, 4, 2, '2019-11-28 00:07:51', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(20, '20191128TK2', 2, 3, 2, '2019-11-28 00:08:18', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(21, '20191128TK2', 5, 2, 2, '2019-11-28 00:08:18', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(22, '20191128LY2', 3, 5, 2, '2019-11-28 00:12:07', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(23, '20191206OL1', 6, 12, 46, '2019-12-06 13:32:40', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(24, '20191206OL2', 10, 12, 46, '2019-12-06 13:39:33', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(25, '20191206OL3', 10, 1, 46, '2019-12-06 17:52:39', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(26, '20191206OL3', 8, 12, 46, '2019-12-06 17:52:39', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `detail_invoice_layanan`
--

CREATE TABLE `detail_invoice_layanan` (
  `id_detail_invoice_layanan` int(11) NOT NULL,
  `id_invoice` varchar(30) NOT NULL,
  `id_report` varchar(30) NOT NULL,
  `user_add` int(11) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` int(11) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` int(11) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_invoice_layanan`
--

INSERT INTO `detail_invoice_layanan` (`id_detail_invoice_layanan`, `id_invoice`, `id_report`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
(2, '20191125LY1', '20191125KL1', 1, '2019-11-25 09:44:46', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(3, '20191125LY2', '20191125KL2', 1, '2019-11-25 09:49:17', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(5, '20191127LY1', '20191127SL1', 2, '2019-11-27 23:41:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(6, '20191128LY1', '20191128PA1', 2, '2019-11-28 00:11:19', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(7, '20191128LY2', '20191128KL1', 2, '2019-11-28 00:12:07', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(8, '20191206LY1', '20191206SL1', 46, '2019-12-06 13:58:01', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(9, '20191206LY2', '20191206SL2', 46, '2019-12-06 17:12:35', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(10, '20191206LY3', '20191206KL1', 46, '2019-12-06 17:50:38', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `detail_layanan`
--

CREATE TABLE `detail_layanan` (
  `id_detail_layanan` int(11) NOT NULL,
  `id_layanan` int(11) NOT NULL,
  `nama_detail_layanan` varchar(30) NOT NULL,
  `deskripsi_layanan` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
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

INSERT INTO `detail_layanan` (`id_detail_layanan`, `id_layanan`, `nama_detail_layanan`, `deskripsi_layanan`, `harga`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
(1, 1, 'Vaksin', 'Penyuntikan obat seperti A, B, C', 95000, 0, '0000-00-00 00:00:00', 1, '2019-11-27 02:21:06', 0, '0000-00-00 00:00:00', 'Aktif'),
(2, 2, 'Gunting bulu anjing', 'Pengguntingan dan perawatan bulu anjing', 37000, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(3, 3, 'Pemberian makanan', 'Makanan akan diberikan pagi dan siang hari', 15000, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(4, 1, 'Cek gigi', 'Pengecekan karang dan bakteri gigi', 115000, 0, '2019-11-04 22:36:55', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(5, 2, 'Pembersihan bulu dan gigi', 'Memandikan anjing', 40000, 0, '2019-11-11 11:24:19', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(6, 3, 'Penjagaan tidur anjing', 'Menjaga tidur anjing', 20000, 0, '2019-11-11 11:25:40', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(7, 1, 'Pengecekan Mata & Telinga', 'Anjing akan di cek kesehatan matanya dan diberi vitamin', 70000, 2, '2019-11-28 00:04:55', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(8, 2, 'Pemotongan kuku', '-', 105000, 2, '2019-11-28 00:05:58', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(9, 3, 'Jalan-jalan', 'Jalan-jalan bersama anjing selama 1 jam', 120000, 2, '2019-11-28 00:06:46', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `detail_layanan_report_klinik`
--

CREATE TABLE `detail_layanan_report_klinik` (
  `id_detLay_repKlin` int(11) NOT NULL,
  `id_detail_layanan` int(11) NOT NULL,
  `id_report_klinik` varchar(30) NOT NULL,
  `user_add` int(11) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` int(11) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` int(11) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_layanan_report_klinik`
--

INSERT INTO `detail_layanan_report_klinik` (`id_detLay_repKlin`, `id_detail_layanan`, `id_report_klinik`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
(5, 4, '20191125KL1', 1, '2019-11-25 09:44:46', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(4, 1, '20191125KL1', 1, '2019-11-25 09:44:46', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(6, 4, '20191125KL2', 1, '2019-11-25 09:49:17', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(7, 4, '20191128KL1', 2, '2019-11-28 00:12:07', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(8, 7, '20191128KL1', 2, '2019-11-28 00:12:07', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(9, 1, '20191206KL1', 46, '2019-12-06 17:50:38', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(10, 4, '20191206KL1', 46, '2019-12-06 17:50:38', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `detail_layanan_report_penitipan`
--

CREATE TABLE `detail_layanan_report_penitipan` (
  `id_detLay_repPen` int(11) NOT NULL,
  `id_detail_layanan` int(11) NOT NULL,
  `id_report_penitipan` varchar(30) NOT NULL,
  `user_add` int(11) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` int(11) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` int(11) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_layanan_report_penitipan`
--

INSERT INTO `detail_layanan_report_penitipan` (`id_detLay_repPen`, `id_detail_layanan`, `id_report_penitipan`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
(1, 9, '20191128PA1', 2, '2019-11-28 00:11:19', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(2, 6, '20191128PA1', 2, '2019-11-28 00:11:19', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `detail_layanan_report_salon`
--

CREATE TABLE `detail_layanan_report_salon` (
  `id_detLay_repSal` int(11) NOT NULL,
  `id_detail_layanan` int(11) NOT NULL,
  `id_report_salon` varchar(30) NOT NULL,
  `user_add` int(11) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` int(11) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` int(11) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_layanan_report_salon`
--

INSERT INTO `detail_layanan_report_salon` (`id_detLay_repSal`, `id_detail_layanan`, `id_report_salon`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
(5, 2, '20191127SL1', 2, '2019-11-27 23:41:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(4, 5, '20191127SL1', 2, '2019-11-27 23:41:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(6, 2, '20191206SL1', 46, '2019-12-06 13:58:01', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(7, 5, '20191206SL1', 46, '2019-12-06 13:58:01', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(8, 2, '20191206SL2', 46, '2019-12-06 17:12:35', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(9, 5, '20191206SL2', 46, '2019-12-06 17:12:35', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `detail_obat_report_klinik`
--

CREATE TABLE `detail_obat_report_klinik` (
  `id_detObat_repKlin` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_report_klinik` varchar(30) NOT NULL,
  `jumlah_barang` int(3) NOT NULL,
  `user_add` int(11) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` int(11) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` int(11) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_obat_report_klinik`
--

INSERT INTO `detail_obat_report_klinik` (`id_detObat_repKlin`, `id_barang`, `id_report_klinik`, `jumlah_barang`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
(1, 3, '20191125KL1', 1, 0, '0000-00-00 00:00:00', 3, '2019-11-25 10:00:35', 0, '0000-00-00 00:00:00', 'Aktif'),
(2, 3, '20191128KL1', 5, 2, '2019-11-28 00:12:07', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif');

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
  `alamat` varchar(100) NOT NULL,
  `total` int(11) NOT NULL,
  `status_invoice` varchar(11) NOT NULL,
  `status_pengiriman` varchar(20) NOT NULL,
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

INSERT INTO `invoice` (`id_invoice`, `id_pelanggan`, `tanggal`, `jam`, `metode_pembayaran`, `alamat`, `total`, `status_invoice`, `status_pengiriman`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
('20191125LY1', 1, '2019-11-25', '09:44:46', 'Transfer', '', 266000, 'Lunas', '', 1, '2019-11-25 09:44:46', 3, '2019-11-25 10:00:35', 0, '0000-00-00 00:00:00', 'Aktif'),
('20191125LY2', 1, '2019-11-25', '09:49:17', 'Transfer', '', 115000, 'Belum Lunas', '', 1, '2019-11-25 09:49:17', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
('20191126TK1', 0, '2019-11-26', '15:24:57', 'Cash', '', 390000, 'Lunas', '', 41, '2019-11-26 15:24:57', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
('20191126OL1', 2, '2019-11-26', '12:30:00', 'Transfer', 'Perumahan Mawar Blok M no.9 Jakarta Pusat', 370000, 'Lunas', 'Terkirim', 1, '2019-11-26 15:28:09', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
('20191127LY1', 4, '2019-11-27', '23:41:00', 'Transfer', '-', 77000, 'Lunas', '-', 2, '2019-11-27 23:41:00', 2, '2019-11-27 23:42:43', 0, '0000-00-00 00:00:00', 'Aktif'),
('20191128TK1', 0, '2019-11-28', '00:07:51', 'Cash', '-', 409000, 'Lunas', '-', 2, '2019-11-28 00:07:51', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
('20191128TK2', 0, '2019-11-28', '00:08:18', 'Cash', '-', 200000, 'Lunas', '-', 2, '2019-11-28 00:08:18', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
('20191128LY1', 4, '2019-11-28', '00:11:19', 'Transfer', '-', 140000, 'Belum Lunas', '-', 2, '2019-11-28 00:11:19', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
('20191128LY2', 4, '2019-11-28', '00:12:07', 'Transfer', '-', 465000, 'Belum Lunas', '-', 2, '2019-11-28 00:12:07', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
('20191206OL1', 1, '2019-12-06', '13:32:40', 'Cash', 'Bogor,Bogor Barat,12345,lippo village, karawaci. Jl M.H Thamrin No.1100 Kec. Kelapa Dua', 2820000, 'Batal', '', 46, '2019-12-06 13:32:40', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
('20191206OL2', 1, '2019-12-06', '13:39:33', 'Transfer', 'Jakarta,Jakarta Utara,12345,lippo village, karawaci. Jl M.H Thamrin No.1100 Kec. Kelapa Dua', 1200000, 'Batal', '', 46, '2019-12-06 13:39:33', 41, '2019-12-06 13:41:32', 0, '0000-00-00 00:00:00', 'Aktif'),
('20191206LY1', 1, '2019-12-06', '13:58:01', 'Transfer', '', 77000, 'Belum Lunas', '', 46, '2019-12-06 13:58:01', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
('20191206LY2', 1, '2019-12-06', '17:12:35', 'Transfer', '', 77000, 'Belum Lunas', '', 46, '2019-12-06 17:12:35', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
('20191206LY3', 1, '2019-12-06', '17:50:38', 'Transfer', '', 210000, 'Belum Lunas', '', 46, '2019-12-06 17:50:38', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
('20191206OL3', 1, '2019-12-06', '17:52:39', 'Cash', 'Bogor,Bogor Barat,15810,lippo village, karawaci. Jl M.H Thamrin No.1100 Kec. Kelapa Dua', 1060000, 'Belum Lunas', 'Belum Dikirim', 46, '2019-12-06 17:52:39', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif');

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
(2, 'Manager', '12800000', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(3, 'Penjaga Kasir', '5400000', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(4, 'Dokter', '9700000', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(5, 'Pekerja Salon', '6300000', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(6, 'Penjaga Anjing', '7200000', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
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
(2, 'Obat', 0, '2019-11-01 21:16:45', 0, '2019-11-10 12:52:51', 0, '0000-00-00 00:00:00', 'Aktif'),
(7, 'Aksesoris', 0, '2019-11-01 21:17:43', 0, '0000-00-00 00:00:00', 0, '2019-11-01 21:21:15', 'Aktif'),
(9, 'Fashion', 1, '2019-12-06 12:32:03', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(10, 'Kecantikan', 1, '2019-12-06 12:32:09', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(11, 'Kesehatan', 1, '2019-12-06 12:32:16', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(12, 'Mainan', 1, '2019-12-06 12:33:12', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `id_anjing` int(11) NOT NULL,
  `nama_kegiatan` varchar(30) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `color` varchar(24) NOT NULL,
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

INSERT INTO `kegiatan` (`id_kegiatan`, `id_anjing`, `nama_kegiatan`, `start_date`, `end_date`, `color`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
(5, 4, 'Jalan-jalan', '2019-11-21', '2019-11-24', '#FFD700', 46, '2019-11-24 23:28:41', 46, '2019-11-24 23:30:18', 46, '2019-11-24 23:30:25', 'Tidak Aktif'),
(6, 4, 'Jalan-jalan', '2019-11-13', '2019-11-16', '#FFD700', 46, '2019-11-24 23:30:57', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(7, 4, 'travel', '2019-12-07', '2019-12-12', '#40E0D0', 46, '2019-12-06 13:43:48', 46, '2019-12-06 13:44:29', 46, '2019-12-06 13:44:57', 'Tidak Aktif'),
(8, 4, 'mandi', '2019-12-06', '2019-12-07', '#40E0D0', 46, '2019-12-06 13:45:24', 0, '0000-00-00 00:00:00', 46, '2019-12-06 17:51:07', 'Tidak Aktif'),
(9, 8, 'mandi', '2019-12-06', '2019-12-07', '#40E0D0', 46, '2019-12-06 13:45:39', 0, '0000-00-00 00:00:00', 46, '2019-12-06 17:51:17', 'Tidak Aktif'),
(10, 4, 'makan', '2019-12-06', '2019-12-07', '#FFD700', 46, '2019-12-06 13:45:58', 0, '0000-00-00 00:00:00', 46, '2019-12-06 17:51:12', 'Tidak Aktif'),
(11, 4, 'pup', '2019-12-06', '2019-12-13', '#40E0D0', 46, '2019-12-06 17:51:35', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah_barang` int(3) NOT NULL,
  `user_add` int(11) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` int(11) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` int(11) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `id_pelanggan`, `id_barang`, `jumlah_barang`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
(1, 1, 6, 12, 46, '2019-12-06 13:31:49', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Tidak Aktif'),
(2, 1, 10, 12, 46, '2019-12-06 13:39:11', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Tidak Aktif'),
(3, 1, 10, 1, 46, '2019-12-06 17:26:20', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Tidak Aktif'),
(4, 1, 8, 12, 46, '2019-12-06 17:52:01', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Tidak Aktif'),
(5, 1, 8, 12, 46, '2019-12-06 17:54:34', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(6, 1, 9, 12, 46, '2019-12-06 17:54:49', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif');

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
  `alamat` varchar(100) NOT NULL,
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
(1, 1, 1, '2019-11-06', 'Jl. Jend Sudirman Karawaci', 0, '0000-00-00 00:00:00', 1, '2019-11-27 22:20:16', 0, '0000-00-00 00:00:00', 'Aktif'),
(2, 2, 1, '2019-11-06', 'Jl. Kenanga Perum. Kresek Indah', 0, '0000-00-00 00:00:00', 0, '2019-11-12 23:16:52', 0, '0000-00-00 00:00:00', 'Aktif'),
(7, 3, 4, '2019-11-15', 'Ures Karawaci', 0, '0000-00-00 00:00:00', 0, '2019-11-12 23:17:25', 0, '0000-00-00 00:00:00', 'Aktif'),
(16, 43, 2, '2019-12-13', 'Jl. Amino No. 56 Jogjakarta Jawa Tengah', 0, '2019-10-31 17:16:52', 0, '2019-11-12 23:17:39', 0, '0000-00-00 00:00:00', 'Aktif'),
(10, 5, 6, '2019-11-02', 'Jl. Kemakmuran Jakarta Utara', 0, '0000-00-00 00:00:00', 0, '2019-11-12 23:18:10', 0, '0000-00-00 00:00:00', 'Aktif'),
(14, 41, 3, '2014-10-06', 'Perumahan Bunga jl. Hijau No. 23 Depok', 0, '0000-00-00 00:00:00', 0, '2019-11-12 23:18:23', 0, '0000-00-00 00:00:00', 'Aktif'),
(18, 45, 5, '2019-10-31', 'Dorm UPH Karawaci', 0, '2019-10-31 18:51:14', 0, '2019-11-12 23:18:35', 0, '2019-11-01 11:24:40', 'Aktif');

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
(2, 47, '2019-11-13', 0, '2019-11-01 20:21:18', 0, '2019-11-12 23:41:30', 0, '0000-00-00 00:00:00', 'Aktif'),
(4, 49, '2019-11-27', 1, '2019-11-27 23:38:05', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan_klinik`
--

CREATE TABLE `pelanggan_klinik` (
  `id_pelanggan_klinik` int(11) NOT NULL,
  `id_anjing` int(11) NOT NULL,
  `id_report_klinik` varchar(30) NOT NULL,
  `user_add` int(11) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` int(11) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` int(11) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan_klinik`
--

INSERT INTO `pelanggan_klinik` (`id_pelanggan_klinik`, `id_anjing`, `id_report_klinik`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
(1, 4, '20191125KL1', 1, '2019-11-25 09:44:46', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(2, 4, '20191125KL2', 1, '2019-11-25 09:49:17', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(3, 7, '20191128KL1', 2, '2019-11-28 00:12:07', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(4, 9, '20191206KL1', 46, '2019-12-06 17:50:38', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan_penitipan`
--

CREATE TABLE `pelanggan_penitipan` (
  `id_pelanggan_penitipan` int(11) NOT NULL,
  `id_anjing` int(11) NOT NULL,
  `id_report_penitipan` varchar(30) NOT NULL,
  `user_add` int(11) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` int(11) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` int(11) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan_penitipan`
--

INSERT INTO `pelanggan_penitipan` (`id_pelanggan_penitipan`, `id_anjing`, `id_report_penitipan`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
(1, 7, '20191128PA1', 2, '2019-11-28 00:11:19', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan_salon`
--

CREATE TABLE `pelanggan_salon` (
  `id_pelanggan_salon` int(11) NOT NULL,
  `id_anjing` int(11) NOT NULL,
  `id_report_salon` varchar(30) NOT NULL,
  `user_add` int(11) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` int(11) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` int(11) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan_salon`
--

INSERT INTO `pelanggan_salon` (`id_pelanggan_salon`, `id_anjing`, `id_report_salon`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
(3, 7, '20191127SL1', 2, '2019-11-27 23:41:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(4, 4, '20191206SL1', 46, '2019-12-06 13:58:01', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(5, 9, '20191206SL2', 46, '2019-12-06 17:12:35', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif');

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
(1, 1, 'amkaheja@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Amelia Kaheja', '2018-12-03', 'P', '085256098358', 0, '2019-11-20 07:24:08', 1, '2019-11-27 22:20:16', 0, '0000-00-00 00:00:00', 'Aktif'),
(2, 1, 'ltandiwijaya@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Laurencia Tandiwijaya', '2016-11-16', 'P', '081808812625', 0, '0000-00-00 00:00:00', 0, '2019-11-12 23:16:52', 0, '0000-00-00 00:00:00', 'Aktif'),
(3, 4, 'kathrin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Debora Kathrin', '2019-11-09', 'P', '081912345678', 0, '0000-00-00 00:00:00', 0, '2019-11-12 23:17:25', 0, '0000-00-00 00:00:00', 'Aktif'),
(5, 6, 'wivina@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Wivina Daicy', '2019-11-21', 'P', '085212345678', 0, '0000-00-00 00:00:00', 0, '2019-11-12 23:18:10', 0, '0000-00-00 00:00:00', 'Aktif'),
(41, 3, 'kelvin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Kelvin', '2014-10-07', 'L', '08193451299', 0, '0000-00-00 00:00:00', 0, '2019-11-12 23:18:23', 0, '0000-00-00 00:00:00', 'Aktif'),
(43, 2, 'andy@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Andy Fransisko', '2018-09-13', 'L', '08193451299', 0, '2019-10-31 17:16:52', 0, '2019-11-12 23:17:39', 0, '0000-00-00 00:00:00', 'Aktif'),
(45, 5, 'kartika@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Kartika', '2015-03-12', 'P', '08151235455', 0, '2019-10-31 18:51:14', 0, '2019-11-12 23:18:35', 0, '2019-11-01 11:24:40', 'Aktif'),
(46, 7, 'veren@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Veren Valencia', '2010-01-17', 'P', '081622334455', 0, '2019-11-01 11:49:19', 0, '2019-11-02 13:59:26', 0, '0000-00-00 00:00:00', 'Aktif'),
(47, 7, 'sani@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Sani Markisa', '2008-07-17', 'L', '081234567891', 0, '2019-11-01 20:21:18', 0, '2019-11-12 23:41:30', 0, '0000-00-00 00:00:00', 'Aktif'),
(49, 7, 'mario@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Mario', '2001-08-14', 'L', '081900011123', 0, '2019-11-27 23:38:05', 0, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 'Aktif');

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
  `status_report` varchar(10) NOT NULL,
  `user_add` int(11) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` int(11) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` int(11) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report_klinik`
--

INSERT INTO `report_klinik` (`id_report_klinik`, `id_pekerja`, `tanggal`, `jam`, `keterangan`, `status_report`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
('20191125KL1', 7, '2019-11-25', '08:00:00', 'Anjingnya sehat sekali, tapi butuh olahraga sedikit', 'Selesai', 1, '2019-11-25 09:44:46', 3, '2019-11-25 10:17:05', 0, '0000-00-00 00:00:00', 'Aktif'),
('20191125KL2', 7, '2019-12-25', '10:00:00', '', 'Menunggu', 1, '2019-11-25 09:49:17', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
('20191128KL1', 7, '2019-11-28', '11:00:00', '', 'Menunggu', 2, '2019-11-28 00:12:07', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
('20191206KL1', 7, '2019-12-19', '08:00:00', '                                ', 'Menunggu', 46, '2019-12-06 17:50:38', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif');

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
  `status_report` varchar(10) NOT NULL,
  `user_add` int(11) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` int(11) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` int(11) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report_penitipan`
--

INSERT INTO `report_penitipan` (`id_report_penitipan`, `id_pekerja`, `tanggal`, `jam`, `keterangan`, `status_report`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
('20191128PA1', 10, '2019-11-28', '14:00:00', '', 'Menunggu', 2, '2019-11-28 00:11:19', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif');

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
  `status_report` varchar(10) NOT NULL,
  `user_add` int(11) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` int(11) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` int(11) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report_salon`
--

INSERT INTO `report_salon` (`id_report_salon`, `id_pekerja`, `tanggal`, `jam`, `keterangan`, `status_report`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
('20191127SL1', 18, '2019-11-30', '10:00:00', '', 'Menunggu', 2, '2019-11-27 23:41:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
('20191206SL1', 18, '2019-12-12', '08:00:00', '                                Grooming', 'Menunggu', 46, '2019-12-06 13:58:01', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
('20191206SL2', 18, '2019-12-05', '08:00:00', '                                ', 'Menunggu', 46, '2019-12-06 17:12:35', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif');

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
(1, 'Admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(2, 'Manager', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(3, 'Penjaga Kasir', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(4, 'Dokter', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(5, 'Pekerja Salon', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(6, 'Penjaga Anjing', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(7, 'Pelanggan', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `transfer`
--

CREATE TABLE `transfer` (
  `id_transfer` int(11) NOT NULL,
  `id_invoice` varchar(30) NOT NULL,
  `nama_bank` varchar(50) NOT NULL,
  `nomor_rekening` varchar(30) NOT NULL,
  `nama_pengirim` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `total` int(11) NOT NULL,
  `status_transfer` varchar(10) NOT NULL,
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

INSERT INTO `transfer` (`id_transfer`, `id_invoice`, `nama_bank`, `nomor_rekening`, `nama_pengirim`, `tanggal`, `total`, `status_transfer`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
(2, '20191125LY2', 'BCA', '5980333456', 'Veren Valencia', '2019-11-28', 115000, 'Berhasil', 1, '2019-11-25 11:24:45', 41, '2019-11-25 12:04:44', 0, '0000-00-00 00:00:00', 'Aktif'),
(3, '20191126OL1', 'Danamon', '999123456', 'Sani Markisa Buah', '2019-11-26', 370000, 'Berhasil', 1, '2019-11-26 15:32:51', 41, '2019-11-26 15:37:01', 0, '0000-00-00 00:00:00', 'Aktif'),
(4, '20191127LY1', 'BNI', '123456789', 'Mario Teguh', '2019-11-28', 77000, 'Berhasil', 2, '2019-11-27 23:42:28', 2, '2019-11-27 23:42:43', 0, '0000-00-00 00:00:00', 'Aktif'),
(5, '20191206OL2', 'BRI', '1111', 'lauren', '2019-12-05', 1200000, 'Berhasil', 46, '2019-12-06 13:40:02', 41, '2019-12-06 13:41:32', 0, '0000-00-00 00:00:00', 'Aktif'),
(6, '20191206LY1', 'BCA', '1111', 'Laurencia', '2019-12-06', 77000, 'Menunggu', 46, '2019-12-06 13:58:21', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif'),
(7, '20191206LY2', 'BCA', '111', 'Lauren', '2019-12-11', 77000, 'Menunggu', 46, '2019-12-06 17:12:55', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id_wishlist` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah_barang` int(3) NOT NULL,
  `user_add` int(11) NOT NULL,
  `waktu_add` datetime NOT NULL,
  `user_edit` int(11) NOT NULL,
  `waktu_edit` datetime NOT NULL,
  `user_delete` int(11) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  `status_delete` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id_wishlist`, `id_pelanggan`, `id_barang`, `jumlah_barang`, `user_add`, `waktu_add`, `user_edit`, `waktu_edit`, `user_delete`, `waktu_delete`, `status_delete`) VALUES
(1, 1, 6, 12, 46, '2019-12-06 13:31:22', 46, '2019-12-06 13:31:41', 0, '0000-00-00 00:00:00', 'Tidak Aktif'),
(2, 1, 10, 1, 46, '2019-12-06 17:26:13', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Tidak Aktif'),
(3, 1, 8, 12, 46, '2019-12-06 17:53:14', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Tidak Aktif'),
(4, 1, 9, 12, 46, '2019-12-06 17:55:04', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'Aktif');

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
  MODIFY `id_anjing` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `detail_invoice_barang`
--
ALTER TABLE `detail_invoice_barang`
  MODIFY `id_detail_invoice_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `detail_invoice_layanan`
--
ALTER TABLE `detail_invoice_layanan`
  MODIFY `id_detail_invoice_layanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `detail_layanan`
--
ALTER TABLE `detail_layanan`
  MODIFY `id_detail_layanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `detail_layanan_report_klinik`
--
ALTER TABLE `detail_layanan_report_klinik`
  MODIFY `id_detLay_repKlin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `detail_layanan_report_penitipan`
--
ALTER TABLE `detail_layanan_report_penitipan`
  MODIFY `id_detLay_repPen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `detail_layanan_report_salon`
--
ALTER TABLE `detail_layanan_report_salon`
  MODIFY `id_detLay_repSal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `detail_obat_report_klinik`
--
ALTER TABLE `detail_obat_report_klinik`
  MODIFY `id_detObat_repKlin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id_kategori_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pelanggan_klinik`
--
ALTER TABLE `pelanggan_klinik`
  MODIFY `id_pelanggan_klinik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pelanggan_penitipan`
--
ALTER TABLE `pelanggan_penitipan`
  MODIFY `id_pelanggan_penitipan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pelanggan_salon`
--
ALTER TABLE `pelanggan_salon`
  MODIFY `id_pelanggan_salon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tipe_pengguna`
--
ALTER TABLE `tipe_pengguna`
  MODIFY `id_tipe_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transfer`
--
ALTER TABLE `transfer`
  MODIFY `id_transfer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id_wishlist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

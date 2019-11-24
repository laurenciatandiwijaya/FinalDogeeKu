-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 15, 2019 at 11:45 PM
-- Server version: 10.2.25-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `usi123456_dogeeKu`
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
  `tanggal_lahir` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  `keterangan` text NOT NULL
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
  `deskripsi_layanan` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  `id_pekerja` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `metode_pembayaran` varchar(1) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(20) NOT NULL,
  `gaji` varchar(10) NOT NULL,
  `nama_layanan` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`, `gaji`, `nama_layanan`) VALUES
(1, 'Admin', '8500000', ''),
(2, 'Manager', '12800000', ''),
(3, 'Penjaga Kasir', '5400000', ''),
(4, 'Dokter', '9700000', ''),
(5, 'Pekerja Salon', '6300000', ''),
(6, 'Pekerja Salon', '6300000', '');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_anjing`
--

CREATE TABLE `jenis_anjing` (
  `id_jenis_anjing` int(11) NOT NULL,
  `nama_jenis_anjing` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_barang`
--

CREATE TABLE `kategori_barang` (
  `id_kategori_barang` int(11) NOT NULL,
  `nama_kategori_barang` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  `status_kegiatan` varchar(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pekerja`
--

CREATE TABLE `pekerja` (
  `id_pekerja` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pekerja`
--

INSERT INTO `pekerja` (`id_pekerja`, `id_pengguna`, `id_jabatan`, `tanggal_masuk`, `alamat`) VALUES
(1, 1, 1, '0000-00-00', 'Jl. Jend Sudirman Karawaci'),
(2, 2, 1, '0000-00-00', 'Jl. Kenanga Perum. Kresek'),
(7, 3, 4, '0000-00-00', 'Ures Karawaci'),
(9, 4, 5, '0000-00-00', 'Kondominium Tangerang'),
(10, 5, 6, '0000-00-00', 'Jl. Kemakmuran Jakarta Utara'),
(11, 6, 3, '0000-00-00', 'Jl. Ures Matahari Jakarta');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `tanggal_registrasi` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `status_pengguna` varchar(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `email`, `password`, `nama_lengkap`, `tanggal_lahir`, `jenis_kelamin`, `no_hp`, `status_pengguna`) VALUES
(1, 'amkaheja@gmail.com', 'amel1509', 'Amelia Kaheja', '0000-00-00', 'P', '085256098358', '1'),
(2, 'ltandiwijaya@gmail.com', 'lauren1712', 'Laurencia Tandiwijaya', '0000-00-00', 'P', '081808812623', '1'),
(3, 'kathrin@gmail.com', 'kathrin1234', 'Debora Kathrin', '0000-00-00', 'P', '081912345678', '1'),
(4, 'kathrin@gmail.com', 'kathrin1234', 'Debora Kathrin', '0000-00-00', 'P', '081912345678', '1'),
(5, 'wivina@gmail.com', 'wivina1234', 'Wivina Daicy', '0000-00-00', 'P', '085212345678', '1'),
(6, 'joshua@gmail.com', 'joshua1234', 'Joshua Satria', '0000-00-00', 'L', '089512345678', '1'),
(7, 'andy@gmail.com', 'andy1234', 'Andy Fransisko', '0000-00-00', 'L', '081812345678', '1');

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
  `id_anjing` int(11) NOT NULL,
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
-- Table structure for table `transfer`
--

CREATE TABLE `transfer` (
  `id_transfer` int(11) NOT NULL,
  `id_invoice` varchar(30) NOT NULL,
  `nama_bank` varchar(50) NOT NULL,
  `nomor_rekening` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `total` int(11) NOT NULL,
  `status_transfer` varchar(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `variasi`
--

CREATE TABLE `variasi` (
  `id_variasi` int(11) NOT NULL,
  `nama_variasi` varchar(30) NOT NULL,
  `detail_variasi` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `variasi_barang`
--

CREATE TABLE `variasi_barang` (
  `id_variasi_barang` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_variasi` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id_wishlist` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  MODIFY `id_anjing` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id_detail_layanan` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jenis_anjing`
--
ALTER TABLE `jenis_anjing`
  MODIFY `id_jenis_anjing` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori_barang`
--
ALTER TABLE `kategori_barang`
  MODIFY `id_kategori_barang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pekerja`
--
ALTER TABLE `pekerja`
  MODIFY `id_pekerja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transfer`
--
ALTER TABLE `transfer`
  MODIFY `id_transfer` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `variasi`
--
ALTER TABLE `variasi`
  MODIFY `id_variasi` int(11) NOT NULL AUTO_INCREMENT;

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

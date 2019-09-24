-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2019 at 09:37 AM
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
-- Database: `db_klinik`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_transaksi`
--

CREATE TABLE `tb_detail_transaksi` (
  `id_detail_transaksi` int(11) NOT NULL,
  `rincian_obat` varchar(25) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_obat` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_obat`
--

CREATE TABLE `tb_obat` (
  `id_obat` varchar(11) NOT NULL,
  `nama_obat` varchar(20) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_obat`
--

INSERT INTO `tb_obat` (`id_obat`, `nama_obat`, `harga_jual`, `harga_beli`) VALUES
('ait', 'Aito obat tetes mata', 15000, 9800),
('all1', 'Allopurinol 100mg', 500, 220),
('er3', 'eropams', 12000, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pasien`
--

CREATE TABLE `tb_pasien` (
  `id_pasien` int(11) NOT NULL,
  `nama_pasien` text NOT NULL,
  `alamat` varchar(130) NOT NULL,
  `nomor_telepon` varchar(12) NOT NULL,
  `tempat_lahir` text NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `nama_kepala_keluarga` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pasien`
--

INSERT INTO `tb_pasien` (`id_pasien`, `nama_pasien`, `alamat`, `nomor_telepon`, `tempat_lahir`, `tanggal_lahir`, `nama_kepala_keluarga`) VALUES
(3, 'Reza Faisal M.', 'Malang, Jawa Timur, Indonesia', '085335831672', 'Kraksaan', '2019-06-02', 'hermanto'),
(4, 'Ramadhani Nurul Amalia', 'balalalalala', '', '$this->dashboard_model->count_pemeriksaan_bulan()', '2019-07-08', '$this->dashboard_model->count_pemeriksaa'),
(5, 'Alief Aulia Rachman', '$this->dashboard_model->count_pemeriksaan_bulan()', '', '$this->dashboard_model->count_pemeriksaan_bulan()', '2019-07-01', '$this->dashboard_model->count_pemeriksaa'),
(6, 'budi', 'dcbsjdna', '085335831726', 'malang', '2019-08-14', 'hermanto');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pemeriksaan`
--

CREATE TABLE `tb_pemeriksaan` (
  `id_pemeriksaan` int(11) NOT NULL,
  `tanggal_pemeriksaan` date NOT NULL,
  `hasil_pemeriksaan` varchar(300) NOT NULL,
  `diagnosis` text NOT NULL,
  `terapi` text NOT NULL,
  `status_transaksi` enum('sudah','belum') NOT NULL,
  `id_pasien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pemeriksaan`
--

INSERT INTO `tb_pemeriksaan` (`id_pemeriksaan`, `tanggal_pemeriksaan`, `hasil_pemeriksaan`, `diagnosis`, `terapi`, `status_transaksi`, `id_pasien`) VALUES
(6, '2019-07-05', '$this->dashboard_model->count_pemeriksaan_bulan()', '$this->dashboard_model->count_pemeriksaan_bulan()', '$this->dashboard_model->count_pemeriksaan_bulan()', 'belum', 3),
(13, '2019-06-12', '\"DATE_FORMAT(column_name,\'%Y-%m\')\"', '\"DATE_FORMAT(column_name,\'%Y-%m\')\"', '\"DATE_FORMAT(column_name,\'%Y-%m\')\"', 'belum', 3),
(16, '2018-07-07', 'blalalalalalalablalalalalalala', 'blalalalalalalablalalalalalala', 'blalalalalalalablalalalalalala', 'sudah', 3),
(17, '2019-06-13', '$this->uri->total_segments() < 3', '$this->uri->total_segments() < 3', '$this->uri->total_segments() < 3', 'sudah', 3),
(18, '2019-07-12', '$this->dashboard_model->count_pemeriksaan_bulan()', '$this->dashboard_model->count_pemeriksaan_bulan()', '$this->dashboard_model->count_pemeriksaan_bulan()', 'sudah', 3),
(20, '2019-07-12', '$this->dashboard_model->count_pemeriksaan_bulan()', '$this->dashboard_model->count_pemeriksaan_bulan()', '$this->dashboard_model->count_pemeriksaan_bulan()', 'sudah', 4),
(21, '2019-07-12', '$this->dashboard_model->count_pemeriksaan_bulan()', '$this->dashboard_model->count_pemeriksaan_bulan()', '$this->dashboard_model->count_pemeriksaan_bulan()', 'sudah', 5),
(23, '2019-07-11', '$this->dashboard_model->count_pemeriksaan_bulan()', '$this->dashboard_model->count_pemeriksaan_bulan()', '$this->dashboard_model->count_pemeriksaan_bulan()', 'sudah', 4),
(24, '2019-07-03', '$this->dashboard_model->count_pemeriksaan_bulan()', '$this->dashboard_model->count_pemeriksaan_bulan()', '$this->dashboard_model->count_pemeriksaan_bulan()', 'sudah', 5),
(25, '2019-07-01', '$this->dashboard_model->count_pemeriksaan_bulan()', '$this->dashboard_model->count_pemeriksaan_bulan()', '$this->dashboard_model->count_pemeriksaan_bulan()', 'sudah', 4),
(28, '2019-07-07', '$this->dashboard_model->count_pemeriksaan_bulan()', '$this->dashboard_model->count_pemeriksaan_bulan()', '$this->dashboard_model->count_pemeriksaan_bulan()', 'sudah', 5),
(29, '2019-07-07', '$this->dashboard_model->count_pemeriksaan_bulan()', '$this->dashboard_model->count_pemeriksaan_bulan()', '$this->dashboard_model->count_pemeriksaan_bulan()', 'sudah', 5),
(30, '2019-07-14', '$this->dashboard_model->count_pemeriksaan_bulan()', '$this->dashboard_model->count_pemeriksaan_bulan()', '$this->dashboard_model->count_pemeriksaan_bulan()', 'sudah', 5),
(31, '2019-07-14', '$this->dashboard_model->count_pemeriksaan_bulan()', '$this->dashboard_model->count_pemeriksaan_bulan()', '$this->dashboard_model->count_pemeriksaan_bulan()', 'sudah', 4),
(33, '2019-07-16', '$this->dashboard_model->count_pemeriksaan_bulan()', '$this->dashboard_model->count_pemeriksaan_bulan()', '$this->dashboard_model->count_pemeriksaan_bulan()', 'sudah', 3),
(34, '2019-08-04', 'lorem ipsum', 'lorem ipsum', 'lorem ipsum', 'sudah', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tb_stok_obat`
--

CREATE TABLE `tb_stok_obat` (
  `id_stok` int(11) NOT NULL,
  `id_obat` varchar(11) NOT NULL,
  `stok_masuk` int(11) NOT NULL,
  `stok_keluar` int(11) NOT NULL,
  `sisa_stok` int(11) NOT NULL,
  `bulan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_stok_obat`
--

INSERT INTO `tb_stok_obat` (`id_stok`, `id_obat`, `stok_masuk`, `stok_keluar`, `sisa_stok`, `bulan`) VALUES
(10, 'ait', 12, 0, 12, '2019-08-27'),
(12, 'ait', 60, 30, 35, '2019-09-17'),
(13, 'ait', 45, 27, 65, '2019-06-10'),
(14, 'all1', 30, 0, 30, '2019-09-06'),
(15, 'er3', 12, 0, 12, '2019-09-13');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `waktu_transaksi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `harga_total` int(25) NOT NULL,
  `id_pemeriksaan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  ADD PRIMARY KEY (`id_detail_transaksi`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_obat` (`id_obat`),
  ADD KEY `id_obat_2` (`id_obat`);

--
-- Indexes for table `tb_obat`
--
ALTER TABLE `tb_obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `tb_pasien`
--
ALTER TABLE `tb_pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `tb_pemeriksaan`
--
ALTER TABLE `tb_pemeriksaan`
  ADD PRIMARY KEY (`id_pemeriksaan`),
  ADD KEY `id_pasien` (`id_pasien`);

--
-- Indexes for table `tb_stok_obat`
--
ALTER TABLE `tb_stok_obat`
  ADD PRIMARY KEY (`id_stok`),
  ADD KEY `id_obat` (`id_obat`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_pemeriksaan` (`id_pemeriksaan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  MODIFY `id_detail_transaksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_pasien`
--
ALTER TABLE `tb_pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_pemeriksaan`
--
ALTER TABLE `tb_pemeriksaan`
  MODIFY `id_pemeriksaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tb_stok_obat`
--
ALTER TABLE `tb_stok_obat`
  MODIFY `id_stok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  ADD CONSTRAINT `tb_detail_transaksi_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `tb_transaksi` (`id_transaksi`),
  ADD CONSTRAINT `tb_detail_transaksi_ibfk_2` FOREIGN KEY (`id_obat`) REFERENCES `tb_obat` (`id_obat`);

--
-- Constraints for table `tb_pemeriksaan`
--
ALTER TABLE `tb_pemeriksaan`
  ADD CONSTRAINT `tb_pemeriksaan_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `tb_pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_stok_obat`
--
ALTER TABLE `tb_stok_obat`
  ADD CONSTRAINT `tb_stok_obat_ibfk_1` FOREIGN KEY (`id_obat`) REFERENCES `tb_obat` (`id_obat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `tb_transaksi_ibfk_1` FOREIGN KEY (`id_pemeriksaan`) REFERENCES `tb_pemeriksaan` (`id_pemeriksaan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

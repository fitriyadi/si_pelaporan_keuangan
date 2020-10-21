-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 21, 2020 at 10:02 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kampung_flory`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(30) DEFAULT NULL,
  `nama_lengkap_admin` varchar(50) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama_admin`, `nama_lengkap_admin`, `username`, `password`) VALUES
(1, 'admin', 'admin', 'admin', 'admin'),
(3, 'admin2', 'admin2', 'admin2', 'admin2');

-- --------------------------------------------------------

--
-- Table structure for table `tb_akun`
--

CREATE TABLE `tb_akun` (
  `kode_akun` varchar(20) NOT NULL,
  `nama_akun` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_akun`
--

INSERT INTO `tb_akun` (`kode_akun`, `nama_akun`) VALUES
('1-111', 'Kas'),
('1-112', 'Piutang'),
('1-113', 'Persediaan'),
('1-211', 'Peralatan'),
('1-212', 'Tanah dan Bangunan'),
('2-111', 'Hutang Usaha'),
('3-111', 'Modal'),
('3-211', 'Prive'),
('4-111', 'Pendapatan'),
('5-111', 'Beban Gaji'),
('5-112', 'beban Operasional dan Lain - Lain');

-- --------------------------------------------------------

--
-- Table structure for table `tb_index`
--

CREATE TABLE `tb_index` (
  `id_index` varchar(20) NOT NULL,
  `keterangan` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_index`
--

INSERT INTO `tb_index` (`id_index`, `keterangan`) VALUES
('1', 'Arus Kas Kegiatan Operasi'),
('2', 'Arus Kas kegiatan Investasi'),
('3', 'Arus Kas Kegiatan Pendanaan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_jurnal` int(11) NOT NULL,
  `id_transaksi` char(14) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `id_unit` int(11) DEFAULT NULL,
  `kode_akun` varchar(20) DEFAULT NULL,
  `id_index` varchar(20) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `debet` int(11) DEFAULT NULL,
  `kredit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_jurnal`, `id_transaksi`, `tanggal`, `id_unit`, `kode_akun`, `id_index`, `keterangan`, `debet`, `kredit`) VALUES
(1, 'T201020-001', '2020-10-21', 1, '1-111', '1', 'Data Baru', 200000, 0),
(2, 'T201020-001', '2020-10-21', 1, '2-111', '1', 'Data Baru', 0, 200000),
(3, 'T201021-001', '2020-10-16', 1, '1-111', '1', 'Pembayaran gaji karyawan', 0, 5000000),
(4, 'T201021-001', '2020-10-16', 1, '5-111', '1', 'Pembayaran gaji karyawan', 5000000, 0),
(5, 'T201021-002', '2020-10-07', 1, '1-111', '1', 'Pemasukan', 2000000, 0),
(6, 'T201021-002', '2020-10-07', 1, '4-111', '1', 'Pemasukan', 0, 2000000),
(7, 'T201021-003', '2020-10-09', 1, '3-111', '1', 'Modal Setor', 0, 1000000),
(8, 'T201021-003', '2020-10-09', 1, '1-111', '1', 'Modal Setor', 1000000, 0),
(9, 'T201021-004', '2020-10-07', 1, '3-211', '1', 'Pengambilan', 0, 100000),
(10, 'T201021-004', '2020-10-07', 1, '1-111', '1', 'Pengambilan', 100000, 0),
(11, 'T201021-005', '2020-10-02', 1, '1-211', '1', 'Pembelian Alat', 0, 200000),
(12, 'T201021-005', '2020-10-02', 1, '1-111', '1', 'Pembelian Alat', 100000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_unit`
--

CREATE TABLE `tb_unit` (
  `id_unit` int(11) NOT NULL,
  `nama_unit` varchar(30) DEFAULT NULL,
  `jenis_usaha` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_unit`
--

INSERT INTO `tb_unit` (`id_unit`, `nama_unit`, `jenis_usaha`) VALUES
(1, 'Kampung Flory', 'Jasa'),
(2, 'Dewi Flory', 'Jasa'),
(3, 'Taruna Tani', 'Jasa'),
(4, 'Bali Ndeso Group', 'Jasa'),
(6, 'Unit Batu Baru', 'Jasa baru');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(30) DEFAULT NULL,
  `nama_lengkap_user` varchar(50) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `id_unit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `nama_lengkap_user`, `username`, `password`, `id_unit`) VALUES
(1, 'Toko X', 'Toko Marabunta X', 'mara', 'bunta', 1),
(2, 'Sriwijaya1', 'Sriwijaya gaya Pesona1', 'wijaya1', 'karta1', 2);

-- --------------------------------------------------------

--
-- Table structure for table `temp_transaksi`
--

CREATE TABLE `temp_transaksi` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_akun` varchar(20) NOT NULL,
  `id_index` varchar(20) NOT NULL,
  `debet` int(11) NOT NULL,
  `kredit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_akun`
--
ALTER TABLE `tb_akun`
  ADD PRIMARY KEY (`kode_akun`);

--
-- Indexes for table `tb_index`
--
ALTER TABLE `tb_index`
  ADD PRIMARY KEY (`id_index`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_jurnal`);

--
-- Indexes for table `tb_unit`
--
ALTER TABLE `tb_unit`
  ADD PRIMARY KEY (`id_unit`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `temp_transaksi`
--
ALTER TABLE `temp_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_jurnal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_unit`
--
ALTER TABLE `tb_unit`
  MODIFY `id_unit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `temp_transaksi`
--
ALTER TABLE `temp_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

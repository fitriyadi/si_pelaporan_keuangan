-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2020 at 01:53 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_kampung_flory`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE IF NOT EXISTS `tb_admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `nama_admin` varchar(30) DEFAULT NULL,
  `nama_lengkap_admin` varchar(50) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama_admin`, `nama_lengkap_admin`, `username`, `password`) VALUES
(1, 'admin', 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_akun`
--

CREATE TABLE IF NOT EXISTS `tb_akun` (
  `kode_akun` varchar(20) NOT NULL,
  `nama_akun` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`kode_akun`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_akun`
--

INSERT INTO `tb_akun` (`kode_akun`, `nama_akun`) VALUES
('1-111', 'Kas'),
('1-112', 'Piutang'),
('2-111', 'Hutang Usaha'),
('222', 'asas'),
('3-111', 'Modal');

-- --------------------------------------------------------

--
-- Table structure for table `tb_index`
--

CREATE TABLE IF NOT EXISTS `tb_index` (
  `id_index` varchar(20) NOT NULL,
  `keterangan` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_index`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_index`
--

INSERT INTO `tb_index` (`id_index`, `keterangan`) VALUES
('1', 'Arus Kas Kegiatan Operasi'),
('2', 'Arus Kas kegiatan Investasi'),
('3', 'Arus Kas Kegiatan Pendanaan'),
('4', '3333');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE IF NOT EXISTS `tb_transaksi` (
  `id_jurnal` int(11) NOT NULL AUTO_INCREMENT,
  `id_transaksi` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `id_unit` int(11) DEFAULT NULL,
  `kode_akun` varchar(20) DEFAULT NULL,
  `index` varchar(20) DEFAULT NULL,
  `debet` int(11) DEFAULT NULL,
  `kredit` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_jurnal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_jurnal`, `id_transaksi`, `tanggal`, `id_unit`, `kode_akun`, `index`, `debet`, `kredit`) VALUES
(1, 1, '2020-08-11', 1, NULL, NULL, NULL, NULL),
(2, 2, '2020-08-11', 1, NULL, NULL, NULL, NULL),
(3, 3, '2020-08-11', 1, NULL, NULL, NULL, NULL),
(4, 4, '2020-08-11', 1, NULL, NULL, NULL, NULL),
(5, 1, '2020-08-11', 2, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_unit`
--

CREATE TABLE IF NOT EXISTS `tb_unit` (
  `id_unit` int(11) NOT NULL AUTO_INCREMENT,
  `nama_unit` varchar(30) DEFAULT NULL,
  `jenis_usaha` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_unit`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tb_unit`
--

INSERT INTO `tb_unit` (`id_unit`, `nama_unit`, `jenis_usaha`) VALUES
(1, 'Kampung Flory', 'Jasa'),
(2, 'Dewi Flory', 'Jasa'),
(3, 'Taruna Tani', 'Jasa'),
(4, 'Bali Ndeso Group', 'Jasa');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama_user` varchar(30) DEFAULT NULL,
  `nama_lengkap_user` varchar(50) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `id_unit` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `nama_lengkap_user`, `username`, `password`, `id_unit`) VALUES
(1, 'Toko X', 'Toko Marabunta X', 'mara', 'bunta', NULL),
(2, 'Sriwijaya', 'Sriwijaya gaya Pesona', 'wijaya', 'karta', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

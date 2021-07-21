-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 23, 2011 at 05:16 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `uid` int(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(60) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`uid`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE IF NOT EXISTS `buku` (
  `isbn` char(10) NOT NULL COMMENT 'ISBN',
  `judul` varchar(50) NOT NULL COMMENT 'Judul',
  `nomorEdisi` varchar(12) NOT NULL COMMENT 'Nomor Edisi',
  `copyright` int(11) NOT NULL COMMENT 'Copyright',
  `deskripsi` varchar(100) NOT NULL COMMENT 'Deskripsi',
  `IDPenerbit` int(11) NOT NULL COMMENT 'ID Penerbit',
  `fileGambar` varchar(25) NOT NULL COMMENT 'File Gambar',
  `harga` int(11) NOT NULL COMMENT 'Harga',
  PRIMARY KEY (`isbn`),
  KEY `IDPenerbit` (`IDPenerbit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`isbn`, `judul`, `nomorEdisi`, `copyright`, `deskripsi`, `IDPenerbit`, `fileGambar`, `harga`) VALUES
('123', 'Belajar MySQL', '1231', 2011, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the', 123459, '1306721315.jpg', 10000),
('12345', 'Ajax', '12', 2011, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the', 123459, '1306721165.jpg', 20000),
('Hele', 'Oracle', '231', 2011, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the', 123459, '1306721387.jpg', 12000);

-- --------------------------------------------------------

--
-- Table structure for table `DetailOrder`
--

CREATE TABLE IF NOT EXISTS `DetailOrder` (
  `IDOrderDetail` int(11) NOT NULL AUTO_INCREMENT,
  `IDOrder` int(11) NOT NULL,
  `ISBN` char(15) NOT NULL,
  `JumlahBeli` int(11) NOT NULL,
  PRIMARY KEY (`IDOrderDetail`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `DetailOrder`
--


-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `id_member` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `NamaLengkap` varchar(50) NOT NULL,
  `Alamat` varchar(75) NOT NULL,
  `LevelMember` enum('admin','member') NOT NULL,
  `Provinsi` varchar(20) NOT NULL,
  `Kota` varchar(20) NOT NULL,
  PRIMARY KEY (`id_member`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `username_2` (`username`),
  UNIQUE KEY `id_member_2` (`id_member`),
  KEY `id_member` (`id_member`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_member`, `username`, `password`, `NamaLengkap`, `Alamat`, `LevelMember`, `Provinsi`, `Kota`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Tejo Murti', 'Jl. Gejayan', 'admin', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `OrderData`
--

CREATE TABLE IF NOT EXISTS `OrderData` (
  `IDOrder` int(11) NOT NULL AUTO_INCREMENT,
  `id_member` int(11) NOT NULL,
  `TanggalOrder` date NOT NULL,
  `StatusOrder` enum('baru','lunas','terkirim') NOT NULL,
  PRIMARY KEY (`IDOrder`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `OrderData`
--


-- --------------------------------------------------------

--
-- Table structure for table `penerbit`
--

CREATE TABLE IF NOT EXISTS `penerbit` (
  `IDPenerbit` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID Penerbit',
  `namaPenerbit` varchar(25) NOT NULL COMMENT 'Nama Penerbit',
  `alamatPenerbit` varchar(50) NOT NULL COMMENT 'Alamat Penerbit',
  PRIMARY KEY (`IDPenerbit`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=123460 ;

--
-- Dumping data for table `penerbit`
--

INSERT INTO `penerbit` (`IDPenerbit`, `namaPenerbit`, `alamatPenerbit`) VALUES
(123459, 'Andi Publisher', 'Jl. gejayan 12');

-- --------------------------------------------------------

--
-- Table structure for table `ShoppingCart`
--

CREATE TABLE IF NOT EXISTS `ShoppingCart` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `SessionId` varchar(50) NOT NULL,
  `ISBN` char(15) NOT NULL,
  `JumlahBeli` int(11) NOT NULL,
  `TanggalOrder` date NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `ShoppingCart`
--


--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`IDPenerbit`) REFERENCES `penerbit` (`IDPenerbit`) ON DELETE CASCADE ON UPDATE CASCADE;

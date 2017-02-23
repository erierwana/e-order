-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2016 at 07:42 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbeorder_10113500`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(8) NOT NULL,
  `userpass` varchar(41) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `level` enum('ADMIN','SUPERADMIN') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `userpass`, `nama`, `level`) VALUES
('admin', '*4ACFE3202A5FF5CF467898FC58AAB1D615029441', 'Administrator', 'ADMIN'),
('sadmin', '*18A38853AD67E52477A5BDAF0A006D469A41BE2D', 'Super Administrator', 'SUPERADMIN');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `dihapus` char(1) NOT NULL DEFAULT 'T'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama`, `dihapus`) VALUES
(5, 'Smartphone', 'T'),
(6, 'Laptop', 'T'),
(7, 'Earphone', 'T'),
(8, 'Mouse', 'T'),
(10, 'Hardisk', 'T');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id_member` varchar(50) NOT NULL COMMENT 'Untuk id_member akan menggunakan email',
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `katasandi` varchar(50) NOT NULL,
  `loginterakhir` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_member`, `nama`, `alamat`, `katasandi`, `loginterakhir`) VALUES
('member', 'Member', 'Jl.Member Bandung', '*F76A0292E763BD108EA5492E25EC051F7E23E6E9', '2016-06-13 00:34:16'),
('member0', 'Memberer', 'Jl.Member Bandung', '*F76A0292E763BD108EA5492E25EC051F7E23E6E9', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `merk`
--

CREATE TABLE `merk` (
  `id_merk` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `dihapus` char(1) NOT NULL DEFAULT 'T'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `merk`
--

INSERT INTO `merk` (`id_merk`, `nama`, `dihapus`) VALUES
(9, 'Samsung', 'T'),
(10, 'Sony', 'T'),
(11, 'Nokia', 'Y'),
(12, 'Asus', 'T'),
(13, 'Lenovo', 'T'),
(14, 'Oppo', 'T'),
(15, 'Huawei', 'T'),
(16, 'Apple', 'T'),
(17, 'LG', 'T'),
(18, 'HP', 'T'),
(19, 'Acer', 'T'),
(20, 'Dell', 'T'),
(21, 'Ericsson', 'T'),
(22, 'Razer', 'T');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `id_member` varchar(50) NOT NULL,
  `waktu` datetime NOT NULL,
  `dicheckout` char(1) NOT NULL DEFAULT 'T',
  `diarsipkan` char(1) NOT NULL DEFAULT 'T'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pesanan_items`
--

CREATE TABLE `pesanan_items` (
  `id_pesanan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT '1',
  `harga` decimal(10,0) NOT NULL DEFAULT '0',
  `diskon` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_merk` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` decimal(10,0) NOT NULL,
  `berat` int(11) NOT NULL DEFAULT '0' COMMENT 'Dalam KG',
  `diskon` float NOT NULL,
  `stok` int(11) NOT NULL DEFAULT '0',
  `dijual` char(1) NOT NULL DEFAULT 'Y',
  `deskripsi` text NOT NULL,
  `filegambar` varchar(100) DEFAULT NULL,
  `dihapus` char(1) NOT NULL DEFAULT 'T'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `id_merk`, `nama`, `harga`, `berat`, `diskon`, `stok`, `dijual`, `deskripsi`, `filegambar`, `dihapus`) VALUES
(14, 6, 12, 'Asus-A456UF-WX023TA', '7000000', 0, 0, 20, 'Y', 'Asus', '../images/ASUS A456UF-WX023T Dark Brown.jpg', 'T'),
(15, 10, 18, 'Hardisk hp 1TB', '900000', 0, 0, 45, 'H', 'Y', 'hardisk-eksternal-1-tera.jpg', 'T'),
(16, 8, 22, 'Razer Mouse', '900000', 0, 0, 50, 'R', 'Y', '8b7093d5d9ad50147b86868c80f83a76.jpg', 'T'),
(17, 7, 22, 'Razer Earphone', '700000', 0, 0, 60, 'R', 'Y', 'u_files_store_1_194134.jpg', 'T'),
(18, 5, 9, 'Samasung Galaxy S7 edge', '9000000', 0, 0, 50, 'S', 'Y', 'samsung-galaxy-s7-edge-.jpg', 'T'),
(19, 5, 9, 'Samsung Z3', '8000000', 0, 0, 45, 'S', 'Y', 'samsung-z3.jpg', 'T');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`),
  ADD UNIQUE KEY `nama` (`nama`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `merk`
--
ALTER TABLE `merk`
  ADD PRIMARY KEY (`id_merk`),
  ADD UNIQUE KEY `nama` (`nama`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id_member` (`id_member`);

--
-- Indexes for table `pesanan_items`
--
ALTER TABLE `pesanan_items`
  ADD PRIMARY KEY (`id_pesanan`,`id_produk`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_merk` (`id_merk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `merk`
--
ALTER TABLE `merk`
  MODIFY `id_merk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`);

--
-- Constraints for table `pesanan_items`
--
ALTER TABLE `pesanan_items`
  ADD CONSTRAINT `pesanan_items_ibfk_1` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id_pesanan`),
  ADD CONSTRAINT `pesanan_items_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`),
  ADD CONSTRAINT `produk_ibfk_2` FOREIGN KEY (`id_merk`) REFERENCES `merk` (`id_merk`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

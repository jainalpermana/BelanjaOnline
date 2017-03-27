-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2017 at 06:00 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `supermarket`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kode_barang` int(11) NOT NULL,
  `nama_barang` varchar(40) NOT NULL,
  `foto` varchar(20) NOT NULL,
  `jenis_barang` varchar(20) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `harga` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kode_barang`, `nama_barang`, `foto`, `jenis_barang`, `jumlah_barang`, `harga`) VALUES
(20, 'kacang', '14.png', 'makanan', 20, 200000),
(21, 'Minute Pad', 'bv1.png', 'Minuman', 10, 100000),
(22, 'Air Mineral', 'pf2.png', 'Minuman', 25, 50000),
(23, 'Coca Cola zero', 'bv6.png', 'Minuman', 50, 150000),
(24, 'selay roti', 'gu1.png', 'Makanan', 100, 500000),
(25, 'Mangkok', 'pc8.png', 'alat rumah tangga', 20, 100000),
(26, 'Katel', 'hh9.png', 'Alat Masak', 10, 70000),
(27, 'Tepung', '7.png', 'Makanan', 100, 10000),
(28, 'Roti', '13.png', 'Makanan', 100, 5000),
(29, 'Bumbu Penyedap', 'p4.jpg', 'Masakan', 200, 2000),
(30, 'Poster', 'Capture.PNG', 'accesories', 10, 50000);

-- --------------------------------------------------------

--
-- Table structure for table `chart`
--

CREATE TABLE `chart` (
  `kode_barang` int(11) NOT NULL,
  `nama_barang` varchar(25) NOT NULL,
  `jenis_barang` varchar(25) NOT NULL,
  `harga` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chart`
--

INSERT INTO `chart` (`kode_barang`, `nama_barang`, `jenis_barang`, `harga`) VALUES
(5, '', '', '200000'),
(7, 'wowo', 'makanan', '200000'),
(8, 'wowo', 'makanan', '200000'),
(9, 'Minute Pad', 'Minuman', '100000'),
(10, 'wowo', 'makanan', '200000'),
(11, 'kacang', 'makanan', '200000');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `buyid` int(11) NOT NULL,
  `barang` varchar(50) NOT NULL,
  `tgl_pem` varchar(20) NOT NULL,
  `penerima_pem` varchar(20) NOT NULL,
  `alamat_pem` text NOT NULL,
  `kp` varchar(20) NOT NULL,
  `kota` varchar(20) NOT NULL,
  `tlp` varchar(15) NOT NULL,
  `rek_pem` varchar(20) NOT NULL,
  `nmrek_pembeli` varchar(20) NOT NULL,
  `bank_pembeli` varchar(20) NOT NULL,
  `tot_pem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`buyid`, `barang`, `tgl_pem`, `penerima_pem`, `alamat_pem`, `kp`, `kota`, `tlp`, `rek_pem`, `nmrek_pembeli`, `bank_pembeli`, `tot_pem`) VALUES
(5, 'wowo<', '2017-02-27', 'Jainal', 'Panyileukan', '4040', 'Bandung', '0808080808080', 'uje', '12345', 'Mandiri', 200000),
(6, 'Minute Pad<', '2017-02-27', 'uje', 'cibiru', '123', 'Bandung', '0808080808080', 'uje', '12345', 'BCA', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `tabeluser`
--

CREATE TABLE `tabeluser` (
  `userid` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabeluser`
--

INSERT INTO `tabeluser` (`userid`, `password`, `level`) VALUES
('admin', 'admin', 'admin'),
('user', 'user', 'user'),
('user1', 'user1', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `chart`
--
ALTER TABLE `chart`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`buyid`);

--
-- Indexes for table `tabeluser`
--
ALTER TABLE `tabeluser`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `kode_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `chart`
--
ALTER TABLE `chart`
  MODIFY `kode_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `buyid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 14, 2021 at 01:25 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_uap0003`
--

-- --------------------------------------------------------

--
-- Table structure for table `table_barang`
--

CREATE TABLE `table_barang` (
  `kode_barang` varchar(4) NOT NULL,
  `nama_barang` varchar(25) NOT NULL,
  `harga_barang` int(8) NOT NULL,
  `jumlah_barang` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_barang`
--

INSERT INTO `table_barang` (`kode_barang`, `nama_barang`, `harga_barang`, `jumlah_barang`) VALUES
('B001', 'Minyak Goreng 2lt', 27500, 201),
('B002', 'Beras 5kg', 54000, 100),
('B003', 'Terigu 1kg', 100001, 251);

-- --------------------------------------------------------

--
-- Table structure for table `table_barang_masuk`
--

CREATE TABLE `table_barang_masuk` (
  `kode_barang_masuk` varchar(5) NOT NULL,
  `kode_barang` varchar(4) NOT NULL,
  `nama_barang` varchar(20) NOT NULL,
  `jumlah_barang_masuk` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_barang_masuk`
--

INSERT INTO `table_barang_masuk` (`kode_barang_masuk`, `kode_barang`, `nama_barang`, `jumlah_barang_masuk`) VALUES
('1234', 'B003', 'Terigu 1kg', 233),
('12411', 'B002', 'Beras 5kg', 100),
('234', 'B002', 'Beras 5kg', 222),
('777', 'B002', '', 100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table_barang`
--
ALTER TABLE `table_barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `table_barang_masuk`
--
ALTER TABLE `table_barang_masuk`
  ADD PRIMARY KEY (`kode_barang_masuk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

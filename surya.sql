-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2021 at 05:34 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `surya`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_kategori` varchar(20) NOT NULL,
  `nama_barang` varchar(128) NOT NULL,
  `keterangan` varchar(500) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_kategori`, `nama_barang`, `keterangan`, `harga`, `stok`, `image`) VALUES
(5, 'PRIA', 'S', 'Tahan Air', 2000000, 5, 'Seiko.jpg'),
(6, 'WANITA', 'Seiko', 'Murah dan kualitas bagus', 350000, 4, 'Seiko1.jpg'),
(7, 'UNISEX', 'miramar', 'gersang', 200, 1, 'miramar.jpg'),
(8, 'PRIA', 'sus', 'tahan banting', 300000, 6, 'Seiko.jpg'),
(9, 'WANITA', 'yy', 'polos', 44444, 66, 'miramar.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'pria'),
(2, 'wanita'),
(3, 'unisex');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `nama_belakang` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `nama`, `nama_belakang`, `email`, `password`, `image`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'muhammad', 'azizi', 'muhammadaziziakdt@gmail.com', '$2y$10$.tbxJdpgy.o6d6DSp.9cJeyVS47WPKZxl2dY8fOxbNtJGgOJQwR42', 'defaul.jpg', 1, 1, 1614973270),
(2, 'Muhammad', 'Aziziii', 'teknikinformatika06984@gmail.com', '$2y$10$Zfx65BWVGPT04uaJD2lIOOUl9YMF0RDnoTHzZLOLg0aONcOuIDl6i', 'pubg1.jpg', 2, 1, 1614974083),
(3, 'Muhammad', 'Azizii', 'teknikteknik362@gmail.com', '$2y$10$KEBqCx0EW8Tpt0YXM/uBqOGOBy4CMhxziedk.FebySRWzWQk8NjiC', 'pubg.jpg', 2, 1, 1614974151),
(5, 'Rez', 'Surya', 'ndut@gmail.com', '$2y$10$GReGOd.ixib7rP/X6n9QUeWa/BwdObzzp4i6ODEyV9YBgF0rreJmu', 'juve.jpg', 2, 1, 1615179541),
(6, 'Rafli', 'Fadilah', 'rafli@gmail.com', '$2y$10$2z7RWNCVfvGsgDMyql9iJORqP57y45vM2n/iaY07IHmoq3o2I0St6', 'pubg2.jpg', 2, 1, 1616478297);

-- --------------------------------------------------------

--
-- Table structure for table `login_role`
--

CREATE TABLE `login_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_role`
--

INSERT INTO `login_role` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'member');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `tanggal_transaksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_role`
--
ALTER TABLE `login_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `login_role`
--
ALTER TABLE `login_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

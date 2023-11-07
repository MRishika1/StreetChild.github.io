-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2019 at 02:40 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Deepak`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `ngo`
--

CREATE TABLE `ngo` (
  `id` int(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mob` varchar(100) NOT NULL,
  `rnumber` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ngo`
--

INSERT INTO `ngo` (`id`, `name`, `email`, `mob`, `rnumber`, `address`, `img`) VALUES
(2, 'sdfasf', 'rayeen.afsar@gmail.com', '09807110535', '6434946464', '322 itwari ganj', 'ngo/1553088847050722106588.jpg'),
(3, 'Gajan', 'Bakah', 'Gsj', 'Gajan', 'Gajan', 'ngo/download (5).jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `rchild`
--

CREATE TABLE `rchild` (
  `id` int(5) NOT NULL,
  `yourname` varchar(50) NOT NULL,
  `info` varchar(20) NOT NULL,
  `vname` varchar(20) NOT NULL,
  `image` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rchild`
--

INSERT INTO `rchild` (`id`, `yourname`, `info`, `vname`, `image`, `address`) VALUES
(1, 'afsar rayeen', 'rayeen.afsar@gmail.c', 'adsadfsf', 'child/indian-army.jpg', '322 itwari ganj'),
(2, 'afsar rayeen', 'rayeen.afsar@gmail.c', 'dsfafds', 'child/indian-army.jpg', '322 itwari ganj'),
(3, 'afsar rayeen', 'rayeen.afsar@gmail.c', 'Gzhzhz', 'child/1553086304282-510580870.jpg', '322 itwari ganj'),
(4, 'Agsga', '8588555', 'Gagshs', 'child/1553088921122606291914.jpg', 'Hshshshzhshz'),
(5, 'Ranu', 'Hakan', 'Gakm', 'child/download (2).png', 'Gajj');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ngo`
--
ALTER TABLE `ngo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rchild`
--
ALTER TABLE `rchild`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ngo`
--
ALTER TABLE `ngo`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rchild`
--
ALTER TABLE `rchild`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

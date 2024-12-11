-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 11, 2024 at 11:04 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Deposito`
--
CREATE DATABASE IF NOT EXISTS `Deposito` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `Deposito`;

-- --------------------------------------------------------

--
-- Table structure for table `Login`
--

CREATE TABLE `Login` (
  `codigo` int(4) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `senha` varchar(80) NOT NULL,
  `cpf` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `Login`
--

INSERT INTO `Login` (`codigo`, `nome`, `senha`, `cpf`) VALUES
(17, 'Teste-Final', '8cb2237d0679ca88db6464eac60da96345513964', '007.350.210-19');

-- --------------------------------------------------------

--
-- Table structure for table `Veiculos`
--

CREATE TABLE `Veiculos` (
  `codigo` int(4) NOT NULL,
  `Marca` varchar(80) NOT NULL,
  `Modelo` varchar(80) NOT NULL,
  `Chassi` varchar(17) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `Veiculos`
--

INSERT INTO `Veiculos` (`codigo`, `Marca`, `Modelo`, `Chassi`) VALUES
(22, 'Teste', 'Final', 'xyz2459');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Login`
--
ALTER TABLE `Login`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `Veiculos`
--
ALTER TABLE `Veiculos`
  ADD PRIMARY KEY (`codigo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Login`
--
ALTER TABLE `Login`
  MODIFY `codigo` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `Veiculos`
--
ALTER TABLE `Veiculos`
  MODIFY `codigo` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

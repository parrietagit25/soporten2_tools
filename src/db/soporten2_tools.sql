-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2023 at 05:25 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `soporten2_tools`
--

-- --------------------------------------------------------

--
-- Table structure for table `adjuntos_casos`
--

CREATE TABLE `adjuntos_casos` (
  `id` int(11) NOT NULL,
  `adjunto` varchar(255) NOT NULL,
  `id_caso` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `casos`
--

CREATE TABLE `casos` (
  `id` int(11) NOT NULL,
  `id_user_reg` int(11) NOT NULL,
  `fecha_reg` datetime NOT NULL DEFAULT current_timestamp(),
  `nombre_caso` varchar(250) NOT NULL,
  `descripcion_caso` text NOT NULL,
  `numero_programa` varchar(100) NOT NULL,
  `nombre_usuario` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `casos`
--

INSERT INTO `casos` (`id`, `id_user_reg`, `fecha_reg`, `nombre_caso`, `descripcion_caso`, `numero_programa`, `nombre_usuario`) VALUES
(1, 1, '2023-03-19 21:38:00', 'prueba caso', 'prueba', '123456789jsbcjabsc', 'como asi ccoco'),
(2, 1, '2023-03-19 22:23:07', 'prueba caso', 'awdawdaw', '123456789jsbcjabsc', 'awdawdawd'),
(3, 1, '2023-03-19 22:41:12', 'otra prueba', 'otra pruebaotra pruebaotra pruebaotra prueba', 'otra prueba', 'otra pruebaotra prueba');

-- --------------------------------------------------------

--
-- Table structure for table `reglas`
--

CREATE TABLE `reglas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reglas`
--

INSERT INTO `reglas` (`id`, `nombre`, `descripcion`, `id_user`, `fecha`) VALUES
(1, 'regla n1', 'como asiiiiiiii ???', 1, '2023-03-19 23:12:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `pass` varchar(250) NOT NULL,
  `tipo_user` int(1) NOT NULL,
  `fecha_reg` datetime NOT NULL DEFAULT current_timestamp(),
  `stat` int(1) NOT NULL,
  `email` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `nombre`, `apellido`, `pass`, `tipo_user`, `fecha_reg`, `stat`, `email`) VALUES
(1, 'pdarrieta', 'Pedro', 'Arrieta', '123456', 1, '2023-03-17 03:15:42', 1, 'pdarrieta@indracompany.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adjuntos_casos`
--
ALTER TABLE `adjuntos_casos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `casos`
--
ALTER TABLE `casos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reglas`
--
ALTER TABLE `reglas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adjuntos_casos`
--
ALTER TABLE `adjuntos_casos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `casos`
--
ALTER TABLE `casos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reglas`
--
ALTER TABLE `reglas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

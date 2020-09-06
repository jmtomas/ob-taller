-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 19, 2020 at 07:54 AM
-- Server version: 5.5.43
-- PHP Version: 5.4.4-14+deb7u5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `obligatorio`
--
CREATE DATABASE `obligatorio` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `obligatorio`;

-- --------------------------------------------------------

--
-- Table structure for table `instructores`
--

CREATE TABLE IF NOT EXISTS `instructores` (
  `instructor_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `ci` varchar(255) NOT NULL,
  `vencimiento` date NOT NULL,
  PRIMARY KEY (`instructor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `instructores`
--

INSERT INTO `instructores` (`instructor_id`, `nombre`, `apellido`, `fecha_nacimiento`, `ci`, `vencimiento`) VALUES
(1, 'Urist', 'McDriver', '1992-05-04', '7.385.283-2', '2022-10-26');

-- --------------------------------------------------------

--
-- Table structure for table `libretas`
--

CREATE TABLE IF NOT EXISTS `libretas` (
  `libreta_id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `usuario_id` int(11) NOT NULL,
  PRIMARY KEY (`libreta_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `libretas`
--

INSERT INTO `libretas` (`libreta_id`, `fecha`, `usuario_id`) VALUES
(1, '2020-08-19', 2);

-- --------------------------------------------------------

--
-- Table structure for table `reservas`
--

CREATE TABLE IF NOT EXISTS `reservas` (
  `reserva_id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `hora` int(11) NOT NULL,
  `instructor_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  PRIMARY KEY (`reserva_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `reservas`
--

INSERT INTO `reservas` (`reserva_id`, `fecha`, `hora`, `instructor_id`, `usuario_id`) VALUES
(1, '2020-08-18', 7, 1, 2),
(2, '2020-08-18', 8, 1, 2),
(3, '2020-08-18', 9, 1, 2),
(4, '2020-08-18', 10, 1, 2),
(5, '2020-08-18', 11, 1, 2),
(6, '2020-08-18', 12, 1, 2),
(7, '2020-08-18', 13, 1, 2),
(8, '2020-08-18', 14, 1, 2),
(9, '2020-08-18', 15, 1, 2),
(10, '2020-08-18', 16, 1, 2),
(11, '2020-08-18', 17, 1, 2),
(12, '2020-08-18', 18, 1, 2),
(13, '2020-08-18', 19, 1, 2),
(14, '2020-08-18', 20, 1, 2),
(15, '2020-08-18', 21, 1, 2),
(16, '2020-08-19', 7, 1, 3),
(17, '2020-08-20', 7, 1, 3),
(18, '2020-08-20', 8, 1, 3),
(19, '2020-08-20', 9, 1, 3),
(20, '2020-08-20', 10, 1, 3),
(21, '2020-08-20', 11, 1, 3),
(22, '2020-08-20', 12, 1, 3),
(23, '2020-08-20', 13, 1, 3),
(24, '2020-08-20', 14, 1, 3),
(25, '2020-08-20', 15, 1, 3),
(26, '2020-08-20', 16, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `usuario_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `ci` varchar(255) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `usuario_tipo_id` int(11) NOT NULL,
  PRIMARY KEY (`usuario_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`usuario_id`, `email`, `password`, `nombre`, `apellido`, `ci`, `fecha_nacimiento`, `direccion`, `usuario_tipo_id`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '', '', '', '1990-01-01', '', 1),
(2, 'bwayne@yahoo.com', '3003051f6d158f6687b8a820c46bfa80', 'Bruce', 'Wayne', '1.742.369-4', '1939-03-30', 'Gotham City', 3),
(3, 'tstark@hotmail.com', 'b3f952d5d9adea6f63bee9d4c6fceeaa', 'Anthony', 'Stark', '5.279.379-1', '1963-03-12', 'Long Island', 3),
(4, 'obi1@gmail.com', '054d44d7d2041c4dffd15dec060e0ef7', 'Obi-Wan', 'Kenobi', '6.379.256-8', '1971-03-31', 'Far away', 2);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios_tipos`
--

CREATE TABLE IF NOT EXISTS `usuarios_tipos` (
  `usuario_tipo_id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) NOT NULL,
  PRIMARY KEY (`usuario_tipo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `usuarios_tipos`
--

INSERT INTO `usuarios_tipos` (`usuario_tipo_id`, `descripcion`) VALUES
(1, 'Administrador'),
(2, 'Usuario'),
(3, 'Cliente');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

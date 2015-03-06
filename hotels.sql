-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 06-03-2015 a las 08:05:13
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `hotels`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`user_id` tinyint(1) unsigned NOT NULL,
  `uname` tinytext NOT NULL,
  `email` tinytext NOT NULL,
  `user_level` tinyint(2) unsigned DEFAULT NULL,
  `psword` varchar(60) NOT NULL,
  `fname` varchar(60) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`user_id`, `uname`, `email`, `user_level`, `psword`, `fname`) VALUES
(1, 'handyman', 'jackandjill@outlook.com', 51, '', ''),
(2, 'Ilse', 'ilse.alejo@gmail.com', 1, '12345678', 'Alejo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `houses`
--

CREATE TABLE IF NOT EXISTS `houses` (
`ref_num` mediumint(6) unsigned NOT NULL,
  `price` decimal(9,2) NOT NULL,
  `type` tinytext NOT NULL,
  `mini_descr` varchar(100) NOT NULL,
  `n_room` tinyint(2) NOT NULL,
  `thumb` varchar(45) NOT NULL,
  `status` tinytext NOT NULL,
  `full_spec` varchar(60) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1034 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `houses`
--

INSERT INTO `houses` (`ref_num`, `price`, `type`, `mini_descr`, `n_room`, `thumb`, `status`, `full_spec`) VALUES
(1000, '1000.00', 'Vista al Centro', 'Televisión, frigobar, vista al centro.', 3, 'images/house01-191.gif', 'Sold', '<a href=#''>Details</a>'),
(1001, '500.00', 'Vista al Centro', 'Televisión, vista al centro.', 3, 'images/house01-191.gif', 'Available', '<a href=#''>Details</a>'),
(1002, '1500.00', 'Sin Vista al Centro', 'Televisión, frigobar, cama matrimonial', 3, 'images/house01-191.gif', 'Available', '<a href=#''>Details</a>'),
(1003, '500.00', 'Sin Vista al Centro', 'Televisión, cama individual', 4, 'images/house10-151.gif', 'Available', '<a href=''descriptions/spec_1003.php''>Details</a>'),
(1004, '3000.00', 'Vista al Centro', 'Televisión, cama matrimonial, desayuno', 4, 'images/house10-151.gif', 'Available', '<a href=#''>Details</a>');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`user_id`);

--
-- Indices de la tabla `houses`
--
ALTER TABLE `houses`
 ADD PRIMARY KEY (`ref_num`), ADD KEY `n_room` (`n_room`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
MODIFY `user_id` tinyint(1) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `houses`
--
ALTER TABLE `houses`
MODIFY `ref_num` mediumint(6) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1034;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

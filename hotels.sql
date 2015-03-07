-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-03-2015 a las 13:17:53
-- Versión del servidor: 5.6.20
-- Versión de PHP: 5.5.15

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`user_id`, `uname`, `email`, `user_level`, `psword`, `fname`) VALUES
(1, 'handyman', 'jackandjill@outlook.com', 1, '1234', ''),
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1012 ;

--
-- Volcado de datos para la tabla `houses`
--

INSERT INTO `houses` (`ref_num`, `price`, `type`, `mini_descr`, `n_room`, `thumb`, `status`, `full_spec`) VALUES
(1000, '1000.00', 'Vista al Centro', 'Televisión, frigobar, vista al centro.', 3, 'images/house01-191.gif', 'Available', '<a href=#''>Details</a>'),
(1001, '500.00', 'Vista al Centro', 'Televisión, vista al centro.', 3, 'images/house01-191.gif', 'Available', '<a href=#''>Details</a>'),
(1002, '1500.00', 'Sin Vista al Centro', 'Televisión, frigobar, cama matrimonial', 3, 'images/house01-191.gif', 'Available', '<a href=#''>Details</a>'),
(1003, '500.00', 'Sin Vista al Centro', 'Televisión, cama individual', 4, 'images/house10-151.gif', 'Available', '<a href=''descriptions/spec_1003.php''>Details</a>'),
(1004, '3000.00', 'Vista al Centro', 'Televisión, cama matrimonial, desayuno', 4, 'images/house10-151.gif', 'Available', '<a href=#''>Details</a>'),
(1010, '100.00', 'Vista al Centro', 'Televisión, frigobar, vista al centro.', 0, 'images/house10-151.gif', 'Available', ''),
(1011, '200.00', 'Vista al Centro', 'Televisión, frigobar, vista al centro.', 5, 'images/house10-151.gif', 'Available', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roomdetail`
--

CREATE TABLE IF NOT EXISTS `roomdetail` (
`id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `checkin_date` date NOT NULL,
  `checkout_date` date NOT NULL,
  `room_type` varchar(50) NOT NULL,
  `no_of_room` varchar(50) NOT NULL,
  `amount` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

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
-- Indices de la tabla `roomdetail`
--
ALTER TABLE `roomdetail`
 ADD PRIMARY KEY (`id`);

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
MODIFY `ref_num` mediumint(6) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1012;
--
-- AUTO_INCREMENT de la tabla `roomdetail`
--
ALTER TABLE `roomdetail`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

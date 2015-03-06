-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-03-2015 a las 01:07:57
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `hotel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservaciones`
--
-- Creación: 05-03-2015 a las 07:33:21
--

CREATE TABLE IF NOT EXISTS `reservaciones` (
  `id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `comments` varchar(1000) COLLATE latin2_bin DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `fk_rooms` (`room_id`),
  UNIQUE KEY `fk_users` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin2 COLLATE=latin2_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rooms`
--
-- Creación: 05-03-2015 a las 07:24:10
--

CREATE TABLE IF NOT EXISTS `rooms` (
  `id` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin2 COLLATE=latin2_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--
-- Creación: 05-03-2015 a las 06:49:12
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` mediumint(6) unsigned NOT NULL AUTO_INCREMENT,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `psword` char(40) NOT NULL,
  `registration_date` datetime NOT NULL,
  `user_level` tinyint(1) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `fname`, `lname`, `email`, `psword`, `registration_date`, `user_level`) VALUES
(1, 'Ilse', 'Alejo', 'ilse.alejo@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', '2015-03-04 23:56:02', 1),
(2, 'Ilse 2', 'Aleo', 'ilse2@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', '2015-03-05 00:24:53', 0),
(3, 'Ilse 3', 'Alejo', 'ilse3@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', '2015-03-05 00:25:48', 0),
(4, 'ilse4', 'alejo', 'ilse4@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', '2015-03-05 00:26:24', 0);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reservaciones`
--
ALTER TABLE `reservaciones`
  ADD CONSTRAINT `reservaciones_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

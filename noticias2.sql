-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 08-07-2022 a las 21:51:49
-- Versión del servidor: 5.7.36
-- Versión de PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tutoriales`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias2`
--

DROP TABLE IF EXISTS `noticias2`;
CREATE TABLE IF NOT EXISTS `noticias2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `cuerpo` varchar(500) NOT NULL,
  `autor` varchar(255) NOT NULL,
  `rol` int(11) NOT NULL,
  `imagen` varchar(500) NOT NULL,
  `imagen_publicacion` varchar(500) NOT NULL,
  `likes` int(11) NOT NULL,
  `fecha` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=73 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `noticias2`
--

INSERT INTO `noticias2` (`id`, `titulo`, `cuerpo`, `autor`, `rol`, `imagen`, `imagen_publicacion`, `likes`, `fecha`) VALUES
(69, 'hola soy la noticia 1', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eum temporibus magnam molestiae tenetur quam. Repellat minus possimus molestiae ducimus suscipit vel, recusandae, dicta porro eveniet cupiditate beatae nihil quam voluptatem tempore excepturi ipsam perferendis deleniti assumenda itaque enim laudantium sit magni ipsum commodi? Nobis sint eum, quod voluptatum placeat non.', 'leo-aramayo', 1, '1656789718_gamer-skull-minimal-4k-hx.jpg', '1656813674_295445-Sepik.jpg', 0, '07-02-2022 11:01:14 pm'),
(70, 'hola soy la noticia 2', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eum temporibus magnam molestiae tenetur quam. Repellat minus possimus molestiae ducimus suscipit vel, recusandae, dicta porro eveniet cupiditate beatae nihil quam voluptatem tempore excepturi ipsam perferendis deleniti assumenda itaque enim laudantium sit magni ipsum commodi? Nobis sint eum, quod voluptatum placeat non.', 'kevin-serrano', 1, 'imagen4.jpg', '1656813703_137313.jpg', 0, '07-02-2022 11:01:43 pm'),
(71, 'hola soy la noticia 4', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eum temporibus magnam molestiae tenetur quam. Repellat minus possimus molestiae ducimus suscipit vel, recusandae, dicta porro eveniet cupiditate beatae nihil quam voluptatem tempore excepturi ipsam perferendis deleniti assumenda itaque enim laudantium sit magni ipsum commodi? Nobis sint eum, quod voluptatum placeat non.', 'jose300', 0, '1656790557_137313.jpg', '1656813775_descarga.jpg', 0, '07-02-2022 11:02:55 pm');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

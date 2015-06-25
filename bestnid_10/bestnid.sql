-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-06-2015 a las 03:56:15
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bestnid`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `nombre` varchar(31) NOT NULL,
  `valida` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`nombre`, `valida`) VALUES
('Calzado', 1),
('Computadoras', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE IF NOT EXISTS `comentario` (
`idComentario` int(11) NOT NULL,
  `texto` text NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idSubasta` int(11) NOT NULL,
  `valida` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE IF NOT EXISTS `imagen` (
`idImagen` int(11) NOT NULL,
  `idSubasta` int(11) NOT NULL,
  `valida` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `imagen`
--

INSERT INTO `imagen` (`idImagen`, `idSubasta`, `valida`) VALUES
(1, 1, 0),
(2, 1, 0),
(3, 2, 0),
(4, 2, 0),
(5, 3, 0),
(6, 4, 0),
(7, 6, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oferta`
--

CREATE TABLE IF NOT EXISTS `oferta` (
`idOferta` int(11) NOT NULL,
  `idSubasta` int(11) NOT NULL,
  `necesidad` text NOT NULL,
  `monto` float NOT NULL,
  `fechaVentaConcretada` date NOT NULL,
  `fechaOferta` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `valida` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subasta`
--

CREATE TABLE IF NOT EXISTS `subasta` (
`idSubasta` int(11) NOT NULL,
  `fechaPublicacion` date NOT NULL,
  `fechaVencimiento` date NOT NULL,
  `titulo` varchar(127) NOT NULL,
  `descripcion` text NOT NULL,
  `valida` tinyint(1) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `categoria` varchar(31) NOT NULL,
  `idImagenPrincipal` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `subasta`
--

INSERT INTO `subasta` (`idSubasta`, `fechaPublicacion`, `fechaVencimiento`, `titulo`, `descripcion`, `valida`, `idUsuario`, `categoria`, `idImagenPrincipal`) VALUES
(1, '2015-05-25', '2015-06-26', 'Placa de video EVGA GTX970 4GB SC ACX 2.0', 'Placa de video de ultima generacion.', 1, 1, 'Computadoras', 1),
(2, '2015-05-25', '2015-09-17', 'Memorias DDR3 Kingston 16gb 1600Mhz CL10 HyperX Beast DC kit.', 'Kit dual channel de memorias Kingston HyperX Beast 16GB (8x2) 1600Mhz CL10', 1, 1, 'Computadoras', 3),
(3, '2015-05-26', '2015-08-26', 'Microprocesador Intel Core i5 4570', 'Intel Core i5 3.2Ghz (3.6 turbo boost) 6mb cache.', 1, 1, 'Computadoras', 5),
(4, '2015-05-23', '2015-09-16', 'Zapatillas vans negras nro 43', 'Vans negras nro 43', 1, 1, 'Calzado', 6),
(5, '2014-12-09', '2015-05-12', 'Teclado Thermaltake Challenger Ultimate', 'Teclado iluminado, 16 millones de colores, con ventilacion para manos, 5 teclas simultaneas, memoria 64k, placa de sonido integrada, 2 usbs, teclas intercambiables, 6 configuraciones.', 1, 1, 'Computadoras', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`idUsuario` int(11) NOT NULL,
  `email` varchar(31) NOT NULL,
  `nombre` varchar(31) NOT NULL,
  `apellido` varchar(31) NOT NULL,
  `telFijo` varchar(20) DEFAULT NULL,
  `telMovil` varchar(20) DEFAULT NULL,
  `contrasenia` varchar(255) NOT NULL,
  `tipoDeUsuario` enum('administrador','usuario') NOT NULL,
  `estado` enum('activo','inactivo') NOT NULL,
  `valida` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `email`, `nombre`, `apellido`, `telFijo`, `telMovil`, `contrasenia`, `tipoDeUsuario`, `estado`, `valida`) VALUES
(1, 'ramonperez@hotmail.com', 'Ramon', 'Perez', '2147473647', '2147484647', 'passReDificil', 'usuario', 'activo', 0),
(2, 'elsapato@gmail.com', 'Elsa', 'Pato', '2147483847', '2147482647', 'passMuyDificil', 'usuario', 'activo', 0),
(3, 'asd@asd', 'asd', 'asd', '123', '123', '123123123', 'usuario', 'activo', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
 ADD PRIMARY KEY (`nombre`);

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
 ADD PRIMARY KEY (`idComentario`);

--
-- Indices de la tabla `imagen`
--
ALTER TABLE `imagen`
 ADD PRIMARY KEY (`idImagen`);

--
-- Indices de la tabla `oferta`
--
ALTER TABLE `oferta`
 ADD PRIMARY KEY (`idOferta`);

--
-- Indices de la tabla `subasta`
--
ALTER TABLE `subasta`
 ADD PRIMARY KEY (`idSubasta`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
MODIFY `idComentario` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `imagen`
--
ALTER TABLE `imagen`
MODIFY `idImagen` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `oferta`
--
ALTER TABLE `oferta`
MODIFY `idOferta` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `subasta`
--
ALTER TABLE `subasta`
MODIFY `idSubasta` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 11-05-2013 a las 19:35:20
-- Versión del servidor: 5.5.16
-- Versión de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `proyecto_web`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
  `bannerId` int(11) NOT NULL AUTO_INCREMENT,
  `imagen_1` varchar(100) NOT NULL,
  `desc_1` varchar(100) NOT NULL,
  `imagen_2` varchar(100) NOT NULL,
  `desc_2` varchar(100) NOT NULL,
  `imagen_3` varchar(100) NOT NULL,
  `desc_3` varchar(100) NOT NULL,
  `imagen_4` varchar(100) NOT NULL,
  `desc_4` varchar(100) NOT NULL,
  PRIMARY KEY (`bannerId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `banner`
--

INSERT INTO `banner` (`bannerId`, `imagen_1`, `desc_1`, `imagen_2`, `desc_2`, `imagen_3`, `desc_3`, `imagen_4`, `desc_4`) VALUES
(1, 'img/banner/imagen_1.png', 'Anuncio 1', 'img/banner/imagen_2.png', 'LOL', 'img/banner/imagen_3.png', 'Imagen 3 Banner', 'img/banner/imagen_4.jpeg', 'PLOP');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `categoriaId` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) DEFAULT NULL,
  `cantidad` int(11) NOT NULL,
  `url_icono` varchar(200) DEFAULT NULL,
  `descripcion` varchar(1000) NOT NULL,
  PRIMARY KEY (`categoriaId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`categoriaId`, `nombre`, `cantidad`, `url_icono`, `descripcion`) VALUES
(1, 'Tablets', 0, 'img/categorias/tablet.png', ''),
(3, 'Laptops', 0, 'img/categorias/categoria3.png', ''),
(5, 'Pantallas', 0, 'img/categorias/none.png', ''),
(6, 'Ratones', 0, 'img/categorias/none.png', ''),
(8, 'Accesorios', 0, NULL, ''),
(9, 'Audífonos', 0, NULL, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE IF NOT EXISTS `pedido` (
  `pedidoId` int(11) NOT NULL AUTO_INCREMENT,
  `productoId` int(11) NOT NULL,
  `usuarioId` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`pedidoId`),
  KEY `productoId` (`productoId`,`usuarioId`),
  KEY `usuarioId` (`usuarioId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`pedidoId`, `productoId`, `usuarioId`, `cantidad`, `fecha`) VALUES
(1, 3, 1, 1, '2012-05-22'),
(2, 3, 1, 1, '2012-05-22'),
(3, 3, 1, 1, '2012-05-22'),
(4, 3, 1, 1, '2012-05-23'),
(5, 1, 1, 1, '2012-05-23'),
(6, 1, 1, 1, '2012-05-23'),
(7, 3, 1, 1, '2012-05-23'),
(8, 3, 1, 1, '2012-05-23'),
(9, 4, 1, 1, '2012-05-23'),
(10, 3, 1, 121, '2012-05-23'),
(11, 3, 1, 81, '2012-05-23'),
(12, 1, 1, 1, '2012-05-23'),
(13, 3, 1, 20, '2012-05-23'),
(14, 1, 1, 8, '2012-05-23'),
(15, 3, 1, 9, '2012-05-23'),
(16, 3, 1, 11, '2012-05-23'),
(17, 1, 1, 4, '2012-05-23'),
(18, 4, 1, 7, '2012-05-23'),
(19, 3, 1, 1, '2012-05-23'),
(20, 3, 1, 1000, '2012-05-23'),
(21, 3, 1, 100, '2012-05-23'),
(22, 1, 1, 16, '2012-05-23'),
(23, 1, 1, 604, '2012-05-23'),
(24, 1, 1, 1146, '2012-05-23'),
(25, 1, 1, 12, '2012-05-23'),
(26, 1, 8, 4, '2012-05-23'),
(27, 5, 8, 8, '2012-05-23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `postId` int(11) NOT NULL AUTO_INCREMENT,
  `usuarioId` int(11) NOT NULL,
  `articulo` varchar(1000) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `idTema` int(11) NOT NULL,
  PRIMARY KEY (`postId`),
  KEY `usuarioId` (`usuarioId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `post`
--

INSERT INTO `post` (`postId`, `usuarioId`, `articulo`, `fecha`, `idTema`) VALUES
(9, 1, '{Ã±l{Ã±l{Ã±', '2012-05-20', 0),
(10, 1, 'qÃ±lkdlÃ±k', '2012-05-21', 0),
(12, 1, '{Ã±l{Ã±l {Ã±l{Ã±l {Ã±l{Ã±l {Ã±l{Ã±Ã±l aslkjdddddd alskjdddddddd aslkjddddddddddddd lkajsdddddddddddddd qlskdjaaaaaa lkajsdddalskjdsa lkjasd Ã±{{llllllllllllllllllllllllllllllllllllllllllllllll dfllllllllllllllllllllllllllllllllllllllllllllllllllllll sd{{{{{{{{{{{{{{{{{{{{{{', '2012-05-22', 0),
(13, 8, 'Hola a todos :)', '2012-05-22', 0),
(14, 1, '\r\n', '2012-05-23', 0),
(15, 1, '{lfds{l{Ã±l', '2012-05-23', 0),
(16, 8, '-ksdss{Ã±k {Ã±l{dfl{Ã±fd {lfd{l {fdl{Ã±fd {l{Ã± {fdl{Ã±gfdl {lfdÃ±lgf d{l fdg{l  {Ã±lfdlfgd', '2012-05-23', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
  `productoId` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) DEFAULT NULL,
  `categoriaId` int(11) NOT NULL,
  `envio` decimal(9,2) NOT NULL,
  `costo` decimal(9,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `url_icono` varchar(200) DEFAULT NULL,
  `descripcion` varchar(1000) NOT NULL,
  PRIMARY KEY (`productoId`),
  KEY `categoriaId` (`categoriaId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`productoId`, `nombre`, `categoriaId`, `envio`, `costo`, `cantidad`, `url_icono`, `descripcion`) VALUES
(1, 'Mouse2', 3, 122.00, 122.00, 100, 'img/productos/producto1.jpeg', 'Quisque enim ligula, feugiat et consequat id, elementum a tellus. Mauris at feugiat arcu. Aliquam dolor neque, tincidunt ut pharetra et, egestas eu libero.'),
(3, 'Mouse1', 5, 12.01, 12.01, 100, 'img/productos/producto3.jpeg', 'Morbi sollicitudin fermentum tellus. Aliquam egestas volutpat ligula, in condimentum justo tincidunt a. Maecenas rhoncus semper blandit.'),
(4, 'Pantalla LCD 40'' HTC', 6, 20.00, 340.00, 100, 'img/productos/producto4.jpeg', 'Lorem ipsum dolor sit amet.'),
(5, 'Teclado Asus 9x', 3, 12.00, 12.00, 100, 'img/productos/producto5.jpeg', 'Pellentesque dignissim diam id nisl viverra placerat. In hac habitasse platea dictumst. Vestibulum non lacus nec justo volutpat pellentesque. '),
(6, 'nueva Compu', 3, 12.50, 12.50, 10, 'img/productos/producto6.jpeg', 'moninibusda adas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `repost`
--

CREATE TABLE IF NOT EXISTS `repost` (
  `repostId` int(11) NOT NULL AUTO_INCREMENT,
  `postID` int(11) NOT NULL,
  `usuarioId` int(11) NOT NULL,
  `articulo` varchar(1000) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`repostId`),
  KEY `usuarioId` (`usuarioId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Volcado de datos para la tabla `repost`
--

INSERT INTO `repost` (`repostId`, `postID`, `usuarioId`, `articulo`, `fecha`) VALUES
(1, 2, 1, 'EW{Ã‘LERW {LWE{LL{Ã‘L WE{Ã‘LEW {Ã‘LSC{ FSD', '2012-05-17'),
(8, 4, 1, 'sdfdfsdsf', '2012-05-20'),
(9, 4, 1, 'fggfgffg', '2012-05-20'),
(21, 1, 1, 'dsfds', '2012-05-20'),
(22, 1, 1, 'dsfds', '2012-05-20'),
(23, 1, 1, 'dsfds', '2012-05-20'),
(24, 3, 1, 'dssdsdsd', '2012-05-20'),
(25, 3, 1, 'asasasas', '2012-05-20'),
(26, 3, 1, 'dsdsdsds', '2012-05-20'),
(32, 7, 1, 'eipoi poiew piewopiewipowei ewweopwepoiowe opewipo ewpoiweop ewpoiew ew\r\n', '2012-05-20'),
(34, 8, 1, 'lskaÃ±dlk lÃ±kasd Ã±lksda Ã±lksda Ã±k sadÃ±lk sadÃ±lk asdÃ±lkasdÃ±lk Ã±lksad skkkkkk dkkkkkdk ', '2012-05-20'),
(35, 9, 1, 'Ã±lkdÃ±lkÃ±lksdÃ±lk', '2012-05-20'),
(37, 11, 1, '.,sakÃ±.msd.,mcd', '2012-05-21'),
(38, 10, 1, '-.,wsq-.d,-.sd,', '2012-05-21'),
(39, 10, 1, 'Ã±z<lksÃ±lksd', '2012-05-21'),
(40, 10, 1, 'edl{weÃ±l{Ã±lwe', '2012-05-21'),
(41, 10, 1, '3245454Â´0Â¿''50''Â¿0540Â¿''50Â¿''0Â¿''4', '2012-05-21'),
(43, 13, 8, '^^ ', '2012-05-22'),
(44, 10, 1, 'defÃ±kÃ±ldsfklkfd', '2012-05-22'),
(45, 13, 1, 'Ã±lkdfs{Ã±ldsfÃ±ldfs{l{Ã±sl{Ã±fsd', '2012-05-23'),
(46, 13, 1, '{Ã±ldasdl{sdl{Ã±sdl{', '2012-05-23'),
(47, 15, 1, 'Ã±l,Ã±llÃ±', '2012-05-23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temas`
--

CREATE TABLE IF NOT EXISTS `temas` (
  `idTema` int(11) NOT NULL AUTO_INCREMENT,
  `nombreTema` varchar(100) NOT NULL,
  PRIMARY KEY (`idTema`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `usuarioId` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(80) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `tipo` int(2) DEFAULT NULL,
  `apellido` varchar(20) DEFAULT NULL,
  `descripcion` varchar(1000) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `sexo` varchar(1) DEFAULT NULL,
  `url_foto` varchar(80) DEFAULT NULL,
  `contrasenia` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`usuarioId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuarioId`, `email`, `nombre`, `tipo`, `apellido`, `descripcion`, `edad`, `sexo`, `url_foto`, `contrasenia`) VALUES
(1, 'antonio_369_astry@hotmail.com', 'Ang', 1, 'Media', '{Ã±l{Ã±sdl {Ã±l{Ã±slad d}{Ã±}Ã± }{Ã±{Ã±lsadl{Ã±sdlsad l', 12, 'H', 'img/usuarios/usuario1.jpeg', '123123'),
(8, 'q@q.com', 'Angel Antonio', 0, 'Jack :B', 'llÃ±klÃ±kÃ±lk Ã±lkÃ±lk', 13, 'H', 'img/usuarios/usuario8.jpeg', '123'),
(9, 'huallito@hot.com', 'Huallo', 0, 'Fuente', NULL, NULL, NULL, 'img/usuarios/usuario.png', '123'),
(10, 'a@a.com', 'LOL', 1, 'lol', 'sahala ', 16, 'H', 'img/usuarios/usuario.png', '123'),
(12, 'angel_medina_moreno@hotmail.com', 'Ã±sdalkÃ   ±lkÃ‘LKÃ‘', 0, '{Ã‘L{Ã‘L{Ã‘L', NULL, NULL, NULL, 'img/usuarios/usuario.png', '123'),
(13, 'v.r@gmail.com', 'Russel', 0, 'Vela', '', 6, 'M', 'img/usuarios/usuario13.jpeg', '123456');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`productoId`) REFERENCES `producto` (`productoId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`usuarioId`) REFERENCES `usuarios` (`usuarioId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`usuarioId`) REFERENCES `usuarios` (`usuarioId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`categoriaId`) REFERENCES `categoria` (`categoriaId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `repost`
--
ALTER TABLE `repost`
  ADD CONSTRAINT `repost_ibfk_1` FOREIGN KEY (`usuarioId`) REFERENCES `usuarios` (`usuarioId`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

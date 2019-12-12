-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 12-12-2019 a las 19:23:24
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectoalonso`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `idcomentario` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `valoracion` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idproducto` int(11) NOT NULL,
  `Imagen` mediumtext CHARACTER SET utf8mb4 NOT NULL,
  `Titulo` varchar(30) CHARACTER SET utf8mb4 NOT NULL,
  `Descripcion` varchar(60) CHARACTER SET utf8mb4 NOT NULL,
  `Precio` double NOT NULL,
  `Categoria` int(11) DEFAULT NULL,
  `Stock` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idproducto`, `Imagen`, `Titulo`, `Descripcion`, `Precio`, `Categoria`, `Stock`) VALUES
(1, 'https://cdn.shopify.com/s/files/1/1640/7017/products/zapatos_nov_15.jpg?v=1575322046', 'Zapato de payaso', 'Zapato de payaso blanco con rojo', 650, 1, 3),
(2, 'https://www.abc.es/media/summum/2018/05/05/GeorgeCleverley1250-kcdD-U213133674154ZJI-350x350@abc.jpg', 'Zapato de vestir', 'Zapato con suela de goma y muy buena absorcion de impacto co', 850, 1, 3),
(3, 'https://resources.sears.com.mx/medios-plazavip/fotos/productos_sears1/original/2903745.jpg', 'Blusa rosa', 'Blusa rosa para dama', 400, 2, 2),
(4, 'https://images-na.ssl-images-amazon.com/images/I/61OkKGdngcL._UX679_.jpg', 'Blusa blanca 3/4', 'Blusa blanca para verano 3/4 marca class', 400, 2, 1),
(5, 'https://i.linio.com/p/daed2ed4562cf7ca33b82ae563babc82-product.jpg', 'Pantalon', 'Pantalon de mezclilla para caballero levis', 450, 3, 2),
(6, 'https://i.pinimg.com/236x/76/52/8a/76528a1cfa8fad3e854427a06f46f048.jpg', 'Pantalon mezclilla dama', 'Pantalon de mezclilla para dama levis', 500, 3, 3),
(7, 'https://resources.sears.com.mx/medios-plazavip/fotos/productos_sears1/original/2932684.jpg', 'Vestido coral', 'Vestido color coral, marca cklass', 800, 4, 1),
(8, 'https://asset4.zankyou.com/images/mag-card-t/753/6cd0/350/350/-/es/wp-content/uploads/2018/02/2t189-rosa-clara.jpg', 'Vestido negro con blanco', 'Vestido negro con blanco para dama', 1400, 4, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarjeta`
--

CREATE TABLE `tarjeta` (
  `idtarjeta` int(11) NOT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `Nombre` varchar(50) NOT NULL,
  `NumeroT` varchar(16) NOT NULL,
  `FechaV` varchar(4) NOT NULL,
  `CV` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `Nivel` varchar(45) CHARACTER SET utf8mb4 DEFAULT NULL,
  `Nombre` varchar(60) CHARACTER SET utf8mb4 NOT NULL,
  `Correo` varchar(30) CHARACTER SET utf8mb4 NOT NULL,
  `Contraseña` varchar(96) CHARACTER SET utf8mb4 NOT NULL,
  `Direccion` varchar(40) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `Nivel`, `Nombre`, `Correo`, `Contraseña`, `Direccion`) VALUES
(5, '3', 'usr', 'alexis@gmail.com', '123', '123'),
(9, '2', 'pepe pedro', 'pepe@gmail.com', '123', 'por hay');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `idventas` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`idcomentario`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idproducto`);

--
-- Indices de la tabla `tarjeta`
--
ALTER TABLE `tarjeta`
  ADD PRIMARY KEY (`idtarjeta`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`idventas`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `idcomentario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idproducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tarjeta`
--
ALTER TABLE `tarjeta`
  MODIFY `idtarjeta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `idventas` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

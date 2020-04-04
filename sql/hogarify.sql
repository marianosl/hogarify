-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-04-2019 a las 06:00:35
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hogarify`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `descripcion` varchar(45) CHARACTER SET utf8 NOT NULL,
  `fecha_baja` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `descripcion`, `fecha_baja`) VALUES
(1, 'Muebles', NULL),
(2, 'Dormitorio', NULL),
(3, 'Cocina', NULL),
(4, 'Comedor', NULL),
(5, 'Baño', NULL),
(6, 'Decoración', NULL),
(7, 'Iluminación', NULL),
(8, 'Exteriores', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `nro_compra` int(11) NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `total` float NOT NULL,
  `email` varchar(45) CHARACTER SET utf8 NOT NULL,
  `nro_tarjeta` varchar(16) CHARACTER SET utf8 NOT NULL,
  `cod_seguridad` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`nro_compra`, `fecha_hora`, `total`, `email`, `nro_tarjeta`, `cod_seguridad`) VALUES
(1, '2019-04-08 20:00:15', 3000, 'usuario@usuario.com', '123456', 777),
(2, '2019-04-08 20:02:19', 6000, 'admin@admin.com', '1212121212', 12),
(3, '2019-04-24 23:32:25', 220, 'usuario@usuario.com', '12344321', 1111);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `descripcion` varchar(45) CHARACTER SET utf8 NOT NULL,
  `precio` float DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `cantidad_vendida` int(11) DEFAULT NULL,
  `especificacion` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `id_categoria` int(11) NOT NULL,
  `imagen` varchar(100) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `descripcion`, `precio`, `stock`, `cantidad_vendida`, `especificacion`, `id_categoria`, `imagen`) VALUES
(1, 'Silla Style', 2000, 15, 15, 'Silla de estilo para interiores.', 1, 'img/productos/1.jpg'),
(2, 'Almohada viscolástica', 200, 50, 70, 'Almohada que mejora la circulación y la postura al dormir.', 2, 'img/productos/2.jpg'),
(3, 'Juego de cocina Silver', 1500, 20, 8, 'Juego de cocina 3 piezas.', 3, 'img/productos/3.jpg'),
(4, 'Set 4 Reposeras Sillas + Mesa + Sombrilla', 6000, 7, 5, 'Set resistente al agua - Color negro.', 8, 'img/productos/4.jpg'),
(5, 'Silla Oficina Executive', 4000, 25, 5, 'La más cómoda del mercado. Inigualable.', 1, 'img/productos/5.jpg'),
(6, 'Gazebo White', 2500, 10, 0, 'Gazebo blanco grande.', 8, 'img/productos/6.jpg'),
(7, 'Set matero', 1000, 30, 5, '4 piezas.', 4, 'img/productos/7.jpg'),
(8, 'Cama BlueDreams', 20000, 4, 1, 'Dulces sueños asegurados.', 2, 'img/productos/8.jpg'),
(9, 'Cama Flowers', 25000, 5, 0, 'La cama más cómoda del mundo.', 2, 'img/productos/9.jpg'),
(10, 'Mueble zapatero', 900, 20, 10, 'Guarda hasta 20 pares de zapatos en un sólo lugar.', 1, 'img/productos/10.jpg'),
(11, 'Mueble para TV', 1100, 25, 15, 'Amplio y moderno.', 1, 'img/productos/11.jpg'),
(12, 'Juego de cubiertos', 600, 240, 310, '12 cubiertos de plata.', 4, 'img/productos/12.jpg'),
(13, 'Plato playo grande', 70, 550, 150, 'Playo estilo Buzios', 4, 'img/productos/13.jpg'),
(14, 'Vasos de colores', 55, 1200, 300, 'Multicolor. Irrompibles.', 4, 'img/productos/14.jpg'),
(15, 'Toallón colores varios', 130, 400, 100, 'Colores varios. Ideal para el verano.', 5, 'img/productos/15.jpg'),
(16, 'Ducha para baño', 770, 10, 5, 'Exelente presión de agua. Como si estuviera lloviendo!.', 5, 'img/productos/16.jpg'),
(17, 'Faroles decorativos', 300, 30, 12, 'Figuras de faroles ideales para decorar tu hogar.', 6, 'img/productos/17.jpg'),
(18, 'Lámparas led', 110, 100, 100, 'Lámparas led luz fría. Bajo consumo, no gastan nada!.', 7, 'img/productos/18.jpg'),
(19, 'Lámpara led inteligente', 220, 149, 16, 'Lámpara led inteligente. Manejala con tu celular!.', 7, 'img/productos/19.jpg'),
(20, 'Parrilla portátil', 2800, 11, 9, 'Parrilla portátil ideal para espacios abiertos y quinchos.', 8, 'img/productos/20.jpg'),
(21, 'Manguera para jardín', 320, 90, 10, 'Apta para todo tipo de canillas gracias a sus diferentes picos multiuso. 50 mts de largo.', 8, 'img/productos/21.jpg'),
(22, 'Sombrilla beige', 1700, 27, 3, 'Disfrutá del sol con esta hermosa sombrilla color beige.', 8, 'img/productos/22.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_cantidad_compra`
--

CREATE TABLE `productos_cantidad_compra` (
  `cantidad` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `nro_compra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos_cantidad_compra`
--

INSERT INTO `productos_cantidad_compra` (`cantidad`, `id_producto`, `nro_compra`) VALUES
(1, 9, 1),
(2, 9, 2),
(1, 19, 3);

--
-- Disparadores `productos_cantidad_compra`
--
DELIMITER $$
CREATE TRIGGER `actualizar_stock_cantvend` AFTER INSERT ON `productos_cantidad_compra` FOR EACH ROW BEGIN
    DECLARE id_existe Boolean;
    
    SELECT 1
    INTO @id_existe
    FROM productos
    WHERE productos.id_producto = NEW.id_producto;
    
    IF @id_existe = 1
    THEN
       UPDATE productos	
       SET stock = stock - NEW.cantidad,
       cantidad_vendida = cantidad_vendida + NEW.cantidad
       WHERE id_producto = NEW.id_producto;
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `actualizar_stock_cantvend_delete` AFTER DELETE ON `productos_cantidad_compra` FOR EACH ROW BEGIN

    DECLARE id_existe Boolean;
    
    SELECT 1
    INTO @id_existe
    FROM productos
    WHERE productos.id_producto = OLD.id_producto;
    
    IF @id_existe = 1
    THEN
       UPDATE productos	
       SET stock = stock + OLD.cantidad,
       cantidad_vendida = cantidad_vendida - OLD.cantidad
       WHERE id_producto = OLD.id_producto;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `email` varchar(45) CHARACTER SET utf8 NOT NULL,
  `nombre` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `apellido` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `password` varchar(45) CHARACTER SET utf8 NOT NULL,
  `direccion` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `dni` int(11) DEFAULT NULL,
  `rol` int(11) NOT NULL,
  `fecha_baja` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`email`, `nombre`, `apellido`, `password`, `direccion`, `dni`, `rol`, `fecha_baja`) VALUES
('admin@admin.com', 'admin', 'admin', 'admin', 'direccion admin', 123456789, 0, NULL),
('usuario@usuario.com', 'usuario', 'usuario', 'usuario', 'direccion usuario', 123, 1, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`nro_compra`),
  ADD KEY `email_idx` (`email`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_cat_idx` (`id_categoria`);

--
-- Indices de la tabla `productos_cantidad_compra`
--
ALTER TABLE `productos_cantidad_compra`
  ADD PRIMARY KEY (`id_producto`,`nro_compra`),
  ADD KEY `nro_compra_idx` (`nro_compra`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `nro_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `email` FOREIGN KEY (`email`) REFERENCES `usuarios` (`email`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `id_cat` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `productos_cantidad_compra`
--
ALTER TABLE `productos_cantidad_compra`
  ADD CONSTRAINT `id_producto` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `nro_compra` FOREIGN KEY (`nro_compra`) REFERENCES `compras` (`nro_compra`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

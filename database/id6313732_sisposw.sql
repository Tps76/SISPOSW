-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-09-2018 a las 02:00:21
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id6313732_sispow`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aprobacion`
--

CREATE TABLE `aprobacion` (
  `idaprobacion` int(11) NOT NULL,
  `fk_trab` int(11) NOT NULL,
  `nombrecampo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ValorCampo` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `Estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_producto`
--

CREATE TABLE `categoria_producto` (
  `idcatproducto` int(11) NOT NULL,
  `nombre_categoria` varchar(50) NOT NULL,
  `estado_categoria` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria_producto`
--

INSERT INTO `categoria_producto` (`idcatproducto`, `nombre_categoria`, `estado_categoria`) VALUES
(1, 'Calzado', 1),
(2, 'Ropa', 1),
(3, 'Tecnología', 1),
(4, 'Joyeria', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_usuario`
--

CREATE TABLE `categoria_usuario` (
  `idcatusuario` int(11) NOT NULL,
  `idpermisos` int(11) NOT NULL,
  `nombre_catusuario` varchar(50) NOT NULL,
  `fecha_creacion` date NOT NULL,
  `estado_catusuario` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria_usuario`
--

INSERT INTO `categoria_usuario` (`idcatusuario`, `idpermisos`, `nombre_catusuario`, `fecha_creacion`, `estado_catusuario`) VALUES
(1, 1, 'admin', '2018-09-15', 1),
(2, 2, 'special', '2018-09-15', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `idciudad` int(11) NOT NULL,
  `iddepartamento` int(11) NOT NULL,
  `nombre_ciudad` varchar(50) NOT NULL,
  `estado_ciudad` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`idciudad`, `iddepartamento`, `nombre_ciudad`, `estado_ciudad`) VALUES
(1, 1, 'Medellin', 1),
(2, 1, 'Santa Fe de Antioquia', 1),
(3, 1, 'Envigado', 1),
(4, 2, 'Barranquilla', 1),
(5, 2, 'Soledad', 1),
(6, 2, 'Puerto Colombia', 1),
(7, 3, 'Bogota D.C.', 1),
(8, 3, 'Chapinero', 1),
(9, 3, 'Santa Fe', 1),
(10, 8, 'Cartagena', 1),
(11, 8, 'Magangue', 1),
(12, 8, 'Turbaco', 1),
(13, 9, 'Tunja', 1),
(14, 9, 'Sogamoso', 1),
(15, 9, 'Duitama', 1),
(16, 10, 'Manizales', 1),
(17, 10, 'La Dorada', 1),
(18, 10, 'Chinchina', 1),
(19, 11, 'Florencia', 1),
(20, 11, 'San Vicente del Caguan', 1),
(21, 11, 'Belen de los Andaquies', 1),
(22, 13, 'Valledupar', 1),
(23, 13, 'El Paso', 1),
(24, 13, 'El Copey', 1),
(28, 15, 'Soacha', 1),
(29, 15, 'Zipaquira', 1),
(30, 15, 'Facatativa', 1),
(31, 16, 'Quibdo', 1),
(32, 16, 'Bahia Solano', 1),
(33, 16, 'Nuqui', 1),
(34, 17, 'Neiva', 1),
(35, 17, 'Pitalito', 1),
(36, 17, 'Garzon', 1),
(37, 14, 'Cordoba', 1),
(38, 14, 'Villa Carlos Paz', 1),
(39, 14, 'Alta Gracia', 1),
(40, 18, 'Riohacha', 1),
(41, 18, 'Maicao', 1),
(42, 18, 'Uribia', 1),
(43, 20, 'Santa Marta', 1),
(44, 20, 'Cienaga', 1),
(45, 20, 'Aracataca', 1),
(46, 21, 'Villavicencio', 1),
(47, 21, 'Acacias', 1),
(48, 21, 'Puerto Gaitan', 1),
(81, 4, 'Pasto', 1),
(82, 4, 'tumaco', 1),
(83, 4, 'Nariño', 1),
(84, 5, 'Cúcuta', 1),
(85, 5, 'Bucaramanga', 1),
(86, 5, 'El Carmen', 1),
(87, 6, 'Armenia', 1),
(88, 6, 'Córdoba', 1),
(89, 6, 'Calarcá', 1),
(90, 22, 'Pereira', 1),
(91, 22, 'Dosquebradas', 1),
(92, 22, 'Quinchía', 1),
(93, 23, 'Barrancabermeja', 1),
(94, 23, 'San Gil', 1),
(95, 23, 'El Socorro', 1),
(96, 24, 'Sincelejo', 1),
(97, 24, 'San Marcos', 1),
(98, 24, 'Tolú', 1),
(99, 25, 'Ibagué', 1),
(100, 25, 'Mariquita', 1),
(101, 25, 'Saldaña', 1),
(102, 26, 'Cali', 1),
(103, 26, 'Buga', 1),
(104, 26, 'Buenaventura', 1),
(105, 27, 'Arauca', 1),
(106, 27, 'Tame', 1),
(107, 27, 'Saravena', 1),
(108, 28, 'Yopal', 1),
(109, 28, 'Aguazul', 1),
(110, 28, 'Villanueva', 1),
(111, 29, 'Mocoa', 1),
(112, 29, 'Puerto Asís', 1),
(113, 29, 'Villagarzón', 1),
(114, 30, 'San Andres', 1),
(115, 31, 'Leticia', 1),
(116, 31, 'Puerto Nariño', 1),
(117, 31, 'Puerto Santander', 1),
(118, 32, 'San Felipe', 1),
(120, 32, 'inírida', 1),
(121, 32, 'Cacahual', 1),
(122, 33, 'Miraflores', 1),
(123, 33, 'Calamar', 1),
(124, 33, 'El Retorno', 1),
(125, 34, 'Mitú', 1),
(126, 34, 'Carurú', 1),
(127, 34, 'Pacoa', 1),
(128, 35, 'Puerto Carreño', 1),
(129, 35, 'Cumarimbo', 1),
(130, 25, 'Santa Rosalía', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idcliente` int(11) NOT NULL,
  `idpersona` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `estado_cliente` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idcliente`, `idpersona`, `idusuario`, `estado_cliente`) VALUES
(1, 1, 2, 1),
(2, 4, 5, 1),
(3, 5, 6, 1),
(4, 3, 7, 1);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `clientev`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `clientev` (
`idcliente` int(11)
,`numero_identidad` int(11)
,`idpersona` int(11)
,`nombre_persona` varchar(100)
,`apellido_persona` varchar(100)
,`genero` char(1)
,`fecha_nacimiento` date
,`direccion` varchar(50)
,`nombre_ciudad` varchar(50)
,`telefono` varchar(10)
,`estado` tinyint(1)
,`email_usuario` varchar(50)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `iddepartamento` int(11) NOT NULL,
  `idpais` int(11) NOT NULL,
  `nombre_departamento` varchar(50) NOT NULL,
  `estado_departamento` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`iddepartamento`, `idpais`, `nombre_departamento`, `estado_departamento`) VALUES
(1, 1, 'Antioquia', 1),
(2, 1, 'Atlantico', 1),
(3, 1, 'Bogota', 1),
(4, 1, 'Nariño', 1),
(5, 1, 'Norte de Santander', 1),
(6, 1, 'Quindio', 1),
(8, 1, 'Bolivar', 1),
(9, 1, 'Boyaca', 1),
(10, 1, 'Caldas', 1),
(11, 1, 'Caqueta', 1),
(12, 1, 'Cauca', 1),
(13, 1, 'Cesar', 1),
(14, 1, 'Cordoba', 1),
(15, 1, 'Cundinamarca', 1),
(16, 1, 'Choco', 1),
(17, 1, 'Huila', 1),
(18, 1, 'La Guajira', 1),
(19, 1, 'Huila', 1),
(20, 1, 'Magdalena', 1),
(21, 1, 'Meta', 1),
(22, 1, 'Risaralda', 1),
(23, 1, 'Santander', 1),
(24, 1, 'Sucre ', 1),
(25, 1, 'Tolima', 1),
(26, 1, 'Valle del Cauca', 1),
(27, 1, 'Arauca', 1),
(28, 1, 'Casanare', 1),
(29, 1, 'Putumayo', 1),
(30, 1, 'San Andres', 1),
(31, 1, 'Amazonas', 1),
(32, 1, 'Guainia', 1),
(33, 1, 'Guaviare', 1),
(34, 1, 'Vaupes', 1),
(35, 1, 'Vichada', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedido`
--

CREATE TABLE `detalle_pedido` (
  `idpedido` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `cantidad_producto` int(11) NOT NULL,
  `precio_subtotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `id_fac` int(11) NOT NULL,
  `fk_trabaj` int(11) NOT NULL,
  `fk_tipoPago` int(11) NOT NULL,
  `fk_resFac` int(11) NOT NULL,
  `fk_cliente` int(11) NOT NULL,
  `fk_petProducto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `facturav`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `facturav` (
`id_fac` int(11)
,`fk_trabaj` int(11)
,`fk_tipoPago` int(11)
,`fk_resFac` int(11)
,`fk_cliente` int(11)
,`fk_petProducto` int(11)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `identidad`
--

CREATE TABLE `identidad` (
  `ididentidad` int(11) NOT NULL,
  `tipo_identidad` varchar(50) NOT NULL,
  `numero_identidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `identidad`
--

INSERT INTO `identidad` (`ididentidad`, `tipo_identidad`, `numero_identidad`) VALUES
(1, 'cedula', 1223124),
(2, 'cedula', 1735692),
(3, 'cedula', 54257858),
(4, 'cedula', 2147483647),
(5, 'cedula', 4893386),
(6, 'cedula', 542578583),
(7, 'cedula', 542578583),
(8, 'cedula', 542578583),
(9, 'cedula', 542578585),
(10, 'cedula', 2147483647);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodo_pago`
--

CREATE TABLE `metodo_pago` (
  `cod_pago` int(11) NOT NULL,
  `tipo` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientos`
--

CREATE TABLE `movimientos` (
  `id_mov` int(11) NOT NULL,
  `fk_trabajador` int(11) NOT NULL,
  `desc_mov` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE `pais` (
  `idpais` int(11) NOT NULL,
  `nombre_pais` varchar(50) NOT NULL,
  `estado_pais` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`idpais`, `nombre_pais`, `estado_pais`) VALUES
(1, 'Colombia', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_producto`
--

CREATE TABLE `pedido_producto` (
  `idpedido` int(11) NOT NULL,
  `idtrabajador` int(11) NOT NULL,
  `fecha_pedido` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total_pedido` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE `permiso` (
  `idpermiso` int(11) NOT NULL,
  `admusu` tinyint(1) NOT NULL,
  `regventa` tinyint(1) NOT NULL,
  `regcateprod` tinyint(1) NOT NULL,
  `regproducto` tinyint(1) NOT NULL,
  `modcateprod` tinyint(1) NOT NULL,
  `modproducto` tinyint(1) NOT NULL,
  `vercateprod` tinyint(1) NOT NULL,
  `verproducto` tinyint(1) NOT NULL,
  `reportventa` tinyint(1) NOT NULL,
  `estado_permiso` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `permiso`
--

INSERT INTO `permiso` (`idpermiso`, `admusu`, `regventa`, `regcateprod`, `regproducto`, `modcateprod`, `modproducto`, `vercateprod`, `verproducto`, `reportventa`, `estado_permiso`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(2, 0, 1, 1, 1, 0, 0, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `idpersona` int(11) NOT NULL,
  `ididentidad` int(11) NOT NULL,
  `nombre_persona` varchar(100) NOT NULL,
  `apellido_persona` varchar(100) NOT NULL,
  `genero` char(1) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `idciudad` int(11) NOT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `estado_persona` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`idpersona`, `ididentidad`, `nombre_persona`, `apellido_persona`, `genero`, `fecha_nacimiento`, `idciudad`, `direccion`, `telefono`, `estado_persona`) VALUES
(1, 2, 'SENA', 'Bretaña', 'M', '1987-04-23', 1, 'cra 15 ', '3124553489', 1),
(2, 3, 'TPS-76', 'SENA Bretaña', 'M', '2018-04-16', 102, 'cra 20', '3124553489', 1),
(3, 4, 'Prueba', 'Tres', 'M', '2018-09-16', 39, 'calle 12', '3245670984', 1),
(4, 5, 'Daniel', 'Ezequiel', 'M', '1998-12-02', 31, 'cra 20', '3134353489', 1),
(5, 9, 'Dany', 'Garcia', 'm', '1996-09-27', 102, 'cra 15 ', '3134560978', 1),
(6, 4, 'jorman', 'Garcia', 'm', '1987-04-06', 7, 'avenida la 5ta de su madre', '2345435345', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idproducto` int(11) NOT NULL,
  `idcatproducto` int(11) NOT NULL,
  `idproveedor` int(11) NOT NULL,
  `nombre_producto` varchar(50) NOT NULL,
  `venta_producto` double NOT NULL,
  `imagen_producto` text,
  `compra_producto` double NOT NULL,
  `estado_producto` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idproducto`, `idcatproducto`, `idproveedor`, `nombre_producto`, `venta_producto`, `imagen_producto`, `compra_producto`, `estado_producto`) VALUES
(3315, 1, 8439233, 'Tenis POD-S3.1', 479900, 'Vistas/assets/uploads/PDO-S3.1.jpg', 308900, 1),
(3321, 1, 8439233, 'adidas 3', 100000, NULL, 40000, 1),
(3322, 2, 8439233, 'adidas 2.1', 479900, NULL, 200000, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `idproveedor` int(11) NOT NULL,
  `idciudad` int(11) NOT NULL,
  `razon_social` varchar(50) NOT NULL,
  `nombre_proveedor` varchar(50) NOT NULL,
  `apellido_proveedor` varchar(50) NOT NULL,
  `direccion_proveedor` varchar(50) NOT NULL,
  `telefono_proveedor` varchar(11) NOT NULL,
  `email_proveedor` varchar(100) NOT NULL,
  `estado_proveedor` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`idproveedor`, `idciudad`, `razon_social`, `nombre_proveedor`, `apellido_proveedor`, `direccion_proveedor`, `telefono_proveedor`, `email_proveedor`, `estado_proveedor`) VALUES
(8439233, 7, 'Adidas Colombia Ltda', 'Andrés', 'Quintero', 'cra 5 # 56 -94', '3124954390', 'andres.quintero@adidas.oficial.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resolucionfact`
--

CREATE TABLE `resolucionfact` (
  `codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock`
--

CREATE TABLE `stock` (
  `idstock` int(11) NOT NULL,
  `idproveedor` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `cantidad_stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `stock`
--

INSERT INTO `stock` (`idstock`, `idproveedor`, `idproducto`, `cantidad_stock`) VALUES
(1, 8439233, 3315, 56),
(4, 8439233, 3322, 3),
(5, 8439233, 3321, 80);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajador`
--

CREATE TABLE `trabajador` (
  `idtrabajador` int(11) NOT NULL,
  `idpersona` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `idcargo` int(11) NOT NULL,
  `estado_trabajador` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `trabajador`
--

INSERT INTO `trabajador` (`idtrabajador`, `idpersona`, `idusuario`, `idcargo`, `estado_trabajador`) VALUES
(1, 2, 3, 1, 1),
(2, 3, 4, 2, 1);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `trabajadorv`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `trabajadorv` (
`idtrabajador` int(11)
,`numero_identidad` int(11)
,`idpersona` int(11)
,`nombre_persona` varchar(100)
,`apellido_persona` varchar(100)
,`genero` char(1)
,`fecha_nacimiento` date
,`telefono` varchar(10)
,`nombre_ciudad` varchar(50)
,`estado` tinyint(1)
,`email_usuario` varchar(50)
,`nombre_catusuario` varchar(50)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `email_usuario` varchar(50) NOT NULL,
  `password_usuario` varchar(100) NOT NULL,
  `tipo_usuario` int(11) NOT NULL,
  `estado_usuario` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `email_usuario`, `password_usuario`, `tipo_usuario`, `estado_usuario`) VALUES
(1, 'mm@gmail.com', 'caca', 1, 1),
(2, 'sena.edu@misena.edu.co', 'sena1234', 3, 1),
(3, 'tps76ceai@gmail.com', 'sena12345', 1, 1),
(4, 'modificar@gmail.com', 'modifico2', 2, 1),
(5, 'ezequiel.dn@misena.edu.co', 'ezequiel', 3, 1),
(6, 'dany@gmail.com', 'dany', 3, 1),
(7, 'jorma@gmail.com', 'jorman', 3, 1);

-- --------------------------------------------------------

--
-- Estructura para la vista `clientev`
--
DROP TABLE IF EXISTS `clientev`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `clientev`  AS  select `c`.`idcliente` AS `idcliente`,`id`.`numero_identidad` AS `numero_identidad`,`p`.`idpersona` AS `idpersona`,`p`.`nombre_persona` AS `nombre_persona`,`p`.`apellido_persona` AS `apellido_persona`,`p`.`genero` AS `genero`,`p`.`fecha_nacimiento` AS `fecha_nacimiento`,`p`.`direccion` AS `direccion`,`ci`.`nombre_ciudad` AS `nombre_ciudad`,`p`.`telefono` AS `telefono`,`u`.`estado_usuario` AS `estado`,`u`.`email_usuario` AS `email_usuario` from ((((`cliente` `c` join `persona` `p` on((`c`.`idpersona` = `p`.`idpersona`))) join `ciudad` `ci` on((`p`.`idciudad` = `ci`.`idciudad`))) join `identidad` `id` on((`p`.`ididentidad` = `id`.`ididentidad`))) join `usuario` `u` on((`c`.`idusuario` = `u`.`idusuario`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `facturav`
--
DROP TABLE IF EXISTS `facturav`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `facturav`  AS  select `f`.`id_fac` AS `id_fac`,`f`.`fk_trabaj` AS `fk_trabaj`,`f`.`fk_tipoPago` AS `fk_tipoPago`,`f`.`fk_resFac` AS `fk_resFac`,`f`.`fk_cliente` AS `fk_cliente`,`f`.`fk_petProducto` AS `fk_petProducto` from `factura` `f` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `trabajadorv`
--
DROP TABLE IF EXISTS `trabajadorv`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `trabajadorv`  AS  select `t`.`idtrabajador` AS `idtrabajador`,`id`.`numero_identidad` AS `numero_identidad`,`p`.`idpersona` AS `idpersona`,`p`.`nombre_persona` AS `nombre_persona`,`p`.`apellido_persona` AS `apellido_persona`,`p`.`genero` AS `genero`,`p`.`fecha_nacimiento` AS `fecha_nacimiento`,`p`.`telefono` AS `telefono`,`ci`.`nombre_ciudad` AS `nombre_ciudad`,`u`.`estado_usuario` AS `estado`,`u`.`email_usuario` AS `email_usuario`,`ca`.`nombre_catusuario` AS `nombre_catusuario` from (((((`trabajador` `t` join `persona` `p` on((`t`.`idpersona` = `p`.`idpersona`))) join `identidad` `id` on((`p`.`ididentidad` = `id`.`ididentidad`))) join `ciudad` `ci` on((`p`.`idciudad` = `ci`.`idciudad`))) join `usuario` `u` on((`t`.`idusuario` = `u`.`idusuario`))) join `categoria_usuario` `ca` on((`t`.`idcargo` = `ca`.`idcatusuario`))) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aprobacion`
--
ALTER TABLE `aprobacion`
  ADD PRIMARY KEY (`idaprobacion`),
  ADD KEY `fk_trab` (`fk_trab`);

--
-- Indices de la tabla `categoria_producto`
--
ALTER TABLE `categoria_producto`
  ADD PRIMARY KEY (`idcatproducto`);

--
-- Indices de la tabla `categoria_usuario`
--
ALTER TABLE `categoria_usuario`
  ADD PRIMARY KEY (`idcatusuario`),
  ADD KEY `fk_permiso_catusuario` (`idpermisos`);

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`idciudad`),
  ADD KEY `fk_departamento_ciudad` (`iddepartamento`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idcliente`),
  ADD KEY `fk_persona_cliente` (`idpersona`),
  ADD KEY `fk_usuario_cliente` (`idusuario`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`iddepartamento`),
  ADD KEY `fk_pais_departamento` (`idpais`);

--
-- Indices de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD PRIMARY KEY (`idpedido`,`idproducto`),
  ADD KEY `fk_producto_detalle_producto` (`idproducto`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id_fac`),
  ADD KEY `fk_trabajad` (`fk_trabaj`),
  ADD KEY `fk_resoluicionfactura` (`fk_resFac`),
  ADD KEY `fk_tipopago` (`fk_tipoPago`),
  ADD KEY `fk_client` (`fk_cliente`),
  ADD KEY `fk_petProduct` (`fk_petProducto`);

--
-- Indices de la tabla `identidad`
--
ALTER TABLE `identidad`
  ADD PRIMARY KEY (`ididentidad`);

--
-- Indices de la tabla `metodo_pago`
--
ALTER TABLE `metodo_pago`
  ADD PRIMARY KEY (`cod_pago`);

--
-- Indices de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  ADD PRIMARY KEY (`id_mov`),
  ADD KEY `movimientos_ibfk_1` (`fk_trabajador`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`idpais`);

--
-- Indices de la tabla `pedido_producto`
--
ALTER TABLE `pedido_producto`
  ADD PRIMARY KEY (`idpedido`),
  ADD KEY `fk_trabajador_pedido` (`idtrabajador`);

--
-- Indices de la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD PRIMARY KEY (`idpermiso`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`idpersona`),
  ADD KEY `fk_identidad_persona` (`ididentidad`),
  ADD KEY `fk_ciudad_persona` (`idciudad`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idproducto`),
  ADD KEY `fk_categoria_producto` (`idcatproducto`),
  ADD KEY `fk_proveedor_producto` (`idproveedor`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`idproveedor`),
  ADD KEY `fk_ciudad_proveedor` (`idciudad`);

--
-- Indices de la tabla `resolucionfact`
--
ALTER TABLE `resolucionfact`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`idstock`),
  ADD KEY `fk_proveedor_stock` (`idproveedor`),
  ADD KEY `fk_producto_stock` (`idproducto`);

--
-- Indices de la tabla `trabajador`
--
ALTER TABLE `trabajador`
  ADD PRIMARY KEY (`idtrabajador`),
  ADD KEY `fk_persona_trabajador` (`idpersona`),
  ADD KEY `fk_usuario_trabajador` (`idusuario`),
  ADD KEY `fk_cargo_trabajador` (`idcargo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aprobacion`
--
ALTER TABLE `aprobacion`
  MODIFY `idaprobacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categoria_producto`
--
ALTER TABLE `categoria_producto`
  MODIFY `idcatproducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `categoria_usuario`
--
ALTER TABLE `categoria_usuario`
  MODIFY `idcatusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `idciudad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idcliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `iddepartamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `id_fac` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `identidad`
--
ALTER TABLE `identidad`
  MODIFY `ididentidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `metodo_pago`
--
ALTER TABLE `metodo_pago`
  MODIFY `cod_pago` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  MODIFY `id_mov` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pais`
--
ALTER TABLE `pais`
  MODIFY `idpais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pedido_producto`
--
ALTER TABLE `pedido_producto`
  MODIFY `idpedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
  MODIFY `idpermiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `idpersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idproducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3322;

--
-- AUTO_INCREMENT de la tabla `stock`
--
ALTER TABLE `stock`
  MODIFY `idstock` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `trabajador`
--
ALTER TABLE `trabajador`
  MODIFY `idtrabajador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `aprobacion`
--
ALTER TABLE `aprobacion`
  ADD CONSTRAINT `fk_trab` FOREIGN KEY (`fk_trab`) REFERENCES `trabajador` (`idtrabajador`);

--
-- Filtros para la tabla `categoria_usuario`
--
ALTER TABLE `categoria_usuario`
  ADD CONSTRAINT `fk_permiso_catusuario` FOREIGN KEY (`idpermisos`) REFERENCES `permiso` (`idpermiso`);

--
-- Filtros para la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD CONSTRAINT `fk_departamento_ciudad` FOREIGN KEY (`iddepartamento`) REFERENCES `departamento` (`iddepartamento`);

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `fk_persona_cliente` FOREIGN KEY (`idpersona`) REFERENCES `persona` (`idpersona`),
  ADD CONSTRAINT `fk_usuario_cliente` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`);

--
-- Filtros para la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD CONSTRAINT `fk_pais_departamento` FOREIGN KEY (`idpais`) REFERENCES `pais` (`idpais`);

--
-- Filtros para la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD CONSTRAINT `fk_pedido_producto_detalle_producto` FOREIGN KEY (`idpedido`) REFERENCES `pedido_producto` (`idpedido`),
  ADD CONSTRAINT `fk_producto_detalle_producto` FOREIGN KEY (`idproducto`) REFERENCES `producto` (`idproducto`);

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `fk_client` FOREIGN KEY (`fk_cliente`) REFERENCES `cliente` (`idcliente`),
  ADD CONSTRAINT `fk_petProduct` FOREIGN KEY (`fk_petProducto`) REFERENCES `pedido_producto` (`idpedido`),
  ADD CONSTRAINT `fk_resoluicionfactura` FOREIGN KEY (`fk_resFac`) REFERENCES `resolucionfact` (`codigo`),
  ADD CONSTRAINT `fk_tipopago` FOREIGN KEY (`fk_tipoPago`) REFERENCES `metodo_pago` (`cod_pago`),
  ADD CONSTRAINT `fk_trabajad` FOREIGN KEY (`fk_trabaj`) REFERENCES `trabajador` (`idtrabajador`);

--
-- Filtros para la tabla `movimientos`
--
ALTER TABLE `movimientos`
  ADD CONSTRAINT `movimientos_ibfk_1` FOREIGN KEY (`fk_trabajador`) REFERENCES `trabajador` (`idtrabajador`);

--
-- Filtros para la tabla `pedido_producto`
--
ALTER TABLE `pedido_producto`
  ADD CONSTRAINT `fk_trabajador_pedido` FOREIGN KEY (`idtrabajador`) REFERENCES `trabajador` (`idtrabajador`);

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `fk_ciudad_persona` FOREIGN KEY (`idciudad`) REFERENCES `ciudad` (`idciudad`),
  ADD CONSTRAINT `fk_identidad_persona` FOREIGN KEY (`ididentidad`) REFERENCES `identidad` (`ididentidad`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_catproducto_producto` FOREIGN KEY (`idcatproducto`) REFERENCES `categoria_producto` (`idcatproducto`),
  ADD CONSTRAINT `fk_proveedor_producto` FOREIGN KEY (`idproveedor`) REFERENCES `proveedor` (`idproveedor`);

--
-- Filtros para la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD CONSTRAINT `fk_ciudad_proveedor` FOREIGN KEY (`idciudad`) REFERENCES `ciudad` (`idciudad`);

--
-- Filtros para la tabla `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `fk_producto_stock` FOREIGN KEY (`idproducto`) REFERENCES `producto` (`idproducto`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_proveedor_stock` FOREIGN KEY (`idproveedor`) REFERENCES `proveedor` (`idproveedor`);

--
-- Filtros para la tabla `trabajador`
--
ALTER TABLE `trabajador`
  ADD CONSTRAINT `fk_cargo_trabajador` FOREIGN KEY (`idcargo`) REFERENCES `categoria_usuario` (`idcatusuario`),
  ADD CONSTRAINT `fk_persona_trabajador` FOREIGN KEY (`idpersona`) REFERENCES `persona` (`idpersona`),
  ADD CONSTRAINT `fk_usuario_trabajador` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

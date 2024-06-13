-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-03-2024 a las 22:59:52
-- Versión del servidor: 8.0.36
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_cbby`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad`
--

CREATE TABLE `actividad` (
  `idActividad` int NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `capacidad` int NOT NULL,
  `estado` int NOT NULL DEFAULT '1',
  `idTipoActividad` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `charla`
--

CREATE TABLE `charla` (
  `idcharla` int NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `fechaCharla` date NOT NULL,
  `horaCharla` time NOT NULL,
  `lugar` varchar(100) NOT NULL,
  `capacidad` int NOT NULL,
  `status` int NOT NULL,
  `datacreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `charla`
--

INSERT INTO `charla` (`idcharla`, `nombre`, `descripcion`, `fechaCharla`, `horaCharla`, `lugar`, `capacidad`, `status`, `datacreated`) VALUES
(4, 'Concientización del medio ambiente', 'Charla tratará sobre concientizar a los asistentes obre como cuidar el medio ambiente', '2024-03-21', '10:00:00', 'UNA, sede Nicoya', 80, 1, '2023-10-31 16:58:53'),
(10, 'asdad', 'adad', '2024-03-24', '20:32:00', 'asdad', 23, 1, '2024-03-24 17:29:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `id` bigint NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mensaje` text NOT NULL,
  `ip` varchar(15) NOT NULL,
  `dispositivo` varchar(25) NOT NULL,
  `useragent` text NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`id`, `nombre`, `email`, `mensaje`, `ip`, `dispositivo`, `useragent`, `datecreated`) VALUES
(1, 'xc', 'dsfsd@gmail.com', 'sadas', '12312312', 'asd', 'asd', '2024-03-18 12:29:39'),
(7, 'Pablo', 'jpespinozamarin10@gmail.com', 'asdad', '::1', 'PC', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '2024-03-25 13:16:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentacionp`
--

CREATE TABLE `documentacionp` (
  `id_documentoP` int NOT NULL,
  `nombreP` varchar(255) NOT NULL,
  `descripcionP` text NOT NULL,
  `portadaP` varchar(100) NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `rutaP` varchar(255) NOT NULL,
  `status` int NOT NULL,
  `fechaDocP` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `documentacionp`
--

INSERT INTO `documentacionp` (`id_documentoP`, `nombreP`, `descripcionP`, `portadaP`, `datecreated`, `rutaP`, `status`, `fechaDocP`) VALUES
(18, 'prueba', 'hola', 'prueba.pdf', '2024-03-22 02:01:29', 'prueba', 1, '2024-03-22'),
(19, 'prueba2sa', 'assas', 'prueba2sa.pdf', '2024-03-22 02:05:06', 'prueba2sa', 1, '2024-03-22'),
(20, 'hsahsah', 'ashsa', 'hsahsah.pdf', '2024-03-22 02:09:11', 'hsahsah', 1, '2024-03-22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documento`
--

CREATE TABLE `documento` (
  `id_documento` bigint NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `portada` varchar(100) NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ruta` varchar(255) NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `fechaDocl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo`
--

CREATE TABLE `modulo` (
  `idmodulo` bigint NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `status` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `modulo`
--

INSERT INTO `modulo` (`idmodulo`, `titulo`, `descripcion`, `status`) VALUES
(1, 'Dashboard', 'Dashboard', 1),
(2, 'Usuarios', 'Usuarios del sistema', 1),
(3, 'Contactos', 'Mensajes del formulario de contacto', 1),
(6, 'Actividades', 'Actividades', 1),
(8, 'Voluntarios', 'Mensajes del formulario contacto', 1),
(10, 'Documentos', 'Documentos', 1),
(15, 'ReporteVoluntario', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `idpermiso` bigint NOT NULL,
  `rolid` bigint NOT NULL,
  `moduloid` bigint NOT NULL,
  `r` int NOT NULL DEFAULT '0',
  `w` int NOT NULL DEFAULT '0',
  `u` int NOT NULL DEFAULT '0',
  `d` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`idpermiso`, `rolid`, `moduloid`, `r`, `w`, `u`, `d`) VALUES
(30, 4, 1, 1, 0, 0, 0),
(31, 4, 2, 0, 0, 0, 0),
(32, 4, 3, 1, 1, 1, 0),
(33, 4, 4, 1, 0, 0, 0),
(34, 4, 5, 1, 0, 1, 0),
(35, 4, 6, 0, 0, 0, 0),
(36, 4, 7, 1, 0, 0, 0),
(37, 4, 8, 1, 0, 0, 0),
(38, 4, 9, 0, 0, 0, 0),
(48, 8, 1, 0, 0, 0, 0),
(49, 8, 2, 0, 0, 0, 0),
(50, 8, 3, 0, 0, 0, 0),
(51, 8, 4, 0, 0, 0, 0),
(52, 8, 5, 0, 0, 0, 0),
(53, 8, 6, 0, 0, 0, 0),
(54, 8, 7, 0, 0, 0, 0),
(55, 8, 8, 0, 0, 0, 0),
(56, 8, 9, 1, 1, 1, 1),
(66, 9, 1, 1, 1, 0, 0),
(67, 9, 2, 0, 0, 0, 0),
(68, 9, 3, 1, 1, 0, 0),
(69, 9, 4, 1, 1, 1, 1),
(70, 9, 5, 1, 1, 0, 0),
(71, 9, 6, 1, 0, 0, 0),
(72, 9, 7, 1, 0, 0, 0),
(73, 9, 8, 1, 0, 0, 0),
(74, 9, 9, 0, 0, 0, 0),
(75, 2, 1, 0, 0, 0, 0),
(76, 2, 2, 0, 0, 0, 0),
(77, 2, 3, 1, 1, 1, 1),
(78, 2, 4, 1, 1, 1, 1),
(79, 2, 5, 0, 0, 0, 0),
(80, 2, 6, 0, 0, 0, 0),
(81, 2, 7, 0, 0, 0, 0),
(82, 2, 8, 0, 0, 0, 0),
(83, 2, 9, 0, 0, 0, 0),
(201, 1, 1, 1, 1, 1, 1),
(202, 1, 2, 1, 1, 1, 1),
(203, 1, 3, 1, 1, 1, 1),
(204, 1, 6, 1, 1, 1, 1),
(205, 1, 8, 1, 1, 1, 1),
(206, 1, 9, 1, 1, 1, 1),
(207, 1, 10, 1, 1, 1, 1),
(208, 1, 11, 1, 1, 1, 1),
(209, 1, 13, 1, 1, 1, 1),
(210, 1, 14, 1, 1, 1, 1),
(211, 1, 15, 1, 1, 1, 1),
(247, 107, 1, 1, 0, 0, 0),
(248, 107, 2, 0, 0, 0, 0),
(249, 107, 3, 1, 0, 0, 0),
(250, 107, 6, 1, 0, 0, 0),
(251, 107, 8, 1, 0, 0, 0),
(252, 107, 10, 1, 0, 0, 0),
(253, 107, 15, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `idpersona` bigint NOT NULL,
  `identificacion` varchar(30) DEFAULT NULL,
  `nombres` varchar(80) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `telefono` bigint NOT NULL,
  `email_user` varchar(100) NOT NULL,
  `password` varchar(75) NOT NULL,
  `token` varchar(100) DEFAULT NULL,
  `rolid` bigint NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`idpersona`, `identificacion`, `nombres`, `apellidos`, `telefono`, `email_user`, `password`, `token`, `rolid`, `datecreated`, `status`) VALUES
(1, '24091989', 'Admin', 'Admin', 123456, 'admin@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', NULL, 1, '2021-08-20 01:34:15', 1),
(21, '11836018', 'Sebastian', 'Hernandez', 88817412, 'sebas@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '9c59134fae6ff9c794f3-adde5129fc476f8dd794-bc524628659c2805215c-4e160cc5bd7d20528e35', 1, '2023-09-05 21:46:24', 1),
(23, '123123', 'Kike', 'Dasdsa', 234235, 'asdfsa@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', NULL, 107, '2023-09-06 10:35:39', 2),
(24, '231423445', 'Carlos', 'Castro', 892345675, 'carlos@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', NULL, 107, '2023-09-06 11:50:28', 1),
(26, '1198237', 'Alex', 'Hernandez', 8817412, 'alex@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', NULL, 1, '2023-09-20 22:20:07', 1),
(31, '118160056', 'Pablo', 'Espinoza', 27272727, 'pablo123@gmail.com', 'c1761e6dff44a93b593ed7447d983c259a5aefdf3a11960b81c2196ca56772bc', NULL, 107, '2024-03-20 19:25:04', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `post`
--

CREATE TABLE `post` (
  `idpost` bigint NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `contenido` text,
  `portada` varchar(100) DEFAULT NULL,
  `datecreate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ruta` varchar(255) NOT NULL,
  `status` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `post`
--

INSERT INTO `post` (`idpost`, `titulo`, `contenido`, `portada`, `datecreate`, `ruta`, `status`) VALUES
(1, 'Inicio', '<div class=\"p-t-80\"> <h3 class=\"ltext-103 cl5\">Nuestras marcas</h3> </div> <div> <p>Trabajamos con las mejores marcas del mundo ...</p> </div> <div class=\"row\"> <div class=\"col-md-3\"><img src=\"Assets/images/m1.png\" alt=\"Marca 1\" width=\"110\" height=\"110\" /></div> <div class=\"col-md-3\"><img src=\"Assets/images/m2.png\" alt=\"Marca 2\" /></div> <div class=\"col-md-3\"><img src=\"Assets/images/m3.png\" alt=\"Marca 3\" /></div> <div class=\"col-md-3\"><img src=\"Assets/images/m4.png\" alt=\"Marca 4\" /></div> </div>', '', '2021-07-20 02:40:15', 'inicio', 1),
(2, 'Tienda', '<p>Contenido p&aacute;gina!</p>', '', '2021-08-06 01:21:27', 'tienda', 0),
(3, 'Carrito', '<p>Contenido p&aacute;gina!</p>', '', '2021-08-06 01:21:52', 'carrito', 0),
(4, 'Voluntarios', NULL, NULL, '2021-08-09 03:09:44', 'voluntarios', 1),
(5, 'Voluntario', NULL, NULL, '2021-08-09 03:11:08', 'voluntario', 1),
(6, 'Preguntas frecuentes', '<ol> <li><strong>&iquest;Cu&aacute;l es el tiempo de entrega de los producto? </strong>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis sunt, corrupti hic aspernatur cumque alias, ipsam omnis iure ipsum, nostrum labore obcaecati natus repellendus consequatur est nemo sapiente dolorem dicta. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Commodi, voluptas, consectetur iusto delectus quaerat ullam nesciunt! Quae doloribus deserunt qui fugit illo nobis ipsum, accusamus eius perferendis beatae culpa molestias!</li> <li><strong>&iquest;C&oacute;mo es la forma de env&iacute;o de los productos?</strong> Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis sunt, corrupti hic aspernatur cumque alias, ipsam omnis iure ipsum, nostrum labore obcaecati natus repellendus consequatur est nemo sapiente dolorem dicta. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Commodi, voluptas, consectetur.</li> <li><strong>&iquest;Cu&aacute;l es el tiempo m&aacute;ximo para solicitar un reembolso?</strong> Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis sunt, corrupti hic aspernatur cumque alias, ipsam omnis iure ipsum, nostrum labore obcaecati natus repellendus consequatur est nemo sapiente dolorem dicta. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Commodi, voluptas, consectetur iusto delectus quaerat ullam nesciunt!</li> </ol> <p>&nbsp;</p> <p>Otras preguntas</p> <ul> <li><strong>&iquest;Qu&eacute; formas de pago aceptan? </strong><span style=\"color: #666666; font-family: Arial, sans-serif; font-size: 15px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">Corrupti hic aspernatur cumque alias, ipsam omnis iure ipsum, nostrum labore obcaecati natus repellendus consequatur est nemo sapiente dolorem dicta. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Commodi, voluptas, consectetur iusto delectus quaerat ullam nesciunt! Quae doloribus deserunt qui fugit illo nobis ipsum, accusamus eius perferendis beatae culpa molestias!</span></li> </ul>', '', '2021-08-11 01:24:19', 'preguntas-frecuentes', 0),
(7, 'Términos y Condiciones', '<p>A continuaci&oacute;n se describen los t&eacute;rmino y condiciones de la Tienda Virtual!</p> <ol> <li>Pol&iacute;tica uno</li> <li>Termino dos</li> <li>Condici&oacute;n tres</li> </ol> <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis sunt, corrupti hic aspernatur cumque alias, ipsam omnis iure ipsum, nostrum labore obcaecati natus repellendus consequatur est nemo sapiente dolorem dicta. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Commodi, voluptas, consectetur iusto delectus quaerat ullam nesciunt! Quae doloribus deserunt qui fugit illo nobis ipsum, accusamus eius perferendis beatae culpa molestias!</p>', '', '2021-08-11 01:51:06', 'terminos-y-condiciones', 1),
(8, 'Sucursales', '<section class=\"py-5 text-center\"> <div class=\"container\"> <p>Visitanos y obten los mejores precios del mercado, cualquier art&iacute;culo que necestas para vivir mejor</p> <a class=\"btn btn-info\" href=\"../../tienda_virtual/tienda\">VER PRODUCTOS</a></div> </section> <div class=\"py-5 bg-light\"> <div class=\"container\"> <div class=\"row\"> <div class=\"col-md-4\"> <div class=\"card mb-4 box-shadow hov-img0\"><img src=\"https://abelosh.com/tienda_virtual/Assets/images/s1.jpg\" alt=\"Tienda Uno\" width=\"100%\" height=\"100%\" /> <div class=\"card-body\"> <p class=\"card-text\">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quaerat necessitatibus eligendi, soluta ipsa natus, at earum qui enim, illum doloremque, accusantium autem nemo est esse nulla neque eaque repellendus amet.</p> <p>Direcci&oacute;n: Antigua Gautemala <br />Tel&eacute;fono: 4654645 <br />Correo: info@abelosh.com</p> </div> </div> </div> <div class=\"col-md-4\"> <div class=\"card mb-4 box-shadow hov-img0\"><img src=\"https://abelosh.com/tienda_virtual/Assets/images/s2.jpg\" alt=\"Sucural dos\" width=\"100%\" height=\"100%\" /> <div class=\"card-body\"> <p class=\"card-text\">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quaerat necessitatibus eligendi, soluta ipsa natus, at earum qui enim, illum doloremque, accusantium autem nemo est esse nulla neque eaque repellendus amet.</p> <p>Direcci&oacute;n: Antigua Gautemala <br />Tel&eacute;fono: 4654645 <br />Correo: info@abelosh.com</p> </div> </div> </div> <div class=\"col-md-4\"> <div class=\"card mb-4 box-shadow hov-img0\"><img src=\"https://abelosh.com/tienda_virtual/Assets/images/s3.jpg\" alt=\"Sucural tres\" width=\"100%\" height=\"100%\" /> <div class=\"card-body\"> <p class=\"card-text\">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quaerat necessitatibus eligendi, soluta ipsa natus, at earum qui enim, illum doloremque, accusantium autem nemo est esse nulla neque eaque repellendus amet.</p> <p>Direcci&oacute;n: Antigua Gautemala <br />Tel&eacute;fono: 4654645 <br />Correo: info@abelosh.com</p> </div> </div> </div> </div> </div> </div>', 'img_d72cb5712933863e051dc9c7fac5e253.jpg', '2021-08-11 02:26:45', 'sucursales', 0),
(9, 'Not Found', '<h1>Error 404: P&aacute;gina no encontrada</h1> <p>No se encuentra la p&aacute;gina que ha solicitado.</p>', '', '2021-08-12 02:30:49', 'not-found', 1),
(10, 'tallerV', NULL, NULL, '2023-10-10 14:28:48', 'tallerV', 1),
(11, 'documentacionV', 'documentacionV', 'documentacionV', '2023-10-16 17:36:41', 'documentacionV', 1),
(12, 'horariosOf', 'horariosOf', 'horariosOf', '2023-10-17 10:16:10', 'horariosOf', 1),
(13, 'charlaV', 'charlaV', 'charlaV', '2023-10-25 00:29:27', 'charlav', 1),
(14, 'donacionesV', NULL, NULL, '2023-10-25 00:31:34', 'donacionesV', 1),
(15, 'galeriaV', NULL, NULL, '2023-10-25 00:32:26', 'galeriaV', 1),
(16, 'contactoV', NULL, NULL, '2023-10-25 00:32:53', 'contactoV', 1),
(17, 'sobreV', NULL, NULL, '2023-10-25 00:33:53', 'sobreV', 1),
(18, 'voluntariadosV', NULL, NULL, '2023-10-25 00:35:28', 'voluntariadosV', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idrol` bigint NOT NULL,
  `nombrerol` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `status` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idrol`, `nombrerol`, `descripcion`, `status`) VALUES
(1, 'Super Administrador', 'Acceso a todo el sistema', 1),
(107, 'Asociacion', 'Integrantes de la Asociacion', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `taller`
--

CREATE TABLE `taller` (
  `idtaller` bigint NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `fechaTaller` date NOT NULL,
  `horaTaller` time NOT NULL,
  `lugar` varchar(100) NOT NULL,
  `capacidad` int NOT NULL,
  `status` int NOT NULL,
  `datacreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `taller`
--

INSERT INTO `taller` (`idtaller`, `nombre`, `descripcion`, `fechaTaller`, `horaTaller`, `lugar`, `capacidad`, `status`, `datacreated`) VALUES
(14, 'Recoleccion de basura', 'Recoleccion de basura en areas verdes', '2024-03-21', '14:08:00', 'Nicoya', 100, 1, '2023-10-09 23:06:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `voluntariado`
--

CREATE TABLE `voluntariado` (
  `idvoluntariado` bigint NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `fechaVoluntariado` date NOT NULL,
  `horaVoluntariado` time NOT NULL,
  `lugar` varchar(100) NOT NULL,
  `capacidad` int NOT NULL,
  `status` int NOT NULL,
  `datacreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `voluntariado`
--

INSERT INTO `voluntariado` (`idvoluntariado`, `nombre`, `descripcion`, `fechaVoluntariado`, `horaVoluntariado`, `lugar`, `capacidad`, `status`, `datacreated`) VALUES
(4, 'Siembra de árboles', 'Voluntariado necesario para sembrar 50 árboles en la finca #, al frente de la Universidad', '2024-03-22', '08:00:00', 'Universidad Nacional Campus Nicoya', 50, 1, '2024-03-03 14:13:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `volunteers`
--

CREATE TABLE `volunteers` (
  `id` int NOT NULL,
  `identificacion_volunteer` varchar(100) NOT NULL,
  `frist_name_volunteer` varchar(100) NOT NULL,
  `last_name_volunteer` varchar(100) NOT NULL,
  `email` varchar(250) NOT NULL,
  `address_volunteer` varchar(100) NOT NULL,
  `age_volunteer` int NOT NULL,
  `general` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `actividad` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `mensaje` text NOT NULL,
  `ocupation_volunteer` varchar(100) DEFAULT NULL,
  `phone_number_volunteer` varchar(100) NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Estado` varchar(100) NOT NULL DEFAULT 'Solicitud'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `volunteers`
--

INSERT INTO `volunteers` (`id`, `identificacion_volunteer`, `frist_name_volunteer`, `last_name_volunteer`, `email`, `address_volunteer`, `age_volunteer`, `general`, `actividad`, `mensaje`, `ocupation_volunteer`, `phone_number_volunteer`, `datecreated`, `Estado`) VALUES
(1, '891723', 'Carmen', 'Carmen', 'carmen@gmail.com', 'Carmen', 14, '1', '', 'Cazrmen', 'carmen', '89732498', '2023-09-26 19:00:55', 'Activo'),
(66, '34534535', 'Hfghfhfhfh', 'Hfghfghfh', 'fdsfsf@gmail.com', 'Sdfsdfsfsfsf', 23, '1', '', 'Hgffggfhh', 'fdggfdg', '34543345', '2023-10-04 19:59:59', 'Activo'),
(69, '2352', 'Pablo', 'Espinoza', 'brrrrpro@gmail.com', 'Nicoya', 26, '1', '', 'Gfhfghfg', 'estudiante', '345345', '2023-10-04 20:47:59', 'Activo'),
(70, '5555', 'Pablo', 'Espinoza', 'brrrrpro2@gmail.com', 'Nicoyaaaaa', 24, '1', '', 'Sdfsfsffs', 'estudiante', '8282828282', '2023-10-04 21:16:53', 'Activo'),
(71, '55552', 'Pabloespi', 'Espinoza', 'brrrrpro21@gmail.com', 'Nicoyaaaaa', 25, '1', '', 'Fsdfsdfsdf', 'estudiante', '8282828282', '2023-10-04 21:25:09', 'Activo'),
(72, '123133', 'Sdffsfsf', 'Fsfsdsfs', 'hola@gmail.com', 'Saddadd', 22, '1', '', 'Fsdfsdsfdf', 'sdfsfdfdfd', '2342424', '2023-10-04 21:36:21', 'Inactivo'),
(73, '1321651', 'Sdf', 'Sdfdsf', 'sdfsdf@gmail.com', 'Jsdkfn', 26, '1', '', 'Sad', 'kjasbd', '98234', '2023-10-07 13:40:33', 'Activo'),
(75, '24512679', 'Sebastian', 'Hernandez', 'prueeeeba@gmail.com', 'Nicoya', 26, '1', '', 'UNA', 'estudiante', '8817412', '2023-10-11 16:00:00', 'Activo'),
(78, '23424234', 'Miguelmz', 'Matarrita', 'miguel@gmail.com', 'FsfsfsfNicoyaaa', 21, '1', '', 'No', 'estudiantenacionalcr', '82832', '2024-03-01 13:58:36', 'Activo'),
(81, '118160056', 'Pablo', 'Espinoza', 'pablo2@gmail.com', 'Nicoya', 22, '1', '', 'No', 'estudiante', '86288165', '2024-03-07 20:21:39', 'Activo'),
(83, '11836051811', 'Sebastian', 'Hernandez', 'sebas@gmail.es', 'Nicoya', 23, '1', '', 'UNA', 'est', '88174120', '2024-03-15 09:05:24', 'Inactivo'),
(84, '118360518', 'Sebastian', 'Hernandez', 'sebasu@hotmail.com', 'Nicoya', 28, '1', '', 'UNA', 'estudiante', '88817412', '2024-03-15 09:14:57', 'Solicitud'),
(87, '118860518', 'Sebas', 'Zuñiga', 'sebastian.hernandez.hernandez@est.una.ac.cr', 'Nicoya', 12, '1', '', 'Asd', 'estudiante', '88817412', '2024-03-18 14:01:18', 'Inactivo'),
(88, '1181610056', 'Pablo', 'Espinoza', 'pablo13@gmail.com', 'Asdad', 20, '1', '', 'Qweqe', 'asdadxcv', '32422342', '2024-03-20 19:18:19', 'Solicitud'),
(91, '118160051', 'Nicole Valeria', 'Barahona Acosta', 'b@gmail.com', 'Kaskdakdkas', 25, 'No', 'Concientización del medio ambiente', 'No', 'estudiante', '67851561', '2024-03-24 22:52:06', 'Solicitud'),
(93, '118160056', 'jose pablo', 'espinoza marin', 'a@gmail.com', 'fsfsfsf', 25, 'Si', '', 'weww', 'estudiante', '82832323', '2024-03-25 14:04:02', 'Solicitud'),
(94, '118160056', 'jose pablo', 'espinoza marin', 'ab@gmail.com', 'kaskdakdkas', 23, 'Si', '', 'dfgdgd', 'estudiante', '82832321', '2024-03-25 14:06:28', 'Solicitud'),
(95, '118160056', 'jose pablo', 'espinoza marin', 'abt@gmail.com', 'kaskdakdkas', 25, 'No', 'Recoleccion de basura', 'qweqe', 'estudiante', '43564321', '2024-03-25 14:18:06', 'Solicitud'),
(96, '118160056', 'jose pablo', 'espinoza marin', 'abt3@gmail.com', 'kaskdakdkas', 22, 'No', 'Recoleccion de basura', 'xzczczc', 'estudiante', '82832321', '2024-03-25 14:19:24', 'Solicitud'),
(97, '118160056', 'jose pablo', 'espinoza marin', 'a@gmail.com', 'kaskdakdkas', 26, 'No', 'Recoleccion de basura', 'sdfsfdsf', 'estudiante', '82832454', '2024-03-25 15:16:48', 'Solicitud'),
(98, '118160056', 'jose pablo', 'espinoza marin', 'a@gmail.com', 'fsfsfsf', 25, 'No', 'Concientización del medio ambiente', 'zxczczc', 'estudiante', '82832332', '2024-03-25 15:25:19', 'Solicitud');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD PRIMARY KEY (`idActividad`),
  ADD KEY `idTipoActividad` (`idTipoActividad`);

--
-- Indices de la tabla `charla`
--
ALTER TABLE `charla`
  ADD PRIMARY KEY (`idcharla`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `documentacionp`
--
ALTER TABLE `documentacionp`
  ADD PRIMARY KEY (`id_documentoP`);

--
-- Indices de la tabla `documento`
--
ALTER TABLE `documento`
  ADD PRIMARY KEY (`id_documento`);

--
-- Indices de la tabla `modulo`
--
ALTER TABLE `modulo`
  ADD PRIMARY KEY (`idmodulo`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`idpermiso`),
  ADD KEY `rolid` (`rolid`),
  ADD KEY `moduloid` (`moduloid`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`idpersona`),
  ADD KEY `rolid` (`rolid`);

--
-- Indices de la tabla `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`idpost`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idrol`);

--
-- Indices de la tabla `taller`
--
ALTER TABLE `taller`
  ADD PRIMARY KEY (`idtaller`);

--
-- Indices de la tabla `voluntariado`
--
ALTER TABLE `voluntariado`
  ADD PRIMARY KEY (`idvoluntariado`);

--
-- Indices de la tabla `volunteers`
--
ALTER TABLE `volunteers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividad`
--
ALTER TABLE `actividad`
  MODIFY `idActividad` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `charla`
--
ALTER TABLE `charla`
  MODIFY `idcharla` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `documentacionp`
--
ALTER TABLE `documentacionp`
  MODIFY `id_documentoP` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `documento`
--
ALTER TABLE `documento`
  MODIFY `id_documento` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `modulo`
--
ALTER TABLE `modulo`
  MODIFY `idmodulo` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `idpermiso` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=254;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `idpersona` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `post`
--
ALTER TABLE `post`
  MODIFY `idpost` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idrol` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT de la tabla `taller`
--
ALTER TABLE `taller`
  MODIFY `idtaller` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `voluntariado`
--
ALTER TABLE `voluntariado`
  MODIFY `idvoluntariado` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `volunteers`
--
ALTER TABLE `volunteers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

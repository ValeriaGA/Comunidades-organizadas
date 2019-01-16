-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-01-2019 a las 03:31:18
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `comunidadesorganizadas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admins_by_community`
--

CREATE TABLE `admins_by_community` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `community_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cantons`
--

CREATE TABLE `cantons` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cantons`
--

INSERT INTO `cantons` (`id`, `name`, `province_id`) VALUES
(1, 'San José', 1),
(2, 'Acosta', 1),
(3, 'Alajuelita', 1),
(4, 'Aserrí', 1),
(5, 'Curridabat', 1),
(6, 'Desamparados', 1),
(7, 'Dota', 1),
(8, 'Escazú', 1),
(9, 'Goicoechea', 1),
(10, 'León Cortés', 1),
(11, 'Montes de Oca', 1),
(12, 'Mora', 1),
(13, 'Moravia', 1),
(14, 'Pérez Zeledón', 1),
(15, 'Puriscal', 1),
(16, 'Santa Ana', 1),
(17, 'Tarrazú', 1),
(18, 'Tibás', 1),
(19, 'Turrubares', 1),
(20, 'Vázquez de Coronado', 1),
(21, 'Heredia', 3),
(22, 'Barva', 3),
(23, 'Belén', 3),
(24, 'Flores', 3),
(25, 'San Isidro', 3),
(26, 'San Pablo', 3),
(27, 'San Rafael', 3),
(28, 'Santa Bárbara', 3),
(29, 'Santo Domingo', 3),
(30, 'Sarapiquí', 3),
(31, 'Alajuela', 2),
(32, 'Atenas', 2),
(33, 'Grecia', 2),
(34, 'Guatuso', 2),
(35, 'Los Chiles', 2),
(36, 'Naranjo', 2),
(37, 'Orotina', 2),
(38, 'Palmares', 2),
(39, 'Poás', 2),
(40, 'San Carlos', 2),
(41, 'San Mateo', 2),
(42, 'San Ramón', 2),
(43, 'Upala', 2),
(44, 'Valverde Vega', 2),
(45, 'Zarcero', 2),
(46, 'Cartago', 4),
(47, 'Alvarado', 4),
(48, 'El Guarco', 4),
(49, 'Jiménez', 4),
(50, 'La Unión', 4),
(51, 'Oreamuno', 4),
(52, 'Paraíso', 4),
(53, 'Turrialba', 4),
(54, 'Liberia', 5),
(55, 'Abangares', 5),
(56, 'Bagaces', 5),
(57, 'Cañas', 5),
(58, 'Carrillo', 5),
(59, 'Hojancha', 5),
(60, 'La Cruz', 5),
(61, 'Nandayure', 5),
(62, 'Nicoya', 5),
(63, 'Santa Cruz', 5),
(64, 'Tilarán', 5),
(65, 'Puntarenas', 6),
(66, 'Aguirre', 6),
(67, 'Buenos Aires', 6),
(68, 'Corredores', 6),
(69, 'Coto Brus', 6),
(70, 'Esparza', 6),
(71, 'Garabito', 6),
(72, 'Golfito', 6),
(73, 'Montes de Oro', 6),
(74, 'Osa', 6),
(75, 'Parrita', 6),
(76, 'Limón', 7),
(77, 'Guácimo', 7),
(78, 'Matina', 7),
(79, 'Pococí', 7),
(80, 'Siquirres', 7),
(81, 'Talamanca', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_evidence`
--

CREATE TABLE `cat_evidence` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cat_evidence`
--

INSERT INTO `cat_evidence` (`id`, `name`, `active`) VALUES
(1, 'Imagen', 1),
(2, 'Audio', 1),
(3, 'Video', 1),
(4, 'Documento', 1),
(5, 'link', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_report`
--

CREATE TABLE `cat_report` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cat_report`
--

INSERT INTO `cat_report` (`id`, `name`) VALUES
(1, 'Otro'),
(2, 'Servicio'),
(3, 'Seguridad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_transportation`
--

CREATE TABLE `cat_transportation` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cat_transportation`
--

INSERT INTO `cat_transportation` (`id`, `name`, `active`) VALUES
(1, 'Sin vehiculo', 1),
(2, 'Motocicleta', 1),
(3, 'Carro', 1),
(4, 'Bicicleta', 1),
(5, 'Camion', 1),
(6, 'Buseta', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_weapon`
--

CREATE TABLE `cat_weapon` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cat_weapon`
--

INSERT INTO `cat_weapon` (`id`, `name`, `active`) VALUES
(1, 'No Aplica', 1),
(2, 'Blancas', 1),
(3, 'Contundentes', 1),
(4, 'Arrojadizas', 1),
(5, 'Proyeccion', 1),
(6, 'Fuego', 1),
(7, 'Bomba', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `report_id` int(10) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `communities`
--

CREATE TABLE `communities` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `communities_by_groups`
--

CREATE TABLE `communities_by_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `community_id` int(10) UNSIGNED NOT NULL,
  `community_group_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `communities_by_group_request`
--

CREATE TABLE `communities_by_group_request` (
  `id` int(10) UNSIGNED NOT NULL,
  `community_group_request_id` int(10) UNSIGNED NOT NULL,
  `community_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `community_groups`
--

CREATE TABLE `community_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `community_group_requests`
--

CREATE TABLE `community_group_requests` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `community_requests`
--

CREATE TABLE `community_requests` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `district_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `countries`
--

INSERT INTO `countries` (`id`, `name`) VALUES
(1, 'Costa Rica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `districts`
--

CREATE TABLE `districts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `canton_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `districts`
--

INSERT INTO `districts` (`id`, `name`, `canton_id`) VALUES
(1, 'Carmen', 1),
(2, 'Catedral', 1),
(3, 'Hatillo', 1),
(4, 'Hospital', 1),
(5, 'La Uruca', 1),
(6, 'Mata Redonda', 1),
(7, 'Merced', 1),
(8, 'Pavas', 1),
(9, 'San Francisco de Dos Ríos', 1),
(10, 'San Sebastián', 1),
(11, 'Zapote', 1),
(12, 'Cangrejal', 2),
(13, 'Guaitil', 2),
(14, 'Palmichal', 2),
(15, 'Sabanillas', 2),
(16, 'San Ignacio', 2),
(17, 'Alajuelita', 3),
(18, 'Concepción', 3),
(19, 'San Antonio', 3),
(20, 'San Felipe', 3),
(21, 'San Josecito', 3),
(22, 'Aserrí', 4),
(23, 'Legua', 4),
(24, 'Monterrey', 4),
(25, 'Salitrillos', 4),
(26, 'San Gabriel', 4),
(27, 'Tarbaca', 4),
(28, 'Vuelta de Jorco', 4),
(29, 'Curridabat', 5),
(30, 'Granadilla', 5),
(31, 'Sánchez', 5),
(32, 'Tirrases', 5),
(33, 'Desamparados', 6),
(34, 'Damas', 6),
(35, 'Frailes', 6),
(36, 'Gravilias', 6),
(37, 'Los Guido', 6),
(38, 'Patarrá', 6),
(39, 'Rosario', 6),
(40, 'San Antonio', 6),
(41, 'San Cristóbal', 6),
(42, 'San Juan de Dios', 6),
(43, 'San Miguel', 6),
(44, 'San Rafael Abajo', 6),
(45, 'San Rafael Arriba', 6),
(46, 'Copey', 7),
(47, 'Jardín', 7),
(48, 'Santa María', 7),
(49, 'Escazú', 8),
(50, 'San Antonio', 8),
(51, 'San Rafael', 8),
(52, 'Calle Blancos', 9),
(53, 'Guadalupe', 9),
(54, 'Ipís', 9),
(55, 'Mata de Plátano', 9),
(56, 'Purral', 9),
(57, 'Rancho Redondo', 9),
(58, 'San Francisco', 9),
(59, 'San Pablo', 10),
(60, 'San Andrés', 10),
(61, 'Llano Bonito', 10),
(62, 'San Isidro', 10),
(63, 'Santa Cruz', 10),
(64, 'San Antonio', 10),
(65, 'Mercedes', 11),
(66, 'Sabanilla', 11),
(67, 'San Pedro', 11),
(68, 'San Rafael', 11),
(69, 'Ciudad Colón', 12),
(70, 'Guayabo', 12),
(71, 'Jaris', 12),
(72, 'Picagres', 12),
(73, 'Piedras Negras', 12),
(74, 'Tabarcia', 12),
(75, 'San Jerónimo', 13),
(76, 'San Vicente', 13),
(77, 'Trinidad', 13),
(78, 'Barú', 14),
(79, 'Cajón', 14),
(80, 'Daniel Flores', 14),
(81, 'El General', 14),
(82, 'Llano Bonito', 14),
(83, 'Páramo', 14),
(84, 'Pejibaye', 14),
(85, 'Platanares', 14),
(86, 'Río Nuevo', 14),
(87, 'Rivas', 14),
(88, 'San Andrés', 14),
(89, 'San Antonio', 14),
(90, 'San Isidro', 14),
(91, 'San Isidro de El General', 14),
(92, 'San Pablo', 14),
(93, 'San Pedro', 14),
(94, 'Santa Cruz', 14),
(95, 'Barbacoas', 15),
(96, 'Candelarita', 15),
(97, 'Chires', 15),
(98, 'Desamparaditos', 15),
(99, 'Grifo Alto', 15),
(100, 'Mercedes Sur', 15),
(101, 'San Antonio', 15),
(102, 'San Rafael', 15),
(103, 'Santiago', 15),
(104, 'Brasil', 16),
(105, 'Piedades', 16),
(106, 'Pozos', 16),
(107, 'Salitral', 16),
(108, 'Santa Ana', 16),
(109, 'Uruca', 16),
(110, 'San Carlos', 17),
(111, 'San Lorenzo', 17),
(112, 'San Marcos', 17),
(113, 'Anselmo Llorente', 18),
(114, 'Cinco Esquinas', 18),
(115, 'Colima', 18),
(116, 'León XIII', 18),
(117, 'San Juan', 18),
(118, 'Carara', 19),
(119, 'San Juan de Mata', 19),
(120, 'San Luis', 19),
(121, 'San Pablo', 19),
(122, 'San Pedro', 19),
(123, 'Cascajal', 20),
(124, 'Dulce Nombre de Jesús', 20),
(125, 'Patalillo', 20),
(126, 'San Isidro', 20),
(127, 'San Rafael', 20),
(128, 'Heredia', 21),
(129, 'Mercedes', 21),
(130, 'San Francisco', 21),
(131, 'Ulloa', 21),
(132, 'Varablanca', 21),
(133, 'Barva', 22),
(134, 'San José de la Montaña', 22),
(135, 'San Pablo', 22),
(136, 'San Pedro', 22),
(137, 'San Roque', 22),
(138, 'Santa Lucía', 22),
(139, 'La Asunción', 23),
(140, 'La Ribera', 23),
(141, 'San Antonio', 23),
(142, 'Barrantes', 24),
(143, 'Llorente', 24),
(144, 'San Joaquín', 24),
(145, 'Concepción', 25),
(146, 'San Francisco', 25),
(147, 'San Isidro', 25),
(148, 'San José', 25),
(149, 'Rincón de Sabanilla', 26),
(150, 'San Pablo', 26),
(151, 'Ángeles', 27),
(152, 'Concepción', 27),
(153, 'San Josecito', 27),
(154, 'San Rafael', 27),
(155, 'Santiago', 27),
(156, 'Jesús', 28),
(157, 'Purabá', 28),
(158, 'San Juan', 28),
(159, 'San Pedro', 28),
(160, 'Santa Bárbara', 28),
(161, 'Santo Domingo', 28),
(162, 'Pará', 29),
(163, 'Paracito', 29),
(164, 'San Miguel', 29),
(165, 'San Vicente', 29),
(166, 'Santa Rosa', 29),
(167, 'Santo Domingo', 29),
(168, 'Santo Tomás', 29),
(169, 'Tures', 29),
(170, 'Cureña', 30),
(171, 'La Virgen', 30),
(172, 'Las Horquetas', 30),
(173, 'Llanuras del Gaspar', 30),
(174, 'Puerto Viejo', 30),
(175, 'Alajuela', 31),
(176, 'Carrizal', 31),
(177, 'Desamparados', 31),
(178, 'Garita', 31),
(179, 'Guácima', 31),
(180, 'Río Segundo', 31),
(181, 'Sabanilla', 31),
(182, 'San Antonio', 31),
(183, 'San Isidro', 31),
(184, 'San José', 31),
(185, 'San Rafael', 31),
(186, 'Sarapiquí', 31),
(187, 'Tambor', 31),
(188, 'Turrúcares', 31),
(189, 'Atenas', 32),
(190, 'Concepción', 32),
(191, 'Escobal', 32),
(192, 'Jesús', 32),
(193, 'Mercedes', 32),
(194, 'San Isidro', 32),
(195, 'San José', 32),
(196, 'Santa Eulalia', 32),
(197, 'Bolívar', 33),
(198, 'Grecia', 33),
(199, 'Puente de Piedra', 33),
(200, 'Río Cuarto', 33),
(201, 'San Isidro', 33),
(202, 'San José', 33),
(203, 'San Roque', 33),
(204, 'Tacares', 33),
(205, 'Buenavista', 34),
(206, 'Cote', 34),
(207, 'Katira', 34),
(208, 'San Rafael', 34),
(209, 'Caño Negro', 35),
(210, 'El Amparo', 35),
(211, 'Los Chiles', 35),
(212, 'San Jorge', 35),
(213, 'Cirri Sur', 36),
(214, 'El Rosario', 36),
(215, 'Naranjo', 36),
(216, 'Palmitos', 36),
(217, 'San Jerónimo', 36),
(218, 'San José', 36),
(219, 'San Juan', 36),
(220, 'San Miguel', 36),
(221, 'Coyolar', 37),
(222, 'Hacienda Vieja', 37),
(223, 'La Ceiba', 37),
(224, 'Mastate', 37),
(225, 'Orotina', 37),
(226, 'Buenos Aires', 38),
(227, 'Candelaria', 38),
(228, 'Esquipulas', 38),
(229, 'La Granja', 38),
(230, 'Palmares', 38),
(231, 'Santiago', 38),
(232, 'Zaragoza', 38),
(233, 'Carrillos', 39),
(234, 'Sabana Redonda', 39),
(235, 'San Juan', 39),
(236, 'San Pedro', 39),
(237, 'San Rafael', 39),
(238, 'Aguas Zarcas', 40),
(239, 'Buenavista', 40),
(240, 'Cutris', 40),
(241, 'Florencia', 40),
(242, 'La Fortuna', 40),
(243, 'La Palmera', 40),
(244, 'La Tigra', 40),
(245, 'Monterrey', 40),
(246, 'Pital', 40),
(247, 'Pocosol', 40),
(248, 'Quesada', 40),
(249, 'Venado', 40),
(250, 'Venecia', 40),
(251, 'San Mateo', 41),
(252, 'Desmonte', 41),
(253, 'Jesús María', 41),
(254, 'Alfaro', 42),
(255, 'Ángeles', 42),
(256, 'Concepción', 42),
(257, 'Peñas Blancas', 42),
(258, 'Piedades Norte', 42),
(259, 'Piedades Sur', 42),
(260, 'San Isidro', 42),
(261, 'San Juan', 42),
(262, 'San Rafael', 42),
(263, 'San Ramón', 42),
(264, 'Santiago', 42),
(265, 'Volio', 42),
(266, 'Zapotal', 42),
(267, 'Aguas Claras', 43),
(268, 'Bijagua', 43),
(269, 'Delicias', 43),
(270, 'Dos Ríos', 43),
(271, 'San José', 43),
(272, 'Upala', 43),
(273, 'Yolillal', 43),
(274, 'Rodríguez', 44),
(275, 'San Pedro', 44),
(276, 'Sarchí Norte', 44),
(277, 'Sarchí Sur', 44),
(278, 'Toro Amarillo', 44),
(279, 'Brisas', 45),
(280, 'Guadalupe', 45),
(281, 'Laguna', 45),
(282, 'Palmira', 45),
(283, 'Tapezco', 45),
(284, 'Zapote', 45),
(285, 'Zarcero', 45),
(286, 'Agua Caliente', 46),
(287, 'Carmen', 46),
(288, 'Corralillo', 46),
(289, 'Dulce Nombre', 46),
(290, 'Guadalupe', 46),
(291, 'Llano Grande', 46),
(292, 'Occidental', 46),
(293, 'Oriental', 46),
(294, 'Quebradilla', 46),
(295, 'San Nicolás', 46),
(296, 'Tierra Blanca', 46),
(297, 'Capellades', 47),
(298, 'Cervantes', 47),
(299, 'Pacayas', 47),
(300, 'Patio de Agua', 48),
(301, 'San Isidro', 48),
(302, 'Tejar', 48),
(303, 'Tobosi', 48),
(304, 'Juan Viñas', 49),
(305, 'Pejibaye', 49),
(306, 'Tucurrique', 49),
(307, 'Concepción', 50),
(308, 'Dulce Nombre', 50),
(309, 'Río Azul', 50),
(310, 'San Diego', 50),
(311, 'San Juan', 50),
(312, 'San Rafael', 50),
(313, 'San Ramón', 50),
(314, 'Tres Ríos', 50),
(315, 'Cipreses', 51),
(316, 'Cot', 51),
(317, 'Potrero Cerrado', 51),
(318, 'San Rafael', 51),
(319, 'Santa Rosa', 51),
(320, 'Cachí', 52),
(321, 'Llanos de Santa Lucía', 52),
(322, 'Orosí', 52),
(323, 'Paraíso', 52),
(324, 'Santiago de Paraíso', 52),
(325, 'Chirripó', 53),
(326, 'La Isabel', 53),
(327, 'La Suiza', 53),
(328, 'Pavones', 53),
(329, 'Peralta', 53),
(330, 'Santa Cruz', 53),
(331, 'Santa Rosa', 53),
(332, 'Santa Teresita', 53),
(333, 'Tayutic', 53),
(334, 'Tres Equis', 53),
(335, 'Tuis', 53),
(336, 'Turrialba', 53),
(337, 'Cañas Dulces', 54),
(338, 'Curubandé', 54),
(339, 'Liberia', 54),
(340, 'Mayorga', 54),
(341, 'Nacascolo', 54),
(342, 'Colorado', 55),
(343, 'Las Juntas', 55),
(344, 'San Juan', 55),
(345, 'Sierra', 55),
(346, 'Bagaces', 56),
(347, 'La Fortuna', 56),
(348, 'Mogote', 56),
(349, 'Río Naranjo', 56),
(350, 'Bebedero', 57),
(351, 'Cañas', 57),
(352, 'Palmira', 57),
(353, 'Porozal', 57),
(354, 'San Miguel', 57),
(355, 'Belén', 58),
(356, 'Filadelfia', 58),
(357, 'Palmira', 58),
(358, 'Sardinal', 58),
(359, 'Hojancha', 59),
(360, 'Huacas', 59),
(361, 'Monte Romo', 59),
(362, 'Puerto Carrillo', 59),
(363, 'La Cruz', 60),
(364, 'La Garita', 60),
(365, 'Santa Cecilia', 60),
(366, 'Santa Elena', 60),
(367, 'Bejuco', 61),
(368, 'Carmona', 61),
(369, 'Porvenir', 61),
(370, 'San Pablo', 61),
(371, 'Santa Rita', 61),
(372, 'Zapotal', 61),
(373, 'Belén de Nosarita', 62),
(374, 'Mansión', 62),
(375, 'Nicoya', 62),
(376, 'Nosara', 62),
(377, 'Quebrada Honda', 62),
(378, 'Sámara', 62),
(379, 'San Antonio', 62),
(380, 'Bolsón', 63),
(381, 'Cabo Velas', 63),
(382, 'Cartagena', 63),
(383, 'Cuajiniquil', 63),
(384, 'Diriá', 63),
(385, 'Santa Cruz', 63),
(386, 'Tamarindo', 63),
(387, 'Tempate', 63),
(388, 'Veintisiete de Abril', 63),
(389, 'Arenal', 64),
(390, 'Líbano', 64),
(391, 'Quebrada Grande', 64),
(392, 'Santa Rosa', 64),
(393, 'Tierras Morenas', 64),
(394, 'Tilarán', 64),
(395, 'Tronadora', 64),
(396, 'Acapulco', 65),
(397, 'Arancibia', 65),
(398, 'Barranca', 65),
(399, 'Chacarita', 65),
(400, 'Chira', 65),
(401, 'Chomes', 65),
(402, 'Cóbano', 65),
(403, 'El Roble', 65),
(404, 'Guacimal', 65),
(405, 'Isla del Coco', 65),
(406, 'Lepanto', 65),
(407, 'Manzanillo', 65),
(408, 'Monteverde', 65),
(409, 'Paquera', 65),
(410, 'Pitahaya', 65),
(411, 'Puntarenas', 65),
(412, 'Naranjito', 66),
(413, 'Quepos', 66),
(414, 'Savegre', 66),
(415, 'Biolley', 67),
(416, 'Boruca', 67),
(417, 'Brunka', 67),
(418, 'Buenos Aires', 67),
(419, 'Chánguena', 67),
(420, 'Colinas', 67),
(421, 'Pilas', 67),
(422, 'Potrero Grande', 67),
(423, 'Volcán', 67),
(424, 'Corredor', 68),
(425, 'La Cuesta', 68),
(426, 'Laurel', 68),
(427, 'Paso Canoas', 68),
(428, 'Aguabuena', 69),
(429, 'Limoncito', 69),
(430, 'Pittier', 69),
(431, 'Sabalito', 69),
(432, 'San Vito', 69),
(433, 'Gutiérrez Brown', 69),
(434, 'Espíritu Santo', 70),
(435, 'Macacona', 70),
(436, 'San Jerónimo', 70),
(437, 'San Juan Grande', 70),
(438, 'San Rafael', 70),
(439, 'Jacó', 71),
(440, 'Tárcoles', 71),
(441, 'Golfito', 72),
(442, 'Guayará', 72),
(443, 'Pavón', 72),
(444, 'Puerto Jiménez', 72),
(445, 'La Unión', 73),
(446, 'Miramar', 73),
(447, 'San Isidro', 73),
(448, 'Bahía Ballena', 74),
(449, 'Palmar', 74),
(450, 'Piedras Blancas', 74),
(451, 'Puerto Cortés', 74),
(452, 'Sierpe', 74),
(453, 'Parrita', 75),
(454, 'Limón', 76),
(455, 'Matama', 76),
(456, 'Río Blanco', 76),
(457, 'Valle La Estrella', 76),
(458, 'Duacarí', 77),
(459, 'Guácimo', 77),
(460, 'Mercedes', 77),
(461, 'Pocora', 77),
(462, 'Río Jiménez', 77),
(463, 'Batán', 78),
(464, 'Carrandi', 78),
(465, 'Matina', 78),
(466, 'Cariari', 79),
(467, 'Colorado', 79),
(468, 'Guápiles', 79),
(469, 'Jiménez', 79),
(470, 'Rita', 79),
(471, 'Roxana', 79),
(472, 'Alegría', 80),
(473, 'Cairo', 80),
(474, 'Florida', 80),
(475, 'Germania', 80),
(476, 'Pacuarito', 80),
(477, 'Siquirres', 80),
(478, 'Bratsi', 81),
(479, 'Cahuita', 81),
(480, 'Sixaola', 81),
(481, 'Telire', 81);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evidence`
--

CREATE TABLE `evidence` (
  `id` int(10) UNSIGNED NOT NULL,
  `report_id` int(10) UNSIGNED NOT NULL,
  `cat_evidence_id` int(10) UNSIGNED NOT NULL,
  `multimedia_path` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genders`
--

CREATE TABLE `genders` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `genders`
--

INSERT INTO `genders` (`id`, `name`) VALUES
(1, 'Masculino'),
(2, 'Femenino'),
(3, 'Otro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `likes`
--

CREATE TABLE `likes` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `report_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_102_000000_create_roles_table', 1),
(2, '2014_10_103_000000_create_genders_table', 1),
(3, '2014_10_11_000000_create_people_table', 1),
(4, '2014_10_12_000000_create_users_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 1),
(6, '2018_09_16_231437_create_cat_report_table', 1),
(7, '2018_09_25_141249_create_cat_weapon_table', 1),
(8, '2018_09_25_141323_create_cat_transportation_table', 1),
(9, '2018_12_09_224501_create_countries_table', 1),
(10, '2018_12_09_224501_create_provinces_table', 1),
(11, '2018_12_09_224601_create_cantons_table', 1),
(12, '2018_12_09_224700_create_districts_table', 1),
(13, '2018_12_09_224701_create_states_table', 1),
(14, '2018_12_09_224799_create_community_groups_table', 1),
(15, '2018_12_09_224800_create_sub_cat_report_table', 1),
(16, '2018_12_09_224801_create_reports_table', 1),
(17, '2018_12_09_234325_create_cat_evidence_table', 1),
(18, '2018_12_09_234326_create_evidence_table', 1),
(19, '2018_12_10_001640_create_comments_table', 1),
(20, '2018_12_10_001837_create_likes_table', 1),
(21, '2018_12_10_001940_create_report_alert_table', 1),
(22, '2018_12_10_002150_create_security_reports_table', 1),
(23, '2018_12_11_194027_create_communities_table', 1),
(24, '2018_12_11_195345_create_communities_by_groups_table', 1),
(25, '2018_12_11_195521_create_users_by_community_groups_table', 1),
(26, '2018_12_12_211206_create_victims_table', 1),
(27, '2018_12_12_211220_create_perpetrators_table', 1),
(28, '2018_12_29_222517_create_community_requests_table', 1),
(29, '2018_12_29_222546_create_admins_by_community_table', 1),
(30, '2018_12_29_222631_create_community_group_requests_table', 1),
(31, '2018_12_29_222708_create_communities_by_community_group_request_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `people`
--

CREATE TABLE `people` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `second_last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `official_id` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender_id` int(10) UNSIGNED NOT NULL,
  `foreigner` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `people`
--

INSERT INTO `people` (`id`, `name`, `last_name`, `second_last_name`, `official_id`, `gender_id`, `foreigner`) VALUES
(1, 'admin', 'Q', 'A', '0', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perpetrators`
--

CREATE TABLE `perpetrators` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `security_report_id` int(10) UNSIGNED NOT NULL,
  `gender_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provinces`
--

CREATE TABLE `provinces` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `provinces`
--

INSERT INTO `provinces` (`id`, `name`, `country_id`) VALUES
(1, 'San José', 1),
(2, 'Alajuela', 1),
(3, 'Heredia', 1),
(4, 'Cartago', 1),
(5, 'Guanacaste', 1),
(6, 'Puntarenas', 1),
(7, 'Limón', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reports`
--

CREATE TABLE `reports` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `community_group_id` int(10) UNSIGNED NOT NULL,
  `sub_cat_report_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `state_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `longitud` decimal(11,8) NOT NULL,
  `latitud` decimal(10,8) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `news` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `report_alert`
--

CREATE TABLE `report_alert` (
  `id` int(10) UNSIGNED NOT NULL,
  `report_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `reason` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'Regular'),
(2, 'Administrador'),
(3, 'Administrador de Comunidad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `security_reports`
--

CREATE TABLE `security_reports` (
  `id` int(10) UNSIGNED NOT NULL,
  `report_id` int(10) UNSIGNED NOT NULL,
  `cat_weapon_id` int(10) UNSIGNED NOT NULL,
  `cat_transportation_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `states`
--

CREATE TABLE `states` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `states`
--

INSERT INTO `states` (`id`, `name`, `active`) VALUES
(1, 'Verificado', 1),
(2, 'Sospechoso', 1),
(3, 'Sin Procesar', 1),
(4, 'Procesando', 1),
(5, 'Procesado', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sub_cat_report`
--

CREATE TABLE `sub_cat_report` (
  `id` int(10) UNSIGNED NOT NULL,
  `cat_report_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `multimedia_path` text COLLATE utf8mb4_unicode_ci,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sub_cat_report`
--

INSERT INTO `sub_cat_report` (`id`, `cat_report_id`, `name`, `multimedia_path`, `active`) VALUES
(1, 2, 'Otro', 'other_small.png', 1),
(2, 2, 'Agua', 'water_small.png', 1),
(3, 2, 'Luz', 'light_small.png', 1),
(4, 2, 'Basura', 'trash_small.png', 1),
(5, 2, 'Calle', 'road_small.png', 1),
(6, 3, 'Asalto', 'assault_small.png', 1),
(7, 3, 'Robo de Autos', 'autotheft_small.png', 1),
(8, 3, 'Robo', 'burglary_small.png', 1),
(9, 3, 'Robo de Tienda', 'shoplifting_small.png', 1),
(10, 3, 'Actividades Sospechosas', 'suspactivity_small.png', 1),
(11, 3, 'Homicidio', 'homicide_small.png', 1),
(12, 3, 'Vandalismo', 'vandalism_small.png', 1),
(13, 3, 'Drogas', 'drugs_small.png', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `person_id` int(10) UNSIGNED NOT NULL,
  `email` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar_path` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `role_id`, `person_id`, `email`, `email_verified_at`, `password`, `avatar_path`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'admin@localhost.com', '2019-01-11 03:00:58', '$2y$10$cYrGnuQRhG7P1KVDrbZqRes7pSPgAv7MLNQbb3Yd.sYwZHg4a6cgC', NULL, '55ZzZzwgtE', NULL, NULL),
(2, 1, 1, 'admi@localhost.com', '2019-01-11 03:00:58', 'admi', NULL, NULL, NULL, NULL),
(10, 1, 1, 'valeriaga1000@gmail.com', '2019-01-11 03:00:58', 'vale', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_by_community_groups`
--

CREATE TABLE `users_by_community_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `community_group_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `victims`
--

CREATE TABLE `victims` (
  `id` int(10) UNSIGNED NOT NULL,
  `security_report_id` int(10) UNSIGNED NOT NULL,
  `gender_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admins_by_community`
--
ALTER TABLE `admins_by_community`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admins_by_community_user_id_foreign` (`user_id`),
  ADD KEY `admins_by_community_community_id_foreign` (`community_id`);

--
-- Indices de la tabla `cantons`
--
ALTER TABLE `cantons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cantons_province_id_foreign` (`province_id`);

--
-- Indices de la tabla `cat_evidence`
--
ALTER TABLE `cat_evidence`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cat_report`
--
ALTER TABLE `cat_report`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cat_transportation`
--
ALTER TABLE `cat_transportation`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cat_weapon`
--
ALTER TABLE `cat_weapon`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_report_id_foreign` (`report_id`);

--
-- Indices de la tabla `communities`
--
ALTER TABLE `communities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `communities_district_id_foreign` (`district_id`);

--
-- Indices de la tabla `communities_by_groups`
--
ALTER TABLE `communities_by_groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `communities_by_groups_community_id_foreign` (`community_id`),
  ADD KEY `communities_by_groups_community_group_id_foreign` (`community_group_id`);

--
-- Indices de la tabla `communities_by_group_request`
--
ALTER TABLE `communities_by_group_request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `communities_by_group_request_community_group_request_id_foreign` (`community_group_request_id`),
  ADD KEY `communities_by_group_request_community_id_foreign` (`community_id`);

--
-- Indices de la tabla `community_groups`
--
ALTER TABLE `community_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `community_group_requests`
--
ALTER TABLE `community_group_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `community_group_requests_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `community_requests`
--
ALTER TABLE `community_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `community_requests_user_id_foreign` (`user_id`),
  ADD KEY `community_requests_district_id_foreign` (`district_id`);

--
-- Indices de la tabla `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `districts_canton_id_foreign` (`canton_id`);

--
-- Indices de la tabla `evidence`
--
ALTER TABLE `evidence`
  ADD PRIMARY KEY (`id`),
  ADD KEY `evidence_report_id_foreign` (`report_id`),
  ADD KEY `evidence_cat_evidence_id_foreign` (`cat_evidence_id`);

--
-- Indices de la tabla `genders`
--
ALTER TABLE `genders`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `likes_user_id_foreign` (`user_id`),
  ADD KEY `likes_report_id_foreign` (`report_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `people_official_id_unique` (`official_id`),
  ADD KEY `people_gender_id_foreign` (`gender_id`);

--
-- Indices de la tabla `perpetrators`
--
ALTER TABLE `perpetrators`
  ADD PRIMARY KEY (`id`),
  ADD KEY `perpetrators_security_report_id_foreign` (`security_report_id`),
  ADD KEY `perpetrators_gender_id_foreign` (`gender_id`);

--
-- Indices de la tabla `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`),
  ADD KEY `provinces_country_id_foreign` (`country_id`);

--
-- Indices de la tabla `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reports_community_group_id_foreign` (`community_group_id`),
  ADD KEY `reports_sub_cat_report_id_foreign` (`sub_cat_report_id`),
  ADD KEY `reports_user_id_foreign` (`user_id`),
  ADD KEY `reports_state_id_foreign` (`state_id`);

--
-- Indices de la tabla `report_alert`
--
ALTER TABLE `report_alert`
  ADD PRIMARY KEY (`id`),
  ADD KEY `report_alert_report_id_foreign` (`report_id`),
  ADD KEY `report_alert_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `security_reports`
--
ALTER TABLE `security_reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `security_reports_report_id_foreign` (`report_id`),
  ADD KEY `security_reports_cat_weapon_id_foreign` (`cat_weapon_id`),
  ADD KEY `security_reports_cat_transportation_id_foreign` (`cat_transportation_id`);

--
-- Indices de la tabla `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sub_cat_report`
--
ALTER TABLE `sub_cat_report`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_cat_report_cat_report_id_foreign` (`cat_report_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`),
  ADD KEY `users_person_id_foreign` (`person_id`);

--
-- Indices de la tabla `users_by_community_groups`
--
ALTER TABLE `users_by_community_groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_by_community_groups_user_id_foreign` (`user_id`),
  ADD KEY `users_by_community_groups_community_group_id_foreign` (`community_group_id`);

--
-- Indices de la tabla `victims`
--
ALTER TABLE `victims`
  ADD PRIMARY KEY (`id`),
  ADD KEY `victims_security_report_id_foreign` (`security_report_id`),
  ADD KEY `victims_gender_id_foreign` (`gender_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admins_by_community`
--
ALTER TABLE `admins_by_community`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cantons`
--
ALTER TABLE `cantons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT de la tabla `cat_evidence`
--
ALTER TABLE `cat_evidence`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `cat_report`
--
ALTER TABLE `cat_report`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `cat_transportation`
--
ALTER TABLE `cat_transportation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `cat_weapon`
--
ALTER TABLE `cat_weapon`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `communities`
--
ALTER TABLE `communities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `communities_by_groups`
--
ALTER TABLE `communities_by_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `communities_by_group_request`
--
ALTER TABLE `communities_by_group_request`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `community_groups`
--
ALTER TABLE `community_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `community_group_requests`
--
ALTER TABLE `community_group_requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `community_requests`
--
ALTER TABLE `community_requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=482;

--
-- AUTO_INCREMENT de la tabla `evidence`
--
ALTER TABLE `evidence`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `genders`
--
ALTER TABLE `genders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `people`
--
ALTER TABLE `people`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `perpetrators`
--
ALTER TABLE `perpetrators`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `report_alert`
--
ALTER TABLE `report_alert`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `security_reports`
--
ALTER TABLE `security_reports`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `states`
--
ALTER TABLE `states`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `sub_cat_report`
--
ALTER TABLE `sub_cat_report`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `users_by_community_groups`
--
ALTER TABLE `users_by_community_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `victims`
--
ALTER TABLE `victims`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `admins_by_community`
--
ALTER TABLE `admins_by_community`
  ADD CONSTRAINT `admins_by_community_community_id_foreign` FOREIGN KEY (`community_id`) REFERENCES `communities` (`id`),
  ADD CONSTRAINT `admins_by_community_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `cantons`
--
ALTER TABLE `cantons`
  ADD CONSTRAINT `cantons_province_id_foreign` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`);

--
-- Filtros para la tabla `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_report_id_foreign` FOREIGN KEY (`report_id`) REFERENCES `reports` (`id`),
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `communities`
--
ALTER TABLE `communities`
  ADD CONSTRAINT `communities_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`);

--
-- Filtros para la tabla `communities_by_groups`
--
ALTER TABLE `communities_by_groups`
  ADD CONSTRAINT `communities_by_groups_community_group_id_foreign` FOREIGN KEY (`community_group_id`) REFERENCES `community_groups` (`id`),
  ADD CONSTRAINT `communities_by_groups_community_id_foreign` FOREIGN KEY (`community_id`) REFERENCES `communities` (`id`);

--
-- Filtros para la tabla `communities_by_group_request`
--
ALTER TABLE `communities_by_group_request`
  ADD CONSTRAINT `communities_by_group_request_community_group_request_id_foreign` FOREIGN KEY (`community_group_request_id`) REFERENCES `community_group_requests` (`id`),
  ADD CONSTRAINT `communities_by_group_request_community_id_foreign` FOREIGN KEY (`community_id`) REFERENCES `communities` (`id`);

--
-- Filtros para la tabla `community_group_requests`
--
ALTER TABLE `community_group_requests`
  ADD CONSTRAINT `community_group_requests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `community_requests`
--
ALTER TABLE `community_requests`
  ADD CONSTRAINT `community_requests_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`),
  ADD CONSTRAINT `community_requests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_canton_id_foreign` FOREIGN KEY (`canton_id`) REFERENCES `cantons` (`id`);

--
-- Filtros para la tabla `evidence`
--
ALTER TABLE `evidence`
  ADD CONSTRAINT `evidence_cat_evidence_id_foreign` FOREIGN KEY (`cat_evidence_id`) REFERENCES `cat_evidence` (`id`),
  ADD CONSTRAINT `evidence_report_id_foreign` FOREIGN KEY (`report_id`) REFERENCES `reports` (`id`);

--
-- Filtros para la tabla `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_report_id_foreign` FOREIGN KEY (`report_id`) REFERENCES `reports` (`id`),
  ADD CONSTRAINT `likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `people`
--
ALTER TABLE `people`
  ADD CONSTRAINT `people_gender_id_foreign` FOREIGN KEY (`gender_id`) REFERENCES `genders` (`id`);

--
-- Filtros para la tabla `perpetrators`
--
ALTER TABLE `perpetrators`
  ADD CONSTRAINT `perpetrators_gender_id_foreign` FOREIGN KEY (`gender_id`) REFERENCES `genders` (`id`),
  ADD CONSTRAINT `perpetrators_security_report_id_foreign` FOREIGN KEY (`security_report_id`) REFERENCES `security_reports` (`id`);

--
-- Filtros para la tabla `provinces`
--
ALTER TABLE `provinces`
  ADD CONSTRAINT `provinces_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`);

--
-- Filtros para la tabla `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_community_group_id_foreign` FOREIGN KEY (`community_group_id`) REFERENCES `community_groups` (`id`),
  ADD CONSTRAINT `reports_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`),
  ADD CONSTRAINT `reports_sub_cat_report_id_foreign` FOREIGN KEY (`sub_cat_report_id`) REFERENCES `sub_cat_report` (`id`),
  ADD CONSTRAINT `reports_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `report_alert`
--
ALTER TABLE `report_alert`
  ADD CONSTRAINT `report_alert_report_id_foreign` FOREIGN KEY (`report_id`) REFERENCES `reports` (`id`),
  ADD CONSTRAINT `report_alert_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `security_reports`
--
ALTER TABLE `security_reports`
  ADD CONSTRAINT `security_reports_cat_transportation_id_foreign` FOREIGN KEY (`cat_transportation_id`) REFERENCES `cat_transportation` (`id`),
  ADD CONSTRAINT `security_reports_cat_weapon_id_foreign` FOREIGN KEY (`cat_weapon_id`) REFERENCES `cat_weapon` (`id`),
  ADD CONSTRAINT `security_reports_report_id_foreign` FOREIGN KEY (`report_id`) REFERENCES `reports` (`id`);

--
-- Filtros para la tabla `sub_cat_report`
--
ALTER TABLE `sub_cat_report`
  ADD CONSTRAINT `sub_cat_report_cat_report_id_foreign` FOREIGN KEY (`cat_report_id`) REFERENCES `cat_report` (`id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_person_id_foreign` FOREIGN KEY (`person_id`) REFERENCES `people` (`id`),
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Filtros para la tabla `users_by_community_groups`
--
ALTER TABLE `users_by_community_groups`
  ADD CONSTRAINT `users_by_community_groups_community_group_id_foreign` FOREIGN KEY (`community_group_id`) REFERENCES `community_groups` (`id`),
  ADD CONSTRAINT `users_by_community_groups_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `victims`
--
ALTER TABLE `victims`
  ADD CONSTRAINT `victims_gender_id_foreign` FOREIGN KEY (`gender_id`) REFERENCES `genders` (`id`),
  ADD CONSTRAINT `victims_security_report_id_foreign` FOREIGN KEY (`security_report_id`) REFERENCES `security_reports` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

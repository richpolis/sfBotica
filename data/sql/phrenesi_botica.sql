-- phpMyAdmin SQL Dump
-- version 3.4.11.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 26-02-2013 a las 08:22:15
-- Versión del servidor: 5.1.65
-- Versión de PHP: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `phrenesi_botica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias_proyectos`
--

CREATE TABLE IF NOT EXISTS `categorias_proyectos` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `position` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categorias_proyectos_position_sortable_idx` (`position`),
  UNIQUE KEY `categorias_proyectos_sluggable_idx` (`slug`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `categorias_proyectos`
--

INSERT INTO `categorias_proyectos` (`id`, `categoria`, `slug`, `is_active`, `created_at`, `updated_at`, `position`) VALUES
(1, 'alguno', 'alguno', 1, '2013-02-23 16:51:16', '2013-02-23 16:51:16', 1),
(2, 'Lo Último', 'lo-ultimo', 1, '2013-02-25 12:59:18', '2013-02-25 12:59:18', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias_publicaciones`
--

CREATE TABLE IF NOT EXISTS `categorias_publicaciones` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `position` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categorias_publicaciones_position_sortable_idx` (`position`),
  UNIQUE KEY `categorias_publicaciones_sluggable_idx` (`slug`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `categorias_publicaciones`
--

INSERT INTO `categorias_publicaciones` (`id`, `categoria`, `slug`, `is_active`, `created_at`, `updated_at`, `position`) VALUES
(1, 'Categoria 1', 'categoria-1', 1, '2013-02-23 16:50:49', '2013-02-23 17:01:32', 1),
(4, 'Bitácora', 'bitacora', 1, '2013-02-25 13:18:29', '2013-02-25 13:18:29', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `cliente` varchar(255) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `position` bigint(20) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `clientes_position_sortable_idx` (`position`),
  UNIQUE KEY `clientes_sluggable_idx` (`slug`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `cliente`, `imagen`, `is_active`, `position`, `created_at`, `updated_at`, `slug`) VALUES
(1, 'cliente 1', 'c9dee2246df6de0b5cdddd467162da5a23342133.jpg', 1, 1, '2013-02-23 17:08:32', '2013-02-23 17:08:32', 'cliente-1'),
(2, 'cliente 2', '87c15b9d53241225b85603725a148c90f4382da5.jpg', 1, 2, '2013-02-23 17:08:50', '2013-02-23 17:08:50', 'cliente-2'),
(3, 'cliente 3', '2241e386271e74e8a9e5bf61739f4efb80055781.jpg', 1, 3, '2013-02-23 17:09:13', '2013-02-23 17:09:13', 'cliente-3'),
(4, 'cliente 4', '34168f3a26be9f80e9e588ca4f3c636be6b944e5.jpg', 1, 5, '2013-02-23 17:09:34', '2013-02-23 17:09:34', 'cliente-4'),
(5, 'cliente 5', 'c1e17fde615f90145c748535a37413b6c73ac5bd.jpg', 1, 6, '2013-02-23 17:10:36', '2013-02-23 17:10:36', 'cliente-5'),
(6, 'Sony', '038df805d77388ce2a5a0e611a10a4cf88a55a28.jpg', 1, 4, '2013-02-25 13:15:57', '2013-02-25 13:16:57', 'sony');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--

CREATE TABLE IF NOT EXISTS `configuracion` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `seccion` varchar(255) NOT NULL,
  `value` varchar(100) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `configuracion_sluggable_idx` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paginas`
--

CREATE TABLE IF NOT EXISTS `paginas` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `pagina` varchar(100) NOT NULL,
  `contenido` text NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `fondo` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `paginas_sluggable_idx` (`slug`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `paginas`
--

INSERT INTO `paginas` (`id`, `pagina`, `contenido`, `imagen`, `fondo`, `created_at`, `updated_at`, `slug`) VALUES
(1, 'home', '', '2c0aeb7c4c68370f5c67c2f578e16c4b57aa2a94.png', '2e24c7c54f5d41e5aefab175fd669f44efd9c21a.jpg', '2013-02-23 17:11:47', '2013-02-23 17:11:47', 'home'),
(2, 'nosotros', 'Prueba prueba prueba', '', 'fcb629eb1d6782443b7fee00b15e52acabf1dec5.jpg', '2013-02-23 17:13:43', '2013-02-25 12:56:17', 'nosotros'),
(3, 'servicios', '', 'd50f840778da62b2f26bf6ec24aabece3a2f9bb3.png', '33e32ae439596dea2f7ed6293aa5e70ad68f545b.jpg', '2013-02-23 17:15:02', '2013-02-23 17:15:02', 'servicios'),
(4, 'clientes', '', '', 'aadcab6ad09f0fd63c898a92815e6bc38b448d04.jpg', '2013-02-23 17:17:55', '2013-02-23 17:17:55', 'clientes'),
(5, 'contacto', '5545789900', '', '', '2013-02-25 13:38:42', '2013-02-25 13:38:42', 'contacto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE IF NOT EXISTS `proyectos` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `categoria_id` bigint(20) DEFAULT NULL,
  `titulo` varchar(255) NOT NULL,
  `contenido` text NOT NULL,
  `descripcion_corta` text NOT NULL,
  `is_active` tinyint(1) DEFAULT '0',
  `thumbnail` varchar(255) NOT NULL DEFAULT 'sin_imagen.jpg',
  `position` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `proyectos_sluggable_idx` (`slug`),
  KEY `categoria_id_idx` (`categoria_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `proyectos`
--

INSERT INTO `proyectos` (`id`, `categoria_id`, `titulo`, `contenido`, `descripcion_corta`, `is_active`, `thumbnail`, `position`, `created_at`, `updated_at`, `slug`) VALUES
(1, 1, 'proyecto1', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras neque diam, feugiat at sollicitudin et, mattis a nunc. Vestibulum urna nisi, tincidunt id suscipit eu, gravida eget purus. Nunc odio sem, scelerisque ac dictum non, pharetra non est. Suspendisse potenti. Curabitur non enim eget dolor fermentum malesuada. Donec molestie orci ut augue adipiscing tristique. Nullam lectus lorem, cursus vitae dapibus ac, pulvinar nec eros. Mauris dui sapien, eleifend sed ornare nec, blandit eu elit. Nunc arcu tellus, suscipit in porta vel, dictum vitae tortor.</p>\r\n<p>Nulla tellus magna, vestibulum vitae posuere in, rutrum sit amet lacus. Proin scelerisque mi sit amet diam adipiscing pellentesque vulputate justo aliquam. Nam purus sapien, auctor eu sodales quis, dapibus id risus. Proin at nulla at enim tincidunt mollis. Donec scelerisque vulputate mi sit amet ornare. Maecenas tempor vehicula tempor. Cras fermentum scelerisque ante in tincidunt. Morbi et nisl sapien. In quam nisl, hendrerit id luctus ac, commodo sed arcu. Aenean eu augue mattis urna condimentum interdum et sit amet ante. Praesent facilisis, ligula ut volutpat posuere, lectus neque mattis sem, a pellentesque purus lacus nec dui. Pellentesque sed nisi et diam accumsan tristique. Ut neque nulla, laoreet ac congue non, suscipit quis nisi.</p>', '', 1, '10c99d1c789e79460d88cc275f348b53f213d466.jpg', 1, '2013-02-23 17:05:43', '2013-02-23 17:06:33', 'proyecto1'),
(2, 1, 'videos', '<p>http://youtu.be/oOmfMtHY7_U</p>', '', 1, 'http://i.ytimg.com/vi/oOmfMtHY7_U/hqdefault.jpg', 2, '2013-02-23 17:06:46', '2013-02-23 17:08:06', 'videos'),
(5, 2, 'test', 'test1', '', 1, '0dd8c87b5f64a4c8064d12a7e2c221eac2a07933.jpg', 3, '2013-02-25 13:08:46', '2013-02-25 13:09:59', 'test');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos_galeria`
--

CREATE TABLE IF NOT EXISTS `proyectos_galeria` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `publicacion_id` bigint(20) DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `contenido` text,
  `tipo_archivo` varchar(255) DEFAULT '1',
  `archivo` varchar(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL DEFAULT 'sin_imagen.jpg',
  `position` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `publicacion_id_idx` (`publicacion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `proyectos_galeria`
--

INSERT INTO `proyectos_galeria` (`id`, `publicacion_id`, `titulo`, `contenido`, `tipo_archivo`, `archivo`, `thumbnail`, `position`) VALUES
(1, 1, 'fondo_nosotros', '', '1', 'e80430bd68d071766025d33fd2d5b121d8935a1c.jpg', 'e80430bd68d071766025d33fd2d5b121d8935a1c.jpg', 2),
(2, 1, 'fondo_otros', '', '1', '5c2fae34441490237171feeb1ffeb3b87dd0069c.jpg', '5c2fae34441490237171feeb1ffeb3b87dd0069c.jpg', 3),
(3, 1, 'fondo_publicaciones', '', '1', '6b67f529bd3fc609facda97b784ac82f6074f62c.jpg', '6b67f529bd3fc609facda97b784ac82f6074f62c.jpg', 4),
(4, 1, 'fondo_home', '', '1', 'b794cd029a50903334a2f7d8c54b356a49eff6d5.jpg', 'b794cd029a50903334a2f7d8c54b356a49eff6d5.jpg', 5),
(5, 1, 'fondo_proyectos', '', '1', '10c99d1c789e79460d88cc275f348b53f213d466.jpg', '10c99d1c789e79460d88cc275f348b53f213d466.jpg', 1),
(6, 1, 'fondo_clientes', '', '1', '9ed2ded8269ca817559a620c0f1d3f773aaef0dd.jpg', '9ed2ded8269ca817559a620c0f1d3f773aaef0dd.jpg', 6),
(7, 2, 'Evanescence - Fallen', '(00:00 - 1. Going Under) \n(03:33 - 2. Bring Me To Life) \n(07:31 - 3. Everybody''s fool) \n(10:46 - 4. My Immortal) \n(15:11 - 5. Haunted) \n(18:16 - 6. Tourniquet) \n(22:49 - 7. Imaginary) \n(27:06 - 8. Taking Over Me) \n(30:57 - 9. Hello) \n(34:31 - 10. My Last Breath) \n(38:37 - 11. Whisper) \nThanks Marshalamax\n\nFallen is the first full-length album by Evanescence, and their first album to achieve widespread release around the world.\n\nFallen was the eighth best-selling album in the U.S. in 2004, with about 2.61 million copies sold that year. The album was recorded at Ocean Studios (Burbank) and Conway Recording Studios (Hollywood) both in California. The album reached 7x Platinium status on 24th June 2008 in the U.S.\n\nAmy Lee stated:\n"We''ve all fallen, but at the same time we''re not broken. There is the hint that we are going to get up again."\n\n\nThis is one of the reasons that Fallen is called what it is. Ben Moody in an interview said that Fallen was made to let people know that they aren''t alone when they feel alone or feel pain.\n\nFallen has sold well over 15 million copies worldwide and about 5 and a half million in the US alone. The album debuted at #7 and has not fallen below #39 to date on the Billboard Album Chart. The album stayed in the top 10 for 43 non-consecutive weeks. Released March 4th, 2003.\n\nThe CD was re-released in January 2004 with the band version of My Immortal. Fallen was Grammy nominated for Album of the Year in 2004. John LeCompt and Rocky Gray both had writing credits on Fallen before they officially joined the band. John has credits on Taking Over Me and Rocky has credits for writing the original version of Tourniquet (originally called My Tourniquet) for his band, Soul Embraced. The latest album features the 12th song My Immortal (Band Version) but does not state this song on the tracklisting.', '0', 'http://www.youtube.com/watch?v=oOmfMtHY7_U', 'http://i.ytimg.com/vi/oOmfMtHY7_U/hqdefault.jpg', 7),
(11, 5, 'Desert', '', '1', '0dd8c87b5f64a4c8064d12a7e2c221eac2a07933.jpg', '0dd8c87b5f64a4c8064d12a7e2c221eac2a07933.jpg', 8),
(12, 5, 'Hydrangeas', '', '1', '7e92253a5b461da3749279a9595e67bc1bbab688.jpg', '7e92253a5b461da3749279a9595e67bc1bbab688.jpg', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE IF NOT EXISTS `publicaciones` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `categoria_id` bigint(20) DEFAULT NULL,
  `titulo` varchar(255) NOT NULL,
  `contenido` text NOT NULL,
  `descripcion_corta` text NOT NULL,
  `is_active` tinyint(1) DEFAULT '0',
  `thumbnail` varchar(255) NOT NULL DEFAULT 'sin_imagen.jpg',
  `position` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `publicaciones_sluggable_idx` (`slug`),
  KEY `categoria_id_idx` (`categoria_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `publicaciones`
--

INSERT INTO `publicaciones` (`id`, `categoria_id`, `titulo`, `contenido`, `descripcion_corta`, `is_active`, `thumbnail`, `position`, `created_at`, `updated_at`, `slug`) VALUES
(1, 1, 'publicación 1', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras neque diam, feugiat at sollicitudin et, mattis a nunc. Vestibulum urna nisi, tincidunt id suscipit eu, gravida eget purus. Nunc odio sem, scelerisque ac dictum non, pharetra non est. Suspendisse potenti. Curabitur non enim eget dolor fermentum malesuada. Donec molestie orci ut augue adipiscing tristique. Nullam lectus lorem, cursus vitae dapibus ac, pulvinar nec eros. Mauris dui sapien, eleifend sed ornare nec, blandit eu elit. Nunc arcu tellus, suscipit in porta vel, dictum vitae tortor.</p>\r\n<p>Nulla tellus magna, vestibulum vitae posuere in, rutrum sit amet lacus. Proin scelerisque mi sit amet diam adipiscing pellentesque vulputate justo aliquam. Nam purus sapien, auctor eu sodales quis, dapibus id risus. Proin at nulla at enim tincidunt mollis. Donec scelerisque vulputate mi sit amet ornare. Maecenas tempor vehicula tempor. Cras fermentum scelerisque ante in tincidunt. Morbi et nisl sapien. In quam nisl, hendrerit id luctus ac, commodo sed arcu. Aenean eu augue mattis urna condimentum interdum et sit amet ante. Praesent facilisis, ligula ut volutpat posuere, lectus neque mattis sem, a pellentesque purus lacus nec dui. Pellentesque sed nisi et diam accumsan tristique. Ut neque nulla, laoreet ac congue non, suscipit quis nisi.</p>', '', 1, '7c395b023d834e8ee040977a90b77339984adb88.jpg', 1, '2013-02-23 17:02:41', '2013-02-23 17:04:57', 'publicacion-1'),
(2, 4, 'Rotundo regreso de Maximiliano a DF', 'La gente se desbordó en el aeropuerto ante la llegada del más grande de sus talentos: Maximiliano Villegas.', '', 1, 'e8bd2253bcd5de6ebe1074bc0af2f5bccc61298b.jpg', 2, '2013-02-25 13:19:27', '2013-02-25 13:33:51', 'rotundo-regreso-de-maximiliano-a-df'),
(3, 4, 'jaksdkjaHS', 'ZJJKNASCN,NC,AS', '', 1, 'a511380842390b42dcfa691a0d7cf8d79c4527b3.jpeg', 3, '2013-02-25 13:34:48', '2013-02-25 13:35:54', 'jaksdkjahs');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones_galeria`
--

CREATE TABLE IF NOT EXISTS `publicaciones_galeria` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `publicacion_id` bigint(20) DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `contenido` text,
  `tipo_archivo` varchar(255) DEFAULT '1',
  `archivo` varchar(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL DEFAULT 'sin_imagen.jpg',
  `position` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `publicacion_id_idx` (`publicacion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `publicaciones_galeria`
--

INSERT INTO `publicaciones_galeria` (`id`, `publicacion_id`, `titulo`, `contenido`, `tipo_archivo`, `archivo`, `thumbnail`, `position`) VALUES
(1, 1, 'images', '', '1', '42e118e72c36265745b5f480bd19fdc57ff00794.jpg', '42e118e72c36265745b5f480bd19fdc57ff00794.jpg', 4),
(2, 1, 'logo', 'reebok', '1', '987479cb6ea87d05148419d50ad700a5052bd488.jpg', '987479cb6ea87d05148419d50ad700a5052bd488.jpg', 3),
(3, 1, 'vans_logo_large', '', '1', '3a291ed0dff4e113ba319da37724fd88d6bc35ba.jpg', '3a291ed0dff4e113ba319da37724fd88d6bc35ba.jpg', 5),
(4, 1, 'barena', '', '1', '7c395b023d834e8ee040977a90b77339984adb88.jpg', '7c395b023d834e8ee040977a90b77339984adb88.jpg', 1),
(5, 1, 'converse_logo', '', '1', '5d3666580c64e35114652207aa1d1f9e5480390e.jpg', '5d3666580c64e35114652207aa1d1f9e5480390e.jpg', 2),
(6, 2, 'lacalaca', '', '1', 'e8bd2253bcd5de6ebe1074bc0af2f5bccc61298b.jpg', 'e8bd2253bcd5de6ebe1074bc0af2f5bccc61298b.jpg', 6),
(7, 3, 'Olly', 'Moss', '1', 'a511380842390b42dcfa691a0d7cf8d79c4527b3.jpeg', 'a511380842390b42dcfa691a0d7cf8d79c4527b3.jpeg', 7),
(8, 3, 'Appetite', 'For', '1', '6f3d8e5da7306a7228939ddcaa1a34413719d955.jpg', '6f3d8e5da7306a7228939ddcaa1a34413719d955.jpg', 8),
(9, 3, 'Conexion_MTV', '', '1', '6890c1541d7b862095deb4f3131d316f43a51e5c.jpg', '6890c1541d7b862095deb4f3131d316f43a51e5c.jpg', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sf_guard_forgot_password`
--

CREATE TABLE IF NOT EXISTS `sf_guard_forgot_password` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `unique_key` varchar(255) DEFAULT NULL,
  `expires_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sf_guard_group`
--

CREATE TABLE IF NOT EXISTS `sf_guard_group` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sf_guard_group_permission`
--

CREATE TABLE IF NOT EXISTS `sf_guard_group_permission` (
  `group_id` bigint(20) NOT NULL DEFAULT '0',
  `permission_id` bigint(20) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`group_id`,`permission_id`),
  KEY `sf_guard_group_permission_permission_id_sf_guard_permission_id` (`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sf_guard_permission`
--

CREATE TABLE IF NOT EXISTS `sf_guard_permission` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sf_guard_remember_key`
--

CREATE TABLE IF NOT EXISTS `sf_guard_remember_key` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `remember_key` varchar(32) DEFAULT NULL,
  `ip_address` varchar(50) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sf_guard_user`
--

CREATE TABLE IF NOT EXISTS `sf_guard_user` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email_address` varchar(255) NOT NULL,
  `username` varchar(128) NOT NULL,
  `algorithm` varchar(128) NOT NULL DEFAULT 'sha1',
  `salt` varchar(128) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `is_super_admin` tinyint(1) DEFAULT '0',
  `last_login` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_address` (`email_address`),
  UNIQUE KEY `username` (`username`),
  KEY `is_active_idx_idx` (`is_active`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `sf_guard_user`
--

INSERT INTO `sf_guard_user` (`id`, `first_name`, `last_name`, `email_address`, `username`, `algorithm`, `salt`, `password`, `is_active`, `is_super_admin`, `last_login`, `created_at`, `updated_at`) VALUES
(1, 'Richpolis', 'Systems', 'richpolis@gmail.com', 'Richpolis', 'sha1', 'c19094de6c654d663e3d6590720e1ca3', 'fdd50b518e7534b2d2748de04c6cd8b0d6772d83', 1, 1, '2013-02-25 21:06:16', '2013-02-23 16:50:49', '2013-02-25 21:06:16'),
(2, 'Admin', 'System', 'contact@botica.com', 'admin', 'sha1', '812ea1ab7148fa43db9fa92448d0a00a', 'df4094d362f593474d02991960c280dd17080e88', 1, 0, NULL, '2013-02-23 16:50:50', '2013-02-23 16:50:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sf_guard_user_group`
--

CREATE TABLE IF NOT EXISTS `sf_guard_user_group` (
  `user_id` bigint(20) NOT NULL DEFAULT '0',
  `group_id` bigint(20) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`user_id`,`group_id`),
  KEY `sf_guard_user_group_group_id_sf_guard_group_id` (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sf_guard_user_permission`
--

CREATE TABLE IF NOT EXISTS `sf_guard_user_permission` (
  `user_id` bigint(20) NOT NULL DEFAULT '0',
  `permission_id` bigint(20) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`user_id`,`permission_id`),
  KEY `sf_guard_user_permission_permission_id_sf_guard_permission_id` (`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD CONSTRAINT `proyectos_categoria_id_categorias_proyectos_id` FOREIGN KEY (`categoria_id`) REFERENCES `categorias_proyectos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `proyectos_galeria`
--
ALTER TABLE `proyectos_galeria`
  ADD CONSTRAINT `proyectos_galeria_publicacion_id_proyectos_id` FOREIGN KEY (`publicacion_id`) REFERENCES `proyectos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD CONSTRAINT `publicaciones_categoria_id_categorias_publicaciones_id` FOREIGN KEY (`categoria_id`) REFERENCES `categorias_publicaciones` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `publicaciones_galeria`
--
ALTER TABLE `publicaciones_galeria`
  ADD CONSTRAINT `publicaciones_galeria_publicacion_id_publicaciones_id` FOREIGN KEY (`publicacion_id`) REFERENCES `publicaciones` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `sf_guard_forgot_password`
--
ALTER TABLE `sf_guard_forgot_password`
  ADD CONSTRAINT `sf_guard_forgot_password_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `sf_guard_group_permission`
--
ALTER TABLE `sf_guard_group_permission`
  ADD CONSTRAINT `sf_guard_group_permission_group_id_sf_guard_group_id` FOREIGN KEY (`group_id`) REFERENCES `sf_guard_group` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sf_guard_group_permission_permission_id_sf_guard_permission_id` FOREIGN KEY (`permission_id`) REFERENCES `sf_guard_permission` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `sf_guard_remember_key`
--
ALTER TABLE `sf_guard_remember_key`
  ADD CONSTRAINT `sf_guard_remember_key_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `sf_guard_user_group`
--
ALTER TABLE `sf_guard_user_group`
  ADD CONSTRAINT `sf_guard_user_group_group_id_sf_guard_group_id` FOREIGN KEY (`group_id`) REFERENCES `sf_guard_group` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sf_guard_user_group_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `sf_guard_user_permission`
--
ALTER TABLE `sf_guard_user_permission`
  ADD CONSTRAINT `sf_guard_user_permission_permission_id_sf_guard_permission_id` FOREIGN KEY (`permission_id`) REFERENCES `sf_guard_permission` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sf_guard_user_permission_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

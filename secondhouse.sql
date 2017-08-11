-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-08-2017 a las 22:58:58
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `secondhouse`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `califications`
--

CREATE TABLE `califications` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_publication` tinyint(4) NOT NULL,
  `user_id` tinyint(4) NOT NULL,
  `host_id` tinyint(4) NOT NULL,
  `beginDate` date NOT NULL,
  `endDate` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chat12`
--

CREATE TABLE `chat12` (
  `id` int(10) UNSIGNED NOT NULL,
  `sender_id` tinyint(4) NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `leido` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `chat12`
--

INSERT INTO `chat12` (`id`, `sender_id`, `message`, `leido`, `created_at`, `updated_at`) VALUES
(1, 1, 'Hola', 1, NULL, NULL),
(2, 2, 'Hola', 1, NULL, NULL),
(3, 1, 'Probando chat', 1, NULL, NULL),
(5, 2, 'prueba exitosa', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chats`
--

CREATE TABLE `chats` (
  `id` int(10) UNSIGNED NOT NULL,
  `chat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user1` tinyint(4) NOT NULL,
  `user2` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `chats`
--

INSERT INTO `chats` (`id`, `chat`, `user1`, `user2`, `created_at`, `updated_at`) VALUES
(1, 'chat12', 1, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cities`
--

INSERT INTO `cities` (`id`, `city`, `created_at`, `updated_at`) VALUES
(1, 'bogota', NULL, NULL),
(2, 'cartagena', NULL, NULL),
(3, 'medellin', NULL, NULL),
(4, 'cucuta', NULL, NULL),
(5, 'pereira', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `files`
--

CREATE TABLE `files` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_publication` tinyint(4) NOT NULL,
  `type` tinyint(4) NOT NULL,
  `extension` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url_file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `houses`
--

CREATE TABLE `houses` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `houses`
--

INSERT INTO `houses` (`id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Casa', NULL, NULL),
(2, 'Departamento', NULL, NULL),
(3, 'Quinta', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_08_01_051239_create_files_table', 1),
(4, '2017_08_03_182115_create_publications_table', 1),
(5, '2017_08_03_184743_create_pets_table', 1),
(6, '2017_08_03_184935_create_cities_table', 1),
(7, '2017_08_03_185527_create_tpets_table', 1),
(8, '2017_08_03_185621_create_houses_table', 1),
(9, '2017_08_09_025649_create_chats_table', 1),
(10, '2017_08_10_192523_create_reservations_table', 1),
(11, '2017_08_11_010755_create_califications_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pets`
--

CREATE TABLE `pets` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_publication` tinyint(4) NOT NULL,
  `id_user` tinyint(4) NOT NULL,
  `id_pet` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `pets`
--

INSERT INTO `pets` (`id`, `id_publication`, `id_user`, `id_pet`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, NULL, NULL),
(2, 1, 1, 6, NULL, NULL),
(3, 2, 2, 1, NULL, NULL),
(4, 2, 2, 2, NULL, NULL),
(5, 2, 2, 5, NULL, NULL),
(6, 3, 17, 2, NULL, NULL),
(7, 3, 17, 3, NULL, NULL),
(8, 3, 17, 4, NULL, NULL),
(9, 4, 103, 2, NULL, NULL),
(10, 4, 103, 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publications`
--

CREATE TABLE `publications` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` tinyint(4) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `id_house` tinyint(4) NOT NULL,
  `url_file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `verified` tinyint(4) NOT NULL DEFAULT '0',
  `show` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `publications`
--

INSERT INTO `publications` (`id`, `id_user`, `title`, `description`, `price`, `id_house`, `url_file`, `verified`, `show`, `created_at`, `updated_at`) VALUES
(1, 1, 'Casa familiar para mascotas pequeñas', 'lorem ipsum', 1000, 1, '1502482666_Koala.jpg', 1, 1, NULL, NULL),
(2, 2, 'sadawdad', 'awdacsa', 5000, 3, '1502427909_1069837_4951965729606_999625117_n.jpg', 1, 1, NULL, NULL),
(3, 17, 'dadfadawd', 'awdawdadad', 3000, 3, '1502428435_19511622_10212424930233537_2787107957545308042_n.jpg', 1, 1, NULL, NULL),
(4, 103, 'dawdadawd', 'wdadadfawf', 312312, 2, '1502428893_20622130_10212811227930738_1021704514244724567_n.jpg', 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservations`
--

CREATE TABLE `reservations` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_publication` tinyint(4) NOT NULL,
  `user_id` tinyint(4) NOT NULL,
  `host_id` tinyint(4) NOT NULL,
  `beginDate` date NOT NULL,
  `endDate` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `reservations`
--

INSERT INTO `reservations` (`id`, `id_publication`, `user_id`, `host_id`, `beginDate`, `endDate`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, '2017-08-11', '2017-08-14', NULL, NULL),
(2, 2, 1, 2, '2017-08-20', '2017-08-24', NULL, NULL),
(3, 3, 2, 17, '2017-08-17', '2017-08-19', NULL, NULL),
(4, 4, 2, 103, '2017-08-22', '2017-08-25', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tpets`
--

CREATE TABLE `tpets` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tpets`
--

INSERT INTO `tpets` (`id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Perro', NULL, NULL),
(2, 'Gato', NULL, NULL),
(3, 'Hamster', NULL, NULL),
(4, 'Pez', NULL, NULL),
(5, 'Serpiente', NULL, NULL),
(6, 'Reptil', NULL, NULL),
(7, 'Otro', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `n_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `t_id` tinyint(4) NOT NULL,
  `DOB` date NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cellphone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` tinyint(4) NOT NULL,
  `id_city` tinyint(4) NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `url_user` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url_front` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url_back` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` tinyint(4) NOT NULL DEFAULT '1',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `publication` tinyint(4) NOT NULL DEFAULT '0',
  `token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `n_id`, `t_id`, `DOB`, `email`, `cellphone`, `gender`, `id_city`, `address`, `url_user`, `url_front`, `url_back`, `password`, `level`, `status`, `verified`, `publication`, `token`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Uno', '25440332', 1, '1995-10-12', 'test1@gmail.com', '2021565', 1, 1, 'Calle 26 No 51-53', '1502482577_Penguins.jpg', NULL, NULL, '$2y$10$j4cZZ60OXx2Hg6D/1sy3/euQbjy/uuStGcZbjzkRY/bwvVRc91sdy', 3, 2, 1, 2, NULL, 'qRPinhXBAABvIbVTcUwCcvaAyEEblhqGxmreuNNMzC80vQOL4J7yOriLBdBN', NULL, '2017-08-12 00:58:01'),
(2, 'Admin', 'Dos', '25440333', 1, '1995-10-12', 'test2@gmail.com', '2023565', 1, 1, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$j4cZZ60OXx2Hg6D/1sy3/euQbjy/uuStGcZbjzkRY/bwvVRc91sdy', 3, 2, 1, 2, NULL, 'zZvuwFusee', NULL, NULL),
(3, 'Dessie', 'Block', '85', 1, '1995-10-12', 'weimann.caitlyn@example.com', '10000014', 1, 4, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 3, 1, 1, 0, 'cmD2fvvgje027w2SR9g7YiWya9fspfF9JrIqNgtp', '1QrUe5YVRp', '2017-08-11 09:02:55', '2017-08-11 09:02:55'),
(4, 'Imelda', 'Stroman', '10', 2, '1995-10-12', 'gregory.rogahn@example.com', '10000026', 1, 1, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 2, 1, 1, 0, 'VZWpwkMedWjc6a6AphMaYHsHEzRWoRVoMBkn2rGZ', 'jSdy0ZJnj0', '2017-08-11 09:02:55', '2017-08-11 09:02:55'),
(5, 'Laurine', 'Jakubowski', '50', 2, '1995-10-12', 'edgardo14@example.net', '10000091', 1, 1, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 1, 2, 0, 0, 'zYdKhQCMHTMscUVBlIE9QO5ergaD6geHrYKcDMQe', 'SxRLnuPT6X', '2017-08-11 09:02:56', '2017-08-11 09:02:56'),
(6, 'Helen', 'Gislason', '28', 2, '1995-10-12', 'eschmeler@example.com', '10000015', 1, 4, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 3, 1, 0, 0, 'cQ7mAGdj7IXYXj4ZpYjRF5oizZqkZZzTUxnaKVnJ', 'hCtyyZLAyf', '2017-08-11 09:02:56', '2017-08-11 09:02:56'),
(7, 'Lowell', 'Cummerata', '61', 3, '1995-10-12', 'rosendo56@example.com', '10000072', 1, 5, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 2, 1, 0, 0, 'hjXqn7c7ck6K5Kh5dhnkG9pD8Sk1jkEdHn5g6ULf', 'tA4myP63Dp', '2017-08-11 09:02:56', '2017-08-11 09:02:56'),
(8, 'Rachael', 'Lebsack', '72', 2, '1995-10-12', 'equigley@example.com', '10000021', 1, 2, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 1, 2, 0, 0, 'bJBkVdn5xYsCktANtFx3sM8wc9fKYueIIfhg92eO', 'HgPVywxods', '2017-08-11 09:02:56', '2017-08-11 09:02:56'),
(9, 'Vicky', 'Von', '17', 1, '1995-10-12', 'dsanford@example.org', '10000020', 1, 5, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 2, 1, 1, 0, '8J8p5h9iVSpGHpAMoU6CQJmd3tvF0GIJvqmb7O7I', 'tCPyowWxHT', '2017-08-11 09:02:56', '2017-08-11 09:02:56'),
(10, 'Tracey', 'Denesik', '79', 1, '1995-10-12', 'lferry@example.org', '10000080', 1, 1, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 2, 2, 0, 0, 'tQi3Zvv6pvlL7o7ibulzwW0atGianx6h82n7J9zi', 'Ep8emuTVWJ', '2017-08-11 09:02:56', '2017-08-11 09:02:56'),
(11, 'Brian', 'Sporer', '74', 3, '1995-10-12', 'matilde.dach@example.net', '10000036', 1, 4, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 2, 2, 0, 0, 'SIPJeZ3VFZukU2JgmSQxi3mTv3PBJPthEHkffZzU', 'ehO4QjTp9d', '2017-08-11 09:02:56', '2017-08-11 09:02:56'),
(12, 'Bailee', 'Larson', '96', 1, '1995-10-12', 'cgreen@example.org', '10000100', 1, 1, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 3, 1, 0, 0, 'sTCd3dEzHlXT5HkNQdiqt5O57a2dSvyPTqgERpeK', 'NtTw3Hm5Lx', '2017-08-11 09:02:56', '2017-08-11 09:02:56'),
(13, 'Alessandro', 'Bergstrom', '11', 3, '1995-10-12', 'murphy.jany@example.com', '10000032', 1, 4, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 1, 2, 0, 0, 'TkzigyQdMfiiYc3BCLQEc1nw9S94WSI4Jf4WUPSE', 'CwX6rsqB0i', '2017-08-11 09:02:56', '2017-08-11 09:02:56'),
(14, 'Dean', 'McClure', '59', 2, '1995-10-12', 'halle.mclaughlin@example.com', '10000054', 1, 2, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 1, 1, 0, 0, 'e3CVALwVf7akYMCp2fvEAFjicnTDcPJXguTjS6ul', 'V40A0CIaXi', '2017-08-11 09:02:56', '2017-08-11 09:02:56'),
(15, 'Jaquan', 'Nienow', '42', 1, '1995-10-12', 'wolf.norris@example.net', '10000099', 1, 4, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 1, 2, 0, 0, 'uWSTrPFtZBVMBKgd8Mh2rM2kUsMKUiG6evthsHsQ', '0GKA6KZNfM', '2017-08-11 09:02:56', '2017-08-11 09:02:56'),
(16, 'Damon', 'Walker', '60', 3, '1995-10-12', 'mae.ratke@example.org', '10000004', 1, 2, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 3, 1, 0, 0, 'vU8goW1DPHdZ5kS8bZBppJR1jPWnFBMZDFeoQcri', 'Xt5oxDHx4l', '2017-08-11 09:02:56', '2017-08-11 09:02:56'),
(17, 'Hailey', 'Nikolaus', '82', 3, '1995-10-12', 'feest.toy@example.org', '10000074', 1, 3, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 2, 2, 1, 2, 'vlC0xFI9gXQd9hiMIBLZwurmhfjM8SHnP7M58AkP', 'xVxJgF2fF2cKDmpsUpc2MLULqvkdNITOzomtuaAjjAO8IOIoyJ1JladcrYO5', '2017-08-11 09:02:56', '2017-08-11 09:19:30'),
(18, 'Shanna', 'Borer', '51', 3, '1995-10-12', 'shawn.fritsch@example.org', '10000065', 1, 5, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 1, 1, 1, 0, 'fGfsKJ2OT1GIxlj1cp7oKdUhsbYZPWEAwrS6BQeg', 'O3yY2we3ri', '2017-08-11 09:02:56', '2017-08-11 09:02:56'),
(19, 'Nick', 'Rosenbaum', '39', 3, '1995-10-12', 'wfranecki@example.net', '10000049', 1, 5, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 3, 2, 1, 0, 'C6k036jeJ1QecfDT57UfEsZfANsOsA6arn4NMgjY', 'SBlnuqffnK', '2017-08-11 09:02:56', '2017-08-11 09:02:56'),
(20, 'Cheyanne', 'Kuhn', '2', 2, '1995-10-12', 'okrajcik@example.com', '10000028', 1, 1, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 3, 2, 0, 0, 'MGedK7AAXxrlFvcM9I4bASsvQyBdFfUmh5ezSOVF', 'sJDlXWLDtK', '2017-08-11 09:02:56', '2017-08-11 09:02:56'),
(21, 'Cory', 'Waelchi', '99', 3, '1995-10-12', 'upton.alvina@example.com', '10000001', 1, 4, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 2, 2, 1, 0, 'C412MOI0Mnbao7y6u8zBN5sYPybncmOlE6EbAgRF', 'gIOLcysPuV', '2017-08-11 09:02:56', '2017-08-11 09:02:56'),
(22, 'Sebastian', 'Farrell', '24', 1, '1995-10-12', 'kaitlyn47@example.net', '10000040', 1, 5, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 1, 2, 1, 0, 'Dr3RGUCbTRhJuwlJHbIknwt2csVF7juFJc17rlJe', '0VkCQKWpWu', '2017-08-11 09:02:56', '2017-08-11 09:02:56'),
(23, 'Walton', 'Weissnat', '40', 1, '1995-10-12', 'ufarrell@example.org', '10000064', 1, 3, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 1, 2, 0, 0, 'XPhnSz4EJ72xGvWsKFMh8BPLLtBeb196x0FmFw2D', 'DWTBsqyVDG', '2017-08-11 09:02:56', '2017-08-11 09:02:56'),
(24, 'Jeanne', 'Terry', '34', 1, '1995-10-12', 'uharber@example.net', '10000056', 1, 2, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 3, 1, 1, 0, '2ou136aXETwLPsRnBjaNjuM1weBdByC5aXgqnRb7', 'NVl0DRuYvR', '2017-08-11 09:02:56', '2017-08-11 09:02:56'),
(25, 'Kaylin', 'Roob', '48', 2, '1995-10-12', 'eheidenreich@example.org', '10000096', 1, 1, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 2, 2, 1, 0, 'Jxct7bQTrcJXZVJBXtg3Xf96WYjLHciUYMlXTQbF', 'e8v9SOWEDg', '2017-08-11 09:02:56', '2017-08-11 09:02:56'),
(26, 'Liliana', 'Lehner', '58', 1, '1995-10-12', 'isobel13@example.net', '10000018', 1, 3, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 1, 1, 0, 0, 'JFaKtPRNg15QMyv0PU8k8pNdFNt7DmC1ugpV60rN', 'aUlPwSROWb', '2017-08-11 09:02:56', '2017-08-11 09:02:56'),
(27, 'Arnulfo', 'Volkman', '54', 2, '1995-10-12', 'akihn@example.org', '10000038', 1, 4, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 1, 2, 1, 0, 'Rrn1xRyHYLDDZbxoYbFdAqovfPuSLQPkM9EWge1C', 'wsGBEGsb1l', '2017-08-11 09:02:56', '2017-08-11 09:02:56'),
(28, 'Curtis', 'Beier', '87', 3, '1995-10-12', 'imani.berge@example.org', '10000093', 1, 3, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 2, 2, 1, 0, 'PyHEMyNOjEIPZNn3P4fT3bSYwroclPQhvD6NYRfY', 'NEkRpItg82', '2017-08-11 09:02:56', '2017-08-11 09:02:56'),
(29, 'Leta', 'Schowalter', '93', 1, '1995-10-12', 'henriette85@example.com', '10000043', 1, 2, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 3, 2, 1, 0, 'Jyg6Bq0OkB8BAEYjrKFDdjXYxuINHfKiOrSfFiry', 'BxQpama43f', '2017-08-11 09:02:56', '2017-08-11 09:02:56'),
(30, 'Arlo', 'Wunsch', '29', 3, '1995-10-12', 'sawayn.joanne@example.net', '10000012', 1, 5, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 1, 1, 1, 0, 'MBQ8PmgmNaUB0b4Hut22VHlKqGW9Q96t1C5rqIem', 'WUv6EX1Ltw', '2017-08-11 09:02:56', '2017-08-11 09:02:56'),
(31, 'Katelyn', 'Moore', '3', 2, '1995-10-12', 'doyle.mossie@example.com', '10000060', 1, 2, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 1, 2, 0, 0, 'jpiEPHayPiRonDpdOCMFikp1eNpmVmHqcLeckIig', 'QwySK8Ake6', '2017-08-11 09:02:56', '2017-08-11 09:02:56'),
(32, 'Charles', 'Leffler', '46', 3, '1995-10-12', 'ffahey@example.com', '10000092', 1, 1, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 1, 2, 0, 0, '4o4feVqndw4kprO2DF47w0vQvDuUjRiW6MUnbSST', 'MNcSyrXcyS', '2017-08-11 09:02:56', '2017-08-11 09:02:56'),
(33, 'Kara', 'Konopelski', '90', 1, '1995-10-12', 'pacocha.josefina@example.com', '10000041', 1, 1, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 3, 2, 0, 0, 'D4W9dYzYgT27PmlT58CnJmGkFSAuHmdZfnfcUuOP', 'TXBwJWgGz6', '2017-08-11 09:02:57', '2017-08-11 09:02:57'),
(34, 'Keshawn', 'Cremin', '64', 1, '1995-10-12', 'abelardo99@example.net', '10000088', 1, 4, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 3, 1, 1, 0, 'kbGqImQDQD10ENpGbaJoUVjXmOzrt1BFmAK0EaJV', 'X5CTZ4jizW', '2017-08-11 09:02:57', '2017-08-11 09:02:57'),
(35, 'Aileen', 'Corwin', '95', 1, '1995-10-12', 'elmo.spinka@example.com', '10000045', 1, 2, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 2, 2, 1, 0, 'VZOeRV9ClQufo4643ipaRo5Yum3iSKRqPK8PZyGB', 'oDyqLB1qu2', '2017-08-11 09:02:57', '2017-08-11 09:02:57'),
(36, 'Marcia', 'Altenwerth', '77', 3, '1995-10-12', 'liana65@example.com', '10000027', 1, 1, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 1, 1, 0, 0, '3czWKF1LcbSmhJ9RpX0zjcwWuFrpVXPsL0vz3cF4', 'FjPFOuo9LK', '2017-08-11 09:02:57', '2017-08-11 09:02:57'),
(37, 'Reynold', 'Pagac', '63', 1, '1995-10-12', 'carmela.zulauf@example.org', '10000042', 1, 3, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 2, 2, 0, 0, '6sT5ixW4PDjU0Jpsgohl7SCMPKp8R2vEW3dkO5Nt', 'hk965YrxHW', '2017-08-11 09:02:57', '2017-08-11 09:02:57'),
(38, 'Coralie', 'Leannon', '23', 2, '1995-10-12', 'ogrady@example.org', '10000011', 1, 4, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 3, 2, 0, 0, '8jZPahY7EKSLHWEeLSADiV7nxW52UX78hvxxnB7X', '3os1sXj8Yq', '2017-08-11 09:02:57', '2017-08-11 09:02:57'),
(39, 'Lorenzo', 'Harris', '4', 1, '1995-10-12', 'wilderman.jaron@example.org', '10000086', 1, 1, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 2, 1, 1, 0, 'H9aTIGoVoNISTnn2lwd8I9FyX80bFQhFcGYiCIw3', 'BJs7dcavE5', '2017-08-11 09:02:57', '2017-08-11 09:02:57'),
(40, 'Nathan', 'Bauch', '8', 1, '1995-10-12', 'bcrist@example.net', '10000082', 1, 5, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 1, 2, 0, 0, '1FnScElJwQitV1PgnQNX5ZD86PyMx3olbBDMhmJh', 'fLKADe1VNG', '2017-08-11 09:02:57', '2017-08-11 09:02:57'),
(41, 'Wilhelm', 'Eichmann', '69', 3, '1995-10-12', 'yvon@example.org', '10000030', 1, 3, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 2, 2, 1, 0, 'KY7VEyX0tE9bk2bmF0KmLi1iwMrQWt1rojndj9gX', 'raGe5m1KQH', '2017-08-11 09:02:57', '2017-08-11 09:02:57'),
(42, 'Fannie', 'Medhurst', '43', 1, '1995-10-12', 'ankunding.micaela@example.org', '10000048', 1, 4, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 3, 1, 0, 0, 'Y8BOaxQn2TPxMSD5KWkMnMYKRntym49qVuxqKouw', 'YG8LbijblF', '2017-08-11 09:02:57', '2017-08-11 09:02:57'),
(43, 'Danial', 'Kulas', '14', 1, '1995-10-12', 'petra.maggio@example.com', '10000073', 1, 3, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 2, 2, 1, 0, 'wP8du89mo1PBtcjDvDrXt0vITryW3eXylOZJnSLK', 'PZ37rl2ZT8', '2017-08-11 09:02:57', '2017-08-11 09:02:57'),
(44, 'Candido', 'Reichel', '84', 3, '1995-10-12', 'huels.zola@example.org', '10000084', 1, 1, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 1, 1, 0, 0, 'aLvMRBPruvtciFTAds3w5TKpMgu5dY2yYkRaeSD6', '1smn5wQGR6', '2017-08-11 09:02:57', '2017-08-11 09:02:57'),
(45, 'Haley', 'O\'Hara', '15', 3, '1995-10-12', 'alphonso30@example.com', '10000052', 1, 2, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 3, 1, 0, 0, '4VmMnG5bE5o1fFrVTfokeY3mDLhnDO0qI5f6JoEk', '6pCzF83nrn', '2017-08-11 09:02:57', '2017-08-11 09:02:57'),
(46, 'Alexie', 'Casper', '75', 1, '1995-10-12', 'maggio.antonetta@example.net', '10000006', 1, 2, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 2, 1, 1, 0, 'GYGY21qGY3zkULRhgvnh9h4uI4Kllkbp5kzAShGD', 'X5DQHtJtRD', '2017-08-11 09:02:57', '2017-08-11 09:02:57'),
(47, 'Fay', 'Schneider', '16', 3, '1995-10-12', 'joseph.ortiz@example.net', '10000050', 1, 4, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 3, 2, 1, 0, 'run3iiITbHgujV56gOyhCwszITLDCEu0KxlZsHtc', '17q1ljqEgr', '2017-08-11 09:02:57', '2017-08-11 09:02:57'),
(48, 'Anthony', 'Williamson', '94', 1, '1995-10-12', 'kautzer.sydni@example.com', '10000059', 1, 1, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 3, 2, 0, 0, 'Zro4p9xzJODShFcPbso4ZqKMRnl2YeTA6i0y6h8S', 'Nmrnrq9p5j', '2017-08-11 09:02:57', '2017-08-11 09:02:57'),
(49, 'Wallace', 'Johnson', '30', 1, '1995-10-12', 'antonietta.cremin@example.org', '10000044', 1, 5, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 3, 1, 0, 0, 'n2kFEufMmfw8gJSUMkzOAuwHYrZojfWeqjcwK8RU', 'zP0XSQyxsO', '2017-08-11 09:02:57', '2017-08-11 09:02:57'),
(50, 'Kian', 'Schowalter', '7', 2, '1995-10-12', 'holly.predovic@example.com', '10000025', 1, 1, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 3, 1, 0, 0, 'QwYACNJN5ZLkdjgNHkaKNdWG6MQTmKrBCW4Fmgz1', 'jfNS5l3sre', '2017-08-11 09:02:57', '2017-08-11 09:02:57'),
(51, 'Vince', 'Morissette', '78', 3, '1995-10-12', 'geraldine52@example.org', '10000031', 1, 4, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 2, 1, 1, 0, 'JAhj8sX3ApyhItBeDuFgS4H87sf0M0cqk1jwQCz0', 'XuF47WbE4e', '2017-08-11 09:02:57', '2017-08-11 09:02:57'),
(52, 'Maegan', 'Aufderhar', '44', 1, '1995-10-12', 'williamson.ima@example.net', '10000024', 1, 1, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 1, 2, 1, 0, 'XWLAVECFf995JNUHuwc5wKj1CKcePO5UqdQykdWV', '8TXIgzQZf8', '2017-08-11 09:02:57', '2017-08-11 09:02:57'),
(53, 'Marco', 'Murazik', '12', 3, '1995-10-12', 'dibbert.sam@example.org', '10000037', 1, 5, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 3, 1, 1, 0, 'pm2hFNHvx0yYakuloaaFOr39Wm15w2b1ATRcGtEX', '8Vqd9rEXFv', '2017-08-11 09:02:57', '2017-08-11 09:02:57'),
(54, 'Abagail', 'Okuneva', '68', 1, '1995-10-12', 'schuster.brice@example.com', '10000013', 1, 1, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 2, 1, 1, 0, '6GSC5Ms0eU2hFhrkjezODz19q0MHU8cIPkiijZ51', 'orY3cz1kso', '2017-08-11 09:02:57', '2017-08-11 09:02:57'),
(55, 'Misael', 'Sipes', '71', 1, '1995-10-12', 'xklein@example.org', '10000079', 1, 4, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 1, 2, 0, 0, 'FrdoYRkptQUPZzmLowfArQPl6p0xzpE96j2TY8Ii', 'fmgO6kxUmn', '2017-08-11 09:02:57', '2017-08-11 09:02:57'),
(56, 'Jeff', 'Paucek', '18', 3, '1995-10-12', 'malcolm.brekke@example.com', '10000077', 1, 3, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 1, 1, 0, 0, 'BgRAAIWWfTaeyMUtFGUq1HnqpA74VMNGBehQVdic', 'yWYREmbvqt', '2017-08-11 09:02:57', '2017-08-11 09:02:57'),
(57, 'Eula', 'Lockman', '73', 2, '1995-10-12', 'fbernier@example.net', '10000016', 1, 3, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 3, 2, 0, 0, 'NWFPVVTGphIFvsH3gXdGh47zxKZIzGy0DgASPgcx', 'CJpHiuIEeZ', '2017-08-11 09:02:57', '2017-08-11 09:02:57'),
(58, 'Rory', 'Buckridge', '41', 3, '1995-10-12', 'wilber73@example.com', '10000023', 1, 4, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 1, 1, 0, 0, 'poTOQUvaBcgYG4RPTL379qJ8lpUXVTBSoP3alSSn', 'NgvrLNmQ4m', '2017-08-11 09:02:57', '2017-08-11 09:02:57'),
(59, 'Karli', 'Will', '70', 1, '1995-10-12', 'roy.dach@example.org', '10000098', 1, 4, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 2, 1, 1, 0, 'gesJJY9WghVRRFxKWPNCbgliTw2LZptaDIeWwV9p', 'MSI08o81P8', '2017-08-11 09:02:57', '2017-08-11 09:02:57'),
(60, 'Gordon', 'Medhurst', '66', 2, '1995-10-12', 'germaine00@example.com', '10000007', 1, 4, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 1, 2, 0, 0, 'gtA5N0QBtZCdIzPApdhAX8KfzjmfKP157XFXpPVw', '39BdkxjSfH', '2017-08-11 09:02:57', '2017-08-11 09:02:57'),
(61, 'Cecilia', 'Champlin', '49', 3, '1995-10-12', 'raynor.brycen@example.com', '10000061', 1, 2, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 1, 1, 1, 0, 'lBa2ZF3oyQW3VwrV6k5r4Xm2JuuIJJlpVakwBrsR', '1BY93jZXnQ', '2017-08-11 09:02:57', '2017-08-11 09:02:57'),
(62, 'Halie', 'Kuhic', '9', 1, '1995-10-12', 'weston.stanton@example.com', '10000078', 1, 3, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 1, 1, 0, 0, 'v8lgzQqaFGKn3BbOOxaIw1Ba5e9l0rE45llBHRp2', 'mShaHgfVB5', '2017-08-11 09:02:58', '2017-08-11 09:02:58'),
(63, 'Damon', 'Robel', '100', 2, '1995-10-12', 'filomena26@example.net', '10000051', 1, 4, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 3, 1, 1, 0, 'UrLBJNlTfdXki8rjDKP2IYpNgQa0obSK1EAzZRgB', 'cgxY2XJ8To', '2017-08-11 09:02:58', '2017-08-11 09:02:58'),
(64, 'Warren', 'Cummings', '80', 2, '1995-10-12', 'dicki.terrence@example.net', '10000047', 1, 5, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 3, 1, 0, 0, 'S6dso3P0h7ZH9rqvkJKMkIDtxCbtZyXUH54PwU7J', 'TPva0xrdqL', '2017-08-11 09:02:58', '2017-08-11 09:02:58'),
(65, 'Alexanne', 'Roberts', '97', 2, '1995-10-12', 'obrakus@example.com', '10000075', 1, 2, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 1, 2, 0, 0, 'QJ9mhGrLFf3WhEBgumWHFjC2NAhgTYxAd9hBSsXA', 'eK7v4kauhN', '2017-08-11 09:02:58', '2017-08-11 09:02:58'),
(66, 'Rachael', 'Hackett', '67', 3, '1995-10-12', 'jacobson.gregory@example.com', '10000009', 1, 5, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 1, 1, 1, 0, 'Xj78J1Mk386mZHfclFD1D88kO2R5rJrVPyjqDdjw', 'HV0jbIpOQx', '2017-08-11 09:02:58', '2017-08-11 09:02:58'),
(67, 'Jaquelin', 'Klein', '22', 2, '1995-10-12', 'colson@example.com', '10000097', 1, 4, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 3, 1, 0, 0, '9spNWb7mOF6BhuVSLXdWszyeD3vTOER3wsrdG6HF', '6btIug39sc', '2017-08-11 09:02:58', '2017-08-11 09:02:58'),
(68, 'Adrian', 'Adams', '45', 1, '1995-10-12', 'ycartwright@example.org', '10000069', 1, 2, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 2, 1, 1, 0, 's7VMu9uc1YUoyt5u4iXiWRMo0xoZiK4nDbQXgqul', '5tbnrrzaB1', '2017-08-11 09:02:58', '2017-08-11 09:02:58'),
(69, 'Waylon', 'Farrell', '57', 2, '1995-10-12', 'mayer.christ@example.net', '10000019', 1, 5, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 2, 1, 0, 0, '6bCY8awT3tRn45ZWrHxIYbxNikwkaNBQAwFpZXdV', 'AovTrmWsrM', '2017-08-11 09:02:58', '2017-08-11 09:02:58'),
(70, 'Magdalen', 'Boehm', '13', 1, '1995-10-12', 'raquel30@example.org', '10000083', 1, 3, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 2, 1, 0, 0, 'XMrWlJ3rYMd2MjvAwguYUOHBOfjL7OF6TCX7uoQn', 'l8LcK2Q2ZL', '2017-08-11 09:02:58', '2017-08-11 09:02:58'),
(71, 'Monserrate', 'Kiehn', '65', 3, '1995-10-12', 'hipolito.gleichner@example.org', '10000087', 1, 3, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 2, 1, 1, 0, '9fSMnoHCOUhs7UWDDE0gMv5RISZ3oMXzSHxtdUgl', 'XK1hlBdzMp', '2017-08-11 09:02:58', '2017-08-11 09:02:58'),
(72, 'Sedrick', 'Lakin', '47', 3, '1995-10-12', 'caitlyn.bradtke@example.com', '10000000', 1, 5, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 2, 2, 0, 0, 'sLE9zfR4TkBJSnvpRTFIi04huomQDFMauYRRgK2c', 'VbX5Yu5IMY', '2017-08-11 09:02:58', '2017-08-11 09:02:58'),
(73, 'Lee', 'Hills', '19', 3, '1995-10-12', 'aida.stoltenberg@example.com', '10000033', 1, 1, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 3, 2, 1, 0, 'ALFj378JymhAtybljlxKP8N2Ob8mPb1ToRgaehNr', 'D9E6vDZKxV', '2017-08-11 09:02:58', '2017-08-11 09:02:58'),
(74, 'Grace', 'Hoppe', '76', 2, '1995-10-12', 'dion.hermann@example.com', '10000071', 1, 5, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 2, 2, 0, 0, 'G7ih7VrPNtXXqZyOqyr98fmCU1fCbFJ7SXjrbEqh', 'UTu1jgAevA', '2017-08-11 09:02:58', '2017-08-11 09:02:58'),
(75, 'Dale', 'King', '36', 3, '1995-10-12', 'zboyle@example.com', '10000085', 1, 3, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 2, 2, 1, 0, 'FSM2EShTiBMoukg6Lo0tg6NuPjtaWuQSb56dnE0x', 'QrDxrj1lQH', '2017-08-11 09:02:58', '2017-08-11 09:02:58'),
(76, 'Madelyn', 'Schinner', '27', 3, '1995-10-12', 'leannon.chandler@example.net', '10000094', 1, 3, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 3, 1, 1, 0, 'Ysei2aVvItysGbhFn9mIbUGy6ejpoW5JL7R6QfNu', '1d9SXsXo81', '2017-08-11 09:02:58', '2017-08-11 09:02:58'),
(77, 'Gay', 'Luettgen', '21', 3, '1995-10-12', 'yreichel@example.net', '10000067', 1, 2, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 1, 1, 1, 0, 'gU2CVzLh4xMfwlPV7hqjDE0HTmiXiyTCSjMZ9EiT', 'af4viCRT9t', '2017-08-11 09:02:58', '2017-08-11 09:02:58'),
(78, 'Serena', 'DuBuque', '98', 3, '1995-10-12', 'wboyer@example.com', '10000039', 1, 1, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 2, 1, 0, 0, 'o9kRVbiUm4tUCk8YvUDWYMjRn3rB6egQ1XVcjsb8', 'TvxOWnneKJ', '2017-08-11 09:02:58', '2017-08-11 09:02:58'),
(79, 'Lynn', 'Friesen', '31', 3, '1995-10-12', 'roberts.roma@example.com', '10000046', 1, 4, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 3, 1, 0, 0, 'HbwH5bhJsDcaJO8oAjFb7uZVKiC2QQa8XpKNeJ0S', 'RBnxVqVknQ', '2017-08-11 09:02:58', '2017-08-11 09:02:58'),
(80, 'Ike', 'Kessler', '25', 3, '1995-10-12', 'stark.glennie@example.org', '10000053', 1, 1, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 2, 1, 0, 0, 'ejcs30JrmAgcpZhqTxByndqjusrnChmhWIyq6UwC', 'ocUNbkhMHg', '2017-08-11 09:02:58', '2017-08-11 09:02:58'),
(81, 'Lora', 'Kunze', '32', 1, '1995-10-12', 'price.leannon@example.org', '10000058', 1, 4, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 3, 1, 1, 0, 'T4hHHr20ew2g2Rik6ISJmIkHr3wjunv9FxBKW7Pt', 'NxGOCsLFyF', '2017-08-11 09:02:58', '2017-08-11 09:02:58'),
(82, 'Ruthe', 'Weimann', '35', 1, '1995-10-12', 'chaz.stroman@example.org', '10000095', 1, 4, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 3, 2, 1, 0, 'W2QsgS7THqRist90KAMkEomy8qnSQbVoyOGa2Hty', 'VfJkTblsBa', '2017-08-11 09:02:58', '2017-08-11 09:02:58'),
(83, 'Jakob', 'Moen', '86', 2, '1995-10-12', 'richie63@example.org', '10000089', 1, 1, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 1, 2, 0, 0, '7zR2XBFvxssTxbRI46tUaK6Um3n6vmE5R5rVgIc6', 'nNlT3Hpe8H', '2017-08-11 09:02:58', '2017-08-11 09:02:58'),
(84, 'Guadalupe', 'O\'Reilly', '81', 2, '1995-10-12', 'madisen65@example.com', '10000017', 1, 4, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 1, 1, 0, 0, 'dWjfMubVb03jkTBOWeez21Ksa0Bch8tFs69RzzOo', 'aKgVBBUouR', '2017-08-11 09:02:58', '2017-08-11 09:02:58'),
(85, 'Alford', 'Lind', '38', 1, '1995-10-12', 'sroberts@example.com', '10000081', 1, 1, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 1, 2, 0, 0, 'zZFBWqdeKqaxCXUUrrg9fnSIp3QfCjWbBWJjE24d', 'qpZsCJ1AR1', '2017-08-11 09:02:58', '2017-08-11 09:02:58'),
(86, 'Reynold', 'Nolan', '55', 2, '1995-10-12', 'ostokes@example.org', '10000022', 1, 2, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 2, 1, 0, 0, 'l16Wl5Mgix5urDhgj9kRnqJgb8mPf6WUnB3JRPG2', 'RafCtu8VaB', '2017-08-11 09:02:58', '2017-08-11 09:02:58'),
(87, 'Thomas', 'Ullrich', '6', 1, '1995-10-12', 'vlittel@example.org', '10000029', 1, 3, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 1, 1, 1, 0, 'vFZBJHY0Tk9mXARZqV3DUc6FGKj3uj3atwv6DCyr', 'an8uBucJdW', '2017-08-11 09:02:58', '2017-08-11 09:02:58'),
(88, 'Miles', 'Feest', '33', 3, '1995-10-12', 'qhirthe@example.net', '10000055', 1, 1, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 1, 2, 0, 0, 'iNPMQSMQA2N9M004YSRp3hcrLtCzjWGcu5lAd2sw', 'T9DvYNPwGk', '2017-08-11 09:02:58', '2017-08-11 09:02:58'),
(89, 'Odie', 'Klocko', '1', 1, '1995-10-12', 'twatsica@example.org', '10000062', 1, 5, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 2, 1, 0, 0, '91lz3rVOWtBwZvmnuIlxgPzgcSLxpJZesN4Wbs77', 'sgIz9D1UNe', '2017-08-11 09:02:58', '2017-08-11 09:02:58'),
(90, 'Tiara', 'Cummings', '89', 3, '1995-10-12', 'dtorphy@example.com', '10000002', 1, 3, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 2, 1, 0, 0, '5YdTr0lBcaOz0mZYDNowhzJ928GZAFw2JjfAuH6D', 'wQoV3fbyuN', '2017-08-11 09:02:58', '2017-08-11 09:02:58'),
(91, 'Melody', 'Sanford', '62', 3, '1995-10-12', 'schaefer.angelica@example.net', '10000076', 1, 5, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 3, 1, 1, 0, 'kvUAGlVSLTNwCovwdQaL0FNaTNhEO9Mnpp1PuDjS', 'xeaO4e8uZy', '2017-08-11 09:02:58', '2017-08-11 09:02:58'),
(92, 'Cierra', 'Labadie', '91', 2, '1995-10-12', 'lgusikowski@example.com', '10000035', 1, 4, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 3, 1, 0, 0, 'vPElw0elwjZfZPiX9IxeQMtoYfWsDtEeSLlOaLF3', '4iAs0cQp52', '2017-08-11 09:02:58', '2017-08-11 09:02:58'),
(93, 'Ramon', 'Wyman', '26', 2, '1995-10-12', 'zoila60@example.org', '10000063', 1, 4, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 3, 1, 0, 0, 'vBr9AZE51l6KG6EFbmxr6ZhGGutCcuROtVS1jN1T', 'zkwNUNOlxK', '2017-08-11 09:02:58', '2017-08-11 09:02:58'),
(94, 'Monroe', 'Hoppe', '53', 2, '1995-10-12', 'jayde84@example.org', '10000003', 1, 1, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 3, 1, 0, 0, 'HPmLWs7OJVJdzkviJkzqRS1OtwKrln3EGFjhaIIJ', 'dGxDlhFI78', '2017-08-11 09:02:58', '2017-08-11 09:02:58'),
(95, 'Edwin', 'Marks', '56', 2, '1995-10-12', 'xhahn@example.com', '10000066', 1, 4, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 3, 2, 1, 0, 'pRhageEOOSVPjsMOIJCCaSb2WGSjlDetL6HXJOkM', 'yjWkzpyybX', '2017-08-11 09:02:58', '2017-08-11 09:02:58'),
(96, 'Elliot', 'Kris', '52', 3, '1995-10-12', 'bgraham@example.org', '10000090', 1, 1, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 2, 2, 0, 0, '6MSCdIqtdJepghLQXirOdNgFVePHjzhhghm3LYM1', 'Is7HAGlYx4', '2017-08-11 09:02:58', '2017-08-11 09:02:58'),
(97, 'Zelda', 'Schuppe', '92', 1, '1995-10-12', 'cordie20@example.org', '10000010', 1, 4, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 3, 1, 0, 0, 'hMvAKqNOhftftE65uGsyOlaZQx6WZfuuC2jCUyF6', 'WAaYYQNku1', '2017-08-11 09:02:58', '2017-08-11 09:02:58'),
(98, 'Jadon', 'Nicolas', '37', 1, '1995-10-12', 'tward@example.com', '10000034', 1, 5, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 2, 1, 1, 0, '9L1EyQJ9J4ZEsFTjqarNtFtUHbTjD2ARji2Le8DX', 't6XjsZtU93', '2017-08-11 09:02:59', '2017-08-11 09:02:59'),
(99, 'Floy', 'Feest', '88', 1, '1995-10-12', 'ewell.johnson@example.net', '10000068', 1, 2, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 3, 1, 0, 0, 'g54MwMQmognhm3Qqf1m4k1hqZ2NfJJxq8I5D4wwz', 'KUBGV6mnSe', '2017-08-11 09:02:59', '2017-08-11 09:02:59'),
(100, 'Marcelle', 'Hodkiewicz', '83', 1, '1995-10-12', 'bette03@example.net', '10000057', 1, 3, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 1, 1, 0, 0, '8hGzO1KmYfnmtM0nKgp6jt57QOkG2uMZAXsAoXJu', 'DqikXcksPr', '2017-08-11 09:02:59', '2017-08-11 09:02:59'),
(101, 'Leila', 'Gibson', '5', 3, '1995-10-12', 'beatty.tiara@example.com', '10000005', 1, 5, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 3, 2, 1, 0, 'w5JmDCML2qG7vJRC4mEQmPNZonYaLXi4HmdKTPE8', 'RB4ZVwX5jl', '2017-08-11 09:02:59', '2017-08-11 09:02:59'),
(102, 'Jasper', 'Murray', '20', 2, '1995-10-12', 'monica96@example.org', '10000070', 1, 3, 'Calle 26 No 51-53', NULL, NULL, NULL, '$2y$10$9Ckmp0KrUkNxcGXvlEx9Juz6bybYBPnVmM4JkE6YHSXoEk3TJJE9m', 2, 1, 1, 0, 'n6Qoui0ScUJl62PfYOxj5IPhPfJ2jbn6BidQ2ROn', 'OO49Pda2rp', '2017-08-11 09:02:59', '2017-08-11 09:02:59'),
(103, 'fidel', 'Marcano ', '12313', 1, '1999-08-02', 'fidelmedinam2@gmail.com', '59498', 1, 1, 'wdadawdawd', '1502428810_2017-05-10T203747Z_348663143_RC186D749340_RTRMADP_3_VENEZUELA-POLITICS.jpg', '1502428810_20637820_10212799886967221_8774008203399009287_n.jpg', '1502428810_20526280_10212811228450751_8041866557651440497_n.jpg', '$2y$10$2zbGcInNc9MHwpOmOlqr7eQ1A3q13P2YLobLVYydViwLxEoxKSOq2', 2, 2, 1, 2, 'jPxILPW6q2qJ9p2ppMNbFSQne1MuswNqt3dxyN6E', NULL, '2017-08-11 09:20:10', '2017-08-11 09:20:10');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `califications`
--
ALTER TABLE `califications`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `chat12`
--
ALTER TABLE `chat12`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `houses`
--
ALTER TABLE `houses`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indices de la tabla `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `publications`
--
ALTER TABLE `publications`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tpets`
--
ALTER TABLE `tpets`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_n_id_unique` (`n_id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_cellphone_unique` (`cellphone`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `califications`
--
ALTER TABLE `califications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `chat12`
--
ALTER TABLE `chat12`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `chats`
--
ALTER TABLE `chats`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `files`
--
ALTER TABLE `files`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `houses`
--
ALTER TABLE `houses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `pets`
--
ALTER TABLE `pets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `publications`
--
ALTER TABLE `publications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tpets`
--
ALTER TABLE `tpets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

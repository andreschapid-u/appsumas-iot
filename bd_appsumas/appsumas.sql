-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 05-08-2019 a las 06:36:11
-- Versión del servidor: 5.7.27-0ubuntu0.18.04.1
-- Versión de PHP: 7.3.5-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `appsumas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `avatars`
--

CREATE TABLE `avatars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `level_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `characteristics` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `avatars`
--

INSERT INTO `avatars` (`id`, `level_id`, `name`, `route`, `characteristics`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Abeja', 'https://appsumas.test/avatars/Nivel_1/abejaT.png', 'Sonante y veloz', '2019-08-05 15:15:59', '2019-08-05 15:15:59', NULL),
(2, 1, 'Araña', 'https://appsumas.test/avatars/Nivel_1/araniaT.png', 'Cazadora', '2019-08-05 15:15:59', '2019-08-05 15:15:59', NULL),
(3, 1, 'Mariposa', 'https://appsumas.test/avatars/Nivel_1/mariposaT.png', 'Sonante y veloz', '2019-08-05 15:15:59', '2019-08-05 15:15:59', NULL),
(4, 2, 'Conejo', 'https://appsumas.test/avatars/Nivel_2/conejoT.png', 'Brinca sin cansarse', '2019-08-05 15:15:59', '2019-08-05 15:15:59', NULL),
(5, 2, 'Gato', 'https://appsumas.test/avatars/Nivel_2/gatoT.png', 'Maúlla todo el día', '2019-08-05 15:15:59', '2019-08-05 15:15:59', NULL),
(6, 2, 'Perro', 'https://appsumas.test/avatars/Nivel_2/perroT.png', 'Ladra y se muerde la cola', '2019-08-05 15:15:59', '2019-08-05 15:15:59', NULL),
(7, 3, 'Búfalo', 'https://appsumas.test/avatars/Nivel_3/bufaloT.png', 'Un imponente animal de cuernos fuertes', '2019-08-05 15:15:59', '2019-08-05 15:15:59', NULL),
(8, 3, 'Cebra', 'https://appsumas.test/avatars/Nivel_3/cebraT.png', 'LLeva un hermoso pelaje rallado', '2019-08-05 15:15:59', '2019-08-05 15:15:59', NULL),
(9, 3, 'Mono', 'https://appsumas.test/avatars/Nivel_3/monoT.png', 'Va de árbol en árbol comiendo banano', '2019-08-05 15:15:59', '2019-08-05 15:15:59', NULL),
(10, 4, 'Elefante', 'https://appsumas.test/avatars/Nivel_4/elefanteT.png', 'Un imponente animal de orejas grandes', '2019-08-05 15:15:59', '2019-08-05 15:15:59', NULL),
(11, 4, 'Jirafa', 'https://appsumas.test/avatars/Nivel_4/jirafaT.png', 'Tan alta que toca el cielo', '2019-08-05 15:15:59', '2019-08-05 15:15:59', NULL),
(12, 4, 'Tigre', 'https://appsumas.test/avatars/Nivel_4/tigreT.png', 'Un feroz animal', '2019-08-05 15:15:59', '2019-08-05 15:15:59', NULL),
(13, 5, 'Leon', 'https://appsumas.test/avatars/Nivel_5/leonT.png', 'El rey de la selva, todos quieren ser como él', '2019-08-05 15:15:59', '2019-08-05 15:15:59', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `challenges`
--

CREATE TABLE `challenges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `estate` tinyint(1) NOT NULL DEFAULT '0',
  `difficulty` enum('1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `num_sums` smallint(6) NOT NULL DEFAULT '0',
  `num_subtraction` smallint(6) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `challenges_children`
--

CREATE TABLE `challenges_children` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `challenge_id` bigint(20) UNSIGNED NOT NULL,
  `child_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `children`
--

CREATE TABLE `children` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `avatar_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `gender` enum('Male','Female') COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `children_levels`
--

CREATE TABLE `children_levels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `child_id` bigint(20) UNSIGNED NOT NULL,
  `level_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `children_operations`
--

CREATE TABLE `children_operations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `child_id` bigint(20) UNSIGNED NOT NULL,
  `operation_id` bigint(20) UNSIGNED NOT NULL,
  `answer` smallint(6) NOT NULL,
  `state` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `devices`
--

CREATE TABLE `devices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `mac` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` tinyint(1) NOT NULL DEFAULT '0',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `current_tag_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feedback` enum('0','1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT 'Neutral=0, Correct=1, Incorrect=2',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `levels`
--

CREATE TABLE `levels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `level` int(11) NOT NULL,
  `experience` smallint(5) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `levels`
--

INSERT INTO `levels` (`id`, `level`, `experience`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 0, '2019-08-05 15:15:59', '2019-08-05 15:15:59', NULL),
(2, 2, 15, '2019-08-05 15:15:59', '2019-08-05 15:15:59', NULL),
(3, 3, 40, '2019-08-05 15:15:59', '2019-08-05 15:15:59', NULL),
(4, 4, 90, '2019-08-05 15:15:59', '2019-08-05 15:15:59', NULL),
(5, 5, 200, '2019-08-05 15:15:59', '2019-08-05 15:15:59', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2013_07_22_105030_create_roles_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_07_22_101905_create_devices_table', 1),
(5, '2019_07_22_104059_create_challenges_table', 1),
(6, '2019_07_22_105921_create_levels_table', 1),
(7, '2019_07_22_110049_create_images_table', 1),
(8, '2019_07_22_110633_create_avatars_table', 1),
(9, '2019_07_22_114742_create_children_table', 1),
(10, '2019_07_22_115038_challenge_child', 1),
(11, '2019_07_22_123414_child_level', 1),
(12, '2019_07_22_124928_create_operations_table', 1),
(13, '2019_07_22_130329_child_operation', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operations`
--

CREATE TABLE `operations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `challenge_id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('Sum','Subtraction') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Sum',
  `value_one` smallint(6) NOT NULL DEFAULT '0',
  `value_two` smallint(6) NOT NULL DEFAULT '0',
  `value_three` smallint(6) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', NULL, '2019-08-05 15:15:59', '2019-08-05 15:15:59'),
(2, 'Tutor', NULL, '2019-08-05 15:15:59', '2019-08-05 15:15:59'),
(3, 'Jugador', NULL, '2019-08-05 15:15:59', '2019-08-05 15:15:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `role_id`, `first_name`, `last_name`, `email`, `password`, `email_verified_at`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 2, 'Carlos', 'Andres', 'carloschapid@unicauca.edu.co', '$2y$10$G6pfuWYzScWBCHEe6mJBkOAxpMl1oKwXlBNyFzysmZgrhesYSlOp.', NULL, NULL, NULL, '2019-08-05 15:16:22', '2019-08-05 15:16:22');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `avatars`
--
ALTER TABLE `avatars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `avatars_level_id_foreign` (`level_id`);

--
-- Indices de la tabla `challenges`
--
ALTER TABLE `challenges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `challenges_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `challenges_children`
--
ALTER TABLE `challenges_children`
  ADD PRIMARY KEY (`id`),
  ADD KEY `challenges_children_challenge_id_foreign` (`challenge_id`),
  ADD KEY `challenges_children_child_id_foreign` (`child_id`);

--
-- Indices de la tabla `children`
--
ALTER TABLE `children`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `children_code_unique` (`code`),
  ADD KEY `children_user_id_foreign` (`user_id`),
  ADD KEY `children_avatar_id_foreign` (`avatar_id`);

--
-- Indices de la tabla `children_levels`
--
ALTER TABLE `children_levels`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `children_levels_child_id_level_id_unique` (`child_id`,`level_id`),
  ADD KEY `children_levels_level_id_foreign` (`level_id`);

--
-- Indices de la tabla `children_operations`
--
ALTER TABLE `children_operations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `children_operations_child_id_foreign` (`child_id`),
  ADD KEY `children_operations_operation_id_foreign` (`operation_id`);

--
-- Indices de la tabla `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `devices_mac_unique` (`mac`),
  ADD KEY `devices_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `levels_level_unique` (`level`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `operations`
--
ALTER TABLE `operations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `operations_challenge_id_foreign` (`challenge_id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `avatars`
--
ALTER TABLE `avatars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `challenges`
--
ALTER TABLE `challenges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `challenges_children`
--
ALTER TABLE `challenges_children`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `children`
--
ALTER TABLE `children`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `children_levels`
--
ALTER TABLE `children_levels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `children_operations`
--
ALTER TABLE `children_operations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `devices`
--
ALTER TABLE `devices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `levels`
--
ALTER TABLE `levels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `operations`
--
ALTER TABLE `operations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `avatars`
--
ALTER TABLE `avatars`
  ADD CONSTRAINT `avatars_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`);

--
-- Filtros para la tabla `challenges`
--
ALTER TABLE `challenges`
  ADD CONSTRAINT `challenges_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `challenges_children`
--
ALTER TABLE `challenges_children`
  ADD CONSTRAINT `challenges_children_challenge_id_foreign` FOREIGN KEY (`challenge_id`) REFERENCES `challenges` (`id`),
  ADD CONSTRAINT `challenges_children_child_id_foreign` FOREIGN KEY (`child_id`) REFERENCES `children` (`id`);

--
-- Filtros para la tabla `children`
--
ALTER TABLE `children`
  ADD CONSTRAINT `children_avatar_id_foreign` FOREIGN KEY (`avatar_id`) REFERENCES `avatars` (`id`),
  ADD CONSTRAINT `children_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `children_levels`
--
ALTER TABLE `children_levels`
  ADD CONSTRAINT `children_levels_child_id_foreign` FOREIGN KEY (`child_id`) REFERENCES `children` (`id`),
  ADD CONSTRAINT `children_levels_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`);

--
-- Filtros para la tabla `children_operations`
--
ALTER TABLE `children_operations`
  ADD CONSTRAINT `children_operations_child_id_foreign` FOREIGN KEY (`child_id`) REFERENCES `children` (`id`),
  ADD CONSTRAINT `children_operations_operation_id_foreign` FOREIGN KEY (`operation_id`) REFERENCES `operations` (`id`);

--
-- Filtros para la tabla `devices`
--
ALTER TABLE `devices`
  ADD CONSTRAINT `devices_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `operations`
--
ALTER TABLE `operations`
  ADD CONSTRAINT `operations_challenge_id_foreign` FOREIGN KEY (`challenge_id`) REFERENCES `challenges` (`id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

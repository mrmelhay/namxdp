-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Сен 14 2018 г., 23:24
-- Версия сервера: 5.7.23
-- Версия PHP: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `xdpbaza`
--

-- --------------------------------------------------------

--
-- Структура таблицы `assets`
--

CREATE TABLE `assets` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `assets`
--

INSERT INTO `assets` (`id`, `name`, `slug`, `class`, `created_at`, `updated_at`) VALUES
(1, 'Асосий', '/', 'HomeController@index', NULL, NULL),
(2, 'Маълумотнома', '/preferences', 'Preferences@index', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `bpt`
--

CREATE TABLE `bpt` (
  `bpt_id` int(10) UNSIGNED NOT NULL,
  `bpt_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bpt_speciality` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bpt_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bpt_is_mfy` int(11) NOT NULL,
  `bpt_region_id` int(11) NOT NULL,
  `bpt_district_id` int(11) NOT NULL,
  `bpt_party_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `bpt_allright`
--

CREATE TABLE `bpt_allright` (
  `btp_paid_id` int(10) UNSIGNED NOT NULL,
  `bpt_is_paid` int(11) NOT NULL,
  `bpt_is_paid_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `bpt_bind`
--

CREATE TABLE `bpt_bind` (
  `bpt_bind_id` int(10) UNSIGNED NOT NULL,
  `bpt_id` int(11) NOT NULL,
  `bpt_person_count` int(11) NOT NULL,
  `bpt_person_count_date` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `bpt_contact_bind`
--

CREATE TABLE `bpt_contact_bind` (
  `btp_has_id` int(10) UNSIGNED NOT NULL,
  `bpt_has_contact` int(11) NOT NULL,
  `bpt_has_contact_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `bpt_paid_bind`
--

CREATE TABLE `bpt_paid_bind` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `district`
--

CREATE TABLE `district` (
  `district_id` int(10) UNSIGNED NOT NULL,
  `region_id` int(11) NOT NULL,
  `district_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_09_06_132228_create_region_table', 1),
(4, '2018_09_06_132850_create_district_table', 1),
(5, '2018_09_06_133601_create_sex_table', 1),
(6, '2018_09_06_133613_create_netion_table', 1),
(7, '2018_09_06_133639_create_socialcat_table', 1),
(8, '2018_09_06_133748_create_party_table', 1),
(9, '2018_09_06_133825_create_party_bind_table', 1),
(10, '2018_09_06_133852_create_bpt_table', 1),
(11, '2018_09_06_133917_create_bpt_bind_table', 1),
(12, '2018_09_06_133935_create_bpt_contact_bind_table', 1),
(13, '2018_09_06_133956_create_bpt_paid_bind_table', 1),
(14, '2018_09_06_134020_create_bpt_allrith_table', 1),
(15, '2018_09_06_134050_create_rolls_table', 1),
(16, '2018_09_06_134106_create_userunit_table', 1),
(17, '2018_09_14_170505_create_assets_table', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `nation`
--

CREATE TABLE `nation` (
  `nation_id` int(10) UNSIGNED NOT NULL,
  `nation_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `party`
--

CREATE TABLE `party` (
  `party_id` int(10) UNSIGNED NOT NULL,
  `party_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `party_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `party_director` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `party_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `party_region` int(11) NOT NULL,
  `party_distirict` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `party_bind`
--

CREATE TABLE `party_bind` (
  `party_bind_id` int(10) UNSIGNED NOT NULL,
  `party_id` int(11) NOT NULL,
  `party_date` date NOT NULL,
  `party_price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `region`
--

CREATE TABLE `region` (
  `region_id` int(10) UNSIGNED NOT NULL,
  `region_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `rolls`
--

CREATE TABLE `rolls` (
  `rol_id` int(10) UNSIGNED NOT NULL,
  `rol_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rol_access` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `sex`
--

CREATE TABLE `sex` (
  `sex_id` int(10) UNSIGNED NOT NULL,
  `sex_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `socialcat`
--

CREATE TABLE `socialcat` (
  `soc_id` int(10) UNSIGNED NOT NULL,
  `soc_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'bahrom', 'bahrom1982@gmail.com', '$2y$10$UsJ0yVjO.ZVl12/s3J882epHRBbtZhqmTIgo5zS1L2EzuHk65hu/e', 1, 'HC6Gmyl14BeyxgBjagES2VGBeMz23gkjqClNYphA2jgeE0P95SEPNE8H6rsB', '2018-09-14 07:32:48', '2018-09-14 07:32:48');

-- --------------------------------------------------------

--
-- Структура таблицы `userunit`
--

CREATE TABLE `userunit` (
  `userunit_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `rol_id` int(11) NOT NULL,
  `party_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `bpt`
--
ALTER TABLE `bpt`
  ADD PRIMARY KEY (`bpt_id`);

--
-- Индексы таблицы `bpt_allright`
--
ALTER TABLE `bpt_allright`
  ADD PRIMARY KEY (`btp_paid_id`);

--
-- Индексы таблицы `bpt_bind`
--
ALTER TABLE `bpt_bind`
  ADD PRIMARY KEY (`bpt_bind_id`);

--
-- Индексы таблицы `bpt_contact_bind`
--
ALTER TABLE `bpt_contact_bind`
  ADD PRIMARY KEY (`btp_has_id`);

--
-- Индексы таблицы `bpt_paid_bind`
--
ALTER TABLE `bpt_paid_bind`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`district_id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `nation`
--
ALTER TABLE `nation`
  ADD PRIMARY KEY (`nation_id`);

--
-- Индексы таблицы `party`
--
ALTER TABLE `party`
  ADD PRIMARY KEY (`party_id`);

--
-- Индексы таблицы `party_bind`
--
ALTER TABLE `party_bind`
  ADD PRIMARY KEY (`party_bind_id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`region_id`);

--
-- Индексы таблицы `rolls`
--
ALTER TABLE `rolls`
  ADD PRIMARY KEY (`rol_id`);

--
-- Индексы таблицы `sex`
--
ALTER TABLE `sex`
  ADD PRIMARY KEY (`sex_id`);

--
-- Индексы таблицы `socialcat`
--
ALTER TABLE `socialcat`
  ADD PRIMARY KEY (`soc_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Индексы таблицы `userunit`
--
ALTER TABLE `userunit`
  ADD PRIMARY KEY (`userunit_id`),
  ADD KEY `userunit_user_id_index` (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `assets`
--
ALTER TABLE `assets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `bpt`
--
ALTER TABLE `bpt`
  MODIFY `bpt_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `bpt_allright`
--
ALTER TABLE `bpt_allright`
  MODIFY `btp_paid_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `bpt_bind`
--
ALTER TABLE `bpt_bind`
  MODIFY `bpt_bind_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `bpt_contact_bind`
--
ALTER TABLE `bpt_contact_bind`
  MODIFY `btp_has_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `bpt_paid_bind`
--
ALTER TABLE `bpt_paid_bind`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `district`
--
ALTER TABLE `district`
  MODIFY `district_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `nation`
--
ALTER TABLE `nation`
  MODIFY `nation_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `party`
--
ALTER TABLE `party`
  MODIFY `party_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `party_bind`
--
ALTER TABLE `party_bind`
  MODIFY `party_bind_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `region`
--
ALTER TABLE `region`
  MODIFY `region_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `rolls`
--
ALTER TABLE `rolls`
  MODIFY `rol_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `sex`
--
ALTER TABLE `sex`
  MODIFY `sex_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `socialcat`
--
ALTER TABLE `socialcat`
  MODIFY `soc_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `userunit`
--
ALTER TABLE `userunit`
  MODIFY `userunit_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

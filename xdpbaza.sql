-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 01 2018 г., 16:45
-- Версия сервера: 5.7.19
-- Версия PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
  `updated_at` timestamp NULL DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `ordering` int(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `assets`
--

INSERT INTO `assets` (`id`, `name`, `slug`, `class`, `created_at`, `updated_at`, `active`, `ordering`) VALUES
(1, 'Асосий', '/', 'HomeController@index', NULL, NULL, 1, 1),
(2, 'Маълумотнома', '/preferences', 'Preferences@index', NULL, NULL, 0, 0);

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `bpt`
--

INSERT INTO `bpt` (`bpt_id`, `bpt_name`, `bpt_speciality`, `bpt_address`, `bpt_is_mfy`, `bpt_region_id`, `bpt_district_id`, `bpt_party_id`, `created_at`, `updated_at`, `is_deleted`) VALUES
(1, 'Namangan davlat universiteti', 'Oliy talim ', 'amir temir kuchasi 33 uy', 0, 7, 95, 1, NULL, NULL, 0),
(2, 'ksndkcj skdc', 'kjn skjdcn ksk', 'ksjn dkjn skdcn sk', 0, 3, 37, 1, NULL, NULL, 0);

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

--
-- Дамп данных таблицы `district`
--

INSERT INTO `district` (`district_id`, `region_id`, `district_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Амударё тумани', NULL, NULL),
(2, 1, 'Беруний тумани', NULL, NULL),
(3, 1, 'Қораузоқ тумани', NULL, NULL),
(4, 1, 'Кегейли тумани', NULL, NULL),
(5, 1, 'Қўнғирот тумани', NULL, NULL),
(6, 1, 'Қанликўл тумани', NULL, NULL),
(7, 1, 'Мўйнақ тумани', NULL, NULL),
(8, 1, 'Нукус тумани', NULL, NULL),
(9, 1, 'Тахтакўпир тумани', NULL, NULL),
(10, 1, 'Тўрткўл тумани', NULL, NULL),
(11, 1, 'Хўжайли тумани', NULL, NULL),
(12, 1, 'Чимбой тумани', NULL, NULL),
(13, 1, 'Шуманай тумани', NULL, NULL),
(14, 1, 'Элликқалъа тумани', NULL, NULL),
(15, 1, 'Нукус ш.', NULL, NULL),
(16, 1, 'Тахиотош ш.', NULL, NULL),
(17, 2, 'Олтинкўл тумани', NULL, NULL),
(18, 2, 'Андижон тумани', NULL, NULL),
(19, 2, 'Балиқчи тумани', NULL, NULL),
(20, 2, 'Бўз тумани ', NULL, NULL),
(21, 2, 'Булоқбоши тумани', NULL, NULL),
(22, 2, 'Жалолқудиқ тумани', NULL, NULL),
(23, 2, 'Избоскан тумани', NULL, NULL),
(24, 2, 'Улуғнор тумани', NULL, NULL),
(25, 2, 'Қўрғонтепа тумани', NULL, NULL),
(26, 2, 'Асака тумани', NULL, NULL),
(27, 2, 'Мархамат тумани', NULL, NULL),
(28, 2, 'Шахрихон тумани', NULL, NULL),
(29, 2, 'Пахтаобод тумани', NULL, NULL),
(30, 2, 'Хўжаобод тумани', NULL, NULL),
(31, 2, 'АНДИЖОН ш. ', NULL, NULL),
(32, 2, 'Асака ш.', NULL, NULL),
(33, 2, 'Хонобод ш.', NULL, NULL),
(34, 3, 'Олот тумани', NULL, NULL),
(35, 3, 'Бухоро тумани', NULL, NULL),
(36, 3, 'Вобкент тумани', NULL, NULL),
(37, 3, 'Ғиждувон тумани', NULL, NULL),
(38, 3, 'Когон тумани', NULL, NULL),
(39, 3, 'Қоракўл тумани', NULL, NULL),
(40, 3, 'Қоровулбозор тумани', NULL, NULL),
(41, 3, 'Пешку тумани', NULL, NULL),
(42, 3, 'Ромитон тумани', NULL, NULL),
(43, 3, 'Жондор тумани', NULL, NULL),
(44, 3, 'Шофиркон тумани', NULL, NULL),
(45, 3, 'Бухоро ш.', NULL, NULL),
(46, 3, 'Когон ш.', NULL, NULL),
(47, 4, 'Арнасай тумани', NULL, NULL),
(48, 4, 'Бахмал тумани', NULL, NULL),
(49, 4, 'Ғаллаорол тумани', NULL, NULL),
(50, 4, 'Жиззах тумани', NULL, NULL),
(51, 4, 'Дўстлик тумани', NULL, NULL),
(52, 4, 'Зомин тумани', NULL, NULL),
(53, 4, 'Зарбдор тумани', NULL, NULL),
(54, 4, 'Мирзачўл тумани', NULL, NULL),
(55, 4, 'Зафарабод тумани', NULL, NULL),
(56, 4, 'Пахтакор тумани', NULL, NULL),
(57, 4, 'Фориш тумани', NULL, NULL),
(58, 4, 'Янгиобод тумани', NULL, NULL),
(59, 4, 'Жиззах ш.', NULL, NULL),
(60, 5, 'Ғузор тумани', NULL, NULL),
(61, 5, 'Дехқонобод тумани', NULL, NULL),
(62, 5, 'Қамаши тумани', NULL, NULL),
(63, 5, 'Қарши тумани', NULL, NULL),
(64, 5, 'Косон тумани', NULL, NULL),
(65, 5, 'Китоб тумани', NULL, NULL),
(66, 5, 'Миришкор тумани', NULL, NULL),
(67, 5, 'Мубарак тумани', NULL, NULL),
(68, 5, 'Нишон тумани', NULL, NULL),
(69, 5, 'Касби тумани', NULL, NULL),
(70, 5, 'Чироқчи тумани', NULL, NULL),
(71, 5, 'Шахрисабз тумани', NULL, NULL),
(72, 5, 'Яккабоғ тумани', NULL, NULL),
(73, 5, 'Қарши ш.', NULL, NULL),
(74, 6, 'Конимех тумани', NULL, NULL),
(75, 6, 'Қизилтепа тумани', NULL, NULL),
(76, 6, 'Навбахор тумани', NULL, NULL),
(77, 6, 'Кармана тумани', NULL, NULL),
(78, 6, 'Нурота тумани', NULL, NULL),
(79, 6, 'Томди тумани', NULL, NULL),
(80, 6, 'Учқудиқ тумани', NULL, NULL),
(81, 6, 'Хатирчи тумани', NULL, NULL),
(82, 6, 'Навоий ш.', NULL, NULL),
(83, 6, 'Зарафшон ш.', NULL, NULL),
(84, 7, 'Мингбулоқ тумани', NULL, NULL),
(85, 7, 'Косонсой тумани', NULL, NULL),
(86, 7, 'Наманган тумани', NULL, NULL),
(87, 7, 'Норин тумани', NULL, NULL),
(88, 7, 'Поп тумани', NULL, NULL),
(89, 7, 'Тўрақўрғон тумани', NULL, NULL),
(90, 7, 'Уйчи тумани', NULL, NULL),
(91, 7, 'Учқўрғон тумани', NULL, NULL),
(92, 7, 'Чортоқ тумани', NULL, NULL),
(93, 7, 'Чуст тумани', NULL, NULL),
(94, 7, 'Янгиқўрғон тумани', NULL, NULL),
(95, 7, 'Наманган ш.', NULL, NULL),
(96, 8, 'Оқдарё тумани', NULL, NULL),
(97, 8, 'Булунғир тумани', NULL, NULL),
(98, 8, 'Жомбой тумани', NULL, NULL),
(99, 8, 'Иштихон тумани', NULL, NULL),
(100, 8, 'Каттақўрғон тумани', NULL, NULL),
(101, 8, 'Қўшробод тумани', NULL, NULL),
(102, 8, 'Нарпай тумани', NULL, NULL),
(103, 8, 'Пойариқ тумани', NULL, NULL),
(104, 8, 'Пастдарғом тумани', NULL, NULL),
(105, 8, 'Пахтачи тумани', NULL, NULL),
(106, 8, 'Самарқанд тумани', NULL, NULL),
(107, 8, 'Нуробод тумани', NULL, NULL),
(108, 8, 'Ургут тумани', NULL, NULL),
(109, 8, 'Тойлоқ тумани', NULL, NULL),
(110, 8, 'Самарқанд ш.', NULL, NULL),
(111, 8, 'г. Каттакурган ', NULL, NULL),
(112, 9, 'Олтинсой тумани', NULL, NULL),
(113, 9, 'Бойсун тумани', NULL, NULL),
(114, 9, 'Бандихон тумани', NULL, NULL),
(115, 9, 'Музробод тумани', NULL, NULL),
(116, 9, 'Денов тумани', NULL, NULL),
(117, 9, 'Жарқўрғон тумани', NULL, NULL),
(118, 9, 'Қумқўрғон тумани', NULL, NULL),
(119, 9, 'Қизириқ тумани', NULL, NULL),
(120, 9, 'Сариосиё тумани', NULL, NULL),
(121, 9, 'Термиз тумани', NULL, NULL),
(122, 9, 'Шеробод тумани', NULL, NULL),
(123, 9, 'Шўрчи тумани', NULL, NULL),
(124, 9, 'Термиз ш.', NULL, NULL),
(125, 10, 'Оқолтин тумани', NULL, NULL),
(126, 10, 'Боёвут тумани', NULL, NULL),
(127, 10, 'Сайхунобод тумани', NULL, NULL),
(128, 10, 'Гулистон тумани', NULL, NULL),
(129, 10, 'Сардобо тумани', NULL, NULL),
(130, 10, 'Мирзаобод тумани', NULL, NULL),
(131, 10, 'Сирдарё тумани', NULL, NULL),
(132, 10, 'Ховост тумани', NULL, NULL),
(133, 10, 'Гулистон ш.', NULL, NULL),
(134, 10, 'Ширин ш.', NULL, NULL),
(135, 10, 'Янгиер ш.', NULL, NULL),
(136, 11, 'Учтепа тумани', NULL, NULL),
(137, 11, 'Бектемир тумани', NULL, NULL),
(138, 11, 'Юнусобод тумани', NULL, NULL),
(139, 11, 'Мирзо-Улуғбек тумани', NULL, NULL),
(140, 11, 'Миробод тумани', NULL, NULL),
(141, 11, 'Шайхантахур тумани', NULL, NULL),
(142, 11, 'Олмазор тумани', NULL, NULL),
(143, 11, 'Сирғали тумани', NULL, NULL),
(144, 11, 'Яккачарой тумани', NULL, NULL),
(145, 11, 'Хамза тумани', NULL, NULL),
(146, 11, 'Чилонзор тумани', NULL, NULL),
(147, 12, 'Оққўрғон тумани', NULL, NULL),
(148, 12, 'Охангарон тумани', NULL, NULL),
(149, 12, 'Бекобод тумани', NULL, NULL),
(150, 12, 'Бўстонлиқ тумани', NULL, NULL),
(151, 12, 'Бўка тумани', NULL, NULL),
(152, 12, 'Қуйичирчиқ тумани', NULL, NULL),
(153, 12, 'Зангиота тумани', NULL, NULL),
(154, 12, 'Юқоричирчиқ тумани', NULL, NULL),
(155, 12, 'Қибрай тумани', NULL, NULL),
(156, 12, 'Паркент тумани', NULL, NULL),
(157, 12, 'Пскент тумани', NULL, NULL),
(158, 12, 'Ўртачирчиқ тумани', NULL, NULL),
(159, 12, 'Чиноз тумани', NULL, NULL),
(160, 12, 'Янгийўл тумани', NULL, NULL),
(161, 12, 'Олмалиқ ш.', NULL, NULL),
(162, 12, 'Ангрен ш.', NULL, NULL),
(163, 12, 'Охангарон ш.', NULL, NULL),
(164, 12, 'Бекобод ш.', NULL, NULL),
(165, 12, 'Чирчиқ ш.', NULL, NULL),
(166, 12, 'Янгийўл ш.', NULL, NULL),
(167, 13, 'Олтиариқ тумани', NULL, NULL),
(168, 13, 'Охунбобоев тумани', NULL, NULL),
(169, 13, 'Боғдод тумани', NULL, NULL),
(170, 13, 'Бувайда тумани', NULL, NULL),
(171, 13, 'Бешариқ тумани', NULL, NULL),
(172, 13, 'Қува тумани', NULL, NULL),
(173, 13, 'Учкўприк тумани', NULL, NULL),
(174, 13, 'Риштон тумани', NULL, NULL),
(175, 13, 'Сўх тумани', NULL, NULL),
(176, 13, 'Тошлоқ тумани', NULL, NULL),
(177, 13, 'Ўзбекистон тумани', NULL, NULL),
(178, 13, 'Фарғона тумани', NULL, NULL),
(179, 13, 'Данғара тумани', NULL, NULL),
(180, 13, 'Фурқат тумани', NULL, NULL),
(181, 13, 'Ёзёвон тумани', NULL, NULL),
(182, 13, 'Фарғона ш.', NULL, NULL),
(183, 13, 'Қўқон ш.', NULL, NULL),
(184, 13, 'Қувасой ш.', NULL, NULL),
(185, 13, 'Марғилон ш.', NULL, NULL),
(186, 14, 'Боғот тумани', NULL, NULL),
(187, 14, 'Гурлан тумани', NULL, NULL),
(188, 14, 'Қўшкўпир тумани', NULL, NULL),
(189, 14, 'Урганч тумани', NULL, NULL),
(190, 14, 'Хозарасп тумани', NULL, NULL),
(191, 14, 'Хонқа тумани', NULL, NULL),
(192, 14, 'Хива тумани', NULL, NULL),
(193, 14, 'Шовот тумани', NULL, NULL),
(194, 14, 'Янгиариқ тумани', NULL, NULL),
(195, 14, 'Янгибозор тумани', NULL, NULL),
(196, 14, 'Урганч ш.', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `members`
--

CREATE TABLE `members` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nationality_id` int(11) NOT NULL,
  `passSerial` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passGivenFrom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passGivenDate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passExpireDate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `specialist` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `workPlaceAndPosition` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneNumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isLeader` tinyint(1) NOT NULL,
  `isXdpMember` tinyint(1) DEFAULT NULL,
  `region_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `homeAddress` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unionJoinDate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unionOrderNumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isFeePaid` tinyint(1) NOT NULL,
  `socialPositionId` int(11) NOT NULL DEFAULT '1001',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `unionCertfNumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bpt_id` int(22) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `members`
--

INSERT INTO `members` (`id`, `fullName`, `birthday`, `sex_id`, `nationality_id`, `passSerial`, `passGivenFrom`, `passGivenDate`, `passExpireDate`, `specialist`, `workPlaceAndPosition`, `phoneNumber`, `isLeader`, `isXdpMember`, `region_id`, `district_id`, `homeAddress`, `unionJoinDate`, `unionOrderNumber`, `isFeePaid`, `socialPositionId`, `created_at`, `updated_at`, `unionCertfNumber`, `bpt_id`, `is_deleted`) VALUES
(7, 'ahmad ahmad ahmad', '09/13/2018', '2', 2, 'UU  777 777 7', 'namangan viloyati namangan shahar IIB', '09/28/2018', '09/13/2018', 'payvandchi', 'mexmash katta payvandchi', '+ 998 (97) 257-66-11', 1, 1, 2, 21, 'amir temur ko\'chasi 22 - uy', '09/06/2018', '65655', 1, 1, NULL, '2018-10-01 06:15:02', '65655', 1, 0),
(8, 'lkalksxlkam xmk alks xlkam lxk', '09/06/2018', '1', 3, 'PP  999 999 9', 'namangan viloyati namangan shahar IIB', '09/28/2018', '09/13/2018', 'payvandchi', 'mexmash katta payvandchi', '+ 998 (79) 111-11-11', 1, 1, 3, 37, 'amir temur ko\'chasi 22 - uy', '09/18/2018', '888888', 0, 4, NULL, '2018-10-01 06:15:02', '88888', 1, 0),
(9, 'Ahmadboy Ahmadboy Ahmadboy', '09/13/2018', '2', 3, 'LL  555 555 5', 'namangan viloyati namangan shahar IIB', '09/21/2018', '09/28/2018', 'payvandchi', 'mexmash katta payvandchi', '+ 998 (99) 999-99-99', 1, 1, 4, 50, 'amir temur ko\'chasi 22 - uy', '08/16/2018', '221122', 0, 2, NULL, '2018-10-01 03:10:54', '22111', 1, 1),
(10, 'Bekzod  asqarov', '09/13/2018', '2', 3, 'GG  555 555 5', 'namangan viloyati namangan shahar IIB', '09/21/2018', '09/21/2018', 'payvandchi', 'mexmash katta payvandchi', '+ 998 (33) 333-33-33', 0, 0, 3, 36, 'amir temur ko\'chasi 22 - uy', '09/26/2018', '3x13a2sx3as2', 1, 1001, NULL, '2018-10-01 03:10:54', '68ds5d6csdc', 1, 1);

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
(17, '2018_09_14_170505_create_assets_table', 2),
(18, '2018_09_26_062246_create_members_table', 3);

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

--
-- Дамп данных таблицы `nation`
--

INSERT INTO `nation` (`nation_id`, `nation_name`, `created_at`, `updated_at`) VALUES
(1, 'Ўзбек', NULL, NULL),
(2, 'Рус', NULL, NULL),
(3, 'Араб', NULL, NULL),
(4, 'Арман', NULL, NULL),
(5, 'Беларус', NULL, NULL),
(6, 'Инглиз', NULL, NULL),
(7, 'Ирланд', NULL, NULL),
(8, 'Корейс', NULL, NULL),
(9, 'Қирғиз', NULL, NULL),
(10, 'Қозоқ', NULL, NULL),
(11, 'Қорақалпоқ', NULL, NULL),
(12, 'Лаос', NULL, NULL),
(13, 'Латиш', NULL, NULL),
(14, 'Немис', NULL, NULL),
(15, 'Озарбайжон', NULL, NULL),
(16, 'Тожик', NULL, NULL),
(17, 'Турк', NULL, NULL),
(18, 'Уйғур', NULL, NULL),
(19, 'Украин', NULL, NULL),
(20, 'Франсуз', NULL, NULL),
(21, 'Хинд', NULL, NULL),
(22, 'Хитой', NULL, NULL),
(23, 'Япон', NULL, NULL),
(24, 'Яхудий', NULL, NULL),
(25, 'Бошқа', NULL, NULL);

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
  `party_region_id` int(11) NOT NULL,
  `party_distirict_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `party`
--

INSERT INTO `party` (`party_id`, `party_name`, `party_address`, `party_director`, `party_phone`, `party_region_id`, `party_distirict_id`, `created_at`, `updated_at`) VALUES
(1, 'Milliy Tiklanish', 'amir temir ko\'chasi 22 uy', 'sarvar hakimov', '+998977777777', 7, 93, NULL, NULL);

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

--
-- Дамп данных таблицы `region`
--

INSERT INTO `region` (`region_id`, `region_name`, `created_at`, `updated_at`) VALUES
(1, 'Қорақалпоғистон республикаси', NULL, NULL),
(2, 'Андижон вилояти', NULL, NULL),
(3, 'Бухоро вилояти', NULL, NULL),
(4, 'Жиззах вилояти', NULL, NULL),
(5, 'Қашқадарё вилояти', NULL, NULL),
(6, 'Навоий вилояти', NULL, NULL),
(7, 'Наманган вилояти', NULL, NULL),
(8, 'Самарқанд вилояти', NULL, NULL),
(9, 'Сурхандарё вилояти', NULL, NULL),
(10, 'Сирдарё вилояти', NULL, NULL),
(11, 'Тошкент шаҳри', NULL, NULL),
(12, 'Тошкент вилояти', NULL, NULL),
(13, 'Фарғона вилояти', NULL, NULL),
(14, 'Хоразм вилояти', NULL, NULL),
(15, 'Қорақалпоғистон республикаси2', '2018-10-01 06:18:30', '2018-10-01 06:18:30'),
(16, 'Қорақалпоғистон республикаси2', '2018-10-01 06:19:38', '2018-10-01 06:19:38');

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

--
-- Дамп данных таблицы `sex`
--

INSERT INTO `sex` (`sex_id`, `sex_name`, `created_at`, `updated_at`) VALUES
(1, 'ayol', NULL, NULL),
(2, 'Erkak', NULL, NULL);

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

--
-- Дамп данных таблицы `socialcat`
--

INSERT INTO `socialcat` (`soc_id`, `soc_name`, `created_at`, `updated_at`) VALUES
(1, 'Talaba', NULL, NULL),
(2, 'Nafaqaxo\'r', NULL, NULL),
(3, 'Nogiron', NULL, NULL),
(4, 'Kam ta\'minlangan', NULL, NULL),
(1001, 'Oddiy', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `spr_dav_mukofot`
--

CREATE TABLE `spr_dav_mukofot` (
  `mukofot_id` int(11) NOT NULL,
  `mukofot_name` varchar(150) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `spr_dav_mukofot`
--

INSERT INTO `spr_dav_mukofot` (`mukofot_id`, `mukofot_name`) VALUES
(1, '\"Соғлом авлод учун\" ордени 1 даражали'),
(2, '\"Соғлом авлод учун\" ордени 2 даражали'),
(3, '\"Мустақиллик\" ордени'),
(4, '\"Дўстлик\" ордени'),
(5, '\"Меҳнат шуҳрати\" ордени'),
(6, '\"Буюк хизматлари учун\" ордени'),
(7, '\"Шон-шараф\" ордени 1 даражали'),
(8, '\"Шон-шараф\" ордени 2 даражали'),
(9, '\"Эл-юрт ҳурмати\"  ордени'),
(10, '\"Амир Темур\" ордени'),
(11, '\"Жалолиддин  Мангуберди\" ордени'),
(12, '\"Шуҳрат\" медали'),
(13, '\"Жасорат\" медали'),
(14, '\"Меҳнатдаги ютуқлари учун\" медали'),
(15, '\"Меҳнат фахрийси\" медали'),
(16, '\"Ўзбекистон ифтихори\" кўкрак нишони'),
(17, 'Тасвирий ва амалий санъат  соҳасида Камолиддин Бехзод номидаги Давлат мукофоти'),
(18, 'Адабиёт, санъат ва меъморчилик соҳасида Алишер Навоий номидаги Давлат мукофоти'),
(19, 'Адабиёт ва санъат соҳасида Абдулла Қодирий номидаги Давлат мукофоти'),
(20, '\"Ал-Хоразмий\"  номли халқаро мукофот'),
(21, '\"Имом Ал  Бухорий\"  номидаги халқаро мукофот'),
(22, 'Халқаро ташкилотлар - жамғармалар мукофотлари'),
(23, '\"Ўзбекистон Республикаси Олий Таълими аълочиси\" нишони'),
(24, '\"Ўзбекистон Республикаси Халқ Таълими аълочиси\" нишони'),
(25, '\"Ўрта махсус ва касб-ҳунар таълими аълочиси\" нишони'),
(26, '\"Ўзбекистон Республикасида хизмат кўрсатган профессор\" унвони'),
(27, '\"Ўзбекистон Республикасида хизмат кўрсатган  доцент\" унвони'),
(28, '\"Устоз\" фахрий унвони'),
(29, '\"Ўзбекистон Республикаси санъат арбоби\" кўкрак нишони'),
(30, '\"Ўзбекистон Республикаси фан арбоби\" кўкрак нишони'),
(31, '\"Ўзбекистон ифтихори\" кўкрак нишони'),
(32, '\"Ўзбекистон Республикаси халқ артисти\" фахрий унвони'),
(33, '\"Ўзбекистон Республикаси халқ бахшиси\" фахрий унвони'),
(34, '\"Ўзбекистон Республикаси халқ ёзувчиси\" фахрий унвони'),
(35, '\"Ўзбекистон Республикаси халқ рассоми\" фахрий унвони'),
(36, '\"Ўзбекистон Республикаси халқ устаси\"фахрий унвони'),
(37, '\"Ўзбекистон Республикаси халқ шоири\" фахрий унвони'),
(38, '\"Ўзбекистон Республикаси халқ ўқитувчиси\" фахрий унвони'),
(39, '\"Ўзбекистон Республикаси халқ ҳофизи\" фахрий унвони'),
(40, '“Ўзбекистон Республикаси Коммунал, Маиший ва Савдо Соҳасида Хизмат Кўрсатган ходим”фахрий унвони'),
(41, '\"Ўзбекистон Республикасида хизмат кўрсатган алоқа ходими\" фахрий унвони'),
(42, '\"Ўзбекистон Республикасида хизмат кўрсатган артист\" фахрий унвони'),
(43, '\"Ўзбекистон Республикасида хизмат кўрсатган ёшлар мураббийси\" фахрий унвони'),
(44, '\"Ўзбекистон Республикасида хизмат кўрсатган журналист\"фахрий унвони'),
(45, '\"Ўзбекистон Республикасида хизмат кўрсатган ирригатор\" фахрий унвони'),
(46, '\"Ўзбекистон Республикасида хизмат кўрсатган ихтирочи ва рационализатор\" фахрий унвони'),
(47, '\"Ўзбекистон Республикасида хизмат кўрсатган иқтисодчи\" фахрий унвони'),
(48, '\"Ўзбекистон Республикасида хизмат кўрсатган маданият ходими\" фахрий унвони'),
(49, '\"Ўзбекистон Республикасида хизмат кўрсатган меъмор\" фахрий унвони'),
(50, '\"Ўзбекистон Республикасида хизмат кўрсатган пахтакор\" фахрий унвони'),
(51, '\"Ўзбекистон Республикасида хизмат кўрсатган пиллачи\" фахрий унвони'),
(52, '\"Ўзбекистон Республикасида хизмат кўрсатган саноат ходими\" фахрий унвони'),
(53, '\"Ўзбекистон Республикасида хизмат кўрсатган соғлиқни сақлаш ходими\" фахрий унвони'),
(54, '\"Ўзбекистон Республикасида хизмат кўрсатган спорт устози\" фахрий унвони'),
(55, '\"Ўзбекистон Республикасида хизмат кўрсатган спортчи\" фахрий унвони'),
(56, '\"Ўзбекистон Республикасида хизмат кўрсатган транспорт ходими\" фахрий унвони'),
(57, '\"Ўзбекистон Республикасида хизмат кўрсатган кўрсатган авиацияси ходими\" фахрий унвони'),
(58, '\"Ўзбекистон Республикасида хизмат кўрсатган халқ таълими ходими\" фахрий унвони'),
(59, '\"Ўзбекистон Республикасида хизмат кўрсатган чорвадор\" фахрий унвони'),
(60, '\"Ўзбекистон Республикасида хизмат кўрсатган юрист\" фахрий унвони'),
(61, '\"Ўзбекистон Республикасида хизмат кўрсатган қишлоқ хўжалик ходими\" фахрий унвони'),
(62, '\"Ўзбекистон Республикасида хизмат кўрсатган қурувчи\" фахрий унвони'),
(63, 'Олий Мажлис Фахрий Ёрлиғи'),
(64, 'Вазирлик Фахрий Ёрлиқлари'),
(65, 'Махаллий Ҳокимият Фахрий Ёрлиқлари'),
(66, 'Муассаса, Корхона, ОТМ Фахрий Ёрликлари'),
(67, 'Ўзбекистон Республикаси Фахрий ёрлиғи'),
(68, '“Олий таълим аълочиси” кўкрак нишони'),
(69, 'Ўзбекистон Республикаси халқ таълими аълочиси'),
(70, 'Ўзбекистон Республикаси мустақиллигининг 10 йиллик нишони медали'),
(71, '\"Ўзбекистон Қаҳрамони\"'),
(72, '“Буюк Хизматлари Учун”'),
(73, '“Эл-Юрт Ҳурмати“'),
(74, '“Фидокорона Хизматлари Учун”'),
(75, '“Содиқ Хизматлари Учун“ медали'),
(76, 'Давлат мукофоти I даражали'),
(77, 'Давлат мукофоти II даражали'),
(78, '“Ўзбекистон Республикаси мустақиллигига 20 йил\"'),
(79, 'Ўзбекистон Республикаси мустақиллигининг 15 йиллик нишони медали');

-- --------------------------------------------------------

--
-- Структура таблицы `spr_millat`
--

CREATE TABLE `spr_millat` (
  `millat_id` int(11) NOT NULL,
  `millat_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `spr_millat`
--

INSERT INTO `spr_millat` (`millat_id`, `millat_name`) VALUES
(1, 'Ўзбек'),
(2, 'Рус'),
(3, 'Араб'),
(4, 'Арман'),
(5, 'Беларус'),
(6, 'Инглиз'),
(7, 'Ирланд'),
(8, 'Корейс'),
(9, 'Қирғиз'),
(10, 'Қозоқ'),
(11, 'Қорақалпоқ'),
(12, 'Лаос'),
(13, 'Латиш'),
(14, 'Немис'),
(15, 'Озарбайжон'),
(16, 'Тожик'),
(17, 'Турк'),
(18, 'Уйғур'),
(19, 'Украин'),
(20, 'Франсуз'),
(21, 'Хинд'),
(22, 'Хитой'),
(23, 'Япон'),
(24, 'Яхудий'),
(25, 'Бошқа');

-- --------------------------------------------------------

--
-- Структура таблицы `spr_tuman`
--

CREATE TABLE `spr_tuman` (
  `tuman_id` int(11) NOT NULL,
  `viloyat_id` int(11) DEFAULT NULL,
  `tuman` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `spr_tuman`
--

INSERT INTO `spr_tuman` (`tuman_id`, `viloyat_id`, `tuman`) VALUES
(1, 1, 'Амударё тумани'),
(2, 1, 'Беруний тумани'),
(3, 1, 'Қораузоқ тумани'),
(4, 1, 'Кегейли тумани'),
(5, 1, 'Қўнғирот тумани'),
(6, 1, 'Қанликўл тумани'),
(7, 1, 'Мўйнақ тумани'),
(8, 1, 'Нукус тумани'),
(9, 1, 'Тахтакўпир тумани'),
(10, 1, 'Тўрткўл тумани'),
(11, 1, 'Хўжайли тумани'),
(12, 1, 'Чимбой тумани'),
(13, 1, 'Шуманай тумани'),
(14, 1, 'Элликқалъа тумани'),
(15, 1, 'Нукус ш.'),
(16, 1, 'Тахиотош ш.'),
(17, 2, 'Олтинкўл тумани'),
(18, 2, 'Андижон тумани'),
(19, 2, 'Балиқчи тумани'),
(20, 2, 'Бўз тумани '),
(21, 2, 'Булоқбоши тумани'),
(22, 2, 'Жалолқудиқ тумани'),
(23, 2, 'Избоскан тумани'),
(24, 2, 'Улуғнор тумани'),
(25, 2, 'Қўрғонтепа тумани'),
(26, 2, 'Асака тумани'),
(27, 2, 'Мархамат тумани'),
(28, 2, 'Шахрихон тумани'),
(29, 2, 'Пахтаобод тумани'),
(30, 2, 'Хўжаобод тумани'),
(31, 2, 'АНДИЖОН ш. '),
(32, 2, 'Асака ш.'),
(33, 2, 'Хонобод ш.'),
(34, 3, 'Олот тумани'),
(35, 3, 'Бухоро тумани'),
(36, 3, 'Вобкент тумани'),
(37, 3, 'Ғиждувон тумани'),
(38, 3, 'Когон тумани'),
(39, 3, 'Қоракўл тумани'),
(40, 3, 'Қоровулбозор тумани'),
(41, 3, 'Пешку тумани'),
(42, 3, 'Ромитон тумани'),
(43, 3, 'Жондор тумани'),
(44, 3, 'Шофиркон тумани'),
(45, 3, 'Бухоро ш.'),
(46, 3, 'Когон ш.'),
(47, 4, 'Арнасай тумани'),
(48, 4, 'Бахмал тумани'),
(49, 4, 'Ғаллаорол тумани'),
(50, 4, 'Жиззах тумани'),
(51, 4, 'Дўстлик тумани'),
(52, 4, 'Зомин тумани'),
(53, 4, 'Зарбдор тумани'),
(54, 4, 'Мирзачўл тумани'),
(55, 4, 'Зафарабод тумани'),
(56, 4, 'Пахтакор тумани'),
(57, 4, 'Фориш тумани'),
(58, 4, 'Янгиобод тумани'),
(59, 4, 'Жиззах ш.'),
(60, 5, 'Ғузор тумани'),
(61, 5, 'Дехқонобод тумани'),
(62, 5, 'Қамаши тумани'),
(63, 5, 'Қарши тумани'),
(64, 5, 'Косон тумани'),
(65, 5, 'Китоб тумани'),
(66, 5, 'Миришкор тумани'),
(67, 5, 'Мубарак тумани'),
(68, 5, 'Нишон тумани'),
(69, 5, 'Касби тумани'),
(70, 5, 'Чироқчи тумани'),
(71, 5, 'Шахрисабз тумани'),
(72, 5, 'Яккабоғ тумани'),
(73, 5, 'Қарши ш.'),
(74, 6, 'Конимех тумани'),
(75, 6, 'Қизилтепа тумани'),
(76, 6, 'Навбахор тумани'),
(77, 6, 'Кармана тумани'),
(78, 6, 'Нурота тумани'),
(79, 6, 'Томди тумани'),
(80, 6, 'Учқудиқ тумани'),
(81, 6, 'Хатирчи тумани'),
(82, 6, 'Навоий ш.'),
(83, 6, 'Зарафшон ш.'),
(84, 7, 'Мингбулоқ тумани'),
(85, 7, 'Косонсой тумани'),
(86, 7, 'Наманган тумани'),
(87, 7, 'Норин тумани'),
(88, 7, 'Поп тумани'),
(89, 7, 'Тўрақўрғон тумани'),
(90, 7, 'Уйчи тумани'),
(91, 7, 'Учқўрғон тумани'),
(92, 7, 'Чортоқ тумани'),
(93, 7, 'Чуст тумани'),
(94, 7, 'Янгиқўрғон тумани'),
(95, 7, 'Наманган ш.'),
(96, 8, 'Оқдарё тумани'),
(97, 8, 'Булунғир тумани'),
(98, 8, 'Жомбой тумани'),
(99, 8, 'Иштихон тумани'),
(100, 8, 'Каттақўрғон тумани'),
(101, 8, 'Қўшробод тумани'),
(102, 8, 'Нарпай тумани'),
(103, 8, 'Пойариқ тумани'),
(104, 8, 'Пастдарғом тумани'),
(105, 8, 'Пахтачи тумани'),
(106, 8, 'Самарқанд тумани'),
(107, 8, 'Нуробод тумани'),
(108, 8, 'Ургут тумани'),
(109, 8, 'Тойлоқ тумани'),
(110, 8, 'Самарқанд ш.'),
(111, 8, 'г. Каттакурган '),
(112, 9, 'Олтинсой тумани'),
(113, 9, 'Бойсун тумани'),
(114, 9, 'Бандихон тумани'),
(115, 9, 'Музробод тумани'),
(116, 9, 'Денов тумани'),
(117, 9, 'Жарқўрғон тумани'),
(118, 9, 'Қумқўрғон тумани'),
(119, 9, 'Қизириқ тумани'),
(120, 9, 'Сариосиё тумани'),
(121, 9, 'Термиз тумани'),
(122, 9, 'Шеробод тумани'),
(123, 9, 'Шўрчи тумани'),
(124, 9, 'Термиз ш.'),
(125, 10, 'Оқолтин тумани'),
(126, 10, 'Боёвут тумани'),
(127, 10, 'Сайхунобод тумани'),
(128, 10, 'Гулистон тумани'),
(129, 10, 'Сардобо тумани'),
(130, 10, 'Мирзаобод тумани'),
(131, 10, 'Сирдарё тумани'),
(132, 10, 'Ховост тумани'),
(133, 10, 'Гулистон ш.'),
(134, 10, 'Ширин ш.'),
(135, 10, 'Янгиер ш.'),
(136, 11, 'Учтепа тумани'),
(137, 11, 'Бектемир тумани'),
(138, 11, 'Юнусобод тумани'),
(139, 11, 'Мирзо-Улуғбек тумани'),
(140, 11, 'Миробод тумани'),
(141, 11, 'Шайхантахур тумани'),
(142, 11, 'Олмазор тумани'),
(143, 11, 'Сирғали тумани'),
(144, 11, 'Яккачарой тумани'),
(145, 11, 'Хамза тумани'),
(146, 11, 'Чилонзор тумани'),
(147, 12, 'Оққўрғон тумани'),
(148, 12, 'Охангарон тумани'),
(149, 12, 'Бекобод тумани'),
(150, 12, 'Бўстонлиқ тумани'),
(151, 12, 'Бўка тумани'),
(152, 12, 'Қуйичирчиқ тумани'),
(153, 12, 'Зангиота тумани'),
(154, 12, 'Юқоричирчиқ тумани'),
(155, 12, 'Қибрай тумани'),
(156, 12, 'Паркент тумани'),
(157, 12, 'Пскент тумани'),
(158, 12, 'Ўртачирчиқ тумани'),
(159, 12, 'Чиноз тумани'),
(160, 12, 'Янгийўл тумани'),
(161, 12, 'Олмалиқ ш.'),
(162, 12, 'Ангрен ш.'),
(163, 12, 'Охангарон ш.'),
(164, 12, 'Бекобод ш.'),
(165, 12, 'Чирчиқ ш.'),
(166, 12, 'Янгийўл ш.'),
(167, 13, 'Олтиариқ тумани'),
(168, 13, 'Охунбобоев тумани'),
(169, 13, 'Боғдод тумани'),
(170, 13, 'Бувайда тумани'),
(171, 13, 'Бешариқ тумани'),
(172, 13, 'Қува тумани'),
(173, 13, 'Учкўприк тумани'),
(174, 13, 'Риштон тумани'),
(175, 13, 'Сўх тумани'),
(176, 13, 'Тошлоқ тумани'),
(177, 13, 'Ўзбекистон тумани'),
(178, 13, 'Фарғона тумани'),
(179, 13, 'Данғара тумани'),
(180, 13, 'Фурқат тумани'),
(181, 13, 'Ёзёвон тумани'),
(182, 13, 'Фарғона ш.'),
(183, 13, 'Қўқон ш.'),
(184, 13, 'Қувасой ш.'),
(185, 13, 'Марғилон ш.'),
(186, 14, 'Боғот тумани'),
(187, 14, 'Гурлан тумани'),
(188, 14, 'Қўшкўпир тумани'),
(189, 14, 'Урганч тумани'),
(190, 14, 'Хозарасп тумани'),
(191, 14, 'Хонқа тумани'),
(192, 14, 'Хива тумани'),
(193, 14, 'Шовот тумани'),
(194, 14, 'Янгиариқ тумани'),
(195, 14, 'Янгибозор тумани'),
(196, 14, 'Урганч ш.');

-- --------------------------------------------------------

--
-- Структура таблицы `spr_viloyat`
--

CREATE TABLE `spr_viloyat` (
  `viloyat_id` int(11) NOT NULL,
  `viloyat` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `spr_viloyat`
--

INSERT INTO `spr_viloyat` (`viloyat_id`, `viloyat`) VALUES
(1, 'Қорақалпоғистон республикаси'),
(2, 'Андижон вилояти'),
(3, 'Бухоро вилояти'),
(4, 'Жиззах вилояти'),
(5, 'Қашқадарё вилояти'),
(6, 'Навоий вилояти'),
(7, 'Наманган вилояти'),
(8, 'Самарқанд вилояти'),
(9, 'Сурхандарё вилояти'),
(10, 'Сирдарё вилояти'),
(11, 'Тошкент шаҳри'),
(12, 'Тошкент вилояти'),
(13, 'Фарғона вилояти'),
(14, 'Хоразм вилояти');

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
(1, 'bahrom', 'bahrom1982@gmail.com', '$2y$10$UsJ0yVjO.ZVl12/s3J882epHRBbtZhqmTIgo5zS1L2EzuHk65hu/e', 1, 'rqT1ShX2YkXsNFE02OnqwQ9K36j6zhS5z65yFcbj6gdEHsyDIxyytULJqnT2', '2018-09-14 07:32:48', '2018-09-14 07:32:48'),
(2, 'akbar', 'besmartness@gmail.com', '$2y$10$hp1Ju5igehhdx3GBL09ZBuHfuhi/wuodLfKxtVEiyvfpJU0Dz9QEy', 1, NULL, '2018-09-25 00:33:02', '2018-09-25 00:33:02'),
(3, 'hayrulla', 'admin@nisd.uz', '$2y$12$K4lkIy0SxN/2uIcmGbvjhuBITdOfn/Z95JSJyufErZaLMQI3s0eoC', 1, NULL, '2018-09-27 19:00:00', '2018-09-27 19:00:00');

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
-- Индексы таблицы `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `members_phonenumber_unique` (`phoneNumber`),
  ADD UNIQUE KEY `passSerial` (`passSerial`);

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
-- Индексы таблицы `spr_dav_mukofot`
--
ALTER TABLE `spr_dav_mukofot`
  ADD PRIMARY KEY (`mukofot_id`);

--
-- Индексы таблицы `spr_millat`
--
ALTER TABLE `spr_millat`
  ADD PRIMARY KEY (`millat_id`);

--
-- Индексы таблицы `spr_tuman`
--
ALTER TABLE `spr_tuman`
  ADD PRIMARY KEY (`tuman_id`);

--
-- Индексы таблицы `spr_viloyat`
--
ALTER TABLE `spr_viloyat`
  ADD PRIMARY KEY (`viloyat_id`);

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
  MODIFY `bpt_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
  MODIFY `district_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;
--
-- AUTO_INCREMENT для таблицы `members`
--
ALTER TABLE `members`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT для таблицы `nation`
--
ALTER TABLE `nation`
  MODIFY `nation_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT для таблицы `party`
--
ALTER TABLE `party`
  MODIFY `party_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `party_bind`
--
ALTER TABLE `party_bind`
  MODIFY `party_bind_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `region`
--
ALTER TABLE `region`
  MODIFY `region_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT для таблицы `rolls`
--
ALTER TABLE `rolls`
  MODIFY `rol_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `sex`
--
ALTER TABLE `sex`
  MODIFY `sex_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `socialcat`
--
ALTER TABLE `socialcat`
  MODIFY `soc_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1002;
--
-- AUTO_INCREMENT для таблицы `spr_dav_mukofot`
--
ALTER TABLE `spr_dav_mukofot`
  MODIFY `mukofot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
--
-- AUTO_INCREMENT для таблицы `spr_millat`
--
ALTER TABLE `spr_millat`
  MODIFY `millat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT для таблицы `spr_tuman`
--
ALTER TABLE `spr_tuman`
  MODIFY `tuman_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;
--
-- AUTO_INCREMENT для таблицы `spr_viloyat`
--
ALTER TABLE `spr_viloyat`
  MODIFY `viloyat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `userunit`
--
ALTER TABLE `userunit`
  MODIFY `userunit_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

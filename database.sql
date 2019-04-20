-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2019 at 01:50 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `imdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `site` varchar(255) DEFAULT NULL,
  `short_bio` varchar(255) DEFAULT NULL,
  `about` text,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`, `country`, `gender`, `site`, `short_bio`, `about`, `image`) VALUES
(6, 'Muhammad Mamdouh', 'muhammadmamdouh93@gmail.com', '$2y$10$r9HIfBE1s4lKIqE6ETL2MOkC7T2JVpiA9ZdbdrovJ/cA6XMCkJtP2', '2018-11-27 22:30:19', '2018-11-27 22:30:19', NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'Muhammadn Mamdouh', 'muhammadmamndouh93@gmail.com', '$2y$10$AaIJOCyJZzaY9I6zwkeIg.4miwYWhW9MTdOo9PXCFFxRNpX8BtYLC', '2018-12-23 22:51:40', '2018-12-23 22:51:40', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` text NOT NULL,
  `image` text NOT NULL,
  `start_at` date NOT NULL,
  `end_at` date NOT NULL,
  `page` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `name`, `link`, `image`, `start_at`, `end_at`, `page`, `status`, `created_at`, `updated_at`) VALUES
(8, 'Muhammad Mamdouh', 'https://ask.fm/account/wall', 'ads//1547514583.jpeg', '2018-12-19', '2018-01-19', 'movie/{id}', 'enabled', '2019-01-15 01:09:43', '2019-01-14 23:09:43'),
(9, 'Amanda Cerny', 'https://www.youtube.com/user/MissAmandaCerny', 'ads//1547568597.jpeg', '2018-12-19', '2018-01-18', 'user/{id}', 'enabled', '2019-01-15 16:09:57', '2019-01-15 14:09:57'),
(10, 'Muhammad Mamdouh', 'https://ask.fm/account/wall', 'ads/1547586635.jpeg', '2019-01-15', '2018-12-15', 'broadcasting/auth', 'enabled', '2019-01-15 21:12:51', '2019-01-15 19:12:51');

-- --------------------------------------------------------

--
-- Table structure for table `cast`
--

CREATE TABLE `cast` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `about` text,
  `gender` enum('male','female') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instgram` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cast`
--

INSERT INTO `cast` (`id`, `name`, `country`, `about`, `gender`, `created_at`, `updated_at`, `image`, `date_of_birth`, `facebook`, `instgram`, `twitter`) VALUES
(41, 'Nour', 'Lebnon', 'Marian Farid Abi Habib (in Arabic : ماريان فريد أبى حبيب) is a Lebanese actress. She was born on 23 December 1977.[1] She began her career as an advertisement model after graduation from the Faculty of Fine Arts in Beirut in 1995. Her first role in cinema was in the Egyptian movie of Short w Fanella w Cap. She also acted in many other Egyptian movies like Ezay Tekhalley al Banat Tehabak, Zarf Tarek, Matab Sena\'ee and al-Rahina (The Hostage). She also starred in the Egyptian TV series of al-Ameel 1001 (Agent 1001). Nour is currently living within Cairo, Egypt since 2000.', 'female', '2018-08-10 14:34:12', '2019-04-12 18:53:25', 'cast/41/1547421194', '1977-12-23', 'https://www.facebook.com/NourActress', 'https://www.instagram.com/nouractress/?hl=en', 'https://twitter.com/nouractress?lang=en'),
(43, 'Amanda Cerny', 'USA', 'Amanda Rachelle Cerny was born in Pittsburgh, Pennsylvania, and attended Florida State University. With more than 35 million followers across YouTube, Facebook and Instagram, she has emerged as one of the top five most viewed Instagram story accounts in the world. Amanda has acted as an actress in traditional media with past partnerships including Millennial Films, Lakeshore, Paramount, Universal, Comedy Central and NBC, and has also directed, written and produced more than 3,000 comedic skits and music videos featuring actors, top chart musicians, and the most influential personalities online gathering millions of views per video. Amanda has also worked as a model, fitness guru and philanthropist with previous and ongoing relief efforts in Haiti and Puerto Rico. She is the founder of a new video on-demand service called ZEUS which will be released in 2018 . Amanda has partnered with brands such as Nike, Beats by Dre, Marc Jacobs, Ubisoft, universal and now Guess as their Spring 2018 campaign model. Her first film credit was The Bet (2016). She lives in Los Angeles, California.', 'male', '2018-08-10 14:48:09', '2018-09-19 11:32:21', 'cast/43/1537363941', NULL, 'https://amandacerny.com/amanda-cerny-photos/', 'https://www.instagram.com/amandacerny/', 'https://twitter.com/AmandaCerny'),
(44, 'soad  hosny', 'Egypt', NULL, 'male', '2018-08-17 11:34:34', '2018-08-17 11:35:13', 'cast/44/1534512874', NULL, NULL, NULL, NULL),
(45, 'Ahmed Helmy', 'Egypt', 'about about about about about about about about about about about about about about about about about about about about about about about about about about about about about about about about about about about about about about about about about about about about about about about about about about about about about about about about about about about about about about about about about', 'male', '2018-08-18 15:17:51', '2018-08-18 15:17:51', 'cast/45/1534612671', NULL, NULL, NULL, NULL),
(46, 'Kamla Abou Zekra', 'Egypt', NULL, 'male', '2018-08-18 15:41:37', '2018-12-14 23:08:40', 'cast/46/1536342464', NULL, NULL, NULL, NULL),
(47, 'Leonardo DiCaprio', 'USA', 'good actor won Oscar good actor won Oscar good actor won Oscar good actor won Oscar good actor won Oscar good actor won Oscar good actor won Oscar good actor won Oscar good actor won Oscar good actor won Oscar good actor won Oscar good actor won Oscar good actor won Oscar good actor won Oscar good actor won Oscar good actor won Oscar good actor won Oscar good actor won Oscar good actor won Oscar good actor won Oscar good actor won Oscar good actor won Oscar good actor won Oscar good actor won Oscar good actor won Oscar', 'male', '2018-08-24 11:01:24', '2018-09-22 00:33:44', 'cast/47/1537583624', NULL, NULL, NULL, NULL),
(48, 'Hassan Hosny', 'Egypt', 'abount', 'male', '2019-04-12 23:10:58', '2019-04-12 23:10:58', 'cast/48/1555117858', NULL, NULL, NULL, NULL),
(49, 'Hassan', 'eypyt', 'about', 'male', '2019-04-12 23:11:52', '2019-04-12 23:11:53', 'cast/49/1555117912', NULL, NULL, NULL, NULL),
(50, 'alaa', 'egypt', 'about', 'male', '2019-04-12 23:50:18', '2019-04-12 23:50:18', 'cast/50/1555120218', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cast_jobs`
--

CREATE TABLE `cast_jobs` (
  `cast_id` int(10) UNSIGNED NOT NULL,
  `job_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cast_jobs`
--

INSERT INTO `cast_jobs` (`cast_id`, `job_id`) VALUES
(41, 1),
(41, 4),
(43, 2),
(43, 4),
(45, 1),
(46, 4),
(47, 1),
(48, 1),
(48, 4),
(49, 1),
(49, 4),
(50, 1),
(50, 2);

-- --------------------------------------------------------

--
-- Table structure for table `cast_media`
--

CREATE TABLE `cast_media` (
  `id` int(11) UNSIGNED NOT NULL,
  `path` varchar(255) NOT NULL,
  `cast_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cast_media`
--

INSERT INTO `cast_media` (`id`, `path`, `cast_id`) VALUES
(40, 'cast/41/389437.jpg', 41),
(41, 'cast/41/467994.jpg', 41),
(42, 'cast/41/100259.jpg', 41),
(45, 'cast/41/395340.jpg', 41),
(15, 'cast/43/1537204461.jpg', 43),
(16, 'cast/43/44.jpg', 43),
(18, 'cast/43/45.jpg', 43),
(39, 'cast/43/357731.jpg', 43),
(56, 'cast/43/12584.jpg', 43),
(57, 'cast/43/460796.jpg', 43),
(58, 'cast/43/243845.jpg', 43),
(67, 'cast/43/489377.jpg', 43),
(68, 'cast/43/111945.jpg', 43),
(69, 'cast/43/137924.png', 43),
(23, 'cast/44/379618.jpg', 44),
(24, 'cast/44/36973.jpg', 44),
(25, 'cast/44/455595.jpg', 44),
(26, 'cast/44/352760.jpg', 44),
(27, 'cast/44/203930.jpg', 44),
(28, 'cast/45/235898.jpg', 45),
(29, 'cast/45/473255.jpg', 45),
(30, 'cast/45/29879.jpg', 45),
(31, 'cast/45/263556.jpg', 45),
(32, 'cast/45/499626.jpg', 45),
(33, 'cast/45/407902.jpg', 45);

-- --------------------------------------------------------

--
-- Table structure for table `cast_of_movies`
--

CREATE TABLE `cast_of_movies` (
  `cast_id` int(10) UNSIGNED NOT NULL,
  `movies_id` int(10) UNSIGNED NOT NULL,
  `job_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cast_of_movies`
--

INSERT INTO `cast_of_movies` (`cast_id`, `movies_id`, `job_id`) VALUES
(41, 1, 1),
(45, 1, 1),
(46, 1, 4),
(47, 1, 1),
(47, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'action'),
(2, 'thriller'),
(3, 'drama'),
(4, 'romance'),
(5, 'comedy');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `body` text NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `body`, `user_id`, `post_id`, `created_at`, `updated_at`) VALUES
(15, 'shit', 5, 2, '2019-04-15 17:57:12', '2019-04-15 17:57:12'),
(16, '3', 5, 2, '2019-04-15 17:57:51', '2019-04-15 18:31:03'),
(17, '3jksa', 5, 2, '2019-04-15 18:01:08', '2019-04-18 00:44:17'),
(18, 'comment', 5, 3, '2019-04-18 23:20:15', '2019-04-18 23:22:14'),
(19, 'good', 5, 3, '2019-04-18 23:23:30', '2019-04-18 23:23:42');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `mime_type` varchar(255) NOT NULL,
  `full_file` varchar(255) NOT NULL,
  `file_type` varchar(255) NOT NULL,
  `relation_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `friend_with`
--

CREATE TABLE `friend_with` (
  `follower` int(11) UNSIGNED NOT NULL,
  `followed` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `friend_with`
--

INSERT INTO `friend_with` (`follower`, `followed`) VALUES
(4, 5),
(5, 4),
(5, 5),
(5, 6),
(5, 19),
(5, 32);

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`id`, `name`) VALUES
(1, 'actor'),
(2, 'director'),
(4, 'writer');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2016_01_01_000000_add_voyager_user_fields', 1),
(2, '2016_01_01_000000_create_data_types_table', 2),
(3, '2016_05_19_173453_create_menu_table', 2),
(4, '2016_06_01_000001_create_oauth_auth_codes_table', 2),
(5, '2016_06_01_000002_create_oauth_access_tokens_table', 2),
(6, '2016_06_01_000003_create_oauth_refresh_tokens_table', 2),
(7, '2016_06_01_000004_create_oauth_clients_table', 2),
(8, '2016_06_01_000005_create_oauth_personal_access_clients_table', 2),
(9, '2019_01_01_221242_create_notifications_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `playtime` int(11) DEFAULT NULL,
  `country` varchar(255) NOT NULL,
  `rate` decimal(2,1) UNSIGNED DEFAULT NULL,
  `language` varchar(255) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `story` text,
  `trailer` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `poster` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `title`, `playtime`, `country`, `rate`, `language`, `year`, `story`, `trailer`, `created_at`, `updated_at`, `poster`) VALUES
(1, 'dark knight', 120, 'USA', '4.3', 'english', 2008, 'story about batman story about batman story about batman story about batman story about batman story about batman story about batman story about batman story about batman story about batman story about batman story about batman story about batman story about batman story about batman story about batman story about batman story about batman story about batman story about batman story about batman story about batman story about batman story about batman story about batman story about batman story about batman story about batman story about batman story about batman story about batman story about batman story about batman story about batman story about batman story about batman story about batman story about batman story about batman story about batman story about batman story about batman story about batman story about batman story about batman story about batman story about batman story about batman story about batman story about batman story about batman story about batman', 'RWgyKDfFC_U', '2018-07-27 11:35:10', '2019-04-10 21:01:20', 'movies/1554937280.jpeg'),
(2, 'The host', 150, 'USA', NULL, 'english', 2008, 'Dom Cobb (Leonardo DiCaprio) is a thief with the rare ability to enter people\'s dreams and steal their secrets from their subconscious. His skill has made him a hot commodity in the world of corporate espionage but has also cost him everything he loves. Cobb gets a chance at redemption when he is offered a seemingly impossible task: Plant an idea in someone\'s mind. If he succeeds, it will be the perfect crime, but a dangerous enemy anticipates Cobb\'s every move.', 't9AhlBJGfEE', '2018-08-11 12:56:00', '2018-09-21 10:30:51', 'movies/The host/The host1537533051'),
(3, 'fight club', 120, 'USA', NULL, 'english', 1998, 'fight club story', 'OSZyIzY4fT4', '2018-08-16 22:27:55', '2018-09-21 10:24:48', 'movies/fight club/fight club1537532688'),
(4, 'El harrif', 140, 'Egypt', NULL, 'arabic', 1983, 'The life of a football player named Fares who goes through a lot of problems due to his lack of self-discipline with his divorced wife, job, sexual desires and football.', NULL, '2018-09-22 00:44:41', '2018-09-22 00:44:41', 'movies/El harrif/El harrif1537584281'),
(6, 'Torab El Mas', 260, 'Egypt', NULL, 'arabic', 1993, 'A man who works in a pharmacy as a part time job to aid his financial status finds out that his father has been exterminated by a savage brute and sought to avenge him, then unlocks a whole melancholic world of crime!', '9cO54cwkN1I', '2018-11-26 23:23:34', '2019-01-15 19:15:43', 'movies/1547586943.jpeg'),
(8, '122', 150, 'Egypt', NULL, 'arabic', 2018, 'On a bloody night in a place where we are supposed to feel safe, a young man and his beloved are struggling not to reach the hospital, but to run away from it. They are trying to survive the night.', 'PoD_O2AHMZQ', '2019-01-03 23:15:46', '2019-01-15 19:17:54', 'movies/1547587074.jpeg'),
(9, 'The guest', 120, 'Egypt', NULL, 'arabic', 2019, 'A young man has dinner with the family of Dr. Yehia Hussein Al-Tijani at the invitation of his daughter, who’s in love with him. But Dr. Yehia is living the worst days of his life after being assigned a guard because of threats that are following him because of his bold opinions, which turns the dinner into a stirring discussion between him and his guest.', 'J_Czy4FINRc', '2019-01-15 19:29:15', '2019-01-15 19:29:15', 'movies//1547587755jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `movies_category`
--

CREATE TABLE `movies_category` (
  `movies_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movies_category`
--

INSERT INTO `movies_category` (`movies_id`, `category_id`) VALUES
(1, 1),
(1, 3),
(1, 4),
(1, 5),
(2, 1),
(2, 2),
(2, 3),
(4, 3),
(4, 4),
(4, 5),
(6, 2),
(6, 3),
(6, 4);

-- --------------------------------------------------------

--
-- Table structure for table `movies_reviews`
--

CREATE TABLE `movies_reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `movies_id` int(10) UNSIGNED NOT NULL,
  `rate` int(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `review` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movies_reviews`
--

INSERT INTO `movies_reviews` (`id`, `user_id`, `movies_id`, `rate`, `created_at`, `updated_at`, `review`) VALUES
(38, 4, 1, 1, '2018-09-02 23:29:24', '2018-09-02 23:29:24', 'good'),
(45, 5, 2, 5, '2018-09-06 22:20:51', '2018-09-06 22:20:51', 'hn'),
(46, 5, 1, 5, '2018-09-07 11:17:18', '2018-09-07 11:17:18', 'WoW'),
(47, 5, 1, 3, '2018-09-07 11:17:30', '2018-09-07 11:17:30', 'Oh My God'),
(48, 5, 1, 1, '2018-09-07 11:17:56', '2018-09-07 11:17:56', 'hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot'),
(49, 5, 1, 3, '2018-09-07 11:19:04', '2018-09-07 11:19:04', 'hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot hot'),
(53, 5, 1, NULL, '2018-09-07 15:44:18', '2018-09-07 15:44:18', 'how to add button \r\nlike favervvv'),
(54, 5, 2, NULL, '2018-09-12 11:58:03', '2018-09-12 11:58:03', 'هذا الفيلم رااااااااائع وبه حبكة متقنة .. حبيته بصراحة'),
(55, 5, 2, NULL, '2018-09-20 12:56:53', '2018-09-20 12:56:53', 'soory :)'),
(56, 6, 1, NULL, '2018-09-20 22:54:35', '2018-09-20 22:54:35', 'nice movie'),
(57, 5, 3, 5, '2018-09-21 10:25:57', '2018-09-21 10:25:57', 'the best movie in our history'),
(58, 5, 2, NULL, '2018-09-28 11:06:33', '2018-09-28 11:06:33', 'Oh\r<br>My \r<br>God'),
(59, 5, 2, NULL, '2018-09-28 11:17:03', '2018-09-28 11:17:03', 'g\r<br>g'),
(60, 5, 2, NULL, '2018-09-28 11:18:22', '2018-09-28 11:18:22', 'g\r<br />d'),
(61, 5, 2, NULL, '2018-09-28 11:18:52', '2018-09-28 11:18:52', 'd\r <br /> a'),
(62, 5, 2, NULL, '2018-09-28 11:19:31', '2018-09-28 11:19:31', 'd\r\na'),
(63, 5, 2, NULL, '2018-09-28 12:25:16', '2018-09-28 12:25:16', 'x\r\nz'),
(64, 5, 2, NULL, '2018-09-28 12:25:35', '2018-09-28 12:25:35', 'x\r\nz\r\nc'),
(65, 5, 2, NULL, '2018-09-28 12:27:49', '2018-09-28 12:27:49', 'How\r\nare \r\nyou'),
(66, 5, 2, NULL, '2018-09-28 12:29:39', '2018-09-28 12:29:39', 'Good Film\r\nThis film is good enough to watch it'),
(67, 5, 1, NULL, '2018-09-28 13:05:15', '2018-09-28 13:05:15', 'he says \" hi\"'),
(68, 5, 1, NULL, '2018-09-29 13:50:00', '2018-09-29 13:50:00', '<h1>Hello </h1>'),
(69, 5, 1, NULL, '2018-09-29 14:17:00', '2018-09-29 14:17:00', '<script>Hello </script>'),
(70, 5, 1, NULL, '2018-10-25 14:25:21', '2018-10-25 14:25:21', 'صثم'),
(71, 5, 1, 5, '2018-11-15 23:03:46', '2018-11-15 23:03:46', 'good'),
(72, 5, 1, NULL, '2018-11-20 11:31:33', '2018-11-20 11:31:33', 'go\r\nand\r\nrise'),
(73, 4, 1, NULL, '2018-11-20 22:02:38', '2018-11-20 22:02:38', 'review\r <br /> review'),
(74, 5, 1, NULL, '2018-11-22 23:20:30', '2018-11-22 23:20:30', 'hr'),
(75, 5, 1, 4, '2018-11-24 22:10:35', '2018-11-24 22:10:35', 'nice'),
(76, 5, 1, 3, '2018-11-24 22:12:50', '2018-11-24 22:12:50', 'hr\r <br /> df'),
(77, 5, 1, NULL, '2018-11-24 22:18:11', '2018-11-24 22:18:11', 'nice\r <br /> nice'),
(83, 5, 1, 4, '2018-12-22 23:26:34', '2018-12-22 23:26:34', 'fg'),
(84, 5, 1, 4, '2018-12-22 23:27:59', '2018-12-22 23:27:59', 'fg'),
(85, 5, 1, NULL, '2018-12-22 23:28:26', '2018-12-22 23:28:26', 'hell'),
(86, 5, 1, 1, '2018-12-22 23:31:53', '2018-12-22 23:31:53', 'shit'),
(87, 5, 1, 5, '2018-12-22 23:36:51', '2018-12-22 23:36:51', 'deep');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('16de4aea-4609-4dfb-9b57-36f9a917c9d1', 'App\\Notifications\\Notify', 'App\\User', 5, '{\"data\":\"{\\\"id\\\":4,\\\"role_id\\\":null,\\\"roles_id\\\":null,\\\"name\\\":\\\"fidaa hassan\\\",\\\"email\\\":\\\"fidaa@gmail.com\\\",\\\"avatar\\\":\\\"users\\\\\\/default.png\\\",\\\"created_at\\\":\\\"2018-09-03 01:15:28\\\",\\\"updated_at\\\":\\\"2018-11-28 14:49:37\\\",\\\"country\\\":null,\\\"gender\\\":null,\\\"site\\\":\\\"ask.fm\\\",\\\"short_bio\\\":\\\"good writer\\\",\\\"about\\\":\\\"good girl\\\",\\\"image\\\":\\\"user\\\\\\/4\\\\\\/1535937328\\\"} Like Your post\",\"post_id\":6}', '2019-01-02 13:56:24', '2019-01-02 13:49:22', '2019-01-02 13:56:24'),
('23689add-6319-4f0f-b687-7210ae8e4210', 'App\\Notifications\\Notify', 'App\\User', 5, '{\"data\":\"Muhammad Mamdouh  commented on  Your post\",\"post_id\":1}', '2019-04-16 23:40:39', '2019-04-06 22:18:25', '2019-04-16 23:40:39'),
('28e225fb-15cb-44ba-bfd1-735ec35c35c3', 'App\\Notifications\\Notify', 'App\\User', 5, '{\"data\":\"fidaa hassan Like Your post\",\"post_id\":6}', '2019-01-02 13:56:23', '2019-01-02 13:50:36', '2019-01-02 13:56:23'),
('4cdb81e9-b336-466f-bc95-5e4ae0e7e797', 'App\\Notifications\\Notify', 'App\\User', 5, '{\"data\":\"Muhammad Mamdouh  commented on  Your post\",\"post_id\":1}', '2019-04-16 23:40:39', '2019-04-06 23:05:08', '2019-04-16 23:40:39'),
('55eae532-304c-4db6-9f1c-73898713b4c1', 'App\\Notifications\\Notify', 'App\\User', 5, '{\"data\":\"fidaa hassan  commented on  Your post\",\"post_id\":6}', '2019-01-03 11:52:00', '2019-01-02 20:02:45', '2019-01-03 11:52:00'),
('560e067f-d991-415b-8a8a-3da0fa210701', 'App\\Notifications\\Notify', 'App\\User', 5, '{\"data\":\"Muhammad Mamdouh  commented on  Your post\",\"post_id\":1}', '2019-03-13 22:41:10', '2019-03-09 15:06:06', '2019-03-13 22:41:10'),
('6e5ea3cd-c544-48ee-a5bb-7022c0a77569', 'App\\Notifications\\Notify', 'App\\User', 5, '{\"data\":\"fidaa hassan  commented on  Your post\",\"post_id\":6}', '2019-01-02 15:43:32', '2019-01-02 15:42:38', '2019-01-02 15:43:32'),
('6e8c770e-ac7e-4349-ad02-e76af151f9ab', 'App\\Notifications\\Notify', 'App\\User', 5, '{\"data\":\"Muhammad Mamdouh  commented on  Your post\",\"post_id\":1}', '2019-04-16 23:40:39', '2019-04-06 23:05:15', '2019-04-16 23:40:39'),
('90ed58a7-18de-4d48-b5d0-f6b44e7a118c', 'App\\Notifications\\Notify', 'App\\User', 5, '{\"data\":\"Muhammad Mamdouh  commented on  Your post\",\"post_id\":1}', '2019-01-12 22:36:41', '2019-01-11 12:45:18', '2019-01-12 22:36:41'),
('a5ab434d-d300-4ec9-9e79-eab3033ed965', 'App\\Notifications\\Notify', 'App\\User', 5, '{\"data\":\"Muhammad Mamdouh  commented on  Your post\",\"post_id\":1}', '2019-04-16 23:40:39', '2019-04-06 22:24:09', '2019-04-16 23:40:39'),
('a83a902a-7fbd-48ae-ac97-86c557f947b9', 'App\\Notifications\\Notify', 'App\\User', 5, '{\"data\":\"Muhammad Mamdouh  commented on  Your post\",\"post_id\":1}', '2019-04-16 23:40:39', '2019-04-05 23:41:04', '2019-04-16 23:40:39'),
('aa3da2b8-4eba-4486-9963-bf89f115e6fc', 'App\\Notifications\\Notify', 'App\\User', 5, '{\"data\":\"Muhammad Mamdouh likes Your post\",\"post_id\":1}', '2019-03-13 22:41:10', '2019-01-15 19:40:00', '2019-03-13 22:41:10'),
('b0df426e-ac05-4390-b9ea-cb7ed73a3411', 'App\\Notifications\\Notify', 'App\\User', 5, '{\"data\":\"fidaa hassan  commented on  Your post\",\"post_id\":6}', '2019-01-02 15:43:32', '2019-01-02 15:38:15', '2019-01-02 15:43:32'),
('b11b50c7-6d26-483a-996f-86fd0447f33c', 'App\\Notifications\\Notify', 'App\\User', 5, '{\"data\":\"fidaa hassan  commented on  Your post\",\"post_id\":6}', '2019-01-02 15:43:32', '2019-01-02 15:37:10', '2019-01-02 15:43:32'),
('b21b84ee-f328-4e61-be7f-71f6f4ae6518', 'App\\Notifications\\Notify', 'App\\User', 5, '{\"data\":\"fidaa hassan  commented on  Your post\",\"post_id\":6}', '2019-01-03 11:52:00', '2019-01-02 20:02:34', '2019-01-03 11:52:00'),
('c6420381-3d22-41ba-b40d-27608c81112e', 'App\\Notifications\\Notify', 'App\\User', 5, '{\"data\":\"fidaa hassan  commented on  Your post\",\"post_id\":6}', '2019-01-03 11:52:00', '2019-01-02 15:43:43', '2019-01-03 11:52:00'),
('cb5de936-6686-48de-a9fe-cd40f70ee93a', 'App\\Notifications\\Notify', 'App\\User', 5, '{\"data\":\"Muhammad Mamdouh likes Your post\",\"post_id\":1}', '2019-01-03 14:05:38', '2019-01-03 14:05:23', '2019-01-03 14:05:38'),
('e41a8d6c-1442-4628-9e21-a1b56a4c160e', 'App\\Notifications\\Notify', 'App\\User', 5, '{\"data\":\"fidaa hassan  commented on  Your post\",\"post_id\":6}', '2019-01-02 13:56:23', '2019-01-02 13:51:43', '2019-01-02 13:56:23'),
('fd4ef30c-6174-4ff7-8b08-9999bde06051', 'App\\Notifications\\Notify', 'App\\User', 5, '{\"data\":\"Muhammad Mamdouh  commented on  Your post\",\"post_id\":1}', '2019-03-13 22:41:10', '2019-03-13 22:37:20', '2019-03-13 22:41:10');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('muhammadmamdouh93@gmail.com', '$2y$10$.PgReoC/mG6mzAADpzDGT.m3Y9IPm.vMx.ygrWDfjUxs4KsjwfjQq', '2018-12-12 23:19:57');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `key`, `table_name`, `created_at`, `updated_at`) VALUES
(89, 'browse_admin', NULL, '2018-11-30 12:14:54', '2018-11-30 12:14:54'),
(90, 'browse_users', NULL, '2018-11-30 12:14:55', '2018-11-30 12:14:55'),
(91, 'browse_database', NULL, '2018-11-30 12:14:56', '2018-11-30 12:14:56'),
(92, 'browse_posts', 'posts', '2018-11-30 12:14:57', '2018-11-30 12:14:57'),
(93, 'read_posts', 'posts', '2018-11-30 12:14:59', '2018-11-30 12:14:59'),
(94, 'edit_posts', 'posts', '2018-11-30 12:15:00', '2018-11-30 12:15:00'),
(95, 'add_posts', 'posts', '2018-11-30 12:15:01', '2018-11-30 12:15:01'),
(96, 'delete_posts', 'posts', '2018-11-30 12:15:03', '2018-11-30 12:15:03'),
(97, 'browse_roles', 'roles', '2018-11-30 12:15:04', '2018-11-30 12:15:04'),
(98, 'read_roles', 'roles', '2018-11-30 12:15:05', '2018-11-30 12:15:05'),
(99, 'edit_roles', 'roles', '2018-11-30 12:15:06', '2018-11-30 12:15:06'),
(100, 'add_roles', 'roles', '2018-11-30 12:15:07', '2018-11-30 12:15:07'),
(101, 'delete_roles', 'roles', '2018-11-30 12:15:08', '2018-11-30 12:15:08'),
(102, 'browse_users', 'users', '2018-11-30 12:15:09', '2018-11-30 12:15:09'),
(103, 'read_users', 'users', '2018-11-30 12:15:10', '2018-11-30 12:15:10'),
(104, 'edit_users', 'users', '2018-11-30 12:15:11', '2018-11-30 12:15:11'),
(105, 'add_users', 'users', '2018-11-30 12:15:11', '2018-11-30 12:15:11'),
(106, 'delete_users', 'users', '2018-11-30 12:15:12', '2018-11-30 12:15:12');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(89, 1),
(95, 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(191) NOT NULL,
  `meta_keyworda` text,
  `title` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `slug`, `meta_keyworda`, `title`, `details`, `image`, `updated_at`, `created_at`) VALUES
(2, 5, 'slug', NULL, 'حوار تخيلي', ' سرحان في إيه ؟\r\n- زمان كنت بسأل نفسي كتير ليه بطل الفيلم أو الرواية اختار الحب الغلط ؟! \r\nبمعنى إنه ليه ساب بنت عمه الجميلة اللى فيها مميزات كتير والاهم من كل دا انها بتحبه وراح يحب واحدة تانية ممكن تكون بتحبه وممكن لا ؟ ليه اختار يحب واحدة وهو عارف انها مش ليه او فيه عوائق كتير تمنع الحب دا يكتمل؟\r\nيعنى إيه البطل يقولها أنا حبيتك من أول نظرة ؟ طيب حبها ازاى وهو مايعرفهاش ؟!\r\nلحد ما حصلت حاجة غيرت كل اجاباتى عن الاسئلة دى\r\n* حاجة ايه ؟\r\n- قبل ما اعرفك أو اشوفك شوفت بنات كتير .. كانوا حلوين ومميزين وفيهم صفات كتير بحبها لكن كان فيه دايما حاجة تصدنى عنهم ومش عارف ايه هى لكن لما شوفتك حسيت ناحيتك بإحساس غريب مافهمتوش وبرغم انى كنت لسة مش عارفك كويس لكن كان فيه حاجة جوايا بتقول \" هي دي \" حاولت أكتم المشاعر دى - كالعادة - لكن ماعرفتش .. الاحساس دا فضل يكبر ويكبر لحد ما سيطر علي وبقى متحكم فيا\r\nساعتها لقيت نفسي بهتم بيكي من غير ما اقصد .. حبيت كل حاجة انتى بتعمليها .. حبيت كل حاجة انتى بتحبيها .. حبيت الرسم ، الشعر ، الموسيقى حتى الروايات اللى كنت بعتبرها تضييع وقت بقيت مدمن ليها\r\nالاغرب من كدا بقى انى لقيت نفسي بتغير وانا معرفش .. شوفتك مثالية أوي فحبيت أبقى زيك عشان أستحق تكملي حياتك معايا أو يمكن حبيت أبقى شبهك \r\nعرفت ساعتها ان مش احنا اللى بنختار اللى بنحبهم .. عرفت ان فعلا الحب أعمى بس مش عشان بيخلينا مانشوفش عيوب اللى بنحبهم لكن عشان بيختار وهو مغمض ومش بيراعى أى ظروف أو عوائق وكأنه أقوى قوة خلقها ربنا\r\n#حوار_تخيلي\r\nبوست كتبته من حوالي 5 سنين ومن أقرب البوستات إلى قلبي :D \r\nجدير بالذكر إنى لما بحثت عنه على الفيس لقيت كتير واخده كوبي بيست واخدوا اللايكس والشير لنفسهم وحسبي الله ونعم الوكيل :D', 'posts/1554690408.jpeg', '2019-04-09 00:56:28', '2019-04-09 00:56:28'),
(3, 5, 'slug 2', NULL, 'The guest', '<p>amanda</p>', 'posts/1554690521.jpeg', '2019-04-08 00:28:41', '2019-04-08 00:28:41');

-- --------------------------------------------------------

--
-- Table structure for table `post_likes`
--

CREATE TABLE `post_likes` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `display_name` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', '2018-11-29 21:18:52', '2018-11-29 21:18:52'),
(2, 'user', 'Normal User', '2018-11-29 21:19:16', '2018-11-29 21:19:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `roles_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT 'users/default.png',
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `site` varchar(255) DEFAULT NULL,
  `short_bio` varchar(255) DEFAULT NULL,
  `about` text,
  `image` varchar(255) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `roles_id`, `name`, `email`, `avatar`, `password`, `created_at`, `updated_at`, `country`, `gender`, `site`, `short_bio`, `about`, `image`, `remember_token`) VALUES
(4, NULL, NULL, 'fidaa hassan', 'fidaa@gmail.com', 'users/default.png', '$2y$10$djoKP.Xox4PeRI/i94dD2unMl4JFLY9ikXJFO9l14zZJYLL/TBxNe', '2018-09-02 23:15:28', '2018-11-28 12:49:37', NULL, NULL, 'ask.fm', 'good writer', 'good girl', 'user/4/1535937328', 'ZnXiCMzNaYaJAUpjbmKO5wlZXBJqqHVte0cjQVBY3xaGtwcYUGYWlEwtrpXZ'),
(5, NULL, NULL, 'Muhammad Mamdouh', 'muhammadmamdouh93@gmail.com', 'users/default.png', '$2y$10$l/XaYi5GgJ5p.5UIkDSew.HAlx4kV0Q2bDXnMg1I.SaJH00Xb1496', '2018-09-04 08:18:04', '2019-01-15 11:58:47', 'Egypt', NULL, 'https://www.facebook.com/m.mamdouh7', 'web developer', 'Web developer and designer , I love watching movies and I hope I can be useful for this website', 'users//1547560727.jpeg', 'DvWHeaOmPp0IckdZCQv3PQy53i5EpX52QjaDIVUXmmUB9bK0xG0rKe96sJ6H'),
(6, NULL, NULL, 'Hossam Nasr', 'hossam@gmail.com', 'users/default.png', '$2y$10$0LXWpPXi4hTMpAog4wDcJOH21yUGmHruUrD8IJd.eBQBCCbl1SPd.', '2018-09-20 22:53:56', '2018-09-20 22:53:56', NULL, NULL, 'site', 'bio', '@if ($errors->has(\'image\'))\r\n                                        <span class=\"help-block\">\r\n                                        <strong>{{ $errors->first(\'image\') }}</strong>\r\n                                    </span>\r\n                                    @endif @if ($errors->has(\'image\'))\r\n                                        <span class=\"help-block\">\r\n                                        <strong>{{ $errors->first(\'image\') }}</strong>\r\n                                    </span>\r\n                                    @endif', 'user/6/1537491236', NULL),
(19, NULL, NULL, 'Lenora Stoltenberg', 'aron18@example.com', 'users/default.png', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', '2018-11-02 19:19:56', '2018-11-02 19:19:56', 'Sudan', NULL, 'https://www.feeney.info/illum-et-aut-ut-ea', 'Quae eligendi sit ad qui vel tempore aut. Earum nam voluptatem sequi recusandae beatae nobis perferendis. Iste id eum commodi.', 'Rerum ullam porro soluta dolor quidem. Voluptatem minima non sed ut. Qui reprehenderit quidem vitae modi ut fugit tempore. Aperiam officia eos expedita et sunt. Qui odio ab ut ullam at. Et illo sit blanditiis nisi. Rerum harum tempora eligendi porro aperiam tempora impedit. Ex similique enim delectus non est. Autem repellat cum ipsum sit minima eos.', 'user\\b7fd85e1fb59529fc1f571b035700635.jpg', '5LDOafjStQ'),
(21, NULL, NULL, 'Dr. Ambrose Powlowski', 'vvon@example.net', 'users/default.png', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', '2018-11-02 19:19:56', '2018-11-02 19:19:56', 'Belgium', NULL, 'http://www.wiegand.com/explicabo-neque-tempore-quos-sunt-doloremque', 'Consequatur qui molestias aut accusantium iure assumenda. Est voluptas hic est alias. Voluptas ut quo nemo at. Error ea libero aut sed omnis quo.', 'Praesentium unde est quas officiis rerum sunt. In saepe molestiae officiis quia magni. Natus sint facilis et occaecati. Magnam quaerat est qui labore. Minima quia laborum qui voluptatibus et est quo. Quaerat incidunt vel consequatur corporis suscipit officiis. Iure ut non rerum.', 'user\\b7fd85e1fb59529fc1f571b035700635.jpg', 'b9ILC4zuQ1'),
(22, NULL, NULL, 'Prof. Donna Willms', 'greenholt.meda@example.net', 'users/default.png', '$2y$10$g7ZtlP.BU0iqJ21iBRX5cOgrQqLdNVCOz74Jl5OOKvZr2RJdowW1y', '2018-11-02 19:19:56', '2018-11-12 21:41:08', 'Belgium', NULL, 'https://douglas.com/eligendi-reprehenderit-quia-et-deserunt-tempore-omnis.html', 'Autem omnis omnis voluptatum quis in et autem similique. Est quia harum labore est et enim velit. Harum perferendis est quam quam soluta sint magni quia.', 'Ipsam possimus tempore necessitatibus aspernatur rerum. Rerum id itaque ea autem nemo tenetur et corrupti. Ut odio mollitia quibusdam quam qui libero cupiditate corrupti. Saepe iure ipsum dignissimos mollitia. Sapiente similique eos rerum consectetur et repudiandae veniam. Est esse quod nihil minima officia culpa ut. Aliquam illo dolores doloremque qui vero similique.', 'user/4b9ae47fa333f9be36ff3d53b72fed57.jpg', 'D6oWbu4SrA'),
(24, NULL, NULL, 'Mekhi Kuhic', 'marcelino.howell@example.com', 'users/default.png', '$2y$10$PO9AOFueuFt7w7UDn8it0OViMwzJHuxQp.2iVdcQhD69NK/HYFaVK', '2018-11-12 21:08:33', '2018-11-28 21:51:03', 'Spain', NULL, 'http://graham.com/iste-maxime-nemo-eligendi-dignissimos', 'Repudiandae id ducimus nesciunt. Itaque at voluptas et tenetur quo quod placeat. Occaecati illo in quibusdam cumque. Aut dicta omnis ut optio ut voluptas.', 'Est sit totam natus nobis impedit. Labore mollitia officia adipisci autem voluptas labore magni. Magnam delectus odit cumque repellendus fugit possimus ipsa. Eum soluta aut optio aut. Est cum non et quo beatae error. Deserunt quo iste voluptatem fuga quia beatae. Sed iusto reprehenderit ullam consequatur. Non natus soluta porro molestiae.', 'user\\7ca6e94a94f8f56c8a0ae9bec0fef0c0.jpg', 'jMqpWgmoUD'),
(25, NULL, NULL, 'Bailee Konopelski I', 'elsie64@example.com', 'users/default.png', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', '2018-11-12 21:10:16', '2018-11-12 21:10:16', 'Zambia', NULL, 'http://konopelski.info/porro-a-placeat-molestias-quos-nisi', 'Dolorum rerum molestiae laudantium. Beatae nisi consequuntur sit voluptatem eaque fuga quas. Voluptatem illo rem quisquam excepturi. Reprehenderit dolor est aut adipisci doloribus.', 'Nisi et rerum totam temporibus. Aut molestias et vel id non ducimus reprehenderit. Omnis repellat nihil voluptatem nobis accusamus. Quidem delectus pariatur corporis earum in eligendi. Eum et officiis quod. Modi et corporis saepe. Modi rerum culpa ut.', 'user\\b7fd85e1fb59529fc1f571b035700635.jpg', 'eILlzqBfTx'),
(26, NULL, NULL, 'Fatma Hassan', 'fatma@gmail.com', 'users/default.png', '$2y$10$89QNOZzNb49pOlUPk0C0muq.Xy.l/gH5iAaIdSHVtFNIBt9HLPBIW', '2018-11-28 21:26:21', '2018-11-28 21:26:21', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, NULL, NULL, 'Amanda Cerny', 'amanda@gmail.com', 'users/default.png', '$2y$10$1VFSARFPlp/WocekZblrtubn0ac.mKGVwjgwTV7vWn10xlTExijP.', '2018-12-09 21:27:42', '2018-12-09 21:27:42', NULL, NULL, 'https://www.facebook.com/m.mamdouh7', 'actress and model', 'actress and model', 'user//1544398062', '3oXoUK14hseed5LsJ5AEHM0j7A3iFMUb20BwmSbdHbRo4YVxq1CSGA5rPi2M'),
(29, NULL, NULL, 'Alexandra', 'alex@gmail.com', 'users/default.png', '$2y$10$4udr3ygYdXhMrfmeqQDfHOwzBWolvIBgalbsCxQ6ltVaDZ3foR.qO', '2018-12-09 21:39:26', '2018-12-09 21:39:26', NULL, NULL, 'www.facebook.com', 'bio', 'شلاخعف', 'http://localhost/imdb/public/images/user.png', NULL),
(30, NULL, NULL, 'Alexandra', 'aleax@gmail.com', 'users/default.png', '$2y$10$Se4UvzBpxfEGzz4I5L5MseyINfOjfIYb5nU6ELXZLGKbxRcJhIdcy', '2018-12-09 21:53:53', '2018-12-09 21:53:53', NULL, NULL, 'www.facebook.com', 'bio', 'شلاخعف', 'http://localhost/imdb/public/images/user.png', NULL),
(31, NULL, NULL, 'omar', 'omar@gmail.com', 'users/default.png', '$2y$10$0emzb/P9EBsnIuEKx/Wi8eCxndFW0cxCWaR/PUZqQmXZxEVsw7X4y', '2018-12-09 21:59:00', '2018-12-09 21:59:00', NULL, NULL, 'ask.fm/sarakhlil', 'nice man', 'about', 'http://localhost/imdb/public/images/user.png', NULL),
(32, NULL, NULL, 'Hossam Nasr', 'hassanzohdya@gmail.com', 'users/default.png', '$2y$10$h3Uo1xz0ArdKzIBeZySEpupmgSWLJ7sHS/wctpH94fj91hD1pKhgW', '2018-12-10 12:31:10', '2018-12-10 12:31:10', NULL, NULL, 'site', 'short bio', 'about', 'http://localhost/imdb/public/images/user.png', NULL),
(33, NULL, NULL, 'Muhammad Mamdouh', 'mamdouh@gmail.com', 'users/default.png', '$2y$10$SoPXXsD2ii7oJJKM.VOC5.ljfRJUEopiIQ3I49JBLuUf9OEJfHmaG', '2018-12-10 13:55:55', '2018-12-10 13:55:55', NULL, NULL, 'www.facebook.com', 'nice man', 'about', 'http://localhost/imdb/public/images/user.png', NULL),
(34, NULL, NULL, 'Muhammad Mamdouh', 'muhammadmamdouh3@gmail.com', 'users/default.png', '$2y$10$J5cLsbwQ.lU/zNwla7B.a.zlfnjt1J/VpliNReHnMjDzTNT/AetVG', '2018-12-10 20:08:26', '2018-12-10 20:08:26', NULL, NULL, 'www.facebook.com', 'nice man', NULL, 'http://localhost/imdb/public/images/user.png', NULL),
(35, NULL, NULL, 'Muhammad Mamdouh', 'muhammadmamdouh53@gmail.com', 'users/default.png', '$2y$10$AOtJ/ArSci9OrBQi0oyctOVgg/TR18yTD6y2vn444OVL/Dw.Ixvvy', '2018-12-10 20:12:20', '2018-12-10 20:12:20', NULL, NULL, 'www.facebook.com', 'nice man', NULL, 'http://localhost/imdb/public/images/user.png', NULL),
(36, NULL, NULL, 'Muhammad Mamdouh', 'muhammadmamdouh@gmail.com', 'users/default.png', '$2y$10$5Y8E3yAsHa.J7KKYXb8Rie8YJQgVjO4cTuKk3QMMLbstR8A01NO8S', '2018-12-10 21:14:25', '2018-12-10 21:14:25', NULL, NULL, 'www.facebook.com', 'nice man', NULL, 'user/1544483665', NULL),
(37, NULL, NULL, 'Muhammad Mamdouh', 'muhammadcmamdouh93@gmail.com', 'users/default.png', '$2y$10$8MbPkiCw3op5sywo7OdzZ.fS88qbaQ.N1kGbIS4Oc67tGjWR/VpHG', '2018-12-10 23:02:33', '2018-12-10 23:02:33', NULL, NULL, 'www.facebook.com', 'good writer', NULL, 'http://localhost/imdb/public/images/user.png', NULL),
(38, NULL, NULL, 'Muhammad Mamdouh', 'muhammadxcmamdouh93@gmail.com', 'users/default.png', '$2y$10$TlGW4I7vXJwgM56jDgmQjuWYyYOxpn1xrtmq/HBE8IbJ8BEE7XZHO', '2018-12-10 23:03:52', '2018-12-10 23:03:52', NULL, NULL, 'www.facebook.com', 'good writer', NULL, 'http://localhost/imdb/public/images/user.png', NULL),
(39, NULL, NULL, 'Muhammad Mamdouh', 'muhammadmamdxouh93@gmail.com', 'users/default.png', '$2y$10$CqOn8R.TPhkwmVpMtsKVkOqS7ZUchGZOInSaAZZRF1L.zcOWnkuNm', '2018-12-10 23:17:46', '2018-12-10 23:17:46', NULL, NULL, 'www.facebook.com', 'nice man', NULL, 'http://localhost/imdb/public/images/user.png', NULL),
(40, NULL, 2, 'Muhammad Mamdouh', 'muhammadmamdouh93@gmail.com', 'users/default.png', '$2y$10$SozHM0QUrCSyqtErENQxVeOK05.IcKKMt9IpQLWWtg8oVS.QnaKTa', '2018-12-11 22:29:59', '2018-12-11 23:02:21', 'Egypt', NULL, 'http://www.facebook.com', 'nice man', 'm', 'user//Muhammad Mamdouh1544576541.jpeg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`user_id`, `role_id`) VALUES
(5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `api_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `name`, `link`, `api_id`, `created_at`, `updated_at`) VALUES
(5, 'الموهوبون في الأرض', 'https://www.youtube.com/channel/UCMiKsCT21CZXLSGgQ4ZkmFg', 'UCMiKsCT21CZXLSGgQ4ZkmFg', '2018-11-14 22:39:48', '2018-11-14 22:39:48'),
(6, 'Film gamed', 'https://www.youtube.com/user/FilmGamedDotCom', 'UCwiCyswBHPe50z7yGkDSDqw', '2018-11-14 22:45:29', '2018-11-14 22:45:29'),
(7, 'RocketJump Film School', 'https://www.youtube.com/channel/UC3KpzBeoM8lDvn85m4szzfA', 'UC3KpzBeoM8lDvn85m4szzfA', '2018-12-24 22:59:30', '2018-12-24 22:59:30'),
(8, 'Cinematology', 'https://www.youtube.com/channel/UC10SfPSboETwFoHzERxtITw', 'UC10SfPSboETwFoHzERxtITw', '2018-12-24 23:27:34', '2018-12-24 23:27:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cast`
--
ALTER TABLE `cast`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cast_jobs`
--
ALTER TABLE `cast_jobs`
  ADD PRIMARY KEY (`cast_id`,`job_id`),
  ADD KEY `cast_id` (`cast_id`),
  ADD KEY `job_id` (`job_id`);

--
-- Indexes for table `cast_media`
--
ALTER TABLE `cast_media`
  ADD PRIMARY KEY (`cast_id`,`id`),
  ADD KEY `cast_id` (`cast_id`,`id`),
  ADD KEY `media_id` (`id`);

--
-- Indexes for table `cast_of_movies`
--
ALTER TABLE `cast_of_movies`
  ADD PRIMARY KEY (`cast_id`,`movies_id`,`job_id`),
  ADD KEY `fk_cast_has_movies_movies1_idx` (`movies_id`),
  ADD KEY `fk_cast_has_movies_cast1_idx` (`cast_id`),
  ADD KEY `fk_cast_has_movies_job1_idx` (`job_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`,`post_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friend_with`
--
ALTER TABLE `friend_with`
  ADD PRIMARY KEY (`follower`,`followed`),
  ADD KEY `user1` (`follower`,`followed`),
  ADD KEY `user2` (`followed`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movies_category`
--
ALTER TABLE `movies_category`
  ADD PRIMARY KEY (`movies_id`,`category_id`),
  ADD KEY `fk_movies_has_category_category1_idx` (`category_id`),
  ADD KEY `fk_movies_has_category_movies1_idx` (`movies_id`);

--
-- Indexes for table `movies_reviews`
--
ALTER TABLE `movies_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`user_id`,`movies_id`),
  ADD KEY `movies_id` (`movies_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_key_index` (`key`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_permission_id_index` (`permission_id`),
  ADD KEY `permission_role_role_id_index` (`role_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`) USING BTREE,
  ADD KEY `users_id` (`user_id`);

--
-- Indexes for table `post_likes`
--
ALTER TABLE `post_likes`
  ADD PRIMARY KEY (`id`,`post_id`,`user_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`roles_id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `user_roles_user_id_index` (`user_id`),
  ADD KEY `user_roles_role_id_index` (`role_id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cast`
--
ALTER TABLE `cast`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `cast_media`
--
ALTER TABLE `cast_media`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `movies_reviews`
--
ALTER TABLE `movies_reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `post_likes`
--
ALTER TABLE `post_likes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cast_jobs`
--
ALTER TABLE `cast_jobs`
  ADD CONSTRAINT `cast_jobs_ibfk_1` FOREIGN KEY (`cast_id`) REFERENCES `cast` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cast_jobs_ibfk_2` FOREIGN KEY (`job_id`) REFERENCES `job` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cast_media`
--
ALTER TABLE `cast_media`
  ADD CONSTRAINT `cast_media_ibfk_1` FOREIGN KEY (`cast_id`) REFERENCES `cast` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cast_of_movies`
--
ALTER TABLE `cast_of_movies`
  ADD CONSTRAINT `fk_cast_has_movies_cast1` FOREIGN KEY (`cast_id`) REFERENCES `cast` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cast_has_movies_job1` FOREIGN KEY (`job_id`) REFERENCES `job` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cast_has_movies_movies1` FOREIGN KEY (`movies_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `friend_with`
--
ALTER TABLE `friend_with`
  ADD CONSTRAINT `friend_with_ibfk_1` FOREIGN KEY (`follower`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `friend_with_ibfk_2` FOREIGN KEY (`followed`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `movies_category`
--
ALTER TABLE `movies_category`
  ADD CONSTRAINT `fk_movies_has_category_category1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_movies_has_category_movies1` FOREIGN KEY (`movies_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `movies_reviews`
--
ALTER TABLE `movies_reviews`
  ADD CONSTRAINT `movies_reviews_ibfk_1` FOREIGN KEY (`movies_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `movies_reviews_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_ibfk_1` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post_likes`
--
ALTER TABLE `post_likes`
  ADD CONSTRAINT `post_likes_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_likes_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_roles_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

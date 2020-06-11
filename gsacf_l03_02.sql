-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2020-06-11 15:09:16
-- サーバのバージョン： 10.4.11-MariaDB
-- PHP のバージョン: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gsacf_l03_02`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `kakeibousers_table`
--

CREATE TABLE `kakeibousers_table` (
  `id` int(12) NOT NULL,
  `user_id` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` int(11) NOT NULL,
  `is_deleated` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `kakeibousers_table`
--

INSERT INTO `kakeibousers_table` (`id`, `user_id`, `password`, `is_admin`, `is_deleated`, `created_at`, `updated_at`) VALUES
(2, 'ayako', '1731', 1, 0, '2020-06-11 15:34:30', '2020-06-11 15:34:30'),
(3, 'kyoda', '0903', 0, 0, '2020-06-11 17:12:40', '2020-06-11 17:12:40');

-- --------------------------------------------------------

--
-- テーブルの構造 `kakeibo_table`
--

CREATE TABLE `kakeibo_table` (
  `id` int(12) NOT NULL,
  `budget` int(11) NOT NULL,
  `items` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `spending` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `deadline` date NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `kakeibo_table`
--

INSERT INTO `kakeibo_table` (`id`, `budget`, `items`, `spending`, `amount`, `deadline`, `created_at`, `updated_at`) VALUES
(49, 200000, '食費', 0, 1500, '2020-06-09', '2020-06-09 14:24:18', '2020-06-09 14:24:18'),
(50, 200000, '固定費', 0, 1000, '2020-06-10', '2020-06-09 14:27:45', '2020-06-09 14:28:09'),
(52, 200000, '固定費', 0, 43000, '2020-06-11', '2020-06-11 12:27:45', '2020-06-11 12:28:23'),
(55, 200000, '食費', 0, 500, '2020-06-11', '2020-06-11 12:41:00', '2020-06-11 12:41:00'),
(56, 200000, '食費', 0, 1500, '2020-06-11', '2020-06-11 15:36:37', '2020-06-11 15:36:37'),
(57, 200000, '食費', 0, 1800, '2020-06-11', '2020-06-11 16:09:47', '2020-06-11 16:09:47'),
(59, 200000, '被服・美容費', 0, 5000, '2020-06-11', '2020-06-11 19:45:00', '2020-06-11 19:45:00');

-- --------------------------------------------------------

--
-- テーブルの構造 `todo_table`
--

CREATE TABLE `todo_table` (
  `id` int(12) NOT NULL,
  `todo` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deadline` date NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `todo_table`
--

INSERT INTO `todo_table` (`id`, `todo`, `deadline`, `created_at`, `updated_at`) VALUES
(3, 'テスト', '2020-06-05', '2020-06-05 12:19:20', '2020-06-05 12:19:20'),
(4, '京田', '2020-07-01', '2020-06-05 12:20:13', '2020-06-05 12:20:13'),
(7, 'aaaaa', '2020-06-03', '2020-06-09 14:02:35', '2020-06-09 14:02:35'),
(8, 'aaaaa', '2020-06-11', '2020-06-11 12:47:31', '2020-06-11 12:47:31');

-- --------------------------------------------------------

--
-- テーブルの構造 `users_table`
--

CREATE TABLE `users_table` (
  `id` int(12) NOT NULL,
  `user_id` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` int(11) NOT NULL,
  `is_deleated` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `users_table`
--

INSERT INTO `users_table` (`id`, `user_id`, `password`, `is_admin`, `is_deleated`, `created_at`, `updated_at`) VALUES
(1, 'testuser', '123456', 1, 0, '2020-06-09 12:08:05', '2020-06-09 12:08:05'),
(2, 'ayako', '0903', 0, 0, '2020-06-09 15:53:10', '2020-06-09 15:53:10'),
(3, 'keiko', '0902', 0, 0, '2020-06-09 15:54:02', '2020-06-09 15:54:02'),
(4, 'kyodaayako', '5393', 0, 0, '2020-06-09 15:56:58', '2020-06-09 15:56:58');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `kakeibousers_table`
--
ALTER TABLE `kakeibousers_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `kakeibo_table`
--
ALTER TABLE `kakeibo_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `todo_table`
--
ALTER TABLE `todo_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `users_table`
--
ALTER TABLE `users_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `kakeibousers_table`
--
ALTER TABLE `kakeibousers_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- テーブルのAUTO_INCREMENT `kakeibo_table`
--
ALTER TABLE `kakeibo_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- テーブルのAUTO_INCREMENT `todo_table`
--
ALTER TABLE `todo_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- テーブルのAUTO_INCREMENT `users_table`
--
ALTER TABLE `users_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

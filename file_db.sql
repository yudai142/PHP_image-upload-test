-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:8889
-- 生成日時: 2021 年 2 月 09 日 11:48
-- サーバのバージョン： 5.7.26
-- PHP のバージョン: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `file_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `file_db`
--

CREATE TABLE `file_db` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `description` varchar(140) DEFAULT NULL,
  `insert_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `file_db`
--

INSERT INTO `file_db` (`id`, `file_name`, `file_path`, `description`, `insert_time`, `update_time`) VALUES
(1, 'original (1).jpg', '/Applications/MAMP/htdocs/upload_test/images/20210209114334original (1).jpg', 'ddddd', '2021-02-09 20:43:34', '2021-02-09 20:43:34');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `file_db`
--
ALTER TABLE `file_db`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `file_path` (`file_path`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `file_db`
--
ALTER TABLE `file_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

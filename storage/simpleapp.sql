-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Час створення: Бер 04 2018 р., 18:03
-- Версія сервера: 5.7.19
-- Версія PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `simpleapp`
--

-- --------------------------------------------------------

--
-- Структура таблиці `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `post_index` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `street_number` int(11) DEFAULT NULL,
  `office_number` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `address`
--

INSERT INTO `address` (`id`, `post_index`, `state`, `city`, `street`, `street_number`, `office_number`, `user_id`) VALUES
(1, '0123', 'AR', 'City2 ', 'street 2', 34, 1, 2),
(2, '0043', 'DZ', 'City2', 'Street 2', 32, 1, 1),
(3, '3454', 'AW', 'City 3', 'Street 3', 34, 21, 1),
(4, '90909', 'GM', 'City 4', 'street 4', 43, 2, 1),
(5, '5433', 'GY', 'City 5', 'Street 5', 32, 1, 1),
(6, '2111', 'CY', 'City 6', 'Street 6', 54, NULL, 1),
(7, '9090', 'NE', 'City 7', 'street 7', 54, 3, 1);

-- --------------------------------------------------------

--
-- Структура таблиці `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1520175054),
('m180303_125433_create_user_table', 1520175057),
('m180303_133509_create_address_table', 1520175058);

-- --------------------------------------------------------

--
-- Структура таблиці `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `secondname` varchar(255) NOT NULL,
  `gender` int(11) DEFAULT '0',
  `created` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `name`, `secondname`, `gender`, `created`, `email`) VALUES
(1, 'user', '123456', 'User', 'User ', 1, '2018-03-04T17:54:39+0300', 'example@mail.com'),
(2, 'user2', '123456', 'User2', 'User 2', 0, '2018-03-04T17:57:27+0300', 'example3@mail.com');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-address-user_id` (`user_id`);

--
-- Індекси таблиці `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Індекси таблиці `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблиці `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Обмеження зовнішнього ключа збережених таблиць
--

--
-- Обмеження зовнішнього ключа таблиці `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `fk-address-user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

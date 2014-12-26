-- phpMyAdmin SQL Dump
-- version 4.0.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Час створення: Гру 26 2014 р., 19:55
-- Версія сервера: 5.5.38-log
-- Версія PHP: 5.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База даних: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблиці `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `description` text NOT NULL,
  `datetime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Дамп даних таблиці `products`
--

INSERT INTO `products` (`id`, `user_id`, `title`, `price`, `description`, `datetime`) VALUES
(8, 6, 'стол', '450.00', 'Старый но крепкий дубовый стол', 1419609084),
(9, 6, 'мяч', '103.50', 'новый кожаный футбольнй мяч', 1419607031),
(10, 1, 'велосипед', '230.90', 'Детский двухколесный желтый велосипед', 1419609176);

-- --------------------------------------------------------

--
-- Структура таблиці `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп даних таблиці `users`
--

INSERT INTO `users` (`id`, `login`, `pass`) VALUES
(1, 'vasya', '111'),
(6, 'president', '1111');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

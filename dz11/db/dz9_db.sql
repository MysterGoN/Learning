-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Апр 22 2016 г., 21:25
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `wow`
--

-- --------------------------------------------------------

--
-- Структура таблицы `ads`
--

CREATE TABLE IF NOT EXISTS `ads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `private_id` int(11) DEFAULT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(20) DEFAULT NULL,
  `allow_mail_id` int(11) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `ad_category_id` int(11) DEFAULT NULL,
  `title` varchar(50) NOT NULL,
  `description` text,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Дамп данных таблицы `ads`
--

INSERT INTO `ads` (`id`, `private_id`, `name`, `email`, `allow_mail_id`, `phone`, `city_id`, `ad_category_id`, `title`, `description`, `price`) VALUES
(4, 1, '321', '321', 1, 321, 641600, 8, '321', '321', 3211),
(5, NULL, '123', '', 0, 0, 0, 0, '123', '', 123),
(15, 1, '312', '312', 1, 21, 641510, 6, '321', '321', 321),
(16, NULL, '123', '', 0, 0, 0, 0, '123', '', 123),
(17, NULL, '123', '', 0, 0, 0, 0, '123', '', 123);

-- --------------------------------------------------------

--
-- Структура таблицы `allow_mails`
--

CREATE TABLE IF NOT EXISTS `allow_mails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `allow_mail` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `allow_mail` (`allow_mail`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `allow_mails`
--

INSERT INTO `allow_mails` (`id`, `allow_mail`) VALUES
(1, ' не хочу получать вопросы по объявлению по e-mail');

-- --------------------------------------------------------

--
-- Структура таблицы `categorys`
--

CREATE TABLE IF NOT EXISTS `categorys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(30) NOT NULL,
  `parrent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `category` (`category`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Дамп данных таблицы `categorys`
--

INSERT INTO `categorys` (`id`, `category`, `parrent_id`) VALUES
(1, 'Транспорт', NULL),
(2, 'Недвижимость', NULL),
(3, 'Работа', NULL),
(4, 'Автомобили с пробегом', 1),
(5, 'Новые автомобили', 1),
(6, 'Мотоциклы и мототехника', 1),
(12, 'Резюме (поиск работы)', 3),
(13, 'Вакансии (поиск сотрудников)', 3),
(14, 'Квартиры', 2),
(15, 'Комнаты', 2),
(16, 'Дома, дачи, котеджи', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `citys`
--

CREATE TABLE IF NOT EXISTS `citys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=641781 ;

--
-- Дамп данных таблицы `citys`
--

INSERT INTO `citys` (`id`, `city`) VALUES
(641490, 'Барабинск'),
(641510, 'Бердск'),
(641600, 'Искитим'),
(641780, 'Новосибирск');

-- --------------------------------------------------------

--
-- Структура таблицы `privates`
--

CREATE TABLE IF NOT EXISTS `privates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `private` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `private` (`private`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `privates`
--

INSERT INTO `privates` (`id`, `private`) VALUES
(2, 'Компания'),
(1, 'Частное лицо');

-- --------------------------------------------------------

--
-- Структура таблицы `subcategorys`
--

CREATE TABLE IF NOT EXISTS `subcategorys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subcategory` varchar(30) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `subcategory` (`subcategory`),
  UNIQUE KEY `subcategory_2` (`subcategory`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `subcategorys`
--

INSERT INTO `subcategorys` (`id`, `subcategory`, `category_id`) VALUES
(1, 'Автомобили с пробегом', 1),
(2, 'Новые автомобили', 1),
(3, 'Мотоциклы и мототехника', 1),
(4, 'Квартиры', 2),
(5, 'Комнаты', 2),
(6, 'Дома, дачи, котеджи', 2),
(7, 'Вакансии (поиск сотрудников)', 3),
(8, 'Резюме (поиск работы)', 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

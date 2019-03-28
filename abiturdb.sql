-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Окт 09 2018 г., 20:12
-- Версия сервера: 10.1.26-MariaDB-0+deb9u1
-- Версия PHP: 7.0.30-0+deb9u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `abiturdb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `abiturients`
--

CREATE TABLE `abiturients` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `middleName` varchar(50) DEFAULT NULL,
  `surname` varchar(50) NOT NULL,
  `sex` int(11) NOT NULL,
  `groupNumber` varchar(50) NOT NULL,
  `mark` int(11) NOT NULL,
  `birthDate` date NOT NULL,
  `hostel` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `abiturients`
--

INSERT INTO `abiturients` (`id`, `name`, `middleName`, `surname`, `sex`, `groupNumber`, `mark`, `birthDate`, `hostel`, `email`, `password`) VALUES
(1, 'Елена', 'Владимировна', 'Белова', 0, 'ПЛ56Ш', 198, '2001-08-29', 0, 'asmirnov@jmail.coc', '12345678'),
(2, 'Анастасия', NULL, 'Иванова', 0, 'РП73Б', 200, '2001-02-20', 0, 'aivanova@jmail.coc', '87654321'),
(3, 'Алина', NULL, 'Петрова', 0, 'ПЛ56Ш', 190, '2001-09-13', 1, 'asmirnov@jmail.coc', '12345678'),
(4, 'Андрей', 'Максимович', 'Фролов', 1, 'КС43А', 193, '2001-09-17', 1, 'user1@jmail.coc', '11111111'),
(5, 'Олег', 'Сергеевич', 'Антонов', 1, 'КТ44В', 184, '2001-10-25', 1, 'olegp@youndex.re', '55555555');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `abiturients`
--
ALTER TABLE `abiturients`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `abiturients`
--
ALTER TABLE `abiturients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

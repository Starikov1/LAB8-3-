-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Дек 14 2020 г., 09:18
-- Версия сервера: 10.4.16-MariaDB
-- Версия PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `enterprises`
--

-- --------------------------------------------------------

--
-- Структура таблицы `company`
--

CREATE TABLE `company` (
  `department_ID_worker` int(11) NOT NULL,
  `TaxCode` int(11) NOT NULL,
  `Title` varchar(45) NOT NULL,
  `ID_comp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `department`
--

CREATE TABLE `department` (
  `ID_worker` int(11) NOT NULL,
  `Title` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `director_name`
--

CREATE TABLE `director_name` (
  `Passport` int(11) NOT NULL,
  `Name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `director_other`
--

CREATE TABLE `director_other` (
  `Passport` int(11) NOT NULL,
  `TaxCode` int(11) NOT NULL,
  `department_id_worker` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `employee_name`
--

CREATE TABLE `employee_name` (
  `Passport` int(11) NOT NULL,
  `Name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `employee_other`
--

CREATE TABLE `employee_other` (
  `Passport` int(11) NOT NULL,
  `TaxCode` int(11) NOT NULL,
  `director_Passport_id` int(11) NOT NULL,
  `director_department_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `Kind` varchar(45) NOT NULL,
  `Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`department_ID_worker`);

--
-- Индексы таблицы `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`ID_worker`);

--
-- Индексы таблицы `director_name`
--
ALTER TABLE `director_name`
  ADD PRIMARY KEY (`Passport`);

--
-- Индексы таблицы `director_other`
--
ALTER TABLE `director_other`
  ADD PRIMARY KEY (`Passport`);

--
-- Индексы таблицы `employee_name`
--
ALTER TABLE `employee_name`
  ADD PRIMARY KEY (`Passport`);

--
-- Индексы таблицы `employee_other`
--
ALTER TABLE `employee_other`
  ADD PRIMARY KEY (`Passport`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `department_ibfk_1` FOREIGN KEY (`ID_worker`) REFERENCES `company` (`department_ID_worker`);

--
-- Ограничения внешнего ключа таблицы `director_name`
--
ALTER TABLE `director_name`
  ADD CONSTRAINT `director_name_ibfk_1` FOREIGN KEY (`Passport`) REFERENCES `employee_name` (`Passport`);

--
-- Ограничения внешнего ключа таблицы `director_other`
--
ALTER TABLE `director_other`
  ADD CONSTRAINT `director_other_ibfk_1` FOREIGN KEY (`Passport`) REFERENCES `director_name` (`Passport`);

--
-- Ограничения внешнего ключа таблицы `employee_name`
--
ALTER TABLE `employee_name`
  ADD CONSTRAINT `employee_name_ibfk_1` FOREIGN KEY (`Passport`) REFERENCES `employee_other` (`Passport`);

--
-- Ограничения внешнего ключа таблицы `employee_other`
--
ALTER TABLE `employee_other`
  ADD CONSTRAINT `employee_other_ibfk_1` FOREIGN KEY (`Passport`) REFERENCES `orders` (`id`);

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id`) REFERENCES `department` (`ID_worker`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

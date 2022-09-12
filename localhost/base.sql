-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 12 2022 г., 10:58
-- Версия сервера: 5.7.33
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `base`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `product_id`, `amount`) VALUES
(1, 3, 10, 1),
(2, 5, 9, 1),
(3, 3, 11, 1),
(4, 4, 11, 1),
(5, 4, 10, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `title` varchar(32) NOT NULL,
  `content` varchar(1024) DEFAULT NULL,
  `author` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `delete_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`post_id`, `title`, `content`, `author`, `create_date`, `delete_date`) VALUES
(1, '123', '123', 3, '2022-09-09 09:17:36', NULL),
(2, 'ЭтоПростоАхуенно', '', 4, '2022-09-09 09:17:36', NULL),
(3, '123', '', 3, '2022-09-09 09:17:36', NULL),
(4, '123', '', 3, '2022-09-09 09:17:36', NULL),
(5, '123', '', 3, '2022-09-09 09:17:36', NULL),
(6, 'Localhost', '<a href=\"https://youtube.com\">Caramel dance</a>', 3, '2022-09-09 09:17:36', NULL),
(7, 'egawergaw', 'rgwreaewrgawe', 3, '2022-09-09 09:17:36', NULL),
(8, 'DED', 'inside', 4, '2022-09-09 09:17:36', NULL),
(9, 'dayaday', '', 3, '2022-09-09 11:47:24', NULL),
(10, 'geargare', 'rehaerhaehe', 5, '2022-09-10 07:35:17', NULL),
(11, 'Я сейчас пишу книгу', 'Книгу о выучивание программирование от Кирилла Богомолова', 3, '2022-09-12 07:31:54', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `login` varchar(25) NOT NULL,
  `photo_url` varchar(128) DEFAULT NULL,
  `email` varchar(25) NOT NULL,
  `password_cash` varchar(64) NOT NULL,
  `session` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `photo_url`, `email`, `password_cash`, `session`) VALUES
(3, 'Loxer', '8b8cc48d125205d281b647912e5c81b59f10071b.jpg', 'skeletkot@mail.ru', '827ccb0eea8a706c4c34a16891f84e7b', '67795574b3d393c97d2254e9d6eef36c'),
(4, 'Omex', 'cc5bdfe839ed6c90daf79fc9aa3d010e14bef89c.jfif', 'dani1l4iter@mail.ru', 'dcaa9f76b241721cd735ab35f65e2536', '004285c252723ddb925c0ba62beeb1b0'),
(5, 'anton', 'e3b781e80524a114743b06709277176deb2c4c8d.jpg', 'igayantanton@gmail.com', '20917c851c4a54f2a054390dac9085b7', 'd2272165d97d52a04d721d37c200b32d');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `posts` (`post_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

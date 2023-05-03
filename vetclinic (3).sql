-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 28 2023 г., 07:01
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `vetclinic`
--

-- --------------------------------------------------------

--
-- Структура таблицы `administrators`
--

CREATE TABLE `administrators` (
  `id` bigint NOT NULL,
  `name` varchar(100) COLLATE utf32_unicode_ci NOT NULL,
  `surname` varchar(100) COLLATE utf32_unicode_ci NOT NULL,
  `patronymic` varchar(100) COLLATE utf32_unicode_ci DEFAULT NULL,
  `login` varchar(100) COLLATE utf32_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  `privilege` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Дамп данных таблицы `administrators`
--

INSERT INTO `administrators` (`id`, `name`, `surname`, `patronymic`, `login`, `password`, `privilege`) VALUES
(1, 'Иван', 'Петрушко', 'Александрович', 'admin', 'admin101', 0),
(2, 'Алексей', 'Копиков', 'Ионович', 'admin101', '$2y$10$sZWWdBD0WEqcfWGSZKL2iO5Gn8/6zDaIM48xuypOAFf6VBrH3QnPu', 0),
(3, 'Алексей', 'Копиков', 'Ионович', 'admin10', '$2y$10$2Y/2ns6aLTrSqFrEKK0xSeo.oEyry0m.AKsWBf7XVnpn8bvmZP2uy', 0),
(4, 'Алексей', 'Копиков', 'Ионович', 'admin1', '$2y$10$pE/4Ke9f8JWc6N9lcjSRDOiwvzXBSt9upcmEcVpwSN34xS0VM47Wy', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `care_tips`
--

CREATE TABLE `care_tips` (
  `id` bigint NOT NULL,
  `name` varchar(255) COLLATE utf32_unicode_ci DEFAULT NULL,
  `text` varchar(500) COLLATE utf32_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf32_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Дамп данных таблицы `care_tips`
--

INSERT INTO `care_tips` (`id`, `name`, `text`, `image`) VALUES
(1, 'Подобрать правильную пищу.', 'Не секрет, что здоровье, внешний вид и настроение животного зависит от сбалансированного питания. Следует тщательно изучить какие корма и в каком количестве нужно давать животному. Также не стоит забывать, что питомцы нуждаются в дополнительных витаминах, микроэлементах и других полезных веществах, которые нужны им для нормального роста и развития. Ни в коем случае нельзя кормить котов кормом для собак и наоборот, у них разная пищеварительная система.', 'food.jpeg'),
(2, 'Проведение регулярной гигиены.', 'Животные восприимчивы к ряду бактерий, которые вызывают многочисленные заболевания. Поэтому не стоит забывать ежедневно проводить личную гигиену питомца (купание, чистка ушей, стрижка когтей и шерсти (если необходимо), гигиена глаз и зубов, расчесывание колтунов). Эти процедуры способны сделать любимчика не только привлекательным и ухоженным, но и здоровым. Как часто и правильно проводить эти мероприятия вам подскажет ветеринарный врач.', 'gigiena.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `educations`
--

CREATE TABLE `educations` (
  `id` bigint NOT NULL,
  `name` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  `univer` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  `qualification` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  `year_of_issue` year NOT NULL,
  `year_of_graduation` year NOT NULL,
  `specialist_id` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Дамп данных таблицы `educations`
--

INSERT INTO `educations` (`id`, `name`, `univer`, `qualification`, `year_of_issue`, `year_of_graduation`, `specialist_id`) VALUES
(9, '1234561234567', 'Московский университет имени Тютчева ', 'Техник лаборант ', 2005, 2023, 16),
(10, '1234561234567', 'Московский университет имени Ленина', 'Техник лаборант ', 2010, 2016, 17),
(11, '1234561234567', 'Московский университет имени Ленина', 'Ветврач', 2010, 2016, 18),
(12, '3222222222222', 'Московский университет имени Тютчева ', 'хирург', 2000, 2000, 19);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` bigint NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `specialist_id` bigint NOT NULL,
  `status_id` bigint NOT NULL,
  `pet_id` bigint NOT NULL,
  `service_id` bigint NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `date`, `time`, `specialist_id`, `status_id`, `pet_id`, `service_id`, `created_at`) VALUES
(12, '2023-04-20', '08:00:00', 2, 2, 3, 1, '2023-04-21 18:33:12'),
(13, '2023-04-28', '09:00:00', 2, 1, 3, 1, '2023-04-21 18:33:32'),
(14, '2023-04-20', '15:00:00', 2, 1, 1, 1, '2023-04-21 19:38:31'),
(15, '2023-04-25', '08:00:00', 3, 1, 3, 4, '2023-04-27 09:43:15'),
(16, '2023-04-21', '16:00:00', 2, 3, 3, 1, '2023-04-27 22:22:08'),
(17, '2023-04-24', '08:00:00', 2, 1, 3, 1, '2023-04-27 22:22:21'),
(18, '2023-04-20', '14:30:00', 18, 3, 3, 1, '2023-04-27 23:02:28'),
(19, '2023-04-26', '00:00:00', 2, 2, 3, 1, '2023-04-28 02:09:22');

-- --------------------------------------------------------

--
-- Структура таблицы `pets`
--

CREATE TABLE `pets` (
  `id` bigint NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `specie_id` bigint NOT NULL,
  `breed` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `date_birth` date NOT NULL,
  `gender` enum('Мужской','Женский') CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `user_id` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Дамп данных таблицы `pets`
--

INSERT INTO `pets` (`id`, `name`, `image`, `specie_id`, `breed`, `date_birth`, `gender`, `user_id`) VALUES
(1, 'Тима', 'cat.jpg', 1, 'Дворняжка', '2020-03-03', 'Женский', 8),
(2, 'пумба', 'cat.jpg', 1, 'Пусик', '2018-03-14', 'Мужской', 8),
(3, 'Тимоха', 'pet.jpg', 2, 'Овчаркаа', '1996-10-01', 'Мужской', 7),
(4, 'Проверка', 'pet.jpg', 1, 'Попугайкеа', '2023-03-24', 'Мужской', 7),
(5, 'Кивих', '1680240434_122875_original.jpg', 1, 'Бенгал', '2013-02-14', 'Мужской', 7),
(6, 'Тиша', 'pet.jpg', 2, 'Бенгал', '1996-10-24', 'Женский', 7);

-- --------------------------------------------------------

--
-- Структура таблицы `services`
--

CREATE TABLE `services` (
  `id` bigint NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `type_of_service_id` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Дамп данных таблицы `services`
--

INSERT INTO `services` (`id`, `name`, `description`, `price`, `type_of_service_id`) VALUES
(1, 'Прививка от бешенства', 'Прививка от бешенства', 300, 2),
(2, 'Прививка от столбняка', 'Прививка от столбняка', 2000, 2),
(4, 'Медицинский осмотр', 'Осмотр питомца для преждевременного выявления болезней', 300, 3),
(5, 'Биохимический анализ крови', 'Анализ крови', 890, 4),
(8, 'Прививка от чумы плотоядных', 'Одна из обязательных прививок', 398, 2),
(13, 'Сдача анализов', 'Анализы животным сдаются по четырем причинам:\r\nПитомец плохо себя чувствует, \r\nДома появилось новое животное, \r\nНекоторые заболевания животных опасны для человека, \r\nДиспансеризация.', 350, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `shedules`
--

CREATE TABLE `shedules` (
  `id` bigint NOT NULL,
  `date` date NOT NULL,
  `day_of_week` enum('Понедельник','Вторник','Среда','Четверг','Пятница','Суббота','Воскресенье') CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `specialist_id` bigint NOT NULL,
  `shift_id` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Дамп данных таблицы `shedules`
--

INSERT INTO `shedules` (`id`, `date`, `day_of_week`, `specialist_id`, `shift_id`) VALUES
(19, '2023-04-20', 'Четверг', 2, 1),
(20, '2023-04-21', 'Пятница', 2, 2),
(21, '2023-04-22', 'Суббота', 2, 3),
(22, '2023-04-24', 'Понедельник', 2, 1),
(23, '2023-04-25', 'Вторник', 2, 2),
(24, '2023-04-26', 'Среда', 2, 3),
(25, '2023-04-28', 'Пятница', 2, 1),
(30, '2023-04-17', 'Понедельник', 19, 3),
(31, '2023-04-18', 'Вторник', 19, 2),
(33, '2023-04-17', 'Понедельник', 16, 3),
(34, '2023-04-18', 'Вторник', 16, 2),
(35, '2023-04-24', 'Понедельник', 3, 2),
(36, '2023-04-24', 'Понедельник', 17, 2),
(37, '2023-04-25', 'Вторник', 17, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `shifts`
--

CREATE TABLE `shifts` (
  `id` bigint NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `time_start_work` time NOT NULL,
  `time_end_work` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Дамп данных таблицы `shifts`
--

INSERT INTO `shifts` (`id`, `name`, `time_start_work`, `time_end_work`) VALUES
(1, '1 смена', '08:00:00', '16:00:00'),
(2, '2 смена', '16:00:00', '00:00:00'),
(3, '3 смена', '00:00:00', '08:00:00');

-- --------------------------------------------------------

--
-- Структура таблицы `specialists`
--

CREATE TABLE `specialists` (
  `id` bigint NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `surname` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `patronymic` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `login` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `birth_date` date NOT NULL,
  `date_start_work` date NOT NULL,
  `office` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `type_services_id` bigint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Дамп данных таблицы `specialists`
--

INSERT INTO `specialists` (`id`, `name`, `surname`, `patronymic`, `login`, `image`, `password`, `birth_date`, `date_start_work`, `office`, `type_services_id`) VALUES
(2, 'Владимир', 'Тележкин', 'Алексеевич', 'telega', 'telega.jpg', '1234', '2004-12-31', '2015-03-10', 'каб. 145', 2),
(3, 'Ольга', 'Цветик', 'Дмитриевна', 'flower', 'doctor1.jpg', '1234', '1994-03-16', '2019-11-16', 'каб. 100', 3),
(16, 'Андрей', 'Тучев', 'Иосивич', 'tutchev', '1681047565_1616721031_1-p-vrach-krasivo-3.jpg', '$2y$10$JrRXIZueJSJGeTanZRLRGeFlLgJPkogQhn3BKsfbzxXMxc1b4WIhq', '1986-06-09', '2018-01-09', 'каб. 118', 4),
(17, 'Анна', 'Сидорова', 'Юрьевна', 'sidrAnna', '1681454927_врач.jpg', '$2y$10$y7tZZ3nEMJYJzeuFQKw0betci2fhXFTbZY5DqCAwqDw.wx7wD5qBy', '1990-10-17', '2020-07-09', 'каб. 118', 1),
(18, 'Юлия', 'Облачкова', 'Дмитриевна', 'oblakova', '1681048237_Melanich-300x300.jpg', '$2y$10$1p41dXCRv5CUJcH.CVEWT.xHV3stClYBNOzfQJwmkk9L6S8wIq2nS', '1990-10-04', '2020-07-09', 'каб. 203', 2),
(19, 'Мария', 'Админов', 'Уставшик', 'yariksddfsf', 'doctor.jpg', '$2y$10$GNEHL0BZIcAK/qjt.uFKoezgo3P7MOBsjDnF7lN3LBH/MlDzizpUe', '2023-04-13', '2023-04-13', '345', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `species`
--

CREATE TABLE `species` (
  `id` bigint NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Дамп данных таблицы `species`
--

INSERT INTO `species` (`id`, `name`) VALUES
(1, 'кошачий'),
(2, 'собачий'),
(3, 'птица'),
(4, 'грызун');

-- --------------------------------------------------------

--
-- Структура таблицы `statuses`
--

CREATE TABLE `statuses` (
  `id` bigint NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Дамп данных таблицы `statuses`
--

INSERT INTO `statuses` (`id`, `name`) VALUES
(1, 'В процессе'),
(2, 'Пройден'),
(3, 'Отменен');

-- --------------------------------------------------------

--
-- Структура таблицы `types_of_services`
--

CREATE TABLE `types_of_services` (
  `id` bigint NOT NULL,
  `name` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  `description` varchar(500) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Дамп данных таблицы `types_of_services`
--

INSERT INTO `types_of_services` (`id`, `name`, `description`, `image`) VALUES
(1, 'Хирургия', 'Необходима в тех случаях, когда терапевтическое лечение не помогает или требуется плановое вмешательство при кастрации, стерилизации, удалении новообразований и прочее', 'hirurgia.jpg'),
(2, 'Вакцинация', 'Профилактическое мероприятие, направленное на формирование у питомца стойкого иммунитета к вирусам и бактериям – возбудителям опасных заболеваний (бешенство, чума, кальцивирусная инфекция и других)', 'vakcinacia.jpg'),
(3, 'Терапия', 'Устранение боли и очага заболевания, стабилизация состояния больного животного, в результате чего (и в случае правильно поставленного диагноза) наступает выздоровление', 'terapia.png'),
(4, 'Лабораторные исследования', 'Подтверждение диагноза или его уточнение, установление причины болезни, для характеристики формы, тяжести течения и определение прогноза болезни, для выбора этиологической и патогенетической терапии, оценка и контроль результатов лечения, а также обнаружение патологии при скрининговых исследованиях.', 'laborator.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint NOT NULL,
  `name` varchar(50) COLLATE utf32_unicode_ci NOT NULL,
  `surname` varchar(50) COLLATE utf32_unicode_ci NOT NULL,
  `patronymic` varchar(50) COLLATE utf32_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  `login` varchar(50) COLLATE utf32_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf32_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  `date_birth` date NOT NULL,
  `confirmed` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `patronymic`, `image`, `login`, `email`, `password`, `date_birth`, `confirmed`, `created_at`, `updated_at`) VALUES
(7, 'Мария', 'Агуст', 'Александровна', '1679040385_новогодний.jpg', 'dedpirateO', 'agggust@mail.ru', '$2y$10$RsxiT/O2wj7MeRi950D0SOlwaOinbNktdK7m45Py2GxWYSnI/yxlG', '2004-08-17', 1, '2023-04-05 08:49:58', '2023-04-23 18:20:45'),
(8, 'Ярик', 'Заяц', '', '1679040641_ava1.jpg', 'yarik', 'email@msil.ru', '$2y$10$wwEJwB3iq2sAyZhRc0o0YuVxaslw6vYyh36okjrG2ZK8MQc0suCb.', '1996-02-14', 1, '2023-04-06 07:47:07', '2023-04-16 15:26:01');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `administrators`
--
ALTER TABLE `administrators`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `care_tips`
--
ALTER TABLE `care_tips`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `educations`
--
ALTER TABLE `educations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `specialist_id` (`specialist_id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pet_id` (`pet_id`),
  ADD KEY `service_id` (`service_id`),
  ADD KEY `specialist_id` (`specialist_id`),
  ADD KEY `status_id` (`status_id`);

--
-- Индексы таблицы `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `specie_id` (`specie_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_of_service_id` (`type_of_service_id`);

--
-- Индексы таблицы `shedules`
--
ALTER TABLE `shedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `specialist_id` (`specialist_id`),
  ADD KEY `shift_id` (`shift_id`);

--
-- Индексы таблицы `shifts`
--
ALTER TABLE `shifts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `specialists`
--
ALTER TABLE `specialists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_services_id` (`type_services_id`);

--
-- Индексы таблицы `species`
--
ALTER TABLE `species`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `types_of_services`
--
ALTER TABLE `types_of_services`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `administrators`
--
ALTER TABLE `administrators`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `care_tips`
--
ALTER TABLE `care_tips`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `educations`
--
ALTER TABLE `educations`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `pets`
--
ALTER TABLE `pets`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `shedules`
--
ALTER TABLE `shedules`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT для таблицы `shifts`
--
ALTER TABLE `shifts`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `specialists`
--
ALTER TABLE `specialists`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `species`
--
ALTER TABLE `species`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `types_of_services`
--
ALTER TABLE `types_of_services`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `educations`
--
ALTER TABLE `educations`
  ADD CONSTRAINT `educations_ibfk_1` FOREIGN KEY (`specialist_id`) REFERENCES `specialists` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`pet_id`) REFERENCES `pets` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`specialist_id`) REFERENCES `specialists` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `orders_ibfk_4` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `pets`
--
ALTER TABLE `pets`
  ADD CONSTRAINT `pets_ibfk_1` FOREIGN KEY (`specie_id`) REFERENCES `species` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `pets_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_ibfk_1` FOREIGN KEY (`type_of_service_id`) REFERENCES `types_of_services` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `shedules`
--
ALTER TABLE `shedules`
  ADD CONSTRAINT `shedules_ibfk_1` FOREIGN KEY (`specialist_id`) REFERENCES `specialists` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `shedules_ibfk_2` FOREIGN KEY (`shift_id`) REFERENCES `shifts` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `specialists`
--
ALTER TABLE `specialists`
  ADD CONSTRAINT `specialists_ibfk_1` FOREIGN KEY (`type_services_id`) REFERENCES `types_of_services` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

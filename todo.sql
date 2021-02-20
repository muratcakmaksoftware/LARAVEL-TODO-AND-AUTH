-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 20 Şub 2021, 21:18:45
-- Sunucu sürümü: 10.4.17-MariaDB
-- PHP Sürümü: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `todo`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `tasks`
--

INSERT INTO `tasks` (`id`, `user_id`, `title`, `description`, `status`, `created_at`, `updated_at`) VALUES
(12, 1, 'dfsdf', 'sfqwerwrqw', 0, '2021-02-20 15:48:06', '2021-02-20 15:48:06'),
(13, 1, 'retre22222222', 'tertetrwetqwetqertetrererw', 1, '2021-02-20 15:48:10', '2021-02-20 15:57:10'),
(15, 1, '1', '2we', 0, '2021-02-20 15:59:10', '2021-02-20 15:59:10'),
(16, 1, '12', 'wqe', 0, '2021-02-20 15:59:14', '2021-02-20 15:59:14'),
(17, 1, '423', 'eqw', 1, '2021-02-20 15:59:17', '2021-02-20 16:59:57'),
(18, 1, 'wer', 'wer', 0, '2021-02-20 16:00:07', '2021-02-20 16:00:07'),
(19, 1, 'wetwet', 'etqtrqw', 0, '2021-02-20 16:00:11', '2021-02-20 16:00:11'),
(20, 1, 'ewrwer', 'werwer', 0, '2021-02-20 16:00:16', '2021-02-20 16:00:16'),
(21, 1, 'retet', 'retqetqe', 0, '2021-02-20 16:00:20', '2021-02-20 16:00:20'),
(22, 1, 'wetwetwe', 'twetwe', 0, '2021-02-20 16:00:24', '2021-02-20 16:00:24'),
(23, 1, 'rwetwetwe', 'dfgdfgsdg', 0, '2021-02-20 16:00:27', '2021-02-20 16:00:27'),
(24, 1, 'hfsdhrwyw', 'rthftrg', 0, '2021-02-20 16:00:30', '2021-02-20 16:00:30'),
(25, 1, 'werwr', 'qweq', 0, '2021-02-20 16:33:12', '2021-02-20 16:33:12'),
(26, 1, 'ert', 'eqw', 0, '2021-02-20 16:33:16', '2021-02-20 16:33:16'),
(27, 1, 'fdgfd', 'gwerwrew', 0, '2021-02-20 16:33:20', '2021-02-20 16:33:20'),
(28, 1, 'fdds', 'dfwefr', 1, '2021-02-20 16:35:38', '2021-02-20 18:52:56'),
(29, 3, 'test kerem', 'werwer', 0, '2021-02-20 18:23:56', '2021-02-20 18:23:56'),
(30, 3, 'kerem2', 'fwefw', 1, '2021-02-20 18:24:01', '2021-02-20 18:24:05'),
(31, 3, 'kerem3', 'fweewrw', 1, '2021-02-20 18:24:09', '2021-02-20 18:52:29'),
(32, 1, '111111111', 'qqq', 0, '2021-02-20 19:46:26', '2021-02-20 19:46:26'),
(33, 4, 'test enes', '123', 0, '2021-02-20 19:47:26', '2021-02-20 19:47:26'),
(34, 1, 'test', '1234', 0, '2021-02-20 19:53:01', '2021-02-20 19:53:01');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 0,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `email`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Murat Çakmak', 'murat', '$2y$10$ZBOMqbkp2dTZnJt/ZQviYuBZ7PUZFP7TaaT872S.6RCXJmk9KwFP6', 'murat@hotmail.com', 1, '2021-02-19', '2021-02-19'),
(2, 'murat2', 'murat2', '$2y$10$rZoYu9XXsKJcbuLpWmY9SOiSKftjxfwNnHZs9s0vJtOMPXQHiWD.G', 'murat2@hotmail.com', 0, '2021-02-19', '2021-02-19'),
(3, 'Kerem', 'kerem', '$2y$10$/dcakm8yXrNLqtOGwQnpPOkggifyFa4XxyFoq9ePAa4VKfzWDuRYC', 'kerem@hotmail.com', 0, '2021-02-20', '2021-02-20'),
(4, 'Enes', 'enes', '$2y$10$IS2wBqAIZ0h2ElHJDyokSOMC4Ofe3T/qzGLitwB8FcXz9Ba5gVxkS', 'enes@hotmail.com', 0, '2021-02-20', '2021-02-20');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

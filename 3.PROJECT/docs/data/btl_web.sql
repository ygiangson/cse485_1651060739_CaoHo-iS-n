-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 18, 2020 lúc 04:47 PM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `btl_web`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `commment`
--

CREATE TABLE `commment` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `idUser` int(11) NOT NULL,
  `idNews` int(11) NOT NULL,
  `num_like` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `forum_big_category`
--

CREATE TABLE `forum_big_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `forum_category`
--

CREATE TABLE `forum_category` (
  `id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `idBigCate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `forum_topic`
--

CREATE TABLE `forum_topic` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `idUser` int(11) NOT NULL,
  `idCategory` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `view` int(11) NOT NULL,
  `hot` tinyint(1) NOT NULL,
  `image` varchar(255) NOT NULL,
  `pubshed` tinyint(1) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `idCategory` int(11) NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `idTopic` int(11) NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `replies`
--

CREATE TABLE `replies` (
  `id` int(11) NOT NULL,
  `idPost` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `content` text NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('user','admin') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `activation_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `role`, `password`, `created_at`, `activation_code`, `status`) VALUES
(9, 'admin', 'sonch62@wru.vn', 'admin', '$2y$10$6lYyegomlWiHxZB/1dSVZ.ZJY7rkcQlbflM2.xOlFXf8ludGy/aR.', '2020-10-17 15:48:59', 'ba10757801f9f8e9', 1),
(16, 'test', 'ygiangson@gmail.com', 'user', '$2y$10$Wv2tj4MYMyhUb1a1BdDTpOmM1kB5qqRG1GZIhR5WWyV6LdGZDoa9q', '2020-10-17 17:11:06', '9996e6a403a2ebdd', 1),
(17, 'test1', 'ygiangson@gmail.com', 'user', '$2y$10$APxshhi7kdxhFjOgsAKsaeX9wI105DhZ64geHBVVljtTsm.8qMDRS', '2020-10-17 17:16:24', '7a1bb606155a8a37', 1),
(18, 'quynhoch', 'sonch62@wru.vn', 'admin', '$2y$10$mUosmzG44gmp2vPg7ASUmOs013gC1gcRVOPjE8Yd/sMyIb6EJETd2', '2020-10-18 14:13:24', 'c2fe15870550d545', 1),
(19, 'test2', 'sonch62@wru.vn', 'user', '$2y$10$B3oiTF4SD7A2ULHegcoI3.jaflsucfcwogn6UWM5nGJJ.lGSLmk0e', '2020-10-18 14:19:42', '7cea45ce1f6498ba', 0),
(20, 'test', 'sonch62@wru.vn', 'user', '$2y$10$0Qtm1T/xy7ziwGwFkMd1YuKqo209v9FpgjML1fRt/5iOGYqtzkNmC', '2020-10-18 14:20:27', '768afa3c1668bcbe', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `commment`
--
ALTER TABLE `commment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser_idx` (`idUser`),
  ADD KEY `idNews_idx` (`idNews`);

--
-- Chỉ mục cho bảng `forum_big_category`
--
ALTER TABLE `forum_big_category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `forum_category`
--
ALTER TABLE `forum_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idBigCate_idx` (`idBigCate`);

--
-- Chỉ mục cho bảng `forum_topic`
--
ALTER TABLE `forum_topic`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_category_idx` (`idCategory`),
  ADD KEY `idUser_idx` (`idUser`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser_idx` (`idUser`),
  ADD KEY `idCategory_idx` (`idCategory`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idTopic_idx` (`idTopic`),
  ADD KEY `idUser_idx` (`idUser`);

--
-- Chỉ mục cho bảng `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idPost_idx` (`idPost`),
  ADD KEY `idUser_idx` (`idUser`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `commment`
--
ALTER TABLE `commment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `forum_big_category`
--
ALTER TABLE `forum_big_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `forum_category`
--
ALTER TABLE `forum_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `forum_topic`
--
ALTER TABLE `forum_topic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `replies`
--
ALTER TABLE `replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `commment`
--
ALTER TABLE `commment`
  ADD CONSTRAINT `idNews` FOREIGN KEY (`idNews`) REFERENCES `news` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idUser` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `forum_category`
--
ALTER TABLE `forum_category`
  ADD CONSTRAINT `idBigCate` FOREIGN KEY (`idBigCate`) REFERENCES `forum_big_category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `forum_topic`
--
ALTER TABLE `forum_topic`
  ADD CONSTRAINT `forum_topic_ibfk_1` FOREIGN KEY (`idCategory`) REFERENCES `forum_category` (`id`),
  ADD CONSTRAINT `forum_topic_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`idCategory`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `news_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`idTopic`) REFERENCES `forum_topic` (`id`),
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `replies`
--
ALTER TABLE `replies`
  ADD CONSTRAINT `replies_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `replies_ibfk_2` FOREIGN KEY (`idPost`) REFERENCES `posts` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

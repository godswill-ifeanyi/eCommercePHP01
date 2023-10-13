-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 17, 2023 at 12:29 PM
-- Server version: 10.6.12-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u112713895_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `prod_qty` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `prod_id`, `prod_qty`, `created_at`) VALUES
(68, 9, 4, 1, '2023-05-10 17:38:10'),
(74, 17, 5, 1, '2023-05-16 15:59:01'),
(76, 8, 4, 1, '2023-05-17 11:47:10'),
(77, 8, 3, 1, '2023-05-17 11:55:31');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `popular` tinyint(4) NOT NULL DEFAULT 0,
  `image` varchar(255) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_description` mediumtext NOT NULL,
  `meta_keywords` mediumtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `status`, `popular`, `image`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`) VALUES
(12, 'Guitar Family', '', 'This category includes all your Guitar Family', 1, 0, '1683387284.jpeg', 'Guitar Family', 'This category includes all your DBX Processors.', 'This category includes all your DBX Processors.', '2023-04-18 12:26:20'),
(13, 'Drums and Band', 'PA System', 'This category includes all your Drums and Band', 1, 0, '1683387862.png', 'Drums and Band', 'This category includes all your Drums and Band', 'This category includes all your Drums and Band', '2023-04-18 12:47:04'),
(15, 'Keyboards and Pianos', 'PA System', 'This category includes all your Keyboards and Piano', 1, 1, '1683387739.png', 'Keyboards and Piano', 'This category includes all your Keyboards and Pianos', 'This category includes all your Keyboards and Piano', '2023-04-18 16:36:14'),
(17, 'LED Lights', '', 'This category includes all your LED Lights', 1, 1, '1683387698.png', 'LED Lights', 'This category includes all your LED Lights', 'This category includes all your LED Lights', '2023-05-06 15:39:40'),
(18, 'Microphones', '', 'This category includes all your Microphones', 1, 0, '1683387955.png', 'Microphones', 'This category includes all your Microphones', 'This category includes all your Microphones', '2023-05-06 15:45:55'),
(19, 'PA Systems', '', 'This category includes all your PA Systems', 1, 1, '1683387998.png', 'PA Systems', 'This category includes all your PA Systems', 'This category includes all your PA Systems', '2023-05-06 15:46:38');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `image`) VALUES
(2, '1683136143.jpg'),
(3, '1683136157.jpg'),
(4, '1683136175.jpg'),
(5, '1683136188.jpg'),
(6, '1683136245.jpg'),
(7, '1683136260.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `tracking_no` varchar(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` mediumtext NOT NULL,
  `pincode` int(255) NOT NULL,
  `total_price` int(50) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `payment_id` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `comments` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(255) NOT NULL,
  `prod_id` int(255) NOT NULL,
  `qty` int(255) NOT NULL,
  `price` int(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `prod_id`, `qty`, `price`, `created_at`) VALUES
(1, 1, 4, 1, 0, '2023-04-22 15:08:25'),
(2, 1, 3, 7, 0, '2023-04-22 15:08:25'),
(3, 2, 4, 1, 0, '2023-04-22 15:18:50'),
(4, 2, 3, 7, 0, '2023-04-22 15:18:50'),
(5, 3, 4, 1, 0, '2023-04-22 15:25:58'),
(6, 3, 3, 7, 0, '2023-04-22 15:25:58'),
(7, 4, 4, 5, 0, '2023-04-22 15:55:04'),
(8, 5, 4, 3, 0, '2023-04-24 08:03:56'),
(9, 6, 4, 4, 0, '2023-05-06 10:16:55'),
(10, 6, 3, 6, 0, '2023-05-06 10:16:55'),
(11, 7, 4, 3, 0, '2023-05-06 10:24:51'),
(12, 11, 4, 1, 0, '2023-05-06 11:13:16'),
(13, 13, 4, 1, 0, '2023-05-10 18:19:18'),
(14, 14, 3, 1, 0, '2023-05-15 12:19:01'),
(15, 14, 4, 1, 0, '2023-05-15 12:19:01'),
(16, 15, 6, 1, 0, '2023-05-16 16:04:25'),
(17, 15, 4, 4, 0, '2023-05-16 16:04:25');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `special_offer` varchar(255) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `small_description` mediumtext NOT NULL,
  `description` mediumtext NOT NULL,
  `original_price` int(50) NOT NULL,
  `selling_price` int(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `trending` tinyint(4) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_keywords` mediumtext NOT NULL,
  `meta_description` mediumtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `special_offer`, `sub_category_id`, `small_description`, `description`, `original_price`, `selling_price`, `image`, `qty`, `status`, `trending`, `meta_title`, `meta_keywords`, `meta_description`, `created_at`) VALUES
(3, 12, 'Acoustic Box Guitar', '0', 0, 'Very good condition. ', 'Very good condition', 28000, 35000, '1683390525.jpg', 18, 1, 1, 'Acoustic Box Guitar ', 'Very good condition. You will not regret.', 'Very good condition. You will not regret.', '2023-04-19 12:55:37'),
(4, 18, 'Wireless Handheld Microphone System  ', '0', 0, 'BOMGE Generic BOMGE Wireless Microphone System 2 Handheld Microphone', 'All kinds of mobiles', 17000, 25000, '1683390485.jpg', 13, 1, 1, 'Wireless Microphone System 2 Handheld Microphone', 'Wireless Microphone System 2 Handheld Microphone', 'Microphone System 2 Handheld Microphone', '2023-04-20 09:12:36'),
(5, 0, 'DMX 240B Stage Light Controller Console || Dmx 512...', '1', 0, 'Very good equipment.', 'Very good equipment with reliability you can trust...', 55000, 38000, '1684236921.jpg', 20, 0, 0, '', '', '', '2023-05-16 15:50:57'),
(6, 0, 'Pioneer Professional DJ Headphones-Gold Edition Pi...', '1', 0, 'Very good equipment.', 'Very good equipment with reliability you can trust...', 30000, 17000, '1684236990.jpg', 24, 0, 0, '', '', '', '2023-05-16 16:01:26');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `special_offer`
--

CREATE TABLE `special_offer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` int(50) NOT NULL,
  `qty` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `special_offer`
--

INSERT INTO `special_offer` (`id`, `name`, `image`, `price`, `qty`) VALUES
(3, 'DMX 240B Stage Light Controller Console || Dmx 512 Stage DJ Light Controller', '1683383515.jpg', 45000, 20),
(4, 'Pioneer Professional DJ Headphones-Gold Edition Pioneer', '1683383737.jpg', 22800, 20);

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `name`, `category_name`, `description`, `status`, `image`) VALUES
(16, 'Speakers', 'PA Systems', 'This category includes all your Speakers', 1, '1683388225.'),
(17, 'Drum Pads', 'PA Systems', 'This category includes all your Drum Pads', 1, '1683388702.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `usertype` varchar(255) NOT NULL DEFAULT 'user',
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `phone`, `usertype`, `password`, `created_at`) VALUES
(1, 'Samuel', 'king', 'kingsamuel@gmail.com', '09012090301', '', '$2y$10$AzRz9qvLJzUAbOaHWFqx/erruta97aKJepxItvWmyESqIYqvd0/.a', '2023-04-11 13:20:50'),
(2, 'Samuel', 'king', 'kingsamuel@gmail.com', '09012090301', '', '$2y$10$hlKfVJ0FJe2dntkD9rza1emb0I2FGk8IH2B4CVdoCyIsfQwFgyYp6', '2023-04-11 13:21:56'),
(3, 'James', 'Smith', 'jimmy123@gmail.com', '09012090301', 'user', '$2y$10$XUM84mp8YM2Q8PSIHYFbSOM0PT7oTPQZhA7AeEGItPsZ8cEbmvOq.', '2023-04-11 13:46:59'),
(4, 'Samuel', 'king', 'kingsamuel@gmail.com', '09012090301', 'user', '$2y$10$LyoJU/9T5UlBxDB/3CHSV.S47VFh0ck7RQlNKgz4tWLG2jlYzBlpO', '2023-04-11 13:51:13'),
(5, 'Samuel', 'king', 'kingsamuel@gmail.com', '09012090301', 'user', '$2y$10$w2NNkxQc93BJYiLDXfcC.OLALDBku70H8AEkoCKHdgPgqu4Es6W7e', '2023-04-11 13:51:57'),
(6, 'Emeka', 'Ani', 'emeka2023@gmail.com', '08116042291', 'user', '$2y$10$nkgnB9ZuH3jQn66BjstjjOl9ckHy/RbZU6LD0fl36p5JY6cbaXAbK', '2023-04-14 15:27:32'),
(7, 'Emmanuel', 'Ndubuisi', 'emmapeemusicalemporium@gmail.com', '08067022284', 'admin', '$2y$10$nvh4gudcmwAdV2EknGMoTeIbbUV5SbZaUL3FR/JwqbT3dbHwGl6Ke', '2023-04-14 15:47:17'),
(8, 'Hope', 'Kim', 'hopekim@gmail.com', '08116042291', 'user', '$2y$10$e4.Mv4klB/96trjsFgpJout9NTgDkd6sVuNZRQXwHyj0Krf6gA9ba', '2023-04-19 17:01:12'),
(9, 'Ifeanyi', 'Obi', 'godswillokpanku@gmail.com', '09012090301', 'user', '$2y$10$V5aAaKR.N.Qcf4bEeJJDRuiH.XqmcVz/0V5jkY3yFX6tFCKfk.Z4.', '2023-04-25 11:15:57'),
(11, 'Godswill', 'Ifeanyi', 'godswill_ifeanyi@yahoo.com', '08116042291', 'user', '$2y$10$R7CvMbM.sjDmUeuVKxd6/.DULGe6QfwebvhWtT6hCdDwjgJxydn4S', '2023-05-06 17:26:42'),
(12, 'Samuel', 'Smith', 'samuelsmith@gmail.com', '08116042291', 'user', '$2y$10$2JJauy5ee9Bp3Ug9WPR5g.hygjikCNmbxmbbLkZV2WvPTA8pu/Ajq', '2023-05-06 17:28:55'),
(13, 'Godswill', 'Okpanku', 'admin@gmail.com', '08038927363', 'user', '$2y$10$HsLOOByrQPNs3TbYxwBiNerBlyEhCGa7pkJh0D919lfSe2og/Dw9G', '2023-05-06 17:31:30'),
(15, 'Hassan', 'Attah ', 'hassan_centrilift@yahoo.com', '08033826713', 'user', '$2y$10$gjFN3.hc89JBCTSemjGPguK9W.jY9mlGBQkXHmSvd78TTgBP1LEi2', '2023-05-06 22:19:26'),
(18, 'Sam', 'Jackson', 'samjackson@gmail.com', '08038927363', 'user', '$2y$10$qpQ.yBRnc2uCU11YksQBbeu6JRU3wQRC9uN/JZDz61N.SEwQUbymq', '2023-05-16 16:42:40');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `special_offer`
--
ALTER TABLE `special_offer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `special_offer`
--
ALTER TABLE `special_offer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

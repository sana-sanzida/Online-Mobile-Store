-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2020 at 10:11 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_mobile_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) DEFAULT NULL,
  `product_title` varchar(255) DEFAULT NULL,
  `product_price` float DEFAULT NULL,
  `image_url` varchar(500) DEFAULT NULL,
  `product_rating` float DEFAULT NULL,
  `sale_count` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_price`, `image_url`, `product_rating`, `sale_count`) VALUES
(1, 'Apple iPhone 10', 96990, 'https://i.ibb.co/gwbDdzh/1.png', 5, 120),
(2, 'Samsung Galaxy 10', 76990, 'https://i.ibb.co/hMTSMd2/2.png', 3.5, 250),
(3, 'Redmi Note 7 Pro', 80990, 'https://i.ibb.co/9qFZJ2p/3.jpg', 4.5, 400),
(4, 'Apple iPhone 10', 96990, 'https://i.ibb.co/PGrBrcF/4.png', 5, 120),
(5, 'Samsung Galaxy 10', 76990, 'https://i.ibb.co/s3ZyZvx/5.jpg', 3.5, 350),
(6, 'Redmi Note 7 Pro', 80990, 'https://i.ibb.co/44w4Xyw/6.png', 4.5, 150),
(7, 'Redmi Note 7 Pro', 80990, 'https://i.ibb.co/CwcDdj6/7.png', 4.5, 310),
(8, 'Redmi Note 7 Pro', 80990, 'https://i.ibb.co/tQYngZj/8.png', 4.5, 290),
(9, 'Apple iPhone 10', 96990, 'https://i.ibb.co/g9qyHKz/9.png', 5, 200),
(10, 'Apple iPhone 10', 96990, 'https://i.ibb.co/7Sz8kLD/10.jpg', 5, 400);

-- --------------------------------------------------------

--
-- Table structure for table `review_blog`
--

CREATE TABLE `review_blog` (
  `blog_id` int(11) NOT NULL,
  `writer_id` int(11) DEFAULT NULL,
  `writer_name` varchar(255) DEFAULT NULL,
  `blog_title` varchar(255) DEFAULT NULL,
  `blog_cover` varchar(500) DEFAULT NULL,
  `blog_preview` varchar(255) DEFAULT NULL,
  `blog_text` text NOT NULL,
  `blog_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review_blog`
--

INSERT INTO `review_blog` (`blog_id`, `writer_id`, `writer_name`, `blog_title`, `blog_cover`, `blog_preview`, `blog_text`, `blog_date`) VALUES
(1, 1, 'user32', 'Blog Title 1', 'https://i.ibb.co/BfqCZmK/blog3.jpg', 'this is blog preview text', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2020-09-26 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `review_blog_comment`
--

CREATE TABLE `review_blog_comment` (
  `blog_id` int(11) DEFAULT NULL,
  `comment_name` varchar(255) DEFAULT NULL,
  `comment_text` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review_blog_comment`
--

INSERT INTO `review_blog_comment` (`blog_id`, `comment_name`, `comment_text`) VALUES
(1, 'user404', 'This is a demo comment');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `review_blog`
--
ALTER TABLE `review_blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `review_blog`
--
ALTER TABLE `review_blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

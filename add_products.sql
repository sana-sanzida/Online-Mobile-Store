-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2020 at 03:12 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_products`
--

CREATE TABLE `add_products` (
  `product_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` int(11) NOT NULL,
  `model` varchar(50) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `availability` varchar(50) NOT NULL,
  `Weight` varchar(20) NOT NULL,
  `Dimensions` varchar(50) NOT NULL,
  `Processor` varchar(100) NOT NULL,
  `Network_Standard` varchar(100) NOT NULL,
  `Memory` varchar(100) NOT NULL,
  `Screen_Parameter` varchar(100) NOT NULL,
  `Camera` varchar(100) NOT NULL,
  `Battery` varchar(100) NOT NULL,
  `Sensors` varchar(100) NOT NULL,
  `Operating_System` varchar(100) NOT NULL,
  `Image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `add_products`
--

INSERT INTO `add_products` (`product_id`, `name`, `price`, `model`, `brand`, `availability`, `Weight`, `Dimensions`, `Processor`, `Network_Standard`, `Memory`, `Screen_Parameter`, `Camera`, `Battery`, `Sensors`, `Operating_System`, `Image`) VALUES
(5, 'Primo H9 Pro', 9499, ' ', ' Walton', 'In Stock', '148.60g', '', '', '', '4GB RAM; 64GB ROM (Up to 256GB)', '15.5cm (6.1”) U-Notch HD+ 19:9 IPS Display, 2.5D Glass', '- Dual Rear Cameras (13MP Sony Main cam) - 8MP Selfie Camera', '4000mAh', '', 'Android 10', '445_1-90x90.jpg'),
(6, 'Primo RX7', 12999, ' ', ' Walton', 'Out Of Stock', '168.30g', '', '', '', '- RAM: 4GB; ROM: 32GB (Up to 256GB)', '16cm (6.3”) 19:9 Full-HD+ IPS Display, (2340*1080)pixels', '- AI Dual (16+5)MP Auto Focus Rear Cameras - 13MP Selfie camera', '3900mAh', '', 'Android 9 Pie', '172_RX7-90x90.jpg'),
(7, 'Primo S7', 14999, '', ' Walton', 'Out Of Stock', '170.20g', '', '', '', 'RAM: 3GB DDR4; ROM: 32GB (Up to 256GB)', '15.90cm (6.26”) 19:9 U-Notch HD+ IPS Display, 2.5D Curved Glass', ' Triple (12+13+2)MP Auto Focus with LED Flash 16MP Selfie camera', 'Capacity: 3900mAh; Li Polymer Battery', '', 'Android 9 Pie', '305_S7-90x90.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_products`
--
ALTER TABLE `add_products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_products`
--
ALTER TABLE `add_products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

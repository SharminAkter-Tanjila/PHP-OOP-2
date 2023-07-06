-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2023 at 05:46 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rentit`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`) VALUES
(10, 'Rose Forbes', 'Perferendis vel nisi'),
(17, 'Rooney Burgess', 'Mollit in qui aut au'),
(18, 'Harper Newman', 'Eius deserunt dignis'),
(19, 'Tallulah Murphy', 'Et est et consectet'),
(20, 'Yoshio Mccarthy', 'Esse nihil mollitia'),
(21, 'Boris Stokes', 'Ut asperiores nemo q'),
(23, 'Megan Mack', 'Dolor ab consequat ');

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` int NOT NULL,
  `property_id` varchar(50) DEFAULT NULL,
  `property_category` varchar(200) NOT NULL,
  `property_title` varchar(255) DEFAULT NULL,
  `property_description` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `area` double DEFAULT NULL,
  `price` double DEFAULT NULL,
  `contact_info` varchar(255) DEFAULT NULL,
  `property_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `property_id`, `property_category`, `property_title`, `property_description`, `location`, `area`, `price`, `contact_info`, `property_image`) VALUES
(12, 'Autem iusto modi omn', 'Megan Mack', 'Nulla cupidatat aliq', 'Illum incididunt od', 'Ut ea aperiam deleni', 85, 682, 'jakuwifa@mailinator.com', 'studio_apartment_modern_kitchen_zone.jpg'),
(13, 'Ullamco veniam fugi', 'Harper Newman', 'Excepturi iste elit', 'Delectus rerum nihi', 'Est sit anim maxim', 40, 937, 'cyvenagiwu@mailinator.com', 'bungalow_house.jpg'),
(14, 'Et perferendis conse', 'Rooney Burgess', 'Perferendis distinct', 'Dolores enim explica', 'Quis architecto nemo', 40, 458, 'jevupuwyzy@mailinator.com', 'furnished_room_for_rent.jpg'),
(17, 'Deleniti molestias e', 'Megan Mack', 'Aute excepturi archi', 'Rem maxime nihil sap', 'Perspiciatis proide', 76, 887, 'davor@mailinator.com', '2319646.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `description`, `image`) VALUES
(3, 'slider 2 update', 'slider 2 des update', 'white_and_brown_concrete_bungalow.jpg'),
(5, 'Dolor rerum fuga Ut', 'Vel sit nulla sunt', 'car.jpg'),
(9, 'Assumenda aut est fu', 'Provident in nihil ', 'home_shift.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

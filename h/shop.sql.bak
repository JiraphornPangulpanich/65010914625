-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2025 at 05:57 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--
CREATE DATABASE IF NOT EXISTS `shop` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `shop`;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `p_id` int(7) NOT NULL,
  `p_name` varchar(200) NOT NULL,
  `p_detail` text NOT NULL,
  `p_price` float(9,2) NOT NULL,
  `p_ext` varchar(50) NOT NULL,
  `c_id` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `p_name`, `p_detail`, `p_price`, `p_ext`, `c_id`) VALUES
(1, 'หลวงปู่สรวง\r\n', 'หลวงปู่สรวง เทวดาเดินดิน ให้โชคลาภ เมตตามหานิยม\r\n', 150.00, 'jpg', 2),
(2, 'พระสุนทรีวาณี\r\n', 'เสริมสิริมงคล เสริมดวงชะตา แคล้วคลาด โชคลาภค้าขาย\r\n', 1399.00, 'jpg', 1),
(3, 'หลวงปู่เอี่ยม\r\n', 'เสริมสิริมงคล เสริมดวงชะตา \r\n', 299.00, 'jpg', 3),
(4, 'หลวงปู่ขาว\r\n', 'หลวงปู่ขาว อนาลโย เป็นพระภิกษุ คณะธรรมยุติกนิกาย\r\n', 159.00, 'jpg', 2),
(5, 'พระรอด\r\n', 'พระรอด มีความศักดิ์สิทธิ์หรือความขลังในด้านแคล้วคลาด\r\n', 1200.00, 'jpg', 2),
(6, 'พระคลังมหาสมบัติ\r\n', 'พุทธคุณ เสริมอำนาจบารมี เพิ่มยศเพิ่มตำแหน่ง โชคลาภ \r\n', 500.00, 'jpg', 3),
(7, 'พระไพรีพินาศ\r\n', 'บูชาเพื่อความเป็นสิริมงคล พุทธคุณป้องกันศัตรูอาฆาตร้าย\r\n', 1000.00, 'jpg', 1),
(8, 'หลวงพ่อสมหวัง \r\n', 'มตตา มหานิยม แคล้วคลาด โชคลาภ ค้าขาย\r\n', 150.00, 'jpg', 1),
(9, 'หลวงปู่ก๋วน\r\n', 'พกติดตัวแล้วจะแคล้วคลาดปลอดภัย การงานสำเร็จ\r\n', 399.00, 'jpg', 4),
(10, 'หลวงปู่ผาด\r\n', 'เสริมสิริมงคล เสริมดวงชะตา แคล้วคลาด โชคลาภค้าขาย\r\n', 399.00, 'jpg', 4),
(11, 'สมเด็จพระญาณสังวร\r\n', 'สมเด็จพระญาณสังวร\r\n', 999.00, 'jpg', 3),
(12, 'หลวงพ่อโสธร\r\n', 'สมปรารถนาในเรื่องการค้าขาย ประสบความสำเร็จ\r\n', 299.00, 'jpg', 2),
(13, 'หลวงปู่แสง ญาณวโร\r\n', 'ด้านเมตตา แคล้วคลาดปลอดภัย ค้าขายโชคลาภ\r\n', 399.00, 'jpg', 3),
(14, 'พระพุทธโธคลัง\r\n', 'เมตตา มหานิยม แคล้วคลาด โชคลาภ ค้าขายร่ำรวย\r\n', 2399.00, 'jpg', 1),
(15, 'หลวงปู่ธูป\r\n', 'ด้านเมตตา แคล้วคลาดปลอดภัย คงกระพัน ค้าขายโชคลาภ\r\n', 100.00, 'jpg', 2),
(16, 'พระพุทธสิหิงค์ จำลอง\r\n', 'เมตตา มหานิยม เสริมบารมี แคล้วคลาด โชคลาภ ค้าขายร่ำรวย\r\n', 699.00, 'jpg', 1),
(17, 'หลวงพ่อสิน \r\n', 'เสริมสิริมงคล เสริมอำนาจ บารมี แคล้วคลาด\r\n', 199.00, 'jpg', 2),
(18, 'หลวงปู่หมุน ฐิตสีโล\r\n', 'พระอริยสงฆ์   เมตตามหานิยม โชคลาภพูนทวี\r\n', 499.00, 'jpg', 2),
(19, 'สมเด็จพระพุฒาจารย์โต\r\n', 'เสริมสิริมงคล เสริมดวงชะตา แคล้วคลาด โชคลาภค้าขาย\r\n', 659.00, 'jpg', 4),
(20, 'พระพุทธประทานพร\r\n', 'เมตตา มหานิยม แคล้วคลาด โชคลาภ ค้าขายร่ำรวย\r\n', 1700.00, 'jpg', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`p_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `p_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

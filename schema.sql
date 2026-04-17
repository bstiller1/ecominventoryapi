-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2026 at 03:42 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hybrid_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock_count` int(11) DEFAULT 0,
  `description` text DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `stock_count`, `description`, `updated_at`) VALUES
(1, 'Arctic Explorer Parka', 299.99, 15, 'A heavy-duty, water-resistant parka designed for sub-zero temperatures.', '2026-04-08 13:56:17'),
(2, 'Titanium Camp Stove', 45.50, 120, 'Ultra-lightweight portable stove, ideal for long-distance backpacking.', '2026-04-08 13:56:17'),
(3, 'Nebula Gaming Mouse', 89.00, 45, 'Ergonomic RGB mouse with 25,000 DPI and programmable side buttons.', '2026-04-08 13:56:17'),
(4, 'Vintage Leather Journal', 24.95, 0, 'Hand-stitched leather notebook with 200 pages of acid-free cream paper.', '2026-04-08 13:56:17'),
(5, 'Organic Matcha Powder', 18.00, 210, 'Ceremonial grade green tea powder sourced directly from Uji, Japan.', '2026-04-08 13:56:17'),
(6, 'Noise-Canceling Headphones', 349.99, 32, 'Premium over-ear headphones with active noise cancellation and 40-hour battery life.', '2026-04-08 13:56:17'),
(7, 'HydroFlow Water Bottle', 32.00, 85, '32oz vacuum-insulated stainless steel bottle that keeps drinks cold for 24 hours.', '2026-04-08 13:56:17'),
(8, 'Smart Home Hub', 129.00, 18, 'Central controller for smart devices with built-in voice assistant support.', '2026-04-08 13:56:17'),
(9, 'Recycled Yoga Mat', 55.00, 60, 'Eco-friendly, non-slip mat made from 100% recycled natural rubber.', '2026-04-08 13:56:17'),
(10, 'Mechanical Keyboard TKL', 110.00, 12, 'Compact tenkeyless keyboard with hot-swappable brown switches.', '2026-04-08 13:56:17'),
(11, 'USB Wired Mouse', 49.99, 5, 'Mouse connected via USB.', '2026-04-08 15:11:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

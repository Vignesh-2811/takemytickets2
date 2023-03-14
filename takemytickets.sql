-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 14, 2023 at 04:32 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `takemytickets`
--

-- --------------------------------------------------------

--
-- Table structure for table `templisting`
--

CREATE TABLE `templisting` (
  `id` int(11) NOT NULL,
  `venue` text NOT NULL,
  `tickets` int(11) NOT NULL,
  `type` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `templisting`
--

INSERT INTO `templisting` (`id`, `venue`, `tickets`, `type`, `created_at`, `updated_at`) VALUES
(1, 'ECR, Chennai', 1, 'bronze', '2023-03-12 06:43:51', '2023-03-12 06:43:51'),
(2, 'ECR, Chennai', 1, 'bronze', '2023-03-12 08:25:47', '2023-03-12 08:25:47'),
(3, 'ECR, Chennai', 1, 'bronze', '2023-03-12 08:42:49', '2023-03-12 08:42:49'),
(4, 'ECR, Chennai', 1, 'bronze', '2023-03-12 08:45:02', '2023-03-12 08:45:02'),
(5, 'ECR, Chennai', 1, 'bronze', '2023-03-12 08:46:08', '2023-03-12 08:46:08'),
(6, 'ECR, Chennai', 1, 'bronze', '2023-03-12 11:40:59', '2023-03-12 11:40:59'),
(7, 'Outside Karnataka High Court, Bengaluru', 1, 'bronze', '2023-03-12 14:33:53', '2023-03-12 14:33:53'),
(8, 'ECR, Chennai', 5, 'bronze', '2023-03-12 14:34:17', '2023-03-12 14:34:17'),
(9, 'Outside Karnataka High Court, Bengaluru', 2, 'bronze', '2023-03-12 14:36:39', '2023-03-12 14:36:39'),
(10, 'Outside Karnataka High Court, Bengaluru', 1, 'bronze', '2023-03-12 14:37:18', '2023-03-12 14:37:18'),
(11, 'ECR, Chennai', 1, 'bronze', '2023-03-12 14:39:40', '2023-03-12 14:39:40'),
(12, 'Outside Karnataka High Court, Bengaluru', 1, 'bronze', '2023-03-12 14:44:32', '2023-03-12 14:44:32'),
(13, 'ECR, Chennai', 1, 'bronze', '2023-03-14 12:45:43', '2023-03-14 12:45:43'),
(14, 'ECR, Chennai', 1, 'bronze', '2023-03-14 13:21:55', '2023-03-14 13:21:55'),
(15, 'Outside Karnataka High Court, Bengaluru', 1, 'bronze', '2023-03-14 13:30:00', '2023-03-14 13:30:00'),
(16, 'Outside Karnataka High Court, Bengaluru', 1, 'bronze', '2023-03-14 13:49:57', '2023-03-14 13:49:57'),
(17, 'ECR, Chennai', 1, 'bronze', '2023-03-14 13:50:47', '2023-03-14 13:50:47'),
(18, 'ECR, Chennai', 1, 'bronze', '2023-03-14 13:51:55', '2023-03-14 13:51:55'),
(19, 'ECR, Chennai', 1, 'bronze', '2023-03-14 13:52:18', '2023-03-14 13:52:18'),
(20, 'ECR, Chennai', 1, 'bronze', '2023-03-14 14:40:35', '2023-03-14 14:40:35'),
(21, 'Outside Karnataka High Court, Bengaluru', 4, 'gold', '2023-03-14 14:40:45', '2023-03-14 14:40:45'),
(22, 'SUNDAY MORNINGS STAND-UP COMEDY AT CUBBON PARK ', 1, 'bronze', '2023-03-14 14:48:27', '2023-03-14 14:48:27'),
(23, 'SUNDAY MORNINGS STAND-UP COMEDY AT CUBBON PARK ', 1, 'bronze', '2023-03-14 14:51:30', '2023-03-14 14:51:30'),
(24, 'ffsdrfe', 1, 'bronze', '2023-03-14 14:52:11', '2023-03-14 14:52:11'),
(25, 'SUNDAY MORNINGS STAND-UP COMEDY AT CUBBON PARK ', 1, 'bronze', '2023-03-14 14:53:43', '2023-03-14 14:53:43'),
(26, 'SUNDAY MORNINGS STAND-UP COMEDY AT CUBBON PARK', 1, 'bronze', '2023-03-14 14:54:07', '2023-03-14 14:54:07');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `ticketowner` longtext NOT NULL,
  `bookingid` longtext NOT NULL,
  `venue` longtext NOT NULL,
  `category` longtext NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount_paid` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `role_as` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role_as`, `created_at`, `updated_at`) VALUES
(3, 'hi@hii.com', '$2y$10$.SyL2Os6i2BogfJAqmCWOu/7cMPrLwWyDwQoLsPD0D1yenNEKYRpi', 0, '2023-03-14 13:04:09', '2023-03-14 13:04:09'),
(4, 'shakthivignesh2002@gmail.com', '$2y$10$qNQiggovi7lszLXHDo4kbuezDEidDY4YIoAFcuMbw/uuXXqod2Y4m', 0, '2023-03-14 13:11:40', '2023-03-14 13:11:40');

-- --------------------------------------------------------

--
-- Table structure for table `venues`
--

CREATE TABLE `venues` (
  `id` int(11) NOT NULL,
  `venue` text NOT NULL,
  `city` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `venues`
--

INSERT INTO `venues` (`id`, `venue`, `city`, `created_at`, `updated_at`) VALUES
(1, 'ECR', 'Chennai', '2023-03-12 06:39:20', '2023-03-12 06:39:20'),
(2, 'Outside Karnataka High Court', 'Bengaluru', '2023-03-12 14:33:46', '2023-03-12 14:33:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `templisting`
--
ALTER TABLE `templisting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `venues`
--
ALTER TABLE `venues`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `templisting`
--
ALTER TABLE `templisting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `venues`
--
ALTER TABLE `venues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 10, 2024 at 10:34 PM
-- Server version: 8.0.39-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fitlinerpro`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `user_id` int NOT NULL,
  `attendance` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`user_id`, `attendance`) VALUES
(18, 8),
(19, 0);

-- --------------------------------------------------------

--
-- Table structure for table `membership_registration`
--

CREATE TABLE `membership_registration` (
  `id` int NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `name_with_initials` varchar(255) NOT NULL,
  `sex` enum('Male','Female') NOT NULL,
  `marital_status` enum('Married','Unmarried') NOT NULL,
  `address` varchar(255) NOT NULL,
  `birthday` date DEFAULT NULL,
  `age` int DEFAULT NULL,
  `height` decimal(5,2) DEFAULT NULL,
  `weight` decimal(5,2) DEFAULT NULL,
  `about` text,
  `exercise_location` text,
  `participated_in_sports` text,
  `currently_doing_sports` text,
  `exercise_duration` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `membership_registration`
--

INSERT INTO `membership_registration` (`id`, `first_name`, `last_name`, `name_with_initials`, `sex`, `marital_status`, `address`, `birthday`, `age`, `height`, `weight`, `about`, `exercise_location`, `participated_in_sports`, `currently_doing_sports`, `exercise_duration`) VALUES
(17, 'Sathira', 'asdasd', 'Sathira Sri Sathsara', 'Male', 'Married', 'Walgasma,Kanaththewewa, Wariyapola.', '2024-09-04', 12, '213.00', '23.00', 'asdasd', '[\"home\"]', '[\"yes\"]', '[\"yes\"]', 'Array'),
(18, 'Sathira', 'nirmal', 'Sathira Sri Sathsara', 'Male', 'Unmarried', 'Walgasma,Kanaththewewa, Wariyapola.', '2024-09-21', 12, '21.00', '23.00', 'sss', '[\"home\",\"school\"]', '[\"yes\"]', '[\"yes\"]', 'Array'),
(19, 'Sathira', 'asdasd', 'Sathira Sri Sathsara', 'Male', 'Unmarried', 'Walgasma,Kanaththewewa, Wariyapola.', '2024-09-27', 11, '211.00', '21.00', 'asdadd', '[\"home\",\"gym\",\"gym in-a-star-class-hotel\"]', '[\"yes\"]', '[\"yes\"]', 'Array');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int NOT NULL,
  `date` date NOT NULL,
  `message` text NOT NULL,
  `sender` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `date`, `message`, `sender`) VALUES
(1, '2024-09-11', 'hello world', 'Sathira'),
(2, '2024-09-11', 'hello world', 'Sathira'),
(3, '2024-09-10', 'Hello', 'Sam'),
(4, '2024-09-10', 'Hello 2', 'Sam'),
(5, '2024-09-10', 'Hello 3', 'Sam');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `status`) VALUES
(18, 'Paid'),
(19, 'Due');

-- --------------------------------------------------------

--
-- Table structure for table `shedule`
--

CREATE TABLE `shedule` (
  `id` int NOT NULL,
  `excercise` text NOT NULL,
  `reps` varchar(255) NOT NULL,
  `sets` varchar(255) NOT NULL,
  `month` varchar(255) NOT NULL,
  `added_by` text NOT NULL,
  `added_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `shedule`
--

INSERT INTO `shedule` (`id`, `excercise`, `reps`, `sets`, `month`, `added_by`, `added_date`) VALUES
(1, 'sample_text_data', '0', '0', 'February', 'Sathira', '2024-09-10'),
(2, 'sample_text', 'sample_reps', 'sample_sets', 'January', 'Sathira', '2024-09-10'),
(3, 'sample_data', '3', '3', 'January', 'Sam', '2024-09-10'),
(4, 'sample_data_excercise', '0', '0', 'February', 'Sam', '2024-09-10'),
(5, 'sample_data', '0', '0', 'October', 'Sam', '2024-09-10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `role` char(100) NOT NULL,
  `status` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `role`, `status`) VALUES
(1, 'Sathira', 'admin@email.com', '$2y$10$hWigoDjW8CDWSWPvcsRcn.mA1UVvza7HSm.eHXnaWqqymACAtID2C', '2024-09-08 18:10:54', 'admin', 'Active'),
(3, 'sathira sri sathsara nirmal', 'sathira.nirmal@gmail.com', '$2y$10$hWigoDjW8CDWSWPvcsRcn.mA1UVvza7HSm.eHXnaWqqymACAtID2C', '2024-09-08 18:57:14', 'user', 'Active'),
(17, 'Sathira', 'sathixbro@gmail.com', '$2y$10$F.ELwHOafbp5ubsAXziTfOO5V2.diEsL8/hD9rFGby8/CGLIXLdlC', '2024-09-09 01:30:16', 'user', 'Inactive'),
(18, 'Sathira', 'sathiyagameing@gmail.com', '$2y$10$w5upJ/YSnJV/tt6F6bgx9eb8pUBkt7Mi3HyRKQG2cUyzSqsEshXam', '2024-09-09 01:41:28', 'user', 'Inactive'),
(19, 'Sathira', 'email@gmail.com', '$2y$10$XTtI7fDDiRg901pbM2n6H.yzrKGIBQ2d7SFeVKcQyLXzv7ovC5gty', '2024-09-10 21:52:45', 'user', 'Inactive');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `membership_registration`
--
ALTER TABLE `membership_registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shedule`
--
ALTER TABLE `shedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `membership_registration`
--
ALTER TABLE `membership_registration`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `shedule`
--
ALTER TABLE `shedule`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

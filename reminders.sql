-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 07, 2025 at 06:32 PM
-- Server version: 10.11.13-MariaDB-0ubuntu0.24.04.1
-- PHP Version: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reminder_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `reminders`
--

CREATE TABLE `reminders` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` text DEFAULT NULL,
  `due_date` datetime DEFAULT NULL,
  `reminder_date` date DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reminders`
--

INSERT INTO `reminders` (`id`, `title`, `description`, `due_date`, `reminder_date`, `email`, `created_at`) VALUES
(8, 'Dentist Appointment', 'Annual dental checkup with Dr. Schmidt', '2025-11-11 14:30:00', '2025-11-05', 'user@example.com', '2025-07-07 16:27:32'),
(9, 'Netflix Renewal', 'Cancel or renew annual subscription', '2025-12-01 00:00:00', '2025-11-20', 'user@example.com', '2025-07-07 16:27:36'),
(10, 'Car Service', '30,000 km maintenance at AutoCare', '2025-09-15 09:00:00', '2025-09-08', 'user@example.com', '2025-07-07 16:27:41'),
(11, 'Mom\'s Birthday', 'Buy flowers and call at 10 AM', '2025-05-12 00:00:00', '2025-05-05', 'user@example.com', '2025-07-07 16:27:44'),
(12, 'Pay Rent', 'Transfer €850 to landlord ', '2025-10-03 00:00:00', '2025-09-28', 'user@example.com', '2025-07-07 16:27:49'),
(13, 'Team Meeting', 'Quarterly planning - prepare slides', '2025-07-15 10:00:00', NULL, 'user@example.com', '2025-07-07 16:28:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reminders`
--
ALTER TABLE `reminders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reminders`
--
ALTER TABLE `reminders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

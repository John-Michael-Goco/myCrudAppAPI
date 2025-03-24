-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2025 at 11:37 AM
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
-- Database: `db_students_list`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `studentID` varchar(15) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phoneNumber` bigint(12) NOT NULL,
  `course` varchar(200) NOT NULL,
  `lStatus` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `studentID`, `name`, `address`, `email`, `phoneNumber`, `course`, `lStatus`, `created_at`, `updated_at`) VALUES
(4, '22-0000951', 'John Michael Goco', 'San Jose, Sta. Ana, Pampanga', 'jmgoco416@gmail.com', 9456205198, 'BS in Computer Science', 'Listed', '2025-03-24 06:52:38', '2025-03-24 10:07:29'),
(5, '22-0000952', 'Howen Julius Asuncion', 'San Jose, Sta. Ana, Pampanga', 'howenasuncion@gamil.com', 9987654321, 'BS in Computer Science', 'Listed', '2025-03-24 06:53:49', '2025-03-24 10:10:37'),
(6, '22-0000953', 'Janzen Decano', 'Sta. Maria, Sta. Ana, Pampanga', 'janzendecano@gmail.com', 9182736455, 'BS in Computer Science', 'Deleted', '2025-03-24 06:55:51', '2025-03-24 10:14:15'),
(7, '22-0000954', 'Renz Gabriel Salas', 'San Luis, Pampanga', 'renzsalas@gmail.com', 2147483647, 'BS in Computer Science', 'Deleted', '2025-03-24 06:56:42', '2025-03-24 06:56:42'),
(10, '22-0000955', 'Renz Gabriel Salas', 'San Luis, Sta. Ana, Pampanga', 'renzsalas@gmail.com', 9123456789, 'BS in Computer Science', 'Listed', '2025-03-24 08:46:26', '2025-03-24 10:29:35'),
(11, '22-0000953', 'Janzen Decano', 'Sta. Maria, Sta. Ana, Pampanga', 'janzendecano@gmail.com', 9182736455, 'BS in Computer Science', 'Listed', '2025-03-24 08:49:20', '2025-03-24 10:14:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2021 at 04:33 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shine`
--

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(5) NOT NULL,
  `title` varchar(500) NOT NULL,
  `image` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `uploaded_by` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `uploaded_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `title`, `image`, `description`, `uploaded_by`, `email`, `uploaded_date`) VALUES
(1, 'lastedit', 'Screenshot (3).png', 'har har mahadev', 'manish', 'manish@gmail.com', '2021-10-04 09:02:44'),
(2, 'second', 'Embed.jpg', 'This is the second articles.', 'manish chaurasiya', 'manish@gmail.com', '2021-09-30 11:21:58'),
(3, 'first', 'iicon-01.png', '', 'manish', 'manish@gmail.com', '2021-09-30 11:21:58'),
(4, 'first', 'iicon-01.png', 'This is the first article', 'manish', 'manish@gmail.com', '2021-09-30 11:21:58'),
(6, 'Fourth', 'cs.png', 'This is the fourth articles.', 'manish chaurasiya', 'manish@gmail.com', '2021-09-30 11:21:58'),
(7, 'Fifth', 'cs.png', 'This is the fifth articles.', 'manish chaurasiya', 'manish@gmail.com', '2021-09-30 11:21:58'),
(8, 'First', 'Screenshot (37).png', 'This is the first article written by amit.', 'amit', 'amit@gmail.com', '2021-09-30 11:21:58'),
(10, 'Dusyant first article.', 'Screenshot (32).png', 'This is the first article written by dusyant.', 'dusyant', 'dusyant@gmail.com', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`) VALUES
(1, 'manish kumar', 'manish@gmail.com', '123456789'),
(2, 'amit', 'amit@gmail.com', '123456789'),
(3, 'anuj', 'anuj@gmail.com', '123456789'),
(4, 'kawal', 'kawal@gmail.com', '123456789'),
(5, 'dusyant ', 'dusyant@gmail.com', '123456789'),
(7, 'rohit chauhan', 'rohit@gmail.com', '123456789');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

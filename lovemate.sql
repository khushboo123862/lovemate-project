-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2025 at 08:49 AM
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
-- Database: `lovemate`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `postid` int(8) NOT NULL,
  `postcontent` text NOT NULL,
  `userid` int(11) NOT NULL,
  `dt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`postid`, `postcontent`, `userid`, `dt`) VALUES
(1, 'Mai vijay singh hu yadi koi bhabhi hai to please contact me.', 8, '2025-09-25 08:34:26'),
(2, 'i love yu', 8, '2025-09-25 08:44:53'),
(3, 'I love u too', 8, '2025-09-25 12:16:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(8) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `city` varchar(50) NOT NULL,
  `pwd` varchar(30) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `dor` date NOT NULL,
  `propic` varchar(255) NOT NULL DEFAULT 'images/user.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `name`, `mobile`, `city`, `pwd`, `gender`, `dor`, `propic`) VALUES
(3, 'Rakesh', '9170236824', 'Prayagraj', '1234', 'male', '2025-09-10', 'images/user.png'),
(4, 'Chhavi', '9559337118', 'Prayagraj', '1234', 'female', '2025-09-10', 'images/user.png'),
(5, 'Khushboo', '9865653256', 'Lucknow', '1234', 'female', '2025-09-10', 'images/user.png'),
(6, 'Sunny', '5465656565', 'Pune', '1234', 'female', '2025-09-10', 'images/user.png'),
(7, 'Manish', '7896584585', 'Handi', '1234', 'male', '2025-09-12', 'images/user.png'),
(8, 'Vijay Singh', '9090909090', 'Mirzapur', '123123', 'male', '2025-09-12', 'upl/1758612589Sunny-Leone-Mug.jpg'),
(9, 'Neha', '8080808080', 'Kanpur', '123123', 'female', '2025-09-12', 'images/user.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`postid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `mobile` (`mobile`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `postid` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

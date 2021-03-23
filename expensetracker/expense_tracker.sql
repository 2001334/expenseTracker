-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2021 at 09:23 PM
-- Server version: 10.5.6-MariaDB
-- PHP Version: 7.0.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `expense_tracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `expenses_id` int(11) NOT NULL,
  `expenses_name` text NOT NULL,
  `amount` int(11) NOT NULL,
  `date_spent` date NOT NULL,
  `userid` int(11) NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`expenses_id`, `expenses_name`, `amount`, `date_spent`, `userid`, `deleted`) VALUES
(1, 'Burger Pizza', 5000, '2021-03-22', 7, 0),
(2, 'Kentucky Fruits Chicken', 3000, '2021-03-23', 7, 0),
(3, 'Introduction to Cryptocurrency textbook', 300, '2021-03-23', 7, 0),
(4, 'Kenny\'s Football Kits', 14000, '2021-03-23', 7, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `email` text NOT NULL,
  `psword` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `fname`, `lname`, `email`, `psword`) VALUES
(1, 'Mayowa', 'Ogunyemi', 'ajax@gmail.com', '$2y$10$uZ6TGBJZBHiO3ZwSb6bDdOStvabfBGAZFhXeHTOYSDzr9RsU5FDtm'),
(2, 'Jide', 'Onanibosi', 'jide@gmail.com', '$2y$10$zhUBwmafIac1X0OvE8DaOOuuBtUGfqv60H3vrjKbOuQ9v1eN..K9u'),
(3, 'Osita', 'Okoli', 'osita@gmail.com', '$2y$10$Ny.oDRbBQHy8QjLpT09BGebbCldKdKg1NOCC99rtYBSR27TsqjNo.'),
(4, 'Gabriel', 'McDonald', 'gabriel@gmail.com', '$2y$10$uo57Pvn9fQmzIuT1N9Eore1ug67MUmeJbgwFMW9PCjKIHKj14COzK'),
(5, 'Mike', 'Adenuga', 'mike@gmail.com', '$2y$10$jT9zv2oMaOPAv/Js/.Wkx.yM2LjPbP/KwLFTQomunBsHVG6S9d4N2'),
(6, 'User', 'User', 'user@gmail.com', '$2y$10$yEB6Gw5KyubdBk34VvprW..Pen9kvJLd0e/5ZYWlAkocA/zcIspmm'),
(7, 'Aliko', 'Dangote', 'dangote@gmail.com', '$2y$10$rb.7xgtnuFR/GX34t6ykQ.XSFFcg0x95B.UKiRhVm7HOKrq.7Sqwu'),
(8, 'User', 'Matthew', 'matthew@gmail.com', '$2y$10$2e6tBSzlQh1IgmyxczKsGe3HIy2A0dOCm0FSjRpTJ2GUgkqOhhaDO'),
(9, 'Michael', 'Onakoya', 'mikey@gmail.com', '$2y$10$dkURz0HuVUs2VWyLUGjesuS6EWxbaoZH9J9hdfTEXXfoFIHI5RorW'),
(10, 'tomilade', 'taiwo', 'taiwo@tomi.com', '$2y$10$EWmVK4bwzIwCA5YhTVwiqONHG.CBgXA0wR8gZci2Pb7F.4MfmTU2q'),
(11, 'jide', 'jaido', 'jaido@gmail.com', '$2y$10$U6h7C1WtKkHATo0u5NSQJeDUhoYJprqdBx5qa/8xCh9XOqjOhh/U2'),
(12, 'gab', 'don', 'don@gmail.com', '$2y$10$PWO9.ST3EjPbOQxFtnQnlOq/dX5ULEk3gKpV1vZcOysjY2CufX0TG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`expenses_id`),
  ADD KEY `user_expenses` (`userid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `expenses_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `user_expenses` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

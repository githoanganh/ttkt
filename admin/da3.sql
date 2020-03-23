-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2020 at 02:55 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `da3`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(100) NOT NULL,
  `cat_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(1, 'Iphone'),
(2, 'Samsung'),
(3, 'HTC'),
(5, 'Vinsmart');

-- --------------------------------------------------------

--
-- Table structure for table `money`
--

CREATE TABLE `money` (
  `money_id` int(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `money_date` date NOT NULL,
  `money_start` time NOT NULL,
  `money_end` time NOT NULL,
  `money_total` int(100) NOT NULL,
  `money_effective` int(100) NOT NULL,
  `money_project` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `money_task` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `money_approved` int(100) NOT NULL,
  `money_effectivepm` int(100) NOT NULL,
  `money_money` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `money`
--

INSERT INTO `money` (`money_id`, `user_id`, `money_date`, `money_start`, `money_end`, `money_total`, `money_effective`, `money_project`, `money_task`, `money_approved`, `money_effectivepm`, `money_money`) VALUES
(1, 3, '2020-06-03', '00:00:08', '00:00:18', 10, 90, 'look up', 'Finish', 100, 80, 240000),
(2, 8, '2020-06-04', '00:00:08', '00:00:17', 9, 90, 'look up', 'ok', 100, 80, 216000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(100) NOT NULL,
  `user_full` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_mail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_pass` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_salt` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `user_level` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_full`, `user_mail`, `user_pass`, `user_salt`, `user_level`) VALUES
(1, 'Administrator', 'admin@gmail.com', 'skymap', '', 1),
(2, 'Mã Hóa', 'mahoa@gmail.com', 'anhhuy', 'doan3', 2),
(3, 'Phạm Hoàng Em', 'hoanganh@gmail.com', 'abc', '', 3),
(8, 'Phạm Quốc Huy', 'quochuy@gmail.com', '123', '', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `money`
--
ALTER TABLE `money`
  ADD PRIMARY KEY (`money_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `money`
--
ALTER TABLE `money`
  MODIFY `money_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

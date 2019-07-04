-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2018 at 07:35 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doubt`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(4) NOT NULL,
  `uid` varchar(15) DEFAULT NULL,
  `hash` varchar(15) DEFAULT NULL,
  `did` varchar(15) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `solution` varchar(250) DEFAULT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `likes` int(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `uid`, `hash`, `did`, `time`, `solution`, `photo`, `likes`) VALUES
(9, '5bd2993fb70e4', '5bd29a42d1260', '5bd2996615a8a', '2018-10-26 04:38:26', 'hoihfoghwg', 'gandhi.jpg', 2),
(10, '5bd29c7652ad2', '5bd29d7f00e31', '5bd29cb850d7c', '2018-10-26 04:52:14', 'Bsjsjbs', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `doubt`
--

CREATE TABLE `doubt` (
  `id` int(3) NOT NULL,
  `uid` varchar(15) DEFAULT NULL,
  `hash` varchar(15) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `problem` varchar(250) DEFAULT NULL,
  `image` varchar(35) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `views` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doubt`
--

INSERT INTO `doubt` (`id`, `uid`, `hash`, `title`, `problem`, `image`, `time`, `views`) VALUES
(18, '5bd2993fb70e4', '5bd2996615a8a', 'rrrr', 'rrrrr									', NULL, '2018-10-26 04:34:46', 17),
(19, '5bd29c7652ad2', '5bd29cb850d7c', 'Hsisbbd', '		Jsisjdbsmiaj							', 'IMG-20180930-WA0006.jpg', '2018-10-26 04:48:56', 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(3) NOT NULL,
  `hash` varchar(15) DEFAULT NULL,
  `name` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `rollno` varchar(10) NOT NULL,
  `email` varchar(35) NOT NULL,
  `photo` varchar(25) NOT NULL,
  `xp` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `hash`, `name`, `password`, `rollno`, `email`, `photo`, `xp`) VALUES
(7, '5bd2993fb70e4', 'Avinash Kumar', 'a208e5837519309129fa466b0c68396b', '17CSE030', 'avinashvidyarthi@gmail.com', 'compressed-cssp.jpg', 10),
(8, '5bd29c7652ad2', 'Avinash Vidyarthi', 'd4340ed377a06ebb817a05ff2d797afc', '17CSE030', 'noreply.avinashvidyarthi@gmail.com', 'Screenshot.png', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doubt`
--
ALTER TABLE `doubt`
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
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `doubt`
--
ALTER TABLE `doubt`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2019 at 04:15 PM
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `uid`, `hash`, `did`, `time`, `solution`, `photo`, `likes`) VALUES
(15, '5bd2cc320de3f', '5bd33c9b83d57', '5bd30ad088275', '2018-10-26 16:11:46', 'It will be better if you will search on GOOGLE', NULL, 3),
(11, '5bd2ad473681d', '5bd2b09680a00', '5bd2ae8252f3c', '2018-10-26 06:14:19', 'This is commment without image.', NULL, 1),
(14, '5bd2ad473681d', '5bd2d8e1dfa6e', '5bd2adfc9a701', '2018-10-26 09:06:15', 'This is demo comment.', NULL, 1),
(13, '5bd2ad473681d', '5bd2d6f33c0fa', '5bd2ae8252f3c', '2018-10-26 08:58:00', 'This is another comment..', NULL, 1),
(16, '5bd2ad473681d', '5bd342917f0e4', '5bd2adfc9a701', '2018-10-26 16:37:12', 'Demo', NULL, 1),
(17, '5bd2ad473681d', '5bd3449c6ca69', '5bd2adfc9a701', '2018-10-26 16:45:55', 'Demo again', NULL, 2),
(18, '5bd2ad473681d', '5bd80cf277d46', '5bd2ae8252f3c', '2018-10-30 07:49:57', 'this is demo', NULL, 0),
(19, '5bd2ad473681d', '5befc35910d6d', '5bd2ae8252f3c', '2018-11-17 07:31:18', 'demo with image', 'aaa.jpg', 0),
(20, '5bd2ad473681d', '5c6171360d9da', '5bd2adfc9a701', '2019-02-11 12:57:26', 'Demo', NULL, 0),
(21, '5bd2ad473681d', '5c62c5da8db93', '5bd30ad088275', '2019-02-12 13:10:50', 'anything', NULL, 0),
(22, '5bd2ad473681d', '5d1e05d7c7d48', '5bd2ae8252f3c', '2019-07-04 13:57:43', 'yes', NULL, 0);

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doubt`
--

INSERT INTO `doubt` (`id`, `uid`, `hash`, `title`, `problem`, `image`, `time`, `views`) VALUES
(22, '5bd2ad473681d', '5bd2ae8252f3c', 'This is the problem', 'This is the description									', NULL, '2018-10-26 06:05:27', 26),
(21, '5bd2ad473681d', '5bd2adfc9a701', 'DEMO', 'This is a demo doubt.									', 'IMG_20181016_134005.jpg', '2018-10-26 06:03:13', 28),
(26, '5bd2cc320de3f', '5bd2cdf4cd7b1', 'C OR C++ OR JAVA', '	Sir Being an Engineer One should be perfect in which programming language C or C++ or Java??								', NULL, '2018-10-26 08:19:38', 18),
(27, '5bd30a732698f', '5bd30ad088275', 'C', 'which terminal we should use for graphical output?		', NULL, '2018-10-26 12:39:18', 17),
(29, '5bd2ad473681d', '5bdc350fc1f92', 'Introducing new feature!!', 'Now get your solutions even faster!! An email notification will be sent to every member when you ask a question. This will help getting your solution fast.\r\n\r\nAdmin									', NULL, '2018-11-02 11:30:21', 18);

-- --------------------------------------------------------

--
-- Table structure for table `subscribe`
--

CREATE TABLE `subscribe` (
  `id` int(4) NOT NULL,
  `hash` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscribe`
--

INSERT INTO `subscribe` (`id`, `hash`, `email`) VALUES
(19, '5bd2cc320de3f', 'meabhishekpandey308@gmail.com'),
(21, '5bd302d836909', 'abhisekratha5@gmail.com'),
(22, '5bd30a732698f', 'rishi.raj4662@gmail.com'),
(23, '5bd33317c89ab', 'chinmaydash11@gmail.com'),
(24, '5bd336580c5de', 'iamajitkrjena@gmail.com'),
(25, '5bd342b62e146', 'albionashu21@gmail.com'),
(26, '5bd3f2ab40a13', 'akshay.vibrant@gmail.com'),
(27, '5bdc0c5ac691f', 'gauravguru199@gmail.com'),
(28, '5bdc373c79aaf', 'gatesashish@gmail.com'),
(29, '5bdc52e03fc65', 'pritamsingh798999@gmail.com'),
(30, '5bddbb814e663', 'krbittu2002@gmail.com'),
(31, '5bddbeccaf529', 'fspsnamta1234@gmail.com'),
(32, '5bdeadbbb0b53', 'princeofdeath25@gmail.com'),
(33, '5be17a9f2851b', 'anshulanurag20@gmail.com'),
(34, '5be46539c8d53', 'vmanrajsingh@gmail.com'),
(35, '5be4690ff1856', 'mfahmed545@gmail.com'),
(36, '5be46a47747e5', 'shailraj529@gmail.com'),
(45, '5beef001d06ab', 'swarajlenka1999@gmail.com'),
(47, '5bf3f36002101', 'makarchand123@gmail.com'),
(48, '5bf3f473425b3', 'jaideepchawla94@gmail.com'),
(49, '5bf8ea9a8d94c', 'sandeepkr1084@gmail.com');

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
  `photo` varchar(50) NOT NULL,
  `xp` int(5) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `hash`, `name`, `password`, `rollno`, `email`, `photo`, `xp`) VALUES
(10, '5bd2cc320de3f', 'Abhishek Kumar Pandey', 'f589a6959f3e04037eb2b3eb0ff726ac', '17ECE039', 'meabhishekpandey308@gmail.com', 'IMG_20181023_105528_207.jpg', 30),
(9, '5bd2ad473681d', 'Avinash Kumar', 'a208e5837519309129fa466b0c68396b', '17CSE030', 'avinashvidyarthi@gmail.com', 'compressed-cssp.jpg', 90),
(11, '5bd302d836909', 'ABHISEK RATH', 'd0acfd62b5aa29793649a2f5f39870cf', '17CSE072', 'abhisekratha5@gmail.com', '20181004_151313-01.jpeg', 0),
(12, '5bd30a732698f', 'Rishi Raj', 'ac4b0a568e8d3a14b521eae07006bc95', '17CSE142', 'rishi.raj4662@gmail.com', 'IMG_20181025_085044_992.jpg', 0),
(13, '5bd33317c89ab', 'Chinmay Kumar Dash', '45ca87d5976aee566ddb1b90e805a11d', '17CSE017', 'chinmaydash11@gmail.com', 'Dark-Phone-Wallpaper-Widescreen.jpg', 0),
(14, '5bd336580c5de', 'Ajit', '96e7db63cb94a44aabfec7d755eb8f68', '17CSE021', 'iamajitkrjena@gmail.com', 'IMG-20181019-WA0015.jpg', 0),
(15, '5bd342b62e146', 'Ashutosh', 'fb9134728bfa9efcd977af3bf7e398f6', '17CSE037', 'albionashu21@gmail.com', 'B612_20181024_211046_385.jpg', 0),
(16, '5bd3f2ab40a13', 'Aksoumya', '7d11ca883f743eb403d7586409a0fc22', '143', 'akshay.vibrant@gmail.com', 'IMG_20180903_212931_HHT.jpg', 0),
(17, '5bdc0c5ac691f', 'Gaurav Kumar', '29be54a52396750258d886abc5417fda', '17CSE074', 'gauravguru199@gmail.com', '15411477549791165199284.jpg', 0),
(18, '5bdc373c79aaf', 'Ashish', '827ccb0eea8a706c4c34a16891f84e7b', '17CSE061 ', 'gatesashish@gmail.com', 'IMG_20180816_145917.jpg', 0),
(19, '5bdc52e03fc65', 'Pritam Singh', 'cbe93bfe45858156ab59563c9b791aae', '17CSE064', 'pritamsingh798999@gmail.com', 'home.png', 0),
(20, '5bddbb814e663', 'Bittu Kumar', '158aba8901a7712afb650b631ba5a14f', '17CSE140', 'krbittu2002@gmail.com', 'IMG-20181021-WA0008.jpg', 0),
(21, '5bddbeccaf529', 'SPS BALGOPAL NAMTA', '30f64f3171b1fa24a1698bdf0b435b19', '17CSE143', 'fspsnamta1234@gmail.com', 'IMG_20181031_120905.jpg', 0),
(22, '5bdeadbbb0b53', 'Avinash Kumar Singh', 'a208e5837519309129fa466b0c68396b', '17CSE141', 'princeofdeath25@gmail.com', 'aaa.jpg', 0),
(23, '5be17a9f2851b', 'Anshul Anurag', '240bc306d1a19916d636f3d614e03024', '17CSE036', 'anshulanurag20@gmail.com', '1541503651981-1538739094.jpg', 0),
(25, '5be46539c8d53', 'Manraj Singh', '6eea9b7ef19179a06954edd0f6c05ceb', '17ECE028', 'vmanrajsingh@gmail.com', 'IMG-20181009-WA0002.jpg', 0),
(26, '5be4690ff1856', 'Mohammad Fakhruddin Ahmad', '6fa61e6b62158a90cbbca76ac6165fc1', '17IT006', 'mfahmed545@gmail.com', 'IMG-20170617-WA0081.jpg', 0),
(27, '5be46a47747e5', 'Shail Raj', '92648089c59f61306884224fae638957', '17CSE012', 'shailraj529@gmail.com', 'IMG-20181107-WA0007.jpg', 0),
(28, '5beef001d06ab', 'Swaraj Lenka', '91f551e66171e891e5d67ee404c97d2b', '17CSE011', 'swarajlenka1999@gmail.com', 'PicsArt_11-15-11.44.16.jpg', 0),
(29, '5bf3f36002101', 'Makarchand Gope', '1a624842d1f0b76871386abb0a723347', '17CSE149', 'makarchand123@gmail.com', 'Koala.jpg', 0),
(30, '5bf3f473425b3', 'Jaideep Chawla', '6627415e807ee33c7302917216e7da68', '17CSE166', 'jaideepchawla94@gmail.com', 'Desert.jpg', 0),
(31, '5bf8ea9a8d94c', 'Sandeep Kumar Saw', '81dc9bdb52d04dc20036dbd8313ed055', '17CSE014', 'sandeepkr1084@gmail.com', '2018-05-17-00-14-41-716.jpg', 0);

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
-- Indexes for table `subscribe`
--
ALTER TABLE `subscribe`
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
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `doubt`
--
ALTER TABLE `doubt`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `subscribe`
--
ALTER TABLE `subscribe`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

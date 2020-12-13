-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2020 at 04:13 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proyek`
--
CREATE DATABASE IF NOT EXISTS `proyek` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `proyek`;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `id_movie` int(11) NOT NULL,
  `username` varchar(12) NOT NULL,
  `comment` text NOT NULL,
  `timestamp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `id_movie`, `username`, `comment`, `timestamp`) VALUES
(1, 2, 'a', 'sudah bagus, tingkatkan!!', '13 Dec 20 at 10:02'),
(2, 4, 'q', 'mantap bang', '13 Dec 20 at 10:05');

-- --------------------------------------------------------

--
-- Table structure for table `detailmovie`
--

DROP TABLE IF EXISTS `detailmovie`;
CREATE TABLE `detailmovie` (
  `id_movie` int(11) NOT NULL,
  `detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detailmovie`
--

INSERT INTO `detailmovie` (`id_movie`, `detail`) VALUES
(1, 'a story about a fox that really like to dance'),
(2, 'a young man that has a superpower from a radioactive spider'),
(3, 'the story about an army of spartan that kills every enemies before their downfall'),
(4, 'a family that finds a magical wardrobe that can teleported to another world');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

DROP TABLE IF EXISTS `history`;
CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `username` varchar(12) NOT NULL,
  `id_movie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `username`, `id_movie`) VALUES
(1, 'a', 1),
(2, 'a', 2),
(3, 'a', 3),
(4, 'q', 4),
(5, 'q', 1);

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

DROP TABLE IF EXISTS `movie`;
CREATE TABLE `movie` (
  `id_movie` int(11) NOT NULL,
  `name_movie` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `rating` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`id_movie`, `name_movie`, `genre`, `image`, `rating`) VALUES
(1, 'Fantastic Mr.Fox', 'comedy,cartoon', 'coming-soon2.jpg', 0),
(2, 'Spiderman 3', 'action', 'movie3.jpg', 0),
(3, 'Gladiator', 'action,historical,thriller', 'movie5.jpg', 0),
(4, 'The Chronicles of Narnia', 'action,fiction', 'movie11.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `head_news` varchar(225) NOT NULL,
  `detail_news` text NOT NULL,
  `timestamp` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `head_news`, `detail_news`, `timestamp`) VALUES
(3, 'Spiderman 2 ', 'will come out at this weekend ', '13 Dec 20 at 09:24'),
(4, 'squidward the movie', 'squidward will come out at this january to save bikini bottom', '13 Dec 20 at 09:30');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
CREATE TABLE `review` (
  `id` int(11) NOT NULL COMMENT 'cmn buat auto increment',
  `id_movie` int(11) NOT NULL COMMENT 'id movie yang di rate',
  `rating` int(11) NOT NULL,
  `username` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `id_movie`, `rating`, `username`) VALUES
(9, 2, 3, 'a'),
(10, 4, 5, 'q');

-- --------------------------------------------------------

--
-- Table structure for table `trailer`
--

DROP TABLE IF EXISTS `trailer`;
CREATE TABLE `trailer` (
  `id` int(11) NOT NULL,
  `nama_trailer` varchar(225) NOT NULL,
  `desc_trailer` text NOT NULL,
  `images` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trailer`
--

INSERT INTO `trailer` (`id`, `nama_trailer`, `desc_trailer`, `images`) VALUES
(2, 'kung fu panda', 'a panda who want to learn kung fu', 'movie9.jpg'),
(3, 'Motives', 'a person who wants to become a police to fight crime', 'movie17.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `username` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(552) NOT NULL,
  `role` int(1) NOT NULL COMMENT '1 = admin\r\n2 = user premium\r\n3 = user biasa',
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `fullname`, `password`, `email`, `role`, `status`) VALUES
('a', 'a', '$2y$10$/J9i5yCehTWEpyl.gJ1Bp.Rw576ng5fcbN/kSdB80zZrDxplo6ksm', 'a', 2, 1),
('admin', 'admin', '$2y$10$EtuV6F6MWYDYV.9o3Qbo/.4c0X4KsrsyfpXs8cltgN0it.S56wOZC', 'admin@serverhost.co.id', 1, 0),
('kevin', 'Kevin Hao', '$2y$10$vWIk706qzH6TExniINxYaOyNibiI2UUnpFsIh6WA8dStQ0sy1PNvu', 'Kev@server7mail.com', 3, 0),
('Russel', 'Russel', '$2y$10$u/oSUsl03qj67vsQFgMtSOujcgX6iqzD1WhGb.MPwF4azlfgHLYkq', 'russ@st.co.id', 2, 1),
('owen', 'kevin owen', '$2y$10$Nxc04feR0pXm9ykJUGiVueqROS6BC/3Qw0vu.76dd0KCJ.qnsweCe', 'kevinowen05@gmail.com', 3, 1),
('q', 'q', '$2y$10$d/aTY1ynQnfg6YbwuW23X.PcEYBxvnDb19rQGYkYvLflbatKZlL5u', 'qwe@gmail.com', 3, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detailmovie`
--
ALTER TABLE `detailmovie`
  ADD PRIMARY KEY (`id_movie`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id_movie`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trailer`
--
ALTER TABLE `trailer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `detailmovie`
--
ALTER TABLE `detailmovie`
  MODIFY `id_movie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `id_movie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'cmn buat auto increment', AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `trailer`
--
ALTER TABLE `trailer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

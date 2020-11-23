-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2020 at 09:00 AM
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
-- Table structure for table `detailmovie`
--

CREATE TABLE `detailmovie` (
  `id_movie` int(11) NOT NULL,
  `detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detailmovie`
--

INSERT INTO `detailmovie` (`id_movie`, `detail`) VALUES
(1, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequuntur veniam ducimus voluptas nisi minus obcaecati saepe amet, ut accusantium molestiae commodi facilis repellat non. Alias eligendi nostrum quam iure in.'),
(2, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequuntur veniam ducimus voluptas nisi minus obcaecati saepe amet, ut accusantium molestiae commodi facilis repellat non. Alias eligendi nostrum quam iure in.'),
(3, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequuntur veniam ducimus voluptas nisi minus obcaecati saepe amet, ut accusantium molestiae commodi facilis repellat non. Alias eligendi nostrum quam iure in.'),
(4, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Rem excepturi nihil ducimus eligendi sed corporis voluptatibus earum fuga numquam provident. Repellendus atque placeat magnam quam mollitia repudiandae quis quaerat? Tempore!'),
(5, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Rem excepturi nihil ducimus eligendi sed corporis voluptatibus earum fuga numquam provident. Repellendus atque placeat magnam quam mollitia repudiandae quis quaerat? Tempore!');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `username` varchar(12) NOT NULL,
  `id_movie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `username`, `id_movie`) VALUES
(1, 'a', 2),
(2, 'a', 1);

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `id_movie` int(10) NOT NULL,
  `name_movie` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `rating` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`id_movie`, `name_movie`, `genre`, `image`, `rating`) VALUES
(1, 'Sandy Adventure', 'Adventure', 'sandy.png', 0),
(2, 'Spongebo The Movie', 'Fun', 'quot-the-spongebob-movie-sponge-on-the-run-quot-misi-spongebob-selamatkan-gary-yang-diculik-plankton.jpg', 0),
(3, 'tess', 'Adventure', 'bg.jpg', 0),
(4, 'q', 'q', 'bg.jpg', 0),
(5, 'qq', 'qq', 'bg.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL COMMENT 'cmn buat auto increment',
  `id_movie` int(11) NOT NULL COMMENT 'id movie yang di rate',
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `id_movie`, `rating`) VALUES
(1, 1, 5),
(2, 1, 3),
(3, 1, 5),
(4, 1, 4),
(5, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

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
('Russel', 'Russel', '$2y$10$u/oSUsl03qj67vsQFgMtSOujcgX6iqzD1WhGb.MPwF4azlfgHLYkq', 'russ@st.co.id', 2, 1);

--
-- Indexes for dumped tables
--

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
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detailmovie`
--
ALTER TABLE `detailmovie`
  MODIFY `id_movie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `id_movie` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'cmn buat auto increment', AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

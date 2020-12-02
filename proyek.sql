-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2020 at 06:13 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
(4, 1, 'a', 'aselole', '24 Nov 20 at 09:15'),
(5, 1, 'a', 'anjay mabar', '24 Nov 20 at 09:19');

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
(1, 'jangan bercanda dengan saya kamu!'),
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
-- Table structure for table `news`
--

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
(0, 'dummy', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequuntur veniam ducimus voluptas nisi minus obcaecati saepe amet, ut accusantium molestiae commodi facilis repellat non. Alias eligendi nostrum quam iure in.', '02-12-2020');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

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
(8, 1, 5, 'a');

-- --------------------------------------------------------

--
-- Table structure for table `trailer`
--

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
(0, 'Avengers : S', 'ini bukan avengers endgame', 'sandy.jgp');

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
('Russel', 'Russel', '$2y$10$u/oSUsl03qj67vsQFgMtSOujcgX6iqzD1WhGb.MPwF4azlfgHLYkq', 'russ@st.co.id', 2, 1),
('owen', 'kevin owen', '$2y$10$Nxc04feR0pXm9ykJUGiVueqROS6BC/3Qw0vu.76dd0KCJ.qnsweCe', 'kevinowen05@gmail.com', 3, 1);

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
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trailer`
--
ALTER TABLE `trailer`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

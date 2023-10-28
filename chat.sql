-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2023 at 12:57 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chat`
--

-- --------------------------------------------------------

--
-- Table structure for table `groupes`
--

CREATE TABLE `groupes` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `groupes`
--

INSERT INTO `groupes` (`id`, `name`) VALUES
(5, 'imad'),
(6, 'aymen'),
(7, 'groupe'),
(8, 'groupe final');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `getter_id` int(200) NOT NULL,
  `molchi_id` int(200) NOT NULL,
  `message` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `getter_id`, `molchi_id`, `message`) VALUES
(65, 863211984, 662703670, 'f'),
(66, 662703670, 863211984, 'f'),
(67, 662703670, 863211984, 'z'),
(68, 863211984, 662703670, 'd'),
(69, 863211984, 662703670, 'x'),
(70, 662703670, 863211984, 'q'),
(71, 662703670, 863211984, 'h'),
(72, 863211984, 662703670, 'c'),
(73, 662703670, 863211984, 's'),
(74, 662703670, 863211984, 's'),
(75, 662703670, 863211984, 'z'),
(76, 863211984, 662703670, 'c'),
(77, 1319996560, 863211984, 'a'),
(78, 1319996560, 863211984, 'slm'),
(79, 863211984, 819495979, 'a'),
(80, 819495979, 863211984, 'a'),
(81, 1319996560, 863211984, 'wech a sat'),
(82, 863211984, 1319996560, 'fen a bro'),
(83, 1319996560, 863211984, 'lah i 3zek'),
(84, 863211984, 1319996560, 'nta hani');

-- --------------------------------------------------------

--
-- Table structure for table `messagesgroupes`
--

CREATE TABLE `messagesgroupes` (
  `msggroupe_id` int(11) NOT NULL,
  `molchi_idgroupe` int(200) NOT NULL,
  `groupeparent` varchar(255) NOT NULL,
  `messagegroupe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messagesgroupes`
--

INSERT INTO `messagesgroupes` (`msggroupe_id`, `molchi_idgroupe`, `groupeparent`, `messagegroupe`) VALUES
(1, 1319996560, '6', 'hhhh'),
(2, 1319996560, '5', 'gggg'),
(3, 1319996560, '6', 'yyyyy'),
(4, 863211984, '5', 'xhr.responseText'),
(5, 863211984, '5', 'salam'),
(6, 863211984, '6', 'hhh'),
(7, 863211984, '6', 'hh'),
(8, 1248426341, '6', 'mokhlis'),
(9, 1248426341, '6', 'wech a drari'),
(10, 863211984, '6', 'fen asat'),
(11, 863211984, '5', 'fff'),
(12, 1248426341, '6', 'fen a sat'),
(13, 1248426341, '5', 'xhr.responseText'),
(14, 863211984, '5', 'kk'),
(15, 863211984, '7', 'salam'),
(16, 1248426341, '7', 'ahlan drari');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `unique_id` int(200) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `img` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `unique_id`, `firstname`, `lastname`, `email`, `password`, `status`, `img`) VALUES
(10, 863211984, 'imad', 'ff', 'imad@gmail.com', 'a', 'online now', '1698225179download.jpg'),
(11, 1319996560, 'aymen', 'salh', 'aymen@gmail.com', 'a', 'online now', '1698229446images.png'),
(12, 662703670, 'anas', 'benfil', 'anas@gmail.com', 'a', 'online now', '1698231698images.jpg'),
(13, 1589783591, 'hamza', 'meski', 'hamza@gmail.com', 'hamza', 'online now', '1698248489jdixoimmml5a1.jpg'),
(14, 655044608, 'anas', 'diabi', 'diabi@gmail.com', 'a', 'online now', '1698248653971362.jpg'),
(15, 1248426341, 'mokhlis', '9adi', 'mokhlis@gmail.com', 'a', 'online now', '1698248696971362.jpg'),
(16, 722852719, 'nawfal', '9adi', 'nawfal@gmail.com', 'a', 'online now', '1698248754red-dead-red-dead-redemption-2-arthur-morgan-hd-wallpaper-preview.jpg'),
(17, 819495979, 'mohamed', 'bachiri', 'mohamedb@gmail.com', 'a', 'online now', '1698251724wp3848831.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `groupes`
--
ALTER TABLE `groupes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `messagesgroupes`
--
ALTER TABLE `messagesgroupes`
  ADD PRIMARY KEY (`msggroupe_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `groupes`
--
ALTER TABLE `groupes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `messagesgroupes`
--
ALTER TABLE `messagesgroupes`
  MODIFY `msggroupe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

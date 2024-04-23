-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2024 at 12:40 AM
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
-- Database: `steam`
--

-- --------------------------------------------------------

--
-- Table structure for table `age_rating`
--

CREATE TABLE `age_rating` (
  `age_rating_id` int(11) NOT NULL,
  `age_rating_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `age_rating`
--

INSERT INTO `age_rating` (`age_rating_id`, `age_rating_name`) VALUES
(1, 'E'),
(2, 'E10'),
(3, 'T'),
(4, 'M'),
(5, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `game_id` int(11) NOT NULL,
  `game_title` varchar(255) NOT NULL,
  `pub_date` date NOT NULL,
  `genre_id` int(11) NOT NULL,
  `age_rating_id` int(11) NOT NULL,
  `game_cost` decimal(5,0) NOT NULL,
  `gamedev_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`game_id`, `game_title`, `pub_date`, `genre_id`, `age_rating_id`, `game_cost`, `gamedev_id`) VALUES
(1, 'Baldur\'s Gate 3', '2023-08-03', 3, 4, 60, 1),
(2, 'Portal', '2007-10-10', 6, 3, 10, 2),
(3, 'The Sims 4', '2014-09-02', 11, 1, 0, 3),
(4, 'Team Fortress 2', '2007-10-10', 9, 4, 0, 2),
(5, 'Lethal Company', '2023-10-23', 7, 4, 10, 4),
(6, 'Valorant', '2020-06-02', 9, 4, 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `gamedev`
--

CREATE TABLE `gamedev` (
  `gamedev_ID` int(11) NOT NULL,
  `gamedev_name` varchar(255) NOT NULL,
  `gamedev_creation_date` date NOT NULL,
  `gamedev_country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gamedev`
--

INSERT INTO `gamedev` (`gamedev_ID`, `gamedev_name`, `gamedev_creation_date`, `gamedev_country`) VALUES
(1, 'Larian Studios', '2002-09-20', 'Belgium'),
(2, 'Valve', '1998-11-08', 'United States'),
(3, 'EA', '1982-05-27', 'United States'),
(4, 'Zeekerss', '2020-07-22', 'United States'),
(5, 'Riot Games', '2006-09-12', 'United States');

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `genre_id` int(11) NOT NULL,
  `genre_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`genre_id`, `genre_name`) VALUES
(1, 'Action'),
(2, 'Adventure'),
(3, 'RPG'),
(4, 'Sports'),
(5, 'Real-Time Strategy'),
(6, 'Puzzle'),
(7, 'Horror'),
(8, 'Rhythm'),
(9, 'FPS'),
(10, 'Cars'),
(11, 'Simulation');

-- --------------------------------------------------------

--
-- Table structure for table `library`
--

CREATE TABLE `library` (
  `library_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `library`
--

INSERT INTO `library` (`library_id`, `game_id`, `user_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 2, 2),
(4, 3, 1),
(5, 4, 2),
(6, 3, 2),
(7, 6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `paymentmethod`
--

CREATE TABLE `paymentmethod` (
  `payment_id` int(11) NOT NULL,
  `payment_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paymentmethod`
--

INSERT INTO `paymentmethod` (`payment_id`, `payment_name`) VALUES
(1, 'Steam Wallet'),
(2, 'Paypal'),
(3, 'Visa'),
(4, 'MasterCard'),
(5, 'American Express'),
(6, 'Discover'),
(7, 'JCB');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(11) NOT NULL,
  `transaction_date` date NOT NULL,
  `transaction_tax` decimal(5,0) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `transaction_date`, `transaction_tax`, `payment_id`, `game_id`, `user_id`) VALUES
(1, '2024-04-23', 1, 1, 1, 1),
(2, '2024-04-23', 1, 1, 2, 1),
(3, '2024-04-23', 1, 1, 2, 2),
(4, '2024-04-23', 1, 3, 3, 1),
(5, '2024-04-23', 1, 2, 6, 2),
(6, '2024-04-23', 1, 2, 4, 2),
(7, '2024-04-23', 1, 6, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_first_name` varchar(255) NOT NULL,
  `user_last_name` varchar(255) NOT NULL,
  `user_username` varchar(255) NOT NULL,
  `user_displayname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_shipping_address` varchar(255) NOT NULL,
  `user_balance` decimal(11,0) NOT NULL,
  `user_country` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_first_name`, `user_last_name`, `user_username`, `user_displayname`, `user_email`, `user_shipping_address`, `user_balance`, `user_country`) VALUES
(1, 'Sean', 'Bolles', 'sbolles', 'sbolles', 'sbolles@gmail.com', '44 Horsey Dr., Belling, MA', 100, 'United States'),
(2, 'Vincent', 'Tran', 'vtran', 'vtran', 'vtran@gmail.com', '34 Twinkle Rd., Franklin, MA', 1000, 'United States');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `age_rating`
--
ALTER TABLE `age_rating`
  ADD PRIMARY KEY (`age_rating_id`);

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`game_id`),
  ADD KEY `age_rating_id` (`age_rating_id`),
  ADD KEY `gamedev_id` (`gamedev_id`),
  ADD KEY `genre_id` (`genre_id`);

--
-- Indexes for table `gamedev`
--
ALTER TABLE `gamedev`
  ADD PRIMARY KEY (`gamedev_ID`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`genre_id`);

--
-- Indexes for table `library`
--
ALTER TABLE `library`
  ADD PRIMARY KEY (`library_id`),
  ADD KEY `game_id` (`game_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `paymentmethod`
--
ALTER TABLE `paymentmethod`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `game_id` (`game_id`),
  ADD KEY `payment_id` (`payment_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `age_rating`
--
ALTER TABLE `age_rating`
  MODIFY `age_rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `game_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `gamedev`
--
ALTER TABLE `gamedev`
  MODIFY `gamedev_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `genre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `library`
--
ALTER TABLE `library`
  MODIFY `library_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `paymentmethod`
--
ALTER TABLE `paymentmethod`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `game`
--
ALTER TABLE `game`
  ADD CONSTRAINT `game_ibfk_1` FOREIGN KEY (`age_rating_id`) REFERENCES `age_rating` (`age_rating_id`),
  ADD CONSTRAINT `game_ibfk_2` FOREIGN KEY (`gamedev_id`) REFERENCES `gamedev` (`gamedev_ID`),
  ADD CONSTRAINT `game_ibfk_3` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`genre_id`);

--
-- Constraints for table `library`
--
ALTER TABLE `library`
  ADD CONSTRAINT `library_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `game` (`game_id`),
  ADD CONSTRAINT `library_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `game` (`game_id`),
  ADD CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`payment_id`) REFERENCES `paymentmethod` (`payment_id`),
  ADD CONSTRAINT `transaction_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

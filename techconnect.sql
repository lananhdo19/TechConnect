-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2020 at 11:44 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `techconnect`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `all_listings` (IN `username` VARCHAR(40))  SELECT * FROM Listing NATURAL JOIN Lists
Where Username = username$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `newAccount` (IN `email` VARCHAR(100), IN `password` VARCHAR(255), IN `username` VARCHAR(100))  BEGIN
INSERT INTO user_pass VALUES (email, password);
INSERT INTO profile VALUES (username, email);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `card_info`
--

CREATE TABLE `card_info` (
  `card_number` varchar(40) NOT NULL,
  `type` varchar(10) DEFAULT NULL,
  `User` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `card_info`
--

INSERT INTO `card_info` (`card_number`, `type`, `User`) VALUES
('1224522892212222', 'credit', 'ld9hu'),
('1224563445453333', 'credit', 'jc4rn'),
('1234567891012131', 'debit', 'zh2yn'),
('6543543574637548', 'debit', 'hew5fz');

-- --------------------------------------------------------

--
-- Table structure for table `listing`
--

CREATE TABLE `listing` (
  `item_id` int(11) NOT NULL,
  `brand` varchar(30) DEFAULT NULL,
  `item_condition` varchar(30) DEFAULT NULL,
  `type` varchar(30) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `listing`
--

INSERT INTO `listing` (`item_id`, `brand`, `item_condition`, `type`, `description`, `price`) VALUES
(2, 'bose', 'good', 'headphones', 'Noise-cancelling, over the ear headphones', 85),
(3, 'samsung', 'fair', 'tv', 'Used for two years, fair condition, black, 40 inch', 150),
(4, 'apple', 'good', 'tablet', 'ipad mini, 7.9 inch retina display', 300);

-- --------------------------------------------------------

--
-- Table structure for table `listing_brand`
--

CREATE TABLE `listing_brand` (
  `brand` varchar(50) NOT NULL,
  `count` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `listing_type`
--

CREATE TABLE `listing_type` (
  `type` varchar(50) NOT NULL,
  `image` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lists`
--

CREATE TABLE `lists` (
  `item_id` int(11) NOT NULL,
  `Username` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lists`
--

INSERT INTO `lists` (`item_id`, `Username`) VALUES
(1, 'jc4rn'),
(2, 'ld9hu'),
(3, 'zh2yn'),
(4, 'hew5fz');

-- --------------------------------------------------------

--
-- Table structure for table `makes`
--

CREATE TABLE `makes` (
  `username` varchar(40) DEFAULT NULL,
  `transaction_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `makes`
--

INSERT INTO `makes` (`username`, `transaction_id`) VALUES
('ld9hu', 37);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `username_1` varchar(40) NOT NULL,
  `username_2` varchar(40) NOT NULL,
  `text` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`username_1`, `username_2`, `text`) VALUES
('hew5fz', 'jc4rn', 'Test message from hew5fz to jc4rn'),
('jc4rn', 'ld9hu', 'Test message from jc4rn to ld9hu'),
('ld9hu', 'ld9hu', 'sdafgdsdgs'),
('ld9hu', 'zh2yn', 'Test message from ld9hu to zh2yn'),
('zh2yn', 'hew5fz', 'Test message from zh2yn to hew5fz'),
('zh5yn', 'ld9hu', 'hellow');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `Username` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`Username`, `email`) VALUES
('ass', 'ass@sdfad.adsfa'),
('assss', 'assss@sdfad.adsfa'),
('fdfa', 'fdfa@dfg.vgd'),
('hew5fz', 'hew5fz@virginia.edu'),
('james', 'james@smith.gom'),
('jc4rn', 'jc4rn@virginia.edu'),
('ld9hsdfsfu', 'ld9hsdfsfu@virginia.edu'),
('ld9hsxcxcxcxdfsfu', 'ld9hsxcxcxcxdfsfu@virginia.edu'),
('ld9hu', 'ld9hu@virginia.edu'),
('ldaaa9hu', 'ldaaa9hu@virginia.edu'),
('zh2yn', 'zh2yn@virginia.edu');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(11) NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `card_number` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `item_id`, `date`, `card_number`) VALUES
(30, 3, '2020-04-25 23:35:11', '1224522892212222'),
(31, 3, '2020-04-25 23:35:58', '1224522892212222'),
(32, 3, '2020-04-25 23:36:35', '1224522892212222'),
(33, 3, '2020-04-25 23:36:44', '1224522892212222'),
(34, 3, '2020-04-25 23:37:40', '1224522892212222'),
(35, 3, '2020-04-25 23:38:00', '1224522892212222'),
(36, 3, '2020-04-25 23:38:35', '1224522892212222'),
(37, 2, '2020-04-25 23:39:56', '1224522892212222');

-- --------------------------------------------------------

--
-- Table structure for table `user_pass`
--

CREATE TABLE `user_pass` (
  `email` varchar(100) NOT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_pass`
--

INSERT INTO `user_pass` (`email`, `password`) VALUES
('ass@sdfad.adsfa', '$2y$10$SLbt3Zca7KuUCiW.YgjDse.AsuRLszn6nkiQTXRmG9fY2NzfAV3nK'),
('assss@sdfad.adsfa', '$2y$10$zGu41c/i79KZ4gtKrAWJiutJHEzHTuHfXhnN01wOdix3SagbIktem'),
('dsfsafd@g.sd', '$2y$10$IIncV2e9D92ojTb12VUkzeHsaC/2n1m9MiD8Sn5tJ5drc7eDuxPe2'),
('fdfa@dfg.vgd', '$2y$10$4QpBbKo/hwLQqQQa4FLhpe/MZqJT8ISOdIqEtnOcFoPnqRD15vnIO'),
('hew5fz@virginia.edu', '$2y$10$IIncV2e9D92ojTb12VUkzeHsaC/2n1m9MiD8Sn5tJ5drc7eDuxPe2'),
('james@smith.gom', '$2y$10$/JUonBRZUxoYLuvq5o1r8.vinVWhOLj82nnKsC2IlsCe/318FudDS'),
('jc4rn@virginia.edu', '$2y$10$IIncV2e9D92ojTb12VUkzeHsaC/2n1m9MiD8Sn5tJ5drc7eDuxPe2'),
('ld9hsdfsfu@virginia.edu', '$2y$10$lgOKco3KomxnlkHIqcmAfu/uutKI3XV2XQ/gjwIPhif..F97W2/GS'),
('ld9hsxcxcxcxdfsfu@virginia.edu', '$2y$10$2iJpiAq4NWx1ZwTDVfKdge44rt1LQHksNolhKsB6lcYWR2LnJR2Ja'),
('ld9hu@virginia.edu', '$2y$10$XC0apkiVlkx2XUN9v9EXL.edI.oE8hM78veLjcYckaIqm722Rnw4.'),
('ld9hu@virginia.edus', '$2y$10$ayUQOfig1NUDE8GlQROCMOrVu5rkEh8wbzXvCEXbsEbdiKtTuO7eS'),
('ld9hu@virginia.efffdus', '$2y$10$HMdE6OSXK8ZEIuT3xvCnn.PlSGw7Z/9riWdNdFcOmarhcN.bOdDVS'),
('ldaaa9hu@virginia.edu', '$2y$10$aYMQ1IpGgyF9PNstyxO3o.yFiy48SFzxDej8qCs9sGA1HO7RZ2c7S'),
('zh2yn@virginia.edu', '$2y$10$IIncV2e9D92ojTb12VUkzeHsaC/2n1m9MiD8Sn5tJ5drc7eDuxPe2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `card_info`
--
ALTER TABLE `card_info`
  ADD PRIMARY KEY (`card_number`);

--
-- Indexes for table `listing`
--
ALTER TABLE `listing`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `listing_brand`
--
ALTER TABLE `listing_brand`
  ADD PRIMARY KEY (`brand`);

--
-- Indexes for table `listing_type`
--
ALTER TABLE `listing_type`
  ADD PRIMARY KEY (`type`);

--
-- Indexes for table `lists`
--
ALTER TABLE `lists`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `makes`
--
ALTER TABLE `makes`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`username_1`,`username_2`),
  ADD KEY `username_2` (`username_2`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`Username`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `user_pass`
--
ALTER TABLE `user_pass`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `listing`
--
ALTER TABLE `listing`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

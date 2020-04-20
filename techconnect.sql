-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2020 at 09:54 PM
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

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `card_info`
--

CREATE TABLE `card_info` (
  `card_number` varchar(40) NOT NULL,
  `type` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `card_info`
--

INSERT INTO `card_info` (`card_number`, `type`) VALUES
('532d4e37b1f940591970589fd61fae54', 'credit'),
('a2b0b5d4d3015790182ba43527123434', 'credit'),
('c287bf76192b845a5e25167abc784500', 'debit'),
('e57ec13f658409dc225a5d65ca96717c', 'debit');

-- --------------------------------------------------------

--
-- Table structure for table `credit_debit`
--

CREATE TABLE `credit_debit` (
  `pay_id` int(11) NOT NULL,
  `card_number` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `credit_debit`
--

INSERT INTO `credit_debit` (`pay_id`, `card_number`) VALUES
(100003, '532d4e37b1f940591970589fd61fae54'),
(100004, 'a2b0b5d4d3015790182ba43527123434'),
(100001, 'c287bf76192b845a5e25167abc784500'),
(100002, 'e57ec13f658409dc225a5d65ca96717c');

-- --------------------------------------------------------

--
-- Table structure for table `item_score`
--

CREATE TABLE `item_score` (
  `Item_ID` int(11) NOT NULL,
  `Username` varchar(40) NOT NULL,
  `Score` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_score`
--

INSERT INTO `item_score` (`Item_ID`, `Username`, `Score`) VALUES
(1, 'jc4rn', 5),
(2, 'ld9hu', 9),
(3, 'zh2yn', 7),
(4, 'zh2yn', 10);

-- --------------------------------------------------------

--
-- Table structure for table `listing`
--

CREATE TABLE `listing` (
  `item_id` int(11) NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `brand` varchar(30) DEFAULT NULL,
  `item_condition` varchar(30) DEFAULT NULL,
  `type` varchar(30) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `listing`
--

INSERT INTO `listing` (`item_id`, `image`, `brand`, `item_condition`, `type`, `description`) VALUES
(1, 'laptop.jpg', 'apple', 'new', 'laptop', 'MacBook Pro 2013'),
(2, 'bose_heaphone.jpg', 'bose', 'good', 'headphones', 'Noise-cancelling, over the ear headphones'),
(3, 'tv.jpg', 'samsung', 'fair', 'tv', 'Used for two years, fair condition, black, 40 inch'),
(4, 'tablet.jpg', 'apple', 'good', 'tablet', 'ipad mini, 7.9 inch retina display'),
(5, 'dell_comp.jpg', 'dell', 'excellent', 'desktop', 'dell inspiron, 7th generation, windows 10');

-- --------------------------------------------------------

--
-- Table structure for table `listing_brand`
--

CREATE TABLE `listing_brand` (
  `brand` varchar(30) NOT NULL,
  `item_condition` varchar(30) NOT NULL,
  `type` varchar(30) NOT NULL,
  `price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `listing_brand`
--

INSERT INTO `listing_brand` (`brand`, `item_condition`, `type`, `price`) VALUES
('apple', 'good', 'tablet', 300),
('apple', 'new', 'laptop', 1000),
('bose', 'good', 'headphones', 85),
('dell', 'excellent', 'desktop', 450),
('samsung', 'fair', 'tv', 150);

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
(4, 'hew5fz'),
(1, 'jc4rn'),
(2, 'ld9hu'),
(3, 'zh2yn');

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
('hew5fz', 1001),
('jc4rn', 1003),
('jc4rn', 1004),
('zh2yn', 1002);

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
('ld9hu', 'zh2yn', 'Test message from ld9hu to zh2yn'),
('zh2yn', 'hew5fz', 'Test message from zh2yn to hew5fz');

-- --------------------------------------------------------

--
-- Table structure for table `payment_stored`
--

CREATE TABLE `payment_stored` (
  `pay_ID` int(11) NOT NULL,
  `username` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_stored`
--

INSERT INTO `payment_stored` (`pay_ID`, `username`) VALUES
(100004, 'hew5fz'),
(100001, 'jc4rn'),
(100002, 'ld9hu'),
(100003, 'zh2yn');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `Username` varchar(40) NOT NULL,
  `email` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`Username`, `email`) VALUES
('hew5fz', 'hew5fz@virginia.edu'),
('jc4rn', 'jc4rn@virginia.edu'),
('ld9hu', 'ld9hu@virginia.edu'),
('zh2yn', 'zh2yn@virginia.edu');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(11) NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `payment_info` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `item_id`, `payment_info`, `date`) VALUES
(1001, 1, 100004, '2019-01-05 00:00:00'),
(1002, 2, 100003, '2019-03-08 00:00:00'),
(1003, 3, 100001, '2019-11-15 00:00:00'),
(1004, 4, 100001, '2019-12-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_pass`
--

CREATE TABLE `user_pass` (
  `email` varchar(40) NOT NULL,
  `password` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_pass`
--

INSERT INTO `user_pass` (`email`, `password`) VALUES
('hew5fz@virginia.edu', '*5B14D5E4E'),
('jc4rn@virginia.edu', '*45F379C00'),
('ld9hu@virginia.edu', '*1C04696A2'),
('zh2yn@virginia.edu', '*698EA3ACE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `card_info`
--
ALTER TABLE `card_info`
  ADD PRIMARY KEY (`card_number`);

--
-- Indexes for table `credit_debit`
--
ALTER TABLE `credit_debit`
  ADD PRIMARY KEY (`pay_id`),
  ADD KEY `card_number` (`card_number`);

--
-- Indexes for table `item_score`
--
ALTER TABLE `item_score`
  ADD PRIMARY KEY (`Item_ID`,`Username`),
  ADD KEY `Username` (`Username`);

--
-- Indexes for table `listing`
--
ALTER TABLE `listing`
  ADD PRIMARY KEY (`item_id`),
  ADD UNIQUE KEY `unique_image` (`image`),
  ADD KEY `brand` (`brand`,`item_condition`,`type`);

--
-- Indexes for table `listing_brand`
--
ALTER TABLE `listing_brand`
  ADD PRIMARY KEY (`brand`,`item_condition`,`type`);

--
-- Indexes for table `lists`
--
ALTER TABLE `lists`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `Username` (`Username`);

--
-- Indexes for table `makes`
--
ALTER TABLE `makes`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`username_1`,`username_2`),
  ADD KEY `username_2` (`username_2`);

--
-- Indexes for table `payment_stored`
--
ALTER TABLE `payment_stored`
  ADD PRIMARY KEY (`pay_ID`),
  ADD KEY `username` (`username`);

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
  ADD KEY `item_id` (`item_id`),
  ADD KEY `payment_info` (`payment_info`);

--
-- Indexes for table `user_pass`
--
ALTER TABLE `user_pass`
  ADD PRIMARY KEY (`email`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `credit_debit`
--
ALTER TABLE `credit_debit`
  ADD CONSTRAINT `credit_debit_ibfk_1` FOREIGN KEY (`card_number`) REFERENCES `card_info` (`card_number`);

--
-- Constraints for table `item_score`
--
ALTER TABLE `item_score`
  ADD CONSTRAINT `item_score_ibfk_1` FOREIGN KEY (`Item_ID`) REFERENCES `listing` (`item_id`),
  ADD CONSTRAINT `item_score_ibfk_2` FOREIGN KEY (`Username`) REFERENCES `profile` (`Username`);

--
-- Constraints for table `listing`
--
ALTER TABLE `listing`
  ADD CONSTRAINT `listing_ibfk_1` FOREIGN KEY (`brand`,`item_condition`,`type`) REFERENCES `listing_brand` (`brand`, `item_condition`, `type`);

--
-- Constraints for table `lists`
--
ALTER TABLE `lists`
  ADD CONSTRAINT `lists_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `listing` (`item_id`),
  ADD CONSTRAINT `lists_ibfk_2` FOREIGN KEY (`Username`) REFERENCES `profile` (`Username`);

--
-- Constraints for table `makes`
--
ALTER TABLE `makes`
  ADD CONSTRAINT `makes_ibfk_1` FOREIGN KEY (`transaction_id`) REFERENCES `transaction` (`transaction_id`),
  ADD CONSTRAINT `makes_ibfk_2` FOREIGN KEY (`username`) REFERENCES `profile` (`Username`);

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`username_1`) REFERENCES `profile` (`Username`),
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`username_2`) REFERENCES `profile` (`Username`);

--
-- Constraints for table `payment_stored`
--
ALTER TABLE `payment_stored`
  ADD CONSTRAINT `payment_stored_ibfk_1` FOREIGN KEY (`username`) REFERENCES `profile` (`Username`);

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_ibfk_1` FOREIGN KEY (`email`) REFERENCES `user_pass` (`email`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `listing` (`item_id`),
  ADD CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`payment_info`) REFERENCES `credit_debit` (`pay_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

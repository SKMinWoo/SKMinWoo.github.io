-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 26, 2018 at 11:25 PM
-- Server version: 5.6.34-log
-- PHP Version: 7.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hiker`
--

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

CREATE TABLE `card` (
  `card_ID` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `card_Number` int(19) NOT NULL,
  `cardholder_Name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zip` int(5) NOT NULL,
  `expiration_Date` date NOT NULL,
  `csv` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `card`
--

INSERT INTO `card` (`card_ID`, `email`, `card_Number`, `cardholder_Name`, `address`, `state`, `zip`, `expiration_Date`, `csv`) VALUES
(1, 'alexjayk@gmail.com', 2147483647, 'David Smith', '123 Mulholland Drive', 'UT', 81011, '2018-01-01', 123),
(2, 'alexjayk@gmail.com', 2147483647, 'Harry Potter', '5122 Privet Drive', 'TX', 29445, '2020-01-02', 436),
(3, 'alexjayk@gmail.com', 2147483647, 'Lucky Charms', '777 Lucky Road', 'AK', 28334, '2050-02-05', 684);

-- --------------------------------------------------------

--
-- Table structure for table `difficulty`
--

CREATE TABLE `difficulty` (
  `difficulty_ID` int(10) NOT NULL,
  `difficulty_rating` int(10) NOT NULL,
  `difficulty_Level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `difficulty`
--

INSERT INTO `difficulty` (`difficulty_ID`, `difficulty_rating`, `difficulty_Level`) VALUES
(1, 5, 'Expert'),
(2, 4, 'Advanced'),
(3, 3, 'Intermediate'),
(4, 2, 'Casual'),
(5, 1, 'Beginner');

-- --------------------------------------------------------

--
-- Table structure for table `local_area`
--

CREATE TABLE `local_area` (
  `local_area_ID` int(10) NOT NULL,
  `local_area_name` int(10) NOT NULL,
  `coordinates` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orderline`
--

CREATE TABLE `orderline` (
  `orderline_ID` int(10) NOT NULL,
  `order_ID` int(10) NOT NULL,
  `product_ID` int(10) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_ID` int(10) NOT NULL,
  `user_ID` int(10) NOT NULL,
  `card_ID` int(10) NOT NULL,
  `order_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `preferences`
--

CREATE TABLE `preferences` (
  `preference_ID` int(10) NOT NULL,
  `difficulty_ID` int(10) NOT NULL,
  `local_area_ID` int(10) NOT NULL,
  `user_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_ID` int(10) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_ID`, `product_name`, `product_price`) VALUES
(1, 'stickers', 10),
(2, 'tshirt', 20),
(3, 'Sweat Shirt', 40);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_ID` int(10) NOT NULL,
  `difficulty_ID` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `rating` int(10) NOT NULL,
  `review_text` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_ID`, `difficulty_ID`, `email`, `rating`, `review_text`) VALUES
(1, 1, 'alexkim.02@hotmail.com', 1, 'Difficulty Level 1 Beginner'),
(2, 2, 'alexkim.02@hotmail.com', 1, 'Difficulty Level 2 Casual'),
(3, 3, 'alexkim.02@hotmail.com', 1, 'Difficulty Level 3 Intermediate'),
(4, 4, 'alexkim.02@hotmail.com', 1, 'Difficulty Level 4 Advanced'),
(5, 5, 'alexkim.02@hotmail.com', 1, 'Difficulty Level 5 Expert'),
(6, 5, 'alexjayk@gmail.com', 4, 'Highland Park! A difficult climb for expert climbers. Very enjoyable'),
(7, 3, 'alexjayk@gmail.com', 3, 'Pilot Peak. A Decent Climb, but can get a little cold near the top. Bring a jacket!'),
(9, 4, 'alexjayk@gmail.com', 2, 'Brutal Peaks. A difficult journey, be sure that you train before you go on this hike.'),
(10, 2, 'alexjayk@gmail.com', 5, 'Bunny road. A fun and enjoyable hike over some sloping hills.'),
(11, 1, 'alexjayk@gmail.com', 1, 'Sloping canyon. A much too easy hike over what can barely be considered a hill.');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_ID` int(10) NOT NULL,
  `title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_ID`, `title`) VALUES
(1, 'user'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_ID` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_ID`, `email`, `fname`, `lname`, `password`, `role_id`) VALUES
(1, 'alexkim.02@hotmail.com', 'Alex', 'Kim', '123', 1),
(2, 'alexjayk@gmail.com', 'Alexander', 'Kim', '7815696ecbf1c96e6894b779456d330e', 1),
(3, 'hi@utah.edu', 'Hello', 'Sunshine', '81dc9bdb52d04dc20036dbd8313ed055', 1),
(4, '1234@utah.edu', 'Student', 'Example', 'd8578edf8458ce06fbc5bb76a58c5ca4', 1),
(5, 'Hello@yahoo.com', 'Guy', 'Richie', '698d51a19d8a121ce581499d7b701668', 1),
(6, 'Ocean@Hotmail.com', 'Frank', 'Ocean', '4eae18cf9e54a0f62b44176d074cbe2f', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`card_ID`);

--
-- Indexes for table `difficulty`
--
ALTER TABLE `difficulty`
  ADD PRIMARY KEY (`difficulty_ID`);

--
-- Indexes for table `local_area`
--
ALTER TABLE `local_area`
  ADD PRIMARY KEY (`local_area_ID`);

--
-- Indexes for table `orderline`
--
ALTER TABLE `orderline`
  ADD PRIMARY KEY (`orderline_ID`),
  ADD KEY `orderline_fk1` (`order_ID`),
  ADD KEY `orderline_fk2` (`product_ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_ID`),
  ADD KEY `orders_fk1` (`user_ID`),
  ADD KEY `orders_fk2` (`card_ID`);

--
-- Indexes for table `preferences`
--
ALTER TABLE `preferences`
  ADD PRIMARY KEY (`preference_ID`),
  ADD KEY `preference_fk1` (`difficulty_ID`),
  ADD KEY `preference_fk2` (`local_area_ID`),
  ADD KEY `preference_fk3` (`user_ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_ID`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_ID`),
  ADD KEY `review_fk1` (`difficulty_ID`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_ID`),
  ADD KEY `users_fk1` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `card`
--
ALTER TABLE `card`
  MODIFY `card_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `difficulty`
--
ALTER TABLE `difficulty`
  MODIFY `difficulty_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `local_area`
--
ALTER TABLE `local_area`
  MODIFY `local_area_ID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orderline`
--
ALTER TABLE `orderline`
  MODIFY `orderline_ID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_ID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `preferences`
--
ALTER TABLE `preferences`
  MODIFY `preference_ID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `orderline`
--
ALTER TABLE `orderline`
  ADD CONSTRAINT `orderline_fk1` FOREIGN KEY (`order_ID`) REFERENCES `orders` (`order_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `orderline_fk2` FOREIGN KEY (`product_ID`) REFERENCES `product` (`product_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_fk1` FOREIGN KEY (`user_ID`) REFERENCES `users` (`user_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_fk2` FOREIGN KEY (`card_ID`) REFERENCES `card` (`card_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `preferences`
--
ALTER TABLE `preferences`
  ADD CONSTRAINT `preference_fk1` FOREIGN KEY (`difficulty_ID`) REFERENCES `difficulty` (`difficulty_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `preference_fk2` FOREIGN KEY (`local_area_ID`) REFERENCES `local_area` (`local_area_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `preference_fk3` FOREIGN KEY (`user_ID`) REFERENCES `users` (`user_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `review_fk1` FOREIGN KEY (`difficulty_ID`) REFERENCES `difficulty` (`difficulty_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_fk1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_ID`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

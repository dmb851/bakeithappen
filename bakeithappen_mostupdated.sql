-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2020 at 11:46 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bakeithappen`
--

-- --------------------------------------------------------

--
-- Table structure for table `ingredient`
--

CREATE TABLE `ingredient` (
  `inID` int(11) NOT NULL,
  `inName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ingredient`
--

INSERT INTO `ingredient` (`inID`, `inName`) VALUES
(1, 'rice'),
(2, 'broccoli'),
(3, 'chicken'),
(4, 'teriyaki'),
(5, 'jelly'),
(6, 'bread'),
(7, 'peanut butter'),
(8, 'tortilla chips'),
(9, 'cheese'),
(10, 'jalapenos'),
(13, 'apples'),
(15, 'koolaid,\r\nsugar,\r\nwater');

-- --------------------------------------------------------

--
-- Table structure for table `recipe`
--

CREATE TABLE `recipe` (
  `recID` int(11) NOT NULL,
  `recName` varchar(255) DEFAULT NULL,
  `recInstruct` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recipe`
--

INSERT INTO `recipe` (`recID`, `recName`, `recInstruct`) VALUES
(1, 'chicken teriyaki', 'Cook 1lb rice in instant pot, steam broccoli, lightly coat and fry chicken in teriyaki sauce, combine and serve'),
(2, 'Peanut Butter and Jelly', 'Spread Peanut Butter on one slice of bread, Spread Jelly on the other slice, Put slices together, Cut sandwich diagonally, Serve with milk'),
(5, 'chicken nachos', 'sprinkle cheese and chicken over tortilla chips, microwave until cheese melts. Serve with jalapenos. '),
(9, 'applesauce', 'Mash apples until a smooth.'),
(10, 'applesauce', 'Mash apples until a smooth.'),
(13, 'kool-aid', 'Mix koolaid sugar and water together into a pitcher. Enjoy.');

-- --------------------------------------------------------

--
-- Table structure for table `recipe_ingredient`
--

CREATE TABLE `recipe_ingredient` (
  `riID` int(11) NOT NULL,
  `inID` int(11) DEFAULT NULL,
  `recID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recipe_ingredient`
--

INSERT INTO `recipe_ingredient` (`riID`, `inID`, `recID`) VALUES
(1, 3, 1),
(2, 4, 1),
(3, 7, 2),
(4, 6, 2),
(5, 5, 2),
(6, 9, 5),
(7, 3, 5),
(8, 10, 5),
(9, 1, 1),
(10, 2, 1),
(13, 13, 9),
(15, 15, 13);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(32) NOT NULL,
  `signUpDate` datetime NOT NULL,
  `profilePic` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `firstName`, `lastName`, `email`, `password`, `signUpDate`, `profilePic`) VALUES
(5, 'bartman', 'Bart', 'Simpson', 'Evil@hell.com', '1bbd886460827015e5d605ed44252251', '2020-11-12 00:00:00', 'assets/images/profile-pics/no-image.jpg'),
(6, 'bartman', 'Bart', 'Simpson', 'Bart@gmail.com', '79b7cdcd14db14e9cb498f1793817d69', '2020-11-12 00:00:00', 'assets/images/profile-pics/no-image.jpg'),
(7, 'b1a5ph3mr', 'Bart', 'Simpson', 'Evil1@hell.com', 'f379eaf3c831b04de153469d1bec345e', '2020-11-17 00:00:00', 'assets/images/profile-pics/no-image.jpg'),
(8, 'johndoe', 'John', 'Bob', 'Johnbob@gmail.com', '7cb044a07c642f0e254c8a0990a909a8', '2020-11-18 00:00:00', 'assets/images/profile-pics/no-image.jpg'),
(9, 'joenothing', 'Joe', 'Nothing', 'Joe@gmail.com', '172eee54aa664e9dd0536b063796e54e', '2020-11-29 00:00:00', 'images/'),
(10, 'adminadmin', 'Admin', 'Admin', 'Admin@admin.com', '0192023a7bbd73250516f069df18b500', '2020-11-29 00:00:00', 'images/'),
(11, 'testtest', 'Test', 'Testing', 'Test@test.com', 'cc03e747a6afbbcbf8be7668acfebee5', '2020-11-29 00:00:00', 'images/');

-- --------------------------------------------------------

--
-- Table structure for table `user_recipes`
--

CREATE TABLE `user_recipes` (
  `ur_id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `recID` int(11) DEFAULT NULL,
  `recName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_recipes`
--

INSERT INTO `user_recipes` (`ur_id`, `username`, `recID`, `recName`) VALUES
(1, 'johndoe', 2, 'Peanut Butter and Jelly'),
(2, 'johndoe', 1, 'chicken teriyaki'),
(6, 'adminadmin', 9, 'applesauce'),
(7, 'testtest', 13, 'kool-aid');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ingredient`
--
ALTER TABLE `ingredient`
  ADD PRIMARY KEY (`inID`);

--
-- Indexes for table `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`recID`),
  ADD KEY `recName` (`recName`);

--
-- Indexes for table `recipe_ingredient`
--
ALTER TABLE `recipe_ingredient`
  ADD PRIMARY KEY (`riID`),
  ADD KEY `inID` (`inID`),
  ADD KEY `recID` (`recID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_recipes`
--
ALTER TABLE `user_recipes`
  ADD PRIMARY KEY (`ur_id`),
  ADD KEY `username` (`username`),
  ADD KEY `recID` (`recID`),
  ADD KEY `recName` (`recName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ingredient`
--
ALTER TABLE `ingredient`
  MODIFY `inID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `recipe`
--
ALTER TABLE `recipe`
  MODIFY `recID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `recipe_ingredient`
--
ALTER TABLE `recipe_ingredient`
  MODIFY `riID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_recipes`
--
ALTER TABLE `user_recipes`
  MODIFY `ur_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `recipe_ingredient`
--
ALTER TABLE `recipe_ingredient`
  ADD CONSTRAINT `recipe_ingredient_ibfk_1` FOREIGN KEY (`inID`) REFERENCES `ingredient` (`inID`),
  ADD CONSTRAINT `recipe_ingredient_ibfk_2` FOREIGN KEY (`recID`) REFERENCES `recipe` (`recID`);

--
-- Constraints for table `user_recipes`
--
ALTER TABLE `user_recipes`
  ADD CONSTRAINT `FK_ur3` FOREIGN KEY (`recName`) REFERENCES `recipe` (`recName`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

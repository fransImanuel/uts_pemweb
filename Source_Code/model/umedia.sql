-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2020 at 02:16 AM
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
-- Database: `umedia`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `PostID` int(11) NOT NULL,
  `CommentID` int(11) NOT NULL,
  `Commentator` int(11) DEFAULT NULL,
  `Text` longtext DEFAULT NULL,
  `CommentDate` date DEFAULT NULL,
  `CommentTime` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`PostID`, `CommentID`, `Commentator`, `Text`, `CommentDate`, `CommentTime`) VALUES
(1, 1, 2, 'Thank You :)', '2020-03-24', '08:17:42'),
(1, 2, 5, 'Your Welcome :D', '2020-03-24', '08:33:58'),
(1, 3, 6, 'Thank you bro :v', '2020-03-24', '08:54:47'),
(2, 4, 6, 'coba wkwkwkw', '2020-03-24', '08:55:04');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `UserID` int(11) NOT NULL,
  `PostID` int(11) NOT NULL,
  `ImgContent` varchar(255) DEFAULT NULL,
  `Content` longtext DEFAULT NULL,
  `PostDate` date DEFAULT NULL,
  `PostTime` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`UserID`, `PostID`, `ImgContent`, `Content`, `PostDate`, `PostTime`) VALUES
(2, 1, '5e79c203656b8.png', 'Hello Everyone.. This is Our MidTerm Project, Id Like to ask you to post your opinion about this website including design, complexity and other things about this website, Your opinion Will be very helpful || Developer without Feedback will never become a good one ~ Thank You :)', '2020-03-24', '08:17:07'),
(5, 2, NULL, 'This Is Amazing Website, Very Creative', '2020-03-24', '08:34:36'),
(6, 3, NULL, 'Thank You ', '2020-03-24', '08:55:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `FirstName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `LastName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NickName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Birthday` date DEFAULT NULL,
  `Gender` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `BG_IMG` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Profile` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `FirstName`, `LastName`, `NickName`, `Email`, `Birthday`, `Gender`, `Password`, `Salt`, `BG_IMG`, `Profile`) VALUES
(1, 'Alexander Moya', 'Hin', 'Alexander Moya Hin', 'amhpouu@gmail.com', '2001-08-18', 'M', 'cd2f86028948638f371d4f19484f1888', 'exander Moyan', 'BGDef.png', 'default-profile.svg'),
(2, 'Frans', 'Imanuel', 'Frans Imanuel', 'fransimanuel@gmail.com', '2000-12-12', 'M', '3e928d4c23d4eaf709f2fff478e9d57f', 'ansanuel', '5e79c33599040.png', '5e79c3109f397.jpg'),
(3, 'Alexander', 'Moya', 'Alexander Moya', 'alexandermoya@gmail.com', '1999-12-12', 'F', 'a2f9d59ece1634967e133ad7a6eb3e7f', 'exanderya', 'BGDef.png', 'default-profile.svg'),
(4, 'alexander Moya', 'Hin', 'alexander Moya Hin', 'alexandermoya1@gmail.com', '1970-12-03', 'M', 'b73e6139d3931368681288c978455c06', 'exander Moyan', 'BGDef.png', 'default-profile.svg'),
(5, 'Juan', 'Daniel', 'Juan Daniel', 'juandaniel@gmail.com', '2000-12-12', 'F', '45dee6525e875ce1bb0590b02ad33a6f', 'anniel', '5e79c65e5f7a3.png', '5e79c65e5f718.png'),
(6, 'Frans', 'Imanuel', 'FImanuel', 'fransimanuel1@gmail.com', '2000-10-10', 'M', '6ea6fe09c926461743235d9b7e5be148', 'ans', '5e79caa4567ca.jpg', '5e79caa456708.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`CommentID`,`PostID`),
  ADD KEY `PostID` (`PostID`),
  ADD KEY `Commentator` (`Commentator`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`PostID`,`UserID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `CommentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `PostID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`PostID`) REFERENCES `posts` (`PostID`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`Commentator`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2024 at 09:33 AM
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
-- Database: `smartmind`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminId` int(11) NOT NULL,
  `adminFirstName` varchar(255) NOT NULL,
  `adminLastName` varchar(255) NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `adminPassword` varchar(255) NOT NULL,
  `accountCreationDateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `adminFirstName`, `adminLastName`, `adminEmail`, `adminPassword`, `accountCreationDateTime`) VALUES
(2, 'Rushikesh', 'Ghodke', 'rushighodke01@gmail.com', '@Rushi19', '2024-02-14 22:22:06');

-- --------------------------------------------------------

--
-- Table structure for table `attempted_quiz`
--

CREATE TABLE `attempted_quiz` (
  `id` int(11) NOT NULL,
  `studentId` int(11) NOT NULL,
  `quiz_topic_name` varchar(255) NOT NULL,
  `time_taken` varchar(100) NOT NULL,
  `rating` varchar(100) NOT NULL,
  `score` int(11) NOT NULL,
  `result` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `changepasswordtoken`
--

CREATE TABLE `changepasswordtoken` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `verificationToken` varchar(100) NOT NULL,
  `tokenExpirationTime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `changepasswordtoken`
--

INSERT INTO `changepasswordtoken` (`id`, `student_id`, `verificationToken`, `tokenExpirationTime`) VALUES
(1, 2, '65cd8101b338b', '2024-02-15 08:47:01');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_questions`
--

CREATE TABLE `quiz_questions` (
  `id` int(11) NOT NULL,
  `topic_unique_id` varchar(15) NOT NULL,
  `topic_name` varchar(255) NOT NULL,
  `question` varchar(255) NOT NULL,
  `option1` varchar(255) NOT NULL,
  `option2` varchar(255) NOT NULL,
  `option3` varchar(255) NOT NULL,
  `option4` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `marks` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quiz_questions`
--

INSERT INTO `quiz_questions` (`id`, `topic_unique_id`, `topic_name`, `question`, `option1`, `option2`, `option3`, `option4`, `answer`, `marks`) VALUES
(1, 'HqHz4Vh!C:oR', 'Html', 'What is Html?', 'Programming Language', 'Markup Language', 'OOPs', 'None of above', 'Markup Language', '2'),
(2, 'MEq0|5NZcm5g', 'JavaScript', 'What is JavaScript?', 'Programming Language', 'Markup Language', 'OOPs', 'Both A and C', 'Both A and C', '2'),
(3, 'HqHz4Vh!C:oR', 'Html', 'What is the full form of HTML', 'HyperTension Mobile Language', 'HyperText Markup Language', 'HyperTransport Markup Language', 'None of above', 'HyperText Markup Language', '2'),
(4, 'HqHz4Vh!C:oR', 'Html', 'ferfw', 'fws', 'rwgfrwg', 'rgwgfv', 'wrfgv', 'wrgfvwr', '2'),
(5, 'HqHz4Vh!C:oR', 'Html', 'wsgfw', 'wrgrwg', 'wrgv', 'gv', 'rgv', 'rwrfgrwg', 'wrg'),
(6, 'HqHz4Vh!C:oR', 'Html', 'efw', 'efwq', 'frwq', 'wefe', 'wefw', 'efwq', '2'),
(7, 'HqHz4Vh!C:oR', 'Html', 'q3', 'qerfq', 'qe3', 'qrfe3', 'safre', 'wefwf', '2'),
(8, 'HqHz4Vh!C:oR', 'Html', 'wef', 'wregfrew', 'weer', 'werfger', 'wfgf', 'wfw', '2'),
(9, 'MEq0|5NZcm5g', 'JavaScript', 'djsjfs', 'djnsj', 'sgsjgu', 'sgnsjkgs', 'khkgwg', 'whgw', '2'),
(10, 'HqHz4Vh!C:oR', 'Html', 'ewfw', 'wrgg', 'wrgr', 'wrgr', 'wrg', 'wrgr', '2'),
(11, 'MEq0|5NZcm5g', 'JavaScript', 'wrgr', 'wrgrwg', 'wrg', 'wrgg', 'wrg', 'wr', '2'),
(12, 'MEq0|5NZcm5g', 'JavaScript', 'wqe', 'wefe', 'wqef', 'wefwe', 'wef', 'weff', 'wefef');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_topics`
--

CREATE TABLE `quiz_topics` (
  `topic_id` int(11) NOT NULL,
  `topicUniqueId` varchar(50) NOT NULL,
  `topic_name` varchar(255) NOT NULL,
  `questions` varchar(100) NOT NULL,
  `marks` varchar(50) NOT NULL,
  `quiz_time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quiz_topics`
--

INSERT INTO `quiz_topics` (`topic_id`, `topicUniqueId`, `topic_name`, `questions`, `marks`, `quiz_time`) VALUES
(1, 'HqHz4Vh!C:oR', 'Html', '8', '14', ''),
(2, 'MEq0|5NZcm5g', 'JavaScript', '4', '6', ''),
(6, 'X[GDX}kM@NN[', 'Java', '', '', ''),
(7, ']dexdnDDo]<{', 'Python', '', '', ''),
(8, 'GyeBXSDF768p', 'Php', '', '', ''),
(9, 'HiA9NFU@nN%3', 'CSS', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `studentId` int(11) NOT NULL,
  `studentUniqueId` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `dateOfBirth` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobileNumber` varchar(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `studentImage` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `accountCreationDateTime` datetime NOT NULL,
  `verificationToken` varchar(255) NOT NULL,
  `tokenExpirationTime` datetime DEFAULT NULL,
  `isVerified` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`studentId`, `studentUniqueId`, `firstName`, `lastName`, `dateOfBirth`, `gender`, `email`, `mobileNumber`, `username`, `studentImage`, `password`, `accountCreationDateTime`, `verificationToken`, `tokenExpirationTime`, `isVerified`) VALUES
(1, 982337, 'Rushikesh', 'Ghodke', '2001-09-19', 'male', 'rushighodke01@gmail.com', '9082600331', 'rushi_19', 'IMG_20210917_210850_999.webp', '$2y$10$VwaeIiMwkW1cwP9SjQeKwOsjvEIq7ePk6BNd8mNinWKRmVgsLPHb2', '2024-02-14 21:13:19', '65ccdf972572c', '2024-02-14 21:18:19', 1),
(2, 796104, 'Saurabh', 'Jadhav', '2003-09-28', 'male', 'saurabhjadhav9642@gmail.com', '8421569642', 'saurabhJ28', 'saurabhjadhav.jpg', '$2y$10$R6YUkjnM9rOxljl8kkrKs.YNxpz7OSlKRxeOdxmsx2TQlBYKZ5pPq', '2024-02-15 08:39:03', '65cd804f92b4d', '2024-02-15 08:44:03', 1),
(3, 505792, 'Prathamesh', 'Khandagale', '2003-12-03', 'male', 'khandagaleprathamesh5@gmail.com', '8855842906', 'prathameshkhandagale258', '', '$2y$10$fnug4EaYzrmTX6B08Jd0Ie69ft/SqCcpwjc0HvamfYsRqDM1xhm1a', '2024-02-15 08:53:27', '65cd83afaed1b', '2024-02-15 08:58:27', 1),
(7, 417385, 'Rushikesh', 'Ghodke', '2001-09-19', 'male', 'rushi.ghodke09@gmail.com', '7485968574', 'rushikeshghodke102', '', '$2y$10$reL0P0aFgGuMSF070wjBZurRSr8E9VUSEBAZG/MwZfxQixDcakXDi', '2024-02-15 19:29:54', '65ce18da01a57', '2024-02-15 19:34:54', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `attempted_quiz`
--
ALTER TABLE `attempted_quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `changepasswordtoken`
--
ALTER TABLE `changepasswordtoken`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_topics`
--
ALTER TABLE `quiz_topics`
  ADD PRIMARY KEY (`topic_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`studentId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `attempted_quiz`
--
ALTER TABLE `attempted_quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `changepasswordtoken`
--
ALTER TABLE `changepasswordtoken`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `quiz_topics`
--
ALTER TABLE `quiz_topics`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `studentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

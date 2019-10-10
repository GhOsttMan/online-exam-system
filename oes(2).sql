-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2018 at 06:28 PM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oes`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `qid` int(11) NOT NULL,
  `subcode` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `examtype` varchar(255) NOT NULL,
  `ques` varchar(255) NOT NULL,
  `ans` varchar(255) NOT NULL,
  `roll` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`qid`, `subcode`, `year`, `examtype`, `ques`, `ans`, `roll`) VALUES
(1, 'CSE1101', 2015, 'First Mid', 'what is the difference between c and c++?', 'janina ', '16CSE006'),
(2, 'CSE1101', 2015, 'First Mid', 'what do you understand by structured language?', 'nothing!', '16CSE006'),
(3, 'CSE1101', 2015, 'First Mid', 'why c is called a middle level language? explain.', 'borolok na tai!', '16CSE006'),
(4, 'CSE1101', 2015, 'First Mid', 'differentiate between built-in function and user define function?', 'pori nai', '16CSE006'),
(5, 'CSE1101', 2015, 'First Mid', 'what is main function?', 'janina', '16CSE006');

-- --------------------------------------------------------

--
-- Table structure for table `exadb`
--

CREATE TABLE `exadb` (
  `id` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `subcode` varchar(255) NOT NULL,
  `img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exadb`
--

INSERT INTO `exadb` (`id`, `pass`, `name`, `position`, `email`, `contact`, `subcode`, `img`) VALUES
('examine1', '123456', 'Md. Samsuddoha', 'FIRST EXAMINE', 'sams.csebu@gmail.com ', '01737349075', 'CSE1101', 'pic/demo.jpg'),
('examine2', '123456', 'Md. Erfan', 'SECOND EXAMINE', 'irfan.bucse@gmail.com', '01799598455', 'CSE1101', 'pic/demo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `roll` varchar(255) NOT NULL,
  `examinetype` varchar(255) NOT NULL,
  `mark` double NOT NULL,
  `subcode` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `examtype` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`roll`, `examinetype`, `mark`, `subcode`, `year`, `examtype`) VALUES
('16CSE006', 'examineone', 10, 'CSE1101', 2015, 'First Mid'),
('16CSE006', 'examinetwo', 9, 'CSE1101', 2015, 'First Mid');

-- --------------------------------------------------------

--
-- Table structure for table `moddb`
--

CREATE TABLE `moddb` (
  `id` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `subcode` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `moddb`
--

INSERT INTO `moddb` (`id`, `pass`, `name`, `subcode`, `email`, `contact`, `position`, `img`) VALUES
('moderator1', '123456', 'Rahat Hossain Faisal', 'CSE1101', 'rhfaisal@gmail.com', '+8801733977761', 'MODERATOR', 'pic/demo2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `moderate`
--

CREATE TABLE `moderate` (
  `qid` int(11) NOT NULL,
  `subcode` varchar(255) NOT NULL,
  `examtype` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `question` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `moderate`
--

INSERT INTO `moderate` (`qid`, `subcode`, `examtype`, `year`, `question`) VALUES
(1, 'CSE1101', 'First Mid', 2015, 'what is the difference between c and c++?'),
(2, 'CSE1101', 'First Mid', 2015, 'what do you understand by structured language?'),
(3, 'CSE1101', 'First Mid', 2015, 'why c is called a middle level language? explain.'),
(4, 'CSE1101', 'First Mid', 2015, 'differentiate between built-in function and user define function?'),
(5, 'CSE1101', 'First Mid', 2015, 'what is main function?');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `qid` int(11) NOT NULL,
  `subcode` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `examtype` varchar(255) NOT NULL,
  `examine` varchar(255) NOT NULL,
  `ques` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`qid`, `subcode`, `year`, `examtype`, `examine`, `ques`) VALUES
(1, 'CSE1101', 2015, 'First Mid', 'examineone', 'what is the difference between c and c++?'),
(2, 'CSE1101', 2015, 'First Mid', 'examineone', 'what is OOP ?'),
(3, 'CSE1101', 2015, 'First Mid', 'examineone', 'what do you understand by structured language?'),
(4, 'CSE1101', 2015, 'First Mid', 'examineone', 'what is keyword?'),
(5, 'CSE1101', 2015, 'First Mid', 'examineone', 'why c is called a middle level language? explain.'),
(1, 'CSE1101', 2015, 'First Mid', 'examinetwo', 'What is pointer?'),
(2, 'CSE1101', 2015, 'First Mid', 'examinetwo', 'What is the difference between structure and union?'),
(3, 'CSE1101', 2015, 'First Mid', 'examinetwo', 'differentiate between built-in function and user define function?'),
(4, 'CSE1101', 2015, 'First Mid', 'examinetwo', 'what is the use of array?'),
(5, 'CSE1101', 2015, 'First Mid', 'examinetwo', 'what is main function?');

-- --------------------------------------------------------

--
-- Table structure for table `studb`
--

CREATE TABLE `studb` (
  `id` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `session` varchar(255) NOT NULL,
  `roll` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studb`
--

INSERT INTO `studb` (`id`, `pass`, `name`, `session`, `roll`, `email`, `contact`, `img`) VALUES
('16CSE006', '16cse006', 'Abu Saem Md Shefatullah', '2015-16', '16CSE006', 'saem.cse3.bu@gmail.com', '01985079500', 'pic/sft.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

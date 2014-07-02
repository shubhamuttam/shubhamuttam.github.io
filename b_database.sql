-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2014 at 03:26 PM
-- Server version: 5.5.36
-- PHP Version: 5.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `b_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `commentpic` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `pid`, `username`, `comment`, `filename`, `commentpic`) VALUES
(1, 1, 'shubh', 'hehfew', 'uploads/shubh12046.jpg', 'uploads/shubh2013-09-01 00.10.17.jpg'),
(23, 8, 'shubh', 'q;de', 'uploads/shubh12046.jpg', 'uploads/shubhdaytona-955i-wallpapers_10442_1280x1024.jpg'),
(24, 9, 'blog', 'bbjn', 'uploads/blog2010-audi-r8-gt-front-wallpapers_20020_1024x768.jpg', 'none'),
(25, 8, 'blog', 'nmnk', 'uploads/blog2010-audi-r8-gt-front-wallpapers_20020_1024x768.jpg', 'none'),
(26, 9, 'blog', 'nlknm;m;', 'uploads/blog2010-audi-r8-gt-front-wallpapers_20020_1024x768.jpg', 'none');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `post` varchar(500) NOT NULL,
  `type` varchar(10) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `posti` int(11) NOT NULL,
  `postf` int(11) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`pid`, `username`, `post`, `type`, `filename`, `posti`, `postf`) VALUES
(1, '', '', '', '', 0, 8),
(8, 'shubh', 'dknfnf', 'admin', 'none', 0, 0),
(9, 'shubh', 'nlhlhohoojj ibhohjoj', 'admin', 'uploads/shubh20140619_201504enle.jpg', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `type` varchar(10) NOT NULL,
  `filename` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `fullname`, `gender`, `email`, `type`, `filename`) VALUES
(1, 'shubh', '32250170a0dca92d53ec9624f336ca24', 'uttam', 'male', 'uttam.shubham@gmail.com', 'admin', 'uploads/shubh12046.jpg'),
(6, 'blog', '32250170a0dca92d53ec9624f336ca24', 'blog', 'female', 'uttam.shubham@gmail.com', 'user', 'uploads/blog2010-audi-r8-gt-front-wallpapers_20020_1024x768.jpg'),
(9, 'shaj', '32250170a0dca92d53ec9624f336ca24', 'shubham', 'male', 'uttam.shubham@gmail.com', 'admin', 'uploads/shajaudi-q7-on-stage-wallpapers_1052_1024.jpg'),
(10, 'shab', '32250170a0dca92d53ec9624f336ca24', 'shab', 'male', 'uttam.shubham@gmail.com', 'user', 'uploads/shabAudi_Screen_Saver-5644.jpg'),
(11, 'dell', '32250170a0dca92d53ec9624f336ca24', 'dell', 'male', 'uttam.shubham@gmail.com', 'user', 'uploads/dellkawasaki-250f-wallpapers_14621_1280x1024.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

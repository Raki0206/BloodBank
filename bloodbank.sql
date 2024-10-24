-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2023 at 08:09 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bloodbank`
--

-- --------------------------------------------------------

--


--


--
-- Table structure for table `bloodgroup`
--

CREATE TABLE `bloodgroup` (
  `bg_id` int(100) NOT NULL,
  `bg_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bloodgroup`
--

INSERT INTO `bloodgroup` (`bg_id`, `bg_name`) VALUES
(1, 'A+'),
(2, 'A-'),
(3, 'B+'),
(4, 'B-'),
(5, 'O+'),
(6, 'O-'),
(7, 'AB+'),
(8, 'AB-');

-- --------------------------------------------------------

--
-- Table structure for table `camp`
--

CREATE TABLE `camp` (
  `camp_id` int(100) NOT NULL,
  `camp_title` varchar(500) NOT NULL,
  `organised_by` varchar(500) NOT NULL,
  `state` int(100) NOT NULL,
  `city` int(100) NOT NULL,
  `pic` varchar(900) NOT NULL,
  `detail` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `camp`
--

INSERT INTO `camp` (`camp_id`, `camp_title`, `organised_by`, `state`, `city`, `pic`, `detail`) VALUES
(1, 'Puducherry Technological University', 'Puducherry Technological University', 1, 1, 'blood_donation_camp.jpg', 'A Blood Donation Camp at Puducherry Technological University organized by Puducherry Technological University ,Puducherry.'),
(7, 'Idhaya College', 'Idhaya College', 1, 7, 'B.D camp 034.jpg', 'A Blood Donation Camp at Idhaya College organized by Idhaya College , Lawspet.'),
(8, 'Indhira Gandhi Medical College', 'Indhira Gandhi Medical College', 1, 2, 'p36.jpg', 'A Blood Donation Camp at Indhira Gandhi Medical College organized by Indhira Gandhi Medical College, Kathirkamam.'),
(9, 'Pondicherry University', 'Human Welfare Society', 1, 1, 'p38_2.jpg', 'A Blood Donation Camp at Pondicherry University, organized by Human Welfare Society, Kalapet.\r\n ');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(100) NOT NULL,
  `city_name` varchar(100) NOT NULL,
  `pin_code` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `state` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `city_name`, `pin_code`, `district`, `state`) VALUES
(1, 'Kalapet', '605010', 'Kalapet', 1),
(2, 'Kathirkamam', '605009', 'Kathirkamam', 1),
(3, 'Lawspet', '605011', 'Lawspet', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `row_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `subj` varchar(700) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`row_id`, `name`, `email`, `mobile`, `subj`) VALUES
(1, 'nannu', 'bawa12@ymail.com', '98889619909', 'save life'),
(2, 'manu', 'manukaler@yahoo.com', '9888889765', 'save life'),
(3, 'neeru', 'neeru45@gmail.com', '9463958058', 'give blooooooood'),
(4, 'paras', 'bhatia34@gmail.com', '9216291294', 'save life'),
(10, 'herry', 'herry@ymaol.com', '8790675438', 'give me a blood'),
(14, 'Haripriya', 'haripriya.112003@gmail.com', '08608036495', 'testing');

-- --------------------------------------------------------

--
-- Table structure for table `donarregistration`
--

CREATE TABLE `donarregistration` (
  `donar_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `age` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `b_id` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pwd` varchar(100) NOT NULL,
  `pic` varchar(1000) NOT NULL,
  `medical_certificate` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donarregistration`
--

INSERT INTO `donarregistration` (`donar_id`, `name`, `gender`, `age`, `mobile`, `b_id`, `email`, `pwd`, `pic`, `medical_certificate`) VALUES
(1, 'Rajesh', 'Male', '19', '9025256102', '3', 'rajesh.r1045@pec.edu', 'raki', 'Flow Dia.jpg', 'SRS.pdf'),
(2, 'Haripriya ', 'Female', '20', '8608036495', '1', 'haripriya.112003@gmail.com', '1102', 'Donor Dia.jpg', 'blood.pdf'),
(3, 'GOVARTHINI', 'Female', '20', '08940569769', '3', 'krishna.govarthini@pec.edu', 'krish', '2c3a3c984aa01bd3c212dc54d75a9833.jpg', '2-Step Verification Code gmail.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE `donation` (
  `donation_id` int(100) NOT NULL,
  `camp_id` int(100) NOT NULL,
  `ddate` datetime NOT NULL,
  `units` int(100) NOT NULL,
  `detail` varchar(800) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donation`
--

INSERT INTO `donation` (`donation_id`, `camp_id`, `ddate`, `units`, `detail`, `email`) VALUES
(28, 1, '2014-09-14 00:00:00', 20, 'A Blood Donation Camp at Ramgarhia Engg Collage organized by Ramgarhia consial , Phagwara.', 'parasbhatia08@gmail.com'),
(29, 7, '2015-05-11 00:00:00', 30, 'A Blood Donation Camp at Lovely Professional University organized by Lovely Professional University , Jalandhar.', 'parasbhatia08@gmail.com'),
(30, 8, '2014-11-04 00:00:00', 25, 'A Blood Donation Camp at G.N.C College, Phagwara organized by Lions Club, Phagwara.', 'parasbhatia08@gmail.com'),
(31, 9, '2014-12-18 00:00:00', 22, 'A Blood Donation Camp at Apee-Jay College, Jalandhar organized by Human Welfare Society, Jalandhar.\r\n ', 'parasbhatia08@gmail.com'),
(32, 7, '2010-06-19 00:00:00', 27, 'A Blood Donation Camp at Lovely Professional Unive...', 'preet22@yahoo.com'),
(33, 8, '2010-08-20 00:00:00', 17, 'save life', 'manpreetkaler@yahoo.com'),
(34, 9, '2009-06-05 00:00:00', 10, 'give blood', 'manpreetkaler@yahoo.com'),
(35, 1, '2012-09-13 00:00:00', 22, 'save life', 'sahildubey@gmail.com'),
(36, 9, '0000-00-00 00:00:00', 444, 'kjj', 'neeru.bawa@yahoo.com'),
(37, 1, '2023-02-11 00:00:00', 1, '', 'neeru.bawa@yahoo.com'),
(38, 1, '2023-03-21 23:15:32', 2, '', 'rajesh.r1045@pec.edu'),
(39, 8, '2023-03-02 00:00:00', 2, '', 'haripriya.112003@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `donors`
--

CREATE TABLE `donors` (
  `donar_id` int(100) NOT NULL,
  `name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `gender` varchar(100) CHARACTER SET latin1 NOT NULL,
  `age` varchar(100) CHARACTER SET latin1 NOT NULL,
  `mobile` varchar(100) CHARACTER SET latin1 NOT NULL,
  `b_id` varchar(100) NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 NOT NULL,
  `pwd` varchar(100) CHARACTER SET latin1 NOT NULL,
  `pic` varchar(1000) CHARACTER SET latin1 NOT NULL,
  `medical_certificate` varchar(1000) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gallary`
--

CREATE TABLE `gallary` (
  `camp_id` int(100) NOT NULL,
  `pic_id` int(100) NOT NULL,
  `title` varchar(400) NOT NULL,
  `pic` varchar(800) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallary`
--

INSERT INTO `gallary` (`camp_id`, `pic_id`, `title`, `pic`) VALUES
(9, 15, 'pic 1', 'p48_2.jpg'),
(9, 16, 'pic 2', 'p11 (1).jpg'),
(9, 17, 'pic 3', 'p141.jpg'),
(9, 18, 'pic 5', 'p177_2.jpg'),
(9, 19, 'pic 6', 'p279.jpg'),
(8, 20, 'pic 8', 'p246.jpg'),
(9, 21, 'pic 9', 'p82.jpg'),
(7, 22, 'pic 2', 'p82.jpg'),
(7, 23, 'pic 3', 'p93.jpg'),
(7, 24, 'pic 6', 'p148.jpg'),
(7, 25, 'pic 7', 'pamrik@ymail.com1 (2).jpg'),
(7, 26, 'pic 8', 'slider4.jpg'),
(7, 27, 'pic 9', 'slider7.jpg'),
(1, 28, 'pic 2', 'slider8.jpg'),
(1, 29, 'pic 3', 'slider3.jpg'),
(1, 30, 'pic 4', 'donation.jpg'),
(1, 31, 'pic 3', 'Blood-Donation2.jpg'),
(1, 32, 'pic 4', 'blood-donation-.jpg'),
(1, 33, 'pic 6', 'blood-donation.jpg'),
(8, 34, 'pic 1', 'resizedBlood donation (1).jpg'),
(8, 35, 'pic 2', 'Blood-donation-camp.jpg'),
(8, 36, 'pic 4', '3.jpg'),
(8, 37, 'pic 5', '4.jpg'),
(8, 38, 'pic 7', '5.jpg');

-- --------------------------------------------------------

--


--


-- --------------------------------------------------------

--
-- Table structure for table `requestes`
--

CREATE TABLE `requestes` (
  `req_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `age` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `bgroup` varchar(100) NOT NULL,
  `reqdate` datetime NOT NULL,
  `detail` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requestes`
--

INSERT INTO `requestes` (`req_id`, `name`, `gender`, `age`, `mobile`, `email`, `bgroup`, `reqdate`, `detail`) VALUES
(7, 'balwant singh', 'male', '22', '8427420298', 'balwant11@gmail.com', 'A+', '2015-01-15 00:00:00', 'save life'),
(8, 'japleen', 'female', '22', '9216291294', 'jsimran08@gmail.com', 'B-\r\n', '2014-01-12 00:00:00', 'save life'),
(9, 'Naresh', 'female', '21', '8427420291', 'nareshheer719@gmail.com', 'AB+', '2015-01-18 00:00:00', 'save life'),
(10, 'Taran', 'male', '55', '7589325050', 'taran@ymail.com', 'O-', '2012-01-29 00:00:00', ''),
(11, 'Haripriya', 'Female', '20', '8608036495', 'haripriya.112003@gmail.com', '5', '2023-04-09 00:00:00', 'Testing');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `state_id` int(100) NOT NULL,
  `state_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`state_id`, `state_name`) VALUES
(1, 'Puducherry'),
(2, 'Delhi'),
(3, 'Andhra Pradesh'),
(4, 'Bihar'),
(5, 'Assam');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(100) NOT NULL,
  `pwd` varchar(100) NOT NULL,
  `typeofuser` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `pwd`, `typeofuser`) VALUES
('Haripriya', 'hari1102', 'Admin'),
('Rajesh', 'raki', 'Admin');

--
-- Indexes for dumped tables
--

--



--
-- Indexes for table `bloodgroup`
--
ALTER TABLE `bloodgroup`
  ADD PRIMARY KEY (`bg_id`);

--
-- Indexes for table `camp`
--
ALTER TABLE `camp`
  ADD PRIMARY KEY (`camp_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`row_id`);

--
-- Indexes for table `donarregistration`
--
ALTER TABLE `donarregistration`
  ADD PRIMARY KEY (`donar_id`);

--
-- Indexes for table `donation`
--
ALTER TABLE `donation`
  ADD PRIMARY KEY (`donation_id`);

--
-- Indexes for table `donors`
--
ALTER TABLE `donors`
  ADD PRIMARY KEY (`donar_id`);

--
-- Indexes for table `gallary`
--
ALTER TABLE `gallary`
  ADD PRIMARY KEY (`pic_id`);

--


--
-- Indexes for table `requestes`
--
ALTER TABLE `requestes`
  ADD PRIMARY KEY (`req_id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`state_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--


--
-- AUTO_INCREMENT for table `bloodgroup`
--
ALTER TABLE `bloodgroup`
  MODIFY `bg_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `camp`
--
ALTER TABLE `camp`
  MODIFY `camp_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `row_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `donarregistration`
--
ALTER TABLE `donarregistration`
  MODIFY `donar_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `donation`
--
ALTER TABLE `donation`
  MODIFY `donation_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `donors`
--
ALTER TABLE `donors`
  MODIFY `donar_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gallary`
--
ALTER TABLE `gallary`
  MODIFY `pic_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--

--
-- AUTO_INCREMENT for table `requestes`
--
ALTER TABLE `requestes`
  MODIFY `req_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `state_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

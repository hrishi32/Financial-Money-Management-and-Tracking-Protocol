-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 07, 2018 at 11:02 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `IDBS`
--

-- --------------------------------------------------------

--
-- Table structure for table `Acc`
--

CREATE TABLE `Acc` (
  `accId` int(11) NOT NULL,
  `name` text NOT NULL,
  `level` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `children` int(11) NOT NULL,
  `moneyRecvd` int(11) NOT NULL,
  `Balance` int(11) NOT NULL,
  `Expenditure` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Acc`
--

INSERT INTO `Acc` (`accId`, `name`, `level`, `parent`, `children`, `moneyRecvd`, `Balance`, `Expenditure`) VALUES
(1, 'hrishi_personal', 1, 0, 0, 6000, 4000, 2000),
(2, 'DP team 18', 4, 1, 0, 31000, 11000, 20000),
(3, 'Anirudh_personal', 1, 0, 0, 20000, 2000, 18000),
(4, 'IIT_Mandi', 1, 0, 0, 100000, 10000, 90000),
(5, 'Auditor', 1, 4, 0, 0, 0, 0),
(6, 'B16032_DP_13', 1, 4, 0, 30000, 4000, 26000);

-- --------------------------------------------------------

--
-- Table structure for table `Bills`
--

CREATE TABLE `Bills` (
  `billId` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `audited` tinyint(1) NOT NULL,
  `location` varchar(40) NOT NULL,
  `accId` int(11) NOT NULL,
  `remarks` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Bills`
--

INSERT INTO `Bills` (`billId`, `amount`, `audited`, `location`, `accId`, `remarks`) VALUES
(1, 320, 0, 'uploads/21.jpg', 2, 'poster'),
(2, 320, 0, 'uploads/22.jpg', 2, 'poster'),
(9, 342, 0, 'uploads/_1.jpg', 2, 'sgrssg'),
(10, 342, 0, 'uploads/210.jpg_1.jpg', 2, 'sgrssg'),
(11, 342, 0, 'uploads/211.jpg_1.jpg', 2, 'sgrssg'),
(12, 500, 0, 'uploads/612.jpg_1.jpg', 6, 'Laptop Bill'),
(13, 10000, 0, 'uploads/613.jpg_1.jpg', 6, 'Charger Bill'),
(14, 1200, 0, 'uploads/614.jpg_1.jpg', 6, 'Tickets'),
(15, 1000, 0, 'uploads/615.jpg_1.jpg', 6, 'Tickets'),
(16, 200, 0, 'uploads/616.jpg_1.jpg', 6, 'Screenshot'),
(17, 14000, 0, 'uploads/617.jpg_1.jpg', 6, 'TA'),
(18, 546, 0, 'uploads/418.jpg_1.jpg', 4, 'shfk;sjf'),
(19, 1600, 0, 'uploads/619.jpg_1.jpg', 6, 'Train Ticket');

-- --------------------------------------------------------

--
-- Table structure for table `Request`
--

CREATE TABLE `Request` (
  `reqId` int(11) NOT NULL,
  `srcAcc` int(11) NOT NULL,
  `destAcc` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `audit` tinyint(1) NOT NULL,
  `transID` int(11) NOT NULL,
  `Auditor` int(11) NOT NULL,
  `approved` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Request`
--

INSERT INTO `Request` (`reqId`, `srcAcc`, `destAcc`, `amount`, `audit`, `transID`, `Auditor`, `approved`) VALUES
(3, 1, 2, 4000, 1, 2, 5, 1),
(4, 4, 1, 4000, 0, 0, 5, 1),
(5, 4, 3, 10000, 0, 0, 5, 1),
(7, 4, 5, 10, 0, 0, 1, 1),
(8, 4, 2, 100, 0, 0, 4, 0),
(9, 4, 6, 250000, 0, 0, 5, 0),
(10, 4, 6, 25000, 0, 0, 1, 0),
(11, 1, 6, 142, 0, 0, 5, 0),
(12, 2, 5, 432, 0, 0, 5, 1),
(13, 3, 5, 234, 0, 0, 5, 0),
(14, 2, 1, 673, 0, 0, 5, 0),
(15, 4, 2, 546, 0, 0, 1, 0),
(16, 4, 2, 546, 0, 0, 5, 0),
(17, 4, 2, 453, 0, 0, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transId` int(11) NOT NULL,
  `sourceAcc` int(11) NOT NULL,
  `destAcc` int(11) NOT NULL,
  `sourceUser` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `recieved` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transId`, `sourceAcc`, `destAcc`, `sourceUser`, `amount`, `recieved`) VALUES
(1, 4, 3, 5, 5000, 1),
(2, 1, 2, 4, 1000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `level`) VALUES
(1, 'hrishi', 'pass@iit', 1),
(2, 'hrishik', 'pass@iit', 1),
(3, 'anirudh', 'pass@iit', 3),
(4, 'nikhil', 'pass@iit', 2),
(5, 'IITMandi', 'pass@iit', 1),
(6, 'JRSharma', 'pass@iit', 1),
(7, 'b16032', 'pass@iit', 1);

-- --------------------------------------------------------

--
-- Table structure for table `UserAccRel`
--

CREATE TABLE `UserAccRel` (
  `userId` int(11) NOT NULL,
  `accId` int(11) NOT NULL,
  `tag` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `UserAccRel`
--

INSERT INTO `UserAccRel` (`userId`, `accId`, `tag`) VALUES
(1, 1, 'owner'),
(1, 2, 'member'),
(5, 4, 'registrar'),
(3, 3, 'owner'),
(6, 5, 'auditor'),
(7, 6, 'member'),
(4, 4, 'auditor');

-- --------------------------------------------------------

--
-- Table structure for table `userDetails`
--

CREATE TABLE `userDetails` (
  `usrId` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `school` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Acc`
--
ALTER TABLE `Acc`
  ADD PRIMARY KEY (`accId`);

--
-- Indexes for table `Bills`
--
ALTER TABLE `Bills`
  ADD PRIMARY KEY (`billId`),
  ADD KEY `accId` (`accId`);

--
-- Indexes for table `Request`
--
ALTER TABLE `Request`
  ADD PRIMARY KEY (`reqId`),
  ADD KEY `srcId` (`srcAcc`),
  ADD KEY `destId` (`destAcc`),
  ADD KEY `transId` (`transID`),
  ADD KEY `auditId` (`Auditor`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transId`),
  ADD KEY `srcid` (`sourceAcc`),
  ADD KEY `dstId` (`destAcc`),
  ADD KEY `userid` (`sourceUser`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `UserAccRel`
--
ALTER TABLE `UserAccRel`
  ADD KEY `userid` (`userId`),
  ADD KEY `accId` (`accId`);

--
-- Indexes for table `userDetails`
--
ALTER TABLE `userDetails`
  ADD KEY `user` (`usrId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Acc`
--
ALTER TABLE `Acc`
  MODIFY `accId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `Bills`
--
ALTER TABLE `Bills`
  MODIFY `billId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `Request`
--
ALTER TABLE `Request`
  MODIFY `reqId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Bills`
--
ALTER TABLE `Bills`
  ADD CONSTRAINT `Bills_ibfk_1` FOREIGN KEY (`accId`) REFERENCES `Acc` (`accId`);

--
-- Constraints for table `Request`
--
ALTER TABLE `Request`
  ADD CONSTRAINT `Request_ibfk_1` FOREIGN KEY (`srcAcc`) REFERENCES `Acc` (`accId`),
  ADD CONSTRAINT `Request_ibfk_2` FOREIGN KEY (`destAcc`) REFERENCES `Acc` (`accId`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`sourceAcc`) REFERENCES `Acc` (`accId`),
  ADD CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`destAcc`) REFERENCES `Acc` (`accId`),
  ADD CONSTRAINT `transactions_ibfk_3` FOREIGN KEY (`sourceUser`) REFERENCES `user` (`userid`);

--
-- Constraints for table `UserAccRel`
--
ALTER TABLE `UserAccRel`
  ADD CONSTRAINT `UserAccRel_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`userid`),
  ADD CONSTRAINT `UserAccRel_ibfk_2` FOREIGN KEY (`accId`) REFERENCES `Acc` (`accId`);

--
-- Constraints for table `userDetails`
--
ALTER TABLE `userDetails`
  ADD CONSTRAINT `userDetails_ibfk_1` FOREIGN KEY (`usrId`) REFERENCES `user` (`userid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

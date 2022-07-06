-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 06, 2022 at 11:07 AM
-- Server version: 5.7.26
-- PHP Version: 7.3.8

SET SQL_MODE
= "NO_AUTO_VALUE_ON_ZERO";
SET time_zone
= "+00:00";

--
-- Database: `twolevel`
--

-- --------------------------------------------------------

--
-- Table structure for table `Data`
--

CREATE TABLE `Data`
(
  `id` int
(11) NOT NULL,
  `custId` varchar
(111) NOT NULL,
  `Message` varchar
(500) NOT NULL,
  `Date` date NOT NULL,
  `status` int
(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Data`
--

INSERT INTO `Data` (`
id`,
`custId
`, `Message`, `Date`, `status`) VALUES
(1, '5', 'dwdsdssd', '2022-07-06', 1),
(4, '5', 'trert', '2022-07-06', 0);

-- --------------------------------------------------------

--
-- Table structure for table `FailureAttempts`
--

CREATE TABLE `FailureAttempts`
(
  `id` int
(11) NOT NULL,
  `CustId` varchar
(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `FailureAttempts`
--

INSERT INTO `FailureAttempts` (`
id`,
`CustId
`, `date`) VALUES
(45, '380338', '2020-03-16'),
(46, '234243', '2022-07-06'),
(47, '234243', '2022-07-06'),
(48, '234243', '2022-07-06'),
(49, '234243', '2022-07-06'),
(50, '234243', '2022-07-06'),
(51, '234243', '2022-07-06'),
(52, '234243', '2022-07-06'),
(53, '234243', '2022-07-06'),
(54, '234243', '2022-07-06'),
(55, '234243', '2022-07-06'),
(56, '234243', '2022-07-06'),
(57, '234243', '2022-07-06'),
(58, '234243', '2022-07-06'),
(59, '234243', '2022-07-06'),
(60, '234243', '2022-07-06'),
(61, '234243', '2022-07-06'),
(62, '234243', '2022-07-06'),
(63, '234243', '2022-07-06'),
(64, '234243', '2022-07-06'),
(65, '234243', '2022-07-06');

-- --------------------------------------------------------

--
-- Table structure for table `Transactions`
--

CREATE TABLE `Transactions`
(
  `T_Id` int
(11) NOT NULL,
  `U_Id` int
(11) NOT NULL,
  `Transaction_Num` varchar
(100) NOT NULL,
  `amount` int
(11) NOT NULL,
  `Status` varchar
(100) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Transactions`
--

INSERT INTO `Transactions` (`
T_Id`,
`U_Id
`, `Transaction_Num`, `amount`, `Status`, `Date`) VALUES
(23, 4, '02384791', 143, 'Failed', '2020-03-16'),
(24, 4, '67985324', 143, 'Failed', '2020-03-16'),
(25, 4, '37461590', 143, 'Success', '2020-03-16'),
(26, 4, '06847235', 143, 'Success', '2020-03-16'),
(27, 4, '61094275', 143, 'Failed', '2020-03-16'),
(28, 4, '30145798', 143, 'Failed', '2020-03-16'),
(29, 4, '93214857', 143, 'Failed', '2020-03-16'),
(30, 4, '85921403', 143, 'Failed', '2020-03-16'),
(31, 4, '68439210', 143, 'Failed', '2020-03-16'),
(32, 4, '06592187', 143, 'Failed', '2020-03-16'),
(33, 4, '60718532', 143, 'Failed', '2020-03-16'),
(34, 4, '39086127', 143, 'Failed', '2020-03-16'),
(35, 4, '80439627', 143, 'Failed', '2020-03-16'),
(36, 4, '98670142', 143, 'Failed', '2020-03-16'),
(37, 4, '57689134', 143, 'Success', '2020-03-16');

-- --------------------------------------------------------

--
-- Table structure for table `Trans_table`
--

CREATE TABLE `Trans_table`
(
  `id` int
(11) NOT NULL,
  `OTP` varchar
(100) NOT NULL,
  `Flag` int
(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Trans_table`
--

INSERT INTO `Trans_table` (`
id`,
`OTP
`, `Flag`) VALUES
(79, '8J0G', 1),
(80, 'NT8L', 0),
(81, 'CGBA', 0),
(82, '5YD9', 0),
(83, 'IHU9', 0),
(84, 'OXUI', 1),
(85, 'FKCA', 1),
(86, '238T', 0),
(87, 'UF98', 0),
(88, 'IAH9', 1),
(89, 'R6SD', 1),
(90, '425V', 1),
(91, 'MHYK', 1),
(92, 'ZD1C', 0),
(93, 'NJZP', 0),
(94, 'Y0CO', 0),
(95, '2MCP', 1),
(96, '0IFG', 1),
(97, 'Z0TC', 1),
(98, 'F5VI', 0),
(99, 'DSIG', 0),
(100, 'O975', 0),
(101, 'WNYS', 0),
(102, '4HKX', 0),
(103, 'ASBW', 0),
(104, 'CEMY', 0),
(105, 'LOMG', 0),
(106, '7R1Q', 0),
(107, 'A5CO', 0),
(108, 'YVBR', 0),
(109, 'XTEI', 0),
(110, 'UVX1', 1),
(111, 'IDS0', 1),
(112, 'BKGW', 1),
(113, 'RG49', 1),
(114, 'GNMF', 1),
(115, 'RMHT', 0),
(116, 'OVFY', 1),
(117, 'YPAH', 1),
(118, 'G604', 0),
(119, 'DPB9', 0),
(120, '7AQE', 1),
(121, 'LKHX', 0),
(122, 'K6BS', 1),
(123, 'PKL6', 1),
(124, 'PHWQ', 1),
(125, '9CL5', 1),
(126, 'TAOH', 0),
(127, 'BXLP', 0),
(128, '7RN0', 0),
(129, 'VW4F', 0),
(130, 'KUDR', 1),
(131, 'AE2D', 1),
(132, '3QMX', 0),
(133, 'IS9B', 0),
(134, 'JXR9', 0),
(135, '0GNT', 0),
(136, 'Q4NJ', 0),
(137, '3E07', 0),
(138, 'I3K0', 0),
(139, 'WL5V', 0),
(140, '1KFD', 0),
(141, 'XDS9', 1),
(142, 'AS2H', 1),
(143, '2113131', 0),
(144, '2113131', 0),
(145, '2113131', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user`
(
  `id` int
(11) NOT NULL,
  `CustomerName` varchar
(100) NOT NULL,
  `CustomerId` int
(11) NOT NULL,
  `Phone` varchar
(100) NOT NULL,
  `IMEI` varchar
(100) NOT NULL,
  `Email` varchar
(100) NOT NULL,
  `password` varchar
(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user`
  (`id`, `CustomerName
`, `CustomerId`, `Phone`, `IMEI`, `Email`, `password`) VALUES
(1, 'SURUJ', 7898120, '9496873618', '1', 'anish.vilayil.s@gmail.com', 'Sooraj@123'),
(2, 'ANISH_S_NAIR', 86860089, '828138886', '1', 'A@GMAIL.COM', 'KHKHK'),
(3, 'RAHUL', 12334, '9526674440', '8686868968696969669', 'sso@gmail.com', 'abcd'),
(4, 'Anish s nair', 380338, '9526674440', '864089048611071', 'anish.vilayil.s@gmail.com', '1234'),
(5, 'Hello test 42', 234243, '432523453', '357403136868960', 'dfs', '2222');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Data`
--
ALTER TABLE `Data`
ADD PRIMARY KEY
(`id`);

--
-- Indexes for table `FailureAttempts`
--
ALTER TABLE `FailureAttempts`
ADD PRIMARY KEY
(`id`);

--
-- Indexes for table `Transactions`
--
ALTER TABLE `Transactions`
ADD PRIMARY KEY
(`T_Id`);

--
-- Indexes for table `Trans_table`
--
ALTER TABLE `Trans_table`
ADD PRIMARY KEY
(`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
ADD PRIMARY KEY
(`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Data`
--
ALTER TABLE `Data`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `FailureAttempts`
--
ALTER TABLE `FailureAttempts`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `Transactions`
--
ALTER TABLE `Transactions`
  MODIFY `T_Id` int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `Trans_table`
--
ALTER TABLE `Trans_table`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2023 at 03:37 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `autovital`
--
CREATE DATABASE IF NOT EXISTS `autovital` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `autovital`;

-- --------------------------------------------------------

--
-- Table structure for table `account`
--
-- Error reading structure for table autovital.account: #1932 - Table &#039;autovital.account&#039; doesn&#039;t exist in engine
-- Error reading data for table autovital.account: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `autovital`.`account`&#039; at line 1
--
-- Database: `autovital2`
--
CREATE DATABASE IF NOT EXISTS `autovital2` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `autovital2`;

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `uid` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `verified` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`uid`, `username`, `password`, `phone`, `email`, `verified`) VALUES
('4b18f586-ade1-4d76-935f-5cbeff94697f', 'erwinyonata', '$2b$12$fWwsdef3L0Xd8mq0lM2OXelo/3Qz/wFWlz9nFQlb5pQ.ipAiOPrFi', '092319342', 'erwinwingyonata@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `air_filter`
--

CREATE TABLE `air_filter` (
  `afid` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `last_change` date NOT NULL,
  `aid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `air_filter`
--

INSERT INTO `air_filter` (`afid`, `name`, `last_change`, `aid`) VALUES
('a2b9bae5-ece3-48da-996d-d3a2066007bc', 'Winder Premium', '2023-09-01', '4486742a-6041-4e12-be4d-59c6a4a944fa'),
('bf529b2c-8ca1-4bf5-b26b-5afbe5ed6270', 'Winder Premium', '2023-09-01', '4632e84b-9599-4cec-99a2-b662af1b3e85');

-- --------------------------------------------------------

--
-- Table structure for table `automotive`
--

CREATE TABLE `automotive` (
  `aid` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `plate` varchar(100) NOT NULL,
  `vin` varchar(100) NOT NULL,
  `distance` int(11) NOT NULL,
  `cid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `automotive`
--

INSERT INTO `automotive` (`aid`, `name`, `plate`, `vin`, `distance`, `cid`) VALUES
('4486742a-6041-4e12-be4d-59c6a4a944fa', 'ferrari', 'L2110EY', '1312HDFKSA832024', 3204, '2'),
('4632e84b-9599-4cec-99a2-b662af1b3e85', 'ferrari', 'L2110EY', '1312HDFKSA832024', 3204, '2');

-- --------------------------------------------------------

--
-- Table structure for table `breakpad`
--

CREATE TABLE `breakpad` (
  `bpid` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `last_change` date NOT NULL,
  `aid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `breakpad`
--

INSERT INTO `breakpad` (`bpid`, `name`, `last_change`, `aid`) VALUES
('2316490d-bc24-4e48-afa9-5deb8ffc3994', 'Stop Car', '2023-05-03', '4632e84b-9599-4cec-99a2-b662af1b3e85'),
('8aeadebf-5951-4518-958c-4d1561cd7b0e', 'Stop Car', '2023-05-03', '4486742a-6041-4e12-be4d-59c6a4a944fa');

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `cid` varchar(100) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL,
  `thumbnail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`cid`, `brand`, `model`, `thumbnail`) VALUES
('1', 'Toyota', 'Camry', 'https://imgd.aeplcdn.com/0X0/n/cw/ec/110233/camry-exterior-right-front-three-quarter-3.jpeg'),
('10', 'Subaru', 'Impreza', 'https://otoklix-production.s3.amazonaws.com/uploads/2022/12/subaru-impreza.jpg'),
('2', 'Honda', 'Civic', 'https://www.kba.one/files/images/20210730-b68d069167d64751bf08d7e2a18007ed-750x420.jpg'),
('3', 'Ford', 'Focus', 'https://www.topgear.com/sites/default/files/2022/04/51951944136_a4826c854b_k.jpg'),
('4', 'Chevrolet', 'Malibu', 'https://www.motortrend.com/uploads/2022/10/2023-Chevrolet-Malibu-RS-30.jpg'),
('5', 'Volkswagen', 'Jetta', 'https://cdn.jdpower.com/JDPA_2020%20Volkswagen%20Jetta%20GLI%20Pure%20Gray%20Front%20View.jpg'),
('6', 'Nissan', 'Altima', 'https://cars.usnews.com/static/images/Auto/izmo/i157546817/2020_nissan_altima_angularfront.jpg'),
('7', 'Hyundai', 'Elantra', 'https://cdn.motor1.com/images/mgl/xqgZLP/s1/2022-hyundai-elantra-n-exterior-front-quarter.jpg'),
('8', 'Kia', 'Forte', 'https://di-uploads-pod35.dealerinspire.com/kiaofriverdale/uploads/2022/09/2023-Kia-Forte.png'),
('9', 'Mazda', 'Mazda3', 'https://cdn.motor1.com/images/mgl/kN9Ex/s1/2021-mazda3-update-in-japan.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `fuel_filter`
--

CREATE TABLE `fuel_filter` (
  `ffid` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `last_change` date NOT NULL,
  `aid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fuel_filter`
--

INSERT INTO `fuel_filter` (`ffid`, `name`, `last_change`, `aid`) VALUES
('e6a5cb5c-61aa-486b-9692-2a52d6466f78', 'Peroz Utips', '2023-01-01', '4632e84b-9599-4cec-99a2-b662af1b3e85'),
('fd4301b9-dc27-496f-bdb1-f061ed149844', 'Peroz Utips', '2023-01-01', '4486742a-6041-4e12-be4d-59c6a4a944fa');

-- --------------------------------------------------------

--
-- Table structure for table `oil`
--

CREATE TABLE `oil` (
  `oid` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `last_change` date NOT NULL,
  `aid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `oil`
--

INSERT INTO `oil` (`oid`, `name`, `last_change`, `aid`) VALUES
('1e5297e8-73f7-48f0-8066-22d4142724b4', 'GS Astra', '2023-11-02', '4486742a-6041-4e12-be4d-59c6a4a944fa'),
('d167aa1f-0874-42d5-bc23-8a58c9bbfee0', 'GS Astra', '2023-11-02', '4632e84b-9599-4cec-99a2-b662af1b3e85');

-- --------------------------------------------------------

--
-- Table structure for table `oil_filter`
--

CREATE TABLE `oil_filter` (
  `ofid` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `last_change` date NOT NULL,
  `aid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `oil_filter`
--

INSERT INTO `oil_filter` (`ofid`, `name`, `last_change`, `aid`) VALUES
('0e3bdbf8-8d26-4bd9-a61c-e32ade10a862', 'Loper Bear', '2023-04-09', '4632e84b-9599-4cec-99a2-b662af1b3e85'),
('a3adc429-70aa-40f4-aa27-dd575bc99660', 'Loper Bear', '2023-04-09', '4486742a-6041-4e12-be4d-59c6a4a944fa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `air_filter`
--
ALTER TABLE `air_filter`
  ADD PRIMARY KEY (`afid`),
  ADD KEY `aid` (`aid`);

--
-- Indexes for table `automotive`
--
ALTER TABLE `automotive`
  ADD PRIMARY KEY (`aid`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `breakpad`
--
ALTER TABLE `breakpad`
  ADD PRIMARY KEY (`bpid`),
  ADD KEY `aid` (`aid`);

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `fuel_filter`
--
ALTER TABLE `fuel_filter`
  ADD PRIMARY KEY (`ffid`),
  ADD KEY `aid` (`aid`);

--
-- Indexes for table `oil`
--
ALTER TABLE `oil`
  ADD PRIMARY KEY (`oid`),
  ADD KEY `aid` (`aid`);

--
-- Indexes for table `oil_filter`
--
ALTER TABLE `oil_filter`
  ADD PRIMARY KEY (`ofid`),
  ADD KEY `aid` (`aid`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `air_filter`
--
ALTER TABLE `air_filter`
  ADD CONSTRAINT `air_filter_ibfk_1` FOREIGN KEY (`aid`) REFERENCES `automotive` (`aid`);

--
-- Constraints for table `automotive`
--
ALTER TABLE `automotive`
  ADD CONSTRAINT `automotive_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `car` (`cid`);

--
-- Constraints for table `breakpad`
--
ALTER TABLE `breakpad`
  ADD CONSTRAINT `breakpad_ibfk_1` FOREIGN KEY (`aid`) REFERENCES `automotive` (`aid`);

--
-- Constraints for table `fuel_filter`
--
ALTER TABLE `fuel_filter`
  ADD CONSTRAINT `fuel_filter_ibfk_1` FOREIGN KEY (`aid`) REFERENCES `automotive` (`aid`);

--
-- Constraints for table `oil`
--
ALTER TABLE `oil`
  ADD CONSTRAINT `oil_ibfk_1` FOREIGN KEY (`aid`) REFERENCES `automotive` (`aid`);

--
-- Constraints for table `oil_filter`
--
ALTER TABLE `oil_filter`
  ADD CONSTRAINT `oil_filter_ibfk_1` FOREIGN KEY (`aid`) REFERENCES `automotive` (`aid`);
--
-- Database: `budtrack`
--
CREATE DATABASE IF NOT EXISTS `budtrack` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `budtrack`;

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `uid` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`uid`, `name`, `username`, `password`) VALUES
('6524adf9138f7', 'Erwin Yonata', 'erwinyonata', '$2y$10$7NNJuQdlZDMEbGJC5usZ9.JNQXfW.Xa0js.F.zm0ZpQQJfUoB.6Mu');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `tid` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `type` varchar(100) NOT NULL,
  `account` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `amount` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `uid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`tid`, `title`, `date`, `type`, `account`, `category`, `amount`, `status`, `uid`) VALUES
('6527a4fb46ad2', 'test1', '2023-10-27', 'Income', 'Personal', 'Housing', 1000, 'Finish', '6524adf9138f7'),
('6527ac619eca7', 'test2', '2023-11-08', 'Income', 'Family', 'Health', 50000, 'Finish', '6524adf9138f7'),
('6528baf6e4526', 'test3', '2023-10-20', 'Income', 'Family', 'Housing', 60000, 'Finish', '6524adf9138f7'),
('654a4be1d4034', 'Test2', '2023-11-20', 'EXPENSE', 'PERSONAL', 'Housing', 20000, 'Finish', '6524adf9138f7'),
('654a4c3c72490', 'asda', '2023-11-14', 'Expense', 'Personal', 'Transportation', 123123, 'Finish', '6524adf9138f7'),
('654a6b2f292f9', 'Lol', '2023-11-09', 'Expense', 'Family', 'Transportation', 20000, 'Finish', '6524adf9138f7'),
('654a6bbd31975', 'sdasd', '2023-11-07', 'Income', 'Personal', 'Housing', 1000000, 'Finish', '6524adf9138f7');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`tid`),
  ADD KEY `uid` (`uid`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `account` (`uid`);
--
-- Database: `dbms_stuff`
--
CREATE DATABASE IF NOT EXISTS `dbms_stuff` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `dbms_stuff`;

-- --------------------------------------------------------

--
-- Table structure for table `boats`
--
-- Error reading structure for table dbms_stuff.boats: #1932 - Table &#039;dbms_stuff.boats&#039; doesn&#039;t exist in engine
-- Error reading data for table dbms_stuff.boats: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `dbms_stuff`.`boats`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--
-- Error reading structure for table dbms_stuff.reservation: #1932 - Table &#039;dbms_stuff.reservation&#039; doesn&#039;t exist in engine
-- Error reading data for table dbms_stuff.reservation: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `dbms_stuff`.`reservation`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `sailors`
--
-- Error reading structure for table dbms_stuff.sailors: #1932 - Table &#039;dbms_stuff.sailors&#039; doesn&#039;t exist in engine
-- Error reading data for table dbms_stuff.sailors: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `dbms_stuff`.`sailors`&#039; at line 1
--
-- Database: `division`
--
CREATE DATABASE IF NOT EXISTS `division` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `division`;

-- --------------------------------------------------------

--
-- Table structure for table `parts`
--
-- Error reading structure for table division.parts: #1932 - Table &#039;division.parts&#039; doesn&#039;t exist in engine
-- Error reading data for table division.parts: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `division`.`parts`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--
-- Error reading structure for table division.suppliers: #1932 - Table &#039;division.suppliers&#039; doesn&#039;t exist in engine
-- Error reading data for table division.suppliers: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `division`.`suppliers`&#039; at line 1
--
-- Database: `nisrina`
--
CREATE DATABASE IF NOT EXISTS `nisrina` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `nisrina`;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `cid` int(11) NOT NULL,
  `semester` varchar(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `cname` varchar(50) DEFAULT NULL,
  `lid` int(11) NOT NULL,
  `credit` int(11) DEFAULT NULL,
  `prereq` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`cid`, `semester`, `year`, `cname`, `lid`, `credit`, `prereq`) VALUES
(1, 'spring', 2021, 'DBMS', 0, 4, NULL),
(2, 'fall', 2021, 'OOP', 2015010001, 4, NULL),
(3, 'fall', 2021, 'Calculus', 0, 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coursetaken`
--

CREATE TABLE `coursetaken` (
  `sid` int(11) DEFAULT NULL,
  `cid` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `semester` varchar(20) NOT NULL,
  `grd` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coursetaken`
--

INSERT INTO `coursetaken` (`sid`, `cid`, `year`, `semester`, `grd`) VALUES
(2020010101, 1, 2021, 'spring', 90),
(2020010102, 1, 2021, 'spring', 87),
(2020010103, 1, 2021, 'spring', 98),
(2021010104, 2, 2021, 'fall', 90),
(2021010106, 2, 2021, 'fall', 92),
(2021020205, 2, 2021, 'fall', 75),
(2020010101, 3, 2021, 'fall', 90),
(2020010102, 3, 2021, 'fall', 68),
(2020010103, 3, 2021, 'fall', 50);

-- --------------------------------------------------------

--
-- Table structure for table `lecturer`
--

CREATE TABLE `lecturer` (
  `lid` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `bod` date DEFAULT NULL,
  `gender` varchar(1) DEFAULT NULL,
  `l_address` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lecturer`
--

INSERT INTO `lecturer` (`lid`, `name`, `bod`, `gender`, `l_address`) VALUES
(2015010001, 'Smith', NULL, 'M', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `sid` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `bod` date DEFAULT NULL,
  `gender` varchar(1) DEFAULT NULL,
  `s_address` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`sid`, `name`, `bod`, `gender`, `s_address`) VALUES
(2020010101, 'Siapa', NULL, 'F', NULL),
(2020010103, 'Tammy', NULL, 'M', NULL),
(2020020202, 'Max', NULL, 'F', NULL),
(2021010104, 'Tanny', NULL, 'F', NULL),
(2021010106, 'Arthur', NULL, 'M', NULL),
(2021020205, 'Felix', NULL, 'M', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `lecturer`
--
ALTER TABLE `lecturer`
  ADD PRIMARY KEY (`lid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`sid`);
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--
-- Error reading structure for table phpmyadmin.pma__bookmark: #1932 - Table &#039;phpmyadmin.pma__bookmark&#039; doesn&#039;t exist in engine
-- Error reading data for table phpmyadmin.pma__bookmark: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `phpmyadmin`.`pma__bookmark`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--
-- Error reading structure for table phpmyadmin.pma__central_columns: #1932 - Table &#039;phpmyadmin.pma__central_columns&#039; doesn&#039;t exist in engine
-- Error reading data for table phpmyadmin.pma__central_columns: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `phpmyadmin`.`pma__central_columns`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--
-- Error reading structure for table phpmyadmin.pma__column_info: #1932 - Table &#039;phpmyadmin.pma__column_info&#039; doesn&#039;t exist in engine
-- Error reading data for table phpmyadmin.pma__column_info: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `phpmyadmin`.`pma__column_info`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--
-- Error reading structure for table phpmyadmin.pma__designer_settings: #1932 - Table &#039;phpmyadmin.pma__designer_settings&#039; doesn&#039;t exist in engine
-- Error reading data for table phpmyadmin.pma__designer_settings: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `phpmyadmin`.`pma__designer_settings`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--
-- Error reading structure for table phpmyadmin.pma__export_templates: #1932 - Table &#039;phpmyadmin.pma__export_templates&#039; doesn&#039;t exist in engine
-- Error reading data for table phpmyadmin.pma__export_templates: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `phpmyadmin`.`pma__export_templates`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--
-- Error reading structure for table phpmyadmin.pma__favorite: #1932 - Table &#039;phpmyadmin.pma__favorite&#039; doesn&#039;t exist in engine
-- Error reading data for table phpmyadmin.pma__favorite: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `phpmyadmin`.`pma__favorite`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--
-- Error reading structure for table phpmyadmin.pma__history: #1932 - Table &#039;phpmyadmin.pma__history&#039; doesn&#039;t exist in engine
-- Error reading data for table phpmyadmin.pma__history: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `phpmyadmin`.`pma__history`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--
-- Error reading structure for table phpmyadmin.pma__navigationhiding: #1932 - Table &#039;phpmyadmin.pma__navigationhiding&#039; doesn&#039;t exist in engine
-- Error reading data for table phpmyadmin.pma__navigationhiding: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `phpmyadmin`.`pma__navigationhiding`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--
-- Error reading structure for table phpmyadmin.pma__pdf_pages: #1932 - Table &#039;phpmyadmin.pma__pdf_pages&#039; doesn&#039;t exist in engine
-- Error reading data for table phpmyadmin.pma__pdf_pages: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `phpmyadmin`.`pma__pdf_pages`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--
-- Error reading structure for table phpmyadmin.pma__recent: #1932 - Table &#039;phpmyadmin.pma__recent&#039; doesn&#039;t exist in engine
-- Error reading data for table phpmyadmin.pma__recent: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `phpmyadmin`.`pma__recent`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--
-- Error reading structure for table phpmyadmin.pma__relation: #1932 - Table &#039;phpmyadmin.pma__relation&#039; doesn&#039;t exist in engine
-- Error reading data for table phpmyadmin.pma__relation: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `phpmyadmin`.`pma__relation`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--
-- Error reading structure for table phpmyadmin.pma__savedsearches: #1932 - Table &#039;phpmyadmin.pma__savedsearches&#039; doesn&#039;t exist in engine
-- Error reading data for table phpmyadmin.pma__savedsearches: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `phpmyadmin`.`pma__savedsearches`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--
-- Error reading structure for table phpmyadmin.pma__table_coords: #1932 - Table &#039;phpmyadmin.pma__table_coords&#039; doesn&#039;t exist in engine
-- Error reading data for table phpmyadmin.pma__table_coords: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `phpmyadmin`.`pma__table_coords`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--
-- Error reading structure for table phpmyadmin.pma__table_info: #1932 - Table &#039;phpmyadmin.pma__table_info&#039; doesn&#039;t exist in engine
-- Error reading data for table phpmyadmin.pma__table_info: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `phpmyadmin`.`pma__table_info`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--
-- Error reading structure for table phpmyadmin.pma__table_uiprefs: #1932 - Table &#039;phpmyadmin.pma__table_uiprefs&#039; doesn&#039;t exist in engine
-- Error reading data for table phpmyadmin.pma__table_uiprefs: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `phpmyadmin`.`pma__table_uiprefs`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--
-- Error reading structure for table phpmyadmin.pma__tracking: #1932 - Table &#039;phpmyadmin.pma__tracking&#039; doesn&#039;t exist in engine
-- Error reading data for table phpmyadmin.pma__tracking: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `phpmyadmin`.`pma__tracking`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--
-- Error reading structure for table phpmyadmin.pma__userconfig: #1932 - Table &#039;phpmyadmin.pma__userconfig&#039; doesn&#039;t exist in engine
-- Error reading data for table phpmyadmin.pma__userconfig: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `phpmyadmin`.`pma__userconfig`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--
-- Error reading structure for table phpmyadmin.pma__usergroups: #1932 - Table &#039;phpmyadmin.pma__usergroups&#039; doesn&#039;t exist in engine
-- Error reading data for table phpmyadmin.pma__usergroups: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `phpmyadmin`.`pma__usergroups`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--
-- Error reading structure for table phpmyadmin.pma__users: #1932 - Table &#039;phpmyadmin.pma__users&#039; doesn&#039;t exist in engine
-- Error reading data for table phpmyadmin.pma__users: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `phpmyadmin`.`pma__users`&#039; at line 1
--
-- Database: `registry`
--
CREATE DATABASE IF NOT EXISTS `registry` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `registry`;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--
-- Error reading structure for table registry.course: #1932 - Table &#039;registry.course&#039; doesn&#039;t exist in engine
-- Error reading data for table registry.course: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `registry`.`course`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--
-- Error reading structure for table registry.grade: #1932 - Table &#039;registry.grade&#039; doesn&#039;t exist in engine
-- Error reading data for table registry.grade: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `registry`.`grade`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `lecture`
--
-- Error reading structure for table registry.lecture: #1932 - Table &#039;registry.lecture&#039; doesn&#039;t exist in engine
-- Error reading data for table registry.lecture: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `registry`.`lecture`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `student`
--
-- Error reading structure for table registry.student: #1932 - Table &#039;registry.student&#039; doesn&#039;t exist in engine
-- Error reading data for table registry.student: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `registry`.`student`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `student_course_grade`
--
-- Error reading structure for table registry.student_course_grade: #1932 - Table &#039;registry.student_course_grade&#039; doesn&#039;t exist in engine
-- Error reading data for table registry.student_course_grade: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `registry`.`student_course_grade`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `student_gpas`
--
-- Error reading structure for table registry.student_gpas: #1932 - Table &#039;registry.student_gpas&#039; doesn&#039;t exist in engine
-- Error reading data for table registry.student_gpas: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `registry`.`student_gpas`&#039; at line 1
--
-- Database: `registry2`
--
CREATE DATABASE IF NOT EXISTS `registry2` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `registry2`;
--
-- Database: `stud`
--
CREATE DATABASE IF NOT EXISTS `stud` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `stud`;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--
-- Error reading structure for table stud.course: #1932 - Table &#039;stud.course&#039; doesn&#039;t exist in engine
-- Error reading data for table stud.course: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `stud`.`course`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `course_taken`
--
-- Error reading structure for table stud.course_taken: #1932 - Table &#039;stud.course_taken&#039; doesn&#039;t exist in engine
-- Error reading data for table stud.course_taken: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `stud`.`course_taken`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `lecturer`
--
-- Error reading structure for table stud.lecturer: #1932 - Table &#039;stud.lecturer&#039; doesn&#039;t exist in engine
-- Error reading data for table stud.lecturer: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `stud`.`lecturer`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `student`
--
-- Error reading structure for table stud.student: #1932 - Table &#039;stud.student&#039; doesn&#039;t exist in engine
-- Error reading data for table stud.student: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `stud`.`student`&#039; at line 1
--
-- Database: `stud2`
--
CREATE DATABASE IF NOT EXISTS `stud2` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `stud2`;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `CID` char(12) NOT NULL,
  `Semester` varchar(20) DEFAULT NULL,
  `Year` int(11) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Credit` int(11) DEFAULT NULL,
  `Prereq` char(12) DEFAULT NULL,
  `LID` char(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`CID`, `Semester`, `Year`, `Name`, `Credit`, `Prereq`, `LID`) VALUES
('C20230001', 'Fall', 2023, 'Mathematics', 3, NULL, 'L20230002'),
('C20230002', 'Spring', 2023, 'Computer Science', 4, 'C20230001', 'L20230002'),
('C20230003', 'Spring', 2023, 'Physics', 3, NULL, 'L20230001'),
('C20230004', 'Fall', 2023, 'Chemistry', 4, 'C20230003', 'L20230002');

-- --------------------------------------------------------

--
-- Table structure for table `coursetaken`
--

CREATE TABLE `coursetaken` (
  `SID` char(12) NOT NULL,
  `CID` char(12) NOT NULL,
  `Semester` varchar(20) NOT NULL,
  `Year` int(11) NOT NULL,
  `Grade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coursetaken`
--

INSERT INTO `coursetaken` (`SID`, `CID`, `Semester`, `Year`, `Grade`) VALUES
('20230001', 'C20230001', 'Fall', 2023, 4),
('20230001', 'C20230002', 'Spring', 2023, 4),
('20230001', 'C20230003', 'Spring', 2023, 4),
('20230001', 'C20230004', 'Fall', 2023, 3),
('20230002', 'C20230001', 'Fall', 2023, 3),
('20230002', 'C20230003', 'Spring', 2023, 4),
('20230002', 'C20230004', 'Fall', 2023, 3),
('20230003', 'C20230001', 'Fall', 2023, 2),
('20230003', 'C20230003', 'Spring', 2023, 3),
('20230003', 'C20230004', 'Fall', 2023, 4),
('20240004', 'C20230001', 'Fall', 2023, 2),
('20240005', 'C20230002', 'Spring', 2023, 3),
('20240006', 'C20230003', 'Spring', 2023, 4),
('20260003', 'C20230001', 'Fall', 2023, 3),
('20270001', 'C20230002', 'Spring', 2023, 2);

-- --------------------------------------------------------

--
-- Table structure for table `lecturer`
--

CREATE TABLE `lecturer` (
  `LID` char(12) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `BOD` date DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lecturer`
--

INSERT INTO `lecturer` (`LID`, `Name`, `BOD`, `Gender`, `Address`) VALUES
('L20230001', 'Dr. Smith', '1975-02-20', 'Male', '111 Pine St'),
('L20230002', 'Prof. Johnson', '1980-10-10', 'Male', '222 Cedar St'),
('L20230003', 'Prof. Anderson', '1978-09-05', 'Male', '333 Oak St'),
('L20230004', 'Dr. Wilson', '1985-03-25', 'Female', '444 Cedar St');

-- --------------------------------------------------------

--
-- Stand-in structure for view `studentcgpa`
-- (See below for the actual view)
--
CREATE TABLE `studentcgpa` (
`SID` char(12)
,`StudentName` varchar(255)
,`Semester` varchar(20)
,`Year` int(11)
,`GPA` decimal(46,4)
,`CGPA` decimal(65,4)
);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `SID` char(12) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `BOD` date DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`SID`, `Name`, `BOD`, `Gender`, `Address`) VALUES
('20230001', 'John Doe', '2000-01-01', 'Male', '123 Main St'),
('20230002', 'Jane Smith', '2001-01-15', 'Female', '456 Elm St'),
('20230003', 'Michael Johnson', '1999-12-05', 'Male', '789 Oak St'),
('20240004', 'William Martinez', '1999-10-01', 'Male', '606 Sycamore St'),
('20240005', 'Sophia Taylor', '1997-07-07', 'Female', '707 Willow St'),
('20240006', 'Daniel Anderson', '2000-04-02', 'Male', '808 Oakwood St'),
('20250003', 'Mia Johnson', '2002-06-15', 'Female', '909 Maplewood St'),
('20250004', 'Oliver Davis', '2001-09-18', 'Male', '101 Elmwood St'),
('20250005', 'Ella Smith', '2002-11-25', 'Female', '202 Cedarwood St'),
('20260001', 'Ethan Wilson', '2004-03-14', 'Male', '303 Redwoodwood St'),
('20260002', 'Liam Lee', '2003-05-29', 'Male', '404 Pinepine St'),
('20260003', 'Ava Anderson', '2004-08-11', 'Female', '505 Birchbirch St'),
('20270001', 'Charlotte Martinez', '2006-01-06', 'Female', '606 Willowwillow St'),
('20270002', 'Mason Taylor', '2005-04-21', 'Male', '707 Oakoak St'),
('20270003', 'Amelia Davis', '2006-07-30', 'Female', '808 Sycamoresycamore St'),
('20280001', 'Henry Wilson', '2008-02-19', 'Male', '909 Maplemaple St'),
('20280002', 'Avery Smith', '2007-06-14', 'Female', '101 Elmelme St'),
('20280003', 'James Johnson', '2008-12-09', 'Male', '202 Cedarcedar St');

-- --------------------------------------------------------

--
-- Structure for view `studentcgpa`
--
DROP TABLE IF EXISTS `studentcgpa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `studentcgpa`  AS SELECT `ct`.`SID` AS `SID`, `ct`.`StudentName` AS `StudentName`, `ct`.`Semester` AS `Semester`, `ct`.`Year` AS `Year`, `ct`.`GPA` AS `GPA`, (select sum(`prev`.`GPA`) from (select `s`.`SID` AS `SID`,`s`.`Name` AS `StudentName`,`ct`.`Semester` AS `Semester`,`ct`.`Year` AS `Year`,sum(`ct`.`Grade` * `c`.`Credit`) / sum(`c`.`Credit`) AS `GPA` from ((`coursetaken` `ct` join `students` `s` on(`ct`.`SID` = `s`.`SID`)) join `course` `c` on(`ct`.`CID` = `c`.`CID`)) group by `s`.`SID`,`ct`.`Semester`,`ct`.`Year` order by `s`.`SID`,`ct`.`Year`,field(`ct`.`Semester`,'Spring','Fall','Winter','Summer')) `prev` where `prev`.`SID` = `ct`.`SID` and `prev`.`Year` <= `ct`.`Year` and (`prev`.`Year` < `ct`.`Year` or `prev`.`Semester` <= `ct`.`Semester`)) AS `CGPA` FROM (select `s`.`SID` AS `SID`,`s`.`Name` AS `StudentName`,`ct`.`Semester` AS `Semester`,`ct`.`Year` AS `Year`,sum(`ct`.`Grade` * `c`.`Credit`) / sum(`c`.`Credit`) AS `GPA` from ((`coursetaken` `ct` join `students` `s` on(`ct`.`SID` = `s`.`SID`)) join `course` `c` on(`ct`.`CID` = `c`.`CID`)) group by `s`.`SID`,`ct`.`Semester`,`ct`.`Year` order by `s`.`SID`,`ct`.`Year`,field(`ct`.`Semester`,'Spring','Fall','Winter','Summer')) AS `ct` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`CID`),
  ADD KEY `Prereq` (`Prereq`);

--
-- Indexes for table `coursetaken`
--
ALTER TABLE `coursetaken`
  ADD PRIMARY KEY (`SID`,`CID`,`Semester`,`Year`),
  ADD KEY `CID` (`CID`);

--
-- Indexes for table `lecturer`
--
ALTER TABLE `lecturer`
  ADD PRIMARY KEY (`LID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`SID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`Prereq`) REFERENCES `course` (`CID`);

--
-- Constraints for table `coursetaken`
--
ALTER TABLE `coursetaken`
  ADD CONSTRAINT `coursetaken_ibfk_1` FOREIGN KEY (`SID`) REFERENCES `students` (`SID`),
  ADD CONSTRAINT `coursetaken_ibfk_2` FOREIGN KEY (`CID`) REFERENCES `course` (`CID`);
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
--
-- Database: `views`
--
CREATE DATABASE IF NOT EXISTS `views` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `views`;

-- --------------------------------------------------------

--
-- Table structure for table `departement`
--
-- Error reading structure for table views.departement: #1932 - Table &#039;views.departement&#039; doesn&#039;t exist in engine
-- Error reading data for table views.departement: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `views`.`departement`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `deptsal`
--
-- Error reading structure for table views.deptsal: #1932 - Table &#039;views.deptsal&#039; doesn&#039;t exist in engine
-- Error reading data for table views.deptsal: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `views`.`deptsal`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--
-- Error reading structure for table views.employee: #1932 - Table &#039;views.employee&#039; doesn&#039;t exist in engine
-- Error reading data for table views.employee: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `views`.`employee`&#039; at line 1

--
-- Triggers `employee`
--
DELIMITER $$
CREATE TRIGGER `update_salary` AFTER INSERT ON `employee` FOR EACH ROW begin
	if new.dno is not null then
		update deptsal
		set totalsalary = totalsalary + new.salary
		where dnumber = new.dno;
	end if;
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_salary2` AFTER UPDATE ON `employee` FOR EACH ROW begin
	if old.dno is not null then
		update deptsal
		set totalsalary = totalsalary - old.salary
		where dnumber = old.dno;
	end if;
	if new.dno is not null then
		update deptsal
		set totalsalary = totalsalary + new.salary
		where dnumber = new.dno;
	end if;
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_salary3` AFTER DELETE ON `employee` FOR EACH ROW begin
	if (old.dno is not null) then
		update deptsal
		set totalsalary = totalsalary - old.salary
		where dnumber = old.dno;
	end if;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `manager`
-- (See below for the actual view)
--
CREATE TABLE `manager` (
);

-- --------------------------------------------------------

--
-- Structure for view `manager`
--
DROP TABLE IF EXISTS `manager`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `manager`  AS SELECT `employee`.`FNAME` AS `fname`, `departement`.`DNAME` AS `dname`, `departement`.`DNUMBER` AS `dnumber`, `employee`.`SALARY` AS `salary` FROM (`employee` join `departement`) WHERE `employee`.`SSN` = `departement`.`MGRSSN` ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

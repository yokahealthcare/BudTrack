-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2023 at 12:44 PM
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
-- Database: `budtrack`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `uid` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `verified` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`uid`, `name`, `username`, `password`, `email`, `verified`) VALUES
('654cf2dfbb9fa', 'James Bond', 'jamesbond', '$2y$10$wh1xz6a5hm56KWeDV3sCFO8tW1xHzTqyQIORjeVluUWGtCzmKmRzu', '', 0),
('654d92b160671', 'BCL', 'bcl', '$2y$10$4UKcm6ExVDPw2Nxp6MhXw.pAK7yLQGXrdHxiIlaAQPVIj3DFOfVHO', '', 0),
('654d96db211a2', 'Moh Erwin Septianto', 'boba', '$2y$10$tgww0hSEzSuFkWbKOMdz/OQUYRNd8XAzdFN6ZFavRPboVsBjzZSLi', '', 0),
('654d980122bb0', 'Angelic Pangkaraya', 'angeliicp', '$2y$10$uXVae2trelt2x37ctJJghurimUN4PsqPltQFK6KIRHdN.X.dSM.kS', '', 0),
('654d98b69ef16', 'Nadhief lagi 2', 'NadNadhief', '$2y$10$vhx/X27aU4Ag6aFMI.O40.Me2zpVnqQGiYVdVadrRK4BdfEy.BsGO', '', 0),
('654d98ff6de32', 'Zahrani Reza', 'zahranireza', '$2y$10$zLB63LvThPj1HgMKhIJCsOkbkQM7EJX0zfXkBb5dMmgvIPkUmMCC.', '', 0),
('65507e69d90b5', 'Mother', 'mother', '$2y$10$yLfgzeIy69Uwz4uhcDpKueKoYklSI2zyrvyalxThzelzLGmI0qJ0.', '', 0),
('65507f78208a0', 'Indiana', 'indiana', '$2y$10$Af6E.Fm9909dRBi0RoncUuGWjt/Z6J1Tfugt27ffguGD9O3vxd2ym', '', 0),
('65548d91ce148', 'Erwin Yonata', 'erwinyonata', '$2y$10$aaDkWIhxx0c/YMMuKPn5qe1Cq8pPPK4CYwySf57imTIGm/1h.bps.', 'erwinwingyonata@gmail.com', 1);

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
('654cf474aebd1', 'Budget', '2023-11-09', 'Income', 'Personal', 'Housing', 10000000, 'Finish', '654cf2dfbb9fa'),
('654cf499bdd2f', 'Farmers Market', '2023-11-07', 'Expense', 'Family', 'Transportation', 250000, 'Finish', '654cf2dfbb9fa'),
('654d92f27facd', 'Budget', '2023-11-10', 'Income', 'Business', 'Housing', 100000000, 'Finish', '654d92b160671'),
('654d931930583', 'Pay Employee', '2023-11-10', 'Expense', 'Business', 'Entertainment', 25000000, 'Finish', '654d92b160671'),
('654d96fd3c623', 'asdfgh', '2023-11-16', 'Income', 'Personal', 'Housing', 12345, 'Finish', '654d96db211a2'),
('654d9abd9dda1', 'Salary', '2023-11-08', 'Income', 'Personal', 'Housing', 5000000, 'Finish', '654d980122bb0'),
('654d9afdedfaf', 'Eat', '2023-11-09', 'Expense', 'Personal', 'Food', 20000, 'Finish', '654d980122bb0'),
('654d9d2dc7a4e', 'buat sendiri', '2023-11-18', 'Income', 'Personal', 'Food', 1000000, 'Reserved', '654d98ff6de32'),
('65608c702d348', 'Makan', '2023-11-18', 'Income', 'Personal', 'Housing', 20000, 'Finish', '65548d91ce148');

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

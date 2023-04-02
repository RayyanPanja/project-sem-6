-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2023 at 04:21 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Admin_ID` int(90) NOT NULL,
  `Admin_Name` varchar(90) NOT NULL,
  `Admin_Password` varchar(30) NOT NULL,
  `Designation` varchar(100) NOT NULL,
  `How_Much_Approved` int(99) NOT NULL DEFAULT 0,
  `Branch` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_ID`, `Admin_Name`, `Admin_Password`, `Designation`, `How_Much_Approved`, `Branch`) VALUES
(1, 'Rayyan', '7410', 'Manager', 0, 'Veraval\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `Cid` int(99) NOT NULL,
  `Email` varchar(99) NOT NULL,
  `Subject` varchar(225) NOT NULL,
  `Msg` longtext NOT NULL,
  `Status` varchar(50) NOT NULL DEFAULT 'Pending',
  `Time` time NOT NULL DEFAULT current_timestamp(),
  `Date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`Cid`, `Email`, `Subject`, `Msg`, `Status`, `Time`, `Date`) VALUES
(1, 'Deez', '', 'Lorem safas asf aas ga', 'Pending', '00:00:00', '2023-04-02'),
(2, 'Rayyan', '', 'LOREM SAFAS IFHAOISFHIUAFH ASKF HAISUFHASUIFL HASHF ASOIFU HASUIFH SAUHFASILFJ AOSILF AF Juasf hauksfh skfh asufh aiu ', 'Pending', '00:00:00', '2023-04-02'),
(978519, 'illumi2701@gmail.com', 'Test 1', 'Hello, This is a Test Message\r\n', 'Pending', '01:24:13', '2023-04-02'),
(978520, 'deez@nuts.com', '4-Needs-Good', 'Hello, Nigga * 2500\r\n\r\nSDas', 'Pending', '01:31:45', '2023-04-02'),
(978521, 'deez@nuts.com', 'ASD65a4', 'Hello,J OIAS DIA SDOIA SD', 'Pending', '01:37:22', '2023-04-02');

-- --------------------------------------------------------

--
-- Table structure for table `deletedaccounts`
--

CREATE TABLE `deletedaccounts` (
  `Account_number` int(99) NOT NULL,
  `Date` datetime NOT NULL DEFAULT current_timestamp(),
  `msg` text NOT NULL DEFAULT 'Your Account is Removed , Contact Bank to get more Information',
  `Reason` text NOT NULL DEFAULT 'Not Deposited Amount',
  `Reason_Code` int(3) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `deletedaccounts`
--

INSERT INTO `deletedaccounts` (`Account_number`, `Date`, `msg`, `Reason`, `Reason_Code`) VALUES
(192446, '2023-02-22 22:47:00', 'Your Account is Removed , Contact Bank to get more Information', 'Amount not Deposited', 1);

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE `loan` (
  `Application_ID` bigint(99) NOT NULL,
  `Account_number` bigint(99) UNSIGNED NOT NULL,
  `Debt` int(99) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Contact` bigint(12) NOT NULL,
  `Loan_recovered` int(99) NOT NULL DEFAULT 0,
  `Decision` varchar(30) NOT NULL DEFAULT 'Pending',
  `Decision_By` varchar(225) NOT NULL,
  `Date_Loan_Req` datetime NOT NULL DEFAULT current_timestamp(),
  `Package_ID` int(99) NOT NULL,
  `Package_Name` varchar(225) NOT NULL,
  `Package_Amount` int(99) NOT NULL,
  `Documents` varchar(10) NOT NULL DEFAULT 'Not',
  `Doc_Folder` varchar(50) NOT NULL DEFAULT 'Not Exist',
  `AdharCard` varchar(225) NOT NULL,
  `ChequeBook` varchar(225) NOT NULL,
  `Passbook` varchar(225) NOT NULL,
  `Photo` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `main`
--

CREATE TABLE `main` (
  `Account_number` bigint(99) UNSIGNED NOT NULL,
  `Sirname` varchar(100) NOT NULL,
  `Firstname` varchar(100) NOT NULL,
  `Fathername` varchar(100) NOT NULL,
  `Password` varchar(15) NOT NULL,
  `Img_Path` varchar(225) NOT NULL DEFAULT 'default.png',
  `Amount` int(99) NOT NULL,
  `Address` varchar(225) NOT NULL,
  `City` varchar(225) NOT NULL,
  `Pin_Code` int(6) NOT NULL,
  `State` varchar(225) NOT NULL,
  `Country` varchar(225) NOT NULL,
  `Date Of Birth` date NOT NULL,
  `Gender` varchar(50) NOT NULL,
  `Loan_taken` varchar(10) NOT NULL,
  `Loan_requested` varchar(10) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Contact` bigint(12) NOT NULL,
  `Has_recovery` varchar(10) NOT NULL DEFAULT 'No',
  `Date_Created` datetime NOT NULL DEFAULT current_timestamp(),
  `Created` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `main`
--

INSERT INTO `main` (`Account_number`, `Sirname`, `Firstname`, `Fathername`, `Password`, `Img_Path`, `Amount`, `Address`, `City`, `Pin_Code`, `State`, `Country`, `Date Of Birth`, `Gender`, `Loan_taken`, `Loan_requested`, `Email`, `Contact`, `Has_recovery`, `Date_Created`, `Created`) VALUES
(9786, 'Panja', 'Rayyan', 'Gulamhusen', '5555', 'USER-2023-Mar-19-64172e80cfd70.jpg', 55000, 'SomeWhere in This World', 'Veraval', 362265, 'Gujarat', 'India', '2004-01-27', 'Male', 'No', 'No', 'deez@nuts.com', 2365148595, 'No', '2023-03-19 21:15:40', 1),
(11111, 'Panja', 'Rayyan', 'Gulamhusen', '55555', 'USER-2023-Mar-24-641d631f4c189.jpg', 50100, 'SomeWhere in This World', 'Veraval', 362265, 'Gujarat', 'India', '2004-01-27', 'Male', 'No', 'No', 'illumi2701@gmail.com', 9601786974, 'No', '2023-03-24 14:14:48', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `Notification_For` bigint(20) UNSIGNED NOT NULL,
  `Notification` mediumtext NOT NULL,
  `Time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `Notification_For`, `Notification`, `Time`) VALUES
(5, 9786, 'A Total Amount of Rs.5100./- was Transferred to Your Account By Rayyan', '2023-04-01 20:20:08'),
(6, 11111, 'A Total Amount of Rs.100./- was Transferred to Your Account By Rayyan', '2023-04-02 14:19:31');

-- --------------------------------------------------------

--
-- Table structure for table `schemes`
--

CREATE TABLE `schemes` (
  `Scheme_ID` int(99) NOT NULL,
  `Scheme_Name` varchar(100) NOT NULL,
  `Sponsor` varchar(100) NOT NULL,
  `Package` int(99) NOT NULL,
  `Date_Added` date NOT NULL DEFAULT current_timestamp(),
  `Status` varchar(30) NOT NULL DEFAULT 'Active',
  `Users_Using` int(99) NOT NULL DEFAULT 0,
  `Max_Users` int(99) NOT NULL DEFAULT 5
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schemes`
--

INSERT INTO `schemes` (`Scheme_ID`, `Scheme_Name`, `Sponsor`, `Package`, `Date_Added`, `Status`, `Users_Using`, `Max_Users`) VALUES
(2421462, 'TEST 1', 'RAYYAN', 250000, '2023-02-11', 'Active', 4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `Receipt_No` int(99) NOT NULL,
  `From_Acc` bigint(99) UNSIGNED NOT NULL,
  `To_Acc` bigint(99) UNSIGNED NOT NULL,
  `Amount` int(99) NOT NULL,
  `Date` date NOT NULL DEFAULT current_timestamp(),
  `Time` time NOT NULL DEFAULT current_timestamp(),
  `DateTime` datetime NOT NULL DEFAULT current_timestamp(),
  `Receiver` varchar(100) NOT NULL,
  `Sender` varchar(100) NOT NULL,
  `Note` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`Receipt_No`, `From_Acc`, `To_Acc`, `Amount`, `Date`, `Time`, `DateTime`, `Receiver`, `Sender`, `Note`) VALUES
(1009190, 9786, 11111, 100, '2023-04-02', '19:49:31', '2023-04-02 19:49:31', 'Rayyan', 'Rayyan', 'Deezz');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_ID`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`Cid`);

--
-- Indexes for table `deletedaccounts`
--
ALTER TABLE `deletedaccounts`
  ADD PRIMARY KEY (`Account_number`);

--
-- Indexes for table `loan`
--
ALTER TABLE `loan`
  ADD PRIMARY KEY (`Application_ID`),
  ADD KEY `Loan_Account_Number` (`Account_number`);

--
-- Indexes for table `main`
--
ALTER TABLE `main`
  ADD PRIMARY KEY (`Account_number`),
  ADD KEY `sharing` (`Img_Path`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Notification_For` (`Notification_For`);

--
-- Indexes for table `schemes`
--
ALTER TABLE `schemes`
  ADD PRIMARY KEY (`Scheme_ID`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`Receipt_No`),
  ADD KEY `Transaction_From_Acc` (`From_Acc`),
  ADD KEY `Transaction_To_Acc` (`To_Acc`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Admin_ID` int(90) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `Cid` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=978522;

--
-- AUTO_INCREMENT for table `deletedaccounts`
--
ALTER TABLE `deletedaccounts`
  MODIFY `Account_number` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=860342;

--
-- AUTO_INCREMENT for table `loan`
--
ALTER TABLE `loan`
  MODIFY `Application_ID` bigint(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- AUTO_INCREMENT for table `main`
--
ALTER TABLE `main`
  MODIFY `Account_number` bigint(99) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=968346;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `schemes`
--
ALTER TABLE `schemes`
  MODIFY `Scheme_ID` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2421463;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `Receipt_No` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9320454;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `loan`
--
ALTER TABLE `loan`
  ADD CONSTRAINT `Loan_Account_Number` FOREIGN KEY (`Account_number`) REFERENCES `main` (`Account_number`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `Notification_For` FOREIGN KEY (`Notification_For`) REFERENCES `main` (`Account_number`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `Transaction_From_Acc` FOREIGN KEY (`From_Acc`) REFERENCES `main` (`Account_number`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Transaction_To_Acc` FOREIGN KEY (`To_Acc`) REFERENCES `main` (`Account_number`) ON DELETE CASCADE ON UPDATE CASCADE;

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `Delete_If_Zero` ON SCHEDULE EVERY 10 MINUTE STARTS '2023-02-22 08:02:00' ON COMPLETION PRESERVE ENABLE COMMENT 'Used to Delete If User Balance is 0' DO DELETE FROM main WHERE  `main`.`Amount` = 0 AND `main`.`Created` = 1$$

CREATE DEFINER=`root`@`localhost` EVENT `Inserting` ON SCHEDULE EVERY 8 MINUTE STARTS '2023-02-22 08:00:00' ON COMPLETION PRESERVE ENABLE COMMENT 'DELETE AND INSERT BOTH AT SAME TIME' DO -- Transfer data into deletedtables if amount = 0
INSERT INTO deletedaccounts (Account_number)
SELECT `Account_number` FROM main WHERE `main`.`Amount` = 0 AND `main`.`Created` = 1$$

CREATE DEFINER=`root`@`localhost` EVENT `RemoveNotification` ON SCHEDULE EVERY 2 MINUTE STARTS '2023-04-02 00:40:48' ON COMPLETION NOT PRESERVE ENABLE DO DELETE FROM notifications WHERE Time < DATE_SUB(NOW(), INTERVAL 2 MINUTE)$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

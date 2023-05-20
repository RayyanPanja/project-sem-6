-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2023 at 03:38 PM
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
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `Account` bigint(99) NOT NULL,
  `Amount` bigint(225) NOT NULL,
  `Amount_Before` bigint(225) NOT NULL,
  `Gap` bigint(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`Account`, `Amount`, `Amount_Before`, `Gap`) VALUES
(1345647541345687545, 55002000, 55002000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `Cid` bigint(99) UNSIGNED NOT NULL,
  `Email` varchar(99) NOT NULL,
  `Subject` varchar(225) NOT NULL,
  `Msg` longtext NOT NULL,
  `Response` longtext DEFAULT NULL,
  `Response_By` varchar(225) DEFAULT NULL,
  `Status` varchar(50) NOT NULL DEFAULT 'Pending',
  `Time` time NOT NULL DEFAULT current_timestamp(),
  `Date` date NOT NULL DEFAULT current_timestamp(),
  `Account` bigint(225) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE `loan` (
  `Application_ID` bigint(99) NOT NULL,
  `Account_number` bigint(99) UNSIGNED NOT NULL,
  `Debt` int(99) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Contact` bigint(12) NOT NULL,
  `Loan_recovered` int(99) NOT NULL DEFAULT 0,
  `Decision` varchar(30) NOT NULL DEFAULT 'Pending',
  `Decision_By` varchar(225) NOT NULL,
  `Date_Loan_Req` datetime NOT NULL DEFAULT current_timestamp(),
  `Package_ID` bigint(99) UNSIGNED DEFAULT NULL,
  `Package_Name` varchar(225) NOT NULL,
  `Package_Amount` int(99) NOT NULL,
  `Documents` varchar(10) NOT NULL DEFAULT 'Not',
  `Doc_Folder` varchar(50) NOT NULL DEFAULT 'Not Exist',
  `AdharCard` varchar(225) NOT NULL,
  `ChequeBook` varchar(225) NOT NULL,
  `Passbook` varchar(225) NOT NULL,
  `Photo` varchar(225) NOT NULL,
  `Date_Created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loan`
--

INSERT INTO `loan` (`Application_ID`, `Account_number`, `Debt`, `Name`, `Email`, `Contact`, `Loan_recovered`, `Decision`, `Decision_By`, `Date_Loan_Req`, `Package_ID`, `Package_Name`, `Package_Amount`, `Documents`, `Doc_Folder`, `AdharCard`, `ChequeBook`, `Passbook`, `Photo`, `Date_Created`) VALUES
(528773, 9786, 6200000, 'Rayyan', 'illumi2701@gmail.com', 9601786974, 0, 'Approved', 'Rayyan', '2023-05-20 18:39:56', 77760149196, 'WeBank Original', 5000000, 'Submitted', 'Rayyan@123-97866468c6d68e877-Documents', 'AdharCard.jpg', 'ChequeBook.png', 'Passbook.png', 'Photo.jpg', '2023-05-20 18:39:56'),
(4904940, 9786, 6200000, 'Rayyan', 'illumi2701@gmail.com', 9601786974, 0, 'Approved', 'Rayyan', '2023-05-20 18:56:54', 77760149196, 'WeBank Original', 5000000, 'Submitted', 'Rayyan@123-97866468cabae2978-Documents', 'AdharCard.jpg', 'ChequeBook.png', 'Passbook.jpg', 'Photo.jpg', '2023-05-20 18:56:54');

-- --------------------------------------------------------

--
-- Table structure for table `loan_packages`
--

CREATE TABLE `loan_packages` (
  `Package_ID` bigint(99) UNSIGNED NOT NULL,
  `Package_Name` varchar(100) NOT NULL,
  `Sponsor` varchar(100) NOT NULL,
  `Package_Amount` int(99) NOT NULL,
  `Interest` int(2) NOT NULL DEFAULT 5,
  `Loan_Term` int(2) NOT NULL DEFAULT 1,
  `Terms` longtext NOT NULL,
  `Date_Added` date NOT NULL DEFAULT current_timestamp(),
  `Status` tinyint(1) NOT NULL DEFAULT 1,
  `Users_Using` int(99) NOT NULL DEFAULT 0,
  `Max_Users` int(99) NOT NULL DEFAULT 5
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loan_packages`
--

INSERT INTO `loan_packages` (`Package_ID`, `Package_Name`, `Sponsor`, `Package_Amount`, `Interest`, `Loan_Term`, `Terms`, `Date_Added`, `Status`, `Users_Using`, `Max_Users`) VALUES
(77760149196, 'WeBank Original', 'Rayyan Panja', 5000000, 8, 3, '\r\nWB OFFICIAL@!@#@#ED', '2023-05-20', 1, 2, 10);

-- --------------------------------------------------------

--
-- Table structure for table `main`
--

CREATE TABLE `main` (
  `Account_number` bigint(99) UNSIGNED NOT NULL,
  `Username` varchar(100) DEFAULT NULL,
  `Sirname` varchar(100) NOT NULL,
  `Firstname` varchar(100) NOT NULL,
  `Fathername` varchar(100) NOT NULL,
  `Password` varchar(15) NOT NULL,
  `Amount` double NOT NULL,
  `Img_Path` varchar(225) NOT NULL DEFAULT 'default.png',
  `Address` varchar(225) NOT NULL,
  `City` varchar(225) NOT NULL,
  `Pin_Code` int(6) NOT NULL,
  `State` varchar(225) NOT NULL,
  `Country` varchar(225) NOT NULL,
  `Date_Of_Birth` date NOT NULL,
  `Gender` varchar(50) NOT NULL,
  `Loan_taken` tinyint(1) NOT NULL DEFAULT 0,
  `Loan_requested` tinyint(1) NOT NULL DEFAULT 0,
  `Email` varchar(100) NOT NULL,
  `Contact` bigint(12) NOT NULL,
  `Date_Created` datetime NOT NULL DEFAULT current_timestamp(),
  `Created` tinyint(1) NOT NULL DEFAULT 0,
  `Blocked` tinyint(1) NOT NULL DEFAULT 0,
  `Recovery` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `main`
--

INSERT INTO `main` (`Account_number`, `Username`, `Sirname`, `Firstname`, `Fathername`, `Password`, `Amount`, `Img_Path`, `Address`, `City`, `Pin_Code`, `State`, `Country`, `Date_Of_Birth`, `Gender`, `Loan_taken`, `Loan_requested`, `Email`, `Contact`, `Date_Created`, `Created`, `Blocked`, `Recovery`) VALUES
(9786, 'Rayyan@123', 'Panja', 'Rayyan', 'Gulamhusen', '55555', 5002000, 'USER-2023-May-19-646769cdb18ae.png', 'Turak Chora Old Patel Wada', ' Veraval', 362265, ' Gujarat', ' India', '2004-01-27', 'Male', 1, 1, 'illumi2701@gmail.com', 9601786974, '2023-05-19 17:50:34', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `Notification_For` bigint(20) UNSIGNED NOT NULL,
  `Notification_Type` varchar(225) NOT NULL DEFAULT 'Notification',
  `Notification` mediumtext NOT NULL,
  `Time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `Notification_For`, `Notification_Type`, `Notification`, `Time`) VALUES
(996980, 9786, 'Notification', 'Your Loan Application 4904940 has been Approved , Amount Has Been Transfered to Your Account!', '2023-05-20 13:27:35');

-- --------------------------------------------------------

--
-- Table structure for table `recovery`
--

CREATE TABLE `recovery` (
  `For_Account` bigint(225) UNSIGNED NOT NULL,
  `Recovery_Number` int(50) DEFAULT NULL,
  `Recovery_Word` varchar(50) DEFAULT NULL,
  `Tries` int(30) NOT NULL DEFAULT 0,
  `Date_Created` datetime NOT NULL DEFAULT current_timestamp(),
  `Date_Updated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rewards`
--

CREATE TABLE `rewards` (
  `Reward_ID` bigint(225) UNSIGNED NOT NULL,
  `For_Account` bigint(225) UNSIGNED NOT NULL,
  `Code` varchar(12) NOT NULL,
  `CashBack` double NOT NULL DEFAULT 0.423,
  `expires` datetime NOT NULL DEFAULT current_timestamp(),
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `Receipt_No` int(99) NOT NULL,
  `From_Acc` bigint(99) UNSIGNED DEFAULT NULL,
  `To_Acc` bigint(99) UNSIGNED DEFAULT NULL,
  `Amount` double NOT NULL,
  `Date` date NOT NULL DEFAULT current_timestamp(),
  `Time` time NOT NULL DEFAULT current_timestamp(),
  `DateTime` datetime NOT NULL DEFAULT current_timestamp(),
  `Receiver` varchar(100) DEFAULT NULL,
  `Sender` varchar(100) DEFAULT NULL,
  `Note` varchar(225) NOT NULL,
  `Backup` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_ID`),
  ADD UNIQUE KEY `Admin_Name` (`Admin_Name`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`Account`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`Cid`),
  ADD KEY `Comment_Has_Account` (`Account`),
  ADD KEY `Response_By` (`Response_By`);

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
  ADD KEY `Loan_Account_Number` (`Account_number`),
  ADD KEY `Package_ID` (`Package_ID`);

--
-- Indexes for table `loan_packages`
--
ALTER TABLE `loan_packages`
  ADD PRIMARY KEY (`Package_ID`);

--
-- Indexes for table `main`
--
ALTER TABLE `main`
  ADD PRIMARY KEY (`Account_number`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD KEY `sharing` (`Img_Path`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Notification_For` (`Notification_For`);

--
-- Indexes for table `recovery`
--
ALTER TABLE `recovery`
  ADD PRIMARY KEY (`For_Account`);

--
-- Indexes for table `rewards`
--
ALTER TABLE `rewards`
  ADD PRIMARY KEY (`Reward_ID`),
  ADD UNIQUE KEY `Reward_Code` (`Code`),
  ADD KEY `Reward_For` (`For_Account`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`Receipt_No`),
  ADD KEY `Transaction_From_Acc` (`From_Acc`),
  ADD KEY `Transaction_To_Acc` (`To_Acc`),
  ADD KEY `Transaction_From` (`Sender`),
  ADD KEY `Transaction_To` (`Receiver`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Admin_ID` int(90) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `Account` bigint(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1345647541345687546;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `Cid` bigint(99) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=978530;

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
-- AUTO_INCREMENT for table `loan_packages`
--
ALTER TABLE `loan_packages`
  MODIFY `Package_ID` bigint(99) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91743190614;

--
-- AUTO_INCREMENT for table `main`
--
ALTER TABLE `main`
  MODIFY `Account_number` bigint(99) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1345647541345687546;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=996981;

--
-- AUTO_INCREMENT for table `recovery`
--
ALTER TABLE `recovery`
  MODIFY `For_Account` bigint(225) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9787;

--
-- AUTO_INCREMENT for table `rewards`
--
ALTER TABLE `rewards`
  MODIFY `Reward_ID` bigint(225) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98648920509;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `Receipt_No` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9669098;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `Comment_Has_Account` FOREIGN KEY (`Account`) REFERENCES `main` (`Account_number`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Response_By` FOREIGN KEY (`Response_By`) REFERENCES `admin` (`Admin_Name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `loan`
--
ALTER TABLE `loan`
  ADD CONSTRAINT `Loan_Account_Number` FOREIGN KEY (`Account_number`) REFERENCES `main` (`Account_number`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Package_ID` FOREIGN KEY (`Package_ID`) REFERENCES `loan_packages` (`Package_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `Notification_For` FOREIGN KEY (`Notification_For`) REFERENCES `main` (`Account_number`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `recovery`
--
ALTER TABLE `recovery`
  ADD CONSTRAINT `Recovery_For_Acc` FOREIGN KEY (`For_Account`) REFERENCES `main` (`Account_number`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rewards`
--
ALTER TABLE `rewards`
  ADD CONSTRAINT `Reward_For` FOREIGN KEY (`For_Account`) REFERENCES `main` (`Account_number`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `Transaction_From` FOREIGN KEY (`Sender`) REFERENCES `main` (`Username`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `Transaction_From_Acc` FOREIGN KEY (`From_Acc`) REFERENCES `main` (`Account_number`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `Transaction_To` FOREIGN KEY (`Receiver`) REFERENCES `main` (`Username`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `Transaction_To_Acc` FOREIGN KEY (`To_Acc`) REFERENCES `main` (`Account_number`) ON DELETE SET NULL ON UPDATE CASCADE;

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `Delete_If_Zero` ON SCHEDULE EVERY 10 SECOND STARTS '2023-02-22 08:02:00' ON COMPLETION PRESERVE ENABLE COMMENT 'Used to Delete If User Balance is 0' DO DELETE FROM main WHERE  `main`.`Amount` = 0 AND `main`.`Created` = 1$$

CREATE DEFINER=`root`@`localhost` EVENT `Inserting` ON SCHEDULE EVERY 6 SECOND STARTS '2023-02-22 08:00:00' ON COMPLETION PRESERVE ENABLE COMMENT 'DELETE AND INSERT BOTH AT SAME TIME' DO -- Transfer data into deletedtables if amount = 0
INSERT INTO deletedaccounts (Account_number)
SELECT `Account_number` FROM main WHERE `main`.`Amount` = 0 AND `main`.`Created` = 1$$

CREATE DEFINER=`root`@`localhost` EVENT `RemoveNotification` ON SCHEDULE EVERY 2 MINUTE STARTS '2023-04-02 00:40:48' ON COMPLETION NOT PRESERVE DISABLE DO DELETE FROM notifications WHERE Time < DATE_SUB(NOW(), INTERVAL 2 MINUTE)$$

CREATE DEFINER=`root`@`localhost` EVENT `Expire_Rewards` ON SCHEDULE EVERY 1 DAY STARTS '2023-05-02 15:16:17' ON COMPLETION NOT PRESERVE ENABLE DO DELETE FROM rewards WHERE expires = CURDATE()$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

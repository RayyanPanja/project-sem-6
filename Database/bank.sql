-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2023 at 05:07 PM
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
(14406, 'oozef@gmail.com', 'xupbscv', 'ocuhzzgyvlniliemknki', 'gmpzfq', '19:26:48', '2023-04-23'),
(17609, 'lwbyx@gmail.com', 'vuagbxj', 'blueutpioioseggwaszo', 'thlwto', '19:26:48', '2023-04-23'),
(26926, 'ujpro@gmail.com', 'wlfiflm', 'xcgukizgujurvhzpzvfm', 'nbssam', '19:26:48', '2023-04-23'),
(33368, 'ydkwk@gmail.com', 'yseygao', 'icpyaknyvoksncrzkupo', 'fivjuc', '19:26:48', '2023-04-23'),
(34053, 'piuoe@gmail.com', 'aprdebx', 'xhuagvkxlxixdfquhpgk', 'lfutxw', '19:26:48', '2023-04-23'),
(34458, 'nicvh@gmail.com', 'cjypyds', 'fsowbpvlqwsvditznubz', 'gxisiu', '19:26:48', '2023-04-23'),
(39405, 'woami@gmail.com', 'jxdyteo', 'zisnwhydpxqcnmdhpuxs', 'zjnzwu', '19:26:48', '2023-04-23'),
(45026, 'pnrga@gmail.com', 'zeixczq', 'pquyagaygjwriepwgypn', 'hjbytc', '19:26:48', '2023-04-23'),
(47610, 'uivtl@gmail.com', 'rzpahry', 'lahiwedqmqfztcqzgubg', 'zosrep', '19:26:48', '2023-04-23'),
(49272, 'lajnt@gmail.com', 'gqhfvni', 'jksifkdfwflmrzviksep', 'qhxxor', '19:26:48', '2023-04-23'),
(50217, 'uoiim@gmail.com', 'bffktss', 'bhqbxpmgounzkxbuccjz', 'glkgaf', '19:26:48', '2023-04-23'),
(54190, 'seasi@gmail.com', 'dnplgdv', 'xpnyubhaouixpjputtfa', 'qoxpog', '19:26:48', '2023-04-23'),
(59106, 'xebtp@gmail.com', 'poknehi', 'qaaqianlonrxqpjperwo', 'xtcgfh', '19:26:48', '2023-04-23'),
(66585, 'skdyq@gmail.com', 'tnfwgsq', 'axfoydcolzmxqyyehvtc', 'jcrvyy', '19:26:48', '2023-04-23'),
(67354, 'etgra@gmail.com', 'fslklmr', 'clppzwjjraxxhcgywfvl', 'nzugdo', '19:26:48', '2023-04-23'),
(73359, 'esqgz@gmail.com', 'uqspwho', 'fiskdlsxvqwhnwjiudal', 'ajyhxn', '19:26:48', '2023-04-23'),
(74256, 'jkayg@gmail.com', 'cvlxybs', 'xpuhvzaqgwsevfltuncw', 'wcydzt', '19:26:48', '2023-04-23'),
(75154, 'izzet@gmail.com', 'nealtdx', 'cktutuqabwiajrvbzywa', 'jxczds', '19:26:48', '2023-04-23'),
(89647, 'xklts@gmail.com', 'aqfdvmk', 'ilurgxwtlpypwdqccras', 'nffekm', '19:26:48', '2023-04-23'),
(91632, 'zbbpm@gmail.com', 'nzwhbgd', 'znlyywlspchgjfzzxjxu', 'gkmqoe', '19:26:48', '2023-04-23');

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
  `Date Of Birth` date NOT NULL,
  `Gender` varchar(50) NOT NULL,
  `Loan_taken` varchar(10) NOT NULL,
  `Loan_requested` varchar(10) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Contact` bigint(12) NOT NULL,
  `Date_Created` datetime NOT NULL DEFAULT current_timestamp(),
  `Created` tinyint(1) NOT NULL DEFAULT 0,
  `Blocked` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `main`
--

INSERT INTO `main` (`Account_number`, `Username`, `Sirname`, `Firstname`, `Fathername`, `Password`, `Amount`, `Img_Path`, `Address`, `City`, `Pin_Code`, `State`, `Country`, `Date Of Birth`, `Gender`, `Loan_taken`, `Loan_requested`, `Email`, `Contact`, `Date_Created`, `Created`, `Blocked`) VALUES
(9786, 'Rayyan@123', 'Panja', 'Rayyan', 'Gulamhusen', '55555', 24900, 'USER-2023-Apr-23-64453ab5baeb8.png', 'SomeWhere in This World', 'Veraval', 362265, 'Gujarat', 'India', '2004-01-27', 'Male', 'No', 'No', 'illumi2701@gmail.com', 9601786973, '2023-04-23 19:32:54', 1, 1);

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
(121216, 9786, 'A Total Amount of Rs.100./- was Transferred to Your Account By Rayyan@123', '2023-04-23 14:41:11'),
(121217, 9786, 'A Total Amount of Rs.100./- was Transferred to Your Account By Rayyan@123', '2023-04-23 14:41:37');

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
  `From_Acc` bigint(99) UNSIGNED DEFAULT NULL,
  `To_Acc` bigint(99) UNSIGNED DEFAULT NULL,
  `Amount` double NOT NULL,
  `Date` date NOT NULL DEFAULT current_timestamp(),
  `Time` time NOT NULL DEFAULT current_timestamp(),
  `DateTime` datetime NOT NULL DEFAULT current_timestamp(),
  `Receiver` varchar(100) DEFAULT NULL,
  `Sender` varchar(100) DEFAULT NULL,
  `Note` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`Receipt_No`, `From_Acc`, `To_Acc`, `Amount`, `Date`, `Time`, `DateTime`, `Receiver`, `Sender`, `Note`) VALUES
(9160811, 9786, 9786, 100, '2023-04-23', '20:11:11', '2023-04-23 20:11:11', 'Rayyan@123', 'Rayyan@123', 'Test');

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
  ADD UNIQUE KEY `Username` (`Username`),
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
  MODIFY `Admin_ID` int(90) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `Cid` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=978523;

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
  MODIFY `Account_number` bigint(99) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123456790;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121218;

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
  ADD CONSTRAINT `Transaction_From` FOREIGN KEY (`Sender`) REFERENCES `main` (`Username`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `Transaction_From_Acc` FOREIGN KEY (`From_Acc`) REFERENCES `main` (`Account_number`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `Transaction_To` FOREIGN KEY (`Receiver`) REFERENCES `main` (`Username`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `Transaction_To_Acc` FOREIGN KEY (`To_Acc`) REFERENCES `main` (`Account_number`) ON DELETE SET NULL ON UPDATE CASCADE;

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

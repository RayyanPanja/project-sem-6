-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2023 at 06:05 PM
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
  `Cid` bigint(99) UNSIGNED NOT NULL,
  `Reference_to_Message` bigint(99) UNSIGNED DEFAULT NULL,
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

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`Cid`, `Reference_to_Message`, `Email`, `Subject`, `Msg`, `Response`, `Response_By`, `Status`, `Time`, `Date`, `Account`) VALUES
(82793, NULL, 'illumi2701@gmail.com', 'Review', 'Hello User\r\nAVASVSa', NULL, NULL, 'Pending', '21:18:02', '2023-05-10', 9786),
(135626, NULL, 'illumi2701@gmail.com', 'Follow up Question-82793', 'Hey Nigga', NULL, NULL, 'Pending', '21:18:14', '2023-05-10', 9786),
(342571, NULL, 'illumi2701@gmail.com', 'Follow up Question-135626', 'Fuck You Nigga', NULL, NULL, 'Pending', '21:19:10', '2023-05-10', 9786),
(978528, 135626, '', '', '', NULL, NULL, 'Pending', '21:18:14', '2023-05-10', NULL),
(978529, 342571, '', '', '', NULL, NULL, 'Pending', '21:19:10', '2023-05-10', NULL);

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

--
-- Dumping data for table `loan`
--

INSERT INTO `loan` (`Application_ID`, `Account_number`, `Debt`, `Name`, `Email`, `Contact`, `Loan_recovered`, `Decision`, `Decision_By`, `Date_Loan_Req`, `Package_ID`, `Package_Name`, `Package_Amount`, `Documents`, `Doc_Folder`, `AdharCard`, `ChequeBook`, `Passbook`, `Photo`) VALUES
(5553933, 9786, 0, 'Rayyan', 'illumi2701@gmail.com', 9601786974, 0, 'Pending', '', '2023-05-06 13:14:17', 987654321, 'Naruto', 10253046, 'Not', 'Exists', 'AdharCard.jpg', 'ChequeBook.jpg', 'Passbook.png', 'Photo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `loan_packages`
--

CREATE TABLE `loan_packages` (
  `Package_ID` int(99) NOT NULL,
  `Package_Name` varchar(100) NOT NULL,
  `Sponsor` varchar(100) NOT NULL,
  `Package_Amount` int(99) NOT NULL,
  `Terms` longtext NOT NULL,
  `Date_Added` date NOT NULL DEFAULT current_timestamp(),
  `Status` varchar(30) NOT NULL DEFAULT 'Active',
  `Users_Using` int(99) NOT NULL DEFAULT 0,
  `Max_Users` int(99) NOT NULL DEFAULT 5
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loan_packages`
--

INSERT INTO `loan_packages` (`Package_ID`, `Package_Name`, `Sponsor`, `Package_Amount`, `Terms`, `Date_Added`, `Status`, `Users_Using`, `Max_Users`) VALUES
(123456789, 'One Piece', 'Monkey D. Luffy', 100000000, 'i have 50% intrest Rate Because i am a Pirate', '2023-05-04', 'Active', 0, 5),
(987654321, 'Naruto', 'Itachi', 10253046, 'i have 0% intrest rate because it is haram', '2023-05-04', 'Active', 0, 5);

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
  `Loan_taken` varchar(10) NOT NULL,
  `Loan_requested` varchar(10) NOT NULL,
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
(1234, 'ACSA@123', 'DASD', 'ACSA', 'ASVASF', '00000', 13810, 'USER-2023-Apr-28-644bb0ec15128.svg', 'SomeWhere in This World', 'asfafe', 125684, 'AScavfe', 'VEafva', '2542-12-11', 'Female', 'No', 'No', 'deez@nuts.com', 5165478650, '2023-04-28 17:09:01', 1, 0, 0),
(9786, 'Rayyan@123', 'Panja', 'Rayyan', 'Gulamhusen', '55555', 24506.66, 'USER-2023-Apr-27-644aa60f4aa1a.png', 'Turak Chora Old Patel Wada', 'Veraval', 362265, 'Gujarat', 'India', '2004-01-27', 'Male', 'No', 'No', 'illumi2701@gmail.com', 9601786974, '2023-04-23 19:32:54', 1, 0, 1),
(23715, 'ACZA@135', 'BRANCH', 'TEST', '3', '222222', 0, 'USER-2023-May-06-6456900468e13.png', 'Turak Chora Old Patel Wada', ' Veraval', 362265, ' Gujarat ', ' India', '2023-05-06', 'Male', 'No', 'No', 'aswd@fasf.com', 13221, '2023-05-06 22:43:09', 0, 0, 0),
(25602, 'Branch@asd123', 'BRANCH', 'TEST', '4', '111111', 0, 'USER-2023-May-08-6458d1558c1be.svg', 'Deez asdf ', ' VASC', 365486, ' vsavase ', ' BASasc', '2023-05-08', 'Male', 'No', 'No', 'test@Branch.in', 65236, '2023-05-08 16:08:20', 0, 0, 0);

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
(2320, 1234, 'Notification', '500 has Been Transfered to Your Account By Rayyan@123', '2023-05-02 10:34:21'),
(65516, 1234, 'Notification', '200 has Been Transfered to Your Account By Rayyan@123', '2023-05-04 11:06:56'),
(76684, 1234, 'Notification', '1000 has Been Transfered to Your Account By Rayyan@123', '2023-05-04 18:29:43'),
(92808, 1234, 'Notification', '200 has Been Transfered to Your Account By Rayyan@123', '2023-05-02 14:16:24'),
(94841, 1234, 'Notification', '200 has Been Transfered to Your Account By Rayyan@123', '2023-05-04 18:38:43'),
(97201, 9786, 'Notification', '200 Debited From Your Account , Transferred To ACSA@123', '2023-05-04 18:38:27'),
(124924, 1234, 'Notification', '300 has Been Transfered to Your Account By Rayyan@123', '2023-05-02 10:45:29'),
(160637, 1234, 'Notification', '1000 has Been Transfered to Your Account By Rayyan@123', '2023-05-04 11:36:01'),
(231712, 9786, 'Notification', '200 Debited From Your Account , Transferred To ACSA@123', '2023-05-04 18:39:03'),
(237643, 1234, 'Notification', '200 has Been Transfered to Your Account By Rayyan@123', '2023-05-02 11:56:26'),
(238609, 1234, 'Notification', '200 has Been Transfered to Your Account By Rayyan@123', '2023-05-04 18:38:27'),
(245076, 1234, 'Notification', '200 has Been Transfered to Your Account By Rayyan@123', '2023-05-04 18:41:41'),
(298636, 9786, 'Notification', '200 Debited From Your Account , Transferred To ACSA@123', '2023-05-06 17:43:08'),
(301795, 1234, 'Notification', '1000 has Been Transfered to Your Account By Rayyan@123', '2023-05-04 11:07:17'),
(320175, 1234, 'Notification', '200 has Been Transfered to Your Account By Rayyan@123', '2023-05-04 18:39:32'),
(322618, 1234, 'Notification', '500 has Been Transfered to Your Account By Rayyan@123', '2023-05-04 11:15:54'),
(394131, 9786, 'Notification', '200 Debited From Your Account , Transferred To ACSA@123', '2023-05-04 18:38:43'),
(398240, 9786, 'Notification', '200 Debited From Your Account , Transferred To ACSA@123', '2023-05-04 18:41:41'),
(412544, 1234, 'Notification', '200 has Been Transfered to Your Account By Rayyan@123', '2023-05-02 14:17:33'),
(505798, 1234, 'Notification', '200 has Been Transfered to Your Account By Rayyan@123', '2023-05-04 11:06:26'),
(517540, 1234, 'Notification', '200 has Been Transfered to Your Account By Rayyan@123', '2023-05-02 14:20:12'),
(521985, 1234, 'Notification', '1000 has Been Transfered to Your Account By Rayyan@123', '2023-05-04 11:33:34'),
(561898, 1234, 'Notification', '200 has Been Transfered to Your Account By Rayyan@123', '2023-05-02 10:46:51'),
(574419, 9786, 'Notification', '200 Debited From Your Account , Transferred To ACSA@123', '2023-05-04 18:39:32'),
(589035, 1234, 'Notification', '200 has Been Transfered to Your Account By Rayyan@123', '2023-05-04 11:37:56'),
(594577, 1234, 'Notification', '200 has Been Transfered to Your Account By Rayyan@123', '2023-05-04 18:39:03'),
(600278, 9786, 'Notification', '426.66 CashBack Redeemed!!!', '2023-05-06 17:43:08'),
(601864, 9786, 'Notification', '99.1 CashBack Redeemed!!!', '2023-05-04 18:41:41'),
(659151, 1234, 'Notification', '1000 has Been Transfered to Your Account By Rayyan@123', '2023-05-04 11:39:51'),
(662833, 9786, 'Notification', '5000 Debited From Your Account , Transferred To ACSA@123', '2023-05-04 19:35:08'),
(687007, 1234, 'Notification', '300 has Been Transfered to Your Account By Rayyan@123', '2023-05-04 11:05:08'),
(705727, 1234, 'Notification', '200 has Been Transfered to Your Account By Rayyan@123', '2023-05-04 11:16:32'),
(715541, 1234, 'Notification', '1000 has Been Transfered to Your Account By Rayyan@123', '2023-05-02 10:35:34'),
(741332, 1234, 'Notification', '200 has Been Transfered to Your Account By Rayyan@123', '2023-05-06 17:43:08'),
(754129, 1234, 'Notification', '200 has Been Transfered to Your Account By Rayyan@123', '2023-05-04 18:35:37'),
(890035, 1234, 'Notification', '200 has Been Transfered to Your Account By Rayyan@123', '2023-05-02 15:06:39'),
(896776, 1234, 'Notification', '5000 has Been Transfered to Your Account By Rayyan@123', '2023-05-04 19:35:08'),
(904133, 1234, 'Notification', '200 has Been Transfered to Your Account By Rayyan@123', '2023-05-04 11:28:19'),
(916678, 9786, 'Notification', '98.74 CashBack Redeemed!!!', '2023-05-04 18:39:32'),
(969127, 1234, 'Notification', '200 has Been Transfered to Your Account By Rayyan@123', '2023-05-04 11:08:54'),
(983576, 9786, 'Notification', 'Amount 5000  Deposited to Your Account: 9786, Total Amount: 49280.1', '2023-05-04 19:25:46');

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

--
-- Dumping data for table `recovery`
--

INSERT INTO `recovery` (`For_Account`, `Recovery_Number`, `Recovery_Word`, `Tries`, `Date_Created`, `Date_Updated`) VALUES
(9786, 123465789, 'deez-nuts', 0, '2023-04-28 15:27:27', '2023-04-28 15:27:27');

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

--
-- Dumping data for table `rewards`
--

INSERT INTO `rewards` (`Reward_ID`, `For_Account`, `Code`, `CashBack`, `expires`, `date_created`) VALUES
(6970669373, 9786, 'QO0-T2V-LL', 239.07, '2023-05-11 00:00:00', '2023-05-05 01:05:08'),
(17988016842, 9786, '4GF-K13-7L', 115.04, '2023-05-07 00:00:00', '2023-05-05 01:04:44'),
(21685440594, 9786, '7Q0-ZP3-4G', 171.3, '2023-05-07 00:00:00', '2023-05-05 01:01:53'),
(25814806112, 9786, 'Z7D-VM8-9O', 92.31, '2023-05-08 00:00:00', '2023-05-05 00:09:03'),
(28392617578, 9786, 'GX4-AC3-UC', 401.07, '2023-05-11 00:00:00', '2023-05-05 01:04:28');

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
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`Receipt_No`, `From_Acc`, `To_Acc`, `Amount`, `Date`, `Time`, `DateTime`, `Receiver`, `Sender`, `Note`, `Backup`) VALUES
(440621, 9786, 1234, 200, '2023-05-04', '16:58:19', '2023-05-04 16:58:19', 'ACSA@123', 'Rayyan@123', 'ASc', 'Rayyan@123'),
(1049670, 9786, 1234, 200, '2023-05-05', '00:09:03', '2023-05-05 00:09:03', 'ACSA@123', 'Rayyan@123', 'dasdas', 'Rayyan@123'),
(3964648, 9786, 1234, 200, '2023-05-05', '00:11:41', '2023-05-05 00:11:41', 'ACSA@123', 'Rayyan@123', 'Hello', 'Rayyan@123'),
(4205223, 9786, 1234, 200, '2023-05-05', '00:09:32', '2023-05-05 00:09:32', 'ACSA@123', 'Rayyan@123', 'Hello', 'Rayyan@123'),
(4598699, 9786, 1234, 200, '2023-05-05', '00:08:43', '2023-05-05 00:08:43', 'ACSA@123', 'Rayyan@123', 'sfasf', 'Rayyan@123'),
(4764349, 9786, 1234, 1000, '2023-05-04', '23:59:43', '2023-05-04 23:59:43', 'ACSA@123', 'Rayyan@123', 'A', 'Rayyan@123'),
(6009794, 9786, 1234, 1000, '2023-05-04', '17:09:51', '2023-05-04 17:09:51', 'ACSA@123', 'Rayyan@123', 'HELLOWW', 'Rayyan@123'),
(6306161, 9786, 1234, 200, '2023-05-05', '00:08:27', '2023-05-05 00:08:27', 'ACSA@123', 'Rayyan@123', 'sadasd', 'Rayyan@123'),
(6858181, 9786, 1234, 200, '2023-05-05', '00:05:37', '2023-05-05 00:05:37', 'ACSA@123', 'Rayyan@123', 'asd', 'Rayyan@123'),
(7842824, 9786, 1234, 1000, '2023-05-04', '17:03:34', '2023-05-04 17:03:34', 'ACSA@123', 'Rayyan@123', 'ASF', 'Rayyan@123'),
(7939110, 9786, 1234, 1000, '2023-05-04', '17:06:01', '2023-05-04 17:06:01', 'ACSA@123', 'Rayyan@123', 'ASD', 'Rayyan@123'),
(7945418, 9786, 1234, 5000, '2023-05-05', '01:05:08', '2023-05-05 01:05:08', 'ACSA@123', 'Rayyan@123', '9786', 'Rayyan@123'),
(8064413, 9786, 1234, 200, '2023-05-04', '17:07:56', '2023-05-04 17:07:56', 'ACSA@123', 'Rayyan@123', '1000', 'Rayyan@123'),
(9166971, 9786, 1234, 200, '2023-05-06', '23:13:08', '2023-05-06 23:13:08', 'ACSA@123', 'Rayyan@123', 'bb', 'Rayyan@123');

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
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`Cid`),
  ADD KEY `Comment_Has_Account` (`Account`),
  ADD KEY `Reference_to` (`Reference_to_Message`),
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
  ADD KEY `Loan_Account_Number` (`Account_number`);

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
  MODIFY `Admin_ID` int(90) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `Package_ID` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=987654322;

--
-- AUTO_INCREMENT for table `main`
--
ALTER TABLE `main`
  MODIFY `Account_number` bigint(99) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123456790;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=983577;

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
  ADD CONSTRAINT `Reference_to` FOREIGN KEY (`Reference_to_Message`) REFERENCES `comment` (`Cid`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `Response_By` FOREIGN KEY (`Response_By`) REFERENCES `admin` (`Admin_Name`) ON DELETE CASCADE ON UPDATE CASCADE;

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
CREATE DEFINER=`root`@`localhost` EVENT `Delete_If_Zero` ON SCHEDULE EVERY 10 MINUTE STARTS '2023-02-22 08:02:00' ON COMPLETION PRESERVE ENABLE COMMENT 'Used to Delete If User Balance is 0' DO DELETE FROM main WHERE  `main`.`Amount` = 0 AND `main`.`Created` = 1$$

CREATE DEFINER=`root`@`localhost` EVENT `Inserting` ON SCHEDULE EVERY 8 MINUTE STARTS '2023-02-22 08:00:00' ON COMPLETION PRESERVE ENABLE COMMENT 'DELETE AND INSERT BOTH AT SAME TIME' DO -- Transfer data into deletedtables if amount = 0
INSERT INTO deletedaccounts (Account_number)
SELECT `Account_number` FROM main WHERE `main`.`Amount` = 0 AND `main`.`Created` = 1$$

CREATE DEFINER=`root`@`localhost` EVENT `RemoveNotification` ON SCHEDULE EVERY 2 MINUTE STARTS '2023-04-02 00:40:48' ON COMPLETION NOT PRESERVE DISABLE DO DELETE FROM notifications WHERE Time < DATE_SUB(NOW(), INTERVAL 2 MINUTE)$$

CREATE DEFINER=`root`@`localhost` EVENT `Expire_Rewards` ON SCHEDULE EVERY 1 DAY STARTS '2023-05-02 15:16:17' ON COMPLETION NOT PRESERVE ENABLE DO DELETE FROM rewards WHERE expires = CURDATE()$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

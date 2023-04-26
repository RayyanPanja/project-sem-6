-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2023 at 08:05 PM
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
  `Date` date NOT NULL DEFAULT current_timestamp(),
  `Account` bigint(225) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`Cid`, `Email`, `Subject`, `Msg`, `Status`, `Time`, `Date`, `Account`) VALUES
(10364, 'robir@gmail.com', 'zczkylu', 'xacxjxehamugpkodsjwa', 'Pending', '23:30:24', '2023-04-25', NULL),
(24648, 'gydkn@gmail.com', 'hhqxwrl', 'kerwdlqututqvuchknqr', 'Pending', '23:30:24', '2023-04-25', NULL),
(27259, 'jkrnq@gmail.com', 'riignlw', 'yllnmttvqxopwxnjtser', 'Pending', '23:30:24', '2023-04-25', NULL),
(28548, 'ndton@gmail.com', 'ysljkvr', 'jssflsiungacxilprpga', 'Pending', '23:30:24', '2023-04-25', NULL),
(34580, 'shaql@gmail.com', 'gusdeld', 'iahynggzytndyoxcwxnz', 'Pending', '23:30:24', '2023-04-25', NULL),
(35199, 'ophyq@gmail.com', 'ddkntua', 'ccpfxgperaekundnrnbb', 'Pending', '23:30:24', '2023-04-25', NULL),
(48231, 'ntxxp@gmail.com', 'vfaeioc', 'dtvhoedwxjkirtkiizgh', 'Pending', '23:30:24', '2023-04-25', NULL),
(49318, 'uemrf@gmail.com', 'dmyxndp', 'yucnftpfjfrdiyulkope', 'Pending', '23:30:24', '2023-04-25', NULL),
(56849, 'xqclp@gmail.com', 'yjxodfw', 'vxjvsgrxbehsomxcyyuv', 'Pending', '23:30:24', '2023-04-25', NULL),
(58413, 'awgcb@gmail.com', 'ftmkibs', 'dqjgcfvcqmsrmxalgbgm', 'Pending', '23:30:24', '2023-04-25', NULL),
(60198, 'mbbuk@gmail.com', 'klbsbuw', 'dnsyypvsgldkpcrzhxkk', 'Pending', '23:30:24', '2023-04-25', NULL),
(61834, 'nkfkm@gmail.com', 'gpldozk', 'zjdvqnhaycngzlzxcvto', 'Pending', '23:30:24', '2023-04-25', NULL),
(63065, 'xmjdd@gmail.com', 'gullpbh', 'jazeclcgvsozsjpzgfjm', 'Pending', '23:30:24', '2023-04-25', NULL),
(66746, 'dgdmi@gmail.com', 'cizckke', 'seuyxehjraztzvhxvitd', 'Pending', '23:30:24', '2023-04-25', NULL),
(67777, 'efitd@gmail.com', 'nnsgauq', 'rwecxilfevmtakqqvsmf', 'Pending', '23:30:24', '2023-04-25', NULL),
(86782, 'oolew@gmail.com', 'rzttdrn', 'tfhfyecqgrqdmcorpbac', 'Pending', '23:30:24', '2023-04-25', NULL),
(91185, 'jgitm@gmail.com', 'rzgwqso', 'trputvvhegqtzvcnssjj', 'Pending', '23:30:24', '2023-04-25', NULL),
(97329, 'jcddj@gmail.com', 'feyeuzh', 'ciolthxovmdzkdtnsjpv', 'Pending', '23:30:24', '2023-04-25', NULL),
(99661, 'ufbrr@gmail.com', 'kmjhkfo', 'vmezzhcuufbtufbinkbr', 'Pending', '23:30:24', '2023-04-25', NULL),
(99797, 'yfxwz@gmail.com', 'iwjyraz', 'qjzcfzxudqbqimqjelky', 'Pending', '23:30:24', '2023-04-25', NULL);

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
(9786, 'Rayyan@123', 'Panja', 'Rayyan', 'Gulamhusen', '55555', 45700, 'USER-2023-Apr-23-64453ab5baeb8.png', 'SomeWhere in This World', 'Veraval', 362265, 'Gujarat', 'India', '2004-01-27', 'Male', 'No', 'No', 'illumi2701@gmail.com', 9601786973, '2023-04-23 19:32:54', 1, 0),
(13268, 'xvfjm@700', 'tqcjha', 'vtrqud', 'qfhctc', '81982602', 7023, 'fotyydwhinsvsccpyphypijmonztpb.png', 'cuspzpucinesytaqeudb', 'afxlracylb', 760716, 'klibfwtwkv', 'iztbbmjtip', '2013-01-06', 'Male', 'No', 'No', 'ymgwbd@gmail.com', 54638887, '2023-04-25 19:02:50', 1, 0),
(34555, 'rkunk@243', 'ezbtcr', 'szmrbx', 'shxygh', '62095975', 1767, 'zirqxsgmtkvrbozlsjkedmrjteylsw.png', 'ecmhvnpjlsmlzgusjvag', 'hvrmukiqjp', 964604, 'llcngbljrd', 'iidckfubwp', '2008-10-17', 'Male', 'No', 'No', 'mykfck@gmail.com', 92595786, '2023-04-25 19:02:50', 1, 0),
(49492, 'jczye@741', 'ojekpr', 'zxeljy', 'jkykxb', '85664572', 2866, 'djdvkrvdudskovzmxdmdyevqzsoesv.png', 'ypxsjmynxjvyjvqitdqs', 'ljrarcvsdn', 219645, 'svgrbrgrrj', 'jfclnqpncj', '2015-01-12', 'Male', 'No', 'No', 'ixsmsx@gmail.com', 76266110, '2023-04-25 19:02:50', 1, 0),
(49855, 'btgqy@867', 'torggf', 'adbjrf', 'xoqgrg', '58199889', 8412, 'fuhfamxektyuqcrjicrimtyqtydhgf.png', 'qwukhgdhyyadkepqiqou', 'tcpzubqmhl', 803610, 'xfdqhdlhyh', 'mwfffswpqa', '2018-02-18', 'Male', 'No', 'No', 'njzuuh@gmail.com', 19581650, '2023-04-25 19:02:50', 1, 0),
(65761, 'teixy@851', 'wmsolz', 'teinco', 'gyqzzd', '99206533', 1217, 'xizwwyfphuhevpfhdchrfbnnllkvdw.png', 'mcxrlcuufuaokufedzrm', 'tuugpjeetd', 262696, 'uzuznankws', 'wgbccavjxl', '2003-04-02', 'Male', 'No', 'No', 'heipfl@gmail.com', 50986774, '2023-04-25 19:02:50', 1, 0),
(68199, 'tfgog@509', 'nvgnkf', 'ghpyng', 'dczihr', '67156968', 3616, 'fakthapsbispztgvzahinobnqspsog.png', 'kkuplkeudygziorcuckm', 'yqckrqisbk', 524619, 'rrxsdykzwl', 'pxxjzuszoy', '2018-09-05', 'Male', 'No', 'No', 'iaryhq@gmail.com', 20988274, '2023-04-25 19:02:50', 1, 0),
(73519, 'hgpro@880', 'vxjtje', 'zrmldo', 'fgycyv', '74868922', 6602, 'agwiddhdfwgeurfdfpcmcnyvwbjlzv.png', 'vrottomjculcvwxvwskd', 'nemkoonapg', 811639, 'sclgdmqcjq', 'ijucrvabxg', '2004-07-08', 'Male', 'No', 'No', 'kugcmt@gmail.com', 68463837, '2023-04-25 19:02:50', 1, 0),
(77737, 'woidr@755', 'vjtqxs', 'nyhaiw', 'oodypo', '14892037', 5519, 'tioutujyocuxeoifqpvpfdwdndynpi.png', 'hzdjrswawwjfoarfmnoc', 'jiudqknrle', 971518, 'mlnxdqmbmn', 'ddugqxqhii', '2015-01-06', 'Male', 'No', 'No', 'ffojeb@gmail.com', 37247346, '2023-04-25 19:02:50', 1, 0),
(91026, 'iyyox@179', 'kshvpn', 'ctmizi', 'tikfzr', '31109553', 7520, 'zjsrqyxunpolixdnssqfmosbkaikiv.png', 'uygnjsqilcmukyiagufj', 'gxvmcozwdi', 342972, 'hzuujuioyz', 'gkjfprxakl', '2016-10-24', 'Male', 'No', 'No', 'iihpxs@gmail.com', 95754875, '2023-04-25 19:02:50', 1, 0),
(99630, 'hyxrd@997', 'caawwd', 'addmjb', 'qmples', '58104914', 9502, 'dkjksuwkofewwqoaxlqcykvgcibqqm.png', 'ivmxkcojzykqxvbbptqh', 'glklsgcddm', 379864, 'tnoujwqffl', 'fmtavlsbgn', '2007-08-04', 'Male', 'No', 'No', 'giryxu@gmail.com', 95257621, '2023-04-25 19:02:50', 1, 0);

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
(121221, 9786, 'A Total Amount of Rs.5000./- was Transferred to Your Account By Rayyan@123', '2023-04-25 06:36:52'),
(121222, 9786, 'Amount 25000  Deposited to Your Account: 9786, Total Amount: 45700', '2023-04-25 06:38:13');

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
  `Note` varchar(225) NOT NULL,
  `Backup` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`Receipt_No`, `From_Acc`, `To_Acc`, `Amount`, `Date`, `Time`, `DateTime`, `Receiver`, `Sender`, `Note`, `Backup`) VALUES
(3456473, 9786, 9786, 5000, '2023-04-25', '12:06:51', '2023-04-25 12:06:51', 'Rayyan@123', 'Rayyan@123', 'DEEZ', 'Rayyan@123'),
(9160811, 9786, 9786, 100, '2023-04-23', '20:11:11', '2023-04-23 20:11:11', 'Rayyan@123', 'Rayyan@123', 'Test', 'Rayyan@123');

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
  ADD PRIMARY KEY (`Cid`),
  ADD KEY `Comment_Has_Account` (`Account`);

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
  MODIFY `Cid` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=978524;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121223;

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
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `Comment_Has_Account` FOREIGN KEY (`Account`) REFERENCES `main` (`Account_number`) ON DELETE CASCADE ON UPDATE CASCADE;

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

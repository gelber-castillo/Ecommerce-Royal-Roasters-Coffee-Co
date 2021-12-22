-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 22, 2021 at 12:17 AM
-- Server version: 5.7.36
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `castilg1_RoyalRoasters`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `userID` int(10) UNSIGNED NOT NULL,
  `coffeeID` int(4) UNSIGNED NOT NULL,
  `quantity` tinyint(3) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `coffee`
--

CREATE TABLE `coffee` (
  `coffeeID` int(4) UNSIGNED NOT NULL,
  `coffeeName` varchar(50) NOT NULL,
  `origin` varchar(30) NOT NULL,
  `roast` varchar(6) NOT NULL,
  `description` text,
  `inventory` int(3) UNSIGNED NOT NULL,
  `price` float(5,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coffee`
--

INSERT INTO `coffee` (`coffeeID`, `coffeeName`, `origin`, `roast`, `description`, `inventory`, `price`) VALUES
(9001, 'Stone Street', 'Kenya', 'light', 'Best', 10, 27.99),
(9002, 'Death Wish Coffee', 'Colombia', 'dark', 'The World’s Strongest Coffee', 8, 19.99),
(9003, 'Spirit Animal Coffee', 'Honduras', 'medium', 'Best organic coffee brand', 3, 22.99),
(9004, 'Real Good Coffee Co.', 'USA', 'medium', 'Best budget', 10, 12.99),
(9005, 'Volcanica Coffee', 'Ethiopia', 'medium', 'Best Arabica coffee brand', 5, 25.99),
(9006, 'Nescafe Azera Intenso', 'England', 'medium', 'Best instant coffee brand', 12, 11.99),
(9007, 'Trade Coffee', 'USA', 'light', 'Best USA coffee brand', 10, 19.99),
(9008, 'Bizzy Organic', 'Guatemala', 'dark', 'Best cold brew coffee brand', 15, 29.99),
(9009, 'Cardiology Coffee', 'Honduras', 'medium', 'Best low acid coffee brand', 10, 22.99),
(9010, 'Fresh Roasted Coffee', 'Mexico', 'light', 'Best Mexican coffee brand', 12, 18.99),
(9011, 'Sea Island', 'USA', 'light', 'Best Hawaiian coffee brand', 5, 100.00),
(9012, 'Lavazza', 'Italy', 'medium', 'Best Italian coffee brand', 19, 19.99),
(9013, 'Don Francisco\'s', 'Cuba', 'dark', 'Best-flavoured coffee brand', 15, 19.99),
(9014, 'Caribou Coffee', 'Brazil', 'light', 'Best light roast coffee brand', 10, 14.99),
(9015, 'High Voltage', 'Colombia', 'dark', 'The kick-start you deserve from your morning coffee', 10, 15.99),
(9016, 'Chameleon', 'Guatemala', 'medium', 'Way way awesome beans, sourced from Huehuetenango', 15, 19.99),
(9017, 'Lifeboost', 'Kenya', 'dark', 'Unique, rare Pacamara beans', 10, 39.99),
(9018, 'JO', 'Colombia', 'medium', 'Delicious gourmet coffee that is grown naturally', 10, 17.99),
(9019, 'Blue Mountain Coffee', 'Panama', 'medium', 'Prominent fruit flavors, light acidity', 10, 15.99),
(9020, 'New England Coffee', 'USA', 'medium', 'Butter pecan', 10, 19.99),
(9021, 'Stumptown Coffee Roasters', 'Indonesia', 'medium', 'Hair Bender Whole Bean Coffee', 15, 24.99),
(9022, 'Peet’s Coffee', 'Ethiopia', 'medium', 'Big Bang', 10, 19.99),
(9023, 'La Colombe', 'Brazil', 'dark', 'Chocolate, red wine, and spices', 13, 21.99),
(9024, 'Intelligentsia', 'El Salvador', 'dark', 'Frequency Blend', 15, 19.99),
(9025, 'Counter Culture Coffee', 'Papua New Guinea', 'medium', 'Roasted on the day that they are shipped', 10, 29.99),
(9026, 'Mount Hagen', 'Papua New Guinea', 'medium', 'Quick, easy, efficient, and delicious', 12, 19.99),
(9027, 'Red Bay Coffee', 'Tanzania', 'light', 'East Fourteenth Tanzanian Coffee Beans', 7, 24.99),
(9028, 'Peerless', 'France', 'dark', 'Direct Trade Organic French Roast', 15, 27.99),
(9029, 'Koffee Kult', 'Guatemala', 'dark', 'Enjoy warming notes of cinnamon and cocoa', 16, 17.99),
(9030, 'Black Ivory Coffee', 'Thailand', 'light', 'Passed through an elephant\'s digestive system', 0, 150.00);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `userID` int(5) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `passwd` varchar(50) NOT NULL,
  `email` varchar(25) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`userID`, `username`, `passwd`, `email`, `fname`, `lname`, `address`) VALUES
(1, 'gelcas', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'test@mail.com', 'Gelber', 'Castillo', '1 Normal Ave, Montclair, NJ 07043'),
(2, 'samruf', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'mail@test.com', 'Samuel', 'Rufino', '1 Normal Ave, Montclair, NJ 07043'),
(3, 'jacob45', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e', '123@gmail.com', 'gelber', 'castillo', '123'),
(4, 'sharon1', '7c4a8d09ca3762af61e59520943dc26494f8941b', '234@gmail.com', 'Sharon', 'Smith', '234 ave, Pittsburgh PA'),
(5, 'gelber1', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'test@gmail.com', 'Gelber', 'Castillo', '123 test ave.'),
(6, 'samray', 'fa6977c99b809db68e1c56888ec38bd004719b39', 'sam.ray@yahoo.com', 'Sam', 'Ray', '11 sandy beach');
-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `deptID` int(1) UNSIGNED NOT NULL,
  `deptName` varchar(20) NOT NULL,
  `dept_address` varchar(100) NOT NULL,
  `managerID` int(3) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`deptID`, `deptName`, `dept_address`, `managerID`) VALUES
(1, 'Administration', '1 Normal Ave, Montclair, NJ 07043', 100),
(2, 'Roastery', '2 Normal Ave, Montclair, NJ 07043', 101),
(3, 'Distribution', '3 Normal Ave, Montclair, NJ 07043', 104);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `empID` int(3) UNSIGNED NOT NULL,
  `emp_fname` varchar(20) NOT NULL,
  `emp_lname` varchar(20) NOT NULL,
  `emp_address` varchar(100) NOT NULL,
  `position` tinyint(4) NOT NULL,
  `ssn` char(9) NOT NULL,
  `managerID` int(3) UNSIGNED NOT NULL,
  `deptID` int(1) UNSIGNED NOT NULL,
  `e_username` varchar(50) NOT NULL,
  `e_passwd` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`empID`, `emp_fname`, `emp_lname`, `emp_address`, `position`, `ssn`, `managerID`, `deptID`, `e_username`, `e_passwd`) VALUES
(100, 'Gelber', 'Castillo', '1 Normal Ave, Montclair, NJ 07043', 1, '123456789', 100, 1, 'gelber', '$2y$10$6wMfJioLxF6C2EiFXY2iv.VVccdTFvPTNYphqiVEJ46DZgZkO/JYS'),
(101, 'Samuel', 'Rufino', '1 Normal Ave, Montclair, NJ 07043', 1, '987654321', 101, 2, 'samuel', '$2y$10$VeSsHzYICuM4nJxrKYL7o.qIpVEvZ/m/j6u1FjYuxE3.wgf4AO.mu'),
(102, 'Jane', 'Doe', '10 Test Ave, Hoboken, NJ 07043', 2, '555555555', 100, 1, 'janedoe', '$2y$10$LFm8eeqDfKFkNwhX6VyunOTysZVK/rmC3qyrq3zCT3WN0VeEWDaM6'),
(103, 'Joe', 'Shmoe', '99 Problems Ave, Alpine, NJ 07043', 2, '123123123', 101, 2, 'joesh', '$2y$10$upnkHFgic5l6A2xcIertzuYqaQksjbQCvkTq5c2dl1HOb1ugZGTO2'),
(104, 'Toph', 'Beifong', '111 Washington St., Hoboken, NJ 07043', 3, '999887777', 101, 3, 'toph', '$2y$10$g90qquvDpZQoVbES9QxQAuwcstAfLG7/lxapXhB39y0d6q9HWiTHe'),
(105, 'Eren', 'Yeagar', 'Wall Rose St., Newark, NJ 07101', 3, '101010101', 104, 3, 'ereny', '$2y$10$UZ/q/w5C4rK2SvOUbq.dYuh.KySTSKQIEMwK1kWIWqGCaDvpKE78m'),
(121, 'Alfred', 'Hitchcock', '1 Crow Ave', 3, '999005555', 102, 2, 'alf1', '$2y$10$j.CkCABgSDFiu85Al5QnX.AupUI6SeDyMZI8SyR8U5RTLUbnr/AmG'),
(118, 'Tom', 'Joe', '123 Test Ave., Jersey City', 3, '111224444', 103, 3, 'joetom', '455fc59b8bae66e8bdedda0e59aa7a27e8faba03'),
(137, 'Chewbacca', 'Solo', '123 address', 1, '564612321', 101, 1, 'chewbacca', '$2y$10$ef95ho07sE3I0HaroI52Bu7Djyfnmh0ShnLv.cKNau1x15PU6EQSG'),
(135, 'alexa', 'ramirez', '123 montclair', 3, '123123123', 103, 3, 'wwhisper', '$2y$10$KM1HAqAY.jnyPY7bx50HBeLW8NBAOu8vf.eeIWwjbbJfaK5Ffz6l2');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `userID` int(10) UNSIGNED NOT NULL,
  `ordertime` datetime NOT NULL,
  `coffeeID` int(4) UNSIGNED NOT NULL,
  `quantity` int(3) UNSIGNED NOT NULL,
  `total` float(4,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`userID`, `ordertime`, `coffeeID`, `quantity`, `total`) VALUES
(1, '2021-01-01 01:00:00', 9001, 1, 9.99),
(1, '2021-05-01 01:00:00', 9002, 2, 29.98),
(1, '2021-05-01 01:00:00', 9003, 1, 8.99),
(2, '2021-04-11 01:00:00', 9001, 2, 19.98),
(3, '2021-12-11 04:15:01', 9002, 1, 19.99),
(3, '2021-12-11 04:42:53', 9002, 1, 19.99),
(3, '2021-12-11 04:44:32', 9002, 1, 19.99),
(3, '2021-12-11 04:45:31', 9002, 1, 19.99),
(3, '2021-12-11 04:45:47', 9002, 1, 19.99),
(3, '2021-12-11 04:48:58', 9021, 2, 49.98),
(3, '2021-12-11 04:57:05', 9002, 1, 19.99),
(3, '2021-12-11 04:57:26', 9020, 1, 19.99),
(3, '2021-12-11 04:57:26', 9001, 1, 27.99),
(4, '2021-12-11 18:56:52', 9002, 1, 19.99),
(5, '2021-12-12 21:45:46', 9001, 1, 27.99),
(5, '2021-12-12 21:45:46', 9003, 2, 45.98),
(4, '2021-12-14 18:54:50', 9012, 1, 19.99),
(6, '2021-12-15 02:10:37', 9002, 2, 39.98),
(6, '2021-12-15 02:17:36', 9001, 2, 55.98),
(6, '2021-12-15 02:18:48', 9001, 2, 55.98),
(6, '2021-12-15 02:22:03', 9001, 3, 83.97),
(6, '2021-12-15 02:22:03', 9003, 4, 91.96),
(4, '2021-12-16 08:36:27', 9002, 3, 59.97),
(4, '2021-12-16 08:36:27', 9001, 1, 27.99),
(4, '2021-12-16 14:08:19', 9001, 2, 55.98),
(4, '2021-12-16 14:08:19', 9005, 3, 77.97),
(4, '2021-12-16 14:08:19', 9003, 1, 22.99),
(3, '2021-12-17 03:11:58', 9005, 2, 51.98),
(3, '2021-12-18 20:05:25', 9002, 1, 19.99);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD KEY `userID` (`userID`),
  ADD KEY `coffeeID` (`coffeeID`);

--
-- Indexes for table `coffee`
--
ALTER TABLE `coffee`
  ADD PRIMARY KEY (`coffeeID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`deptID`),
  ADD KEY `managerID` (`managerID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`empID`),
  ADD KEY `deptID` (`deptID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD KEY `userID` (`userID`),
  ADD KEY `coffeeID` (`coffeeID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `userID` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `deptID` int(1) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `empID` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

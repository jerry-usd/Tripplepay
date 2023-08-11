-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2023 at 11:57 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tripplepay`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `plan_id` varchar(300) NOT NULL,
  `que_id` varchar(300) NOT NULL,
  `cdate` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `verdict` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`id`, `email`, `plan_id`, `que_id`, `cdate`, `status`, `verdict`) VALUES
(10, 'jerryadenij@gmail.com', 'starter', '1', '2021-08-08', 'answered', 'wrong');

-- --------------------------------------------------------

--
-- Table structure for table `balance`
--

CREATE TABLE `balance` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `balance`
--

INSERT INTO `balance` (`id`, `email`, `balance`) VALUES
(1, 'jerryadenij@gmail.com', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `epin`
--

CREATE TABLE `epin` (
  `id` int(11) NOT NULL,
  `epin` varchar(200) NOT NULL,
  `plan` varchar(200) NOT NULL,
  `created` varchar(200) NOT NULL,
  `used` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `epin`
--

INSERT INTO `epin` (`id`, `epin`, `plan`, `created`, `used`, `status`, `email`) VALUES
(1, '651370013', 'starter', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(2, '174373355', 'starter', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(3, '575302215', 'starter', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(4, '624587211', 'starter', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(5, '446894879', 'starter', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(6, '347355790', 'starter', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(7, '251143432', 'starter', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(8, '374714664', 'starter', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(9, '716730742', 'starter', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(10, '429813242', 'starter', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(11, '628511691', 'starter', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(12, '564643089', 'starter', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(13, '443909309', 'starter', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(14, '396207132', 'starter', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(15, '612749089', 'starter', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(16, '852911012', 'starter', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(17, '701230994', 'starter', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(18, '410710621', 'starter', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(19, '119633661', 'starter', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(20, '920684683', 'starter', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(21, '492395462', 'starter', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(22, '359443129', 'starter', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(23, '525486356', 'starter', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(24, '428505573', 'starter', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(25, '561019023', 'starter', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(26, '865314264', 'starter', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(27, '634782049', 'starter', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(28, '685715888', 'starter', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(29, '839622794', 'starter', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(30, '921817992', 'starter', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(31, '170915322', 'starter', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(32, '990226551', 'starter', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(33, '853064006', 'starter', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(34, '857372783', 'starter', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(35, '999860829', 'starter', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(36, '664690257', 'starter', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(37, '661084510', 'starter', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(38, '346507078', 'starter', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(39, '209610394', 'starter', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(40, '297470904', 'starter', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(41, '177690588', 'starter', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(42, '729331322', 'starter', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(43, '913222904', 'starter', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(44, '381124077', 'starter', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(45, '368703938', 'starter', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(46, '762241840', 'starter', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(47, '234675571', 'starter', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(48, '923700873', 'starter', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(49, '545300491', 'starter', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(50, '193675626', 'starter', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(51, '739079275', 'starter', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(52, '480725325', 'hut8', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(53, '186031163', 'hut8', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(54, '296795868', 'hut8', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(55, '418062247', 'hut8', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(56, '994759999', 'hut8', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(57, '226418406', 'hut8', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(58, '657702019', 'hut8', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(59, '363859859', 'hut8', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(60, '483060360', 'hut8', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(61, '930271952', 'hut8', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(62, '987753546', 'hut8', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(63, '565181005', 'hut8', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(64, '367355633', 'hut8', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(65, '712930882', 'hut8', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(66, '354836523', 'hut8', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(67, '936381517', 'hut8', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(68, '349453618', 'hut8', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(69, '215766078', 'hut8', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(70, '595036484', 'hut8', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(71, '629015779', 'hut8', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(72, '114825175', 'hut8', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(73, '848694312', 'hut8', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(74, '352161496', 'hut8', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(75, '447545395', 'hut8', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(76, '842386180', 'hut8', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(77, '188555071', 'hut8', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(78, '761916579', 'hut8', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(79, '250200631', 'hut8', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(80, '618600395', 'hut8', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(81, '984106508', 'hut8', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(82, '475288751', 'hut8', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(83, '596658756', 'hut8', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(84, '730792726', 'hut8', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(85, '573528769', 'hut8', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(86, '484622973', 'hut8', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(87, '209170765', 'hut8', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(88, '329495590', 'hut8', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(89, '324596170', 'hut8', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(90, '517566656', 'hut8', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(91, '215502594', 'hut8', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(92, '611150244', 'hut8', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(93, '734429729', 'hut8', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(94, '342817916', 'hut8', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(95, '328027607', 'hut8', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(96, '576611071', 'hut8', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(97, '158722188', 'hut8', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(98, '930438322', 'hut8', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(99, '191219634', 'hut8', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(100, '949576540', 'hut8', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(101, '109061038', 'hut8', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(102, '226201821', 'hut8', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(103, '182367821', 'veteran', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(104, '359164559', 'veteran', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(105, '755968465', 'veteran', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(106, '361976959', 'veteran', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(107, '911527289', 'veteran', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(108, '772649649', 'veteran', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(109, '784625104', 'veteran', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(110, '631571743', 'veteran', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(111, '253080888', 'veteran', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(112, '762314387', 'veteran', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(113, '721854599', 'veteran', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(114, '381340540', 'veteran', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(115, '725766314', 'veteran', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(116, '419242743', 'veteran', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(117, '508998409', 'veteran', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(118, '244612538', 'veteran', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(119, '757360130', 'veteran', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(120, '677819201', 'veteran', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(121, '342801369', 'veteran', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(122, '127876865', 'veteran', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(123, '480278620', 'veteran', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(124, '285084357', 'veteran', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(125, '921838004', 'veteran', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(126, '317202741', 'veteran', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(127, '499151846', 'veteran', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(128, '924574776', 'veteran', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(129, '815446742', 'veteran', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(130, '525766620', 'veteran', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(131, '213541781', 'veteran', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(132, '331347742', 'veteran', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(133, '353462630', 'veteran', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(134, '224625428', 'veteran', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(135, '375346498', 'veteran', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(136, '653805320', 'veteran', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(137, '823595011', 'veteran', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(138, '638892750', 'veteran', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(139, '654892439', 'veteran', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(140, '778516674', 'veteran', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(141, '193730283', 'veteran', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(142, '592566328', 'veteran', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(143, '405940703', 'veteran', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(144, '111056341', 'veteran', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(145, '414198934', 'veteran', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(146, '376887986', 'veteran', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(147, '823406033', 'veteran', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(148, '587140033', 'veteran', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(149, '635250601', 'veteran', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(150, '976627785', 'veteran', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(151, '291979397', 'veteran', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(152, '762826328', 'veteran', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(153, '420987894', 'veteran', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(154, '287245080', 'exonum', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(155, '244420757', 'exonum', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(156, '444259866', 'exonum', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(157, '302843777', 'exonum', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(158, '222149881', 'exonum', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(159, '348271758', 'exonum', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(160, '214348845', 'exonum', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(161, '399364024', 'exonum', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(162, '335555725', 'exonum', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(163, '597012134', 'exonum', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(164, '865992884', 'exonum', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(165, '986367073', 'exonum', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(166, '925669574', 'exonum', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(167, '234840663', 'exonum', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(168, '904153151', 'exonum', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(169, '245895201', 'exonum', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(170, '384745096', 'exonum', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(171, '342366699', 'exonum', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(172, '911885904', 'exonum', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(173, '855782139', 'exonum', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(174, '964962916', 'exonum', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(175, '635246033', 'exonum', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(176, '318938364', 'exonum', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(177, '978943501', 'exonum', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(178, '839716265', 'exonum', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(179, '551128221', 'exonum', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(180, '912707292', 'exonum', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(181, '115114948', 'exonum', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(182, '494723857', 'exonum', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(183, '475707951', 'exonum', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(184, '133523424', 'exonum', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(185, '586456614', 'exonum', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(186, '986919259', 'exonum', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(187, '101869729', 'exonum', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(188, '138495268', 'exonum', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(189, '256093635', 'exonum', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(190, '236522023', 'exonum', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(191, '547137893', 'exonum', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(192, '813073045', 'exonum', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(193, '861846139', 'exonum', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(194, '618363677', 'exonum', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(195, '374015570', 'exonum', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(196, '445611707', 'exonum', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(197, '197309325', 'exonum', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(198, '346160436', 'exonum', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(199, '449268246', 'exonum', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(200, '686286359', 'exonum', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(201, '297732333', 'exonum', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(202, '779996492', 'exonum', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(203, '667076015', 'exonum', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(204, '857984163', 'exonum', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(205, '479143067', 'master', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(206, '359242926', 'master', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(207, '638392326', 'master', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(208, '415731350', 'master', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(209, '312728705', 'master', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(210, '547427484', 'master', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(211, '367710809', 'master', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(212, '586820873', 'master', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(213, '706943709', 'master', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(214, '554730523', 'master', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(215, '593849622', 'master', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(216, '603381495', 'master', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(217, '132327369', 'master', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(218, '103996673', 'master', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(219, '921371819', 'master', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(220, '231394201', 'master', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(221, '885376083', 'master', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(222, '795761933', 'master', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(223, '840822175', 'master', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(224, '754330759', 'master', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(225, '778431351', 'master', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(226, '893913817', 'master', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(227, '187064622', 'master', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(228, '449738571', 'master', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(229, '682411663', 'master', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(230, '987771225', 'master', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(231, '617174455', 'master', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(232, '871587964', 'master', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(233, '805233085', 'master', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(234, '206621222', 'master', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(235, '787869857', 'master', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(236, '470919837', 'master', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(237, '531102633', 'master', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(238, '142641221', 'master', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(239, '664053590', 'master', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(240, '688832268', 'master', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(241, '829924456', 'master', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(242, '891807472', 'master', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(243, '980767325', 'master', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(244, '966197818', 'master', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(245, '949448488', 'master', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(246, '564933464', 'master', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(247, '588109329', 'master', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(248, '865812599', 'master', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(249, '376495414', 'master', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(250, '971813302', 'master', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(251, '804300183', 'master', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(252, '588844610', 'master', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(253, '207897911', 'master', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(254, '423705167', 'master', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(255, '305435335', 'master', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(256, '994635204', 'ultimate', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(257, '553993468', 'ultimate', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(258, '692676166', 'ultimate', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(259, '347121270', 'ultimate', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(260, '748967667', 'ultimate', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(261, '237356482', 'ultimate', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(262, '653236358', 'ultimate', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(263, '230712331', 'ultimate', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(264, '640124200', 'ultimate', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(265, '804144034', 'ultimate', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(266, '670411019', 'ultimate', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(267, '999882225', 'ultimate', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(268, '236897004', 'ultimate', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(269, '109900419', 'ultimate', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(270, '608079268', 'ultimate', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(271, '234091318', 'ultimate', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(272, '771572890', 'ultimate', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(273, '273858052', 'ultimate', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(274, '975024791', 'ultimate', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(275, '685028305', 'ultimate', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(276, '218383148', 'ultimate', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(277, '564460675', 'ultimate', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(278, '582478630', 'ultimate', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(279, '116778748', 'ultimate', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(280, '872101434', 'ultimate', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(281, '138998776', 'ultimate', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(282, '950509945', 'ultimate', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(283, '904315769', 'ultimate', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(284, '819751988', 'ultimate', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(285, '804467240', 'ultimate', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(286, '813807766', 'ultimate', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(287, '289056560', 'ultimate', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(288, '873657891', 'ultimate', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(289, '760960217', 'ultimate', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(290, '457058420', 'ultimate', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(291, '115440961', 'ultimate', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(292, '875062173', 'ultimate', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(293, '497397724', 'ultimate', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(294, '352803035', 'ultimate', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(295, '138489712', 'ultimate', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(296, '160212172', 'ultimate', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(297, '115679573', 'ultimate', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(298, '181651620', 'ultimate', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(299, '845489082', 'ultimate', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(300, '688294833', 'ultimate', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(301, '949350149', 'ultimate', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(302, '437503733', 'ultimate', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(303, '502536280', 'ultimate', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(304, '429434256', 'ultimate', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(305, '921732180', 'ultimate', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(306, '247834231', 'ultimate', '2021-08-07', '2021-08-08', 'used', 'jerryadenij@gmail.com'),
(307, '924093533', 'starter', '2021-08-08', '', 'active', ''),
(308, '794872136', 'starter', '2021-08-08', '', 'active', ''),
(309, '657635411', 'starter', '2021-08-08', '', 'active', ''),
(310, '529943336', 'starter', '2021-08-08', '', 'active', ''),
(311, '260342680', 'starter', '2021-08-08', '', 'active', ''),
(312, '201439069', 'starter', '2021-08-08', '', 'active', ''),
(313, '829558273', 'starter', '2021-08-08', '', 'active', ''),
(314, '272456545', 'starter', '2021-08-08', '', 'active', ''),
(315, '814529739', 'starter', '2021-08-08', '', 'active', ''),
(316, '216146442', 'starter', '2021-08-08', '', 'active', ''),
(317, '947778889', 'starter', '2021-08-08', '', 'active', ''),
(318, '620106924', 'starter', '2021-08-08', '', 'active', ''),
(319, '169155680', 'starter', '2021-08-08', '', 'active', ''),
(320, '254756289', 'starter', '2021-08-08', '', 'active', ''),
(321, '538099562', 'starter', '2021-08-08', '', 'active', ''),
(322, '757156662', 'starter', '2021-08-08', '', 'active', ''),
(323, '622899750', 'starter', '2021-08-08', '', 'active', ''),
(324, '318646304', 'starter', '2021-08-08', '', 'active', ''),
(325, '799060736', 'starter', '2021-08-08', '', 'active', ''),
(326, '244018670', 'starter', '2021-08-08', '', 'active', ''),
(327, '559152562', 'starter', '2021-08-08', '', 'active', ''),
(328, '776503262', 'starter', '2021-08-08', '', 'active', ''),
(329, '972875148', 'starter', '2021-08-08', '', 'active', ''),
(330, '716316470', 'starter', '2021-08-08', '', 'active', ''),
(331, '130329376', 'starter', '2021-08-08', '', 'active', ''),
(332, '904261788', 'starter', '2021-08-08', '', 'active', ''),
(333, '177530428', 'starter', '2021-08-08', '', 'active', ''),
(334, '642859939', 'starter', '2021-08-08', '', 'active', ''),
(335, '705312596', 'starter', '2021-08-08', '', 'active', ''),
(336, '215685664', 'starter', '2021-08-08', '', 'active', ''),
(337, '453979171', 'starter', '2021-08-08', '', 'active', ''),
(338, '217549329', 'starter', '2021-08-08', '', 'active', ''),
(339, '460649194', 'starter', '2021-08-08', '', 'active', ''),
(340, '868697980', 'starter', '2021-08-08', '', 'active', ''),
(341, '688468927', 'starter', '2021-08-08', '', 'active', ''),
(342, '383921207', 'starter', '2021-08-08', '', 'active', ''),
(343, '946086847', 'starter', '2021-08-08', '', 'active', ''),
(344, '816433541', 'starter', '2021-08-08', '', 'active', ''),
(345, '857461970', 'starter', '2021-08-08', '', 'active', ''),
(346, '397910113', 'starter', '2021-08-08', '', 'active', ''),
(347, '894424065', 'starter', '2021-08-08', '', 'active', ''),
(348, '817546020', 'starter', '2021-08-08', '', 'active', ''),
(349, '747838884', 'starter', '2021-08-08', '', 'active', ''),
(350, '776816622', 'starter', '2021-08-08', '', 'active', ''),
(351, '218360257', 'starter', '2021-08-08', '', 'active', ''),
(352, '998347574', 'starter', '2021-08-08', '', 'active', ''),
(353, '991228515', 'starter', '2021-08-08', '', 'active', ''),
(354, '301113385', 'starter', '2021-08-08', '', 'active', ''),
(355, '782620569', 'starter', '2021-08-08', '', 'active', ''),
(356, '346273830', 'starter', '2021-08-08', '', 'active', ''),
(357, '357545546', 'starter', '2021-08-08', '2021-08-08', 'used', 'jerryadenij@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `investments`
--

CREATE TABLE `investments` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `plan` varchar(100) NOT NULL,
  `started` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `investments`
--

INSERT INTO `investments` (`id`, `email`, `plan`, `started`, `status`) VALUES
(1, 'jerryadenij@gmail.com', 'starter', '2021-08-08', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `email`, `password`, `role`) VALUES
(9, 'admin@gmail.com', 'test12', 'administrator'),
(10, 'jerryadenij@gmail.com', 'test12', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` int(11) NOT NULL,
  `plan` varchar(100) NOT NULL,
  `capital` int(11) NOT NULL,
  `roi` varchar(100) NOT NULL,
  `roi%` varchar(200) NOT NULL,
  `pay` varchar(200) NOT NULL,
  `totalpay` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `plan`, `capital`, `roi`, `roi%`, `pay`, `totalpay`) VALUES
(1, 'starter', 5000, '2500', '50%', '417', '7500'),
(2, 'hut8', 15000, '7500', '50%', '1250', '22500'),
(3, 'exonum', 50000, '32500', '65%', '2708', '82500'),
(4, 'veteran', 70000, '45500', '65%', '3791', '115000'),
(5, 'master', 200000, '130000', '65%', '10833', '330000'),
(6, 'ultimate', 500000, '325000', '65%', '27083', '825000');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question` varchar(700) NOT NULL,
  `option1` varchar(200) NOT NULL,
  `option2` varchar(200) NOT NULL,
  `option3` varchar(200) NOT NULL,
  `option4` varchar(200) NOT NULL,
  `answer` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `option1`, `option2`, `option3`, `option4`, `answer`, `status`) VALUES
(1, 'who are you?', 'me', 'him', 'it', 'i', '2', 'active'),
(2, 'this is a test', '1', '2', '3', '4', '2', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `referrals`
--

CREATE TABLE `referrals` (
  `id` int(11) NOT NULL,
  `main` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `plan` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(500) NOT NULL,
  `phone` varchar(500) NOT NULL,
  `full_name` varchar(500) NOT NULL,
  `plan` varchar(500) NOT NULL,
  `epin` varchar(500) NOT NULL,
  `date` varchar(500) NOT NULL,
  `status` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `phone`, `full_name`, `plan`, `epin`, `date`, `status`) VALUES
(1, 'jerryadenij@gmail.com', ' ', 'Jerry Coinrency', 'starter', '357545546', '2021-08-08', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `name`, `phone`, `email`) VALUES
(1, 'jerryddd', 'test', 'testuu'),
(2, 'dd', 'dd', 'dd'),
(3, 'Jerry Coinrency', 'dodoid', 'jerryadenij@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `withdrawal`
--

CREATE TABLE `withdrawal` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `amount` varchar(200) NOT NULL,
  `bank` varchar(200) NOT NULL,
  `number` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `balance`
--
ALTER TABLE `balance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `epin`
--
ALTER TABLE `epin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `investments`
--
ALTER TABLE `investments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referrals`
--
ALTER TABLE `referrals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdrawal`
--
ALTER TABLE `withdrawal`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `balance`
--
ALTER TABLE `balance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `epin`
--
ALTER TABLE `epin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=358;

--
-- AUTO_INCREMENT for table `investments`
--
ALTER TABLE `investments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `referrals`
--
ALTER TABLE `referrals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `withdrawal`
--
ALTER TABLE `withdrawal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

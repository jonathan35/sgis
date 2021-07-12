-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2021 at 03:27 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tentex`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `album_id` int(11) NOT NULL,
  `album_name` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `position` int(11) NOT NULL DEFAULT 0,
  `date_posted` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`album_id`, `album_name`, `status`, `position`, `date_posted`) VALUES
(30, 'Project A', -1, 10, '2011-06-20'),
(39, 'New Concrete Solutions', 1, 20, '2013-01-04'),
(40, 'Sports Flooring', 1, 30, '2013-01-04'),
(41, 'Industrial Flooring', -1, 40, '2013-01-04'),
(42, 'Sample 5', -1, 50, '2013-01-04'),
(43, 'Concrete Resurfacing System', 1, 10, '2013-05-27'),
(44, 'ass', -1, 0, '2017-11-14'),
(45, '12', -1, 0, '2021-07-01');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `banner_id` int(11) NOT NULL,
  `banner_file` varchar(250) NOT NULL,
  `test` int(11) NOT NULL DEFAULT 0,
  `position` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`banner_id`, `banner_file`, `test`, `position`, `status`) VALUES
(161, 'photo/4ffbd9176f01e.jpg', 0, 3, 1),
(162, 'photo/4ffbd91b13746.jpg', 0, 1, 1),
(163, 'photo/4ffbd91db77c9.jpg', 0, 2, 1),
(164, 'photo/51959b5aa72c7.jpg', 0, 0, -1),
(165, 'photo/5196e487bebdf.jpg', 0, 0, -1),
(166, 'photo/51b596c3a5715.jpg', 0, 30, -1),
(167, 'photo/51b67c3b06705.jpg', 0, 0, -1),
(168, 'photo/51b6836d783b1.jpg', 0, 0, -1),
(169, 'photo/51b68382b1547.jpg', 0, 30, -1),
(170, 'photo/51b9694305e8b.jpg', 0, 5, 1),
(171, 'photo/53688aa678588.jpg', 0, 4, 1),
(172, 'photo/60dd411fc69f3.jpg', 0, 0, -1),
(173, 'photo/60dd412af0750.jpg', 0, 0, -1);

-- --------------------------------------------------------

--
-- Table structure for table `banner_announcement`
--

CREATE TABLE `banner_announcement` (
  `banner_id` int(11) NOT NULL,
  `banner_file` varchar(250) NOT NULL,
  `hyperlink_url` varchar(100) NOT NULL DEFAULT '0',
  `position` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner_announcement`
--

INSERT INTO `banner_announcement` (`banner_id`, `banner_file`, `hyperlink_url`, `position`, `status`) VALUES
(9, 'photo/4e0c0ffcc6677.jpg', 'result.php?root=MTU4&id=MTI2&main=MTU4', 3, 1),
(10, 'photo/4e0c101e53ecb.jpg', 'result.php?root=MTU4&id=MTI2&main=MTU4', 4, 1),
(8, 'photo/4e0c0fef07a18.jpg', 'result.php?root=MTU4&id=MTI2&main=MTU4', 2, 1),
(12, 'photo/4e0c3fd3d1cf6.jpg', 'result.php?root=MTU4&id=MTI2&main=MTU4', 5, 1),
(11, 'photo/4e0c103140d9f.jpg', 'result.php?root=MTU4&id=MTI2&main=MTU4', 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `brookes_banner`
--

CREATE TABLE `brookes_banner` (
  `banner_id` int(11) NOT NULL,
  `banner_file` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `type` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci PACK_KEYS=0;

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE `calendar` (
  `id` int(11) NOT NULL,
  `calendar_items` varchar(250) NOT NULL,
  `project_name` varchar(250) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `date_created` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` (`id`, `calendar_items`, `project_name`, `status`, `date_created`) VALUES
(1, 'calendar is live.', '0', 1, '2009-05-18 16:00:54');

-- --------------------------------------------------------

--
-- Table structure for table `calendar_mssgs`
--

CREATE TABLE `calendar_mssgs` (
  `id` mediumint(5) UNSIGNED NOT NULL,
  `uid` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `m` tinyint(2) NOT NULL DEFAULT 0,
  `d` tinyint(2) NOT NULL DEFAULT 0,
  `y` smallint(4) NOT NULL DEFAULT 0,
  `start_time` time NOT NULL DEFAULT '00:00:00',
  `end_time` time NOT NULL DEFAULT '00:00:00',
  `project_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL DEFAULT '',
  `text` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `calendar_users`
--

CREATE TABLE `calendar_users` (
  `uid` smallint(6) NOT NULL,
  `username` char(15) NOT NULL DEFAULT '',
  `password` char(32) NOT NULL DEFAULT '',
  `fname` char(20) NOT NULL DEFAULT '',
  `lname` char(30) NOT NULL DEFAULT '0',
  `userlevel` tinyint(2) NOT NULL DEFAULT 0,
  `email` char(40) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `message` text COLLATE latin1_general_ci NOT NULL,
  `type` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `message`, `type`, `status`) VALUES
(5, 'Tel: +6082-123456 <br>Fax:+6082-345678 <br>E-mail: wahba@gmail.com', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `counter`
--

CREATE TABLE `counter` (
  `count` int(10) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `counter`
--

INSERT INTO `counter` (`count`) VALUES
(281665);

-- --------------------------------------------------------

--
-- Table structure for table `cps_banner`
--

CREATE TABLE `cps_banner` (
  `banner_id` int(11) NOT NULL,
  `banner_file` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `banner_type` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `custom_field_section`
--

CREATE TABLE `custom_field_section` (
  `id` int(11) NOT NULL,
  `category` varchar(1000) COLLATE latin1_general_ci NOT NULL,
  `field1` longtext COLLATE latin1_general_ci NOT NULL,
  `field2` longtext COLLATE latin1_general_ci NOT NULL,
  `field3` longtext COLLATE latin1_general_ci NOT NULL,
  `field4` longtext COLLATE latin1_general_ci NOT NULL,
  `field5` longtext COLLATE latin1_general_ci NOT NULL,
  `field6` longtext COLLATE latin1_general_ci NOT NULL,
  `field7` longtext COLLATE latin1_general_ci NOT NULL,
  `field8` longtext COLLATE latin1_general_ci NOT NULL,
  `field9` longtext COLLATE latin1_general_ci NOT NULL,
  `field10` longtext COLLATE latin1_general_ci NOT NULL,
  `field11` longtext COLLATE latin1_general_ci NOT NULL,
  `field12` longtext COLLATE latin1_general_ci NOT NULL,
  `field13` longtext COLLATE latin1_general_ci NOT NULL,
  `field14` longtext COLLATE latin1_general_ci NOT NULL,
  `field15` longtext COLLATE latin1_general_ci NOT NULL,
  `field16` longtext COLLATE latin1_general_ci NOT NULL,
  `field17` longtext COLLATE latin1_general_ci NOT NULL,
  `field18` longtext COLLATE latin1_general_ci NOT NULL,
  `field19` longtext COLLATE latin1_general_ci NOT NULL,
  `field20` longtext COLLATE latin1_general_ci NOT NULL,
  `field21` longtext COLLATE latin1_general_ci NOT NULL,
  `field22` longtext COLLATE latin1_general_ci NOT NULL,
  `field23` longtext COLLATE latin1_general_ci NOT NULL,
  `field24` longtext COLLATE latin1_general_ci NOT NULL,
  `field25` longtext COLLATE latin1_general_ci NOT NULL,
  `field26` longtext COLLATE latin1_general_ci NOT NULL,
  `field27` longtext COLLATE latin1_general_ci NOT NULL,
  `field28` longtext COLLATE latin1_general_ci NOT NULL,
  `field29` longtext COLLATE latin1_general_ci NOT NULL,
  `field30` longtext COLLATE latin1_general_ci NOT NULL,
  `position` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `status` int(2) NOT NULL,
  `date_posted` date NOT NULL,
  `date_modified` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dcui_section_cpanel`
--

CREATE TABLE `dcui_section_cpanel` (
  `id` int(11) NOT NULL,
  `record` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `Note` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `status` int(11) NOT NULL,
  `date_posted` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `dcui_section_cpanel`
--

INSERT INTO `dcui_section_cpanel` (`id`, `record`, `Note`, `status`, `date_posted`) VALUES
(1, '9', 'maximun free fromat section allowed', 1, '0000-00-00'),
(2, '0', 'switch on or off of the C3', 2, '2013-04-23'),
(3, '246', 'width of the C3', 3, '2013-04-23'),
(4, '1', 'switch on or off of the C1', 1, '2013-04-23'),
(5, '150', 'width of the C1', 1, '2013-04-23'),
(6, '1', 'switch on or off of the C2', 1, '2013-04-23'),
(7, '830', 'width of the C2', 1, '2013-04-23'),
(8, '1', 'menu switch on or off 1 is on but 0 is off', 1, '2013-04-26'),
(9, '210', 'Vertical menu width', 1, '2013-04-26'),
(10, '12', 'Vertical text size', 1, '2013-04-26'),
(11, '60', 'Limitation of number of text character on Vertical menu', 1, '2013-04-26'),
(12, 'B', 'Product listing template', 1, '2011-03-16'),
(13, '30', 'Product listing item title character limitation', 1, '2011-03-16'),
(14, '120', 'Product listing item title character limitation', 1, '2011-03-16'),
(15, '140', 'Product listing item image width', 1, '2011-03-16'),
(16, '106', 'Product listing item image height', 1, '2011-03-16'),
(17, '1', 'horizontal menu switch on or off 1 is on but 0 is off', 1, '2013-04-26'),
(18, '145', 'Horizontal menu width', 1, '2013-04-26'),
(19, '12', 'Horizontal text size', 1, '2013-04-26'),
(20, '60', 'Limitation of number of text character on Horizontal menu', 1, '2013-04-26'),
(21, '300', 'maximun free fromat page allowed', 1, '2011-03-22'),
(30, 'Tentex (Malaysia) Sdn. Bhd.', 'Website title', 1, '2012-12-28'),
(31, 'on', 'On Off Running Text', 1, '2013-04-17'),
(32, 'MCPA Online Feedback Form', 'Feedback form Subject Title', 1, '2013-04-19'),
(33, 'From website visitor', 'Header for Feedback Form', 1, '2013-04-19'),
(34, 'MCPA Online Feedback Form', 'Title for Feedback Form', 1, '2013-04-19'),
(35, 'Arial, Helvetica, sans-serif;', 'Horizontal menu font', 1, '2013-04-26'),
(36, 'Arial, Helvetica, sans-serif;', 'Vertical  menu font', 1, '2013-04-26'),
(37, '100', 'Max. number of category level 2', 1, '2013-04-22'),
(38, '100', 'Max. number of category level 3', 1, '2013-04-22'),
(39, 'true', 'Include free format page in horizontal menu or not?', 1, '2013-04-26'),
(40, 'true', 'Include free format page in vertical menu or not?', 1, '2013-04-26');

-- --------------------------------------------------------

--
-- Table structure for table `dcui_template_setting`
--

CREATE TABLE `dcui_template_setting` (
  `id` int(11) NOT NULL,
  `section_id` varchar(500) COLLATE latin1_general_ci NOT NULL,
  `table_field` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `field_title_display` int(2) NOT NULL,
  `field_status` varchar(5) COLLATE latin1_general_ci NOT NULL,
  `field_name` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `field_limit` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `field_type` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `field_position` int(11) NOT NULL,
  `field_display` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `field_remark` varchar(1000) COLLATE latin1_general_ci NOT NULL,
  `price_currency` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `price_note` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `status` int(3) NOT NULL,
  `date_posted` date NOT NULL,
  `date_modified` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `dcui_template_setting`
--

INSERT INTO `dcui_template_setting` (`id`, `section_id`, `table_field`, `field_title_display`, `field_status`, `field_name`, `field_limit`, `field_type`, `field_position`, `field_display`, `field_remark`, `price_currency`, `price_note`, `status`, `date_posted`, `date_modified`) VALUES
(1, '140', 'field1', 0, '1', 'Title', '50', 'text', 2, '3', 'Max. character 50 character only.', '', '', 1, '2011-04-19', '0000-00-00'),
(2, '140', 'field2', 0, '1', 'Photo1', '100', 'file', 11, '3', 'recommended image size\r\n500 x 375 pixels.', '', '', 1, '2011-04-19', '0000-00-00'),
(3, '140', 'field16', 0, '1', 'Remark', '500', 'textarea', 38, '2', 'Max. character 500 character only.', '', '', 1, '2011-04-19', '0000-00-00'),
(4, '140', 'field17', 1, '1', 'Terms & Conditions', '', 'tiny', 40, '2', '', '', '', 1, '2011-04-19', '0000-00-00'),
(6, '140', 'field10', 0, '1', 'photo9', '100', 'file', 19, '2', 'recommended image size\r\n500 x 375 pixels.', '', '', 1, '2011-04-20', '0000-00-00'),
(7, '140', 'field9', 0, '1', 'photo8', '100', 'file', 18, '2', 'recommended image size\r\n500 x 375 pixels.', '', '', 1, '2011-04-20', '0000-00-00'),
(8, '140', 'field11', 0, '1', 'photo10', '100', 'file', 20, '2', 'recommended image size\r\n500 x 375 pixels.', '', '', 1, '2011-04-20', '0000-00-00'),
(9, '140', 'field8', 0, '1', 'photo7', '100', 'file', 17, '2', 'recommended image size\r\n500 x 375 pixels.', '', '', 1, '2011-04-20', '0000-00-00'),
(10, '140', 'field7', 0, '1', 'photo6', '100', 'file', 16, '2', 'recommended image size\r\n500 x 375 pixels.', '', '', 1, '2011-04-20', '0000-00-00'),
(11, '140', 'field6', 0, '1', 'photo5', '100', 'file', 15, '2', 'recommended image size\r\n500 x 375 pixels.', '', '', 1, '2011-04-20', '0000-00-00'),
(12, '140', 'field5', 0, '1', 'photo4', '100', 'file', 14, '2', 'recommended image size\r\n500 x 375 pixels.', '', '', 1, '2011-04-20', '0000-00-00'),
(13, '140', 'field4', 0, '1', 'photo3', '100', 'file', 13, '2', 'recommended image size\r\n500 x 375 pixels.', '', '', 1, '2011-04-20', '0000-00-00'),
(14, '140', 'field3', 0, '1', 'photo2', '100', 'file', 12, '2', 'recommended image size\r\n500 x 375 pixels.', '', '', 1, '2011-04-20', '0000-00-00'),
(15, '140', 'field13', 0, '1', 'photo12', '100', 'file', 22, '2', 'recommended image size\r\n500 x 375 pixels.\r\n', '', '', 1, '2011-04-20', '0000-00-00'),
(16, '140', 'field12', 0, '1', 'photo11', '100', 'file', 21, '2', 'recommended image size\r\n500 x 375 pixels.\r\n', '', '', 1, '2011-04-20', '0000-00-00'),
(17, '140', 'field15', 1, '1', 'Excludes', '100', 'text', 32, '2', 'Max. character 100 character only.', '', '', 1, '2011-04-20', '0000-00-00'),
(18, '140', 'field14', 1, '1', 'Includes', '100', 'text', 31, '2', 'Max. character 100 character only.', '', '', 1, '2011-04-20', '0000-00-00'),
(19, '140', 'field25', 0, '1', 'position', '11', 'text', 41, '0', 'This is for position only', '', '', 1, '2011-04-20', '0000-00-00'),
(20, '140', 'field18', 0, '1', 'Price', '11', 'price', 7, '3', 'Numeric only', 'RM', 'per person', 1, '2011-04-20', '0000-00-00'),
(21, '140', 'field21', 0, '1', 'Min. Person', '50', 'text', 6, '3', 'Max. character 50 character only.', '', '', 1, '2011-04-20', '0000-00-00'),
(22, '140', 'field19', 0, '1', 'Duration', '50', 'text', 4, '3', 'Max. character 50 character only.', '', '', 1, '2011-04-20', '0000-00-00'),
(23, '140', 'field20', 0, '0', '', '', 'text', 0, '0', '', '', '', 1, '2011-04-21', '0000-00-00'),
(24, '140', 'field22', 0, '1', 'Code', '20', 'text', 3, '3', '', '', '', 1, '2001-12-31', '0000-00-00'),
(25, '140', 'field23', 0, '1', 'Departure', '20', 'text', 5, '2', '', '', '', 1, '2001-12-31', '0000-00-00'),
(26, '140', 'field24', 0, '0', 'Note', '100', 'text', 39, '2', '', '', '', 1, '2001-12-31', '0000-00-00'),
(27, '140', 'field26', 0, '1', 'View Details', '', 'tiny', 30, '2', '', '', '', 1, '2001-12-31', '0000-00-00'),
(56, '150', 'field1', 0, '1', 'Title', '50', 'text', 2, '3', 'Max. character 50 character only.', '', '', 1, '2001-12-31', '0000-00-00'),
(30, '149', 'field1', 0, '1', 'Title', '50', 'text', 2, '3', 'Max. character 50 character only.', '', '', 1, '2001-12-31', '0000-00-00'),
(31, '149', 'field2', 0, '1', 'Photo1', '100', 'file', 11, '3', 'recommended image size\r\n500 x 375 pixels.', '', '', 1, '2001-12-31', '0000-00-00'),
(32, '149', 'field16', 0, '1', 'Remark', '500', 'textarea', 38, '2', 'Max. character 500 character only.', '', '', 1, '2001-12-31', '0000-00-00'),
(33, '149', 'field17', 1, '1', 'Terms & Conditions', '', 'tiny', 40, '2', '', '', '', 1, '2001-12-31', '0000-00-00'),
(34, '149', 'field10', 0, '1', 'photo9', '100', 'file', 19, '2', 'recommended image size\r\n500 x 375 pixels.', '', '', 1, '2001-12-31', '0000-00-00'),
(35, '149', 'field9', 0, '1', 'photo8', '100', 'file', 18, '2', 'recommended image size\r\n500 x 375 pixels.', '', '', 1, '2001-12-31', '0000-00-00'),
(36, '149', 'field11', 0, '1', 'photo10', '100', 'file', 20, '2', 'recommended image size\r\n500 x 375 pixels.', '', '', 1, '2001-12-31', '0000-00-00'),
(37, '149', 'field8', 0, '1', 'photo7', '100', 'file', 17, '2', 'recommended image size\r\n500 x 375 pixels.', '', '', 1, '2001-12-31', '0000-00-00'),
(38, '149', 'field7', 0, '1', 'photo6', '100', 'file', 16, '2', 'recommended image size\r\n500 x 375 pixels.', '', '', 1, '2001-12-31', '0000-00-00'),
(39, '149', 'field6', 0, '1', 'photo5', '100', 'file', 15, '2', 'recommended image size\r\n500 x 375 pixels.', '', '', 1, '2001-12-31', '0000-00-00'),
(40, '149', 'field5', 0, '1', 'photo4', '100', 'file', 14, '2', 'recommended image size\r\n500 x 375 pixels.', '', '', 1, '2001-12-31', '0000-00-00'),
(41, '149', 'field4', 0, '1', 'photo3', '100', 'file', 13, '2', 'recommended image size\r\n500 x 375 pixels.', '', '', 1, '2001-12-31', '0000-00-00'),
(42, '149', 'field3', 0, '1', 'photo2', '100', 'file', 12, '2', 'recommended image size\r\n500 x 375 pixels.', '', '', 1, '2001-12-31', '0000-00-00'),
(43, '149', 'field13', 0, '1', 'photo12', '100', 'file', 22, '2', 'recommended image size\r\n500 x 375 pixels.\r\n', '', '', 1, '2001-12-31', '0000-00-00'),
(44, '149', 'field12', 0, '1', 'photo11', '100', 'file', 21, '2', 'recommended image size\r\n500 x 375 pixels.\r\n', '', '', 1, '2001-12-31', '0000-00-00'),
(45, '149', 'field15', 1, '1', 'Excludes', '100', 'text', 31, '2', 'Max. character 100 character only.', '', '', 1, '2001-12-31', '0000-00-00'),
(46, '149', 'field14', 1, '1', 'Includes', '100', 'text', 30, '2', 'Max. character 100 character only.', '', '', 1, '2001-12-31', '0000-00-00'),
(47, '149', 'field25', 0, '1', 'position', '11', 'text', 41, '0', 'This is for position only', '', '', 1, '2001-12-31', '0000-00-00'),
(48, '149', 'field18', 0, '1', 'Price', '11', 'price', 7, '3', 'Numeric only', 'RM', 'per person', 1, '2001-12-31', '0000-00-00'),
(49, '149', 'field21', 0, '1', 'Min. Person', '50', 'text', 6, '3', 'Max. character 50 character only.', '', '', 1, '2001-12-31', '0000-00-00'),
(50, '149', 'field19', 0, '1', 'Duration', '50', 'text', 4, '3', 'Max. character 50 character only.', '', '', 1, '2001-12-31', '0000-00-00'),
(51, '149', 'field20', 0, '0', '', '', 'text', 0, '0', '', '', '', 1, '2001-12-31', '0000-00-00'),
(52, '149', 'field22', 0, '1', 'Code', '20', 'text', 3, '3', '', '', '', 1, '2001-12-31', '0000-00-00'),
(53, '149', 'field23', 0, '1', 'Departure', '20', 'text', 5, '2', '', '', '', 1, '2001-12-31', '0000-00-00'),
(54, '149', 'field24', 0, '0', 'Note', '100', 'text', 39, '2', '', '', '', 1, '2001-12-31', '0000-00-00'),
(55, '149', 'field26', 0, '1', 'View Details', '', 'tiny', 32, '2', '', '', '', 1, '2001-12-31', '0000-00-00'),
(57, '150', 'field2', 0, '1', 'Photo1', '100', 'file', 11, '3', 'recommended image size\r\n500 x 375 pixels.', '', '', 1, '2001-12-31', '0000-00-00'),
(58, '150', 'field16', 0, '1', 'Remark', '500', 'textarea', 38, '2', 'Max. character 500 character only.', '', '', 1, '2001-12-31', '0000-00-00'),
(59, '150', 'field17', 1, '1', 'Terms & Conditions', '', 'tiny', 40, '2', '', '', '', 1, '2001-12-31', '0000-00-00'),
(60, '150', 'field10', 0, '1', 'photo9', '100', 'file', 19, '2', 'recommended image size\r\n500 x 375 pixels.', '', '', 1, '2001-12-31', '0000-00-00'),
(61, '150', 'field9', 0, '1', 'photo8', '100', 'file', 18, '2', 'recommended image size\r\n500 x 375 pixels.', '', '', 1, '2001-12-31', '0000-00-00'),
(62, '150', 'field11', 0, '1', 'photo10', '100', 'file', 20, '2', 'recommended image size\r\n500 x 375 pixels.', '', '', 1, '2001-12-31', '0000-00-00'),
(63, '150', 'field8', 0, '1', 'photo7', '100', 'file', 17, '2', 'recommended image size\r\n500 x 375 pixels.', '', '', 1, '2001-12-31', '0000-00-00'),
(64, '150', 'field7', 0, '1', 'photo6', '100', 'file', 16, '2', 'recommended image size\r\n500 x 375 pixels.', '', '', 1, '2001-12-31', '0000-00-00'),
(65, '150', 'field6', 0, '1', 'photo5', '100', 'file', 15, '2', 'recommended image size\r\n500 x 375 pixels.', '', '', 1, '2001-12-31', '0000-00-00'),
(66, '150', 'field5', 0, '1', 'photo4', '100', 'file', 14, '2', 'recommended image size\r\n500 x 375 pixels.', '', '', 1, '2001-12-31', '0000-00-00'),
(67, '150', 'field4', 0, '1', 'photo3', '100', 'file', 13, '2', 'recommended image size\r\n500 x 375 pixels.', '', '', 1, '2001-12-31', '0000-00-00'),
(68, '150', 'field3', 0, '1', 'photo2', '100', 'file', 12, '2', 'recommended image size\r\n500 x 375 pixels.', '', '', 1, '2001-12-31', '0000-00-00'),
(69, '150', 'field13', 0, '1', 'photo12', '100', 'file', 22, '2', 'recommended image size\r\n500 x 375 pixels.\r\n', '', '', 1, '2001-12-31', '0000-00-00'),
(70, '150', 'field12', 0, '1', 'photo11', '100', 'file', 21, '2', 'recommended image size\r\n500 x 375 pixels.\r\n', '', '', 1, '2001-12-31', '0000-00-00'),
(71, '150', 'field15', 1, '1', 'Excludes', '100', 'text', 31, '2', 'Max. character 100 character only.', '', '', 1, '2001-12-31', '0000-00-00'),
(72, '150', 'field14', 1, '1', 'Includes', '100', 'text', 30, '2', 'Max. character 100 character only.', '', '', 1, '2001-12-31', '0000-00-00'),
(73, '150', 'field25', 0, '1', 'position', '11', 'text', 41, '0', 'This is for position only', '', '', 1, '2001-12-31', '0000-00-00'),
(74, '150', 'field18', 0, '1', 'Price', '11', 'price', 7, '3', 'Numeric only', 'RM', 'per person', 1, '2001-12-31', '0000-00-00'),
(75, '150', 'field21', 0, '1', 'Min. Person', '50', 'text', 6, '3', 'Max. character 50 character only.', '', '', 1, '2001-12-31', '0000-00-00'),
(76, '150', 'field19', 0, '1', 'Duration', '50', 'text', 4, '3', 'Max. character 50 character only.', '', '', 1, '2001-12-31', '0000-00-00'),
(77, '150', 'field20', 0, '0', '', '', 'text', 0, '0', '', '', '', 1, '2001-12-31', '0000-00-00'),
(78, '150', 'field22', 0, '1', 'Code', '20', 'text', 3, '3', '', '', '', 1, '2001-12-31', '0000-00-00'),
(79, '150', 'field23', 0, '1', 'Departure', '20', 'text', 5, '2', '', '', '', 1, '2001-12-31', '0000-00-00'),
(80, '150', 'field24', 0, '0', 'Note', '100', 'text', 39, '2', '', '', '', 1, '2001-12-31', '0000-00-00'),
(81, '150', 'field26', 0, '1', 'View Details', '', 'tiny', 32, '2', '', '', '', 1, '2001-12-31', '0000-00-00'),
(82, '140', 'field27', 0, '1', 'PDF', '50', 'file02', 50, '2', 'Max. size: 10MB. File format: PDF, doc, xls', '', '', 1, '2011-04-24', '0000-00-00'),
(83, '149', 'field27', 0, '1', 'Attachment', '50', 'file02', 4, '2', 'PDF file ony', '', '', 1, '2011-05-14', '0000-00-00'),
(84, '', 'field1', 0, '1', 'Brand_logo', '100', 'file', 0, '2', 'Format: jpg, gif, png only.', '', '', 1, '2011-08-22', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `dcui_template_setting1`
--

CREATE TABLE `dcui_template_setting1` (
  `id` int(11) NOT NULL,
  `section_id` varchar(500) COLLATE latin1_general_ci NOT NULL,
  `table_field` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `field_title_display` int(2) NOT NULL,
  `field_status` varchar(5) COLLATE latin1_general_ci NOT NULL,
  `field_name` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `field_limit` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `field_type` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `field_position` int(11) NOT NULL,
  `field_display` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `field_remark` varchar(1000) COLLATE latin1_general_ci NOT NULL,
  `price_currency` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `price_note` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `status` int(3) NOT NULL,
  `date_posted` date NOT NULL,
  `date_modified` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dw_maincat`
--

CREATE TABLE `dw_maincat` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `maincat_name` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `photo` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `category_stat` text COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `dw_maincat`
--

INSERT INTO `dw_maincat` (`category_id`, `category_name`, `maincat_name`, `status`, `photo`, `category_stat`) VALUES
(81, 'test', 1, 1, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `news_id` int(4) NOT NULL,
  `comid` int(4) NOT NULL DEFAULT 0,
  `photo` varchar(200) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `photo_desc` longtext COLLATE latin1_general_ci NOT NULL,
  `photo2` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `photo_desc2` text COLLATE latin1_general_ci NOT NULL,
  `photo3` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `photo_desc3` text COLLATE latin1_general_ci NOT NULL,
  `photo4` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `photo_desc4` text COLLATE latin1_general_ci NOT NULL,
  `photo5` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `photo_desc5` text COLLATE latin1_general_ci NOT NULL,
  `photo6` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `photo_desc6` text COLLATE latin1_general_ci NOT NULL,
  `photo_stat` int(4) NOT NULL DEFAULT 0,
  `news_title` varchar(200) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `category` int(11) NOT NULL DEFAULT 1,
  `news_content` longtext COLLATE latin1_general_ci NOT NULL,
  `news_stat` int(4) NOT NULL DEFAULT 0,
  `news_date` date NOT NULL DEFAULT '0000-00-00',
  `news_path` varchar(240) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `pl_path` varchar(200) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `news_cat` char(1) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `news_author` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `news_source` varchar(200) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `pdf_file` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events_02`
--

CREATE TABLE `events_02` (
  `id` int(11) NOT NULL,
  `category` longtext COLLATE latin1_general_ci NOT NULL,
  `image1` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `image2` varchar(111) COLLATE latin1_general_ci NOT NULL,
  `image3` varchar(111) COLLATE latin1_general_ci NOT NULL,
  `name` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `status` int(11) NOT NULL DEFAULT 1,
  `pdf_file` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `weblink` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `type` int(11) NOT NULL DEFAULT 2,
  `briefing` varchar(500) COLLATE latin1_general_ci NOT NULL,
  `description` longtext COLLATE latin1_general_ci NOT NULL,
  `comment_featured` int(2) NOT NULL,
  `date` date NOT NULL DEFAULT '0000-00-00',
  `happening` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `events_02`
--

INSERT INTO `events_02` (`id`, `category`, `image1`, `image2`, `image3`, `name`, `status`, `pdf_file`, `weblink`, `type`, `briefing`, `description`, `comment_featured`, `date`, `happening`) VALUES
(83, '|222|225|', '', '', '', 'Launched Our New Product', 1, '', '', 0, 'Welcome', '<p style=\"text-align: justify;\"><span style=\"font-size: medium;\"><span style=\"font-size: 12pt;\">Welcome to our new and improved website with more products to showcase.</span><br /><br /><span style=\"font-size: 12pt;\">Choose from amongst our wide selections of quality products from Tentex.</span><br /></span></p>', 0, '2019-10-01', ''),
(87, '|', 'photo/51f20dcaca95f.jpg', '', '', 'Business Opportunities', 0, '', 'http://www.', 0, '<p><strong><span style=\"font-family: trebuchet ms,geneva;\"><span style=\"color: #ff6600;\"><span style=\"font-size: medium;\">Do BUSINESS with us</span></span></span></strong></p>', '<p><span style=\"font-family: trebuchet ms,geneva;\"><span style=\"font-size: small;\">TENTEX is looking for Overseas Distributors for our branded product. <br />If you are interested, contact us today!</span></span></p>', 0, '2013-07-26', ''),
(88, '|222|225|', 'photo/53b4ac6b625e1.jpg', '', '', 'Business Opportunities', 0, '', 'http://www.', 0, 'Do BUSINESS with us', 'TENTEX is looking for Overseas Distributors for our branded product.\r\n\r\nIf you are interested, contact us today!', 0, '2017-11-03', '');

-- --------------------------------------------------------

--
-- Table structure for table `file_maincat`
--

CREATE TABLE `file_maincat` (
  `maincat_id` int(11) NOT NULL,
  `maincat_name` varchar(250) NOT NULL DEFAULT '',
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `file_manager`
--

CREATE TABLE `file_manager` (
  `id` int(11) NOT NULL,
  `caption` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `file` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `created` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `file_manager`
--

INSERT INTO `file_manager` (`id`, `caption`, `file`, `created`) VALUES
(1, '', '../attachment/517f8de944aa7.pdf', '2013-04-30'),
(2, '', '../attachment/517f8f21a408a.pdf', '2013-04-30'),
(3, '', '../attachment/517f8f457de2f.pdf', '2013-04-30'),
(4, '2121212', '../attachment/517f8f4e9c676.pdf', '2013-04-30'),
(5, '1', '../attachment/517f8f94c65d9.pdf', '2013-04-30'),
(6, '22', '../attachment/517f8fbbcdfec.pdf', '2013-04-30'),
(7, '22', '../attachment/517f8fcd6ad02.pdf', '2013-04-30'),
(8, 'New Product', '../attachment/5196ed523e0f7.pdf', '2013-05-18'),
(9, 'spray on front page', '../photo/519c410c892f1.jpg', '2013-05-22'),
(10, 'spray on cover', '../photo/519c523902a96.jpg', '2013-05-22'),
(11, '', '../photo/519c535309c4a.jpg', '2013-05-22'),
(12, 'spray on front page', '../attachment/519c596c12d05.pdf', '2013-05-22'),
(13, 'Spray On Pattern', '../photo/519c6df8b4e62.jpg', '2013-05-22'),
(14, 'Spray On Brochure', '../photo/519cdb8697d84.jpg', '2013-05-22'),
(15, 'Spray On Brochure-Front Page', '../photo/519cdbf935ec5.jpg', '2013-05-22'),
(16, 'Spray On Brochure-pg2', '../photo/519cdc570758c.jpg', '2013-05-22'),
(17, 'Spray On', '../photo/519cdc7c664a1.jpg', '2013-05-22'),
(18, 'B1', '../photo/519cddec39da2.jpg', '2013-05-22'),
(19, 'Spray On-Page 1', '../photo/519ce10787380.jpg', '2013-05-22'),
(20, 'B1-Page 1', '../photo/519ce128e4fe5.jpg', '2013-05-22'),
(21, 'B1-Page 2', '../photo/519ce1400e253.jpg', '2013-05-22'),
(22, 'B1-Page 3', '../photo/519ce1604878e.jpg', '2013-05-22'),
(23, 'B1-Page 4', '../photo/519ce17e72bb8.jpg', '2013-05-22'),
(24, 'B1-Page 6', '../photo/519ce5675e366.jpg', '2013-05-22'),
(25, 'B2-Page1', '../photo/519ce7f979108.jpg', '2013-05-22'),
(26, 'B2-Page 2', '../photo/519ce836a6b94.jpg', '2013-05-22'),
(27, 'B2-Page 4', '../photo/519ce8a90da65.jpg', '2013-05-22'),
(28, 'B2-Page 6', '../photo/519ce968aaa40.jpg', '2013-05-22'),
(29, 'B2-Page 8', '../photo/519ce9f55d3bd.jpg', '2013-05-22'),
(30, 'Sport Court ', '../photo/51b5965818f4d.jpg', '2013-06-10'),
(31, 'spray on 1st page', '../photo/51b68c6f874f9.jpg', '2013-06-11'),
(32, 'spray on 2nd page', '../photo/51b68c9c91986.jpg', '2013-06-11'),
(33, 'spray on 3rd page', '../photo/51b68cb78ac8d.jpg', '2013-06-11'),
(34, '', '../attachment/51b6975b4c7ef.pdf', '2013-06-11'),
(35, '', '../photo/51b69a80deff3.jpg', '2013-06-11'),
(36, '', '../attachment/51b6a0280577a.pdf', '2013-06-11'),
(37, '', '../attachment/51b6b25006e46.pdf', '2013-06-11'),
(38, '', '../photo/51b6b7d46142e.jpg', '2013-06-11'),
(39, '', '../photo/51b6b9900674a.jpg', '2013-06-11'),
(40, 'Stamped Pattern', '../photo/51b6bcc0bb5c0.jpg', '2013-06-11'),
(41, 'Stamped Color', '../photo/51b6bd64a80f3.jpg', '2013-06-11'),
(42, 'Stamped Brochure', '../attachment/51b6beb98a899.pdf', '2013-06-11'),
(43, 'Color Thru ', '../photo/51b6c0a75dd8e.jpg', '2013-06-11'),
(44, 'about us photo', '../photo/51b97b2c8c6b7.jpg', '2013-06-13'),
(45, 'about us ', '../photo/51b97d258075d.jpg', '2013-06-13'),
(46, 'Stamped 1', '../photo/51bc07c7ba785.jpg', '2013-06-15'),
(47, 'Stamped Pattern', '../photo/51bc07f740a96.jpg', '2013-06-15'),
(48, 'Stamped Color', '../photo/51bc083fbf403.jpg', '2013-06-15'),
(49, 'Sport Brochure 1', '../photo/51bc1928e81ef.jpg', '2013-06-15'),
(50, 'Sport Color', '../photo/51bc19953337f.jpg', '2013-06-15'),
(51, 'Sports Brochure', '../attachment/51bc1b00aadbb.pdf', '2013-06-15'),
(52, '', '../photo/51bec88cb1a58.jpg', '2013-06-17'),
(53, 'Our product -Spray On ', '../photo/51becb59e280a.jpg', '2013-06-17'),
(54, '', '../photo/51becd1f24ca5.jpg', '2013-06-17'),
(55, '', '../photo/51becf7275dd3.jpg', '2013-06-17'),
(56, 'GRAPHIC DESIGN', '../photo/51bfb8761e6ec.jpg', '2013-06-18'),
(57, 'Stamped Photo', '../photo/51bfc1ba8c873.jpg', '2013-06-18'),
(58, '', '../photo/51bfd9123f25d.jpg', '2013-06-18'),
(59, '', '../photo/51bff7544d107.jpg', '2013-06-18'),
(60, '', '../photo/51bfffed23cdc.jpg', '2013-06-18'),
(61, '', '../photo/51c00e44a2453.jpg', '2013-06-18'),
(62, 'SL 2', '../photo/51c010470ba6d.jpg', '2013-06-18'),
(63, '', '../photo/51c010d754e01.jpg', '2013-06-18'),
(64, '', '../photo/51c0118d55618.jpg', '2013-06-18'),
(65, '', '../photo/51c148a9aef4d.jpg', '2013-06-19'),
(66, '22', '../photo/51c14c15e564a.jpg', '2013-06-19'),
(67, '', '../photo/51c27b3e306f1.jpg', '2013-06-20'),
(68, 'stamped pattern', '../photo/51cbef844c499.jpg', '2013-06-27'),
(69, 'stamped bro', '../attachment/51cbefd51c310.pdf', '2013-06-27'),
(70, 'stmp bro ', '../attachment/51cbf28a428a1.pdf', '2013-06-27'),
(71, '', '../photo/53183aa1a97f6.jpg', '2014-03-06'),
(72, 'MAP', '../photo/53183b10c16ce.jpg', '2014-03-06'),
(73, '', '../photo/53194051a4624.jpg', '2014-03-07'),
(74, '', '../photo/531940b22995f.jpg', '2014-03-07'),
(75, '', '../photo/531940caa132e.jpg', '2014-03-07'),
(76, 'Map 680', '../photo/531941206046f.jpg', '2014-03-07'),
(77, '', '../photo/5368923f5a208.jpg', '2014-05-06'),
(78, '', '../photo/536c95705008e.gif', '2014-05-09'),
(79, '', '../photo/536c98d0bbea1.jpg', '2014-05-09'),
(80, '', '../attachment/56c1929a6697a.pdf', '2016-02-15'),
(81, '', '../photo/5a0aaa6b3492c.jpg', '2017-11-14'),
(82, '', '../photo/5a13b710bb722.jpg', '2017-11-21'),
(83, '', '../attachment/5a13b7cc401b6.pdf', '2017-11-21'),
(84, '', '../attachment/5a13b83e81860.pdf', '2017-11-21'),
(85, '', '../photo/5a13c14925120.jpg', '2017-11-21'),
(86, '', '../attachment/5a13c38d8f0ef.pdf', '2017-11-21'),
(87, '', '../attachment/5a151be0e9b88.pdf', '2017-11-22'),
(88, '', '../attachment/5a165e91db3c4.pdf', '2017-11-23'),
(89, '', '../photo/5a1662651e27f.jpg', '2017-11-23'),
(90, '', '../attachment/5a166646b1048.pdf', '2017-11-23'),
(91, 'Sports Court Broc', '../attachment/5a7e61e648cb1.pdf', '2018-02-10'),
(92, 'New sport front page', '../photo/5a7eaad35385f.jpg', '2018-02-10'),
(93, 'New sport color', '../photo/5a7ead982f10c.jpg', '2018-02-10'),
(94, '', '../attachment/5b8ce7e235e7d.pdf', '2018-09-03'),
(95, '', '../attachment/5b8cefff94987.pdf', '2018-09-03'),
(96, '', '../attachment/5b8cf705e1144.pdf', '2018-09-03'),
(97, '', '../attachment/5bc6e14da3016.pdf', '2018-10-17'),
(98, '', '../attachment/5d2d84fc39213.pdf', '2019-07-16'),
(99, '', '../attachment/5d2d852f40c5f.pdf', '2019-07-16'),
(100, '', '../photo/5d2d8818279b9.jpg', '2019-07-16'),
(101, '', '../photo/5d2d8951a1c57.jpg', '2019-07-16'),
(102, '', '../photo/5d2d89620a95b.jpg', '2019-07-16'),
(103, '', '../photo/5d2d8d76064ed.jpg', '2019-07-16'),
(104, '', '../attachment/5d96a8f3db286.pdf', '2019-10-04'),
(105, '', '../photo/5d96baec5fc87.jpg', '2019-10-04'),
(106, '', '../photo/5d96bd0e26453.jpg', '2019-10-04'),
(107, '', '../attachment/5d96f22ec3e58.pdf', '2019-10-04'),
(108, '', '../photo/5d96f2d511906.jpg', '2019-10-04'),
(109, '', '../photo/5d96f3abc3c65.jpg', '2019-10-04'),
(110, '', '../photo/5d96f3b992fb3.jpg', '2019-10-04'),
(111, '', '../photo/5d96fb9cbc468.jpg', '2019-10-04'),
(112, '', '../attachment/5d96fd1d12bcd.pdf', '2019-10-04'),
(113, '', '../attachment/5d9705a81aafa.pdf', '2019-10-04'),
(114, '', '../photo/5d9706662703f.jpg', '2019-10-04'),
(115, '', '../photo/5d9706c1a649b.jpg', '2019-10-04'),
(116, '', '../photo/5d983f62db109.jpg', '2019-10-05'),
(117, '', '../photo/5d984713d32a1.jpg', '2019-10-05'),
(118, '', '../photo/5d98474449582.jpg', '2019-10-05');

-- --------------------------------------------------------

--
-- Table structure for table `file_upload`
--

CREATE TABLE `file_upload` (
  `file_id` int(11) NOT NULL,
  `category` varchar(1000) NOT NULL DEFAULT '0',
  `subject` varchar(250) NOT NULL DEFAULT '',
  `file` varchar(250) NOT NULL DEFAULT '',
  `title` varchar(250) NOT NULL DEFAULT '',
  `status` int(11) NOT NULL DEFAULT 1,
  `date` date NOT NULL DEFAULT '0000-00-00',
  `hit_rates` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `file_upload02`
--

CREATE TABLE `file_upload02` (
  `file_id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL DEFAULT '0',
  `subject` varchar(250) NOT NULL DEFAULT '',
  `file` varchar(250) NOT NULL DEFAULT '',
  `video_link` varchar(700) NOT NULL,
  `title` varchar(250) NOT NULL DEFAULT '',
  `status` int(11) NOT NULL DEFAULT 1,
  `date` date NOT NULL DEFAULT '0000-00-00',
  `hit_rates` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file_upload02`
--

INSERT INTO `file_upload02` (`file_id`, `category`, `subject`, `file`, `video_link`, `title`, `status`, `date`, `hit_rates`) VALUES
(2, '|1|', 'YouTube', 'file/', '<object width=\"480\" height=\"385\"><param name=\"movie\" value=\"http://www.youtube.com/v/dYXCjENbqSs?fs=1&amp;hl=en_US\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"allowscriptaccess\" value=\"always\"></param><embed src=\"http://www.youtube.com/v/dYXCjENbqSs?fs=1&amp;hl=en_US\" type=\"application/x-shockwave-flash\" allowscriptaccess=\"always\" allowfullscreen=\"true\" width=\"480\" height=\"385\"></embed></object>', 'Mysteries of Borneo', 1, '2010-10-27', 18);

-- --------------------------------------------------------

--
-- Table structure for table `flash`
--

CREATE TABLE `flash` (
  `banner_id` int(11) NOT NULL,
  `banner_file` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `type` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci PACK_KEYS=0;

-- --------------------------------------------------------

--
-- Table structure for table `hartz_events`
--

CREATE TABLE `hartz_events` (
  `news_id` int(4) NOT NULL,
  `comid` int(4) NOT NULL DEFAULT 0,
  `photo` varchar(200) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `photo_desc` longtext COLLATE latin1_general_ci NOT NULL,
  `photo2` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `photo_desc2` text COLLATE latin1_general_ci NOT NULL,
  `photo3` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `photo_desc3` text COLLATE latin1_general_ci NOT NULL,
  `photo4` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `photo_desc4` text COLLATE latin1_general_ci NOT NULL,
  `photo5` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `photo_desc5` text COLLATE latin1_general_ci NOT NULL,
  `photo6` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `photo_desc6` text COLLATE latin1_general_ci NOT NULL,
  `photo_stat` int(4) NOT NULL DEFAULT 0,
  `news_title` varchar(200) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `category` int(11) NOT NULL DEFAULT 1,
  `news_content` longtext COLLATE latin1_general_ci NOT NULL,
  `news_stat` int(4) NOT NULL DEFAULT 0,
  `news_date` date NOT NULL DEFAULT '0000-00-00',
  `date` date NOT NULL DEFAULT '0000-00-00',
  `news_path` varchar(240) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `pl_path` varchar(200) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `news_cat` char(1) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `news_author` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `news_source` varchar(200) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `pdf_file` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `home_content`
--

CREATE TABLE `home_content` (
  `id` int(11) NOT NULL,
  `content` longtext COLLATE latin1_general_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `date_posted` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `home_content`
--

INSERT INTO `home_content` (`id`, `content`, `status`, `date_posted`) VALUES
(1, '<p><span style=\"font-size: small;\">Company Profile<br />Corporate Strategy<br />Vision &amp; Mission</span></p>', 1, '2021-06-30'),
(2, '<p><span style=\"font-size: small;\">Tentex <sup>TM</sup> Spray On Paving<br />Tentex <sup>TM</sup> Spray On Color Thru<br />Tentex <sup>TM</sup> Spray On Graphic Design<br />Tentex <sup>TM</sup> Stencil Pattern Concrete<br />Tentex <sup>TM</sup> Stamped Concrete<br />Tentex <sup>TM</sup> Acrylic Sports Court Coating</span><br /><span style=\"font-size: small;\">Tentex <sup>TM</sup> Colored Seal Flooring<br /></span></p>', 1, '2021-06-30');

-- --------------------------------------------------------

--
-- Table structure for table `home_section`
--

CREATE TABLE `home_section` (
  `id` int(11) NOT NULL,
  `description` longtext COLLATE latin1_general_ci NOT NULL,
  `note` varchar(80) COLLATE latin1_general_ci NOT NULL,
  `status` int(2) NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inquiry_log`
--

CREATE TABLE `inquiry_log` (
  `id` int(11) NOT NULL,
  `readunread` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `reply_status` varchar(2) COLLATE latin1_general_ci NOT NULL,
  `date_posted_reply` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `time_reply` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `session_id` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `tour` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `title` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `name` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `contact` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `email02` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `country` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `no_days` int(250) NOT NULL,
  `day` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `no_passengers` int(250) NOT NULL,
  `no_children` int(250) NOT NULL,
  `date02` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `flight_no_a` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `date03` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `flight_no_d` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `preferred_hotel` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `room_type` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `meals` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `intended` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `information` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `date_posted` date NOT NULL,
  `time` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `status` varchar(250) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inquiry_log1`
--

CREATE TABLE `inquiry_log1` (
  `id` int(11) NOT NULL,
  `readunread` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `reply_status` varchar(2) COLLATE latin1_general_ci NOT NULL,
  `date_posted_reply` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `time_reply` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `session_id` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `tour` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `name` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `contactperson` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `email02` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `phone` int(250) NOT NULL,
  `fax` int(250) NOT NULL,
  `travel` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `adult` int(50) NOT NULL,
  `children` int(50) NOT NULL,
  `p_requirement` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `foc` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `s_interest` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `acc` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `meals` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `meals1` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `meals2` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `single` int(20) NOT NULL,
  `ddouble` int(20) NOT NULL,
  `triple` int(20) NOT NULL,
  `s_requirement` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `pdf_file` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `pdf_title` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `itinerary` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `date02` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `class_travel` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `f_detail` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `airlines` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `status` varchar(2) COLLATE latin1_general_ci NOT NULL,
  `date_posted` date NOT NULL,
  `time` varchar(250) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `left_cat`
--

CREATE TABLE `left_cat` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `category` int(11) NOT NULL DEFAULT 0,
  `position` int(11) NOT NULL DEFAULT 0,
  `logo` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `description` longtext COLLATE latin1_general_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `left_panel_content`
--

CREATE TABLE `left_panel_content` (
  `id` int(11) NOT NULL,
  `section` int(11) NOT NULL DEFAULT 0,
  `photo` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `content` text COLLATE latin1_general_ci NOT NULL,
  `hyperlink` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `attachment` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `photo2` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `content2` text COLLATE latin1_general_ci NOT NULL,
  `attachment2` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `hyperlink2` text COLLATE latin1_general_ci NOT NULL,
  `photo3` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `content3` text COLLATE latin1_general_ci NOT NULL,
  `attachment3` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `hyperlink3` text COLLATE latin1_general_ci NOT NULL,
  `photo4` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `content4` text COLLATE latin1_general_ci NOT NULL,
  `attachment4` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `hyperlink4` text COLLATE latin1_general_ci NOT NULL,
  `photo5` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `content5` text COLLATE latin1_general_ci NOT NULL,
  `attachment5` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `hyperlink5` text COLLATE latin1_general_ci NOT NULL,
  `setdefault` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `home` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `left_sec`
--

CREATE TABLE `left_sec` (
  `maincat_id` int(11) NOT NULL,
  `maincat_name` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `status` int(11) NOT NULL DEFAULT 1,
  `type` int(11) NOT NULL DEFAULT 0,
  `photo` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `description` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mem`
--

CREATE TABLE `mem` (
  `id` int(11) NOT NULL,
  `mem_fullname` varchar(250) NOT NULL,
  `mem_job_title` varchar(250) NOT NULL,
  `mem_email` varchar(250) NOT NULL,
  `mem_con_no` varchar(250) NOT NULL,
  `mem_ofc_no` varchar(250) NOT NULL,
  `mem_co_name` int(11) NOT NULL,
  `mem_login_name` varchar(250) NOT NULL,
  `mem_login_pass` varchar(250) NOT NULL,
  `mem_project_code` varchar(250) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `date_created` datetime NOT NULL,
  `login_time` datetime NOT NULL,
  `logout_time` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `member_profile`
--

CREATE TABLE `member_profile` (
  `id` int(11) NOT NULL,
  `category_stat` text COLLATE latin1_general_ci NOT NULL,
  `name` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `member_id` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `location` int(11) NOT NULL DEFAULT 0,
  `school` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `new_ic` varchar(15) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `gender` varchar(10) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `status` int(11) NOT NULL DEFAULT 1,
  `email` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `designation` text COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mh_left`
--

CREATE TABLE `mh_left` (
  `id` int(11) NOT NULL,
  `border_align` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '0',
  `border_valign` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '0',
  `drop_shadow` int(11) NOT NULL DEFAULT 0,
  `border_image` int(11) NOT NULL DEFAULT 0,
  `frame_color` text COLLATE latin1_general_ci NOT NULL,
  `background_color` text COLLATE latin1_general_ci NOT NULL,
  `bgphoto` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `border_color` text COLLATE latin1_general_ci NOT NULL,
  `border_width` int(11) NOT NULL DEFAULT 0,
  `photo` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `photo2` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `photo3` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `photo4` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `photo5` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `photo6` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `photo7` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `photo8` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `photo9` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `caption1` text COLLATE latin1_general_ci NOT NULL,
  `caption2` text COLLATE latin1_general_ci NOT NULL,
  `caption3` text COLLATE latin1_general_ci NOT NULL,
  `caption4` text COLLATE latin1_general_ci NOT NULL,
  `caption5` text COLLATE latin1_general_ci NOT NULL,
  `caption6` text COLLATE latin1_general_ci NOT NULL,
  `caption7` text COLLATE latin1_general_ci NOT NULL,
  `caption8` text COLLATE latin1_general_ci NOT NULL,
  `caption9` text COLLATE latin1_general_ci NOT NULL,
  `section` int(11) NOT NULL DEFAULT 0,
  `category` int(11) NOT NULL DEFAULT 0,
  `font_type` text COLLATE latin1_general_ci NOT NULL,
  `font_color` text COLLATE latin1_general_ci NOT NULL,
  `text1` longtext COLLATE latin1_general_ci NOT NULL,
  `text_align1` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `wrap_around` int(11) NOT NULL DEFAULT 0,
  `font_type1` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `font_size1` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '0',
  `font_color1` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `text2` longtext COLLATE latin1_general_ci NOT NULL,
  `text_align2` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `font_type2` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `font_size2` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `font_color2` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `status` int(11) NOT NULL DEFAULT 1,
  `pdf_file` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `weblink` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `template` int(11) NOT NULL DEFAULT 0,
  `setdefault` int(11) NOT NULL DEFAULT 0,
  `home` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mh_right`
--

CREATE TABLE `mh_right` (
  `id` int(11) NOT NULL,
  `border_align` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `border_valign` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `drop_shadow` int(11) NOT NULL DEFAULT 0,
  `border_image` int(11) NOT NULL DEFAULT 0,
  `frame_color` text COLLATE latin1_general_ci NOT NULL,
  `background_color` text COLLATE latin1_general_ci NOT NULL,
  `bgphoto` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `border_color` text COLLATE latin1_general_ci NOT NULL,
  `border_width` int(11) NOT NULL DEFAULT 0,
  `photo` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `photo2` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `photo3` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `photo4` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `photo5` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `photo6` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `photo7` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `photo8` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `photo9` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `caption1` text COLLATE latin1_general_ci NOT NULL,
  `caption2` text COLLATE latin1_general_ci NOT NULL,
  `caption3` text COLLATE latin1_general_ci NOT NULL,
  `caption4` text COLLATE latin1_general_ci NOT NULL,
  `caption5` text COLLATE latin1_general_ci NOT NULL,
  `caption6` text COLLATE latin1_general_ci NOT NULL,
  `caption7` text COLLATE latin1_general_ci NOT NULL,
  `caption8` text COLLATE latin1_general_ci NOT NULL,
  `caption9` text COLLATE latin1_general_ci NOT NULL,
  `section` int(11) NOT NULL DEFAULT 0,
  `category` int(11) NOT NULL DEFAULT 0,
  `font_type` text COLLATE latin1_general_ci NOT NULL,
  `font_color` text COLLATE latin1_general_ci NOT NULL,
  `text1` longtext COLLATE latin1_general_ci NOT NULL,
  `text_align1` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `wrap_around` int(11) NOT NULL DEFAULT 0,
  `font_type1` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `font_size1` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `font_color1` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `text2` longtext COLLATE latin1_general_ci NOT NULL,
  `text_align2` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `font_type2` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `font_size2` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `font_color2` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `brief_description` longtext COLLATE latin1_general_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `pdf_file` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `template` int(11) NOT NULL DEFAULT 0,
  `happening` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `event_date` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '0000-00-00',
  `weblink` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `time` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `setdefault` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mh_text`
--

CREATE TABLE `mh_text` (
  `id` int(11) NOT NULL,
  `message` text COLLATE latin1_general_ci NOT NULL,
  `type` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mm_photo_category`
--

CREATE TABLE `mm_photo_category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(150) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `cat_status` int(11) NOT NULL DEFAULT 0,
  `position` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mm_photo_gallery`
--

CREATE TABLE `mm_photo_gallery` (
  `photo_id` int(16) NOT NULL,
  `photo` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `photo_display` varchar(120) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `photo_title` varchar(120) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `photo_caption` varchar(120) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `photo_category` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `photo_desc` text COLLATE latin1_general_ci NOT NULL,
  `photo_status` int(4) NOT NULL DEFAULT 1,
  `posted_date` date NOT NULL DEFAULT '0000-00-00',
  `modified_date` date NOT NULL DEFAULT '0000-00-00',
  `position` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci PACK_KEYS=0;

-- --------------------------------------------------------

--
-- Table structure for table `murum_category`
--

CREATE TABLE `murum_category` (
  `subcat_id` int(11) NOT NULL,
  `maincat_id` int(11) NOT NULL,
  `subcat_name` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `position` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `murum_section`
--

CREATE TABLE `murum_section` (
  `maincat_id` int(11) NOT NULL,
  `section_type` int(2) NOT NULL,
  `lock_status` varchar(6) COLLATE latin1_general_ci NOT NULL,
  `showing` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `url_file` varchar(80) COLLATE latin1_general_ci NOT NULL,
  `photo` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `brand_logo` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `maincat_name` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `photo1` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `position` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '0',
  `date_posted` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `murum_section`
--

INSERT INTO `murum_section` (`maincat_id`, `section_type`, `lock_status`, `showing`, `url_file`, `photo`, `brand_logo`, `maincat_name`, `photo1`, `status`, `position`, `date_posted`) VALUES
(95, 2, '', 'true', 'gallery.php', '', '', 'Photo Gallery', '', 1, 'f', '2011-04-16'),
(20, 1, '', '', '', '', '', '', '', 1, '', '2011-02-18'),
(42, 1, '', 'false', '', '', '', 'Disclaimer', '', 1, 'z', '2011-03-21'),
(161, 1, '', 'true', '', '', '', 'Contact Us', '', 1, 'm', '2011-06-06'),
(176, 2, '', 'true', 'product.php', '', '', 'Our Products', '', 1, 'd', '2011-06-07'),
(178, 1, '', 'true', '', '', '', 'About Us', '', 1, '0', '2011-06-07'),
(204, 1, '', '', '', '', '', 'Concrete Resurfacing System', '', 1, 'd1', '2011-06-30'),
(222, 2, '', 'true', 'news.php', '', '', 'News', '', 1, 'k', '2011-06-30'),
(225, 1, '', '', '', '', '', 'Latest', '', 1, 'k1', '2011-06-30'),
(226, 1, '', '', '', '', '', 'Past', '', 0, '0', '2011-06-30'),
(245, 1, '', 'true', '', '', '', 'General FAQs', '', 1, 'e', '2012-02-24'),
(249, 1, '', 'true', '', '', '', 'Brochures', '', 1, 'g', '2012-07-09'),
(258, 1, '', '', '', '', '', 'Industrial Flooring', '', 0, '0', '2013-04-30'),
(255, 1, '', '', '', '', '', 'New Concrete Solutions', '', 1, 'd2', '2013-04-15'),
(256, 1, '', '', '', '', '', 'Sports Flooring', '', 1, 'd3', '2013-04-15'),
(262, 1, '', '', '', '', '', '', '', 1, '', '2013-06-10');

-- --------------------------------------------------------

--
-- Table structure for table `mydf_photo`
--

CREATE TABLE `mydf_photo` (
  `id` int(11) NOT NULL,
  `photo1` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mydf_product`
--

CREATE TABLE `mydf_product` (
  `id` int(11) NOT NULL,
  `pre_design_url` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `maincat_id` longtext COLLATE latin1_general_ci NOT NULL,
  `category_id` longtext COLLATE latin1_general_ci NOT NULL,
  `product_name` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `description` longtext COLLATE latin1_general_ci NOT NULL,
  `hyper_link` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `pdfcaption` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `attachment_file` varchar(120) COLLATE latin1_general_ci NOT NULL,
  `position` int(11) NOT NULL,
  `promotion` int(11) NOT NULL,
  `status` varchar(250) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `mydf_product`
--

INSERT INTO `mydf_product` (`id`, `pre_design_url`, `maincat_id`, `category_id`, `product_name`, `description`, `hyper_link`, `pdfcaption`, `attachment_file`, `position`, `promotion`, `status`) VALUES
(132, '', '|161|', '', 'Location Map & Address', '<p><img src=\"../../photo/5d98474449582.jpg\" alt=\"\" width=\"680\" height=\"337\" /></p>\r\n<p style=\"text-align: center;\"><span style=\"font-family: calibri,sans-serif;\"><span style=\"font-size: medium;\"><strong><span style=\"font-size: 18pt;\">Location Map</span></strong><br /></span></span></p>\r\n<p style=\"text-align: center;\">&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"font-family: calibri,sans-serif;\"><span style=\"font-size: medium;\"><strong><a href=\"feedback.php\"><img style=\"float: right; border: 0px none;\" src=\"../../photo/5d983f62db109.jpg\" alt=\"\" width=\"244\" height=\"236\" /></a><span style=\"font-size: 18pt;\">Tentex (Malaysia) Sdn. Bhd.</span></strong><br /><span style=\"font-size: 12pt;\">No. 23, Jalan Batu Kawa,</span></span></span></p>\r\n<p><span style=\"font-family: calibri,sans-serif;\"><span style=\"font-size: medium;\"><span style=\"font-size: 12pt;\">93250 Kuching, </span></span></span></p>\r\n<p><span style=\"font-family: calibri,sans-serif;\"><span style=\"font-size: medium;\"><span style=\"font-size: 12pt;\">Sarawak,</span><span style=\"font-size: 12pt;\"> Malaysia.</span><br /><br /><strong>Phone</strong><br /><span style=\"font-size: 12pt;\">6082 682 333 &nbsp;</span> <br /><br /><strong>Fax</strong><br /><span style=\"font-size: 12pt;\">6082 682 211</span><br /><br /><strong>Email</strong><br /><span style=\"font-size: 12pt;\"><a href=\"mailto:tentexmsia@gmail.com\">tentexmsia@gmail.com</a></span></span></span></p>\r\n<p>&nbsp;</p>\r\n<div id=\"mcePasteBin\" style=\"background: red; left: 0px; top: 0px; width: 1px; height: 1px; overflow: hidden; position: absolute;\">\r\n<div>X</div>\r\n</div>', '', '', '', 0, 0, '1'),
(171, '', '', '', 'Company Profile', '<p style=\"text-align: justify;\"><span style=\"font-size: 18pt;\"><strong><span style=\"font-family: trebuchet ms,geneva;\">Company Profile</span></strong></span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-family: calibri,sans-serif;\"><span style=\"font-size: small;\"><span style=\"font-size: 12pt;\">With almost a decade of expertise in the decorative concrete industry Tentex (Malaysia) Sdn Bhd has the capability and expertise to step up to the next level, seize new business opportunities and capture the international market.</span><br /><br /><span style=\"font-size: 12pt;\">Focusing on our niche products, we have much to offer to our customers. As major changes continue over the next decade, we believe that the challenging environment will create a new era of demand in the decorative concrete industry.</span><br /><br /><span style=\"font-size: 12pt;\">As today&rsquo;s customers become more and more aesthetically conscious, we endeavour to ensure a wide array of project solutions and applications as our top priority in order to be an industry leader in this niche segment.</span><br /><br /><span style=\"font-size: 12pt;\">Being as main distributor and also applicator, Tentex houses the latest &lsquo;state-of-the-art&rsquo; technology which will be able to cater for both local and international demand, highlighting the importance of quality and innovation.</span><br /><br /><span style=\"font-size: 12pt;\">Having said that, we are pleased to announce that Tentex has been able to capitalise on the opportunity and deliver consecutive years of positive growth alongside our current clients.</span><br /><br /><span style=\"font-size: 12pt;\">The sustained annual growth and very respectable improvements to our performance is a testimony to the actions introduced to counter the challenges posed by market conditions and spillover effects of the global economy.</span><br /><br /><span style=\"font-size: 12pt;\">Currently Tentex has carved a strong niche with a long list of local and international customers. We are committed to giving the best in terms of product integrity and world class service standards.</span><br /></span></span></p>', '', '', '', 10, 0, '1'),
(173, '', '', '', 'Corporate Strategy ', '<p style=\"text-align: justify;\"><strong><span style=\"font-family: trebuchet ms,geneva; font-size: 18pt;\">Corporate Strategy<br /></span></strong><span style=\"font-family: calibri,sans-serif; font-size: 10pt;\"><br /></span><span style=\"font-size: 12pt;\"><span style=\"font-family: calibri,sans-serif;\">Tentex hunger bound to become a world-class supplier in the respected industry.</span><span style=\"font-family: calibri,sans-serif;\"><br /><br />As we journey to become an &lsquo;Icon in Business&rsquo;, our world-renowned portfolio of products continues to set us apart from the competition and drive our market growth.<br /><br />Perfectly designed to accompany different setup for different customers, our brands champion the tradition of quality, excellent and consistency that Tentex is respected for.<br /><br />While profit and product quality are our priorities, we have been careful to ensure that we achieve them in a balanced, holistic and sustainable manner.<br /><br />We will make sure this diverse portfolio of global icons promises to continue to captivate and satisfy our customers.</span></span></p>', '', '', '', 20, 0, '1'),
(202, '', '', '', 'Vision & Mission', '<p id=\"__mce\" style=\"text-align: justify;\"><span style=\"font-family: trebuchet ms,geneva; font-size: 18pt;\"><strong>Vision &amp; Mission<br /></strong></span><span style=\"font-family: calibri,sans-serif; font-size: 12pt;\"><strong><br /><em>Vision</em></strong><br />&ldquo;Our vision is to not only be a player but also an innovator in the international decorative concrete industry through the use of advanced technology and aim to etch our name in the decorative cement market niche.&rdquo;<br /><br /><em><strong>Mission</strong></em><br />Tentex is committed to promote and continuously develop a market niche for our line of products both regionally and internationally. Our goals include:</span></p>\r\n<ul style=\"text-align: justify;\">\r\n<li style=\"text-align: justify;\"><span style=\"font-family: calibri,sans-serif; font-size: 12pt;\">To provide top of the line decorative cement to suit both domestic and commercial use for internal or external usage.</span></li>\r\n<li style=\"text-align: justify;\"><span style=\"font-family: calibri,sans-serif; font-size: 12pt;\">To maintain international standards for all our products and provide service with a smile meeting every requirement of our clients.</span></li>\r\n<li style=\"text-align: justify;\"><span style=\"font-family: calibri,sans-serif; font-size: 12pt;\">To continuously innovate and provide newer and more advanced implementation systems for our products.</span></li>\r\n<li style=\"text-align: justify;\"><span style=\"font-family: calibri,sans-serif; font-size: 12pt;\">To be the client\'s preferred choice in the decorative concrete industry by maintaining the integrity of our services and products.</span></li>\r\n</ul>', 'http://www.', '', '', 30, 0, '1'),
(195, '', '|245|', '', 'Concrete Resurfacing System', '<p><strong><span style=\"font-size: 12pt;\">Tentex&trade; Concrete Resurfacing System</span> </strong></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-size: 12pt;\">Tentex&trade; Spray On Paving</span><br /><span style=\"font-size: 12pt;\">Tentex&trade; Spray On Color Thru</span><br /><span style=\"font-size: 12pt;\">Tentex&trade; Spray On Graphic Design</span></p>\r\n<p><span style=\"text-decoration: underline;\"><span style=\"font-size: 12pt;\"><strong>FAQs</strong></span></span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-size: 12pt;\"><strong>What is </strong></span><strong><span style=\"font-size: 12pt;\">Tentex&trade; </span></strong><span style=\"font-size: 12pt;\"><strong><sup></sup> Concrete Resurfacing System?</strong></span><br /><span style=\"font-size: 12pt;\">It is a cement based coating that transforms existing or plain concrete into works of art. It creates and excellent durability slip resistance and long lasting surface.</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-size: 12pt;\"><strong>How many colors and pattern are available?<br /></strong>We have 20 colours and 20 patterns.</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-size: 12pt;\"><strong>How thick is the Concrete Resurfacing System?<br /></strong>If a single base coat and 2 coats of spray on applied the surface may build up to approximately 3-5mm over the existing concrete.</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-size: 12pt;\"><strong>Where can I use?<br /></strong>Recommend for use on the existing concrete surface with sound or solid condition. It suitable for driveways, terraces, carpoarch, pathways, entranceways, entertainment areas, pool surrounds, etc. Custom designed logos and motifs can also be created.</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-size: 12pt;\"><strong>How long can it last?<br /></strong>A service life in excess of 15 years may be expected if applied in accordance with the manufacturers&rsquo; specifications.</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-size: 12pt;\"><strong>Why do I need a basecoat?<br /></strong>A basecoat is always recommended in the Spray On process. This is to add uniformity and to improve the overall look of the final job.</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-size: 12pt;\"><strong>Can I have a different basecoat colour?<br /></strong>Yes, you can choose a different basecoat for your job.</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-size: 12pt;\"><strong>How often do I need to reseal?<br /></strong>You can resealed every 18 months to two years with an approved Tentex<sup>TM</sup> Decorative Concrete Sealer.</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-size: 12pt;\"><strong>Can I do Spray On myself?<br /></strong>Tentex&trade; Concrete Resurfacing System is not recommended as a do-it-yourself project. We recommend you use an experienced applicator to undertake the job.</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-size: 12pt;\">&nbsp;</span></p>', 'http://www.', '', '', 0, 0, '1'),
(197, '', '|249|', '', ' ', '<p>&nbsp;</p>\r\n<p><a href=\"attachment/5d96f22ec3e58.pdf\"><img style=\"float: right;\" src=\"../../photo/5d96f2d511906.jpg\" alt=\"\" width=\"167\" height=\"241\" /></a></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p><strong><span style=\"font-size: large;\">Concrete Resurfacing System</span></strong><span style=\"font-size: small;\"> (On Existing Concrete) <br /></span></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p><a href=\"attachment/5d2d852f40c5f.pdf\"><img style=\"float: right;\" src=\"../../photo/5d2d89620a95b.jpg\" alt=\"\" width=\"167\" height=\"241\" /></a></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p><strong><span style=\"font-size: large;\">New Concrete Solutions </span></strong><span style=\"font-size: small;\">(On Wet Concrete)</span></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p><a href=\"attachment/5d9705a81aafa.pdf\"><img style=\"float: right;\" src=\"../../photo/5a1662651e27f.jpg\" alt=\"\" width=\"167\" height=\"241\" /></a></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p><strong><span style=\"font-size: large;\">Sporting a Touch of Class </span></strong><span style=\"font-size: small;\">(On Concrete or Bitumen Surface)</span></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p><img src=\"../../photo/5d96b9a741f84.jpg\" alt=\"\" /></p>\r\n<p><a href=\"attachment/5d96fd1d12bcd.pdf\"><img style=\"float: right;\" src=\"../../photo/5d96fb9cbc468.jpg\" alt=\"\" width=\"167\" height=\"241\" /></a></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p><strong><span style=\"font-size: large;\">Adding Shine to Your Floor </span></strong><span style=\"font-size: small;\">(On Plain Concrete)</span></p>\r\n<p>&nbsp;</p>', 'http://www.', '     ', '', 0, 0, '1'),
(194, '', '|42|', '', 'Term of Use', '<p style=\"text-align: center;\"><span style=\"font-size: medium;\"><img src=\"../../photo/50e63f6544aa2.jpeg\" alt=\"\" width=\"650\" height=\"220\" /></span></p>\r\n<p><span style=\"font-size: medium;\"> </span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-size: medium;\">The information contained in this website is for general information purposes only. The information is provided by <strong>Tentex (Malaysia) Sdn. Bhd.</strong> and while we endeavour to keep the information up to date and correct, we make no representations or warranties of any kind, express or implied, about the completeness, accuracy, reliability, suitability or availability with respect to the website or the information, products, services, or related graphics contained on the website for any purpose. Any reliance you place on such information is therefore strictly at your own risk.<br /><br />In no event will we be liable for any loss or damage including without limitation, indirect or consequential loss or damage, or any loss or damage whatsoever arising from loss of data or profits arising out of, or in connection with, the use of this website.<br /><br />Through this website you are able to link to other websites which are not under the control of <strong>Tentex (Malaysia) Sdn. Bhd.</strong> We have no control over the nature, content and availability of those sites. The inclusion of any links does not necessarily imply a recommendation or endorse the views expressed within them.<br /><br />Every effort is made to keep the website up and running smoothly. <strong>Tentex (Malaysia) Sdn. Bhd.</strong> takes no responsibility for, and will not be liable for, the website being temporarily unavailable due to technical issues beyond our control.</span></p>', 'http://www.', '', '', 0, 0, '1'),
(198, '', '|', '', 'Paving the Right Surface', '<p style=\"text-align: justify;\">Be it interior or exterior, Tentex Spray on Paving is a timeless decorative coating that will be able to provide you a brand new look at a fraction of the cost of removing and replacing the concrete with new concrete or another flooring system.<br /><br />With a wide selection of colours, designs and patterns, this resurfacing method will help you to create a truly original surface that will invigorate your existing concrete and breathe new life to the place.<br /><br />Whether you are renovating or building your dream home, our range of Tentex Spray on Paving will complement any style or custom graphics, allowing you to design the exact look you desire and bring your imagination to life.<br /><br />By combining the most advances textured concrete coatings with the latest sealing technologies, our final results will definitely create a lasting impression that will keep us on top of your list.</p>', 'http://www.', '', '', 0, 0, '1'),
(199, '', '|', '', 'Concrete Resurfacing System', '<p style=\"text-align: justify;\"><strong>Paving the Right Surface</strong><br />Be it interior or exterior, Tentex Spray on Paving is a timeless decorative coating that will be able to provide you a brand new look at a fraction of the cost of removing and replacing the concrete with new concrete or another flooring system.<br /><br />With a wide selection of colours, designs and patterns, this resurfacing method will help you to create a truly original surface that will invigorate your existing concrete and breathe new life to the place.<br /><br />Whether you are renovating or building your dream home, our range of Tentex Spray on Paving will complement any style or custom graphics, allowing you to design the exact look you desire and bring your imagination to life.<br /><br />By combining the most advances textured concrete coatings with the latest sealing technologies, our final results will definitely create a lasting impression that will keep us on top of your list.<br /><strong><br />Adding the Flair in Concrete</strong><br />Like an artist working on a blank canvas, coloured concrete teases the imagination and truly captures a designer&rsquo;s individuality and flair; and with that Tentex Spray on Colour Thru does the magic.<br /><br />Despite being able to assume nearly any shape, design, pattern or texture but the one characteristic that truly distinguishes decorative concrete is color.<br /><br />Whether used subtly to blend with nature or boldly to make a dramatic design statement, this line of concrete would enable to draw out the picture that was in your imagination and apply it to your home or office.<br /><br />Who would have thought that your driveway could become as rich and red as your glass of aged \'Shiraz\' or the warm brown tones of a mushroom could inspire your outdoor entertaining area...We did!<br /><br /><strong>Like a Stroke of an Artist&rsquo;s Brush</strong><br />First impressions are everything and by being able to create visually dramatic graphics on concrete floors will take people&rsquo;s breath away.<br /><br />When graphics are executed property, with a dynamic design and the appropriate blend of colours, it makes for a rather difficult situation to forget and that is what we do with Tentex Spray On Graphic Design, we\'ll make sure that impression stays.<br /><br />The unique characteristic of Spray On Graphic Design allows it to form to the grooves and crevasses of the applied surface, giving the appearance of a painted image.<br /><br />Be it on public places, residential or industrial, this technology is a proven concept within the precast concrete industry and is implemented an extensive number of projects globally, demonstrating the versatility of this artist&rsquo;s tool.</p>', 'http://www.', '', '', 10, 0, '1'),
(200, '', '|', '', 'New Concrete Solutions', '<p style=\"text-align: justify;\"><strong>Implementing your imagination</strong><br />Ever wanted the feel of hard wood floors on the driveway or the look of a brick laid walk path to the house? The limitless array of possibilities combined with great durability and lower cost than natural products makes Tentex New Stamped Concrete technology the right choice for patios, sidewalks, driveways as well as interior flooring.<br /><br />The method lies in the process of adding texture and colour which gives it the ability to resemble other building materials or other authentic materials such as stone, slate or brick.<br /><br />The addition of a base colour, the addition of an accent colour and stamping a pattern into the concrete are the three procedures used in Stamped Concrete which separate it from other concrete procedures.<br /><br />Whether it be flagstone, brick, natural stone or any other common exterior looks, there are many ways to personalize your own kind of stamp. No matter your preference be it modern or retro, we can help you get that look.<br /><strong><br />Stylized Stencil for Added Class</strong><br />Ever wanted a &lsquo;Fleur de lis&rsquo; design or perhaps a cobblestone walkway? With a huge range of colour and pattern combinations available, Tentex Stencil Pattern Concrete is a unique method that gives you the appearance of a paved surface with the functionality and durability of concrete.<br /><br />We offer a wide range of stenciling techniques to guarantee many years of maintenance free performance and you can select from an extensive range of stencil designs and concrete patterns to match any style of house or landscaping.<br /><br />With our large selection of pattern designs and colours, Tentex&rsquo;s stenciled concrete will add charm, appeal and value to any home or property.</p>', 'http://www.', '', '', 20, 0, '1'),
(201, '', '|', '', 'Sports & Industrial Flooring', '<p style=\"text-align: justify;\"><strong>Sporting a Touch of Class</strong><br />Ideal for tennis courts, athletic tracks, netball courts and other multipurpose sports surface, Tentex Acrylic Sports Court Coating is 100% premium acrylic all-weather surfaces be it for indoor or outdoor application.<br /><br />These technologically advanced, acrylic, water-based products are widely appreciated as the benchmark for high quality sports floor coatings, which the surface texture can also be controlled by using various amounts of fine graded sand.<br /><br />A coating system is only as good as its preparation and in the Tentex system there is a full series of preparation compounds to ensure that the surface is correctly prepared.<br /><br />Whether rejuvenating an existing court or creating a new one from the ground up, at Tentex, we will always provide you with the best products at the best value.<br /><br /><strong>In Safe Hands</strong><br />When safety needs to come first, choose Tentex Non-Slip Epoxy &ndash; a premier floor coating technology which is specially designed to prevent slip hazards from ever becoming a reality.<br /><br />Tentex Non-Slip Epoxy is a reliable technology due to its excellent qualities in order to meet today&rsquo;s floor stringent demand and which it is also formulated to provide a tough protective coating against chemical penetration, making it ideal for floor areas with abrasive traffic.<br /><br />Having wide varieties of colour to choose from, Tentex Non-Slip Epoxy high-tech formula produces a nontoxic finish without polluting the environment or endangering your health while enabling the creative side of you to add your own personal touches.<br /><br />It also features the state-of-the-art technology which allows the coating to breath, eliminating blisters which lead to cracking or peeling.<br /><br />Developed as an industrial and commercial epoxy floor coating, Tentex Non-Slip Epoxy floor coating system is highly regarded by consumers for its unusual combination of ease of application and high level of durability.<br /><strong><br />Herculean Durability That Holds Tons</strong><br />Imagine the ability to hold up Titan without scuffing the floor, Tentex Self-Leveling Epoxy consists of 100% epoxy and selectively graded aggregates to produce a seamless flooring solution ideally suited for heavy-duty industrial flooring applications.<br /><br />Its extreme durability and hard wearing flooring offers a number of benefits which include:-</p>\r\n<ul style=\"text-align: justify;\">\r\n<li>High scratch and impact resistance</li>\r\n<li>Chemical and heat resistance</li>\r\n<li>Slip resistant</li>\r\n<li>High gloss with appealing finish</li>\r\n<li>Attractive bright colour options</li>\r\n<li>Variable thickness for versatile application</li>\r\n</ul>\r\n<p style=\"text-align: justify;\">As such, this range is highly used in numerous pharmaceutical units, operation theatres and food factories. Our premium quality, easy to clean self-leveling epoxy flooring is also extensively used in heavy manufacturing units and many more.</p>', 'http://www.', '', '', 30, 0, '1'),
(203, '', '|', '', 'Concrete Resurfacing Colour Range.pdf', '<p>Concrete Resurfacing Colour Range.pdf</p>', 'http://www.', 'Concrete Resurfacing Colour Range', 'attachment/516d049dbebc6.pdf', 0, 0, '1'),
(204, '', '|178|', '', 'Concrete Resurfacing Pattern Range', '<p>Concrete Resurfacing Pattern Range</p>', 'http://www.', 'Concrete Resurfacing Pattern Range.pdf', 'attachment/516d0eccaf7a2.pdf', 0, 0, '1'),
(205, '', '|', '', 'New Concrete Colour Range.pdf', '<p>New Concrete Colour Range.pdf</p>', 'http://www.', 'New Concrete Colour Range.pdf', 'attachment/516d116c487af.pdf', 0, 0, '1'),
(206, '', '|', '', 'New Concrete Stamp Mat Range.pdf', '<p>New Concrete Stamp Mat Range.pdf</p>', 'http://www.', 'New Concrete Stamp Mat Range.pdf', 'attachment/516d11830f42a.pdf', 0, 0, '1'),
(207, '', '|', '', 'New Concrete Stencil Pattern Range.pdf', '<p>New Concrete Stencil Pattern Range.pdf</p>', 'http://www.', 'New Concrete Stencil Pattern Range.pdf', 'attachment/516d12e3bebc6.pdf', 0, 0, '1'),
(208, '', '|', '', 'Sports & Industrial Flooring Colours Range.pdf', '<p>Sports &amp; Industrial Flooring Colours Range.pdf</p>', 'http://www.', 'Sports & Industrial Flooring Colours Range.pdf', 'attachment/516d13f9dd40f.pdf', 0, 0, '1'),
(210, '', '|', '', 'New Concrete System', '<p><span style=\"font-size: 12pt;\"><strong>&nbsp;</strong></span><strong><span style=\"font-size: 12pt;\">Tentex&trade; New Concrete System</span> </strong></p>\r\n<p>Tentex&trade; Stencil Pattern Concrete</p>\r\n<p>Tentex&trade; Stamped Concrete</p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"text-decoration: underline;\"><span style=\"font-size: 12pt;\"><strong>FAQ</strong></span></span></p>\r\n<p><strong>What is Tentex<sup>TM</sup> New Concrete System?</strong></p>\r\n<p>It is a system of adding colour, pattern and texture to the new pouring concrete slab. It created a natural, elegant and stylish look further enhancing the appeal of your living environment.</p>\r\n<p><strong>How many colours and patterns are available?</strong></p>\r\n<p>For Tentex<sup>TM</sup> Stamped Concrete, there are 20 colours and 12 patterns including borders available.</p>\r\n<p>For Tentex<sup>TM</sup> Stencil Pattern Concrete, there are 20 colours and 20 patterns including logos and borders available.</p>\r\n<p><strong>How thick is the product applied?</strong></p>\r\n<p>The products are applied approximately 2-3mm thick on to the wet concrete surface and a minimum of 2 coats should be applied to ensure that maximum colour and hardener strength is achieved.</p>\r\n<p><strong>Is Tentex<sup>TM</sup> New Concrete System suitable for all areas?</strong></p>\r\n<p>Due to the surface finish of Stamped Concrete, it is not recommended for steep sloping pavements or anywhere that may be subject to potential slip hazards. If a higher slip resistant surface is required, Stencil Pattern Concrete should be considered.</p>\r\n<p><strong>Does it crack or wear off?</strong></p>\r\n<p>When applied correctly, both of Tentex<sup>TM</sup> Stamped Concrete and Tentex<sup>TM</sup> Stencil Pattern Concrete are stronger and more durable than concrete.</p>\r\n<p><strong>Will the colour fade?</strong></p>\r\n<p>The pigments used are inorganic metal oxides, which are extremely UV and chemical resistant. A maximum of 5% shading variation may occur over a period of 5 years, but this is barely detectable to the human eye.</p>\r\n<p><strong>Can Tentex<sup>TM</sup> New Concrete System go over existing concrete?</strong></p>\r\n<p>No, it is designed to be used with wet concrete only. Tentex<sup>TM</sup> Concrete Resurfacing System is the product best suited to go over existing concrete.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>What is the maintenance required for both products?</strong></p>\r\n<p>Apart from the usual cleaning requirements of a decorative surface, it is recommended the surface is resealed every 18 months to two years (depending on in-service conditions).</p>\r\n<p><strong>What are the advantages of sealing?</strong></p>\r\n<p>It will reduce the level of dirt ingress into the concrete.</p>\r\n<p><strong>Is Tentex<sup>TM</sup> New Concrete System for the DIY installer?</strong></p>\r\n<p>As each site is unique, it is not recommended for the DIY market. Specific preparation must be undertaken so that the concrete is placed in a manner, which will ensure durability. It is therefore recommended that a licensed concrete contractor be employed.</p>', 'http://www.', '', '', 0, 0, '1'),
(211, '', '|', '', 'New Concrete System', '', 'http://www.', '', '', 0, 0, '1'),
(212, '', '|245|', '', 'New Concrete Solutions', '<p><span style=\"font-size: 12pt;\"><strong>Tentex&trade; New Concrete Solutions </strong></span></p>\r\n<p><span style=\"font-size: 12pt;\">Tentex&trade; Stencil Pattern Concrete</span><br /><span style=\"font-size: 12pt;\">Tentex&trade; Stamped Concrete</span></p>\r\n<p><span style=\"text-decoration: underline; font-size: 12pt;\"><strong>FAQs</strong></span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-size: 12pt;\"><strong>What is Tentex<sup>TM</sup> New Concrete Solutions?<br /></strong>It is a system of adding colour, pattern and texture to the new pouring concrete slab. It created a natural, elegant and stylish look further enhancing the appeal of your living environment.<strong> <br /></strong></span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-size: 12pt;\"><strong>How many colours and patterns are available?<br /></strong>For Tentex<sup>TM</sup> Stamped Concrete, there are 20 colours and 12 patterns including borders available.</span><br /><span style=\"font-size: 12pt;\">For Tentex<sup>TM</sup> Stencil Pattern Concrete, there are 20 colours and 20 patterns including logos and borders available.</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-size: 12pt;\"><strong>How thick is the product applied?<br /></strong>The products are applied approximately 2-3mm thick on to the wet concrete surface and a minimum of 2 coats should be applied to ensure that maximum colour and hardener strength is achieved.</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-size: 12pt;\"><strong>Is Tentex<sup>TM</sup> New Concrete Solutions suitable for all areas?<br /></strong>Due to the surface finish of Stamped Concrete, it is not recommended for steep sloping pavements or anywhere that may be subject to potential slip hazards. If a higher slip resistant surface is required, Stencil Pattern Concrete should be considered.</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-size: 12pt;\"><strong>Does it crack or wear off?<br /></strong>When applied correctly, both of Tentex<sup>TM</sup> Stamped Concrete and Tentex<sup>TM</sup> Stencil Pattern Concrete are stronger and more durable than concrete.</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-size: 12pt;\"><strong>Will the colour fade?<br /></strong>The pigments used are inorganic metal oxides, which are extremely UV and chemical resistant. A maximum of 5% shading variation may occur over a period of 5 years, but this is barely detectable to the human eye.</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-size: 12pt;\"><strong>Can Tentex<sup>TM</sup> New Concrete Solutions go over existing concrete?<br /></strong>No, it is designed to be used with wet concrete only. Tentex<sup>TM</sup> Concrete Resurfacing System is the product best suited to go over existing concrete.</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-size: 12pt;\"><strong>What is the maintenance required for both products?<br /></strong>Apart from the usual cleaning requirements of a decorative surface, it is recommended the surface is resealed every 18 months to two years (depending on in-service conditions).</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-size: 12pt;\"><strong>What are the advantages of sealing?<br /></strong>It will reduce the level of dirt ingress into the concrete.</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-size: 12pt;\"><strong>Is Tentex<sup>TM</sup> New Concrete Solutions for the DIY installer?<br /></strong>As each site is unique, it is not recommended for the DIY market. Specific preparation must be undertaken so that the concrete is placed in a manner, which will ensure durability. It is therefore recommended that a licensed concrete contractor be employed.</span></p>\r\n<p style=\"text-align: justify;\"><strong>&nbsp;</strong></p>', 'http://www.', '', '', 10, 0, '1'),
(214, '', '|245|', '', 'Advantages', '<p><span style=\"font-size: 14pt;\"><strong><span style=\"font-size: 12pt;\">Advantage of TENTEX&trade; Decorative Concrete System</span><span style=\"font-size: 12pt;\"><br /><br /></span></strong></span><span style=\"font-size: 12pt;\">Our products are regarded as some of the best in the industry due to:</span></p>\r\n<p><span style=\"font-size: 12pt;\">&nbsp;&radic; Strength and durability</span></p>\r\n<p><span style=\"font-size: 12pt;\">&nbsp;&radic; Enhanced aesthetic value</span></p>\r\n<p><span style=\"font-size: 12pt;\">&nbsp;&radic; Ease of application</span></p>\r\n<p><span style=\"font-size: 12pt;\">&nbsp;&radic; Lower maintenance compared to other similar products</span></p>\r\n<p><span style=\"font-size: 12pt;\">&nbsp;&radic; Consistent high quality</span></p>\r\n<p><span style=\"font-size: 12pt;\">&nbsp;&radic; Cost effective</span></p>\r\n<p><span style=\"font-size: 12pt;\">&nbsp;&radic; Extensive colour and pattern ranges</span></p>\r\n<p><span style=\"font-size: 12pt;\">&nbsp;</span></p>\r\n<p><span style=\"font-size: 14pt;\"><strong><span style=\"font-size: 12pt;\">Points of Difference:</span><br /></strong></span></p>\r\n<p><span style=\"font-size: 12pt;\">&nbsp; &radic; Decorative Concrete Specialists</span></p>\r\n<p><span style=\"font-size: 12pt;\">&nbsp; &radic; Quality control</span></p>\r\n<p><span style=\"font-size: 12pt;\">&nbsp; &radic; Committed to providing innovative products and services to our customers</span></p>\r\n<p><span style=\"font-size: 12pt;\">&nbsp; &radic; Highest quality products</span></p>\r\n<p><span style=\"font-size: 12pt;\">&nbsp; &radic; Excellence in customer service</span></p>\r\n<p><span style=\"font-size: 12pt;\">&nbsp; &radic; Technical support and back up</span></p>\r\n<p><span style=\"font-size: 12pt;\">&nbsp; &radic; Constantly looking at ways to improve ease of application</span></p>\r\n<p>&nbsp;</p>', 'http://www.', '', '', 20, 0, '1'),
(217, '', '|', '', '112', '<p>adsadsad 2</p>', 'http://www.asdsad2', '22b', '', 0, 0, '1');

-- --------------------------------------------------------

--
-- Table structure for table `news_feedback`
--

CREATE TABLE `news_feedback` (
  `id` int(11) NOT NULL,
  `news_id` int(11) NOT NULL,
  `contributer_name` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `contributer_email` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `comment` varchar(500) COLLATE latin1_general_ci NOT NULL,
  `status` int(2) NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news_index`
--

CREATE TABLE `news_index` (
  `news_id` int(4) NOT NULL,
  `news_title` varchar(200) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `pdf_file` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `status` int(11) NOT NULL DEFAULT 1,
  `weblink` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news_maincat`
--

CREATE TABLE `news_maincat` (
  `maincat_id` int(11) NOT NULL,
  `maincat_name` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `photo1` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `position` int(11) NOT NULL DEFAULT 0,
  `date_posted` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_cart_confirm`
--

CREATE TABLE `product_cart_confirm` (
  `id` int(11) NOT NULL,
  `readunread` varchar(50) NOT NULL,
  `reply_status` varchar(2) NOT NULL,
  `date_posted_reply` date NOT NULL,
  `time_reply` varchar(20) NOT NULL,
  `session_id` varchar(200) NOT NULL DEFAULT '',
  `title` varchar(120) NOT NULL DEFAULT '0',
  `name` varchar(120) NOT NULL,
  `country` varchar(120) NOT NULL,
  `contact` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `date_posted` date NOT NULL,
  `time` varchar(10) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_section`
--

CREATE TABLE `product_section` (
  `id` int(11) NOT NULL,
  `category` longtext COLLATE latin1_general_ci NOT NULL,
  `image1` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `image2` varchar(111) COLLATE latin1_general_ci NOT NULL,
  `image3` varchar(111) COLLATE latin1_general_ci NOT NULL,
  `brand_logo` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `name` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `status` int(11) NOT NULL DEFAULT 1,
  `pdf_file` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `weblink` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `type` int(11) NOT NULL DEFAULT 2,
  `briefing` longtext COLLATE latin1_general_ci NOT NULL,
  `description` longtext COLLATE latin1_general_ci NOT NULL,
  `comment_featured` int(2) NOT NULL,
  `position` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT '0000-00-00',
  `happening` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `product_section`
--

INSERT INTO `product_section` (`id`, `category`, `image1`, `image2`, `image3`, `brand_logo`, `name`, `status`, `pdf_file`, `weblink`, `type`, `briefing`, `description`, `comment_featured`, `position`, `date`, `happening`) VALUES
(525, '|176|204|', 'photo/51becbd081959.jpg', '', '', '', '', 1, '', 'http://www.', 0, '<p><span style=\"font-size: large;\"> <span style=\"font-size: medium;\"> <strong> <span style=\"font-size: large;\"> Tentex  <span style=\"font-size: medium;\"> <sup>TM</sup> </span> Spray On Paving </span> <br /><br /> <span style=\"color: gray;\"><em>Paving the Right Surface</em></span> </strong><br /></span></span></p>', '<table style=\"width: 100%; background-color: maroon;\" border=\"0\" cellspacing=\"1\" cellpadding=\"10\">\r\n<tbody>\r\n<tr>\r\n<td style=\"text-align: right;\"><span style=\"font-family: calibri,sans-serif;\"><span style=\"font-size: medium;\"><span style=\"color: #ffffff;\"><strong><span style=\"font-size: xx-large;\">Concrete Resurfacing System</span><br /><span style=\"font-size: x-large;\">Tentex <sup>TM</sup> Spray On Paving</span></strong></span></span></span></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p style=\"text-align: center;\"><em>&nbsp;<span style=\"font-family: calibri,sans-serif;\"><span style=\"font-size: medium;\"><strong><span style=\"font-size: 18pt;\">Paving the Right Surface</span></strong></span></span></em></p>\r\n<p><span style=\"font-family: calibri,sans-serif;\"><span style=\"font-size: medium;\"><strong><span style=\"font-size: 18pt;\"><img src=\"../../photo/51becd1f24ca5.jpg\" alt=\"\" width=\"700\" height=\"350\" /></span></strong></span></span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-family: calibri,sans-serif; font-size: 12pt;\">Tentex&trade; Spray On Paving is the Decorative Concrete Resurfacing System that transform exisiting or plain concrete into works of art.&nbsp; It creates an excellent durability slip resistance and long lasting surface.&nbsp; You can easily incoporate custom graphics, logos and effects to create your very own appeal.</span><span style=\"font-family: calibri,sans-serif;\"><span style=\"font-size: medium;\"><span style=\"font-size: 12pt;\"><strong><br /><br />More Details:</strong></span><br /></span></span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-family: calibri,sans-serif;\"><span style=\"font-size: medium;\"><a href=\"attachment/5d96f22ec3e58.pdf\"><img src=\"../../photo/5d96f2d511906.jpg\" alt=\"\" width=\"167\" height=\"241\" /></a>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </span></span><span style=\"font-family: calibri,sans-serif;\"><span style=\"font-size: medium;\"><a href=\"../../photo/5d96f3b992fb3.jpg\"><img src=\"../../photo/5d96f3b992fb3.jpg\" alt=\"\" width=\"167\" height=\"241\" /></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span><a href=\"../../photo/5d96f3abc3c65.jpg\"><img src=\"../../photo/5d96f3abc3c65.jpg\" alt=\"\" width=\"167\" height=\"241\" /></a><span style=\"font-family: calibri,sans-serif;\"><span style=\"font-size: medium;\"><span style=\"font-size: 18pt;\">&nbsp;&nbsp;&nbsp;&nbsp; <span style=\"font-size: large;\"><span style=\"font-size: medium;\"><strong><span style=\"font-size: large;\"><a href=\"../../photo/51b69a80deff3.jpg\"><br /></a></span></strong></span></span><strong><span style=\"font-size: 12pt;\">Brochure&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style=\"font-size: 12pt;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Stylish Pattern&nbsp;</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; <span style=\"font-size: 12pt;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Contemporary Colors</span></strong></span><br /></span></span></p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', 0, 10, '2013-06-20', ''),
(526, '|176|204|', 'photo/51bece78d4d2a.jpg', '', '', '', '', 1, '', 'http://www.', 0, '<p><strong><span style=\"font-size: medium;\"><span style=\"font-size: large;\">Tentex <span style=\"font-size: medium;\"><sup>TM</sup></span> Spray On Color Thru<br /><br /></span></span></strong><span style=\"font-size: medium;\"><span style=\"font-size: large;\"><span style=\"font-size: medium;\"><em><span style=\"color: #888888;\"><strong>Adding the Flair in Concrete</strong></span></em><br /></span></span></span></p>', '<table style=\"width: 100%; background-color: #990033;\" border=\"0\" cellspacing=\"1\" cellpadding=\"10\">\r\n<tbody>\r\n<tr>\r\n<td style=\"text-align: right;\"><span style=\"font-family: calibri,sans-serif;\"><span style=\"font-size: medium;\"><span style=\"color: #ffffff;\"><strong><span style=\"font-size: xx-large;\">Concrete Resurfacing System</span><br /><span style=\"font-size: x-large;\">Tentex <sup>TM</sup> Spray On Color Thru</span></strong></span></span></span></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p style=\"text-align: center;\"><em><span style=\"font-size: 18pt;\">&nbsp;<span style=\"font-family: calibri,sans-serif;\"><strong>Adding the Flair in Concrete</strong></span></span></em></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-family: calibri,sans-serif;\"><span style=\"font-size: medium;\"><img src=\"../../photo/51becf7275dd3.jpg\" alt=\"\" width=\"700\" height=\"350\" /></span></span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-family: calibri,sans-serif;\"><span style=\"font-size: medium;\"><span style=\"font-size: 12pt;\">Like an artist working on a blank canvas, coloured concrete teases the imagination and truly captures a designer&rsquo;s individuality and flair; and with that Tentex Spray on Colour Thru does the magic.</span><br /></span><span style=\"font-size: medium;\"><strong><br />More Details:</strong><br /></span></span></p>\r\n<p><a href=\"attachment/5d96f22ec3e58.pdf\"><span style=\"font-family: calibri,sans-serif;\"><span style=\"font-size: medium;\"><img src=\"../../photo/5d96f2d511906.jpg\" alt=\"\" width=\"167\" height=\"241\" /></span></span></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style=\"font-family: calibri,sans-serif;\"><span style=\"font-size: medium;\"><a href=\"../../photo/5d96f3b992fb3.jpg\"><img src=\"../../photo/5d96f3b992fb3.jpg\" alt=\"\" width=\"167\" height=\"241\" /></a></span></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"../../photo/5d96f3abc3c65.jpg\"><img src=\"../../photo/5d96f3abc3c65.jpg\" alt=\"\" width=\"167\" height=\"241\" /></a><span style=\"font-family: calibri,sans-serif;\"><span style=\"font-size: medium;\"><span style=\"font-size: 18pt;\"><strong><span style=\"font-size: 12pt;\"><br />Brochure&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;</strong></span></span></span><span style=\"font-family: calibri,sans-serif;\"><span style=\"font-size: medium;\"><span style=\"font-size: 18pt;\"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style=\"font-size: 12pt;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; </span></strong></span></span></span><span style=\"font-family: calibri,sans-serif;\"><span style=\"font-size: medium;\"><span style=\"font-size: 18pt;\"><strong><span style=\"font-size: 12pt;\">Stylish Pattern&nbsp;</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; <span style=\"font-size: 12pt;\">&nbsp;</span></strong></span></span></span><span style=\"font-family: calibri,sans-serif;\"><span style=\"font-size: medium;\"><span style=\"font-size: 18pt;\"><strong><span style=\"font-size: 12pt;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Contemporary Colors</span></strong></span></span></span></p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"font-size: medium;\"><span style=\"font-size: 18pt;\"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; <span style=\"font-size: 12pt;\">&nbsp;</span></strong></span></span><span style=\"font-family: calibri,sans-serif;\"><span style=\"font-size: medium;\"><span style=\"font-size: 18pt;\"><strong><span style=\"font-size: 12pt;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br /></span></strong></span></span></span></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', 0, 20, '2013-06-20', ''),
(527, '|176|204|', 'photo/51bfb3a6bb242.jpg', '', '', '', '', 1, '', 'http://www.', 0, '<p><strong><span style=\"font-size: medium;\"><span style=\"font-size: large;\">Tentex <span style=\"font-size: medium;\"><sup>TM</sup></span> Spray On Graphic Design</span><br /><br /></span></strong><span style=\"font-size: medium;\"><span style=\"font-family: calibri,sans-serif;\"><span style=\"color: #888888;\"><em><strong>Like a Stroke of an Artist&rsquo;s Brush</strong></em></span><br /></span></span></p>', '<table style=\"width: 100%; background-color: #990033;\" border=\"0\" cellspacing=\"1\" cellpadding=\"10\">\r\n<tbody>\r\n<tr>\r\n<td style=\"text-align: right;\"><span style=\"font-family: calibri,sans-serif;\"><span style=\"font-size: medium;\"><span style=\"color: #ffffff;\"><strong><span style=\"font-size: xx-large;\">Concrete Resurfacing System</span><br /><span style=\"font-size: x-large;\">Tentex <sup>TM</sup> Spray On Graphic Design</span></strong></span></span></span></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p style=\"text-align: center;\">&nbsp;<span style=\"font-family: calibri,sans-serif;\"><span style=\"font-size: medium;\"><strong><span style=\"font-size: 18pt;\"><em>Like a Stroke of an Artist&rsquo;s Brush</em></span><br /><br /></strong><img src=\"../../photo/51bfb8761e6ec.jpg\" alt=\"\" width=\"700\" height=\"350\" /><br /></span></span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-family: calibri,sans-serif;\"><span style=\"font-size: medium;\">When graphics are executed property, with a dynamic design and the appropriate blend of colours, it makes for a rather difficult situation to forget and that is what we do with Tentex Spray On Graphic Design, we&#39;ll make sure that impression stays.<br /></span><span style=\"font-size: medium;\"><strong><br />More Details:</strong><br /></span></span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-family: calibri,sans-serif;\"><span style=\"font-size: medium;\"><a href=\"attachment/5d96f22ec3e58.pdf\"><img src=\"../../photo/5d96f2d511906.jpg\" alt=\"\" width=\"167\" height=\"241\" /></a>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </span></span><span style=\"font-family: calibri,sans-serif;\"><span style=\"font-size: medium;\"><a href=\"../../photo/5d96f3b992fb3.jpg\"><img src=\"../../photo/5d96f3b992fb3.jpg\" alt=\"\" width=\"167\" height=\"241\" /></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span><a href=\"../../photo/5d96f3abc3c65.jpg\"><img src=\"../../photo/5d96f3abc3c65.jpg\" alt=\"\" width=\"167\" height=\"241\" /></a><span style=\"font-family: calibri,sans-serif;\"><span style=\"font-size: medium;\"><span style=\"font-size: 18pt;\">&nbsp;&nbsp;&nbsp;&nbsp; <span style=\"font-size: large;\"><span style=\"font-size: medium;\"><strong><span style=\"font-size: large;\"><a href=\"../../photo/51b69a80deff3.jpg\"><br /></a></span></strong></span></span><strong><span style=\"font-size: 12pt;\">Brochure&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style=\"font-size: 12pt;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Stylish Pattern&nbsp;</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; <span style=\"font-size: 12pt;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Contemporary Colors</span></strong></span><br /></span></span></p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', 0, 30, '2013-06-20', ''),
(529, '|176|255|', 'photo/51bfbc7b9558e.jpg', '', '', '', '', 1, '', 'http://www.', 0, '<p><strong><span style=\"font-size: medium;\"><span style=\"font-size: large;\">Tentex <span style=\"font-size: medium;\"><sup>TM</sup></span> Stamped Concrete</span><br /><span style=\"color: #808080;\"><br /></span></span></strong><span style=\"font-size: medium;\"><span style=\"color: #808080;\"><em><strong>Implementing your imagination</strong></em></span><br /><br /></span></p>', '<table style=\"width: 100%; background-color: #147aa3;\" border=\"0\" cellspacing=\"1\" cellpadding=\"10\">\r\n<tbody>\r\n<tr>\r\n<td style=\"text-align: right;\"><span style=\"font-family: calibri,sans-serif;\"><span style=\"font-size: medium;\"><span style=\"color: #ffffff;\"><strong><span style=\"font-size: xx-large;\">New Concrete Solutions</span><br /><span style=\"font-size: x-large;\">Tentex <sup>TM</sup> Stamped Concrete</span></strong></span></span></span></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p style=\"text-align: center;\"><em><span style=\"font-size: 18pt;\">&nbsp;</span></em><span style=\"font-family: calibri,sans-serif;\"><span style=\"font-size: medium;\"><em><span style=\"font-size: 18pt;\"><strong>Implementing your imagination</strong></span></em><br /></span></span></p>\r\n<p><span style=\"font-family: calibri,sans-serif;\"><span style=\"font-size: medium;\"><strong><img style=\"float: right; margin-left: 10px; margin-right: 10px;\" src=\"../../photo/51bfd9123f25d.jpg\" alt=\"\" width=\"700\" height=\"350\" /></strong></span></span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-family: calibri,sans-serif;\"><span style=\"font-size: medium;\"><br /><span style=\"font-size: 12pt;\">Tentex</span></span><span style=\"font-size: medium;\"><span style=\"font-size: 12pt;\">&trade; Stamped Concrete is a system of adding colour, pattern and texture to the new pouring concrete slab.&nbsp; It created a natural, elegant and stylish loook further enhancing the appeal of your living environment.<strong><br /><br />More Details:</strong></span><br /></span></span></p>\r\n<p><a href=\"attachment/5d2d852f40c5f.pdf\"><img src=\"../../photo/5d2d89620a95b.jpg\" alt=\"\" width=\"165\" height=\"234\" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"../../photo/5d2d8d76064ed.jpg\"><img src=\"../../photo/5d2d8d76064ed.jpg\" alt=\"\" width=\"165\" height=\"234\" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"../../photo/5d2d8951a1c57.jpg\"><img src=\"../../photo/5d2d8951a1c57.jpg\" alt=\"\" width=\"165\" height=\"234\" /></a><br /><span style=\"font-family: calibri,sans-serif;\"><span style=\"font-size: medium;\"><span style=\"font-size: 18pt;\"><strong><span style=\"font-size: 12pt;\">Brochure&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style=\"font-size: 12pt;\">&nbsp;&nbsp; &nbsp;&nbsp; Stylish Pattern&nbsp;</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; <span style=\"font-size: 12pt;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; Contemporary Colors</span></strong></span></span></span></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', 0, 50, '2013-06-27', ''),
(536, '|176|255|', 'photo/51bfbb2aa25cc.jpg', '', '', '', '', 1, '', 'http://www.', 0, '<p><strong><span style=\"font-size: medium;\"><span style=\"font-size: large;\">Tentex <span style=\"font-size: medium;\"><sup>TM</sup></span> Stencil Concrete</span><br /><span style=\"color: #808080;\"><br /></span></span></strong><span style=\"font-size: medium;\"><span style=\"color: #808080;\"><em><strong>Stylized Stencil For Added Class</strong></em></span><br /></span></p>', '<table style=\"width: 100%; background-color: #dfaf27;\" border=\"0\" cellspacing=\"1\" cellpadding=\"10\">\r\n<tbody>\r\n<tr>\r\n<td style=\"text-align: right;\"><span style=\"font-family: calibri,sans-serif;\"><span style=\"font-size: medium;\"><span style=\"color: #ffffff;\"><strong><span style=\"font-size: xx-large;\">New Concrete Solutions</span><br /><span style=\"font-size: x-large;\">Tentex <sup>TM</sup> Stencil Pattern Concrete</span></strong></span></span></span></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p style=\"text-align: center;\">&nbsp;<em><span style=\"font-family: calibri,sans-serif; font-size: 18pt;\"><strong>Stylized Stencil for Added Class</strong></span></em></p>\r\n<p><span style=\"font-family: calibri,sans-serif;\"><span style=\"font-size: medium;\"><strong><img style=\"float: right; margin-left: 10px; margin-right: 10px;\" src=\"../../photo/51bff7544d107.jpg\" alt=\"\" width=\"700\" height=\"350\" /></strong></span></span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-family: calibri,sans-serif;\"><span style=\"font-size: medium;\"><br /><span style=\"font-size: 12pt;\">Tentex Stencil Pattern Concrete is a unique method that gives you the appearance of a paved surface with the functionality and durability of concrete.</span><br /></span><span style=\"font-size: medium;\"><strong><br />More Details:</strong><br /></span></span></p>\r\n<p><a href=\"attachment/5d2d852f40c5f.pdf\"><img src=\"../../photo/5d2d89620a95b.jpg\" alt=\" \" width=\"165\" height=\"234\" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"../../photo/5d2d8818279b9.jpg\"><img src=\"../../photo/5d2d8818279b9.jpg\" alt=\"\" width=\"165\" height=\"234\" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"../../photo/5d2d8951a1c57.jpg\"><img src=\"../../photo/5d2d8951a1c57.jpg\" alt=\"\" width=\"165\" height=\"234\" /></a><br /><strong><span style=\"font-size: 12pt;\"><span style=\"font-family: calibri,sans-serif;\"><span style=\"font-size: medium;\"><span style=\"font-size: 18pt;\"><strong><span style=\"font-size: 12pt;\">Brochure&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style=\"font-size: 12pt;\">&nbsp;&nbsp; &nbsp;&nbsp; Stylish Pattern&nbsp;</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; <span style=\"font-size: 12pt;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Contemporary Colors</span></strong></span></span></span></span></strong></p>\r\n<p>&nbsp;</p>', 0, 40, '2013-06-13', ''),
(531, '|176|256|', 'photo/51bff978146bb.jpg', '', '', '', '', 1, '', 'http://www.', 0, '<p><span style=\"font-size: medium;\"><strong><span style=\"font-size: large;\">Tentex <span style=\"font-size: medium;\"><sup>TM</sup> </span>Acrylic Sports Court Coating</span><br /></strong></span><span style=\"font-family: calibri,sans-serif;\"><span style=\"font-size: medium;\"><strong><br /><span style=\"color: #888888;\"><em>Sporting a Touch of Class </em></span></strong><br /><br /></span></span></p>', '<table style=\"width: 100%; background-color: #65a745;\" border=\"0\" cellspacing=\"1\" cellpadding=\"10\">\r\n<tbody>\r\n<tr>\r\n<td style=\"text-align: right;\"><span style=\"font-family: calibri,sans-serif;\"><span style=\"font-size: medium;\"><span style=\"color: #ffffff;\"><strong><span style=\"font-size: xx-large;\">Sports Flooring</span><br /><span style=\"font-size: x-large;\">Tentex <sup>TM</sup> Acrylic Sports Court Coating<br /></span></strong></span></span></span></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p style=\"text-align: center;\"><span style=\"font-family: calibri,sans-serif;\"><span style=\"font-size: medium;\"><strong><span style=\"font-family: calibri,sans-serif;\"><span style=\"font-size: medium;\"><span style=\"font-family: calibri,sans-serif;\"><span style=\"font-size: medium;\"><strong><span style=\"font-size: 18pt;\"><em>Sporting a Touch of Class<br /></em><br /></span></strong></span></span></span></span></strong><img src=\"../../photo/51bfffed23cdc.jpg\" alt=\"\" width=\"680\" height=\"340\" /></span></span></p>\r\n<p style=\"text-align: left;\"><span style=\"font-family: calibri,sans-serif;\"><span style=\"font-size: medium;\">An ideal for badminton courts, tennis courts, netball courts, futsal courts and other multipurpose sports surface.</span></span><span style=\"font-family: calibri,sans-serif;\"><span style=\"font-size: medium;\"><br /></span><span style=\"font-size: medium;\"><strong><br />More Details:</strong><br /></span></span></p>\r\n<p>&nbsp;<a href=\"attachment/5d9705a81aafa.pdf\"><img src=\"../../photo/5d9706662703f.jpg\" alt=\"\" width=\"167\" height=\"241\" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"../../photo/5d9706c1a649b.jpg\"><img src=\"../../photo/5d9706c1a649b.jpg\" alt=\"\" width=\"167\" height=\"241\" /></a><span style=\"font-family: calibri,sans-serif;\"><span style=\"font-size: medium;\"><span style=\"font-size: 18pt;\"><strong><span style=\"font-size: 12pt;\"><br />&nbsp;Brochure&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style=\"font-size: 12pt;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span><span style=\"font-size: 12pt;\">Contemporary Colors</span></strong></span></span></span></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', 0, 60, '2013-04-16', '');

-- --------------------------------------------------------

--
-- Table structure for table `profile_maincat`
--

CREATE TABLE `profile_maincat` (
  `maincat_id` int(11) NOT NULL,
  `maincat_name` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `profile_maincat`
--

INSERT INTO `profile_maincat` (`maincat_id`, `maincat_name`, `status`) VALUES
(1, 'Chairman', 1),
(2, 'Staff', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pro_useronline`
--

CREATE TABLE `pro_useronline` (
  `timestamp` int(11) NOT NULL DEFAULT 0,
  `ip` varchar(40) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `file` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `pro_useronline`
--

INSERT INTO `pro_useronline` (`timestamp`, `ip`, `file`) VALUES
(1286936349, '192.168.1.102', ''),
(1286936352, '192.168.1.102', '');

-- --------------------------------------------------------

--
-- Table structure for table `qt_brand`
--

CREATE TABLE `qt_brand` (
  `brand_id` int(11) NOT NULL,
  `brand` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `category` int(11) NOT NULL DEFAULT 0,
  `logo` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `description` longtext COLLATE latin1_general_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `qt_login`
--

CREATE TABLE `qt_login` (
  `id` int(11) NOT NULL,
  `username` varchar(150) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `password` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `qt_login`
--

INSERT INTO `qt_login` (`id`, `username`, `password`, `status`) VALUES
(2, 'admin', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `qt_product`
--

CREATE TABLE `qt_product` (
  `prod_id` int(11) NOT NULL,
  `name` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `photo` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `photo2` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `category` int(11) NOT NULL DEFAULT 0,
  `brand` int(11) NOT NULL DEFAULT 0,
  `brief` longtext COLLATE latin1_general_ci NOT NULL,
  `description` longtext COLLATE latin1_general_ci NOT NULL,
  `feature` longtext COLLATE latin1_general_ci NOT NULL,
  `type` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `attachment` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `weblink` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `qt_solution`
--

CREATE TABLE `qt_solution` (
  `id` int(11) NOT NULL,
  `title` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `photo` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `photo2` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `photo3` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `details` longtext COLLATE latin1_general_ci NOT NULL,
  `attachment` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `status` int(11) NOT NULL DEFAULT 1,
  `weblink` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `right_cat`
--

CREATE TABLE `right_cat` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `category` int(11) NOT NULL DEFAULT 0,
  `position` int(11) NOT NULL DEFAULT 0,
  `logo` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `description` longtext COLLATE latin1_general_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `right_panel_content`
--

CREATE TABLE `right_panel_content` (
  `id` int(11) NOT NULL,
  `section` int(11) NOT NULL DEFAULT 0,
  `photo` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `content` text COLLATE latin1_general_ci NOT NULL,
  `hyperlink` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `attachment` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `photo2` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `content2` text COLLATE latin1_general_ci NOT NULL,
  `attachment2` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `hyperlink2` text COLLATE latin1_general_ci NOT NULL,
  `photo3` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `content3` text COLLATE latin1_general_ci NOT NULL,
  `attachment3` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `hyperlink3` text COLLATE latin1_general_ci NOT NULL,
  `photo4` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `content4` text COLLATE latin1_general_ci NOT NULL,
  `attachment4` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `hyperlink4` text COLLATE latin1_general_ci NOT NULL,
  `photo5` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `content5` text COLLATE latin1_general_ci NOT NULL,
  `attachment5` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `hyperlink5` text COLLATE latin1_general_ci NOT NULL,
  `setdefault` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `right_sec`
--

CREATE TABLE `right_sec` (
  `maincat_id` int(11) NOT NULL,
  `maincat_name` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `status` int(11) NOT NULL DEFAULT 1,
  `type` int(11) NOT NULL DEFAULT 0,
  `photo` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `right_template`
--

CREATE TABLE `right_template` (
  `id` int(11) NOT NULL,
  `name` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `photo` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `photo1` int(11) NOT NULL DEFAULT 0,
  `photowidth1` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `photoheight1` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `photo2` int(11) NOT NULL DEFAULT 0,
  `photowidth2` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `photoheight2` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `photo3` int(11) NOT NULL DEFAULT 0,
  `photowidth3` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `photoheight3` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `photo4` int(11) NOT NULL DEFAULT 0,
  `photowidth4` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `photoheight4` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `photo5` int(11) NOT NULL DEFAULT 0,
  `photowidth5` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `photoheight5` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `photo6` int(11) NOT NULL DEFAULT 0,
  `photowidth6` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `photoheight6` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `photo7` int(11) NOT NULL DEFAULT 0,
  `photowidth7` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `photoheight7` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `photo8` int(11) NOT NULL DEFAULT 0,
  `photowidth8` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `photoheight8` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `photo9` int(11) NOT NULL DEFAULT 0,
  `photowidth9` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `photoheight9` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `text1` int(11) NOT NULL DEFAULT 0,
  `text2` int(11) NOT NULL DEFAULT 0,
  `hyperlink` int(11) NOT NULL DEFAULT 0,
  `attachment` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `right_template`
--

INSERT INTO `right_template` (`id`, `name`, `photo`, `photo1`, `photowidth1`, `photoheight1`, `photo2`, `photowidth2`, `photoheight2`, `photo3`, `photowidth3`, `photoheight3`, `photo4`, `photowidth4`, `photoheight4`, `photo5`, `photowidth5`, `photoheight5`, `photo6`, `photowidth6`, `photoheight6`, `photo7`, `photowidth7`, `photoheight7`, `photo8`, `photowidth8`, `photoheight8`, `photo9`, `photowidth9`, `photoheight9`, `text1`, `text2`, `hyperlink`, `attachment`, `status`) VALUES
(1, 'Template A', 'photo/4979023017bb9.gif', 1, '120', '120', 1, '120', '120', 1, '120', '120', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 1, 1, 1, 1, 1),
(2, 'Template B', 'photo/49790244102ac.gif', 1, '450', '120', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 1, 1, 1, 1, 1),
(3, 'Template C', 'photo/49790256910f6.gif', 1, '450', '450', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 1, 1, 1, 1, 1),
(4, 'Template D (6 Photos)', 'photo/497902737a34a.gif', 1, '120', '120', 1, '120', '120', 1, '120', '120', 1, '120', '120', 1, '120', '120', 1, '120', '120', 0, '', '', 0, '', '', 0, '', '', 1, 1, 1, 1, 1),
(5, 'Template E (9 Photos)', 'photo/4979029a893a4.gif', 1, '120', '120', 1, '120', '120', 1, '120', '120', 1, '120', '120', 1, '120', '120', 1, '120', '120', 1, '120', '120', 1, '120', '120', 1, '120', '120', 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `runing_text`
--

CREATE TABLE `runing_text` (
  `album_id` int(11) NOT NULL,
  `album_name` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `position` int(11) NOT NULL DEFAULT 0,
  `date_posted` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `runing_text`
--

INSERT INTO `runing_text` (`album_id`, `album_name`, `status`, `position`, `date_posted`) VALUES
(16, 'Decorative Concrete Specialists', 1, 4, '2011-03-03'),
(22, 'aaaa', -1, 30, '2013-05-17'),
(23, 'aaaa', -1, 20, '2013-05-17'),
(24, 'This is our New Website!!!', -1, 20, '2013-05-18'),
(25, 'wwwwww', -1, 15, '2013-05-18'),
(26, 'alt=\"\" width=\"700\" height=\"350\"', -1, 0, '2014-05-09'),
(27, '', -1, 0, '2014-05-09'),
(28, 'Selamat Menyambut Bulan Ramadan Al-Mubarak', -1, 0, '2014-05-22'),
(29, 'Welcome To Our Website', 1, 0, '2014-12-20'),
(30, 'www.tentex.com.my', 1, 2, '2017-11-03'),
(31, '1', -1, 0, '2021-07-01');

-- --------------------------------------------------------

--
-- Table structure for table `running_text`
--

CREATE TABLE `running_text` (
  `id` int(11) NOT NULL,
  `message` text COLLATE latin1_general_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `side_panel`
--

CREATE TABLE `side_panel` (
  `id` int(11) NOT NULL,
  `maincat_id` varchar(500) COLLATE latin1_general_ci NOT NULL,
  `left_or_right` int(2) NOT NULL,
  `side_brief` longtext COLLATE latin1_general_ci NOT NULL,
  `side_detail` longtext COLLATE latin1_general_ci NOT NULL,
  `position` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `date_posted` date NOT NULL,
  `status` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `side_panel`
--

INSERT INTO `side_panel` (`id`, `maincat_id`, `left_or_right`, `side_brief`, `side_detail`, `position`, `date_posted`, `status`) VALUES
(27, '|178|', 2, '<p style=\"text-align: center;\"><a href=\"result.php?root=OTU=\"><img style=\"border: 0pt none;\" src=\"../../photo/4e0bcb828583f.jpeg\" alt=\"\" width=\"215\" height=\"211\" /></a>jhjhjhhj</p>', '', '3', '2011-06-22', -1),
(28, '|', 2, '<p style=\"text-align: center;\"><a href=\"result.php?root=MTc4&amp;id=MTQx&amp;main=MTc4\"><img style=\"border: 0pt none;\" src=\"../../photo/4e0bcc77501c0.jpeg\" alt=\"\" width=\"215\" height=\"211\" /></a></p>', '', '4', '2011-06-29', -1),
(29, '', 0, '<p>vgvggvgvgvgvgvgvg</p>', '', '', '2011-08-23', -1);

-- --------------------------------------------------------

--
-- Table structure for table `template`
--

CREATE TABLE `template` (
  `id` int(11) NOT NULL,
  `name` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `photo` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `photo1` int(11) NOT NULL DEFAULT 0,
  `photowidth1` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `photoheight1` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `photo2` int(11) NOT NULL DEFAULT 0,
  `photowidth2` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `photoheight2` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `photo3` int(11) NOT NULL DEFAULT 0,
  `photowidth3` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `photoheight3` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `photo4` int(11) NOT NULL DEFAULT 0,
  `photowidth4` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `photoheight4` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `photo5` int(11) NOT NULL DEFAULT 0,
  `photowidth5` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `photoheight5` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `photo6` int(11) NOT NULL DEFAULT 0,
  `photowidth6` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `photoheight6` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `photo7` int(11) NOT NULL DEFAULT 0,
  `photowidth7` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `photoheight7` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `photo8` int(11) NOT NULL DEFAULT 0,
  `photowidth8` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `photoheight8` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `photo9` int(11) NOT NULL DEFAULT 0,
  `photowidth9` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `photoheight9` varchar(250) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `text1` int(11) NOT NULL DEFAULT 0,
  `text2` int(11) NOT NULL DEFAULT 0,
  `hyperlink` int(11) NOT NULL DEFAULT 0,
  `attachment` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `template`
--

INSERT INTO `template` (`id`, `name`, `photo`, `photo1`, `photowidth1`, `photoheight1`, `photo2`, `photowidth2`, `photoheight2`, `photo3`, `photowidth3`, `photoheight3`, `photo4`, `photowidth4`, `photoheight4`, `photo5`, `photowidth5`, `photoheight5`, `photo6`, `photowidth6`, `photoheight6`, `photo7`, `photowidth7`, `photoheight7`, `photo8`, `photowidth8`, `photoheight8`, `photo9`, `photowidth9`, `photoheight9`, `text1`, `text2`, `hyperlink`, `attachment`, `status`) VALUES
(1, 'Template A', 'photo/497911cd957e5.gif', 1, '120', '120', 1, '120', '120', 1, '120', '120', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 1, 1, 1, 1, 1),
(2, 'Template B', 'photo/497911e8d9814.gif', 1, '450', '120', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 1, 1, 1, 1, 1),
(3, 'Template C', 'photo/4979120b49b99.gif', 1, '450', '450', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 1, 1, 1, 1, 1),
(4, 'Template D (6 photos)', 'photo/49791224bf1f1.gif', 1, '120', '120', 1, '120', '120', 1, '120', '120', 1, '120', '120', 1, '120', '120', 1, '120', '120', 0, '', '', 0, '', '', 0, '', '', 1, 1, 1, 1, 1),
(5, 'Template E (9 Photos)', 'photo/49791238af94f.gif', 1, '120', '120', 1, '120', '120', 1, '120', '120', 1, '120', '120', 1, '120', '120', 1, '120', '120', 1, '120', '120', 1, '120', '120', 1, '120', '120', 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tiny_photo_gallery`
--

CREATE TABLE `tiny_photo_gallery` (
  `id` int(11) NOT NULL,
  `photo1` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tiny_photo_gallery`
--

INSERT INTO `tiny_photo_gallery` (`id`, `photo1`, `status`) VALUES
(271, '../../photo/4df966f46aaa1.gif', 1),
(272, '../../photo/4df9670f6971b.gif', 1),
(273, '../../photo/4df9672ec1160.gif', 1),
(274, '../../photo/4df9678ae0518.gif', 1),
(331, '../../photo/4e098f9bb71b3.gif', 1),
(332, '../../photo/4e098fa15f5e4.gif', 1),
(436, '../../photo/4f3c9e96e8b28.jpeg', 1),
(437, '../../photo/4f3c9ea06acff.gif', 1),
(438, '../../photo/4f3caafa1e84b.gif', 1),
(439, '../../photo/4f3dc5d7d9704.jpeg', -1),
(460, '../../photo/4ffe875d1ab40.jpeg', 1),
(463, '../../photo/50e63e6ca4084.jpeg', 1),
(464, '../../photo/50e63f6544aa2.jpeg', 1),
(465, '../../photo/50e63f6ad9702.jpeg', 1),
(467, '../../photo/50e64f1207a13.jpeg', 1),
(468, '../../photo/51787e3731978.jpeg', 1),
(469, '../../photo/5178d7de9896b.jpeg', 1),
(470, '../../photo/5178e0036ad01.png', 0),
(471, '../../photo/5178e161ec831.png', 1),
(472, '../../photo/5178e435b71b4.png', 1),
(473, '../../photo/5178e4498d253.png', 1),
(474, '../../photo/5178ebc23d093.jpeg', 1),
(475, '../../photo/5178ed4fe8b29.jpeg', 1),
(476, '../../photo/51876c8785840.jpeg', 1),
(477, '../../photo/51876fa994c63.jpeg', 1),
(478, '../../photo/518770ac16e3c.jpeg', 1),
(479, '../../photo/5187776cf053b.jpeg', 1),
(480, '../../photo/5187782a8954b.jpeg', 1),
(481, '../../photo/5196e1d62e788.jpeg', 1),
(482, '../../photo/53f2efa52a42b.jpeg', 1),
(483, '../../photo/53f2f56d5e7d3.jpeg', 1),
(484, '../../photo/53f2f7431e8bd.jpeg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `useronline`
--

CREATE TABLE `useronline` (
  `timestamp` int(11) NOT NULL DEFAULT 0,
  `ip` varchar(40) COLLATE latin1_general_ci NOT NULL,
  `file` varchar(100) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `useronline`
--

INSERT INTO `useronline` (`timestamp`, `ip`, `file`) VALUES
(1625626831, '127.0.0.1', ''),
(1625626831, '127.0.0.1', ''),
(1625626825, '127.0.0.1', ''),
(1625626821, '127.0.0.1', ''),
(1625626732, '127.0.0.1', '');

-- --------------------------------------------------------

--
-- Table structure for table `washington_gallery`
--

CREATE TABLE `washington_gallery` (
  `id` int(11) NOT NULL,
  `album_id` int(11) NOT NULL,
  `product_name` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `description` longtext COLLATE latin1_general_ci NOT NULL,
  `photo1` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `position` int(11) NOT NULL,
  `status` varchar(250) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `washington_gallery`
--

INSERT INTO `washington_gallery` (`id`, `album_id`, `product_name`, `description`, `photo1`, `position`, `status`) VALUES
(350, 30, 'Title', 'Add photo description here. Add photo description here. Add photo description here. Add photo description here. Add photo description here. Add photo description here. Add photo description here. Add photo description here. Add photo description here. Add photo description here. Add photo description here. Add photo description here. Add photo description here. Add photo description here. Add photo description here.', 'photo/50e682f694c60.jpeg', 0, '1'),
(342, 30, 'Add Photo Title Here', '<p>Add photo description here. Add photo description here. Add photo description here. Add photo description here. Add photo description here. Add photo description here. Add photo description here. Add photo description here. Add photo description here. Add photo description here. Add photo description here. Add photo description here. Add photo description here. Add photo description here. Add photo description here.</p>', 'photo/50e682d790f57.jpeg', 0, '1'),
(352, 43, ' ', '', 'photo/51c121150f4bf.jpeg', 20, '1'),
(353, 43, ' ', '', 'photo/51c120a5c7977.jpeg', 10, '1'),
(354, 43, '  ', '', 'photo/51c9574bb8287.jpeg', 25, '1'),
(355, 39, ' ', '', 'photo/51c1240d1fddb.jpeg', 20, '1'),
(356, 39, ' ', '', 'photo/51c1241a5805a.jpeg', 0, '1'),
(357, 43, ' ', '', 'photo/51c124dbde4f9.jpeg', 40, '1'),
(358, 43, ' ', '', 'photo/51c12574b83c5.jpeg', 50, '1'),
(359, 43, ' ', '', 'photo/51c1422c46386.jpeg', 30, '1'),
(360, 40, ' ', '', 'photo/51c143a0086e0.jpeg', 0, '1'),
(361, 40, ' ', '', 'photo/51c143ac2dccd.jpeg', 10, '1'),
(364, 39, ' ', '', 'photo/51c95860948a7.jpeg', 5, '1'),
(365, 39, ' ', '', 'photo/51c9590417091.jpeg', 30, '1'),
(366, 43, ' ', '', 'photo/51c959cd205aa.jpeg', 15, '1'),
(367, 39, ' ', '', 'photo/51c95a639319b.jpeg', 40, '1'),
(369, 43, ' ', '', 'photo/51ca4ed93b6ec.jpeg', 5, '1'),
(370, 39, ' ', '', 'photo/51ca4f97cfaa7.jpeg', 25, '1'),
(371, 43, ' ', '', 'photo/51ca579c94118.jpeg', 60, '1'),
(372, 39, ' ', '', 'photo/51ca591324fac.jpeg', 35, '1'),
(373, 43, ' ', '', 'photo/51ca820e30730.jpeg', 45, '1'),
(374, 43, ' ', '', 'photo/51ca82cf64716.jpeg', 35, '1'),
(375, 39, ' ', '', 'photo/51ca836c6cfe4.jpeg', 10, '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`album_id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`banner_id`),
  ADD KEY `banner_file` (`banner_file`,`test`,`status`);
ALTER TABLE `banner` ADD FULLTEXT KEY `banner_file_2` (`banner_file`);

--
-- Indexes for table `banner_announcement`
--
ALTER TABLE `banner_announcement`
  ADD PRIMARY KEY (`banner_id`),
  ADD KEY `banner_file` (`banner_file`,`hyperlink_url`,`status`);
ALTER TABLE `banner_announcement` ADD FULLTEXT KEY `banner_file_2` (`banner_file`);

--
-- Indexes for table `brookes_banner`
--
ALTER TABLE `brookes_banner`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calendar_mssgs`
--
ALTER TABLE `calendar_mssgs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `m` (`m`),
  ADD KEY `y` (`y`);

--
-- Indexes for table `calendar_users`
--
ALTER TABLE `calendar_users`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cps_banner`
--
ALTER TABLE `cps_banner`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `custom_field_section`
--
ALTER TABLE `custom_field_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dcui_section_cpanel`
--
ALTER TABLE `dcui_section_cpanel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dcui_template_setting`
--
ALTER TABLE `dcui_template_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dcui_template_setting1`
--
ALTER TABLE `dcui_template_setting1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dw_maincat`
--
ALTER TABLE `dw_maincat`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `maincat_id_2` (`category_id`),
  ADD KEY `maincat_id` (`category_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `events_02`
--
ALTER TABLE `events_02`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file_maincat`
--
ALTER TABLE `file_maincat`
  ADD PRIMARY KEY (`maincat_id`),
  ADD UNIQUE KEY `maincat_id_2` (`maincat_id`),
  ADD KEY `maincat_id` (`maincat_id`);

--
-- Indexes for table `file_manager`
--
ALTER TABLE `file_manager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file_upload`
--
ALTER TABLE `file_upload`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `file_upload02`
--
ALTER TABLE `file_upload02`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `flash`
--
ALTER TABLE `flash`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `hartz_events`
--
ALTER TABLE `hartz_events`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `home_content`
--
ALTER TABLE `home_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_section`
--
ALTER TABLE `home_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inquiry_log`
--
ALTER TABLE `inquiry_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inquiry_log1`
--
ALTER TABLE `inquiry_log1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `left_cat`
--
ALTER TABLE `left_cat`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `left_panel_content`
--
ALTER TABLE `left_panel_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `left_sec`
--
ALTER TABLE `left_sec`
  ADD PRIMARY KEY (`maincat_id`);

--
-- Indexes for table `mem`
--
ALTER TABLE `mem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_profile`
--
ALTER TABLE `member_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mh_left`
--
ALTER TABLE `mh_left`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mh_right`
--
ALTER TABLE `mh_right`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mh_text`
--
ALTER TABLE `mh_text`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mm_photo_category`
--
ALTER TABLE `mm_photo_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `mm_photo_gallery`
--
ALTER TABLE `mm_photo_gallery`
  ADD PRIMARY KEY (`photo_id`);

--
-- Indexes for table `murum_category`
--
ALTER TABLE `murum_category`
  ADD PRIMARY KEY (`subcat_id`);

--
-- Indexes for table `murum_section`
--
ALTER TABLE `murum_section`
  ADD PRIMARY KEY (`maincat_id`);

--
-- Indexes for table `mydf_photo`
--
ALTER TABLE `mydf_photo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mydf_product`
--
ALTER TABLE `mydf_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_feedback`
--
ALTER TABLE `news_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_index`
--
ALTER TABLE `news_index`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `news_maincat`
--
ALTER TABLE `news_maincat`
  ADD PRIMARY KEY (`maincat_id`);

--
-- Indexes for table `product_cart_confirm`
--
ALTER TABLE `product_cart_confirm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_section`
--
ALTER TABLE `product_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_maincat`
--
ALTER TABLE `profile_maincat`
  ADD PRIMARY KEY (`maincat_id`),
  ADD UNIQUE KEY `maincat_id_2` (`maincat_id`),
  ADD KEY `maincat_id` (`maincat_id`);

--
-- Indexes for table `qt_brand`
--
ALTER TABLE `qt_brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `qt_login`
--
ALTER TABLE `qt_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qt_product`
--
ALTER TABLE `qt_product`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `qt_solution`
--
ALTER TABLE `qt_solution`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `right_cat`
--
ALTER TABLE `right_cat`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `right_panel_content`
--
ALTER TABLE `right_panel_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `right_sec`
--
ALTER TABLE `right_sec`
  ADD PRIMARY KEY (`maincat_id`);

--
-- Indexes for table `right_template`
--
ALTER TABLE `right_template`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `runing_text`
--
ALTER TABLE `runing_text`
  ADD PRIMARY KEY (`album_id`);

--
-- Indexes for table `running_text`
--
ALTER TABLE `running_text`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `side_panel`
--
ALTER TABLE `side_panel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `template`
--
ALTER TABLE `template`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tiny_photo_gallery`
--
ALTER TABLE `tiny_photo_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `washington_gallery`
--
ALTER TABLE `washington_gallery`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `album_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;

--
-- AUTO_INCREMENT for table `banner_announcement`
--
ALTER TABLE `banner_announcement`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `brookes_banner`
--
ALTER TABLE `brookes_banner`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `calendar`
--
ALTER TABLE `calendar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `calendar_mssgs`
--
ALTER TABLE `calendar_mssgs`
  MODIFY `id` mediumint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `calendar_users`
--
ALTER TABLE `calendar_users`
  MODIFY `uid` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cps_banner`
--
ALTER TABLE `cps_banner`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `custom_field_section`
--
ALTER TABLE `custom_field_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `dcui_section_cpanel`
--
ALTER TABLE `dcui_section_cpanel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `dcui_template_setting`
--
ALTER TABLE `dcui_template_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `dcui_template_setting1`
--
ALTER TABLE `dcui_template_setting1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `dw_maincat`
--
ALTER TABLE `dw_maincat`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `news_id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events_02`
--
ALTER TABLE `events_02`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `file_maincat`
--
ALTER TABLE `file_maincat`
  MODIFY `maincat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `file_manager`
--
ALTER TABLE `file_manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `file_upload`
--
ALTER TABLE `file_upload`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `file_upload02`
--
ALTER TABLE `file_upload02`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `flash`
--
ALTER TABLE `flash`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hartz_events`
--
ALTER TABLE `hartz_events`
  MODIFY `news_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `home_content`
--
ALTER TABLE `home_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `home_section`
--
ALTER TABLE `home_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `inquiry_log`
--
ALTER TABLE `inquiry_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `inquiry_log1`
--
ALTER TABLE `inquiry_log1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `left_cat`
--
ALTER TABLE `left_cat`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `left_panel_content`
--
ALTER TABLE `left_panel_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `left_sec`
--
ALTER TABLE `left_sec`
  MODIFY `maincat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `mem`
--
ALTER TABLE `mem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `member_profile`
--
ALTER TABLE `member_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mh_left`
--
ALTER TABLE `mh_left`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `mh_right`
--
ALTER TABLE `mh_right`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `mh_text`
--
ALTER TABLE `mh_text`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mm_photo_category`
--
ALTER TABLE `mm_photo_category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `mm_photo_gallery`
--
ALTER TABLE `mm_photo_gallery`
  MODIFY `photo_id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `murum_category`
--
ALTER TABLE `murum_category`
  MODIFY `subcat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `murum_section`
--
ALTER TABLE `murum_section`
  MODIFY `maincat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=264;

--
-- AUTO_INCREMENT for table `mydf_photo`
--
ALTER TABLE `mydf_photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `mydf_product`
--
ALTER TABLE `mydf_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=218;

--
-- AUTO_INCREMENT for table `news_feedback`
--
ALTER TABLE `news_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `news_index`
--
ALTER TABLE `news_index`
  MODIFY `news_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `news_maincat`
--
ALTER TABLE `news_maincat`
  MODIFY `maincat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_cart_confirm`
--
ALTER TABLE `product_cart_confirm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `product_section`
--
ALTER TABLE `product_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=548;

--
-- AUTO_INCREMENT for table `profile_maincat`
--
ALTER TABLE `profile_maincat`
  MODIFY `maincat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `qt_brand`
--
ALTER TABLE `qt_brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `qt_login`
--
ALTER TABLE `qt_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `qt_product`
--
ALTER TABLE `qt_product`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `qt_solution`
--
ALTER TABLE `qt_solution`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `right_cat`
--
ALTER TABLE `right_cat`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `right_panel_content`
--
ALTER TABLE `right_panel_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `right_sec`
--
ALTER TABLE `right_sec`
  MODIFY `maincat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `right_template`
--
ALTER TABLE `right_template`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `runing_text`
--
ALTER TABLE `runing_text`
  MODIFY `album_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `running_text`
--
ALTER TABLE `running_text`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `side_panel`
--
ALTER TABLE `side_panel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `template`
--
ALTER TABLE `template`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tiny_photo_gallery`
--
ALTER TABLE `tiny_photo_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=485;

--
-- AUTO_INCREMENT for table `washington_gallery`
--
ALTER TABLE `washington_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=388;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

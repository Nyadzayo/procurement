-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2019 at 02:05 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `permission` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `permission`) VALUES
(1, 'standard user', '{\"stuff\":1\r\n\r\n}'),
(2, 'supervisor', '{\"supervisor\":2}'),
(3, 'manager', '{\"manager\":3}'),
(4, 'head of department', '{\"head of department\":4}'),
(5, 'Adminstrator', '{\"admin\":5}'),
(6, 'Adminstrator', '{\"admin\":5}');

-- --------------------------------------------------------

--
-- Table structure for table `hq_departments`
--

CREATE TABLE `hq_departments` (
  `department_id` varchar(45) NOT NULL,
  `department_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hq_departments`
--

INSERT INTO `hq_departments` (`department_id`, `department_name`) VALUES
('hq101', 'ADMINISTRATION                      '),
('hq102', 'AGRI-DEV HQ                         '),
('hq103', 'AUDIT                               '),
('hq104', 'CENTRAL CLEARING UNIT-BULAWAYO      '),
('hq105', 'CHIEF EXECUTIVE                     '),
('hq106', 'CORPORATE BANKING                   '),
('hq107', 'DEBT RECOVERIES                     '),
('hq108', 'E-BANKING & COMMUNICATIONS          '),
('hq109', 'EXECUTIVE BANKING-AGRIGOLD          '),
('hq111', 'FINANCIAL ACCOUNTING                '),
('hq112', 'HQ CREDIT DEPARTMENT                '),
('hq113', 'HUMAN RESOURCES                     '),
('hq114', 'INFORMATION COMMUNICATION TECH      '),
('hq115', 'LEGAL & COMPLIANCE                  '),
('hq116', 'LOCAL DEALING                       '),
('hq117', 'PREMISES                            '),
('hq118', 'PROCUREMENT                         '),
('hq119', 'RISK MANAGEMENT                     '),
('hq120', 'SALARIES - SFI                      '),
('hq121', 'STRATEGY,MARKETING & BUSINESS'),
('hq122', 'SYSTEMS DEVELOPMENT & SUPPORT       '),
('hq123', 'TRADE FINANCE & EXCHANGE CONTR      '),
('hq124', 'TREASURY BACK OFFICE                '),
('hq125', 'BANKING OPERATIONS');

-- --------------------------------------------------------

--
-- Table structure for table `internal_requisition`
--

CREATE TABLE `internal_requisition` (
  `id` int(11) NOT NULL,
  `product_name` varchar(64) NOT NULL,
  `description` varchar(400) NOT NULL,
  `reason` varchar(500) NOT NULL,
  `quantity` int(10) NOT NULL,
  `created_date` date NOT NULL,
  `state` int(11) NOT NULL,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `department` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `internal_requisition`
--

INSERT INTO `internal_requisition` (`id`, `product_name`, `description`, `reason`, `quantity`, `created_date`, `state`, `from_id`, `to_id`, `department`) VALUES
(37, 'desk ', 'dark wood preferably .', '', 34, '2019-01-25', 3, 39, 2, 'hq115'),
(38, 'poss mechine', 'for smes', '', 45, '2019-01-26', 2, 39, 2, '0'),
(39, 'poss mechine', 'ahdlajdkldja', '', 23, '2019-01-28', 2, 47, 2, 'hq108'),
(40, 'desktop', 'forjgfhjh', '', 2, '2019-01-29', 2, 48, 2, 'hq115'),
(41, 'books', 'dfghjkl;', '', 30, '2019-01-29', 2, 39, 2, 'hq115'),
(42, 'laptop', 'hoiioih', '', 23, '2019-01-29', 2, 39, 2, 'hq115'),
(43, 'laptop', 'haldhalkd', '', 2, '2019-01-29', 1, 47, 2, 'hq108'),
(44, 'desk ', 'for office ', '', 2, '2019-01-29', 2, 49, 2, 'hq115'),
(45, 'cellphone ', 'business handsets ', '', 2, '2019-01-29', 1, 48, 2, 'hq115'),
(46, 'poss mechine', 'point of sell machine ', '', 2, '2019-01-30', 2, 39, 2, 'hq115'),
(47, 'mouse ', 'for laptops', '', 7, '2019-01-30', 2, 39, 2, 'hq115'),
(48, 'mouse', 'for laptops ', '', 7, '2019-01-30', 2, 47, 2, 'hq108'),
(49, 'cups', 'for tea', '', 2, '2019-01-30', 2, 39, 2, 'hq115'),
(50, 'cups', 'for drink', '', 23, '2019-01-30', 2, 52, 2, 'hq103'),
(51, 'desktop', 'uhfwhflshlkd\r\n                                ', '', 2, '2019-01-30', 1, 52, 2, 'hq103'),
(52, 'laptop', 'hdalhdlakdk', '', 2, '2019-01-30', 1, 48, 40, 'hq115'),
(53, 'iphone x', 'ahklhdjsklahsjdakldkask', '', 2, '2019-01-31', 1, 48, 40, 'hq115');

-- --------------------------------------------------------

--
-- Table structure for table `ir_application_state`
--

CREATE TABLE `ir_application_state` (
  `id` int(10) NOT NULL,
  `state` int(30) NOT NULL,
  `role_id` int(10) NOT NULL,
  `user_id` int(30) NOT NULL,
  `action` varchar(30) NOT NULL,
  `location_code` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ir_application_state`
--

INSERT INTO `ir_application_state` (`id`, `state`, `role_id`, `user_id`, `action`, `location_code`) VALUES
(1, 1, 2, 39, 'recommend', 'hq115'),
(2, 2, 3, 40, 'accept ', 'hq115'),
(3, 3, 4, 49, 'authorize', 'hq115');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(10) NOT NULL,
  `status_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `status_name`) VALUES
(1, 'awaiting recommendation'),
(2, 'awaiting authorization'),
(3, 'authorized ');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(64) NOT NULL,
  `salt` varchar(32) NOT NULL,
  `name` varchar(50) NOT NULL,
  `department` varchar(300) NOT NULL,
  `joined` datetime NOT NULL,
  `groups` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `salt`, `name`, `department`, `joined`, `groups`) VALUES
(1, 'kevy', 'new passwod', 'salt', 'kelvin nyadzayo', '', '0000-00-00 00:00:00', 1),
(19, 'Dale', 'password', 'salt', '', '', '0000-00-00 00:00:00', 0),
(20, 'ashly', '6f5ea1c4acc7a563ea8cb3381a55f0183a2394d679ebb7db8312e047bbf87e0d', '28', 'ashly nani', '', '2019-01-19 12:52:17', 1),
(21, 'mufuka', '91a9ef3563010ea1af916083f9fb03a117d4d0d2a697f82368da1f737629f717', '21', 'takudzwa', '', '2019-01-19 12:58:32', 1),
(22, 'brett ', '9c7568513b9c85e73f3650c8b00e3259501096ccee9d3dbdae6ff5e84aabe3af', '27', 'takudzwa', '', '2019-01-19 13:05:16', 1),
(23, 'brian', '5790ac3d0b8ae8afc72c2c6fb97654f2b73651c328de0a3b74854ade562dd17a', '19', 'takudzwa', '', '2019-01-19 13:11:05', 1),
(24, 'brian', '5790ac3d0b8ae8afc72c2c6fb97654f2b73651c328de0a3b74854ade562dd17a', '19', 'takudzwa', '', '2019-01-19 13:11:05', 1),
(25, 'kyle', 'c63c2d34ebe84032ad47b87af194fedd17dacf8222b2ea7f4ebfee3dd6db2dfb', '15', 'takudzwa', '', '2019-01-19 13:13:38', 1),
(26, 'kyle', 'c63c2d34ebe84032ad47b87af194fedd17dacf8222b2ea7f4ebfee3dd6db2dfb', '15', 'takudzwa', '', '2019-01-19 13:13:38', 1),
(27, 'ashly3', 'b3d17ebbe4f2b75d27b6309cfaae1487b667301a73951e7d523a039cd2dfe110', '12', 'ashly nani', '', '2019-01-19 13:18:08', 1),
(28, 'ashly3', 'b3d17ebbe4f2b75d27b6309cfaae1487b667301a73951e7d523a039cd2dfe110', '12', 'ashly nani', '', '2019-01-19 13:18:08', 1),
(29, 'ashly33', 'cf71e1d0fd4aef156f4379be275b69a0958d62272112699f12a48f892ef30eba', '6', 'ashly nani', '', '2019-01-19 13:25:07', 1),
(30, 'ashly34', '9300b2df98c0fdf03787fa0b929a053268ec64a30d1112774c7db46290851f51', '9', 'ashly nani', '', '2019-01-19 13:29:11', 1),
(31, 'ashly343', 'e5b5f7765a9fa9f56c580017c831ed34c765ebf5bd91fd5085a8501853eab3ee', '12', 'ashly nani', '', '2019-01-19 13:30:45', 1),
(32, 'ashly3433', 'c63c2d34ebe84032ad47b87af194fedd17dacf8222b2ea7f4ebfee3dd6db2dfb', '15', 'ashly nani', '', '2019-01-19 13:37:07', 1),
(33, 'ashly34333', '7535d8f2d8c35d958995610f971287288ab5e8c82a3c4fdc2b6fb5d757a5b9f8', '20', 'ashly nani', '', '2019-01-19 13:52:40', 1),
(34, 'kyles', '9323dd6786ebcbf3ac87357cc78ba1abfda6cf5e55cd01097b90d4a286cac90e', '9', 'takudzwa', '', '2019-01-19 13:54:01', 1),
(35, 'hope', '869f2a98b0e3a6ea928ff0542330ea3c1e0ff8591801693350f1fc3f1e57e4c5', '26', 'hope', '', '2019-01-19 14:01:15', 1),
(36, 'hope3', 'aa4a9ea03fcac15b5fc63c949ac34e7b0fd17906716ac3b8e58c599cdc5a52f0', '10', 'hope', '', '2019-01-19 14:02:49', 1),
(37, 'jdksdsk', 'c4cc8a0b9e042763349d7c5da643d20c9dcca7645597f4ea9798db14a56189c5', '20', 'ekjjheje', '', '2019-01-19 14:14:07', 1),
(38, 'hehe', '6f2af69e6c9f5532f4697a865eb0ae43213a3a197c375eb5ecf307331541ffd5', '12', 'kevy', '', '2019-01-19 14:20:34', 1),
(39, 'kelvin', '586396d2081c39b96472c527d83f552f1a4bb9c8c21b6710acf56debbb62728d', 'u‹K7àc÷ÓêTÊ{1²hÿ\'iñ`.®#zîa©æ', 'mazwi nyadzayo', 'hq115', '2019-01-19 15:16:02', 2),
(40, 'shingi', '50f7b2a2c2b1ffd478ef69bae95a631d5e46fd7c4bdec92238f39e18766e1879', 'VˆÒY˜,ãˆÝäR]‹]úúêCÅÊÖÄ_Z«ì', 'shirai diver ', '', '2019-01-20 17:38:56', 1),
(41, 'pretty', '9f08b99235e7c00d0969530467f8f4a1e50ab492695d291b8e60fb92ac6cc3db', 'ljæM@tó}ºÈ?È­ß¹©ic\0­NÎ\0ÕÛÃü', 'pretty jones', '', '2019-01-20 17:41:54', 1),
(42, 'pana', '5df2d1b39dcfba5c10401ee8d57a5ee1077d273a43c8ee9ec3b1701dca8fe453', '!%ÇzÆ«­u™ËX8Ò¢©/­’uÛ,eÃó‰ïÜËH', 'panashe nyadzayo', '', '2019-01-20 17:51:56', 1),
(43, 'kudzie', '31b4415403d7a264ab90af58c48b87acc6754772f62bb7e14ad1cf35623dab7a', 'Ú¼1&Îò8¡hž ‘–VtÔ‚!‘ÈÞBfëëäû1', 'kudzai manhuwa', '', '2019-01-20 17:53:12', 1),
(44, 'ronny', '47abfd01edeaf68f9a9ea5344b6570e16ef732ea5f53b701d2e4a87d3a6737f3', '<0ÎŠK€s\'\0ô¾3ð³Ps¤iî)|KÇ)Ÿ^¼¶', 'ronald kanyepi', '', '2019-01-21 07:02:44', 1),
(45, 'ronald', '3c872ee8e7729529956200da3037500228be39b32a6968f1ba8fb2813c3848c9', 'ï0)êÌbDÔ„¨\rÞotOG4ï`uB,Ñ²[bEÓecJ', 'ronald kanyepi', '', '2019-01-21 07:05:50', 1),
(46, 'chinoz', '886b2e0d3f497e52251bc2a2e6f1f95abde2329dcd975e73da9a617d1632dd96', 'ëÊì2‹xªãK³<ú8{Æ3\0õàwbge®üwÙ{ý}', 'brett chinyerere', '', '2019-01-26 22:02:05', 1),
(47, 'jah', 'cbd248cb96eb3495defe6a2d2ff6bc8059acf0161855ba2f9c474196802cb0ec', '½æ€J©Ú´~Ì³.Õ4¦šÄ¨„Â³]H9(Ë›\rFz', 'josh phiri', 'hq108', '2019-01-28 18:59:36', 1),
(48, 'farai', '2f079ff92e2a6fcba93c2bae1fb797ee1d84e1436d83fc74bc484b75f9ab824c', 'aÊD¼kéSöV\n¼m¡6~,NÜEHÛ¶¯ˆ+lU7€‹:', 'farai kaps', 'hq115', '2019-01-29 02:51:15', 1),
(49, 'boss', '5e4cd05a31192d29e70647a434a797c0640ec6863114dbdaa158b71bcfe168a7', '~ÁÉ®ˆºUF¾zÞÝ4z=“2j)f\\°pPä¯¸å', 'Barbs', 'hq115', '2019-01-29 07:56:32', 2),
(50, 'garwe', '584159f9a6eec8076d6cab23d0bb595fde376877ebd11f371bd07c3c2cf1bf04', '=ú°LÉ\Z\'(@×UµþF×¡S\"Ñ(ñ4Ý¯\'xæÕ', 'takudzwa garwe', 'hq108', '2019-01-30 11:12:45', 2),
(51, 'admin', '0f01c655565fcdf609c37e4c700b3a19445c44ee46564e68dad574e9d46b4b95', '~!sp-Ö„MXÙyF^:cmÂö³¬˜¨:õ»Y', 'Peter Phiri', 'hq114', '2019-01-30 13:29:24', 1),
(52, 'rony', 'c7760f7efd02092271759c9a5c6160ca591692c67240988759ca685bd8f6539a', 'ä½Ôá>ygë¨•eb3A{‚\"n×¥ýwU', 'ronald kanyepi', 'hq103', '2019-01-30 13:42:05', 1),
(53, 'taku', 'd9bcc91b68c0a3e70ef97f7701adc9ea70d77cadd5fec0aeaa84696294e93bdc', '|ˆ¯ï„ƒÒÄº$B©~”—¨—£Êè¥Ú]ó1ûÔ¯v½í', 'takudzwa boss', 'hq103', '2019-01-30 13:43:53', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users_session`
--

CREATE TABLE `users_session` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hash` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `internal_requisition`
--
ALTER TABLE `internal_requisition`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ir_application_state`
--
ALTER TABLE `ir_application_state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_session`
--
ALTER TABLE `users_session`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `internal_requisition`
--
ALTER TABLE `internal_requisition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `ir_application_state`
--
ALTER TABLE `ir_application_state`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `users_session`
--
ALTER TABLE `users_session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

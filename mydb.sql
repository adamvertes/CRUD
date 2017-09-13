-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 13, 2017 at 11:26 AM
-- Server version: 5.6.34-log
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL,
  `url` varchar(300) NOT NULL,
  `title` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `url`, `title`) VALUES
(1, 'images/14316051_1296179023755549_236248774_o (1).jpg', 'ss'),
(2, 'images/17390378_727258867453195_408231159101083349_o.jpg', 'ghjk'),
(3, 'images/1475173799-k1qoXGTIxTOfpl6KrhWOtzj41_.gif', 'dd'),
(4, 'images/14881753_1513540718662568_720092783_o.jpg', 'dd'),
(5, 'images/18109397_1512452282109137_1312737783_n.png', 'ola'),
(6, 'images/14962934_1355984914441626_2032713119_n.jpg', 'ff'),
(7, 'images/18319329_821299554695425_4766883724776274633_o.jpg', 'kkk');

-- --------------------------------------------------------

--
-- Table structure for table `images_has_tags`
--

CREATE TABLE IF NOT EXISTS `images_has_tags` (
  `images_id` int(11) NOT NULL,
  `tags_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `images_has_tags`
--

INSERT INTO `images_has_tags` (`images_id`, `tags_id`) VALUES
(4, 1),
(1, 3),
(2, 4),
(4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) NOT NULL,
  `tag` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `tag`) VALUES
(1, 'portugal'),
(3, 'work'),
(4, 'ola');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images_has_tags`
--
ALTER TABLE `images_has_tags`
  ADD PRIMARY KEY (`images_id`,`tags_id`),
  ADD KEY `fk_images_has_tags_tags1_idx` (`tags_id`),
  ADD KEY `fk_images_has_tags_images_idx` (`images_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `images_has_tags`
--
ALTER TABLE `images_has_tags`
  ADD CONSTRAINT `fk_images_has_tags_images` FOREIGN KEY (`images_id`) REFERENCES `images` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_images_has_tags_tags1` FOREIGN KEY (`tags_id`) REFERENCES `tags` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

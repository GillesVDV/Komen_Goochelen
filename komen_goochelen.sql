-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Mar 29, 2015 at 04:54 PM
-- Server version: 5.5.38
-- PHP Version: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `komen_goochelen`
--

-- --------------------------------------------------------

--
-- Table structure for table `komen_cms`
--

CREATE TABLE `komen_cms` (
  `currentdag` varchar(255) NOT NULL,
  `eindeweek` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komen_cms`
--

INSERT INTO `komen_cms` (`currentdag`, `eindeweek`, `id`) VALUES
('maandag', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `komen_comments`
--

CREATE TABLE `komen_comments` (
`id` int(11) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `comments` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `komen_pictures`
--

CREATE TABLE `komen_pictures` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `extension` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komen_pictures`
--

INSERT INTO `komen_pictures` (`id`, `user_id`, `picture`, `description`, `creation_date`, `extension`) VALUES
(2, 5, 'ugly-kitteh@2x', 'uyze', '2015-03-29 12:12:50', 'png'),
(3, 5, 'kitteh2@2x', 'd', '2015-03-29 12:28:33', 'png'),
(4, 1, 'cute-kitteh@2x', 'f', '2015-03-29 12:29:04', 'png');

-- --------------------------------------------------------

--
-- Table structure for table `komen_score`
--

CREATE TABLE `komen_score` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `intro_trick` int(11) NOT NULL,
  `main_trick` int(11) NOT NULL,
  `finale_trick` int(11) NOT NULL,
  `beoordeler_id` int(11) NOT NULL,
  `totaalscore` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komen_score`
--

INSERT INTO `komen_score` (`id`, `user_id`, `intro_trick`, `main_trick`, `finale_trick`, `beoordeler_id`, `totaalscore`) VALUES
(41, 27, 0, 0, 0, 0, 31),
(42, 28, 0, 0, 0, 0, 13),
(43, 29, 0, 0, 0, 0, 16),
(44, 30, 0, 0, 0, 0, 14);

-- --------------------------------------------------------

--
-- Table structure for table `komen_users`
--

CREATE TABLE `komen_users` (
`id` int(11) NOT NULL,
  `artistennaam` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `chosen` int(11) NOT NULL,
  `dag` varchar(255) NOT NULL,
  `straat` varchar(255) NOT NULL,
  `plaats` varchar(255) NOT NULL,
  `huisnr` int(11) NOT NULL,
  `postcode` int(11) NOT NULL,
  `intro` text NOT NULL,
  `main` text NOT NULL,
  `finale` text NOT NULL,
  `extension` varchar(255) NOT NULL,
  `cms` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komen_users`
--

INSERT INTO `komen_users` (`id`, `artistennaam`, `password`, `photo`, `email`, `chosen`, `dag`, `straat`, `plaats`, `huisnr`, `postcode`, `intro`, `main`, `finale`, `extension`, `cms`) VALUES
(27, '', '$2y$12$ijxLMRr5l./3kC3rT2FkG.1qL1WcA2QcMMFnuU/0knvfa7OpD23I6', 'item_531_1680x1050', 'Matthias Brodelet', 1, 'maandag', '', 'Ninof', 0, 0, '', '', '', 'jpg', 0),
(28, '', '$2y$12$mNLwZ/kKGh98Wd.TABrcIuDza5qfOwOehL1sfzxA9uh8YK4tMG2sK', 'impossibleisnothing_wallpaper_workdiary.de', 'Gilles van de ven', 2, 'dinsdag', '', 'Sint-Niklaas', 0, 0, '', '', '', 'jpg', 0),
(29, '', '$2y$12$wTDa60GVO9S.Ib2DWjZ.0eQOzACuqhUcgWIwcMQLk/zgjkz9cdss.', 'mr_proper', 'Mr. Proper', 3, 'woensdag', '', 'Zijn fles', 0, 0, '', '', '', 'jpg', 0),
(30, '', '$2y$12$3dtz/QCO3CPjKBj0z.CX4.9Qz3eHvTn6iP5Ks936Ski3QvpxbT5Va', 'kitteh2@2x', 'Ons Linda', 4, 'donderdag', '', 'Kortrijk', 0, 0, '', '', '', 'png', 0),
(32, '', '$2y$12$jjOSACdK9acIK5ObmJCh6e4s1WiHwIETKjr79nO4ABDHjN0b7iPcq', 'cute-kitteh@2x', 'cms_user', 0, '', '', '', 0, 0, '', '', '', 'png', 1),
(33, '', '$2y$12$W7ejstxhR4SkYOfYURkGke4vYA.DYekRALWPR0L.qVR0YP7KYXiYK', 'Screen Shot 2015-03-29 at 14.01.11', 'yoloman', 0, '', 'lol', 'lol', 56, 8659, 'intro', 'main', 'finale', 'png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `komen_weken`
--

CREATE TABLE `komen_weken` (
`id` int(11) NOT NULL,
  `maandag` varchar(255) NOT NULL,
  `dinsdag` varchar(255) NOT NULL,
  `woensdag` varchar(255) NOT NULL,
  `donderdag` varchar(255) NOT NULL,
  `empty` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komen_weken`
--

INSERT INTO `komen_weken` (`id`, `maandag`, `dinsdag`, `woensdag`, `donderdag`, `empty`) VALUES
(2, 'yy', 'vv', 'qq', 'èè', 2),
(3, 'poi', 'kjh', '', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `komen_comments`
--
ALTER TABLE `komen_comments`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komen_pictures`
--
ALTER TABLE `komen_pictures`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komen_score`
--
ALTER TABLE `komen_score`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komen_users`
--
ALTER TABLE `komen_users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komen_weken`
--
ALTER TABLE `komen_weken`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `komen_comments`
--
ALTER TABLE `komen_comments`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `komen_pictures`
--
ALTER TABLE `komen_pictures`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `komen_score`
--
ALTER TABLE `komen_score`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `komen_users`
--
ALTER TABLE `komen_users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `komen_weken`
--
ALTER TABLE `komen_weken`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Aug 26, 2019 at 12:52 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trf_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(48, 'PHP'),
(52, 'Javascript'),
(53, 'cd');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(3) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(3, 113, 'nikhil', 'yug@t.h', 'qguwgyffyugf', 'unapproved', '2019-06-29'),
(7, 113, '5', 'yug@twfirh', 'hi', 'unapproved', '2019-06-29'),
(8, 113, '5', 'yug@t.h', 'hii this is prathamesh', 'unapproved', '2019-06-29'),
(9, 113, '5', 'yug@twfirh', 'hello', 'unapproved', '2019-06-29'),
(10, 113, '5', 'yug@t.h', 'radaaa', 'unapproved', '2019-06-29'),
(11, 113, '5', 'yug@t.h', 'dhurrrr', 'unapproved', '2019-06-29'),
(12, 113, '4', 'yug@t.h', 'nnn', 'unapproved', '2019-06-29'),
(13, 136, '0', '', 'shihso', 'unapproved', '2019-08-16'),
(14, 136, '0', '', 'thia is great', 'unapproved', '2019-08-16'),
(15, 136, '0', '', 'jnj', 'unapproved', '2019-08-16'),
(16, 136, '0', '', 'ds', 'unapproved', '2019-08-16'),
(17, 136, '0', '', 'ancdc', 'unapproved', '2019-08-16'),
(18, 138, '0', '', 'ddefsfsf', 'unapproved', '2019-08-20'),
(19, 139, '0', '', 'kskfnkjf', 'unapproved', '2019-08-20'),
(20, 113, '0', '', 'nie\r\n', 'unapproved', '2019-08-25'),
(21, 113, '0', '', 'nicie', 'unapproved', '2019-08-25'),
(22, 113, '0', '', 'udhu\r\n', 'unapproved', '2019-08-25');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_user` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` varchar(255) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft',
  `post_views_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_user`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`, `post_views_count`) VALUES
(113, 48, 'PHP', 'nikhil', 'rico', '2017-01-30', 'image_5.jpg', 'hello', 'php', '', 'published', 193),
(114, 48, 'Javascript', 'Miguel', '', '2015-07-24', 'image_4.jpg', '<p style=\"text-align: justify; line-height: 14px; margin: 0px 0px 14px; padding: 0px; font-family: Arial, Helvetica, sans;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed fermentum fermentum pretium. Ut nec purus at est consequat pretium vitae at tortor. Morbi pulvinar lacinia arcu, non elementum leo commodo id. Mauris congue volutpat feugiat. Praesent quis ligula vel neque consectetur mollis. Mauris a ipsum a elit pharetra sodales vitae non diam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vitae diam in diam malesuada gravida a sit amet arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nunc et urna eu justo ullamcorper tempus.</p>\r\n<p>&nbsp;</p>', 'javascript', '', 'published', 26),
(115, 48, 'Javascript', 'Edwin Diaz', '', '2015-07-24', 'image_4.jpg', '<p style=\"text-align: justify; line-height: 14px; margin: 0px 0px 14px; padding: 0px; font-family: Arial, Helvetica, sans;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed fermentum fermentum pretium. Ut nec purus at est consequat pretium vitae at tortor. Morbi pulvinar lacinia arcu, non elementum leo commodo id. Mauris congue volutpat feugiat. Praesent quis ligula vel neque consectetur mollis. Mauris a ipsum a elit pharetra sodales vitae non diam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vitae diam in diam malesuada gravida a sit amet arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nunc et urna eu justo ullamcorper tempus.</p>\r\n<p>&nbsp;</p>', 'javascript', '', 'published', 0),
(118, 48, 'Javascript', 'Edwin Diaz', '', '2015-07-24', 'image_4.jpg', '<p style=\"text-align: justify; line-height: 14px; margin: 0px 0px 14px; padding: 0px; font-family: Arial, Helvetica, sans;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed fermentum fermentum pretium. Ut nec purus at est consequat pretium vitae at tortor. Morbi pulvinar lacinia arcu, non elementum leo commodo id. Mauris congue volutpat feugiat. Praesent quis ligula vel neque consectetur mollis. Mauris a ipsum a elit pharetra sodales vitae non diam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vitae diam in diam malesuada gravida a sit amet arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nunc et urna eu justo ullamcorper tempus.</p>\r\n<p>&nbsp;</p>', 'javascript', '', 'published', 7),
(136, 48, 'new post ti check draft', '', 'rico', '2019-06-29', 'image_1.jpg', '<p><strong>ye meri post h</strong></p>\r\n<p><strong>ye meri post h</strong></p>\r\n<p><strong>ye meri post h</strong></p>\r\n<p><strong>ye meri post h</strong></p>\r\n<p><strong>ye meri post h</strong></p>\r\n<p><strong>ye meri post h</strong></p>\r\n<p>hfwfyugw78yfigwfiyuwgefi8wft</p>', 'javascript', '', 'draft', 19),
(137, 48, 'cmxamxkl', '', 'rico', '2019-08-20', '', '<p>kssjfodfjosijcosjoijf</p>', 'xxcc', '', 'published', 1),
(138, 48, 'cmxamxklfsf', '', 'ruturaj', '2019-08-20', '', '<p>kssjfodfjosijcosjoijfd</p>', 'xxcc', '', 'published', 5),
(139, 48, 'dnkdnkls', '', 'Ruturajd', '2019-08-20', '', '<p>nsknfsdlknksdnf</p>', 'nesjknfksn', '', 'draft', 3),
(140, 48, 'knxknckn', '', 'pg123', '2019-08-20', '', '<p>&nbsp;dczj jzc</p>', 'nkcnz', '', 'published', 6);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `status` varchar(100) DEFAULT NULL,
  `githubLink` varchar(100) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `teamdid` varchar(50) NOT NULL,
  `likes` int(100) NOT NULL DEFAULT 0,
  `date` date NOT NULL,
  `tags` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `title`, `status`, `githubLink`, `photo`, `teamdid`, `likes`, `date`, `tags`, `description`) VALUES
('1', 'new', 'completed', 'abc', NULL, '1,2,3,4', 0, '2019-06-11', '', 'prathamesh'),
('2', 'rohit', 'completed', 'jhdukcheu', NULL, '1,2', 0, '2019-06-10', '2,3', 'vdvgbgtgg'),
('5', 'aniket', 'ongoing', 'idk', NULL, '1,2', 0, '0000-00-00', '2', 'skjcbsjh'),
('8', 'new1', 'ongoing', '', 'robo.jpg', '11719343', 0, '2019-08-28', '2', 'wdefrgt');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `quizId` varchar(10) NOT NULL,
  `quizName` varchar(100) NOT NULL,
  `discription` varchar(500) NOT NULL,
  `startDate` datetime NOT NULL,
  `endDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`quizId`, `quizName`, `discription`, `startDate`, `endDate`) VALUES
('0', 'second', '', '2019-06-03 00:00:00', '2019-06-20 10:15:31'),
('1', 'prathamesh', 'hayvz xggsb ', '2019-06-12 12:22:00', '2019-06-07 12:02:00');

-- --------------------------------------------------------

--
-- Table structure for table `quizquestion`
--

CREATE TABLE `quizquestion` (
  `quizId` varchar(100) NOT NULL,
  `questionId` int(10) NOT NULL,
  `questions` varchar(500) NOT NULL,
  `optionA` varchar(100) NOT NULL,
  `optionB` varchar(100) NOT NULL,
  `optionC` varchar(100) NOT NULL,
  `optionD` varchar(100) NOT NULL,
  `correctOption` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quizquestion`
--

INSERT INTO `quizquestion` (`quizId`, `questionId`, `questions`, `optionA`, `optionB`, `optionC`, `optionD`, `correctOption`) VALUES
('1', 142, 'hii1', '1', '2', '3', '4', 'a'),
('1', 143, 'hii2', '1', '23', '3', '4', 'a'),
('0', 152, 'h1', 'a1', 'b1', 'c1', 'd1', 'a'),
('0', 153, 'h2', 'a2', 'b2', 'c2', 'd2', 'a'),
('0', 154, 'h3', 'a', 'b', 'c', 'd', 'b'),
('0', 155, 'new5', 'tfyghjk', 'tfyguhi', 'ytguio', '98ytr', 'd'),
('5d16261088cbb', 156, 'jhweuhf', 'ojdiugg', 'ckxn', 'dsio', 'xijhi', 'b'),
('5d16261088cbb', 157, 'sdioj', 'dju', 'dop', 'diyifhreiuej', 'ruih', 'a'),
('5d179e5e109f9', 158, 'hii', 'a', 'b', 'c', 'd', 'a'),
('5d179e5e109f9', 159, 'hii2', 'a2', 'b2', 'c2', 'd2', 'b');

-- --------------------------------------------------------

--
-- Table structure for table `quizresponse`
--

CREATE TABLE `quizresponse` (
  `quizId` int(10) NOT NULL,
  `userId` int(100) NOT NULL,
  `score` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quizresponse`
--

INSERT INTO `quizresponse` (`quizId`, `userId`, `score`) VALUES
(0, 1, 4),
(1, 1, 6),
(0, 2, 0),
(0, 2, 0),
(0, 2, 0),
(0, 2, 0),
(0, 2, 0),
(0, 2, 0),
(0, 2, 0),
(0, 2, 0),
(0, 2, 0),
(0, 2, 0),
(0, 3, 2),
(0, 3, 3),
(0, 3, 0),
(0, 3, 0),
(0, 3, 1),
(0, 3, 0),
(0, 3, 0),
(0, 3, 0),
(0, 3, 3),
(0, 3, 0),
(0, 3, 1),
(0, 0, 2),
(1, 0, 0),
(0, 0, 1),
(0, 0, 4),
(0, 0, 0),
(0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`) VALUES
('1', 'Machine learning'),
('2', 'ai'),
('3', 'ait'),
('5', 'backend'),
('4', 'webT'),
('4', 'webT'),
('6', 'backend'),
('7', 'frontend'),
('8', 'gaming'),
('9', 'avr'),
('10', 'augmented reality');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `Branch` varchar(100) NOT NULL,
  `Year` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `google_link` varchar(100) NOT NULL,
  `linkedlin_link` varchar(100) NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `randSalt` varchar(255) NOT NULL DEFAULT '$2y$10$iusesomecrazystrings22',
  `token` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `Branch`, `Year`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `google_link`, `linkedlin_link`, `user_role`, `randSalt`, `token`) VALUES
(1, 'rico', 'Computer', '2', '$2y$12$19ZpnAkuhoaAFH7dclUGy.WFIL84PJ8AS216azZtXALy6sqexsScC', '', '', 'rico@gmail.com', '', '', '', 'subscriber', '$2y$10$iusesomecrazystrings22', ''),
(2, 'suave', 'Computer', '2', '$2y$12$jG3YUwNt3X39OB.YJd311O9akwOw17N4e1NQ79N2xrojC5NG3Na3S', '', '', 'edwin@codingfaculty.com', '', '', '', 'subscriber', '$2y$10$iusesomecrazystrings22', ''),
(3, 'pg123', 'Computer', '2', '12', 'pratham', 'gindodia', 'aiud@njsdk', '', '', '', 'subscriber', '$2y$10$iusesomecrazystrings22', ''),
(0, 'pratham', 'Computer', '2', '$2y$12$y5dh5AgnO6hN5Tchdjlac.yMHvUyCjuEU7ohRHNGIud/wKYat01e.', '', '', 'kk@gmail.com', '', '', '', 'admin', '$2y$10$iusesomecrazystrings22', ''),
(0, 'krish8484', '', '', '$2y$10$MY74Bz1jI3J4xI983aDOf.iJXXzOPCdjdL.H/sgG5i74u3tqeui/W', 'krish', 'agarwal', 'krish8484@gmail.com', '', '', '', 'subscriber', '$2y$10$iusesomecrazystrings22', ''),
(7, 'ruturaj', 'elex', '2019', '$2y$12$.qF1nmOos5TGNyYElfJNh.tKOSMT3a6OGj0m0LPkSNKQ6ArHhmD/.', 'ruturaj', 'deshmukh', 'ruturaj@gmail.com', '', '', '', 'subscriber', '$2y$10$iusesomecrazystrings22', ''),
(34, 'ruturaj', 'dwfe', 'csv', '1234', 'csvd', 'csvd', 'ghj@123.com', '', '', '', 'subscriber', '$2y$10$iusesomecrazystrings22', ''),
(44, 'Ruturajd', 'comp', '2', '$2y$12$x9OKzCDY5szzI7QeLTOOx.zUDRXj3mxyDOLfc9r86uGvaEXBtmtla', 'Ruturaj', 'Deshmukh', 'sdj@wx.cv', '', '', '', 'admin', '$2y$10$iusesomecrazystrings22', ''),
(3, 'pg123', 'comp', '2', '12', 'prathamesh', 'gindodia', '123@we.cv', '', '', '', 'admin', '$2y$10$iusesomecrazystrings22', ''),
(11810343, 'pratham123', '', '', '$2y$10$Sy8uzW9wRDK9XO49TQ34ue8hMxrMqSfEV5X3ZmBM61eNoP7NZ6l32', 'Prathmesh', 'Gindodia', 'sdwfe@we.cv', 'Screenshot (69).png', 'ds55@google', 'ysidqiyc@er.cv', 'admin', '$2y$10$iusesomecrazystrings22', ''),
(11810343, 'dwfe', '', '', '$2y$10$iCkzSaAVXzaEc5JBW0HsvuKIOlDbGL4PTi05lWLdGofN7zLVxM8wm', 'Aniket', 'Ghorpade', 'sdwfe@we.cv', 'Screenshot (74).png', 'ds55@google', 'ysidqiyc@er.cv', 'subscriber', '$2y$10$iusesomecrazystrings22', ''),
(11719343, 'nikhil', '', '', '$2y$10$3Pmxh3Zy5r5GLu2BGwj2V.M8GtFqZxeoPvl/RvCio5lNv/d8/VARK', 'Nikhil', 'Ghodke', 'g@sw.com', 'Screenshot (72).jpg', 'ds55@google', 'ysidqiyc@er.cv', 'admin', '$2y$10$iusesomecrazystrings22', ''),
(1181034, 'rutu1234', '', '', '$2y$10$B4bHGAXjV4EJMXBVPmw36eOfdgC40T2WbgeIf5JId96z5./YQfZLy', 'Nikhil', 'Ghodke', 'ruturaj@gmail.com', 'Screenshot (64).png', 'ds55@google', 'ysidqiyc@er.cv', 'subscriber', '$2y$10$iusesomecrazystrings22', '');

-- --------------------------------------------------------

--
-- Table structure for table `users_online`
--

CREATE TABLE `users_online` (
  `id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_online`
--

INSERT INTO `users_online` (`id`, `session`, `time`) VALUES
(44, '', 1447434996),
(45, 's47g806mg6788i92u5ogm6kqi4', 1447441570),
(46, '72clfovqk7vo2p8fiii26tkmr4', 1447461586),
(47, '3gs3q67k5ntpma8tbp2kuvof23', 1447691896),
(48, 'bouqd4fslhn2b1nv20k559col1', 1447796024),
(49, 'tign71tbpar4di74k13f8nr022', 1447867949),
(50, 'ju0s1j019d1qlc1q4tb703rgm3', 1447880891),
(51, 'tp6khbvgo4hdlfueekpmaefcu0', 1447952096),
(52, 'kv0klvlajm8j50d3uqt6go4bm6', 1448174347),
(53, 'qsdv073j4c3lqd6m0rtdpg3615', 1448296313),
(54, 'tmliedhtcgvi8r96l6qplehos4', 1448292854),
(55, 'vrumjbdrjrauucdhg6cta8hhn6', 1448800892),
(56, 'eb1ae8996caf679d187c1037ec9620b1', 1478098539),
(57, '40780dfe8631b764c435168775d44432', 1479443689),
(58, '6d9081fbf0106e9bfef3e77f6fa68f8a', 1481004509),
(59, 'b57212ad3e92b65c05d8ddcd1805a370', 1481382178),
(60, '3cf8d2b7eb470cb635a6102868ae9bd6', 1481397855),
(61, 'c7e0ac8eeeaaf5d3ac4329af9bf4b777', 1481685807),
(62, 'b50a5d9ab4b00848c009d472c63ae2cd', 1485830805),
(63, '3ef98f25d1b1762dd799f33b1a2b2657', 1499988384),
(64, '229f256600c1d05e81bd5036d941069a', 1499993069),
(65, '34aea21ebd8d1ae1b572236a4783cbad', 1500065466),
(66, 'u65om9vh5ckgsd4lkkekr7tn3f', 1561731502),
(67, '0iv2jj1ec9q0u2trpp3vf547je', 1561732562),
(68, 'gpmjj7n3p7gkr5q6766cvci67l', 1561798676),
(69, 'bfu3po17fbjbf4gmirg0lnmkha', 1561800982),
(70, 'h09s649pda4p8645o04alkt3g8', 1561801089),
(71, 'kga4kjcq327s7jcld9hggbj0a4', 1561831636),
(72, 'qsv8d0u22p4k4u6p9e8m21n960', 1563863670),
(73, 'n5e5bkp4pgtu6sc2um41319v2b', 1565610588),
(74, 'vhducp4hvqm7ufunhm52m2fu8p', 1565613317),
(75, '0jt8nrepg45hsqhpn0c4unpl7i', 1565631782),
(76, 'tshodrbeu497jf1svidp721rur', 1565632819),
(77, 'vrvvgl4rpc4g20ob7d29ghb40u', 1565734338),
(78, 'cablm4kv17iqbslb70c32882i8', 1565734631),
(79, 'aj9mv9422daljt34f6oqcbm8kl', 1565741581),
(80, '892keunq9qmf4msma717jb17j6', 1565784684),
(81, 'od0jhu7063u62ruqu17dufjc2h', 1566021135),
(82, 'hdaqi13rc854ueqhcs7epn7l8k', 1566058259),
(83, 'r43kjcmmdmqugk665qt1o7f880', 1566308381),
(84, '4bq3454dfmdlhud5d8a432oa24', 1566538808),
(85, 'bmmat0lcgep6feucfk54g66ppj', 1566721484),
(86, 'q77e9gqlii82uc786q026vu87u', 1566742025),
(87, 'q3qrjlckokk46k4iml7q7kq4cp', 1566812978);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`quizId`);

--
-- Indexes for table `quizquestion`
--
ALTER TABLE `quizquestion`
  ADD PRIMARY KEY (`questionId`);

--
-- Indexes for table `users_online`
--
ALTER TABLE `users_online`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `quizquestion`
--
ALTER TABLE `quizquestion`
  MODIFY `questionId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT for table `users_online`
--
ALTER TABLE `users_online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

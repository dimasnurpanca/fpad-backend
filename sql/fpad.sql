-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 11, 2018 at 04:23 PM
-- Server version: 10.0.34-MariaDB-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rahmatte_fpad`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(12) NOT NULL,
  `nama_kategori` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`) VALUES
(1, 'Kategori 1'),
(2, 'Kategori 2');

-- --------------------------------------------------------

--
-- Table structure for table `stories`
--

CREATE TABLE `stories` (
  `id` int(12) NOT NULL,
  `user_email` text NOT NULL,
  `kategori_id` int(12) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `content` text NOT NULL,
  `date` text NOT NULL,
  `last_update` text NOT NULL,
  `status` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stories`
--

INSERT INTO `stories` (`id`, `user_email`, `kategori_id`, `title`, `description`, `image`, `content`, `date`, `last_update`, `status`) VALUES
(7, 'test@test.com', 1, 'Story Title', 'Story Description', '', '<u>test</u><br><br><blockquote>sdasdas</blockquote>dsdsdsds<br>sdsd<br><br><del>sdssdsd</del> <u>sdsdsdsds</u> <br><br><ul><li>v<br></li></ul>jcjcufuxuxuxuxuxucucuufucifififificifuci<br><ul><li>fuci<br></li></ul>jcivivivivivivivi<br><br><ul><li>uciciciviivivicivivi9</li></ul><ul><li>ucicicivivivivi<br></li></ul>jcivivifigigigi<br><br><br><br><br><ul><li><blockquote><del><b><i><u>ufufiviviviviviv8</u></i></b></del></blockquote></li></ul>fifzfzixgkxigzfizfititodgrgrg<br>rgrgrgrg<br><br><br><br><br><br>efef<br><br><br><br><br><br>f<br>f<br>f<br>f<br><br><br><br><br>f<br>f<br>f<br>ff<br>f<br>f<br>f<br>f<br>f<br>f<br>f<br>f<br>f<br>f<br>f<br>f<br>f<br>f<br>f<br>f<br>f<br>f<br>f<br>f<br>f<br>f<br>f<br>f<br>f<br>f<br>f<br>f<br>f<br>f<br>f<br>f<br>f<br>f<br>f<br>f<br>f<br>', '1517754035', '1517906978', 'Approved'),
(9, 'test@test.com', 2, '', '', 'defaultupload.png', '<p data-tag=\"input\"></p>', '1517761588', '', ''),
(10, 'test@test.com', 2, 'Test123', '', 'defaultupload.png', '', '1517761653', '1517841152', 'Published'),
(11, 'test@test.com', 2, 'Tests', 'Deskripsi', '0402201817045814239335-352-k950991.jpg', '<u><u>Konten</u></u><u>s</u><br><br>', '1517763898', '', ''),
(13, 'test@test.com', 2, '', '', 'defaultupload.png', 'asd', '1517770730', '', ''),
(34, 'asda3333@gmail.com', 2, 'asda 3333', 'asda 3333', 'defaultupload.png', '<u>qwe</u>', '1519487291', '', 'Drafts'),
(32, 'testtt@test.com', 0, '', '', 'defaultupload.png', '', '1519478189', '', 'Published'),
(33, 'asda3333@gmail.com', 0, 'test 3333', 'desc 3333', 'defaultupload.png', 'content 3333', '1519487267', '', 'Approved'),
(30, 'm26413105@alumni.petra.ac.id', 2, 'a', 'aa', 'defaultupload.png', 'aaa', '1518485374', '', 'Drafts'),
(31, 'm26413105@alumni.petra.ac.id', 1, 'sjjs', 's7s', 'defaultupload.png', 'ss', '1519218549', '', 'Drafts'),
(28, 'm26413105@alumni.petra.ac.id', 1, 's', 'a', 'defaultupload.png', 'a', '1518444800', '', 'Drafts'),
(29, 'test@test.com', 2, 'testx', 'testx', 'defaultupload.png', '<u>testx</u>', '1518455760', '', 'Drafts'),
(27, 'm26413105@alumni.petra.ac.id', 2, 'test2', 'test desc', 'defaultupload.png', 'asda', '1518419569', '1518419592', 'Approved'),
(26, 'm26413105@alumni.petra.ac.id', 2, 'test title', 'test description', 'defaultupload.png', 'konten', '1518418857', '1518418902', 'Approved'),
(25, 'nurpanca@gmail.com', 2, 'Story 1', 'story description', 'defaultupload.png', '<b>jajfndksmms</b><br><br>kskdnfkdmdmd<br><br><br>', '1518348251', '1518348272', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `stories_comment`
--

CREATE TABLE `stories_comment` (
  `id` int(12) NOT NULL,
  `stories_id` int(12) NOT NULL,
  `email_user` text NOT NULL,
  `comment` text NOT NULL,
  `date` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stories_comment`
--

INSERT INTO `stories_comment` (`id`, `stories_id`, `email_user`, `comment`, `date`) VALUES
(1, 7, 'test@test.com', 'asdawdawd', '1517752809'),
(2, 7, 'test@test.com', 'testghkfkdkdkdjfkgkdkdkdkdkdkdkdkdkdkfkfkfkffkdjdjfjfjdjdhshshshsjsjsjdjdjdjdjdjdjdjdjdjdjxjxjdjdjdjdjdjdjdjdjdjdjdjxjxjdjdjdjjdjdjdjdjduduk', '1517933912'),
(3, 7, 'jF0vTyhhXxcpkAmXjU11WI6UXcy1@facebook.com', 'Yttgg', '1518282582'),
(4, 7, 'nurpanca@gmail.com', 'test', '1518336406'),
(5, 7, 'testasd@test.com', 'test', '1518346267'),
(6, 25, 'nurpanca@gmail.com', 'test', '1518348289'),
(7, 27, 'nurpanca@gmail.com', 'ts', '1518474597'),
(8, 7, 'supercoolstatus@gmail.com', 'gdx', '1518881876'),
(9, 7, 'asda3333@gmail.com', 'test', '1519532229'),
(10, 7, 'asda3333@gmail.com', 'test', '1519532676'),
(11, 7, 'test1234@gmail.com', 'test', '1519571225');

-- --------------------------------------------------------

--
-- Table structure for table `stories_like`
--

CREATE TABLE `stories_like` (
  `id` int(12) NOT NULL,
  `stories_id` int(12) NOT NULL,
  `email_user` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stories_like`
--

INSERT INTO `stories_like` (`id`, `stories_id`, `email_user`) VALUES
(24, 27, 'community_hacked@yahoo.com'),
(25, 25, 'community_hacked@yahoo.com'),
(91, 33, 'admin@admin.com'),
(90, 33, 'admin@admin.com'),
(89, 33, 'admin@admin.com'),
(92, 33, 'admin@admin.com'),
(93, 33, 'admin@admin.com'),
(94, 33, 'admin@admin.com'),
(95, 33, 'admin@admin.com'),
(96, 33, 'admin@admin.com'),
(97, 33, 'admin@admin.com'),
(98, 33, 'admin@admin.com'),
(99, 33, 'admin@admin.com'),
(100, 33, 'admin@admin.com'),
(101, 33, 'admin@admin.com'),
(102, 33, 'admin@admin.com'),
(103, 33, 'admin@admin.com'),
(104, 33, 'admin@admin.com'),
(105, 33, 'admin@admin.com'),
(106, 33, 'admin@admin.com'),
(107, 33, 'admin@admin.com'),
(108, 33, 'admin@admin.com'),
(109, 33, 'admin@admin.com'),
(110, 33, 'admin@admin.com'),
(111, 33, 'admin@admin.com'),
(112, 33, 'admin@admin.com'),
(113, 33, 'admin@admin.com'),
(114, 33, 'admin@admin.com'),
(115, 33, 'admin@admin.com'),
(116, 33, 'admin@admin.com'),
(117, 33, 'admin@admin.com'),
(118, 33, 'admin@admin.com'),
(119, 33, 'admin@admin.com'),
(120, 33, 'admin@admin.com'),
(121, 33, 'admin@admin.com'),
(122, 33, 'admin@admin.com'),
(123, 33, 'admin@admin.com'),
(124, 33, 'admin@admin.com'),
(125, 33, 'admin@admin.com'),
(126, 33, 'admin@admin.com'),
(127, 33, 'admin@admin.com'),
(128, 33, 'admin@admin.com'),
(129, 33, 'admin@admin.com'),
(130, 33, 'admin@admin.com'),
(131, 33, 'admin@admin.com'),
(132, 33, 'admin@admin.com'),
(133, 33, 'admin@admin.com'),
(134, 33, 'admin@admin.com'),
(135, 33, 'admin@admin.com'),
(136, 33, 'admin@admin.com'),
(137, 33, 'admin@admin.com'),
(138, 33, 'admin@admin.com'),
(191, 7, 'test1234@gmail.com'),
(179, 7, 'admin@admin.com'),
(180, 7, 'admin@admin.com'),
(181, 7, 'admin@admin.com'),
(182, 7, 'admin@admin.com'),
(183, 7, 'admin@admin.com'),
(184, 7, 'admin@admin.com'),
(185, 7, 'admin@admin.com'),
(186, 7, 'admin@admin.com'),
(187, 7, 'admin@admin.com');

-- --------------------------------------------------------

--
-- Table structure for table `stories_read`
--

CREATE TABLE `stories_read` (
  `id` int(12) NOT NULL,
  `stories_id` int(12) NOT NULL,
  `email_user` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stories_read`
--

INSERT INTO `stories_read` (`id`, `stories_id`, `email_user`) VALUES
(1, 7, 'test@test.com'),
(2, 11, 'test@test.com'),
(3, 10, 'test@test.com'),
(5, 7, 'jF0vTyhhXxcpkAmXjU11WI6UXcy1@facebook.com'),
(6, 7, 'nurpanca@gmail.com'),
(7, 7, 'nurpanca@gmail.com'),
(8, 7, 'testasd@test.com'),
(9, 26, 'm26413105@alumni.petra.ac.id'),
(10, 27, 'nurpanca@gmail.com'),
(11, 27, 'nurpanca@gmail.com'),
(12, 27, 'nurpanca@gmail.com'),
(13, 7, 'community_hacked@yahoo.com'),
(14, 27, 'community_hacked@yahoo.com'),
(15, 25, 'community_hacked@yahoo.com'),
(16, 7, 'm26413105@alumni.petra.ac.id'),
(17, 7, 'supercoolstatus@gmail.com'),
(18, 27, 'asda3333@gmail.com'),
(19, 7, 'asda3333@gmail.com'),
(20, 7, 'asda3333@gmail.com'),
(21, 7, 'asda3333@gmail.com'),
(22, 33, 'test1234@gmail.com'),
(23, 7, 'test1234@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `stories_settings`
--

CREATE TABLE `stories_settings` (
  `id` int(12) NOT NULL,
  `hot` text NOT NULL,
  `rising` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stories_settings`
--

INSERT INTO `stories_settings` (`id`, `hot`, `rising`) VALUES
(1, '50', '10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(12) NOT NULL,
  `email` text NOT NULL,
  `fullname` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `gender` text NOT NULL,
  `birthday` text NOT NULL,
  `role` text NOT NULL,
  `status` text NOT NULL,
  `android_id` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `fullname`, `username`, `password`, `gender`, `birthday`, `role`, `status`, `android_id`) VALUES
(1, 'test@test.com', 'test', 'test', 'test', 'Laki-laki', '13-1-1997', 'user', '1', '410e10b3d46ced37'),
(2, 'admin@admin.com', 'Administrator', 'admin', '78b05eeef3ed3e78a738ea0143376c67', 'Laki-laki', '14-1-2018', 'admin', '1', '410e10b3d46ced37'),
(4, 'test3@test.com', 'test3', 'tests', 'test', '', '', 'user', '0', '123'),
(6, 'ismihusein14@gmail.com', 'Ismi Huesin', 'ismihusein14@gmail.com', 'b53a666371c9022f9ec539db07022076', '', '', 'user', '1', '7d6d0203c3f5d18f'),
(7, 'jF0vTyhhXxcpkAmXjU11WI6UXcy1@facebook.com', 'Ismi Huseins', 'ismihusein', 'b53a666371c9022f9ec539db07022076', 'Perempuan', '9-1-2018', 'user', '1', '7d6d0203c3f5d18f'),
(8, 'UDzpBKZFPtS4atIJgqKVec34Uiv2@google.com', 'not only laugh', 'UDzpBKZFPtS4atIJgqKVec34Uiv2@google.com', 'b53a666371c9022f9ec539db07022076', '', '', 'user', '1', 'b4229607d82ec190'),
(18, 'supercoolstatus@gmail.com', 'Status Cool', 'supercoolstatus@gmail.com', 'b53a666371c9022f9ec539db07022076', 'Laki-laki', '', 'user', '1', '9cd9beeff1b5b291'),
(17, 'm26413105@alumni.petra.ac.id', 'Billy Hartanto', 'asda', 'b53a666371c9022f9ec539db07022076', 'Laki-laki', '26-1-2018', 'user', '1', 'f6750679ed987f14'),
(10, 'testasd@test.com', 'testasd', 'testasd', 'test', 'Laki-laki', '14-1-2018', 'user', '1', '197179dc13185ff3'),
(11, 'testt@test.com', 'testt', 'testt', 'test', '', '', 'user', '1', '197179dc13185ff3'),
(15, 'nurpanca@gmail.com', 'Dimas nur panca', 'nurpanca', '78b05eeef3ed3e78a738ea0143376c67', 'Perempuan', '15-1-2018', 'admin', '1', '197179dc13185ff3'),
(19, 'community_hacked@yahoo.com', 'Ascan Pardinum', 'community_hacked@yahoo.com', 'qwerty123456789', 'Laki-laki', '15-1-2018', 'user', '1', '197179dc13185ff3'),
(20, 'test@gmail.com', 'Test', 'asdaasda', '81dc9bdb52d04dc20036dbd8313ed055', '', '', 'user', '1', 'f6750679ed987f14'),
(21, 'billychartanto@gmail.com', 'Billy Christi Hartantoa', 'billychartanto@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'Laki-laki', '19-1-2018', 'user', '1', 'f6750679ed987f14'),
(22, 'testtt@test.com', 'testt', 'testtt', '098f6bcd4621d373cade4e832627b4f6', '', '', 'user', '1', '197179dc13185ff3'),
(23, 'asda3333@gmail.com', 'Billy CH', 'asda3333', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'Laki-laki', '25-1-2018', 'user', '1', '84719be992f4395'),
(24, 'test1234@gmail.com', 'Test', 'test1234', '81dc9bdb52d04dc20036dbd8313ed055', '', '', 'user', '1', '84719be992f4395');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stories`
--
ALTER TABLE `stories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stories_comment`
--
ALTER TABLE `stories_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stories_like`
--
ALTER TABLE `stories_like`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stories_read`
--
ALTER TABLE `stories_read`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stories_settings`
--
ALTER TABLE `stories_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stories`
--
ALTER TABLE `stories`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `stories_comment`
--
ALTER TABLE `stories_comment`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `stories_like`
--
ALTER TABLE `stories_like`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;

--
-- AUTO_INCREMENT for table `stories_read`
--
ALTER TABLE `stories_read`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `stories_settings`
--
ALTER TABLE `stories_settings`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

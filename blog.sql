-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2017 at 07:05 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 7.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` text NOT NULL,
  `image` text NOT NULL,
  `start_at` int(11) NOT NULL,
  `end_at` int(11) NOT NULL,
  `page` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `name`, `link`, `image`, `start_at`, `end_at`, `page`, `status`, `created`) VALUES
(1, 'Home Banner', 'https://facebook.com', '906f95745cb93616554aad14f43f1848134dac48_3af6ea62589c83af3304b1d837b644cf42811a25.jpg', 1473890400, 1476309600, '/', 'enabled', 1473717930),
(2, 'Another Ad', 'https://google.com', '6bb061c7980c809f8a94c9768f1e2d576a129288_0f401cbf10f2eb36094391a36fd771e9c0ee311d.jpg', 1475272800, 1475791200, '/', 'enabled', 1475716731);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`, `status`) VALUES
(6, 0, 'Sports', 'enabled'),
(7, 0, 'Politics', 'enabled'),
(8, 0, 'Fashion', 'enabled');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `post_id`, `comment`, `created`, `status`) VALUES
(1, 1, 2, 'fdasfads', 0, ''),
(2, 1, 1, 'fdasfasdfas', 0, ''),
(3, 1, 3, 'fdsafadsfs', 0, ''),
(4, 1, 3, 'fdsfadfsdf', 0, ''),
(5, 1, 10, 'Hello World 2', 1476168503, 'enabled'),
(6, 1, 10, 'Hello World', 1476168540, 'enabled'),
(7, 1, 10, 'Welcome Back', 1476168584, 'enabled'),
(8, 1, 10, 'Hashed ?', 1476168619, 'enabled'),
(9, 1, 9, 'Thanks', 1476168737, 'enabled'),
(10, 1, 9, 'Again', 1476168740, 'enabled');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(96) NOT NULL,
  `phone` varchar(40) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `reply` text NOT NULL,
  `replied_by` int(11) NOT NULL,
  `replied_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `online_users`
--

CREATE TABLE `online_users` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `tags` text NOT NULL,
  `related_posts` text NOT NULL,
  `views` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `user_id`, `title`, `details`, `image`, `tags`, `related_posts`, `views`, `created`, `status`) VALUES
(2, 7, 1, 'One More pOst', '&lt;p&gt;&lt;span class=&quot;marker&quot;&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.&lt;/span&gt;&lt;/p&gt;', 'f4fdc82f69a7b8a08f931c62619f965d976b053d_93949dbd3ec0af923a63e932665a7a2f651769da.jpg', 'one,more,post', '', 0, 1473715692, 'enabled'),
(3, 8, 1, 'Another Post', '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.&lt;/p&gt;\r\n', '130afd6e1cca3b57fb3e1ebbaa5f188aaf509dac_70179df8b93a775a420008f474858d11352f989e.jpg', 'another,post', '', 0, 1473715714, 'enabled'),
(4, 7, 1, 'Economics In The world', '&lt;p&gt;&lt;strong&gt;Lorem Ipsum&lt;/strong&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;\r\n', 'b42efa1a28d7b02036baba9d1b94f37dfc096f3a_e88bbca510ec4a49c8355c005ccc0ea97098fe60.jpg', 'test,post', '', 0, 1475716328, 'enabled'),
(5, 7, 1, 'Some Text', '&lt;p&gt;dfafadsfasd&lt;/p&gt;', '2b6ac153099bcca98d9667c5bc8ed7039cab7872_b40f3b6df62406ff1d2524f4186a39d86eb6910c.jpg', 'fdsaf', '', 0, 1476166134, 'enabled'),
(6, 7, 1, 'Some Text 2', '&lt;p&gt;Some Text 2&lt;/p&gt;', 'f4521f164c752ac2e57821d949124f0d5035e325_efef6d0c9738c065d5dbd0d3809ef38a93012bfd.jpg', 'text', '3', 0, 1476166139, 'enabled'),
(7, 7, 1, 'Some Text 3', '&lt;p&gt;dfafadsfasd&lt;/p&gt;', '6925d9ea6c9e72474483f5839ee92ec3da2040de_9c82a446d4a751514764cca2df7fb8ae78e4fea1.jpg', 'fdsaf', '', 0, 1476166196, 'enabled'),
(8, 7, 1, 'Some Text 4', '&lt;p&gt;dfafadsfasd&lt;/p&gt;', '2c6243d90845c1380f7da9196298287bac19b584_e79099c86a91b96a77aa57eb1998b2739f35bcab.jpg', 'fdsaf', '', 0, 1476166207, 'enabled'),
(9, 7, 1, 'Some Text 5', '&lt;p&gt;Some Text 5&lt;/p&gt;', '96e6b118fd699d09f1522acb9dbc13ee7f53724a_70b963602fd29119694aa36597786f099ea16cd3.jpg', 'Text', '2,3', 0, 1476166294, 'enabled'),
(10, 7, 1, 'Some Text 6', '&lt;p&gt;Some Text 6&lt;/p&gt;', '81359b55cc908f6baa302d32eb1a97f17cf1c342_6ad99fbd5bc25acf59bce8f0a931dc45ebdcf609.jpg', 'text', '2,4', 0, 1476166574, 'enabled');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `key` varchar(100) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`) VALUES
(9, 'site_name', 'My Blog'),
(10, 'site_email', 'admin@my-blog.com'),
(11, 'site_status', 'enabled'),
(12, 'site_close_msg', '&lt;p&gt;&lt;strong&gt;&lt;span style=&quot;font-size:48px&quot;&gt;Site Now Is IN Maintainance Mode&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `users_group_id` int(11) NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `email` varchar(96) NOT NULL,
  `password` varchar(128) NOT NULL,
  `image` varchar(255) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `birthday` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `ip` varchar(32) NOT NULL,
  `code` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `users_group_id`, `first_name`, `last_name`, `email`, `password`, `image`, `gender`, `birthday`, `created`, `status`, `ip`, `code`) VALUES
(1, 1, 'Hasan ', 'Zohdy', 'hassanzohdy@gmail.com', '$2y$10$JnSQbKd.JyrMSNYZHWkqDOhcd3VTjuELk52IF/t2CONLSoJtjpAi.', 'c4bd7a6e842483b277a22f7175c8b69490876ce5_e8ee24a5858796f7ca979c72267b0658c2bb8be1.jpg', 'male', 0, 1471429381, 'enabled', '', '80a315d99d01b28e68e58c0c899bc4ce2197c524'),
(3, 2, 'Sarah', 'Jones', 'sara.jones@gmail.com', '$2y$10$YdlnwLhLP1/sg38F.RjpcubwRbqRE/5v1K8aLELqWcp/D0zjYk.Gy', 'ef4dd936d76ed742c0af912a34505f9f070a2dcb_2216ac8affab7a5c6a8150aa2e23a1c8a31d64e9.jpg', 'female', 0, 1476162152, 'enabled', '::1', '330c3cbdcc4bc8c24820950a50a33a3575e00193'),
(4, 2, 'Adam', 'Nour', 'adam.nour@gmail.com', '$2y$10$VTU1/VN31wbaAFs0ZVGbzetg4l3IYksNknmennsebnD5n1PcLjvwS', '4c7a5571172451c6aa3afeb7053345357ea82128_95b2bde3633df52e5123c8b3dc2864d887a9606e.jpg', 'male', 0, 1476162328, '', '::1', '6a999d69ccd2ef97d9391242428284ca58594320');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `name`) VALUES
(1, 'Super Administrators'),
(2, 'Users');

-- --------------------------------------------------------

--
-- Table structure for table `users_group_permissions`
--

CREATE TABLE `users_group_permissions` (
  `id` int(11) NOT NULL,
  `users_group_id` int(11) NOT NULL,
  `page` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_group_permissions`
--

INSERT INTO `users_group_permissions` (`id`, `users_group_id`, `page`) VALUES
(46, 2, '/admin/login'),
(47, 2, '/admin/login/submit'),
(48, 0, '/admin/login'),
(49, 0, '/admin/login/submit'),
(50, 0, '/admin'),
(51, 0, '/admin/dashboard'),
(52, 0, '/admin/submit'),
(53, 0, '/admin/users'),
(54, 0, '/admin/users/add'),
(55, 0, '/admin/users/submit'),
(56, 0, '/admin/users/edit/:id'),
(57, 0, '/admin/users/save/:id'),
(58, 0, '/admin/users/delete/:id'),
(59, 0, '/admin/profile/update'),
(60, 0, '/admin/users-groups'),
(61, 0, '/admin/users-groups/add'),
(62, 0, '/admin/users-groups/submit'),
(63, 0, '/admin/users-groups/edit/:id'),
(64, 0, '/admin/users-groups/save/:id'),
(65, 0, '/admin/users-groups/delete/:id'),
(66, 0, '/admin/posts'),
(67, 0, '/admin/posts/add'),
(68, 0, '/admin/posts/submit'),
(69, 0, '/admin/posts/edit/:id'),
(70, 0, '/admin/posts/save/:id'),
(71, 0, '/admin/posts/delete/:id'),
(72, 0, '/admin/posts/:id/comments'),
(73, 0, '/admin/comments/edit/:id'),
(74, 0, '/admin/comments/save/:id'),
(75, 0, '/admin/comments/delete/:id'),
(76, 0, '/admin/categories'),
(77, 0, '/admin/categories/add'),
(78, 0, '/admin/categories/submit'),
(79, 0, '/admin/categories/edit/:id'),
(80, 0, '/admin/categories/save/:id'),
(81, 0, '/admin/categories/delete/:id'),
(82, 0, '/admin/settings'),
(83, 0, '/admin/settings/save'),
(84, 0, '/admin/contacts'),
(85, 0, '/admin/contacts/reply/:id'),
(86, 0, '/admin/contacts/send/:id'),
(87, 0, '/admin/ads'),
(88, 0, '/admin/ads/add'),
(89, 0, '/admin/ads/submit'),
(90, 0, '/admin/ads/edit/:id'),
(91, 0, '/admin/ads/save/:id'),
(92, 0, '/admin/ads/delete/:id'),
(93, 0, '/admin/logout'),
(94, 0, '/admin/login'),
(95, 0, '/admin/login/submit'),
(96, 0, '/admin'),
(97, 0, '/admin/dashboard'),
(98, 0, '/admin/submit'),
(99, 0, '/admin/users'),
(100, 0, '/admin/users/add'),
(101, 0, '/admin/users/submit'),
(102, 0, '/admin/users/edit/:id'),
(103, 0, '/admin/users/save/:id'),
(104, 0, '/admin/users/delete/:id'),
(105, 0, '/admin/profile/update'),
(106, 0, '/admin/users-groups'),
(107, 0, '/admin/users-groups/add'),
(108, 0, '/admin/users-groups/submit'),
(109, 0, '/admin/users-groups/edit/:id'),
(110, 0, '/admin/users-groups/save/:id'),
(111, 0, '/admin/users-groups/delete/:id'),
(112, 0, '/admin/posts'),
(113, 0, '/admin/posts/add'),
(114, 0, '/admin/posts/submit'),
(115, 0, '/admin/posts/edit/:id'),
(116, 0, '/admin/posts/save/:id'),
(117, 0, '/admin/posts/delete/:id'),
(118, 0, '/admin/posts/:id/comments'),
(119, 0, '/admin/comments/edit/:id'),
(120, 0, '/admin/comments/save/:id'),
(121, 0, '/admin/comments/delete/:id'),
(122, 0, '/admin/categories'),
(123, 0, '/admin/categories/add'),
(124, 0, '/admin/categories/submit'),
(125, 0, '/admin/categories/edit/:id'),
(126, 0, '/admin/categories/save/:id'),
(127, 0, '/admin/categories/delete/:id'),
(128, 0, '/admin/settings'),
(129, 0, '/admin/settings/save'),
(130, 0, '/admin/contacts'),
(131, 0, '/admin/contacts/reply/:id'),
(132, 0, '/admin/contacts/send/:id'),
(133, 0, '/admin/ads'),
(134, 0, '/admin/ads/add'),
(135, 0, '/admin/ads/submit'),
(136, 0, '/admin/ads/edit/:id'),
(137, 0, '/admin/ads/save/:id'),
(138, 0, '/admin/ads/delete/:id'),
(139, 0, '/admin/logout'),
(140, 1, '/admin/login'),
(141, 1, '/admin/login/submit'),
(142, 1, '/admin'),
(143, 1, '/admin/dashboard'),
(144, 1, '/admin/submit'),
(145, 1, '/admin/users'),
(146, 1, '/admin/users/add'),
(147, 1, '/admin/users/submit'),
(148, 1, '/admin/users/edit/:id'),
(149, 1, '/admin/users/save/:id'),
(150, 1, '/admin/users/delete/:id'),
(151, 1, '/admin/profile/update'),
(152, 1, '/admin/users-groups'),
(153, 1, '/admin/users-groups/add'),
(154, 1, '/admin/users-groups/submit'),
(155, 1, '/admin/users-groups/edit/:id'),
(156, 1, '/admin/users-groups/save/:id'),
(157, 1, '/admin/users-groups/delete/:id'),
(158, 1, '/admin/posts'),
(159, 1, '/admin/posts/add'),
(160, 1, '/admin/posts/submit'),
(161, 1, '/admin/posts/edit/:id'),
(162, 1, '/admin/posts/save/:id'),
(163, 1, '/admin/posts/delete/:id'),
(164, 1, '/admin/posts/:id/comments'),
(165, 1, '/admin/comments/edit/:id'),
(166, 1, '/admin/comments/save/:id'),
(167, 1, '/admin/comments/delete/:id'),
(168, 1, '/admin/categories'),
(169, 1, '/admin/categories/add'),
(170, 1, '/admin/categories/submit'),
(171, 1, '/admin/categories/edit/:id'),
(172, 1, '/admin/categories/save/:id'),
(173, 1, '/admin/categories/delete/:id'),
(174, 1, '/admin/settings'),
(175, 1, '/admin/settings/save'),
(176, 1, '/admin/contacts'),
(177, 1, '/admin/contacts/reply/:id'),
(178, 1, '/admin/contacts/send/:id'),
(179, 1, '/admin/ads'),
(180, 1, '/admin/ads/add'),
(181, 1, '/admin/ads/submit'),
(182, 1, '/admin/ads/edit/:id'),
(183, 1, '/admin/ads/save/:id'),
(184, 1, '/admin/ads/delete/:id'),
(185, 1, '/admin/logout');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `online_users`
--
ALTER TABLE `online_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_group_permissions`
--
ALTER TABLE `users_group_permissions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `online_users`
--
ALTER TABLE `online_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users_group_permissions`
--
ALTER TABLE `users_group_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

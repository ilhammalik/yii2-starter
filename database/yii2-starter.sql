-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 13 Des 2015 pada 07.31
-- Versi Server: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bbm`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_assignment`
--

CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '1', 1447560678);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_item`
--

CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('/mimin/role/*', 2, NULL, NULL, NULL, 1447560761, 1447560761),
('/mimin/role/create', 2, NULL, NULL, NULL, 1447560756, 1447560756),
('/mimin/role/delete', 2, NULL, NULL, NULL, 1447560754, 1447560754),
('/mimin/role/index', 2, NULL, NULL, NULL, 1447560713, 1447560713),
('/mimin/role/permission', 2, NULL, NULL, NULL, 1447560752, 1447560752),
('/mimin/role/update', 2, NULL, NULL, NULL, 1447560749, 1447560749),
('/mimin/role/view', 2, NULL, NULL, NULL, 1447560750, 1447560750),
('/mimin/route/*', 2, NULL, NULL, NULL, 1447560759, 1447560759),
('/mimin/route/create', 2, NULL, NULL, NULL, 1447560757, 1447560757),
('/mimin/route/delete', 2, NULL, NULL, NULL, 1447560755, 1447560755),
('/mimin/route/generate', 2, NULL, NULL, NULL, 1447560741, 1447560741),
('/mimin/route/index', 2, NULL, NULL, NULL, 1447560714, 1447560714),
('/mimin/route/update', 2, NULL, NULL, NULL, 1447560747, 1447560747),
('/mimin/route/view', 2, NULL, NULL, NULL, 1447560751, 1447560751),
('/mimin/user/delete', 2, NULL, NULL, NULL, 1447560740, 1447560740),
('/mimin/user/index', 2, NULL, NULL, NULL, 1447560710, 1447560710),
('/mimin/user/update', 2, NULL, NULL, NULL, 1447901175, 1447901175),
('/mimin/user/view', 2, NULL, NULL, NULL, 1447560746, 1447560746),
('/post/*', 2, NULL, NULL, NULL, 1449981755, 1449981755),
('/post/create', 2, NULL, NULL, NULL, 1447586870, 1447586870),
('/post/delete', 2, NULL, NULL, NULL, 1449981754, 1449981754),
('/post/index', 2, NULL, NULL, NULL, 1447586863, 1447586863),
('/post/update', 2, NULL, NULL, NULL, 1449981752, 1449981752),
('/post/view', 2, NULL, NULL, NULL, 1447560745, 1447560745),
('/site/*', 2, NULL, NULL, NULL, 1447560625, 1447560625),
('/site/error', 2, NULL, NULL, NULL, 1447560624, 1447560624),
('/site/index', 2, NULL, NULL, NULL, 1447560603, 1447560603),
('/site/login', 2, NULL, NULL, NULL, 1447560626, 1447560626),
('/site/logout', 2, NULL, NULL, NULL, 1447560627, 1447560627),
('/site/reset', 2, NULL, NULL, NULL, 1447560629, 1447560629),
('admin', 1, NULL, NULL, NULL, 1447560598, 1447560598);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_item_child`
--

CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('admin', '/mimin/role/*'),
('admin', '/mimin/role/create'),
('admin', '/mimin/role/delete'),
('admin', '/mimin/role/index'),
('admin', '/mimin/role/permission'),
('admin', '/mimin/role/update'),
('admin', '/mimin/role/view'),
('admin', '/mimin/route/*'),
('admin', '/mimin/route/create'),
('admin', '/mimin/route/delete'),
('admin', '/mimin/route/generate'),
('admin', '/mimin/route/index'),
('admin', '/mimin/route/update'),
('admin', '/mimin/route/view'),
('admin', '/mimin/user/delete'),
('admin', '/mimin/user/index'),
('admin', '/mimin/user/update'),
('admin', '/mimin/user/view'),
('admin', '/post/*'),
('admin', '/post/create'),
('admin', '/post/delete'),
('admin', '/post/index'),
('admin', '/post/update'),
('admin', '/post/view'),
('admin', '/site/*'),
('admin', '/site/error'),
('admin', '/site/index'),
('admin', '/site/login'),
('admin', '/site/logout'),
('admin', '/site/reset');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_rule`
--

CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `route`
--

CREATE TABLE IF NOT EXISTS `route` (
  `name` varchar(64) NOT NULL,
  `alias` varchar(64) NOT NULL,
  `type` varchar(64) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `route`
--

INSERT INTO `route` (`name`, `alias`, `type`, `status`) VALUES
('/*', '*', '', 1),
('/category/*', '*', 'category', 1),
('/category/create', 'create', 'category', 1),
('/category/delete', 'delete', 'category', 1),
('/category/index', 'index', 'category', 1),
('/category/update', 'update', 'category', 1),
('/category/view', 'view', 'category', 1),
('/comment/*', '*', 'comment', 1),
('/comment/create', 'create', 'comment', 1),
('/comment/delete', 'delete', 'comment', 1),
('/comment/index', 'index', 'comment', 1),
('/comment/update', 'update', 'comment', 1),
('/comment/view', 'view', 'comment', 1),
('/debug/*', '*', 'debug', 1),
('/debug/default/*', '*', 'debug/default', 1),
('/debug/default/db-explain', 'db-explain', 'debug/default', 1),
('/debug/default/download-mail', 'download-mail', 'debug/default', 1),
('/debug/default/index', 'index', 'debug/default', 1),
('/debug/default/toolbar', 'toolbar', 'debug/default', 1),
('/debug/default/view', 'view', 'debug/default', 1),
('/gii/*', '*', 'gii', 1),
('/gii/default/*', '*', 'gii/default', 1),
('/gii/default/action', 'action', 'gii/default', 1),
('/gii/default/diff', 'diff', 'gii/default', 1),
('/gii/default/index', 'index', 'gii/default', 1),
('/gii/default/preview', 'preview', 'gii/default', 1),
('/gii/default/view', 'view', 'gii/default', 1),
('/mimin/*', '*', 'mimin', 1),
('/mimin/role/*', '*', 'mimin/role', 1),
('/mimin/role/create', 'create', 'mimin/role', 1),
('/mimin/role/delete', 'delete', 'mimin/role', 1),
('/mimin/role/index', 'index', 'mimin/role', 1),
('/mimin/role/permission', 'permission', 'mimin/role', 1),
('/mimin/role/update', 'update', 'mimin/role', 1),
('/mimin/role/view', 'view', 'mimin/role', 1),
('/mimin/route/*', '*', 'mimin/route', 1),
('/mimin/route/create', 'create', 'mimin/route', 1),
('/mimin/route/delete', 'delete', 'mimin/route', 1),
('/mimin/route/generate', 'generate', 'mimin/route', 1),
('/mimin/route/index', 'index', 'mimin/route', 1),
('/mimin/route/update', 'update', 'mimin/route', 1),
('/mimin/route/view', 'view', 'mimin/route', 1),
('/mimin/user/*', '*', 'mimin/user', 1),
('/mimin/user/create', 'create', 'mimin/user', 1),
('/mimin/user/delete', 'delete', 'mimin/user', 1),
('/mimin/user/index', 'index', 'mimin/user', 1),
('/mimin/user/update', 'update', 'mimin/user', 1),
('/mimin/user/view', 'view', 'mimin/user', 1),
('/post/*', '*', 'post', 1),
('/post/create', 'create', 'post', 1),
('/post/delete', 'delete', 'post', 1),
('/post/index', 'index', 'post', 1),
('/post/update', 'update', 'post', 1),
('/post/view', 'view', 'post', 1),
('/site/*', '*', 'site', 1),
('/site/error', 'error', 'site', 1),
('/site/index', 'index', 'site', 1),
('/site/login', 'login', 'site', 1),
('/site/logout', 'logout', 'site', 1),
('/site/reset', 'reset', 'site', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting`
--

CREATE TABLE IF NOT EXISTS `setting` (
  `setting_id` int(11) NOT NULL,
  `sidebar_color` varchar(255) NOT NULL,
  `brand_title` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `footer_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'q9vPvOMvXsSn1z5nf8yfQO_xivjswA-H', '$2y$13$HfvZiTcfD8YJ6tLcHNCDiuetMViJYEMFSU8KBRU/z7s/ISMJ2wtLm', NULL, 'admin@mail.com', 10, 1445874227, 1447901204),
(2, 'ilham', 'tkT4_BK4aDr65H3D8vMNv-8Wlc0Ien7w', '$2y$13$HfvZiTcfD8YJ6tLcHNCDiuetMViJYEMFSU8KBRU/z7s/ISMJ2wtLm', NULL, 'ilham@mail.com', 10, 1445957268, 1445957268),
(3, 'jojon', '', '$2y$13$S17zmQAS2vK8KuA5o4XNZ.j9FN.z5FDFkbrIly//tUT1n7cCbKRFK', NULL, 'jojon@mail.com', 10, 1446302393, 1446302393),
(4, 'jo', 'K9M5p2lpZBlIQmVHwgz8fY2cD8bxD9im', '$2y$13$c5D6sVX0aWYuYX.vArED..tR09jvklEWQMEOeoBiSfc9RrlN.nwjW', NULL, 'jo@mail.com', 10, 1447559697, 1447559697);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

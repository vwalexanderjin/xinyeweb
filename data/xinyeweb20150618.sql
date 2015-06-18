-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2015-06-18 18:23:31
-- 服务器版本： 5.5.28
-- PHP Version: 5.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `xinyeweb`
--

-- --------------------------------------------------------

--
-- 表的结构 `xy_ad`
--

CREATE TABLE IF NOT EXISTS `xy_ad` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `mark` varchar(255) NOT NULL,
  `href` varchar(200) NOT NULL DEFAULT '#',
  `img` varchar(255) NOT NULL,
  `position` tinyint(10) unsigned NOT NULL DEFAULT '1',
  `ctime` int(10) unsigned NOT NULL,
  `utime` int(10) unsigned NOT NULL,
  `status` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `cid` int(11) NOT NULL DEFAULT '0',
  `sort` int(100) NOT NULL DEFAULT '100',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='广告表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `xy_album`
--

CREATE TABLE IF NOT EXISTS `xy_album` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `album_cid` int(11) NOT NULL,
  `img` varchar(120) NOT NULL,
  `description` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='相册表' AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `xy_album`
--

INSERT INTO `xy_album` (`id`, `album_cid`, `img`, `description`) VALUES
(1, 0, './uploads/album/album_14346224688226.png', ''),
(2, 0, 'album_14346225144542.png', ''),
(3, 0, 'album_14346225623953.png', ''),
(4, 1, 'album_14346226591635.png', ''),
(5, 1, 'album_14346228726792.png', ''),
(6, 1, 'album_14346228784671.png', ''),
(7, 1, 'album_14346229727909.png', '');

-- --------------------------------------------------------

--
-- 表的结构 `xy_album_cate`
--

CREATE TABLE IF NOT EXISTS `xy_album_cate` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(50) NOT NULL,
  `description` varchar(225) NOT NULL,
  `ctime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='相册分类表' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `xy_album_cate`
--

INSERT INTO `xy_album_cate` (`id`, `name`, `description`, `ctime`) VALUES
(1, '2015毕业照', '2015xxxx大学xxx年xxxx班毕业照', 2147483647);

-- --------------------------------------------------------

--
-- 表的结构 `xy_auth_assignment`
--

CREATE TABLE IF NOT EXISTS `xy_auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `xy_auth_assignment`
--

INSERT INTO `xy_auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('管理员', '1', 1429712690);

-- --------------------------------------------------------

--
-- 表的结构 `xy_auth_item`
--

CREATE TABLE IF NOT EXISTS `xy_auth_item` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `xy_auth_item`
--

INSERT INTO `xy_auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('visitAdmin', 2, '管理员基本权限', NULL, NULL, 1434513978, 1434513978),
('管理员', 1, '权限级别1', NULL, NULL, 1428417729, 1434514000);

-- --------------------------------------------------------

--
-- 表的结构 `xy_auth_item_child`
--

CREATE TABLE IF NOT EXISTS `xy_auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `xy_auth_item_child`
--

INSERT INTO `xy_auth_item_child` (`parent`, `child`) VALUES
('管理员', 'visitAdmin');

-- --------------------------------------------------------

--
-- 表的结构 `xy_auth_rule`
--

CREATE TABLE IF NOT EXISTS `xy_auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `xy_category`
--

CREATE TABLE IF NOT EXISTS `xy_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rote` char(30) NOT NULL COMMENT '站内路由',
  `type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1显示， 0隐藏',
  `pid` int(11) NOT NULL DEFAULT '0',
  `name` char(50) NOT NULL,
  `description` varchar(128) NOT NULL,
  `module` char(50) NOT NULL,
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT '外链有则跳转',
  `order` int(11) NOT NULL DEFAULT '100' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `xy_category`
--

INSERT INTO `xy_category` (`id`, `rote`, `type`, `pid`, `name`, `description`, `module`, `url`, `order`) VALUES
(1, '11123', 1, 0, '123123', '312312', '3123123', '1231', 100),
(2, '11', 1, 1, '12312', '323', '123', '123', 100);

-- --------------------------------------------------------

--
-- 表的结构 `xy_comment`
--

CREATE TABLE IF NOT EXISTS `xy_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL COMMENT '文章id',
  `uid` int(11) NOT NULL DEFAULT '0' COMMENT '用户id',
  `pid` int(11) NOT NULL COMMENT '上级id',
  `con` text NOT NULL,
  `ctime` int(11) NOT NULL,
  `utime` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1通过 0 未通过',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='评论表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `xy_config`
--

CREATE TABLE IF NOT EXISTS `xy_config` (
  `key` char(50) NOT NULL,
  `val` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='配置表';

--
-- 转存表中的数据 `xy_config`
--

INSERT INTO `xy_config` (`key`, `val`) VALUES
('sys_site_name', ''),
('sys_site_description', ''),
('sys_site_keywords', ''),
('sys_site_url', ''),
('sys_site_email', ''),
('sys_allow_register', ''),
('sys_default_role', ''),
('sys_utc', ''),
('sys_date_format', ''),
('sys_date_format_custom', ''),
('sys_time_format', ''),
('sys_time_format_custom', ''),
('sys_lang', ''),
('sys_icp', ''),
('sys_stat', ''),
('sys_site_theme', '');

-- --------------------------------------------------------

--
-- 表的结构 `xy_link`
--

CREATE TABLE IF NOT EXISTS `xy_link` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` char(80) NOT NULL DEFAULT '',
  `logo` varchar(125) NOT NULL DEFAULT '',
  `href` varchar(200) NOT NULL DEFAULT '#',
  `ctime` int(11) NOT NULL,
  `utime` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1显示， 0隐藏',
  `type` int(11) NOT NULL DEFAULT '1' COMMENT '1图片， 0文字',
  `cid` int(11) NOT NULL DEFAULT '0' COMMENT 'link类别',
  `order` int(11) NOT NULL DEFAULT '100',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `xy_page`
--

CREATE TABLE IF NOT EXISTS `xy_page` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` int(11) NOT NULL,
  `keywords` varchar(80) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='单页表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `xy_post`
--

CREATE TABLE IF NOT EXISTS `xy_post` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `title_second` varchar(128) NOT NULL,
  `redirect_url` varchar(128) NOT NULL,
  `thumb` varchar(200) NOT NULL,
  `from` varchar(50) NOT NULL,
  `seo_title` varchar(80) NOT NULL,
  `seo_keywords` varchar(80) NOT NULL,
  `seo_description` varchar(80) NOT NULL,
  `template` char(30) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `ishot` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1,推荐   0,正常',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '1,发布,   0存档',
  `info` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `ctime` int(10) unsigned NOT NULL,
  `utime` int(10) unsigned NOT NULL,
  `type` char(10) NOT NULL DEFAULT 'post' COMMENT 'type: post case ...',
  `cid` int(10) unsigned NOT NULL DEFAULT '1' COMMENT '分类id',
  `uid` int(10) unsigned NOT NULL DEFAULT '1' COMMENT '作者id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `xy_user`
--

CREATE TABLE IF NOT EXISTS `xy_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `password` char(32) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `role` smallint(6) NOT NULL DEFAULT '10',
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `xy_user`
--

INSERT INTO `xy_user` (`id`, `username`, `auth_key`, `password`, `password_hash`, `password_reset_token`, `email`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'adminauthkey', '21232f297a57a5a743894a0e4a801fc3', 'adminauthkey', 'adminauthkey', '', 10, 10, 0, 0);

--
-- 限制导出的表
--

--
-- 限制表 `xy_auth_assignment`
--
ALTER TABLE `xy_auth_assignment`
  ADD CONSTRAINT `xy_auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `xy_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `xy_auth_item`
--
ALTER TABLE `xy_auth_item`
  ADD CONSTRAINT `xy_auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `xy_auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- 限制表 `xy_auth_item_child`
--
ALTER TABLE `xy_auth_item_child`
  ADD CONSTRAINT `xy_auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `xy_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `xy_auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `xy_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

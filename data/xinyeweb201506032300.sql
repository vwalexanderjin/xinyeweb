-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2015-06-03 23:20:29
-- 服务器版本： 5.5.41-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.7

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
  `href` varchar(200) NOT NULL DEFAULT '#',
  `content` varchar(255) NOT NULL,
  `position` tinyint(10) unsigned NOT NULL DEFAULT '1',
  `ctime` int(10) unsigned NOT NULL,
  `utime` int(10) unsigned NOT NULL,
  `status` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `cid` int(11) NOT NULL,
  `sort` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='广告表' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `xy_ad`
--

INSERT INTO `xy_ad` (`id`, `title`, `href`, `content`, `position`, `ctime`, `utime`, `status`, `cid`, `sort`) VALUES
(1, '', '#', 'img_14316721247341.png', 1, 0, 0, 1, 0, 0);

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
('新闻阅读', '1', 1429373640),
('管理员', '1', 1429712690),
('读者', '1', 1429373478);

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
('aaa', 2, 'cc', NULL, NULL, 1429372842, 1429372842),
('createPost', 2, '发布文章a', NULL, NULL, 1428417797, 1428755414),
('createPoto', 2, 'createPoto', NULL, NULL, 1428419690, 1428419690),
('deletePost', 2, '删除文章', NULL, NULL, 1428417827, 1428417827),
('hitPost', 2, '点击文章', NULL, NULL, 1428417857, 1428417857),
('viewPost', 2, '查看文章', NULL, NULL, 1428417810, 1428418970),
('xxxx', 1, 'xxxx', NULL, NULL, 1432046787, 1433254687),
('新闻编辑', 1, '新闻编辑', NULL, NULL, 1428418273, 1428469579),
('新闻阅读', 1, '新闻阅读', NULL, NULL, 1428418311, 1428418325),
('游客', 1, '权限级别4', NULL, NULL, 1428417771, 1432046635),
('管理员', 1, '权限级别1', NULL, NULL, 1428417729, 1433005786),
('编辑', 1, '权限级别2', NULL, NULL, 1428417744, 1428417941),
('读者', 1, '权限级别3', NULL, NULL, 1428417758, 1428418492);

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
('xxxx', 'createPost'),
('新闻编辑', 'createPost'),
('游客', 'createPost'),
('管理员', 'createPost'),
('编辑', 'createPost'),
('读者', 'createPost'),
('xxxx', 'createPoto'),
('新闻编辑', 'createPoto'),
('游客', 'createPoto'),
('新闻编辑', 'deletePost'),
('管理员', 'deletePost'),
('读者', 'deletePost'),
('新闻编辑', 'hitPost'),
('新闻阅读', 'hitPost'),
('管理员', 'hitPost'),
('编辑', 'hitPost'),
('读者', 'hitPost'),
('新闻编辑', 'viewPost'),
('新闻阅读', 'viewPost'),
('管理员', 'viewPost'),
('编辑', 'viewPost'),
('读者', 'viewPost');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `xy_category`
--

INSERT INTO `xy_category` (`id`, `rote`, `type`, `pid`, `name`, `description`, `module`, `url`, `order`) VALUES
(1, '', 0, 0, '国际新闻', '国际新闻描述', 'news', '#', 100),
(2, '', 0, 0, '国内新闻', '国内新闻描述', 'news', '#', 100),
(3, 'post/post/index', 1, 7, '英国新闻', '111', 'new', '', 100),
(4, '', 1, 0, '周边新闻', 'zhoubian', 'news', '', 100),
(5, '', 1, 1, '德国新闻', '123', '123', '123', 100),
(6, '', 1, 1, '法国新闻', '123', '123', '123', 100),
(7, '', 1, 5, 'xx小文', '123', '231', '12', 100);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `xy_link`
--

INSERT INTO `xy_link` (`id`, `title`, `logo`, `href`, `ctime`, `utime`, `status`, `type`, `cid`, `order`) VALUES
(1, 'biaoti', '', '#', 123, 123123123, 1, 1, 1, 1),
(2, '新的标题', 'logo.png', '#', 1433296829, 1433296829, 1, 1, 0, 100);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `xy_post`
--

INSERT INTO `xy_post` (`id`, `title`, `title_second`, `redirect_url`, `thumb`, `from`, `seo_title`, `seo_keywords`, `seo_description`, `template`, `tags`, `ishot`, `status`, `info`, `content`, `ctime`, `utime`, `type`, `cid`, `uid`) VALUES
(1, '公司简介', '副标题', '#', '123.jpg', 'form', 'seo title', 'seo keywords', 'SEOdescription', 'template', 'Tags', 1, 1, '摘要', '<figure><img src="/web/ueditor/php/upload/69821431670841.png" alt=""/></figure><p><br/></p><p><span style="font-size: 18px;">鑫烨是总部位于中国珠海的一家现代网络产品和设计公司。凭借多年的行业经验，组成了被客户认可，并且对互联网有着强烈激情的团队。我们所有的项目都按照行业标准来完成。</span></p><p><br/></p><p><span style="font-size: 18px;">我们的经验和工作方法确保我们的网站设计，开发和优化超越客户的期望值。在国内，我们所有的工作都由我们自己来完成，绝不外包。这意味着您可以始终与我们保持联络，并且为您的项目提供有效的维护与更新。</span></p><p><br/></p><p><span style="font-size: 18px;">我们坚信，与我们客户保持持久的关系，最重要的是“诚信”。</span></p><p><br/></p><p><span style="font-size: 18px;">我们不会一直用专业术语去向你的思维进行轰炸。我们会用您能理解的日常语言引导您了解工作中的每一步。从最初接手您的项目，到最后项目上线。</span></p><p><span style="font-size: 18px;">\r\n		有提到我们真的是一群很棒的家伙吗？请联系我们吧</span></p><p><br/></p><figure><img src="http://xinyeweb.com/assets/index/images/pic-5.png" alt=""/></figure><p><br/></p><p><br/></p><br/><p><br/></p><p><br/></p>', 0, 1433258138, 'post', 1, 1),
(2, '11231231', '23123131', '2312222', '1231', '123', '123', '123', '123', '123', '123', 1, 1, '123', '123', 1433082491, 1433293226, '123', 1, 123);

-- --------------------------------------------------------

--
-- 表的结构 `xy_user`
--

CREATE TABLE IF NOT EXISTS `xy_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
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

INSERT INTO `xy_user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'adminauthkey', 'adminauthkey', 'adminauthkey', '', 10, 10, 0, 0);

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

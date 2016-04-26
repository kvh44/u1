-- phpMyAdmin SQL Dump
-- version 3.3.9.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2011 年 06 月 13 日 18:22
-- 服务器版本: 5.5.9
-- PHP 版本: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `uto`
--

-- --------------------------------------------------------

--
-- 表的结构 `utoconsult_article_category1`
--

CREATE TABLE IF NOT EXISTS `utoconsult_article_category1` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `keywords` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `utoconsult_article_category1`
--

INSERT INTO `utoconsult_article_category1` (`id`, `name`, `keywords`, `created_at`, `updated_at`) VALUES
(1, '工程设计', '工程设计', '2011-06-12 15:10:53', '2011-06-13 08:42:08'),
(2, '工艺设计', '工艺设计', '2011-06-12 15:11:00', '2011-06-13 08:42:43'),
(3, '项目管理', '项目管理', '2011-06-13 08:43:06', '2011-06-13 08:43:06'),
(4, '工程材料', '工程材料', '2011-06-13 18:02:11', '2011-06-13 18:02:11'),
(5, '相关设备', '相关设备', '2011-06-13 18:02:20', '2011-06-13 18:02:20'),
(6, '规范标准', '规范标准', '2011-06-13 18:02:29', '2011-06-13 18:02:29'),
(7, '专业术语', '专业术语', '2011-06-13 18:02:38', '2011-06-13 18:02:38'),
(8, '互提信息', '互提信息', '2011-06-13 18:02:46', '2011-06-13 18:02:46');

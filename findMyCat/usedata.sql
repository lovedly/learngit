-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016 年 10 月 12 日 09:01
-- 服务器版本: 5.5.20
-- PHP 版本: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `test`
--

-- --------------------------------------------------------

--
-- 表的结构 `usedata`
--

CREATE TABLE IF NOT EXISTS `usedata` (
  `name` varchar(60) NOT NULL,
  `whenithappened` varchar(30) NOT NULL,
  `howlong` varchar(30) NOT NULL,
  `description` varchar(100) NOT NULL,
  `mycat` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `other` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `usedata`
--

INSERT INTO `usedata` (`name`, `whenithappened`, `howlong`, `description`, `mycat`, `email`, `other`) VALUES
('胡', '昨天', '24小时', '遇到', '是', '12345@qq.com', '无'),
('大大232', '昨天', '地方地方', '额额外', '是', '122345@qq.com', '的丰富的'),
('大大232', '昨天', '地方地方', '额额外', '是', '122345@qq.com', '的丰富的'),
('大大232', '昨天发的', '地方地方', '额额外', '是', '122345@qq.com', '的丰富的'),
('地方', '是滴是滴', '丰东股份', '盛大阿萨德', '否', '的发的发的', '发的丰富的热尔'),
('张三', '一个月前', '24小时', '很多猫和狗', '否', '1223456789@qq.com', '看到很多猫和狗一起陪一个人在玩');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

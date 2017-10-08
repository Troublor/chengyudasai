-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2017-05-14 02:39:10
-- 服务器版本： 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chengyu`
--

-- --------------------------------------------------------

--
-- 表的结构 `sum`
--

CREATE TABLE `sum` (
  `id` int(11) UNSIGNED NOT NULL COMMENT '队伍标识',
  `name` varchar(50) DEFAULT '没有名称' COMMENT '队伍名称',
  `number` int(11) DEFAULT '3' COMMENT '队伍人数',
  `college` varchar(50) DEFAULT '没有学院' COMMENT '学院',
  `part1` int(11) DEFAULT '0' COMMENT '第一关分数',
  `part2` int(11) DEFAULT '0' COMMENT '第二关分数',
  `extrapart` int(11) DEFAULT '0',
  `part3` int(11) DEFAULT '0' COMMENT '第三关分数',
  `part4` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `sum` int(11) DEFAULT '0' COMMENT '总分',
  `rank` varchar(30) DEFAULT '没有排名' COMMENT '排名',
  `eliminate` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否已淘汰'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `sum`
--

INSERT INTO `sum` (`id`, `name`, `number`, `college`, `part1`, `part2`, `extrapart`, `part3`, `part4`, `sum`, `rank`, `eliminate`) VALUES
(1, 'group1', 3, '没有学院', 0, 0, 0, 0, 0, 0, '没有排名', 0),
(2, 'group2', 3, '没有学院', 0, 0, 0, 0, 0, 0, '没有排名', 0),
(3, 'group3', 3, '没有学院', 0, 0, 0, 0, 0, 0, '没有排名', 0),
(4, 'group4', 3, '没有学院', 0, 0, 0, 0, 0, 0, '没有排名', 0),
(5, 'group5', 3, '没有学院', 0, 0, 0, 0, 0, 0, '没有排名', 0),
(6, 'group6', 3, '没有学院', 0, 0, 0, 0, 0, 0, '没有排名', 0),
(7, 'group7', 3, '没有学院', 0, 0, 0, 0, 0, 0, '没有排名', 0),
(8, 'group8', 3, '没有学院', 0, 0, 0, 0, 0, 0, '没有排名', 0),
(9, 'group9', 3, '没有学院', 0, 0, 0, 0, 0, 0, '没有排名', 0),
(10, 'group10', 3, '没有学院', 0, 0, 0, 0, 0, 0, '没有排名', 0),
(11, 'group11', 3, '没有学院', 0, 0, 0, 0, 0, 0, '没有排名', 0),
(12, 'group12', 3, '没有学院', 0, 0, 0, 0, 0, 0, '没有排名', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sum`
--
ALTER TABLE `sum`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `sum`
--
ALTER TABLE `sum`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '队伍标识', AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

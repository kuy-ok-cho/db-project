-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 21-02-04 03:41
-- 서버 버전: 10.4.16-MariaDB
-- PHP 버전: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `test`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `gold_msg`
--

CREATE TABLE `gold_msg` (
  `GOLD_MSG_num` int(11) NOT NULL COMMENT '고유번호',
  `GOLD_MSG_name` varchar(20) CHARACTER SET utf8 NOT NULL COMMENT '작성자 이름',
  `GOLD_MSG_email` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT '작성자 이메일',
  `GOLD_MSG_tit` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT '메시지 제목',
  `GOLD_MSG_con` text CHARACTER SET utf8 NOT NULL COMMENT '메시지 내용',
  `GOLD_MSG_reg` varchar(20) CHARACTER SET utf8 NOT NULL COMMENT '메시지 작성 일지'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `gold_msg`
--
ALTER TABLE `gold_msg`
  ADD PRIMARY KEY (`GOLD_MSG_num`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `gold_msg`
--
ALTER TABLE `gold_msg`
  MODIFY `GOLD_MSG_num` int(11) NOT NULL AUTO_INCREMENT COMMENT '고유번호', AUTO_INCREMENT=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

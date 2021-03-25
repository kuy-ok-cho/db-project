-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 21-02-04 03:40
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
-- 테이블 구조 `gold_ans`
--

CREATE TABLE `gold_ans` (
  `GOLD_ANS_num` int(11) NOT NULL COMMENT '고유번호',
  `GOLD_ANS_QNA_num` int(11) DEFAULT NULL COMMENT '질문글 번호',
  `GOLD_ANS_con` text CHARACTER SET utf8 NOT NULL COMMENT '답글 내용',
  `GOLD_ANS_reg` varchar(15) CHARACTER SET utf8 NOT NULL COMMENT '답글 등록일'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `gold_ans`
--
ALTER TABLE `gold_ans`
  ADD PRIMARY KEY (`GOLD_ANS_num`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `gold_ans`
--
ALTER TABLE `gold_ans`
  MODIFY `GOLD_ANS_num` int(11) NOT NULL AUTO_INCREMENT COMMENT '고유번호', AUTO_INCREMENT=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

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
-- 테이블 구조 `gold_web`
--

CREATE TABLE `gold_web` (
  `GOLD_WEB_num` int(11) NOT NULL COMMENT '고유번호',
  `GOLD_WEB_tit` varchar(20) CHARACTER SET utf8 NOT NULL COMMENT '제목',
  `GOLD_WEB_ser` varchar(20) CHARACTER SET utf8 NOT NULL COMMENT '시리얼넘버',
  `GOLD_WEB_des` text CHARACTER SET utf8 NOT NULL COMMENT '설명',
  `GOLD_WEB_img` varchar(30) CHARACTER SET utf8 NOT NULL COMMENT '사진',
  `GOLD_WEB_mimg` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT '모바일사진',
  `GOLD_WEB_thumb` varchar(30) CHARACTER SET utf8 NOT NULL COMMENT '썸네일사진',
  `GOLD_WEB_cli` varchar(30) CHARACTER SET utf8 NOT NULL COMMENT '납품처',
  `GOLD_WEB_reg` varchar(15) CHARACTER SET utf8 DEFAULT NULL COMMENT '등록일',
  `GOLD_WEB_dom` varchar(50) CHARACTER SET utf8 DEFAULT NULL COMMENT '도메인주소'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `gold_web`
--
ALTER TABLE `gold_web`
  ADD PRIMARY KEY (`GOLD_WEB_num`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `gold_web`
--
ALTER TABLE `gold_web`
  MODIFY `GOLD_WEB_num` int(11) NOT NULL AUTO_INCREMENT COMMENT '고유번호', AUTO_INCREMENT=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

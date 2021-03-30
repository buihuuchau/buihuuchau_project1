-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2021 at 05:24 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `quanly`
--

-- --------------------------------------------------------

--
-- Table structure for table `ban`
--

CREATE TABLE IF NOT EXISTS `ban` (
  `idban` int(11) NOT NULL AUTO_INCREMENT,
  `idquan` int(11) NOT NULL,
  `tenban` varchar(55) NOT NULL,
  `trangthai` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idban`),
  KEY `idquan_fk_ban` (`idquan`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `ban`
--

INSERT INTO `ban` (`idban`, `idquan`, `tenban`, `trangthai`) VALUES
(1, 1, 'Bàn 1', 0),
(2, 1, 'Bàn 2', 0),
(3, 1, 'Bàn 3', 0),
(4, 1, 'Bàn 4', 0),
(5, 1, 'Bàn 5', 0),
(6, 1, 'Bàn 6', 0),
(7, 1, 'Bàn 7', 0),
(8, 1, 'Bàn 8', 0),
(9, 1, 'Bàn 9', 0),
(10, 1, 'Bàn 10', 0);

-- --------------------------------------------------------

--
-- Table structure for table `chitiet`
--

CREATE TABLE IF NOT EXISTS `chitiet` (
  `idct` int(11) NOT NULL AUTO_INCREMENT,
  `idhd` int(11) NOT NULL,
  `idquan` int(11) NOT NULL,
  `idmon` int(11) NOT NULL,
  `thuchien` int(11) NOT NULL,
  PRIMARY KEY (`idct`),
  KEY `idhd_fk_chitiet` (`idhd`),
  KEY `idquan_fk_chitiet` (`idquan`),
  KEY `idmon_fk_chitiet` (`idmon`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `chitiet`
--

INSERT INTO `chitiet` (`idct`, `idhd`, `idquan`, `idmon`, `thuchien`) VALUES
(2, 2, 1, 6, 1),
(8, 7, 1, 6, 1),
(9, 7, 1, 6, 1),
(10, 7, 1, 6, 1),
(11, 9, 1, 3, 1),
(12, 9, 1, 5, 1),
(13, 10, 1, 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `chucvu`
--

CREATE TABLE IF NOT EXISTS `chucvu` (
  `idchucvu` int(11) NOT NULL AUTO_INCREMENT,
  `tenchucvu` varchar(55) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`idchucvu`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `chucvu`
--

INSERT INTO `chucvu` (`idchucvu`, `tenchucvu`) VALUES
(1, 'Chủ quán'),
(2, 'Quản lý'),
(3, 'Pha chế'),
(4, 'Phục vụ'),
(5, 'Tạp vụ');

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE IF NOT EXISTS `hoadon` (
  `idhd` int(11) NOT NULL AUTO_INCREMENT,
  `idtv` int(11) NOT NULL,
  `idban` int(11) NOT NULL,
  `idquan` int(11) NOT NULL,
  `ngaytao` date NOT NULL,
  `giotao` time NOT NULL,
  `thanhtien` int(11) NOT NULL DEFAULT '0',
  `trangthai` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idhd`),
  KEY `idtv_fk_hoadon` (`idtv`),
  KEY `idquan_fk_hoadon` (`idquan`),
  KEY `idban_fk_hoadon` (`idban`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`idhd`, `idtv`, `idban`, `idquan`, `ngaytao`, `giotao`, `thanhtien`, `trangthai`) VALUES
(1, 1, 1, 1, '2021-03-28', '13:00:36', 20000, 1),
(2, 1, 3, 1, '2021-03-28', '13:00:52', 22000, 1),
(3, 1, 1, 1, '2021-03-28', '13:55:50', 60000, 1),
(4, 1, 1, 1, '2021-03-28', '14:12:17', 20000, 1),
(5, 1, 3, 1, '2021-03-28', '14:12:29', 0, 1),
(6, 1, 4, 1, '2021-03-28', '14:15:32', 20000, 1),
(7, 1, 2, 1, '2021-03-28', '14:28:55', 66000, 1),
(8, 1, 2, 1, '2021-03-29', '19:17:06', 20000, 1),
(9, 1, 1, 1, '2021-03-29', '19:27:32', 48000, 1),
(10, 1, 2, 1, '2021-03-29', '19:36:04', 30000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `hoadonduyet`
--

CREATE TABLE IF NOT EXISTS `hoadonduyet` (
  `idhd` int(11) NOT NULL,
  `idquan` int(11) NOT NULL,
  `hoten` varchar(55) NOT NULL,
  `tenban` varchar(55) NOT NULL,
  `ngaytao` date NOT NULL,
  `giotao` time NOT NULL,
  `thanhtien` int(11) NOT NULL,
  `tungay` date NOT NULL,
  `denngay` date NOT NULL,
  `tongthunhap` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mon`
--

CREATE TABLE IF NOT EXISTS `mon` (
  `idmon` int(11) NOT NULL AUTO_INCREMENT,
  `idquan` int(11) NOT NULL,
  `tenmon` varchar(55) NOT NULL,
  `dongia` int(11) NOT NULL,
  `mota` varchar(555) NOT NULL,
  `hinhmon` varchar(555) NOT NULL,
  PRIMARY KEY (`idmon`),
  KEY `idquan_fk_mon` (`idquan`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `mon`
--

INSERT INTO `mon` (`idmon`, `idquan`, `tenmon`, `dongia`, `mota`, `hinhmon`) VALUES
(3, 1, 'Cacao Đá', 19000, 'Cacao nguyên chất ', './hinh/cacao.jpg'),
(4, 1, 'Đá me', 13000, 'Đá me hương vị khác lạ kích thích vị giác', './hinh/dame.jpg'),
(5, 1, 'Dừa tươi', 29000, 'Nước dừa uống ngọt mát lạnh', './hinh/dua.jpg'),
(6, 1, 'Lipton đá', 22000, 'Lipton pha ra thôi chứ ko có mô tả gì hết', './hinh/lipton.jpg'),
(7, 1, 'Nước cam', 22000, 'Nước cam ép hương vị ngọt thanh tự nhiên tăng cường vitamin C giúp tăng đề kháng', './hinh/nuoccam.jpg'),
(8, 1, 'Soda Blue-Sky', 28000, 'Soda vị chanh có gas', './hinh/soda.jpg'),
(9, 1, 'Trà sữa trân châu đường đen', 30000, 'Trà sữa trân châu làm từ tông lào ', './hinh/trasua.jpg'),
(10, 1, 'Yaourt Đá', 19000, 'Sữa chua xé hộp đổ ra ly', './hinh/yaourt.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `quan`
--

CREATE TABLE IF NOT EXISTS `quan` (
  `idquan` int(11) NOT NULL AUTO_INCREMENT,
  `accquan` varchar(555) NOT NULL,
  `pwdquan` varchar(555) NOT NULL,
  `rpwdquan` varchar(555) NOT NULL,
  `tenquan` varchar(55) NOT NULL,
  `hinhquan` varchar(555) NOT NULL,
  `diachiquan` varchar(555) NOT NULL,
  `ngaythanhlap` date NOT NULL,
  PRIMARY KEY (`idquan`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `quan`
--

INSERT INTO `quan` (`idquan`, `accquan`, `pwdquan`, `rpwdquan`, `tenquan`, `hinhquan`, `diachiquan`, `ngaythanhlap`) VALUES
(1, 'quan1', '8c198691d0e39b4d7ac090b390ce9ba9', '8c198691d0e39b4d7ac090b390ce9ba9', 'Quán nước Cần Thơ', './hinh/quan1.jpg', 'Cần Thơ', '2021-02-20'),
(2, 'quan2', 'f9cc1caea66b1528876e4fed1148e2e3', 'f9cc1caea66b1528876e4fed1148e2e3', 'Quán nước Vĩnh Long', './hinh/quan2.jpg', 'Vĩnh Long', '2021-02-19');

-- --------------------------------------------------------

--
-- Table structure for table `thanhvien`
--

CREATE TABLE IF NOT EXISTS `thanhvien` (
  `idtv` int(11) NOT NULL AUTO_INCREMENT,
  `idquan` int(11) NOT NULL,
  `acc` varchar(555) NOT NULL,
  `pwd` varchar(555) NOT NULL,
  `rpwd` varchar(555) NOT NULL,
  `hoten` varchar(55) NOT NULL,
  `hinhtv` varchar(555) NOT NULL,
  `namsinh` date NOT NULL,
  `sex` varchar(11) NOT NULL,
  `diachi` varchar(555) NOT NULL,
  `ngayvaolam` date NOT NULL,
  `idchucvu` int(11) NOT NULL,
  `luong` int(11) NOT NULL,
  PRIMARY KEY (`idtv`),
  KEY `idquan_fk_thanhvien` (`idquan`),
  KEY `idchucvu_fk_thanhvien` (`idchucvu`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `thanhvien`
--

INSERT INTO `thanhvien` (`idtv`, `idquan`, `acc`, `pwd`, `rpwd`, `hoten`, `hinhtv`, `namsinh`, `sex`, `diachi`, `ngayvaolam`, `idchucvu`, `luong`) VALUES
(1, 1, 'quan1_chuquan', 'c4ca4238a0b923820dcc509a6f75849b', 'c4ca4238a0b923820dcc509a6f75849b', 'chuquan1', './hinh/chuquan.jpg', '1999-04-21', 'Male', 'a1', '2021-02-20', 1, 9999999),
(2, 1, 'quan1_quanly', 'c81e728d9d4c2f636f067f89cc14862c', 'c81e728d9d4c2f636f067f89cc14862c', 'quanly1', './hinh/quanly.jpg', '2000-04-21', 'Male', 'b1', '2021-02-21', 2, 8888888),
(3, 1, 'quan1_phache', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 'phache1', './hinh/phache.jpg', '2001-04-21', 'Female', 'c1', '2021-02-22', 3, 7777777),
(4, 1, 'quan1_phucvu', 'a87ff679a2f3e71d9181a67b7542122c', 'a87ff679a2f3e71d9181a67b7542122c', 'phucvu1', './hinh/phucvu.jpg', '2002-04-21', 'Female', 'd1', '2021-02-23', 4, 6666666),
(5, 1, 'quan1_tapvu', 'e4da3b7fbbce2345d7772b0674a318d5', 'e4da3b7fbbce2345d7772b0674a318d5', 'tapvu1', './hinh/tapvu.jpg', '2003-04-21', 'Male', 'e1', '2021-02-24', 5, 5555555),
(6, 2, 'quan2_chuquan', 'c4ca4238a0b923820dcc509a6f75849b', 'c4ca4238a0b923820dcc509a6f75849b', 'chuquan2', './hinh/chuquan2.jpg', '1999-04-21', 'Male', 'a2', '2021-02-20', 1, 9999999),
(7, 2, 'quan2_quanly', 'c81e728d9d4c2f636f067f89cc14862c', 'c81e728d9d4c2f636f067f89cc14862c', 'quanly2', './hinh/quanly2.jpg', '2000-04-21', 'Male', 'b2', '2021-02-21', 2, 8888888),
(8, 2, 'quan2_phache', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 'phache2', './hinh/phache2.jpg', '2001-04-21', '', 'c2', '2021-02-22', 3, 7777777),
(9, 2, 'quan2_phucvu', 'a87ff679a2f3e71d9181a67b7542122c', 'a87ff679a2f3e71d9181a67b7542122c', 'phucvu2', './hinh/phucvu2.jpg', '2002-04-21', 'Female', 'd2', '2021-02-23', 4, 6666666),
(10, 2, 'quan2_tapvu', 'e4da3b7fbbce2345d7772b0674a318d5', 'e4da3b7fbbce2345d7772b0674a318d5', 'tapvu2', './hinh/tapvu2.jpg', '2003-04-21', 'Female', 'e2', '2021-02-24', 5, 5555555);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ban`
--
ALTER TABLE `ban`
  ADD CONSTRAINT `idquan_fk_ban` FOREIGN KEY (`idquan`) REFERENCES `quan` (`idquan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `chitiet`
--
ALTER TABLE `chitiet`
  ADD CONSTRAINT `idhd_fk_chitiet` FOREIGN KEY (`idhd`) REFERENCES `hoadon` (`idhd`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idmon_fk_chitiet` FOREIGN KEY (`idmon`) REFERENCES `mon` (`idmon`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idquan_fk_chitiet` FOREIGN KEY (`idquan`) REFERENCES `quan` (`idquan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `idban_fk_hoadon` FOREIGN KEY (`idban`) REFERENCES `ban` (`idban`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idquan_fk_hoadon` FOREIGN KEY (`idquan`) REFERENCES `quan` (`idquan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idtv_fk_hoadon` FOREIGN KEY (`idtv`) REFERENCES `thanhvien` (`idtv`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mon`
--
ALTER TABLE `mon`
  ADD CONSTRAINT `idquan_fk_mon` FOREIGN KEY (`idquan`) REFERENCES `quan` (`idquan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `thanhvien`
--
ALTER TABLE `thanhvien`
  ADD CONSTRAINT `idchucvu_fk_thanhvien` FOREIGN KEY (`idchucvu`) REFERENCES `chucvu` (`idchucvu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idquan_fk_thanhvien` FOREIGN KEY (`idquan`) REFERENCES `quan` (`idquan`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

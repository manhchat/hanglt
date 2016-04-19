-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2016 at 06:06 PM
-- Server version: 5.6.26
-- PHP Version: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hanglt`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(10) unsigned NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `item_order` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `update_timestamp` int(11) DEFAULT NULL,
  `create_timestamp` int(11) DEFAULT NULL,
  `status` smallint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `item_order`, `image`, `update_timestamp`, `create_timestamp`, `status`) VALUES
(11, 'おしぼり／白', 1, 'oshibori_bright_green_w80_01_570bb8abd1541.jpg', 1460386214, 1460385963, 1),
(12, 'おしぼり／カラー', 2, 'oshibori_brown_w80_01_570bb8c4a30b4.jpg', 1460385988, 1460385988, 1),
(13, 'おしぼりトレイ', 3, 'oshibori_white_w70_01_570bb8e030702.jpg', 1460386016, 1460386016, 1),
(14, 'おしぼり用温冷庫', 4, 'oshibori_white_w70_01_570bb926c7d0a.jpg', 1460386087, 1460386087, 1),
(15, '紙おしぼり', 5, 'oshibori_yellow01_w70_01_570bb9404ce14.jpg', 1460386112, 1460386112, 1),
(16, 'フェイスタオル', 6, 'oshibori_brown_w80_01_570bb94eb9f7e.jpg', 1460386126, 1460386126, 1),
(17, 'バスタオル', 7, 'oshibori_yellow01_w70_01_570bb96d3b70e.jpg', 1460386157, 1460386157, 1),
(18, '訳あり在庫処分品', 8, 'oshibori_brown_w80_01_570bb97761ab3.jpg', 1460386167, 1460386167, 1);

-- --------------------------------------------------------

--
-- Table structure for table `image_tmp`
--

CREATE TABLE IF NOT EXISTS `image_tmp` (
  `id` int(11) NOT NULL,
  `path` varchar(255) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `image_tmp`
--

INSERT INTO `image_tmp` (`id`, `path`, `created`) VALUES
(5, '571656d6cc9110837905001461081814\\571656d6cc911.jpg', '2016-04-19 18:03:34'),
(6, '571656d70f5c60062918001461081815\\571656d70f9ae.jpg', '2016-04-19 18:03:35'),
(7, '571656d75762f0357935001461081815\\571656d75762f.jpg', '2016-04-19 18:03:35');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL,
  `category` tinyint(4) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text,
  `update_timestamp` int(11) NOT NULL,
  `create_timestamp` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `category`, `title`, `body`, `update_timestamp`, `create_timestamp`) VALUES
(6, 1, 'Giới thiệu 1', '<p>Giới thiệu 1</p>\r\n', 1438957287, 1438957287),
(7, 1, 'Giới thiệu 2', '<p><span style="color:#A52A2A">Giới thiệu 2</span></p>\r\n', 1438957446, 1438957446),
(8, 2, 'Chính sách 1', '<p><span style="color:#FF0000">Ch&iacute;nh s&aacute;ch 1</span></p>\r\n', 1439604070, 1438957468),
(9, 4, 'Sửa màn hình Laptop.', '<p><strong>Sửa m&agrave;n h&igrave;nh Laptop</strong>.</p>\r\n\r\n<p>Trong thời buổi c&ocirc;ng nghệ ph&aacute;t triển hiện nay, việc sở hữu Laptop hay điện thoại Smartphone l&agrave; rất cần thiết.</p>\r\n\r\n<p>Đ&acirc;y cũng l&agrave; hai thiết bị c&ocirc;ng nghệ được đ&oacute;ng g&oacute;i một c&aacute;ch hết sức kỹ lưỡng, c&aacute;c th&agrave;nh phần đồng nhất v&agrave; kh&oacute; t&aacute;ch rời.</p>\r\n\r\n<p>Đối với cả hai thiết bị n&agrave;y, th&agrave;nh phần tương t&aacute;c với người sử dụng nhiều nhất đ&oacute; ch&iacute;nh l&agrave; M&agrave;n h&igrave;nh Laptop hay Smartphone.</p>\r\n\r\n<p>Đ&aacute;ng tiếc rằng đ&acirc;y l&agrave; linh kiện thường xảy ra lỗi, g&acirc;y rất nhiều kh&oacute; khăn cho người d&ugrave;ng trong qu&aacute; tr&igrave;nh sử dụng đặc biệt l&agrave; <a href="http://4tech.vn/linh-kien/man-hinh-laptop.html">m&agrave;n h&igrave;nh laptop</a>.</p>\r\n\r\n<p>Nếu như trước kia, việc thay thế, sửa chữa m&agrave;n h&igrave;nh Laptop gặp nhiều kh&oacute; khăn v&agrave; đắt đỏ do thiếu linh kiện sửa chữa th&igrave; hiện nay việc sửa chữa m&agrave;n h&igrave;nh laptop trở n&ecirc;n đơn giản v&agrave; rẻ hơn rất nhiều.</p>\r\n\r\n<p>C&oacute; rất nhiều nguy&ecirc;n nh&acirc;n dẫn đến việc m&agrave;n h&igrave;nh laptop của bạn bị lỗi, chi tiết c&aacute;c lỗi thường gặp, c&aacute;ch nhận biết c&aacute;c bạn c&oacute; thể xem tại đ&acirc;y. <a href="http://4tech.vn/man-hinh-laptop-nhung-dieu-can-biet.html">M&agrave;n h&igrave;nh laptop &ndash; Những điều cần biết</a>.</p>\r\n\r\n<p>Đối với đa số người d&ugrave;ng hiện nay việc đ&aacute;nh gi&aacute; t&igrave;nh trạng m&agrave;n h&igrave;nh laptop của m&igrave;nh thường gặp nhiều kh&oacute; khăn, nếu như c&oacute; bất cứ thắc mắc n&agrave;o qu&yacute; kh&aacute;ch c&oacute; thể gọi ngay cho ch&uacute;ng t&ocirc;i th&ocirc;ng qua số hotline 04.2262.9999 để được tư vấn.</p>\r\n\r\n<p>4Tech kinh doanh trong ng&agrave;nh dịch vụ m&aacute;y t&iacute;nh được 8 năm li&ecirc;n tục, tự h&agrave;o l&agrave; doanh nghệp lọt v&agrave;o top 100 doanh nghiệp sản phẩm dịch vụ h&agrave;ng đầu việt nam năm 2014. Xin gửi tới qu&yacute; kh&aacute;ch h&agrave;ng b&aacute;o gi&aacute; chi tiết <strong>sửa chữa m&agrave;n h&igrave;nh Laptop</strong> tại Cty 4Tech.</p>\r\n\r\n<p>Qu&yacute; kh&aacute;ch lưu &yacute;, 4Tech &aacute;p dụng gi&aacute; sửa m&agrave;n h&igrave;nh laptop bằng nhau cho tất cả c&aacute;c thương hiệu Laptop như m&agrave;n h&igrave;nh laptop Acer, Sony, m&agrave;n h&igrave;nh laptop Dell, Asus, m&agrave;n h&igrave;nh laptop Lenovo, HP&hellip; đều &aacute;p dụng chung mức gi&aacute; như tr&ecirc;n.</p>\r\n\r\n<p>Tr&ecirc;n thị trường c&aacute;c đơn vị sửa chữa thường sẽ t&aacute;ch ri&ecirc;ng gi&aacute; sửa t&ugrave;y v&agrave;o gi&aacute; th&agrave;nh hay thương hiệu của Sản Phẩm m&agrave; kh&aacute;ch h&agrave;ng sử dụng.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table border="1" cellspacing="0" style="width:800px">\r\n	<caption>&nbsp;</caption>\r\n	<tbody>\r\n		<tr>\r\n			<td colspan="4" style="text-align:center">\r\n			<p><strong>&nbsp;B&aacute;o gi&aacute; dịch vụ sửa chữa m&agrave;n h&igrave;nh laptop</strong></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="text-align:center">\r\n			<p><strong>STT</strong></p>\r\n			</td>\r\n			<td style="text-align:center">\r\n			<p><strong>T&igrave;nh trạng</strong></p>\r\n			</td>\r\n			<td style="text-align:center">\r\n			<p><strong>Gi&aacute;(Vnd)</strong></p>\r\n			</td>\r\n			<td style="text-align:center">\r\n			<p><strong>Bảo h&agrave;nh</strong></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="text-align:center">\r\n			<p>1</p>\r\n			</td>\r\n			<td style="text-align:center">\r\n			<p>Sửa cao &aacute;p, chế cao &aacute;p</p>\r\n			</td>\r\n			<td style="text-align:center">\r\n			<p>220.000</p>\r\n			</td>\r\n			<td style="text-align:center">\r\n			<p>3 th&aacute;ng</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="text-align:center">\r\n			<p>2</p>\r\n			</td>\r\n			<td style="text-align:center">\r\n			<p>Chế c&aacute;p, h&agrave;n c&aacute;p</p>\r\n			</td>\r\n			<td style="text-align:center">\r\n			<p>180.000</p>\r\n			</td>\r\n			<td style="text-align:center">\r\n			<p>3 th&aacute;ng</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="text-align:center">\r\n			<p>3</p>\r\n			</td>\r\n			<td style="text-align:center">\r\n			<p>M&agrave;n h&igrave;nh trắng, nh&ograve;e, nhiễu, m&agrave;n mưa</p>\r\n			</td>\r\n			<td style="text-align:center">\r\n			<p>180.000</p>\r\n			</td>\r\n			<td style="text-align:center">\r\n			<p>3 th&aacute;ng</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="text-align:center">\r\n			<p>4</p>\r\n			</td>\r\n			<td style="text-align:center">\r\n			<p>L&agrave;m hết c&aacute;c vết ố, đốm mờ do lỗi ma trận</p>\r\n			</td>\r\n			<td style="text-align:center">\r\n			<p>240.000</p>\r\n			</td>\r\n			<td style="text-align:center">\r\n			<p>3 th&aacute;ng</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="text-align:center">\r\n			<p>5</p>\r\n			</td>\r\n			<td style="text-align:center">\r\n			<p>L&agrave;m hết c&aacute;c vết xước</p>\r\n			</td>\r\n			<td style="text-align:center">\r\n			<p>260.000</p>\r\n			</td>\r\n			<td style="text-align:center">\r\n			<p>3 th&aacute;ng</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="text-align:center">\r\n			<p>6</p>\r\n			</td>\r\n			<td style="text-align:center">\r\n			<p>Bản lề m&agrave;n h&igrave;nh(gập l&ecirc;n xuống cứng, hoặc g&atilde;y)</p>\r\n			</td>\r\n			<td style="text-align:center">\r\n			<p>180.000-400.000( sửa chữa hoặc thay thế)</p>\r\n			</td>\r\n			<td style="text-align:center">\r\n			<p>3 th&aacute;ng</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="text-align:center">\r\n			<p>7</p>\r\n			</td>\r\n			<td style="text-align:center">\r\n			<p>Thay b&oacute;ng tu&yacute;p LCD</p>\r\n\r\n			<p>(+ 12&quot;, 13.3&quot;, 14&quot;, 15.4&quot;, 17&quot; wide)</p>\r\n			</td>\r\n			<td style="text-align:center">\r\n			<p>160.000</p>\r\n			</td>\r\n			<td style="text-align:center">\r\n			<p>3 th&aacute;ng</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>B&aacute;o gi&aacute; ph&iacute;a tr&ecirc;n ch&uacute;ng t&ocirc;i liệt k&ecirc; những bệnh cơ bản v&agrave; thường gặp nhất tr&ecirc;n m&agrave;n h&igrave;nh Laptop một số trường hợp đặc biệt sẽ được 4Tech th&ocirc;ng b&aacute;o v&agrave; giải th&iacute;ch kỹ c&agrave;ng cho kh&aacute;ch h&agrave;ng.</p>\r\n\r\n<p>Khi mang sản phẩm tới Cty c&aacute;c bạn sẽ được tư vấn chi tiết hướng khắc phục, như đ&atilde; n&oacute;i ở tr&ecirc;n, chi ph&iacute; <a href="http://4tech.vn/thay-man-hinh-laptop.html">thay m&agrave;n h&igrave;nh laptop</a>&nbsp;đ&atilde; trở n&ecirc;n rẻ rất nhiều, n&ecirc;n việc lựa chọn sửa chữa hay thay thế sẽ được 4Tech c&acirc;n nhắc kỹ lưỡng gi&uacute;p đưa ra cho qu&yacute; kh&aacute;ch một giải ph&aacute;p tối ưu nhất.</p>\r\n\r\n<p>R&aacute;t vui được phục vụ qu&yacute; kh&aacute;ch, dịch vụ, gi&aacute; th&agrave;nh, hỗ trợ sau b&aacute;n h&agrave;ng chắc chắn sẽ l&agrave;m qu&yacute; kh&aacute;ch h&agrave;i l&ograve;ng.</p>\r\n\r\n<p><span style="color:#ff0000"><em>Đặc biệt ch&uacute;ng t&ocirc;i &aacute;p dụng ch&iacute;nh s&aacute;ch giao nhận tại nh&agrave; miễn ph&iacute; đối với tất cả kh&aacute;ch h&agrave;ng tại nội th&agrave;nh H&agrave; Nội.</em></span></p>\r\n', 1439995244, 1439995244);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(10) unsigned NOT NULL,
  `cid` int(10) unsigned NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `description` text,
  `weight` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `thickness` varchar(255) DEFAULT NULL,
  `made_by` varchar(255) DEFAULT NULL,
  `sell_number` varchar(255) DEFAULT NULL,
  `classification_of_charges` varchar(255) DEFAULT NULL,
  `image` text NOT NULL,
  `create_timestamp` int(11) DEFAULT NULL,
  `update_timestamp` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `flg` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `cid`, `product_name`, `description`, `weight`, `size`, `price`, `thickness`, `made_by`, `sell_number`, `classification_of_charges`, `image`, `create_timestamp`, `update_timestamp`, `status`, `flg`) VALUES
(12, 12, 'test', '<p>testtest</p>\r\n', 'test', 'test', 20, 'test', 'testtest', 'test', 'test', '["5711040627005.jpg","5711040861235.jpg","57110409cadef.jpg","5711040b670a2.jpg"]', 1460732940, 1460732940, 1, 1),
(13, 14, 'test222222', '<p>test2222222</p>\r\n', 'test2', 'test2', 10, 'test2', 'test2', 'test2', 'test2', '["57110a5149b4d.jpg","57110a517c009.jpg","57110a51ad13c.jpg","57110a51f170c.jpg"]', 1460732966, 1460734621, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE IF NOT EXISTS `slide` (
  `id` int(11) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `title` varchar(255) NOT NULL DEFAULT '0',
  `image` varchar(255) NOT NULL DEFAULT '0',
  `url` varchar(255) DEFAULT '0',
  `update_timestamp` int(11) NOT NULL DEFAULT '0',
  `create_timestamp` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`id`, `type`, `title`, `image`, `url`, `update_timestamp`, `create_timestamp`) VALUES
(1, 1, 'Edg banner 1', 'www.edg.vn_55d3538c1fa7f.png', 'http://google.com.vn', 1439912844, 1427207694),
(5, 0, 'Banner tĩnh 2', 'banner_17e62166_55d35405c3627.jpg', 'http://google.com.vn', 1439914070, 1427294117),
(6, 1, 'Banner tinh1', 'banner_17e62166_55d353e2f3056.jpg', 'http://google.com.vn', 1460734857, 1427294156),
(7, 1, 'Edg banner 2', 'www.edg.vn_55d353aa3b28a.jpg', 'http://google.com.vn', 1439912874, 1427385063);

-- --------------------------------------------------------

--
-- Table structure for table `tintuc`
--

CREATE TABLE IF NOT EXISTS `tintuc` (
  `id` int(11) NOT NULL,
  `category` tinyint(4) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `body` text,
  `sumary` text,
  `update_timestamp` int(11) NOT NULL,
  `create_timestamp` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tintuc`
--

INSERT INTO `tintuc` (`id`, `category`, `title`, `image`, `body`, `sumary`, `update_timestamp`, `create_timestamp`) VALUES
(6, 1, 'Giới thiệu 1', '', '<p>Giới thiệu 1</p>\r\n', NULL, 1438957287, 1438957287),
(7, 1, 'Giới thiệu 2', '', '<p><span style="color:#A52A2A">Giới thiệu 2</span></p>\r\n', NULL, 1438957446, 1438957446),
(8, 2, 'Chính sách 1', '11638089_820903211356296_893213401_n_55ce9e71623e0.jpg', '<p><span style="color:#FF0000">Ch&iacute;nh s&aacute;ch 1</span></p>\r\n', NULL, 1439604337, 1438957468),
(9, 2, 'Video hài Lý Hải', '11647175_820903341356283_554567101_n_55cea02965382.jpg', '<p>sdsdsd</p>\r\n', NULL, 1439604777, 1439604777),
(10, 1, 'Video hài hướcs', '11638089_820903211356296_893213401_n_55cea0ae0d46f.jpg', '<p>Video h&agrave;i hướcsVideo h&agrave;i hướcsVideo h&agrave;i hướcsVideo h&agrave;i hướcsVideo h&agrave;i hướcsVideo h&agrave;i hướcsVideo h&agrave;i hướcsVideo h&agrave;i hướcsVideo h&agrave;i hướcsVideo h&agrave;i hướcsVideo h&agrave;i hướcsVideo h&agrave;i hướcsVideo h&agrave;i hướcsVideo h&agrave;i hướcsVideo h&agrave;i hướcsVideo h&agrave;i hướcsVideo h&agrave;i hướcsVideo h&agrave;i hướcsVideo h&agrave;i hướcsVideo h&agrave;i hướcs</p>\r\n', 'Nội dung tóm lược Nội dung tóm lược Nội dung tóm lược Nội dung tóm lược Nội dung tóm lược Nội dung tóm lược Nội dung tóm lược Nội dung tóm lược Nội dung tóm lược ', 1439998328, 1439604910);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `update_timestamp` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `update_timestamp`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'chatdm@gmail.com', 1439017263);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `image_tmp`
--
ALTER TABLE `image_tmp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `create_timestamp` (`create_timestamp`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `create_timestamp` (`create_timestamp`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `create_timestamp` (`create_timestamp`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `image_tmp`
--
ALTER TABLE `image_tmp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

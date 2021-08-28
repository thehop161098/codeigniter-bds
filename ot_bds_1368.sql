-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 06, 2020 at 05:04 PM
-- Server version: 10.1.18-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nhada89_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_about`
--

CREATE TABLE `tbl_about` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thumb` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `video` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `des` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_about`
--

INSERT INTO `tbl_about` (`id`, `name`, `image`, `thumb`, `publish`, `video`, `des`, `created_at`, `updated_at`) VALUES
(1, 'Về chúng tôi', '', '', 1, 'MrgJwA9Utv0', '<p style=\"text-align:justify\">Bạn mong muốn ho&agrave;n thiện kh&ocirc;ng gian ng&ocirc;i nh&agrave; của bạn với gi&aacute; rẻ v&agrave; chất lượng?</p>\r\n\r\n<p style=\"text-align:justify\">Bạn l&agrave; một doanh nghiệp v&agrave; bạn đang mong muốn x&acirc;y dựng một kh&ocirc;ng gian nội thất thật trang nh&atilde; v&agrave; sang trọng? nhưng bạn cảm thấy kh&oacute; khăn trong việc t&igrave;m kiếm c&ocirc;ng ty cung cấp nội thất xuất khẩu uy t&iacute;n m&agrave; chất lượng.</p>\r\n\r\n<p style=\"text-align:justify\">Đồ gỗ HCM, ch&uacute;ng t&ocirc;i l&agrave; c&ocirc;ng ty h&agrave;ng đầu chuy&ecirc;n về sản xuất, ph&acirc;n phối sỉ v&agrave; lẻ nội thất trang tr&iacute; cao cấp, mục ti&ecirc;u của ch&uacute;ng t&ocirc;i l&agrave; kh&ocirc;ng chỉ đưa sản phẩm đến với thị trường nội thất cao cấp trong nước m&agrave; c&ograve;n chinh phục những thị trường quốc tế với nhiều th&aacute;ch thức.</p>\r\n\r\n<p style=\"text-align:justify\">Đồ gỗ HCM, ch&uacute;ng t&ocirc;i l&agrave; c&ocirc;ng ty h&agrave;ng đầu chuy&ecirc;n về sản xuất, ph&acirc;n phối sỉ v&agrave; lẻ nội thất trang tr&iacute; cao cấp, mục ti&ecirc;u của ch&uacute;ng t&ocirc;i l&agrave; kh&ocirc;ng chỉ đưa sản phẩm đến với thị trường nội thất cao cấp trong nước m&agrave; c&ograve;n chinh phục những thị trường quốc tế với nhiều th&aacute;ch thức.</p>', '0000-00-00 00:00:00', '2019-09-24 14:37:52');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL,
  `phone` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text_pass` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `fullname`, `username`, `email`, `role_id`, `phone`, `password`, `text_pass`, `salt`, `active`, `created_at`, `updated_at`) VALUES
(1, 'AdminOptech', 'admin', '', 1, '', '5ff8738e14f18bd2f2889becfb7af31a0ec17cea', '123456@', 'rPs!vmE,', 1, '2018-06-18 22:42:09', '2020-04-21 18:37:34'),
(18, 'Minh Hiếu', '', 'hieu.optech@gmail.com', 2, '0934084427', '9d31bf89228e42e0845ae45142541c39fa9ba3aa', '123456', 'FSQRavXZ', 1, '2020-04-23 09:05:33', '2020-04-24 20:39:12'),
(19, 'Nguyễn Tuấn', '', 'lmhieu2104@gmail.com', 2, '0869221906', 'cd47d1c5291369654d22fcedcdfaa8a590ce135b', '510078', '/Ge8ip43', 1, '2020-04-23 09:14:47', '2020-04-23 09:19:32'),
(24, 'Trần Thế Hợp', '', 'thehop161098@gmail.com', 2, '0334729143', 'a41c440aed1f1808383029dd80e9c6b3a5a37d8c', '123456', '+Mcxx7sh', 1, '2020-04-24 14:21:01', '2020-04-24 14:21:21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_alias`
--

CREATE TABLE `tbl_alias` (
  `id` int(11) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_alias`
--

INSERT INTO `tbl_alias` (`id`, `type`, `alias`, `created_at`) VALUES
(359, 2, 'nha-dat-ban', '2020-04-14 14:48:03'),
(364, 2, 'nha-dat-cho-thue', '2020-04-14 14:49:22'),
(365, 2, 'thue-can-ho-chung-cu', '2020-04-14 14:49:32'),
(366, 2, 'cho-thue-nha-rieng', '2020-04-14 14:49:43'),
(367, 2, 'cho-thue-nha-mat-pho', '2020-04-14 14:49:53'),
(368, 5, 'thanh-pho-ho-chi-minh', '2020-04-14 15:59:41'),
(369, 6, 'quan-1', '2020-04-14 16:09:24'),
(370, 6, 'quan-2', '2020-04-14 16:12:19'),
(373, 5, 'thanh-pho-ha-noi', '2020-04-14 17:02:36'),
(374, 6, 'hoan-kiem', '2020-04-14 17:03:18'),
(389, 8, 'khu-dan-cu', '2020-04-15 09:50:58'),
(390, 8, 'khu-do-thi-m', '2020-04-15 09:51:12'),
(391, 8, 'khu-can-ho', '2020-04-15 09:51:23'),
(392, 8, 'cao-oc-van-phong', '2020-04-15 09:51:34'),
(393, 8, 'khu-thuong-mai-dich-vu', '2020-04-15 09:51:56'),
(394, 8, 'khu-du-lich-nghi-duong', '2020-04-15 09:52:46'),
(395, 8, 'khu-cong-nghiep', '2020-04-15 09:53:33'),
(396, 8, 'khu-phuc-hop', '2020-04-15 09:53:45'),
(397, 8, 'du-an-khac', '2020-04-15 09:53:57'),
(402, 8, 'du-an', '2020-04-15 10:47:46'),
(447, 7, 'p-thu-thiem', '2020-04-15 16:56:01'),
(448, 7, 'hang-dao', '2020-04-15 17:15:55'),
(450, 3, 'nha-cho-thue-test', '2020-04-15 18:02:24'),
(456, 1, 'tin-bat-dong-san', '2020-04-16 12:28:28'),
(457, 4, 'mua-chung-cu-cuoi-nam-nguoi-mua-nha-can-quan-tam-dieu-gi-1', '2020-04-16 13:52:15'),
(458, 4, 'mua-chung-cu-cuoi-nam-nguoi-mua-nha-can-quan-tam-dieu-gi-2', '2020-04-16 13:52:43'),
(459, 4, 'mua-chung-cu-cuoi-nam-nguoi-mua-nha-can-quan-tam-dieu-gi-3', '2020-04-16 13:53:02'),
(460, 4, 'mua-chung-cu-cuoi-nam-nguoi-mua-nha-can-quan-tam-dieu-gi-4', '2020-04-16 13:53:15'),
(461, 4, 'cach-bat-mach-bong-bong-bat-dong-san-nam-2019-de-vuot-qua', '2020-04-16 13:53:59'),
(462, 2, 'ban-nha-rieng', '2020-04-16 14:21:11'),
(463, 2, 'ban-nha-mat-pho', '2020-04-16 14:21:35'),
(464, 2, 'ban-can-ho-chung-cu', '2020-04-16 14:22:06'),
(465, 3, 'can-ho-2-phong-ngu-2-wc-gia-tu-12-tycan-lien-ke-3-truong-dai-hoc-chiet-khau-3', '2020-04-16 14:24:53'),
(466, 3, 'nha-chinh-chu-134m2-co-san-vuon-san-truoc-rong-do-o-to-duong-xe-tai', '2020-04-16 14:29:13'),
(467, 3, 'can-ban-nhanh-lo-dat-100m2-mat-tien-an-phu-tay-hung-long-chi-130-trieu-so-hong-rieng-xay-tu-do', '2020-04-16 14:30:36'),
(468, 2, 'ban-dat', '2020-04-16 14:33:07'),
(469, 3, 'ban-dat-mat-tien-duong-15m-dt-9m8-x-27m-no-hau', '2020-04-16 14:34:29'),
(470, 3, 'ban-nha-pho-goc-2-mat-tien-khach-san-15-phong-khu-trung-son-binh-chanh', '2020-04-16 14:36:10'),
(471, 3, 'can-ho-melody-au-co-68m2-view-cong-vien-huong-dong-nam-sang-nhuong-195-ty-full-thue-phi', '2020-04-16 14:37:24'),
(472, 3, 'cho-thue-chung-cu-carillon-tan-binh-65-m2-12tr-thang', '2020-04-16 14:41:46'),
(473, 3, 'cho-thue-nha-nguyen-can-phuong-binh-chieu-huyen-hoc-mon-xa-nhi-binh', '2020-04-16 14:43:57'),
(474, 3, 'cho-thue-nha-nguyen-can-phuong-binh-chieu-quan-thu-duc-trong-cu-xa-savimex', '2020-04-16 14:47:59'),
(477, 3, 'cho-thue-nha-rieng-mat-tien-quan-thu-duc-gia-45tr-thang', '2020-04-16 14:52:33'),
(479, 6, 'quan-3', '2020-04-16 16:24:23'),
(480, 6, 'quan-4', '2020-04-16 16:24:30'),
(481, 6, 'quan-5', '2020-04-16 16:24:36'),
(482, 6, 'quan-6', '2020-04-16 16:24:41'),
(483, 6, 'quan-7', '2020-04-16 16:24:46'),
(484, 6, 'quan-8', '2020-04-16 16:24:52'),
(485, 6, 'quan-9', '2020-04-16 16:24:57'),
(486, 6, 'quan-10', '2020-04-16 16:25:03'),
(487, 6, 'quan-11', '2020-04-16 16:25:11'),
(488, 6, 'quan-12', '2020-04-16 16:25:32'),
(489, 6, 'huyen-binh-chanh', '2020-04-16 16:25:42'),
(490, 6, 'quan-binh-thanh', '2020-04-16 16:25:52'),
(491, 6, 'quan-binh-tan', '2020-04-16 16:25:59'),
(492, 6, 'huyen-can-gio', '2020-04-16 16:26:09'),
(493, 6, 'huyen-cu-chi', '2020-04-16 16:26:18'),
(494, 6, 'quan-go-vap', '2020-04-16 16:26:25'),
(495, 6, 'huyen-hoc-mon', '2020-04-16 16:26:34'),
(496, 6, 'huyen-nha-be', '2020-04-16 16:26:42'),
(497, 6, 'quan-phu-nhuan', '2020-04-16 16:26:51'),
(498, 6, 'quan-thu-duc', '2020-04-16 16:26:58'),
(499, 6, 'quan-tan-binh', '2020-04-16 16:27:06'),
(500, 6, 'quan-tan-phu', '2020-04-16 16:27:13'),
(501, 7, 'xa-dong-thanh', '2020-04-16 16:28:18'),
(502, 7, 'xa-xuan-thoi-dong', '2020-04-16 16:28:25'),
(503, 7, 'xa-xuan-thoi-thuong', '2020-04-16 16:28:35'),
(504, 7, 'xa-xuan-thoi-son', '2020-04-16 16:28:42'),
(505, 7, 'xa-tan-xuan', '2020-04-16 16:28:50'),
(506, 7, 'xa-tan-thoi-nhi', '2020-04-16 16:28:56'),
(507, 7, 'xa-tan-hiep', '2020-04-16 16:29:02'),
(508, 7, 'xa-trung-chanh', '2020-04-16 16:29:09'),
(509, 7, 'xa-thoi-tam-thon', '2020-04-16 16:29:18'),
(510, 7, 'xa-nhi-binh', '2020-04-16 16:29:25'),
(511, 7, 'thi-tran-hoc-mon', '2020-04-16 16:29:35'),
(512, 7, 'xa-ba-diem', '2020-04-16 16:29:42'),
(513, 5, 'tinh-thua-thien-hue', '2020-04-16 16:33:17'),
(514, 5, 'thanh-pho-can-tho', '2020-04-16 16:33:26'),
(515, 5, 'thanh-pho-da-nang', '2020-04-16 16:33:35'),
(516, 5, 'tinh-lam-dong', '2020-04-16 16:33:43'),
(517, 5, 'tinh-binh-duong', '2020-04-16 16:33:50'),
(518, 5, 'tinh-dong-nai', '2020-04-16 16:33:58'),
(535, 3, 'nha-cho-thue-test-700', '2020-04-22 22:45:02'),
(536, 3, 'nha-cho-thue-test-232', '2020-04-22 22:48:26'),
(537, 3, 'ngay-lotte-q7-ho-tro-500k-chi-tu-30tr5trth-toa-nha-8-tang-da-nghiem-thu-pccclh-0988373', '2020-04-23 09:45:37'),
(538, 7, 'phuong-linh-dong', '2020-04-23 16:28:22'),
(539, 10, 'duong-pham-van-dong', '2020-04-23 16:28:34'),
(540, 10, '171-bui-cong-trung', '2020-04-23 16:30:07'),
(541, 10, 'duong-dang-thuc-vinh', '2020-04-23 16:30:26'),
(542, 10, 'duong-nguyen-anh-thu', '2020-04-23 16:30:56'),
(543, 10, 'duong-tan-xuan', '2020-04-23 16:31:08'),
(544, 10, 'duong-cong-khi', '2020-04-23 16:31:30'),
(545, 10, '20-dang-thuc-vinh', '2020-04-23 16:31:52'),
(546, 10, '10-mai-chi-tho', '2020-04-23 16:32:45'),
(547, 10, '35-mai-chi-tho', '2020-04-23 16:32:56'),
(548, 10, 'duong-phuc-tan', '2020-04-23 16:34:29'),
(549, 10, 'duong-mui-tau', '2020-04-23 16:38:47'),
(550, 9, 'khu-do-thi-moi-pham-van-dong', '2020-04-24 10:49:48'),
(551, 9, 'khu-thuong-mai-dich-vu-hn', '2020-04-24 10:49:59'),
(552, 9, 'du-an-du-lich-nghi-duong-hoc-mon', '2020-04-24 10:50:10'),
(553, 9, 'du-an-khu-dan-cu-ba-diem', '2020-04-24 10:50:17'),
(554, 9, 'khu-do-thi-moi-van-phu', '2020-04-24 10:50:26'),
(556, 9, 'du-an-khu-dan-cu-ba-diem-426', '2020-04-28 20:19:02'),
(558, 3, 'nha-co-thue-mat-pho-hoc-mon-trung-chanh-10trtha', '2020-04-29 09:23:31'),
(559, 9, 'du-an-khu-dan-cu-test-demo', '2020-04-29 10:09:18'),
(560, 9, 'du-an-khu-dan-cu-test-demo-441', '2020-04-29 10:11:18'),
(561, 3, 'dang-tin-test-demo-1', '2020-04-29 11:36:05'),
(562, 3, 'tin-dang-nguoi-dung-user', '2020-04-29 13:43:21'),
(563, 1, 'thong-tin-chung', '2020-04-29 14:29:56'),
(564, 1, 'quy-che-hoat-dong', '2020-04-29 14:30:07'),
(565, 1, 'quy-dinh-su-dung', '2020-04-29 14:30:18'),
(566, 1, 'quy-trinh-dang-tin', '2020-04-29 14:30:27'),
(567, 1, 'an-toan-giao-dich', '2020-04-29 14:30:35');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id` int(11) NOT NULL,
  `orderID` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thumb` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `totalPrice` double NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `des` text COLLATE utf8_unicode_ci NOT NULL,
  `parentid` int(11) NOT NULL,
  `publish` tinyint(4) NOT NULL,
  `home` tinyint(1) NOT NULL,
  `left` tinyint(1) NOT NULL,
  `right` tinyint(1) NOT NULL,
  `hot` tinyint(1) NOT NULL,
  `footer` tinyint(1) NOT NULL,
  `search` tinyint(1) NOT NULL,
  `main` tinyint(1) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `sort` int(11) NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thumb` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_keyword` text COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `content_bottom` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `name`, `des`, `parentid`, `publish`, `home`, `left`, `right`, `hot`, `footer`, `search`, `main`, `type`, `sort`, `link`, `alias`, `image`, `thumb`, `title`, `meta_description`, `meta_keyword`, `content`, `content_bottom`, `created_at`, `updated_at`) VALUES
(157, 'Nhà đất bán', '', 0, 1, 1, 0, 0, 0, 0, 0, 0, 2, 2, '', 'nha-dat-ban', '', '', 'Nhà đất bán', '', '', '', '', '2020-04-14 14:48:03', '0000-00-00 00:00:00'),
(162, 'Nhà đất cho thuê', '', 0, 1, 1, 0, 0, 0, 0, 0, 0, 2, 1, '', 'nha-dat-cho-thue', '', '', 'Nhà đất cho thuê', '', '', '', '', '2020-04-14 14:49:22', '0000-00-00 00:00:00'),
(163, 'Thuê căn hộ chung cư', '', 162, 1, 0, 0, 0, 0, 0, 0, 0, 2, 8, '', 'thue-can-ho-chung-cu', '', '', 'Cho thuê căn hộ chung cư', '', '', '', '', '2020-04-14 14:49:32', '2020-04-17 10:59:02'),
(164, 'Cho thuê nhà riêng', '', 162, 1, 0, 0, 0, 0, 0, 0, 0, 2, 9, '', 'cho-thue-nha-rieng', '', '', 'Cho thuê nhà riêng', '', '', '', '', '2020-04-14 14:49:43', '0000-00-00 00:00:00'),
(165, 'Cho thuê nhà mặt phố', '', 162, 1, 0, 0, 0, 0, 0, 0, 0, 2, 10, '', 'cho-thue-nha-mat-pho', '', '', 'Cho thuê nhà mặt phố', '', '', '', '', '2020-04-14 14:49:53', '0000-00-00 00:00:00'),
(169, 'Khu dân cư', '', 178, 1, 0, 0, 0, 0, 0, 0, 0, 8, 11, '', 'khu-dan-cu', '', '', 'Khu dân cư', '', '', '', '', '2020-04-15 09:50:58', '2020-04-15 10:47:52'),
(170, 'Khu đô thị mới', '', 178, 1, 0, 0, 0, 0, 0, 0, 0, 8, 12, '', 'khu-do-thi-m', '', '', 'Khu đô thị mới', '', '', '', '', '2020-04-15 09:51:12', '2020-04-15 10:47:59'),
(171, 'Khu căn hộ', '', 178, 1, 0, 0, 0, 0, 0, 0, 0, 8, 13, '', 'khu-can-ho', '', '', 'Khu căn hộ', '', '', '', '', '2020-04-15 09:51:23', '2020-04-15 10:48:04'),
(172, 'Cao ốc văn phòng', '', 178, 1, 0, 0, 0, 0, 0, 0, 0, 8, 14, '', 'cao-oc-van-phong', '', '', 'Cao ốc văn phòng', '', '', '', '', '2020-04-15 09:51:34', '2020-04-15 10:48:08'),
(173, 'Khu thương mại dịch vụ', '', 178, 1, 0, 0, 0, 0, 0, 0, 0, 8, 15, '', 'khu-thuong-mai-dich-vu', '', '', 'Khu thương mại dịch vụ', '', '', '', '', '2020-04-15 09:51:56', '2020-04-15 10:48:13'),
(174, 'Khu du lịch - nghỉ dưỡng', '', 178, 1, 0, 0, 0, 0, 0, 0, 0, 8, 16, '', 'khu-du-lich-nghi-duong', '', '', 'Khu du lịch - nghỉ dưỡng', '', '', '', '', '2020-04-15 09:52:46', '2020-04-15 10:48:18'),
(175, 'Khu công nghiệp', '', 178, 1, 0, 0, 0, 0, 0, 0, 0, 8, 17, '', 'khu-cong-nghiep', '', '', 'Khu công nghiệp', '', '', '', '', '2020-04-15 09:53:33', '2020-04-15 10:48:23'),
(176, 'Khu phức hợp', '', 178, 1, 0, 0, 0, 0, 0, 0, 0, 8, 18, '', 'khu-phuc-hop', '', '', 'Khu phức hợp', '', '', '', '', '2020-04-15 09:53:45', '2020-04-15 10:48:28'),
(177, 'Dự án khác', '', 178, 1, 0, 0, 0, 0, 0, 0, 0, 8, 19, '', 'du-an-khac', '', '', 'Dự án khác', '', '', '', '', '2020-04-15 09:53:57', '2020-04-15 10:48:33'),
(178, 'Dự án', '', 0, 1, 0, 0, 0, 0, 0, 0, 0, 8, 20, '', 'du-an', '', '', 'Dự án', '', '', '', '', '2020-04-15 10:47:46', '0000-00-00 00:00:00'),
(179, 'Tin bất động sản', '', 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 21, '', 'tin-bat-dong-san', '', '', 'Tin bất động sản', '', '', '', '', '2020-04-16 12:28:28', '2020-04-22 09:31:20'),
(180, 'Bán nhà riêng', '', 157, 1, 0, 0, 0, 0, 0, 0, 0, 2, 22, '', 'ban-nha-rieng', '', '', 'Bán nhà riêng', '', '', '', '', '2020-04-16 14:21:11', '0000-00-00 00:00:00'),
(181, 'Bán nhà mặt phố', '', 157, 1, 0, 0, 0, 0, 0, 0, 0, 2, 23, '', 'ban-nha-mat-pho', '', '', 'Bán nhà mặt phố', '', '', '', '', '2020-04-16 14:21:35', '0000-00-00 00:00:00'),
(182, 'Bán căn hộ chung cư', '', 157, 1, 0, 0, 0, 0, 0, 0, 0, 2, 24, '', 'ban-can-ho-chung-cu', '', '', 'Bán căn hộ chung cư', '', '', '', '', '2020-04-16 14:22:06', '0000-00-00 00:00:00'),
(183, 'Bán đất', '', 157, 1, 0, 0, 0, 0, 0, 0, 0, 2, 25, '', 'ban-dat', '', '', 'Bán đất', '', '', '', '', '2020-04-16 14:33:07', '0000-00-00 00:00:00'),
(185, 'Thông tin chung', '', 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 26, '', 'thong-tin-chung', '', '', 'Thông tin chung', '', '', '', '', '2020-04-29 14:29:56', '0000-00-00 00:00:00'),
(186, 'Quy chế hoạt động', '', 185, 1, 0, 0, 0, 0, 0, 0, 0, 1, 27, '', 'quy-che-hoat-dong', '', '', 'Quy chế hoạt động', '', '', '', '', '2020-04-29 14:30:07', '0000-00-00 00:00:00'),
(187, 'Quy định sử dụng', '', 185, 1, 0, 0, 0, 0, 0, 0, 0, 1, 28, '', 'quy-dinh-su-dung', '', '', 'Quy định sử dụng', '', '', '', '', '2020-04-29 14:30:18', '0000-00-00 00:00:00'),
(188, 'Quy trình đăng tin', '', 185, 1, 0, 0, 0, 0, 0, 0, 0, 1, 29, '', 'quy-trinh-dang-tin', '', '', 'Quy trình đăng tin', '', '', '', '', '2020-04-29 14:30:28', '0000-00-00 00:00:00'),
(189, 'An toàn giao dịch', '', 185, 1, 0, 0, 0, 0, 0, 0, 0, 1, 30, '', 'an-toan-giao-dich', '', '', 'An toàn giao dịch', '', '', '', '', '2020-04-29 14:30:35', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_city`
--

CREATE TABLE `tbl_city` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_keyword` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_city`
--

INSERT INTO `tbl_city` (`id`, `name`, `alias`, `title`, `meta_keyword`, `meta_description`) VALUES
(2, 'Thành phố Hồ Chí Minh', 'thanh-pho-ho-chi-minh', 'Thành phố Hồ Chí Minh', '', ''),
(3, 'Thành phố Hà Nội', 'thanh-pho-ha-noi', 'Thành phố Hà Nội', '', ''),
(4, 'Tỉnh Thừa Thiên Huế', 'tinh-thua-thien-hue', 'Tỉnh Thừa Thiên Huế', '', ''),
(5, 'Thành phố Cần Thơ', 'thanh-pho-can-tho', 'Thành phố Cần Thơ', '', ''),
(6, 'Thành phố Đà Nẵng', 'thanh-pho-da-nang', 'Thành phố Đà Nẵng', '', ''),
(7, 'Tỉnh Lâm Đồng', 'tinh-lam-dong', 'Tỉnh Lâm Đồng', '', ''),
(8, 'Tỉnh Bình Dương', 'tinh-binh-duong', 'Tỉnh Bình Dương', '', ''),
(9, 'Tỉnh Đồng Nai', 'tinh-dong-nai', 'Tỉnh Đồng Nai', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `parentid` int(11) NOT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `typeID` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `type` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `name`, `phone`, `email`, `address`, `description`, `type`, `created_at`) VALUES
(2, 'Trần Thế Hợp', 334729143, 'thehop161098@gmail.com', '', 'Thanks You Optech', 'contact', '2020-04-24 14:22:20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contents`
--

CREATE TABLE `tbl_contents` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cateid` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thumb` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `des` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_direction`
--

CREATE TABLE `tbl_direction` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sort` int(11) NOT NULL,
  `publish` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_direction`
--

INSERT INTO `tbl_direction` (`id`, `name`, `sort`, `publish`) VALUES
(1, 'Đông', 1, 1),
(2, 'Tây', 2, 1),
(3, 'Nam', 3, 1),
(4, 'Bắc', 4, 1),
(5, 'Tây Nam', 5, 1),
(6, 'Tây Bắc', 6, 1),
(7, 'Đông Nam', 7, 1),
(8, 'Đông Bắc', 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_keyword` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`id`, `city_id`, `name`, `alias`, `title`, `meta_keyword`, `meta_description`) VALUES
(4, 2, 'Quận 1', 'quan-1', 'Quận 1', '', ''),
(5, 2, 'Quận 2', 'quan-2', 'Quận 2', '', ''),
(7, 3, 'Hoàn Kiếm', 'hoan-kiem', '', '', ''),
(9, 2, 'Quận 3', 'quan-3', 'Quận 3', '', ''),
(10, 2, 'Quận 4', 'quan-4', 'Quận 4', '', ''),
(11, 2, 'Quận 5', 'quan-5', 'Quận 5', '', ''),
(12, 2, 'Quận 6', 'quan-6', 'Quận 6', '', ''),
(13, 2, 'Quận 7', 'quan-7', 'Quận 7', '', ''),
(14, 2, 'Quận 8', 'quan-8', 'Quận 8', '', ''),
(15, 2, 'Quận 9', 'quan-9', 'Quận 9', '', ''),
(16, 2, 'Quận 10', 'quan-10', 'Quận 10', '', ''),
(17, 2, 'Quận 11', 'quan-11', 'Quận 11', '', ''),
(18, 2, 'Quận 12', 'quan-12', 'Quận 12', '', ''),
(19, 2, 'Huyện Bình Chánh', 'huyen-binh-chanh', 'Huyện Bình Chánh', '', ''),
(20, 2, 'Quận Bình Thạnh', 'quan-binh-thanh', 'Quận Bình Thạnh', '', ''),
(21, 2, 'Quận Bình Tân', 'quan-binh-tan', 'Quận Bình Tân', '', ''),
(22, 2, 'Huyện Cần Giờ', 'huyen-can-gio', 'Huyện Cần Giờ', '', ''),
(23, 2, 'Huyện Củ Chi', 'huyen-cu-chi', 'Huyện Củ Chi', '', ''),
(24, 2, 'Quận Gò Vấp', 'quan-go-vap', 'Quận Gò Vấp', '', ''),
(25, 2, 'Huyện Hóc Môn', 'huyen-hoc-mon', 'Huyện Hóc Môn', '', ''),
(26, 2, 'Huyện Nhà Bè', 'huyen-nha-be', 'Huyện Nhà Bè', '', ''),
(27, 2, 'Quận Phú Nhuận', 'quan-phu-nhuan', 'Quận Phú Nhuận', '', ''),
(28, 2, 'Quận Thủ Đức', 'quan-thu-duc', 'Quận Thủ Đức', '', ''),
(29, 2, 'Quận Tân Bình', 'quan-tan-binh', 'Quận Tân Bình', '', ''),
(30, 2, 'Quận Tân Phú', 'quan-tan-phu', 'Quận Tân Phú', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_idea`
--

CREATE TABLE `tbl_idea` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `job` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thumb` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `des` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_info`
--

CREATE TABLE `tbl_info` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keys` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_info`
--

INSERT INTO `tbl_info` (`id`, `name`, `keys`, `publish`, `content`, `created_at`, `updated_at`) VALUES
(1, 'Copyright', 'copyright', 1, '<p><strong>Nh&agrave; Đất Số &ndash; Đăng tin rao vặt bất động sản &ndash; mua b&aacute;n nh&agrave; đất miễn ph&iacute;</strong></p>\r\n\r\n<p>Điện thoại: (08) 2266 3838 &ndash; (08) 2268 3838</p>\r\n\r\n<p>Được ph&aacute;t triển bởi&nbsp;optech.vn</p>\r\n', '2018-11-09 14:46:12', '2020-04-22 09:47:09'),
(24, 'Liên hệ', 'contactMain', 1, '<p>655 Luỹ B&aacute;n B&iacute;ch, Phường Ph&uacute; Thạnh, Quận T&acirc;n ph&uacute;, TP Hồ Ch&iacute; Minh</p>\r\n\r\n<p>0934084426 - 0934768738</p>\r\n\r\n<p>hieu.optech@gmail.com</p>\r\n\r\n<p>http://www.optech.vn</p>\r\n', '2020-04-03 21:29:55', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_map_showroom`
--

CREATE TABLE `tbl_map_showroom` (
  `id` int(11) NOT NULL,
  `showroomID` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `des` text COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `link` text COLLATE utf8_unicode_ci NOT NULL,
  `sort` int(11) NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_map_showroom`
--

INSERT INTO `tbl_map_showroom` (`id`, `showroomID`, `name`, `des`, `phone`, `link`, `sort`, `publish`, `created_at`, `updated_at`) VALUES
(6, 1, 'Hnoss Phan Đăng Lưu - 20 Phan Đăng Lưu, Phường 3, Quận Bình Thạnh, TP.HCM', 'Hnoss Phan Đăng Lưu - 20 Phan Đăng Lưu, Phường 3, Quận Bình Thạnh, TP.HCM', '0334729143', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d62694.9156966188!2d106.71814481923106!3d10.85469276759342!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3174d85e042bf04b%3A0xbb26baec1664394d!2zVGjhu6cgxJDhu6ljLCBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1582620986106!5m2!1svi!2s', 1, 1, '2020-03-03 17:35:36', '0000-00-00 00:00:00'),
(7, 1, 'Hnoss Nguyễn Oanh - 280 Nguyễn Oanh, Quận Gò Vấp, TP.HCM', 'Hnoss Nguyễn Oanh - 280 Nguyễn Oanh, Quận Gò Vấp, TP.HCM', '0334729143', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.6508993559178!2d106.67348331428744!3d10.838005261018898!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317529ab37a7516b%3A0xabc75d53cf2d9202!2zMjgwIE5ndXnhu4VuIE9hbmgsIFBoxrDhu51uZyAxNywgR8OyIFbhuqVwLCBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1582621834077!5m2!1svi!2s', 2, 1, '2020-03-03 17:36:54', '0000-00-00 00:00:00'),
(8, 1, 'HNOSS Xô Viết Nghệ Tĩnh - 246D Xô Viết Nghệ Tĩnh, phường 21, Bình Thạnh, Hồ Chí Minh', 'HNOSS Xô Viết Nghệ Tĩnh - 246D Xô Viết Nghệ Tĩnh, phường 21, Bình Thạnh, Hồ Chí Minh', '', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.1569294345422!2d106.70908431428714!3d10.799290261725512!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317528b0072e94a1%3A0x95c29133b177d149!2zMjQ2RCBYw7QgVmnhur90IE5naOG7hyBUxKluaCwgUGjGsOG7nW5nIDIxLCBCw6xuaCBUaOG6oW5oLCBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1582626075459!5m2!1svi!2s', 4, 1, '2020-03-03 17:37:27', '0000-00-00 00:00:00'),
(10, 1, 'Hnoss Aeon Mall Bình Tân', 'Lầu 1-F3, Aeon Mall Bình Tân, Số 1 Đường 17A, KP. 11, P. Bình Trị Đông B, Quận Bình Tân', '', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.8926678654084!2d106.60974221428684!3d10.7427549627531!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752dcece7b50db%3A0xf53f7643a9134531!2zQUVPTiBNQUxMIELDrG5oIFTDom4!5e0!3m2!1svi!2s!4v1582626152875!5m2!1svi!2s', 3, 1, '2020-03-03 17:38:29', '0000-00-00 00:00:00'),
(11, 6, 'HNOSS 84 Nguyễn Hữu Thọ, Vũng Tàu', 'HNOSS 84 Nguyễn Hữu Thọ, Vũng Tàu', '', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3923.1115050990784!2d107.17144231428516!3d10.491875467251525!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31757348733bf647%3A0x5dbd071792beac19!2zODQgTmd1eeG7hW4gSOG7r3UgVGjhu40sIFBoxrDhu5tjIFRydW5nLCBCw6AgUuG7i2EsIELDoCBS4buLYSAtIFbFqW5nIFTDoHUsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1582626244369!5m2!1svi!2s', 5, 1, '2020-03-03 17:39:34', '0000-00-00 00:00:00'),
(12, 6, 'HNOSS 116 Ba Cu, Vũng Tàu', 'HNOSS 116 Ba Cu, Vũng Tàu', '', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3924.888245931227!2d107.07634431428414!3d10.35082006973658!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31756feb597d5823%3A0x4873e6c56b553f91!2zMTE2IEJhIEN1LCBQaMaw4budbmcgNCwgVGjDoG5oIHBo4buRIFbFqW5nIFThuqd1LCBCw6AgUuG7i2EgLSBWxaluZyBUw6B1LCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1582626302503!5m2!1svi!2s', 6, 1, '2020-04-24 11:23:22', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parentid` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `publish` tinyint(4) NOT NULL,
  `hot` tinyint(1) NOT NULL,
  `footer` tinyint(1) NOT NULL,
  `main` tinyint(1) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `sort` int(11) NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thumb` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`id`, `name`, `parentid`, `categoryid`, `publish`, `hot`, `footer`, `main`, `type`, `sort`, `link`, `image`, `thumb`, `created_at`, `updated_at`) VALUES
(109, 'Trang chủ', 0, 0, 1, 0, 0, 1, 0, 1, '', '', '', '2020-04-14 14:38:06', '2020-04-16 13:42:00'),
(110, 'Nhà đất bán', 0, 157, 1, 0, 0, 1, 2, 2, '', '', '', '2020-04-14 14:38:46', '2020-04-14 14:50:15'),
(115, 'Nhà đất cho thuê', 0, 162, 1, 0, 0, 1, 2, 7, '', '', '', '2020-04-14 14:42:05', '2020-04-14 14:51:01'),
(116, 'Cho thuê căn hộ chung cư', 115, 163, 1, 0, 0, 0, 2, 9, '', '', '', '2020-04-14 14:42:22', '2020-04-14 14:51:23'),
(117, 'Cho thuê nhà riêng', 115, 164, 1, 0, 0, 0, 2, 10, '', '', '', '2020-04-14 14:42:35', '2020-04-14 14:51:15'),
(118, 'Cho thuê nhà mặt phố', 115, 165, 1, 0, 0, 0, 2, 9, '', '', '', '2020-04-14 14:43:00', '2020-04-14 14:51:08'),
(119, 'Tin bất động sản', 0, 179, 1, 0, 0, 1, 1, 11, '', '', '', '2020-04-14 14:44:09', '2020-04-16 12:28:39'),
(120, 'Liên hệ', 0, 0, 1, 0, 0, 1, 0, 12, 'lien-he.html', '', '', '2020-04-14 14:44:20', '0000-00-00 00:00:00'),
(121, 'Bán nhà riêng', 110, 180, 1, 0, 0, 0, 2, 13, '', '', '', '2020-04-16 16:57:37', '0000-00-00 00:00:00'),
(122, 'Bán nhà mặt phố', 110, 181, 1, 0, 0, 0, 2, 14, '', '', '', '2020-04-16 16:57:48', '0000-00-00 00:00:00'),
(123, 'Bán căn hộ chung cư', 110, 182, 1, 0, 0, 0, 2, 15, '', '', '', '2020-04-16 16:58:02', '0000-00-00 00:00:00'),
(124, 'Bán đất', 110, 183, 1, 0, 0, 0, 2, 16, '', '', '', '2020-04-16 16:58:14', '0000-00-00 00:00:00'),
(125, 'Dự án', 0, 178, 1, 0, 0, 1, 8, 10, '', '', '', '2020-04-24 10:45:36', '0000-00-00 00:00:00'),
(126, 'Khu dân cư', 125, 169, 1, 0, 0, 0, 8, 17, '', '', '', '2020-04-24 10:46:00', '0000-00-00 00:00:00'),
(127, 'Khu đô thị mới', 125, 170, 1, 0, 0, 0, 8, 18, '', '', '', '2020-04-24 10:46:14', '0000-00-00 00:00:00'),
(128, 'Khu căn hộ', 125, 171, 1, 0, 0, 0, 8, 19, '', '', '', '2020-04-24 10:46:25', '0000-00-00 00:00:00'),
(129, 'Cao ốc văn phòng', 125, 172, 1, 0, 0, 0, 8, 20, '', '', '', '2020-04-24 10:46:37', '0000-00-00 00:00:00'),
(130, 'Khu thương mại dịch vụ', 125, 173, 1, 0, 0, 0, 8, 21, '', '', '', '2020-04-24 10:46:55', '0000-00-00 00:00:00'),
(131, 'Khu du lịch - nghỉ dưỡng', 125, 174, 1, 0, 0, 0, 8, 22, '', '', '', '2020-04-24 10:47:06', '0000-00-00 00:00:00'),
(132, 'Khu công nghiệp', 125, 175, 1, 0, 0, 0, 8, 23, '', '', '', '2020-04-24 10:47:16', '0000-00-00 00:00:00'),
(133, 'Khu phức hợp', 125, 176, 1, 0, 0, 0, 8, 24, '', '', '', '2020-04-24 10:47:27', '0000-00-00 00:00:00'),
(134, 'Dự án khác', 125, 177, 1, 0, 0, 0, 8, 25, '', '', '', '2020-04-24 10:47:43', '0000-00-00 00:00:00'),
(135, 'Thông tin chung', 0, 185, 1, 0, 1, 0, 1, 26, '', '', '', '2020-04-29 14:30:46', '0000-00-00 00:00:00'),
(136, 'Quy chế hoạt động', 135, 186, 1, 0, 0, 0, 1, 27, '', '', '', '2020-04-29 14:30:58', '0000-00-00 00:00:00'),
(137, 'Quy định sử dụng', 135, 187, 1, 0, 0, 0, 1, 28, '', '', '', '2020-04-29 14:31:10', '0000-00-00 00:00:00'),
(138, 'Quy trình đăng tin', 135, 188, 1, 0, 0, 0, 1, 29, '', '', '', '2020-04-29 14:31:20', '0000-00-00 00:00:00'),
(139, 'An toàn giao dịch', 135, 189, 1, 0, 0, 0, 1, 30, '', '', '', '2020-04-29 14:31:29', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu_prices`
--

CREATE TABLE `tbl_menu_prices` (
  `id` int(11) NOT NULL,
  `cateid` int(11) NOT NULL,
  `title_price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `des_price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content_price` longtext COLLATE utf8_unicode_ci NOT NULL,
  `title_hangmuc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `des_hangmuc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content_hangmuc` longtext COLLATE utf8_unicode_ci NOT NULL,
  `title_sale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `percent_sale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content_sale` longtext COLLATE utf8_unicode_ci NOT NULL,
  `des_sale` text COLLATE utf8_unicode_ci NOT NULL,
  `link_price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link_hangmuc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link_sale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_module`
--

CREATE TABLE `tbl_module` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ctr` varchar(150) NOT NULL,
  `act` varchar(100) NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `link` varchar(255) NOT NULL,
  `sort` int(11) NOT NULL,
  `parentid` int(11) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `keys` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_module`
--

INSERT INTO `tbl_module` (`id`, `name`, `ctr`, `act`, `publish`, `link`, `sort`, `parentid`, `icon`, `keys`, `created_at`, `updated_at`) VALUES
(1, 'Trang chủ', '', '', 1, '', 1, 0, 'ti-image', '', '2018-02-03 20:29:26', '2020-04-06 08:36:11'),
(2, 'Logo website', 'logo', '', 1, 'logo/index', 2, 1, 'ti-themify-logo', '', '2018-02-03 20:34:53', '0000-00-00 00:00:00'),
(3, 'Dành cho quản trị', '', '', 1, '', 100, 0, 'icon-user-unfollow', '', '2018-02-03 21:03:01', '0000-00-00 00:00:00'),
(5, 'Tin đăng BDS', '', '', 1, '', 5, 0, 'ti-package', '', '2018-02-03 21:05:16', '2020-04-16 10:16:24'),
(7, 'Quản lý tin bds', 'newsLand', '', 1, 'newsLand/index', 5, 5, 'ti-briefcase', '', '2018-02-03 21:07:29', '2020-04-15 09:04:03'),
(9, 'Quản trị viên', 'admin', '', 1, 'admin/index', 9, 3, 'icon-user', '', '2018-02-03 21:15:41', '2020-04-06 08:35:34'),
(10, 'Quản lý Module', 'module', '', 1, 'module/index', 10, 3, 'ti-list', '', '2018-02-04 16:51:32', '0000-00-00 00:00:00'),
(11, 'Quản lý Slide', 'slide', '', 0, 'slide/index', 11, 1, 'ti-image', '', '2018-02-04 16:52:49', '0000-00-00 00:00:00'),
(12, 'Bài viết - Nội dung', '', '', 1, '', 12, 0, 'ti-files', '', '2018-02-04 18:02:33', '2018-02-04 18:02:52'),
(13, 'Quản lý nội dung', 'info', '', 1, 'info/member', 15, 12, 'ti-layout-media-overlay-alt-2', '', '2018-02-04 18:04:17', '2018-02-04 18:19:57'),
(14, 'Quản lý bài viết', 'news', '', 1, 'news/index', 14, 12, 'ti-layout-list-thumb', '', '2018-02-04 18:05:07', '0000-00-00 00:00:00'),
(16, 'Quản lý nội dung', 'info/index', '', 1, 'info/index', 16, 3, 'ti-layout-media-overlay-alt-2', '', '2018-02-04 18:19:07', '0000-00-00 00:00:00'),
(17, 'Quản lý nhóm quyền', 'role', '', 1, 'role/index', 17, 3, 'icon-people', '', '2018-02-04 19:17:47', '2018-06-18 23:49:46'),
(20, 'Quản lý email', 'email', '', 1, 'email/index', 20, 19, 'ti-email', '', '2018-02-04 21:56:21', '2018-02-04 21:56:36'),
(21, 'Thông tin liên hệ', 'contact', '', 1, 'contact/index', 21, 19, 'icon-envelope-open', '', '2018-02-04 22:06:34', '0000-00-00 00:00:00'),
(24, 'Dự án', 'project', '', 1, 'optech/project/index', 23, 23, 'icon-magic-wand', '', '2018-02-27 12:40:31', '2018-02-27 12:41:16'),
(29, 'Bảng giá tên miền', 'domain', '', 1, 'domain/index', 28, 28, 'ti-world', '', '2018-07-05 20:24:01', '0000-00-00 00:00:00'),
(30, 'Đối tác', 'partner', '', 1, 'partner/index', 29, 19, 'icon-user-following', '', '2018-07-10 14:58:41', '2018-07-10 15:00:24'),
(33, 'Menu', 'menu', '', 1, 'menu/index', 1, 1, 'ti-menu-alt', '', '2018-07-10 16:46:07', '2020-04-09 16:12:50'),
(34, 'Hosting', 'hosting', '', 1, 'hosting/index', 33, 28, 'ti-server', '', '2018-07-18 17:54:42', '0000-00-00 00:00:00'),
(35, 'Ý kiến khách hàng', 'idea', '', 0, 'idea/index', 34, 1, 'icon-user-following', '', '2018-07-19 11:16:15', '2020-04-06 08:35:56'),
(36, 'Kho giao diện', 'demo', '', 1, 'demo/index', 35, 28, 'ti-world', '', '2018-07-19 11:27:06', '0000-00-00 00:00:00'),
(37, 'Phân quyền', 'permission', '', 1, 'permission/index', 36, 3, 'ti-settings', '', '2018-07-19 17:35:54', '0000-00-00 00:00:00'),
(39, 'Khách hàng', 'customer', '', 1, 'customer/index', 38, 38, 'icon-user-following', '', '2018-07-19 18:07:50', '0000-00-00 00:00:00'),
(40, 'Thiết kế website', 'customer_website', '', 1, 'customer_website/index', 39, 38, 'icon-list', '', '2018-07-19 18:18:11', '0000-00-00 00:00:00'),
(41, 'Tên miền', 'customer_domain', '', 1, 'customer_domain/index', 40, 38, 'icon-list', '', '2018-07-19 18:18:41', '0000-00-00 00:00:00'),
(42, 'Hosting', 'customer_hosting', '', 1, 'customer_hosting/index', 41, 38, 'icon-list', '', '2018-07-19 18:19:06', '0000-00-00 00:00:00'),
(43, 'Email', 'customer_mail', '', 1, 'customer_mail/index', 42, 38, 'icon-list', '', '2018-07-19 18:19:39', '0000-00-00 00:00:00'),
(44, 'Quản lý khác', '', '', 0, '', 43, 0, 'ti-star', '', '2018-11-07 15:08:44', '0000-00-00 00:00:00'),
(45, 'Đối tác', 'partner', '', 0, 'partner/index', 44, 1, 'icon-people', '', '2018-11-07 15:09:04', '2020-04-10 09:39:50'),
(46, 'Đặt hàng', '', '', 0, '', 45, 0, 'ti-shopping-cart-full', '', '2018-11-16 14:55:54', '0000-00-00 00:00:00'),
(47, 'Đơn hàng', 'order', '', 0, 'order/index', 46, 46, 'ti-layers', '', '2018-11-16 14:57:04', '0000-00-00 00:00:00'),
(49, 'Quản lý quốc gia', 'country', '', 0, 'country/index', 48, 44, 'ti-map-alt', '', '2018-11-18 21:37:57', '0000-00-00 00:00:00'),
(51, 'Ưu điểm', 'contents', '', 1, 'contents/index', 50, 50, 'icon-bulb', '', '2018-11-29 10:04:11', '0000-00-00 00:00:00'),
(52, 'Giới thiệu trang chủ', 'about', '', 0, 'about/index', 51, 62, 'icon-share-alt', '', '2018-11-29 10:55:08', '2019-09-24 11:55:00'),
(53, 'Hỗ trợ trực tuyến', 'support', '', 0, 'support/index', 52, 44, 'ti-headphone', '', '2018-12-13 15:59:16', '0000-00-00 00:00:00'),
(55, 'Bình luận', 'comment', '', 0, 'comment/index', 54, 44, 'ti-comments', '', '2018-12-28 11:13:05', '2019-01-07 17:33:18'),
(57, 'Quản lý slogan', 'slogan', '', 0, 'slogan/index', 56, 62, 'icon-picture', '', '2019-07-17 09:55:23', '2019-09-24 11:55:25'),
(61, 'Quản lý Liên hệ (Header)', 'contactHome', '', 0, 'contactHome/index', 58, 62, 'ti-layout-list-thumb', '', '2019-09-24 11:50:05', '2019-09-24 11:55:17'),
(63, 'Liên hệ - đăng ký', '', '', 1, '', 59, 0, 'icon-people', '', '2019-09-25 09:50:15', '0000-00-00 00:00:00'),
(64, 'Quản lý liên hệ', '', '', 1, 'contact/index', 60, 63, 'icon-people', '', '2019-09-25 09:50:33', '0000-00-00 00:00:00'),
(71, 'Quản lí đăng ký', 'register', '', 0, 'register/index', 67, 63, 'ti-user', '', '2020-03-10 10:54:57', '2020-03-10 10:56:29'),
(73, 'Danh mục tin bds', 'menuNewsLand', '', 1, 'menuNewsLand/index', 1, 5, 'ti-layout-list-thumb', '', '2020-03-24 09:21:49', '2020-04-15 08:59:53'),
(74, 'Danh mục bài viết', 'menuNews', '', 1, 'menuNews/index', 13, 12, 'ti-layout-list-thumb', '', '2020-03-24 11:43:23', '2020-03-24 12:26:54'),
(78, 'Quản lý Slogan', 'slogan', '', 0, 'slogan/index', 71, 1, 'ti-layout-list-thumb', '', '2020-04-03 16:45:35', '0000-00-00 00:00:00'),
(79, 'Quản lý video', 'video', '', 0, 'video/index', 72, 1, 'ti-layout-list-thumb', '', '2020-04-10 10:43:28', '0000-00-00 00:00:00'),
(80, 'Quản lý hỗ trợ', 'support', '', 0, 'support/index', 73, 1, 'ti-layout-list-thumb', '', '2020-04-10 11:29:21', '0000-00-00 00:00:00'),
(81, 'Quản lý banner', 'banner', '', 1, 'banner/index', 74, 1, 'ti-layout-list-thumb', '', '2020-04-10 12:08:03', '0000-00-00 00:00:00'),
(82, 'Quản lý Tỉnh thành', 'city', '', 1, 'city/index', 4, 0, 'ti-layout-list-thumb', '', '2020-04-13 11:10:20', '2020-04-16 15:00:31'),
(84, 'Quản lý giá', 'searchPrice', '', 1, 'searchPrice/index', 3, 5, 'ti-layout-list-thumb', '', '2020-04-14 17:08:25', '0000-00-00 00:00:00'),
(85, 'Quản lý hướng', 'direction', '', 1, 'direction/index', 4, 5, 'ti-layout-list-thumb', '', '2020-04-14 20:00:34', '2020-04-14 20:01:22'),
(86, 'Quản lý dự án', '', '', 1, '', 6, 0, 'ti-layout-list-thumb', '', '2020-04-15 09:25:07', '2020-04-15 09:25:12'),
(87, 'Danh mục dự án', 'menuProject', '', 1, 'menuProject/index', 75, 86, 'ti-layout-list-thumb', '', '2020-04-15 09:27:56', '2020-04-15 10:47:19'),
(88, 'Dự án', 'project', '', 1, 'project/index', 76, 86, 'ti-layout-list-thumb', '', '2020-04-15 09:54:28', '0000-00-00 00:00:00'),
(89, 'Quản lý TK khách hàng', 'userCustomer', '', 1, 'userCustomer/index', 13, 0, 'icon-people', '', '2020-04-22 22:32:06', '0000-00-00 00:00:00'),
(90, 'Quản lý showroom', 'showroom', '', 1, 'showroom/index', 58, 0, 'ti-layout-list-thumb', '', '2020-04-24 13:38:59', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

CREATE TABLE `tbl_news` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cateid` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thumb` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_keyword` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8_unicode_ci NOT NULL,
  `tags` text COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `des` text COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `home` tinyint(1) NOT NULL,
  `advisory` tinyint(1) NOT NULL,
  `fengshui` tinyint(1) NOT NULL,
  `side` tinyint(1) NOT NULL,
  `cateSB` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_news`
--

INSERT INTO `tbl_news` (`id`, `name`, `cateid`, `image`, `thumb`, `publish`, `title`, `meta_keyword`, `meta_description`, `tags`, `alias`, `des`, `content`, `home`, `advisory`, `fengshui`, `side`, `cateSB`, `created_at`, `updated_at`) VALUES
(1, 'Mua chung cư cuối năm, người mua nhà cần quan tâm điều gì 1?', 179, 'mua-chung-cu-cuoi-nam-nguoi-mua-nha-can-quan-tam-dieu-gi-1.jpg', 'mua-chung-cu-cuoi-nam-nguoi-mua-nha-can-quan-tam-dieu-gi-1-thumb.jpg', 1, 'Mua chung cư cuối năm, người mua nhà cần quan tâm điều gì 1?', '', '', '', 'mua-chung-cu-cuoi-nam-nguoi-mua-nha-can-quan-tam-dieu-gi-1', 'Đây là nội dung mô tả cho, khách hàng có thể cập nhật lại trong phần quản trị cho phù hợp với lĩnh vực của mình', '<p>Đ&acirc;y l&agrave; nội dung m&ocirc; tả cho, kh&aacute;ch h&agrave;ng c&oacute; thể cập nhật lại trong phần quản trị cho ph&ugrave; hợp với lĩnh vực của m&igrave;nh</p>\r\n', 1, 0, 1, 0, 'null', '2020-04-16 13:52:15', '0000-00-00 00:00:00'),
(2, 'Mua chung cư cuối năm, người mua nhà cần quan tâm điều gì 2?', 179, 'mua-chung-cu-cuoi-nam-nguoi-mua-nha-can-quan-tam-dieu-gi-2.jpg', 'mua-chung-cu-cuoi-nam-nguoi-mua-nha-can-quan-tam-dieu-gi-2-thumb.jpg', 1, 'Mua chung cư cuối năm, người mua nhà cần quan tâm điều gì 2?', '', '', '', 'mua-chung-cu-cuoi-nam-nguoi-mua-nha-can-quan-tam-dieu-gi-2', 'Đây là nội dung mô tả cho, khách hàng có thể cập nhật lại trong phần quản trị cho phù hợp với lĩnh vực của mình', '<p>Đ&acirc;y l&agrave; nội dung m&ocirc; tả cho, kh&aacute;ch h&agrave;ng c&oacute; thể cập nhật lại trong phần quản trị cho ph&ugrave; hợp với lĩnh vực của m&igrave;nh</p>\r\n', 1, 1, 1, 0, 'null', '2020-04-16 13:52:43', '0000-00-00 00:00:00'),
(3, 'Mua chung cư cuối năm, người mua nhà cần quan tâm điều gì 3?', 179, 'mua-chung-cu-cuoi-nam-nguoi-mua-nha-can-quan-tam-dieu-gi-3.jpg', 'mua-chung-cu-cuoi-nam-nguoi-mua-nha-can-quan-tam-dieu-gi-3-thumb.jpg', 1, 'Mua chung cư cuối năm, người mua nhà cần quan tâm điều gì 3?', '', '', '', 'mua-chung-cu-cuoi-nam-nguoi-mua-nha-can-quan-tam-dieu-gi-3', 'Đây là nội dung mô tả cho, khách hàng có thể cập nhật lại trong phần quản trị cho phù hợp với lĩnh vực của mình', '<p>Đ&acirc;y l&agrave; nội dung m&ocirc; tả cho, kh&aacute;ch h&agrave;ng c&oacute; thể cập nhật lại trong phần quản trị cho ph&ugrave; hợp với lĩnh vực của m&igrave;nh</p>\r\n', 1, 1, 1, 0, 'null', '2020-04-16 13:53:02', '0000-00-00 00:00:00'),
(4, 'Mua chung cư cuối năm, người mua nhà cần quan tâm điều gì 4?', 179, 'mua-chung-cu-cuoi-nam-nguoi-mua-nha-can-quan-tam-dieu-gi-4.jpg', 'mua-chung-cu-cuoi-nam-nguoi-mua-nha-can-quan-tam-dieu-gi-4-thumb.jpg', 1, 'Mua chung cư cuối năm, người mua nhà cần quan tâm điều gì 4?', '', '', '', 'mua-chung-cu-cuoi-nam-nguoi-mua-nha-can-quan-tam-dieu-gi-4', 'Đây là nội dung mô tả cho, khách hàng có thể cập nhật lại trong phần quản trị cho phù hợp với lĩnh vực của mình', '<p>Đ&acirc;y l&agrave; nội dung m&ocirc; tả cho, kh&aacute;ch h&agrave;ng c&oacute; thể cập nhật lại trong phần quản trị cho ph&ugrave; hợp với lĩnh vực của m&igrave;nh</p>\r\n', 1, 1, 1, 0, 'null', '2020-04-16 13:53:15', '0000-00-00 00:00:00'),
(5, 'Cách bắt mạch bong bóng bất động sản năm 2019 để vượt qua', 179, 'cach-bat-mach-bong-bong-bat-dong-san-nam-2019-de-vuot-qua.jpg', 'cach-bat-mach-bong-bong-bat-dong-san-nam-2019-de-vuot-qua-thumb.jpg', 1, 'Cách bắt mạch bong bóng bất động sản năm 2019 để vượt qua', '', '', '', 'cach-bat-mach-bong-bong-bat-dong-san-nam-2019-de-vuot-qua', 'Triều cường và ngập lụt là vấn đề đã tồn tại nhiều năm qua chứ không phải mới xảy ra tại Sài Gòn. Người dân thậm chí còn biết rõ khi mưa thì nơi nào sẽ ngập nhẹ và nơi nào ngập nặng. Mỗi khi có ngập úng, việc đi lại của người dân gặp rất nhiều khó khăn. Chưa kể, nhiều chung cư và tầng hầm để xe cũng bị tràn nước, gây hỏng hóc cho đồ nội thất trong nhà cũng như phương tiện đi lại.', '<p>Vừa qua do ảnh hưởng của cơn b&atilde;o số 9, cơn mưa to v&agrave;o cuối th&aacute;ng 11 đ&atilde; khiến h&agrave;ng loạt t&ograve;a nh&agrave; nằm tr&ecirc;n đường Nguyễn Hữu Cảnh (quận B&igrave;nh Thạnh), Phan X&iacute;ch Long (quận Ph&uacute; Nhuận), Nguyễn Biểu (quận 5), Huỳnh Tấn Ph&aacute;t (quận 7), L&ecirc; Văn Lương (Nh&agrave; B&egrave;)&hellip; bị ngập, nhấn ch&igrave;m nhiều &ocirc; t&ocirc; v&agrave; xe m&aacute;y của cư d&acirc;n.</p>\r\n\r\n<p>Chị T&uacute; (ngụ tại B&igrave;nh Thạnh) chia sẻ, hầu như năm n&agrave;o v&agrave;o m&ugrave;a mưa, người d&acirc;n ở đ&acirc;y cũng chịu cảnh ngập lụt. Đặc biệt, tại tuyến đường Nguyễn Hữu Cảnh, c&oacute; khi ngập qu&aacute; nửa xe m&aacute;y, n&ecirc;n việc di chuyển v&ocirc; c&ugrave;ng kh&oacute; khăn.</p>\r\n\r\n<p>T&igrave;nh trạng nước mưa d&acirc;ng cao v&agrave; ngập v&agrave;o hầm để xe đ&atilde; khiến cộng đồng cư d&acirc;n nhiều chung cư phải l&ecirc;n c&aacute;c diễn đ&agrave;n b&agrave;n t&aacute;n nhiều ng&agrave;y. Quan niệm chọn nh&agrave; trước kia thường theo ti&ecirc;u ch&iacute; nhất cận thị, nhị cận giang, tam cận lộ, th&igrave; nay cần c&acirc;n nhắc th&ecirc;m dự &aacute;n đ&oacute; c&oacute; nằm trong khu vực thường xuy&ecirc;n bị ngập nước hay kh&ocirc;ng.</p>\r\n\r\n<p>Việc dự &aacute;n nằm trong khu vực dễ bị ngập lụt kh&ocirc;ng chỉ t&aacute;c động đến cuộc sống của gia chủ, m&agrave; t&agrave;i sản trong gia đ&igrave;nh cũng bị thiệt hại. V&igrave; vậy, yếu tố về những cung đường ngập nước trở th&agrave;nh mối quan t&acirc;m của kh&aacute;ch h&agrave;ng khi mua chung cư l&agrave; điều dễ hiểu.</p>\r\n\r\n<p>Trao đổi với ph&oacute;ng vi&ecirc;n B&aacute;o Đầu tư Bất động sản, b&agrave; Trần Thu Hương &ndash; Ph&oacute; gi&aacute;m đốc một c&ocirc;ng ty m&ocirc;i giới địa ốc tr&ecirc;n địa b&agrave;n quận Thủ Đức cho hay, c&aacute;c cơn mưa lớn g&acirc;y ngập v&agrave; thiệt hại khắp TP.HCM trong thời gian gần đ&acirc;y c&agrave;ng l&agrave;m dấy th&ecirc;m nỗi lo, trăn trở của người mua nh&agrave; v&agrave; cả doanh nghiệp ph&aacute;t triển dự &aacute;n.</p>\r\n\r\n<p>&ldquo;Người mua nh&agrave; hiện nay c&oacute; qu&aacute; nhiều vấn đề cần lo ngại, ngo&agrave;i yếu tố vị tr&iacute;, chất lượng, gi&aacute; cả, c&ograve;n ch&uacute; &yacute; th&ecirc;m m&ocirc;i trường sống, chất lượng kh&ocirc;ng kh&iacute;, cơ sở hạ tầng&hellip; v&agrave; nay l&agrave; ngập &uacute;ng&rdquo;, b&agrave; Hương cho biết th&ecirc;m.</p>\r\n', 1, 1, 0, 0, 'null', '2020-04-16 13:53:59', '2020-04-17 17:51:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_newsland_menu`
--

CREATE TABLE `tbl_newsland_menu` (
  `id` int(11) NOT NULL,
  `cateID` int(11) NOT NULL,
  `newsLandID` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_newsland_menu`
--

INSERT INTO `tbl_newsland_menu` (`id`, `cateID`, `newsLandID`, `created_at`) VALUES
(122, 164, 12, '2020-04-28 19:25:27'),
(123, 165, 11, '2020-04-28 19:26:01'),
(124, 165, 10, '2020-04-28 19:26:25'),
(125, 163, 9, '2020-04-28 19:27:00'),
(126, 182, 8, '2020-04-28 19:27:47'),
(127, 181, 7, '2020-04-28 19:28:31'),
(128, 183, 6, '2020-04-28 19:29:07'),
(129, 182, 5, '2020-04-28 19:29:27'),
(130, 181, 4, '2020-04-28 19:29:37'),
(131, 180, 3, '2020-04-28 19:30:40'),
(133, 164, 23, '2020-04-28 22:06:02'),
(137, 164, 26, '2020-04-29 09:34:32'),
(139, 181, 27, '2020-04-29 11:37:44');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_newsland_photo`
--

CREATE TABLE `tbl_newsland_photo` (
  `id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thumb` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `uuid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `newsLandID` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_newsland_photo`
--

INSERT INTO `tbl_newsland_photo` (`id`, `image`, `thumb`, `uuid`, `newsLandID`, `created_at`) VALUES
(8, '2-21440.jpg', '2-21440_thumb.jpg', 'e4ba3dd3-2e16-46fd-81fd-922ef66bae7a', 12, '2020-04-17 13:58:22'),
(9, '3-9735.jpg', '3-9735_thumb.jpg', '23f46828-6a90-4c3d-9a25-c60e0d479fe0', 12, '2020-04-17 13:58:22'),
(10, '4-37885.jpg', '4-37885_thumb.jpg', '3d363aed-f34f-4c02-87ba-d8f2bdc3d622', 12, '2020-04-17 13:58:22'),
(11, '5-5624.jpg', '5-5624_thumb.jpg', '67ff0d23-a4ad-4f31-a917-24862d08f441', 12, '2020-04-17 13:58:22'),
(12, '6-22679.jpg', '6-22679_thumb.jpg', '9472ba88-3211-4c3b-b255-7d2551a45a61', 12, '2020-04-17 13:58:22'),
(13, '7-74737.jpg', '7-74737_thumb.jpg', 'f4d86a8e-d5ce-4e51-8b0d-174b71680a73', 12, '2020-04-17 13:58:22'),
(14, '4-62086.jpg', '4-62086_thumb.jpg', 'd0c6058f-1830-41ba-bb25-2bfa3b471159', 11, '2020-04-17 16:27:06'),
(15, '3-69071.jpg', '3-69071_thumb.jpg', '694b7d7a-fd9e-48a6-b222-cebcf80e2865', 11, '2020-04-17 16:27:06'),
(16, '5-56169.jpg', '5-56169_thumb.jpg', '0f135bc0-8a84-4f46-aa48-12a0812f99b5', 11, '2020-04-17 16:27:06'),
(17, '6-3528.jpg', '6-3528_thumb.jpg', '0c634b05-0220-4c7e-b0af-3a2cdb278d64', 11, '2020-04-17 16:27:06'),
(18, '7-53365.jpg', '7-53365_thumb.jpg', '6347a2d8-e2bc-40c5-8db4-f959874a3978', 11, '2020-04-17 16:27:06'),
(19, '20180402151400-0ffd_wm-53591.jpg', '20180402151400-0ffd_wm-53591_thumb.jpg', 'abaebef0-52bc-4636-b4b2-0047e1d53a1d', 23, '2020-04-23 09:45:05'),
(20, '20190629071432-ab39_wm-37975.jpg', '20190629071432-ab39_wm-37975_thumb.jpg', '01582e48-a414-452a-9006-4e0425495821', 23, '2020-04-23 09:45:06'),
(21, '20190629071426-3f13_wm-46493.jpg', '20190629071426-3f13_wm-46493_thumb.jpg', 'a22676d2-4f53-4278-888b-1fc2e17308ed', 23, '2020-04-23 09:45:06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news_land`
--

CREATE TABLE `tbl_news_land` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cateid` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `ward_id` int(11) NOT NULL,
  `street_id` int(11) NOT NULL,
  `map_lat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `map_long` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dia_chi` text COLLATE utf8_unicode_ci NOT NULL,
  `direction_id` int(11) NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `unit` tinyint(1) NOT NULL,
  `deal` tinyint(1) NOT NULL,
  `price_detail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `area` int(11) NOT NULL,
  `facade` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `highway` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `number_floor` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `room` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `toliet` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `video` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `map` text COLLATE utf8_unicode_ci NOT NULL,
  `des` text COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `meta_keyword` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thumb` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `hot` tinyint(1) NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_news_land`
--

INSERT INTO `tbl_news_land` (`id`, `role_id`, `id_user`, `name`, `title`, `cateid`, `city_id`, `district_id`, `ward_id`, `street_id`, `map_lat`, `map_long`, `dia_chi`, `direction_id`, `alias`, `price`, `unit`, `deal`, `price_detail`, `area`, `facade`, `highway`, `number_floor`, `room`, `toliet`, `video`, `map`, `des`, `content`, `meta_keyword`, `meta_description`, `image`, `thumb`, `code`, `hot`, `publish`, `created_at`, `updated_at`) VALUES
(3, 1, 1, 'Căn hộ 2 phòng ngủ 2 WC giá từ 1,2 tỷ/căn liền kề 3 trường đại học, chiết khấu 3%', 'Căn hộ 2 phòng ngủ 2 WC giá từ 1,2 tỷ/căn liền kề 3 trường đại học, chiết khấu 3%', 180, 2, 25, 7, 7, '10.9069012', '106.6409883', '20 Đăng Thúc Vịnh, Xã Đông Thạnh, Huyện Hóc Môn, Thành phố Hồ Chí Minh', 4, 'can-ho-2-phong-ngu-2-wc-gia-tu-12-tycan-lien-ke-3-truong-dai-hoc-chiet-khau-3', 0, 4, 1, '', 50, '20', '8', '4', '5', '5', '', '', '', '<p>Vị tr&iacute;:</p>\r\n\r\n<p>Tọa lạc ở vị tr&iacute; đẹp, nh&agrave; g&oacute;c 2 mặt tiền đường số 8 KDC Trung Sơn cao cấp, nơi tập trung kinh doanh nh&agrave; h&agrave;ng, kh&aacute;ch sạn, karaoke, ng&acirc;n h&agrave;ng lớn sầm uất.</p>\r\n\r\n<p>&bull; Diện t&iacute;ch đất: 5x20m</p>\r\n\r\n<p>&bull; Diện t&iacute;ch s&agrave;n: 325m2</p>\r\n\r\n<p>Quy m&ocirc;: 1 trệt &ndash; 1 lửng &ndash; 3 lầu &ndash; s&acirc;n thượng . Hiện tại đang kinh doanh kh&aacute;ch sạn 15 ph&ograve;ng, l&agrave; đường lớn n&ecirc;n doanh thu cao từ 150 &ndash; 200 triệu/ th&aacute;ng.</p>\r\n\r\n<p>Tiện &iacute;ch</p>\r\n\r\n<p>&bull; Nh&agrave; g&oacute;c 2 mặt tiền đường số 8 mặt đường rộng 20m đối diện bệnh viện Nam S&agrave;i G&ograve;n v&agrave; một mặt đường rộng 8m. Gần khu đ&ocirc; thị Ph&uacute; Mỹ Hưng, trường đại học quốc tế RMIT, dự &aacute;n căn hộ S&agrave;i g&ograve;n Mia, Bệnh viện Nam S&agrave;i G&ograve;n, KDC ven s&ocirc;ng, tho&aacute;ng m&aacute;t&hellip;</p>\r\n\r\n<p>&bull; Khu vực an ninh chặt chẽ, khu d&acirc;n cư tr&iacute; thức, kh&ocirc;ng ngập nước, kh&ocirc;ng kẹt xe.</p>\r\n\r\n<p>&bull; Kết nối giao th&ocirc;ng thuận tiện đến c&aacute;c trung t&acirc;m th&agrave;nh phố quận 1, quận 5, quận 7&hellip; chỉ mất 5 ph&uacute;t đi xe.</p>\r\n\r\n<p>Ph&aacute;p l&yacute;: c&oacute; sổ hồng ch&iacute;nh chủ.</p>\r\n', '', '', '1.jpg', '1_thumb.jpg', '', 1, 1, '2020-04-16 14:24:53', '2020-04-28 19:30:40'),
(4, 1, 1, 'Nhà chính chủ 134m2, có sân vườn, sân trước rộng đỗ ô tô, đường xe tải', 'Nhà chính chủ 134m2, có sân vườn, sân trước rộng đỗ ô tô, đường xe tải', 181, 2, 5, 4, 9, '10.7722768', '106.7221381', '35 Mai Chí Thọ, P. Thủ Thiêm, Quận 2, Thành phố Hồ Chí Minh', 3, 'nha-chinh-chu-134m2-co-san-vuon-san-truoc-rong-do-o-to-duong-xe-tai', 1800000000, 1, 0, '1 tỉ 800', 134, '20', '5', '3', '5', '5', '', '', '', '<p>Vị tr&iacute;:</p>\r\n\r\n<p>Tọa lạc ở vị tr&iacute; đẹp, nh&agrave; g&oacute;c 2 mặt tiền đường số 8 KDC Trung Sơn cao cấp, nơi tập trung kinh doanh nh&agrave; h&agrave;ng, kh&aacute;ch sạn, karaoke, ng&acirc;n h&agrave;ng lớn sầm uất.</p>\r\n\r\n<p>&bull; Diện t&iacute;ch đất: 5x20m</p>\r\n\r\n<p>&bull; Diện t&iacute;ch s&agrave;n: 325m2</p>\r\n\r\n<p>Quy m&ocirc;: 1 trệt &ndash; 1 lửng &ndash; 3 lầu &ndash; s&acirc;n thượng . Hiện tại đang kinh doanh kh&aacute;ch sạn 15 ph&ograve;ng, l&agrave; đường lớn n&ecirc;n doanh thu cao từ 150 &ndash; 200 triệu/ th&aacute;ng.</p>\r\n\r\n<p>Tiện &iacute;ch</p>\r\n\r\n<p>&bull; Nh&agrave; g&oacute;c 2 mặt tiền đường số 8 mặt đường rộng 20m đối diện bệnh viện Nam S&agrave;i G&ograve;n v&agrave; một mặt đường rộng 8m. Gần khu đ&ocirc; thị Ph&uacute; Mỹ Hưng, trường đại học quốc tế RMIT, dự &aacute;n căn hộ S&agrave;i g&ograve;n Mia, Bệnh viện Nam S&agrave;i G&ograve;n, KDC ven s&ocirc;ng, tho&aacute;ng m&aacute;t&hellip;</p>\r\n\r\n<p>&bull; Khu vực an ninh chặt chẽ, khu d&acirc;n cư tr&iacute; thức, kh&ocirc;ng ngập nước, kh&ocirc;ng kẹt xe.</p>\r\n\r\n<p>&bull; Kết nối giao th&ocirc;ng thuận tiện đến c&aacute;c trung t&acirc;m th&agrave;nh phố quận 1, quận 5, quận 7&hellip; chỉ mất 5 ph&uacute;t đi xe.</p>\r\n\r\n<p>Ph&aacute;p l&yacute;: c&oacute; sổ hồng ch&iacute;nh chủ.</p>\r\n', '', '', '4.jpg', '4_thumb.jpg', '', 1, 1, '2020-04-16 14:29:13', '2020-04-28 19:29:37'),
(5, 1, 1, 'Cần bán nhanh lô đất 100m2 mặt tiền An Phú Tây – Hưng Long, chỉ 130 triệu, sổ hồng riêng, xây tự do', 'Cần bán nhanh lô đất 100m2 mặt tiền An Phú Tây – Hưng Long, chỉ 130 triệu, sổ hồng riêng, xây tự do', 182, 3, 7, 5, 10, '21.0372674', '105.8569193', 'Đường Phúc Tân, Hàng Đào, Hoàn Kiếm, Thành phố Hà Nội', 2, 'can-ban-nhanh-lo-dat-100m2-mat-tien-an-phu-tay-hung-long-chi-130-trieu-so-hong-rieng-xay-tu-do', 13000000, 3, 0, '13 triệu', 100, '20', '5', '4', '5', '5', '', '', '', '<p>Vị tr&iacute;:</p>\r\n\r\n<p>Tọa lạc ở vị tr&iacute; đẹp, nh&agrave; g&oacute;c 2 mặt tiền đường số 8 KDC Trung Sơn cao cấp, nơi tập trung kinh doanh nh&agrave; h&agrave;ng, kh&aacute;ch sạn, karaoke, ng&acirc;n h&agrave;ng lớn sầm uất.</p>\r\n\r\n<p>&bull; Diện t&iacute;ch đất: 5x20m</p>\r\n\r\n<p>&bull; Diện t&iacute;ch s&agrave;n: 325m2</p>\r\n\r\n<p>Quy m&ocirc;: 1 trệt &ndash; 1 lửng &ndash; 3 lầu &ndash; s&acirc;n thượng . Hiện tại đang kinh doanh kh&aacute;ch sạn 15 ph&ograve;ng, l&agrave; đường lớn n&ecirc;n doanh thu cao từ 150 &ndash; 200 triệu/ th&aacute;ng.</p>\r\n\r\n<p>Tiện &iacute;ch</p>\r\n\r\n<p>&bull; Nh&agrave; g&oacute;c 2 mặt tiền đường số 8 mặt đường rộng 20m đối diện bệnh viện Nam S&agrave;i G&ograve;n v&agrave; một mặt đường rộng 8m. Gần khu đ&ocirc; thị Ph&uacute; Mỹ Hưng, trường đại học quốc tế RMIT, dự &aacute;n căn hộ S&agrave;i g&ograve;n Mia, Bệnh viện Nam S&agrave;i G&ograve;n, KDC ven s&ocirc;ng, tho&aacute;ng m&aacute;t&hellip;</p>\r\n\r\n<p>&bull; Khu vực an ninh chặt chẽ, khu d&acirc;n cư tr&iacute; thức, kh&ocirc;ng ngập nước, kh&ocirc;ng kẹt xe.</p>\r\n\r\n<p>&bull; Kết nối giao th&ocirc;ng thuận tiện đến c&aacute;c trung t&acirc;m th&agrave;nh phố quận 1, quận 5, quận 7&hellip; chỉ mất 5 ph&uacute;t đi xe.</p>\r\n\r\n<p>Ph&aacute;p l&yacute;: c&oacute; sổ hồng ch&iacute;nh chủ.</p>\r\n', '', '', '21.jpg', '21_thumb.jpg', '', 1, 1, '2020-04-16 14:30:36', '2020-04-28 19:29:27'),
(6, 1, 1, 'Bán Đất Mặt Tiền Đường 15M DT 9m8 x 27m nở hậu', 'Bán Đất Mặt Tiền Đường 15M DT 9m8 x 27m nở hậu', 183, 2, 25, 14, 5, '10.8634183', '106.610889', 'Đường Tân Xuân, Xã Trung Chánh, Huyện Hóc Môn, Thành phố Hồ Chí Minh', 5, 'ban-dat-mat-tien-duong-15m-dt-9m8-x-27m-no-hau', 2350000000, 1, 0, '2 tỉ 350', 265, '20', '8', '4', '5', '5', '', '', '', '<p>Vị tr&iacute;:</p>\r\n\r\n<p>Tọa lạc ở vị tr&iacute; đẹp, nh&agrave; g&oacute;c 2 mặt tiền đường số 8 KDC Trung Sơn cao cấp, nơi tập trung kinh doanh nh&agrave; h&agrave;ng, kh&aacute;ch sạn, karaoke, ng&acirc;n h&agrave;ng lớn sầm uất.</p>\r\n\r\n<p>&bull; Diện t&iacute;ch đất: 5x20m</p>\r\n\r\n<p>&bull; Diện t&iacute;ch s&agrave;n: 325m2</p>\r\n\r\n<p>Quy m&ocirc;: 1 trệt &ndash; 1 lửng &ndash; 3 lầu &ndash; s&acirc;n thượng . Hiện tại đang kinh doanh kh&aacute;ch sạn 15 ph&ograve;ng, l&agrave; đường lớn n&ecirc;n doanh thu cao từ 150 &ndash; 200 triệu/ th&aacute;ng.</p>\r\n\r\n<p>Tiện &iacute;ch</p>\r\n\r\n<p>&bull; Nh&agrave; g&oacute;c 2 mặt tiền đường số 8 mặt đường rộng 20m đối diện bệnh viện Nam S&agrave;i G&ograve;n v&agrave; một mặt đường rộng 8m. Gần khu đ&ocirc; thị Ph&uacute; Mỹ Hưng, trường đại học quốc tế RMIT, dự &aacute;n căn hộ S&agrave;i g&ograve;n Mia, Bệnh viện Nam S&agrave;i G&ograve;n, KDC ven s&ocirc;ng, tho&aacute;ng m&aacute;t&hellip;</p>\r\n\r\n<p>&bull; Khu vực an ninh chặt chẽ, khu d&acirc;n cư tr&iacute; thức, kh&ocirc;ng ngập nước, kh&ocirc;ng kẹt xe.</p>\r\n\r\n<p>&bull; Kết nối giao th&ocirc;ng thuận tiện đến c&aacute;c trung t&acirc;m th&agrave;nh phố quận 1, quận 5, quận 7&hellip; chỉ mất 5 ph&uacute;t đi xe.</p>\r\n\r\n<p>Ph&aacute;p l&yacute;: c&oacute; sổ hồng ch&iacute;nh chủ.</p>\r\n', '', '', '7.jpg', '7_thumb.jpg', '', 1, 1, '2020-04-16 14:34:29', '2020-04-28 19:29:07'),
(7, 1, 1, 'Bán nhà phố góc 2 mặt tiền( khách sạn 15 phòng) khu Trung Sơn, Bình Chánh', 'Bán nhà phố góc 2 mặt tiền( khách sạn 15 phòng) khu Trung Sơn, Bình Chánh', 181, 2, 25, 12, 6, '10.8922848', '106.5705798', 'Dương Công Khi, Xã Tân Thới Nhì, Huyện Hóc Môn, Thành phố Hồ Chí Minh', 3, 'ban-nha-pho-goc-2-mat-tien-khach-san-15-phong-khu-trung-son-binh-chanh', 13000000000, 1, 0, '13 tỉ', 100, '20', '8', '4', '5', '5', '', '', '', '<p>Vị tr&iacute;:</p>\r\n\r\n<p>Tọa lạc ở vị tr&iacute; đẹp, nh&agrave; g&oacute;c 2 mặt tiền đường số 8 KDC Trung Sơn cao cấp, nơi tập trung kinh doanh nh&agrave; h&agrave;ng, kh&aacute;ch sạn, karaoke, ng&acirc;n h&agrave;ng lớn sầm uất.</p>\r\n\r\n<p>&bull; Diện t&iacute;ch đất: 5x20m</p>\r\n\r\n<p>&bull; Diện t&iacute;ch s&agrave;n: 325m2</p>\r\n\r\n<p>Quy m&ocirc;: 1 trệt &ndash; 1 lửng &ndash; 3 lầu &ndash; s&acirc;n thượng . Hiện tại đang kinh doanh kh&aacute;ch sạn 15 ph&ograve;ng, l&agrave; đường lớn n&ecirc;n doanh thu cao từ 150 &ndash; 200 triệu/ th&aacute;ng.</p>\r\n\r\n<p>Tiện &iacute;ch</p>\r\n\r\n<p>&bull; Nh&agrave; g&oacute;c 2 mặt tiền đường số 8 mặt đường rộng 20m đối diện bệnh viện Nam S&agrave;i G&ograve;n v&agrave; một mặt đường rộng 8m. Gần khu đ&ocirc; thị Ph&uacute; Mỹ Hưng, trường đại học quốc tế RMIT, dự &aacute;n căn hộ S&agrave;i g&ograve;n Mia, Bệnh viện Nam S&agrave;i G&ograve;n, KDC ven s&ocirc;ng, tho&aacute;ng m&aacute;t&hellip;</p>\r\n\r\n<p>&bull; Khu vực an ninh chặt chẽ, khu d&acirc;n cư tr&iacute; thức, kh&ocirc;ng ngập nước, kh&ocirc;ng kẹt xe.</p>\r\n\r\n<p>&bull; Kết nối giao th&ocirc;ng thuận tiện đến c&aacute;c trung t&acirc;m th&agrave;nh phố quận 1, quận 5, quận 7&hellip; chỉ mất 5 ph&uacute;t đi xe.</p>\r\n\r\n<p>Ph&aacute;p l&yacute;: c&oacute; sổ hồng ch&iacute;nh chủ.</p>\r\n', '', '', '6.jpg', '6_thumb.jpg', '', 1, 1, '2020-04-16 14:36:10', '2020-04-28 19:28:31'),
(8, 1, 1, 'Căn hộ Melody Âu Cơ, 68m2 view công viên hướng đông nam. Sang nhượng 1,95 tỷ full thuế phí', 'Căn hộ Melody Âu Cơ, 68m2 view công viên hướng đông nam. Sang nhượng 1,95 tỷ full thuế phí', 182, 2, 25, 15, 3, '10.8916262', '106.6162984', 'Đường Đặng Thúc Vịnh, Xã Thới Tam Thôn, Huyện Hóc Môn, Thành phố Hồ Chí Minh', 4, 'can-ho-melody-au-co-68m2-view-cong-vien-huong-dong-nam-sang-nhuong-195-ty-full-thue-phi', 1950000000, 1, 0, '1 tỉ 950', 65, '202', '5', '4', '5', '5', '', '', '', '<p>Vị tr&iacute;:</p>\r\n\r\n<p>Tọa lạc ở vị tr&iacute; đẹp, nh&agrave; g&oacute;c 2 mặt tiền đường số 8 KDC Trung Sơn cao cấp, nơi tập trung kinh doanh nh&agrave; h&agrave;ng, kh&aacute;ch sạn, karaoke, ng&acirc;n h&agrave;ng lớn sầm uất.</p>\r\n\r\n<p>&bull; Diện t&iacute;ch đất: 5x20m</p>\r\n\r\n<p>&bull; Diện t&iacute;ch s&agrave;n: 325m2</p>\r\n\r\n<p>Quy m&ocirc;: 1 trệt &ndash; 1 lửng &ndash; 3 lầu &ndash; s&acirc;n thượng . Hiện tại đang kinh doanh kh&aacute;ch sạn 15 ph&ograve;ng, l&agrave; đường lớn n&ecirc;n doanh thu cao từ 150 &ndash; 200 triệu/ th&aacute;ng.</p>\r\n\r\n<p>Tiện &iacute;ch</p>\r\n\r\n<p>&bull; Nh&agrave; g&oacute;c 2 mặt tiền đường số 8 mặt đường rộng 20m đối diện bệnh viện Nam S&agrave;i G&ograve;n v&agrave; một mặt đường rộng 8m. Gần khu đ&ocirc; thị Ph&uacute; Mỹ Hưng, trường đại học quốc tế RMIT, dự &aacute;n căn hộ S&agrave;i g&ograve;n Mia, Bệnh viện Nam S&agrave;i G&ograve;n, KDC ven s&ocirc;ng, tho&aacute;ng m&aacute;t&hellip;</p>\r\n\r\n<p>&bull; Khu vực an ninh chặt chẽ, khu d&acirc;n cư tr&iacute; thức, kh&ocirc;ng ngập nước, kh&ocirc;ng kẹt xe.</p>\r\n\r\n<p>&bull; Kết nối giao th&ocirc;ng thuận tiện đến c&aacute;c trung t&acirc;m th&agrave;nh phố quận 1, quận 5, quận 7&hellip; chỉ mất 5 ph&uacute;t đi xe.</p>\r\n\r\n<p>Ph&aacute;p l&yacute;: c&oacute; sổ hồng ch&iacute;nh chủ.</p>\r\n', '', '', '51.jpg', '51_thumb.jpg', '', 1, 1, '2020-04-16 14:37:24', '2020-04-28 19:27:47'),
(9, 1, 1, 'Cho thuê chung cư Carillon Tân Bình  65 m2  12tr/ tháng', 'Cho thuê chung cư Carillon Tân Bình  65 m2  12tr/ tháng', 163, 2, 5, 4, 8, '10.7720875', '106.7220448', '10 Mai Chí Thọ, P. Thủ Thiêm, Quận 2, Thành phố Hồ Chí Minh', 7, 'cho-thue-chung-cu-carillon-tan-binh-65-m2-12tr-thang', 12000000, 2, 0, '12 triệu', 65, '', '', '', '3', '3', '', '', '', '<p>Vị tr&iacute;:</p>\r\n\r\n<p>Tọa lạc ở vị tr&iacute; đẹp, nh&agrave; g&oacute;c 2 mặt tiền đường số 8 KDC Trung Sơn cao cấp, nơi tập trung kinh doanh nh&agrave; h&agrave;ng, kh&aacute;ch sạn, karaoke, ng&acirc;n h&agrave;ng lớn sầm uất.</p>\r\n\r\n<p>&bull; Diện t&iacute;ch đất: 5x20m</p>\r\n\r\n<p>&bull; Diện t&iacute;ch s&agrave;n: 325m2</p>\r\n\r\n<p>Quy m&ocirc;: 1 trệt &ndash; 1 lửng &ndash; 3 lầu &ndash; s&acirc;n thượng . Hiện tại đang kinh doanh kh&aacute;ch sạn 15 ph&ograve;ng, l&agrave; đường lớn n&ecirc;n doanh thu cao từ 150 &ndash; 200 triệu/ th&aacute;ng.</p>\r\n\r\n<p>Tiện &iacute;ch</p>\r\n\r\n<p>&bull; Nh&agrave; g&oacute;c 2 mặt tiền đường số 8 mặt đường rộng 20m đối diện bệnh viện Nam S&agrave;i G&ograve;n v&agrave; một mặt đường rộng 8m. Gần khu đ&ocirc; thị Ph&uacute; Mỹ Hưng, trường đại học quốc tế RMIT, dự &aacute;n căn hộ S&agrave;i g&ograve;n Mia, Bệnh viện Nam S&agrave;i G&ograve;n, KDC ven s&ocirc;ng, tho&aacute;ng m&aacute;t&hellip;</p>\r\n\r\n<p>&bull; Khu vực an ninh chặt chẽ, khu d&acirc;n cư tr&iacute; thức, kh&ocirc;ng ngập nước, kh&ocirc;ng kẹt xe.</p>\r\n\r\n<p>&bull; Kết nối giao th&ocirc;ng thuận tiện đến c&aacute;c trung t&acirc;m th&agrave;nh phố quận 1, quận 5, quận 7&hellip; chỉ mất 5 ph&uacute;t đi xe.</p>\r\n\r\n<p>Ph&aacute;p l&yacute;: c&oacute; sổ hồng ch&iacute;nh chủ.</p>\r\n', '', '', '41.jpg', '41_thumb.jpg', '', 0, 1, '2020-04-16 14:41:46', '2020-04-28 19:27:00'),
(10, 1, 1, 'Cho thuê nhà nguyên căn, Phường Bình Chiểu, Huyện Hóc Môn, Xã Nhị Bình', 'Cho thuê nhà Mặt Tiền Phạm Hùng Bình Chánh Giá 45tr/tháng', 165, 2, 25, 16, 2, '10.9111682', '106.6744876', '171 Bùi Công Trừng, Xã Nhị Bình, Huyện Hóc Môn, Thành phố Hồ Chí Minh', 4, 'cho-thue-nha-nguyen-can-phuong-binh-chieu-huyen-hoc-mon-xa-nhi-binh', 45000000, 2, 0, '45 triệu', 120, '', '', '4', '5', '5', '', '', '', '<p>Vị tr&iacute;:</p>\r\n\r\n<p>Tọa lạc ở vị tr&iacute; đẹp, nh&agrave; g&oacute;c 2 mặt tiền đường số 8 KDC Trung Sơn cao cấp, nơi tập trung kinh doanh nh&agrave; h&agrave;ng, kh&aacute;ch sạn, karaoke, ng&acirc;n h&agrave;ng lớn sầm uất.</p>\r\n\r\n<p>&bull; Diện t&iacute;ch đất: 5x20m</p>\r\n\r\n<p>&bull; Diện t&iacute;ch s&agrave;n: 325m2</p>\r\n\r\n<p>Quy m&ocirc;: 1 trệt &ndash; 1 lửng &ndash; 3 lầu &ndash; s&acirc;n thượng . Hiện tại đang kinh doanh kh&aacute;ch sạn 15 ph&ograve;ng, l&agrave; đường lớn n&ecirc;n doanh thu cao từ 150 &ndash; 200 triệu/ th&aacute;ng.</p>\r\n\r\n<p>Tiện &iacute;ch</p>\r\n\r\n<p>&bull; Nh&agrave; g&oacute;c 2 mặt tiền đường số 8 mặt đường rộng 20m đối diện bệnh viện Nam S&agrave;i G&ograve;n v&agrave; một mặt đường rộng 8m. Gần khu đ&ocirc; thị Ph&uacute; Mỹ Hưng, trường đại học quốc tế RMIT, dự &aacute;n căn hộ S&agrave;i g&ograve;n Mia, Bệnh viện Nam S&agrave;i G&ograve;n, KDC ven s&ocirc;ng, tho&aacute;ng m&aacute;t&hellip;</p>\r\n\r\n<p>&bull; Khu vực an ninh chặt chẽ, khu d&acirc;n cư tr&iacute; thức, kh&ocirc;ng ngập nước, kh&ocirc;ng kẹt xe.</p>\r\n\r\n<p>&bull; Kết nối giao th&ocirc;ng thuận tiện đến c&aacute;c trung t&acirc;m th&agrave;nh phố quận 1, quận 5, quận 7&hellip; chỉ mất 5 ph&uacute;t đi xe.</p>\r\n\r\n<p>Ph&aacute;p l&yacute;: c&oacute; sổ hồng ch&iacute;nh chủ.</p>\r\n', '', '', '31.jpg', '31_thumb.jpg', '', 0, 1, '2020-04-16 14:43:57', '2020-04-28 19:26:25'),
(11, 1, 1, 'Cho thuê nhà nguyên căn, Phường Bình Chiểu, Quận Thủ Đức trong cư xá Savimex', 'Cho thuê nhà nguyên căn, Phường Bình Chiểu, Quận Thủ Đức trong cư xá Savimex', 165, 2, 25, 14, 5, '10.8634183', '106.610889', 'Đường Tân Xuân, Xã Trung Chánh, Huyện Hóc Môn, Thành phố Hồ Chí Minh', 5, 'cho-thue-nha-nguyen-can-phuong-binh-chieu-quan-thu-duc-trong-cu-xa-savimex', 30000000, 2, 0, '30 triệu', 500, '20', '5', '6', '5', '5', '', '', '', '<p>Vị tr&iacute;:</p>\r\n\r\n<p>Tọa lạc ở vị tr&iacute; đẹp, nh&agrave; g&oacute;c 2 mặt tiền đường số 8 KDC Trung Sơn cao cấp, nơi tập trung kinh doanh nh&agrave; h&agrave;ng, kh&aacute;ch sạn, karaoke, ng&acirc;n h&agrave;ng lớn sầm uất.</p>\r\n\r\n<p>&bull; Diện t&iacute;ch đất: 5x20m</p>\r\n\r\n<p>&bull; Diện t&iacute;ch s&agrave;n: 325m2</p>\r\n\r\n<p>Quy m&ocirc;: 1 trệt &ndash; 1 lửng &ndash; 3 lầu &ndash; s&acirc;n thượng . Hiện tại đang kinh doanh kh&aacute;ch sạn 15 ph&ograve;ng, l&agrave; đường lớn n&ecirc;n doanh thu cao từ 150 &ndash; 200 triệu/ th&aacute;ng.</p>\r\n\r\n<p>Tiện &iacute;ch</p>\r\n\r\n<p>&bull; Nh&agrave; g&oacute;c 2 mặt tiền đường số 8 mặt đường rộng 20m đối diện bệnh viện Nam S&agrave;i G&ograve;n v&agrave; một mặt đường rộng 8m. Gần khu đ&ocirc; thị Ph&uacute; Mỹ Hưng, trường đại học quốc tế RMIT, dự &aacute;n căn hộ S&agrave;i g&ograve;n Mia, Bệnh viện Nam S&agrave;i G&ograve;n, KDC ven s&ocirc;ng, tho&aacute;ng m&aacute;t&hellip;</p>\r\n\r\n<p>&bull; Khu vực an ninh chặt chẽ, khu d&acirc;n cư tr&iacute; thức, kh&ocirc;ng ngập nước, kh&ocirc;ng kẹt xe.</p>\r\n\r\n<p>&bull; Kết nối giao th&ocirc;ng thuận tiện đến c&aacute;c trung t&acirc;m th&agrave;nh phố quận 1, quận 5, quận 7&hellip; chỉ mất 5 ph&uacute;t đi xe.</p>\r\n\r\n<p>Ph&aacute;p l&yacute;: c&oacute; sổ hồng ch&iacute;nh chủ.</p>\r\n', '', '', '22.jpg', '22_thumb.jpg', '', 0, 1, '2020-04-16 14:47:59', '2020-04-28 19:26:01'),
(12, 1, 1, 'Cho thuê nhà riêng mặt tiền Quận Thủ Đức giá 45tr tháng', 'Cho thuê nhà riêng mặt tiền Quận Thủ Đức giá 45tr tháng', 164, 2, 25, 14, 4, '10.8557652', '106.6073406', 'Đường Nguyễn Ảnh Thủ, Xã Trung Chánh, Huyện Hóc Môn, Thành phố Hồ Chí Minh', 3, 'cho-thue-nha-rieng-mat-tien-quan-thu-duc-gia-45tr-thang', 45000000, 2, 0, '45 triệu', 30, '20', '5', '4', '5', '5', 'c8RAGSXglc4', '', '', '<p>Vị tr&iacute;:</p>\r\n\r\n<p>Tọa lạc ở vị tr&iacute; đẹp, nh&agrave; g&oacute;c 2 mặt tiền đường số 8 KDC Trung Sơn cao cấp, nơi tập trung kinh doanh nh&agrave; h&agrave;ng, kh&aacute;ch sạn, karaoke, ng&acirc;n h&agrave;ng lớn sầm uất.</p>\r\n\r\n<p>&bull; Diện t&iacute;ch đất: 5x20m</p>\r\n\r\n<p>&bull; Diện t&iacute;ch s&agrave;n: 325m2</p>\r\n\r\n<p>Quy m&ocirc;: 1 trệt &ndash; 1 lửng &ndash; 3 lầu &ndash; s&acirc;n thượng . Hiện tại đang kinh doanh kh&aacute;ch sạn 15 ph&ograve;ng, l&agrave; đường lớn n&ecirc;n doanh thu cao từ 150 &ndash; 200 triệu/ th&aacute;ng.</p>\r\n\r\n<p>Tiện &iacute;ch</p>\r\n\r\n<p>&bull; Nh&agrave; g&oacute;c 2 mặt tiền đường số 8 mặt đường rộng 20m đối diện bệnh viện Nam S&agrave;i G&ograve;n v&agrave; một mặt đường rộng 8m. Gần khu đ&ocirc; thị Ph&uacute; Mỹ Hưng, trường đại học quốc tế RMIT, dự &aacute;n căn hộ S&agrave;i g&ograve;n Mia, Bệnh viện Nam S&agrave;i G&ograve;n, KDC ven s&ocirc;ng, tho&aacute;ng m&aacute;t&hellip;</p>\r\n\r\n<p>&bull; Khu vực an ninh chặt chẽ, khu d&acirc;n cư tr&iacute; thức, kh&ocirc;ng ngập nước, kh&ocirc;ng kẹt xe.</p>\r\n\r\n<p>&bull; Kết nối giao th&ocirc;ng thuận tiện đến c&aacute;c trung t&acirc;m th&agrave;nh phố quận 1, quận 5, quận 7&hellip; chỉ mất 5 ph&uacute;t đi xe.</p>\r\n\r\n<p>Ph&aacute;p l&yacute;: c&oacute; sổ hồng ch&iacute;nh chủ.</p>\r\n', '', '', '11.jpg', '11_thumb.jpg', '', 0, 1, '2020-04-16 14:52:33', '2020-04-28 19:25:27'),
(23, 1, 1, 'NGAY LOTTE Q.7, HỖ TRỢ 500K CHỈ TỪ 3.0TR-5TR/TH. TÒA NHÀ 8 TẦNG ĐÃ NGHIỆM THU PCCC-LH: 0988.373.***', 'NGAY LOTTE Q.7, HỖ TRỢ 500K CHỈ TỪ 3.0TR-5TR/TH. TÒA NHÀ 8 TẦNG ĐÃ NGHIỆM THU PCCC-LH: 0988.373.***', 164, 2, 25, 14, 4, '10.8557652', '106.6073406', 'Đường Nguyễn Ảnh Thủ, Xã Trung Chánh, Huyện Hóc Môn, Thành phố Hồ Chí Minh', 1, 'ngay-lotte-q7-ho-tro-500k-chi-tu-30tr5trth-toa-nha-8-tang-da-nghiem-thu-pccclh-0988373', 3000000, 2, 0, '3 triệu', 25, '', '', '', '', '', '', '', '', '<p>- Alo ch&uacute;ng tớ đang hỗ trợ anh chị em thu&ecirc; nh&agrave; giảm gi&aacute; th&aacute;ng 05.2020 để chia sẻ kh&oacute; khăn do dịch Corona với gi&aacute; bao rẻ to&agrave;n thị trường, nhanh tay nh&eacute; v&igrave; ch&uacute;ng tớ chỉ c&ograve;n 2 ph&ograve;ng trống th&aacute;ng n&agrave;y th&ocirc;i.<br />\r\nỞ sảng kho&aacute;i với ch&uacute;ng tớ tại.<br />\r\n80 đường Số 3, ngay Lotte Q. 7 - Ms H&ograve;a&nbsp;0988.373.***.<br />\r\nNgay dưới t&ograve;a nh&agrave; l&agrave; &quot;Ốc Lang thang&quot; đủ c&aacute;c m&oacute;n ăn ngon.<br />\r\nCăn ph&ograve;ng d&agrave;nh cho bạn th&igrave; đầy đủ tiện nghi, tiết kiệm điện v&agrave; bảo vệ m&ocirc;i trường với hệ đ&egrave;n led - Nước n&oacute;ng năng lượng mặt trời - M&aacute;y lạnh Inverter - WC v&agrave; bếp ri&ecirc;ng tiện nghi v&agrave; tự do trong t&ograve;a nh&agrave; 8 tầng mới x&acirc;y sạch - đẹp - văn minh - nh&acirc;n &aacute;i.<br />\r\n<br />\r\nAn to&agrave;n tuyệt đối PCCC bởi v&igrave; t&ograve;a nh&agrave; ch&uacute;ng t&ocirc;i đ&atilde; được thẩm duyệt PCCC v&agrave; nghiệm thu, đảm bảo an to&agrave;n cho to&agrave;n bộ cư d&acirc;n y&ecirc;n vui sống v&agrave; l&agrave;m việc!<br />\r\n<br />\r\nĐặc biệt c&aacute;c ph&ograve;ng đều c&oacute; cửa sổ view ra ngo&agrave;i đường tho&aacute;ng, đẹp lấy kh&iacute; trời.<br />\r\n- Cộng đồng cư d&acirc;n tri thức văn ph&ograve;ng.<br />\r\n- Hệ thống quản l&yacute; chuy&ecirc;n nghiệp, PCCC chuẩn cao cấp c&oacute; bảo hiểm t&ograve;a nh&agrave; trị gi&aacute; 10 tỷ.<br />\r\n- T&ograve;a nh&agrave; c&oacute; thang m&aacute;y thẻ từ cao cấp, camera an ninh, bảo vệ 24/7 đảm bảo an ninh an to&agrave;n tuyệt đối.<br />\r\n- Dịch vụ giặt v&agrave; sấy tự động gi&aacute; hợp l&yacute;.<br />\r\n- WC ri&ecirc;ng với thiết bị cao cấp, bếp l&aacute;t đ&aacute; sạch đẹp.<br />\r\n- Internet c&aacute;p quang 2 lines tốc độ cao.<br />\r\n- Truyền h&igrave;nh c&aacute;p.<br />\r\n- Ph&ograve;ng vip c&oacute; nội thất đẹp.<br />\r\n- Ph&ograve;ng c&oacute; g&aacute;c lửng rộng tho&aacute;ng sang trọng.</p>\r\n', '', '', '20190629071333-8086_wm.jpg', '20190629071333-8086_wm_thumb.jpg', '', 0, 1, '2020-04-23 09:45:37', '2020-04-28 22:06:02'),
(26, 1, 1, 'Nhà co thuê mặt phố Hóc Môn Trung Chánh 10tr/tháng', 'Nhà co thuê mặt phố Hóc Môn Trung Chánh 10tr/tháng', 164, 2, 25, 14, 4, '10.8557652', '106.6073406', 'Đường Nguyễn Ảnh Thủ, Xã Trung Chánh, Huyện Hóc Môn, Thành phố Hồ Chí Minh', 5, 'nha-co-thue-mat-pho-hoc-mon-trung-chanh-10trtha', 0, 4, 1, '', 30, '20', '5', '4', '5', '5', '', '', '', '', '', '', '', '', '', 1, 1, '2020-04-29 09:23:31', '2020-04-29 09:34:32'),
(27, 2, 24, 'Đăng tin test demo 1', 'Đăng tin test demo 1', 181, 2, 25, 14, 4, '10.852983462029028', '106.6053235788208', 'Đường Nguyễn Ảnh Thủ, Xã Trung Chánh, Huyện Hóc Môn, Thành phố Hồ Chí Minh', 5, 'dang-tin-test-demo-1', 0, 4, 1, '', 30, '20', '5', '3', '4', '3', 'hHW1oY26kxQ', '', '', '<p>test</p>\r\n', '', '', '', '', '', 0, 0, '2020-04-29 11:36:34', '2020-04-29 11:37:44'),
(28, 2, 24, 'tin dang nguoi dung user', '', 183, 3, 7, 5, 10, '21.033109022961725', '105.85033273809815', 'Đường Phúc Tân, Hàng Đào, Hoàn Kiếm, Thành phố Hà Nội', 5, 'tin-dang-nguoi-dung-user', 0, 4, 1, '', 30, '', '', '3', '3', '3', '', '', '', '', '', '', '3.jpg', '3_thumb.jpg', '', 0, 0, '2020-05-04 09:48:56', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `countryID` int(11) NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `street` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `postalcode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `userID` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_permission`
--

CREATE TABLE `tbl_permission` (
  `id` int(11) NOT NULL,
  `roleid` int(11) NOT NULL,
  `moduleid` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_permission`
--

INSERT INTO `tbl_permission` (`id`, `roleid`, `moduleid`, `active`, `created_at`) VALUES
(1, 1, 1, 1, '2018-07-19 17:37:01'),
(2, 1, 2, 1, '2018-07-19 17:37:02'),
(3, 1, 11, 1, '2018-07-19 17:37:03'),
(4, 1, 18, 1, '2018-07-19 17:37:03'),
(5, 1, 3, 1, '2018-07-19 17:37:05'),
(6, 1, 10, 1, '2018-07-19 17:37:06'),
(7, 1, 16, 1, '2018-07-19 17:37:07'),
(8, 1, 17, 1, '2018-07-19 17:37:07'),
(9, 1, 37, 1, '2018-07-19 17:50:47'),
(10, 1, 4, 1, '2018-07-19 17:50:59'),
(11, 1, 27, 1, '2018-07-19 17:51:00'),
(12, 1, 33, 1, '2018-07-19 17:51:01'),
(13, 1, 8, 1, '2018-07-19 17:51:01'),
(14, 1, 9, 1, '2018-07-19 17:51:02'),
(15, 1, 26, 1, '2018-07-19 17:51:02'),
(16, 1, 12, 1, '2018-07-19 17:51:03'),
(17, 1, 15, 1, '2018-07-19 17:51:03'),
(18, 1, 14, 1, '2018-07-19 17:51:05'),
(19, 1, 13, 1, '2018-07-19 17:51:05'),
(20, 1, 19, 1, '2018-07-19 17:51:06'),
(21, 1, 35, 1, '2018-07-19 17:51:08'),
(22, 1, 20, 1, '2018-07-19 17:51:09'),
(23, 1, 21, 1, '2018-07-19 17:51:10'),
(24, 1, 30, 1, '2018-07-19 17:51:11'),
(25, 1, 28, 1, '2018-07-19 17:51:12'),
(26, 1, 29, 1, '2018-07-19 17:51:12'),
(27, 1, 34, 1, '2018-07-19 17:51:13'),
(28, 1, 36, 1, '2018-07-19 17:51:13'),
(29, 2, 28, 1, '2018-07-19 17:58:09'),
(30, 2, 29, 0, '2018-07-19 17:58:10'),
(31, 2, 34, 1, '2018-07-19 17:58:12'),
(32, 2, 38, 1, '2018-07-19 18:08:01'),
(33, 2, 39, 1, '2018-07-19 18:08:02'),
(34, 2, 40, 1, '2018-07-19 18:19:45'),
(35, 2, 41, 1, '2018-07-19 18:19:45'),
(36, 2, 42, 1, '2018-07-19 18:19:46'),
(37, 2, 43, 1, '2018-07-19 18:19:47'),
(38, 1, 44, 1, '2018-10-15 11:42:05'),
(39, 2, 44, 1, '2018-10-15 11:42:08'),
(40, 1, 5, 1, '2018-11-06 09:39:04'),
(41, 1, 22, 1, '2018-11-06 09:39:04'),
(42, 1, 7, 1, '2018-11-06 09:39:05'),
(43, 1, 6, 1, '2018-11-06 09:39:05'),
(44, 1, 45, 1, '2018-11-07 15:09:20'),
(45, 1, 46, 1, '2018-11-16 14:57:10'),
(46, 1, 47, 1, '2018-11-16 14:57:11'),
(47, 1, 48, 1, '2018-11-17 09:11:52'),
(48, 1, 49, 1, '2018-11-18 21:38:04'),
(49, 1, 50, 1, '2018-11-29 10:04:18'),
(50, 1, 51, 1, '2018-11-29 10:04:19'),
(51, 1, 52, 1, '2018-11-29 10:55:13'),
(52, 1, 53, 1, '2018-12-13 15:59:30'),
(53, 1, 54, 1, '2018-12-25 09:50:29'),
(54, 1, 55, 1, '2018-12-28 11:13:13'),
(55, 1, 56, 1, '2019-07-17 09:20:19'),
(56, 1, 57, 1, '2019-07-17 09:55:26'),
(57, 1, 58, 1, '2019-07-17 16:12:49'),
(58, 2, 1, 1, '2019-08-02 11:40:31'),
(59, 2, 2, 1, '2019-08-02 11:40:32'),
(60, 2, 11, 1, '2019-08-02 11:40:33'),
(61, 2, 4, 1, '2019-08-02 11:40:42'),
(62, 2, 27, 1, '2019-08-02 11:40:43'),
(63, 2, 33, 1, '2019-08-02 11:40:44'),
(64, 2, 12, 1, '2019-08-02 11:40:49'),
(65, 2, 14, 1, '2019-08-02 11:40:50'),
(66, 2, 35, 1, '2019-08-02 11:40:51'),
(67, 2, 13, 1, '2019-08-02 11:40:52'),
(68, 2, 52, 1, '2019-08-02 11:40:54'),
(69, 2, 45, 1, '2019-08-02 11:40:57'),
(70, 2, 58, 1, '2019-09-24 10:26:39'),
(71, 2, 60, 1, '2019-09-24 10:26:42'),
(72, 2, 59, 1, '2019-09-24 10:26:44'),
(73, 1, 60, 1, '2019-09-24 10:26:48'),
(74, 1, 59, 1, '2019-09-24 10:26:49'),
(75, 1, 61, 1, '2019-09-24 11:50:10'),
(76, 2, 57, 1, '2019-09-24 11:50:12'),
(77, 2, 61, 1, '2019-09-24 11:50:13'),
(78, 1, 62, 1, '2019-09-24 11:55:38'),
(79, 2, 62, 1, '2019-09-24 11:55:39'),
(80, 1, 63, 1, '2019-09-25 09:50:38'),
(81, 1, 64, 1, '2019-09-25 09:50:38'),
(82, 2, 63, 1, '2019-09-25 09:50:39'),
(83, 2, 64, 1, '2019-09-25 09:50:39'),
(84, 2, 5, 1, '2019-09-25 09:50:42'),
(85, 2, 7, 1, '2019-09-25 09:50:43'),
(86, 1, 65, 1, '2019-09-25 09:52:30'),
(87, 2, 65, 1, '2019-09-25 09:52:32'),
(88, 2, 66, 1, '2020-03-09 10:08:05'),
(89, 1, 66, 1, '2020-03-09 10:08:06'),
(90, 2, 67, 1, '2020-03-09 10:11:35'),
(91, 1, 67, 1, '2020-03-09 10:11:37'),
(92, 1, 68, 1, '2020-03-09 10:31:18'),
(93, 2, 68, 1, '2020-03-09 10:31:21'),
(94, 2, 69, 1, '2020-03-09 10:34:02'),
(95, 1, 69, 1, '2020-03-09 10:34:04'),
(96, 2, 70, 1, '2020-03-09 10:44:53'),
(97, 1, 70, 1, '2020-03-09 10:44:55'),
(98, 2, 71, 1, '2020-03-10 10:55:17'),
(99, 1, 71, 1, '2020-03-10 10:55:18'),
(100, 2, 72, 1, '2020-03-10 17:30:29'),
(101, 1, 72, 1, '2020-03-10 17:30:32'),
(102, 2, 73, 1, '2020-03-24 09:22:02'),
(103, 1, 73, 1, '2020-03-24 09:22:03'),
(104, 2, 74, 1, '2020-03-24 11:43:26'),
(105, 1, 74, 1, '2020-03-24 11:43:27'),
(106, 2, 75, 1, '2020-04-01 12:59:42'),
(107, 1, 75, 1, '2020-04-01 12:59:43'),
(108, 2, 76, 1, '2020-04-01 13:18:00'),
(109, 1, 76, 1, '2020-04-01 13:18:00'),
(110, 2, 77, 1, '2020-04-01 15:44:02'),
(111, 1, 77, 1, '2020-04-01 15:44:03'),
(112, 2, 78, 1, '2020-04-03 16:45:43'),
(113, 1, 78, 1, '2020-04-03 16:45:44'),
(114, 2, 79, 1, '2020-04-10 10:43:35'),
(115, 1, 79, 1, '2020-04-10 10:43:36'),
(116, 2, 80, 1, '2020-04-10 11:29:26'),
(117, 1, 80, 1, '2020-04-10 11:29:27'),
(118, 1, 81, 1, '2020-04-10 12:08:07'),
(119, 2, 81, 1, '2020-04-10 12:08:08'),
(120, 2, 82, 1, '2020-04-13 11:10:26'),
(121, 1, 82, 1, '2020-04-13 11:10:26'),
(122, 2, 83, 1, '2020-04-13 17:36:33'),
(123, 1, 83, 1, '2020-04-13 17:36:33'),
(124, 2, 84, 1, '2020-04-14 17:08:51'),
(125, 1, 84, 1, '2020-04-14 17:08:51'),
(126, 1, 85, 1, '2020-04-14 20:00:58'),
(127, 2, 85, 1, '2020-04-14 20:00:59'),
(128, 2, 86, 1, '2020-04-15 09:25:21'),
(129, 1, 86, 1, '2020-04-15 09:25:22'),
(130, 2, 87, 1, '2020-04-15 09:28:11'),
(131, 1, 87, 1, '2020-04-15 09:28:12'),
(132, 2, 88, 1, '2020-04-15 09:54:34'),
(133, 1, 88, 1, '2020-04-15 09:54:34'),
(134, 1, 89, 1, '2020-04-22 22:32:33'),
(135, 2, 89, 1, '2020-04-22 22:32:34'),
(136, 2, 90, 1, '2020-04-24 13:39:21'),
(137, 1, 90, 1, '2020-04-24 13:39:22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_photo`
--

CREATE TABLE `tbl_photo` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text_link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text_des` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sort` int(11) NOT NULL,
  `thumb` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `des` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_photo`
--

INSERT INTO `tbl_photo` (`id`, `name`, `link`, `text_link`, `text_des`, `image`, `sort`, `thumb`, `publish`, `type`, `des`, `created_at`, `updated_at`) VALUES
(4, 'Nhà đất 1368', '', '', '', 'logo.png', 0, 'logo_thumb.png', 1, 'logo', '', '0000-00-00 00:00:00', '2020-04-16 11:59:35'),
(42, '400 triệu chiếc xe thể thao này có hời hay không?', 'MCDX7Dk6OZc', '', '', '', 3, '', 1, 'pageVideo', '', '2020-04-13 17:44:14', '0000-00-00 00:00:00'),
(43, '700 triệu nhập khẩu Trung Quốc - Brilliance V7', 'r2UPEFhbVvw', '', '', '', 4, '', 1, 'pageVideo', '', '2020-04-13 17:44:58', '0000-00-00 00:00:00'),
(44, 'Phụ tùng xe Tàu quá đắt, ĐỪNG MUA - Brilliance V7', 'OXF2ked0m40', '', '', '', 5, '', 1, 'pageVideo', '', '2020-04-13 17:45:36', '0000-00-00 00:00:00'),
(45, 'Đánh giá Mercedes-Maybach Pullman 2017', '43Q4gwd-u8w', '', '', '', 6, '', 1, 'pageVideo', '', '2020-04-13 17:45:58', '0000-00-00 00:00:00'),
(46, 'banner 1', '', '', '', '2.jpg', 7, '2_thumb.jpg', 1, 'banner', '', '2020-04-16 16:42:28', '0000-00-00 00:00:00'),
(47, 'banner 2', 'https://www.google.com/', '', '', '1.png', 8, '1_thumb.png', 1, 'banner', '', '2020-04-16 16:42:37', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_project`
--

CREATE TABLE `tbl_project` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cateid` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `ward_id` int(11) NOT NULL,
  `street_id` int(11) NOT NULL,
  `map_lat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `map_long` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dia_chi` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thumb` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_keyword` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `des` text COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `cateSB` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_project`
--

INSERT INTO `tbl_project` (`id`, `name`, `cateid`, `city_id`, `district_id`, `ward_id`, `street_id`, `map_lat`, `map_long`, `dia_chi`, `image`, `thumb`, `publish`, `title`, `meta_keyword`, `meta_description`, `alias`, `phone`, `website`, `email`, `des`, `content`, `cateSB`, `created_at`, `updated_at`) VALUES
(1, 'Khu đô thị mới Văn Phú', 170, 2, 24, 0, 0, '10.8372182', '106.6554915', 'Quang trung, Quận Gò Vấp, Thành phố Hồ Chí Minh', 'khu-do-thi-moi-van-phu.jpg', 'khu-do-thi-moi-van-phu-thumb.jpg', 1, 'Khu đô thị mới Văn Phú', '', '', 'khu-do-thi-moi-van-phu', '0334729143', 'http://www.optech.vn', 'thehop161098@gmail.com', '', '<p>Khu đ&ocirc; thị mới Trung H&ograve;a Nh&acirc;n Ch&iacute;nh l&agrave; dự &aacute;n KĐT lớn nhất v&agrave; đầu ti&ecirc;n của Tổng Cty xuất nhập khẩu x&acirc;y dựng Việt Nam nằm tại thủ đ&ocirc;.</p>\r\n\r\n<p>Theo quy hoạch tổng thể th&agrave;nh phố, Khu đ&ocirc; thị mới Trung H&ograve;a Nh&acirc;n Ch&iacute;nh l&agrave; một trong những trung t&acirc;m trọng yếu, nối liền khu c&ocirc;ng nghệ cao H&ograve;a Lạc với c&aacute;c khu phố trung t&acirc;m của Thủ đ&ocirc;, c&oacute; tầm quan trọng chiến lược về mặt kinh tế, x&atilde; hội v&agrave; văn h&oacute;a.</p>\r\n', '', '2020-04-23 17:03:08', '2020-04-28 20:14:33'),
(2, 'Dự án khu dân cư Bà Điểm', 169, 2, 25, 0, 0, '10.8411638', '106.5967126', '30/2 P Mũi Tàu, xã Bà Điểm, Huyện Hóc Môn', 'du-an-khu-dan-cu-ba-diem.jpg', 'du-an-khu-dan-cu-ba-diem-thumb.jpg', 1, 'Dự án khu dân cư Bà Điểm', '', '', 'du-an-khu-dan-cu-ba-diem', '0334729143', 'http://www.optech.vn', 'demo@gmail.com', '', '<p>Khu đ&ocirc; thị mới Trung H&ograve;a Nh&acirc;n Ch&iacute;nh l&agrave; dự &aacute;n KĐT lớn nhất v&agrave; đầu ti&ecirc;n của Tổng Cty xuất nhập khẩu x&acirc;y dựng Việt Nam nằm tại thủ đ&ocirc;.</p>\r\n\r\n<p>Theo quy hoạch tổng thể th&agrave;nh phố, Khu đ&ocirc; thị mới Trung H&ograve;a Nh&acirc;n Ch&iacute;nh l&agrave; một trong những trung t&acirc;m trọng yếu, nối liền khu c&ocirc;ng nghệ cao H&ograve;a Lạc với c&aacute;c khu phố trung t&acirc;m của Thủ đ&ocirc;, c&oacute; tầm quan trọng chiến lược về mặt kinh tế, x&atilde; hội v&agrave; văn h&oacute;a.</p>\r\n', '', '2020-04-23 17:05:13', '2020-04-28 20:14:01'),
(3, 'Dự án du lịch nghỉ dưỡng Hóc Môn', 174, 2, 25, 0, 0, '10.861964', '106.610967', '30/2 P nguyễn ảnh thủ,  xã Trung Chánh, Huyện Hóc Môn', 'du-an-du-lich-nghi-duong-hoc-mon.jpg', 'du-an-du-lich-nghi-duong-hoc-mon-thumb.jpg', 1, 'Dự án du lịch nghỉ dưỡng Hóc Môn', '', '', 'du-an-du-lich-nghi-duong-hoc-mon', '0334729143', '', '', '', '<p>Khu đ&ocirc; thị mới Trung H&ograve;a Nh&acirc;n Ch&iacute;nh l&agrave; dự &aacute;n KĐT lớn nhất v&agrave; đầu ti&ecirc;n của Tổng Cty xuất nhập khẩu x&acirc;y dựng Việt Nam nằm tại thủ đ&ocirc;.</p>\r\n\r\n<p>Theo quy hoạch tổng thể th&agrave;nh phố, Khu đ&ocirc; thị mới Trung H&ograve;a Nh&acirc;n Ch&iacute;nh l&agrave; một trong những trung t&acirc;m trọng yếu, nối liền khu c&ocirc;ng nghệ cao H&ograve;a Lạc với c&aacute;c khu phố trung t&acirc;m của Thủ đ&ocirc;, c&oacute; tầm quan trọng chiến lược về mặt kinh tế, x&atilde; hội v&agrave; văn h&oacute;a.</p>\r\n', '', '2020-04-23 17:06:17', '2020-04-28 20:13:45'),
(4, 'Khu thương mại dịch vụ HN', 173, 3, 7, 0, 0, '21.0346712', '105.8499465', 'Phường Hàng Đào, Hoàn Kiếm, Hà Nội', 'khu-thuong-mai-dich-vu-hn.jpg', 'khu-thuong-mai-dich-vu-hn-thumb.jpg', 1, 'Khu thương mại dịch vụ HN', '', '', 'khu-thuong-mai-dich-vu-hn', '', '', '', '', '<p>Khu đ&ocirc; thị mới Trung H&ograve;a Nh&acirc;n Ch&iacute;nh l&agrave; dự &aacute;n KĐT lớn nhất v&agrave; đầu ti&ecirc;n của Tổng Cty xuất nhập khẩu x&acirc;y dựng Việt Nam nằm tại thủ đ&ocirc;.</p>\r\n\r\n<p>Theo quy hoạch tổng thể th&agrave;nh phố, Khu đ&ocirc; thị mới Trung H&ograve;a Nh&acirc;n Ch&iacute;nh l&agrave; một trong những trung t&acirc;m trọng yếu, nối liền khu c&ocirc;ng nghệ cao H&ograve;a Lạc với c&aacute;c khu phố trung t&acirc;m của Thủ đ&ocirc;, c&oacute; tầm quan trọng chiến lược về mặt kinh tế, x&atilde; hội v&agrave; văn h&oacute;a.</p>\r\n', '', '2020-04-23 17:07:22', '2020-04-28 20:17:54'),
(5, 'Khu đô thị mới Phạm Văn Đồng', 170, 2, 28, 0, 0, '10.8403487', '106.7412172', '45 Phạm Văn Đồng, P.Linh Đông, Quận Thủ Đức', 'khu-do-thi-moi-pham-van-dong.jpg', 'khu-do-thi-moi-pham-van-dong-thumb.jpg', 1, 'Khu đô thị mới Phạm Văn Đồng', '', '', 'khu-do-thi-moi-pham-van-dong', '', '', '', '', '<p>Khu đ&ocirc; thị mới Trung H&ograve;a Nh&acirc;n Ch&iacute;nh l&agrave; dự &aacute;n KĐT lớn nhất v&agrave; đầu ti&ecirc;n của Tổng Cty xuất nhập khẩu x&acirc;y dựng Việt Nam nằm tại thủ đ&ocirc;.</p>\r\n\r\n<p>Theo quy hoạch tổng thể th&agrave;nh phố, Khu đ&ocirc; thị mới Trung H&ograve;a Nh&acirc;n Ch&iacute;nh l&agrave; một trong những trung t&acirc;m trọng yếu, nối liền khu c&ocirc;ng nghệ cao H&ograve;a Lạc với c&aacute;c khu phố trung t&acirc;m của Thủ đ&ocirc;, c&oacute; tầm quan trọng chiến lược về mặt kinh tế, x&atilde; hội v&agrave; văn h&oacute;a.</p>\r\n', '', '2020-04-24 10:33:54', '2020-04-28 20:17:31'),
(6, 'Dự án khu dân cư Bà Điểm', 169, 2, 25, 0, 0, '10.865393245993017', '106.61410121534423', 'Nguyễn Ảnh Thủ, Huyện Hóc Môn, Thành phố Hồ Chí Minh', 'du-an-khu-dan-cu-ba-diem-426.jpg', 'du-an-khu-dan-cu-ba-diem-426-thumb.jpg', 1, 'Dự án khu dân cư Bà Điểm', '', '', 'du-an-khu-dan-cu-ba-diem-426', '', '', '', '', '', '', '2020-04-28 20:19:02', '2020-04-28 20:19:37'),
(7, 'Dự án khu dân cư test demo', 169, 2, 25, 16, 2, '10.9111682', '106.6744876', '171 Bùi Công Trừng, Xã Nhị Bình, Huyện Hóc Môn, Thành phố Hồ Chí Minh', 'du-an-khu-dan-cu-test-demo-441.jpg', 'du-an-khu-dan-cu-test-demo-441-thumb.jpg', 1, 'Dự án khu dân cư test demo', '', '', 'du-an-khu-dan-cu-test-demo-441', '', '', '', '', '', '', '2020-04-29 10:11:18', '2020-04-29 11:38:22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`id`, `name`, `publish`, `created_at`, `updated_at`) VALUES
(1, 'Quản trị', 1, '2018-06-19 00:01:08', '2018-06-19 00:02:54'),
(2, 'Khách hàng', 1, '2018-07-19 17:54:03', '2020-04-22 10:32:56');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_searchprice`
--

CREATE TABLE `tbl_searchprice` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` bigint(50) NOT NULL,
  `sort` int(11) NOT NULL,
  `publish` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_searchprice`
--

INSERT INTO `tbl_searchprice` (`id`, `name`, `price`, `sort`, `publish`) VALUES
(1, '1 triệu', 1000000, 1, 1),
(2, '100 triệu', 100000000, 2, 1),
(3, '200 triệu', 200000000, 3, 1),
(4, '500 triệu', 500000000, 4, 1),
(5, '1 tỷ', 1000000000, 5, 1),
(6, '3 tỷ', 3000000000, 6, 1),
(7, '5 tỷ', 5000000000, 7, 1),
(8, '8 tỷ', 8000000000, 8, 1),
(9, '10 tỷ', 10000000000, 9, 1),
(11, '20 tỷ', 20000000000, 10, 1),
(12, '35 tỷ', 35000000000, 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_showroom`
--

CREATE TABLE `tbl_showroom` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sort` int(11) NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_showroom`
--

INSERT INTO `tbl_showroom` (`id`, `name`, `sort`, `publish`, `created_at`, `updated_at`) VALUES
(1, 'Hồ Chí Minh', 5, 1, '2020-03-03 16:29:51', '2020-04-24 11:16:19'),
(2, 'Bảo Lộc', 4, 1, '2020-03-03 16:30:08', '0000-00-00 00:00:00'),
(3, 'Nha Trang', 3, 1, '2020-03-03 16:30:14', '0000-00-00 00:00:00'),
(4, 'Đà Nẵng', 2, 1, '2020-03-03 16:30:22', '0000-00-00 00:00:00'),
(6, 'Vũng Tàu', 1, 1, '2020-03-03 17:20:21', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_street`
--

CREATE TABLE `tbl_street` (
  `id` int(11) NOT NULL,
  `ward_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_keyword` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_street`
--

INSERT INTO `tbl_street` (`id`, `ward_id`, `name`, `alias`, `title`, `meta_keyword`, `meta_description`) VALUES
(1, 19, 'Đường Phạm Văn Đồng', 'duong-pham-van-dong', 'Đường Phạm Văn Đồng', '', ''),
(2, 16, '171 Bùi Công Trừng', '171-bui-cong-trung', '171 Bùi Công Trừng', '', ''),
(3, 15, 'Đường Đặng Thúc Vịnh', 'duong-dang-thuc-vinh', 'Đường Đặng Thúc Vịnh', '', ''),
(4, 14, 'Đường Nguyễn Ảnh Thủ', 'duong-nguyen-anh-thu', 'Đường Nguyễn Ảnh Thủ', '', ''),
(5, 14, 'Đường Tân Xuân', 'duong-tan-xuan', 'Đường Tân Xuân', '', ''),
(6, 12, 'Dương Công Khi', 'duong-cong-khi', 'Dương Công Khi', '', ''),
(7, 7, '20 Đăng Thúc Vịnh', '20-dang-thuc-vinh', '20 Đăng Thúc Vịnh', '', ''),
(8, 4, '10 Mai Chí Thọ', '10-mai-chi-tho', '10 Mai Chí Thọ', '', ''),
(9, 4, '35 Mai Chí Thọ', '35-mai-chi-tho', '35 Mai Chí Thọ', '', ''),
(10, 5, 'Đường Phúc Tân', 'duong-phuc-tan', 'Đường Phúc Tân', '', ''),
(11, 18, 'Đường Mũi Tàu', 'duong-mui-tau', 'Đường Mũi Tàu', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_system`
--

CREATE TABLE `tbl_system` (
  `id` int(11) NOT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `contents` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_system`
--

INSERT INTO `tbl_system` (`id`, `type`, `contents`) VALUES
(1, 'system', '{\"title\":\"Nh\\u00e0 \\u0111\\u1ea5t 1368\",\"meta_keyword\":\"Nh\\u00e0 \\u0111\\u1ea5t 1368\",\"meta_description\":\"Nh\\u00e0 \\u0111\\u1ea5t 1368\",\"schema\":\"\",\"image\":\"favicon.jpg\",\"thumb\":\"favicon_thumb.jpg\",\"link\":\"\",\"updated_at\":\"2020-04-16 11:01:12\"}'),
(2, 'contact', '{\"company\":\"Nh\\u00e0 \\u0111\\u1ea5t 1368\",\"phone_sp\":\"0888090898\",\"email\":\"huuhieu121@gmail.com\",\"website\":\"https:\\/\\/optech.vn\\/\",\"hotline\":\"091 444 9225\",\"zalo\":\"091 444 9225\",\"address\":\"78-80 Ch\\u1ebf Lan Vi\\u00ean, Ph\\u01b0\\u1eddng T\\u00e2y Th\\u1ea1nh, Qu\\u1eadn T\\u00e2n Ph\\u00fa, tp.HCM\",\"map\":\"<iframe src=\\\"https:\\/\\/www.google.com\\/maps\\/embed?pb=!1m18!1m12!1m3!1d3918.5883272915516!2d106.7611113147496!3d10.842782992276545!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317527a5caa43ded%3A0xe68a899ce0909258!2zNzggxJDhurduZyBWxINuIEJpLCBCw6xuaCBUaOG7jSwgVGjhu6cgxJDhu6ljLCBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1564650806607!5m2!1svi!2s\\\" width=\\\"100%\\\" height=\\\"360\\\" frameborder=\\\"0\\\" style=\\\"border:0\\\" allowfullscreen><\\/iframe>\",\"fb_mobile\":\"robertthienbinh\",\"zalo_mobile\":\"0914449225\",\"phone_mobile\":\"0914449225\",\"key_map\":\"AIzaSyCjE5nAZ00uqL_EVFRNsUiueeMvk-tmT1c\"}'),
(3, 'socials', '{\"fanpage\":\"<iframe src=\\\"https:\\/\\/www.facebook.com\\/plugins\\/page.php?href=https%3A%2F%2Fwww.facebook.com%2Ffacebook&tabs&width=250&height=220&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=1278056805570815\\\" width=\\\"auto\\\" height=\\\"220\\\" style=\\\"border:none;overflow:hidden\\\" scrolling=\\\"no\\\" frameborder=\\\"0\\\" allowTransparency=\\\"true\\\" allow=\\\"encrypted-media\\\"><\\/iframe>\",\"facebook\":\"https:\\/\\/www.facebook.com\\/\",\"twitter\":\"https:\\/\\/www.twitter.com\\/\",\"linkedin\":\"https:\\/\\/www.linkedin.com\\/\",\"instagram\":\"https:\\/\\/www.instagram.com\\/\",\"youtube\":\"https:\\/\\/www.youtube.com\\/\"}'),
(4, 'googles', '{\"analytics\":\"\",\"webmasters\":\"\",\"sitemaps\":null}'),
(5, 'contentSite', '{\"title_partner\":\"\\u0110\\u1ed1i t\\u00e1c - kh\\u00e1ch h\\u00e0ng\",\"title_idea\":\"Kh\\u00e1ch h\\u00e0ng n\\u00f3i v\\u1ec1 ch\\u00fang t\\u00f4i\",\"title_news\":\"Tin t\\u1ee9c & S\\u1ef1 ki\\u1ec7n\",\"title_video\":\"Video Clip\"}'),
(6, 'registerCus', '{\"active_register\":null}');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tags`
--

CREATE TABLE `tbl_tags` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_tags`
--

INSERT INTO `tbl_tags` (`id`, `name`, `alias`) VALUES
(1, 'tin nổi bật', 'tin-noi-bat');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tags_detail`
--

CREATE TABLE `tbl_tags_detail` (
  `id` int(11) NOT NULL,
  `tagsID` int(11) NOT NULL,
  `newsID` int(11) NOT NULL,
  `projectID` int(11) NOT NULL,
  `serviceID` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ward`
--

CREATE TABLE `tbl_ward` (
  `id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_keyword` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_ward`
--

INSERT INTO `tbl_ward` (`id`, `district_id`, `name`, `alias`, `title`, `meta_keyword`, `meta_description`) VALUES
(4, 5, 'P. Thủ Thiêm', 'p-thu-thiem', 'P. Thủ Thiêm', '', ''),
(5, 7, 'Hàng Đào', 'hang-dao', 'Hàng Đào', '', ''),
(7, 25, 'Xã Đông Thạnh', 'xa-dong-thanh', 'Xã Đông Thạnh', '', ''),
(8, 25, 'Xã Xuân Thới Đông', 'xa-xuan-thoi-dong', 'Xã Xuân Thới Đông', '', ''),
(9, 25, 'Xã Xuân Thới Thượng', 'xa-xuan-thoi-thuong', 'Xã Xuân Thới Thượng', '', ''),
(10, 25, 'Xã Xuân Thới Sơn', 'xa-xuan-thoi-son', 'Xã Xuân Thới Sơn', '', ''),
(11, 25, 'Xã Tân Xuân', 'xa-tan-xuan', 'Xã Tân Xuân', '', ''),
(12, 25, 'Xã Tân Thới Nhì', 'xa-tan-thoi-nhi', 'Xã Tân Thới Nhì', '', ''),
(13, 25, 'Xã Tân Hiệp', 'xa-tan-hiep', 'Xã Tân Hiệp', '', ''),
(14, 25, 'Xã Trung Chánh', 'xa-trung-chanh', 'Xã Trung Chánh', '', ''),
(15, 25, 'Xã Thới Tam Thôn', 'xa-thoi-tam-thon', 'Xã Thới Tam Thôn', '', ''),
(16, 25, 'Xã Nhị Bình', 'xa-nhi-binh', 'Xã Nhị Bình', '', ''),
(17, 25, 'Thị trấn Hóc Môn', 'thi-tran-hoc-mon', 'Thị trấn Hóc Môn', '', ''),
(18, 25, 'Xã Bà Điểm', 'xa-ba-diem', 'Xã Bà Điểm', '', ''),
(19, 28, 'Phường Linh Đông', 'phuong-linh-dong', 'Phường Linh Đông', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_about`
--
ALTER TABLE `tbl_about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_alias`
--
ALTER TABLE `tbl_alias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_city`
--
ALTER TABLE `tbl_city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contents`
--
ALTER TABLE `tbl_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_direction`
--
ALTER TABLE `tbl_direction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_idea`
--
ALTER TABLE `tbl_idea`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_info`
--
ALTER TABLE `tbl_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_map_showroom`
--
ALTER TABLE `tbl_map_showroom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_menu_prices`
--
ALTER TABLE `tbl_menu_prices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_module`
--
ALTER TABLE `tbl_module`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_news`
--
ALTER TABLE `tbl_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_newsland_menu`
--
ALTER TABLE `tbl_newsland_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_newsland_photo`
--
ALTER TABLE `tbl_newsland_photo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_news_land`
--
ALTER TABLE `tbl_news_land`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_permission`
--
ALTER TABLE `tbl_permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_photo`
--
ALTER TABLE `tbl_photo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_project`
--
ALTER TABLE `tbl_project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_searchprice`
--
ALTER TABLE `tbl_searchprice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_showroom`
--
ALTER TABLE `tbl_showroom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_street`
--
ALTER TABLE `tbl_street`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_system`
--
ALTER TABLE `tbl_system`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_tags`
--
ALTER TABLE `tbl_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_tags_detail`
--
ALTER TABLE `tbl_tags_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ward`
--
ALTER TABLE `tbl_ward`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_about`
--
ALTER TABLE `tbl_about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_alias`
--
ALTER TABLE `tbl_alias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=568;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;

--
-- AUTO_INCREMENT for table `tbl_city`
--
ALTER TABLE `tbl_city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_contents`
--
ALTER TABLE `tbl_contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_direction`
--
ALTER TABLE `tbl_direction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_idea`
--
ALTER TABLE `tbl_idea`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_info`
--
ALTER TABLE `tbl_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_map_showroom`
--
ALTER TABLE `tbl_map_showroom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `tbl_menu_prices`
--
ALTER TABLE `tbl_menu_prices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_module`
--
ALTER TABLE `tbl_module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_newsland_menu`
--
ALTER TABLE `tbl_newsland_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `tbl_newsland_photo`
--
ALTER TABLE `tbl_newsland_photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_news_land`
--
ALTER TABLE `tbl_news_land`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_permission`
--
ALTER TABLE `tbl_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `tbl_photo`
--
ALTER TABLE `tbl_photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tbl_project`
--
ALTER TABLE `tbl_project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_searchprice`
--
ALTER TABLE `tbl_searchprice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_showroom`
--
ALTER TABLE `tbl_showroom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_street`
--
ALTER TABLE `tbl_street`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_system`
--
ALTER TABLE `tbl_system`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_tags`
--
ALTER TABLE `tbl_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_tags_detail`
--
ALTER TABLE `tbl_tags_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_ward`
--
ALTER TABLE `tbl_ward`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

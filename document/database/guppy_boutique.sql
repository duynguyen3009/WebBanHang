-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2020 at 11:40 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `guppy_boutique`
--

-- --------------------------------------------------------

--
-- Table structure for table `agencies`
--

CREATE TABLE `agencies` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `hotline` text NOT NULL,
  `address` varchar(255) NOT NULL,
  `map` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  `ordering` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agencies`
--

INSERT INTO `agencies` (`id`, `name`, `hotline`, `address`, `map`, `status`, `description`, `thumb`, `created`, `created_by`, `modified`, `modified_by`, `ordering`) VALUES
(1, 'Guppy Boutique', '0364764002', '566,Nguyễn Thái Sơn,Phường 5,Gò Vấp ,TP.Hồ Chí Minh', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.3257202625227!2d106.69037385111042!3d10.786345992277074!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f2f20ed1c49%3A0x5781806fe59379f4!2zQ8O0bmcgVHkgQ-G7lSBQaOG6p24gTOG6rXAgVHLDrG5oIFplbmQgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1578582210228!5m2!1svi!2s\" width=\"600\" height=\"600\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\"></iframe>', 'active', 'Thời gian làm việc 8h - 22h', 'cEVCXoZQlU.jpeg', '2020-11-29 00:00:00', 'hailan', '2020-11-29 00:00:00', 'truongdinh', 2),
(2, 'Guppy Boutique 2', '0909257897', 'Xuân Khánh,Hoài Mỹ,Hoài Nhơn,Bình Định', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.3257202625227!2d106.69037385111042!3d10.786345992277074!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f2f20ed1c49%3A0x5781806fe59379f4!2zQ8O0bmcgVHkgQ-G7lSBQaOG6p24gTOG6rXAgVHLDrG5oIFplbmQgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1578582210228!5m2!1svi!2s\" width=\"600\" height=\"600\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\"></iframe>', 'active', 'Hãy gọi cho chúng tôi khi bạn cần.', 'w1S1FObADP.jpeg', '2020-11-29 00:00:00', 'truongdinh', '2020-11-29 00:00:00', 'truongdinh', 1);

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publish_at` date DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_seo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_seo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `category_id`, `name`, `content`, `status`, `thumb`, `created`, `created_by`, `modified`, `modified_by`, `publish_at`, `type`, `title_seo`, `description_seo`) VALUES
(32, 8, 'Mẹo Nuôi Cá Mau Lớn', '<p><strong>C&aacute; 7 m&agrave;u</strong>&nbsp;l&agrave; một trong những loại c&aacute; cảnh đẹp dễ nu&ocirc;i được d&acirc;n chơi ở mọi lứa tuổi y&ecirc;u th&iacute;ch v&agrave; đặc biệt cũng l&agrave; c&aacute; cảnh dễ nu&ocirc;i kh&ocirc;ng cần oxy những vẫn đẻ nhiều, l&ecirc;n m&agrave;u đẹp.</p>\r\n\r\n<p>Tuy nhi&ecirc;n m&igrave;nh biết c&aacute;c bạn kh&aacute; kh&oacute; khăn cho thời gian đầu nu&ocirc;i c&aacute; bảy m&agrave;u v&igrave; đ&acirc;y l&agrave; loại c&aacute; rất mẫn cảm với sự biến đổi của m&ocirc;i trường nước v&agrave; c&aacute;c loại dịch bệnh n&ecirc;n nếu kh&ocirc;ng c&oacute; kỹ thuật trong c&aacute;ch nu&ocirc;i, c&aacute; c&oacute; thể bị chết nguy&ecirc;n bầy. Vậy n&ecirc;n, trước khi c&oacute; &yacute; định nu&ocirc;i c&aacute; 7 m&agrave;u d&ugrave; rằng bạn nu&ocirc;i c&aacute; trong th&ugrave;ng xốp, th&ugrave;ng nhựa nu&ocirc;i c&aacute;, bể thủy tinh hay xi măng đi nữa th&igrave; h&atilde;y khoan dừng lại v&agrave; c&ugrave;ng ch&uacute;ng t&ocirc;i t&igrave;m hiểu 1 số th&ocirc;ng tin về lo&agrave;i c&aacute; n&agrave;y v&agrave; c&aacute;ch nu&ocirc;i c&aacute; bảy m&agrave;u &iacute;t chị chết để c&oacute; th&ecirc;m kinh nghi&ecirc;m trong việc nu&ocirc;i c&aacute; cảnh nh&eacute;.</p>\r\n\r\n<p><img alt=\"\" src=\"http://guppy_xyz.com//storage/photos/hinh-anh-dogily-petshop-cach-nuoi-ca-bay-mau-blue-Topaz-3.jpg\" style=\"height:400px; width:800px\" />&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<em>C&aacute; 7 m&agrave;u đẹp v&agrave; dễ nu&ocirc;i nhất hiện nay</em></p>\r\n\r\n<p>L&agrave; một trong những loại c&aacute; cảnh nước ngọt phổ biến nhất tr&ecirc;n thế giới ch&iacute;nh v&igrave; vậy c&aacute;c bạn d&ugrave; đi đến shop c&aacute; cảnh n&agrave;o cũng kh&ocirc;ng thể thiếu c&aacute; cảnh dễ nu&ocirc;i n&agrave;y. N&oacute; l&agrave; th&agrave;nh vi&ecirc;n của họ c&aacute; khổng tước c&oacute; đặc điểm sinh sản nhanh v&agrave; li&ecirc;n tục hay c&ograve;n được gọi l&agrave; c&aacute; đẻ trứng thai.</p>\r\n\r\n<p>C&aacute; bảy m&agrave;u được nhiều người h&acirc;m mộ bởi m&agrave;u sắc v&ocirc; c&ugrave;ng phong ph&uacute; t&iacute;nh lu&ocirc;n cả việc phối m&agrave;u với nhau như: m&agrave;u đỏ, m&agrave;u cam, m&agrave;u xanh, m&agrave;u đen, m&agrave;u full gold,.. Đ&oacute; cũng l&agrave; l&iacute; do tại sao những người nu&ocirc;i c&aacute; hầu như đặt ra c&acirc;u hỏi&nbsp;<strong>c&aacute;ch nu&ocirc;i c&aacute; bảy m&agrave;u l&ecirc;n m&agrave;u đẹp</strong>? Hiện tại, theo thống k&ecirc; năm đến năm 2018 c&aacute; bảy m&agrave;u&nbsp;ở Việt Nam chủ yếu c&oacute; hai loại l&agrave; c&aacute; bảy m&agrave;u đu&ocirc;i da rắn v&agrave; c&aacute; bảy m&agrave;u th&acirc;n xanh đen, đu&ocirc;i xanh biếc hoặc đỏ v&agrave; c&oacute; điểm vạch trắng. V&agrave; một loại đặc biệt ch&iacute;nh l&agrave; guppy full gold m&agrave;u l&ecirc;n cực kỳ sang v&agrave; đẹp.</p>\r\n\r\n<p><strong>C&aacute;ch khiến lo&agrave;i c&aacute; cảnh dễ nu&ocirc;i kh&ocirc;ng cần oxy v&agrave; &iacute;t bị chết:</strong></p>\r\n\r\n<p><em>1. K&iacute;ch thước bể v&agrave; nước nu&ocirc;i:</em></p>\r\n\r\n<p><em>- Chọn một bể nu&ocirc;i c&aacute; c&oacute; k&iacute;ch thước vừa phải (vừa đủ với số lượng c&aacute; định nu&ocirc;i).</em></p>\r\n\r\n<p><em>- Nếu đủ khả năng bạn c&oacute; thể d&ugrave;ng 4 b&oacute;ng đ&egrave;n huỳnh quang, n&ecirc;n được giữ &aacute;nh s&aacute;ng từ 10 &ndash; 14 tiếng/ng&agrave;y. Trước khi cho ăn lần thứ nhất bạn bật đ&egrave;n l&ecirc;n trước 1 tiếng v&agrave; tắt đ&egrave;n 1 tiếng sau lần ăn cuối c&ugrave;ng l&agrave; đảm bảo.</em></p>\r\n\r\n<p><em>- Nước nu&ocirc;i c&aacute; hầu như hiện nay đều l&agrave; nước m&aacute;y vậy n&ecirc;n bạn h&atilde;y phơi nắng 1 ng&agrave;y sau đ&oacute; hẳn d&ugrave;ng cho bay kh&iacute; clo trong nước ra hết.</em></p>\r\n\r\n<p><em>- Đảm bảo nhiệt độ nước trong hồ lu&ocirc;n được ổn định, v&agrave;o m&ugrave;a kh&iacute; hậu lạnh h&atilde;y sử dụng sưởi để giữ nhiệt độ cho hồ ổn định.</em></p>\r\n\r\n<p><em><img alt=\"\" src=\"http://guppy_xyz.com//storage/photos/rFPHfm.png\" style=\"height:450px; width:800px\" />&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<em>Đảm bảo lượng c&aacute; ph&ugrave; hợp với k&iacute;ch thước của hồ.</em></em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em>Ban n&ecirc;n thay nước 1-2 lần/tuần, ch&uacute; &yacute; l&agrave; chỉ được thay 30-40% lượng nước trong hồ tr&aacute;nh thay hết 100% sẽ dẫn tới sốc nước khiến c&aacute; chết h&agrave;ng loạt nh&eacute;!</em></p>\r\n\r\n<p><em>Bạn c&oacute; thể đặt th&ecirc;m trong bể một v&agrave;i c&acirc;y rong r&ecirc;u tạo như m&ocirc;i trường tự nhi&ecirc;n cho c&aacute; v&agrave; nếu tốt hơn th&igrave; c&oacute; vật liệu lọc bể c&aacute; c&agrave;ng tốt sẽ tạo nơi cư tr&uacute; cho c&aacute;c loại vi sinh tăng khả năng l&agrave;m sạch nước.</em></p>', 'active', '6DAUgfO9qG.jpeg', '2020-11-17 00:00:00', 'truongdinh', '2020-11-30 00:00:00', 'hailan', NULL, 'featured', 'Mẹo Nuôi Cá 7 Màu Mau Lớn | Đẻ Nhiều | Lên Màu Đẹp | Không Cần Oxy', 'Cá 7 màu là một trong những loại cá cảnh đẹp dễ nuôi được dân chơi ở mọi lứa tuổi yêu thích và đặc biệt cũng là cá cảnh dễ nuôi không cần oxy những vẫn đẻ nhiều, lên màu đẹp.'),
(33, 11, 'Cách nuôi cá cảnh không bị chết.', '<p>Việc nu&ocirc;i cá cảnh được biết đến như l&agrave; th&uacute; vui ri&ecirc;ng của mọi người. Nu&ocirc;i c&aacute; cảnh n&oacute; kh&ocirc;ng chỉ đ&ograve;i hỏi niềm đam m&ecirc; v&agrave; sự ki&ecirc;n tr&igrave; của nh&agrave; chơi c&aacute; cảnh m&agrave; quan trọng hơn hết l&agrave; phải nắm những kinh nghiệm về từng loại c&aacute; m&igrave;nh nu&ocirc;i.&nbsp;Hơn hết, nếu như trong nh&agrave; bạn sở hữu một hồ c&aacute; thủy sinh hay một bể c&aacute; nhỏ xinh cũng đ&atilde; g&oacute;p phần tạo n&ecirc;n một quan cảnh xinh đẹp trong nh&agrave; v&agrave; tạo một kh&ocirc;ng gian sang trọng.</p>\r\n\r\n<p>Hiện nay, việc nu&ocirc;i c&aacute; cảnh đang ng&agrave;y c&agrave;ng trở n&ecirc;n phổ biến hơn đối với&nbsp;&nbsp;người Việt Nam ch&uacute;ng ta. Nu&ocirc;i c&aacute; cảnh trong nh&agrave; nhiều người gọi đ&oacute; l&agrave; một c&aacute;ch tạo phong thủy tốt cho nh&agrave; cửa. Hơn hết, nếu như trong nh&agrave; bạn sở hữu một hồ c&aacute; thủy sinh hay một bể c&aacute; nhỏ xinh cũng đ&atilde; g&oacute;p phần tạo n&ecirc;n một quan cảnh xinh đẹp trong nh&agrave; v&agrave; tạo một kh&ocirc;ng gian sang trọng.</p>\r\n\r\n<p>Đầu ti&ecirc;n l&agrave; m&ocirc;i trường sống- nguồn nước<br />\r\nĐ&acirc;y l&agrave; yếu tố cần thiết v&agrave; quan trọng nhất để gi&uacute;p bạn c&oacute; một&nbsp;c&aacute;ch nu&ocirc;i c&aacute; cảnh kh&ocirc;ng bị chết, bởi lẽ, kh&ocirc;ng phải bất k&igrave; nguồn nước n&agrave;o cũng th&iacute;ch hợp với mọi loại c&aacute; cảnh. &nbsp;Với một m&ocirc;i trường nước trong sạch sẽ k&iacute;ch th&iacute;ch ph&aacute;t triển c&aacute; ổn định. Hầu hết hiện nay, mọi người đều sử dụng nguồn nước m&aacute;y hay nước giếng để nu&ocirc;i c&aacute; cảnh.</p>\r\n\r\n<p>Đối với nước m&aacute;y: trong nước m&aacute;y c&oacute; nồng độ chất Clo kh&aacute; cao n&ecirc;n bạn cần phải xử l&iacute; hết chất Clo rồi mới đưa v&agrave;o nu&ocirc;i c&aacute;. Để nước m&aacute;y trong c&aacute;c thau, chậu, chum, vại,&hellip; để 24h cho nước tự bốc hơi clo. Hoặc bạn c&oacute; thể mua một chai dung dịch khử clo ở c&aacute;c cửa h&agrave;ng c&aacute; cảnh.</p>\r\n\r\n<p>&Aacute;nh s&aacute;ng v&agrave; nhiệt độ của bể:<br />\r\nNhiệt độ th&iacute;ch hợp cho c&aacute; cảnh l&agrave; 25- 28 độ(nếu ch&ecirc;nh lệch 1-2 c&aacute; vẫn th&iacute;ch nghi được) . V&agrave;o m&ugrave;a lạnh nhiệt độ hạ xuống cần c&oacute; nắp đậy hồ c&aacute; hay lắp đặt c&aacute;c thiết bị sưởi ấm tr&aacute;nh tho&aacute;t nhiệt, ổn định nhiệt độ bể nước. Nếu c&aacute; bị bệnh th&igrave; cần tăng nhiệt độ, như vậy sẽ loại bỏ được c&aacute;c vi khuẩn c&oacute; hại trong nước.</p>\r\n\r\n<p>Đặt bể c&aacute; trong nh&agrave;, tr&ecirc;n b&agrave;n l&agrave;m việc, b&agrave;n ph&ograve;ng kh&aacute;ch hoặc tr&ecirc;n gi&aacute; s&aacute;ch. Để nơi k&iacute;n gi&oacute;, th&ocirc;ng tho&aacute;ng kh&ocirc;ng bị nắng, mưa t&aacute;c động trực tiếp. Thỉnh thoảng n&ecirc;n đem c&aacute; phơi năng 2 tuần/lần. Cần đặt hồ/ bể c&aacute; nơi c&oacute; &aacute;nh &aacute;ng th&iacute;ch hợp để cung cấp đủ nguồn s&aacute;ng cho c&aacute; sinh hoạt.</p>\r\n\r\n<p>Cho c&aacute; ăn<br />\r\nC&aacute;ch nu&ocirc;i c&aacute; cảnh kh&ocirc;ng bị chết&nbsp;th&igrave; việc cung cấp chất dinh dưỡng cần thiết cho c&aacute; l&agrave; v&ocirc; c&ugrave;ng quan trọng.&nbsp;Sai lầm của người mới biết chơi c&aacute; cảnh l&agrave; cho n&oacute; ăn qu&aacute; nhiều. Thực chất, việc cho c&aacute; ăn qu&aacute; liều lượng v&agrave; qu&aacute; nhiều chất kh&aacute;c nhau sẽ dẫn đến c&aacute; chết hệ ti&ecirc;u h&oacute;a kh&ocirc;ng hấp thụ hết.</p>\r\n\r\n<p>Đối với c&aacute; ăn động vật s&ocirc;ng như t&ocirc;m t&eacute;p,&nbsp;bobo, lăng quăng, cần ch&uacute; &yacute; thức ăn kh&ocirc;ng qu&aacute; to, phải vừa miệng c&aacute; tr&aacute;nh trường hợp bị h&oacute;c, nhất l&agrave; đối với c&aacute;c loại t&ocirc;m t&eacute;p c&oacute; r&acirc;u ria, cần phải cắt r&acirc;u ria.</p>\r\n\r\n<p>Phụ thuộc v&agrave;o số lượng v&agrave; k&iacute;ch thước c&aacute; cảnh nu&ocirc;i trong bể bơi để cho c&aacute; một lượng thức ăn ph&ugrave; hợp. 1 con c&aacute; nhỏ nu&ocirc;i trong bể chỉ n&ecirc;n cho ăn 3-5 vi&ecirc;n thức ăn/ lần. Cho c&aacute; ăn th&iacute;ch hợp l&agrave; 2 lần/ng&agrave;y, s&aacute;ng v&agrave; chiều (mỗi lần cho ăn sau 15 ph&uacute;t l&agrave; bạn phải lọc cặn b&atilde; dư thừa của thức ăn ra để nguồn nước sạch v&agrave; kh&ocirc;ng l&agrave;m nhiễm bệnh). Ch&uacute; &yacute; l&agrave; kh&ocirc;ng n&ecirc;n bỏ qu&ecirc;n kh&ocirc;ng cho c&aacute; ăn trong một thời gian d&agrave;i. ( c&aacute; nhỏ c&oacute; thể chịu đ&oacute;i từ 2-3 ng&agrave;y. V&igrave; khi đ&oacute; c&aacute; sẽ trở n&ecirc;n suy nhược, v&agrave; chết.</p>\r\n\r\n<p>Chữa bệnh cho c&aacute;<br />\r\nKhi bạn thấy c&aacute; c&oacute; c&aacute;c dấu hiệu bất thường như c&oacute; c&aacute;c nốt đỏ hoặc trắng, c&aacute; bơi lờ đờ, chậm chạp kh&ocirc;ng nhanh nhẹn th&igrave; bạn ch&uacute; &yacute; thật kỹ c&aacute;c biểu hiện để t&igrave;m ra bệnh sau đ&oacute; mua c&aacute;c loại thuốc về chữa trị lan. C&aacute; mới mua về n&ecirc;n thả ri&ecirc;ng hoặc nếu thả chung th&igrave; phải d&ugrave;ng thuốc để ph&ograve;ng bệnh l&acirc;y nhiễm.</p>\r\n\r\n<p>Biết được đặc điểm, t&iacute;nh c&aacute;ch của từng loại c&aacute; cảnh l&agrave; v&ocirc; c&ugrave;ng cần thiết. Chọn c&aacute; theo sở th&iacute;ch m&agrave; kh&ocirc;ng t&igrave;m hiểu về đặc t&iacute;nh của ch&uacute;ng sẽ g&acirc;y ra m&ocirc;i trường sống bất lợi cho c&aacute;. V&iacute; dụ như&nbsp;c&aacute; Betta&nbsp;d&ograve;ng c&aacute; đ&aacute; th&iacute;ch đấu đ&aacute; lẫn nhau n&ecirc;n kh&ocirc;ng thể n&agrave;o nu&ocirc;i chung với c&aacute;c loại c&aacute; kh&aacute;c. Tr&aacute;nh t&igrave;nh trạng nu&ocirc;i c&aacute; kh&ocirc;ng hợp k&iacute;ch thước v&igrave; sẽ c&oacute; t&igrave;nh trạng c&aacute; lớn nuốt c&aacute; b&eacute; hoặc c&aacute; b&eacute; nuốt c&aacute; lớn( c&aacute;c lo&agrave;i c&aacute; nhỏ th&iacute;ch cắn rỉa v&acirc;y của lo&agrave;i c&aacute; lớn).</p>', 'active', 'seZjLKy8P6.jpeg', '2020-11-28 00:00:00', 'truongdinh', '2020-12-05 00:00:00', 'truongdinh', NULL, 'featured', 'Muốn giàu nuôi cá...', 'Trời nắng như đổ lửa từ trên cao xuống,'),
(34, 11, 'Thông tin và kỹ thuật nuôi cá bảy màu guppy đẹp và hiệu quả', '<p>C&aacute; bảy m&agrave;u được nhiều người chơi c&aacute; cảnh chuy&ecirc;n nghiệp gọi l&agrave; c&aacute;&nbsp;guppy, ch&uacute;ng c&ograve;n c&oacute; t&ecirc;n gọi l&agrave; c&aacute; đu&ocirc;i quạt, c&aacute; c&ocirc;ng... T&ecirc;n khoa học: Poecilia reticulata, thuộc họ C&aacute; khổng tước.&nbsp;C&aacute; b&agrave;y m&agrave;u&nbsp;l&agrave; 1 trong số&nbsp;những loại c&aacute; cảnh dễ nu&ocirc;i nhất.</p>\r\n\r\n<p>C&aacute; b&agrave;y m&agrave;u l&agrave; d&ograve;ng c&aacute; phổ biến tr&ecirc;n thị trường, ch&uacute;ng c&oacute; mặt ở hầu hết c&aacute;c nước tr&ecirc;n thế giới với nhiều m&agrave;u sắc đa dạng kh&aacute;c nhau.</p>\r\n\r\n<h2>Th&ocirc;ng Tin Chung Về C&aacute; Bảy M&agrave;u Guppy</h2>\r\n\r\n<p>Đ&acirc;y l&agrave; giống&nbsp;c&aacute; dễ nu&ocirc;i, sinh sản nhanh, đa dạng v&agrave; phong ph&uacute; nhất trong số c&aacute;c lo&agrave;i c&aacute; cảnh (về m&agrave;u sắc). C&aacute; bảy m&agrave;u nhập ngoại v&agrave;o Việt Nam c&oacute; 2 loại ch&iacute;nh: bảy m&agrave;u đu&ocirc;i rắn v&agrave; bảy m&agrave;u th&acirc;n xanh đen, đu&ocirc;i m&agrave;u xanh biếc, đỏ điểm vạch trắng. Ở c&aacute;c nước kh&aacute;c c&oacute; c&aacute; bảy m&agrave;u to&agrave;n th&acirc;n đen tuyền chưa thấy c&oacute; tại Việt Nam.</p>\r\n\r\n<p>C&aacute; c&oacute; nguồn gốc từ Jamaica, sống trong những vũng vịnh cạn, eo biển, mương r&atilde;nh v&agrave; dọc theo bờ biển. Năm 1866, Robert John Lechmere Guppy sống ở đảo Trinidad thuộc British West Indies gửi một v&agrave;i con c&aacute; n&agrave;y đến bảo t&agrave;ng Anh để nhận dạng. Albert C. L. G. Gunther của bảo t&agrave;ng n&agrave;y đặt t&ecirc;n khoa học cho n&oacute; l&agrave; Girardinus guppii để ghi c&ocirc;ng Guppy v&agrave;o cuối năm đ&oacute;.</p>\r\n\r\n<p>Đến năm 1913, đặt t&ecirc;n lại l&agrave; Lebistes reticulatus, t&ecirc;n khoa học ch&iacute;nh thức l&uacute;c bấy giờ. Tuy nhi&ecirc;n, lo&agrave;i c&aacute; n&agrave;y đ&atilde; được Wilhelm Peters m&ocirc; tả trước đ&oacute; v&agrave;o năm 1859 trong số sinh vật &ocirc;ng thu thập được từ Nam Mỹ. Mặc d&ugrave; Girardinus guppii hiện nay được coi l&agrave; từ đồng nghĩa của Poecilia reticulata, nhưng t&ecirc;n gọi &quot;guppy&quot; vẫn được sử dụng.</p>\r\n\r\n<p>Theo thời gian c&aacute; bảy m&agrave;u đ&atilde; được đặt nhiều t&ecirc;n gọi khoa học kh&aacute;c, nhưng hiện tại Poecilia reticulata l&agrave; danh ph&aacute;p được coi l&agrave; hợp lệ.</p>\r\n\r\n<p><strong>Ph&acirc;n bố</strong>:<img alt=\"\" src=\"http://guppy_xyz.com//storage/photos/ca-canh-de-nuoi-2.jpg\" style=\"height:450px; width:800px\" /></p>\r\n\r\n<p>C&aacute; bảy m&agrave;u l&agrave; c&aacute; bản địa của Trinidad v&agrave; một số khu vực thuộc Nam Mỹ, tuy nhi&ecirc;n, c&aacute; bảy m&agrave;u đ&atilde; được đưa v&agrave;o nhiều quốc gia kh&aacute;c nhau tại mọi ch&acirc;u lục, ngoại trừ ch&acirc;u Nam Cực.</p>\r\n\r\n<p><img alt=\"\" src=\"http://guppy_xyz.com//storage/photos/cac_dong_guppy_1578817531816.jpg\" style=\"height:1143px; width:800px\" /></p>\r\n\r\n<h2>Sinh Sản Của C&aacute; Guppy</h2>\r\n\r\n<p>C&aacute; bảy m&agrave;u đẻ nhiều. Thời kỳ mang thai của ch&uacute;ng l&agrave; 22-30 ng&agrave;y, trung b&igrave;nh khoảng 28 ng&agrave;y. Sau khi c&aacute; c&aacute;i được thụ tinh th&igrave; một v&ugrave;ng sẫm m&agrave;u gần hậu m&ocirc;n, gọi l&agrave; đốm thai, sẽ lớn dần l&ecirc;n v&agrave; sẫm m&agrave;u đi.</p>\r\n\r\n<p>C&aacute; bảy m&agrave;u ưa th&iacute;ch nước c&oacute; nhiệt độ khoảng 28 &deg;C (82 &deg;F) để sinh sản. C&aacute; bảy m&agrave;u c&aacute;i sẽ sinh ra từ 2 đến 200 c&aacute; con, th&ocirc;ng thường trong khoảng 5-30 con.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Khi c&aacute; mẹ c&oacute; bụng lớn (chuẩn bị đẻ), bạn n&ecirc;n bắt c&aacute; mẹ cho ra một hồ ri&ecirc;ng nhằm đảm bảo &ldquo;sỉ số&rdquo; đ&agrave;n c&aacute; con. V&igrave; c&aacute; mẹ, c&aacute; cha v&agrave; c&aacute; lớn rất dễ ăn c&aacute; con khi c&aacute; mẹ mới sinh c&aacute; con ra. Để c&aacute; con c&oacute; tỉ lệ sống s&oacute;t cao, bạn n&ecirc;n bỏ nhiều rong (để c&aacute; lẩn trốn v&agrave; l&agrave; nguồn dinh dưỡng ban đầu) v&agrave; nu&ocirc;i c&aacute; con trong hồ c&aacute; cũ (c&oacute; r&ecirc;u).</p>\r\n\r\n<p>Trong 1 &ndash; 2 tuần đầu n&ecirc;n để c&aacute; ăn rong-r&ecirc;u hoặc bổ sung th&ecirc;m thức ăn kh&ocirc; dạng c&aacute;m hoặc dạng vi&ecirc;n được nghiền mịn. Tuần 2 &ndash; 3 trở đi nếu si&ecirc;ng năng n&ecirc;n cho ăn bo bo (hồng trần/trứng nước). Khoảng 4 tuần trở về sau th&igrave; c&aacute; con c&oacute; thể ăn lăng-quăng, tr&ugrave;n chỉ v&agrave; chuyển dần tập cho c&aacute; ăn thức ăn vi&ecirc;n.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>C&aacute; bột bạn cũng n&ecirc;n cho v&agrave;o hồ một &iacute;t muối. Việc n&agrave;y sẽ l&agrave;m c&aacute; sống khỏe hơn v&agrave; l&agrave;m t&ocirc;m con c&oacute; thể sống l&acirc;u hơn. Sau 2 ng&agrave;y, bạn c&oacute; thể cho c&aacute; ăn thức ăn kh&ocirc;, nhớ l&agrave; phải t&aacute;n ra thật nhuyễn v&agrave; n&ecirc;n d&ugrave;ng 1 loại thức ăn cố định th&ocirc;i.</p>\r\n\r\n<p>Một con 7 m&agrave;u m&aacute;i trưởng th&agrave;nh c&oacute; thể đẻ con theo định kỳ 7 &ndash; 10 ng&agrave;y 1 lần. Mỗi lần đẻ từ 15 &ndash; 40 em t&ugrave;y k&iacute;ch thước c&aacute; mẹ &ndash; c&aacute; mẹ c&agrave;ng lớn th&igrave; mỗi lần đẻ c&agrave;ng nhiều con.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>C&aacute; con cần khoảng một hoặc hai th&aacute;ng để trưởng th&agrave;nh. Trong bể c&aacute;, thức ăn cho c&aacute; bảy m&agrave;u con thường l&agrave; thức ăn nghiền v&agrave; &eacute;p th&agrave;nh dạng vảy (flake), ấu tr&ugrave;ng artemia, hoặc thức ăn của c&aacute; trưởng th&agrave;nh. Ngo&agrave;i ra, c&aacute; con c&ograve;n ăn tảo b&aacute;m trong bể.</p>\r\n\r\n<p><strong>Lựa chọn c&aacute; trống:</strong></p>\r\n\r\n<p>Chọn ra con lớn nhất trong bầy. H&atilde;y chọn những con c&oacute; cuống đu&ocirc;i to, d&agrave;y, v&igrave; ch&uacute;ng c&oacute; thể mang được những chiếc đu&ocirc;i to, chọn những con c&oacute; đu&ocirc;i h&igrave;nh tam gi&aacute;c. Chọn những con d&agrave;i lưng (lưng c&oacute; h&igrave;nh b&igrave;nh h&agrave;nh, tr&ograve;n ở g&oacute;c), lưng v&agrave; đu&ocirc;i n&ecirc;n tr&ugrave;ng m&agrave;u hay hoạ tiết, loại bỏ những con c&aacute; c&oacute; xương sống uốn cong, đầu phẳng hay những con c&oacute; m&agrave;u sắc kh&ocirc;ng đẹp</p>\r\n\r\n<p>Khi thực hiện theo c&aacute;c bước n&agrave;y, bạn sẽ chọn được cho m&igrave;nh những con c&aacute; tốt nhất để tiếp tục ph&aacute;t triển, v&agrave; n&ecirc;n nhớ rằng mật độ c&aacute; kh&ocirc;ng được qu&aacute; 1 gallon 1 con</p>\r\n\r\n<p><strong>Lựa chọn c&aacute; m&aacute;i:</strong></p>\r\n\r\n<p>Những con c&aacute; m&aacute;i thường được lựa chọn sau 4-5 th&aacute;ng.</p>\r\n\r\n<p>Chọn những con to nhất, c&oacute; cuống đu&ocirc;i to v&agrave; d&agrave;y, những con n&agrave;y sẽ đẻ ra những ch&uacute; c&aacute; đẹp nhất, chọn những con c&oacute; lưng to nhất v&agrave; rộng nhất c&oacute; thể c&oacute; v&agrave; n&ecirc;n chọn ra những con c&oacute; m&agrave;u sắc đẹp hơn.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Chọn ra 2 con c&aacute; m&aacute;i đẹp nhất v&agrave; 1 con trống đẹp nhất cho v&agrave;o 1 bể 2 - 5 gallon. Việc sử dụng 1 con trống sẽ gi&uacute;p bạn dễ nhận biết được những đặc t&iacute;nh m&agrave; con trống truyền lại cho con của n&oacute;, nhờ đ&oacute; bạn c&oacute; thể t&igrave;m những con trống tốt nhất. Nếu những con m&aacute;i kh&ocirc;ng c&oacute; thai trong v&ograve;ng 2 th&aacute;ng, h&atilde;y th&ecirc;m v&agrave;o bể 1 con c&aacute; trống kh&aacute;c. Bể nhỏ sẽ gi&uacute;p c&aacute; trống dễ &quot;t&igrave;m thấy&quot; c&aacute; m&aacute;i hơn.</p>\r\n\r\n<p><img alt=\"Hình ảnh về cá bảy màu, cá guppy\" src=\"https://cdn.kinhnghiemquy.com/storage/media/img/2020/01/14/blue_guppy_fish_1578969701433.jpg\" style=\"width:800px\" /></p>\r\n\r\n<p>Chỉ v&agrave;i giờ sau khi sinh đẻ xong, c&aacute; c&aacute;i lại sẵn s&agrave;ng cho việc thụ thai. C&aacute; bảy m&agrave;u c&oacute; khả năng lưu trữ tinh tr&ugrave;ng, n&ecirc;n sau chỉ một lần cặp đ&ocirc;i với c&aacute; đực, c&aacute; c&aacute;i c&oacute; thể sinh nhiều lần. Nếu kh&ocirc;ng nu&ocirc;i ri&ecirc;ng hoặc kh&ocirc;ng c&oacute; lưới ngăn, c&aacute; trưởng th&agrave;nh sẽ ăn c&aacute; con.</p>\r\n\r\n<p>Người ta đ&atilde; lai th&agrave;nh c&ocirc;ng c&aacute; bảy m&agrave;u với một số lo&agrave;i kh&aacute;c thuộc chi Poecilia (poecilia latipinna/velifera), v&iacute; dụ c&aacute; bảy m&agrave;u đực v&agrave; Poecilia c&aacute;i. Tuy nhi&ecirc;n, con lai lu&ocirc;n l&agrave; c&aacute; đực v&agrave; c&oacute; vẻ v&ocirc; sinh</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>C&aacute; bảy m&agrave;u ưa th&iacute;ch bể cảnh nước cứng v&agrave; c&oacute; thể trụ vững trong m&ocirc;i trường với độ mặn cao gấp 1,5 lần độ mặn th&ocirc;ng thường của nước biển. C&aacute; bảy m&agrave;u n&oacute;i chung l&agrave; ưa chuộng h&ograve;a b&igrave;nh, đặc trưng đ&aacute;ng ch&uacute; &yacute; nhất của c&aacute; bảy m&agrave;u l&agrave; xu hướng sinh sản, v&agrave; ch&uacute;ng c&oacute; thể cho sinh đẻ trong cả bể cảnh nước ngọt lẫn bể cảnh nước mặn.<br />\r\n<br />\r\n- C&aacute; bảy m&agrave;u do những người&nbsp;nu&ocirc;i c&aacute; cảnh&nbsp;tạo ra c&oacute; sự biến đổi lớn về bề ngo&agrave;i, như m&agrave;u sắc hay h&igrave;nh d&aacute;ng đu&ocirc;i (đu&ocirc;i quạt hay đu&ocirc;i kiếm nhọn đầu).</p>\r\n\r\n<p>Những người&nbsp;nu&ocirc;i c&aacute; cảnh c&oacute; kinh nghiệm g&acirc;y giống c&aacute; bảy m&agrave;u cho ch&iacute;nh m&igrave;nh đều biết rằng c&aacute; trưởng th&agrave;nh sẽ c&oacute; thể ăn thịt c&aacute;c con non v&agrave; v&igrave; thế n&ecirc;n tạo ra khu vực an to&agrave;n cho c&aacute; bột.</p>\r\n\r\n<p>C&aacute;c bể cho sinh đẻ được thiết kế đặc biệt, c&oacute; thể treo lơ lửng b&ecirc;n trong bể cảnh. Ch&uacute;ng phục vụ cho hai mục đ&iacute;ch, thứ nhất l&agrave; che chở cho c&aacute; c&aacute;i đang mang thai kh&ocirc;ng bị c&aacute;c con đực để &yacute; tới v&agrave; tấn c&ocirc;ng, v&agrave; thứ hai l&agrave; cung cấp một khu vực ri&ecirc;ng biệt cho c&aacute; con mới sinh kh&ocirc;ng để ch&uacute;ng bị mẹ ăn thịt. Cần lưu &yacute; kh&ocirc;ng thả c&aacute; mẹ v&agrave;o nơi đẻ qu&aacute; sớm v&igrave; n&oacute; c&oacute; thể bị sẩy thai</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>Nhiệt Độ Nu&ocirc;i C&aacute; Guppy</h2>\r\n\r\n<p>Khi ch&uacute;ng ta nu&ocirc;i c&aacute; 7 m&agrave;u trong m&ocirc;i trường nước c&oacute; nhiệt độ cao &gt;= 28 độ th&igrave; c&aacute; m&aacute;i guppy đẻ c&aacute; con c&oacute; giới t&iacute;nh c&aacute;i &iacute;t hơn c&aacute; đực. Khi c&aacute; guppy được nu&ocirc;i trong m&ocirc;i trường nước với nhiệt &lt;= 22.5 độ th&igrave; tỉ lệ c&aacute; m&aacute;i sẽ nhiều hơn c&aacute; đực. Nhiệt độ l&yacute; tưởng để c&aacute; m&aacute;i 7 m&agrave;u đẻ ra c&aacute; con đực v&agrave; c&aacute;i c&acirc;n bằng l&agrave; v&agrave;o 25, 26 độ.</p>\r\n\r\n<p>Đối với những người chơi c&oacute; kinh nghiệm, nhiệt độ l&yacute; tưởng để&nbsp;<strong>nu&ocirc;i c&aacute; bảy m&agrave;u</strong>, guppy được khoẻ mạnh l&agrave; từ 22 &ndash; 28*C. Ở nhiệt độ n&agrave;y c&aacute; sẽ &iacute;t bị bệnh, khoẻ mạnh, ăn nhiều, lớn nhanh v&agrave; m&agrave;u sắc cũng rất đẹp.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Tất cả l&agrave; nhờ ở nhiệt độ n&agrave;y m&ocirc;i trường nước ổn định, hệ vi sinh trong nước hoạt động hiệu quả, tạo n&ecirc;n một m&ocirc;i trường ho&agrave;n hảo để những ch&uacute; c&aacute; bảy m&agrave;u của bạn ph&aacute;t triển. Khi ở nhiệt độ n&agrave;y bể nu&ocirc;i cũng &iacute;t khi bị dịch bệnh b&ugrave;ng ph&aacute;t hay nước bị đục đi, do hệ vi sinh trong nước đ&atilde; gi&uacute;p bạn hạn chế bớt t&igrave;nh trạng n&agrave;y.&nbsp;</p>\r\n\r\n<p><strong>Nhiệt độ th&iacute;ch hợp cho c&aacute; bảy m&agrave;u trong m&ugrave;a h&egrave;</strong></p>\r\n\r\n<p>Nhiệt độ v&agrave;o m&ugrave;a h&egrave; sẽ tương đối cao n&ecirc;n việc đảm bảo nhiệt độ ổn định ở mức 22 &ndash; 28*C sẽ kh&aacute; kh&oacute;. Nhiệt độ ngo&agrave;i trời v&agrave;o những h&ocirc;m cao điểm c&oacute; thể l&ecirc;n đến hơn 30*C, nếu bể nu&ocirc;i kh&ocirc;ng được c&aacute;ch nhiệt tốt hay đặt ở những nơi c&oacute; b&oacute;ng r&acirc;m, c&aacute; 7 m&agrave;u c&oacute; thể bị chết do sốc nhiệt.</p>\r\n\r\n<p>C&aacute;c bạn ch&uacute; &yacute; c&aacute; c&oacute; thể bị chết hết nếu nhiệt độ l&ecirc;n &gt; 35*C. Nếu bạn nu&ocirc;i c&aacute; ngo&agrave;i trời n&ecirc;n nu&ocirc;i trong c&aacute;c th&ugrave;ng xốp &ndash; do th&ugrave;ng xốp c&oacute; thể c&aacute;ch nhiệt tốt v&agrave; hạn chế được biến động nhiệt lớn.</p>\r\n\r\n<p>Vị tr&iacute; đặt bể c&aacute; n&ecirc;n đặt ở những chỗ tho&aacute;ng m&aacute;t, c&oacute; m&aacute;i che, tr&aacute;nh để &aacute;nh s&aacute;ng mặt trời chiếu thẳng v&agrave;o bể. Bể để ngo&agrave;i trời n&ecirc;n c&oacute; nắp đậy để hạn chế &aacute;nh s&aacute;ng cũng như c&aacute;c loại động vật kh&aacute;c c&oacute; thể mon men đến gần v&agrave; g&acirc;y nguy hiểm cho c&aacute; của bạn nh&eacute;.</p>\r\n\r\n<p><strong>Nhiệt độ th&iacute;ch hợp cho c&aacute; bảy m&agrave;u trong m&ugrave;a đ&ocirc;ng</strong></p>\r\n\r\n<p>M&ugrave;a đ&ocirc;ng nhiệt độ sẽ xuống thấp khi bạn ở miền bắc. Việc nu&ocirc;i c&aacute; v&agrave; chơi c&aacute; bảy m&agrave;u của c&aacute;c bạn sống ở miền bắc cũng gặp kh&oacute; khăn hơn c&aacute;c bạn ở miền nam do c&oacute; 2 m&ugrave;a r&otilde; rệt v&agrave; nhiệt độ cũng biến động lớn.</p>\r\n\r\n<p>C&aacute; bảy m&agrave;u kh&ocirc;ng thể chịu được lạnh trong 1 thời gian d&agrave;i v&agrave; khi nhiệt độ xuống qu&aacute; thấp. Nhiệt độ &lt; 15*C c&oacute; thể g&acirc;y hại đến c&aacute; nh&eacute;. Nếu nhiệt độ xuống dưới mức n&agrave;y trong 1 v&agrave;i ng&agrave;y bạn n&ecirc;n c&oacute; kế hoạch cắm sưởi cho bể c&aacute; của bạn để đảm bảo nhiệt độ ph&ugrave; hợp cho c&aacute;. Nếu nhiệt độ vẫn tr&ecirc;n &gt; 18*C th&igrave; c&aacute; vẫn ổn v&agrave; kh&ocirc;ng cần phải qu&aacute; lo lắng nh&eacute;.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Nếu bạn sử dụng sưởi th&igrave; n&ecirc;n set nhiệt độ ở mức 22 &ndash; 24*C l&agrave; hợp l&yacute;. Ở mức nhiệt độ n&agrave;y sưởi hoạt động hiệu quả nhất, t&iacute;ch kiệm điện nhất v&agrave; hạn chế được c&aacute;c trường hợp sưởi bị hỏng dẫn đến nhiệt độ nước cao l&agrave;m chết c&aacute;.</p>\r\n\r\n<h2>C&aacute;ch Cho C&aacute; V&agrave;o Hồ Sau Khi Mua</h2>\r\n\r\n<p>Việc đầu ti&ecirc;n cần l&agrave;m sau khi mua c&aacute; l&agrave; h&atilde;y thả ch&uacute;ng v&agrave;o 1 c&aacute;i hồ nhỏ v&agrave; nhớ l&agrave; d&ugrave;ng nguồn nước ở nơi m&agrave; bạn đ&atilde; mua ch&uacute;ng (khi mua bạn n&ecirc;n xin th&ecirc;m nhiều nước v&agrave;o). Cứ 20 - 30 ph&uacute;t, bạn đổ th&ecirc;m 1 &iacute;t nước lấy trong hồ nh&agrave; v&agrave;o hồ nu&ocirc;i tạm. Đến khi hồ tạm đầy khoảng 3/4, h&uacute;t 1/2 nước ra khỏi hồ v&agrave; thay bằng nước hồ nh&agrave;. Bạn cứ l&agrave;m việc n&agrave;y 2 - 3 lần trong v&ograve;ng 1 - 2 giờ.</p>\r\n\r\n<p>L&uacute;c n&agrave;y, bạn c&oacute; thể thả c&aacute; v&agrave;o trong hồ nh&agrave; được rồi. Đừng lo lắng nếu anh l&iacute;nh mới cảm thấy sợ sệt v&agrave; lẩn trốn. Nếu ch&uacute;ng thấy hoảng sợ, đừng cho ch&uacute;ng ăn trong v&ograve;ng 24 - 48 giờ. Nếu ch&uacute;ng c&oacute; vẻ kh&ocirc;ng ăn sau đ&oacute; th&igrave; bạn cũng kh&ocirc;ng n&ecirc;n cho thức ăn v&agrave;o hồ v&igrave; việc n&agrave;y sẽ mau ch&oacute;ng l&agrave;m bẩn nước hồ. Đừng lo lắng v&igrave; việc n&agrave;y l&agrave; b&igrave;nh thường v&agrave; c&oacute; thể mất cả tuần để ch&uacute; guppy mới bơi lượn v&agrave; xử sự như những ch&uacute; guppy b&igrave;nh thường kh&aacute;c.</p>\r\n\r\n<p>Ch&uacute; &yacute;: Khi nu&ocirc;i c&aacute; nhớ bỏ một &iacute;t muối hột loại muối n&agrave;y được b&aacute;n kh&aacute; rẻ ở chợ cho v&agrave;o để gi&uacute;p c&aacute; tr&aacute;nh được một số bệnh, tuyệt đối kh&ocirc;ng được bỏ muối iốt v&agrave;o nh&eacute;, bỏ muối iốt c&aacute; chết liền.</p>\r\n\r\n<h2>Xử L&yacute; Nước Nu&ocirc;i C&aacute; Guppy</h2>\r\n\r\n<p>C&aacute;i quan trọng l&agrave; nguồn nước, kh&ocirc;ng cần nước phải lu&ocirc;n lu&ocirc;n sạch v&agrave; cũng đừng bao giờ để dơ qu&aacute;.</p>\r\n\r\n<p>Nước l&agrave; yếu tố quan trọng nhất để nu&ocirc;i guppy với số lượng lớn. Nếu bạn d&ugrave;ng nước m&aacute;y, n&ecirc;n phơi ngo&agrave;i nắng 1 ng&agrave;y trước khi d&ugrave;ng để kh&iacute; clo trong nước tho&aacute;t ra hết. Trong trường hợp khẩn cấp, bạn cũng c&oacute; thể thay nước cho hồ c&aacute; bằng nước m&aacute;y chưa &quot;phơi&quot; nhưng phải cho sủi bọt trong hồ để kh&iacute; clo tho&aacute;t l&ecirc;n nhanh hơn.</p>\r\n\r\n<p>Amoniac, nguy&ecirc;n nh&acirc;n số 1 dẫn đến c&aacute;i chết cho lũ c&aacute;, g&acirc;y ra bởi t&igrave;nh trạng nu&ocirc;i c&aacute; qu&aacute; đ&ocirc;ng trong 1 hồ, cho ăn qu&aacute; nhiều dẫn đến thừa thức ăn, do nước xấu hay thiếu oxy..Nếu nghi ngờ c&oacute; sự hiện diện của amoniac, bạn n&ecirc;n thay khoảng 1/3 nước hồ v&agrave; cho sủi bọt thật nhiều.</p>\r\n\r\n<p>Độ cứng v&agrave; độ pH cũng rất quan trọng. Guppy th&iacute;ch nước hơi cứng v&agrave; độ pH từ 6.8 - 7.8 (tốt nhất l&agrave; 7.2). V&igrave; vậy m&agrave; bạn c&oacute; thể nu&ocirc;i ch&uacute;ng v&ocirc; tư trong c&aacute;c hồ xi măng (v&agrave; c&oacute; vẻ ch&uacute;ng chỉ thực sự lớn v&agrave; sinh sản khi được nu&ocirc;i trong hồ xi măng). Tuyệt đối kh&ocirc;ng được thay đổi đột ngột độ pH v&agrave; độ cứng của nước, nếu kh&ocirc;ng c&aacute; sẽ chết nhiều. Nếu bạn muốn thay đổi th&igrave; sự thay đổi n&agrave;y phải diễn ra một c&aacute;ch từ từ!</p>\r\n\r\n<p>Bạn phải xem x&eacute;t kĩ độ PH của nước như thế n&agrave;o l&agrave; hợp l&yacute;,c&aacute;i n&agrave;y c&aacute;c bạn c&oacute; thể mua chai thử độ PH ở hầu hết c&aacute;c chỗ b&aacute;n c&aacute; dĩa v&agrave; b&aacute;n phụ vật liệu cho c&aacute;,gi&aacute; từ 20-30k tuỳ chỗ b&aacute;n. Khi nguồn nước của độ PH đạt đến 8,5 cũng c&oacute; nghĩa con c&aacute; của bạn đang gặp ở độ nguy hiểm sinh mạng th&igrave; ch&uacute;ng ta n&ecirc;n thay nước.</p>\r\n\r\n<p>Nước ở đ&acirc;y c&oacute; 2 nguồn ch&iacute;nh l&agrave; nước m&aacute;y c&oacute; độ clo cao độ PH khoảng 8,5-9 v&agrave; nguồn nước giếng c&oacute; độ PH l&agrave; 4-4,5.</p>\r\n\r\n<p><strong>Bằng c&aacute;ch n&agrave;o ch&uacute;ng ta c&oacute; thể đưa d&ograve;ng nước trở về ổn định?</strong></p>\r\n\r\n<p>V&igrave; điều kiện kh&ocirc;ng phải ai trong ch&uacute;ng ta cũng c&oacute; thể mua được chai thử PH, c&oacute; c&aacute;ch n&agrave;o đơn giản hơn chăng?</p>\r\n\r\n<p>Đối với nước kh&ocirc;ng t&ecirc;n m&agrave; nếu nh&agrave; bạn n&agrave;o c&oacute; sẵn bồn chứa để tr&ecirc;n n&oacute;c nh&agrave; c&oacute; &aacute;nh s&aacute;ng hoặc bể chứa trong nh&agrave; c&oacute; dung t&iacute;ch lớn th&igrave; rất tốt, những nguồn nước n&agrave;y cực k&igrave; tốt c&oacute; thể sử dụng ngay.</p>\r\n\r\n<p>L&yacute; do, nước đ&atilde; được bơm từ nhiều ng&agrave;y trước v&agrave; chỉ sử dụng 1 phần, c&oacute; nghĩa nguồn nước trước đ&oacute; s&agrave;i chưa hết, nước ko t&ecirc;n đ&atilde; xả ra nhiều ng&agrave;y n&ecirc;n độ PH sẽ giảm đ&aacute;ng kể v&agrave; kh&iacute; clo tho&aacute;t ra, khi c&oacute; nguồn nước kh&ocirc;ng t&ecirc;n từ v&ograve;i chảy ra thẳng v&agrave;o bồn chứa sẽ chẳng ảnh hưởng l&agrave; bao nhi&ecirc;u. Ch&uacute;ng ta c&oacute; thể thay đổi nguồn nước của c&aacute; m&agrave; chẳng sao cả, c&aacute;ch tốt nhất l&agrave; 1 đến 2 tuần thay nước 1 lần, thay 10 - 20% lượng nước.</p>\r\n\r\n<p>Đối với nước kh&ocirc;ng t&ecirc;n m&agrave; được bơm trực tiếp để s&agrave;i th&igrave; c&aacute;c bạn n&ecirc;n phơi nắng 2-3 ng&agrave;y để l&agrave;m giảm độ PH xuống v&agrave; l&agrave;m cho hết kh&iacute; clo. Sau đ&oacute; h&atilde;y thay nước hoặc đổ c&aacute; v&agrave;o, c&oacute; điều kiện sủi kh&iacute; oxy c&agrave;ng tốt.</p>\r\n\r\n<p>Đối với nguồn nước giếng, th&ocirc;ng thường loại n&agrave;y c&oacute; độ PH 4 - 4,5 (hầu hết l&agrave; 4,5) c&oacute; điều kiện th&igrave; cho sủi oxy khoảng 12 tiếng v&agrave; đo độ PH khi đến khoảng 5,5 l&agrave; tốt hoặc kh&ocirc;ng c&oacute; điều kiện th&igrave; tiếp tục cho phơi nắng hoặc để y&ecirc;n đ&oacute; trong 4 ng&agrave;y, tự độ PH sẽ tăng, tuy nhi&ecirc;n nếu để trong nh&agrave; khoảng 2 ng&agrave;y th&igrave; chỉ c&oacute; l&ecirc;n 5 điều n&agrave;y m&igrave;nh đ&atilde; thử nghiệm, m&agrave; c&oacute; nắng th&igrave; tốt hơn cả, dễ l&ecirc;n hơn.</p>\r\n\r\n<p>Ch&uacute;ng ta n&ecirc;n thay nước hằng tuần, c&aacute; bảy m&agrave;u rất thường hay sốc nước v&agrave; th&iacute;ch nguồn nước cũ n&ecirc;n ch&uacute;ng ta chỉ thay 10 - 20% lượng nước trong đ&oacute;, khi con c&aacute; đ&atilde; th&iacute;ch nghi th&igrave; sau n&agrave;y bạn c&oacute; thể thay thường xuy&ecirc;n cũng được.</p>\r\n\r\n<h2>Xử L&yacute; Ph&acirc;n C&aacute;</h2>\r\n\r\n<p>Lọc m&uacute;t (lọc bọt biển). N&oacute; gồm 1 m&aacute;y h&uacute;t v&agrave; 1 miếng b&ocirc;ng lọc được đặt trong hộp để lọc c&aacute;c chất bẩn. V&agrave; bạn chỉ cần giặt n&oacute; trong nước ấm mỗi tuần 1 lần l&agrave; đủ. Miếng b&ocirc;ng lọc sẽ giữ tất cả r&aacute;c thải ra trong hồ c&aacute;.</p>\r\n\r\n<p>Khuyến c&aacute;o kh&ocirc;ng n&ecirc;n d&ugrave;ng sủi oxy hoặc lọc vi sinh oxy qu&aacute; l&acirc;u, bạn nghĩ sẽ chẳng c&oacute; g&igrave;, c&aacute; sẽ sống tốt nhưng thật ra sủi oxy sẽ l&agrave;m tăng độ PH rất nhanh. C&aacute; bảy m&agrave;u kh&ocirc;ng cần m&aacute;y tạo oxy nhưng nu&ocirc;i số lượng lớn th&igrave; phải d&ugrave;ng, c&ograve;n lại chẳng cần thiết v&igrave; c&aacute; bảy m&agrave;u như m&igrave;nh n&oacute;i c&oacute; thể sống tốt ở nhiều loại m&ocirc;i trường.</p>\r\n\r\n<p>C&oacute; nhiều người nu&ocirc;i c&aacute; thấy nước bẩn m&agrave; c&aacute; kh&ocirc;ng chết nhưng khi chuyển sang nước vừa thay th&igrave; c&aacute; đ&atilde; l&ecirc;n đường, nếu nguồn nước ổn định th&igrave; ch&uacute;ng ta để c&aacute; trong đ&oacute; 1-2 th&aacute;ng, thậm ch&iacute; l&acirc;u hơn cũng chả sao.</p>\r\n\r\n<p>N&ecirc;n bỏ v&agrave;o hồ 1 &iacute;t rong, rong la h&aacute;n xanh m&agrave; c&aacute;c chỗ b&aacute;n c&aacute; hay b&aacute;n (c&ograve;n gọi l&agrave; rong chứ kh&ocirc;ng ph&acirc;n biệt la h&aacute;n hay rong đu&ocirc;i c&aacute;o). C&aacute;c loại rong n&agrave;y ko chỉ tạo nguồn thức ăn cho c&aacute; ch&uacute;ng ta m&agrave; c&ograve;n c&oacute; t&aacute;c dụng l&agrave;m trong nước sau 1 thời gian.</p>\r\n\r\n<p>Ch&uacute; &yacute; bỏ c&agrave;ng nhiều c&agrave;ng tốt nhưng ở mức độ vừa phải, tr&aacute;nh trường hợp c&aacute; bơi ko được bị kẹt chết trong đ&oacute;.</p>\r\n\r\n<p>Nếu c&oacute; điều kiện ch&uacute;ng ta n&ecirc;n bỏ v&agrave;o hồ hoặc x&ocirc;, keo.. 1 &iacute;t đ&aacute; nham thạch hoặc sỏi to v&agrave;o, những loại đ&aacute; n&agrave;y c&oacute; b&aacute;n hầu hết ở c&aacute;c tiệm thuỷ sinh hoặc tiệm c&aacute; cảnh. Những loại đ&aacute; n&agrave;y c&oacute; khả năng l&agrave;m ch&ecirc; đậy đi số ph&acirc;n m&agrave; c&aacute; b&agrave;i tiết rồi lắng xuống đ&aacute;y, cũng 1 phần l&agrave;m cho nước trong v&agrave; sạch hơn. V&agrave; ở đ&acirc;y cũng c&oacute; thể tạo ra những con vi sinh, những con n&agrave;y len lỏi chui v&agrave;o c&aacute;c lỗ nhỏ trong n&agrave;y m&agrave; sống, vi sinh c&oacute; thể ti&ecirc;u diệt 1 số loại vi khuẩn g&acirc;y mầm bệnh cho con c&aacute; của bạn,bạn n&agrave;o ko c&oacute; điều kiện th&igrave; chơi lu&ocirc;n gạch ống x&acirc;y nh&agrave; 4 hoặc 2 lỗ.</p>\r\n\r\n<p>M&aacute;y sục kh&iacute;, m&aacute;y sủi oxy cho bể c&aacute; bảy m&agrave;u</p>\r\n\r\n<p>Bạn cũng n&ecirc;n c&oacute; 1 m&aacute;y sục kh&iacute; cho những hồ c&aacute; của m&igrave;nh. N&oacute; sẽ gi&uacute;p kh&ocirc;ng kh&iacute; lưu th&ocirc;ng, l&agrave;m tăng lượng oxy trong nước, c&aacute; sẽ mau lớn hơn.</p>\r\n\r\n<h2>C&aacute;ch Thay Nước Cho Hồ C&aacute; Guppy</h2>\r\n\r\n<p>Việc thay nước c&oacute; thể tạo ra hoặc giết chết những con c&aacute; tuyệt đẹp. Việc loại bỏ ph&acirc;n v&agrave; thức ăn thừa trong hồ c&aacute; l&agrave; rất quan trọng. Những người nu&ocirc;i c&aacute; th&agrave;nh c&ocirc;ng khuy&ecirc;n rằng bạn n&ecirc;n thay 30 - 40% lượng nước h&agrave;ng tuần. Một số người thay nước h&agrave;ng ng&agrave;y với số lượng l&agrave; 10% nước trong hồ. Việc n&agrave;y gi&uacute;p c&aacute; bột lớn nhanh hơn v&agrave; to hơn. N&oacute; cũng l&agrave;m giảm lượng amoniac.</p>\r\n\r\n<p>Thực ra, c&aacute; bảy m&agrave;u rất dễ sống v&agrave; sinh sản rất nhanh. Chỉ cần bạn quan t&acirc;m 1 ch&uacute;t l&agrave; được ngay 1 đ&agrave;n v&agrave;i trăm ch&uacute; bảy m&agrave;u từ 2 &ndash; 3 cặp đầu ti&ecirc;n chỉ sau 3 &ndash; 4 th&aacute;ng.</p>\r\n\r\n<p>Bảy m&agrave;u rất th&iacute;ch nước cũ (nhưng ko phải nước bị &ocirc; nhiễm). Bạn chỉ cần thay nước mỗi tuần 1 lần, mỗi lần 1/3 tới 1/2 hồ. Trong nước n&ecirc;n cho &iacute;t muối (&iacute;t muối hơn cho c&aacute; La H&aacute;n 1 ch&uacute;t &ndash; c&aacute; La H&aacute;n l&agrave; 100g/100 l&iacute;t, th&igrave; 7 m&agrave;u khoảng 50 &ndash; 70g/100 l&iacute;t).</p>', 'active', 'SGUNeiSxkU.jpeg', '2020-11-28 00:00:00', 'truongdinh', '2020-12-03 00:00:00', 'truongdinh', NULL, 'featured', 'Kỹ thuật nuôi cá ao', 'Kỹ thuật nuôi cá ao'),
(35, 8, 'Cá bống panda: Cách nuôi và chăm sóc cá bống panda( dễ nuôi)', '<p>C&aacute; bống panda c&oacute; th&acirc;n h&igrave;nh nhỏ b&eacute; nhưng cực k&igrave; dễ thương, lo&agrave;i c&aacute; n&agrave;y rất th&iacute;ch hợp nu&ocirc;i trong bể thuỷ sinh. C&ugrave;ng Ahisu t&igrave;m hiểu về c&aacute; bồng panda nh&eacute;.C&aacute; bống panda c&oacute; th&acirc;n h&igrave;nh nhỏ b&eacute; nhưng cực k&igrave; dễ thương, lo&agrave;i c&aacute; n&agrave;y rất th&iacute;ch hiểu về c&aacute; bồng panda nh&eacute; panda nh&eacute; panda nh&eacute; C&aacute; bống panda c&oacute; th&acirc;n h&igrave;nh nhỏ b&eacute; nhưng cực .</p>\r\n\r\n<h3>Giới thiệu</h3>\r\n\r\n<p><strong>C&aacute; bống panda</strong>&nbsp;c&oacute; t&ecirc;n khoa học l&agrave;&nbsp;<strong>Yaoshania&nbsp;pachychilus&nbsp;</strong>(lo&agrave;i c&aacute; n&agrave;y c&ograve;n c&oacute; t&ecirc;n gọi đồng nghĩa l&agrave;&nbsp;<em><strong>Protomyzon pachychilus&nbsp;</strong>v&agrave; t&ecirc;n tiếng anh l&agrave;<strong>&nbsp;Panda loach),&nbsp;</strong></em>c&aacute; bống panda thuộc trong họ nh&agrave;&nbsp;<strong>Gastromyzontidae.</strong></p>\r\n\r\n<p>C&aacute; bống panda đươc t&igrave;m thấy tại một số d&ograve;ng s&ocirc;ng, suối đầu nguồn chảy v&agrave;o s&ocirc;ng Xi Jiang ở n&uacute;i Dayaoshan, Quảng T&acirc;y, miền nam Trung Quốc. Lo&agrave;i c&aacute; n&agrave;y c&oacute; phạm vi xuất hiện khoảng 15.165 km&sup2;.</p>\r\n\r\n<p>H&igrave;nh ảnh c&aacute; bống panda</p>\r\n\r\n<h3>Đặc điểm<img alt=\"Hình ảnh cá bống panda\" src=\"https://www.ahisu.com/wp-content/uploads/2020/09/hinh_anh_ca_bong_panda.jpg\" style=\"height:455px; width:800px\" /></h3>\r\n\r\n<p>C&aacute; bống panda sở hữu th&acirc;n h&igrave;nh thu&ocirc;n d&agrave;i v&agrave; theo chiều hẹp về ph&iacute;a sau, miệng c&aacute; c&oacute; h&igrave;nh cắt giống h&igrave;nh m&oacute;ng ngựa, th&acirc;n của c&aacute; c&oacute; nền m&agrave;u trắng kết hợp tr&ecirc;n th&acirc;n bằng những sọc m&agrave;u x&aacute;m. Lo&agrave;i c&aacute; n&agrave;y sinh sống tr&ecirc;n nền đất c&aacute;t sỏi đ&aacute;, c&aacute; bống panda l&agrave; lo&agrave;i sống theo nh&oacute;m. Dưới đ&acirc;y l&agrave; những th&ocirc;ng số của c&aacute; bống panda:</p>\r\n\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>T&ecirc;n khoa học</strong></td>\r\n			<td>Yaoshania&nbsp;pachychilus</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>D&ograve;ng</strong></td>\r\n			<td><a href=\"https://www.ahisu.com/chordata/\">Chordata</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Họ</strong></td>\r\n			<td><a href=\"https://www.ahisu.com/gastromyzontidae/\">Gastromyzontidae</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Chi</strong></td>\r\n			<td><a href=\"https://www.ahisu.com/yaoshania/\">Yaoshania</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>T&iacute;nh c&aacute;ch</strong></td>\r\n			<td>&Ocirc;n ho&agrave;</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>K&iacute;ch thước</strong></td>\r\n			<td>Từ 4cm đến 6,5cm</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Nhiệt độ</strong></td>\r\n			<td>Từ 20 đến 23,9 độ C</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Độ cứng</strong></td>\r\n			<td>Từ 36 đến 268 ppm</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Độ pH tối ưu</strong></td>\r\n			<td>Từ 6,5 đến 7,5</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>CO2 tương th&iacute;ch</strong></td>\r\n			<td>từ 0 đến 30 mg/l</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Thức ăn</strong></td>\r\n			<td>Ăn tạp</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Giới t&iacute;nh</strong></td>\r\n			<td>Kh&oacute; nhận biết</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<h3>Sinh sản</h3>\r\n\r\n<p>C&aacute; bống panda l&agrave; giống c&aacute; c&oacute; t&iacute;nh c&aacute;ch hiền ho&agrave;, th&iacute;ch đồng loại v&agrave; n&ecirc;n được nu&ocirc;i theo nh&oacute;m từ 5 ch&uacute; c&aacute; trở n&ecirc;n.</p>\r\n\r\n<p>Nh&oacute;m c&aacute; bống panda c&agrave;ng lớn th&igrave; cơ hội c&oacute; giống c&aacute; c&agrave;ng lớn, điều n&agrave;y g&oacute;p phần đến sự sinh sản của lo&agrave;i c&aacute; n&agrave;y.</p>\r\n\r\n<p>Bất k&igrave; những lo&agrave;i c&aacute; n&agrave;o trong bể thuỷ sinh cũng đều phải c&oacute; k&iacute;ch thước v&agrave; t&iacute;nh c&aacute;ch tương tự c&aacute; panda v&agrave; đồng thời ph&aacute;t triển mạnh trong d&ograve;ng nước chảy xiết.</p>\r\n\r\n<p><img alt=\"Loading video\" src=\"https://i.ytimg.com/vi/3l8iQU-6HPA/sddefault.jpg#404_is_fine\" style=\"height:600px; width:800px\" /></p>\r\n\r\n<h3>Thức ăn</h3>\r\n\r\n<p>Trong tự nhi&ecirc;n, c&aacute; bống panda sống ở đ&aacute;y những d&ograve;ng s&ocirc;ng, con suối ch&uacute;ng chủ yếu ăn c&aacute;c loại sinh vật nhỏ kh&ocirc;ng xương sống v&agrave; c&aacute;c loại sinh vật gi&aacute;p x&aacute;c. Trong bể c&aacute; cảnh, c&aacute; bống panda sẽ ăn hầu hết c&aacute;c loại thức ăn được cung cấp c&oacute; k&iacute;ch thước nhỏ, đa phần lo&agrave;i c&aacute; n&agrave;y ăn những hạt c&aacute;m nhỏ v&agrave; c&aacute;c loại thức ăn d&agrave;nh cho c&aacute; thuỷ sinh kh&aacute;c.</p>\r\n\r\n<p>Cung cấp nhiều loại thức ăn gi&aacute; rẻ kh&aacute;c nhau, chẳng hạn như tr&ugrave;n chỉ, ấu tr&ugrave;ng v&agrave; lo&agrave;i dận nước nhỏ. C&aacute;c bạn c&oacute; thể tham khảo th&ecirc;m một số loại thức ăn d&agrave;nh ri&ecirc;ng cho c&aacute;: (<a href=\"http://www.ahisu.com/cac-loai-thuc-an-cho-ca/\">C&aacute;c loại thức ăn cho c&aacute; cảnh &amp; c&aacute;ch chọn thức ăn cho c&aacute; ph&ugrave; hợp</a>)</p>\r\n\r\n<p><img alt=\"Hình ảnh cá bống panda trong môi trường thuỷ sinh\" src=\"https://www.ahisu.com/wp-content/uploads/2020/09/hinh_anh_ca_bong_panda_trong_be_thuy_sinh.jpg\" style=\"height:455px; width:800px\" /></p>\r\n\r\n<p>H&igrave;nh ảnh c&aacute; bống panda trong m&ocirc;i trường thuỷ sinh</p>\r\n\r\n<h3>Hỏi đ&aacute;p</h3>\r\n\r\n<p>C&aacute;ch ph&acirc;n biệt c&aacute; bống panda đực v&agrave; c&aacute;i?</p>\r\n\r\n<p><em>Theo như ch&uacute;ng t&ocirc;i t&igrave;m hiểu từ c&aacute;c tư liệu nước ngo&agrave;i, những c&aacute; thể to hơn v&agrave; nặng nề hơn c&oacute; thể l&agrave; c&aacute; thể c&aacute;i.</em></p>\r\n\r\n<p>C&aacute; bống panda mua ở đ&acirc;u?</p>\r\n\r\n<p><em>Hiện nay c&aacute; bống panda vẫn b&aacute;n tr&ecirc;n c&aacute;c cửa h&agrave;ng c&aacute; cảnh tr&ecirc;n to&agrave;n quốc hoặc c&aacute;c bạn c&oacute; thể tham khảo tr&ecirc;n một số diễn đ&agrave;n về c&aacute; cảnh l&agrave; t&igrave;m v&agrave; mua được ngay.</em></p>\r\n\r\n<p>C&aacute; bống panda gi&aacute; bao nhi&ecirc;u</p>\r\n\r\n<p><em>Gi&aacute; của c&aacute; bống panda tr&ecirc;n thị trường dao động v&agrave;o khoảng 40.000đ đến 50.000đ/con tuỳ thuộc v&agrave;o k&iacute;ch cỡ từng con.</em></p>\r\n\r\n<h3>Tham khảo</h3>\r\n\r\n<ul>\r\n	<li><a href=\"https://en.wikipedia.org/wiki/Yaoshania_pachychilus\">https://en.wikipedia.org/wiki/Yaoshania_pachychilus</a></li>\r\n</ul>\r\n\r\n<h3>Lời kết</h3>\r\n\r\n<p>C&aacute; bống panda l&agrave; lo&agrave;i c&aacute; rất hiền l&agrave;nh v&agrave; rất đẹp với những đốm đen đậm chất thể thao tr&ecirc;n cơ thể m&agrave;u trắng kem. C&ograve;n chần chờ g&igrave; nữa m&agrave; kh&ocirc;ng li&ecirc;n hệ với ch&uacute;ng t&ocirc;i để biết th&ecirc;m th&ocirc;ng tin chi tiết về nhiều lo&agrave;i c&aacute; cảnh kh&aacute;c, c&aacute;c bạn c&ograve;n g&igrave; thắc mắc về giống c&aacute; bống panda n&agrave;y th&igrave; h&atilde;y để lại comment dưới b&agrave;i viết n&agrave;y, ch&uacute;ng t&ocirc;i đội ngũ gi&agrave;u kinh nghiệm sẽ giải đ&aacute;p những thắc mắc một c&aacute;ch ch&iacute;nh x&aacute;c nhất.</p>', 'active', 'hAV4Ba1E66.jpeg', '2020-11-30 00:00:00', 'hailan', '2020-12-03 00:00:00', 'truongdinh', NULL, 'featured', 'Cá bống panda: Cách nuôi và chăm sóc cá bống panda', 'Cá bống panda: Cách nuôi và chăm sóc cá bống panda');
INSERT INTO `article` (`id`, `category_id`, `name`, `content`, `status`, `thumb`, `created`, `created_by`, `modified`, `modified_by`, `publish_at`, `type`, `title_seo`, `description_seo`) VALUES
(36, 8, 'Cá bảy màu: Đặc điểm sống & cách nuôi cá bảy màu (cá guppy)', '<p>C&aacute; bảy m&agrave;u hay c&aacute; guppy l&agrave; lo&agrave;i dễ nu&ocirc;i &amp; đa dạng về chủng loại, ngo&agrave;i ra c&aacute; bảy m&agrave;u c&ograve;n l&agrave; lo&agrave;i c&aacute; nhiệt đới ph&acirc;n bố rộng r&atilde;i nhất tr&ecirc;n thế giới.<br />\r\nC&aacute; bảy m&agrave;u cũng l&agrave; một trong những lo&agrave;i c&aacute; cảnh nước ngọt phổ biến nhất v&agrave; c&oacute; nguồn gốc từ đ&ocirc;ng bắc Nam Mỹ, tuy nhi&ecirc;n c&aacute; bảy m&agrave;u đ&atilde; được đưa v&agrave;o nhiều m&ocirc;i trường sống v&agrave; hiện được t&igrave;m thấy tr&ecirc;n khắp thế giới.</p>\r\n\r\n<h3>Giới thiệu</h3>\r\n\r\n<p>C&aacute; bảy m&agrave;u (c&aacute;&nbsp;<em>Guppy</em>) c&oacute; danh ph&aacute;p khoa học l&agrave;&nbsp;<strong>Poecilia reticulata</strong>, thuộc họ&nbsp;<strong>Poeciliidae</strong>&nbsp;v&agrave; nằm trong chi&nbsp;<strong>Poecilia</strong>&nbsp;được ph&aacute;t hiện bởi &nbsp;Robert John Lechmere Guppy v&agrave;o năm 1866.</p>\r\n\r\n<p>Với sự đa dạng về chủng loại cũng như m&agrave;u sắc, c&aacute; bảy m&agrave;u được biết đến bởi đặc t&iacute;nh sinh trưởng v&ocirc; c&ugrave;ng phong ph&uacute; dễ th&iacute;ch ứng với m&ocirc;i trường xung quanh. Thức ăn của c&aacute; bảy m&agrave;u cũng cực kỳ đơn giản, dễ chăm s&oacute;c v&agrave; cực kỳ được những&nbsp;<a href=\"https://www.ahisu.com/loi-thuong-gap-khi-choi-thuy-sinh/\">người chơi thuỷ sinh</a>&nbsp;ưa chuộng.</p>\r\n\r\n<p><img alt=\"Hình ảnh cá bảy màu trong bể thuỷ sinh\" src=\"https://www.ahisu.com/wp-content/uploads/2020/08/hinh-anh-ca-bay-mau-trong-be-thuy-sinh.jpg\" style=\"height:455px; width:800px\" /></p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; H&igrave;nh ảnh c&aacute; bảy m&agrave;u trong bể thuỷ sinh</p>\r\n\r\n<h3>Đặc điểm sống</h3>\r\n\r\n<p>Kh&ocirc;ng qu&aacute; kh&oacute; để nhận biết đ&acirc;u l&agrave; c&aacute; bảy m&agrave;u đực, đ&acirc;u l&agrave; c&aacute; bảy m&agrave;u c&aacute;i. Bởi v&igrave; k&iacute;ch thước của c&aacute; c&aacute;i (từ 4 đến 6cm) lu&ocirc;n lớn v&agrave; d&agrave;i hơn c&aacute; đực (từ 2 đến 4 cm). Ngo&agrave;i ra, tuổi thọ trung b&igrave;nh của một con c&aacute; bảy m&agrave;u khoảng từ 2 đến 3 năm.</p>\r\n\r\n<p>Được biết đến l&agrave; một lo&agrave;i c&aacute; rất nhiều m&agrave;u sắc kh&aacute;c biệt, c&aacute; bảy m&agrave;u được rất nhiều người chơi thuỷ sinh t&igrave;m mua để trang tr&iacute; cho bể c&aacute; của m&igrave;nh với khả năng sinh trưởng rất tốt v&agrave; cũng rất dễ nu&ocirc;i.</p>\r\n\r\n<p><img alt=\"Hình ảnh chụp cận cảnh cá bảy màu\" src=\"https://www.ahisu.com/wp-content/uploads/2020/08/hinh-anh-can-canh-ca-bay-mau.jpg\" /></p>\r\n\r\n<p>H&igrave;nh ảnh chụp cận cảnh c&aacute; Guppy</p>\r\n\r\n<h3>Thức ăn c&aacute; bảy m&agrave;u</h3>\r\n\r\n<p>&ldquo;C&aacute; bảy m&agrave;u ăn g&igrave; tốt nhất&rdquo; hay &ldquo;thức ăn c&aacute; bảy m&agrave;u con&rdquo; l&agrave; những c&acirc;u hỏi khiến người chơi thuỷ sinh đang thắc mắc bấy l&acirc;u nay. Được biết, c&aacute; bảy m&agrave;u l&agrave; loại c&aacute; ăn tạp, thức ăn của ch&uacute;ng c&oacute; rất nhiều loại n&ecirc;n việc chọn lựa thức ăn cho ch&uacute;ng cũng hơi cầu kỳ. Dưới đ&acirc;y l&agrave; một số loại thức ăn cho c&aacute; bảy m&agrave;u, bạn h&atilde;y tham khảo nh&eacute;:</p>\r\n\r\n<ul>\r\n	<li>C&aacute;m nhật V0 l&agrave; loại c&aacute;m được biết đến với rất nhiều c&ocirc;ng dụng như: c&oacute; chứa h&agrave;m lượng kh&aacute;ng sinh ph&ograve;ng bệnh, bổ sung vitamin cho c&aacute;, c&oacute; h&agrave;m lượng đạm cao gi&uacute;p c&aacute; nh&agrave; bạn nhanh ph&aacute;t triển.</li>\r\n	<li>C&aacute;m Th&aacute;i Inve l&agrave; loại c&aacute;m ph&acirc;n huỷ nhanh, kh&ocirc;ng g&acirc;y đục nước, kh&ocirc;ng l&agrave;m ảnh hưởng đến m&ocirc;i trường sống của c&aacute; v&agrave; những th&agrave;nh phần thuỷ sinh kh&aacute;c trong bể của bạn.</li>\r\n	<li>Artemia nổi trong bề mặt nước, kh&ocirc;ng l&agrave;m ảnh hưởng đến nguồn nước, gi&uacute;p c&aacute; ăn rất dễ d&agrave;ng.</li>\r\n	<li>C&aacute;m Pandora l&agrave; loại c&aacute;m dạng nổi kh&ocirc;ng g&acirc;y ảnh hưởng đến nguồn nước, cung cấp đầy đủ h&agrave;m lượng dinh dưỡng cao rất tốt cho hệ ti&ecirc;u ho&aacute; của c&aacute;.</li>\r\n</ul>\r\n\r\n<p><img alt=\"Hình ảnh cá bảy màu đẹp cho người chơi thuỷ sinh\" src=\"https://www.ahisu.com/wp-content/uploads/2020/08/hinh-anh-ca-bay-mau-dep-cho-nguoi-moi-choi-thuy-sinh.jpg\" /></p>\r\n\r\n<p>H&igrave;nh ảnh c&aacute; Guppy đẹp cho người chơi thuỷ sinh</p>\r\n\r\n<h3>C&aacute;ch nu&ocirc;i c&aacute; bảy m&agrave;u</h3>\r\n\r\n<p>C&aacute;ch chăm s&oacute;c c&aacute; bảy m&agrave;u cũng rất đơn giản nếu bạn để &yacute; đến một số nhu cầu sau đ&acirc;y:</p>\r\n\r\n<ul>\r\n	<li>N&ecirc;n chiếu s&aacute;ng bể c&aacute; của bạn giao động trong khoảng 10-14 tiếng/ng&agrave;y. Nếu trong nh&agrave; thiếu &aacute;nh s&aacute;ng hoặc bể của bạn kh&ocirc;ng đủ &aacute;nh s&aacute;ng, bạn c&oacute; thể lắp th&ecirc;m c&aacute;c loại đ&egrave;n chiếu s&aacute;ng tốt cho c&aacute;.</li>\r\n	<li>Thường xuy&ecirc;n vệ sinh bể c&aacute; nh&agrave; bạn sạch sẽ v&igrave; m&ocirc;i trường nước đối với c&aacute; cũng rất quan trọng như vậy sẽ gi&uacute;p cho nước trong bể tr&aacute;nh được lượng Clo cao.</li>\r\n	<li>Trước khi thay nước bạn n&ecirc;n để ph&ograve;ng một lượng nước b&ecirc;n ngo&agrave;i trong khoảng 1-2 ng&agrave;y để gi&uacute;p bớt lượng Clo trong nước. Mỗi lần thay nước bạn chỉ cần thay khoảng 20-30% lượng nước l&agrave; đủ, tr&aacute;nh thay nước qu&aacute; nhiều.</li>\r\n</ul>\r\n\r\n<p><img alt=\"Loading video\" src=\"https://i.ytimg.com/vi/IYErTeZVaFA/sddefault.jpg#404_is_fine\" style=\"height:600px; width:800px\" /></p>\r\n\r\n<h3>C&aacute;c loại c&aacute; bảy m&agrave;u</h3>\r\n\r\n<p>Trong giới thuỷ sinh c&oacute; rất nhiều loại c&aacute; bảy m&agrave;u đẹp, mỗi loại c&aacute; 7 m&agrave;u c&oacute; vai tr&ograve; v&agrave; đặc t&iacute;nh ri&ecirc;ng. Phải kể đến những loại c&aacute; bảy m&agrave;u th&ocirc;ng dụng hiện nay như: C&aacute; bảy m&agrave;u Th&aacute;i, c&aacute; bảy m&agrave;u Koi, c&aacute; bảy m&agrave;u Mỹ, c&aacute; bảy m&agrave;u rồng, c&aacute; bảy m&agrave;u Albino, c&aacute; bảy m&agrave;u Dumbo, c&aacute; bảy m&agrave;u Endler,.. Tuỳ v&agrave;o sở th&iacute;ch của mỗi người n&ecirc;n việc chọn loại c&aacute; bảy m&agrave;u để chơi thuỷ sinh cũng rất kh&aacute;c nhau.</p>\r\n\r\n<h3>Hỏi đ&aacute;p</h3>\r\n\r\n<p><strong>C&aacute; bảy m&agrave;u bị chết?</strong></p>\r\n\r\n<p><em>C&aacute; bảy m&agrave;u rất nhạy cảm với nguồn nước, nguy&ecirc;n nh&acirc;n c&aacute; bảy m&agrave;u bị chết l&agrave; do tiếp x&uacute;c với nguồn nước mới, nước nhiễm Clo, nước bẩn hoặc nước thiếu độ pH. Bạn n&ecirc;n thay đổi m&ocirc;i trường nước cho c&aacute; bảy m&agrave;u thường xuy&ecirc;n nh&eacute;.</em></p>\r\n\r\n<p><strong>C&aacute; bảy m&agrave;u ăn t&eacute;p?</strong></p>\r\n\r\n<p><em>Trong trường hợp c&aacute; bảy m&agrave;u bị bỏ đ&oacute;i, ch&uacute;ng sẽ tấn c&ocirc;ng t&eacute;p (đặc biệt l&agrave; t&eacute;p con) v&igrave; c&aacute; bảy m&agrave;u c&oacute; thể ăn bất cứ con t&eacute;p n&agrave;o vừa miệng ch&uacute;ng.</em></p>\r\n\r\n<p><strong>C&aacute; bảy m&agrave;u (c&aacute; Guppy) gi&aacute; bao nhi&ecirc;u?</strong></p>\r\n\r\n<p><em>Gi&aacute; của c&aacute; bảy m&agrave;u (c&aacute; Guppy) giao động trong khoảng từ 5 đến 10 ng&agrave;n/con đối với loại c&aacute; b&agrave;y m&agrave;u th&ocirc;ng thường. Đối với gi&aacute; bảy m&agrave;u cao cấp c&oacute; gi&aacute; giao động trong khoảng từ 100 đến 200 ng&agrave;n/con.</em></p>\r\n\r\n<p><strong>Mua c&aacute; bảy m&agrave;u ở đ&acirc;u?</strong></p>\r\n\r\n<p><em>C&aacute; bảy m&agrave;u l&agrave; một lo&agrave;i c&aacute; đẹp v&agrave; được người chơi thuỷ sinh n&ecirc;n việc t&igrave;m mua kh&ocirc;ng hề kh&oacute;. Bạn c&oacute; thể t&igrave;m mua lo&agrave;i c&aacute; n&agrave;y ở hầu hết c&aacute;c cửa h&agrave;ng thuỷ sinh tr&ecirc;n to&agrave;n quốc.</em></p>\r\n\r\n<h3>Tham khảo</h3>\r\n\r\n<ul>\r\n	<li><a href=\"https://en.wikipedia.org/wiki/Guppy\">https://en.wikipedia.org/wiki/Guppy</a></li>\r\n</ul>\r\n\r\n<h3>Lời kết</h3>\r\n\r\n<p>Nếu bạn cần th&ecirc;m th&ocirc;ng tin tham khảo về lo&agrave;i c&aacute; bảy m&agrave;u hay c&aacute; Guppy, h&atilde;y để lại b&igrave;nh luận dưới b&agrave;i viết n&agrave;y. Ch&uacute;ng t&ocirc;i sẽ giải đ&aacute;p những c&acirc;u hỏi của c&aacute;c bạn một c&aacute;ch nhanh ch&oacute;ng v&agrave; ch&iacute;nh x&aacute;c nhất.</p>', 'active', 'lhPt2y7EHa.jpeg', '2020-11-30 00:00:00', 'hailan', '2020-11-30 00:00:00', 'hailan', NULL, 'featured', 'Cá bảy màu: Đặc điểm sống & cách nuôi cá bảy màu (cá guppy)', 'Cá bảy màu: Đặc điểm sống & cách nuôi cá bảy màu (cá guppy)'),
(37, 8, 'Cá diếc anh đào: Hướng dẫn nuôi và cách chăm sóc cá diếc anh đào', '<p>C&aacute; diếc anh đ&agrave;o với m&agrave;u sắc sặc sỡ rất th&iacute;ch hợp khi nu&ocirc;i trong m&ocirc;i trường thuỷ sinh. H&atilde;y c&ugrave;ng&nbsp;<a href=\"https://www.ahisu.com/dich-vu/\">Ahisu</a>&nbsp;t&igrave;m hiểu về lo&agrave;i c&aacute; diếc anh đ&agrave;o n&agrave;y nh&eacute;</p>\r\n\r\n<h3>Giới thiệu</h3>\r\n\r\n<p><strong>C&aacute; diếc anh đ&agrave;o</strong>&nbsp;c&oacute; t&ecirc;n khoa học l&agrave;&nbsp;<strong>Puntius titteya&nbsp;</strong>v&agrave;<strong>&nbsp;barb cherry,&nbsp;</strong>người Việt Nam c&ograve;n gọi c&aacute; diếc anh đ&agrave;o với những t&ecirc;n gọi kh&aacute;c nhau l&agrave; c&aacute; anh đ&agrave;o, c&aacute; r&acirc;u anh đ&agrave;o, riếc anh đ&agrave;o, c&aacute; hồng đ&agrave;o v&agrave; c&aacute; huyết hồng đ&agrave;o. C&aacute; diếc anh đ&agrave;o l&agrave; c&aacute; nước ngọt thuộc họ Cyprinidae.</p>\r\n\r\n<p>C&aacute; diếc anh đ&agrave;o l&agrave; lo&agrave;i c&aacute; đặc hữu của v&ugrave;ng đất Sri Lanka, ch&uacute;ng được t&igrave;m thấy trong c&aacute;c d&ograve;ng s&ocirc;ng chảy chậm tại ph&iacute;a nam của Kalutara, Gampaha, Colombo, Matara, Galle, Ratnapura v&agrave; Kegalle.</p>\r\n\r\n<p>H&igrave;nh ảnh c&aacute; diếc anh đ&agrave;o trong m&ocirc;i trường thuỷ sinh</p>\r\n\r\n<h3>Đặc điểm<img alt=\"Hình ảnh cá diếc anh đào trong môi trường thuỷ sinh\" src=\"https://www.ahisu.com/wp-content/uploads/2020/09/hinh_anh-ca_diec_anh_dao_trong_moi_truong_thuy_sinh.jpg\" style=\"height:455px; width:800px\" /></h3>\r\n\r\n<p>C&aacute; diếc anh đ&agrave;o l&agrave; một trong những lo&agrave;i c&aacute; c&oacute; th&acirc;n h&igrave;nh thon d&agrave;i, lo&agrave;i c&aacute; n&agrave;y c&oacute; chiều d&agrave;i l&agrave; 5cm với những con c&aacute; trưởng th&agrave;nh. C&aacute; diếc anh đ&agrave;o c&aacute;i c&oacute; m&agrave;u n&acirc;u v&agrave;ng tr&ecirc;n phần đầu kết hợp với một ch&uacute;t m&agrave;u &aacute;nh xanh lục nhẹ, mặt v&agrave; bụng của c&aacute; c&aacute;i c&oacute; những điểm bằng bạc lấp l&aacute;nh.</p>\r\n\r\n<p>C&aacute; diếc anh đ&agrave;o đực c&oacute; m&agrave;u hơi hoe đỏ, khi ch&uacute;ng phối giống c&aacute; đực sẽ trở n&ecirc;n đỏ đậm hơn v&agrave; th&acirc;n h&igrave;nh sẽ mảnh mai hơn. Dưới đ&acirc;y l&agrave; những th&ocirc;ng số của c&aacute; diếc anh đ&agrave;o, c&aacute;c độc giả n&ecirc;n ch&uacute; &yacute;:</p>\r\n\r\n<p><br />\r\nKhi đến m&ugrave;a sinh sản, c&aacute; diếc anh đ&agrave;o đực sẽ bơi ngay sau bạn t&igrave;nh của m&igrave;nh nhằm xua đuổi những con đực đối thủ kh&aacute;c. C&aacute; diếc anh đ&agrave;o l&agrave; c&aacute; thể c&aacute; đẻ trứng tự do v&agrave; trứng sẽ kh&ocirc;ng c&oacute; sự chăm s&oacute;c của cha mẹ. Khi ở trong t&igrave;nh trạng tốt, c&aacute; diếc anh đ&agrave;o c&aacute;i sẽ để trứng thường xuy&ecirc;n hơn, con c&aacute;i sẽ đẻ từ 200 đến 300 trứng v&agrave; dải những quả trứng của m&igrave;nh tr&ecirc;n những c&aacute; thể thực vật.Sinh sản</p>\r\n\r\n<p>Tuy nhi&ecirc;n, c&aacute;c bạn muốn tối đa lợi nhuận th&igrave; cần phải c&oacute; c&aacute;ch tiếp cận v&agrave; kiểm so&aacute;t, thiết lập một bể c&aacute; nhỏ, nơi bể c&aacute; nhỏ n&ecirc;n giữ ở nền &aacute;nh s&aacute;ng mờ v&agrave; nền được che bởi một loại lưới đủ lớn để trứng c&aacute; diếc anh đ&agrave;o c&oacute; thể lọt qua nhưng cũng kh&ocirc;ng n&ecirc;n để c&aacute; trưởng th&agrave;nh lọt qua được. Với những tấm thảm nhựa được phổ biến rộng r&atilde;i cũng tỏ ra hiệu quả rất tốt v&agrave; c&oacute; thể tham khảo th&ecirc;m một lớp bi thuỷ tinh dưới mặt đ&aacute;y bể.</p>\r\n\r\n<p>Bể c&aacute; cần được lấp đầy bằng những loại l&aacute; c&acirc;y mịn như&nbsp;<strong>Flame Moss</strong>&nbsp;(r&ecirc;u lửa) hoặc c&acirc;y lau nh&agrave; để c&aacute; đẻ trứng cũng c&oacute; thể mang lại hiệu quả rất tốt. Trứng của c&aacute; diếc anh đ&agrave;o sẽ nở sau một đến hai ng&agrave;y v&agrave; c&aacute; con c&oacute; thể bơi tự do trong m&ocirc;i trường thuỷ sinh sau hai ng&agrave;y nữa, sau năm tuần c&aacute; con sẽ được khoảng 1cm v&agrave; dễ d&agrave;ng nhận dạng ngach anh đ&agrave;o đặc trưng của c&aacute;.</p>\r\n\r\n<p><img alt=\"Hình ảnh cá diếc anh đào đến mùa sinh sản\" src=\"https://www.ahisu.com/wp-content/uploads/2020/09/hinh_anh_ca_diec_anh_dao_sinh_san.jpg\" style=\"height:455px; width:800px\" /></p>\r\n\r\n<p>H&igrave;nh ảnh c&aacute; diếc anh đ&agrave;o đến m&ugrave;a sinh sản</p>\r\n\r\n<h3>Thức ăn</h3>\r\n\r\n<p>C&aacute; diếc anh đ&agrave;o khi ở ngo&agrave;i m&ocirc;i trường tự nhi&ecirc;n l&agrave; lo&agrave;i kiếm thức ăn từ tảo, tảo c&aacute;t, m&ugrave;n b&atilde; hữu cơ, c&ocirc;n tr&ugrave;ng nhỏ, giun v&agrave; động vật ph&ugrave; du kh&aacute;c.</p>\r\n\r\n<p>Trong m&ocirc;i trường thuỷ sinh, c&aacute; diếc anh đ&agrave;o l&agrave; lo&agrave;i dễ d&agrave;ng cho ăn cung cấp c&aacute;c thức ăn thường xuy&ecirc;n cho c&aacute; gồm thức ăn tươi sống, thức ăn đ&ocirc;ng lạnh nhỏ như tr&ugrave;n chỉ, chi dận nước v&agrave; chi t&ocirc;m ng&acirc;m nước mặn. Thức ăn y&ecirc;u th&iacute;ch của c&aacute; diếc anh đ&agrave;o l&agrave; những loại c&aacute;m hạt nhỏ mảnh v&agrave; hạt kh&ocirc; chất lượng tốt v&agrave; một số loại thức ăn chuy&ecirc;n d&ugrave;ng cho c&aacute; kh&aacute;c. C&aacute;c bạn c&oacute; thể tham khảo th&ecirc;m thức ăn cho c&aacute; tại (<a href=\"https://www.ahisu.com/cac-loai-thuc-an-cho-ca/\">C&aacute;c loại thức ăn cho c&aacute; cảnh &amp; c&aacute;ch chọn thức ăn cho c&aacute; ph&ugrave; hợp</a>&nbsp;)</p>\r\n\r\n<h3>Hỏi đ&aacute;p</h3>\r\n\r\n<p>C&aacute; diếc anh đ&agrave;o c&oacute; dễ nu&ocirc;i kh&ocirc;ng?</p>\r\n\r\n<p><em>C&aacute; diếc anh đ&agrave;o l&agrave; loại c&aacute; ăn tạp kết hợp với nhiều loại thực phẩm n&ecirc;n c&aacute; diếc anh đ&agrave;o rất dễ nu&ocirc;i.</em></p>\r\n\r\n<p>C&aacute; diếc anh đ&agrave;o mua ở đ&acirc;u?</p>\r\n\r\n<p><em>Hiện nay c&aacute; diếc anh đ&agrave;o vẫn được b&aacute;n rộng d&atilde;i tr&ecirc;n c&aacute;c cửa h&agrave;ng c&aacute; cảnh tr&ecirc;n to&agrave;n quốc hoặc c&aacute;c bạn c&oacute; thể l&ecirc;n những diễn đ&agrave;n về c&aacute; thuỷ sinh l&agrave; c&oacute; thể t&igrave;m v&agrave; mua được ngay.</em></p>\r\n\r\n<p>C&aacute; diếc anh đ&agrave;o gi&aacute; bao nhi&ecirc;u?</p>\r\n\r\n<p><em>Gi&aacute; của c&aacute; diếc anh đ&agrave;o tr&ecirc;n thị trường hiện nay dao động v&agrave;o khoảng 10.000đ đến 12.000đ/con tuỳ thuộc v&agrave;o k&iacute;ch cỡ mỗi con.</em></p>\r\n\r\n<h3>Tham khảo</h3>\r\n\r\n<ul>\r\n	<li><a href=\"https://en.wikipedia.org/wiki/Cherry_barb\">https://en.wikipedia.org/wiki/Cherry_barb</a></li>\r\n</ul>\r\n\r\n<h3>Lời kết</h3>\r\n\r\n<p>C&aacute; diếc anh đ&agrave;o l&agrave; lo&agrave;i c&aacute; c&oacute; m&agrave;u sắc sặc sỡ, rất được những người chơi c&aacute; cảnh y&ecirc;u th&iacute;ch, h&atilde;y nhanh tay sắm những ch&uacute; c&aacute; xinh xắn n&agrave;y về nu&ocirc;i trong bể thuỷ sinh nh&agrave; m&igrave;nh th&ocirc;i n&agrave;o. Tr&ecirc;n đ&acirc;y,&nbsp;<a href=\"https://www.ahisu.com/dich-vu/\">Ahisu</a>&nbsp;đ&atilde; giới thiệu cho c&aacute;c bạn về lo&agrave;i c&aacute; diếc anh đ&agrave;o n&agrave;y rồi, c&aacute;c bạn c&ograve;n g&igrave; thắc mắc về lo&agrave;i c&aacute; n&agrave;y th&igrave; h&atilde;y để lại comment dưới b&agrave;i viết n&agrave;y, ch&uacute;ng t&ocirc;i sẽ giải đ&aacute;p những thắc mắc một c&aacute;ch ch&iacute;nh x&aacute;c nhất.</p>', 'active', 'J9Zqu0GLld.jpeg', '2020-11-30 00:00:00', 'hailan', '2020-11-30 00:00:00', 'hailan', NULL, 'featured', 'Cá diếc anh đào: Hướng dẫn nuôi và cách chăm sóc cá diếc anh đào', 'Cá diếc anh đào: Hướng dẫn nuôi và cách chăm sóc cá diếc anh đào'),
(38, 11, 'Cá thuỷ tinh: Hướng dẫn cách nHình ảnh cá thuỷ tinhuôi & chăm sóc cá thuỷ tinh', '<p>C&aacute; thuỷ tinh c&oacute; th&acirc;n h&igrave;nh trong suốt n&ecirc;n được nhiều người chơi c&aacute; y&ecirc;u th&iacute;ch. L&agrave; lo&agrave;i c&aacute; da trơn n&ecirc;n c&aacute; thuỷ tinh rất nhạy cảm với m&ocirc;i trường nước.</p>\r\n\r\n<h3>Giới thiệu</h3>\r\n\r\n<p><strong>C&aacute; thuỷ tinh</strong>&nbsp;c&oacute; t&ecirc;n khoa học l&agrave;&nbsp;<em><strong>Kryptopterus bicirrhis</strong></em>, l&agrave; một lo&agrave;i c&aacute; da trơn Ch&acirc;u &Aacute; thuộc chi&nbsp;<strong>Kryptopterus</strong>. C&aacute; thuỷ tinh được t&igrave;m thấy tr&ecirc;n hệ thống tho&aacute;t nước s&ocirc;ng M&ecirc; K&ocirc;ng ở L&agrave;o về ph&iacute;a nam đến đồng bằng Việt Nam, s&ocirc;ng Chao Phraya ở Th&aacute;i Lan tho&aacute;t nước về ph&iacute;a nam đến s&ocirc;ng Pahang ở b&aacute;n đảo M&atilde; Lai.</p>\r\n\r\n<p>Ngo&agrave;i ra d&ograve;ng c&aacute; thủy tinh c&ograve;n được t&igrave;m thấy ở s&ocirc;ng Deli đến hệ thống tho&aacute;t nước Way Seputih ở Sumatra, s&ocirc;ng Ciliwung k&eacute;o d&agrave;i về ph&iacute;a đ&ocirc;ng đến hệ thống s&ocirc;ng Brantas ở Indonesia, v&agrave; s&ocirc;ng Baram tho&aacute;t nước về ph&iacute;a nam đến hệ thống s&ocirc;ng Barito ở Borneo.</p>\r\n\r\n<p>H&igrave;nh ảnh c&aacute; thuỷ tinh</p>\r\n\r\n<h3>Đặc điểm<img alt=\"Hình ảnh cá thuỷ tinh\" src=\"https://www.ahisu.com/wp-content/uploads/2020/09/hinh_anh_ca_thuy_tinh.jpg\" style=\"height:455px; width:800px\" /></h3>\r\n\r\n<p>C&aacute; thuỷ tinh l&agrave; loại c&aacute; kỳ lạ nhất thế giới, ch&uacute;ng sở hữu th&acirc;n h&igrave;nh trong suốt, khi bị &aacute;nh s&aacute;ng chiếu v&agrave;o cơ thể c&aacute; c&oacute; m&agrave;u &aacute;nh kim, khi chết c&aacute; sẽ chuyển sang m&agrave;u &aacute;nh sữa. ch&uacute;ng c&oacute; bộ xương sống v&agrave; cột sống c&oacute; thể nh&igrave;n thấy được, v&acirc;y lưng c&aacute; th&ocirc; sơ, c&aacute;c ngạch ở h&agrave;m tr&ecirc;n d&agrave;i tới v&acirc;y hậu m&ocirc;n, mặt lưng được uốn cong, chiều d&agrave;i của v&acirc;y ngực lớn hơn chiều d&agrave;i đầu của c&aacute;.</p>\r\n\r\n<p>C&aacute; thuỷ tinh c&oacute; chiều d&agrave;i cơ thể v&agrave;o khoảng 12 &ndash; 15cm, c&aacute; c&oacute; xu hướng sinh sống ở những v&ugrave;ng nước chảy xiết v&agrave; c&oacute; nhiều v&agrave;o những ng&agrave;y cuối m&ugrave;a mưa ở khu hồ Danau Sentarum. Dưới đ&acirc;y l&agrave; những th&ocirc;ng số li&ecirc;n quan đến c&aacute; thuỷ tinh, bạn cần ch&uacute; &yacute;:</p>\r\n\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>T&ecirc;n khoa học</strong></td>\r\n			<td>Kryptopterus bicirrhis</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>D&ograve;ng</strong></td>\r\n			<td><a href=\"https://www.ahisu.com/chordata/\">Chordata</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Họ</strong></td>\r\n			<td><a href=\"https://www.ahisu.com/siluridae/\">Siluridae</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Chi</strong></td>\r\n			<td><a href=\"https://www.ahisu.com/kryptopterus/\">Kryptopterus</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>T&iacute;nh c&aacute;ch</strong></td>\r\n			<td>&Ocirc;n ho&agrave;</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>K&iacute;ch thước</strong></td>\r\n			<td>Từ 12cm đến 15cm</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Nhiệt độ</strong></td>\r\n			<td>Từ 20 đến 28 độ C</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Độ cứng</strong></td>\r\n			<td>Từ 36 đến 268 ppm</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Độ pH tối ưu</strong></td>\r\n			<td>Từ 6,0 đến 7,5</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>CO2 tương th&iacute;ch</strong></td>\r\n			<td>từ 0 đến 30 mg/L</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Thức ăn</strong></td>\r\n			<td>Ăn tạp</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Giới t&iacute;nh</strong></td>\r\n			<td>Kh&oacute; nhận biết</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><img alt=\"Loading video\" src=\"https://i.ytimg.com/vi/8lvWo8pfv6Y/sddefault.jpg#404_is_fine\" style=\"height:600px; width:800px\" /></p>\r\n\r\n<h3>Thức ăn</h3>\r\n\r\n<p>Thức ăn chủ yếu của c&aacute; thuỷ tinh l&agrave; một số lo&agrave;i c&aacute; nhỏ, kết hợp với giun, c&ocirc;n tr&ugrave;ng v&agrave; một v&agrave;i loại&nbsp;<a href=\"http://www.ahisu.com/cac-loai-thuc-an-cho-ca/\">thức ăn cho c&aacute;</a>&nbsp;kh&aacute;c. Khi c&aacute; được nu&ocirc;i trong điều kiện nu&ocirc;i nhốt, c&oacute; thể kh&ocirc;ng cần cho c&aacute; ăn những loại thức ăn tươi sống đ&oacute;.</p>\r\n\r\n<p>Nu&ocirc;i c&aacute; thuỷ tinh trong m&ocirc;i trường thuỷ sinh cần cung cấp chế độ ăn uống đa dạng hơn bao gồm: C&aacute;c loại thực phẩm kh&ocirc; ch&igrave;m, tr&ugrave;n chỉ sống v&agrave; đ&ocirc;ng lạnh c&oacute; thể bổ sung th&ecirc;m giun đất nhỏ cho c&aacute; ăn.</p>\r\n\r\n<p><img alt=\"Cá thuỷ tinh bơi thành đàn trong môi trường thuỷ sinh\" src=\"https://www.ahisu.com/wp-content/uploads/2020/09/ca_thuy_tinh_boi_thanh_dan_trong_moi_truong_thuy_sinh.jpg\" /></p>\r\n\r\n<p>C&aacute; thuỷ tinh bơi th&agrave;nh đ&agrave;n trong m&ocirc;i trường thuỷ sinh</p>\r\n\r\n<h3>Hỏi đ&aacute;p</h3>\r\n\r\n<p>C&aacute; thuỷ tinh đẻ trứng hay đẻ con?</p>\r\n\r\n<p><em>C&aacute; thuỷ tinh l&agrave; lo&agrave;i c&aacute; đẻ trứng, khi c&aacute; sinh sản bạn n&ecirc;n t&aacute;ch c&aacute; bố mẹ khỏi trứng, trứng của c&aacute; d&iacute;nh tr&ecirc;n nền đ&aacute; hoặc những c&acirc;y thuỷ sinh, trong khoảng 24 đến 48 giờ trứng của c&aacute; sẽ bắt đầu nở.</em></p>\r\n\r\n<p>C&aacute; thuỷ tinh mua ở đ&acirc;u?</p>\r\n\r\n<p><em>Hiện nay tr&ecirc;n thị trường Việt Nam c&oacute; rất &iacute;t cửa h&agrave;ng c&aacute; thuỷ sinh bu&ocirc;n b&aacute;n lo&agrave;i c&aacute; n&agrave;y, c&aacute;c bạn c&oacute; thể l&ecirc;n những diễn đ&agrave;n, group facebook về thủy sinh để t&igrave;m kiếm.</em></p>\r\n\r\n<p>C&aacute; thuỷ tinh gi&aacute; bao nhi&ecirc;u?</p>\r\n\r\n<p><em>Gi&aacute; của c&aacute; thuỷ tinh tr&ecirc;n thị trường dao động v&agrave;o khoảng 5000đ đến 15000đ/con tuỳ thuộc v&agrave;o k&iacute;ch cỡ của từng loại.</em></p>\r\n\r\n<h3>Tham khảo</h3>\r\n\r\n<ul>\r\n	<li><a href=\"https://en.wikipedia.org/wiki/Kryptopterus_bicirrhis\">https://en.wikipedia.org/wiki/Kryptopterus_bicirrhis</a></li>\r\n</ul>\r\n\r\n<h3>Lời kết</h3>\r\n\r\n<p>C&aacute; thuỷ tinh l&agrave; lo&agrave;i&nbsp;<a href=\"https://www.ahisu.com/ca-boi-theo-dan/\">c&aacute; thuỷ sinh sống theo bầy đ&agrave;n</a>, khuyến nghị c&aacute;c bạn n&ecirc;n thả từ 5 đến 7 con trở n&ecirc;n để lo&agrave;i c&aacute; n&agrave;y được ph&aacute;t triển tốt nhất. Nếu bạn c&ograve;n những thắc mắc kh&ocirc;ng hiểu về lo&agrave;i c&aacute; thuỷ tinh n&agrave;y, bạn h&atilde;y để lại comment dưới b&agrave;i viết n&agrave;y, ch&uacute;ng t&ocirc;i với đội ngũ chuy&ecirc;n về những giống c&aacute; thuỷ sinh sẽ giải đ&aacute;p những thắc mắc của bạn một c&aacute;ch nhanh ch&oacute;ng nhất.</p>', 'active', 'XpimnXLjEC.jpeg', '2020-11-30 00:00:00', 'hailan', '2020-11-30 00:00:00', 'hailan', NULL, 'normal', 'Cá thuỷ tinh: Hướng dẫn cách nuôi & chăm sóc cá thuỷ tinh', 'Cá thuỷ tinh: Hướng dẫn cách nuôi & chăm sóc cá thuỷ tinh'),
(39, 11, 'Cá tỳ bà bướm: Chia sẻ cách nuôi và chăm sóc cá tỳ bà bướm', '<p>C&aacute; tỳ b&agrave; bướm l&agrave; một lo&agrave;i c&aacute; đẹp với h&igrave;nh d&aacute;ng nhỏ v&agrave; độc đ&aacute;o, c&aacute; tỳ b&agrave; bướm sẽ l&agrave; điểm nhấn rất th&uacute; vị khi được nu&ocirc;i trong bể,&nbsp;<a href=\"http://www.ahisu.com/ho-thuy-sinh-mini/\">hồ thuỷ sinh</a>.</p>\r\n\r\n<p>Trong b&agrave;i viết n&agrave;y&nbsp;<a href=\"https://www.ahisu.com/\">Ahisu</a>&nbsp;sẽ c&ugrave;ng c&aacute;c độc giả t&igrave;m hiểu chi tiết hơn về lo&agrave;i c&aacute; tỳ b&agrave; bướm cũng như c&aacute;c th&ocirc;ng tin v&agrave; nguồn gốc xuất sứ của c&aacute; tỳ b&agrave; bướm.</p>\r\n\r\n<h3>Giới thiệu<img alt=\"Hình ảnh cá tỳ bà bướm bám vào đá\" src=\"https://www.ahisu.com/wp-content/uploads/2020/09/hinh_anh_ca-ty_ba_buom_bam_vao_da.jpg\" style=\"height:455px; width:800px\" /></h3>\r\n\r\n<p><strong>C&aacute; tỳ b&agrave; bướm</strong>&nbsp;c&oacute; t&ecirc;n khoa học l&agrave;&nbsp;<strong>Sewellia lineolata&nbsp;</strong><em>(hay được gọi với c&aacute;i t&ecirc;n kh&aacute;c l&agrave;&nbsp;<strong>c&aacute; tỳ b&agrave; sao</strong>)</em>, c&aacute; tỳ b&agrave; bướm thuộc v&agrave;o họ&nbsp;<strong>Balitoridae</strong>. D&ograve;ng c&aacute; n&agrave;y được t&igrave;m thấy v&agrave; ph&aacute;t hiện nhiều nhất tại Việt Nam v&agrave; L&agrave;o.</p>\r\n\r\n<p>Cụ thể hơn c&aacute; tỳ b&agrave; bướm được t&igrave;m thấy tại c&aacute;c tỉnh Thừa Thi&ecirc;n-Huế, Quảng Nam, Quảng Ng&atilde;i v&agrave; tại B&igrave;nh Định. Lo&agrave;i c&aacute; n&agrave;y c&ograve;n được t&igrave;m thấy trong một số con suối tr&ecirc;n khu vực s&ocirc;ng Mekong ở L&agrave;o v&agrave; gần bi&ecirc;n giới Campuchia.</p>\r\n\r\n<p>H&igrave;nh ảnh c&aacute; tỳ b&agrave; bướm b&aacute;m v&agrave;o đ&aacute;</p>\r\n\r\n<h3>Đặc điểm</h3>\r\n\r\n<p>C&aacute; tỳ b&agrave; bướm thuộc v&agrave;o lo&agrave;i c&aacute; c&oacute; da trơn, h&igrave;nh d&aacute;ng của c&aacute; giống như con bướm đang tung c&aacute;nh. Tr&ecirc;n bộ phận lưng của c&aacute; chứa c&aacute;c h&igrave;nh hoa văn c&oacute; t&aacute;c dụng để nguỵ trang khỏi kẻ th&ugrave; rất đẹp mắt.</p>\r\n\r\n<p>Lo&agrave;i c&aacute; n&agrave;y ưa th&iacute;ch với những d&ograve;ng nước chảy xiết với h&igrave;nh d&aacute;ng cơ thể l&otilde;m xuống v&agrave; được mở rộng cho ph&eacute;p ch&uacute;ng b&aacute;m v&agrave;o đ&aacute; tốt hơn trong d&ograve;ng nước chảy xiết.</p>\r\n\r\n<p>Lo&agrave;i c&aacute; n&agrave;y sống ở m&ocirc;i trường nước trong, b&atilde;o ho&agrave; oxi, kết hợp với &aacute;nh s&aacute;ng mặt trời, tạo điều kiện ph&aacute;t triển của c&aacute;c lớp sinh học tr&ecirc;n bề mặt ngập nước. Dưới đ&acirc;y l&agrave; những th&ocirc;ng số li&ecirc;n quan đến lo&agrave;i c&aacute; tỳ b&agrave; bướm:</p>\r\n\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>T&ecirc;n khoa học</strong></td>\r\n			<td>Sewellia lineolata</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>D&ograve;ng</strong></td>\r\n			<td><a href=\"https://www.ahisu.com/chordata/\">Chordata</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Họ</strong></td>\r\n			<td><a href=\"https://www.ahisu.com/gastromyzontidae/\">Gastromyzontidae</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Chi</strong></td>\r\n			<td><a href=\"https://www.ahisu.com/sewellia/\">Sewellia</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>T&iacute;nh c&aacute;ch</strong></td>\r\n			<td>&Ocirc;n h&ograve;a</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>K&iacute;ch thước</strong></td>\r\n			<td>Tối đa từ 5,5 đến 7cm</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Nhiệt độ</strong></td>\r\n			<td>Từ 0 đến 35 độ C</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Độ cứng</strong></td>\r\n			<td>18 &ndash; 179 ppm</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Độ pH tối ưu</strong></td>\r\n			<td>Từ 6,0 đến 7,5</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>CO2 tương th&iacute;ch</strong></td>\r\n			<td>0 đến 30 mg / l</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Thức ăn</strong></td>\r\n			<td>Ăn tạp</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Giới t&iacute;nh</strong></td>\r\n			<td>Kh&oacute; nhận biết</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<h3>Giới t&iacute;nh</h3>\r\n\r\n<p>H&igrave;nh d&aacute;ng của lo&agrave;i c&aacute; tỳ b&agrave; bướm rất dễ nhận biết khi nh&igrave;n từ phần đầu xuống th&acirc;n từ tr&ecirc;n xuống, với con c&aacute;i sở hữu th&acirc;n h&igrave;nh tương đối rộng r&atilde;i v&agrave; m&otilde;m hoạt động gần như li&ecirc;n tục với v&acirc;y ngực.</p>\r\n\r\n<p>Con đực được so s&aacute;nh l&agrave; nhỏ hơn con c&aacute;i, với bộ m&otilde;m vu&ocirc;ng v&agrave; nhiều v&acirc;y ngực nh&ocirc; ra khỏi cơ thể gần như vu&ocirc;ng g&oacute;c. Những con đực trưởng th&agrave;nh về mặt sinh dục cũng ph&aacute;t triển th&ecirc;m h&agrave;ng gai mềm nh&ocirc; cao tr&ecirc;n phần tia v&acirc;y ph&iacute;a trước v&agrave; được bổ sung th&ecirc;m tr&ecirc;n bề mặt lưng v&agrave; đầu.</p>\r\n\r\n<p><img alt=\"Loading video\" src=\"https://i.ytimg.com/vi/1d0c1HnzKEI/sddefault.jpg#404_is_fine\" style=\"height:600px; width:800px\" /></p>\r\n\r\n<h3>Sinh sản</h3>\r\n\r\n<p>Ban đầu con đực sử dụng những m&agrave;n t&aacute;n tỉnh v&agrave; theo đuổi con c&aacute;i. Khi con c&aacute;i đ&atilde; tỏ &yacute; đ&atilde; chấp nhận, h&agrave;nh vi của con đực sẽ thay đổi theo chiều hướng bơi v&ograve;ng quanh bạn t&igrave;nh của m&igrave;nh, ngậm miệng v&agrave; sử dụng phần đầu chạm v&agrave;o cơ thể con c&aacute;i. Đến m&ugrave;a sinh sản con đực thường đ&agrave;o c&aacute;i lỗ nhỏ để l&agrave;m tổ cho con c&aacute;i v&agrave;o đ&oacute; sinh sản, thời gian khoảng 2 &ndash; 3 tuần trứng nở tuỳ v&agrave;o nhiệt độ của nguồn nước.</p>\r\n\r\n<p><img alt=\"Hình ảnh cá tỳ bà bướm trong môi trường thuỷ sinh\" src=\"https://www.ahisu.com/wp-content/uploads/2020/09/hinh_anh_ca_ty_ba_buom_trong_moi_truong_thuy_sinh.jpg\" style=\"height:455px; width:800px\" /></p>\r\n\r\n<p>H&igrave;nh ảnh c&aacute; tỳ b&agrave; bướm trong m&ocirc;i trường thuỷ sinh</p>\r\n\r\n<h3>Hỏi đ&aacute;p</h3>\r\n\r\n<p>C&aacute; tỳ b&agrave; bướm ăn g&igrave;?</p>\r\n\r\n<p><em>Những thực vật xung quanh thường ph&aacute;t triển tốt đều v&agrave; được d&ugrave;ng l&agrave;m thức ăn cho lo&agrave;i c&aacute; n&agrave;y. Phần lớn lo&agrave;i c&aacute; n&agrave;y c&oacute; chế độ ăn tự nhi&ecirc;n bao gồm tảo, r&ecirc;u, những phần thức ăn c&ograve;n s&oacute;t lại của những lo&agrave;i c&aacute; kh&aacute;c v&agrave; c&aacute;c vi sinh vật.</em></p>\r\n\r\n<p>C&aacute; tỳ b&agrave; bướm mua ở đ&acirc;u?</p>\r\n\r\n<p><em>Hiện nay tr&ecirc;n thị trường nội địa Việt Nam c&oacute; rất nhiều loại c&aacute; n&agrave;y. C&aacute;c bạn chỉ cần đến c&aacute;c cửa h&agrave;ng b&aacute;n c&aacute; thuỷ sinh hoặc l&ecirc;n t&igrave;m hiểu th&ecirc;m tr&ecirc;n c&aacute;c diễn đ&agrave;n c&aacute; thuỷ sinh l&agrave; c&oacute; thể t&igrave;m v&agrave; mua được ngay loại c&aacute; n&agrave;y.</em></p>\r\n\r\n<p>C&aacute; tỳ b&agrave; bướm gi&aacute; bao nhi&ecirc;u?</p>\r\n\r\n<p><em>Gi&aacute; của c&aacute; tỳ b&agrave; bướm tr&ecirc;n thị trường hiện nay dao động v&agrave;o khoảng từ 8000đ đến 20.000đ/con tuỳ thuộc v&agrave;o k&iacute;ch cỡ.</em></p>\r\n\r\n<h3>Tham khảo</h3>\r\n\r\n<ul>\r\n	<li><a href=\"https://en.wikipedia.org/wiki/Sewellia\">https://en.wikipedia.org/wiki/Sewellia</a></li>\r\n</ul>\r\n\r\n<h3>Lời kết</h3>\r\n\r\n<p>H&atilde;y thử 1 lần chơi d&ograve;ng c&aacute; tỳ b&agrave; bướm, sẽ kh&aacute; l&agrave; th&uacute; vị, tuy nhi&ecirc;n cũng cần ch&uacute; &yacute; v&igrave; lo&agrave;i n&agrave;y ưa nước sạch. Nếu c&aacute;c bạn c&oacute; thắc mắc g&igrave; về lo&agrave;i c&aacute; n&agrave;y, xin h&atilde;y để lại comment dưới b&agrave;i viết n&agrave;y. Ch&uacute;ng t&ocirc;i với đội ngũ nhiều năm kinh nghiệm sẽ giải quyết những thắc mắc của bạn một c&aacute;ch ch&acirc;n thật nhất.</p>\r\n\r\n<blockquote>\r\n<p>B&agrave;i viết &ldquo;C&aacute; tỳ b&agrave; bướm: Chia sẻ c&aacute;ch nu&ocirc;i v&agrave; chăm s&oacute;c c&aacute; tỳ b&agrave; bướm&rdquo; của&nbsp;<a href=\"https://www.ahisu.com/\">Ahisu</a>&nbsp;được bảo vệ bởi đạo luật DMCA. Vui l&ograve;ng để lại nguồn&nbsp;<a href=\"http://www.ahisu.com/ca-ty-ba-buom/\">https://www.ahisu.com/ca-ty-ba-buom/</a>&nbsp;khi đăng tải b&agrave;i viết n&agrave;y. Xin c&aacute;m ơn !</p>\r\n</blockquote>', 'active', 'zs4ndK5kkh.jpeg', '2020-11-30 00:00:00', 'hailan', '2020-11-30 00:00:00', 'hailan', NULL, 'normal', 'Cá tỳ bà bướm: Chia sẻ cách nuôi và chăm sóc cá tỳ bà bướm', 'Cá tỳ bà bướm: Chia sẻ cách nuôi và chăm sóc cá tỳ bà bướm'),
(40, 12, 'La hán xanh: Cách trồng & chăm sóc la hán xanh (rong la hán)', '<p>La h&aacute;n xanh l&agrave; loại c&acirc;y kho&aacute;c tr&ecirc;n m&igrave;nh m&agrave;u sắc tuyệt đẹp, ngo&agrave;i ra la h&aacute;n xanh c&ograve;n được biết đến với t&ecirc;n gọi &ldquo;rong la h&aacute;n hoặc rong đu&ocirc;i chồn&rdquo;.</p>\r\n\r\n<p><strong>La h&aacute;n xanh</strong>&nbsp;t&ecirc;n khoa học l&agrave;&nbsp;<strong><em>Cabomba</em><em>&nbsp;caroliniana</em></strong>, thuộc họ&nbsp;<em>Cabombaceae</em>&nbsp;v&agrave; nằm trong chi&nbsp;<em>Cabomba</em>. C&acirc;y la h&aacute;n xanh thuỷ sinh được ph&aacute;t hiện v&agrave; m&ocirc; tả khoa học đầu ti&ecirc;n v&agrave;o năm 1837 bởi nh&agrave; thực vật học người Mỹ (&ocirc;ng&nbsp;<strong>Asa</strong>&nbsp;<strong>Gray</strong>). Ở Việt Nam, la h&aacute;n xanh c&ograve;n được gọi l&agrave;&nbsp;<strong>rong la h&aacute;n</strong>&nbsp;hoặc&nbsp;<strong>rong đu&ocirc;i chồn</strong>.</p>\r\n\r\n<p>La h&aacute;n xanh l&agrave; dạng c&acirc;y c&oacute; th&acirc;n thẳng đứng, ch&uacute;ng c&oacute; nguồn gốc bắt đầu ở những khu vực thuộc ch&acirc;u Mỹ. Trong tự nhi&ecirc;n lo&agrave;i la h&aacute;n xanh thuỷ sinh n&agrave;y l&acirc;y lan rất nhanh v&agrave; ở một số quốc gia như &Uacute;c, n&oacute; c&ograve;n được coi l&agrave; một lo&agrave;i x&acirc;m lấn hoặc cỏ dại c&oacute; &yacute; nghĩa quốc gia.</p>\r\n\r\n<p><img alt=\"Hình ảnh cây la hán xanh trong môi trường thuỷ sinh\" src=\"https://www.ahisu.com/wp-content/uploads/2020/09/la_han_xanh_trong_moi_truong_thuy_sinh.jpg\" style=\"height:455px; width:800px\" /></p>\r\n\r\n<p><em>H&igrave;nh ảnh c&acirc;y la h&aacute;n xanh trong m&ocirc;i trường thuỷ sinh</em></p>\r\n\r\n<h3>Đặc điểm</h3>\r\n\r\n<p>C&acirc;y rong la h&aacute;n c&oacute; thể được nh&acirc;n giống như bất kỳ c&aacute;c loại c&acirc;y c&oacute; th&acirc;n thẳng đứng kh&aacute;c. C&oacute; thể cắt trực tiếp phần ngọn của c&acirc;y mẹ rồi cắm xuống&nbsp;<a href=\"http://www.ahisu.com/dau-hieu-be-thuy-sinh-xuong-cap/\">nền bể thuỷ sinh</a>&nbsp;l&agrave; c&acirc;y c&oacute; thể tự ph&aacute;t triển. Lưu &yacute; khi cắt đi phần ngọn, phần th&acirc;n c&ograve;n lại của c&acirc;y mẹ sẽ mất tương đối thời gian để phục hồi v&agrave; ph&aacute;t triển lại. Cho n&ecirc;n, bạn cần cung cấp đầy đủ c&aacute;c dưỡng chất thiết yếu cho ch&uacute;ng.</p>\r\n\r\n<p>Dưới đ&acirc;y l&agrave; những th&ocirc;ng số rất cần thiết để c&acirc;y la h&aacute;n xanh ph&aacute;t triển trong m&ocirc;i trường thuỷ sinh, bao gồm:</p>\r\n\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>T&ecirc;n khoa học</strong></td>\r\n			<td>Cabomba caroliniana</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Vị tr&iacute;</strong></td>\r\n			<td><a href=\"https://www.ahisu.com/cay-trung-canh/\">C&acirc;y trung cảnh</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Nh&oacute;m lo&agrave;i</strong></td>\r\n			<td><a href=\"https://www.ahisu.com/angiosperms/\">Angiosperms</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Họ</strong></td>\r\n			<td><a href=\"https://www.ahisu.com/cabombaceae/\">Cabombaceae</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Chi</strong></td>\r\n			<td><a href=\"https://www.ahisu.com/cabomba/\">Cabomba</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Khả năng chịu nhiệt</strong></td>\r\n			<td>Từ 4 đến 27 &deg;C</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Nhiệt độ tối ưu</strong></td>\r\n			<td>Từ 20 đến 25 &deg;C</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Độ cứng cacbonat</strong></td>\r\n			<td>Từ 0 đến 14 &deg;dKH</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Độ pH tối ưu</strong></td>\r\n			<td>Từ 5 đến 7</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Đi&ocirc;x&iacute;t cacbon (CO2&nbsp;)</strong></td>\r\n			<td>Từ 10 đến 40 mg/L</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Nitrat (NO3&ndash;)</strong></td>\r\n			<td>Từ 10 đến 50 mg/L</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Phosphate (PO43-)</strong></td>\r\n			<td>Từ 0,1 đến 3 mg/L</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Kali (K+)</strong></td>\r\n			<td>Từ 5 đến 30 mg/L</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Iron (Fe)</strong></td>\r\n			<td>Từ 0,01 đến 0,5 mg/L</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<h3>C&aacute;ch trồng la h&aacute;n xanh</h3>\r\n\r\n<p>Khi được nu&ocirc;i trồng trong điều kiện tối ưu, th&acirc;n của c&acirc;y la h&aacute;n xanh thuỷ sinh c&oacute; thể dễ d&agrave;ng ph&aacute;t triển tr&ecirc;n bề mặt của một bể c&aacute; lớn, ngay cả khi được cắt tỉa. Ở đ&oacute;, la h&aacute;n xanh tạo th&agrave;nh những chiếc l&aacute; nổi h&igrave;nh thoi v&agrave; hoa m&agrave;u trắng. Tuy nhi&ecirc;n, nếu để nhiệt độ trong bể qu&aacute; cao, hoặc &aacute;nh s&aacute;ng qu&aacute; thấp sẽ l&agrave;m cho c&acirc;y la h&aacute;n xanh thuỷ sinh ph&aacute;t triển yếu v&agrave; c&oacute; xu hướng t&agrave;n lụi.</p>\r\n\r\n<p><img alt=\"Hình ảnh cận cảnh cây la hán xanh thuỷ sinh\" src=\"https://www.ahisu.com/wp-content/uploads/2020/09/can_canh_cay_la_han_xanh_thuy_sinh.jpg\" style=\"height:455px; width:800px\" /></p>\r\n\r\n<p><em>H&igrave;nh ảnh cận cảnh c&acirc;y la h&aacute;n xanh thuỷ sinh (rong la h&aacute;n)</em></p>\r\n\r\n<h3>Hỏi đ&aacute;p</h3>\r\n\r\n<p>La h&aacute;n xanh thuỷ sinh c&oacute; cần Co2 kh&ocirc;ng?</p>\r\n\r\n<p><em>L&agrave; một trong những d&ograve;ng c&acirc;y thuỷ sinh dễ trồng, việc cung cấp Co2 cho c&acirc;y la h&aacute;n xanh thuỷ sinh cũng rất quan trọng. Co2 sẽ th&uacute;c đẩy qu&aacute; tr&igrave;nh ph&aacute;t triển v&agrave; tăng trưởng của c&acirc;y một c&aacute;ch r&otilde; rệt v&agrave; nhanh ch&oacute;ng. V&igrave; thế trong&nbsp;<a href=\"http://www.ahisu.com/ho-thuy-sinh-mini/\">hồ thuỷ sinh</a>, bạn h&atilde;y lưu &yacute; cung cấp đầy đủ h&agrave;m lượng Co2 cho ch&uacute;ng nh&eacute;.</em></p>\r\n\r\n<p>Mua c&acirc;y la h&aacute;n xanh thuỷ sinh ở đ&acirc;u?</p>\r\n\r\n<p><em>Hiện nay thị trường thuỷ sinh đ&atilde; ph&aacute;t triển rộng r&atilde;i n&ecirc;n việc t&igrave;m mua la h&aacute;n xanh thuỷ sinh tương đối đơn giản. Bạn c&oacute; thể đến trực tiếp c&aacute;c cửa h&agrave;ng chuy&ecirc;n về thuỷ sinh hoặc t&igrave;m kiếm tr&ecirc;n c&aacute;c diễn đ&agrave;n thuỷ sinh để mua loại c&acirc;y la h&aacute;n xanh n&agrave;y nh&eacute;.</em></p>\r\n\r\n<p>Gi&aacute; c&acirc;y la h&aacute;n xanh thuỷ sinh?</p>\r\n\r\n<p><em>Gi&aacute; c&acirc;y la h&aacute;n xanh thuỷ sinh hiện nay đang giao động trong khoảng từ 20.000 đến 30.000 đồng.</em></p>\r\n\r\n<h3>Tham khảo</h3>\r\n\r\n<ul>\r\n	<li><a href=\"https://en.wikipedia.org/wiki/Cabomba_caroliniana\">https://en.wikipedia.org/wiki/Cabomba_caroliniana</a></li>\r\n</ul>\r\n\r\n<h3>Lời kết</h3>\r\n\r\n<p>Để t&igrave;m hiểu th&ecirc;m th&ocirc;ng tin chi tiết về loại c&acirc;y la h&aacute;n xanh thuỷ sinh n&agrave;y, h&atilde;y để lại comment dưới b&agrave;i viết. Ch&uacute;ng t&ocirc;i sẽ tư vấn v&agrave; giải đ&aacute;p mọi thắc mắc của c&aacute;c bạn một c&aacute;ch nhanh ch&oacute;ng v&agrave; ch&iacute;nh x&aacute;c nhất.</p>\r\n\r\n<blockquote>\r\n<p>B&agrave;i viết &ldquo;La h&aacute;n xanh: C&aacute;ch trồng &amp; chăm s&oacute;c la h&aacute;n xanh (rong la h&aacute;n)&rdquo; của&nbsp;<a href=\"https://www.ahisu.com/\">Ahisu</a>&nbsp;được bảo vệ bởi đạo luật DMCA.<br />\r\nVui l&ograve;ng để lại nguồn&nbsp;<a href=\"http://www.ahisu.com/la-han-xanh/\">http://www.ahisu.com/la-han-xanh/</a>&nbsp;khi đăng tải b&agrave;i viết n&agrave;y. Xin c&aacute;m ơn !</p>\r\n</blockquote>', 'active', 'vrp57l1NvQ.jpeg', '2020-11-30 00:00:00', 'hailan', '2020-11-30 00:00:00', 'hailan', NULL, NULL, 'La hán xanh: Cách trồng & chăm sóc la hán xanh (rong la hán)', 'La hán xanh: Cách trồng & chăm sóc la hán xanh (rong la hán)'),
(41, 12, 'Ngưu mao chiên', '<p>Ngưu mao chi&ecirc;n l&agrave; một lo&agrave;i thực vật sống ở nước lợ v&agrave; nước mặn, ch&iacute;nh v&igrave; thế ngưu mao chi&ecirc;n rất th&iacute;ch hợp cho những người mới chơi thuỷ sinh.<strong>Ngưu mao chi&ecirc;n</strong>&nbsp;c&oacute; danh ph&aacute;p khoa học&nbsp;<strong><em>Eleocharis</em></strong><em><strong>&nbsp;parvula</strong>&nbsp;</em>l&agrave; một loại thực vật thuộc họ&nbsp;<em>Cyperaceae</em>&nbsp;v&agrave; nằm trong chi&nbsp;<em>Eleocharis.</em>&nbsp;Ngưu mao chi&ecirc;n ph&acirc;n bố phổ biến v&agrave; rộng r&atilde;i phần lớn ở c&aacute;c khu vực Ch&acirc;u &Acirc;u, Bắc Phi, Ch&acirc;u &Aacute;, Ch&acirc;u Mỹ v&agrave; Bắc Mỹ.</p>\r\n\r\n<h3>Giới thiệu</h3>\r\n\r\n<p>V&agrave;o đầu năm 1836, ngưu mao chi&ecirc;n đ&atilde; được t&igrave;m thấy v&agrave; m&ocirc; tả khoa học đầu ti&ecirc;n bởi &ocirc;ng&nbsp;<strong>(Roem. &amp; Schult.) Link ex Bluff, Nees &amp; Schauer</strong>. Ngưu mao chi&ecirc;n cũng c&oacute; rất nhiều loại v&agrave; hầu hết những loại n&agrave;y đều c&oacute; đặc điểm tương đối giống nhau.</p>\r\n\r\n<p><img alt=\"Hình ảnh ngưu mao chiên trong bể thuỷ sinh\" src=\"https://www.ahisu.com/wp-content/uploads/2020/08/nguu-mao-chien-lun-trong-be-thuy-sinh.jpg\" style=\"height:455px; width:800px\" /></p>\r\n\r\n<p>H&igrave;nh ảnh ngưu mao chi&ecirc;n trong bể thuỷ sinh</p>\r\n\r\n<h3>Ngưu mao chi&ecirc;n cao</h3>\r\n\r\n<p>Ngưu mao chi&ecirc;n cao c&oacute; chiều d&agrave;i trong khoảng từ 10 đến 18cm, chiều rộng từ 1 đến 1,5cm l&agrave; loại c&acirc;y thuỷ sinh ph&aacute;t triển tương đối chậm. Ngưu mao chi&ecirc;n cao c&ograve;n c&oacute; t&ecirc;n gọi kh&aacute;c l&agrave;&nbsp;<em><strong>Hairgrass</strong></em>.</p>\r\n\r\n<p><img alt=\"Hình ảnh ngưu mao chiên cao\" src=\"https://www.ahisu.com/wp-content/uploads/2020/08/nguu-maochien-cao.jpg\" style=\"height:455px; width:800px\" /></p>\r\n\r\n<p>H&igrave;nh ảnh ngưu mao chi&ecirc;n cao l&aacute; cạn</p>\r\n\r\n<h3>Ngưu mao chi&ecirc;n l&ugrave;n</h3>\r\n\r\n<p>K&iacute;ch thước trung b&igrave;nh của ngưu mao chi&ecirc;n l&ugrave;n từ 5cm đổ xuống, ch&uacute;ng ph&aacute;t triển rất tốt trong điều kiện cung cấp Co2, nhiệt độ ph&ugrave; hợp v&agrave; đầy đủ chất dinh dưỡng. Thường xuy&ecirc;n thay nước cho bể, tr&aacute;nh việc xuất hiện r&ecirc;u hại kh&ocirc;ng đ&aacute;ng c&oacute;.</p>\r\n\r\n<p><img alt=\"Hình ảnh ngưu mao chiên lùn trên cạn\" src=\"https://www.ahisu.com/wp-content/uploads/2020/08/nguu-mao-chien-lun-1.jpg\" style=\"height:455px; width:800px\" /></p>\r\n\r\n<p>H&igrave;nh ảnh ngưu mao chi&ecirc;n l&ugrave;n tr&ecirc;n cạn</p>\r\n\r\n<h3>Ngưu mao chi&ecirc;n l&ugrave;n xo&egrave;</h3>\r\n\r\n<p>Ngưu mao chi&ecirc;n l&ugrave;n xo&egrave; l&agrave; loại c&acirc;y thuỷ sinh chăm s&oacute;c kh&aacute; đơn giản. Ch&uacute;ng được t&igrave;m thấy đầu ti&ecirc;n ở khu vực New Zealand v&agrave; &Uacute;c. Với chiều d&agrave;i ngắn v&agrave; uốn cong s&aacute;t mặt đất, ngưu mao chi&ecirc;n l&ugrave;n xo&egrave; rất được giới thuỷ sinh ưa chuộng.</p>\r\n\r\n<p><img alt=\"Hình ảnh ngưu mao chiên lùn xoè trong môi trường thuỷ sinh\" src=\"https://www.ahisu.com/wp-content/uploads/2020/08/nguu-mao-chien-lun-xoe.jpg\" style=\"height:455px; width:800px\" /></p>\r\n\r\n<p>H&igrave;nh ảnh ngưu mao chi&ecirc;n l&ugrave;n xo&egrave; trong m&ocirc;i trường thuỷ sinh</p>\r\n\r\n<h3>Đặc điểm chung</h3>\r\n\r\n<p>Ngưu mao chi&ecirc;n được biết đến rộng r&atilde;i trong giới thuỷ sinh bởi ch&uacute;ng c&oacute; vẻ đẹp hoang sơ như những thảm cỏ xanh b&aacute;t ng&aacute;t trải d&agrave;i tr&ecirc;n nền thuỷ sinh của bể.</p>\r\n\r\n<p>Ngao mao chi&ecirc;n c&ograve;n l&agrave; loại c&acirc;y thuỷ sinh dễ trồng, ph&aacute;t triển tốt trong điều kiện &aacute;nh s&aacute;ng vừa đủ. Dưới đ&acirc;y l&agrave; những th&ocirc;ng số cụ thể khi chăm s&oacute;c ngưu mao chi&ecirc;n, bao gồm:</p>\r\n\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>T&ecirc;n khoa học</strong></td>\r\n			<td>Eleocharis parvula</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Vị tr&iacute;</strong></td>\r\n			<td><a href=\"https://www.ahisu.com/cay-trung-canh/\">C&acirc;y trung cảnh</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Nh&oacute;m lo&agrave;i</strong></td>\r\n			<td><a href=\"https://www.ahisu.com/angiosperms/\">Angiosperms</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Họ</strong></td>\r\n			<td><a href=\"https://www.ahisu.com/cyperaceae/\">Cyperaceae</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Chi</strong></td>\r\n			<td><a href=\"https://www.ahisu.com/eleocharis/\">Eleocharis</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Khả năng chịu nhiệt</strong></td>\r\n			<td>Từ 12 đến 27 &deg;C</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Nhiệt độ tối ưu</strong></td>\r\n			<td>Từ 20 đến 25 &deg;C</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Độ cứng cacbonat</strong></td>\r\n			<td>Từ 0 đến 14 &deg;dKH</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Độ pH tối ưu</strong></td>\r\n			<td>Từ 5 đến 7</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Đi&ocirc;x&iacute;t cacbon (CO2&nbsp;)</strong></td>\r\n			<td>Từ 6 đến 40 mg/L</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Nitrat (NO3&ndash;)</strong></td>\r\n			<td>Từ 10 đến 50 mg/L</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Phosphate (PO43-)</strong></td>\r\n			<td>Từ 0,1 đến 3 mg/L</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Kali (K+)</strong></td>\r\n			<td>Từ 5 đến 30 mg/L</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Iron (Fe)</strong></td>\r\n			<td>Từ 0,01 đến 0,5 mg/L</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<h3>C&aacute;ch trồng</h3>\r\n\r\n<p>Khi được trồng trong c&aacute;c điều kiện giống hệt nhau, ngưu mao chi&ecirc;n kh&aacute;c với những c&acirc;y thủy sinh nổi tiếng kh&aacute;c bởi chiều cao thấp hơn (trong hầu hết c&aacute;c trường hợp r&otilde; r&agrave;ng l&agrave; dưới 10 cm), m&agrave;u xanh lục nhạt hơn v&agrave; th&acirc;n c&acirc;y cong sang một b&ecirc;n.</p>\r\n\r\n<p>Để trồng ngưu mao chi&ecirc;n trong bể thuỷ sinh, bạn cần chia nhỏ ch&uacute;ng th&agrave;nh những kh&oacute;m nhỏ từ 5 đến 7 c&acirc;y. Sau đ&oacute; d&ugrave;ng nh&iacute;p kẹp v&agrave;o phần rễ của ch&uacute;ng rồi cắm theo từng h&agrave;ng xuống&nbsp;<a href=\"http://www.ahisu.com/dau-hieu-be-thuy-sinh-xuong-cap/\">nền bể thuỷ sinh</a>, mỗi lần cắm c&aacute;ch nhau khoảng 2 đến 3cm. Cứ như vậy ngưu mao chi&ecirc;n sẽ tự b&aacute;m rễ v&agrave; ph&aacute;t triển được.&nbsp;<em>(Nếu bạn muốn nhanh phủ k&iacute;n nền, h&atilde;y cắm ch&uacute;ng gần hơn)</em></p>\r\n\r\n<p><img alt=\"Hình ảnh những khóm ngưu mao chiên lùn khi mới được trồng\" src=\"https://www.ahisu.com/wp-content/uploads/2020/08/nguu-mao-chien-lun-khi-moi-duoc-trong.jpg\" style=\"height:455px; width:800px\" /></p>\r\n\r\n<p>H&igrave;nh ảnh những kh&oacute;m ngưu mao chi&ecirc;n khi mới được trồng</p>\r\n\r\n<h3>Hỏi đ&aacute;p</h3>\r\n\r\n<p>Ngưu mao chi&ecirc;n c&oacute; cần Co2 kh&ocirc;ng?</p>\r\n\r\n<p><em>Tuy l&agrave; một trong những d&ograve;ng c&acirc;y thuỷ sinh dễ trồng, nhưng việc cung cấp Co2 cho ngưu mao chi&ecirc;n cũng cực kỳ quan trọng. Co2 sẽ gi&uacute;p cho c&acirc;y ph&aacute;t triển nhanh ch&oacute;ng v&agrave; tăng trưởng tốt hơn rất nhiều.</em></p>\r\n\r\n<p>Mua ngưu mao chi&ecirc;n ở đ&acirc;u?</p>\r\n\r\n<p><em>Bạn c&oacute; thể đến trực tiếp c&aacute;c cửa h&agrave;ng thuỷ sinh ở hầu hết c&aacute;c tỉnh th&agrave;nh hoặc t&igrave;m tr&ecirc;n c&aacute;c diễn đ&agrave;n về thuỷ sinh l&agrave; c&oacute; thể mua được loại ngưu mao chi&ecirc;n n&agrave;y.</em></p>\r\n\r\n<p>C&acirc;y ngưu mao chi&ecirc;n gi&aacute; bao nhi&ecirc;u?</p>\r\n\r\n<p><em>Hiện nay gi&aacute; ngưu mao chi&ecirc;n đang giao động trong khoảng từ 20.000 đến 30.000 đồng/tấc (vỉ).</em></p>\r\n\r\n<h3>Tham khảo</h3>\r\n\r\n<ul>\r\n	<li><a href=\"https://en.wikipedia.org/wiki/Eleocharis_parvula\">https://en.wikipedia.org/wiki/Eleocharis_parvula</a></li>\r\n</ul>\r\n\r\n<h3>Lời kết</h3>\r\n\r\n<p>Để ngưu mao chi&ecirc;n cũng như c&aacute;c c&acirc;y thủy sinh kh&aacute;c ph&aacute;t triển tốt nhất, bạn cần trang bị đầy đủ kiến thức về chăm s&oacute;c c&acirc;y<em>&nbsp;(đọc th&ecirc;m b&agrave;i viết về&nbsp;<a href=\"https://www.ahisu.com/cay-thuy-sinh/#Kien-thuc-can-biet-khi-trong-cay-thuy-sinh\">kiến thức trồng c&acirc;y thủy sinh</a>)</em>.</p>\r\n\r\n<p>Nếu bạn l&agrave; người mới, h&atilde;y đọc th&ecirc;m b&agrave;i viết&nbsp;<em><a href=\"http://www.ahisu.com/loi-thuong-gap-khi-choi-thuy-sinh/\">Tổng quan những lỗi thường gặp khi chơi thuỷ sinh cho người mới</a></em>. H&atilde;y để lại &yacute; kiến hoặc c&acirc;u hỏi, th&ocirc;ng tin v&agrave; nội dung cần trao đổi của bạn dưới b&agrave;i viết n&agrave;y, ch&uacute;ng t&ocirc;i sẽ trả lời những c&acirc;u hỏi của c&aacute;c bạn nhanh ch&oacute;ng.</p>\r\n\r\n<blockquote>\r\n<p>B&agrave;i viết &ldquo;Ngưu mao chi&ecirc;n: C&aacute;ch trồng &amp; chăm s&oacute;c ngưu mao chi&ecirc;n&rdquo; của&nbsp;<a href=\"https://www.ahisu.com/\">Ahisu</a>&nbsp;được bảo vệ bởi đạo luật DMCA.<br />\r\nVui l&ograve;ng để lại nguồn&nbsp;<a href=\"https://www.ahisu.com/nguu-mao-chien/\">https://www.ahisu.com/nguu-mao-chien/</a>&nbsp;khi đăng tải b&agrave;i viết n&agrave;y. Xin c&aacute;m ơn !</p>\r\n</blockquote>', 'active', 'EssavkXtW9.jpeg', '2020-11-30 00:00:00', 'hailan', '2020-12-05 00:00:00', 'truongdinh', NULL, NULL, 'Ngưu mao chiên: Cách trồng & chăm sóc ngưu mao chiên', 'Ngưu mao chiên: Cách trồng & chăm sóc ngưu mao chiên');
INSERT INTO `article` (`id`, `category_id`, `name`, `content`, `status`, `thumb`, `created`, `created_by`, `modified`, `modified_by`, `publish_at`, `type`, `title_seo`, `description_seo`) VALUES
(42, 12, 'Hồng liễu', '<p>Hồng liễu l&agrave; một loại c&acirc;y thuỷ sinh tương đối dễ trồng v&agrave; c&oacute; m&agrave;u sắc đẹp mắt, ch&iacute;nh v&igrave; thế c&acirc;y hồng liễu rất được ưa chuộng trong giới thuỷ sinh.C&acirc;y hồng liễu thuỷ sinh&nbsp;c&oacute; danh ph&aacute;p khoa học&nbsp;Ammannia gracilis, l&agrave; một d&ograve;ng c&acirc;y thuỷ sinh nổi bật về m&agrave;u đỏ nhạt, thuộc họ&nbsp;Lythraceae&nbsp;v&agrave; nằm trong chi&nbsp;Ammannia. Hồng liễu được hai nh&agrave; thực vật học&nbsp;George Samuel Perrottet&nbsp;&amp;&nbsp;Jean Baptiste Antoine&nbsp;Guillemin&nbsp;nghi&ecirc;n cứu v&agrave; m&ocirc; tả lần đầu ti&ecirc;n v&agrave;o năm 1834.</p>\r\n\r\n<p>Giới thiệu<br />\r\nC&acirc;y hồng liễu thuỷ sinh&nbsp;c&oacute; danh ph&aacute;p khoa học&nbsp;Ammannia gracilis, l&agrave; một d&ograve;ng c&acirc;y thuỷ sinh nổi bật về m&agrave;u đỏ nhạt, thuộc họ&nbsp;Lythraceae&nbsp;v&agrave; nằm trong chi&nbsp;Ammannia. Hồng liễu được hai nh&agrave; thực vật học&nbsp;George Samuel Perrottet&nbsp;&amp;&nbsp;Jean Baptiste Antoine&nbsp;Guillemin&nbsp;nghi&ecirc;n cứu v&agrave; m&ocirc; tả lần đầu ti&ecirc;n v&agrave;o năm 1834.</p>\r\n\r\n<p>H&igrave;nh ảnh cận cảnh c&acirc;y hồng liễu thuỷ sinh</p>\r\n\r\n<p>Đặc điểm<br />\r\nKhi ở tr&ecirc;n cạn, c&acirc;y hồng liễu thuỷ sinh c&oacute; th&acirc;n m&agrave;u đỏ v&agrave; những t&aacute;n l&aacute; c&oacute; m&agrave;u xanh, nhưng khi bạn trồng c&acirc;y hồng liễu thuỷ sinh v&agrave;o trong bể hoặc&nbsp;hồ thuỷ sinh, l&aacute; của ch&uacute;ng sẽ dần dần chuyển sang m&agrave;u đỏ nhạt theo thời gian chăm s&oacute;c.</p>\r\n\r\n<p>Dưới đ&acirc;y l&agrave; những th&ocirc;ng số cần thiết cho c&acirc;y hồng liễu thuỷ sinh, bạn h&atilde;y tham khảo:</p>\r\n\r\n<p>T&ecirc;n khoa học&nbsp;&nbsp; &nbsp;Ammannia gracilis<br />\r\nVị tr&iacute;&nbsp;&nbsp; &nbsp;C&acirc;y trung cảnh<br />\r\nNh&oacute;m lo&agrave;i&nbsp;&nbsp; &nbsp;Angiosperms<br />\r\nHọ&nbsp;&nbsp; &nbsp;Lythraceae<br />\r\nChi&nbsp;&nbsp; &nbsp;Ammannia<br />\r\nKhả năng chịu nhiệt&nbsp;&nbsp; &nbsp;Từ 12 đến 32 &deg;C<br />\r\nNhiệt độ tối ưu&nbsp;&nbsp; &nbsp;Từ 22 đến 28 &deg;C<br />\r\nĐộ cứng cacbonat&nbsp;&nbsp; &nbsp;Từ 0 đến 14 &deg;dKH<br />\r\nĐộ pH tối ưu&nbsp;&nbsp; &nbsp;Từ 5 đến 7,5<br />\r\nĐi&ocirc;x&iacute;t cacbon (CO2&nbsp;)&nbsp;&nbsp; &nbsp;Từ 10 đến 40 mg/L<br />\r\nNitrat (NO3&ndash;)&nbsp;&nbsp; &nbsp;Từ 10 đến 50 mg/L<br />\r\nPhosphate (PO43-)&nbsp;&nbsp; &nbsp;Từ 0,1 đến 3 mg/L<br />\r\nKali (K+)&nbsp;&nbsp; &nbsp;Từ 5 đến 30 mg/L<br />\r\nIron (Fe)&nbsp;&nbsp; &nbsp;Từ 0,01 đến 0,5 mg/L<br />\r\nC&aacute;ch trồng hồng liễu thuỷ sinh<br />\r\nC&acirc;y hồng liễu thuỷ sinh thuộc loại c&acirc;y dễ trồng trong c&aacute;c hồ hoặc bể thuỷ sinh. Hồng liễu tăng trưởng v&agrave; ph&aacute;t triển rất tốt trong điều kiện cung cấp đầy đủ c&aacute;c chất dinh dưỡng cho ch&uacute;ng.</p>\r\n\r\n<p>Hạn chế để bể hoặc hồ thuỷ sinh nh&agrave; bạn để ở những nơi c&oacute; nhiệt độ qu&aacute; cao hoặc những nơi kh&ocirc;ng c&oacute; &aacute;nh s&aacute;ng chiếu tới. V&igrave; như thế sẽ l&agrave;m cho c&acirc;y hồng liễu thuỷ sinh tăng trưởng v&agrave; ph&aacute;t triển chậm.</p>\r\n\r\n<p>Để trồng hồng liễu thuỷ sinh, bạn chỉ cần cắt một nh&aacute;nh nhỏ k&egrave;m theo l&aacute; của c&acirc;y mẹ rồi cắm trực tiếp xuống nền của bể (hồ) thuỷ sinh l&agrave; ch&uacute;ng c&oacute; thể tự ra rễ v&agrave; ph&aacute;t triển th&agrave;nh c&acirc;y mới.</p>\r\n\r\n<p>H&igrave;nh ảnh c&acirc;y hồng liễu thuỷ sinh đẹp</p>\r\n\r\n<p>Hỏi đ&aacute;p<br />\r\nHồng liễu thuỷ sinh bị &uacute;a?</p>\r\n\r\n<p>Nguy&ecirc;n nh&acirc;n dẫn đến trường hợp c&acirc;y hồng liễu thuỷ sinh bị &uacute;a l&agrave; do nhu cầu &aacute;nh s&aacute;ng v&agrave; nhiệt độ trong bể vượt mức cho ph&eacute;p hoặc m&ocirc;i trường nước đang c&oacute; chiều hướng đi xuống.</p>\r\n\r\n<p>Mua hồng liễu thuỷ sinh ở đ&acirc;u?</p>\r\n\r\n<p>Để mua được c&acirc;y hồng liễu thuỷ sinh, bạn c&oacute; thể đến trực tiếp c&aacute;c cửa h&agrave;ng chuy&ecirc;n về thuỷ sinh hoặc t&igrave;m kiếm tr&ecirc;n c&aacute;c diễn đ&agrave;n về thuỷ sinh nh&eacute;.</p>\r\n\r\n<p>Gi&aacute; hồng liễu thuỷ sinh?</p>\r\n\r\n<p>Gi&aacute; c&acirc;y hồng liễu thuỷ sinh hiện nay giao động trong khoảng từ 20.000 đến 40.000 đồng.</p>\r\n\r\n<p>Tham khảo<br />\r\nhttps://en.wikipedia.org/wiki/Ammannia_gracilis<br />\r\nLời kết<br />\r\nVới m&agrave;u sắc đẹp ph&ugrave; hợp cho bể thuỷ sinh, c&aacute;c bạn n&ecirc;n chọn lựa loại hồng liễu thuỷ sinh n&agrave;y về trang tr&iacute; nh&eacute;. Nếu c&oacute; thắc mắc, vui l&ograve;ng để lại comment dưới b&agrave;i viết n&agrave;y. Ch&uacute;ng t&ocirc;i sẽ tư vấn v&agrave; trả lời c&aacute;c c&acirc;u hỏi của c&aacute;c bạn một c&aacute;nh nhanh ch&oacute;ng v&agrave; ch&iacute;nh x&aacute;c nhất.</p>\r\n\r\n<p>B&agrave;i viết &ldquo;Hồng liễu: Đặc điểm sống &amp; c&aacute;ch chăm s&oacute;c hồng liễu thuỷ sinh&rdquo; của&nbsp;Ahisu&nbsp;được bảo vệ bởi đạo luật DMCA.<br />\r\nVui l&ograve;ng để lại nguồn&nbsp;https://www.ahisu.com/hong-lieu-thuy-sinh/&nbsp;khi đăng tải b&agrave;i viết n&agrave;y. Xin c&aacute;m ơn !</p>', 'active', 'SGTlpeQNXu.jpeg', '2020-11-30 00:00:00', 'hailan', '2020-12-05 00:00:00', 'truongdinh', NULL, NULL, 'Hồng liễu: Đặc điểm sống & cách chăm sóc hồng liễu thuỷ sinh', 'Hồng liễu: Đặc điểm sống & cách chăm sóc hồng liễu thuỷ sinh'),
(43, 8, 'Rau má hương: Đặc điểm sống và cách chăm sóc rau má hương', '<p>Rau m&aacute; hương l&agrave; một loại c&acirc;y tiền cảnh tương đối đẹp v&agrave; rất dễ trồng. Ch&iacute;nh v&igrave; vậy, c&acirc;y rau m&aacute; hương rất được ưa chuộng trong giới thuỷ sinh.</p>\r\n\r\n<p>C&acirc;y rau m&aacute; hương thuỷ sinh c&oacute; t&ecirc;n khoa học l&agrave;&nbsp;Hydrocotyle tripartita, ch&uacute;ng thuộc họ&nbsp;Araliaceae&nbsp;v&agrave; nằm trong chi&nbsp;Hydrocotyle.</p>\r\n\r\n<p>Rau m&aacute; hương thuỷ sinh được &ocirc;ng&nbsp;R.Br. ex A.Rich.&nbsp;ph&aacute;t hiện v&agrave; m&ocirc; tả đầu ti&ecirc;n v&agrave;o năm 1820. Ch&uacute;ng được biết đến với nhiều t&ecirc;n gọi kh&aacute;c nhau v&agrave; được t&igrave;m thấy nhiều nhất ở khu vực ch&acirc;u &Aacute;, ch&acirc;u &Acirc;u (cũng xuất hiện &iacute;t tại ch&acirc;u Mỹ).</p>\r\n\r\n<p>Giới thiệu<br />\r\nC&acirc;y rau m&aacute; hương thuỷ sinh c&oacute; t&ecirc;n khoa học l&agrave;&nbsp;Hydrocotyle tripartita, ch&uacute;ng thuộc họ&nbsp;Araliaceae&nbsp;v&agrave; nằm trong chi&nbsp;Hydrocotyle.</p>\r\n\r\n<p>Rau m&aacute; hương thuỷ sinh được &ocirc;ng&nbsp;R.Br. ex A.Rich.&nbsp;ph&aacute;t hiện v&agrave; m&ocirc; tả đầu ti&ecirc;n v&agrave;o năm 1820. Ch&uacute;ng được biết đến với nhiều t&ecirc;n gọi kh&aacute;c nhau v&agrave; được t&igrave;m thấy nhiều nhất ở khu vực ch&acirc;u &Aacute;, ch&acirc;u &Acirc;u (cũng xuất hiện &iacute;t tại ch&acirc;u Mỹ).</p>\r\n\r\n<p>H&igrave;nh ảnh rau m&aacute; hương thuỷ sinh l&aacute; cạn</p>\r\n\r\n<p>Đặc điểm sống<br />\r\nRau m&aacute; hương thuỷ sinh l&agrave; loại c&acirc;y kh&aacute; dễ trồng v&agrave; ph&aacute;t triển tốt. C&acirc;y rau m&aacute; hương c&oacute; thể sống trong m&ocirc;i trường &iacute;t &aacute;nh s&aacute;ng, kh&ocirc;ng nhất thiết phải cần đến Co2. Với khả năng tăng trưởng nhanh v&agrave; hấp thụ dinh dưỡng tốt, rau m&aacute; hương thuỷ sinh rất xứng đ&aacute;ng để chọn lọc trang tr&iacute; cho bể thuỷ sinh của bạn.</p>\r\n\r\n<p>Dưới đ&acirc;y l&agrave; những th&ocirc;ng số của c&acirc;y rau m&aacute; hương thuỷ sinh, bạn h&atilde;y tham khảo:</p>\r\n\r\n<p>T&ecirc;n khoa học&nbsp;&nbsp; &nbsp;Hydrocotyle tripartita<br />\r\nVị tr&iacute;&nbsp;&nbsp; &nbsp;C&acirc;y tiền cảnh<br />\r\nNh&oacute;m lo&agrave;i&nbsp;&nbsp; &nbsp;Angiosperms<br />\r\nHọ&nbsp;&nbsp; &nbsp;Araliaceae<br />\r\nChi&nbsp;&nbsp; &nbsp;Hydrocotyle<br />\r\nKhả năng chịu nhiệt&nbsp;&nbsp; &nbsp;Từ 10 đến 30 &deg;C<br />\r\nNhiệt độ tối ưu&nbsp;&nbsp; &nbsp;Từ 20 đến 28 &deg;C<br />\r\nĐộ cứng cacbonat&nbsp;&nbsp; &nbsp;Từ 0 đến 14 &deg;dKH<br />\r\nĐộ pH tối ưu&nbsp;&nbsp; &nbsp;Từ 5 đến 7,5<br />\r\nĐi&ocirc;x&iacute;t cacbon (CO2&nbsp;)&nbsp;&nbsp; &nbsp;Từ 10 đến 40 mg/L<br />\r\nNitrat (NO3&ndash;)&nbsp;&nbsp; &nbsp;Từ 10 đến 50 mg/L<br />\r\nPhosphate (PO43-)&nbsp;&nbsp; &nbsp;Từ 0,1 đến 3 mg/L<br />\r\nKali (K+)&nbsp;&nbsp; &nbsp;Từ 5 đến 30 mg/L<br />\r\nIron (Fe)&nbsp;&nbsp; &nbsp;Từ 0,01 đến 0,5 mg/L<br />\r\nC&aacute;ch trồng rau m&aacute; hương<br />\r\nC&aacute;ch trồng c&acirc;y rau m&aacute; hương thuỷ sinh cũng kh&ocirc;ng qu&aacute; phức tạp, ch&uacute;ng rất th&iacute;ch hợp để trồng trong c&aacute;c&nbsp;hồ thuỷ sinh mini. Để trồng c&acirc;y rau m&aacute; hương thuỷ sinh, bạn chỉ việc cắt một nh&aacute;nh nhỏ của ch&uacute;ng rồi cắm trực tiếp xuống ph&acirc;n nền thuỷ sinh l&agrave; c&acirc;y sẽ tự động b&eacute;n rễ.</p>\r\n\r\n<p>H&igrave;nh ảnh rau m&aacute; hương thuỷ sinh l&aacute; nước</p>\r\n\r\n<p>Khi trồng rau m&aacute; hương thuỷ sinh, bạn n&ecirc;n cung cấp cho ch&uacute;ng những dưỡng chất cần thiết. Lưu &yacute; đừng để bể ở những nơi kh&ocirc;ng c&oacute; &aacute;nh s&aacute;ng chiếu tới, v&igrave; như thế sẽ l&agrave;m cho c&acirc;y rau m&aacute; hương tăng trưởng chậm hơn so với b&igrave;nh thường.</p>\r\n\r\n<p>Hỏi đ&aacute;p<br />\r\nRau m&aacute; hương c&oacute; cần co2 kh&ocirc;ng?</p>\r\n\r\n<p>Để c&oacute; một c&acirc;y rau m&aacute; hương ph&aacute;t triển tốt v&agrave; l&ecirc;n m&agrave;u đẹp bạn cần cung cấp đầy đủ h&agrave;m lượng Co2 cho ch&uacute;ng. Nếu bạn cung cấp cho rau m&aacute; hương thuỷ sinh một lượng Co2 nhỏ, Co2 sẽ th&uacute;c đẩy qu&aacute; tr&igrave;nh ph&aacute;t triển của c&acirc;y rau m&aacute; hương v&agrave; l&agrave;m cho c&aacute;c t&aacute;n l&aacute; của ch&uacute;ng th&ecirc;m đẹp hơn.</p>\r\n\r\n<p>Mua rau m&aacute; hương thuỷ sinh ở đ&acirc;u?</p>\r\n\r\n<p>C&aacute;c bạn c&oacute; thể đến trực tiếp c&aacute;c cửa h&agrave;ng thuỷ sinh tr&ecirc;n cả nước để hỏi mua, hoặc c&oacute; thể t&igrave;m kiếm tr&ecirc;n c&aacute;c diễn đ&agrave;n về thuỷ sinh nh&eacute;.</p>\r\n\r\n<p>Gi&aacute; rau m&aacute; hương thuỷ sinh?</p>\r\n\r\n<p>Gi&aacute; c&acirc;y rau m&aacute; hương thuỷ sinh thường giao động trong khoảng từ 20.000 đến 50.000 đồng (tuỳ theo bạn mua rau m&aacute; hương chậu hay mua rau m&aacute; hương vỉ).</p>\r\n\r\n<p>Tham khảo<br />\r\nhttps://en.wikipedia.org/wiki/Hydrocotyle_tripartita<br />\r\nLời kết<br />\r\nNếu bạn đang thắc mắc c&oacute; n&ecirc;n mua c&acirc;y rau m&aacute; hương thuỷ sinh về chơi hay kh&ocirc;ng hoặc bạn đang gặp vấn đề n&agrave;o đ&oacute; khi chơi c&acirc;y rau m&aacute; hương thuỷ sinh n&agrave;y. H&atilde;y để lại comment dưới b&agrave;i viết, ch&uacute;ng t&ocirc;i sẽ tư vấn v&agrave; giải đ&aacute;p những c&acirc;u hỏi của c&aacute;c bạn.</p>\r\n\r\n<p>B&agrave;i viết &ldquo;Rau m&aacute; hương: Đặc điểm sống v&agrave; c&aacute;ch chăm s&oacute;c rau m&aacute; hương&rdquo; của&nbsp;Ahisu&nbsp;được bảo vệ bởi đạo luật DMCA.<br />\r\nVui l&ograve;ng để lại nguồn&nbsp;https://www.ahisu.com/rau-ma-huong/&nbsp;khi đăng tải b&agrave;i viết n&agrave;y. Xin c&aacute;m ơn !</p>', 'inactive', 'i6OKqwPgoE.jpeg', '2020-11-30 00:00:00', 'hailan', '2020-12-05 00:00:00', 'truongdinh', NULL, NULL, 'Rau má hương: Đặc điểm sống và cách chăm sóc rau má hương', 'Rau má hương: Đặc điểm sống và cách chăm sóc rau má hương'),
(44, 12, 'Đàn thảo', '<p>Giới thiệu<br />\r\nC&acirc;y thuỷ sinh&nbsp;Đ&agrave;n thảo&nbsp;được biết đến với t&ecirc;n khoa học&nbsp;Elatine triandra&nbsp;được ph&aacute;t hiện bởi nh&agrave; thực vật học người Đức, &ocirc;ng&nbsp;Christian Schkuhr&nbsp;v&agrave; m&ocirc; tả khoa học đầu ti&ecirc;n v&agrave;o năm 1970. C&acirc;y đ&agrave;n thảo thuỷ sinh nằm trong họ thực vật hạt k&iacute;n&nbsp;Elatinaceae&nbsp;v&agrave; thuộc chi&nbsp;Elatine.&nbsp;Đ&agrave;n thảo thuỷ sinh được t&igrave;m thấy ở những nơi c&oacute; kh&iacute; hậu &ocirc;n đới đến nhiệt đới như: Khu vực ch&acirc;u &Aacute;, ch&acirc;u &Acirc;u, ch&acirc;u &Uacute;c,..</p>\r\n\r\n<p>Đặc điểm<br />\r\nC&acirc;y đ&agrave;n thảo thuỷ sinh&nbsp;c&oacute; th&acirc;n h&igrave;nh tương đối mỏng manh kết hợp với những t&aacute;n l&aacute; d&agrave;i c&oacute; m&agrave;u sắc tr&ocirc;ng rất phong ph&uacute;. Đ&agrave;n thảo thuỷ sinh mọc th&agrave;nh bụi v&agrave; ph&aacute;t triển rất nhanh, n&ecirc;n việc cắt tỉa cho ch&uacute;ng phải thực hiện thường xuy&ecirc;n.</p>\r\n\r\n<p>Dưới đ&acirc;y l&agrave; một số th&ocirc;ng tin cần thiết cho c&acirc;y thuỷ sinh đ&agrave;n thảo, bao gồm:</p>\r\n\r\n<p>T&ecirc;n khoa học&nbsp;&nbsp; &nbsp;Elatine triandra<br />\r\nVị tr&iacute;&nbsp;&nbsp; &nbsp;C&acirc;y tiền cảnh<br />\r\nNh&oacute;m lo&agrave;i&nbsp;&nbsp; &nbsp;Angiosperms<br />\r\nHọ&nbsp;&nbsp; &nbsp;Elatinaceae<br />\r\nChi&nbsp;&nbsp; &nbsp;Elatine<br />\r\nKhả năng chịu nhiệt&nbsp;&nbsp; &nbsp;Từ 10 đến 28 &deg;C<br />\r\nNhiệt độ tối ưu&nbsp;&nbsp; &nbsp;Từ 18 đến 24 &deg;C<br />\r\nĐộ cứng cacbonat&nbsp;&nbsp; &nbsp;Từ 2 đến 14 &deg;dKH<br />\r\nĐộ pH tối ưu&nbsp;&nbsp; &nbsp;Từ 5 đến 7,5<br />\r\nĐi&ocirc;x&iacute;t cacbon (CO2&nbsp;)&nbsp;&nbsp; &nbsp;Từ 20 đến 40 mg/L<br />\r\nNitrat (NO3&ndash;)&nbsp;&nbsp; &nbsp;Từ 10 đến 50 mg/L<br />\r\nPhốt ph&aacute;t (PO43-)&nbsp;&nbsp; &nbsp;Từ 0,1 đến 3 mg/L<br />\r\nKali (K +)&nbsp;&nbsp; &nbsp;Từ 5 đến 30 mg/L<br />\r\nIron (Fe)&nbsp;&nbsp; &nbsp;Từ 0,01 đến 0,5 mg/L<br />\r\nC&aacute;ch trồng<br />\r\nC&aacute;ch trồng đ&agrave;n thảo thuỷ sinh cũng tương tự như khi bạn trồng c&aacute;c loại tr&acirc;n ch&acirc;u như:&nbsp;Tr&acirc;n ch&acirc;u Nhật,&nbsp;tr&acirc;n ch&acirc;u ngọc trai,.. Bạn chỉ cần chuẩn bị một cặp nh&iacute;p mũi kim, t&aacute;ch từng c&acirc;y một v&agrave; trồng với khoảng c&aacute;ch từ 2-3cm.</p>\r\n\r\n<p>H&igrave;nh ảnh c&acirc;y đ&agrave;n thảo trong bể thuỷ sinh</p>\r\n\r\n<p>Lưu &yacute;, c&acirc;y đ&agrave;n thảo thuỷ sinh ph&aacute;t triển rất nhanh khi được cung cấp đầy đủ c&aacute;c dưỡng chất cần thiết. V&igrave; vậy, h&atilde;y thường xuy&ecirc;n cắt tỉa cho c&acirc;y để h&igrave;nh th&agrave;nh một thảm nền c&acirc;y đ&agrave;n thảo thuỷ sinh tuyệt đẹp nh&eacute;.</p>\r\n\r\n<p>Hỏi đ&aacute;p<br />\r\nC&acirc;y đ&agrave;n thảo thuỷ sinh c&oacute; cần Co2 kh&ocirc;ng?</p>\r\n\r\n<p>Để gi&uacute;p cho c&acirc;y đ&agrave;n thảo thuỷ sinh ph&aacute;t triển tốt v&agrave; tăng trưởng nhanh ch&oacute;ng hơn, bạn n&ecirc;n cung cấp đầy đủ h&agrave;m lượng Co2 cho ch&uacute;ng.</p>\r\n\r\n<p>Mua đ&agrave;n thảo thuỷ sịnh ở đ&acirc;u?</p>\r\n\r\n<p>Nếu bạn đang muốn mua c&acirc;y đ&agrave;n thảo về chơi thuỷ sinh, bạn c&oacute; thể đến trực tiếp c&aacute;c cửa h&agrave;ng thuỷ sinh để hỏi mua hoặc t&igrave;m kiếm tr&ecirc;n c&aacute;c diễn đ&agrave;n về thuỷ sinh.</p>\r\n\r\n<p>Gi&aacute; c&acirc;y đ&agrave;n thảo thuỷ sinh?</p>\r\n\r\n<p>Hiện nay tr&ecirc;n thị trường, c&acirc;y đ&agrave;n thảo thuỷ sinh c&oacute; mức gi&aacute; giao động từ 20.000 đến 35.000 đồng.</p>\r\n\r\n<p>Tham khảo<br />\r\nhttps://war.wikipedia.org/wiki/Elatine_triandra</p>\r\n\r\n<ul>\r\n	<li>&nbsp;</li>\r\n</ul>', 'active', '0ezHg0PW6e.jpeg', '2020-12-02 00:00:00', 'hailan', '2020-12-05 00:00:00', 'truongdinh', NULL, NULL, 'Đàn thảo: Đặc điểm sống và cách trồng cây đàn thảo thuỷ sinh', 'Đàn thảo: Đặc điểm sống và cách trồng cây đàn thảo thuỷ sinh');

-- --------------------------------------------------------

--
-- Table structure for table `attribute`
--

CREATE TABLE `attribute` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `attribute_group_id` int(11) NOT NULL,
  `change_price` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attribute`
--

INSERT INTO `attribute` (`id`, `name`, `attribute_group_id`, `change_price`, `status`) VALUES
(18, 'Kích thước cám', 5, 'no', 'active'),
(19, 'Trọng lượng', 5, 'no', 'active'),
(20, 'Số tháng', 4, 'no', 'active'),
(21, 'Nhà sản xuất', 6, 'no', 'active'),
(25, 'Bể thích hợp', 10, 'no', 'active'),
(26, 'Nguồn điện', 10, 'no', 'active'),
(27, 'Công suất', 11, 'no', 'active'),
(28, 'Lưu lượng', 11, 'no', 'active'),
(29, 'Độ cao', 11, 'no', 'active'),
(107, 'Năm', 6, 'no', 'active'),
(108, 'Tháng', 6, 'no', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_group`
--

CREATE TABLE `attribute_group` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attribute_group`
--

INSERT INTO `attribute_group` (`id`, `name`, `status`) VALUES
(4, 'Cá cảnh', 'active'),
(5, 'Cám cá ăn', 'active'),
(6, 'Thuốc trị bệnh', 'active'),
(10, 'Máy sủi', 'active'),
(11, 'Máy bơm', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(200) CHARACTER SET utf8 NOT NULL,
  `status` text NOT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` varchar(45) DEFAULT NULL,
  `is_home` varchar(100) DEFAULT NULL,
  `display` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `status`, `created`, `created_by`, `modified`, `modified_by`, `is_home`, `display`) VALUES
(1, 'Thể thao', 'active', '2019-05-04 00:00:00', 'admin', '2019-05-12 00:00:00', 'hailan', 'yes', 'list'),
(2, 'Giáo dục', 'active', '2019-05-04 00:00:00', 'admin', '2019-05-12 00:00:00', 'hailan', 'yes', 'grid'),
(3, 'Sức khỏe', 'active', '2019-05-04 00:00:00', 'admin', '2019-05-15 15:04:33', 'hailan', 'yes', 'list'),
(4, 'Du lịch', 'active', '2019-05-04 00:00:00', 'admin', '2019-05-15 15:04:30', 'hailan', 'yes', 'grid'),
(5, 'Khoa học', 'active', '2019-05-04 00:00:00', 'admin', '2019-05-12 00:00:00', 'hailan', 'no', 'list'),
(6, 'Số hóa', 'active', '2019-05-04 00:00:00', 'admin', '2019-05-15 15:04:38', 'hailan', 'no', 'grid'),
(7, 'Xe - Ô tô', 'active', '2019-05-04 00:00:00', 'admin', '2019-05-15 15:04:36', 'hailan', 'no', 'list'),
(8, 'Kinh doanh', 'active', '2019-05-12 00:00:00', 'hailan', NULL, NULL, 'no', 'list');

-- --------------------------------------------------------

--
-- Table structure for table `category_article`
--

CREATE TABLE `category_article` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `_lft` int(11) NOT NULL,
  `_rgt` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `is_home` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_article`
--

INSERT INTO `category_article` (`id`, `name`, `_lft`, `_rgt`, `status`, `link`, `created_at`, `update_at`, `parent_id`, `is_home`) VALUES
(1, 'Root', 1, 16, 'NULL', NULL, NULL, NULL, NULL, NULL),
(8, 'Kỹ thuật nuôi cá', 5, 6, 'active', NULL, NULL, NULL, 11, 'yes'),
(11, 'Lịch sử về giống cá Guppy', 4, 7, 'active', 'pound', NULL, NULL, 1, 'yes'),
(12, 'Hồ Thủy Sinh', 2, 3, 'active', NULL, NULL, NULL, 1, 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `category_product`
--

CREATE TABLE `category_product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `_lft` int(10) NOT NULL,
  `_rgt` int(10) NOT NULL,
  `parent_id` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `is_home` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_product`
--

INSERT INTO `category_product` (`id`, `name`, `_lft`, `_rgt`, `parent_id`, `status`, `link`, `created_at`, `update_at`, `is_home`) VALUES
(1, 'Root', 1, 44, NULL, 'inactive', NULL, NULL, NULL, NULL),
(49, 'Cá', 2, 11, '1', 'active', '#', NULL, NULL, 'yes'),
(63, 'Thủy Sinh', 40, 41, '1', 'active', NULL, NULL, NULL, 'yes'),
(65, 'Cám cá ăn', 42, 43, '1', 'active', NULL, NULL, NULL, 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `category_question`
--

CREATE TABLE `category_question` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `_lft` int(11) NOT NULL,
  `_rgt` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `is_home` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_question`
--

INSERT INTO `category_question` (`id`, `name`, `_lft`, `_rgt`, `status`, `link`, `created_at`, `update_at`, `parent_id`, `is_home`) VALUES
(1, 'Root', 1, 6, 'no', NULL, NULL, NULL, NULL, NULL),
(2, 'Cá đẹp', 2, 3, 'active', NULL, NULL, NULL, 1, 'yes'),
(3, 'Cách nuôi cá', 4, 5, 'active', NULL, NULL, NULL, 1, 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `contact_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `phone`, `email`, `contact`, `created_date`, `contact_by`) VALUES
(1, 'Lê Trương Định', '0364764002', 'admin@gmail.com', 'yes', '2020-11-22 00:00:00', 'truongdinh'),
(2, 'Nguyễn Đình Duy', '0984623094', 'dinhduy@gmail.com', 'yes', '2020-11-18 00:00:00', 'truongdinh');

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `type_coupon` varchar(255) NOT NULL,
  `value` int(11) NOT NULL,
  `total` int(11) DEFAULT NULL,
  `total_used` int(11) DEFAULT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `price_start` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`id`, `code`, `type_coupon`, `value`, `total`, `total_used`, `date_start`, `date_end`, `price_start`, `status`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(6, 'aZxd1Jjefm', 'percent', 5, NULL, NULL, '2020-11-20', '2020-11-30', 200000, 'active', '2020-11-18 00:00:00', 'truongdinh', '2020-11-20 00:00:00', 'hailan'),
(7, 'ttZynLO5JX', 'percent', 10, NULL, NULL, '2020-11-19', '2020-11-26', 100000, 'active', '2020-11-18 00:00:00', 'truongdinh', '2020-12-10 00:00:00', 'hailan'),
(8, 'uJ3uMpcqR3', 'direct', 100000, NULL, NULL, '2020-12-10', '2020-12-29', 100000, 'active', '2020-11-22 00:00:00', 'truongdinh', '2020-12-10 00:00:00', 'hailan');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` text NOT NULL,
  `phone` text DEFAULT NULL,
  `description` text NOT NULL,
  `thumb` text NOT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` text DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` text DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `combostar` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `phone`, `description`, `thumb`, `created`, `created_by`, `modified`, `modified_by`, `status`, `combostar`) VALUES
(1, 'Huyền Anh', '', NULL, '<p><strong>C&aacute; c&oacute; nguồn gốc từ Jamaica, sống trong những vũng vịnh cạn, eo biển, mương r&atilde;nh v&agrave; dọc theo bờ biển. Năm 1866, Robert John Lechmere Guppy sống ở đảo Trinidad thuộc British West Indies gửi một v&agrave;i con c&aacute; n&agrave;y đến bảo t&agrave;ng Anh để nhận dạng. Albert C. L. G. Gunther của bảo t&agrave;ng n&agrave;y đặt t&ecirc;n khoa học cho n&oacute; l&agrave; Girardinus guppii để ghi c&ocirc;ng Guppy v&agrave;o cuối năm đ&oacute;.</strong></p>', 'WCqzMu8bLc.jpeg', '2020-11-17 00:00:00', 'truongdinh', '2020-11-28 00:00:00', 'truongdinh', 'active', 5),
(2, 'Thảo Vy', '', NULL, '<p><strong>Đ&acirc;y l&agrave; giống c&aacute; dễ nu&ocirc;i, sinh sản nhanh, đa dạng v&agrave; phong ph&uacute; nhất trong số c&aacute;c lo&agrave;i c&aacute; cảnh (về m&agrave;u sắc). C&aacute; bảy m&agrave;u nhập ngoại v&agrave;o Việt Nam c&oacute; 2 loại ch&iacute;nh: bảy m&agrave;u đu&ocirc;i rắn v&agrave; bảy m&agrave;u th&acirc;n xanh đen, đu&ocirc;i m&agrave;u xanh biếc, đỏ điểm vạch trắng. Ở c&aacute;c nước kh&aacute;c c&oacute; c&aacute; bảy m&agrave;u to&agrave;n th&acirc;n đen tuyền chưa thấy c&oacute; tại Việt Nam.</strong></p>', 'PlrgL308s9.jpeg', '2020-11-17 00:00:00', 'truongdinh', '2020-11-28 00:00:00', 'truongdinh', 'active', 3),
(3, 'Nguyễn Bảo Trâm', '', NULL, '<p><strong>C&aacute; cảnh đẹp đặc biệt bởi sức h&uacute;t của n&oacute;, việc nu&ocirc;i c&aacute; kh&ocirc;ng chỉ l&agrave; sở th&iacute;ch, niềm đam m&ecirc; m&agrave; c&ograve;n mang &yacute; nghĩa phong thủy sẽ đem lại niềm vui, hạnh ph&uacute;c, th&agrave;nh đạt v&agrave; gặp nhiều điều may mắn trong cuộc sống. Ở bất kỳ lứa tuổi n&agrave;o, c&aacute; cảnh đẹp cũng dễ d&agrave;ng chinh phục tr&aacute;i tim của những ai đ&atilde; &ldquo;tr&oacute;t&rdquo; bị m&ecirc; hoặc bởi vẻ đẹp của ch&uacute;ng.</strong></p>', 'D8tSwkptaO.jpeg', '2020-11-28 00:00:00', 'truongdinh', '2020-11-28 00:00:00', 'truongdinh', 'active', 4),
(4, 'duynguyen', 'dinhduy700ewqeqw@gmail.com', '0937446418', 'Thông tin của bạn sẽ được chúng tôi giữ riêng tư*Thông tin của bạn sẽ được chúng tôi giữ riêng tư*', 'default.png', '2020-12-05 00:00:00', 'guest', NULL, NULL, 'inactive', NULL),
(5, 'duynguyen', 'dinhduy700ewqeqw@gmail.com', '0937446418', 'Thông tin của bạn sẽ được chúng tôi giữ riêng tư*Thông tin của bạn sẽ được chúng tôi giữ riêng tư*', 'default.png', '2020-12-05 00:00:00', 'guest', NULL, NULL, 'inactive', NULL),
(6, 'duynguyen', 'dinhduy70011@gmail.com', '0937446418', 'Thông tin của bạn sẽ được chúng tôi giữ riêng tư*Thông tin của bạn sẽ được chúng tôi giữ riêng tư*Thông tin của bạn sẽ được chúng tôi giữ riêng tư*', 'default.png', '2020-12-05 00:00:00', 'guest', NULL, NULL, 'inactive', NULL),
(7, 'duynguyen', 'admin@gmail.com', '0937446418', 'Thông tin của bạn sẽ được chúng tôi giữ riêng tư*Thông tin của bạn sẽ được chúng tôi giữ riêng tư*Thông tin của bạn sẽ được chúng tôi giữ riêng tư*', 'default.png', '2020-12-05 00:00:00', 'guest', NULL, NULL, 'inactive', NULL),
(8, 'duynguyen', 'dinhduy700@gmail.com', '09223923123', 'Cảm nhận về sản phẩm của bạn như thế nào.', 'default.png', '2020-12-06 00:00:00', 'guest', NULL, NULL, 'inactive', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `intro`
--

CREATE TABLE `intro` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `intro`
--

INSERT INTO `intro` (`id`, `content`) VALUES
(4, '<h2>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; C&acirc;u Chuyện Khởi Nghi&ecirc;̣p V&ecirc;̀ Cá Cảnh</h2>\r\n\r\n<p><img src=\"http://guppy_xyz.com//storage/photos/ca-canh-de-nuoi-2.jpg\" style=\"height:500px; width:1280px\" /></p>\r\n\r\n<p><code><kbd>C&acirc;u chuyện Cộng bắt đầu v&agrave;o năm 2007. Cửa h&agrave;ng đầu ti&ecirc;n l&agrave; một tiệm giải kh&aacute;t nhỏ tr&ecirc;n con phố c&agrave; ph&ecirc; l&acirc;u đời tại H&agrave; Nội &ndash; phố Triệu Việt Vương.Cộng đơn giản được lấy cảm hứng từ chữ c&aacute;i đầu ti&ecirc;n trong c&acirc;u Quốc hiệu: CỘNG HO&Agrave; X&Atilde; HỘI CHỦ NGHĨA VIỆT NAMSứ mệnh của ch&uacute;ng t&ocirc;i l&agrave; khơi dậy tr&iacute; tưởng tượng v&agrave; mang đến cho kh&aacute;ch h&agrave;ng những trải nghiệm cảm x&uacute;c kh&aacute;c biệt về Việt Nam. Ch&uacute;ng t&ocirc;i đang kh&ocirc;ng ngừng s&aacute;ng tạo với mục ti&ecirc;u l&agrave; tiến xa hơn để mang Cộng đến vớithế giới; lan toả v&agrave; truyền cảm hứng&nbsp;bằng tr&aacute;i tim của mỗi th&agrave;nh vi&ecirc;n.Từ bỏ c&ocirc;ng việc ổn định với mức lương cao ở ng&acirc;n h&agrave;ng ở đất kinh kỳ để về qu&ecirc; nu&ocirc;i c&aacute;, chỉ sau 5 năm, ch&agrave;ng trai trẻ Ho&agrave;ng Thanh Li&ecirc;m, 34 tuổi, ở x&atilde; Gia Phương (Gia Viễn, Ninh B&igrave;nh) đ&atilde; x&acirc;y dựng được trang trại nu&ocirc;i c&aacute;rộng hơn 3ha v&agrave; đem về thu nhập hơn 500 triệu đồng/năm<br />\r\nTr&ograve; chuyện với ch&uacute;ng t&ocirc;i, Li&ecirc;m cho biết, sau khi tốt nghiệp chuy&ecirc;n ng&agrave;nh T&agrave;i ch&iacute;nh ng&acirc;n h&agrave;ng (Trường Học viện T&agrave;i ch&iacute;nh), anh xin v&agrave;o l&agrave;m việc cho một ng&acirc;n h&agrave;ng lớn ở thủ đ&ocirc; H&agrave; Nội. Sau một thời gian d&agrave;i phấn đấu, anhđược ph&iacute;a ng&acirc;n h&agrave;ng trả cho một mức lương hậu hĩnh.Mặc d&ugrave; thu nhập cao, nhưng Li&ecirc;m vẫn quyết định xin nghỉ việc. &ldquo;<em>Mặc d&ugrave; đang l&agrave;m ở ng&acirc;n h&agrave;ng nhưng l&uacute;c n&agrave;o cũng ao ước về qu&ecirc; chăn nu&ocirc;i, l&agrave;m nghề n&ocirc;ng m&agrave; đầu tư v&agrave; t&iacute;nh to&aacute;n l&agrave;m tốt th&igrave; thu nhập cũng chẳng k&eacute;m g&igrave;</em></kbd><kbd><em>ng&agrave;nh nghề kh&aacute;c, m&agrave; quan trọng nhất l&agrave; được ở gần gia đ&igrave;nh n&ecirc;n sau nhiều lần đắn đ&oacute; t&ocirc;i quyết định từ bỏ c&ocirc;ng việc đ&atilde; gắn b&oacute; 7 năm</em>&rdquo; &ndash;Li&ecirc;m t&acirc;m sự.</kbd></code></p>\r\n\r\n<p><img alt=\"\" src=\"http://guppy_xyz.com//storage/photos/cac-loai-ca-canh-de-nuoi-5.jpg\" style=\"height:500px; width:1280px\" /></p>');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent_id` varchar(255) DEFAULT NULL,
  `_lft` int(10) NOT NULL,
  `_rgt` int(10) NOT NULL,
  `update_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `type_menu` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `parent_id`, `_lft`, `_rgt`, `update_at`, `created_at`, `status`, `type_menu`, `link`) VALUES
(1, 'Root', NULL, 1, 20, NULL, NULL, 'inactive', 'normal', 'home'),
(4, 'Trang chủ', '1', 2, 3, NULL, NULL, 'active', 'normal', 'home'),
(5, 'Liên hệ', '1', 14, 15, NULL, NULL, 'inactive', 'normal', 'home'),
(6, 'Bài viết', '1', 6, 7, NULL, NULL, 'active', 'category_article', 'article'),
(7, 'Giới thiệu', '1', 4, 5, NULL, NULL, 'active', 'normal', 'intronews'),
(8, 'Sản phẩm', '1', 8, 9, NULL, NULL, 'active', 'category_product', 'home'),
(9, 'Thư viện hình ảnh', '1', 10, 13, NULL, NULL, 'inactive', 'normal', 'home'),
(10, 'Hệ thống của hàng', '1', 16, 17, NULL, NULL, 'inactive', 'normal', 'home'),
(11, 'Tuyển dụng', '1', 18, 19, NULL, NULL, 'inactive', 'normal', 'home');

-- --------------------------------------------------------

--
-- Table structure for table `partner`
--

CREATE TABLE `partner` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `thumb` text NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `ordering` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `partner`
--

INSERT INTO `partner` (`id`, `name`, `link`, `thumb`, `status`, `created`, `created_by`, `modified_by`, `modified`, `ordering`) VALUES
(1, 'Google', 'https://www.google.com/', 'iTOgfYlH6E.png', 'active', '2020-12-03 00:00:00', 'truongdinh', NULL, NULL, 5),
(2, 'Laravel', 'https://laravel.com/', 'Mkd3j0NsdQ.png', 'active', '2020-12-03 00:00:00', 'truongdinh', 'truongdinh', '2020-12-03 00:00:00', 2),
(3, 'PHP', 'https://www.php.net/', '3DeiNboV2O.png', 'active', '2020-12-03 00:00:00', 'truongdinh', 'truongdinh', '2020-12-03 00:00:00', 1),
(4, 'Javascript', 'https://www.javascript.com/', '05i3dxQfGd.png', 'active', '2020-12-03 00:00:00', 'truongdinh', NULL, NULL, 3),
(5, 'Bootstrap', 'https://getbootstrap.com/', 'g0QJbVdjSf.png', 'active', '2020-12-03 00:00:00', 'truongdinh', NULL, NULL, 4);

-- --------------------------------------------------------

--
-- Table structure for table `price_product`
--

CREATE TABLE `price_product` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `attr_name` varchar(255) NOT NULL,
  `attr_value` varchar(255) NOT NULL,
  `price` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `price_product`
--

INSERT INTO `price_product` (`id`, `product_id`, `attr_name`, `attr_value`, `price`) VALUES
(23, 185, 'Cám cá ăn', '50gam', '30000'),
(24, 183, 'Cá cảnh', '4 tháng', '50000'),
(25, 184, 'Cá cảnh', '500g', '30000'),
(26, 184, 'Cá cảnh', '50gam', '50000'),
(27, 184, 'Cá cảnh', '100gam', '4444444'),
(28, 185, 'Cám cá ăn', '500g', '90000'),
(29, 185, 'Cám cá ăn', '50gam', '30000'),
(30, 186, 'Cám cá ăn', '50gam', '30000'),
(31, 186, 'Cám cá ăn', '100gam', '50000');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `category_product_id` int(11) NOT NULL,
  `attribute` varchar(255) DEFAULT NULL,
  `attribute_name_price_custom` varchar(300) DEFAULT NULL,
  `price_custom` varchar(255) DEFAULT NULL,
  `attribute_group_id` int(10) DEFAULT NULL,
  `status` varchar(10) NOT NULL,
  `tags` text DEFAULT NULL,
  `content` varchar(10000) NOT NULL,
  `type` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  `promotion` varchar(255) DEFAULT NULL,
  `value_promotion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `thumb`, `price`, `link`, `category_product_id`, `attribute`, `attribute_name_price_custom`, `price_custom`, `attribute_group_id`, `status`, `tags`, `content`, `type`, `created`, `created_by`, `modified`, `modified_by`, `promotion`, `value_promotion`) VALUES
(186, 'Cám thái 3/5', '[\"1-5fd5edc1db2de_cam_inve_35.jpg\",\"1-5fd5edc1db2e9_cam_inve_35_02.jpg\",\"1-5fd5edc223ab3_cam_inve_35_03.jpg\",\"1-5fd5edc223a03_cam_inve_35_04.jpg\"]', 30000, NULL, 65, '[]', '5', '{\"name\":\"[\\\"50gam\\\",\\\"100gam\\\"]\",\"value\":\"[\\\"30000\\\",\\\"50000\\\"]\"}', 0, 'active', '[\"16\",\"17\"]', '<h1><strong>C&aacute;m Th&aacute;i Inve</strong>&nbsp;3/5 hạt si&ecirc;u mịn - Thức ăn ph&ugrave; hợp cho rất nhiều loại c&aacute; cảnh.</h1>\r\n\r\n<p>Xuất xứ từ Th&aacute;i Lan với lượng đạm l&ecirc;n tới 55% v&ocirc; c&ugrave;ng dinh dưỡng. L&agrave; loại thức ăn hạt nổi, cực thơm, c&aacute;m c&oacute; chứa c&aacute;c loại chất gi&uacute;p vỗ b&eacute;o cho c&aacute;, c&aacute; lớn nhanh, khỏe mạnh, hỗ trợ l&ecirc;n m&agrave;u, l&ecirc;n v&acirc;y đẹp.</p>', 'featured', '2020-12-13 00:00:00', 'duy-nguyen', NULL, NULL, 'default', 0);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `created` datetime NOT NULL,
  `created_by` text DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` text DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `ordering` int(11) NOT NULL,
  `question_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `question`, `answer`, `created`, `created_by`, `modified`, `modified_by`, `status`, `ordering`, `question_id`) VALUES
(6, 'Cá La Hán (khoảng 500g) bị lồi mắt, đứng tại chỗ không bơi, ăn ít, bị sình bụng, đi phân trắng, nên điều trị thế nào?', '<p><strong>Để xử l&yacute; hiện tượng tr&ecirc;n, thực hiện như sau:</strong></p>\r\n\r\n<ul>\r\n	<li>Pha trong 100L nước sạch để tắm c&aacute;, ng&agrave;y 1 lần x 60 ph&uacute;t, trong 3 ng&agrave;y li&ecirc;n tục:\r\n	<ul>\r\n		<li><strong>MD OXCIN 500&nbsp;</strong>(10ml) +&nbsp;<strong>MD SEPTRYL 240</strong>&nbsp;(10ml)</li>\r\n	</ul>\r\n	</li>\r\n	<li>Lưu &yacute;: Phải thay nước hồ sau khi tắm c&aacute;.</li>\r\n</ul>', '2020-11-28 00:00:00', 'truongdinh', NULL, NULL, 'active', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `script`
--

CREATE TABLE `script` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` text DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` text DEFAULT NULL,
  `script` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `script`
--

INSERT INTO `script` (`id`, `name`, `created`, `created_by`, `modified`, `modified_by`, `script`) VALUES
(4, 'head', '2020-11-16 00:00:00', 'truongdinh', '2020-11-22 00:00:00', 'truongdinh', '<div role=\"tabpanel\" class=\"tab-pane\" id=\"profile\">Content\r\n<div role=\"tabpanel\" class=\"tab-pane\" id=\"profile\">Content'),
(5, 'footer', '2020-11-16 00:00:00', 'truongdinh', '2020-11-20 00:00:00', 'truongdinh', '<div role=\"tabpanel\" class=\"tab-pane\" id=\"profile\">Content\r\n<div role=\"tabpanel\" class=\"tab-pane\" id=\"profile\">Content\r\n<div role=\"tabpanel\" class=\"tab-pane\" id=\"profile\">Content\r\n<div role=\"tabpanel\" class=\"tab-pane\" id=\"profile\">Content\r\n<div role=\"tabpanel\" class=\"tab-pane\" id=\"profile\">Content');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `key_value` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` text DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `key_value`, `value`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(5, 'email', '{\"email\":\"dinhduy700@gmail.com\",\"password\":\"8511569230\",\"bcc\":\"dinhduy7001@gmail.com\",\"id\":\"5\",\"key_value\":\"email\",\"emailHidden\":\"email\"}', '2020-12-05 00:00:00', 'truogdinh', NULL, NULL),
(6, 'social', '{\"facebook\":\"https:\\/\\/www.facebook.com\\/dinhduy3009\",\"youtube\":\"https:\\/\\/www.youtube.com\\/channel\\/UCk3G2loK9JkeB5BaB-UTaow?view_as=subscriber\",\"id\":\"6\",\"key_value\":\"social\",\"socialHidden\":\"social\"}', '2020-12-05 00:00:00', 'truogdinh', NULL, NULL),
(7, 'general', '{\"hotline\":\"0937446418\",\"email\":\"dinhduy700@gmail.com\",\"copyright\":\"Copyright \\u00a9 2020 - B\\u1ea3n quy\\u1ec1n Tr\\u01b0\\u01a1ng \\u0110i\\u0323nh & \\u0110inh Duy\",\"time_work\":\"Th\\u01b0\\u0301 2 - CN : 8h - 22h\",\"address\":\"2385\\/63 Ph\\u1ea1m Th\\u1ebf Hi\\u1ec3n, P6, Q8, TPHCM\",\"introduce\":\"<p>Ha\\u0303y go\\u0323i cho chu\\u0301ng t&ocirc;i n&ecirc;\\u0301u ba\\u0323n c&acirc;\\u0300n<\\/p>\",\"id\":\"7\",\"key_value\":\"general\",\"generallHidden\":\"general\",\"logo_current\":\"qyfo1pQQ1z.png\",\"logo\":\"Q45JNNUamg.png\"}', '2020-12-05 00:00:00', 'truogdinh', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `price` text NOT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` text DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`id`, `name`, `status`, `price`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'Bình Định', 'active', '10000', '2020-11-17 00:00:00', 'truongdinh', '2020-11-17 00:00:00', 'hailan'),
(2, 'An Giang', 'active', '30000', '2020-11-17 00:00:00', 'truongdinh', NULL, NULL),
(3, 'Hà Nội', 'active', '20000', '2020-11-17 00:00:00', 'truongdinh', NULL, NULL),
(4, 'TP Hồ Chí Minh', 'active', '10000', '2020-11-17 00:00:00', 'truongdinh', '2020-11-20 00:00:00', 'hailan');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `link` varchar(200) NOT NULL,
  `thumb` text DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  `status` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `name`, `description`, `link`, `thumb`, `created`, `created_by`, `modified`, `modified_by`, `status`) VALUES
(1, 'Giảm giá 500k', 'Khóa học sẽ giúp bạn trở thành một chuyên gia Frontend với đầy đủ các kiến thức về HTML, CSS, JavaScript, Bootstrap, jQuery, chuyển PSD thành HTML ...', 'https://zendvn.com/khoa-hoc-lap-trinh-frontend-master/', 'cgZgBkxlAw.jpeg', '2019-04-15 00:00:00', 'hailan', '2020-12-01 00:00:00', 'hailan', 'active'),
(2, 'Giảm sốc', 'Học trực tuyến giúp bạn tiết kiệm chi phí, thời gian, cập nhật được nhiều kiến thức mới nhanh nhất và hiệu quả nhất', 'https://zendvn.com/', 'RmjjbO5fj4.jpeg', '2019-04-18 00:00:00', 'hailan', '2020-12-01 00:00:00', 'hailan', 'active'),
(3, 'Ưu đãi học phí', 'Tổng hợp các trương trình ưu đãi học phí hàng tuần, hàng tháng đến tất các các bạn với các mức giảm đặc biệt 50%, 70%,..', 'https://zendvn.com/uu-dai-hoc-phi-tai-zendvn/', 'tatXB6Imfc.jpeg', '2019-04-24 00:00:00', 'hailan', '2020-12-01 00:00:00', 'hailan', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `subscribe`
--

CREATE TABLE `subscribe` (
  `id` int(11) NOT NULL,
  `subscribe` varchar(300) NOT NULL,
  `status` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscribe`
--

INSERT INTO `subscribe` (`id`, `subscribe`, `status`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(9, 'sadasd', NULL, '2020-12-02 00:00:00', 'duy-nguyen', NULL, NULL),
(10, 'asdasd', NULL, '2020-12-02 00:00:00', 'duy-nguyen', NULL, NULL),
(11, 'asdasd', NULL, '2020-12-02 00:00:00', 'duy-nguyen', NULL, NULL),
(12, 'ádasdasd', NULL, '2020-12-02 00:00:00', 'duy-nguyen', NULL, NULL),
(13, 'dinhduy700@gmail.com', NULL, '2020-12-04 00:00:00', 'duy-nguyen', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `ordering` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id`, `name`, `status`, `ordering`) VALUES
(1, 'cá', 'active', 1),
(2, 'guppy', 'active', 2),
(3, 'bảy màu', 'active', 3),
(4, 'guppy fullgold', 'active', 3),
(5, 'guppy full red', 'active', 4),
(6, 'cá ba đuôi', 'active', 5),
(7, 'cá vàng', 'active', 7),
(8, 'cá đá', 'active', 9),
(9, 'betta', 'active', 10),
(10, 'may sui', 'active', 12),
(11, 'may sui oxy', 'active', 14),
(12, 'bom nuoc', 'active', 15),
(13, 'may bom', 'active', 16),
(14, 'Vật liệu lọc', 'active', 16),
(15, 'vật liệu lọc tốt', 'active', 18),
(16, 'cám tốt nhất', 'active', 20),
(17, 'cám không dơ nước', 'active', 21),
(18, 'thuốc cho cá', 'active', 29),
(19, 'Thuốc trị bệnh', 'active', 31);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `level` varchar(10) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` varchar(45) DEFAULT NULL,
  `status` varchar(10) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `fullname`, `password`, `avatar`, `level`, `created`, `created_by`, `modified`, `modified_by`, `status`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin123456', 'e10adc3949ba59abbe56e057f20f883e', '1ctW8mj8vq.png', 'admin', '2014-12-10 08:55:35', 'admin', '2019-05-04 14:47:14', 'hailan', 'active'),
(2, 'hailan', 'hailan@gmail.com', 'hailan', '7c6f3ef49405d8a330aaa19ca0d0f6af', '1eSGmvZ3gM.jpeg', 'member', '2014-12-13 07:20:03', 'admin', '2019-05-04 08:47:04', 'hailan', 'active'),
(3, 'user123', 'test@gmail.com', 'user123', 'e10adc3949ba59abbe56e057f20f883e', 'Hb1QSn1CL8.png', 'member', '2019-05-04 00:00:00', 'admin', '2019-05-04 08:47:07', 'hailan', 'active'),
(4, 'user456', 'user456@gmail.com', 'user456', 'e10adc3949ba59abbe56e057f20f883e', 'J1uknUz0T6.png', 'member', '2019-05-04 00:00:00', 'admin', '2019-05-04 08:47:10', 'hailan', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` text DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `link`, `status`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'https://www.youtube.com/watch?v=vp-xGYA1FNs&list=PL4dMDdbiezYz8XQdC3HIAJYWsVQda3Xxz', 'active', '2020-11-14 00:00:00', 'truongdinh', '2020-12-04 00:00:00', 'hailan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agencies`
--
ALTER TABLE `agencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `attribute`
--
ALTER TABLE `attribute`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attribute_group`
--
ALTER TABLE `attribute_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `category_article`
--
ALTER TABLE `category_article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_product`
--
ALTER TABLE `category_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_question`
--
ALTER TABLE `category_question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `intro`
--
ALTER TABLE `intro`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partner`
--
ALTER TABLE `partner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `price_product`
--
ALTER TABLE `price_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `script`
--
ALTER TABLE `script`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `subscribe`
--
ALTER TABLE `subscribe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agencies`
--
ALTER TABLE `agencies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `attribute`
--
ALTER TABLE `attribute`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `attribute_group`
--
ALTER TABLE `attribute_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `category_article`
--
ALTER TABLE `category_article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `category_product`
--
ALTER TABLE `category_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `category_question`
--
ALTER TABLE `category_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `intro`
--
ALTER TABLE `intro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `partner`
--
ALTER TABLE `partner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `price_product`
--
ALTER TABLE `price_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `script`
--
ALTER TABLE `script`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subscribe`
--
ALTER TABLE `subscribe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

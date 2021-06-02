-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 02, 2021 lúc 08:40 AM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `thanhxuan`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaitin`
--

CREATE TABLE `loaitin` (
  `idLT` int(11) NOT NULL,
  `lang` char(2) DEFAULT 'vi',
  `Ten` varchar(100) NOT NULL DEFAULT '',
  `ThuTu` tinyint(11) DEFAULT 0,
  `AnHien` tinyint(1) DEFAULT 1,
  `idTL` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `loaitin`
--

INSERT INTO `loaitin` (`idLT`, `lang`, `Ten`, `ThuTu`, `AnHien`, `idTL`) VALUES
(1, 'vi', 'Tâm lý', 0, 1, 1),
(2, 'vi', 'Sức khoẻ', 0, 1, 1),
(3, 'vi', 'Bữa Ăn', 0, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tin`
--

CREATE TABLE `tin` (
  `idTin` int(11) NOT NULL,
  `lang` char(2) NOT NULL DEFAULT 'vi',
  `TieuDe` varchar(255) NOT NULL DEFAULT '',
  `TomTat` varchar(1000) DEFAULT NULL,
  `urlHinh` varchar(255) DEFAULT NULL,
  `Ngay` date DEFAULT current_timestamp(),
  `idUser` int(11) NOT NULL DEFAULT 0,
  `Content` text DEFAULT NULL,
  `idLT` int(11) NOT NULL DEFAULT 0,
  `SoLanXem` int(11) DEFAULT 0,
  `NoiBat` tinyint(1) DEFAULT 0,
  `AnHien` tinyint(1) DEFAULT 1,
  `tags` varchar(2000) DEFAULT NULL,
  `Duyet` tinyint(1) NOT NULL,
  `NguoiDang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tin`
--

INSERT INTO `tin` (`idTin`, `lang`, `TieuDe`, `TomTat`, `urlHinh`, `Ngay`, `idUser`, `Content`, `idLT`, `SoLanXem`, `NoiBat`, `AnHien`, `tags`, `Duyet`, `NguoiDang`) VALUES
(1, 'vi', 'Bữa ăn đầy dinh dưỡng', NULL, 'uploads/images/aaaaaa.jpg', '2021-06-02', 0, 'Ăn để no', 3, 0, 0, 0, NULL, 0, 'khai637116'),
(2, 'vi', 'Khoẻ mạnh để chiến đấu', NULL, 'uploads/images/hinh1.jpg', '2021-06-02', 0, 'humaaaaaaa', 2, 0, 0, 0, NULL, 0, 'khai637116'),
(3, 'vi', 'Tin mới', NULL, 'uploads/images/hinh1.jpg', '2021-06-02', 0, 'aaaaaaaaaaaaaaaaaaaa', 2, 0, 0, 0, NULL, 0, 'khai637116'),
(4, 'vi', 'Tâm lý vững vàng', NULL, 'uploads/images/hinh3.jpg', '2021-06-02', 0, 'aaaaaaaaaaaaaaaaa', 1, 0, 0, 0, NULL, 0, 'khai637116'),
(811, 'vi', 'Tâm lý vững vàng', NULL, 'uploads/images/hinh3.jpg', '2021-06-02', 0, 'aaaaaaaaaaaaaaaaa', 1, 0, 0, 0, NULL, 0, 'khai637116');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `idUser` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `vaitro` tinyint(1) NOT NULL,
  `sdt` int(11) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`idUser`, `username`, `password`, `vaitro`, `sdt`, `email`) VALUES
(1, 'admin', '123456', 0, 0, ''),
(2, 'khai637116', '123456', 0, 123456, 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ykien`
--

CREATE TABLE `ykien` (
  `idYKien` int(11) NOT NULL,
  `idTin` int(11) NOT NULL DEFAULT 0,
  `Ngay` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `NoiDung` text NOT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `HoTen` varchar(255) DEFAULT NULL,
  `AnHien` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `ykien`
--

INSERT INTO `ykien` (`idYKien`, `idTin`, `Ngay`, `NoiDung`, `Email`, `HoTen`, `AnHien`) VALUES
(9, 783, '2018-12-19 18:14:23', 'Chời ơi tầm trung mà có giá gần 10 triệu với hơn 10 triệu thì dẹp cho khỏe mua xiaomi cho xong.', 'bb@bb.com', 'Đời Chẳng Đẹp', 1),
(8, 783, '2018-12-19 18:13:39', 'Nếu tìm hiểu kĩ ai cũng sẽ thấy là độ phân giải không phải là con số quyết định một bức ảnh đẹp, mà chính là cảm biến.', 'aa@aa.com', 'Đời Tươi Đẹp', 1),
(10, 783, '2018-12-19 18:14:57', 'Siêu phẩm đây rồi,quá tuyệt vời cho 1 sản phẩm tầm trung', 'cc@cc.com', 'Đời Chẳng Đẹp Chẳng Xấu', 1),
(11, 786, '2018-12-19 19:54:40', 'Ông ấy không chỉ là HLV thể lực mà ông ấy như người cha trong gia đình đội tuyển. Thấu hiểu tính cách, tâm tư của từng cầu thủ, nhìn vào những ưu điểm của từng cầu thủ để khích lệ, động viên, gắn kết họ thành một tập thể đoàn kết, vững mạnh. Bóng đá là môn thể thao cần tổng thể sức mạnh tập thể. Đoàn kết để tạo nên sức mạnh. Đó là bí quyết thành công của bóng đá Việt Nam trong năm qua. Cám ơn ông thật nhiều!', 'thuduong@gomeo.com', 'Thu Hương', 1),
(12, 786, '2018-12-19 19:55:18', 'Khi đọc những lời chia tay này, tôi mới thấy ông Bae Ji-won rất sâu sát và hiểu tường tận các học trò. Không có gì hơn khi có một người thấy hiểu rõ các học trò như vậy, điều này giúp cho ban huấn luyện phát huy tốt nhất năng lực của cầu thủ và thể lực là một phần không thể thiếu. Buồn vì chúng ta không giữ được ông lại. Xin chân thành cảm ơn những gì ông đã đóng góp cho BĐ VN', 'hung@abc.com', 'Quốc Hung', 1),
(13, 786, '2018-12-19 19:55:49', 'Đọc xong bức tâm thư mà rưng rưng nước mắt. Ông xứng đáng là người hùng thầm lặng nhất của Việt Nam. Ko biết lý do là ji nhưng sự ra đi của ông là 1 tổn thất không hề nhỏ cho bóng đá Việt Nam. Là 1 công dân của Việt Nam xin được cảm ơn những ji mà ông đã cống hiến cho bóng đá nước nhà. Xin được chúc ông sức khoẻ và mong những điều tốt đẹp nhất đến với ông. Xin cảm ơn!', 'hoai@yahoo.com', 'Hoài', 1),
(14, 786, '2018-12-19 19:56:13', 'Phải công nhận tập thể đội tuyển Việt Nam bây giờ đoàn kết trong và cả ngoài sân cỏ. Ở họ thấy không có khoảng cách về tuổi tác, vùng miền hay sự nghi ngờ đố kị nhau như những lớp trước, cái đó cũng là 1 phần của thành công ngày hôm nay. Ông Bae hẳn hiểu rất rõ điều này, cảm ơn ông vì những đóng góp cho Việt Nam suốt thời gian qua.', 'viet@yahoo.com', 'Lê Hoàng Việt', 1),
(15, 786, '2018-12-19 19:56:41', 'Một bài viết rất hay và có tâm đến từ HLV thể lực. Cảm ơn ông trong quãng thời gian qua đã sát cánh cùng đội tuyển gặt hái nhiều thành công mà trong đó thể lực đóng vai trò rất quan trọng đến cầu thủ. Lời chia tay có lẽ nuối tiếc nhất của đội tuyển. Chúc ông nhiều sức khỏe, thành công hơn!', 'jim@gai,com', 'Jim', 1),
(16, 786, '2018-12-19 19:57:16', 'Nhìn danh sách Asian Cup không thấy ông Bae, đã thấy nghi nghi. Giờ thì có thông tin chính thức. Cảm ơn ông rất nhiều. Nhờ có ông mà thể lực của các cầu thủ tốt hơn trước rất nhiều, đá 90 phút vẫn thấy trâu lắm. Nhưng tôi băn khoăn, vì sao ông nghỉ vậy?', 'hoanglong@yahoo.com', 'Hoàng Long', 1),
(17, 786, '2018-12-19 19:57:44', 'Đúng nghĩa là một bác sĩ của đội tuyển. Điều trị về chấn thương mà còn về tâm lý của từng cầu thủ. Tôi thay mặt cổ động viên VN cám ơn ông rất nhiều những gì ông đã cống hiến cho bóng đá VN thời gian qua.', 'mai@gai.com', 'Bang Mai', 1),
(18, 786, '2018-12-19 19:58:20', 'Với một người thầy tràn đầy tình cảm và tâm huyết như ông sao lại để ông ra đi khỏi đội tuyển Việt nam. Những người làm bóng đá của chúng ta đều mong phát triển tốt mà sao không ngòi lại vói nhau nhỉ', 'tuananh@hai.com', 'Tuấn anh', 1),
(19, 786, '2018-12-19 19:59:05', 'Đó là trách nhiệm công việc phải làm của 1 HLV thể lực, không có ông thì cũng có những người khác làm, chừng nào làm mà không lãnh lương thì mới gọi là người hùng thầm lặng.', 'ntd@hanti.com', 'NTD', 1),
(20, 787, '2018-12-19 20:26:38', 'Tôi nhìn thấy con khỉ đầu tiên nhưng tôi lại là một kỹ sư xây dựng khô khan :(', 'ssg@sfsdf.com', 'Trọng Hiền', 1),
(21, 787, '2018-12-19 20:27:26', 'Nó chỉ đúng với một số người thôi, một số người thì ngược lại trong đó có tôi. Một bức hình không thể suy ngược ra tính cách hay khả năng của mỗi con người, có thể với tính cách như vậy sẽ nhìn ra bức hình thì đúng nhưng ngược lại chưa chắc', 'sadas@dsf.com', 'Kính Lúp', 1),
(22, 787, '2018-12-19 20:28:59', 'Còn lý giải về con khỉ thì khá đúng. Mình sống ko đc nguyên tắc lắm tùy cảm hứng sẽ lm vc này vc kia. Thường thức khuya lv và ngủ nướng, dậy sớm ngủ sớm là nhiệm vụ bất khả thi. Có hôm ngủ tới trưa dạy mới nấu cơm ngon cho vợ con xong đi cafe chém gió với bạn ròi chiều mới về lv. Bố mẹ hay cằn nhằn về nếp sống kì cục của mình nhưng cá nhân thì vẫn thấy hạnh phúc vui vẻ , hên là có cô vợ dễ tính chiều chồng hihi.', 'das@dfsd.com', 'Nntuan', 1),
(23, 787, '2018-12-19 20:29:42', 'Tôi chỉ thấy 1 con khỉ thôi nhưng tôi làm nghề kế toán và tính cách khô khan, tôi là phụ nữ nhưng đa số mọi người quen biết bảo tôi là Tom boy.', 'tert@sdfsf.com', 'Quỳnh Thắng', 1),
(24, 788, '2018-12-19 20:39:31', 'Nhân dân Việt Nam mình thật diễm phúc  và tự hào khi có Phật Hoàng Trần Nhân Tông. Chiến tích của người Thầy - Cha - Ông thật lẫy lừng. \r\nNgàn năm con cháu mãi mãi mang ơn và ngưỡng vọng ông.', 'aa@sfd.com', 'Con Cháu', 1),
(25, 788, '2018-12-19 20:42:55', 'Lãnh đạo nhân dân đánh thắng quân Nguyên hùng mạnh, xuất hiện chữ Viết riêng của người Việt, phát triển nền tảng triết học Phật giáo Trúc Lâm Yên Tử, mọi lĩnh vực của đất nước từ văn hóa, kinh tế, quân sự, chính trị... đều phát triễn đến mức độ cao, rực rỡ. \r\nĐó là thời Trần, công của Phật Hoàng với dân tộc, con cháu lớn lắm.', 'as@dd.com', 'Thanh Niên', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `loaitin`
--
ALTER TABLE `loaitin`
  ADD PRIMARY KEY (`idLT`);

--
-- Chỉ mục cho bảng `tin`
--
ALTER TABLE `tin`
  ADD PRIMARY KEY (`idTin`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`);

--
-- Chỉ mục cho bảng `ykien`
--
ALTER TABLE `ykien`
  ADD PRIMARY KEY (`idYKien`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `loaitin`
--
ALTER TABLE `loaitin`
  MODIFY `idLT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT cho bảng `tin`
--
ALTER TABLE `tin`
  MODIFY `idTin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=812;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `ykien`
--
ALTER TABLE `ykien`
  MODIFY `idYKien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

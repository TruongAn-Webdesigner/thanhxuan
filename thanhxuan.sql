-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 02, 2021 lúc 10:45 AM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.4.11

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
-- Cấu trúc bảng cho bảng `thucpham`
--

CREATE TABLE `thucpham` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `protein` float NOT NULL COMMENT 'tỉ lệ 1g/ bao nhiêu',
  `fat` float NOT NULL COMMENT '	tỉ lệ 1g/ bao nhiêu	',
  `carb` float NOT NULL COMMENT '	tỉ lệ 1g/ bao nhiêu	',
  `calo` float NOT NULL COMMENT '	tỉ lệ 1g/ bao nhiêu	',
  `mota` text COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `anhien` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `thucpham`
--

INSERT INTO `thucpham` (`id`, `ten`, `protein`, `fat`, `carb`, `calo`, `mota`, `anhien`) VALUES
(1, 'Ức Gà Không Da', 0.231, 0.012, 0, 1.1, NULL, 1),
(2, 'Chuối vàng', 0.011, 0.003, 0.228, 0.89, NULL, 1),
(3, 'Khoai Lang', 0.016, 0.001, 0.201, 0.86, NULL, 1),
(4, 'Trái Ổi', 0.025, 0.009, 0.143, 0.68, NULL, 1),
(5, 'Bí Đỏ', 0.01, 0.001, 0.065, 0.26, NULL, 1),
(6, 'Bông Cải Xanh', 0.028, 0.004, 0.066, 0.34, NULL, 1),
(7, 'Thịt Lợn Tươi Sống ( Thịt Thăn, Nạc Thăn)', 0.209, 0.022, 0, 1.09, NULL, 1),
(8, 'Tôm Tép Tươi Sống', 0.16, 0.009, 0, 0.77, NULL, 1),
(9, 'Thịt Cá Ngừ Tươi', 0.234, 0.009, 0, 1.08, NULL, 1),
(10, 'Nạc Thăn Bò', 0.221, 0.041, 0, 1.31, NULL, 1),
(11, 'Ốc Tươi Sống', 0.161, 0.014, 0.02, 0.9, NULL, 1),
(12, 'Yến Mạch Nguyên Chất', 0.131, 0.065, 0.69, 3.79, NULL, 1),
(13, 'Gạo Lức Đã Nấu Chín', 0.026, 0.009, 0.23, 1.11, NULL, 1),
(14, 'Bánh Mỳ Trắng', 0.076, 0.033, 0.506, 2.66, NULL, 1),
(15, 'Xoài Chín', 0.005, 0.003, 0.17, 0.65, NULL, 1);

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
(1, 'vi', 'SẮC ĐẸP LÀ VŨ KHÍ QUYỀN LỰC CỦA PHỤ NỮ HIỆN ĐẠI', NULL, 'uploads/images/pexels-jasmin-chew-6121448.jpg', '2021-06-02', 0, 'SẮC ĐẸP LÀ VŨ KHÍ QUYỀN LỰC CỦA PHỤ NỮ HIỆN ĐẠIMột nhà văn đã nói “Đàn bà đẹp luôn có quà” như một minh chứng về người phụ nữ có nhan sắc sẽ hạnh phúc hơn, thành công hơn trong cuộc sống. Đã qua rồi cái thời chị em đầu tắt mặt tối, lo chuyện bếp núc&nbsp;mà chả màng quan tâm đến vẻ ngoài của mình. Thời nay phụ nữ ra ngoài làm việc, giao lưu tiếp xúc và tự khẳng định giá trị của mình cho nên PHỤ NỮ LÀ PHẢI ĐẸP.Vì phụ nữ đẹp luôn thu hút và nhận được sự chú ý, trân trọng, ưu ái của mọi người xung quanh. Bất kỳ chị em nào cũng có nét duyên riêng, vì vậy mà hãy biết cách giúp mình đẹp hơn, tự tin hơn. Đây cũng một yếu tố giúp bạn trở thành nam châm thu hút nhiều cơ hội, bao gồm cả cơ hội trong sự nghiệp cũng như trong tình yêu. Thậm chí, việc vợ làm đẹp còn là niềm tự hào cho các đấng lang quân vì “đàn ông giàu vì bạn sang vì vợ”Trong công việcTrong công việc bạn thường gặp phải những trường hợp người có kỹ năng kém hơn bạn nhưng vẫn được ưu ái và được trả lương cao hơn bạn. Bạn đã bao giờ tự hỏi rằng, tại sao? Rất nhiều trường hợp như thế xảy ra trong cuộc sống, và đa số nguyên nhân là do vẻ ngoài. Điều này không có nghĩa phụ nữ xấu sẽ không bao giờ có cơ hội, tuy nhiên, chắc chắn một điều rằng phụ nữ không biết làm đẹp cho bản thân sẽ luôn gặp khó khăn hơn.Trong cuộc sốngNgười ta vẫn thường nói “Tốt gỗ hơn tốt nước sơn”, tuy nhiên có một thực tế rằng rất ít người hoặc thậm chí là chẳng ai muốn để ý đến một món đồ mang vẻ ngoài kém bắt mắt dù thật sự chất lượng của nó rất tốt. Và một cô gái có vẻ ngoài xinh đẹp rạng rỡ bao giờ cũng thu hút và dễ dàng gây được ấn tượng, thiện cảm với người tiếp xúc, đặc biệt là trong mắt nam giới. Đấy chính là lý do tại sao phụ nữ không nên xem thường vũ khí sắc đẹp của mình.Không phải cô gái nào khi sinh ra cũng sở hữu nhan sắc trời phú và gặp nhiều thuận lợi trong công viêc lẫn trong cuộc sống. Do vậy, hãy tích cực chăm sóc cho vẻ ngoài nhiều hơn và bạn sẽ nhận ra quyền năng từ vũ khí sắc đẹp của chính bạn.Hoa hậu Việt Nam Hà Kiều Anh tâm sự: “Đối với phụ nữ thì làn da, vóc dáng là một tài sản quý giá. Với vai trò là một cựu Hoa hâu, là doanh nhân, tôi lại càng không thể lơ là việc giữ gìn nhan sắc của mình”.&nbsp;Bác sĩ phẫu thuật thẩm mỹ Phan Minh Hoàng (Bệnh viện quận 2) cho biết:&nbsp;“Tôi đã gặp nhiều phụ nữ thông minh, thành công trong sự nghiệp. Tuy nhiên, nhiều người trong số họ mải mê sự nghiệp, chăm sóc gia đình mà quên chăm chút bản thân nên tự làm mình trở nên kém hấp dẫn. Đây cũng là một trong số nguyên nhân làm tình cảm giữa những cặp đôi không còn nồng nàn nữa. Tôi luôn ủng hộ chuyện phụ nữ đi phẫu thuật thẩm mỹ để khắc phục khiếm khuyết vì điều đó sẽ giúp chị em đẹp hơn, tự tin hơn và hạnh phúc hơn. Quan trọng là các bạn phải biết tìm nơi uy tín để “chọn mặt gửi vàng”.&nbsp;Dr.Wang Jea Kwon – Trưởng khoa Phẫu thuật thẩm mỹ Oracle Hàn Quốc chia sẻ:&nbsp; “Sắc đẹp là chìa khóa thành công của phụ nữ. Có rất nhiều cách để giúp chị em xinh đẹp hơn, duyên dáng hơn. Đừng để thời gian lấy đi thanh xuân của bạn. Một người phụ nữ thành công khi hội tụ các yếu tố: sự nghiệp vững vàng, gia đình đầm ấm, cuộc sống hạnh phúc... và yếu tố không thể thiếu đó là sắc đẹp, biết làm đẹp”.&nbsp;Ngày xưa, phụ nữ chỉ cần “công dung ngôn hạnh” là hoàn hảo. Nhưng bây giờ, cấp độ “công dung ngôn hạnh” cao hơn nhiều. Vì thế, người phụ nữ cũng phải biết tự \"nâng cấp\" bản thân mình về vẻ đẹp. Đẹp từ tâm hồn, trí tuệ đến vẻ ngoài rạng rỡ. Làm đẹp sẽ giúp chị em luôn tỏa sáng, tự tin khẳng định giá trị bản thân và đó cũng thể hiện sự tôn trọng người khác trong các cuộc gặp mặt, giúp gây ấn tượng tốt hơn.', 1, 0, 0, 0, NULL, 0, 'user'),
(812, 'vi', 'Giá Trị Dinh Dưỡng Của Trái Chuối', NULL, 'uploads/images/320-chuoi-chien.jpg', '2021-06-02', 0, 'Giá Trị Dinh Dưỡng Của Trái ChuốiChuối là một loại trái cây thân thuộc trong giới thể hình và thể thao. Chuối chứa nhiều chất dinh dưỡng như xơ cao, vitamin C, kali và mangan dồi dào và một nguồn rất tốt của Vitamin B6. Bên cạnh đó chuối chứa ít Chất béo bão hòa , cholesterol và natri tốt cho tim mạch. Nhưng chuối lại chứa nhiều đường có calo cao&nbsp;THÀNH PHẦN DINH DƯỠNGKhối lượng liều dùng100gThành phần dinh dưỡng trong mỗi liềuNăng lượng 89Từ fat 2,8Nhu cầu hằng ngàyChất béo 0,3g0%- Béo bão hòa 0,1g0%- Trans fat~gCholesterol 0mg0%Chất bột đường 22,8g8%- Chất xơ 2,6 g10%- Đường 12g&nbsp;Protein 1,1g2%Vitamin A1%Vitamin C14%Canxi0%Sắt2%Chú ý: nhu cầu hằng ngày dựa trên tính toán 1 người cần 2000 calories 1 ngày, nhu cầu hằng ngày của bạn có thể cao hoặc thấp hơn tùy thuộc vào lượng calories bạn cần.', 3, 0, 0, 0, NULL, 0, 'user'),
(813, 'vi', 'Giá Trị Dinh Dưỡng Của Ức Gà Không Da', NULL, 'uploads/images/100g-ức-gà-chứa-bao-nhiêu-protein-và-thực-đơn-cho-người-giảm-cân.jpg', '2021-06-02', 0, 'Giá Trị Dinh Dưỡng Của Ức Gà Không DaỨc gà không da là một thực phẩm tốt và là một món ăn được dân gymer ưa chuộng nhất, Trong ức gà chứa rất một nguồn protein rất cao và ít chất béo bão hòa. Bên cạnh đó còn chứa nhiều phốt pho, Niacin , Vitamin B6 và Selen. Nhưng ức gà có một khuyết điểm nhỏ đó là cao Cholesterol.&nbsp;THÀNH PHẦN DINH DƯỠNGKhối lượng liều dùng100gThành phần dinh dưỡng trong mỗi liềuNăng lượng 110Từ fat 11,2Nhu cầu hằng ngàyChất béo 1,2g2%- Béo bão hòa 0,3g2%- Trans fat0gCholesterol 58mg19%Chất bột đường 0g0%- Chất xơ 0 g0%- Đường 0g&nbsp;Protein 23,1g46%Vitamin A0%Vitamin C2%Canxi1%Sắt4%Chú ý: nhu cầu hằng ngày dựa trên tính toán 1 người cần 2000 calories 1 ngày, nhu cầu hằng ngày của bạn có thể cao hoặc thấp hơn tùy thuộc vào lượng calories bạn cần.&nbsp;CÂN BẰNG DINH DƯỠNGNatri - Sodium 27%Béo bão hòa 18%Cholesterol 100%Vitamin A 0%Vitamin C 18%Vitamin D 0%Vitamin E 0%Vitamin K 0%Thiamin B1 64%Riboflavin B2 55%Niacin B3 100%Vitamin B6 100%Folate 9%Vitamin B12 64%Pantothenic Acid B5 73%Calcium - Canxi 9%Săt - Iron 36%Magie - Magnesium 64%Phốt pho - Phosphorus 100%Kali - Potassium 64%Kẽm - Zinc 45%Đồng - Copper 0%Mangan - Manganese 0%Selen - Selenium 100%Chất đạm - Protein 100%Chất xơ - Fiber 0%Điểm Số 44', 3, 0, 0, 0, NULL, 0, 'user'),
(817, 'vi', 'Thịt Lợn Tươi Sống ( Thịt Thăn, Nạc Thăn)', NULL, 'uploads/images/cach-phan-biet-cac-loai-thit-heo-ma-ban-co-the-chua-biet_800x500.jpg', '2021-06-02', 0, 'Thịt Lợn Tươi Sống ( Thịt Thăn, Nạc Thăn)Thịt nạc thăn heo rất thấp Natri, chứa nhiều của Riboflavin, Kali và kẽm, protein, Thiamin, Niacin, VitaminB6, Phốt Pho và Selenium, nhưng lại chứa nhiều cholesterol&nbsp;THÀNH PHẦN DINH DƯỠNGKhối lượng liều dùng100gThành phần dinh dưỡng trong mỗi liềuNăng lượng 109Từ fat 19,6Nhu cầu hằng ngàyChất béo 2,2g3%- Béo bão hòa 0,7g3%- Trans fat0gCholesterol 65mg22%Chất bột đường 0g0%- Chất xơ 0 g0%- Đường 0g&nbsp;Protein 20,9g42%Vitamin A0%Vitamin C0%Canxi0%Sắt6%Chú ý: nhu cầu hằng ngày dựa trên tính toán 1 người cần 2000 calories 1 ngày, nhu cầu hằng ngày của bạn có thể cao hoặc thấp hơn tùy thuộc vào lượng calories bạn cần.Hàm Lượng Protein Trong Thịt Nạc HeoVới Thịt Nạc Heo chắc có lẽ các bạn cũng ăn rất nhiều rồi, theo như phân tích dinh dưỡng của ThehinhOnline trên đường link cho chúng ta kết quả về hàm lượng protein của Thịt Nạc Heo là 20,9g Protein.Chất Lượng Của Protein Từ Thịt Nạc Heo20,9g protein quả là con số không hề nhỏ nhưng liệu chất lượng của nó có tốt hay không?Trước tiên, chúng ta phải đánh giá Chất Lượng Protein qua 3 yếu tố, trong 100g Thịt Nạc Heo tươi sống có:Thịt Nạc Heo Nhìn Ngon Và Bổ Nhưng Gymer Hãy Cẩn Thận!!!Các chỉ số trên cho chúng ta thấy rằng nguồn protein từ Thịt Nạc rất là tốt để bổ sung vào chế độ dinh dưỡng tăng cơ hằng ngày. Tuy nhiên, khi các bạn mua thịt nạc heo về, khi các bạn cắt thịt ra để chiên hoặc luộc, xào thì đều thấy xen kẽ những sợi mỡ động vật ở bên trong thịt. Và Fat từ 100g Thịt Nạc Heo là 2,2g.Thật đáng tiếc, 2,2g Fat này là mỡ động vật, mà đã là mỡ động vật thì chủ yếu chứa Chất Béo Bão Hòa. Đây là loại Chất Béo xấu, không tốt cho sức khỏe và khi vào cơ thể sẽ làm tăng lượng Cholesterol trong máu lên, về lâu dài sẽ mắc bệnh về huyết áp, tim mạch .Đáng sợ hơn nữa là hàm lượng Cholesterol của 100g Thịt Nạc Heo là 65mg. Đây là chỉ số rất cao và cũng chính là nhược điểm của Thịt Nạc Heo. Cho nên về mặt giá trị về sức khỏe thì không nên ăn nhiều.Bên cạnh đó, Thịt Nạc Heo cũng có chứa Omega 3 và Omega 6, tuy nhiên tỉ lệ Omega này vẫn chưa lí tưởng.Thực Phẩm Bổ Sung Thay Thế, Ít CholesterolTóm lại, Thịt Nạc Heo trên khía cạnh hàm lượng Protein có thể giúp các gymer phát triển cơ bắp, không may thay về khía cạnh cholesterol, chất béo bão hòa có trong Thịt Nạc Heo thì không tốt cho sức khỏe. Nếu các bạn muốn bổ sung một lượng protein cao để tăng cơ từ các thực phẩm tự nhiên bên ngoài mà không dùng thực phẩm bổ sung thì phải chấp nhận hàm lượng cholesterol. Trong khi đó các bạn nên tham khảo những loại thực phẩm bổ sung thay thế như ISO 100 mang lại cho bạn 25g protein, trong 25g này chỉ có 5mg cholesterol thôi hoặc Elite Casein cũng mang lại 25g protein và kèm theo 10mg cholesterol.Một ngày ở TheHinhOnline có rất nhiều bạn tới đo máy InBody và hầu hết các bạn đó cần 120g protein để tăng cơ. Giả sử như với lượng protein đó, bạn ăn Thịt Nạc Heo thì phải cần tới 600g Thịt Nạc Heo mới cho ra 120g protein và đồng thời là 390mg cholesterol, đây là lượng cholesterol rất cao so với khuyến nghị của tổ chức Y Tế Thế Giới. Cho nên bạn cũng nên cân nhắc tới việc sử dụng Thực Phẩm Bổ Sung để vừa đảm bảo được giá trị tăng cơ bắp và vừa đảm bảo luôn cả sức khỏe.Vitamin Khoáng Chất Có Trong Thịt Nạc HeoNgoài ra, trong Thịt Nạc Heo cũng chứa nhiều vitamin nhóm B tương đối cao. Nhóm Vitamin B này giúp chúng ta tập trung hơn trong khi tập và khi bổ sung đầy đủ thì nó sẽ thúc đẩy chuyển hóa Carb, Fat, Protein thành Glucose để cho chúng ta hoạt động cơ bắp. Và chỉ số cân bằng về vitamin, khoáng chất trong Thịt Nạc Heo là 53, đây cũng không phải là kết quả cao, tuy nhiên nếu muốn ăn đầy đủ lượng vitamin khoáng chất thì với thực phẩm tự nhiên, các bạn ăn không bao giờ là đủ cho nên các bạn cũng có thể sử dụng thêm Thực Phẩm Bổ Sung Vitamin, Khoáng Chất để cung cấp đủ cho chúng ta.Chương trình hôm nay với chủ đề là Giá Trị Dinh Dưỡng của Thịt Nạc Heo cũng xin phép dừng lại ở đây và Hương cũng tin rằng các bạn có thể hiểu được những giá trị dinh dưỡng của thịt nạc để có thể thiết lập được một chế độ dinh dưỡng tập thể hình hay ăn kiêng phù hợp để mang lại cho chúng ta sức khỏe.', 3, 0, 0, 0, NULL, 0, 'user'),
(818, 'vi', 'Body shaming là gì? Con dao “vô hình” giết người bằng lời nói', NULL, 'uploads/images/body-shaming-là-gì-0.png', '2021-06-02', 0, 'Body shaming là một thuật ngữ vô cùng đáng sợ đối với nhiều người. Những ai đã từng là nạn nhân của nạn body shaming thì đều hiểu hành động này có thể dẫn đến hậu quả nặng nề đến nhường nào. Tuy nhiên tại Việt Nam thì thuật ngữ này còn tương đối mới mẻ và nhiều bạn còn chưa hiểu body shaming là gì. Mời các bạn theo dõi bài viết dưới đây của Thợ sửa xe để có cái nhìn rõ hơn nhé!&nbsp;Body shaming là gì?Body shaming là một thuật ngữ Tiếng Anh mà nếu dịch xuôi sang Tiếng Việt thì sẽ có nghĩa là để ám chỉ hành vi “miệt thị ngoại hình”. Nếu nói đến hành vi miệt thị về ngoại hình của một ai đó thì bạn sẽ dễ dàng bắt gặp chúng tại bất cứ quốc gia nào, bất cứ đâu chứ không chỉ riêng Việt Nam.&nbsp;Body shaming là gì?Đây là hành động dùng ngôn ngữ để chê bai, phán xét, bình luận một cách ác ý về vẻ ngoài của người khác. Những ngôn từ xấu xí ấy sẽ khiến cho người nghe cảm thấy không thoải mái, cực kỳ khó chịu, bị xúc phạm và tổn thương rất nhiều.Ngoài ra, body shaming đôi khi còn tồn tại ở dạng suy nghĩ tự miệt thị chính mình khi cảm thấy bản thân không theo kịp những xu hướng, chuẩn mực về nét đẹp của xã hội hiện tại. Hiện tượng này thường xảy ra ở những người có tính cách hướng nội, rụt rè, tự ti.Body shaming viết tắt là gì?Nhiều người nhầm tưởng BDSM chính là viết tắt của body shaming nhưng thực chất 2 từ này có nghĩa hoàn toàn khác nhau. Phải hết sức chú ý để không sử dụng sai hoàn cảnh các bạn nhé!Hiện tại thì body shaming không có từ viết tắt còn BDSM là từ viết tắt của các cặp từ trong tiếng Anh để chỉ mối quan hệ của những người cùng tham gia một hoạt động t.ì.n.h d.ụ.c.&nbsp;&nbsp;Có thể hiểu đơn giản thì BDSM chính hành động bạo d.â.m, khổ d.â.m và các hành vi t.ì.n.h d.ụ.c không được bình thường. Nó thường gây ra đau đớn cho đối phương hoặc chính bản thân của người đó.Có những kiểu body shaming nào phổ biến hiện nay?Sự miệt thị về ngoại hình của ai đó tồn tại ở nhiều dạng nhưng trong đó phải kể đến các loại body shaming phổ biến nhất hiện nay như: Miệt thị thân hình, miệt thị về làn da, miệt thị về màu da,…Trong đó phổ biến nhất là fat-shaming hay nói cách khác chính là miệt thị cân nặng của người khác như bị chê bai vì thừa cân, quá gầy hay béo phì nặng.Ngoài body shaming thì face shaming cũng là 1 hành vi xấu không kém. Đây là trường hợp 1 người nào đó bị chê bai, chế giễu về những đặc điểm trên khuôn mặt như quá xấu, mặt mọc nhiều mụn, da mặt đen, mũi to, môi thâm,… Từ đó tạo ra sự mặc cảm và tình trạng suy sụp tinh thân ở người bị chỉ trích.Thực trạng body shaming ở Việt NamNguyên nhân body shamingTại sao lại xuất hiện hành vi xấu xí mang tên “miệt thị ngoại hình”? Để có thể giải thích một cách rõ ràng thì rất khó vì hành động được tạo nên bởi nhiều yếu tố mà quan trọng nhất đó là do tiêu chuẩn xã hội ngày nay.Nhiều người nói vui rằng “đẹp là một loại tài năng” nhưng thực sự thì nó đúng là vậy thật. Xã hội ngày càng phát triển thì người ta sẽ đánh giá một người qua vẻ ngoài trước tiên.&nbsp;Một bạn trẻ thuyết trình về body shaming và nguyên nhân của thực trạng nàyHọ đánh giá những người khác, dùng lời lẽ không hay để bình phẩm về thân hình của người khác và rồi nói rằng chỉ là đùa cho vui thôi. Thế nhưng đó là để thỏa mãn thói soi mói xấu tính vô duyên của bản thân. Coi những người có khiếm khuyết về thân hình là đồ chơi để tiêu khiển và họ vui là được.Body shaming hậu quả không lường trướcNgười phải nhận những lời miệt thị đó sẽ dễ dàng cảm thấy bị tổn thương, mặc cảm bản thân và thậm chí là gây ra ảnh hưởng lớn đến sức khỏe. Họ sẽ tìm mọi phương pháp để đạt được cân nặng và ngoại hình như mong muốn thông qua việc nhịn ăn, uống thuốc giảm cân… Cụ thể, dưới đây sẽ là một số tác hại dễ thấy khi bị body shaming quá đáng.Cảm thấy tự ti, không tự tinCó lẽ đây là tác hại dễ nhận thấy nhất của người bị chê bai về ngoại hình. Bản thân họ không thể gạt bỏ được tâm trạng tụt dốc không phanh khi bị người khác chỉ trích bản thân. Về lâu về dài thì sinh ra sự sự tự ti và mặc cảm không thể nói.&nbsp;Body shaming tác hại nặng nề lên nạn nhânCó thể họ đang từ 1 người đang rất vui vẻ, hòa đồng tràn đầy sức sống nhưng chỉ trong phút chốc có thể trở thành một kẻ nhút nhát và luôn né tránh những người xung quanh vì nghĩ bản thân mình không đủ hoàn hảo để đối diện với mọi người.Làm đẹp bằng bất cứ giá nàoKhi bị miệt thị về ngoại hình thì những người này thường có xu hướng “mất kiểm soát” mà áp dụng những biện pháp làm đẹp không an toàn hay nói cách khác là phản khoa học chỉ với mục đích là làm sao có thể nhanh chóng lấy lại được vóc dáng, cân nặng hay làn da láng mịn như mong muốn bất chấp rằng những phương pháp làm đẹp này có thể tiềm ẩn những nguy hiểm gây hại đến sức khỏe.Tinh thần bị suy sụpNhững nạn nhân của body shaming sẽ chỉ cảm thấy hơi buồn 1 chút thôi trong thời gian đầu nhưng nếu những lời miệt thị này tăng dần theo thời gian, liên tục thì sẽ khiến họ bị ám ảnh, tinh thần suy sụp nghiêm trọng. Đáng sợ hơn, họ có thể rơi vào trầm cảm nặng không thoát ra được và tìm đến cái chết để chạy trốn tất cả.Thực trạng body shaming ở Việt NamỞ Việt Nam, thực trạng body shaming không chỉ diễn ra hàng ngày, thậm chí ngày càng có nhiều những ngôi sao nổi tiếng bị chỉ trích vô cùng nặng nề về ngoại hình. Đặc biệt là ở vòng chung kết của chương trình Vietnam’s next top model, chỉ vì cơ thể quá gầy mà thí sinh Cao Ngân đã liên tục bị cư dân mạng chế ảnh và chế giễu là “bộ hài cốt di động” hay “bộ trưởng bộ hài cốt”.Hành vi body shaming giết người bằng lời nói như thế nào?&nbsp;Không cần lấy ví dụ đâu xa, sau khi nam diễn viên nổi tiếng với bộ phim siêu anh hùng “Black Panther” Chadwick Boseman ra đi, người ta mới nhận ra rằng trong những năm tháng cuối cùng của cuộc đời anh đã phải đối mặt với nạn body shaming không thể tưởng tượng được của cộng đồng mạng.&nbsp;Vào hồi tháng 5/2020 cánh săn ảnh đã ghi lại được hình ảnh anh đang chống gậy, thân hình gầy gò bước đi ngoài phố. Tấm ảnh này đã nhanh chóng thu hút sự chú ý từ mọi người.Chadwick Boseman đã phải nhận những bình luận body shamingNhiều cư dân mạng suy diễn rằng đó là hậu quả do Chadwick đã nghiện ngập và sử dụng ma tuý quá nhiều, thậm chí có người còn cho rằng đàn ông nếu quá nhỏ bé hay còi cọc là 1 điều đáng xấu hổ. Họ chỉ chăm chăm vào chỉ trích mà chẳng&nbsp; mấy ai tỏ ra lo lắng cho sức khoẻ của cố diễn viên. Và cũng chẳng ai biết rằng anh đang phải 1 mình âm thầm chiến đấu với căn bệnh ung thư một cách đau đớn trong nhiều năm qua.Không ai biết rằng liệu Chadwick có lên mạng và đọc được những lời bình luận này không? Nếu anh đã đọc thì chắc hẳn những lời nói ấy đã giết chết tâm hồn anh trước khi anh không còn sống trên cõi đời này.Body shaming phạt bao nhiêu tiền?Theo điều 20 của Hiến pháp 2013 thì ai cũng có quyền được bảo vệ thân thể cá nhân của mình trước hành vi là lời nói từ người khác.Chính vì thế, tất cả người dân, không ai được phép tra tấn hoặc dùng những lời nói khó nghe để miệt thị cơ thể, nhân phẩm của đối phương, dù đó là bạn bè hay người thân.Hãy suy nghĩ thật kỹ trước khi phát ngôn bất cứ điều gìTrên tinh thần này, ở mức xử lý hành chính, những ai có lời nói miệt thị người khác, chê bai ngoại hình sẽ bị phạt tiền. Trường hợp nhẹ là từ 100 đến 300 nghìn đồng. Tuy nhiên, với những trường hợp gây tổn thương ở mức nghiêm trọng và để xảy ra các hậu quả xấu như điên loạn, tự tử thì người miệt thị phải chịu phạt lên tới 30 triệu đồng. Đồng thời, nếu xét trên khung thi hành hình sự thì người phạm tội cực kỳ nghiêm trọng sẽ có nguy cơ phạt tù từ 1 đến 5 năm.Làm thế nào để vượt qua nỗi ám ảnh body shaming?Nếu là nạn nhân của body shaming thì đừng để bản thân chìm sâu vào ảm ảnh mà hãy tìm cách để vượt qua nó và bảo vệ chính bản thân mình.&nbsp;Ý thức được rằng “không phải ai cũng là hoàn hảo”Chẳng ai trên thế giới này là hoàn hảo cả và mỗi người sẽ đẹp theo một cách riêng biệt không ai giống ai. Biết đâu, chính những người chê bai bạn cũng lại tự ti về một mặt nào đó của bản thân. Thay vì lo lắng với những khiếm khuyết của mình thì hãy mạnh dạn lên và tự hào về những nét đẹp mà chỉ bạn mới có và thể hiện nó để mọi người cùng thấy.Tự học cách chăm sóc tốt hơn cho bản thânMặc dù điều số 1 là rất đúng đắn nhưng trên thực tế ai trong chúng ta cũng rất khó có thể bỏ ngoài tai những lời chê bai, chỉ trích về ngoại hình. Tuy nhiên nếu bạn có thể học được cách tự chăm sóc bản thân mình tốt hơn và yêu thương bản thân mình hơn thì việc chấp nhận những lời nói tiêu cực đó sẽ nhẹ nhàng hơn rất nhiều đó.Hãy tự yêu lấy mình các bạn nhéThể hiện rõ ràng cảm xúc của bạnBody shaming là một hành động xấu và nó không nên được núp bóng dưới dạng những lời trêu đùa. Bạn hoàn toàn có quyền cất lên tiếng nói yêu cầu người kia dừng hành động chê bai ngoại hình của mình nếu cảm thấy khó chịu.Mỗi người sinh ra đều là một bản thể duy nhất và không có một quy chuẩn nào cho ai, không ai muốn làm bản sao của ai cả. Chính vì thế, body shaming không nên được tồn tại. Chúng ta hãy dừng ngay việc body shaming người khác, cho dù ở bất cứ hoàn cảnh nào đi chăng nữa.&nbsp;Như vậy trên đây là những thông tin giúp bạn đọc hiểu hơn body shaming là gì cũng như thực trạng body shaming tại Việt Nam. Những hành động “miệt thị ngoại hình” của người khác có thể gây ảnh hưởng xấu đến sức khỏe và tâm lý của người bị chỉ trích nên hãy cân nhắc thật kỹ khi đưa ra bất cứ nhận xét nào của mình về ngoại hình của người khác nhé.&nbsp;', 1, 0, 0, 0, NULL, 0, 'user');

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
(1, 'admin', '123456', 1, 0, ''),
(2, 'khai637116', '123456', 0, 123456, 'admin@gmail.com'),
(3, 'user', '123456', 0, 0, '');

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
-- Chỉ mục cho bảng `thucpham`
--
ALTER TABLE `thucpham`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT cho bảng `thucpham`
--
ALTER TABLE `thucpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `tin`
--
ALTER TABLE `tin`
  MODIFY `idTin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=820;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `ykien`
--
ALTER TABLE `ykien`
  MODIFY `idYKien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

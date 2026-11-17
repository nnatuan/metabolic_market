-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th10 30, 2026 lúc 02:26 PM
-- Phiên bản máy phục vụ: 10.5.29-MariaDB
-- Phiên bản PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `demo`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `metabolic_market_tarticle`
--

CREATE TABLE `metabolic_market_tarticle` (
  `nid` int(11) NOT NULL,
  `nid_type` int(11) DEFAULT NULL,
  `ctitle` varchar(500) DEFAULT NULL,
  `ctag` varchar(400) NOT NULL,
  `eng_ctitle` varchar(500) DEFAULT NULL,
  `alwcmt` char(1) DEFAULT NULL,
  `cshort_content` text DEFAULT NULL,
  `eng_cshort_content` text DEFAULT NULL,
  `ccontent` text DEFAULT NULL,
  `eng_ccontent` text DEFAULT NULL,
  `cimage_thumb` varchar(200) DEFAULT NULL,
  `ctype` char(1) DEFAULT NULL,
  `nstatus` int(11) DEFAULT NULL,
  `cishome` char(1) DEFAULT NULL,
  `cno_delete` int(11) DEFAULT NULL,
  `cindex` char(4) DEFAULT NULL,
  `cnote` text DEFAULT NULL,
  `niduser01` int(11) DEFAULT NULL,
  `niduser02` int(11) DEFAULT NULL,
  `ddate01` date DEFAULT NULL,
  `ddate02` date DEFAULT NULL,
  `dtime02` time DEFAULT NULL,
  `dtime01` time DEFAULT NULL,
  `cproduct` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `metabolic_market_tbanner_images`
--

CREATE TABLE `metabolic_market_tbanner_images` (
  `ccode` varchar(50) DEFAULT NULL,
  `cbanner_images` varchar(250) DEFAULT NULL,
  `ctag` text DEFAULT NULL,
  `cimage` varchar(100) DEFAULT NULL,
  `cnote` longtext DEFAULT NULL,
  `nstatus` int(11) DEFAULT NULL,
  `cindex` char(4) DEFAULT NULL,
  `niduser01` int(11) DEFAULT NULL,
  `niduser02` int(11) DEFAULT NULL,
  `ddate01` date DEFAULT NULL,
  `ddate02` date DEFAULT NULL,
  `cview` varchar(100) DEFAULT NULL,
  `nid_loc_banner` int(11) DEFAULT NULL,
  `cimage_mobile` varchar(250) DEFAULT NULL,
  `nid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `metabolic_market_tbrand_products`
--

CREATE TABLE `metabolic_market_tbrand_products` (
  `nid` int(11) NOT NULL,
  `nid_material_products` int(11) DEFAULT NULL,
  `nid_cat_products` int(11) DEFAULT NULL,
  `ccode` varchar(50) DEFAULT NULL,
  `cbrand_products` varchar(250) DEFAULT NULL,
  `ctag` varchar(500) DEFAULT NULL,
  `cimage` varchar(100) DEFAULT NULL,
  `cnote` text DEFAULT NULL,
  `nstatus` int(11) DEFAULT NULL,
  `cindex` int(11) DEFAULT NULL,
  `niduser01` int(11) DEFAULT NULL,
  `niduser02` int(11) DEFAULT NULL,
  `ddate01` date DEFAULT NULL,
  `ddate02` date DEFAULT NULL,
  `cbanner` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `metabolic_market_tcat_news`
--

CREATE TABLE `metabolic_market_tcat_news` (
  `nid` int(11) NOT NULL,
  `nid_section_news` int(11) DEFAULT NULL,
  `ccode` varchar(50) DEFAULT NULL,
  `ccat_news` varchar(250) DEFAULT NULL,
  `ctag` varchar(500) DEFAULT NULL,
  `nspecial` char(4) DEFAULT NULL,
  `cimage` varchar(100) DEFAULT NULL,
  `cnote` text DEFAULT NULL,
  `nstatus` int(11) DEFAULT NULL,
  `cindex` char(4) DEFAULT NULL,
  `niduser01` int(11) DEFAULT NULL,
  `niduser02` int(11) DEFAULT NULL,
  `ddate01` date DEFAULT NULL,
  `ddate02` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `metabolic_market_tcat_products`
--

CREATE TABLE `metabolic_market_tcat_products` (
  `nid` int(11) NOT NULL,
  `nid_material_products` int(11) DEFAULT NULL,
  `ccode` varchar(100) DEFAULT NULL,
  `ccat_products` varchar(250) DEFAULT NULL,
  `eng_ccat_products` varchar(250) DEFAULT NULL,
  `ctag` varchar(500) DEFAULT NULL,
  `cimage` varchar(100) DEFAULT NULL,
  `cnote` text DEFAULT NULL,
  `nstatus` int(11) DEFAULT 1,
  `cindex` int(11) DEFAULT NULL,
  `niduser01` int(11) DEFAULT 1,
  `niduser02` int(11) DEFAULT NULL,
  `ddate01` date DEFAULT '2026-09-16',
  `ddate02` date DEFAULT NULL,
  `cproduct_fb` varchar(250) DEFAULT NULL,
  `fb_cdescription` text DEFAULT NULL,
  `nspecial` char(1) DEFAULT NULL,
  `cbanner1` varchar(200) DEFAULT NULL,
  `cbanner2` varchar(200) DEFAULT NULL,
  `cbanner3` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `metabolic_market_tclinical_tiers`
--

CREATE TABLE `metabolic_market_tclinical_tiers` (
  `nid` int(11) NOT NULL,
  `ccode` varchar(50) NOT NULL COMMENT 'AVAILABLE, CURATED, CLINICALLY_RECOMMENDED',
  `ctitle` varchar(150) NOT NULL COMMENT 'Tên cấp độ',
  `cbadge_text` varchar(100) NOT NULL COMMENT 'Nhãn hiển thị trên SKU',
  `cbadge_color` varchar(50) NOT NULL DEFAULT 'green' COMMENT 'Màu sắc định danh: emerald, amber, sky',
  `capproval_body` varchar(250) NOT NULL COMMENT 'Hội đồng phê duyệt: Commercial + Compliance / Medical + Commercial / Treating Clinician',
  `ccriteria` text NOT NULL COMMENT 'Tiêu chuẩn thẩm định',
  `cguardrail_notice` text NOT NULL COMMENT 'Cảnh báo y khoa ràng buộc',
  `norder` int(11) NOT NULL DEFAULT 1,
  `nstatus` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Phân cấp quản trị y tế cho sản phẩm thương mại' ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `metabolic_market_tclinical_tiers`
--

INSERT INTO `metabolic_market_tclinical_tiers` (`nid`, `ccode`, `ctitle`, `cbadge_text`, `cbadge_color`, `capproval_body`, `ccriteria`, `cguardrail_notice`, `norder`, `nstatus`) VALUES
(1, 'AVAILABLE', 'Đủ điều kiện bán lẻ', 'AVAILABLE', 'sky', 'Commercial + Compliance', 'Đầy đủ hồ sơ pháp lý, công bố Bộ Y Tế, tem nhãn phụ, nguồn gốc xuất xứ rõ ràng và hạn sử dụng an toàn.', 'Sản phẩm lưu hành thương mại, bệnh nhân tự chọn theo nhu cầu hỗ trợ cá nhân.', 1, 1),
(2, 'CURATED', 'Gọn Khoẻ Curated', 'GỌN KHOẺ CURATED', 'emerald', 'Medical + Commercial', 'Đã qua Hội đồng Y khoa Gọn Khoẻ thẩm định chuyên sâu về tính an toàn, chất lượng nguyên liệu, độ tinh khiết và mức độ tương thích chuyển hóa.', 'Sản phẩm được tuyển chọn hỗ trợ lối sống, không tự ý thay đổi thuốc điều trị.', 2, 1),
(3, 'CLINICALLY_RECOMMENDED', 'Bác sĩ chỉ định theo phác đồ', 'CLINICALLY RECOMMENDED', 'amber', 'Treating Clinician / Medical Director', 'Chỉ định riêng biệt cho từng ca bệnh hoặc phân nhóm pathway điều trị cụ thể sau khi có kết quả khám & xét nghiệm.', 'Chỉ sử dụng khi có sự hướng dẫn và giám sát trực tiếp từ Bác sĩ điều trị.', 3, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `metabolic_market_tcolor`
--

CREATE TABLE `metabolic_market_tcolor` (
  `nid` int(11) NOT NULL,
  `nid_product` int(11) DEFAULT NULL,
  `cname` varchar(200) DEFAULT NULL,
  `fprice` float(12,0) DEFAULT NULL,
  `fprice_sale` float(12,0) DEFAULT NULL,
  `nstatus` int(11) DEFAULT NULL,
  `cindex` int(11) DEFAULT NULL,
  `niduser01` int(11) DEFAULT NULL,
  `niduser02` int(11) DEFAULT NULL,
  `ddate01` date DEFAULT NULL,
  `ddate02` date DEFAULT NULL,
  `ccode_color` varchar(50) DEFAULT NULL,
  `cdescription` text DEFAULT NULL,
  `nremain` int(11) DEFAULT NULL,
  `cbarcode` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `metabolic_market_tconfig`
--

CREATE TABLE `metabolic_market_tconfig` (
  `nid` int(11) NOT NULL,
  `ccode` varchar(50) DEFAULT NULL,
  `cname` varchar(50) DEFAULT NULL,
  `cvalue` varchar(500) DEFAULT NULL,
  `cnote` varchar(25) DEFAULT NULL,
  `niduser01` int(11) DEFAULT NULL,
  `niduser02` int(11) DEFAULT NULL,
  `ddate01` datetime DEFAULT NULL,
  `ddate02` datetime DEFAULT NULL,
  `cimage` varchar(500) DEFAULT NULL,
  `nstatus` int(11) DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `metabolic_market_tconfig`
--

INSERT INTO `metabolic_market_tconfig` (`nid`, `ccode`, `cname`, `cvalue`, `cnote`, `niduser01`, `niduser02`, `ddate01`, `ddate02`, `cimage`, `nstatus`) VALUES
(1, '123', 'email contact page', 'info@qcare.com.vn', '', 713, 1, '2024-06-24 00:00:00', '2026-10-30 00:00:00', NULL, 1),
(2, 'fds', 'meta keyword global', 'metabolic_market', '', 741, 1, '2010-01-30 00:00:00', '2026-10-27 00:00:00', NULL, 1),
(3, 'gfd', 'title global', 'Gọn Khoẻ by Qcare – Trung tâm Giảm cân & Sức khỏe Chuyển hóa', '', 741, 1, '2010-01-23 00:00:00', '2026-10-27 00:00:00', NULL, 1),
(4, NULL, 'meta description global', 'Metabolic Market by Gọn Khoẻ – Curated Clinical Marketplace cho sức khỏe chuyển hóa và kiểm soát cân nặng bền vững.', '', 746, 1, '2011-05-18 00:00:00', '2026-10-27 00:00:00', NULL, 1),
(7, NULL, 'Image FB', 'Image FB', '', 1, 1, '2020-11-13 00:00:00', '2026-10-27 00:00:00', 'main_20261027055449.webp', 1),
(8, NULL, 'Image logo', 'Image logo', '', 1, 1, '2021-07-09 00:00:00', '2026-10-27 00:00:00', 'logo_20261027054725.webp', 1),
(9, NULL, 'Link FB', 'https://www.facebook.com/', '', 1, 1, '2021-08-24 00:00:00', '2025-04-03 00:00:00', '', 1),
(11, NULL, 'Link GG', '#', '', 1, 1, '2021-08-24 00:00:00', '2024-06-24 00:00:00', '', 1),
(12, NULL, 'Hotline', '035.353.8887', '', 1, 1, '2021-09-13 00:00:00', '2026-10-30 00:00:00', '', 1),
(14, NULL, 'Link Shopee', '#', '', 1, 1, '2021-09-14 00:00:00', '2024-06-24 00:00:00', '', 1),
(15, NULL, 'Link Tiktok', '#', '', 1, 1, '2022-10-27 00:00:00', '2024-06-24 00:00:00', '', 1),
(16, NULL, 'Link Lazada', '#', '', 1, 1, '2023-04-24 00:00:00', '2024-06-24 00:00:00', '', 1),
(17, NULL, 'Link chat Zalo', 'https://zalo.me/0353538887', '', 1, 1, '2023-04-25 00:00:00', '2026-10-30 00:00:00', '', 1),
(19, NULL, 'Chat Messenger', '#', '', 1, 1, '2024-06-24 00:00:00', '2026-01-25 00:00:00', '3336_20260125072526.php', 1),
(20, NULL, 'Địa chỉ', 'Số 1/05 Đường 0, Garden Court 2, Phường Tân Hưng, TP.HCM', '', 1, 1, '2024-06-27 00:00:00', '2026-10-30 00:00:00', '', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `metabolic_market_tcookie`
--

CREATE TABLE `metabolic_market_tcookie` (
  `nid` int(11) NOT NULL,
  `cid_session` varchar(50) DEFAULT NULL,
  `nid_user` int(11) DEFAULT NULL,
  `ckey` varchar(100) DEFAULT NULL,
  `cvalue` varchar(250) DEFAULT NULL,
  `cstatus` char(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `metabolic_market_tcookie`
--

INSERT INTO `metabolic_market_tcookie` (`nid`, `cid_session`, `nid_user`, `ckey`, `cvalue`, `cstatus`) VALUES
(1, '2026_10_27_1793075436', 1, 'cookie_config_listview_m_orderby_clause', 'nid', '1'),
(2, '2026_10_27_1793075436', 1, 'cookie_config_listview_m_orderby_sort', 'asc', '1'),
(3, '2026_10_27_1793075436', 1, 'cookie_config_listview_txt_current_page', '1', '1'),
(4, '2026_10_27_1793075436', 1, 'cookie_module_listview_m_orderby_clause', 'nid', '1'),
(5, '2026_10_27_1793075436', 1, 'cookie_module_listview_m_orderby_sort', 'asc', '1'),
(6, '2026_10_27_1793075436', 1, 'cookie_module_listview_txt_current_page', '0', '1'),
(7, '2026_10_27_1793075436', 1, 'cookie_banner_images_listview_m_orderby_clause', 'nid', '1'),
(8, '2026_10_27_1793075436', 1, 'cookie_banner_images_listview_m_orderby_sort', 'asc', '1'),
(9, '2026_10_27_1793075436', 1, 'cookie_banner_images_listview_txt_current_page', '0', '1'),
(10, '2026_10_27_1793075436', 1, 'cookie_news_listview_m_orderby_clause', 'nid', '1'),
(11, '2026_10_27_1793075436', 1, 'cookie_news_listview_m_orderby_sort', 'asc', '1'),
(12, '2026_10_27_1793075436', 1, 'cookie_news_listview_txt_current_page', '0', '1'),
(13, '2026_10_27_1793075436', 1, 'cookie_product_listview_m_orderby_clause', 'cproducts', '1'),
(14, '2026_10_27_1793075436', 1, 'cookie_product_listview_m_orderby_sort', 'asc', '1'),
(15, '2026_10_27_1793075436', 1, 'cookie_product_listview_m_current_page', '0', '1'),
(16, '2026_10_27_1793075436', 1, 'nid_gallery_img', '35', '1'),
(17, '2026_10_27_1793075436', 1, 'cookie_material_product_listview_m_orderby_clause', 'nid', '1'),
(18, '2026_10_27_1793075436', 1, 'cookie_material_product_listview_m_orderby_sort', 'asc', '1'),
(19, '2026_10_27_1793075436', 1, 'cookie_material_product_listview_txt_current_page', '0', '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `metabolic_market_tcurated_products`
--

CREATE TABLE `metabolic_market_tcurated_products` (
  `nid` int(11) NOT NULL,
  `ccode` varchar(100) NOT NULL COMMENT 'Mã SKU',
  `cname` varchar(250) NOT NULL COMMENT 'Tên sản phẩm',
  `cstage_code` varchar(50) NOT NULL COMMENT 'CHECK, LOSE, REMIT, KEEP',
  `ctier_code` varchar(50) NOT NULL COMMENT 'AVAILABLE, CURATED, CLINICALLY_RECOMMENDED',
  `cbrand_name` varchar(150) NOT NULL COMMENT 'Thương hiệu đối tác',
  `ccategory` varchar(150) NOT NULL COMMENT 'Ngành hàng phân loại',
  `fprice` decimal(12,0) NOT NULL COMMENT 'Giá bán niêm yết (VNĐ)',
  `fprice_sale` decimal(12,0) DEFAULT 0 COMMENT 'Giá ưu đãi bệnh nhân Gọn Khoẻ (VNĐ)',
  `cjob_to_be_done` text NOT NULL COMMENT 'Lợi ích lâm sàng & công năng thực tế',
  `cmedical_guardrail` text NOT NULL COMMENT 'Miễn trừ y khoa & lưu ý sử dụng',
  `cfeatures` text DEFAULT NULL COMMENT 'Quy cách, thông số, nguồn gốc xuất xứ',
  `cimage` varchar(255) DEFAULT NULL COMMENT 'Hình ảnh minh họa',
  `cstock_badge` varchar(100) DEFAULT 'Sẵn hàng tại phòng khám' COMMENT 'Tình trạng kệ',
  `is_featured` tinyint(1) DEFAULT 0 COMMENT '1: Sản phẩm nổi bật',
  `nstatus` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Danh mục SKU tuyển chọn chuyên sâu cho sức khỏe chuyển hóa' ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `metabolic_market_tcurated_products`
--

INSERT INTO `metabolic_market_tcurated_products` (`nid`, `ccode`, `cname`, `cstage_code`, `ctier_code`, `cbrand_name`, `ccategory`, `fprice`, `fprice_sale`, `cjob_to_be_done`, `cmedical_guardrail`, `cfeatures`, `cimage`, `cstock_badge`, `is_featured`, `nstatus`) VALUES
(1, 'MM-CHK-01', 'Cảm biến theo dõi đường huyết liên tục (CGM) 14 ngày', 'CHECK', 'CLINICALLY_RECOMMENDED', 'FreeStyle Libre / Dexcom', 'Thiết bị & Công nghệ theo dõi', 1850000, 1690000, 'Theo dõi biến thiên đường huyết theo thời gian thực, hỗ trợ ghi nhận các đợt glucose spike sau bữa ăn.', 'Chỉ định lâm sàng theo phác đồ bác sĩ cho bệnh nhân tiền đái tháo đường & kháng insulin.', 'Đo liên tục 14 ngày, chống nước, kết nối App smartphone', NULL, 'Sẵn hàng tại phòng khám', 1, 1),
(2, 'MM-CHK-02', 'Cân phân tích thành phần cơ thể y tế đa tần số Smart Body Scale', 'CHECK', 'CURATED', 'InBody Medical Dial', 'Thiết bị & Công nghệ theo dõi', 2450000, 2190000, 'Hỗ trợ đo lường mỡ nội tạng, khối cơ nạc và lượng nước cơ thể tại nhà, đồng bộ dữ liệu vào hồ sơ phòng khám.', 'Dữ liệu ước tính theo công nghệ BIA, đối chiếu cùng máy đo InBody chuyên sâu tại phòng khám.', 'Kết nối Bluetooth 5.0, đo 8 điện cực tay - chân, tải trọng 180kg', NULL, 'Sẵn hàng tại phòng khám', 1, 1),
(3, 'MM-CHK-03', 'Máy đo huyết áp bắp tay điện tử tự động cảnh báo loạn nhịp', 'CHECK', 'AVAILABLE', 'Omron Healthcare', 'Thiết bị & Công nghệ theo dõi', 1250000, 1150000, 'Tầm soát chỉ số huyết áp hằng ngày, phát hiện sớm dấu hiệu rối loạn nhịp tim và áp lực mạch máu.', 'Thiết bị hỗ trợ theo dõi tại nhà, không thay thế đo huyết áp chuẩn tại phòng khám.', 'Vòng bít IntelliWrap 360 độ, bộ nhớ 60 lần đo', NULL, 'Sẵn hàng tại phòng khám', 0, 1),
(4, 'MM-LOSE-01', 'Đạm bổ sung Isolate Protein (Zero Sugar - Low GI)', 'LOSE', 'CURATED', 'Metabolic Pro-Lab', 'Dinh dưỡng & Thực phẩm Chuyển hóa', 1350000, 1220000, 'Bổ sung 25g đạm Isolate/khẩu phần, hỗ trợ bảo toàn khối cơ nạc khi đang kiểm soát calo trong giai đoạn giảm mỡ.', 'Không dùng thay thế hoàn toàn bữa ăn hàng ngày; cần uống đủ nước theo chỉ định.', 'Whey Isolate thủy phân tiêu chuẩn y khoa, không bổ sung đường, không lactose, hộp 900g', NULL, 'Sẵn hàng tại phòng khám', 1, 1),
(5, 'MM-LOSE-02', 'Bữa ăn thay thế chuẩn y khoa cân bằng đa lượng Low Carb', 'LOSE', 'CLINICALLY_RECOMMENDED', 'Qcare Nutrition Balance', 'Dinh dưỡng & Thực phẩm Chuyển hóa', 980000, 890000, 'Cung cấp năng lượng khoảng 180 kcal/khẩu phần với chỉ số đường huyết thấp (GI < 30), giúp tạo cảm giác no và ổn định năng lượng.', 'Sử dụng theo lịch trình dinh dưỡng do Bác sĩ và Chuyên gia dinh dưỡng Gọn Khoẻ tư vấn.', 'Hộp 14 gói tiện lợi, giàu 24 vitamin & khoáng chất thiết yếu', NULL, 'Sẵn hàng tại phòng khám', 1, 1),
(6, 'MM-LOSE-03', 'Gói bù điện giải không đường Electrolytes Clean Hydration', 'LOSE', 'AVAILABLE', 'CleanHydrate Pharma', 'Dinh dưỡng & Thực phẩm Chuyển hóa', 450000, 390000, 'Bù đắp Natri, Kali, Magie tức thì, chống hạ huyết áp tư thế, mệt mỏi và đau đầu khi giảm cân y khoa.', 'Sản phẩm hỗ trợ bù nước, không chứa calories và đường hóa học độc hại.', 'Hộp 30 gói, hương cam tự nhiên từ quả mọng', NULL, 'Sẵn hàng tại phòng khám', 0, 1),
(7, 'MM-REMIT-01', 'Vi chất hỗ trợ độ nhạy Insulin (Myo-Inositol 2000mg + D-Chiro-Inositol 40:1)', 'REMIT', 'CLINICALLY_RECOMMENDED', 'InsoMetabolic Advanced', 'Thực phẩm bảo vệ sức khỏe & Vi chất', 890000, 790000, 'Tối ưu độ nhạy tế bào với insulin, cải thiện chuyển hóa glucose nội bào và hỗ trợ phụ nữ buồng trứng đa nang PCOS.', 'Chỉ dùng theo đúng liều lượng bác sĩ chỉ định; không tự ý tăng liều.', 'Tỷ lệ vàng 40:1 chuẩn khoa học quốc tế, lọ 60 viên nang thực vật', NULL, 'Sẵn hàng tại phòng khám', 1, 1),
(8, 'MM-REMIT-02', 'Chất xơ hòa tan lên men sinh học Prebiotic Fiber Complex', 'REMIT', 'CURATED', 'BioMetabolic Fiber', 'Dinh dưỡng & Thực phẩm Chuyển hóa', 620000, 560000, 'Chậm hấp thu tinh bột sau ăn, giảm đường huyết đỉnh và nuôi dưỡng hệ lợi khuẩn đường ruột Akkermansia muciniphila.', 'Uống trước bữa ăn 15-20 phút kèm 250ml nước lọc ấm.', 'Bột hòa tan không mùi không vị, thành phần Inulin & FOS hữu cơ tự nhiên', NULL, 'Sẵn hàng tại phòng khám', 1, 1),
(9, 'MM-REMIT-03', 'Men vi sinh chuyển hóa Probiotics Metabolic Gut Strains (30 tỷ CFU)', 'REMIT', 'CURATED', 'Metabiotic Clinic', 'Thực phẩm bảo vệ sức khỏe & Vi chất', 950000, 850000, 'Bổ sung chủng vi khuẩn có lợi chuyên biệt hỗ trợ kiểm soát mỡ nội tạng và tăng tổng hợp hormone no GLP-1 nội sinh.', 'Thực phẩm bổ sung, bảo quản ngăn mát tủ lạnh sau khi mở nắp.', 'Công nghệ màng bọc kháng axit dạ dày, 30 viên/lọ', NULL, 'Sẵn hàng tại phòng khám', 0, 1),
(10, 'MM-KEEP-01', 'Thanh dinh dưỡng kiểm soát đường huyết Grab & Go Protein Bar (Net Carb 2g)', 'KEEP', 'AVAILABLE', 'SmartBite Keto Lab', 'Dinh dưỡng & Thực phẩm Chuyển hóa', 480000, 420000, 'Giải pháp tiện lợi khi bận rộn hoặc thèm ăn vặt, không gây dao động đường huyết đột ngột, hỗ trợ duy trì kết quả cân nặng bền bỉ.', 'Dùng xen kẽ các bữa phụ hoặc khi di chuyển công tác bận rộn.', 'Hộp 12 thanh, vị Socola hạnh nhân giòn tan', NULL, 'Sẵn hàng tại phòng khám', 1, 1),
(11, 'MM-KEEP-02', 'Gói thẻ thành viên duy trì KEEP Club (12 tuần đồng hành chuyển hóa)', 'KEEP', 'CURATED', 'Gọn Khoẻ by Qcare', 'Gói thành viên & Khóa học lối sống', 2970000, 2970000, 'Quyền lợi đo InBody miễn phí hàng tuần, tái khám bác sĩ định kỳ, cập nhật thực đơn món Việt và voucher 10% tại Metabolic Market.', 'Áp dụng cho khách hàng đã hoàn thành giai đoạn giảm cân tích cực tại Gọn Khoẻ.', 'Thời hạn 12 tuần duy trì kết quả, cố vấn 1-1 qua App Qcare', NULL, 'Sẵn hàng tại phòng khám', 1, 1),
(12, 'MM-KEEP-03', 'Sổ tay hướng dẫn dinh dưỡng & Bảng tra cứu chỉ số GL/GI món ăn Việt Nam', 'KEEP', 'AVAILABLE', 'Viện Dinh dưỡng Chuyển hóa Qcare', 'Gói thành viên & Khóa học lối sống', 250000, 190000, 'Bí quyết cân đối tỷ lệ đĩa ăn món Việt chuẩn y khoa, giúp duy trì dinh dưỡng lành mạnh cùng gia đình và kiểm soát cân nặng bền vững.', 'Cẩm nang cầm tay in màu chất lượng cao, kèm mã QR tra cứu online.', 'Bìa cứng ép kim, 180 trang phân tích hơn 300 món ăn Việt quen thuộc', NULL, 'Sẵn hàng tại phòng khám', 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `metabolic_market_tcustomer`
--

CREATE TABLE `metabolic_market_tcustomer` (
  `nid` int(11) NOT NULL,
  `cname` varchar(100) DEFAULT NULL,
  `ccode` varchar(100) DEFAULT NULL,
  `ccode_group` varchar(100) DEFAULT NULL,
  `cap_dung_uu_dai` varchar(100) DEFAULT NULL,
  `cemail` varchar(200) DEFAULT NULL,
  `cphone` varchar(100) DEFAULT NULL,
  `cngay_sinh` varchar(200) DEFAULT NULL,
  `cgender` varchar(50) DEFAULT NULL,
  `cwebsite` varchar(100) DEFAULT NULL,
  `cimage` varchar(500) DEFAULT NULL,
  `cma_so_thue` varchar(100) DEFAULT NULL,
  `cnote` varchar(150) DEFAULT NULL,
  `caddress` varchar(250) DEFAULT NULL,
  `nstatus` char(1) DEFAULT '1',
  `ddate01` datetime NOT NULL DEFAULT '1977-01-01 00:00:00',
  `ddate02` datetime NOT NULL DEFAULT '1977-01-01 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `metabolic_market_tdistrict`
--

CREATE TABLE `metabolic_market_tdistrict` (
  `nid` int(11) NOT NULL,
  `nid_province` int(11) DEFAULT NULL,
  `ccode` varchar(250) DEFAULT NULL,
  `cname` varchar(250) DEFAULT NULL,
  `nstatus` int(11) DEFAULT NULL,
  `nhome` int(11) DEFAULT NULL,
  `cindex` char(4) DEFAULT NULL,
  `niduser01` int(11) DEFAULT NULL,
  `niduser02` int(11) DEFAULT NULL,
  `ddate01` date DEFAULT NULL,
  `ddate02` date DEFAULT NULL,
  `maqh` varchar(250) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `metabolic_market_tdistrict`
--

INSERT INTO `metabolic_market_tdistrict` (`nid`, `nid_province`, `ccode`, `cname`, `nstatus`, `nhome`, `cindex`, `niduser01`, `niduser02`, `ddate01`, `ddate02`, `maqh`) VALUES
(1, 62, '01', 'Quận Ba Đình', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '001'),
(2, 62, '01', 'Quận Hoàn Kiếm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '002'),
(3, 62, '01', 'Quận Tây Hồ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '003'),
(4, 62, '01', 'Quận Long Biên', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '004'),
(5, 62, '01', 'Quận Cầu Giấy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '005'),
(6, 62, '01', 'Quận Đống Đa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '006'),
(7, 62, '01', 'Quận Hai Bà Trưng', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '007'),
(8, 62, '01', 'Quận Hoàng Mai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '008'),
(9, 62, '01', 'Quận Thanh Xuân', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '009'),
(10, 62, '01', 'Huyện Sóc Sơn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '016'),
(11, 62, '01', 'Huyện Đông Anh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '017'),
(12, 62, '01', 'Huyện Gia Lâm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '018'),
(13, 62, '01', 'Quận Nam Từ Liêm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '019'),
(14, 62, '01', 'Huyện Thanh Trì', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '020'),
(15, 62, '01', 'Quận Bắc Từ Liêm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '021'),
(16, 62, '01', 'Huyện Mê Linh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '250'),
(17, 62, '01', 'Quận Hà Đông', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '268'),
(18, 62, '01', 'Thị xã Sơn Tây', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '269'),
(19, 62, '01', 'Huyện Ba Vì', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '271'),
(20, 62, '01', 'Huyện Phúc Thọ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '272'),
(21, 62, '01', 'Huyện Đan Phượng', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '273'),
(22, 62, '01', 'Huyện Hoài Đức', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '274'),
(23, 62, '01', 'Huyện Quốc Oai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '275'),
(24, 62, '01', 'Huyện Thạch Thất', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '276'),
(25, 62, '01', 'Huyện Chương Mỹ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '277'),
(26, 62, '01', 'Huyện Thanh Oai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '278'),
(27, 62, '01', 'Huyện Thường Tín', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '279'),
(28, 62, '01', 'Huyện Phú Xuyên', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '280'),
(29, 62, '01', 'Huyện Ứng Hòa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '281'),
(30, 62, '01', 'Huyện Mỹ Đức', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '282'),
(31, 20, '02', 'Thành phố Hà Giang', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '024'),
(32, 20, '02', 'Huyện Đồng Văn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '026'),
(33, 20, '02', 'Huyện Mèo Vạc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '027'),
(34, 20, '02', 'Huyện Yên Minh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '028'),
(35, 20, '02', 'Huyện Quản Bạ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '029'),
(36, 20, '02', 'Huyện Vị Xuyên', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '030'),
(37, 20, '02', 'Huyện Bắc Mê', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '031'),
(38, 20, '02', 'Huyện Hoàng Su Phì', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '032'),
(39, 20, '02', 'Huyện Xín Mần', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '033'),
(40, 20, '02', 'Huyện Bắc Quang', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '034'),
(41, 20, '02', 'Huyện Quang Bình', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '035'),
(42, 13, '04', 'Thành phố Cao Bằng', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '040'),
(43, 13, '04', 'Huyện Bảo Lâm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '042'),
(44, 13, '04', 'Huyện Bảo Lạc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '043'),
(45, 13, '04', 'Huyện Hà Quảng', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '045'),
(46, 13, '04', 'Huyện Trùng Khánh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '047'),
(47, 13, '04', 'Huyện Hạ Lang', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '048'),
(48, 13, '04', 'Huyện Quảng Hòa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '049'),
(49, 13, '04', 'Huyện Hoà An', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '051'),
(50, 13, '04', 'Huyện Nguyên Bình', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '052'),
(51, 13, '04', 'Huyện Thạch An', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '053'),
(52, 4, '06', 'Thành Phố Bắc Kạn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '058'),
(53, 4, '06', 'Huyện Pác Nặm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '060'),
(54, 4, '06', 'Huyện Ba Bể', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '061'),
(55, 4, '06', 'Huyện Ngân Sơn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '062'),
(56, 4, '06', 'Huyện Bạch Thông', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '063'),
(57, 4, '06', 'Huyện Chợ Đồn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '064'),
(58, 4, '06', 'Huyện Chợ Mới', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '065'),
(59, 4, '06', 'Huyện Na Rì', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '066'),
(60, 54, '08', 'Thành phố Tuyên Quang', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '070'),
(61, 54, '08', 'Huyện Lâm Bình', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '071'),
(62, 54, '08', 'Huyện Na Hang', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '072'),
(63, 54, '08', 'Huyện Chiêm Hóa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '073'),
(64, 54, '08', 'Huyện Hàm Yên', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '074'),
(65, 54, '08', 'Huyện Yên Sơn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '075'),
(66, 54, '08', 'Huyện Sơn Dương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '076'),
(67, 33, '10', 'Thành phố Lào Cai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '080'),
(68, 33, '10', 'Huyện Bát Xát', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '082'),
(69, 33, '10', 'Huyện Mường Khương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '083'),
(70, 33, '10', 'Huyện Si Ma Cai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '084'),
(71, 33, '10', 'Huyện Bắc Hà', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '085'),
(72, 33, '10', 'Huyện Bảo Thắng', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '086'),
(73, 33, '10', 'Huyện Bảo Yên', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '087'),
(74, 33, '10', 'Thị xã Sa Pa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '088'),
(75, 33, '10', 'Huyện Văn Bàn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '089'),
(76, 16, '11', 'Thành phố Điện Biên Phủ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '094'),
(77, 16, '11', 'Thị Xã Mường Lay', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '095'),
(78, 16, '11', 'Huyện Mường Nhé', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '096'),
(79, 16, '11', 'Huyện Mường Chà', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '097'),
(80, 16, '11', 'Huyện Tủa Chùa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '098'),
(81, 16, '11', 'Huyện Tuần Giáo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '099'),
(82, 16, '11', 'Huyện Điện Biên', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '100'),
(83, 16, '11', 'Huyện Điện Biên Đông', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '101'),
(84, 16, '11', 'Huyện Mường Ảng', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '102'),
(85, 16, '11', 'Huyện Nậm Pồ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '103'),
(86, 30, '12', 'Thành phố Lai Châu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '105'),
(87, 30, '12', 'Huyện Tam Đường', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '106'),
(88, 30, '12', 'Huyện Mường Tè', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '107'),
(89, 30, '12', 'Huyện Sìn Hồ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '108'),
(90, 30, '12', 'Huyện Phong Thổ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '109'),
(91, 30, '12', 'Huyện Than Uyên', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '110'),
(92, 30, '12', 'Huyện Tân Uyên', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '111'),
(93, 30, '12', 'Huyện Nậm Nhùn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '112'),
(94, 46, '14', 'Thành phố Sơn La', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '116'),
(95, 46, '14', 'Huyện Quỳnh Nhai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '118'),
(96, 46, '14', 'Huyện Thuận Châu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '119'),
(97, 46, '14', 'Huyện Mường La', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '120'),
(98, 46, '14', 'Huyện Bắc Yên', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '121'),
(99, 46, '14', 'Huyện Phù Yên', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '122'),
(100, 46, '14', 'Huyện Mộc Châu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '123'),
(101, 46, '14', 'Huyện Yên Châu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '124'),
(102, 46, '14', 'Huyện Mai Sơn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '125'),
(103, 46, '14', 'Huyện Sông Mã', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '126'),
(104, 46, '14', 'Huyện Sốp Cộp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '127'),
(105, 46, '14', 'Huyện Vân Hồ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '128'),
(106, 57, '15', 'Thành phố Yên Bái', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '132'),
(107, 57, '15', 'Thị xã Nghĩa Lộ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '133'),
(108, 57, '15', 'Huyện Lục Yên', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '135'),
(109, 57, '15', 'Huyện Văn Yên', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '136'),
(110, 57, '15', 'Huyện Mù Căng Chải', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '137'),
(111, 57, '15', 'Huyện Trấn Yên', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '138'),
(112, 57, '15', 'Huyện Trạm Tấu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '139'),
(113, 57, '15', 'Huyện Văn Chấn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '140'),
(114, 57, '15', 'Huyện Yên Bình', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '141'),
(115, 25, '17', 'Thành phố Hòa Bình', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '148'),
(116, 25, '17', 'Huyện Đà Bắc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '150'),
(117, 25, '17', 'Huyện Lương Sơn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '152'),
(118, 25, '17', 'Huyện Kim Bôi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '153'),
(119, 25, '17', 'Huyện Cao Phong', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '154'),
(120, 25, '17', 'Huyện Tân Lạc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '155'),
(121, 25, '17', 'Huyện Mai Châu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '156'),
(122, 25, '17', 'Huyện Lạc Sơn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '157'),
(123, 25, '17', 'Huyện Yên Thủy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '158'),
(124, 25, '17', 'Huyện Lạc Thủy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '159'),
(125, 49, '19', 'Thành phố Thái Nguyên', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '164'),
(126, 49, '19', 'Thành phố Sông Công', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '165'),
(127, 49, '19', 'Huyện Định Hóa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '167'),
(128, 49, '19', 'Huyện Phú Lương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '168'),
(129, 49, '19', 'Huyện Đồng Hỷ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '169'),
(130, 49, '19', 'Huyện Võ Nhai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '170'),
(131, 49, '19', 'Huyện Đại Từ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '171'),
(132, 49, '19', 'Thị xã Phổ Yên', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '172'),
(133, 49, '19', 'Huyện Phú Bình', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '173'),
(134, 32, '20', 'Thành phố Lạng Sơn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '178'),
(135, 32, '20', 'Huyện Tràng Định', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '180'),
(136, 32, '20', 'Huyện Bình Gia', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '181'),
(137, 32, '20', 'Huyện Văn Lãng', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '182'),
(138, 32, '20', 'Huyện Cao Lộc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '183'),
(139, 32, '20', 'Huyện Văn Quan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '184'),
(140, 32, '20', 'Huyện Bắc Sơn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '185'),
(141, 32, '20', 'Huyện Hữu Lũng', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '186'),
(142, 32, '20', 'Huyện Chi Lăng', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '187'),
(143, 32, '20', 'Huyện Lộc Bình', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '188'),
(144, 32, '20', 'Huyện Đình Lập', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '189'),
(145, 43, '22', 'Thành phố Hạ Long', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '193'),
(146, 43, '22', 'Thành phố Móng Cái', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '194'),
(147, 43, '22', 'Thành phố Cẩm Phả', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '195'),
(148, 43, '22', 'Thành phố Uông Bí', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '196'),
(149, 43, '22', 'Huyện Bình Liêu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '198'),
(150, 43, '22', 'Huyện Tiên Yên', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '199'),
(151, 43, '22', 'Huyện Đầm Hà', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '200'),
(152, 43, '22', 'Huyện Hải Hà', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '201'),
(153, 43, '22', 'Huyện Ba Chẽ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '202'),
(154, 43, '22', 'Huyện Vân Đồn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '203'),
(155, 43, '22', 'Thị xã Đông Triều', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '205'),
(156, 43, '22', 'Thị xã Quảng Yên', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '206'),
(157, 43, '22', 'Huyện Cô Tô', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '207'),
(158, 3, '24', 'Thành phố Bắc Giang', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '213'),
(159, 3, '24', 'Huyện Yên Thế', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '215'),
(160, 3, '24', 'Huyện Tân Yên', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '216'),
(161, 3, '24', 'Huyện Lạng Giang', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '217'),
(162, 3, '24', 'Huyện Lục Nam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '218'),
(163, 3, '24', 'Huyện Lục Ngạn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '219'),
(164, 3, '24', 'Huyện Sơn Động', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '220'),
(165, 3, '24', 'Huyện Yên Dũng', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '221'),
(166, 3, '24', 'Huyện Việt Yên', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '222'),
(167, 3, '24', 'Huyện Hiệp Hòa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '223'),
(168, 39, '25', 'Thành phố Việt Trì', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '227'),
(169, 39, '25', 'Thị xã Phú Thọ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '228'),
(170, 39, '25', 'Huyện Đoan Hùng', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '230'),
(171, 39, '25', 'Huyện Hạ Hoà', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '231'),
(172, 39, '25', 'Huyện Thanh Ba', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '232'),
(173, 39, '25', 'Huyện Phù Ninh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '233'),
(174, 39, '25', 'Huyện Yên Lập', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '234'),
(175, 39, '25', 'Huyện Cẩm Khê', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '235'),
(176, 39, '25', 'Huyện Tam Nông', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '236'),
(177, 39, '25', 'Huyện Lâm Thao', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '237'),
(178, 39, '25', 'Huyện Thanh Sơn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '238'),
(179, 39, '25', 'Huyện Thanh Thuỷ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '239'),
(180, 39, '25', 'Huyện Tân Sơn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '240'),
(181, 56, '26', 'Thành phố Vĩnh Yên', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '243'),
(182, 56, '26', 'Thành phố Phúc Yên', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '244'),
(183, 56, '26', 'Huyện Lập Thạch', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '246'),
(184, 56, '26', 'Huyện Tam Dương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '247'),
(185, 56, '26', 'Huyện Tam Đảo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '248'),
(186, 56, '26', 'Huyện Bình Xuyên', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '249'),
(187, 56, '26', 'Huyện Yên Lạc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '251'),
(188, 56, '26', 'Huyện Vĩnh Tường', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '252'),
(189, 56, '26', 'Huyện Sông Lô', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '253'),
(190, 6, '27', 'Thành phố Bắc Ninh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '256'),
(191, 6, '27', 'Huyện Yên Phong', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '258'),
(192, 6, '27', 'Huyện Quế Võ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '259'),
(193, 6, '27', 'Huyện Tiên Du', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '260'),
(194, 6, '27', 'Thị xã Từ Sơn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '261'),
(195, 6, '27', 'Huyện Thuận Thành', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '262'),
(196, 6, '27', 'Huyện Gia Bình', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '263'),
(197, 6, '27', 'Huyện Lương Tài', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '264'),
(198, 23, '30', 'Thành phố Hải Dương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '288'),
(199, 23, '30', 'Thành phố Chí Linh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '290'),
(200, 23, '30', 'Huyện Nam Sách', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '291'),
(201, 23, '30', 'Thị xã Kinh Môn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '292'),
(202, 23, '30', 'Huyện Kim Thành', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '293'),
(203, 23, '30', 'Huyện Thanh Hà', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '294'),
(204, 23, '30', 'Huyện Cẩm Giàng', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '295'),
(205, 23, '30', 'Huyện Bình Giang', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '296'),
(206, 23, '30', 'Huyện Gia Lộc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '297'),
(207, 23, '30', 'Huyện Tứ Kỳ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '298'),
(208, 23, '30', 'Huyện Ninh Giang', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '299'),
(209, 23, '30', 'Huyện Thanh Miện', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '300'),
(210, 61, '31', 'Quận Hồng Bàng', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '303'),
(211, 61, '31', 'Quận Ngô Quyền', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '304'),
(212, 61, '31', 'Quận Lê Chân', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '305'),
(213, 61, '31', 'Quận Hải An', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '306'),
(214, 61, '31', 'Quận Kiến An', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '307'),
(215, 61, '31', 'Quận Đồ Sơn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '308'),
(216, 61, '31', 'Quận Dương Kinh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '309'),
(217, 61, '31', 'Huyện Thuỷ Nguyên', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '311'),
(218, 61, '31', 'Huyện An Dương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '312'),
(219, 61, '31', 'Huyện An Lão', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '313'),
(220, 61, '31', 'Huyện Kiến Thuỵ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '314'),
(221, 61, '31', 'Huyện Tiên Lãng', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '315'),
(222, 61, '31', 'Huyện Vĩnh Bảo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '316'),
(223, 61, '31', 'Huyện Cát Hải', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '317'),
(224, 61, '31', 'Huyện Bạch Long Vĩ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '318'),
(225, 26, '33', 'Thành phố Hưng Yên', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '323'),
(226, 26, '33', 'Huyện Văn Lâm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '325'),
(227, 26, '33', 'Huyện Văn Giang', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '326'),
(228, 26, '33', 'Huyện Yên Mỹ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '327'),
(229, 26, '33', 'Thị xã Mỹ Hào', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '328'),
(230, 26, '33', 'Huyện Ân Thi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '329'),
(231, 26, '33', 'Huyện Khoái Châu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '330'),
(232, 26, '33', 'Huyện Kim Động', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '331'),
(233, 26, '33', 'Huyện Tiên Lữ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '332'),
(234, 26, '33', 'Huyện Phù Cừ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '333'),
(235, 48, '34', 'Thành phố Thái Bình', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '336'),
(236, 48, '34', 'Huyện Quỳnh Phụ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '338'),
(237, 48, '34', 'Huyện Hưng Hà', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '339'),
(238, 48, '34', 'Huyện Đông Hưng', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '340'),
(239, 48, '34', 'Huyện Thái Thụy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '341'),
(240, 48, '34', 'Huyện Tiền Hải', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '342'),
(241, 48, '34', 'Huyện Kiến Xương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '343'),
(242, 48, '34', 'Huyện Vũ Thư', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '344'),
(243, 21, '35', 'Thành phố Phủ Lý', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '347'),
(244, 21, '35', 'Thị xã Duy Tiên', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '349'),
(245, 21, '35', 'Huyện Kim Bảng', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '350'),
(246, 21, '35', 'Huyện Thanh Liêm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '351'),
(247, 21, '35', 'Huyện Bình Lục', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '352'),
(248, 21, '35', 'Huyện Lý Nhân', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '353'),
(249, 35, '36', 'Thành phố Nam Định', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '356'),
(250, 35, '36', 'Huyện Mỹ Lộc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '358'),
(251, 35, '36', 'Huyện Vụ Bản', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '359'),
(252, 35, '36', 'Huyện Ý Yên', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '360'),
(253, 35, '36', 'Huyện Nghĩa Hưng', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '361'),
(254, 35, '36', 'Huyện Nam Trực', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '362'),
(255, 35, '36', 'Huyện Trực Ninh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '363'),
(256, 35, '36', 'Huyện Xuân Trường', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '364'),
(257, 35, '36', 'Huyện Giao Thủy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '365'),
(258, 35, '36', 'Huyện Hải Hậu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '366'),
(259, 37, '37', 'Thành phố Ninh Bình', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '369'),
(260, 37, '37', 'Thành phố Tam Điệp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '370'),
(261, 37, '37', 'Huyện Nho Quan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '372'),
(262, 37, '37', 'Huyện Gia Viễn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '373'),
(263, 37, '37', 'Huyện Hoa Lư', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '374'),
(264, 37, '37', 'Huyện Yên Khánh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '375'),
(265, 37, '37', 'Huyện Kim Sơn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '376'),
(266, 37, '37', 'Huyện Yên Mô', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '377'),
(267, 50, '38', 'Thành phố Thanh Hóa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '380'),
(268, 50, '38', 'Thị xã Bỉm Sơn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '381'),
(269, 50, '38', 'Thành phố Sầm Sơn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '382'),
(270, 50, '38', 'Huyện Mường Lát', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '384'),
(271, 50, '38', 'Huyện Quan Hóa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '385'),
(272, 50, '38', 'Huyện Bá Thước', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '386'),
(273, 50, '38', 'Huyện Quan Sơn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '387'),
(274, 50, '38', 'Huyện Lang Chánh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '388'),
(275, 50, '38', 'Huyện Ngọc Lặc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '389'),
(276, 50, '38', 'Huyện Cẩm Thủy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '390'),
(277, 50, '38', 'Huyện Thạch Thành', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '391'),
(278, 50, '38', 'Huyện Hà Trung', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '392'),
(279, 50, '38', 'Huyện Vĩnh Lộc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '393'),
(280, 50, '38', 'Huyện Yên Định', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '394'),
(281, 50, '38', 'Huyện Thọ Xuân', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '395'),
(282, 50, '38', 'Huyện Thường Xuân', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '396'),
(283, 50, '38', 'Huyện Triệu Sơn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '397'),
(284, 50, '38', 'Huyện Thiệu Hóa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '398'),
(285, 50, '38', 'Huyện Hoằng Hóa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '399'),
(286, 50, '38', 'Huyện Hậu Lộc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '400'),
(287, 50, '38', 'Huyện Nga Sơn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '401'),
(288, 50, '38', 'Huyện Như Xuân', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '402'),
(289, 50, '38', 'Huyện Như Thanh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '403'),
(290, 50, '38', 'Huyện Nông Cống', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '404'),
(291, 50, '38', 'Huyện Đông Sơn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '405'),
(292, 50, '38', 'Huyện Quảng Xương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '406'),
(293, 50, '38', 'Thị xã Nghi Sơn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '407'),
(294, 36, '40', 'Thành phố Vinh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '412'),
(295, 36, '40', 'Thị xã Cửa Lò', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '413'),
(296, 36, '40', 'Thị xã Thái Hoà', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '414'),
(297, 36, '40', 'Huyện Quế Phong', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '415'),
(298, 36, '40', 'Huyện Quỳ Châu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '416'),
(299, 36, '40', 'Huyện Kỳ Sơn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '417'),
(300, 36, '40', 'Huyện Tương Dương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '418'),
(301, 36, '40', 'Huyện Nghĩa Đàn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '419'),
(302, 36, '40', 'Huyện Quỳ Hợp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '420'),
(303, 36, '40', 'Huyện Quỳnh Lưu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '421'),
(304, 36, '40', 'Huyện Con Cuông', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '422'),
(305, 36, '40', 'Huyện Tân Kỳ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '423'),
(306, 36, '40', 'Huyện Anh Sơn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '424'),
(307, 36, '40', 'Huyện Diễn Châu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '425'),
(308, 36, '40', 'Huyện Yên Thành', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '426'),
(309, 36, '40', 'Huyện Đô Lương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '427'),
(310, 36, '40', 'Huyện Thanh Chương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '428'),
(311, 36, '40', 'Huyện Nghi Lộc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '429'),
(312, 36, '40', 'Huyện Nam Đàn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '430'),
(313, 36, '40', 'Huyện Hưng Nguyên', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '431'),
(314, 36, '40', 'Thị xã Hoàng Mai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '432'),
(315, 22, '42', 'Thành phố Hà Tĩnh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '436'),
(316, 22, '42', 'Thị xã Hồng Lĩnh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '437'),
(317, 22, '42', 'Huyện Hương Sơn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '439'),
(318, 22, '42', 'Huyện Đức Thọ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '440'),
(319, 22, '42', 'Huyện Vũ Quang', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '441'),
(320, 22, '42', 'Huyện Nghi Xuân', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '442'),
(321, 22, '42', 'Huyện Can Lộc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '443'),
(322, 22, '42', 'Huyện Hương Khê', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '444'),
(323, 22, '42', 'Huyện Thạch Hà', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '445'),
(324, 22, '42', 'Huyện Cẩm Xuyên', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '446'),
(325, 22, '42', 'Huyện Kỳ Anh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '447'),
(326, 22, '42', 'Huyện Lộc Hà', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '448'),
(327, 22, '42', 'Thị xã Kỳ Anh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '449'),
(328, 40, '44', 'Thành Phố Đồng Hới', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '450'),
(329, 40, '44', 'Huyện Minh Hóa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '452'),
(330, 40, '44', 'Huyện Tuyên Hóa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '453'),
(331, 40, '44', 'Huyện Quảng Trạch', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '454'),
(332, 40, '44', 'Huyện Bố Trạch', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '455'),
(333, 40, '44', 'Huyện Quảng Ninh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '456'),
(334, 40, '44', 'Huyện Lệ Thủy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '457'),
(335, 40, '44', 'Thị xã Ba Đồn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '458'),
(336, 44, '45', 'Thành phố Đông Hà', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '461'),
(337, 44, '45', 'Thị xã Quảng Trị', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '462'),
(338, 44, '45', 'Huyện Vĩnh Linh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '464'),
(339, 44, '45', 'Huyện Hướng Hóa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '465'),
(340, 44, '45', 'Huyện Gio Linh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '466'),
(341, 44, '45', 'Huyện Đa Krông', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '467'),
(342, 44, '45', 'Huyện Cam Lộ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '468'),
(343, 44, '45', 'Huyện Triệu Phong', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '469'),
(344, 44, '45', 'Huyện Hải Lăng', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '470'),
(345, 44, '45', 'Huyện Cồn Cỏ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '471'),
(346, 51, '46', 'Thành phố Huế', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '474'),
(347, 51, '46', 'Huyện Phong Điền', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '476'),
(348, 51, '46', 'Huyện Quảng Điền', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '477'),
(349, 51, '46', 'Huyện Phú Vang', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '478'),
(350, 51, '46', 'Thị xã Hương Thủy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '479'),
(351, 51, '46', 'Thị xã Hương Trà', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '480'),
(352, 51, '46', 'Huyện A Lưới', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '481'),
(353, 51, '46', 'Huyện Phú Lộc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '482'),
(354, 51, '46', 'Huyện Nam Đông', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '483'),
(355, 60, '48', 'Quận Liên Chiểu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '490'),
(356, 60, '48', 'Quận Thanh Khê', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '491'),
(357, 60, '48', 'Quận Hải Châu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '492'),
(358, 60, '48', 'Quận Sơn Trà', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '493'),
(359, 60, '48', 'Quận Ngũ Hành Sơn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '494'),
(360, 60, '48', 'Quận Cẩm Lệ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '495'),
(361, 60, '48', 'Huyện Hòa Vang', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '497'),
(362, 60, '48', 'Huyện Hoàng Sa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '498'),
(363, 41, '49', 'Thành phố Tam Kỳ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '502'),
(364, 41, '49', 'Thành phố Hội An', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '503'),
(365, 41, '49', 'Huyện Tây Giang', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '504'),
(366, 41, '49', 'Huyện Đông Giang', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '505'),
(367, 41, '49', 'Huyện Đại Lộc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '506'),
(368, 41, '49', 'Thị xã Điện Bàn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '507'),
(369, 41, '49', 'Huyện Duy Xuyên', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '508'),
(370, 41, '49', 'Huyện Quế Sơn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '509'),
(371, 41, '49', 'Huyện Nam Giang', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '510'),
(372, 41, '49', 'Huyện Phước Sơn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '511'),
(373, 41, '49', 'Huyện Hiệp Đức', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '512'),
(374, 41, '49', 'Huyện Thăng Bình', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '513'),
(375, 41, '49', 'Huyện Tiên Phước', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '514'),
(376, 41, '49', 'Huyện Bắc Trà My', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '515'),
(377, 41, '49', 'Huyện Nam Trà My', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '516'),
(378, 41, '49', 'Huyện Núi Thành', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '517'),
(379, 41, '49', 'Huyện Phú Ninh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '518'),
(380, 41, '49', 'Huyện Nông Sơn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '519'),
(381, 42, '51', 'Thành phố Quảng Ngãi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '522'),
(382, 42, '51', 'Huyện Bình Sơn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '524'),
(383, 42, '51', 'Huyện Trà Bồng', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '525'),
(384, 42, '51', 'Huyện Sơn Tịnh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '527'),
(385, 42, '51', 'Huyện Tư Nghĩa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '528'),
(386, 42, '51', 'Huyện Sơn Hà', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '529'),
(387, 42, '51', 'Huyện Sơn Tây', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '530'),
(388, 42, '51', 'Huyện Minh Long', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '531'),
(389, 42, '51', 'Huyện Nghĩa Hành', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '532'),
(390, 42, '51', 'Huyện Mộ Đức', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '533'),
(391, 42, '51', 'Thị xã Đức Phổ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '534'),
(392, 42, '51', 'Huyện Ba Tơ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '535'),
(393, 42, '51', 'Huyện Lý Sơn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '536'),
(394, 8, '52', 'Thành phố Quy Nhơn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '540'),
(395, 8, '52', 'Huyện An Lão', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '542'),
(396, 8, '52', 'Thị xã Hoài Nhơn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '543'),
(397, 8, '52', 'Huyện Hoài Ân', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '544'),
(398, 8, '52', 'Huyện Phù Mỹ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '545'),
(399, 8, '52', 'Huyện Vĩnh Thạnh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '546'),
(400, 8, '52', 'Huyện Tây Sơn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '547'),
(401, 8, '52', 'Huyện Phù Cát', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '548'),
(402, 8, '52', 'Thị xã An Nhơn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '549'),
(403, 8, '52', 'Huyện Tuy Phước', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '550'),
(404, 8, '52', 'Huyện Vân Canh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '551'),
(405, 58, '54', 'Thành phố Tuy Hoà', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '555'),
(406, 58, '54', 'Thị xã Sông Cầu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '557'),
(407, 58, '54', 'Huyện Đồng Xuân', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '558'),
(408, 58, '54', 'Huyện Tuy An', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '559'),
(409, 58, '54', 'Huyện Sơn Hòa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '560'),
(410, 58, '54', 'Huyện Sông Hinh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '561'),
(411, 58, '54', 'Huyện Tây Hoà', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '562'),
(412, 58, '54', 'Huyện Phú Hoà', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '563'),
(413, 58, '54', 'Thị xã Đông Hòa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '564'),
(414, 27, '56', 'Thành phố Nha Trang', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '568'),
(415, 27, '56', 'Thành phố Cam Ranh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '569'),
(416, 27, '56', 'Huyện Cam Lâm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '570'),
(417, 27, '56', 'Huyện Vạn Ninh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '571'),
(418, 27, '56', 'Thị xã Ninh Hòa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '572'),
(419, 27, '56', 'Huyện Khánh Vĩnh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '573'),
(420, 27, '56', 'Huyện Diên Khánh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '574'),
(421, 27, '56', 'Huyện Khánh Sơn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '575'),
(422, 27, '56', 'Huyện Trường Sa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '576'),
(423, 38, '58', 'Thành phố Phan Rang-Tháp Chàm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '582'),
(424, 38, '58', 'Huyện Bác Ái', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '584'),
(425, 38, '58', 'Huyện Ninh Sơn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '585'),
(426, 38, '58', 'Huyện Ninh Hải', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '586'),
(427, 38, '58', 'Huyện Ninh Phước', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '587'),
(428, 38, '58', 'Huyện Thuận Bắc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '588'),
(429, 38, '58', 'Huyện Thuận Nam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '589'),
(430, 11, '60', 'Thành phố Phan Thiết', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '593'),
(431, 11, '60', 'Thị xã La Gi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '594'),
(432, 11, '60', 'Huyện Tuy Phong', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '595'),
(433, 11, '60', 'Huyện Bắc Bình', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '596'),
(434, 11, '60', 'Huyện Hàm Thuận Bắc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '597'),
(435, 11, '60', 'Huyện Hàm Thuận Nam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '598'),
(436, 11, '60', 'Huyện Tánh Linh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '599'),
(437, 11, '60', 'Huyện Đức Linh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '600'),
(438, 11, '60', 'Huyện Hàm Tân', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '601'),
(439, 11, '60', 'Huyện Phú Quí', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '602'),
(440, 29, '62', 'Thành phố Kon Tum', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '608'),
(441, 29, '62', 'Huyện Đắk Glei', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '610'),
(442, 29, '62', 'Huyện Ngọc Hồi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '611'),
(443, 29, '62', 'Huyện Đắk Tô', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '612'),
(444, 29, '62', 'Huyện Kon Plông', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '613'),
(445, 29, '62', 'Huyện Kon Rẫy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '614'),
(446, 29, '62', 'Huyện Đắk Hà', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '615'),
(447, 29, '62', 'Huyện Sa Thầy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '616'),
(448, 29, '62', 'Huyện Tu Mơ Rông', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '617'),
(449, 29, '62', 'Huyện Ia H\' Drai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '618'),
(450, 19, '64', 'Thành phố Pleiku', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '622'),
(451, 19, '64', 'Thị xã An Khê', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '623'),
(452, 19, '64', 'Thị xã Ayun Pa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '624'),
(453, 19, '64', 'Huyện KBang', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '625'),
(454, 19, '64', 'Huyện Đăk Đoa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '626'),
(455, 19, '64', 'Huyện Chư Păh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '627'),
(456, 19, '64', 'Huyện Ia Grai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '628'),
(457, 19, '64', 'Huyện Mang Yang', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '629'),
(458, 19, '64', 'Huyện Kông Chro', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '630'),
(459, 19, '64', 'Huyện Đức Cơ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '631'),
(460, 19, '64', 'Huyện Chư Prông', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '632'),
(461, 19, '64', 'Huyện Chư Sê', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '633'),
(462, 19, '64', 'Huyện Đăk Pơ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '634'),
(463, 19, '64', 'Huyện Ia Pa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '635'),
(464, 19, '64', 'Huyện Krông Pa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '637'),
(465, 19, '64', 'Huyện Phú Thiện', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '638'),
(466, 19, '64', 'Huyện Chư Pưh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '639'),
(467, 14, '66', 'Thành phố Buôn Ma Thuột', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '643'),
(468, 14, '66', 'Thị Xã Buôn Hồ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '644'),
(469, 14, '66', 'Huyện Ea H\'leo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '645'),
(470, 14, '66', 'Huyện Ea Súp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '646'),
(471, 14, '66', 'Huyện Buôn Đôn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '647'),
(472, 14, '66', 'Huyện Cư M\'gar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '648'),
(473, 14, '66', 'Huyện Krông Búk', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '649'),
(474, 14, '66', 'Huyện Krông Năng', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '650'),
(475, 14, '66', 'Huyện Ea Kar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '651'),
(476, 14, '66', 'Huyện M\'Đrắk', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '652'),
(477, 14, '66', 'Huyện Krông Bông', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '653'),
(478, 14, '66', 'Huyện Krông Pắc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '654'),
(479, 14, '66', 'Huyện Krông A Na', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '655'),
(480, 14, '66', 'Huyện Lắk', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '656'),
(481, 14, '66', 'Huyện Cư Kuin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '657'),
(482, 15, '67', 'Thành phố Gia Nghĩa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '660'),
(483, 15, '67', 'Huyện Đăk Glong', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '661'),
(484, 15, '67', 'Huyện Cư Jút', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '662'),
(485, 15, '67', 'Huyện Đắk Mil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '663'),
(486, 15, '67', 'Huyện Krông Nô', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '664'),
(487, 15, '67', 'Huyện Đắk Song', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '665'),
(488, 15, '67', 'Huyện Đắk R\'Lấp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '666'),
(489, 15, '67', 'Huyện Tuy Đức', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '667'),
(490, 31, '68', 'Thành phố Đà Lạt', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '672'),
(491, 31, '68', 'Thành phố Bảo Lộc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '673'),
(492, 31, '68', 'Huyện Đam Rông', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '674'),
(493, 31, '68', 'Huyện Lạc Dương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '675'),
(494, 31, '68', 'Huyện Lâm Hà', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '676'),
(495, 31, '68', 'Huyện Đơn Dương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '677'),
(496, 31, '68', 'Huyện Đức Trọng', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '678'),
(497, 31, '68', 'Huyện Di Linh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '679'),
(498, 31, '68', 'Huyện Bảo Lâm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '680'),
(499, 31, '68', 'Huyện Đạ Huoai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '681'),
(500, 31, '68', 'Huyện Đạ Tẻh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '682'),
(501, 31, '68', 'Huyện Cát Tiên', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '683'),
(502, 10, '70', 'Thị xã Phước Long', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '688'),
(503, 10, '70', 'Thành phố Đồng Xoài', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '689'),
(504, 10, '70', 'Thị xã Bình Long', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '690'),
(505, 10, '70', 'Huyện Bù Gia Mập', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '691'),
(506, 10, '70', 'Huyện Lộc Ninh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '692'),
(507, 10, '70', 'Huyện Bù Đốp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '693'),
(508, 10, '70', 'Huyện Hớn Quản', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '694'),
(509, 10, '70', 'Huyện Đồng Phú', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '695'),
(510, 10, '70', 'Huyện Bù Đăng', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '696'),
(511, 10, '70', 'Huyện Chơn Thành', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '697'),
(512, 10, '70', 'Huyện Phú Riềng', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '698'),
(513, 47, '72', 'Thành phố Tây Ninh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '703'),
(514, 47, '72', 'Huyện Tân Biên', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '705'),
(515, 47, '72', 'Huyện Tân Châu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '706'),
(516, 47, '72', 'Huyện Dương Minh Châu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '707'),
(517, 47, '72', 'Huyện Châu Thành', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '708'),
(518, 47, '72', 'Thị xã Hòa Thành', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '709'),
(519, 47, '72', 'Huyện Gò Dầu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '710'),
(520, 47, '72', 'Huyện Bến Cầu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '711'),
(521, 47, '72', 'Thị xã Trảng Bàng', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '712'),
(522, 9, '74', 'Thành phố Thủ Dầu Một', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '718'),
(523, 9, '74', 'Huyện Bàu Bàng', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '719'),
(524, 9, '74', 'Huyện Dầu Tiếng', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '720'),
(525, 9, '74', 'Thị xã Bến Cát', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '721'),
(526, 9, '74', 'Huyện Phú Giáo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '722'),
(527, 9, '74', 'Thị xã Tân Uyên', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '723'),
(528, 9, '74', 'Thành phố Dĩ An', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '724'),
(529, 9, '74', 'Thành phố Thuận An', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '725'),
(530, 9, '74', 'Huyện Bắc Tân Uyên', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '726'),
(531, 17, '75', 'Thành phố Biên Hòa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '731'),
(532, 17, '75', 'Thành phố Long Khánh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '732'),
(533, 17, '75', 'Huyện Tân Phú', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '734'),
(534, 17, '75', 'Huyện Vĩnh Cửu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '735'),
(535, 17, '75', 'Huyện Định Quán', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '736'),
(536, 17, '75', 'Huyện Trảng Bom', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '737'),
(537, 17, '75', 'Huyện Thống Nhất', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '738'),
(538, 17, '75', 'Huyện Cẩm Mỹ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '739'),
(539, 17, '75', 'Huyện Long Thành', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '740'),
(540, 17, '75', 'Huyện Xuân Lộc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '741'),
(541, 17, '75', 'Huyện Nhơn Trạch', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '742'),
(542, 2, '77', 'Thành phố Vũng Tàu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '747'),
(543, 2, '77', 'Thành phố Bà Rịa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '748'),
(544, 2, '77', 'Huyện Châu Đức', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '750'),
(545, 2, '77', 'Huyện Xuyên Mộc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '751'),
(546, 2, '77', 'Huyện Long Điền', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '752'),
(547, 2, '77', 'Huyện Đất Đỏ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '753'),
(548, 2, '77', 'Thị xã Phú Mỹ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '754'),
(549, 2, '77', 'Huyện Côn Đảo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '755'),
(550, 63, '79', 'Quận 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '760'),
(551, 63, '79', 'Quận 12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '761'),
(552, 63, '79', 'Quận Thủ Đức', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '762'),
(553, 63, '79', 'Quận 9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '763'),
(554, 63, '79', 'Quận Gò Vấp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '764'),
(555, 63, '79', 'Quận Bình Thạnh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '765'),
(556, 63, '79', 'Quận Tân Bình', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '766'),
(557, 63, '79', 'Quận Tân Phú', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '767'),
(558, 63, '79', 'Quận Phú Nhuận', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '768'),
(559, 63, '79', 'Quận 2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '769'),
(560, 63, '79', 'Quận 3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '770'),
(561, 63, '79', 'Quận 10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '771'),
(562, 63, '79', 'Quận 11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '772'),
(563, 63, '79', 'Quận 4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '773'),
(564, 63, '79', 'Quận 5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '774'),
(565, 63, '79', 'Quận 6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '775'),
(566, 63, '79', 'Quận 8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '776'),
(567, 63, '79', 'Quận Bình Tân', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '777'),
(568, 63, '79', 'Quận 7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '778'),
(569, 63, '79', 'Huyện Củ Chi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '783'),
(570, 63, '79', 'Huyện Hóc Môn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '784'),
(571, 63, '79', 'Huyện Bình Chánh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '785'),
(572, 63, '79', 'Huyện Nhà Bè', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '786'),
(573, 63, '79', 'Huyện Cần Giờ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '787'),
(574, 34, '80', 'Thành phố Tân An', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '794'),
(575, 34, '80', 'Thị xã Kiến Tường', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '795'),
(576, 34, '80', 'Huyện Tân Hưng', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '796'),
(577, 34, '80', 'Huyện Vĩnh Hưng', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '797'),
(578, 34, '80', 'Huyện Mộc Hóa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '798'),
(579, 34, '80', 'Huyện Tân Thạnh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '799'),
(580, 34, '80', 'Huyện Thạnh Hóa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '800'),
(581, 34, '80', 'Huyện Đức Huệ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '801'),
(582, 34, '80', 'Huyện Đức Hòa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '802'),
(583, 34, '80', 'Huyện Bến Lức', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '803'),
(584, 34, '80', 'Huyện Thủ Thừa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '804'),
(585, 34, '80', 'Huyện Tân Trụ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '805'),
(586, 34, '80', 'Huyện Cần Đước', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '806'),
(587, 34, '80', 'Huyện Cần Giuộc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '807'),
(588, 34, '80', 'Huyện Châu Thành', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '808'),
(589, 52, '82', 'Thành phố Mỹ Tho', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '815'),
(590, 52, '82', 'Thị xã Gò Công', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '816'),
(591, 52, '82', 'Thị xã Cai Lậy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '817'),
(592, 52, '82', 'Huyện Tân Phước', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '818'),
(593, 52, '82', 'Huyện Cái Bè', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '819'),
(594, 52, '82', 'Huyện Cai Lậy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '820'),
(595, 52, '82', 'Huyện Châu Thành', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '821'),
(596, 52, '82', 'Huyện Chợ Gạo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '822'),
(597, 52, '82', 'Huyện Gò Công Tây', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '823'),
(598, 52, '82', 'Huyện Gò Công Đông', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '824'),
(599, 52, '82', 'Huyện Tân Phú Đông', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '825'),
(600, 7, '83', 'Thành phố Bến Tre', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '829'),
(601, 7, '83', 'Huyện Châu Thành', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '831'),
(602, 7, '83', 'Huyện Chợ Lách', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '832'),
(603, 7, '83', 'Huyện Mỏ Cày Nam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '833'),
(604, 7, '83', 'Huyện Giồng Trôm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '834'),
(605, 7, '83', 'Huyện Bình Đại', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '835'),
(606, 7, '83', 'Huyện Ba Tri', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '836');
INSERT INTO `metabolic_market_tdistrict` (`nid`, `nid_province`, `ccode`, `cname`, `nstatus`, `nhome`, `cindex`, `niduser01`, `niduser02`, `ddate01`, `ddate02`, `maqh`) VALUES
(607, 7, '83', 'Huyện Thạnh Phú', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '837'),
(608, 7, '83', 'Huyện Mỏ Cày Bắc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '838'),
(609, 53, '84', 'Thành phố Trà Vinh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '842'),
(610, 53, '84', 'Huyện Càng Long', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '844'),
(611, 53, '84', 'Huyện Cầu Kè', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '845'),
(612, 53, '84', 'Huyện Tiểu Cần', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '846'),
(613, 53, '84', 'Huyện Châu Thành', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '847'),
(614, 53, '84', 'Huyện Cầu Ngang', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '848'),
(615, 53, '84', 'Huyện Trà Cú', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '849'),
(616, 53, '84', 'Huyện Duyên Hải', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '850'),
(617, 53, '84', 'Thị xã Duyên Hải', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '851'),
(618, 55, '86', 'Thành phố Vĩnh Long', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '855'),
(619, 55, '86', 'Huyện Long Hồ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '857'),
(620, 55, '86', 'Huyện Mang Thít', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '858'),
(621, 55, '86', 'Huyện  Vũng Liêm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '859'),
(622, 55, '86', 'Huyện Tam Bình', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '860'),
(623, 55, '86', 'Thị xã Bình Minh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '861'),
(624, 55, '86', 'Huyện Trà Ôn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '862'),
(625, 55, '86', 'Huyện Bình Tân', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '863'),
(626, 18, '87', 'Thành phố Cao Lãnh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '866'),
(627, 18, '87', 'Thành phố Sa Đéc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '867'),
(628, 18, '87', 'Thành phố Hồng Ngự', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '868'),
(629, 18, '87', 'Huyện Tân Hồng', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '869'),
(630, 18, '87', 'Huyện Hồng Ngự', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '870'),
(631, 18, '87', 'Huyện Tam Nông', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '871'),
(632, 18, '87', 'Huyện Tháp Mười', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '872'),
(633, 18, '87', 'Huyện Cao Lãnh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '873'),
(634, 18, '87', 'Huyện Thanh Bình', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '874'),
(635, 18, '87', 'Huyện Lấp Vò', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '875'),
(636, 18, '87', 'Huyện Lai Vung', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '876'),
(637, 18, '87', 'Huyện Châu Thành', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '877'),
(638, 1, '89', 'Thành phố Long Xuyên', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '883'),
(639, 1, '89', 'Thành phố Châu Đốc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '884'),
(640, 1, '89', 'Huyện An Phú', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '886'),
(641, 1, '89', 'Thị xã Tân Châu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '887'),
(642, 1, '89', 'Huyện Phú Tân', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '888'),
(643, 1, '89', 'Huyện Châu Phú', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '889'),
(644, 1, '89', 'Huyện Tịnh Biên', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '890'),
(645, 1, '89', 'Huyện Tri Tôn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '891'),
(646, 1, '89', 'Huyện Châu Thành', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '892'),
(647, 1, '89', 'Huyện Chợ Mới', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '893'),
(648, 1, '89', 'Huyện Thoại Sơn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '894'),
(649, 28, '91', 'Thành phố Rạch Giá', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '899'),
(650, 28, '91', 'Thành phố Hà Tiên', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '900'),
(651, 28, '91', 'Huyện Kiên Lương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '902'),
(652, 28, '91', 'Huyện Hòn Đất', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '903'),
(653, 28, '91', 'Huyện Tân Hiệp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '904'),
(654, 28, '91', 'Huyện Châu Thành', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '905'),
(655, 28, '91', 'Huyện Giồng Riềng', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '906'),
(656, 28, '91', 'Huyện Gò Quao', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '907'),
(657, 28, '91', 'Huyện An Biên', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '908'),
(658, 28, '91', 'Huyện An Minh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '909'),
(659, 28, '91', 'Huyện Vĩnh Thuận', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '910'),
(660, 28, '91', 'Thành phố Phú Quốc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '911'),
(661, 28, '91', 'Huyện Kiên Hải', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '912'),
(662, 28, '91', 'Huyện U Minh Thượng', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '913'),
(663, 28, '91', 'Huyện Giang Thành', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '914'),
(664, 59, '92', 'Quận Ninh Kiều', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '916'),
(665, 59, '92', 'Quận Ô Môn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '917'),
(666, 59, '92', 'Quận Bình Thuỷ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '918'),
(667, 59, '92', 'Quận Cái Răng', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '919'),
(668, 59, '92', 'Quận Thốt Nốt', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '923'),
(669, 59, '92', 'Huyện Vĩnh Thạnh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '924'),
(670, 59, '92', 'Huyện Cờ Đỏ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '925'),
(671, 59, '92', 'Huyện Phong Điền', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '926'),
(672, 59, '92', 'Huyện Thới Lai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '927'),
(673, 24, '93', 'Thành phố Vị Thanh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '930'),
(674, 24, '93', 'Thành phố Ngã Bảy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '931'),
(675, 24, '93', 'Huyện Châu Thành A', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '932'),
(676, 24, '93', 'Huyện Châu Thành', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '933'),
(677, 24, '93', 'Huyện Phụng Hiệp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '934'),
(678, 24, '93', 'Huyện Vị Thuỷ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '935'),
(679, 24, '93', 'Huyện Long Mỹ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '936'),
(680, 24, '93', 'Thị xã Long Mỹ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '937'),
(681, 45, '94', 'Thành phố Sóc Trăng', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '941'),
(682, 45, '94', 'Huyện Châu Thành', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '942'),
(683, 45, '94', 'Huyện Kế Sách', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '943'),
(684, 45, '94', 'Huyện Mỹ Tú', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '944'),
(685, 45, '94', 'Huyện Cù Lao Dung', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '945'),
(686, 45, '94', 'Huyện Long Phú', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '946'),
(687, 45, '94', 'Huyện Mỹ Xuyên', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '947'),
(688, 45, '94', 'Thị xã Ngã Năm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '948'),
(689, 45, '94', 'Huyện Thạnh Trị', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '949'),
(690, 45, '94', 'Thị xã Vĩnh Châu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '950'),
(691, 45, '94', 'Huyện Trần Đề', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '951'),
(692, 5, '95', 'Thành phố Bạc Liêu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '954'),
(693, 5, '95', 'Huyện Hồng Dân', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '956'),
(694, 5, '95', 'Huyện Phước Long', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '957'),
(695, 5, '95', 'Huyện Vĩnh Lợi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '958'),
(696, 5, '95', 'Thị xã Giá Rai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '959'),
(697, 5, '95', 'Huyện Đông Hải', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '960'),
(698, 5, '95', 'Huyện Hoà Bình', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '961'),
(699, 12, '96', 'Thành phố Cà Mau', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '964'),
(700, 12, '96', 'Huyện U Minh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '966'),
(701, 12, '96', 'Huyện Thới Bình', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '967'),
(702, 12, '96', 'Huyện Trần Văn Thời', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '968'),
(703, 12, '96', 'Huyện Cái Nước', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '969'),
(704, 12, '96', 'Huyện Đầm Dơi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '970'),
(705, 12, '96', 'Huyện Năm Căn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '971'),
(706, 12, '96', 'Huyện Phú Tân', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '972'),
(707, 12, '96', 'Huyện Ngọc Hiển', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '973');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `metabolic_market_tfranchise_leads`
--

CREATE TABLE `metabolic_market_tfranchise_leads` (
  `nid` int(11) NOT NULL,
  `cfullname` varchar(150) NOT NULL COMMENT 'Họ tên người liên hệ / đại diện',
  `cphone` varchar(50) NOT NULL COMMENT 'Số điện thoại liên hệ',
  `cemail` varchar(150) NOT NULL COMMENT 'Email liên hệ',
  `corganization` varchar(250) DEFAULT NULL COMMENT 'Tên tổ chức / Doanh nghiệp / Đơn vị vận hành',
  `cprovince` varchar(100) NOT NULL COMMENT 'Tỉnh / Thành phố dự kiến triển khai',
  `cmodel_interested` varchar(100) NOT NULL COMMENT 'Mô hình quan tâm: CONNECT_PARTNER, EXPRESS_KIOSK, FULL_CENTER',
  `cpremise_status` varchar(100) DEFAULT NULL COMMENT 'Tình trạng mặt bằng: Đã có, Đang tìm kiếm, Không cần mặt bằng',
  `cexperience` text DEFAULT NULL COMMENT 'Kinh nghiệm trong ngành y tế, thể thao, dinh dưỡng hoặc F&B',
  `cbudget_range` varchar(100) DEFAULT NULL COMMENT 'Khoảng ngân sách dự kiến tự nguyện',
  `ctimeline` varchar(100) DEFAULT NULL COMMENT 'Thời điểm dự kiến triển khai: Dưới 30 ngày, 1-3 tháng, 3-6 tháng, Đang tìm hiểu',
  `cnotes` text DEFAULT NULL COMMENT 'Ghi chú & Đề xuất hợp tác cụ thể',
  `nagree_terms` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1: Đã đồng ý điều khoản xử lý dữ liệu y tế (Mã 35)',
  `nagree_marketing` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1: Đồng ý nhận tin marketing (opt-in không chọn sẵn)',
  `nstatus` int(11) NOT NULL DEFAULT 1 COMMENT '1: Đăng ký mới, 2: Đã trao đổi sơ bộ, 3: Đánh giá phù hợp, 4: Đề xuất mô hình & thẩm định, 5: Ký thỏa thuận, 6: Từ chối / Chờ',
  `cadmin_notes` text DEFAULT NULL COMMENT 'Ghi chú thẩm định từ bộ phận phát triển đối tác Qcare',
  `ddate_created` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Thời điểm gửi yêu cầu'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Bảng tiếp nhận đối tác Hợp tác & Nhượng quyền Gọn Khoẻ (Mã 28-34)' ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `metabolic_market_tfranchise_leads`
--

INSERT INTO `metabolic_market_tfranchise_leads` (`nid`, `cfullname`, `cphone`, `cemail`, `corganization`, `cprovince`, `cmodel_interested`, `cpremise_status`, `cexperience`, `cbudget_range`, `ctimeline`, `cnotes`, `nagree_terms`, `nagree_marketing`, `nstatus`, `cadmin_notes`, `ddate_created`) VALUES
(1, 'Trần Minh Khang', '0909123456', 'khang.tran@fitlife.vn', 'FitLife Gym & Pilates Studio', 'TP. Hồ Chí Minh (Quận 7)', 'CONNECT_PARTNER', 'Đã có mặt bằng sẵn 450m2', 'Vận hành chuỗi 3 phòng tập Pilates và Gym 5 năm', '300 - 500 triệu', '1-3 tháng', 'Mong muốn kết nối khách hàng tập luyện sang khám chuyển hóa và đặt quầy sản phẩm dinh dưỡng Metabolic Market tại studio.', 1, 1, 2, NULL, '2026-10-29 11:12:55'),
(2, 'Nguyễn Thị Bích Ngọc', '0918765432', 'bichngoc.spa@gmail.com', 'Viện Chăm Sóc Sức Khỏe Ngọc Anh', 'Bình Dương (Thủ Dầu Một)', 'EXPRESS_KIOSK', 'Mặt bằng phố đi bộ 80m2', 'Có kinh nghiệm 8 năm spa & làm đẹp công nghệ cao', '500 - 800 triệu', 'Trong 30 ngày', 'Quan tâm mô hình Gọn Khoẻ Express để cung cấp dịch vụ đo chỉ số chuyển hóa và bữa ăn dinh dưỡng.', 1, 0, 1, NULL, '2026-10-29 11:12:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `metabolic_market_tfunction`
--

CREATE TABLE `metabolic_market_tfunction` (
  `nid` int(11) NOT NULL,
  `cfunction` varchar(150) DEFAULT NULL,
  `cnote` varchar(150) DEFAULT NULL,
  `cdel` char(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `metabolic_market_tgallery`
--

CREATE TABLE `metabolic_market_tgallery` (
  `nid` int(11) NOT NULL,
  `ccode` varchar(50) DEFAULT NULL,
  `ctitle` varchar(250) DEFAULT NULL,
  `cimage` varchar(100) DEFAULT NULL,
  `cnote` text DEFAULT NULL,
  `nstatus` int(11) DEFAULT NULL,
  `nspecial` int(11) DEFAULT NULL,
  `cindex` char(4) DEFAULT NULL,
  `niduser01` int(11) DEFAULT NULL,
  `niduser02` int(11) DEFAULT NULL,
  `ddate01` date DEFAULT NULL,
  `ddate02` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `metabolic_market_tgallery_detail`
--

CREATE TABLE `metabolic_market_tgallery_detail` (
  `nid` int(11) NOT NULL,
  `nid_product` int(11) DEFAULT NULL,
  `cgallery_detail` varchar(250) DEFAULT NULL,
  `cimage_full` varchar(250) DEFAULT NULL,
  `cimage_thumb` varchar(250) DEFAULT NULL,
  `cnote` text DEFAULT NULL,
  `nstatus` char(1) DEFAULT '1',
  `nindex` char(4) DEFAULT NULL,
  `ctag` varchar(200) DEFAULT NULL,
  `ddate01` datetime DEFAULT '1977-01-01 00:00:00',
  `ddate02` datetime DEFAULT '1977-01-01 00:00:00',
  `niduser01` int(11) DEFAULT NULL,
  `niduser02` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `metabolic_market_tgallery_img`
--

CREATE TABLE `metabolic_market_tgallery_img` (
  `nid` int(11) NOT NULL,
  `nid_product` int(11) DEFAULT NULL,
  `cimg_color` varchar(250) DEFAULT NULL,
  `ctitle` varchar(250) DEFAULT NULL,
  `cimg` varchar(250) DEFAULT NULL,
  `nstatus` int(11) DEFAULT NULL,
  `nhome` int(11) DEFAULT NULL,
  `cindex` int(11) DEFAULT NULL,
  `niduser01` int(11) DEFAULT NULL,
  `niduser02` int(11) DEFAULT NULL,
  `ddate01` date DEFAULT NULL,
  `ddate02` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `metabolic_market_tguest_online`
--

CREATE TABLE `metabolic_market_tguest_online` (
  `nid` int(11) NOT NULL,
  `csession_id` char(100) DEFAULT NULL,
  `ctime_log` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=FIXED;

--
-- Đang đổ dữ liệu cho bảng `metabolic_market_tguest_online`
--

INSERT INTO `metabolic_market_tguest_online` (`nid`, `csession_id`, `ctime_log`) VALUES
(304571, 'u0ehf632n33cjjbodlfg0993b5', 1480738928);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `metabolic_market_tjourney_stages`
--

CREATE TABLE `metabolic_market_tjourney_stages` (
  `nid` int(11) NOT NULL,
  `ccode` varchar(50) NOT NULL COMMENT 'CHECK, LOSE, REMIT, KEEP',
  `cname` varchar(100) NOT NULL COMMENT 'Tên giai đoạn',
  `csubtitle` varchar(250) NOT NULL COMMENT 'Mục tiêu lâm sàng',
  `cicon` varchar(50) NOT NULL COMMENT 'FontAwesome icon class',
  `cdescription` text NOT NULL COMMENT 'Mô tả chi tiết giải pháp',
  `ctarget_categories` text NOT NULL COMMENT 'Danh mục sản phẩm trọng tâm',
  `norder` int(11) NOT NULL DEFAULT 1,
  `nstatus` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Bảng 4 giai đoạn hành trình chăm sóc sức khỏe chuyển hóa' ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `metabolic_market_tjourney_stages`
--

INSERT INTO `metabolic_market_tjourney_stages` (`nid`, `ccode`, `cname`, `csubtitle`, `cicon`, `cdescription`, `ctarget_categories`, `norder`, `nstatus`) VALUES
(1, 'CHECK', 'Hiểu tình trạng', 'Sàng lọc ban đầu, đo lường các chỉ số sinh học và chuyển hóa nghỉ', 'fa-stethoscope', 'Thiết lập bức tranh sức khỏe cá nhân hóa: đo thành phần mỡ - cơ, huyết áp, kháng insulin và theo dõi đường huyết liên tục tại nhà.', 'Smart scale · BP monitor · Body composition · Cảm biến đường huyết CGM', 1, 1),
(2, 'LOSE', 'Giảm cân an toàn', 'Kiểm soát calo, bảo toàn khối cơ nạc và hỗ trợ chuyển hóa', 'fa-fire-flame-curved', 'Đồng hành trong phác đồ giảm mỡ y khoa: bổ sung đạm tinh khiết, cân bằng điện giải, hỗ trợ hệ tiêu hóa và bữa ăn chỉ số đường huyết thấp (Low GI).', 'Protein isolate · Hydration · GI support · Convenient medical nutrition', 2, 1),
(3, 'REMIT', 'Phục hồi chuyển hóa', 'Cải thiện độ nhạy insulin, cân bằng hệ vi sinh đường ruột và vi chất', 'fa-heart-pulse', 'Tối ưu chức năng tế bào và ổn định đường huyết: bổ sung vi chất đặc hiệu (Berberine, Inositol, Chromium), chất xơ hòa tan và men vi sinh chuyển hóa.', 'Metabolic nutrition · Prebiotic Fiber · Insulin sensitivity support · Monitoring', 3, 1),
(4, 'KEEP', 'Duy trì dài hạn', 'Chống tái tăng cân Yo-yo, xây dựng thói quen dinh dưỡng bền vững', 'fa-shield-halved', 'Bảo vệ thành quả giảm cân bền vững: dinh dưỡng tiện lợi Grab & Go, theo dõi vận động hằng ngày và cộng đồng đồng hành KEEP Club.', 'Grab & Go nutrition · Activity tracking · Targeted lifestyle support · KEEP Club', 4, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `metabolic_market_tmaterial_products`
--

CREATE TABLE `metabolic_market_tmaterial_products` (
  `nid` int(11) NOT NULL,
  `ccode` varchar(50) DEFAULT NULL,
  `cmaterial_products` varchar(250) DEFAULT NULL,
  `eng_cmaterial_products` varchar(250) DEFAULT NULL,
  `ctag` varchar(500) DEFAULT NULL,
  `cimage` varchar(100) DEFAULT NULL,
  `cimage_365` varchar(100) NOT NULL DEFAULT '',
  `cicon` varchar(100) DEFAULT NULL,
  `cnote` text DEFAULT NULL,
  `cnote_365` text DEFAULT NULL,
  `nstatus` int(11) DEFAULT 1,
  `nspecial` int(11) DEFAULT 0,
  `cindex` char(4) DEFAULT NULL,
  `niduser01` int(11) DEFAULT 1,
  `niduser02` int(11) DEFAULT NULL,
  `ddate01` date DEFAULT '2026-09-16',
  `ddate02` date DEFAULT NULL,
  `cproduct_fb` varchar(250) DEFAULT NULL,
  `cbanner1` varchar(250) DEFAULT NULL,
  `cbanner2` varchar(250) DEFAULT NULL,
  `cbanner3` varchar(250) DEFAULT NULL,
  `clink_banner1` varchar(250) DEFAULT NULL,
  `clink_banner2` varchar(250) DEFAULT NULL,
  `clink_banner3` varchar(250) DEFAULT NULL,
  `nid_group` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `metabolic_market_tmember`
--

CREATE TABLE `metabolic_market_tmember` (
  `nid` int(11) NOT NULL,
  `cname` varchar(100) DEFAULT NULL,
  `ccode` varchar(100) DEFAULT NULL,
  `cid` varchar(100) DEFAULT NULL,
  `cemail` varchar(200) DEFAULT NULL,
  `cphone` varchar(100) DEFAULT NULL,
  `cbirthday` varchar(200) DEFAULT NULL,
  `cgender` varchar(50) DEFAULT NULL,
  `caddress` varchar(500) DEFAULT NULL,
  `cnote` varchar(500) DEFAULT NULL,
  `nstatus` int(11) NOT NULL DEFAULT 1,
  `ddate01` datetime NOT NULL DEFAULT '1977-01-01 00:00:00',
  `ddate02` datetime NOT NULL DEFAULT '1977-01-01 00:00:00',
  `nid_department` int(11) DEFAULT NULL,
  `nid_package` int(11) DEFAULT NULL,
  `cpurchase_date` varchar(100) DEFAULT NULL,
  `cpurchase_time` varchar(100) DEFAULT NULL,
  `cfirst_date_use` varchar(100) DEFAULT NULL,
  `cfirst_time_use` varchar(100) DEFAULT NULL,
  `cend_date_use` varchar(100) DEFAULT NULL,
  `cend_time_use` varchar(100) DEFAULT NULL,
  `ctype` char(1) DEFAULT '1',
  `cuserid` varchar(30) DEFAULT NULL,
  `cpassword` varchar(100) DEFAULT NULL,
  `cisadmin` varchar(11) DEFAULT '0',
  `niduser01` int(11) DEFAULT NULL,
  `niduser02` int(11) DEFAULT NULL,
  `cstatus` char(1) DEFAULT '1',
  `cimage` varchar(500) DEFAULT NULL,
  `ctime` varchar(100) DEFAULT NULL,
  `ctime_search` varchar(100) DEFAULT NULL,
  `cpoint` int(11) DEFAULT 0,
  `cactive` char(1) DEFAULT '0',
  `cactive_code` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `metabolic_market_tmenu`
--

CREATE TABLE `metabolic_market_tmenu` (
  `nid` int(11) NOT NULL,
  `nid_parent` int(11) NOT NULL,
  `cmenu` varchar(50) NOT NULL,
  `cicon_name` varchar(100) DEFAULT NULL,
  `cnode` char(1) DEFAULT NULL,
  `csystem` char(1) DEFAULT '1',
  `nid_function` int(11) DEFAULT NULL,
  `cindex` varchar(50) NOT NULL DEFAULT '999',
  `cbasic` char(1) NOT NULL DEFAULT '1',
  `cnote` varchar(150) DEFAULT NULL,
  `cstatus` char(1) NOT NULL DEFAULT '1',
  `cdel` char(1) NOT NULL DEFAULT '0',
  `ddate01` datetime NOT NULL DEFAULT '1977-01-01 00:00:00',
  `ddate02` datetime NOT NULL DEFAULT '1977-01-01 00:00:00',
  `niduser01` int(11) NOT NULL DEFAULT 1,
  `niduser02` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `metabolic_market_tmenu`
--

INSERT INTO `metabolic_market_tmenu` (`nid`, `nid_parent`, `cmenu`, `cicon_name`, `cnode`, `csystem`, `nid_function`, `cindex`, `cbasic`, `cnote`, `cstatus`, `cdel`, `ddate01`, `ddate02`, `niduser01`, `niduser02`) VALUES
(6, 2, 'mnu.DMNhanVien', 'class=\"icon-16-user_list\"', NULL, '1', 2, '0001.0001.0009.', '0', NULL, '1', '0', '1977-01-01 00:00:00', '1977-01-01 00:00:00', 1, 1),
(7, 4, 'mnu.PhanQUyenChucNang', 'class=\"icon-16-default\"', NULL, '1', 5, '0001.0005.0001.', '0', NULL, '1', '0', '1977-01-01 00:00:00', '1977-01-01 00:00:00', 1, 1),
(10, 1, 'mnu.DoiMatKhau', 'class=\"icon-16-user\"', NULL, '1', 8, '0001.0009.', '1', NULL, '1', '0', '1977-01-01 00:00:00', '1977-01-01 00:00:00', 1, 1),
(1, 1, 'mnu.HeThong', '', '', '1', 0, '0001.', '1', '', '1', '0', '1977-01-01 00:00:00', '1977-01-01 00:00:00', 1, 1),
(2, 1, 'mnu.DMHeThong', 'class=\"icon-16-config\"', '0', '1', 0, '0001.0001.', '0', '', '1', '0', '1977-01-01 00:00:00', '1977-01-01 00:00:00', 1, 1),
(8, 1, '', '', '', '1', 0, '0001.0008.', '0', '', '1', '0', '1977-01-01 00:00:00', '1977-01-01 00:00:00', 1, 1),
(4, 1, 'mnu.PhanQuyen', 'class=\"icon-16-user\"', '0', '1', 2, '0001.0005.', '0', '', '1', '0', '1977-01-01 00:00:00', '1977-01-01 00:00:00', 1, 1),
(9, 1, 'mnu.DMConFig', 'class=\"icon-16-config\"', '', '1', 0, '0001.0008.', '0', '', '0', '1', '1977-01-01 00:00:00', '1977-01-01 00:00:00', 1, 1),
(11, 11, 'mnu.TinTuc', 'class=\"icon-16-notebook\"', '', '1', 0, '0002.', '0', '', '1', '0', '1977-01-01 00:00:00', '1977-01-01 00:00:00', 1, 1),
(12, 11, 'mnu.DMNhomTin', 'class=\"icon-16-notebook\"', '', '1', 11, '0002.0020.', '0', '', '1', '0', '1977-01-01 00:00:00', '1977-01-01 00:00:00', 1, 1),
(13, 11, 'mnu.DMTintuc', 'class=\"icon-16-notebook\"', '', '1', 10, '0002.0005.', '0', '', '1', '0', '1977-01-01 00:00:00', '1977-01-01 00:00:00', 1, 1),
(14, 14, 'mnu.SanPham', 'class=\"icon-16-default\"', '', '1', 0, '0005.', '0', '', '1', '0', '1977-01-01 00:00:00', '1977-01-01 00:00:00', 1, 1),
(15, 14, 'mnu.DMNhomChatLieu', 'class=\"icon-16-default\"', '', '1', 41, '0005.0025.', '0', '', '1', '0', '1977-01-01 00:00:00', '1977-01-01 00:00:00', 1, 1),
(16, 14, 'mnu.DMNhomSanPham', 'class=\"icon-16-default\"', '', '1', 40, '0005.0020.', '0', '', '1', '0', '1977-01-01 00:00:00', '1977-01-01 00:00:00', 1, 1),
(17, 14, 'mnu.DMSanPham', 'class=\"icon-16-default\"', '', '1', 42, '0005.0015.', '0', '', '1', '0', '1977-01-01 00:00:00', '1977-01-01 00:00:00', 1, 1),
(18, 18, 'mnu.Order', 'class=\"icon-16-menu\"', '', '1', 0, '0010.', '0', '', '0', '1', '1977-01-01 00:00:00', '1977-01-01 00:00:00', 1, 1),
(19, 18, 'mnu.DMKhachHang', 'class=\"icon-16-menu\"', '', '1', 43, '0010.0005.', '0', '', '0', '1', '1977-01-01 00:00:00', '1977-01-01 00:00:00', 1, 1),
(20, 18, 'mnu.DMTrangThaiHoaDon', 'class=\"icon-16-menu\"', '', '1', 44, '0010.0010.', '0', '', '0', '1', '1977-01-01 00:00:00', '1977-01-01 00:00:00', 1, 1),
(21, 18, 'mnu.QLOrder', 'class=\"icon-16-menu\"', '', '1', 45, '0010.0015.', '0', '', '1', '1', '1977-01-01 00:00:00', '1977-01-01 00:00:00', 1, 1),
(22, 22, 'mnu.ChucNang', 'class=\"icon-16-config\"', '', '1', 0, '0015.', '0', '', '1', '0', '1977-01-01 00:00:00', '1977-01-01 00:00:00', 1, 1),
(23, 22, 'mnu.DMSupportOnline', 'class=\"icon-16-system\"', '', '1', 28, '0015.0001.', '0', '', '0', '0', '1977-01-01 00:00:00', '1977-01-01 00:00:00', 1, 1),
(24, 24, 'mnu.TroGiup', 'class=\"icon-16-help\"', '', '1', 0, '0020.', '0', '', '1', '1', '1977-01-01 00:00:00', '1977-01-01 00:00:00', 1, 1),
(25, 24, 'mnu.HuongDanSuDung', 'class=\"icon-16-help\"', '', '1', 46, '0020.0001.', '0', '', '1', '1', '1977-01-01 00:00:00', '1977-01-01 00:00:00', 1, 1),
(26, 24, 'mnu.CauTrucWebsite', 'class=\"icon-16-help\"', '', '1', 47, '0020.0005.', '0', '', '1', '1', '1977-01-01 00:00:00', '1977-01-01 00:00:00', 1, 1),
(27, 11, 'mnu.DMLoaiTin', 'class=\"icon-16-notebook\"', '', '1', 100, '0002.0025.', '0', '', '1', '0', '1977-01-01 00:00:00', '1977-01-01 00:00:00', 1, 1),
(29, 22, 'mnu.DMModule', 'class=\"icon-16-system\"', '', '1', 101, '0015.0005.', '0', '', '1', '0', '1977-01-01 00:00:00', '1977-01-01 00:00:00', 1, 1),
(30, 22, 'mnu.DMFaq', 'class=\"icon-16-system\"', '', '1', 102, '0008.0010.', '0', '', '1', '0', '1977-01-01 00:00:00', '1977-01-01 00:00:00', 1, 1),
(31, 22, 'mnu.DMRecruit', 'class=\"icon-16-system\"', '', '1', 103, '0015.0015.', '0', '', '1', '0', '1977-01-01 00:00:00', '1977-01-01 00:00:00', 1, 1),
(32, 22, 'mnu.DMWeblink', 'class=\"icon-16-system\"', '', '1', 104, '0015.0020.', '0', '', '1', '0', '1977-01-01 00:00:00', '1977-01-01 00:00:00', 1, 1),
(33, 22, 'mnu.DMbanner_images', 'class=\"icon-16-system\"', '', '1', 105, '0015.0025.', '0', '', '1', '0', '1977-01-01 00:00:00', '1977-01-01 00:00:00', 1, 1),
(34, 22, 'mnu.DMemail_manager', 'class=\"icon-16-system\"', '', '1', 106, '0015.0035.', '0', '', '1', '0', '1977-01-01 00:00:00', '1977-01-01 00:00:00', 1, 1),
(35, 22, 'mnu.DMcomment_manager', 'class=\"icon-16-system\"', '', '1', 107, '0015.0030.', '0', '', '1', '0', '1977-01-01 00:00:00', '1977-01-01 00:00:00', 1, 1),
(36, 14, 'mnu.NganhNghe', 'class=\"icon-16-default\"', '', '1', 0, '0004.', '0', '', '1', '0', '1977-01-01 00:00:00', '1977-01-01 00:00:00', 1, 1),
(37, 14, 'mnu.DMNhomChatLieuNganhNghe', 'class=\"icon-16-default\"', '', '1', 110, '0004.0025.', '0', '', '1', '0', '1977-01-01 00:00:00', '1977-01-01 00:00:00', 1, 1),
(38, 14, 'mnu.DMNhomNganhNghe', 'class=\"icon-16-default\"', '', '1', 109, '0004.0020.', '0', '', '1', '0', '1977-01-01 00:00:00', '1977-01-01 00:00:00', 1, 1),
(39, 14, 'mnu.DMNganhNghe', 'class=\"icon-16-default\"', '', '1', 108, '0004.0015.', '0', '', '1', '0', '1977-01-01 00:00:00', '1977-01-01 00:00:00', 1, 1),
(40, 14, 'mnu.FAQ', 'class=\"icon-16-default\"', '', '1', 0, '0008.', '0', '', '1', '0', '1977-01-01 00:00:00', '1977-01-01 00:00:00', 1, 1),
(41, 22, 'mnu.DMCatFaq', 'class=\"icon-16-system\"', '', '1', 111, '0008.0005.', '0', '', '1', '0', '1977-01-01 00:00:00', '1977-01-01 00:00:00', 1, 1),
(42, 22, 'Image manage', 'class=\"icon-16-system\"', '', '1', 112, '0015.0006.', '0', '', '1', '0', '1977-01-01 00:00:00', '1977-01-01 00:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `metabolic_market_tmodule`
--

CREATE TABLE `metabolic_market_tmodule` (
  `nid` int(11) NOT NULL,
  `ccode` varchar(500) DEFAULT NULL,
  `cmodule` varchar(250) DEFAULT NULL,
  `ctag` varchar(500) DEFAULT NULL,
  `cimage` varchar(100) DEFAULT NULL,
  `cnote` text DEFAULT NULL,
  `eng_cnote` text DEFAULT NULL,
  `nstatus` int(11) DEFAULT NULL,
  `cindex` char(4) DEFAULT NULL,
  `niduser01` int(11) DEFAULT NULL,
  `niduser02` int(11) DEFAULT NULL,
  `ddate01` date DEFAULT NULL,
  `ddate02` date DEFAULT NULL,
  `clink` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `metabolic_market_tnews`
--

CREATE TABLE `metabolic_market_tnews` (
  `nid` int(11) NOT NULL,
  `nid_section_news` int(11) DEFAULT NULL,
  `nid_cat_news` int(11) NOT NULL,
  `ccode` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `ctitle` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `cview` varchar(4) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `cauthor` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `ctag` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `nhit` int(11) DEFAULT NULL,
  `nimg` char(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `alwcmt` char(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `cshort_content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `ccontent` text DEFAULT NULL,
  `cimage_height` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `cimage_thumb` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `cimage_fb` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `cimage_iphone` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `nactive` int(11) DEFAULT NULL,
  `nstatus` int(11) DEFAULT NULL,
  `chome` char(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `cnote` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `cindex` char(4) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `niduser01` int(11) DEFAULT NULL,
  `niduser02` int(11) DEFAULT NULL,
  `ctime` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '0',
  `ddate01` date DEFAULT NULL,
  `ddate02` date DEFAULT NULL,
  `cmphq` char(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '0',
  `cmp365` char(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `cdate` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `cproduct_str_id` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `metabolic_market_torder`
--

CREATE TABLE `metabolic_market_torder` (
  `nid` int(11) NOT NULL,
  `ccode` varchar(50) DEFAULT NULL,
  `ccode_vtp` varchar(50) DEFAULT NULL,
  `nid_customer` int(11) DEFAULT NULL,
  `nid_order_status` int(11) DEFAULT NULL,
  `nid_ship_type` int(11) DEFAULT NULL,
  `cfullname` varchar(250) DEFAULT NULL,
  `caddress` varchar(250) DEFAULT NULL,
  `caddress_full` varchar(250) DEFAULT NULL,
  `cphone` varchar(15) DEFAULT NULL,
  `cemail` varchar(100) DEFAULT NULL,
  `ddate_delivery` date DEFAULT NULL,
  `cnote` varchar(500) DEFAULT NULL,
  `cadmin_note` varchar(500) DEFAULT NULL,
  `nstatus` int(11) DEFAULT 0,
  `cflash` varchar(1) DEFAULT NULL,
  `ntotal` varchar(20) DEFAULT NULL,
  `nsale` varchar(20) DEFAULT NULL,
  `cship` varchar(100) DEFAULT NULL,
  `cindex` char(4) DEFAULT NULL,
  `ctime` varchar(150) DEFAULT NULL,
  `cgiam_gia` varchar(20) DEFAULT NULL,
  `niduser01` int(11) DEFAULT NULL,
  `niduser02` int(11) DEFAULT NULL,
  `ddate01` varchar(50) DEFAULT NULL,
  `ctime01` varchar(50) DEFAULT NULL,
  `ddate02` date DEFAULT NULL,
  `nid_code_sale` int(11) DEFAULT NULL,
  `ctime_search` varchar(100) DEFAULT NULL,
  `nid_province` int(11) DEFAULT NULL,
  `nid_district` int(11) DEFAULT NULL,
  `nid_ward` int(11) DEFAULT NULL,
  `cshop` varchar(20) DEFAULT NULL,
  `ccode_sale` varchar(10) DEFAULT NULL,
  `nid_prize` int(11) DEFAULT NULL,
  `cname_prize` varchar(250) DEFAULT NULL,
  `utm_source` varchar(50) DEFAULT NULL,
  `cip` varchar(50) NOT NULL,
  `nid_member` int(11) DEFAULT NULL,
  `ctype` char(1) DEFAULT '0',
  `ctime_giao_hang` varchar(50) DEFAULT NULL,
  `cmethod` char(1) NOT NULL DEFAULT '1',
  `vnp_TmnCode` varchar(20) DEFAULT NULL,
  `vnp_Amount` varchar(20) DEFAULT NULL,
  `vnp_BankCode` varchar(30) DEFAULT NULL,
  `vnp_BankTranNo` varchar(300) DEFAULT NULL,
  `vnp_CardType` varchar(30) DEFAULT NULL,
  `vnp_PayDate` varchar(20) DEFAULT NULL,
  `vnp_OrderInfo` varchar(300) DEFAULT NULL,
  `vnp_TransactionNo` varchar(20) DEFAULT NULL,
  `vnp_ResponseCode` varchar(5) DEFAULT NULL,
  `vnp_TransactionStatus` varchar(5) DEFAULT NULL,
  `vnp_TxnRef` varchar(150) DEFAULT NULL,
  `vnp_SecureHashType` varchar(20) DEFAULT NULL,
  `vnp_SecureHash` varchar(300) DEFAULT NULL,
  `csite` varchar(50) DEFAULT NULL,
  `cin_hoa_don` char(1) DEFAULT NULL,
  `cvoucher` varchar(50) DEFAULT NULL,
  `caddress_type` char(1) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `metabolic_market_torder_detail`
--

CREATE TABLE `metabolic_market_torder_detail` (
  `nid_product` int(11) NOT NULL,
  `nid_order` int(11) NOT NULL,
  `nquantity` int(11) DEFAULT NULL,
  `cprice` varchar(20) DEFAULT NULL,
  `cprice_sale` varchar(20) DEFAULT NULL,
  `cflash_sale` varchar(1) DEFAULT NULL,
  `niscolor` int(11) NOT NULL DEFAULT 0,
  `cmua_kem` char(1) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `metabolic_market_torder_status`
--

CREATE TABLE `metabolic_market_torder_status` (
  `nid` int(11) NOT NULL,
  `ccode` varchar(50) DEFAULT NULL,
  `corder_status` varchar(250) DEFAULT NULL,
  `cnote` text DEFAULT NULL,
  `nstatus` int(11) DEFAULT NULL,
  `cindex` char(4) DEFAULT NULL,
  `niduser01` int(11) DEFAULT NULL,
  `niduser02` int(11) DEFAULT NULL,
  `ddate01` date DEFAULT NULL,
  `ddate02` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `metabolic_market_torder_status`
--

INSERT INTO `metabolic_market_torder_status` (`nid`, `ccode`, `corder_status`, `cnote`, `nstatus`, `cindex`, `niduser01`, `niduser02`, `ddate01`, `ddate02`) VALUES
(1, '001', 'Mới nhận', 'Mới nhận', 1, '1', 2, NULL, '2010-07-23', NULL),
(2, '002', 'Đang giao hàng', NULL, 1, '2', 2, NULL, '2010-07-23', NULL),
(3, '003', 'Hoàn tất', NULL, 1, '3', 2, NULL, '2010-07-23', NULL),
(4, '004', 'Đã hủy', 'Đã hủy đơn hàng', 1, '4', 2, NULL, '2010-07-23', '0000-00-00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `metabolic_market_tpartnership_models`
--

CREATE TABLE `metabolic_market_tpartnership_models` (
  `nid` int(11) NOT NULL,
  `ccode` varchar(50) NOT NULL COMMENT 'CONSIGNMENT, SHELF_FEE_SHARE, CATEGORY_PARTNER, PROGRAM_PARTNER',
  `cname` varchar(150) NOT NULL COMMENT 'Tên mô hình hợp tác',
  `ctag_badge` varchar(50) NOT NULL COMMENT 'Phân loại: Mặc định / Selective / Anchor / Strategic',
  `cinventory_rule` varchar(250) NOT NULL COMMENT 'Quy định quản lý hàng tồn kho',
  `crevenue_rule` varchar(250) NOT NULL COMMENT 'Cơ chế doanh thu và chi phí',
  `csuitability` text NOT NULL COMMENT 'Đối tượng và nhóm sản phẩm phù hợp',
  `cicon` varchar(50) NOT NULL,
  `norder` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='4 mô hình hợp tác thương mại Metabolic Market' ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `metabolic_market_tpartnership_models`
--

INSERT INTO `metabolic_market_tpartnership_models` (`nid`, `ccode`, `cname`, `ctag_badge`, `cinventory_rule`, `crevenue_rule`, `csuitability`, `cicon`, `norder`) VALUES
(1, 'CONSIGNMENT', 'Ký gửi (Consignment)', 'Mặc định', 'Đối tác chủ động giữ và quản lý inventory tại kho; Gọn Khoẻ lưu mẫu trưng bày tại quầy', 'Revenue share theo tỷ lệ thỏa thuận trên mỗi đơn hàng thành công', 'Phù hợp phần lớn SKU tiêu chuẩn (Low GI foods, Trà thảo mộc, Bữa ăn tiện lợi)', 'fa-boxes-packing', 1),
(2, 'SHELF_FEE_SHARE', 'Shelf fee + Share', 'Selective', 'Đối tác ký gửi tồn kho, cam kết hạn lưu kho và bổ sung refill định kỳ', 'Fixed fee (Phí vị trí kệ vàng) + Revenue share ưu đãi', 'Phù hợp thương hiệu cần gia tăng visibility mạnh mẽ và vị trí trưng bày nổi bật tại clinic', 'fa-layer-group', 2),
(3, 'CATEGORY_PARTNER', 'Category partnership', 'Anchor', 'Cam kết lượng hàng độc quyền cho từng phân khúc ngành hàng trong thời gian thỏa thuận', 'Naming/Activation độc quyền chuyên mục + Fixed value + Revenue share', 'Phù hợp đối tác đầu ngành (Anchor Partner) muốn đồng hành dài hạn và bảo trợ chuyên đề', 'fa-award', 3),
(4, 'PROGRAM_PARTNER', 'Program partnership', 'Strategic', 'Tích hợp tồn kho sâu vào hệ thống cấp phát liệu trình y khoa của phòng khám', 'Sản phẩm được bundle trực tiếp vào các gói điều trị (GON3, GON5, GON10, KEEP)', 'Dành riêng cho thiết bị công nghệ (CGM, Smart scale) và dinh dưỡng y khoa chuyên biệt', 'fa-handshake-angle', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `metabolic_market_tpartner_leads`
--

CREATE TABLE `metabolic_market_tpartner_leads` (
  `nid` int(11) NOT NULL,
  `cbrand_name` varchar(250) NOT NULL COMMENT 'Tên thương hiệu / Nhà phân phối',
  `ccontact_person` varchar(150) NOT NULL COMMENT 'Người đại diện phụ trách',
  `cphone` varchar(50) NOT NULL COMMENT 'Số điện thoại liên hệ',
  `cemail` varchar(150) NOT NULL COMMENT 'Email doanh nghiệp',
  `cmodel` varchar(50) NOT NULL DEFAULT 'CONSIGNMENT' COMMENT 'Mô hình: CONSIGNMENT, SHELF_FEE_SHARE, CATEGORY_PARTNER, PROGRAM_PARTNER',
  `csku_count` int(11) NOT NULL DEFAULT 3 COMMENT 'Số lượng SKU đăng ký (Pilot khuyến nghị 2-5 SKU)',
  `ccategory` varchar(150) NOT NULL COMMENT 'Nhóm ngành hàng (Dinh dưỡng Low GI, CGM & Thiết bị, Vi chất, Lifestyle)',
  `cproduct_summary` text DEFAULT NULL COMMENT 'Mô tả tóm tắt SKU, nhãn và claims lâm sàng dự kiến',
  `cdocument_links` text DEFAULT NULL COMMENT 'Link Google Drive / Hồ sơ pháp lý, công bố, COA/GMP',
  `cproposed_terms` text DEFAULT NULL COMMENT 'Đề xuất tỷ lệ revenue share / phí trưng bày shelf fee',
  `cmeeting_slot` varchar(100) DEFAULT NULL COMMENT 'Khung thời gian đề xuất họp 45 phút',
  `nstatus` int(11) NOT NULL DEFAULT 1 COMMENT '1: Mới gửi F-MM01, 2: Đang thẩm định y khoa (48-72h), 3: Chốt Term sheet, 4: Pilot 90 ngày, 5: Từ chối',
  `cmedical_review_notes` text DEFAULT NULL COMMENT 'Ghi chú đánh giá từ Hội đồng Y khoa & Commercial',
  `ddate_created` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Thời điểm đăng ký'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Bảng tiếp nhận hồ sơ hợp tác đối tác Metabolic Market (F-MM01)' ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `metabolic_market_tpermission`
--

CREATE TABLE `metabolic_market_tpermission` (
  `nid` int(11) NOT NULL,
  `nid_user_type` int(11) DEFAULT NULL,
  `nid_access` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=FIXED;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `metabolic_market_tpilot_kpis`
--

CREATE TABLE `metabolic_market_tpilot_kpis` (
  `nid` int(11) NOT NULL,
  `cphase_code` varchar(20) NOT NULL COMMENT 'D0, D30, D60, D90',
  `ctitle` varchar(150) NOT NULL COMMENT 'Tên giai đoạn pilot',
  `ctimeline_label` varchar(100) NOT NULL COMMENT 'Thời gian thực hiện',
  `ctasks` text NOT NULL COMMENT 'Nhiệm vụ trọng tâm',
  `ckpi_benchmarks` text NOT NULL COMMENT 'Mục tiêu định lượng',
  `norder` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Tiêu chí đánh giá & mốc tiến độ Pilot 90 ngày' ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `metabolic_market_tpilot_kpis`
--

INSERT INTO `metabolic_market_tpilot_kpis` (`nid`, `cphase_code`, `ctitle`, `ctimeline_label`, `ctasks`, `ckpi_benchmarks`, `norder`) VALUES
(1, 'D0', 'Chốt SKU & Ký Term Sheet', 'Ngày 0 - Khởi động', 'Thẩm định hồ sơ pháp lý, phê duyệt 2-5 SKU đầu tiên, chốt mô hình thương mại và khóa planogram kệ trưng bày tại phòng khám.', 'Thời gian thẩm định Medical + Commercial: 48 - 72 giờ', 1),
(2, 'D30', 'Đo lường Sell-through & Fit', 'Ngày 30 - Đánh giá đợt 1', 'Theo dõi tốc độ bán lẻ tại chỗ, phản hồi trải nghiệm từ bệnh nhân và tính tương thích với phác đồ điều trị của bác sĩ.', 'Attach rate >= 30% · Buyer rate >= 25%', 2),
(3, 'D60', 'Đo lường Repeat & Economics', 'Ngày 60 - Tối ưu hóa', 'Đánh giá tỷ lệ mua lại, tối ưu tồn kho refill, đo lường tỷ suất đóng góp biên và quản lý vòng đời cận date.', 'Repeat day 60 >= 25% · Gross contribution > 20% · Expiry < 1%', 3),
(4, 'D90', 'Tổng kết: Scale / Revise / Delist', 'Ngày 90 - Mở rộng quy mô', 'Hội đồng thương mại quyết định nhân rộng SKU sang toàn hệ thống phòng khám, điều chỉnh cấu trúc hoặc delist.', 'Partner SLA >= 95% · Tiền đề mở rộng chuỗi phòng khám', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `metabolic_market_tproducts`
--

CREATE TABLE `metabolic_market_tproducts` (
  `nid` int(11) NOT NULL,
  `nid_material_products` int(11) DEFAULT NULL,
  `nid_cat_products` int(11) DEFAULT NULL,
  `nid_brand_products` int(11) DEFAULT NULL,
  `ctype` int(11) DEFAULT NULL,
  `ccode` varchar(150) DEFAULT NULL,
  `cproducts` varchar(250) DEFAULT NULL,
  `cloai_tin` char(1) DEFAULT NULL,
  `ctag` varchar(500) DEFAULT NULL,
  `nview` int(11) DEFAULT 0,
  `fprice` float(12,0) DEFAULT NULL,
  `fprice_sale` float(12,0) DEFAULT NULL,
  `cdescription` text DEFAULT NULL,
  `fb_cdescription` varchar(500) DEFAULT NULL,
  `cgioi_thieu` text DEFAULT NULL,
  `cdia_diem` varchar(200) DEFAULT NULL,
  `nid_loai_tin` int(11) DEFAULT 0,
  `nid_loai_bds` int(11) DEFAULT 0,
  `nid_province` int(11) DEFAULT 0,
  `nid_district` int(11) DEFAULT 0,
  `nid_huong` int(11) DEFAULT NULL,
  `cdien_tich` varchar(10) DEFAULT NULL,
  `eng_cdetail` text DEFAULT NULL,
  `cdetail` text DEFAULT NULL,
  `cimage` varchar(100) DEFAULT NULL,
  `cproduct_fb` varchar(150) DEFAULT NULL,
  `cimage_resize` varchar(100) DEFAULT NULL,
  `nspecial_products` int(11) DEFAULT 0,
  `cnote` text DEFAULT NULL,
  `eng_cnote` text DEFAULT NULL,
  `nstatus` int(11) DEFAULT 1,
  `ncheck` int(11) DEFAULT 1,
  `nhome` int(11) DEFAULT 0,
  `nnew` int(11) DEFAULT 1,
  `cindex` varchar(4) DEFAULT NULL,
  `niduser01` int(11) DEFAULT 1,
  `niduser02` int(11) DEFAULT NULL,
  `ddate01` date DEFAULT '2026-09-16',
  `ddate02` date DEFAULT NULL,
  `ctime_update` varchar(20) DEFAULT NULL,
  `cphong_an` char(1) DEFAULT '0',
  `cnha_bep` char(1) DEFAULT '0',
  `csan_thuong` char(1) DEFAULT '0',
  `ccho_de_xe` char(1) DEFAULT '0',
  `cchinh_chu` char(1) DEFAULT '0',
  `cchieu_ngang` varchar(10) DEFAULT '0',
  `cchieu_dai` varchar(10) DEFAULT NULL,
  `cso_lau` varchar(10) DEFAULT NULL,
  `cso_phong_ngu` varchar(10) DEFAULT NULL,
  `cphap_ly` varchar(100) DEFAULT NULL,
  `cduong_truoc_nha` varchar(10) DEFAULT NULL,
  `nspecial` int(11) DEFAULT 0,
  `ccode_product` varchar(50) DEFAULT NULL,
  `ckeyword` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `metabolic_market_tproduct_categories`
--

CREATE TABLE `metabolic_market_tproduct_categories` (
  `nid` int(11) NOT NULL,
  `ccode` varchar(50) NOT NULL COMMENT 'MEAL_NUTRITION, PROTEIN_FIBER, HEALTH_DEVICES, FITNESS_TOOLS',
  `cname` varchar(150) NOT NULL COMMENT 'Tên nhóm danh mục',
  `cdescription` text DEFAULT NULL COMMENT 'Mô tả định hướng y khoa & tiêu chuẩn tuyển chọn',
  `cicon` varchar(50) NOT NULL DEFAULT 'fa-box' COMMENT 'Icon FontAwesome',
  `norder` int(11) NOT NULL DEFAULT 1,
  `nstatus` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='4 Nhóm danh mục chuẩn y khoa của Metabolic Market (Mã 23)' ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `metabolic_market_tproduct_categories`
--

INSERT INTO `metabolic_market_tproduct_categories` (`nid`, `ccode`, `cname`, `cdescription`, `cicon`, `norder`, `nstatus`) VALUES
(1, 'MEAL_NUTRITION', 'Dinh dưỡng & Bữa ăn thuận tiện', 'Các giải pháp bữa ăn thay thế low GI, snack lành mạnh và thực phẩm kiểm soát chuyển hóa tiện lợi hàng ngày.', 'fa-utensils', 1, 1),
(2, 'PROTEIN_FIBER', 'Bổ sung Đạm & Chất xơ', 'Đạm Isolate tinh khiết bảo vệ khối cơ khi giảm mỡ và phức hợp chất xơ hòa tan nuôi dưỡng microbiome đường ruột.', 'fa-seedling', 2, 1),
(3, 'HEALTH_DEVICES', 'Thiết bị theo dõi tại nhà', 'Cảm biến CGM đo glucose liên tục, cân phân tích thành phần cơ thể y tế và máy đo huyết áp thông minh.', 'fa-laptop-medical', 3, 1),
(4, 'FITNESS_TOOLS', 'Dụng cụ hỗ trợ vận động', 'Dụng cụ tập luyện kháng lực tại nhà, đai phục hồi và hỗ trợ kích hoạt chuyển hóa tiêu hao năng lượng.', 'fa-dumbbell', 4, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `metabolic_market_tproduct_images`
--

CREATE TABLE `metabolic_market_tproduct_images` (
  `nid` int(11) NOT NULL,
  `nid_product` int(11) DEFAULT NULL,
  `cimage` varchar(100) DEFAULT NULL,
  `cindex` varchar(500) DEFAULT NULL,
  `cnote` varchar(25) DEFAULT NULL,
  `niduser01` int(11) DEFAULT NULL,
  `niduser02` int(11) DEFAULT NULL,
  `ddate01` datetime DEFAULT NULL,
  `ddate02` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `metabolic_market_tsection_news`
--

CREATE TABLE `metabolic_market_tsection_news` (
  `nid` int(11) NOT NULL,
  `ccode` varchar(50) DEFAULT NULL,
  `csection_news` varchar(250) DEFAULT NULL,
  `ctag` varchar(500) DEFAULT NULL,
  `cimage` varchar(100) DEFAULT NULL,
  `cicon` varchar(100) DEFAULT NULL,
  `cnote` text DEFAULT NULL,
  `nstatus` int(11) DEFAULT NULL,
  `cindex` char(4) DEFAULT NULL,
  `niduser01` int(11) DEFAULT NULL,
  `niduser02` int(11) DEFAULT NULL,
  `ddate01` date DEFAULT NULL,
  `ddate02` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `metabolic_market_tsection_news`
--

INSERT INTO `metabolic_market_tsection_news` (`nid`, `ccode`, `csection_news`, `ctag`, `cimage`, `cicon`, `cnote`, `nstatus`, `cindex`, `niduser01`, `niduser02`, `ddate01`, `ddate02`) VALUES
(6, 'anmycomputer-news', 'anmycomputer News', '', '', '', 'anmycomputer News', 1, '6', 746, 1, '2011-05-10', '2013-07-24');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `metabolic_market_tarticle`
--
ALTER TABLE `metabolic_market_tarticle`
  ADD PRIMARY KEY (`nid`) USING BTREE;

--
-- Chỉ mục cho bảng `metabolic_market_tbanner_images`
--
ALTER TABLE `metabolic_market_tbanner_images`
  ADD PRIMARY KEY (`nid`) USING BTREE;

--
-- Chỉ mục cho bảng `metabolic_market_tbrand_products`
--
ALTER TABLE `metabolic_market_tbrand_products`
  ADD PRIMARY KEY (`nid`) USING BTREE;

--
-- Chỉ mục cho bảng `metabolic_market_tcat_news`
--
ALTER TABLE `metabolic_market_tcat_news`
  ADD PRIMARY KEY (`nid`) USING BTREE;

--
-- Chỉ mục cho bảng `metabolic_market_tcat_products`
--
ALTER TABLE `metabolic_market_tcat_products`
  ADD PRIMARY KEY (`nid`) USING BTREE;

--
-- Chỉ mục cho bảng `metabolic_market_tclinical_tiers`
--
ALTER TABLE `metabolic_market_tclinical_tiers`
  ADD PRIMARY KEY (`nid`) USING BTREE,
  ADD UNIQUE KEY `ccode` (`ccode`) USING BTREE;

--
-- Chỉ mục cho bảng `metabolic_market_tcolor`
--
ALTER TABLE `metabolic_market_tcolor`
  ADD PRIMARY KEY (`nid`) USING BTREE;

--
-- Chỉ mục cho bảng `metabolic_market_tconfig`
--
ALTER TABLE `metabolic_market_tconfig`
  ADD PRIMARY KEY (`nid`) USING BTREE;

--
-- Chỉ mục cho bảng `metabolic_market_tcookie`
--
ALTER TABLE `metabolic_market_tcookie`
  ADD PRIMARY KEY (`nid`) USING BTREE;

--
-- Chỉ mục cho bảng `metabolic_market_tcurated_products`
--
ALTER TABLE `metabolic_market_tcurated_products`
  ADD PRIMARY KEY (`nid`) USING BTREE,
  ADD UNIQUE KEY `ccode` (`ccode`) USING BTREE,
  ADD KEY `idx_stage` (`cstage_code`) USING BTREE,
  ADD KEY `idx_tier` (`ctier_code`) USING BTREE;

--
-- Chỉ mục cho bảng `metabolic_market_tcustomer`
--
ALTER TABLE `metabolic_market_tcustomer`
  ADD PRIMARY KEY (`nid`) USING BTREE;

--
-- Chỉ mục cho bảng `metabolic_market_tdistrict`
--
ALTER TABLE `metabolic_market_tdistrict`
  ADD PRIMARY KEY (`nid`) USING BTREE;

--
-- Chỉ mục cho bảng `metabolic_market_tfranchise_leads`
--
ALTER TABLE `metabolic_market_tfranchise_leads`
  ADD PRIMARY KEY (`nid`) USING BTREE,
  ADD KEY `idx_phone` (`cphone`) USING BTREE,
  ADD KEY `idx_status` (`nstatus`) USING BTREE,
  ADD KEY `idx_model` (`cmodel_interested`) USING BTREE;

--
-- Chỉ mục cho bảng `metabolic_market_tfunction`
--
ALTER TABLE `metabolic_market_tfunction`
  ADD PRIMARY KEY (`nid`) USING BTREE;

--
-- Chỉ mục cho bảng `metabolic_market_tgallery`
--
ALTER TABLE `metabolic_market_tgallery`
  ADD PRIMARY KEY (`nid`) USING BTREE;

--
-- Chỉ mục cho bảng `metabolic_market_tgallery_detail`
--
ALTER TABLE `metabolic_market_tgallery_detail`
  ADD PRIMARY KEY (`nid`) USING BTREE;

--
-- Chỉ mục cho bảng `metabolic_market_tgallery_img`
--
ALTER TABLE `metabolic_market_tgallery_img`
  ADD PRIMARY KEY (`nid`) USING BTREE;

--
-- Chỉ mục cho bảng `metabolic_market_tguest_online`
--
ALTER TABLE `metabolic_market_tguest_online`
  ADD PRIMARY KEY (`nid`) USING BTREE;

--
-- Chỉ mục cho bảng `metabolic_market_tjourney_stages`
--
ALTER TABLE `metabolic_market_tjourney_stages`
  ADD PRIMARY KEY (`nid`) USING BTREE,
  ADD UNIQUE KEY `ccode` (`ccode`) USING BTREE;

--
-- Chỉ mục cho bảng `metabolic_market_tmaterial_products`
--
ALTER TABLE `metabolic_market_tmaterial_products`
  ADD PRIMARY KEY (`nid`) USING BTREE;

--
-- Chỉ mục cho bảng `metabolic_market_tmember`
--
ALTER TABLE `metabolic_market_tmember`
  ADD PRIMARY KEY (`nid`) USING BTREE;

--
-- Chỉ mục cho bảng `metabolic_market_tmenu`
--
ALTER TABLE `metabolic_market_tmenu`
  ADD PRIMARY KEY (`nid`) USING BTREE;

--
-- Chỉ mục cho bảng `metabolic_market_tmodule`
--
ALTER TABLE `metabolic_market_tmodule`
  ADD PRIMARY KEY (`nid`) USING BTREE;

--
-- Chỉ mục cho bảng `metabolic_market_tnews`
--
ALTER TABLE `metabolic_market_tnews`
  ADD PRIMARY KEY (`nid`) USING BTREE;

--
-- Chỉ mục cho bảng `metabolic_market_torder`
--
ALTER TABLE `metabolic_market_torder`
  ADD PRIMARY KEY (`nid`) USING BTREE;

--
-- Chỉ mục cho bảng `metabolic_market_torder_detail`
--
ALTER TABLE `metabolic_market_torder_detail`
  ADD PRIMARY KEY (`nid_product`,`nid_order`,`niscolor`) USING BTREE;

--
-- Chỉ mục cho bảng `metabolic_market_torder_status`
--
ALTER TABLE `metabolic_market_torder_status`
  ADD PRIMARY KEY (`nid`) USING BTREE;

--
-- Chỉ mục cho bảng `metabolic_market_tpartnership_models`
--
ALTER TABLE `metabolic_market_tpartnership_models`
  ADD PRIMARY KEY (`nid`) USING BTREE,
  ADD UNIQUE KEY `ccode` (`ccode`) USING BTREE;

--
-- Chỉ mục cho bảng `metabolic_market_tpartner_leads`
--
ALTER TABLE `metabolic_market_tpartner_leads`
  ADD PRIMARY KEY (`nid`) USING BTREE,
  ADD KEY `idx_brand` (`cbrand_name`) USING BTREE,
  ADD KEY `idx_status` (`nstatus`) USING BTREE;

--
-- Chỉ mục cho bảng `metabolic_market_tpermission`
--
ALTER TABLE `metabolic_market_tpermission`
  ADD PRIMARY KEY (`nid`) USING BTREE;

--
-- Chỉ mục cho bảng `metabolic_market_tpilot_kpis`
--
ALTER TABLE `metabolic_market_tpilot_kpis`
  ADD PRIMARY KEY (`nid`) USING BTREE;

--
-- Chỉ mục cho bảng `metabolic_market_tproducts`
--
ALTER TABLE `metabolic_market_tproducts`
  ADD PRIMARY KEY (`nid`) USING BTREE;

--
-- Chỉ mục cho bảng `metabolic_market_tproduct_categories`
--
ALTER TABLE `metabolic_market_tproduct_categories`
  ADD PRIMARY KEY (`nid`) USING BTREE,
  ADD UNIQUE KEY `ccode` (`ccode`) USING BTREE;

--
-- Chỉ mục cho bảng `metabolic_market_tproduct_images`
--
ALTER TABLE `metabolic_market_tproduct_images`
  ADD PRIMARY KEY (`nid`) USING BTREE,
  ADD KEY `nid` (`nid`,`nid_product`,`cimage`,`ddate01`,`ddate02`) USING BTREE;

--
-- Chỉ mục cho bảng `metabolic_market_tsection_news`
--
ALTER TABLE `metabolic_market_tsection_news`
  ADD PRIMARY KEY (`nid`) USING BTREE;

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `metabolic_market_tarticle`
--
ALTER TABLE `metabolic_market_tarticle`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `metabolic_market_tbrand_products`
--
ALTER TABLE `metabolic_market_tbrand_products`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `metabolic_market_tcat_news`
--
ALTER TABLE `metabolic_market_tcat_news`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `metabolic_market_tcat_products`
--
ALTER TABLE `metabolic_market_tcat_products`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `metabolic_market_tclinical_tiers`
--
ALTER TABLE `metabolic_market_tclinical_tiers`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `metabolic_market_tcolor`
--
ALTER TABLE `metabolic_market_tcolor`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `metabolic_market_tconfig`
--
ALTER TABLE `metabolic_market_tconfig`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `metabolic_market_tcookie`
--
ALTER TABLE `metabolic_market_tcookie`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `metabolic_market_tcurated_products`
--
ALTER TABLE `metabolic_market_tcurated_products`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `metabolic_market_tcustomer`
--
ALTER TABLE `metabolic_market_tcustomer`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `metabolic_market_tdistrict`
--
ALTER TABLE `metabolic_market_tdistrict`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=708;

--
-- AUTO_INCREMENT cho bảng `metabolic_market_tfranchise_leads`
--
ALTER TABLE `metabolic_market_tfranchise_leads`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `metabolic_market_tfunction`
--
ALTER TABLE `metabolic_market_tfunction`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `metabolic_market_tgallery`
--
ALTER TABLE `metabolic_market_tgallery`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `metabolic_market_tgallery_detail`
--
ALTER TABLE `metabolic_market_tgallery_detail`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `metabolic_market_tgallery_img`
--
ALTER TABLE `metabolic_market_tgallery_img`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `metabolic_market_tguest_online`
--
ALTER TABLE `metabolic_market_tguest_online`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=304572;

--
-- AUTO_INCREMENT cho bảng `metabolic_market_tjourney_stages`
--
ALTER TABLE `metabolic_market_tjourney_stages`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `metabolic_market_tmaterial_products`
--
ALTER TABLE `metabolic_market_tmaterial_products`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `metabolic_market_tmember`
--
ALTER TABLE `metabolic_market_tmember`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `metabolic_market_tmenu`
--
ALTER TABLE `metabolic_market_tmenu`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `metabolic_market_tmodule`
--
ALTER TABLE `metabolic_market_tmodule`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `metabolic_market_tnews`
--
ALTER TABLE `metabolic_market_tnews`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `metabolic_market_torder`
--
ALTER TABLE `metabolic_market_torder`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `metabolic_market_torder_detail`
--
ALTER TABLE `metabolic_market_torder_detail`
  MODIFY `nid_product` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `metabolic_market_torder_status`
--
ALTER TABLE `metabolic_market_torder_status`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `metabolic_market_tpartnership_models`
--
ALTER TABLE `metabolic_market_tpartnership_models`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `metabolic_market_tpartner_leads`
--
ALTER TABLE `metabolic_market_tpartner_leads`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `metabolic_market_tpermission`
--
ALTER TABLE `metabolic_market_tpermission`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `metabolic_market_tpilot_kpis`
--
ALTER TABLE `metabolic_market_tpilot_kpis`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `metabolic_market_tproducts`
--
ALTER TABLE `metabolic_market_tproducts`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `metabolic_market_tproduct_categories`
--
ALTER TABLE `metabolic_market_tproduct_categories`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `metabolic_market_tproduct_images`
--
ALTER TABLE `metabolic_market_tproduct_images`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `metabolic_market_tsection_news`
--
ALTER TABLE `metabolic_market_tsection_news`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

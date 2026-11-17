-- ==============================================================================
-- METABOLIC MARKET by Gọn Khoẻ (Qcare) - DATABASE SCHEMA ADD-ON
-- Tài liệu tham chiếu: Gon_Khoe_Metabolic_Market_Partner_Pitch_Deck_v1.0.pdf
-- Quy tắc: Tạo bảng mới chuẩn mực, hỗ trợ nạp dữ liệu bằng tay trực tiếp (phpMyAdmin / Navicat)
-- Không kiểm tra tồn tại tự động trong mã nguồn PHP
-- ==============================================================================

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- -----------------------------------------------------------------------------
-- 1. BẢNG TIẾP NHẬN ĐỐI TÁC & HỒ SƠ PILOT (FORM F-MM01)
-- -----------------------------------------------------------------------------
DROP TABLE IF EXISTS `metabolic_market_tpartner_leads`;
CREATE TABLE `metabolic_market_tpartner_leads` (
  `nid` INT NOT NULL AUTO_INCREMENT,
  `cbrand_name` VARCHAR(250) NOT NULL COMMENT 'Tên thương hiệu / Nhà phân phối',
  `ccontact_person` VARCHAR(150) NOT NULL COMMENT 'Người đại diện phụ trách',
  `cphone` VARCHAR(50) NOT NULL COMMENT 'Số điện thoại liên hệ',
  `cemail` VARCHAR(150) NOT NULL COMMENT 'Email doanh nghiệp',
  `cmodel` VARCHAR(50) NOT NULL DEFAULT 'CONSIGNMENT' COMMENT 'Mô hình: CONSIGNMENT, SHELF_FEE_SHARE, CATEGORY_PARTNER, PROGRAM_PARTNER',
  `csku_count` INT NOT NULL DEFAULT 3 COMMENT 'Số lượng SKU đăng ký (Pilot khuyến nghị 2-5 SKU)',
  `ccategory` VARCHAR(150) NOT NULL COMMENT 'Nhóm ngành hàng (Dinh dưỡng Low GI, CGM & Thiết bị, Vi chất, Lifestyle)',
  `cproduct_summary` TEXT NULL COMMENT 'Mô tả tóm tắt SKU, nhãn và claims lâm sàng dự kiến',
  `cdocument_links` TEXT NULL COMMENT 'Link Google Drive / Hồ sơ pháp lý, công bố, COA/GMP',
  `cproposed_terms` TEXT NULL COMMENT 'Đề xuất tỷ lệ revenue share / phí trưng bày shelf fee',
  `cmeeting_slot` VARCHAR(100) NULL COMMENT 'Khung thời gian đề xuất họp 45 phút',
  `nstatus` INT NOT NULL DEFAULT 1 COMMENT '1: Mới gửi F-MM01, 2: Đang thẩm định y khoa (48-72h), 3: Chốt Term sheet, 4: Pilot Cộng Hòa, 5: Từ chối',
  `cmedical_review_notes` TEXT NULL COMMENT 'Ghi chú đánh giá từ Hội đồng Y khoa & Commercial',
  `ddate_created` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm đăng ký',
  PRIMARY KEY (`nid`) USING BTREE,
  INDEX `idx_brand` (`cbrand_name`) USING BTREE,
  INDEX `idx_status` (`nstatus`) USING BTREE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = 'Bảng tiếp nhận hồ sơ hợp tác đối tác Metabolic Market (F-MM01)';

-- -----------------------------------------------------------------------------
-- 2. BẢNG PHÂN TẦNG QUẢN TRỊ Y KHOA (CLINICAL GOVERNANCE TIERS)
-- Guardrail: Commercial access != clinical recommendation
-- -----------------------------------------------------------------------------
DROP TABLE IF EXISTS `metabolic_market_tclinical_tiers`;
CREATE TABLE `metabolic_market_tclinical_tiers` (
  `nid` INT NOT NULL AUTO_INCREMENT,
  `ccode` VARCHAR(50) NOT NULL UNIQUE COMMENT 'AVAILABLE, CURATED, CLINICALLY_RECOMMENDED',
  `ctitle` VARCHAR(150) NOT NULL COMMENT 'Tên cấp độ',
  `cbadge_text` VARCHAR(100) NOT NULL COMMENT 'Nhãn hiển thị trên SKU',
  `cbadge_color` VARCHAR(50) NOT NULL DEFAULT 'green' COMMENT 'Màu sắc định danh: emerald, amber, sky',
  `capproval_body` VARCHAR(250) NOT NULL COMMENT 'Hội đồng phê duyệt: Commercial + Compliance / Medical + Commercial / Treating Clinician',
  `ccriteria` TEXT NOT NULL COMMENT 'Tiêu chuẩn thẩm định',
  `cguardrail_notice` TEXT NOT NULL COMMENT 'Cảnh báo y khoa ràng buộc',
  `norder` INT NOT NULL DEFAULT 1,
  `nstatus` INT NOT NULL DEFAULT 1,
  PRIMARY KEY (`nid`) USING BTREE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = 'Phân cấp quản trị y tế cho sản phẩm thương mại';

-- Dữ liệu chuẩn cho bảng Clinical Tiers
INSERT INTO `metabolic_market_tclinical_tiers` (`nid`, `ccode`, `ctitle`, `cbadge_text`, `cbadge_color`, `capproval_body`, `ccriteria`, `cguardrail_notice`, `norder`, `nstatus`) VALUES
(1, 'AVAILABLE', 'Đủ điều kiện bán lẻ', 'AVAILABLE', 'sky', 'Commercial + Compliance', 'Đầy đủ hồ sơ pháp lý, công bố Bộ Y Tế, tem nhãn phụ, nguồn gốc xuất xứ rõ ràng và hạn sử dụng an toàn.', 'Sản phẩm lưu hành thương mại, bệnh nhân tự chọn theo nhu cầu hỗ trợ cá nhân.', 1, 1),
(2, 'CURATED', 'Gọn Khoẻ Curated', 'GỌN KHOẺ CURATED', 'emerald', 'Medical + Commercial', 'Đã qua Hội đồng Y khoa Gọn Khoẻ thẩm định chuyên sâu về tính an toàn, chất lượng nguyên liệu, độ tinh khiết và mức độ tương thích chuyển hóa.', 'Sản phẩm được tuyển chọn hỗ trợ lối sống, không tự ý thay đổi thuốc điều trị.', 2, 1),
(3, 'CLINICALLY_RECOMMENDED', 'Bác sĩ chỉ định theo phác đồ', 'CLINICALLY RECOMMENDED', 'amber', 'Treating Clinician / Medical Director', 'Chỉ định riêng biệt cho từng ca bệnh hoặc phân nhóm pathway điều trị cụ thể sau khi có kết quả khám & xét nghiệm.', 'Chỉ sử dụng khi có sự hướng dẫn và giám sát trực tiếp từ Bác sĩ điều trị.', 3, 1);

-- -----------------------------------------------------------------------------
-- 3. BẢNG 4 GIAI ĐOẠN HÀNH TRÌNH BỆNH NHÂN (PATIENT JOURNEY)
-- CHECK -> LOSE -> REMIT -> KEEP
-- -----------------------------------------------------------------------------
DROP TABLE IF EXISTS `metabolic_market_tjourney_stages`;
CREATE TABLE `metabolic_market_tjourney_stages` (
  `nid` INT NOT NULL AUTO_INCREMENT,
  `ccode` VARCHAR(50) NOT NULL UNIQUE COMMENT 'CHECK, LOSE, REMIT, KEEP',
  `cname` VARCHAR(100) NOT NULL COMMENT 'Tên giai đoạn',
  `csubtitle` VARCHAR(250) NOT NULL COMMENT 'Mục tiêu lâm sàng',
  `cicon` VARCHAR(50) NOT NULL COMMENT 'FontAwesome icon class',
  `cdescription` TEXT NOT NULL COMMENT 'Mô tả chi tiết giải pháp',
  `ctarget_categories` TEXT NOT NULL COMMENT 'Danh mục sản phẩm trọng tâm',
  `norder` INT NOT NULL DEFAULT 1,
  `nstatus` INT NOT NULL DEFAULT 1,
  PRIMARY KEY (`nid`) USING BTREE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = 'Bảng 4 giai đoạn hành trình chăm sóc sức khỏe chuyển hóa';

-- Dữ liệu chuẩn cho 4 giai đoạn hành trình
INSERT INTO `metabolic_market_tjourney_stages` (`nid`, `ccode`, `cname`, `csubtitle`, `cicon`, `cdescription`, `ctarget_categories`, `norder`, `nstatus`) VALUES
(1, 'CHECK', 'Hiểu tình trạng', 'Sàng lọc ban đầu, đo lường các chỉ số sinh học và chuyển hóa nghỉ', 'fa-stethoscope', 'Thiết lập bức tranh sức khỏe cá nhân hóa: đo thành phần mỡ - cơ, huyết áp, kháng insulin và theo dõi đường huyết liên tục tại nhà.', 'Smart scale · BP monitor · Body composition · Cảm biến đường huyết CGM', 1, 1),
(2, 'LOSE', 'Giảm cân an toàn', 'Kiểm soát calo, bảo toàn khối cơ nạc và hỗ trợ chuyển hóa', 'fa-fire-flame-curved', 'Đồng hành trong phác đồ giảm mỡ y khoa: bổ sung đạm tinh khiết, cân bằng điện giải, hỗ trợ hệ tiêu hóa và bữa ăn chỉ số đường huyết thấp (Low GI).', 'Protein isolate · Hydration · GI support · Convenient medical nutrition', 2, 1),
(3, 'REMIT', 'Phục hồi chuyển hóa', 'Cải thiện độ nhạy insulin, cân bằng hệ vi sinh đường ruột và vi chất', 'fa-heart-pulse', 'Tối ưu chức năng tế bào và ổn định đường huyết: bổ sung vi chất đặc hiệu (Berberine, Inositol, Chromium), chất xơ hòa tan và men vi sinh chuyển hóa.', 'Metabolic nutrition · Prebiotic Fiber · Insulin sensitivity support · Monitoring', 3, 1),
(4, 'KEEP', 'Duy trì dài hạn', 'Chống tái tăng cân Yo-yo, xây dựng thói quen dinh dưỡng bền vững', 'fa-shield-halved', 'Bảo vệ thành quả giảm cân bền vững: dinh dưỡng tiện lợi Grab & Go, theo dõi vận động hằng ngày và cộng đồng đồng hành KEEP Club.', 'Grab & Go nutrition · Activity tracking · Targeted lifestyle support · KEEP Club', 4, 1);

-- -----------------------------------------------------------------------------
-- 4. BẢNG CÁC PHƯƠNG THỨC HỢP TÁC ĐỐI TÁC (COMMERCIAL ARCHITECTURE)
-- -----------------------------------------------------------------------------
DROP TABLE IF EXISTS `metabolic_market_tpartnership_models`;
CREATE TABLE `metabolic_market_tpartnership_models` (
  `nid` INT NOT NULL AUTO_INCREMENT,
  `ccode` VARCHAR(50) NOT NULL UNIQUE COMMENT 'CONSIGNMENT, SHELF_FEE_SHARE, CATEGORY_PARTNER, PROGRAM_PARTNER',
  `cname` VARCHAR(150) NOT NULL COMMENT 'Tên mô hình hợp tác',
  `ctag_badge` VARCHAR(50) NOT NULL COMMENT 'Phân loại: Mặc định / Selective / Anchor / Strategic',
  `cinventory_rule` VARCHAR(250) NOT NULL COMMENT 'Quy định quản lý hàng tồn kho',
  `crevenue_rule` VARCHAR(250) NOT NULL COMMENT 'Cơ chế doanh thu và chi phí',
  `csuitability` TEXT NOT NULL COMMENT 'Đối tượng và nhóm sản phẩm phù hợp',
  `cicon` VARCHAR(50) NOT NULL,
  `norder` INT NOT NULL DEFAULT 1,
  PRIMARY KEY (`nid`) USING BTREE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = '4 mô hình hợp tác thương mại Metabolic Market';

-- Dữ liệu chuẩn cho 4 mô hình hợp tác
INSERT INTO `metabolic_market_tpartnership_models` (`nid`, `ccode`, `cname`, `ctag_badge`, `cinventory_rule`, `crevenue_rule`, `csuitability`, `cicon`, `norder`) VALUES
(1, 'CONSIGNMENT', 'Ký gửi (Consignment)', 'Mặc định', 'Đối tác chủ động giữ và quản lý inventory tại kho; Gọn Khoẻ lưu mẫu trưng bày tại quầy', 'Revenue share theo tỷ lệ thỏa thuận trên mỗi đơn hàng thành công', 'Phù hợp phần lớn SKU tiêu chuẩn (Low GI foods, Trà thảo mộc, Bữa ăn tiện lợi)', 'fa-boxes-packing', 1),
(2, 'SHELF_FEE_SHARE', 'Shelf fee + Share', 'Selective', 'Đối tác ký gửi tồn kho, cam kết hạn lưu kho và bổ sung refill định kỳ', 'Fixed fee (Phí vị trí kệ vàng) + Revenue share ưu đãi', 'Phù hợp thương hiệu cần gia tăng visibility mạnh mẽ và vị trí trưng bày nổi bật tại clinic', 'fa-layer-group', 2),
(3, 'CATEGORY_PARTNER', 'Category partnership', 'Anchor', 'Cam kết lượng hàng độc quyền cho từng phân khúc ngành hàng trong thời gian thỏa thuận', 'Naming/Activation độc quyền chuyên mục + Fixed value + Revenue share', 'Phù hợp đối tác đầu ngành (Anchor Partner) muốn đồng hành dài hạn và bảo trợ chuyên đề', 'fa-award', 3),
(4, 'PROGRAM_PARTNER', 'Program partnership', 'Strategic', 'Tích hợp tồn kho sâu vào hệ thống cấp phát liệu trình y khoa của phòng khám', 'Sản phẩm được bundle trực tiếp vào các gói điều trị (GON3, GON5, GON10, KEEP)', 'Dành riêng cho thiết bị công nghệ (CGM, Smart scale) và dinh dưỡng y khoa chuyên biệt', 'fa-handshake-angle', 4);

-- -----------------------------------------------------------------------------
-- 5. BẢNG LỘ TRÌNH PILOT 90 NGÀY TẠI CƠ SỞ CỘNG HÒA
-- -----------------------------------------------------------------------------
DROP TABLE IF EXISTS `metabolic_market_tpilot_kpis`;
CREATE TABLE `metabolic_market_tpilot_kpis` (
  `nid` INT NOT NULL AUTO_INCREMENT,
  `cphase_code` VARCHAR(20) NOT NULL COMMENT 'D0, D30, D60, D90',
  `ctitle` VARCHAR(150) NOT NULL COMMENT 'Tên giai đoạn pilot',
  `ctimeline_label` VARCHAR(100) NOT NULL COMMENT 'Thời gian thực hiện',
  `ctasks` TEXT NOT NULL COMMENT 'Nhiệm vụ trọng tâm',
  `ckpi_benchmarks` TEXT NOT NULL COMMENT 'Mục tiêu định lượng',
  `norder` INT NOT NULL DEFAULT 1,
  PRIMARY KEY (`nid`) USING BTREE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = 'Tiêu chí đánh giá & mốc tiến độ Pilot 90 ngày tại cơ sở Cộng Hòa';

-- Dữ liệu chuẩn lộ trình pilot 90 ngày
INSERT INTO `metabolic_market_tpilot_kpis` (`nid`, `cphase_code`, `ctitle`, `ctimeline_label`, `ctasks`, `ckpi_benchmarks`, `norder`) VALUES
(1, 'D0', 'Chốt SKU & Ký Term Sheet', 'Ngày 0 - Khởi động', 'Thẩm định hồ sơ pháp lý, phê duyệt 2-5 SKU đầu tiên, chốt mô hình thương mại và khóa planogram kệ trưng bày tại cơ sở Cộng Hòa.', 'Thời gian thẩm định Medical + Commercial: 48 - 72 giờ', 1),
(2, 'D30', 'Đo lường Sell-through & Fit', 'Ngày 30 - Đánh giá đợt 1', 'Theo dõi tốc độ bán lẻ tại chỗ, phản hồi trải nghiệm từ bệnh nhân và tính tương thích với phác đồ điều trị của bác sĩ.', 'Attach rate >= 30% · Buyer rate >= 25%', 2),
(3, 'D60', 'Đo lường Repeat & Economics', 'Ngày 60 - Tối ưu hóa', 'Đánh giá tỷ lệ mua lại, tối ưu tồn kho refill, đo lường tỷ suất đóng góp biên và quản lý vòng đời cận date.', 'Repeat day 60 >= 25% · Gross contribution > 20% · Expiry < 1%', 3),
(4, 'D90', 'Tổng kết: Scale / Revise / Delist', 'Ngày 90 - Mở rộng quy mô', 'Hội đồng thương mại quyết định nhân rộng SKU sang cơ sở Quận 5 & mạng lưới toàn quốc, điều chỉnh cấu trúc hoặc delist.', 'Partner SLA >= 95% · Tiền đề mở rộng chuỗi phòng khám', 4);

-- -----------------------------------------------------------------------------
-- 6. BẢNG SẢN PHẨM TUYỂN CHỌN METABOLIC MARKET (CURATED PRODUCTS)
-- -----------------------------------------------------------------------------
DROP TABLE IF EXISTS `metabolic_market_tcurated_products`;
CREATE TABLE `metabolic_market_tcurated_products` (
  `nid` INT NOT NULL AUTO_INCREMENT,
  `ccode` VARCHAR(100) NOT NULL UNIQUE COMMENT 'Mã SKU',
  `cname` VARCHAR(250) NOT NULL COMMENT 'Tên sản phẩm',
  `cstage_code` VARCHAR(50) NOT NULL COMMENT 'CHECK, LOSE, REMIT, KEEP',
  `ctier_code` VARCHAR(50) NOT NULL COMMENT 'AVAILABLE, CURATED, CLINICALLY_RECOMMENDED',
  `cbrand_name` VARCHAR(150) NOT NULL COMMENT 'Thương hiệu đối tác',
  `ccategory` VARCHAR(150) NOT NULL COMMENT 'Ngành hàng phân loại',
  `fprice` DECIMAL(12, 0) NOT NULL COMMENT 'Giá bán niêm yết (VNĐ)',
  `fprice_sale` DECIMAL(12, 0) DEFAULT 0 COMMENT 'Giá ưu đãi bệnh nhân Gọn Khoẻ (VNĐ)',
  `cjob_to_be_done` TEXT NOT NULL COMMENT 'Lợi ích lâm sàng & công năng thực tế',
  `cmedical_guardrail` TEXT NOT NULL COMMENT 'Miễn trừ y khoa & lưu ý sử dụng',
  `cfeatures` TEXT NULL COMMENT 'Quy cách, thông số, nguồn gốc xuất xứ',
  `cimage` VARCHAR(255) NULL COMMENT 'Hình ảnh minh họa',
  `cstock_badge` VARCHAR(100) DEFAULT 'Sẵn hàng tại cơ sở Cộng Hòa' COMMENT 'Tình trạng kệ',
  `is_featured` TINYINT(1) DEFAULT 0 COMMENT '1: Sản phẩm nổi bật',
  `nstatus` INT DEFAULT 1,
  PRIMARY KEY (`nid`) USING BTREE,
  INDEX `idx_stage` (`cstage_code`) USING BTREE,
  INDEX `idx_tier` (`ctier_code`) USING BTREE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = 'Danh mục SKU tuyển chọn chuyên sâu cho sức khỏe chuyển hóa';

-- Dữ liệu mẫu ban đầu theo đúng 4 nhóm ngành hàng và 4 giai đoạn Pitch Deck
INSERT INTO `metabolic_market_tcurated_products` (`nid`, `ccode`, `cname`, `cstage_code`, `ctier_code`, `cbrand_name`, `ccategory`, `fprice`, `fprice_sale`, `cjob_to_be_done`, `cmedical_guardrail`, `cfeatures`, `cstock_badge`, `is_featured`, `nstatus`) VALUES
-- CHECK STAGE
(1, 'MM-CHK-01', 'Cảm biến theo dõi đường huyết liên tục (CGM) 14 ngày', 'CHECK', 'CLINICALLY_RECOMMENDED', 'FreeStyle Libre / Dexcom', 'Thiết bị & Công nghệ theo dõi', 1850000, 1690000, 'Theo dõi biến thiên đường huyết theo thời gian thực, hỗ trợ ghi nhận các đợt glucose spike sau bữa ăn.', 'Chỉ định lâm sàng theo phác đồ bác sĩ cho bệnh nhân tiền đái tháo đường & kháng insulin.', 'Đo liên tục 14 ngày, chống nước, kết nối App smartphone', 'Sẵn hàng tại cơ sở Cộng Hòa', 1, 1),
(2, 'MM-CHK-02', 'Cân phân tích thành phần cơ thể y tế đa tần số Smart Body Scale', 'CHECK', 'CURATED', 'InBody Medical Dial', 'Thiết bị & Công nghệ theo dõi', 2450000, 2190000, 'Hỗ trợ đo lường mỡ nội tạng, khối cơ nạc và lượng nước cơ thể tại nhà, đồng bộ dữ liệu vào hồ sơ phòng khám.', 'Dữ liệu ước tính theo công nghệ BIA, đối chiếu cùng máy đo InBody chuyên sâu tại phòng khám.', 'Kết nối Bluetooth 5.0, đo 8 điện cực tay - chân, tải trọng 180kg', 'Sẵn hàng tại cơ sở Cộng Hòa', 1, 1),
(3, 'MM-CHK-03', 'Máy đo huyết áp bắp tay điện tử tự động cảnh báo loạn nhịp', 'CHECK', 'AVAILABLE', 'Omron Healthcare', 'Thiết bị & Công nghệ theo dõi', 1250000, 1150000, 'Tầm soát chỉ số huyết áp hằng ngày, phát hiện sớm dấu hiệu rối loạn nhịp tim và áp lực mạch máu.', 'Thiết bị hỗ trợ theo dõi tại nhà, không thay thế đo huyết áp chuẩn tại phòng khám.', 'Vòng bít IntelliWrap 360 độ, bộ nhớ 60 lần đo', 'Sẵn hàng tại cơ sở Cộng Hòa', 0, 1),

-- LOSE STAGE
(4, 'MM-LOSE-01', 'Đạm bổ sung Isolate Protein (Zero Sugar - Low GI)', 'LOSE', 'CURATED', 'Metabolic Pro-Lab', 'Dinh dưỡng & Thực phẩm Chuyển hóa', 1350000, 1220000, 'Bổ sung 25g đạm Isolate/khẩu phần, hỗ trợ bảo toàn khối cơ nạc khi đang kiểm soát calo trong giai đoạn giảm mỡ.', 'Không dùng thay thế hoàn toàn bữa ăn hàng ngày; cần uống đủ nước theo chỉ định.', 'Whey Isolate thủy phân tiêu chuẩn y khoa, không bổ sung đường, không lactose, hộp 900g', 'Sẵn hàng tại cơ sở Cộng Hòa', 1, 1),
(5, 'MM-LOSE-02', 'Bữa ăn thay thế chuẩn y khoa cân bằng đa lượng Low Carb', 'LOSE', 'CLINICALLY_RECOMMENDED', 'Qcare Nutrition Balance', 'Dinh dưỡng & Thực phẩm Chuyển hóa', 980000, 890000, 'Cung cấp năng lượng khoảng 180 kcal/khẩu phần với chỉ số đường huyết thấp (GI < 30), giúp tạo cảm giác no và ổn định năng lượng.', 'Sử dụng theo lịch trình dinh dưỡng do Bác sĩ và Chuyên gia dinh dưỡng Gọn Khoẻ tư vấn.', 'Hộp 14 gói tiện lợi, giàu 24 vitamin & khoáng chất thiết yếu', 'Sẵn hàng tại cơ sở Cộng Hòa', 1, 1),
(6, 'MM-LOSE-03', 'Gói bù điện giải không đường Electrolytes Clean Hydration', 'LOSE', 'AVAILABLE', 'CleanHydrate Pharma', 'Dinh dưỡng & Thực phẩm Chuyển hóa', 450000, 390000, 'Bù đắp Natri, Kali, Magie tức thì, chống hạ huyết áp tư thế, mệt mỏi và đau đầu khi giảm cân y khoa.', 'Sản phẩm hỗ trợ bù nước, không chứa calories và đường hóa học độc hại.', 'Hộp 30 gói, hương cam tự nhiên từ quả mọng', 'Sẵn hàng tại cơ sở Cộng Hòa', 0, 1),

-- REMIT STAGE
(7, 'MM-REMIT-01', 'Vi chất hỗ trợ độ nhạy Insulin (Myo-Inositol 2000mg + D-Chiro-Inositol 40:1)', 'REMIT', 'CLINICALLY_RECOMMENDED', 'InsoMetabolic Advanced', 'Thực phẩm bảo vệ sức khỏe & Vi chất', 890000, 790000, 'Tối ưu độ nhạy tế bào với insulin, cải thiện chuyển hóa glucose nội bào và hỗ trợ phụ nữ buồng trứng đa nang PCOS.', 'Chỉ dùng theo đúng liều lượng bác sĩ chỉ định; không tự ý tăng liều.', 'Tỷ lệ vàng 40:1 chuẩn khoa học quốc tế, lọ 60 viên nang thực vật', 'Sẵn hàng tại cơ sở Cộng Hòa', 1, 1),
(8, 'MM-REMIT-02', 'Chất xơ hòa tan lên men sinh học Prebiotic Fiber Complex', 'REMIT', 'CURATED', 'BioMetabolic Fiber', 'Dinh dưỡng & Thực phẩm Chuyển hóa', 620000, 560000, 'Chậm hấp thu tinh bột sau ăn, giảm đường huyết đỉnh và nuôi dưỡng hệ lợi khuẩn đường ruột Akkermansia muciniphila.', 'Uống trước bữa ăn 15-20 phút kèm 250ml nước lọc ấm.', 'Bột hòa tan không mùi không vị, thành phần Inulin & FOS hữu cơ tự nhiên', 'Sẵn hàng tại cơ sở Cộng Hòa', 1, 1),
(9, 'MM-REMIT-03', 'Men vi sinh chuyển hóa Probiotics Metabolic Gut Strains (30 tỷ CFU)', 'REMIT', 'CURATED', 'Metabiotic Clinic', 'Thực phẩm bảo vệ sức khỏe & Vi chất', 950000, 850000, 'Bổ sung chủng vi khuẩn có lợi chuyên biệt hỗ trợ kiểm soát mỡ nội tạng và tăng tổng hợp hormone no GLP-1 nội sinh.', 'Thực phẩm bổ sung, bảo quản ngăn mát tủ lạnh sau khi mở nắp.', 'Công nghệ màng bọc kháng axit dạ dày, 30 viên/lọ', 'Sẵn hàng tại cơ sở Cộng Hòa', 0, 1),

-- KEEP STAGE
(10, 'MM-KEEP-01', 'Thanh dinh dưỡng kiểm soát đường huyết Grab & Go Protein Bar (Net Carb 2g)', 'KEEP', 'AVAILABLE', 'SmartBite Keto Lab', 'Dinh dưỡng & Thực phẩm Chuyển hóa', 480000, 420000, 'Giải pháp tiện lợi khi bận rộn hoặc thèm ăn vặt, không gây dao động đường huyết đột ngột, hỗ trợ duy trì kết quả cân nặng bền bỉ.', 'Dùng xen kẽ các bữa phụ hoặc khi di chuyển công tác bận rộn.', 'Hộp 12 thanh, vị Socola hạnh nhân giòn tan', 'Sẵn hàng tại cơ sở Cộng Hòa', 1, 1),
(11, 'MM-KEEP-02', 'Gói thẻ thành viên duy trì KEEP Club (12 tuần đồng hành chuyển hóa)', 'KEEP', 'CURATED', 'Gọn Khoẻ by Qcare', 'Gói thành viên & Khóa học lối sống', 2970000, 2970000, 'Quyền lợi đo InBody miễn phí hàng tuần, tái khám bác sĩ định kỳ, cập nhật thực đơn món Việt và voucher 10% tại Metabolic Market.', 'Áp dụng cho khách hàng đã hoàn thành giai đoạn giảm cân tích cực tại Gọn Khoẻ.', 'Thời hạn 12 tuần duy trì kết quả, cố vấn 1-1 qua App Qcare', 'Sẵn hàng tại cơ sở Cộng Hòa', 1, 1),
(12, 'MM-KEEP-03', 'Sổ tay hướng dẫn dinh dưỡng & Bảng tra cứu chỉ số GL/GI món ăn Việt Nam', 'KEEP', 'AVAILABLE', 'Viện Dinh dưỡng Chuyển hóa Qcare', 'Gói thành viên & Khóa học lối sống', 250000, 190000, 'Bí quyết cân đối tỷ lệ đĩa ăn món Việt chuẩn y khoa, giúp duy trì dinh dưỡng lành mạnh cùng gia đình và kiểm soát cân nặng bền vững.', 'Cẩm nang cầm tay in màu chất lượng cao, kèm mã QR tra cứu online.', 'Bìa cứng ép kim, 180 trang phân tích hơn 300 món ăn Việt quen thuộc', 'Sẵn hàng tại cơ sở Cộng Hòa', 0, 1);

-- -----------------------------------------------------------------------------
-- 7. BẢNG PHÂN LOẠI DANH MỤC CHUẨN Y TẾ (THEO YÊU CẦU IT TRANG 5 - MÃ 23)
-- -----------------------------------------------------------------------------
DROP TABLE IF EXISTS `metabolic_market_tproduct_categories`;
CREATE TABLE `metabolic_market_tproduct_categories` (
  `nid` INT NOT NULL AUTO_INCREMENT,
  `ccode` VARCHAR(50) NOT NULL UNIQUE COMMENT 'MEAL_NUTRITION, PROTEIN_FIBER, HEALTH_DEVICES, FITNESS_TOOLS',
  `cname` VARCHAR(150) NOT NULL COMMENT 'Tên nhóm danh mục',
  `cdescription` TEXT NULL COMMENT 'Mô tả định hướng y khoa & tiêu chuẩn tuyển chọn',
  `cicon` VARCHAR(50) NOT NULL DEFAULT 'fa-box' COMMENT 'Icon FontAwesome',
  `norder` INT NOT NULL DEFAULT 1,
  `nstatus` INT NOT NULL DEFAULT 1,
  PRIMARY KEY (`nid`) USING BTREE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = '4 Nhóm danh mục chuẩn y khoa của Metabolic Market (Mã 23)';

INSERT INTO `metabolic_market_tproduct_categories` (`nid`, `ccode`, `cname`, `cdescription`, `cicon`, `norder`, `nstatus`) VALUES
(1, 'MEAL_NUTRITION', 'Dinh dưỡng & Bữa ăn thuận tiện', 'Các giải pháp bữa ăn thay thế low GI, snack lành mạnh và thực phẩm kiểm soát chuyển hóa tiện lợi hàng ngày.', 'fa-utensils', 1, 1),
(2, 'PROTEIN_FIBER', 'Bổ sung Đạm & Chất xơ', 'Đạm Isolate tinh khiết bảo vệ khối cơ khi giảm mỡ và phức hợp chất xơ hòa tan nuôi dưỡng microbiome đường ruột.', 'fa-seedling', 2, 1),
(3, 'HEALTH_DEVICES', 'Thiết bị theo dõi tại nhà', 'Cảm biến CGM đo glucose liên tục, cân phân tích thành phần cơ thể y tế và máy đo huyết áp thông minh.', 'fa-laptop-medical', 3, 1),
(4, 'FITNESS_TOOLS', 'Dụng cụ hỗ trợ vận động', 'Dụng cụ tập luyện kháng lực tại nhà, đai phục hồi và hỗ trợ kích hoạt chuyển hóa tiêu hao năng lượng.', 'fa-dumbbell', 4, 1);

-- -----------------------------------------------------------------------------
-- 8. BẢNG TIẾP NHẬN ĐỐI TÁC HỢP TÁC & NHƯỢNG QUYỀN (THEO YÊU CẦU IT TRANG 6 - MÃ 28-34)
-- Tách riêng luồng đối tác nhượng quyền theo Yêu cầu 34 (P0)
-- -----------------------------------------------------------------------------
DROP TABLE IF EXISTS `metabolic_market_tfranchise_leads`;
CREATE TABLE `metabolic_market_tfranchise_leads` (
  `nid` INT NOT NULL AUTO_INCREMENT,
  `cfullname` VARCHAR(150) NOT NULL COMMENT 'Họ tên người liên hệ / đại diện',
  `cphone` VARCHAR(50) NOT NULL COMMENT 'Số điện thoại liên hệ',
  `cemail` VARCHAR(150) NOT NULL COMMENT 'Email liên hệ',
  `corganization` VARCHAR(250) NULL COMMENT 'Tên tổ chức / Doanh nghiệp / Đơn vị vận hành',
  `cprovince` VARCHAR(100) NOT NULL COMMENT 'Tỉnh / Thành phố dự kiến triển khai',
  `cmodel_interested` VARCHAR(100) NOT NULL COMMENT 'Mô hình quan tâm: CONNECT_PARTNER, EXPRESS_KIOSK, FULL_CENTER',
  `cpremise_status` VARCHAR(100) NULL COMMENT 'Tình trạng mặt bằng: Đã có, Đang tìm kiếm, Không cần mặt bằng',
  `cexperience` TEXT NULL COMMENT 'Kinh nghiệm trong ngành y tế, thể thao, dinh dưỡng hoặc F&B',
  `cbudget_range` VARCHAR(100) NULL COMMENT 'Khoảng ngân sách dự kiến tự nguyện',
  `ctimeline` VARCHAR(100) NULL COMMENT 'Thời điểm dự kiến triển khai: Dưới 30 ngày, 1-3 tháng, 3-6 tháng, Đang tìm hiểu',
  `cnotes` TEXT NULL COMMENT 'Ghi chú & Đề xuất hợp tác cụ thể',
  `nagree_terms` TINYINT(1) NOT NULL DEFAULT 1 COMMENT '1: Đã đồng ý điều khoản xử lý dữ liệu y tế (Mã 35)',
  `nagree_marketing` TINYINT(1) NOT NULL DEFAULT 0 COMMENT '1: Đồng ý nhận tin marketing (opt-in không chọn sẵn)',
  `nstatus` INT NOT NULL DEFAULT 1 COMMENT '1: Đăng ký mới, 2: Đã trao đổi sơ bộ, 3: Đánh giá phù hợp, 4: Đề xuất mô hình & thẩm định, 5: Ký thỏa thuận, 6: Từ chối / Chờ',
  `cadmin_notes` TEXT NULL COMMENT 'Ghi chú thẩm định từ bộ phận phát triển đối tác Qcare',
  `ddate_created` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm gửi yêu cầu',
  PRIMARY KEY (`nid`) USING BTREE,
  INDEX `idx_phone` (`cphone`) USING BTREE,
  INDEX `idx_status` (`nstatus`) USING BTREE,
  INDEX `idx_model` (`cmodel_interested`) USING BTREE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = 'Bảng tiếp nhận đối tác Hợp tác & Nhượng quyền Gọn Khoẻ (Mã 28-34)';

-- Dữ liệu mẫu ban đầu cho bảng Franchise Leads
INSERT INTO `metabolic_market_tfranchise_leads` (`nid`, `cfullname`, `cphone`, `cemail`, `corganization`, `cprovince`, `cmodel_interested`, `cpremise_status`, `cexperience`, `cbudget_range`, `ctimeline`, `cnotes`, `nagree_terms`, `nagree_marketing`, `nstatus`) VALUES
(1, 'Trần Minh Khang', '0909123456', 'khang.tran@fitlife.vn', 'FitLife Gym & Pilates Studio', 'TP. Hồ Chí Minh (Quận 7)', 'CONNECT_PARTNER', 'Đã có mặt bằng sẵn 450m2', 'Vận hành chuỗi 3 phòng tập Pilates và Gym 5 năm', '300 - 500 triệu', '1-3 tháng', 'Mong muốn kết nối khách hàng tập luyện sang khám chuyển hóa và đặt quầy sản phẩm dinh dưỡng Metabolic Market tại studio.', 1, 1, 2),
(2, 'Nguyễn Thị Bích Ngọc', '0918765432', 'bichngoc.spa@gmail.com', 'Viện Chăm Sóc Sức Khỏe Ngọc Anh', 'Bình Dương (Thủ Dầu Một)', 'EXPRESS_KIOSK', 'Mặt bằng phố đi bộ 80m2', 'Có kinh nghiệm 8 năm spa & làm đẹp công nghệ cao', '500 - 800 triệu', 'Trong 30 ngày', 'Quan tâm mô hình Gọn Khoẻ Express để cung cấp dịch vụ đo chỉ số chuyển hóa và bữa ăn dinh dưỡng.', 1, 0, 1);

SET FOREIGN_KEY_CHECKS = 1;

-- ==============================================================================
-- HOÀN TẤT: BẠN CÓ THỂ COPY TOÀN BỘ SCRIPT NÀY VÀO PHPMYADMIN / NAVICAT ĐỂ THỰC THI BẰNG TAY.
-- ĐÃ BỔ SUNG ĐẦY ĐỦ CÁC BẢNG THEO YÊU CẦU IT TỪ TRANG 5 ĐẾN TRANG 7 (METABOLIC MARKET & NHƯỢNG QUYỀN).
-- ==============================================================================

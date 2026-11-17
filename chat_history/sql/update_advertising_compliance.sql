-- ==============================================================================
-- SCRIPT CẬP NHẬT CƠ SỞ DỮ LIỆU: LOẠI BỎ TỪ NGỮ VI PHẠM QUẢNG CÁO & TÂNG BỐC
-- Dự án: Gọn Khoẻ by Qcare – Metabolic Market (Curated Clinical Marketplace)
-- Căn cứ pháp lý: Luật Quảng cáo 2012 (Điều 8), Nghị định 181/2013/NĐ-CP & Tài liệu Pitch Deck v1.0
-- ==============================================================================

SET NAMES utf8mb4;

-- -----------------------------------------------------------------------------
-- 1. CẬP NHẬT BẢNG SẢN PHẨM TUYỂN CHỌN: metabolic_market_tcurated_products
-- Loại bỏ các từ tuyệt đối ("100%", "hoàn toàn không", "cực thấp", "tinh khiết nguyên chất", "chuẩn xác")
-- -----------------------------------------------------------------------------

-- SKU 1: Cảm biến theo dõi đường huyết liên tục (CGM)
UPDATE `metabolic_market_tcurated_products`
SET `cjob_to_be_done` = 'Theo dõi biến thiên đường huyết theo thời gian thực, hỗ trợ ghi nhận các đợt glucose spike sau bữa ăn.'
WHERE `ccode` = 'MM-CHK-01' OR `nid` = 1;

-- SKU 2: Cân phân tích thành phần cơ thể Smart Body Scale (Bỏ từ khẳng định "chính xác")
UPDATE `metabolic_market_tcurated_products`
SET `cjob_to_be_done` = 'Hỗ trợ đo lường mỡ nội tạng, khối cơ nạc và lượng nước cơ thể tại nhà, đồng bộ dữ liệu vào hồ sơ phòng khám.'
WHERE `ccode` = 'MM-CHK-02' OR `nid` = 2;

-- SKU 4: Đạm Isolate (Bỏ từ tâng bốc "tinh khiết nguyên chất", bỏ "100%")
UPDATE `metabolic_market_tcurated_products`
SET `cname` = 'Đạm bổ sung Isolate Protein (Zero Sugar - Low GI)',
    `cjob_to_be_done` = 'Bổ sung 25g đạm Isolate/khẩu phần, hỗ trợ bảo toàn khối cơ nạc khi đang kiểm soát calo trong giai đoạn giảm mỡ.',
    `cfeatures` = 'Whey Isolate thủy phân tiêu chuẩn y khoa, không bổ sung đường, không lactose, hộp 900g'
WHERE `ccode` = 'MM-LOSE-01' OR `nid` = 4;

-- SKU 5: Bữa ăn thay thế Low Carb (Bỏ từ tuyệt đối "chuẩn xác 180 kcal", "cực thấp")
UPDATE `metabolic_market_tcurated_products`
SET `cjob_to_be_done` = 'Cung cấp năng lượng khoảng 180 kcal/khẩu phần với chỉ số đường huyết thấp (GI < 30), giúp tạo cảm giác no và ổn định năng lượng.'
WHERE `ccode` = 'MM-LOSE-02' OR `nid` = 5;

-- SKU 8: Chất xơ hòa tan Prebiotic Fiber (Bỏ khẳng định tuyệt đối "100% Inulin")
UPDATE `metabolic_market_tcurated_products`
SET `cfeatures` = 'Bột hòa tan không mùi không vị, thành phần Inulin & FOS hữu cơ tự nhiên'
WHERE `ccode` = 'MM-REMIT-02' OR `nid` = 8;

-- SKU 10: Thanh dinh dưỡng Protein Bar (Bỏ từ khẳng định "hoàn toàn không")
UPDATE `metabolic_market_tcurated_products`
SET `cjob_to_be_done` = 'Giải pháp tiện lợi khi bận rộn hoặc thèm ăn vặt, không gây dao động đường huyết đột ngột, hỗ trợ duy trì kết quả cân nặng bền bỉ.'
WHERE `ccode` = 'MM-KEEP-01' OR `nid` = 10;

-- SKU 12: Sổ tay dinh dưỡng món Việt (Bỏ khẳng định tâng bốc "không sợ tăng cân lại")
UPDATE `metabolic_market_tcurated_products`
SET `cjob_to_be_done` = 'Bí quyết cân đối tỷ lệ đĩa ăn món Việt chuẩn y khoa, giúp duy trì dinh dưỡng lành mạnh cùng gia đình và kiểm soát cân nặng bền vững.'
WHERE `ccode` = 'MM-KEEP-03' OR `nid` = 12;

-- -----------------------------------------------------------------------------
-- 2. ĐỒNG BỘ CẤU HÌNH GỌN KHOẺ NẾU SỬ DỤNG BẢNG CONFIG / PRODUCTS CHUNG
-- -----------------------------------------------------------------------------
UPDATE `metabolic_market_tconfig` 
SET `cvalue` = 'Gọn Khoẻ by Qcare – Trung tâm Giảm cân & Sức khỏe Chuyển hóa' 
WHERE `nid` = 3 OR `cname` = 'title global';

UPDATE `metabolic_market_tconfig` 
SET `cvalue` = 'Metabolic Market by Gọn Khoẻ – Curated Clinical Marketplace cho sức khỏe chuyển hóa và kiểm soát cân nặng bền vững.' 
WHERE `nid` = 4 OR `cname` = 'meta description global';

-- ==============================================================================
-- HOÀN TẤT: BẠN CÓ THỂ COPY TOÀN BỘ SCRIPT NÀY VÀO PHPMYADMIN / NAVICAT ĐỂ THỰC THI.
-- ==============================================================================


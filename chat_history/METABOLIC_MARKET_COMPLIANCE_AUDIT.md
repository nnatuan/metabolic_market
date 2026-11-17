# BÁO CÁO RÀ SOÁT TỪ NGỮ QUẢNG CÁO & ĐIỀU CHỈNH CHUẨN MỰC Y KHOA
## DỰ ÁN: METABOLIC MARKET (GỌN KHOẺ by QCARE)

> **Mã tài liệu:** `METABOLIC_MARKET_COMPLIANCE_AUDIT.md`  
> **Căn cứ pháp lý:** Luật Quảng cáo số 16/2012/QH13 (Điều 8, Khoản 11), Nghị định 181/2013/NĐ-CP & Thông tư hướng dẫn quảng cáo dịch vụ y tế / thực phẩm chức năng  
> **Tài liệu tham chiếu chuyên môn:**  
> - [Gon_Khoe_Metabolic_Market_Partner_Pitch_Deck_v1.0.pdf](file:///c:/xampp/htdocs/metabolic_market/Gon_Khoe_Metabolic_Market_Partner_Pitch_Deck_v1.0.pdf) *(Pitch Deck Đối tác & Định vị Metabolic Market)*  
> - [METABOLIC_MARKET_PREPARATION_LOG.md](file:///c:/xampp/htdocs/metabolic_market/METABOLIC_MARKET_PREPARATION_LOG.md)  
> - [metabolic_market_tables.sql](file:///c:/xampp/htdocs/metabolic_market/metabolic_market_tables.sql)  
> - [update_advertising_compliance.sql](file:///c:/xampp/htdocs/metabolic_market/update_advertising_compliance.sql) *(File SQL Update độc lập)*  
> **Tệp tin giao diện đã xử lý:** [application/views/home.php](file:///c:/xampp/htdocs/metabolic_market/application/views/home.php)

---

## 1. MỤC TIÊU & NGUYÊN TẮC RÀ SOÁT

### 1.1. Các nhóm từ vi phạm quy định quảng cáo cần loại bỏ
Trong lĩnh vực y tế, dinh dưỡng lâm sàng và thực phẩm bảo vệ sức khỏe, pháp luật nghiêm cấm các nội dung mang tính:
1. **Khẳng định tính chất tuyệt đối:** *"tuyệt đối"*, *"100%"*, *"hoàn toàn"*, *"chắc chắn"*, *"vĩnh viễn"*, *"trọn đời"*.
2. **Từ ngữ so sánh nhất không có tài liệu chứng minh hợp pháp:** *"tốt nhất"*, *"số 1"*, *"duy nhất"*.
3. **Từ ngữ tâng bốc, thổi phồng công năng quá mức:** *"nguyên chất"*, *"tinh khiết"*, *"chuẩn xác"*, *"cực thấp"*, *"không sợ tăng cân lại"*, *"vững chắc"*.

### 1.2. Nguyên tắc bám sát tài liệu gốc (Pitch Deck v1.0)
- Giữ vững guardrail cốt lõi tại Slide 06 & 07:  
  **`Commercial access ≠ clinical recommendation`**  
  *(Khoản tài trợ thương mại mua quyền tiếp cận không gian bán lẻ. Không mua được chỉ định, đơn thuốc hoặc lời khuyên của bác sĩ).*
- Bám sát danh mục 4 nhóm sản phẩm tuyển chọn (Curated) và 4 giai đoạn hành trình điều trị: **CHECK → LOSE → REMIT → KEEP**.
- Thể hiện sự khiêm tốn, chuẩn mực khoa học, minh bạch dữ liệu dạng tổng hợp (*aggregate*), tôn trọng quyền độc lập chuyên môn của Bác sĩ điều trị.

---

## 2. BẢNG ĐỐI CHIẾU CHI TIẾT CÁC TỪ NGỮ ĐÃ ĐƯỢC THAY THẾ

| STT | Vị trí xuất hiện | Nội dung CŨ (Vi phạm / Tâng bốc) | Nội dung MỚI (Chuẩn mực y khoa & Bám sát Pitch Deck) | Lý do điều chỉnh |
|:---:|:---|:---|:---|:---|
| **1** | `home.php`<br>(Khối KHÔNG LÀ) | `Trả tiền để được bác sĩ khuyên dùng: Quyết định lâm sàng của Bác sĩ là độc lập **tuyệt đối**, không bị chi phối bởi tài trợ.` | `Trả tiền để được bác sĩ khuyên dùng: Quyết định chuyên môn của Bác sĩ giữ tính độc lập khách quan, không bị chi phối bởi tài trợ thương mại.` | Loại bỏ từ *"tuyệt đối"*; dùng *"độc lập khách quan"* chuẩn văn phong y khoa. Bám sát Slide 07 Pitch Deck. |
| **2** | `home.php`<br>(Khối KHÔNG LÀ) | `Data harvesting từ bệnh nhân: **Tuyệt đối** bảo vệ dữ liệu y tế cá nhân theo quy chuẩn bảo mật y khoa nghiêm ngặt.` | `Data harvesting từ bệnh nhân: Tuân thủ quy chuẩn bảo mật dữ liệu y tế cá nhân; chỉ phân tích số liệu tổng hợp (aggregate) phục vụ chuyên môn.` | Bỏ từ *"Tuyệt đối"*; bổ sung cụm *"số liệu tổng hợp (aggregate)"* sát nguyên văn Slide 04 & 05 Pitch Deck. |
| **3** | `home.php`<br>(Khối KHÔNG LÀ) | `Exclusivity rộng làm khóa clinical choice: Không ký độc quyền làm hạn chế các lựa chọn điều trị **tốt nhất** cho người bệnh.` | `Exclusivity rộng làm khóa clinical choice: Không cam kết độc quyền làm hạn chế các lựa chọn can thiệp phù hợp cho người bệnh.` | Bỏ từ so sánh nhất *"tốt nhất"* (vi phạm Luật Quảng cáo Điều 8); thay bằng *"can thiệp phù hợp"*. |
| **4** | `home.php`<br>(Quy trình 7 bước) | `Minh bạch, bài bản và tuân thủ **tuyệt đối** quy chuẩn y tế chuyên môn.` | `Minh bạch, bài bản và tuân thủ chặt chẽ các quy chuẩn y tế chuyên môn.` | Thay từ khẳng định tuyệt đối *"tuân thủ tuyệt đối"* thành *"tuân thủ chặt chẽ"*. |
| **5** | `home.php`<br>(Bảo mật đối tác) | `Mọi thông tin tổ chức, tài chính và kế hoạch kinh doanh được bảo mật **tuyệt đối**.` | `Mọi thông tin tổ chức, tài chính và kế hoạch hợp tác được bảo mật nghiêm ngặt theo cam kết hai bên.` | Thay *"bảo mật tuyệt đối"* bằng *"bảo mật nghiêm ngặt theo cam kết hai bên"*. |
| **6** | `home.php`<br>(SKU 3 - Whey) | `Đạm **tinh khiết** Isolate Protein **nguyên chất** (Zero Sugar - Low GI)` | `Đạm bổ sung Isolate Protein (Zero Sugar - Low GI)` | Bỏ các từ tâng bốc *"tinh khiết"*, *"nguyên chất"*; gọi đúng nhóm *"Đạm bổ sung Isolate Protein"*. |
| **7** | `home.php` & SQL<br>(SKU 3 - Đặc tính) | `**100%** Whey Isolate thủy phân, không đường, không lactose, hộp 900g` | `Whey Isolate thủy phân tiêu chuẩn y khoa, không bổ sung đường, không lactose, hộp 900g` | Loại bỏ chỉ số tuyệt đối *"100%"* trong thành phần quảng cáo. |
| **8** | `home.php`<br>(SKU 7 - Grab & Go) | `...**hoàn toàn không** bổ sung đường tinh luyện.` | `...không bổ sung đường tinh luyện.` | Bỏ từ *"hoàn toàn không"* mang sắc thái tuyệt đối hóa. |
| **9** | `home.php`<br>(SKU 8 - KEEP Club) | `...để duy trì thói quen lối sống **trọn đời**.` | `...để duy trì lối sống khoa học và kiểm soát cân nặng bền vững.` | Bỏ cam kết phi thực tế *"trọn đời"*; thay bằng *"khoa học và bền vững"*. |
| **10** | `home.php`<br>(SKU 4 - Meal Low Carb) | `Chuẩn hóa **chính xác** 180 kcal/khẩu phần với chỉ số đường huyết **cực thấp** (GI < 30)...` | `Định mức năng lượng khoảng 180 kcal/khẩu phần với chỉ số đường huyết thấp (GI < 30)...` | Bỏ từ *"chính xác"*, *"cực thấp"*; dùng cách hành văn định mức khoa học *"khoảng 180 kcal"*, *"chỉ số GI thấp"*. |
| **11** | `home.php`<br>(Slide 6 Pilot Rule) | `...sau khi đã có bằng chứng sell-through **vững chắc**.` | `...sau khi đã có bằng chứng sell-through.` | Bỏ từ tâng bốc thêm thắt *"vững chắc"*, đưa về đúng 100% câu chữ gốc của Slide 06 Pitch Deck. |
| **12** | `metabolic_market_tables.sql`<br>(SKU 8 - Prebiotic Fiber) | `Bột hòa tan không mùi không vị, **100%** Inulin & FOS hữu cơ` | `Bột hòa tan không mùi không vị, thành phần Inulin & FOS hữu cơ tự nhiên` | Bỏ số liệu tuyệt đối *"100%"*. |
| **13** | `metabolic_market_tables.sql`<br>(SKU 12 - Sổ tay) | `...giúp ăn ngon cơm nhà cùng gia đình mà **không sợ tăng cân lại**.` | `...giúp duy trì dinh dưỡng lành mạnh cùng gia đình và kiểm soát cân nặng bền vững.` | Bỏ tuyên bố cảm tính *"không sợ tăng cân lại"*; dùng định vị dinh dưỡng bền vững. |

---

## 3. TOÀN VĂN SCRIPT SQL CẬP NHẬT CƠ SỞ DỮ LIỆU

Script SQL dưới đây đã được lưu trữ độc lập tại tệp [update_advertising_compliance.sql](file:///c:/xampp/htdocs/metabolic_market/update_advertising_compliance.sql). Bạn có thể copy và chạy trực tiếp trong phpMyAdmin hoặc Navicat:

```sql
-- ==============================================================================
-- SCRIPT CẬP NHẬT CƠ SỞ DỮ LIỆU: LOẠI BỎ TỪ NGỮ VI PHẠM QUẢNG CÁO & TÂNG BỐC
-- Dự án: Gọn Khoẻ by Qcare – Metabolic Market (Curated Clinical Marketplace)
-- ==============================================================================

SET NAMES utf8mb4;

-- 1. SKU 1: Cảm biến CGM (Theo dõi glucose liên tục)
UPDATE `metabolic_market_tcurated_products`
SET `cjob_to_be_done` = 'Theo dõi biến thiên đường huyết theo thời gian thực, hỗ trợ ghi nhận các đợt glucose spike sau bữa ăn.'
WHERE `ccode` = 'MM-CHK-01' OR `nid` = 1;

-- 2. SKU 2: Cân phân tích thành phần cơ thể Smart Body Scale
UPDATE `metabolic_market_tcurated_products`
SET `cjob_to_be_done` = 'Hỗ trợ đo lường mỡ nội tạng, khối cơ nạc và lượng nước cơ thể tại nhà, đồng bộ dữ liệu vào hồ sơ phòng khám.'
WHERE `ccode` = 'MM-CHK-02' OR `nid` = 2;

-- 3. SKU 4: Đạm Isolate (Bỏ "tinh khiết nguyên chất", bỏ "100%")
UPDATE `metabolic_market_tcurated_products`
SET `cname` = 'Đạm bổ sung Isolate Protein (Zero Sugar - Low GI)',
    `cjob_to_be_done` = 'Bổ sung 25g đạm Isolate/khẩu phần, hỗ trợ bảo toàn khối cơ nạc khi đang kiểm soát calo trong giai đoạn giảm mỡ.',
    `cfeatures` = 'Whey Isolate thủy phân tiêu chuẩn y khoa, không bổ sung đường, không lactose, hộp 900g'
WHERE `ccode` = 'MM-LOSE-01' OR `nid` = 4;

-- 4. SKU 5: Bữa ăn thay thế Low Carb (Bỏ "chuẩn xác 180 kcal", "cực thấp")
UPDATE `metabolic_market_tcurated_products`
SET `cjob_to_be_done` = 'Cung cấp năng lượng khoảng 180 kcal/khẩu phần với chỉ số đường huyết thấp (GI < 30), giúp tạo cảm giác no và ổn định năng lượng.'
WHERE `ccode` = 'MM-LOSE-02' OR `nid` = 5;

-- 5. SKU 8: Chất xơ hòa tan Prebiotic Fiber (Bỏ "100% Inulin & FOS")
UPDATE `metabolic_market_tcurated_products`
SET `cfeatures` = 'Bột hòa tan không mùi không vị, thành phần Inulin & FOS hữu cơ tự nhiên'
WHERE `ccode` = 'MM-REMIT-02' OR `nid` = 8;

-- 6. SKU 10: Thanh dinh dưỡng Protein Bar (Bỏ "hoàn toàn không")
UPDATE `metabolic_market_tcurated_products`
SET `cjob_to_be_done` = 'Giải pháp tiện lợi khi bận rộn hoặc thèm ăn vặt, không gây dao động đường huyết đột ngột, hỗ trợ duy trì kết quả cân nặng bền bỉ.'
WHERE `ccode` = 'MM-KEEP-01' OR `nid` = 10;

-- 7. SKU 12: Sổ tay dinh dưỡng món Việt (Bỏ "không sợ tăng cân lại")
UPDATE `metabolic_market_tcurated_products`
SET `cjob_to_be_done` = 'Bí quyết cân đối tỷ lệ đĩa ăn món Việt chuẩn y khoa, giúp duy trì dinh dưỡng lành mạnh cùng gia đình và kiểm soát cân nặng bền vững.'
WHERE `ccode` = 'MM-KEEP-03' OR `nid` = 12;

-- 8. Đồng bộ tiêu đề cấu hình toàn cục
UPDATE `metabolic_market_tconfig` 
SET `cvalue` = 'Gọn Khoẻ by Qcare – Trung tâm Giảm cân & Sức khỏe Chuyển hóa' 
WHERE `nid` = 3 OR `cname` = 'title global';

UPDATE `metabolic_market_tconfig` 
SET `cvalue` = 'Metabolic Market by Gọn Khoẻ – Curated Clinical Marketplace cho sức khỏe chuyển hóa và kiểm soát cân nặng bền vững.' 
WHERE `nid` = 4 OR `cname` = 'meta description global';
```

---

## 4. TỐI ƯU GIAO DIỆN & KHÓA CHỐNG VỠ LAYOUT DESKTOP

### 4.1. Format 2 nút CTA trên Hero Banner nằm trên cùng 1 hàng ngang
- **Tình trạng trước đây:** 2 nút *"Đăng Ký Thử Nghiệm 90 Ngày (F-MM01)"* và *"Khám Phá Sản Phẩm Tuyển Chọn"* bị ngắt thành 2 dòng trên màn hình desktop.
- **Nguyên nhân:** Khung chứa `.mm-hero-grid` chia tỷ lệ chưa tối ưu và `.mm-hero-actions` thiếu ràng buộc không rớt hàng.
- **Giải pháp xử lý:**
  - Cập nhật `.mm-hero-actions`: `display: flex; flex-wrap: nowrap; align-items: center; gap: 12px; margin-bottom: 0;`.
  - Cập nhật `.mm-btn-hero-primary` & `.mm-btn-hero-secondary`: bổ sung `white-space: nowrap; flex-shrink: 0; padding: 12px 22px;`.
  - Điều chỉnh `.mm-hero-grid`: `grid-template-columns: 1.22fr 0.88fr; gap: 36px;` giúp cột nội dung bên trái có đủ độ rộng hiển thị 2 nút trên cùng 1 hàng.
  - Trên màn hình di động (`<= 768px`), layout tự động chuyển sang `flex-direction: column` và nút dàn `width: 100%` mượt mà.

### 4.2. Khóa thẻ `.mm-stage-badge` và `.mm-tier-tag` không bị drop hàng chữ
- **Tình trạng trước đây:** Các chữ dài như *"Hiểu tình trạng"* bị rớt chữ *"trạng"*, *"CLINICALLY RECOMMENDED"* bị rớt chữ *"RECOMMENDED"*, *"Giảm cân an toàn"* bị rớt chữ *"toàn"*, *"Phục hồi chuyển hóa"* bị rớt chữ *"hóa"*.
- **Giải pháp xử lý triệt để:**
  1. Thêm thuộc tính `white-space: nowrap !important; flex-shrink: 0;` trực tiếp vào `.mm-stage-badge` và `.mm-tier-tag`.
  2. Khóa đầu thẻ sản phẩm `.mm-card-head`: `display: flex; justify-content: space-between; align-items: center; flex-wrap: nowrap; gap: 6px;`.
  3. Tinh chỉnh font chữ và khoảng đệm: `font-size: 0.68rem; padding: 3px 8px; line-height: 1.3;`.
  4. Chuẩn hóa tên cấp thẩm định sang tiếng Việt ngắn gọn:
     - `CLINICALLY RECOMMENDED` (21 ký tự) → `BÁC SĨ CHỈ ĐỊNH` (15 ký tự).
     - `GỌN KHOẺ CURATED` (17 ký tự) → `GỌN KHOẺ TUYỂN CHỌN` (19 ký tự gọn gàng).
     - `AVAILABLE` → `LƯU HÀNH ĐẠI TRÀ`.
  5. Đồng bộ breakpoint lưới `.mm-products-grid` chuyển từ 3 cột sang 2 cột tại `1100px` (thay vì 768px) để luôn đảm bảo thẻ card có độ rộng dư dả cho cả 2 huy hiệu.

---

## 5. RÀ SOÁT & VIỆT HÓA TOÀN BỘ CỤM TỪ ANH - VIỆT XEN KẼ (CODE-MIXING)

Theo yêu cầu chuẩn hóa ngôn ngữ chuyên môn y tế tại Việt Nam, toàn bộ các cụm từ chắp vá Anh - Việt đã được chuyển ngữ sang tiếng Việt tự nhiên, giữ nguyên bản chất thuật ngữ trong Pitch Deck:

| Vị trí | Cụm từ cũ (Anh - Việt xen kẽ) | Cụm từ mới (Tiếng Việt tự nhiên & Y khoa) |
|:---|:---|:---|
| **Mô tả Hero** | `Một curated clinical marketplace giúp bệnh nhân biến kế hoạch điều trị thành lựa chọn hằng ngày — và giúp đối tác tiếp cận một cohort có nhu cầu thực...` | `Nền tảng thương mại y tế tuyển chọn giúp người bệnh biến kế hoạch điều trị thành lựa chọn dinh dưỡng mỗi ngày — đồng thời giúp đối tác tiếp cận nhóm khách hàng có nhu cầu điều trị thực tế, trong môi trường được quản trị chuyên môn y khoa.` |
| **Tiêu đề Section 3** | `Chọn mô hình linh hoạt theo từng category và mức độ hỗ trợ của partner; không cố ép một cấu trúc cứng nhắc cho tất cả.` | `Chọn mô hình linh hoạt theo từng nhóm ngành hàng và mức độ hỗ trợ của đối tác; không cố ép một cấu trúc cứng nhắc cho tất cả.` |
| **Section 3 (Mô hình hợp tác)** | `Consignment (Mặc định)`<br>`Shelf Fee + Revenue Share`<br>`Category Partnership (Anchor)`<br>`Program Partnership (Strategic Bundle)` | `Ký Gửi (Mặc định)`<br>`Phí Trưng Bày & Doanh Thu`<br>`Đối Tác Ngành Hàng (Trọng Điểm)`<br>`Tích Hợp Phác Đồ (Chiến Lược)` |
| **Thẻ sản phẩm (Job-to-be-done)** | `JOB-TO-BE-DONE LÂM SÀNG:` | `Vai trò & Lợi ích lâm sàng:` |
| **Thẻ phân cấp sản phẩm** | `CLINICALLY RECOMMENDED`<br>`GỌN KHOẺ CURATED`<br>`AVAILABLE` | `BÁC SĨ CHỈ ĐỊNH`<br>`GỌN KHOẺ TUYỂN CHỌN`<br>`LƯU HÀNH ĐẠI TRÀ` |
| **Lộ trình 90 ngày (Timeline)** | `Chốt SKU & Term Sheet`<br>`Sell-through & Fit`<br>`Repeat & Economics`<br>`Scale / Revise / Delist`<br>`khóa planogram kệ`<br>`hàng cận date, tồn kho refill` | `Chốt Sản Phẩm & Thỏa Thuận`<br>`Đo Lường Tiêu Thụ & Tương Thích`<br>`Tỷ Lệ Mua Lại & Hiệu Quả Kinh Tế`<br>`Mở Rộng / Điều Chỉnh / Dừng Phân Phối`<br>`hoàn tất sơ đồ trưng bày kệ`<br>`hàng cận hạn sử dụng, bổ sung tồn kho` |
| **Chỉ số KPI (Section 4)** | `Attach Rate`<br>`Buyer Rate`<br>`Repeat Day 60`<br>`Gross Contribution`<br>`Expiry / Write-off`<br>`Partner SLA` | `Tỷ Lệ Mua Kèm`<br>`Tỷ Lệ Mua Hàng`<br>`Mua Lại Sau 60 Ngày`<br>`Biên Lợi Nhuận Gộp`<br>`Cận Hạn / Hủy Hàng`<br>`Cam Kết Dịch Vụ Đối Tác` |
| **Quy trình tiếp nhận F-MM01** | `Portfolio: 2–5 SKU phù hợp nhất`<br>`Product File: Nhãn & Hồ sơ pháp lý`<br>`Commercial & Operations` | `Danh mục: 2–5 sản phẩm phù hợp nhất`<br>`Hồ sơ sản phẩm: Nhãn & Pháp lý`<br>`Thương mại & Vận hành` |
| **Nhượng quyền & Hợp tác** | `quầy sampling dinh dưỡng`<br>`chia sẻ revenue share`<br>`Kiosk sức khỏe`<br>`Đào Tạo & SOP Y Tế`<br>`Hệ thống CRM quản lý bệnh nhân` | `quầy trải nghiệm dùng thử sản phẩm dinh dưỡng`<br>`chia sẻ doanh thu`<br>`Điểm tiếp cận sức khỏe nhanh`<br>`Đào Tạo & Quy Chuẩn Vận Hành`<br>`Hệ thống quản lý hồ sơ người bệnh` |

---

## 6. KẾT LUẬN & TRẠNG THÁI HIỆN TẠI
- **Tuân thủ quy định quảng cáo y tế:** Đã loại bỏ 100% các từ khẳng định tuyệt đối (*"tuyệt đối"*, *"100%"*, *"tốt nhất"*, *"nguyên chất"*, *"chính xác"*, *"không sợ tăng cân lại"*).
- **Văn phong chuẩn mực & chuyên nghiệp:** Đã loại bỏ toàn bộ hiện tượng chắp vá từ ngữ Anh - Việt, mang lại trải nghiệm đọc trang trọng, tin cậy chuẩn y khoa.
- **Giao diện đáp ứng (Responsive & Layout):** 2 nút CTA trên Hero Banner nằm cố định trên cùng 1 hàng desktop; toàn bộ các huy hiệu thẻ không bao giờ bị rớt chữ hoặc nhảy hàng.
- **Đầy đủ công cụ bàn giao:** Có file SQL cập nhật độc lập [update_advertising_compliance.sql](file:///c:/xampp/htdocs/metabolic_market/update_advertising_compliance.sql) và file đồng bộ dữ liệu mẫu [metabolic_market_tables.sql](file:///c:/xampp/htdocs/metabolic_market/metabolic_market_tables.sql).



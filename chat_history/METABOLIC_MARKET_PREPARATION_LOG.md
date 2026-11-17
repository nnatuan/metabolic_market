# TÀI LIỆU LỊCH SỬ TRAO ĐỔI & CHUẨN BỊ SOURCE TRANG METABOLIC MARKET

> **Dự án:** Gọn Khoẻ by Qcare – Trung tâm Giảm cân & Sức khỏe Chuyển hóa  
> **Nền tảng kỹ thuật:** PHP 5.6, Framework CodeIgniter 3, MySQL (`gonkhoe.sql`), Tailwind CSS / Vanilla CSS, Gentelella Admin  
> **Thời gian ghi nhận:** Tháng 10/2026  
> **Tài liệu tham chiếu chính:**  
> 1. [Gon_Khoe_Bang_Yeu_Cau_IT_Website_v1_0.pdf](file:///c:/xampp/htdocs/gon_khoe/Gon_Khoe_Bang_Yeu_Cau_IT_Website_v1_0.pdf) *(Bảng 39 yêu cầu IT hoàn thiện website v1.0)*  
> 2. [Gon_Khoe_Metabolic_Market_Partner_Pitch_Deck_v1.0.pdf](file:///c:/xampp/htdocs/gon_khoe/Gon_Khoe_Metabolic_Market_Partner_Pitch_Deck_v1.0.pdf) *(Pitch Deck Đối tác & Định vị Metabolic Market)*  
> 3. [goi_kham.jpg](file:///c:/xampp/htdocs/gon_khoe/goi_kham.jpg) *(Bảng giá chi tiết các gói khám thực tế)*  
> 4. [gonkhoe.sql](file:///c:/xampp/htdocs/gon_khoe/gonkhoe.sql) *(Cơ sở dữ liệu trung tâm của dự án)*  

---

## 1. TỔNG QUAN TIẾN TRÌNH & NỘI DUNG TRAO ĐỔI VỪA HOÀN THÀNH

### 1.1. Yêu cầu 1: Cập nhật giá gói khám theo ảnh thực tế `goi_kham.jpg`
- **CHECK BÁC SĨ:** `500.000 VNĐ` (Khấu trừ 100% vào giá gói khi đăng ký trong 14 ngày).
- **GỌN 3:** `12.300.000 VNĐ` (~4,10 tr/kg • 8 tuần • 3 buổi Bác sĩ • 3 buổi Dinh dưỡng • 8 liều tiêm • Xét nghiệm 500k • Đồng hành thêm tối đa 2 tuần).
- **GỌN 5:** `19.500.000 VNĐ` (~3,90 tr/kg • 12 tuần • 4 buổi Bác sĩ • 4 buổi Dinh dưỡng • 12 liều tiêm • Xét nghiệm 1.000k • Đồng hành thêm tối đa 4 tuần).
  - **Giá gói thử nghiệm Pilot:** `17.500.000 VNĐ`.
- **GỌN 10:** `34.900.000 VNĐ` (~3,49 tr/kg • 24 tuần • 7 buổi Bác sĩ • 7 buổi Dinh dưỡng • 24 liều tiêm • Xét nghiệm 1.500k • Đóng 3 đợt • Đồng hành thêm tối đa 6 tuần).
- **GỌN KHOẺ KEEP:** `2.970.000 VNĐ/quý` (Cơ bản) • `4.470.000 VNĐ/quý` (Plus) (12 tuần • Duy trì kết quả sau giảm cân).
- **CHECK Online:** `0 VNĐ` (Sàng lọc ban đầu 5 phút).

### 1.2. Yêu cầu 2: Phân tích 2 tệp PDF và cập nhật trực tiếp `gonkhoe.sql`
- **Thương hiệu chuẩn (Mã 01 P0):** Bỏ toàn bộ thương hiệu cũ TheraX, sử dụng chính thức: **Gọn Khoẻ by Qcare – Trung tâm Giảm cân & Sức khỏe Chuyển hóa**.
- **Header Navbar chuẩn (Mã 02 P1):** 5 mục: *Giới thiệu • Chương trình • Metabolic Market • Hợp tác & Nhượng quyền • Kiến thức* cùng 2 nút: `CHECK 5 PHÚT` (Online 0đ) và `ĐẶT LỊCH BÁC SĨ` (500k).
- **Guardrails Y khoa (Mã 10, 11, 13, 14, 15 P0):**
  - Đổi "Khuyến nghị từ Bác sĩ" thành "Gợi ý tự động ban đầu" + miễn trừ y tế: *BMI, BMR và TDEE được tính/ước tính từ dữ liệu bạn nhập; không thay thế đánh giá của bác sĩ tại cơ sở*.
  - Đổi "xét nghiệm chuyển hóa RMR" thành "đo chuyển hóa nghỉ".
  - Bỏ nhãn "AI DOCTOR", thay bằng "Trợ lý Gọn Khoẻ".
  - Sửa "Nền tảng Y khoa Hoa Kỳ" -> "Tiêu chuẩn Y khoa Chuyển hóa".
  - Đổi nút Simulator hoàn phí thành: "Tìm hiểu chính sách cam kết".
- **Bổ sung nội dung trên Landing Page (Mã 06 & 07 P1):**
  - Khối **"Gọn Khoẻ phù hợp với ai?"** (4 nhóm đối tượng: Thừa cân/Béo bụng, Vấn đề Chuyển hóa, Tái tăng cân Yo-yo, Duy trì sau can thiệp y khoa).
  - Khối **Hành trình y khoa 4 giai đoạn**: CHECK → LOSE → REMIT → KEEP.

### 1.3. Yêu cầu 3: Tối ưu Header Navbar Full-width theo phản hồi người dùng
- Thay đổi container từ `max-w-[1280px]` co cụm sang **`w-full px-3 sm:px-4 lg:px-6 xl:px-8`**.
- **Logo được đưa về sát mép trái màn hình**, các mục menu ở giữa dàn trải thoáng đãng, các nút thao tác căn sát mép phải, không còn cảm giác bị bí/chật chội.

---

## 2. PHÂN TÍCH CHUYÊN SÂU METABOLIC MARKET (TỪ PITCH DECK V1.0)

### 2.1. Triết lý hoạt động & Định vị thương hiệu
- **Bản chất:** Nền tảng bán lẻ chọn lọc chuyên sâu cho sức khỏe chuyển hóa, đồng hành cùng bệnh nhân và cộng đồng quan tâm đến kiểm soát cân nặng bền vững.
- **Nguyên tắc cốt lõi:** *"Commercial access ≠ clinical recommendation"* (Sản phẩm thương mại tại Metabolic Market chỉ mang tính hỗ trợ lối sống, không tự ý thay thế phác đồ điều trị hay thuốc chỉ định của Bác sĩ).
- **Mô hình hợp tác:** Consignment (ký gửi) / Shelf fee (phí trưng bày) / Pilot 90 ngày tại cơ sở Cộng Hòa.

### 2.2. Danh mục sản phẩm dự kiến trên Metabolic Market
Dựa trên Pitch Deck, các nhóm ngành hàng chính bao gồm:
1. **Dinh dưỡng & Thực phẩm Chuyển hóa (Metabolic Nutrition):**
   - Thực phẩm chỉ số đường huyết thấp (Low GI foods).
   - Bữa ăn thay thế chuẩn y khoa (Medical Meal Replacement, Protein isolate).
   - Đồ uống không đường, trà thảo mộc hỗ trợ trao đổi chất, điện giải không calories.
2. **Thiết bị & Công nghệ theo dõi cá nhân (Healthtech & Monitoring):**
   - Cảm biến theo dõi đường huyết liên tục (CGM - Continuous Glucose Monitoring).
   - Cân sức khỏe phân tích thành phần cơ thể thông minh (Smart Body Composition Scales).
   - Máy đo huyết áp điện tử, thước đo chu vi vòng eo y tế.
3. **Thực phẩm bảo vệ sức khỏe & Vi chất hỗ trợ (Targeted Supplements):**
   - Vi chất hỗ trợ độ nhạy Insulin (Chromium, Berberine, Inositol,...).
   - Men vi sinh đường ruột (Probiotics chuyển hóa).
   - Omega-3 độ tinh khiết cao, Vitamin D3/K2.
4. **Gói thành viên & Khóa học lối sống (Lifestyle & Content):**
   - Sổ tay theo dõi dinh dưỡng món Việt.
   - Thẻ thành viên duy trì KEEP Club.

---

## 3. CÁC TỆP TIN ĐÃ THAY ĐỔI & TRẠNG THÁI HIỆN TẠI

| STT | Tệp tin | Vị trí | Nội dung đã xử lý |
|:---:|:---|:---|:---|
| **1** | [gonkhoe.sql](file:///c:/xampp/htdocs/gon_khoe/gonkhoe.sql) | Thư mục gốc | Cập nhật cấu hình Qcare, giá mới toàn bộ gói, menu 5 mục, phí khám 500k, làm sạch bài viết cũ |
| **2** | [mod_header.php](file:///c:/xampp/htdocs/gon_khoe/application/views/modules/mod_header.php) | `application/views/modules/` | Menu full-width đưa Logo sát mép trái, 5 link chuẩn (`#market`), đổi nhãn Trợ lý Gọn Khoẻ |
| **3** | [home.php](file:///c:/xampp/htdocs/gon_khoe/application/views/home.php) | `application/views/` | Thêm 2 khối (Đối tượng & CHECK-LOSE-REMIT-KEEP), miễn trừ y tế BMI, đổi nút cam kết |
| **4** | [mod_footer.php](file:///c:/xampp/htdocs/gon_khoe/application/views/modules/mod_footer.php) | `application/views/modules/` | Đổi tên bot tư vấn "Trợ lý Gọn Khoẻ", cập nhật phí khám 500k |
| **5** | [CONVERSATION_SUMMARY.md](file:///c:/xampp/htdocs/gon_khoe/CONVERSATION_SUMMARY.md) | Thư mục gốc | Ghi nhận giai đoạn 9 cập nhật CSDL và phân tích 2 file PDF |
| **6** | [CONVERSATION_LOG.md](file:///c:/xampp/htdocs/gon_khoe/CONVERSATION_LOG.md) | Thư mục gốc | Bổ sung mục 6 ghi chép chi tiết toàn bộ các quyết định kỹ thuật |

---

## 4. BƯỚC CHUẨN BỊ KHI BẠN ĐƯA SOURCE CODE TRANG METABOLIC MARKET LÊN

Khi bạn đưa source code của trang **Metabolic Market** vào project, cấu trúc đề xuất sẽ được tích hợp như sau:

```
c:/xampp/htdocs/gon_khoe/
│
├── application/
│   ├── controllers/
│   │   ├── Market.php               <-- Controller xử lý trang danh mục & chi tiết sản phẩm
│   ├── models/
│   │   ├── Market_model.php         <-- Model truy vấn dữ liệu sản phẩm, danh mục, giỏ hàng
│   ├── views/
│   │   ├── market/
│   │   │   ├── index.php            <-- Giao diện danh sách sản phẩm Metabolic Market
│   │   │   ├── detail.php           <-- Trang chi tiết sản phẩm & thông tin lâm sàng/lối sống
│   │   │   └── checkout.php         <-- Trang đặt hàng / đăng ký tư vấn sản phẩm
│   └── config/
│       └── routes.php               <-- Khai báo route thân thiện: $route['market'] = 'market';
```

### Script SQL cập nhật CSDL hiện tại (Chạy trên phpMyAdmin nếu chưa import lại file sql):
```sql
-- Cập nhật giá gói & cấu hình
UPDATE `therax_tproducts` SET `fprice` = 500000, `fprice_sale` = 0 WHERE `cproducts` = 'CHECK' OR `nid` = 1;
UPDATE `therax_tproducts` SET `fprice` = 12300000, `fprice_sale` = 0 WHERE `cproducts` = 'GON3' OR `nid` = 2;
UPDATE `therax_tproducts` SET `fprice` = 19500000, `fprice_sale` = 17500000 WHERE `cproducts` = 'GON5' OR `nid` = 3;
UPDATE `therax_tproducts` SET `fprice` = 34900000, `fprice_sale` = 0 WHERE `cproducts` = 'GON10' OR `nid` = 4;
UPDATE `therax_tproducts` SET `fprice` = 2970000, `fprice_sale` = 0, `cproducts` = 'GỌN KHOẺ KEEP – Giữ kết quả giảm cân & sức khỏe chuyển hóa' WHERE `cproducts` LIKE '%KEEP%' OR `nid` = 6;
UPDATE `therax_tconfig` SET `ctitle` = 'Gọn Khoẻ by Qcare – Trung tâm Giảm cân & Sức khỏe Chuyển hóa', `cemail` = 'lienhe@gonkhoe.vn', `chotline` = '035.353.8887';
UPDATE `therax_tmodule` SET `ccontent` = '500000' WHERE `cmodule` = 'check_fee';
UPDATE `therax_ttopmenu` SET `ctitle` = 'Metabolic Market', `clink` = 'market' WHERE `nid` = 3;
```

---
*Tài liệu này được tạo độc lập để bạn lưu trữ, tham chiếu khi cấu trúc source trang Metabolic Market và chuyển giao cho các phiên làm việc tiếp theo.*

# BÁO CÁO KIỂM TRA & KHUYẾN NGHỊ TỐI ƯU HÓA HÌNH ẢNH (WORDPRESS IMAGES AUDIT)

Báo cáo này liệt kê danh sách các hình ảnh nặng nhất được tải từ thư mục uploads của WordPress (`ideas.edu.vn/wp-content/uploads/`) đang làm chậm tốc độ tải trang (đặc biệt là chỉ số LCP - hình ảnh lớn nhất hiển thị).

Do các tệp này nằm trên máy chủ WordPress và được tải động, việc tối ưu hóa cần được thực hiện trực tiếp trên trang quản trị WordPress hoặc máy chủ lưu trữ.

---

## 1. Danh sách các hình ảnh cần tối ưu hóa hàng đầu

| Tên hình ảnh (URL gốc) | Dung lượng hiện tại | Kích thước thực tế | Kích thước hiển thị | Mức tiết kiệm ước tính | Giải pháp đề xuất |
| :--- | :--- | :--- | :--- | :--- | :--- |
| `image-1-1.png` | **1.005,5 KiB** | 837 x 646px | 654 x 295px | **~974 KiB** | Đổi sang định dạng **WebP**, resize chiều rộng về tối đa 800px. |
| `ltnumef10202501.jpg` (Ảnh LCP chính) | **507,8 KiB** | 1013 x 1008px | 871 x 580px | **~425 KiB** | Nén ảnh gốc, đổi sang **WebP**, resize về đúng 871x580px. |
| `DSCF6777.jpg` | **236,7 KiB** | 1384 x 1039px | 195 x 130px | **~232 KiB** | Quá lớn so với thực tế! Resize về đúng 390x260px (Retina 2x), chuyển sang **WebP**. |
| `461779815_852...n.jpg` (Ảnh Zoom) | **205,5 KiB** | 1453 x 1099px | 451 x 242px | **~191 KiB** | Quá lớn! Resize chiều rộng về đúng 451px, chuyển sang **WebP**. |
| `casc2.jpg` (Avatar học viên 5) | **129,0 KiB** | 686 x 684px | 38 x 32px | **~128 KiB** | Avatar tròn siêu nhỏ nhưng ảnh gốc cực kỳ nặng. Resize về đúng 80x80px, nén chất lượng 80%. |
| `buoihuongdan.jpg` | **112,0 KiB** | 1024 x 734px | 308 x 233px | **~101 KiB** | Resize về đúng 616x466px (Retina 2x), chuyển sang **WebP**. |
| `casc1.jpg` (Avatar học viên 1) | **83,7 KiB** | 557 x 543px | 35 x 32px | **~83 KiB** | Resize về đúng 80x80px. |
| `cumef.jpg` (Avatar học viên 4) | **79,0 KiB** | 552 x 550px | 32 x 32px | **~78 KiB** | Resize về đúng 80x80px. |
| `chu_hoang_thai.jpg` (Avatar học viên 6) | **64,0 KiB** | 654 x 658px | 36 x 32px | **~63 KiB** | Resize về đúng 80x80px. |
| `huynhphuong.jpg` (Avatar học viên 2) | **59,7 KiB** | 572 x 572px | 32 x 32px | **~59 KiB** | Resize về đúng 80x80px. |
| `hamien.jpg` (Avatar học viên 3) | **58,3 KiB** | 572 x 572px | 32 x 32px | **~58 KiB** | Resize về đúng 80x80px. |
| `Logo_IDEAS_Slg.webp` | **48,2 KiB** | 1920 x 1080px | 107 x 60px | **~46 KiB** | Ảnh logo nhưng độ phân giải FULL HD (1920px)! Cần resize về chiều rộng tối đa 220px. |

---

## 2. Hướng dẫn các bước xử lý trên hệ thống WordPress

Để giải quyết triệt để vấn đề này, bạn có thể thực hiện theo 2 cách dưới đây:

### Cách 1: Cài đặt Plugin tối ưu hóa tự động (Khuyên dùng)
Bạn cài đặt trực tiếp các plugin sau vào WordPress, chúng sẽ tự động nén và tạo ra phiên bản định dạng WebP nhẹ hơn 80% mà không giảm chất lượng ảnh:
1. **WebP Express** hoặc **EWWW Image Optimizer**: Tự động chuyển đổi toàn bộ ảnh hiện có và ảnh tải lên trong tương lai sang WebP/AVIF.
2. **Regenerate Thumbnails**: Sau khi nén, chạy plugin này để WordPress tự động sinh lại các kích thước ảnh nhỏ hơn (thumbnail) đúng với kích thước hiển thị trên giao diện Landing Page, tránh việc tải ảnh to 1920px cho một ô avatar chỉ rộng 32px.

### Cách 2: Tối ưu thủ công cho các ảnh LCP chính
Đối với các bức ảnh lớn ảnh hưởng lớn nhất đến điểm số LCP (như ảnh banner lễ tốt nghiệp `ltnumef10202501.jpg` và ảnh máy tính `image-1-1.png`):
1. Tải ảnh gốc xuống máy tính.
2. Sử dụng công cụ trực tuyến miễn phí [Squoosh.app](https://squoosh.app/) (của Google phát triển).
3. Đưa ảnh vào, chọn tính năng **Resize** về đúng kích thước hiển thị (VD: ảnh tốt nghiệp để 900px chiều rộng), chọn định dạng xuất ra là **WebP** với chất lượng (Quality) **75%**.
4. Tải lên lại WordPress đè lên ảnh cũ (hoặc cập nhật đường dẫn ảnh mới vào Landing Page). Dung lượng ảnh tốt nghiệp sẽ giảm từ **507 KB xuống dưới 60 KB** (tiết kiệm gần 90%).

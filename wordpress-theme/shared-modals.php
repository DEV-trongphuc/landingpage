<?php
/**
 * Shared Modals Template Part
 * Contains Registration Modal and Booking Modal with dynamic content tailored to the current page.
 */

// 1. Resolve page-specific content for Registration Modal (reg-modal)
$modal_badge = 'NHẬN TƯ VẤN 1:1';
$modal_title = 'Đăng ký tìm hiểu <br><span class="gradient-text">Hành Trình Học Tập</span>';
$modal_subtitle = 'Chuyên viên hỗ trợ học vụ sẽ liên hệ với bạn trong vòng 24h làm việc để tư vấn chi tiết.';

if (is_page('so-do-to-chuc')) {
    $modal_title = 'Đăng ký tìm hiểu <br><span class="gradient-text">Cơ Cấu Tổ Chức</span>';
} elseif (is_page('he-thong-ho-tro-hoc-tap-lms-ideas')) {
    $modal_title = 'Đăng ký trải nghiệm <br><span class="gradient-text">Hệ Sinh Thái LMS</span>';
    $modal_subtitle = 'Điền thông tin để chuyên viên cấp tài khoản học thử LMS và trợ lý AI.';
} elseif (is_page('ideas-talk')) {
    $modal_title = 'Đăng ký tham gia <br><span class="gradient-text">IDEAS Talk & AI</span>';
    $modal_subtitle = 'Điền thông tin bên dưới, chuyên viên tư vấn sẽ liên hệ hướng dẫn lịch học và nhận link Zoom.';
} elseif (is_page('ideas-podcast-series-01')) {
    $modal_title = 'Nhận tài liệu <br><span class="gradient-text">Podcast Series 01</span>';
    $modal_subtitle = 'Đăng ký thông tin để nhận slide tài liệu và thông báo tập podcast mới nhất.';
} elseif (is_page('ideas-ambassador')) {
    $modal_title = 'Đăng ký làm <br><span class="gradient-text">Đại Sứ IDEAS</span>';
    $modal_subtitle = 'Đồng hành lan tỏa tri thức và nhận chính sách đãi ngộ đặc quyền.';
} elseif (is_page('ho-tro-tai-chinh-sacombank')) {
    $modal_title = 'Đăng ký tư vấn <br><span class="gradient-text">Trả Góp Học Phí</span>';
    $modal_subtitle = 'Hỗ trợ trả góp học phí 0% liên kết Sacombank từ 12 đến 24 tháng.';
} elseif (is_page('cac-khoan-chi-phi')) {
    $modal_title = 'Nhận thông tin <br><span class="gradient-text">Học Phí & Ưu Đãi</span>';
    $modal_subtitle = 'Chuyên viên tư vấn tuyển sinh sẽ liên hệ gửi biểu phí chi tiết.';
}

// 2. Resolve page-specific program options for Booking Modal (bk-modal)
$program_options = [];

if (is_page('so-do-to-chuc')) {
    $program_options = [
        ['value' => 'Cơ cấu tổ chức Viện', 'label' => 'Tổ chức Viện IDEAS', 'desc' => 'Tìm hiểu thông tin hoạt động', 'icon' => '👔'],
        ['value' => 'Chương trình Thạc sĩ', 'label' => 'Chương trình Thạc sĩ', 'desc' => 'MBA / EMBA / MBA in AI / MSc AI', 'icon' => '🎓'],
        ['value' => 'Chưa quyết định', 'label' => 'Chưa quyết định', 'desc' => 'Cần tư vấn để lựa chọn', 'icon' => '💡']
    ];
} elseif (is_page('he-thong-ho-tro-hoc-tap-lms-ideas')) {
    $program_options = [
        ['value' => 'Hệ sinh thái LMS', 'label' => 'Hệ sinh thái LMS', 'desc' => 'Cách sử dụng & tính năng', 'icon' => '💻'],
        ['value' => 'Chương trình Thạc sĩ', 'label' => 'Chương trình Thạc sĩ', 'desc' => 'MBA / EMBA / MBA in AI / MSc AI', 'icon' => '🎓'],
        ['value' => 'Chưa quyết định', 'label' => 'Chưa quyết định', 'desc' => 'Cần tư vấn để lựa chọn', 'icon' => '💡']
    ];
} elseif (is_page('ideas-talk')) {
    $program_options = [
        ['value' => 'Chuyên đề IDEAS Talk', 'label' => 'IDEAS Talk', 'desc' => 'Đăng ký tham gia sự kiện', 'icon' => '🎤'],
        ['value' => 'MBA High Quality', 'label' => 'MBA Chất Lượng Cao', 'desc' => 'MBA / EMBA / MBA in AI', 'icon' => '🎓'],
        ['value' => 'Chưa quyết định', 'label' => 'Chưa quyết định', 'desc' => 'Cần tư vấn để lựa chọn', 'icon' => '💡']
    ];
} elseif (is_page('ideas-podcast-series-01')) {
    $program_options = [
        ['value' => 'Podcast Series 01', 'label' => 'Podcast Series 01', 'desc' => 'Xem và nhận tài liệu podcast', 'icon' => '🎙️'],
        ['value' => 'MBA High Quality', 'label' => 'MBA Chất Lượng Cao', 'desc' => 'MBA / EMBA / MBA in AI', 'icon' => '🎓'],
        ['value' => 'Chưa quyết định', 'label' => 'Chưa quyết định', 'desc' => 'Cần tư vấn để lựa chọn', 'icon' => '💡']
    ];
} elseif (is_page('ideas-ambassador')) {
    $program_options = [
        ['value' => 'Chính sách Ambassador', 'label' => 'Đại sứ IDEAS', 'desc' => 'Chính sách & quyền lợi', 'icon' => '🤝'],
        ['value' => 'MBA High Quality', 'label' => 'MBA Chất Lượng Cao', 'desc' => 'MBA / EMBA / MBA in AI', 'icon' => '🎓'],
        ['value' => 'Chưa quyết định', 'label' => 'Chưa quyết định', 'desc' => 'Cần tư vấn để lựa chọn', 'icon' => '💡']
    ];
} elseif (is_page('ho-tro-tai-chinh-sacombank')) {
    $program_options = [
        ['value' => 'Trả góp Sacombank', 'label' => 'Trả góp Sacombank', 'desc' => 'Hỗ trợ trả góp học phí 0%', 'icon' => '💳'],
        ['value' => 'MBA High Quality', 'label' => 'MBA Chất Lượng Cao', 'desc' => 'MBA / EMBA / MBA in AI', 'icon' => '🎓'],
        ['value' => 'Chưa quyết định', 'label' => 'Chưa quyết định', 'desc' => 'Cần tư vấn để lựa chọn', 'icon' => '💡']
    ];
} elseif (is_page('cac-khoan-chi-phi')) {
    $program_options = [
        ['value' => 'Các khoản chi phí', 'label' => 'Học phí & Lệ phí', 'desc' => 'Chi tiết các khoản phí', 'icon' => '💵'],
        ['value' => 'MBA High Quality', 'label' => 'MBA Chất Lượng Cao', 'desc' => 'MBA / EMBA / MBA in AI', 'icon' => '🎓'],
        ['value' => 'Chưa quyết định', 'label' => 'Chưa quyết định', 'desc' => 'Cần tư vấn để lựa chọn', 'icon' => '💡']
    ];
} else {
    $program_options = [
        ['value' => 'MBA High Quality', 'label' => 'MBA Chất Lượng Cao', 'desc' => 'MBA / EMBA / MBA in AI / MSc AI', 'icon' => '🎓'],
        ['value' => 'Cần tư vấn chung', 'label' => 'Tư vấn chung', 'desc' => 'Học bổng & Tuyển sinh', 'icon' => '📞'],
        ['value' => 'Chưa quyết định', 'label' => 'Chưa quyết định', 'desc' => 'Cần tư vấn để lựa chọn', 'icon' => '💡']
    ];
}
?>

<!-- 1. Generic Registration Popup Modal -->
<div class="reg-modal" id="reg-modal" role="dialog" aria-modal="true" aria-hidden="true" style="display:none;">
    <div class="reg-modal-overlay" id="reg-modal-overlay"></div>
    <div class="reg-modal-container" data-lenis-prevent>
        <button class="reg-modal-close" id="reg-modal-close" aria-label="Đóng modal">✕</button>
        <div class="reg-modal-content">
            <header class="modal-form-header">
                <div class="modal-badge"><?php echo esc_html($modal_badge); ?></div>
                <h3><?php echo $modal_title; ?></h3>
                <p><?php echo esc_html($modal_subtitle); ?></p>
            </header>

            <form class="cta-form modal-form" id="modal-cta-form" novalidate>
                <div class="form-group">
                    <label for="modal-fullname">Họ và tên *</label>
                    <input type="text" id="modal-fullname" name="fullname" placeholder="Họ và tên của bạn" required />
                    <span class="form-error" id="modal-fullname-error"></span>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="modal-phone">Số điện thoại *</label>
                        <input type="tel" id="modal-phone" name="phone" placeholder="Số điện thoại" required />
                        <span class="form-error" id="modal-phone-error"></span>
                    </div>
                    <div class="form-group">
                        <label for="modal-email">Email *</label>
                        <input type="email" id="modal-email" name="email" placeholder="Địa chỉ email" required />
                        <span class="form-error" id="modal-email-error"></span>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="modal-education">Trình độ học vấn *</label>
                        <select id="modal-education" name="education" required>
                            <option value="">-- Chọn trình độ --</option>
                            <option value="highschool">THPT</option>
                            <option value="college">Cao đẳng</option>
                            <option value="bachelor">Cử nhân</option>
                            <option value="master">Thạc sĩ</option>
                            <option value="other">Khác</option>
                        </select>
                        <span class="form-error" id="modal-education-error"></span>
                    </div>
                    <div class="form-group">
                        <label for="modal-english">Trình độ Tiếng Anh *</label>
                        <select id="modal-english" name="english" required>
                            <option value="">-- Chọn trình độ --</option>
                            <option value="below-5.0">Dưới IELTS 5.0</option>
                            <option value="5.0-5.5">IELTS 5.0 - 5.5</option>
                            <option value="6.0-plus">IELTS 6.0+</option>
                            <option value="other">Khác / Chưa thi</option>
                        </select>
                        <span class="form-error" id="modal-english-error"></span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="modal-message">Nội dung bạn muốn chia sẻ / thời gian có thể nghe tư vấn 1:1</label>
                    <textarea id="modal-message" name="message" placeholder="Ví dụ: Tôi quan tâm chương trình MBA..." rows="3"></textarea>
                </div>

                <button type="submit" class="btn btn-primary btn-full" id="modal-form-submit-btn" aria-label="Gửi đăng ký tư vấn">
                    <span>Gửi thông tin đăng ký</span>
                    <svg width="20" height="20" fill="none" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M12 5l7 7-7 7" />
                    </svg>
                </button>

                <div class="modal-zalo-section">
                    <div class="modal-zalo-divider">
                        <span>Hoặc chọn cách liên hệ</span>
                    </div>
                    <div class="modal-zalo-row">
                        <a href="https://zalo.me/3857867121882640296" target="_blank" class="modal-zalo-btn" aria-label="Chat Zalo với IDEAS">
                            <img decoding="async" src="https://cdn-1.webcatalog.io/catalog/zalo-oa/zalo-oa-icon-unplated.png?v=1780553812775" alt="Zalo Logo IDEAS" width="20" height="20" loading="lazy">
                            <span>Chat Zalo với IDEAS</span>
                        </a>
                        <button type="button" class="modal-booking-btn" id="modal-open-booking" aria-label="Đặt lịch hẹn tư vấn">
                            <svg width="16" height="16" fill="none" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <span>Đặt lịch tư vấn</span>
                        </button>
                    </div>
                </div>

                <p class="form-privacy">Cam kết bảo mật thông tin</p>
            </form>

            <div class="modal-form-success" id="modal-form-success">
                <div class="success-circle">
                    <svg viewBox="0 0 52 52" class="checkmark">
                        <circle cx="26" cy="26" r="25" fill="none" class="checkmark__circle" />
                        <path fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" class="checkmark__check" />
                    </svg>
                </div>
                <h3>Gửi thông tin thành công!</h3>
                <p>Cảm ơn bạn đã quan tâm. Chuyên viên của IDEAS sẽ liên hệ trong thời gian sớm nhất.</p>
                <button type="button" class="btn btn-primary btn-full" style="margin-top: 32px;" onclick="closeRegModal()">Quay lại trang</button>
            </div>
        </div>
    </div>
</div>

<!-- 2. Booking Modal - Đặt lịch tư vấn -->
<div class="bk-modal" id="bk-modal" role="dialog" aria-modal="true" aria-hidden="true" aria-labelledby="bk-title">
    <div class="bk-overlay" id="bk-overlay"></div>
    <div class="bk-container" data-lenis-prevent role="document">
        <button class="bk-close" id="bk-close" aria-label="Đóng modal">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
                <line x1="18" y1="6" x2="6" y2="18" />
                <line x1="6" y1="6" x2="18" y2="18" />
            </svg>
        </button>

        <!-- Progress bar -->
        <div class="bk-progress">
            <div class="bk-progress-track">
                <div class="bk-progress-fill" id="bk-progress-fill"></div>
            </div>
            <div class="bk-steps-label">
                <span class="bk-step-lbl active" data-step="1">Thông tin</span>
                <span class="bk-step-lbl" data-step="2">Chọn lịch</span>
                <span class="bk-step-lbl" data-step="3">Xác nhận</span>
            </div>
        </div>

        <!-- STEP 1: Personal Info -->
        <div class="bk-step" id="bk-step-1">
            <div class="bk-step-header">
                <div class="bk-header-icon">
                    <svg width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                <div>
                    <div class="bk-step-badge">BƯỚC 1 / 3</div>
                    <h2 class="bk-step-title" id="bk-title">Thông tin của bạn</h2>
                    <p class="bk-step-sub">Điền thông tin để chuyên viên chuẩn bị buổi tư vấn phù hợp nhất</p>
                </div>
            </div>

            <form class="bk-form" id="bk-form-1" novalidate>
                <div class="bk-field">
                    <label for="bk-name">Họ và tên <span class="bk-required">*</span></label>
                    <div class="bk-input-wrap">
                        <svg class="bk-input-icon" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        <input type="text" id="bk-name" name="bk-name" placeholder="Nguyễn Văn A" autocomplete="name" required />
                    </div>
                    <span class="bk-err" id="bk-name-err"></span>
                </div>

                <div class="bk-row-2">
                    <div class="bk-field">
                        <label for="bk-phone">Số điện thoại <span class="bk-required">*</span></label>
                        <div class="bk-input-wrap">
                            <svg class="bk-input-icon" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <input type="tel" id="bk-phone" name="bk-phone" placeholder="0912 345 678" autocomplete="tel" required />
                        </div>
                        <span class="bk-err" id="bk-phone-err"></span>
                    </div>
                    <div class="bk-field">
                        <label for="bk-email">Email <span class="bk-required">*</span></label>
                        <div class="bk-input-wrap">
                            <svg class="bk-input-icon" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <input type="email" id="bk-email" name="bk-email" placeholder="email@company.com" autocomplete="email" required />
                        </div>
                        <span class="bk-err" id="bk-email-err"></span>
                    </div>
                </div>

                <div class="bk-row-2">
                    <div class="bk-field">
                        <label for="bk-edu">Trình độ học vấn <span class="bk-required">*</span></label>
                        <div class="bk-select-wrap">
                            <select id="bk-edu" name="bk-edu" required>
                                <option value="">-- Chọn trình độ --</option>
                                <option value="highschool">THPT</option>
                                <option value="college">Cao đẳng</option>
                                <option value="bachelor">Cử nhân</option>
                                <option value="master">Thạc sĩ</option>
                                <option value="other">Khác</option>
                            </select>
                        </div>
                        <span class="bk-err" id="bk-edu-err"></span>
                    </div>
                    <div class="bk-field">
                        <label for="bk-eng">Trình độ Tiếng Anh <span class="bk-required">*</span></label>
                        <div class="bk-select-wrap">
                            <select id="bk-eng" name="bk-eng" required>
                                <option value="">-- Chọn trình độ --</option>
                                <option value="below-5.0">Dưới IELTS 5.0</option>
                                <option value="5.0-5.5">IELTS 5.0 – 5.5</option>
                                <option value="6.0-plus">IELTS 6.0+</option>
                                <option value="other">Khác / Chưa thi</option>
                            </select>
                        </div>
                        <span class="bk-err" id="bk-eng-err"></span>
                    </div>
                </div>

                <div class="bk-field">
                    <label>Chương trình quan tâm <span class="bk-required">*</span></label>
                    <div class="bk-program-grid" id="bk-program-grid">
                        <?php foreach ($program_options as $index => $opt): ?>
                        <label class="bk-program-card">
                            <input type="radio" name="bk-program" value="<?php echo esc_attr($opt['value']); ?>" <?php echo $index === 0 ? 'checked' : ''; ?> />
                            <div class="bk-program-inner">
                                <div class="bk-program-icon"><?php echo esc_html($opt['icon']); ?></div>
                                <div class="bk-program-name"><?php echo esc_html($opt['label']); ?></div>
                                <div class="bk-program-desc"><?php echo esc_html($opt['desc']); ?></div>
                            </div>
                        </label>
                        <?php endforeach; ?>
                    </div>
                    <span class="bk-err" id="bk-program-err"></span>
                </div>

                <button type="button" class="bk-btn-next" id="bk-next-1" aria-label="Sang bước tiếp theo: chọn lịch">
                    Tiếp theo - Chọn lịch
                    <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7" />
                    </svg>
                </button>
            </form>
        </div>

        <!-- STEP 2: Date & Time -->
        <div class="bk-step bk-hidden" id="bk-step-2">
            <div class="bk-step-header">
                <div class="bk-header-icon">
                    <svg width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2" />
                        <line x1="16" y1="2" x2="16" y2="6" />
                        <line x1="8" y1="2" x2="8" y2="6" />
                        <line x1="3" y1="10" x2="21" y2="10" />
                    </svg>
                </div>
                <div>
                    <div class="bk-step-badge">BƯỚC 2 / 3</div>
                    <h2 class="bk-step-title">Chọn ngày &amp; giờ</h2>
                    <p class="bk-step-sub">Chọn thời gian phù hợp để chuyên viên gọi tư vấn cho bạn</p>
                </div>
            </div>

            <div class="bk-calendar-wrap">
                <div class="bk-cal-header">
                    <button type="button" class="bk-cal-nav" id="bk-cal-prev" aria-label="Tháng trước">
                        <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                    <span class="bk-cal-month-label" id="bk-cal-month-label"></span>
                    <button type="button" class="bk-cal-nav" id="bk-cal-next" aria-label="Tháng tiếp theo">
                        <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
                <div class="bk-cal-weekdays">
                    <span>T2</span><span>T3</span><span>T4</span><span>T5</span><span>T6</span><span>T7</span><span>CN</span>
                </div>
                <div class="bk-cal-grid" id="bk-cal-grid"></div>
            </div>

            <div class="bk-time-section" id="bk-time-section">
                <div class="bk-time-label">
                    <svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10" />
                        <polyline points="12 6 12 12 16 14" />
                    </svg>
                    <span id="bk-selected-date-label">Vui lòng chọn ngày trước</span>
                </div>
                <div class="bk-time-grid" id="bk-time-grid"></div>
                <span class="bk-err" id="bk-time-err"></span>
            </div>

            <div class="bk-step-actions">
                <button type="button" class="bk-btn-back" id="bk-back-2" aria-label="Quay lại bước trước">
                    <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 12H5M12 19l-7-7 7-7" />
                    </svg>
                    Quay lại
                </button>
                <button type="button" class="bk-btn-next" id="bk-next-2" aria-label="Sang bước tiếp theo: xem xác nhận">
                    Xem xác nhận
                    <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- STEP 3: Confirm -->
        <div class="bk-step bk-hidden" id="bk-step-3">
            <div class="bk-step-header">
                <div class="bk-header-icon">
                    <svg width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                    </svg>
                </div>
                <div>
                    <div class="bk-step-badge">BƯỚC 3 / 3</div>
                    <h2 class="bk-step-title">Xác nhận lịch hẹn</h2>
                    <p class="bk-step-sub">Vui lòng kiểm tra kỹ các thông tin trước khi xác nhận đặt lịch</p>
                </div>
            </div>

            <div class="bk-confirm-summary">
                <div class="bk-confirm-item-data">
                    <span class="bk-confirm-lbl">Lịch tư vấn</span>
                    <div class="bk-confirm-val">
                        <i class="fa-regular fa-calendar-check"></i>
                        <span id="bk-confirm-date">-</span> &nbsp;lúc&nbsp;
                        <span id="bk-confirm-time">-</span>
                    </div>
                </div>
                <div class="bk-confirm-grid">
                    <div class="bk-confirm-cell">
                        <span class="bk-confirm-lbl">Họ và tên</span>
                        <span class="bk-confirm-val" id="bk-confirm-name">-</span>
                    </div>
                    <div class="bk-confirm-cell">
                        <span class="bk-confirm-lbl">Số điện thoại</span>
                        <span class="bk-confirm-val" id="bk-confirm-phone">-</span>
                    </div>
                    <div class="bk-confirm-cell">
                        <span class="bk-confirm-lbl">Email</span>
                        <span class="bk-confirm-val" id="bk-confirm-email" style="word-break: break-all;">-</span>
                    </div>
                    <div class="bk-confirm-cell">
                        <span class="bk-confirm-lbl">Chương trình</span>
                        <span class="bk-confirm-val" id="bk-confirm-program">-</span>
                    </div>
                </div>
            </div>

            <div class="bk-step-actions">
                <button type="button" class="bk-btn-back" id="bk-back-3" aria-label="Quay lại bước trước">
                    <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 12H5M12 19l-7-7 7-7" />
                    </svg>
                    Quay lại
                </button>
                <button type="button" class="bk-btn-next" id="bk-confirm-btn" aria-label="Xác nhận lịch hẹn">
                    Xác nhận đặt lịch
                    <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- SUCCESS STATE -->
        <div class="bk-step bk-hidden" id="bk-step-success">
            <div class="bk-success-icon-box">
                <svg viewBox="0 0 52 52" class="bk-checkmark">
                    <circle cx="26" cy="26" r="25" fill="none" class="bk-checkmark-circle" />
                    <path fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" class="bk-checkmark-check" />
                </svg>
            </div>
            <h2 class="bk-success-title">Đặt lịch thành công!</h2>
            <p class="bk-success-sub">Thông tin lịch hẹn của bạn đã được ghi nhận. Chuyên viên sẽ gọi cho bạn theo khung giờ đăng ký.</p>

            <div class="bk-success-details">
                <div class="bk-success-details-row">
                    <span>Học viên:</span>
                    <strong id="bk-success-name">-</strong>
                </div>
                <div class="bk-success-details-row">
                    <span>Ngày hẹn:</span>
                    <strong id="bk-success-date">-</strong>
                </div>
                <div class="bk-success-details-row">
                    <span>Khung giờ:</span>
                    <strong id="bk-success-time">-</strong>
                </div>
            </div>

            <button type="button" class="bk-btn-done" id="bk-done-btn">Hoàn tất</button>
        </div>
    </div>
</div>

<!-- Modal show/hide and Submit script wrappers -->
<script>
    var activeCtaSource = 'unknown';

    function showform(ctaSource = 'general_cta') {
        let resolvedSource = 'general_cta';
        if (ctaSource) {
            if (typeof ctaSource === 'object' && ctaSource.innerText) {
                resolvedSource = ctaSource.innerText.replace(/\s+/g, ' ').trim();
            } else if (typeof ctaSource === 'string') {
                let el = document.getElementById(ctaSource) ||
                    document.querySelector('.' + ctaSource) ||
                    document.querySelector(`[data-cta="${ctaSource}"]`);

                if (el && el.innerText) {
                    resolvedSource = el.innerText.replace(/\s+/g, ' ').trim();
                } else {
                    resolvedSource = ctaSource;
                }
            } else {
                resolvedSource = String(ctaSource);
            }
        }
        activeCtaSource = resolvedSource;

        if (typeof window.openRegModal === 'function') {
            window.openRegModal(resolvedSource);
        } else {
            const regModal = document.getElementById('reg-modal');
            if (regModal) {
                regModal.style.display = 'flex';
                setTimeout(function() {
                    regModal.classList.add('open');
                    regModal.setAttribute('aria-hidden', 'false');
                }, 10);
            }
        }
    }

    function closeRegModal() {
        if (typeof window.closeRegModal === 'function') {
            window.closeRegModal();
        } else {
            const regModal = document.getElementById('reg-modal');
            if (regModal) {
                regModal.classList.remove('open');
                regModal.setAttribute('aria-hidden', 'true');
                setTimeout(function() {
                    regModal.style.display = 'none';
                }, 400);
            }
        }
    }

    document.addEventListener('DOMContentLoaded', () => {
        const form = document.getElementById('modal-cta-form');
        if (!form) return;

        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            
            const nameInput = form.querySelector('input[placeholder*="Họ và tên"]');
            const phoneInput = form.querySelector('input[placeholder*="Số điện thoại"]');
            const emailInput = form.querySelector('input[placeholder*="email"]');
            const eduSelect = form.querySelector('select[name="education"]');
            const engSelect = form.querySelector('select[name="english"]');
            const msgTextarea = form.querySelector('textarea[name="message"]');
            
            const name = nameInput ? nameInput.value.trim() : '';
            const phone = phoneInput ? phoneInput.value.trim() : '';
            const email = emailInput ? emailInput.value.trim() : '';
            const eduVal = eduSelect ? eduSelect.value : '';
            const engVal = engSelect ? engSelect.value : '';
            const msgVal = msgTextarea ? msgTextarea.value.trim() : '';

            if (!name || !phone || !email) {
                alert('Vui lòng điền đầy đủ các thông tin bắt buộc.');
                return;
            }

            // Dynamically determine page context from pathname
            const path = window.location.pathname.toLowerCase();
            let sourceVal = "Landing_General";
            let typeVal = "general_page_registration";
            let notePrefix = "Đăng ký tuyển sinh";
            let chuongTrinhVal = "General International Program";
            
            if (path.includes("so-do-to-chuc")) {
                sourceVal = "Landing_Org_Structure";
                typeVal = "org_page_registration";
                notePrefix = "Đăng ký từ trang Sơ đồ tổ chức";
                chuongTrinhVal = "Cơ cấu tổ chức Viện IDEAS";
            } else if (path.includes("he-thong-ho-tro-hoc-tap-lms-ideas")) {
                sourceVal = "Landing_LMS_Ecosystem";
                typeVal = "lms_page_registration";
                notePrefix = "Đăng ký từ trang LMS";
                chuongTrinhVal = "LMS Moodle và Hệ sinh thái";
            } else if (path.includes("ideas-talk")) {
                sourceVal = "Landing_IDEAS_Talk";
                typeVal = "ideas_talk_registration";
                notePrefix = "Đăng ký từ trang chuyên đề IDEAS Talk";
                chuongTrinhVal = "Chuyên đề IDEAS Talk";
            } else if (path.includes("podcast")) {
                sourceVal = "Landing_Podcast";
                typeVal = "podcast_page_registration";
                notePrefix = "Đăng ký từ trang Podcast";
                chuongTrinhVal = "Podcast Series 01";
            } else if (path.includes("ambassador")) {
                sourceVal = "Landing_Ambassador";
                typeVal = "ambassador_page_registration";
                notePrefix = "Đăng ký từ trang Ambassador";
                chuongTrinhVal = "Chính sách Ambassador";
            } else if (path.includes("sacombank")) {
                sourceVal = "Landing_Sacombank";
                typeVal = "sacombank_page_registration";
                notePrefix = "Đăng ký từ trang Trả góp Sacombank";
                chuongTrinhVal = "Trả góp Sacombank";
            } else if (path.includes("chi-phi") || path.includes("hoc-phi")) {
                sourceVal = "Landing_Fees";
                typeVal = "fees_page_registration";
                notePrefix = "Đăng ký từ trang Học phí";
                chuongTrinhVal = "Các khoản chi phí";
            }

            const eduText = eduSelect && eduSelect.selectedIndex >= 0 ? eduSelect.options[eduSelect.selectedIndex].text : eduVal;
            const engText = engSelect && engSelect.selectedIndex >= 0 ? engSelect.options[engSelect.selectedIndex].text : engVal;

            const noteParts = [];
            if (eduText) noteParts.push('Học vấn: ' + eduText);
            if (engText) noteParts.push('Tiếng Anh: ' + engText);
            if (msgVal) noteParts.push(msgVal);
            
            const ctaSource = (typeof activeCtaSource !== 'undefined') ? activeCtaSource : 'modal_form';
            noteParts.push('CTA Source: ' + ctaSource);
            const combinedNote = noteParts.join(' | ');

            // Prepare submission payloads
            const payload = {
                form_id: "4fe1eeb0570742a1fdde61af6fc0680c",
                email: email,
                firstName: name,
                phoneNumber: phone,
                time_dat_lich: "",
                note_dat_lich: notePrefix,
                chuong_trinh_dat_lich: chuongTrinhVal
            };

            const webhookPayload = {
                name: name,
                phone: phone,
                email: email,
                source: sourceVal,
                type: typeVal,
                tieng_anh: engText,
                hoc_van: eduText,
                time_dat_lich: "",
                chuong_trinh: chuongTrinhVal,
                nhu_cau: `Đăng ký từ ${notePrefix} | Note: ${combinedNote}`
            };

            // Bind UTMs
            const urlParams = new URLSearchParams(window.location.search);
            const utmParams = ['utm_campaign', 'utm_source', 'utm_medium', 'utm_content', 'utm_term'];
            utmParams.forEach(param => {
                const val = urlParams.get(param);
                if (val) webhookPayload[param] = val;
            });

            // Trigger request
            const btn = form.querySelector('button[type="submit"]');
            if (btn) {
                btn.disabled = true;
                btn.style.opacity = '0.7';
            }

            try {
                const p1 = fetch("https://automation.ideas.edu.vn/mail_api/forms.php?route=submit", {
                    method: "POST",
                    headers: { "Content-Type": "application/json" },
                    body: JSON.stringify(payload)
                });

                const p2 = fetch("https://open.domation.net/sale_data/webhook.php?token=tok_kjhbs32a", {
                    method: "POST",
                    headers: { "Content-Type": "application/json" },
                    body: JSON.stringify(webhookPayload)
                });

                await Promise.allSettled([p1, p2]);
                
                // Google Ads Conversion tracking
                if (typeof window.gtag === 'function') {
                    window.gtag('event', 'conversion', {
                        'send_to': 'AW-11205917800/mdXJCOTL-bccEOj4st8p',
                        'value': 1.0,
                        'currency': 'USD'
                    });
                }

                // Handle success
                const successContainer = document.getElementById('modal-form-success');
                if (successContainer) {
                    successContainer.classList.add('visible');
                    form.style.display = 'none';
                }
            } catch (error) {
                console.error('Submission error:', error);
                alert('Có lỗi xảy ra trong quá trình gửi thông tin. Vui lòng thử lại sau.');
            } finally {
                if (btn) {
                    btn.disabled = false;
                    btn.style.opacity = '1';
                }
            }
        });
    });
</script>

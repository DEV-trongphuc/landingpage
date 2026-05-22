document.addEventListener("DOMContentLoaded", () => {
    let eventNOW = false;
    
    // Helper to safely set text content
    const safeSetText = (selector, text) => {
        const el = document.querySelector(selector);
        if (el) el.textContent = text;
    };

    // Helper to safely set href
    const safeSetHref = (selector, href) => {
        const el = document.querySelector(selector);
        if (el) el.href = href;
    };

    // --- Basic Data Rendering ---
    safeSetText(".year_count", IDEAS_DATA.year_count);
    safeSetText(".students_count", IDEAS_DATA.students_count);
    safeSetText(".teachers_count", IDEAS_DATA.teachers_count);
    safeSetText(".courses_count", IDEAS_DATA.courses_count);
    
    const students_count_quote = document.querySelector(".students_count_quote");
    if (students_count_quote) {
        students_count_quote.textContent = IDEAS_DATA.students_count - IDEAS_DATA.student_quote.length;
    }

    safeSetHref(".ideas_follow a:nth-of-type(1)", IDEAS_DATA.facebook_link);
    safeSetHref(".ideas_follow a:nth-of-type(2)", IDEAS_DATA.youtube_link);
    safeSetHref(".ideas_follow a:nth-of-type(3)", IDEAS_DATA.linkedin_link);
    safeSetHref(".ideas_follow a:nth-of-type(4)", IDEAS_DATA.tiktok_link);
    safeSetHref(".ideas_follow a:nth-of-type(5)", IDEAS_DATA.zalo_link);

    // --- Popup Event ---
    const ideas_popup_event = document.querySelector(".ideas_popup_event");
    if (ideas_popup_event) {
        eventNOW = true;
        const ideas_popup_event_close = ideas_popup_event.querySelector("i");
        if (ideas_popup_event_close) {
            ideas_popup_event_close.addEventListener("click", () => {
                ideas_popup_event.classList.remove("active");
            });
        }
        setTimeout(() => {
            ideas_popup_event.classList.add("active");
        }, 3000);
    }

    // --- Graduation Ceremony ---
    const historyInner = document.querySelector(".ideas_history_inner");
    if (historyInner && IDEAS_DATA.graduation_ceremony && IDEAS_DATA.graduation_ceremony.length > 0) {
        historyInner.innerHTML = IDEAS_DATA.graduation_ceremony.map(ceremony => `
            <div class="ideas_history_item">
              <span class="ideas_history_time">${ceremony.time}</span>
              <img src="${ceremony.avatar}" alt="${ceremony.title} ${ceremony.name}">
              <div class="ideas_history_item_info">
                <p>${ceremony.title}</p>
                <p><i class="fa-solid fa-earth-oceania"></i> ${ceremony.school}</p>
                <p><i class="fa-solid fa-graduation-cap"></i> ${ceremony.name}</p>
                <p><i class="fa-solid fa-location-dot"></i> ${ceremony.location}</p>
                <a class="ideas_history_item_play" href="${ceremony.link}" target="_blank">
                  <i class="fa-solid fa-play"></i>
                </a>
              </div>
            </div>
        `).join("");
    }

    // --- FAQ Rendering ---
    const ideasFaqInner = document.querySelector(".ideas_faq_inner");
    if (ideasFaqInner && IDEAS_DATA.faq) {
        ideasFaqInner.innerHTML = IDEAS_DATA.faq.map((item, index) => `
            <div class="ideas_faq_item ${index === 0 ? "active" : ""}">
              <p>
                <span>${item.q}</span>
                <span><i class="fa-solid fa-angle-down"></i></span>
              </p>
              <span>${item.a}</span>
            </div>
        `).join("");

        const faqItems = document.querySelectorAll(".ideas_faq_item");
        faqItems.forEach(item => {
            item.addEventListener("click", () => {
                faqItems.forEach(el => el.classList.remove("active"));
                item.classList.add("active");
            });
        });
    }

    // --- School Logos ---
    const schoolContainer = document.querySelector(".ideas_coop_box.school");
    if (schoolContainer && IDEAS_DATA.school) {
        schoolContainer.innerHTML = Object.entries(IDEAS_DATA.school).map(([name, school]) => `
            <a class="ideas_coop_item" href="${school.link}">
                <img src="${school.logo}" alt="${name}">
            </a>
        `).join("");
    }

    // --- Student Avatars ---
    const avatarContainer = document.querySelector(".ideas_social_avatar_inner > div");
    if (avatarContainer && IDEAS_DATA.student_quote) {
        avatarContainer.innerHTML = IDEAS_DATA.student_quote.map((student, index) => `
            <img src="${student.avatar}" alt="${student.name}" class="${index < 2 ? "ideas_social_main_avt" : ""}">
        `).join("");
    }

    // --- Student Quotes ---
    const quoteInner = document.querySelector(".ideas_quote_inner");
    if (quoteInner && IDEAS_DATA.student_quote) {
        quoteInner.innerHTML = IDEAS_DATA.student_quote.map(quote => `
            <div class="ideas_quote_item">
              <div class="ideas_quote_info">
                <img src="${quote.avatar}" alt="${quote.name}">
                <div>
                  <p>${quote.name}</p>
                  <div class="ideas_star">
                    ${'<i class="fa-solid fa-star"></i>'.repeat(5)}
                  </div>
                  <span>${quote.title}</span>
                </div>
              </div>
              <div class="ideas_quote_detail">
                <i class="fa-solid fa-quote-left"></i> ${quote.content}
              </div>
            </div>
        `).join("");
    }

    // --- Programmes (MBA/DBA) ---
    const renderProgrammes = (selector, level) => {
        const box = document.querySelector(selector);
        if (!box) return;
        box.innerHTML = Object.values(IDEAS_DATA.programmes)
            .filter(course => course.level === level)
            .map(course => `
                <div class="ideas_course">
                  <img src="${course.avatar}" alt="${course.name}">
                  <div class="ideas_course_info">
                    <p>${course.name}</p>
                    <div class="ideas_school">
                      <a href="${IDEAS_DATA.school[course.school].link}" target="_blank">
                        <img src="${IDEAS_DATA.school[course.school].small_logo}">
                        <span>${course.school}</span>
                      </a>
                    </div>
                    <ul class="ideas_course_detail">
                      <li><i class="fa-solid fa-book"></i> ${course.subjects}</li>
                      <li><i class="fa-solid fa-clock"></i> ${course.duration}</li>
                      <li><i class="fa-solid fa-award"></i> <b>${course.fee_course[0].price}</b></li>
                    </ul>
                    <div class="ideas_btns space_between">
                      <a onclick='showform("${course.name}")' class="sign_course">
                        <i class="fa-solid fa-headset"></i> Tư vấn
                      </a>
                      <a href="${course.link}" class="view_course" ${level === "DBA" ? 'style="background: #b27a0d;"' : ''}>
                        <i class="fa-solid fa-graduation-cap"></i> Chi tiết
                      </a>
                    </div>
                  </div>
                </div>
            `).join("");
    };

    renderProgrammes(".ideas_courses_box.mba", "MBA");
    renderProgrammes(".ideas_courses_box.dba", "DBA");

    // --- Dynamic News Loading Logic (Featured + List) ---
    async function loadWordPressPosts() {
        const container = document.getElementById("wp-news-container");
        if (!container) return;

        try {
            const response = await fetch("https://ideas.edu.vn/wp-json/wp/v2/posts?_embed&per_page=6");
            if (!response.ok) throw new Error("API call failed");
            const posts = await response.json();

            if (posts && posts.length > 0) {
                const featuredPost = posts[0];
                const listPosts = posts.slice(1, 6); // Lấy tối đa 5 bài cho danh sách bên phải

                // Featured Post HTML
                const fTitle = featuredPost.title.rendered;
                const fLink = featuredPost.link;
                const fExcerpt = featuredPost.excerpt.rendered.replace(/<[^>]*>/g, '').substring(0, 150) + "...";
                const fDate = new Date(featuredPost.date).toLocaleDateString('vi-VN', { day: '2-digit', month: '2-digit' });
                const fThumb = featuredPost._embedded['wp:featuredmedia'] 
                    ? featuredPost._embedded['wp:featuredmedia'][0].source_url 
                    : 'https://ideas.edu.vn/wp-content/uploads/2025/07/ideas_side2.webp';

                let html = `
                    <div class="news-featured">
                        <a href="${fLink}" target="_blank" class="featured-card">
                            <div class="thumb">
                                <img src="${fThumb}" alt="${fTitle}" loading="lazy">
                                <span class="date-badge">${fDate}</span>
                            </div>
                            <div class="content">
                                <h3>${fTitle}</h3>
                                <p>${fExcerpt}</p>
                                <span class="read-more">Đọc tiếp <i class="fa-solid fa-arrow-right"></i></span>
                            </div>
                        </a>
                    </div>
                    <div class="news-list">
                `;

                // List Posts HTML
                listPosts.forEach(post => {
                    const lTitle = post.title.rendered;
                    const lLink = post.link;
                    const lDate = new Date(post.date).toLocaleDateString('vi-VN');
                    const lThumb = post._embedded['wp:featuredmedia'] 
                        ? post._embedded['wp:featuredmedia'][0].source_url 
                        : 'https://ideas.edu.vn/wp-content/uploads/2025/07/ideas_side2.webp';

                    html += `
                        <a href="${lLink}" target="_blank" class="news-item">
                            <div class="item-thumb">
                                <img src="${lThumb}" alt="${lTitle}" loading="lazy">
                            </div>
                            <div class="item-info">
                                <h4>${lTitle}</h4>
                                <span class="item-date">${lDate}</span>
                            </div>
                        </a>
                    `;
                });

                html += `</div>`;
                container.innerHTML = html;
            }
        } catch (error) {
            console.error("Error loading WordPress posts:", error);
        }
    }

    loadWordPressPosts();

    // Swiper Home initialization (if exists)
    const swiperContainer = document.querySelector(".swiper-container.home.main");
    if (swiperContainer) {
        const swiperHome = new Swiper(".swiper-container.home.main", {
            spaceBetween: 20,
            loop: true,
            autoplay: { delay: 5000, disableOnInteraction: false },
            speed: 800,
            observer: true,
            observeParents: true,
            pagination: { el: ".swiper-pagination", clickable: true },
            breakpoints: {
                320: { slidesPerView: 1, spaceBetween: 10 },
                768: { slidesPerView: 2, spaceBetween: 15 },
                1100: { slidesPerView: 3, spaceBetween: 20 },
            },
        });
    }
});
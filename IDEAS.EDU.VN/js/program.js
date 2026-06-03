document.addEventListener("DOMContentLoaded", () => {
    const h1 = document.querySelector("#code_program");
    const program_avatar = document.querySelector(".program_avatar");
    const program_school = document.querySelector(".program_school");
    const program_tagline = document.querySelector(".program_tagline");
    const program_description = document.querySelector(".program_description");
    const ideas_highlight = document.querySelector("#ideas_highlight");
    const ideas_program_head_share = document.querySelector(
        ".ideas_program_head_share",
    );
    if (ideas_program_head_share) {
        ideas_program_head_share.addEventListener("click", () => {
            const currentURL = window.location.href;
            navigator.clipboard
                .writeText(currentURL)
                .then(() => {
                    const content = ` <i class="fa-solid fa-copy main_clr"></i>
          <span
            >Đã copy</span
          >`;
                    renderAlert("COPY", content);
                })
                .catch((err) => {
                    console.error("Lỗi khi copy: ", err);
                });
        });
    }
    const ID = h1.dataset.program;
    const PROGRAM = IDEAS_DATA.programmes[ID];
    h1.textContent = PROGRAM.name;
    program_avatar.src = IDEAS_DATA.school[PROGRAM.school].small_logo;
    program_school.textContent = PROGRAM.school;
    program_tagline.textContent = PROGRAM.tagline;
    program_description.textContent = PROGRAM.description;
    ideas_highlight.innerHTML = `
   <div class="ideas_require_title" >
            <i class="fa-solid fa-globe"></i>
            <p>
              <span>Hình thức</span>
              <span>${PROGRAM.highlight[0]}</span>
            </p>
          </div>
          <div class="ideas_require_title">
            <i class="fa-solid fa-graduation-cap"></i>
            <p>
              <span>Bằng cấp</span>
           <span>${PROGRAM.highlight[1]}</span>
            </p>
          </div>
          <div class="ideas_require_title">
            <i class="fa-solid fa-clock"></i>
            <p>
              <span>Thời gian học với trường</span>
             <span>${PROGRAM.highlight[2]}</span>
            </p>
          </div>
          <div class="ideas_require_title">
            <i class="fa-solid fa-briefcase"></i>
            <p>
              <span>Hỗ trợ IDEAS - Việt Nam</span>
           <span>${PROGRAM.highlight[3]}</span>
            </p>
          </div>
  
  
  
  `;
    const ideas_program_fee = document.querySelector(".ideas_program_fee");
    ideas_program_fee.innerHTML = ""; // Xóa nội dung cũ

    PROGRAM.fee_course.forEach((course) => {
        const div = document.createElement("div");
        div.className = "ideas_program_fee_item";
        div.innerHTML = `
    <img src="https://ideas.edu.vn/wp-content/new_public/data_imgs/icon_coner.png">
    <div>
      <div class="ideas_program_fee_head">
        <img src="${course.icon}">
        <h3>${course.name}</h3>
        <h4>${course.price}</h4>
      </div>
      <ul class="ideas_one_table">
        ${course.benefits
                .map(
                    (benefit) =>
                        `<li><i class="fa-solid fa-circle-check"></i> ${benefit}</li>`,
                )
                .join("")}
      </ul>
    </div>
    <div class="ideas_program_fee_btns">
      <a onclick="showform('${PROGRAM.name} - ${course.name
            }')" class="main_btn">
        <i class="fa-solid fa-comment-dots"></i> Tư vấn
      </a>
        <a href='/ho-tro-tai-chinh-sacombank' target='_blank' class="sub_btn">
       <i class="fa-solid fa-credit-card"></i> Trả góp
      </a>
    </div>
  `;
        ideas_program_fee.appendChild(div);
    });
    if (PROGRAM.school === "Swiss UMEF") {
        if (PROGRAM.fee_plane) {
            const chuyendiDiv = document.createElement("div");
            chuyendiDiv.className = "ideas_program_fee_item_chuyendi";
            chuyendiDiv.innerHTML = `
      <img src="https://ideas.edu.vn/wp-content/uploads/2025/09/ideas_ltn_chuyendi.webp"/>
      <h2>Chuyến đi tham dự Lễ Tốt Nghiệp</h2>
      <p>
        Bao gồm chuyến đi tham dự Lễ Tốt Nghiệp tại Geneva - Thụy Sĩ <br/> trị giá 
        <b>${PROGRAM.fee_plane} CHF</b> <br/> <a class="text_link" href="/dong-su-kien#chuyen-di">Xem các chuyến đi</a>
      </p>
    `;
            ideas_program_fee.appendChild(chuyendiDiv);
        } else {
            const chuyendiDiv = document.createElement("div");
            chuyendiDiv.className = "ideas_program_fee_item_chuyendi";
            chuyendiDiv.innerHTML = `
      <img src="https://ideas.edu.vn/wp-content/uploads/2025/11/tragop.webp"/>
      <h2>Chính sách trả góp học phí</h2>
      <p>
        Hỗ trợ bởi IDEAS và ngân hàng Sacombank
      </p>
    `;
            ideas_program_fee.appendChild(chuyendiDiv);
        }
    }

    const swiperWrapper = document.getElementById("swiperWrapper");
    PROGRAM.listImgs.forEach((imgSrc) => {
        const slide = document.createElement("div");
        slide.classList.add("swiper-slide");
        const img = document.createElement("img");
        img.src = imgSrc;
        img.alt = "Image";
        slide.appendChild(img);
        swiperWrapper.appendChild(slide);
    });
    var swiper = new Swiper(".swiper-container", {
        slidesPerView: 5,
        spaceBetween: 10,
        loop: true,
        autoplay: {
            delay: 0,
            disableOnInteraction: false,
        },
        speed: 5000,
        observer: true,
        observeParents: true,
        breakpoints: {
            1099: {
                slidesPerView: 2,
                spaceBetween: 10,
            },
        },
    });
    function updateSwiperSlides() {
        if (window.innerWidth <= 1099) {
            swiper.params.slidesPerView = 2;
        } else {
            swiper.params.slidesPerView = 5;
        }
        swiper.update(); // Cập nhật lại Swiper
    }

    window.addEventListener("resize", updateSwiperSlides);
    updateSwiperSlides(); // Gọi 1 lần lúc đầu để setup đúng

    const view_tailieu = document.querySelector("#view_tailieu");
    const ideas_program_detail_info_lanhsu = document.querySelector(
        ".ideas_program_detail_info_lanhsu",
    );
    const view_thanhtoan = document.querySelector("#view_thanhtoan");
    const ideas_program_number_subjects = document.querySelector(
        ".ideas_program_number_subjects",
    );
    ideas_program_number_subjects.innerHTML = PROGRAM.subjects;

    const ideas_degree = document.querySelector(".ideas_degree");
    const program_name_degree = document.querySelector("#program_name_degree");
    const program_head_tuvan = document.querySelector("#program_head_tuvan");
    const program_question = document.querySelector("#program_question");
    const program_benefits_degree = document.querySelector(
        "#program_benefits_degree",
    );
    ideas_degree.src = PROGRAM.degree.front;
    program_name_degree &&
        (program_name_degree.textContent = PROGRAM.program_name_degree);
    program_head_tuvan.addEventListener("click", () => {
        showform(PROGRAM.name);
    });
    const ideas_program_benefit = document.querySelector(
        ".ideas_program_benefit",
    );
    if (PROGRAM.fee_course.length < 2) {
        document.querySelector(".two_fee").style.display = "none";
    }

    const program_header_iframe = document.querySelector(
        "#program_header_iframe",
    );
    if (PROGRAM.link_iframe && program_header_iframe) {
        program_header_iframe.src = PROGRAM.link_iframe;
    }

    ideas_program_benefit.innerHTML = PROGRAM.benefits
        .map(
            (benefit) =>
                `<li><i class="fa-solid fa-circle-check"></i> ${benefit}</li>`,
        )
        .join("");
    program_benefits_degree?.insertAdjacentHTML(
        "afterbegin",
        PROGRAM.program_benefits_degree
            .map((benefit) => `<li><i class="fa-solid fa-star"></i> ${benefit}</li>`)
            .join(""),
    );

    program_question.addEventListener("click", () => {
        showform(`Câu hỏi ${PROGRAM.name}`);
    });
    view_tailieu.addEventListener("click", () => {
        const listItems = PROGRAM.require
            .map((item) => `<li><i class="fa-solid fa-check"></i> ${item}</li>`)
            .join("");
        const content = `
      <img src="https://ideas.edu.vn/wp-content/new_public/data_imgs/icon1.png"/>
      <p><b>Chuẩn bị các tài liệu dạng file mềm</b></p>
      <ul>
        ${listItems}
      </ul>
    `;
        renderAlert(`Hồ sơ đầu vào ${PROGRAM.name}`, content);
    });
    function renderDemographic() {
        const jobsContainer = document.getElementById("ideas_demographic_jobs");
        const agesContainer = document.getElementById("ideas_demographic_ages");

        if (!jobsContainer || !agesContainer) return;

        jobsContainer.innerHTML = PROGRAM.demographic.jobs
            .map(
                (job) => `
      <li>
        <p>
          <span>${job.jobname}</span>
          <span>${job.percent}%</span>
        </p>
        <p>
          <span style="width: ${job.percent}%;"></span>
        </p>
      </li>
    `,
            )
            .join("");

        agesContainer.innerHTML = PROGRAM.demographic.ages
            .map(
                (age) => `
      <li>
        <p>
          <span>${age.jobname}</span>
          <span>${age.percent}%</span>
        </p>
        <p>
          <span style="width: ${age.percent}%;"></span>
        </p>
      </li>
    `,
            )
            .join("");
    }

    // Gọi hàm để render
    const container = document.querySelector(".ideas_imgs_logo.kiemdinh");
    container.innerHTML = ""; // Xóa nội dung cũ (nếu cần)

    PROGRAM.accreditation.forEach((item) => {
        container.innerHTML += `
      <a href="${item.link}">
        <img src="${item.logo}" alt="${item.name}">
      </a>
    `;
    });

    renderDemographic();
    if (ideas_program_detail_info_lanhsu) {
        [ideas_program_detail_info_lanhsu, ideas_degree].forEach((element) => {
            element.addEventListener("click", () => {
                let content = `
          <div>
            <span><b>Mặt trước bằng tốt nghiệp</b></span>
            <img src="${PROGRAM.degree.front}" />
        `;

                if (PROGRAM.degree.back) {
                    content += `
            <span><b>Mặt sau bằng tốt nghiệp</b></span>
            <img src="${PROGRAM.degree.back}" />
          `;
                }

                if (PROGRAM.degree.transcript) {
                    content += `
            <span><b>Bảng điểm</b></span>
            <img src="${PROGRAM.degree.transcript}" />
          `;
                }

                content += `</div>`;

                // Chia hai case render khác nhau
                if (element === ideas_program_detail_info_lanhsu) {
                    renderMedia("Chứng nhận hợp pháp hoá lãnh sự", content);
                } else {
                    renderMedia("Mẫu bằng", content);
                }
            });
        });
    }

    view_thanhtoan.addEventListener("click", () => {
        const defaultPayRule = `
      <img src="https://ideas.edu.vn/wp-content/new_public/data_imgs/icon2.png"/>
      <p><b>Thanh toán một lần hoặc chia thành hai lần</b></p>
      <ul>
        <li><b>Hình thức thanh toán</b></li>
        <li><i class="fa-solid fa-check"></i> Thanh toán trực tiếp tại Viện IDEAS</li>
        <li><i class="fa-solid fa-check"></i> Chuyển khoản trực tuyến qua thông tin số tài khoản được cung cấp trong hợp đồng tư vấn hoặc qua đường link Payoo.</li>
        <li><i class="fa-solid fa-check"></i> Viện IDEAS cung cấp phiếu thu hộ học phí (Khi thanh toán trực tiếp hoặc cà thẻ trực tiếp) hoặc email xác nhận đóng học phí mà học viên đã đóng sau khoảng 01 ngày làm việc. 
          Trường hợp học viên đóng phí vào ngày nghỉ cuối tuần, nghỉ lễ, email xác nhận đóng phí sẽ được Viện thực hiện vào ngày làm việc liền kề sau ngày nghỉ. 
          Khoản phí thu hộ không thể xuất hóa đơn VAT theo quy định của Nhà nước Việt Nam.
        </li>
      </ul>
    `;

        // Nếu PROGRAM.pay_rule có thì dùng nó, không thì dùng defaultPayRule
        const content = PROGRAM.pay_rule || defaultPayRule;

        renderAlert(`Thanh toán học phí ${PROGRAM.name}`, content);
    });

    const ideasFaqInner = document.querySelector(".ideas_faq_inner");
    ideasFaqInner.innerHTML = PROGRAM.faq
        .map(
            (item, index) => `
     <div class="ideas_faq_item ${index === 0 ? "active" : ""}">
      <p>
        <span>${item.q}</span>
        <span><i class="fa-solid fa-angle-down"></i></span>
      </p>
      <span>${item.a}</span>
    </div>
  `,
        )
        .join("");

    const faqItems = document.querySelectorAll(".ideas_faq_item");

    faqItems.forEach((item) => {
        item.addEventListener("click", function () {
            // Bỏ active của tất cả item trước khi bật cái được click
            faqItems.forEach((el) => el.classList.remove("active"));
            item.classList.add("active");
        });
    });
    const subjectList = document.querySelector(".ideas_program_subject_item");

    subjectList.addEventListener("click", function (event) {
        // Kiểm tra xem phần tử được click có phải là p:first-child của li hay không
        if (
            event.target.tagName === "P" &&
            event.target.parentElement.tagName === "LI" &&
            event.target === event.target.parentElement.querySelector("p:first-child")
        ) {
            event.target.parentElement.classList.toggle("active");
        }
    });

    function renderSubjects() {
        const container = document.querySelector(".ideas_program_subject_item");
        if (!container) return;

        container.innerHTML = ""; // Xóa nội dung cũ trước khi render

        PROGRAM.this_subjects.forEach((subject) => {
            const li = document.createElement("li");
            const linkClass = subject.link ? "" : "disable";
            li.innerHTML = `
          <p>
            <span>
              <i class="fa-solid fa-file"></i> ${subject.name}
            </span>
            <i class="fa-solid fa-chevron-down"></i>
          </p>
          <p>
            <span>${subject.description || "Mô tả đang cập nhật..."}</span>
            
          </p>
        `;
            container.appendChild(li);
        });
    }
    // Gọi hàm để render
    renderSubjects();
});
/* ═══════════════════════════════════════
   SWISS UMEF MBA – script.js
   Interactions, Animations, Form Logic
═══════════════════════════════════════ */

(function () {
    'use strict';

    /* ─── Smooth-scroll anchor links ─── */
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const targetId = this.getAttribute('href');
            if (targetId === '#') return;
            const target = document.querySelector(targetId);
            if (!target) return;
            e.preventDefault();
            const headerH = document.getElementById('site-header')?.offsetHeight || 68;
            const top = target.getBoundingClientRect().top + window.scrollY - headerH - 16;
            window.scrollTo({ top, behavior: 'smooth' });

            // Close mobile menu on link click
            closeMobileMenu();
        });
    });

    /* ─── Header scroll state ─── */
    const header = document.getElementById('site-header');
    const floatingCta = document.getElementById('floating-cta');
    const heroCta = document.getElementById('hero-main-cta');

    function onScroll() {
        const scrollY = window.scrollY;

        // Scrolled class
        if (header) {
            header.classList.toggle('scrolled', scrollY > 40);
        }

        // Floating CTA: show after hero section leaves viewport
        if (floatingCta && heroCta) {
            const heroBottom = heroCta.getBoundingClientRect().bottom;
            floatingCta.classList.toggle('show', heroBottom < 0);
            floatingCta.setAttribute('aria-hidden', heroBottom >= 0 ? 'true' : 'false');

            // Make floating CTA tabbable only when visible
            const floatingBtn = floatingCta.querySelector('.floating-btn');
            if (floatingBtn) {
                floatingBtn.setAttribute('tabindex', heroBottom < 0 ? '0' : '-1');
            }
        }
    }

    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll(); // run once on load

    /* ─── Mobile Menu ─── */
    const hamburger = document.getElementById('hamburger');
    const mobileMenu = document.getElementById('mobile-menu');

    function closeMobileMenu() {
        if (mobileMenu) {
            mobileMenu.classList.remove('open');
            mobileMenu.setAttribute('aria-hidden', 'true');
        }
        if (hamburger) {
            hamburger.setAttribute('aria-expanded', 'false');
        }
    }

    if (hamburger && mobileMenu) {
        hamburger.addEventListener('click', () => {
            const isOpen = mobileMenu.classList.contains('open');
            if (isOpen) {
                closeMobileMenu();
            } else {
                mobileMenu.classList.add('open');
                mobileMenu.setAttribute('aria-hidden', 'false');
                hamburger.setAttribute('aria-expanded', 'true');
            }
        });

        // Close on outside click
        document.addEventListener('click', (e) => {
            if (!hamburger.contains(e.target) && !mobileMenu.contains(e.target)) {
                closeMobileMenu();
            }
        });
    }

    /* ─── Intersection Observer – Reveal Animations ─── */
    const revealEls = document.querySelectorAll('.reveal-up');

    if ('IntersectionObserver' in window) {
        const observer = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry, i) => {
                    if (entry.isIntersecting) {
                        // Stagger siblings
                        const siblings = entry.target.parentElement
                            ? [...entry.target.parentElement.querySelectorAll('.reveal-up')]
                            : [entry.target];
                        const idx = siblings.indexOf(entry.target);
                        const delay = Math.min(idx * 80, 400);

                        setTimeout(() => {
                            entry.target.classList.add('visible');
                        }, delay);

                        observer.unobserve(entry.target);
                    }
                });
            },
            { threshold: 0.12, rootMargin: '0px 0px -40px 0px' }
        );

        revealEls.forEach(el => observer.observe(el));
    } else {
        // Fallback: show all immediately
        revealEls.forEach(el => el.classList.add('visible'));
    }

    /* ─── Testimonials Slider ─── */
    const testimonialCards = document.querySelectorAll('.testimonial-card');
    const dots = document.querySelectorAll('.dot');
    let currentTesti = 0;
    let testiInterval = null;

    function showTestimonial(idx) {
        testimonialCards.forEach((card, i) => {
            card.classList.toggle('active', i === idx);
        });
        dots.forEach((dot, i) => {
            dot.classList.toggle('active', i === idx);
            dot.setAttribute('aria-selected', i === idx ? 'true' : 'false');
        });
        currentTesti = idx;
    }

    dots.forEach((dot, idx) => {
        dot.addEventListener('click', () => {
            clearInterval(testiInterval);
            showTestimonial(idx);
            startTestiAutoPlay();
        });
    });

    function startTestiAutoPlay() {
        testiInterval = setInterval(() => {
            const next = (currentTesti + 1) % testimonialCards.length;
            showTestimonial(next);
        }, 5000);
    }

    if (testimonialCards.length > 0) {
        startTestiAutoPlay();
    }

    /* ─── Pain cards stagger ─── */
    const painCards = document.querySelectorAll('.pain-card');
    if ('IntersectionObserver' in window) {
        const painObserver = new IntersectionObserver(
            (entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const idx = parseInt(entry.target.dataset.index || '0', 10);
                        setTimeout(() => {
                            entry.target.style.opacity = '1';
                            entry.target.style.transform = 'translateY(0)';
                        }, idx * 80);
                        painObserver.unobserve(entry.target);
                    }
                });
            },
            { threshold: 0.1 }
        );

        painCards.forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(24px)';
            card.style.transition = 'opacity 0.5s ease, transform 0.5s ease, background 0.3s ease, border-color 0.3s ease, box-shadow 0.3s ease';
            painObserver.observe(card);
        });
    }

    /* ─── Counter Animation for Solution Stats ─── */
    function animateCounter(el, target, suffix, duration = 1200) {
        const start = performance.now();
        const isDecimal = target % 1 !== 0;

        function update(time) {
            const elapsed = time - start;
            const progress = Math.min(elapsed / duration, 1);
            const eased = 1 - Math.pow(1 - progress, 3); // ease-out cubic
            const current = eased * target;
            el.textContent = (isDecimal ? current.toFixed(1) : Math.floor(current)) + suffix;
            if (progress < 1) requestAnimationFrame(update);
        }

        requestAnimationFrame(update);
    }

    const solStats = document.querySelectorAll('.sol-stat');
    if ('IntersectionObserver' in window && solStats.length > 0) {
        const statsObserver = new IntersectionObserver(
            (entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        // Find value el and animate
                        const valueEl = entry.target.querySelector('.sol-stat-value');
                        if (valueEl && !valueEl.dataset.animated) {
                            valueEl.dataset.animated = 'true';
                            const text = valueEl.textContent;
                            if (text.includes('100')) animateCounter(valueEl, 100, '%');
                            else if (text.includes('16')) animateCounter(valueEl, 18, '', 1000);
                            else if (text.includes('12')) {
                                // "12 + 1" — custom
                                setTimeout(() => { valueEl.textContent = '12 + 1'; }, 1200);
                                animateCounter(valueEl, 12, '', 1100);
                            }
                            else if (text.includes('90')) animateCounter(valueEl, 90, '');
                        }
                        statsObserver.unobserve(entry.target);
                    }
                });
            },
            { threshold: 0.5 }
        );

        solStats.forEach(s => statsObserver.observe(s));
    }

    /* ─── Audience Chart – animate bars on scroll ─── */
    const audienceCard = document.querySelector('.audience-card');
    if (audienceCard && 'IntersectionObserver' in window) {
        const audObserver = new IntersectionObserver(
            (entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('in-view');
                        audObserver.unobserve(entry.target);
                    }
                });
            },
            { threshold: 0.3 }
        );
        audObserver.observe(audienceCard);
    } else if (audienceCard) {
        audienceCard.classList.add('in-view');
    }

    /* ─── Form Validation & Submission ─── */
    const form = document.getElementById('cta-form');
    const formSuccess = document.getElementById('form-success');
    const submitBtn = document.getElementById('form-submit-btn');
    const btnText = document.getElementById('btn-text');

    if (form) {
        const fields = {
            fullname: { el: document.getElementById('fullname'), errorEl: document.getElementById('fullname-error') },
            phone: { el: document.getElementById('phone'), errorEl: document.getElementById('phone-error') },
            email: { el: document.getElementById('email'), errorEl: document.getElementById('email-error') },
        };

        function validatePhone(val) {
            return /^(0|\+84)[0-9]{8,10}$/.test(val.replace(/\s/g, ''));
        }

        function validateEmail(val) {
            return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(val.trim());
        }

        function showError(field, msg) {
            field.el.classList.add('error');
            field.errorEl.textContent = msg;
        }

        function clearError(field) {
            field.el.classList.remove('error');
            field.errorEl.textContent = '';
        }

        // Live validation on blur
        fields.fullname.el.addEventListener('blur', () => {
            const val = fields.fullname.el.value.trim();
            if (!val) showError(fields.fullname, 'Vui lòng nhập họ và tên.');
            else if (val.length < 2) showError(fields.fullname, 'Họ tên phải có ít nhất 2 ký tự.');
            else clearError(fields.fullname);
        });

        fields.phone.el.addEventListener('blur', () => {
            const val = fields.phone.el.value.trim();
            if (!val) showError(fields.phone, 'Vui lòng nhập số điện thoại.');
            else if (!validatePhone(val)) showError(fields.phone, 'Số điện thoại không hợp lệ.');
            else clearError(fields.phone);
        });

        fields.email.el.addEventListener('blur', () => {
            const val = fields.email.el.value.trim();
            if (!val) showError(fields.email, 'Vui lòng nhập email.');
            else if (!validateEmail(val)) showError(fields.email, 'Địa chỉ email không hợp lệ.');
            else clearError(fields.email);
        });

        // Clear errors on input
        Object.values(fields).forEach(f => {
            f.el.addEventListener('input', () => clearError(f));
        });

        form.addEventListener('submit', function (e) {
            e.preventDefault();

            let valid = true;

            const nameVal = fields.fullname.el.value.trim();
            if (!nameVal || nameVal.length < 2) {
                showError(fields.fullname, 'Vui lòng nhập họ và tên hợp lệ.');
                valid = false;
            } else clearError(fields.fullname);

            const phoneVal = fields.phone.el.value.trim();
            if (!phoneVal || !validatePhone(phoneVal)) {
                showError(fields.phone, 'Vui lòng nhập số điện thoại hợp lệ.');
                valid = false;
            } else clearError(fields.phone);

            const emailVal = fields.email.el.value.trim();
            if (!emailVal || !validateEmail(emailVal)) {
                showError(fields.email, 'Vui lòng nhập địa chỉ email hợp lệ.');
                valid = false;
            } else clearError(fields.email);

            if (!valid) {
                // Shake the button
                submitBtn.style.animation = 'shake 0.4s ease';
                setTimeout(() => { submitBtn.style.animation = ''; }, 400);
                return;
            }

            // Show loading state
            submitBtn.disabled = true;
            btnText.textContent = 'Đang gửi...';
            submitBtn.style.opacity = '0.7';

            // Simulate async submission (replace with real API call)
            setTimeout(() => {
                form.style.display = 'none';
                formSuccess.style.display = 'block';

                // Scroll to success message
                formSuccess.scrollIntoView({ behavior: 'smooth', block: 'nearest' });

                // Re-enable in case user wants to submit again later
                submitBtn.disabled = false;
                btnText.textContent = 'Đăng ký tư vấn MIỄN PHÍ ngay';
                submitBtn.style.opacity = '1';

                // Push to dataLayer if GTM is present
                if (typeof window.dataLayer !== 'undefined') {
                    window.dataLayer.push({
                        event: 'form_submit',
                        form_id: 'mba-lead-form',
                        program: document.getElementById('program')?.value || ''
                    });
                }
            }, 1600);
        });
    }

    /* ─── Pricing card hover parity ─── */
    document.querySelectorAll('.pricing-card').forEach(card => {
        card.addEventListener('mouseenter', () => {
            if (!card.classList.contains('pricing-featured')) {
                card.style.borderColor = 'rgba(99,102,241,0.3)';
            }
        });
        card.addEventListener('mouseleave', () => {
            if (!card.classList.contains('pricing-featured')) {
                card.style.borderColor = '';
            }
        });
    });

    /* ─── Competency cards entrance ─── */
    const compCards = document.querySelectorAll('.competency-card');
    if ('IntersectionObserver' in window && compCards.length > 0) {
        const compObserver = new IntersectionObserver(
            (entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const allCards = [...document.querySelectorAll('.competency-card')];
                        const idx = allCards.indexOf(entry.target);
                        entry.target.style.transitionDelay = `${idx * 90}ms`;
                        entry.target.classList.add('comp-visible');
                        compObserver.unobserve(entry.target);
                    }
                });
            },
            { threshold: 0.15 }
        );

        // Add CSS for comp-visible
        const style = document.createElement('style');
        style.textContent = `
      .competency-card { opacity: 0; transform: translateY(28px); }
      .competency-card.comp-visible { opacity: 1; transform: translateY(0); transition: opacity 0.5s ease, transform 0.5s ease, border-color 0.3s ease, box-shadow 0.3s ease; }
    `;
        document.head.appendChild(style);

        compCards.forEach(c => compObserver.observe(c));
    }

    /* ─── Shake keyframe ─── */
    const shakeStyle = document.createElement('style');
    shakeStyle.textContent = `
    @keyframes shake {
      0%, 100% { transform: translateX(0); }
      20% { transform: translateX(-6px); }
      40% { transform: translateX(6px); }
      60% { transform: translateX(-4px); }
      80% { transform: translateX(4px); }
    }
  `;
    document.head.appendChild(shakeStyle);

    /* ─── Passive scroll performance ─── */
    // Already handled with { passive: true } above

    /* ─── Lightbox ─ Existing implementation ─── */
    const lightbox = document.getElementById('lightbox');
    const lightboxImg = document.getElementById('lightbox-img');
    const lightboxClose = document.getElementById('lightbox-close');

    function openLightbox(src, alt) {
        if (!lightbox || !lightboxImg) return;
        lightboxImg.src = src;
        lightboxImg.alt = alt || '';
        lightbox.classList.add('open');
        document.body.style.overflow = 'hidden';
        if (lightboxClose) lightboxClose.focus();
    }

    function closeLightbox() {
        if (!lightbox) return;
        lightbox.classList.remove('open');
        document.body.style.overflow = '';
        if (lightboxImg) lightboxImg.src = '';
    }

    document.querySelectorAll('.lightbox-trigger').forEach(trigger => {
        trigger.addEventListener('click', (e) => {
            e.preventDefault();
            const imgSrc = trigger.dataset.img || trigger.getAttribute('href');
            const imgEl = trigger.querySelector('img');
            const alt = imgEl ? imgEl.alt : '';
            openLightbox(imgSrc, alt);
        });
    });

    if (lightboxClose) lightboxClose.addEventListener('click', closeLightbox);
    if (lightbox) {
        lightbox.addEventListener('click', (e) => {
            if (e.target === lightbox) closeLightbox();
        });
    }

    /* ─── Accreditation Modal – New Implementation ─── */
    const accredData = {
        "qs": {
            title: "QS Stars 5 Stars Overall",
            desc: "SWISS UMEF đã được Quacquarelli Symonds (QS), một trong những hệ thống đánh giá đại học uy tín nhất thế giới trao tặng Xếp hạng “QS Stars 5 Stars Overall”. Các bảng xếp hạng quốc tế này nêu bật sự xuất sắc của Swiss UMEF trên nhiều khía cạnh, bao gồm chất lượng giảng dạy, khả năng tuyển dụng, học tập trực tuyến, tác động xã hội, sự đa dạng và phát triển học thuật, tái khẳng định vị thế là một tổ chức hàng đầu cam kết đổi mới, hòa nhập và tham gia toàn cầu."
        },
        "sac": {
            title: "Swiss Accreditation Council",
            desc: "Là cơ quan kiểm định liên bang cao nhất Thụy Sĩ với nhiệm vụ giám sát và công nhận các tổ chức kiểm định chất lượng giáo dục cao học ở Thụy Sĩ. SAC áp dụng các tiêu chuẩn chung cho các tổ chức kiểm định và các trường đại học về đảm bảo chất lượng trong giáo dục cao học (ESG). SWISS UMEF là tổ chức giáo dục đại học tư nhân đầu tiên ở Geneva được công nhận bởi cơ quan kiểm định liên bang cao nhất của Thụy Sĩ."
        },
        "eduqua": {
            title: "Nhãn chất lượng Thụy Sĩ (EduQua)",
            desc: "Là một nhãn chất lượng Thụy Sĩ cho giáo dục thường xuyên, được Chính phủ Thụy Sĩ công nhận. EduQua đánh giá chất lượng giáo dục thường xuyên dựa trên sáu tiêu chuẩn: mục tiêu và chiến lược, cung cấp khóa học, thông tin và tư vấn, người học và người giảng dạy, hệ thống quản lý chất lượng và việc sử dụng hiệu quả nguồn lực. UMEF đã được EduQua kiểm định và công nhận cho các khóa học."
        },
        "iacbe": {
            title: "International Accreditation Council for Business Education (IACBE)",
            desc: "Là một tổ chức kiểm định chất lượng giáo dục kinh doanh quốc tế, được Hội đồng Kiểm định Giáo dục Đại học (CHEA) công nhận. IACBE đánh giá chất lượng giáo dục kinh doanh dựa trên các tiêu chí về mục tiêu, nhiệm vụ, chiến lược, nguồn lực, quy trình và kết quả của các trường đại học. UMEF đã được IACBE kiểm định và công nhận cho các chương trình Bachelor of Business Administration (BBA), Master of Business Administration (MBA) và Doctor of Business Administration (DBA)."
        },
        "chea": {
            title: "Council for Higher Education Accreditation (CHEA)",
            desc: "Là một tổ chức phi chính phủ có nhiệm vụ bảo vệ và thúc đẩy chất lượng giáo dục đại học ở Hoa Kỳ. CHEA công nhận các tổ chức kiểm định chất lượng giáo dục đại học có uy tín và đảm bảo rằng các trường đại học tuân thủ các tiêu chuẩn chất lượng. UMEF được CHEA công nhận thông qua IACBE và IACBE là tổ chức kiểm định uy tín, các tiêu chuẩn được đặt ra để chuyên về các trường Business, một trong những tổ chức kiểm định được CHEA chấp thuận."
        },
        "acbsp": {
            title: "Accreditation Council for Business Schools and Programs (ACBSP)",
            desc: "Là một tổ chức kiểm định chất lượng các trường và các chương trình đào tạo trong lĩnh vực kinh doanh được Bộ Giáo dục Hoa Kỳ công nhận. ACBSP áp dụng các tiêu chuẩn nghiêm ngặt về chương trình giảng dạy, đội ngũ giảng viên, cơ sở vật chất, kết quả học tập và liên kết với doanh nghiệp. ACBSP cũng là thành viên của Hội đồng Kiểm định Giáo dục Đại học (CHEA) và tham gia vào mạng lưới kiểm định giáo dục kinh doanh quốc tế (IACBE)."
        },
        "vnnaric": {
            title: "VN – Naric Bộ GD&DT Việt Nam",
            desc: "Trung tâm Công nhận Văn bằng (VN-NARIC) là đơn vị trực thuộc Bộ Giáo dục và Đào tạo Việt Nam, có chức năng công nhận văn bằng, chứng chỉ giáo dục do cơ sở giáo dục nước ngoài cấp cho công dân Việt Nam. <br><br> Swiss UMEF vinh hạnh là 1 trong 14 trường tư thục tại Thụy Sĩ nằm trong danh sách Swissuniversities theo VN Narics – Trung tâm công nhận văn bằng của Bộ GD&DT, tuy nhiên các trường nằm trên hệ thống giáo dục chỉ mang tính chất xác thực tính minh bạch của trường, không đồng nghĩa với việc văn bằng chương trình do trường đào tạo được Bộ giáo dục và đào tạo Việt Nam công nhận."
        }
    };

    const accredModal = document.getElementById('accred-modal');
    const accredTitle = document.getElementById('accred-title');
    const accredDesc = document.getElementById('accred-desc');
    const accredClose = document.getElementById('accred-modal-close');
    const accredOverlay = document.getElementById('accred-modal-overlay');

    function openAccredModal(key) {
        const data = accredData[key];
        if (!data || !accredModal) return;

        accredTitle.textContent = data.title;
        accredDesc.innerHTML = data.desc;

        accredModal.classList.add('open');
        accredModal.setAttribute('aria-hidden', 'false');
        document.body.style.overflow = 'hidden';
    }

    function closeAccredModal() {
        if (!accredModal) return;
        accredModal.classList.remove('open');
        accredModal.setAttribute('aria-hidden', 'true');
        document.body.style.overflow = '';
    }

    document.querySelectorAll('.accred-trigger').forEach(trigger => {
        trigger.addEventListener('click', () => {
            const key = trigger.dataset.accred;
            openAccredModal(key);
        });
    });

    if (accredClose) accredClose.addEventListener('click', closeAccredModal);
    if (accredOverlay) accredOverlay.addEventListener('click', closeAccredModal);

    // Escape to close all modals
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            closeLightbox();
            closeAccredModal();
        }
    });


    /* ─── Accreditation Stack Rotation ─── */
    const stack = document.getElementById('accred-stack');
    const prevBtn = document.getElementById('accred-prev');
    const nextBtn = document.getElementById('accred-next');

    if (stack) {
        let isAnimating = false;

        function rotateStack(direction = 'next') {
            if (isAnimating) return;
            isAnimating = true;

            const cards = [...stack.querySelectorAll('.accred-stack-card')];
            const topCard = stack.querySelector('.pos-1');

            if (direction === 'next') {
                // Animate top card out
                topCard.classList.add('exit');

                setTimeout(() => {
                    // Update classes for others
                    cards.forEach(card => {
                        if (card.classList.contains('pos-1')) {
                            card.classList.remove('pos-1', 'exit');
                            card.classList.add('pos-3');
                        } else if (card.classList.contains('pos-2')) {
                            card.classList.remove('pos-2');
                            card.classList.add('pos-1');
                        } else if (card.classList.contains('pos-3')) {
                            card.classList.remove('pos-3');
                            card.classList.add('pos-2');
                        }
                    });
                    isAnimating = false;
                }, 600);
            } else {
                // Previous: move back card to front
                const backCard = stack.querySelector('.pos-3');
                backCard.style.transition = 'none';
                backCard.style.transform = 'translateX(-120%) rotate(-15deg) translateZ(100px)';
                backCard.style.opacity = '0';

                setTimeout(() => {
                    backCard.style.transition = '';
                    cards.forEach(card => {
                        if (card.classList.contains('pos-1')) {
                            card.classList.remove('pos-1');
                            card.classList.add('pos-2');
                        } else if (card.classList.contains('pos-2')) {
                            card.classList.remove('pos-2');
                            card.classList.add('pos-3');
                        } else if (card.classList.contains('pos-3')) {
                            card.classList.remove('pos-3');
                            card.classList.add('pos-1');
                            card.style.transform = '';
                            card.style.opacity = '';
                        }
                    });
                    isAnimating = false;
                }, 50);
            }
        }

        if (nextBtn) nextBtn.addEventListener('click', () => rotateStack('next'));
        if (prevBtn) prevBtn.addEventListener('click', () => rotateStack('prev'));
        stack.addEventListener('click', () => rotateStack('next'));
    }

    /* ─── Horizontal Scroll Dots Management ─── */
    function initScrollDots() {
        const dotContainers = document.querySelectorAll('.scroll-dots');

        dotContainers.forEach(container => {
            const targetSelector = container.dataset.scrollTarget;
            const target = document.querySelector(targetSelector);
            if (!target) return;

            const items = [...target.children].filter(child => !child.classList.contains('scroll-dots'));
            const itemCount = items.length;
            if (itemCount === 0) return;

            // Clear existing and Create dots
            container.innerHTML = '';
            for (let i = 0; i < itemCount; i++) {
                const dot = document.createElement('div');
                dot.classList.add('scroll-dot');
                if (i === 0) dot.classList.add('active');

                dot.addEventListener('click', () => {
                    // Calculate precise scroll position
                    const targetPos = items[i].offsetLeft - target.offsetLeft;
                    target.scrollTo({ left: targetPos - 20, behavior: 'smooth' }); // -20 to match padding-left
                });

                container.appendChild(dot);
            }

            // Sync dots on scroll
            target.addEventListener('scroll', () => {
                const scrollLeft = target.scrollLeft;
                const containerWidth = target.offsetWidth;

                let activeIndex = 0;
                let minDiff = Infinity;

                items.forEach((item, idx) => {
                    const itemCenter = item.offsetLeft - target.offsetLeft + (item.offsetWidth / 2);
                    const scrollCenter = scrollLeft + (containerWidth / 2);
                    const diff = Math.abs(itemCenter - scrollCenter);

                    if (diff < minDiff) {
                        minDiff = diff;
                        activeIndex = idx;
                    }
                });

                const dots = container.querySelectorAll('.scroll-dot');
                dots.forEach((dot, idx) => {
                    dot.classList.toggle('active', idx === activeIndex);
                });
            }, { passive: true });
        });
    }

    // Initialize dots on load and window resize
    initScrollDots();
    window.addEventListener('resize', initScrollDots);

    console.log('%cIDEAS × Swiss UMEF MBA 🎓', 'background:#ab0e00;color:#fff;padding:4px 12px;border-radius:4px;font-weight:700');

})();

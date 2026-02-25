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

    /* ─── Lightbox ─── */
    const lightbox = document.getElementById('lightbox');
    const lightboxImg = document.getElementById('lightbox-img');
    const lightboxClose = document.getElementById('lightbox-close');

    function openLightbox(src, alt) {
        if (!lightbox || !lightboxImg) return;
        lightboxImg.src = src;
        lightboxImg.alt = alt || '';
        lightbox.classList.add('open');
        document.body.style.overflow = 'hidden';
        lightboxClose.focus();
    }

    function closeLightbox() {
        if (!lightbox) return;
        lightbox.classList.remove('open');
        document.body.style.overflow = '';
        lightboxImg.src = '';
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

    if (lightboxClose) {
        lightboxClose.addEventListener('click', closeLightbox);
    }

    if (lightbox) {
        lightbox.addEventListener('click', (e) => {
            if (e.target === lightbox) closeLightbox();
        });

        // Close on Escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && lightbox.classList.contains('open')) {
                closeLightbox();
            }
        });
    }

    console.log('%cIDEAS × Swiss UMEF MBA 🎓', 'background:#ab0e00;color:#fff;padding:4px 12px;border-radius:4px;font-weight:700');

})();

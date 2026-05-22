document.addEventListener('DOMContentLoaded', () => {
    // 1. Smooth Reveal Animations
    const observerOptions = {
        root: null,
        rootMargin: '0px',
        threshold: 0.15
    };

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('active');
                // Optional: Stop observing once revealed
                // observer.unobserve(entry.target); 
            }
        });
    }, observerOptions);

    const revealElements = document.querySelectorAll('.reveal-up');
    revealElements.forEach(el => {
        observer.observe(el);
    });

    // 2. Sticky Navigation
    const nav = document.querySelector('.navbar');
    if (nav) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                nav.classList.add('scrolled');
            } else {
                nav.classList.remove('scrolled');
            }
        });
    }

    // 3. Carousel Drag to Scroll (Courses, Testimonials)
    const carousels = document.querySelectorAll('.draggable-carousel');
    carousels.forEach(carousel => {
        let isDown = false;
        let startX;
        let scrollLeft;

        carousel.addEventListener('mousedown', (e) => {
            isDown = true;
            carousel.classList.add('dragging');
            startX = e.pageX - carousel.offsetLeft;
            scrollLeft = carousel.scrollLeft;
        });
        
        carousel.addEventListener('mouseleave', () => {
            isDown = false;
            carousel.classList.remove('dragging');
        });
        
        carousel.addEventListener('mouseup', () => {
            isDown = false;
            carousel.classList.remove('dragging');
        });
        
        carousel.addEventListener('mousemove', (e) => {
            if (!isDown) return;
            e.preventDefault();
            const x = e.pageX - carousel.offsetLeft;
            const walk = (x - startX) * 2; // Scroll-fast
            carousel.scrollLeft = scrollLeft - walk;
        });
    });

    // 4. Render Dynamic Courses
    const coursesContainer = document.getElementById('courses-container');
    if (coursesContainer && typeof IDEAS_DATA !== 'undefined' && IDEAS_DATA.programmes) {
        const programs = Object.values(IDEAS_DATA.programmes);
        
        programs.forEach(prog => {
            const badge = prog.level || 'Program';
            const cardHTML = `
                <div class="course-card">
                    <div class="course-img-wrapper">
                        <img src="${prog.avatar}" alt="${prog.name}" onerror="this.src='assets/mba_program_icon_1778123208188.png'">
                        <div class="course-badge">${badge}</div>
                    </div>
                    <div class="course-content">
                        <h3 class="course-title">${prog.program_name_degree || prog.name}</h3>
                        <div class="course-uni">
                            <i class="fa-solid fa-building-columns"></i>
                            <span>${prog.school}</span>
                        </div>
                        <div class="course-meta-box">
                            <div class="meta-item"><i class="fa-regular fa-clock"></i> ${prog.duration}</div>
                            <div class="meta-item"><i class="fa-solid fa-graduation-cap"></i> ${prog.subjects}</div>
                        </div>
                        <div class="course-actions">
                            <a href="${prog.link}" class="btn btn-outline btn-sm" style="border-radius: 999px;">Tư vấn</a>
                            <a href="${prog.link}" class="btn btn-primary btn-sm" style="border-radius: 999px;">Chi tiết</a>
                        </div>
                    </div>
                </div>
            `;
            coursesContainer.insertAdjacentHTML('beforeend', cardHTML);
        });
    }

    // 5. Course Carousel Arrow Navigation
    const courseNext = document.getElementById('course-next');
    const coursePrev = document.getElementById('course-prev');
    if (courseNext && coursePrev && coursesContainer) {
        courseNext.addEventListener('click', () => {
            const scrollAmount = coursesContainer.querySelector('.course-card').offsetWidth + 32;
            coursesContainer.scrollBy({ left: scrollAmount, behavior: 'smooth' });
        });
        coursePrev.addEventListener('click', () => {
            const scrollAmount = coursesContainer.querySelector('.course-card').offsetWidth + 32;
            coursesContainer.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
        });
    }

    // 5.1 Faculty Carousel Arrow Navigation
    const facultyContainer = document.getElementById('faculty-container');
    const facultyNext = document.getElementById('faculty-next');
    const facultyPrev = document.getElementById('faculty-prev');
    if (facultyNext && facultyPrev && facultyContainer) {
        facultyNext.addEventListener('click', () => {
            const scrollAmount = facultyContainer.querySelector('.faculty-card').offsetWidth + 32;
            facultyContainer.scrollBy({ left: scrollAmount, behavior: 'smooth' });
        });
        facultyPrev.addEventListener('click', () => {
            const scrollAmount = facultyContainer.querySelector('.faculty-card').offsetWidth + 32;
            facultyContainer.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
        });
    }

    // 6. FAQ Accordion
    const faqQuestions = document.querySelectorAll('.faq-question');
    faqQuestions.forEach(btn => {
        btn.addEventListener('click', function() {
            this.classList.toggle('active');
            const answer = this.nextElementSibling;
            if (this.classList.contains('active')) {
                answer.style.maxHeight = answer.scrollHeight + "px";
            } else {
                answer.style.maxHeight = null;
            }
        });
    });
});

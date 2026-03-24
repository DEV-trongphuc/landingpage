/* ═══════════════════════════════════════════════════════
   BOOKING MODAL JAVASCRIPT
   Multi-step: Info → Date/Time → Confirm → Success
═══════════════════════════════════════════════════════ */

(function () {
    'use strict';

    /* ── State ─────────────────────────────────── */
    const state = {
        currentStep: 1,
        calYear: 0,
        calMonth: 0,
        selectedDate: null,
        selectedTime: null,
    };

    /* ── Available times ────────────────────────── */
    const timeSlots = ['08:00', '08:30', '09:00', '09:30', '10:00', '10:30',
        '13:00', '13:30', '14:00', '14:30', '15:00', '15:30',
        '16:00', '16:30', '17:00', '17:30', '18:00', '18:30',
        '19:00', '19:30', '20:00'];

    /* ── DOM refs ───────────────────────────────── */
    const modal = document.getElementById('bk-modal');
    const overlay = document.getElementById('bk-overlay');
    const closeBtn = document.getElementById('bk-close');
    const openBtn = document.getElementById('bk-open-btn');
    const progressFill = document.getElementById('bk-progress-fill');
    const stepLabels = document.querySelectorAll('.bk-step-lbl');

    const steps = {
        1: document.getElementById('bk-step-1'),
        2: document.getElementById('bk-step-2'),
        3: document.getElementById('bk-step-3'),
        success: document.getElementById('bk-step-success'),
    };

    /* ════════════════════════════════════════════
       CUSTOM SELECT DROPDOWN
    ════════════════════════════════════════════ */
    function initCustomSelects() {
        // Find all .bk-select-wrap inside the booking modal
        const wraps = (modal || document).querySelectorAll('.bk-select-wrap');

        wraps.forEach(wrap => {
            const nativeSelect = wrap.querySelector('select');
            if (!nativeSelect || wrap.querySelector('.bk-custom-select')) return;

            // Remove old SVG arrow if present
            const oldArrow = wrap.querySelector('.bk-select-arrow');
            if (oldArrow) oldArrow.remove();

            // Build custom select element
            const custom = document.createElement('div');
            custom.className = 'bk-custom-select';

            // --- Trigger button ---
            const trigger = document.createElement('button');
            trigger.type = 'button';
            trigger.className = 'bk-custom-trigger bk-placeholder';

            const textSpan = document.createElement('span');
            textSpan.className = 'bk-trigger-text';

            // Set initial label from first <option> (placeholder)
            const firstOpt = nativeSelect.options[nativeSelect.selectedIndex];
            textSpan.textContent = firstOpt ? firstOpt.text : '-- Chọn --';

            const arrowIcon = document.createElement('span');
            arrowIcon.className = 'bk-trigger-arrow';
            arrowIcon.innerHTML = '<svg width="12" height="8" viewBox="0 0 12 8" fill="none"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M1 1l5 5 5-5"/></svg>';

            trigger.appendChild(textSpan);
            trigger.appendChild(arrowIcon);

            // --- Dropdown panel ---
            const panel = document.createElement('div');
            panel.className = 'bk-custom-dropdown';

            // Build options
            Array.from(nativeSelect.options).forEach((opt, idx) => {
                const item = document.createElement('div');
                item.className = 'bk-custom-option' + (idx === 0 ? ' bk-opt-disabled' : '');
                item.textContent = opt.text;
                item.dataset.value = opt.value;

                item.addEventListener('click', () => {
                    if (idx === 0) return; // skip placeholder
                    // Update native select
                    nativeSelect.value = opt.value;
                    // Update trigger
                    textSpan.textContent = opt.text;
                    trigger.classList.remove('bk-placeholder');
                    // Update selected highlight
                    panel.querySelectorAll('.bk-custom-option').forEach(o => o.classList.remove('bk-opt-selected'));
                    item.classList.add('bk-opt-selected');
                    // Close
                    closeCustomSelect(custom);
                });

                panel.appendChild(item);
            });

            custom.appendChild(trigger);
            custom.appendChild(panel);
            wrap.appendChild(custom);

            // --- Toggle open/close ---
            trigger.addEventListener('click', (e) => {
                e.stopPropagation();
                const isOpen = custom.classList.contains('bk-sel-open');
                // Close all others first
                closeAllCustomSelects();
                if (!isOpen) openCustomSelect(custom);
            });
        });
    }

    function openCustomSelect(custom) {
        custom.classList.add('bk-sel-open');
    }

    function closeCustomSelect(custom) {
        custom.classList.remove('bk-sel-open');
    }

    function closeAllCustomSelects() {
        document.querySelectorAll('.bk-custom-select.bk-sel-open').forEach(el => {
            el.classList.remove('bk-sel-open');
        });
    }

    // Close on outside click
    document.addEventListener('click', closeAllCustomSelects);

    /* ── Open / Close modal ─────────────────────── */
    function openModal() {
        if (!modal) return;
        modal.style.display = 'flex';
        requestAnimationFrame(() => {
            modal.classList.add('bk-open');
            modal.setAttribute('aria-hidden', 'false');
        });
        document.body.style.overflow = 'hidden';
        initCalendar();
        initCustomSelects(); // init dropdowns each time (idempotent)
    }

    function closeModal() {
        if (!modal) return;
        modal.classList.remove('bk-open');
        modal.setAttribute('aria-hidden', 'true');
        document.body.style.overflow = '';
        closeAllCustomSelects();
        setTimeout(() => { modal.style.display = 'none'; }, 350);
    }

    // Handle multiple open buttons (header icon and FAB)
    const openButtons = document.querySelectorAll('.bk-open-btn');
    openButtons.forEach(btn => btn.addEventListener('click', openModal));
    if (closeBtn) closeBtn.addEventListener('click', closeModal);
    if (overlay) overlay.addEventListener('click', closeModal);

    /* ── Shared prefill helper ───────────────────
       Reads from source IDs, fills booking form.
       ids = { name, phone, email, edu, eng }      */
    function prefillBookingForm(ids) {
        const getVal = id => { const el = document.getElementById(id); return el ? el.value.trim() : ''; };
        const getSel = id => document.getElementById(id);

        // Text inputs
        const fillInput = (destId, val) => {
            const el = document.getElementById(destId);
            if (el && val) el.value = val;
        };
        fillInput('bk-name', getVal(ids.name));
        fillInput('bk-phone', getVal(ids.phone));
        fillInput('bk-email', getVal(ids.email));

        // Custom selects
        const fillSelect = (nativeDestId, srcId) => {
            const srcSelect = getSel(srcId);
            if (!srcSelect || !srcSelect.value) return;
            const nativeDest = document.getElementById(nativeDestId);
            if (!nativeDest) return;
            nativeDest.value = srcSelect.value;

            const wrap = nativeDest.closest('.bk-select-wrap');
            if (!wrap) return;
            const customSel = wrap.querySelector('.bk-custom-select');
            if (!customSel) return;
            const trigger = customSel.querySelector('.bk-trigger-text');
            const options = customSel.querySelectorAll('.bk-custom-option');
            const optText = srcSelect.options[srcSelect.selectedIndex]
                ? srcSelect.options[srcSelect.selectedIndex].text : '';
            if (trigger && optText) {
                trigger.textContent = optText;
                customSel.querySelector('.bk-custom-trigger').classList.remove('bk-placeholder');
            }
            options.forEach(o => {
                o.classList.toggle('bk-opt-selected', o.dataset.value === srcSelect.value);
            });
        };
        fillSelect('bk-edu', ids.edu);
        fillSelect('bk-eng', ids.eng);
    }

    // Button inside REGISTRATION POPUP
    const modalOpenBookingBtn = document.getElementById('modal-open-booking');
    if (modalOpenBookingBtn) {
        modalOpenBookingBtn.addEventListener('click', () => {
            const regModal = document.getElementById('reg-modal');
            if (regModal) {
                regModal.classList.remove('active');
                regModal.setAttribute('aria-hidden', 'true');
                document.body.style.overflow = '';
            }
            openModal();
            prefillBookingForm({
                name: 'modal-fullname', phone: 'modal-phone',
                email: 'modal-email', edu: 'modal-education', eng: 'modal-english'
            });
        });
    }

    // Button inside CTA INLINE FORM
    const ctaOpenBookingBtn = document.getElementById('cta-open-booking');
    if (ctaOpenBookingBtn) {
        ctaOpenBookingBtn.addEventListener('click', () => {
            openModal();
            prefillBookingForm({
                name: 'fullname', phone: 'phone',
                email: 'email', edu: 'education', eng: 'english'
            });
        });
    }

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && modal && modal.classList.contains('bk-open')) closeModal();
    });

    /* ── Step navigation ──────────────────────── */
    function goToStep(n) {
        Object.values(steps).forEach(el => { if (el) el.classList.add('bk-hidden'); });
        const target = n === 'success' ? steps.success : steps[n];
        if (target) target.classList.remove('bk-hidden');

        state.currentStep = (n === 'success') ? 4 : n;
        updateProgress();

        const container = document.querySelector('.bk-container');
        if (container) container.scrollTop = 0;
    }

    function updateProgress() {
        const pct = state.currentStep >= 4 ? 100 :
            state.currentStep === 3 ? 100 :
                state.currentStep === 2 ? 66.66 : 33.33;
        if (progressFill) progressFill.style.width = pct + '%';

        stepLabels.forEach(lbl => {
            const s = parseInt(lbl.dataset.step);
            lbl.classList.remove('active', 'done');
            if (s === state.currentStep) lbl.classList.add('active');
            else if (s < state.currentStep) lbl.classList.add('done');
        });
    }

    /* ── Validation helpers ──────────────────── */
    function showErr(id, msg) {
        const el = document.getElementById(id);
        if (el) el.textContent = msg;
    }
    function clearErr(id) {
        const el = document.getElementById(id);
        if (el) el.textContent = '';
    }

    /* Phone: accept 0xxxxxxxxx, +84xxxxxxxxx, 84xxxxxxxxx (9 digits after prefix) */
    function isValidPhone(val) {
        const cleaned = val.replace(/[\s\-().]/g, '');
        return /^(\+84|84|0)\d{9}$/.test(cleaned);
    }

    /* ── Step 1 validation & next ──────────── */
    const next1 = document.getElementById('bk-next-1');
    if (next1) next1.addEventListener('click', () => {
        const name = document.getElementById('bk-name');
        const phone = document.getElementById('bk-phone');
        const email = document.getElementById('bk-email');
        const program = document.querySelector('input[name="bk-program"]:checked');
        const edu = document.getElementById('bk-edu');
        const eng = document.getElementById('bk-eng');

        let ok = true;
        clearErr('bk-name-err');
        clearErr('bk-phone-err');
        clearErr('bk-email-err');
        clearErr('bk-program-err');
        clearErr('bk-edu-err');
        clearErr('bk-eng-err');

        if (!name || !name.value.trim()) {
            showErr('bk-name-err', 'Vui lòng nhập họ và tên.');
            ok = false;
        }
        if (!phone || !isValidPhone(phone.value)) {
            showErr('bk-phone-err', 'Số điện thoại không hợp lệ (VD: 0912345678 hoặc +84912345678).');
            ok = false;
        }
        if (!email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value)) {
            showErr('bk-email-err', 'Địa chỉ email không hợp lệ.');
            ok = false;
        }
        if (!program) {
            showErr('bk-program-err', 'Vui lòng chọn chương trình quan tâm.');
            ok = false;
        }
        if (!edu || !edu.value) {
            showErr('bk-edu-err', 'Vui lòng chọn trình độ học vấn.');
            ok = false;
        }
        if (!eng || !eng.value) {
            showErr('bk-eng-err', 'Vui lòng chọn trình độ Tiếng Anh.');
            ok = false;
        }

        if (ok) goToStep(2);
    });

    /* ── Step 2 back / next ────────────────── */
    const back2 = document.getElementById('bk-back-2');
    const next2 = document.getElementById('bk-next-2');
    if (back2) back2.addEventListener('click', () => goToStep(1));
    if (next2) next2.addEventListener('click', () => {
        clearErr('bk-time-err');
        if (!state.selectedDate) {
            showErr('bk-time-err', 'Vui lòng chọn ngày tư vấn.');
            return;
        }
        if (!state.selectedTime) {
            showErr('bk-time-err', 'Vui lòng chọn khung giờ.');
            return;
        }
        populateConfirmation();
        goToStep(3);
    });

    /* ── Step 3 back / confirm ─────────────── */
    const back3 = document.getElementById('bk-back-3');
    const confirmB = document.getElementById('bk-confirm-btn');
    if (back3) back3.addEventListener('click', () => goToStep(2));
    if (confirmB) confirmB.addEventListener('click', async () => {
        // Collect booking data
        const nameEl = document.getElementById('bk-name');
        const phoneEl = document.getElementById('bk-phone');
        const emailEl = document.getElementById('bk-email');
        const programEl = document.querySelector('input[name="bk-program"]:checked');
        const eduEl = document.getElementById('bk-edu');
        const engEl = document.getElementById('bk-eng');

        const nameVal = nameEl ? nameEl.value.trim() : '';
        const phoneVal = phoneEl ? phoneEl.value.trim() : '';
        const emailVal = emailEl ? emailEl.value.trim() : '';
        const programVal = programEl ? programEl.value : '';
        const dateStr = formatDateFull(state.selectedDate);
        const timeStr = state.selectedTime || '';

        // time_dat_lich: e.g. "Thứ tư, 4/3/2026 lúc 08:30"
        const timeDatLich = dateStr && timeStr ? `${dateStr} lúc ${timeStr}` : '';
        // note_dat_lich: program + optional education/english
        const eduVal = eduEl ? eduEl.value : '';
        const engVal = engEl ? engEl.value : '';
        const noteParts = [programVal, eduVal, engVal].filter(Boolean);
        const noteDatLich = noteParts.join(' | ');

        const payload = {
            form_id: "4fe1eeb0570742a1fdde61af6fc0680c",
            email: emailVal,
            firstName: nameVal,
            phoneNumber: phoneVal,
            time_dat_lich: timeDatLich,
            note_dat_lich: noteDatLich,
            chuong_trinh_dat_lich: "Online MBA"
        };

        // Loading state
        confirmB.disabled = true;
        const origText = confirmB.innerHTML;
        confirmB.innerHTML = '<span>Đang gửi...</span>';
        confirmB.style.opacity = '0.7';

        try {
            await fetch("https://automation.ideas.edu.vn/mail_api/forms.php?route=submit", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify(payload)
            });
        } catch (err) {
            console.error('Lỗi gửi đặt lịch:', err);
            // Continue to success even on network error
        } finally {
            confirmB.disabled = false;
            confirmB.innerHTML = origText;
            confirmB.style.opacity = '1';
        }

        // Fill success screen
        const successName = document.getElementById('bk-success-name');
        const successDate = document.getElementById('bk-success-date');
        const successTime = document.getElementById('bk-success-time');
        if (successName) successName.textContent = nameVal;
        if (successDate) successDate.textContent = dateStr;
        if (successTime) successTime.textContent = timeStr;
        goToStep('success');
    });

    /* Done button */
    const doneBtn = document.getElementById('bk-done-btn');
    if (doneBtn) doneBtn.addEventListener('click', () => {
        closeModal();
        setTimeout(() => resetModal(), 500);
    });

    function resetModal() {
        const form = document.getElementById('bk-form-1');
        if (form) form.reset();
        document.querySelectorAll('input[name="bk-program"]').forEach(r => r.checked = false);
        // Reset custom selects display
        document.querySelectorAll('.bk-custom-trigger').forEach(t => {
            const wrap = t.closest('.bk-select-wrap');
            const native = wrap && wrap.querySelector('select');
            if (native) {
                const firstOpt = native.options[0];
                t.querySelector('.bk-trigger-text').textContent = firstOpt ? firstOpt.text : '-- Chọn --';
                t.classList.add('bk-placeholder');
            }
            wrap && wrap.querySelectorAll('.bk-custom-option').forEach(o => o.classList.remove('bk-opt-selected'));
        });
        state.selectedDate = null;
        state.selectedTime = null;
        state.currentStep = 1;
        goToStep(1);
    }

    /* ── Populate confirmation ─────────────── */
    function populateConfirmation() {
        const name = document.getElementById('bk-name');
        const phone = document.getElementById('bk-phone');
        const email = document.getElementById('bk-email');
        const program = document.querySelector('input[name="bk-program"]:checked');

        const set = (id, val) => { const el = document.getElementById(id); if (el) el.textContent = val || '—'; };
        set('bk-confirm-date', formatDateFull(state.selectedDate));
        set('bk-confirm-time', state.selectedTime);
        set('bk-confirm-name', name ? name.value.trim() : '—');
        set('bk-confirm-phone', phone ? phone.value.trim() : '—');
        set('bk-confirm-email', email ? email.value.trim() : '—');
        set('bk-confirm-program', program ? program.value : '—');
    }

    /* ── Calendar ──────────────────────────── */
    function initCalendar() {
        const now = new Date();
        state.calYear = now.getFullYear();
        state.calMonth = now.getMonth();
        renderCalendar();
    }

    function renderCalendar() {
        const grid = document.getElementById('bk-cal-grid');
        const label = document.getElementById('bk-cal-month-label');
        if (!grid || !label) return;

        const MONTHS_VI = ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6',
            'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'];
        label.textContent = `${MONTHS_VI[state.calMonth]} ${state.calYear}`;

        const firstDay = new Date(state.calYear, state.calMonth, 1);
        let startDow = firstDay.getDay(); // 0=Sun … 6=Sat
        let offset = startDow === 0 ? 6 : startDow - 1; // Mon-based

        const daysInMonth = new Date(state.calYear, state.calMonth + 1, 0).getDate();
        const today = new Date(); today.setHours(0, 0, 0, 0);
        const tomorrow = new Date(today); tomorrow.setDate(today.getDate() + 1);

        grid.innerHTML = '';

        for (let i = 0; i < offset; i++) {
            const empty = document.createElement('div');
            empty.className = 'bk-cal-day bk-cal-empty';
            grid.appendChild(empty);
        }

        for (let d = 1; d <= daysInMonth; d++) {
            const date = new Date(state.calYear, state.calMonth, d);
            date.setHours(0, 0, 0, 0);
            const dow = date.getDay();
            const isPast = date < tomorrow;
            const isToday = date.getTime() === today.getTime();
            const isWeekend = dow === 0 || dow === 6;
            const isSelected = state.selectedDate && date.getTime() === state.selectedDate.getTime();

            const cell = document.createElement('div');
            cell.textContent = d;
            let cls = 'bk-cal-day';
            if (isPast) {
                cls += ' bk-cal-disabled';
            } else {
                if (isWeekend) cls += ' bk-cal-weekend';
                if (isToday) cls += ' bk-cal-today';
                if (isSelected) cls += ' bk-cal-selected';
                cell.addEventListener('click', () => selectDate(date));
            }
            cell.className = cls;
            grid.appendChild(cell);
        }

        renderTimeSlots();
    }

    function selectDate(date) {
        state.selectedDate = date;
        state.selectedTime = null;
        renderCalendar();
        renderTimeSlots();
    }

    function renderTimeSlots() {
        const grid = document.getElementById('bk-time-grid');
        const label = document.getElementById('bk-selected-date-label');
        if (!grid || !label) return;

        if (!state.selectedDate) {
            label.textContent = 'Vui lòng chọn ngày trước';
            grid.innerHTML = '';
            return;
        }

        label.textContent = 'Khung giờ có sẵn — ' + formatDateShort(state.selectedDate);
        grid.innerHTML = '';

        timeSlots.forEach(t => {
            const slot = document.createElement('div');
            slot.className = 'bk-time-slot' + (t === state.selectedTime ? ' bk-time-selected' : '');
            slot.textContent = t;
            slot.addEventListener('click', () => {
                state.selectedTime = t;
                clearErr('bk-time-err');
                renderTimeSlots();
            });
            grid.appendChild(slot);
        });
    }

    /* ── Calendar navigation ────────────── */
    const prevBtn = document.getElementById('bk-cal-prev');
    const nextBtn = document.getElementById('bk-cal-next');

    if (prevBtn) prevBtn.addEventListener('click', () => {
        const now = new Date();
        if (state.calYear === now.getFullYear() && state.calMonth === now.getMonth()) return;
        state.calMonth--;
        if (state.calMonth < 0) { state.calMonth = 11; state.calYear--; }
        renderCalendar();
    });

    if (nextBtn) nextBtn.addEventListener('click', () => {
        state.calMonth++;
        if (state.calMonth > 11) { state.calMonth = 0; state.calYear++; }
        renderCalendar();
    });

    /* ── Date formatting ──────────────────── */
    const DAYS_VI = ['Chủ nhật', 'Thứ hai', 'Thứ ba', 'Thứ tư', 'Thứ năm', 'Thứ sáu', 'Thứ bảy'];

    function formatDateFull(d) {
        if (!d) return '—';
        return `${DAYS_VI[d.getDay()]}, ${d.getDate()}/${d.getMonth() + 1}/${d.getFullYear()}`;
    }
    function formatDateShort(d) {
        if (!d) return '';
        return `${d.getDate()}/${d.getMonth() + 1}/${d.getFullYear()}`;
    }

    /* ── Init ───────────────────────────── */
    goToStep(1);

})();

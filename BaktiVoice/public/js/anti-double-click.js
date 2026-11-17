(function () {
    'use strict';

    const CLICK_WINDOW = 900;
    const SUBMIT_WINDOW = 1500;

    const lastClick = new WeakMap();
    const lastSubmit = new WeakMap();

    // Mencegah klik ganda pada tombol yang sama
    document.addEventListener('click', function (event) {
        const target = event.target instanceof Element
            ? event.target
            : null;

        const button = target?.closest(
            'button, input[type="submit"], input[type="image"]'
        );

        if (
            !button ||
            button.disabled ||
            button.hasAttribute('data-no-double-click')
        ) {
            return;
        }

        const now = Date.now();
        const previous = lastClick.get(button) || 0;

        if (now - previous < CLICK_WINDOW) {
            event.preventDefault();
            event.stopImmediatePropagation();
            return;
        }

        lastClick.set(button, now);
    }, true);

    // Mencegah form terkirim dua kali
    document.addEventListener('submit', function (event) {
        const form = event.target;

        if (
            !(form instanceof HTMLFormElement) ||
            form.hasAttribute('data-no-double-click')
        ) {
            return;
        }

        const now = Date.now();
        const previous = lastSubmit.get(form) || 0;

        if (now - previous < SUBMIT_WINDOW) {
            event.preventDefault();
            event.stopImmediatePropagation();
            return;
        }

        lastSubmit.set(form, now);

        window.setTimeout(function () {
            lastSubmit.delete(form);
        }, SUBMIT_WINDOW);
    }, true);
})();
// ==========================================
// ANTI DOUBLE CLICK UNTUK LINK TOMBOL PANAH
// ==========================================
(function () {
    'use strict';

    const lockedLinks = new WeakMap();

    const arrowSelector = [
        'i.fa-chevron-right',
        'i.fa-chevron-left',
        'i.fa-arrow-right',
        'i.fa-arrow-left',
        'svg'
    ].join(',');

    function restoreLink(link) {
        const saved = lockedLinks.get(link);
        if (!saved) return;

        if (saved.icon && saved.icon.parentNode) {
            saved.icon.replaceWith(saved.originalIcon);
        } else if (saved.spinner && saved.spinner.parentNode) {
            saved.spinner.remove();
        }

        link.classList.remove('bv-link-loading');
        link.removeAttribute('aria-busy');
        link.removeAttribute('data-bv-loading');

        lockedLinks.delete(link);
    }

    document.addEventListener('click', function (event) {
        if (event.button !== 0 || event.ctrlKey || event.shiftKey ||
            event.altKey || event.metaKey) return;

        const target = event.target instanceof Element
            ? event.target
            : null;

        const link = target?.closest('a');
        if (!link) return;

        if (link.hasAttribute('data-no-double-click') ||
            link.hasAttribute('download') ||
            (link.target && link.target !== '_self')) return;

        const href = link.getAttribute('href') || '';
        if (!href || href === '#' || href.startsWith('#') ||
            href.startsWith('javascript:')) return;

        if (new URL(link.href, window.location.href).origin !==
            window.location.origin) return;

        const arrow = link.querySelector(arrowSelector);

        const specialLink = link.matches(
            '.btn-detail, .back-btn, .btn-view, .report-card, .pagination a, a[rel="next"], a[rel="prev"]'
        );

        if (!arrow && !specialLink) return;

        if (lockedLinks.has(link)) {
            event.preventDefault();
            event.stopImmediatePropagation();
            return;
        }

        const spinner = document.createElement('i');
        spinner.className = 'fa-solid fa-spinner fa-spin';
        spinner.setAttribute('aria-hidden', 'true');

        lockedLinks.set(link, {
            icon: arrow,
            originalIcon: arrow ? arrow.cloneNode(true) : null,
            spinner: spinner
        });

        if (arrow) {
            arrow.replaceWith(spinner);
        } else {
            link.appendChild(spinner);
        }

        link.classList.add('bv-link-loading');
        link.setAttribute('aria-busy', 'true');
        link.setAttribute('data-bv-loading', '1');

        window.setTimeout(function () {
            restoreLink(link);
        }, 15000);

    }, true);

    window.addEventListener('pageshow', function () {
        document.querySelectorAll('a[data-bv-loading="1"]')
            .forEach(restoreLink);
    });
})();
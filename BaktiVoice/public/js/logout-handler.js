
document.addEventListener('DOMContentLoaded', function () {

    // ==========================================
    // GLOBAL ANTI-DOUBLE CLICK LOGOUT
    // ==========================================

    let logoutProcessing = false;

    function isLogoutForm(form) {
        if (!form) return false;

        const action = form.getAttribute('action') || '';

        return action.includes('/logout');
    }

    function setLogoutLoading(button) {
        if (!button) return;

        button.innerHTML = `
            <i class="fa-solid fa-spinner fa-spin"></i>
            <span>Logging Out...</span>
        `;

        button.style.pointerEvents = 'none';
        button.style.opacity = '0.65';
        button.style.cursor = 'not-allowed';
        button.setAttribute('aria-disabled', 'true');
    }

    function disableOtherLogoutButtons(activeButton) {
        document.querySelectorAll(
            '.logout-btn, .mobile-logout-link, .mobile-logout, .mobile-nav-logout'
        ).forEach(function (button) {

            if (button !== activeButton) {
                button.style.pointerEvents = 'none';
                button.style.opacity = '0.65';
                button.style.cursor = 'not-allowed';
            }

        });
    }

    // ==========================================
    // 1. FORM LOGOUT POST
    // ==========================================

    document.addEventListener('submit', function (event) {

        const form = event.target;

        if (!isLogoutForm(form)) return;

        if (logoutProcessing) {
            event.preventDefault();
            return;
        }

        logoutProcessing = true;

        const submitButton = event.submitter;

        if (submitButton) {
            setLogoutLoading(submitButton);
        }

        disableOtherLogoutButtons(submitButton);

    }, true);

    // ==========================================
    // 2. LINK LOGOUT MOBILE
    // ==========================================

    document.addEventListener('click', function (event) {

        const link = event.target.closest(
            '.mobile-logout-link, .mobile-nav-logout'
        );

        if (!link) return;

        if (logoutProcessing) {
            event.preventDefault();
            return;
        }

        const onclick = link.getAttribute('onclick') || '';

        const formIdMatch = onclick.match(
            /getElementById\(['"]([^'"]+)['"]\)/
        );

        if (!formIdMatch) return;

        const form = document.getElementById(formIdMatch[1]);

        if (!isLogoutForm(form)) return;

        event.preventDefault();

        setLogoutLoading(link);
        disableOtherLogoutButtons(link);

        // Submit akan ditangani oleh listener form di atas.
        form.requestSubmit();

    }, true);

});

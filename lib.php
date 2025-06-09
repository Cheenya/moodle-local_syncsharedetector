<?php
// File: local/syncsharedetector/lib.php
defined('MOODLE_INTERNAL') || die();

/**
 * Injects suppression CSS into the page head.
 */
function local_syncsharedetector_before_standard_html_head() {
    global $PAGE;
    $css = <<<'CSS'
.icon.fa.fa-magic.fa-fw,
ul.syncshare-cm,
.syncshare-cm .fa-bolt,
.syncshare-cm .fa-bar-chart,
.syncshare-cm .fa-angle-right {
    display: none !important;
    visibility: hidden !important;
}
CSS;
    $PAGE->requires->css_init_code($css);
}

/**
 * Injects detection-and-logging JS before the page footer.
 */
function local_syncsharedetector_before_footer() {
    global $PAGE;
    $js = <<<'JS'
(function() {
    let reported = false;

    function reportUsage() {
        if (reported) {
            return;
        }
        reported = true;
        // Send sesskey in query string for require_sesskey() to work
        const url = `${M.cfg.wwwroot}/local/syncsharedetector/log.php?` +
                    `sesskey=${encodeURIComponent(M.cfg.sesskey)}`;
        fetch(url, {
            method: 'POST',
            credentials: 'same-origin',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify({
                userid: M?.cfg?.userid || 0,
                detectedat: new Date().toISOString()
            })
        });
    }

    function detectAndRemoveSyncShare() {
        document.querySelectorAll('ul.syncshare-cm').forEach(menu => {
            const labels = Array.from(menu.querySelectorAll('.item-label'))
                                .map(el => el.textContent.trim());
            if (labels.includes('Рекомендации') || labels.includes('Статистика') ||
                labels.includes('Recommendations') || labels.includes('Statistics')) {
                reportUsage();
                menu.remove();
            }
        });
        document.querySelectorAll('.icon.fa.fa-magic.fa-fw').forEach(el => {
            el.remove();
        });
    }

    // Initial pass
    detectAndRemoveSyncShare();
    // Observe future DOM changes
    new MutationObserver(detectAndRemoveSyncShare)
        .observe(document.documentElement, { childList: true, subtree: true });
})();
JS;
    $PAGE->requires->js_init_code($js);
}

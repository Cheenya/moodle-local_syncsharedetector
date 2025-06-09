<?php
// File: local/syncsharedetector/settings.php
defined('MOODLE_INTERNAL') || die();

if ($hassiteconfig) {
    // Adds page to Reports menu
    $ADMIN->add('reports', new admin_externalpage(
        'local_syncsharedetector',
        get_string('detectorlog', 'local_syncsharedetector'),
        new moodle_url('/local/syncsharedetector/index.php'),
        'local_syncsharedetector:view'
    ));
}

<?php
// File: local/syncsharedetector/access.php
defined('MOODLE_INTERNAL') || die();

$capabilities = [
    'local_syncsharedetector:view' => [
        'captype'      => 'read',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes'   => [
            'manager' => CAP_ALLOW,
            'teacher' => CAP_ALLOW
        ]
    ]
];

<?php
// File: local/syncsharedetector/index.php
require('../../config.php');
require_login();
$context = context_system::instance();
require_capability('local_syncsharedetector:view', $context);

$PAGE->set_url(new moodle_url('/local/syncsharedetector/index.php'));
$PAGE->set_context($context);
$PAGE->set_title(get_string('detectorlog', 'local_syncsharedetector'));
$PAGE->set_heading(get_string('detectorlog', 'local_syncsharedetector'));

echo $OUTPUT->header();

$table = new flexible_table('local-syncsharedetector-log');
$table->define_columns(['id', 'username', 'timecreated']);
$table->define_headers([
    'ID',
    get_string('username', 'local_syncsharedetector'),
    get_string('time',     'local_syncsharedetector')
]);
$table->set_attribute('class', 'generaltable');
$table->setup();

global $DB;
$records = $DB->get_records('local_syncsharedetector_log', null, 'timecreated DESC');
foreach ($records as $rec) {
    $user = $DB->get_record('user', ['id' => $rec->userid], 'firstname, lastname');
    $table->add_data([
        $rec->id,
        fullname($user),
        userdate('Y-m-d H:i:s', $rec->timecreated)
    ]);
}

$table->finish();
echo $OUTPUT->footer();

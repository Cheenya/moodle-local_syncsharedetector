<?php
// File: local/syncsharedetector/log.php

// 1. Bootstrap Moodle core
require_once(__DIR__ . '/../../config.php');

// 2. Авторизация и защита от CSRF
require_login();
require_sesskey();

// 3. Считываем и валидируем JSON
$raw = file_get_contents('php://input');
$data = json_decode($raw, true);
if (!is_array($data)) {
    http_response_code(400);
    echo 'Invalid JSON';
    exit;
}

// 4. Извлекаем и очищаем параметры
$userid    = isset($data['userid'])    ? (int) $data['userid'] : 0;
$detectedat= isset($data['detectedat'])? clean_param($data['detectedat'], PARAM_TEXT) : '';

// 5. Вставляем запись в БД
global $DB;
$record = new stdClass();
$record->userid      = $userid;
$record->detectedat  = $detectedat;
$record->timecreated = time();

$DB->insert_record('local_syncsharedetector_log', $record);

// 6. Успешный ответ без содержимого
http_response_code(204);
exit;
